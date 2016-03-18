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
    // error checking for all alphabet characters
    string key = argv[1];
    for (int i = 0; i < strlen(key); i++)
    {
        if (isalpha(key[i]))        
        {
            // key must be tolower
            key[i] = tolower(key[i]);
        }
        else
        {
            printf("return 1\n");
            return 1;
        }
    }
        
    // prompt user for string
    string text = GetString();
    
    // ints to count through key
    int k = strlen(key), i = 0, j = k; 
    
    // output rotated text
    do 
    { 
        int location = k - j;
        // if the char is an upper letter change it
        if (isupper(text[i])) 
        {
            text[i] = ((text[i] - 65) + (key[location] - 97)) % 26 + 65;
            j--;
        }  
        else if (islower(text[i])) 
        {
            text[i] = ((text[i] - 97) + (key[location] - 97)) % 26 + 97;
            j--;
        }
        
        // print cyphered text
        printf("%c", text[i]);
        
        if (j == 0)
        {
            j = k;
        }  
        
        i++;
       
    }
    while (i < strlen(text));
    
    // print cyphered text
    printf("\n");

    return 0;
}
