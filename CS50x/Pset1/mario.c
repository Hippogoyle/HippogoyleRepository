#include <stdio.h>
#include <cs50.h>

// by Jerry Johnson  @ edx.org a.k.a. BlenderFish

int main(void)
{
    int height = 0;
   
    do  
    {
        // prompt user for pyramid height
        printf("Enter an integer between 0 and 23:");
        height = GetInt();
    }
    // error check for a positive integer no greater than 23
    while (height < 0 || height > 23);
    
    
    // generate pyramid with printf
    for (int i = 0; i < height; i++)
    {
        // print spaces
        for (int spaces = height - i; spaces >= 2; spaces--)
        {
            printf(" ");
        } 
        
        // print sharps
        for (int sharps = i + 1; sharps >= 0; sharps--)
        {
            printf("#");
        }
        // new line
        printf("\n");
    }
  
}
