/***************************************************************************
 * generate.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Generates pseudorandom numbers in [0,LIMIT), one per line.
 *
 * Usage: generate n [s]
 *
 * where n is number of pseudorandom numbers to print
 * and s is an optional seed
 ***************************************************************************/
 
 // by Jerry Johnson  @ edx.org a.k.a. BlenderFish
 
// standard libraries
#define _XOPEN_SOURCE
#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

// constant
#define LIMIT 65536

int main(int argc, string argv[])
{
    // error checking for number of command line arguments
    if (argc != 2 && argc != 3)
    {
        printf("Usage: generate n [s]\n");
        return 1;
    }

    // converts the second agrument string to an int
    int n = atoi(argv[1]);

    /* checks to see if there is a seed number given in the command line
    If so converts the third argument to an int otherwise uses the
    computer clock for seeding */
    
    if (argc == 3)
    {
        srand48((long int) atoi(argv[2]));
    }
    else
    {
        srand48((long int) time(NULL));
    }

    // Prints n number of "random" numbers to the screen on new lines
    for (int i = 0; i < n; i++)
    {
        printf("%i\n", (int) (drand48() * LIMIT));
    }

    // success
    return 0;
}
