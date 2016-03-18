#include <stdio.h>
#include <cs50.h>
#include <ctype.h>
#include <string.h>


// by Jerry Johnson  @ edx.org a.k.a. BlenderFish

int main(void)
{
    // get a name
    
    // printf("Please input a name:");
    
    /* if the above line is left in it fails check50?  
    Directions call to prompt user.*/
    
    string name = GetString();
    
    // print in upper case
    printf("%c", toupper(name[0]));
    
    // find the spaces
    for(int i = 0; i <= strlen(name); i++)
    {
        if (name[i] == ' ')
        {
            // print the char after space to upper
            printf("%c", toupper(name[i + 1]));  
        }
    }
    printf("\n");
}
