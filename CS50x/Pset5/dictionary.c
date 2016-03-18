/****************************************************************************
 * dictionary.c
 *
 * Computer Science 50
 * Problem Set 5
 *
 * Implements a dictionary's functionality.
 ***************************************************************************/

#include <ctype.h>
#include <stdbool.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
//#include <intrin.h>

#include "dictionary.h"

#define HASH_SIZE 131072

// nodes for linked list
typedef struct node
{
    char word[46];
    struct node* next;
}
node;
node* hashtable[HASH_SIZE];
unsigned long key(const char*);
double wordcount = 0;
int index = 0;
/**
 * Returns true if word is in dictionary else false.
 */
bool check(const char* word)
{
 
    int len = strlen(word);
    char test[len + 1];
    int i;
    for (i = 0; i < len; i++)
    {
        test[i] = tolower(word[i]);
    } 
    
    test[i] = '\0';

    index = key(test);
    
    node* cursor = hashtable[index];
    int compare;  
    while (cursor != NULL)
    {
        compare = strcmp(test, cursor->word);
        
        if (compare == 0)
        {
            return true;
        }
        cursor = cursor->next; 
    }  
    return false;
}

/**
 * Loads dictionary into memory.  Returns true if successful else false.
 */
bool load(const char* dictionary)
{
    FILE* fp = fopen(dictionary, "r");
    
    int i;
    
    if (fp != NULL)
    {
        char c;
        
        while (!feof(fp))
        {
            node* new_node = malloc(sizeof(node));
            i = 0;
            while ((c = fgetc(fp)) != '\n')
            {
                if(c <= '\0')
                {
                    free(new_node);
                    fclose(fp);
                    return true;
                }
                new_node -> word[i] = c;
                i++;
                
            }
            new_node -> word[i] = '\0';
           
            index = key(new_node->word);
            
            new_node->next = hashtable[index];
            hashtable[index] = new_node;
            
            wordcount++;            
            
        }   
    }
    return false;
}

/**
 * Returns number of words in dictionary if loaded else 0 if not yet loaded.
 */
unsigned int size(void)
{
    return wordcount;
}

/**
 * Unloads dictionary from memory.  Returns true if successful else false.
 */
bool unload(void)
{
    node* cursor;
    for (int i = 0; i <= HASH_SIZE + 1; i++)
    {
        cursor = hashtable[i];
        while(cursor != NULL)
        {
            node* temp = cursor;
            cursor = cursor->next;
            free(temp);
        }
    }
    return true;
}

/*unsigned long key(const char* word)*/
/*{*/
/*    // from http://stackoverflow.com/questions/8948220/good-hash-function*/
/*    unsigned int hashval = 0;*/
/*    for(; *word != '\0'; word++)*/
/*    {*/
/*        hashval = *word + (hashval << 5) - hashval;*/
/*    }*/
/*    return hashval % HASH_SIZE;*/
/*}*/
unsigned long key(const char* word)
{

    unsigned long hashval = 0;
    while(*word)
    {
        hashval = hashval * 101 + *word++;
    }
    return hashval % HASH_SIZE;
}

