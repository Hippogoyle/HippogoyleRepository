/**
 * copy.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Copies a BMP piece by piece, just because.
 */
// by Jerry Johnson  @ edx.org a.k.a. BlenderFish
       
#include <stdio.h>
#include <stdlib.h>
#include <stdint.h>

#include "bmp.h"

int main(int argc, char* argv[])
{
    // ensure proper usage
    if (argc != 4)
    {
        printf("Usage: ./copy infile outfile\n");
        return 1;
    }

    // remember filenames
    char* infile = argv[2];
    char* outfile = argv[3];
    
    // ensure usage and remember multiplier
    int multi = atoi(argv[1]);
    
    if (multi < 1 || multi > 100) 
    {
        printf("n value must be a postive int <= 100 \n");
        return 5;
    }
    
    // open input file 
    FILE* inptr = fopen(infile, "r");
    if (inptr == NULL)
    {
        printf("Could not open %s.\n", infile);
        return 2;
    }

    // open output file
    FILE* outptr = fopen(outfile, "w");
    if (outptr == NULL)
    {
        fclose(inptr);
        fprintf(stderr, "Could not create %s.\n", outfile);
        return 3;
    }

    // read infile's BITMAPFILEHEADER
    BITMAPFILEHEADER bf;
    fread(&bf, sizeof(BITMAPFILEHEADER), 1, inptr);

    // read infile's BITMAPINFOHEADER
    BITMAPINFOHEADER bi;
    fread(&bi, sizeof(BITMAPINFOHEADER), 1, inptr);

    // ensure infile is (likely) a 24-bit uncompressed BMP 4.0
    if (bf.bfType != 0x4d42 || bf.bfOffBits != 54 || bi.biSize != 40 || 
        bi.biBitCount != 24 || bi.biCompression != 0)
    {
        fclose(outptr);
        fclose(inptr);
        fprintf(stderr, "Unsupported file format.\n");
        return 4;
    }
    
    // make holders for output files header information
    BITMAPINFOHEADER outbi = bi;
    BITMAPFILEHEADER outbf = bf;
    
    // update output header width & height info
    outbi.biWidth = bi.biWidth * multi;
    outbi.biHeight = bi.biHeight * multi;
    
    // determine amount of padding to make for output
    int ifpadding = (4 - (bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;
    int ofpadding = (4 - (outbi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;
    
    // update outbi.biSizeImage  
    outbi.biSizeImage = abs(outbi.biHeight) * 
    (outbi.biWidth * sizeof(RGBTRIPLE) + ofpadding);
    
    // update outbf.bfSize
    outbf.bfSize = outbi.biSizeImage + 54;
    
    // write outfile's BITMAPFILEHEADER
    fwrite(&outbf, sizeof(BITMAPFILEHEADER), 1, outptr);

    // write outfile's BITMAPINFOHEADER
    fwrite(&outbi, sizeof(BITMAPINFOHEADER), 1, outptr);

    // iterate over infile's scanlines
    for (int i = 0; i < abs(bi.biHeight); i++)
    {
        // repeat this scanline n times before moving to next
        for (int h = 0; h < multi; h++)
        {     
            // iterate over pixels in scanline
            for (int j = 0; j < bi.biWidth; j++)
            {
                // temporary storage
                RGBTRIPLE triple;
                
                // read RGB triple from infile
                fread(&triple, sizeof(RGBTRIPLE), 1, inptr);

                // multiply width
                for (int l = 0; l < multi; l++)
                {
                    // write RGB triple to outfile
                    fwrite(&triple, sizeof(RGBTRIPLE), 1, outptr);
                }
            }

            // skip over padding, if any
            fseek(inptr, ifpadding, SEEK_CUR);

            // then add it back (to demonstrate how)
            for (int k = 0; k < ofpadding; k++)
            {
                fputc(0x00, outptr);
            }
            
            // reset file pointer to front of line
            if (h < multi - 1)
            {
                fseek(inptr, (bi.biWidth * sizeof(RGBTRIPLE) + ifpadding) * -1, SEEK_CUR);
            }
        }
    }

    // close infile
    fclose(inptr);

    // close outfile
    fclose(outptr);

    // that's all folks
    return 0;
}
