/**
 * recover.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a forensic image.
 */
// by Jerry Johnson  @ edx.org a.k.a. BlenderFish
#include <stdio.h>
#include <stdlib.h>

int main(void)
{
    // open card file
    FILE* card = fopen("card.raw", "r");
    
    // variables
    char name[8];
    uint8_t block[512];
    uint8_t counter = 0;
    FILE* outptr = NULL;
  
    // repeat until end of card,read 512 bytes into buffer
    while (fread(&block, sizeof(counter), 512, card) == 512)
    {
        // check for jpg header
        if (((int)block[0] == 0xff && (int)block[1] == 0xd8 
        && (int)block[2] == 0xff) && ((int)block[3] == 0xe0 
        || (int)block[3] == 0xe1))
        {
            // if file has been opened already
            if (counter != 0)
            {
                // close existing file
                fclose(outptr);
            }
            // open new file
            sprintf(name,"%03d.jpg", counter);
            outptr = fopen(name, "w");
            fwrite(&block, sizeof(counter), 512, outptr);
            counter++;
        }
        // if no header found and a file has already been opened 
        else if (counter != 0) 
        {
            fwrite(&block, sizeof(counter), 512, outptr);
        }   
    }
    
    fclose(outptr);
    fclose(card);
}
