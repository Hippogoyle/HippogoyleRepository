/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>
#include <stdio.h>
#include "helpers.h"

// by Jerry Johnson  @ edx.org a.k.a. BlenderFish

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
   
    // erroro check for positive n
    if (n < 1)
    {
        return false;
    }   

    int begining = 0, end = n;
    
    do
    {
        // find the middle of the haystack
        int middle = ((begining + end) / 2);
        
        // check the middle value
        if (values[middle] == value)
        {
            return true;
        }
        
        // if bigger search right
        else if (values[middle] < value)
        {
            begining = middle + 1;
        }
        
        // if smaller search left
        else
        {
            end = middle;     
        }
        
        // if found stop
        if (values[begining] == value || values[end - 1] == value)
        {
            return true;
        }
    }
    while (begining != end);
    return false;    
}

/**
 * Sorts array of n values.
 */
void sort(int values[], int n)
{ 
    // bubble sort
    int bubble, counter = 0;
    for (int j = 0; j < n; j++)
    {
        // counter for swaps reset
        int swaps = 0;
        
        for (int i = 0; i < n - counter; i++)
        {
            // compare two elements
            if (values[i] > values[i + 1])
            {
                // switch if out of order
                bubble = values[i];
                values[i] = values[i + 1];
                values[i + 1] = bubble;
                swaps++;
            }
        }
        counter++; 
        
        // if noswaps == list sorted
        if (swaps == 0)
        {
            return;
        } 
    }        
    return; 
}
