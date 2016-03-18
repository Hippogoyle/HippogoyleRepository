#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <ctype.h>
#include <stdlib.h>

// by Jerry Johnson  @ edx.org a.k.a. BlenderFish

int main(int argc, string argv[])
{
    // error checking for commandline arguments
    if (argc != 2)
    {
        printf("return 1\n");
        return 1;
    }
    else
    {
        // change string content to int and modulo
        int key = atoi(argv[1]) % 26;

        // prompt user for string
        string text = GetString();
        
        // output rotated text
        for (int i = 0; i < strlen(text); i++)
        {
            // if the char is an upper letter change it
            if (isupper(text[i])) 
            {
                text[i] = (text[i] - 65 + key) % 26 + 65;
            }  
            else if (islower(text[i])) 
            {
                text[i] = (text[i] - 97 + key) % 26 + 97;
            }
              
            // print cyphered text
            printf("%c", text[i]);
        }
        printf("\n");
        // print cyphered text
        return 0;
    }     
    
    // print cyphered text
    return 0;
}
