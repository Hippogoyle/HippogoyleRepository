#include <stdio.h>
#include <cs50.h>


// by Jerry Johnson  @ edx.org a.k.a. BlenderFish

int main(void)
{
    float amount = 0.0;
    
    do
    {
        // promt user for change owed
        printf("How much change is owed?");
        amount = GetFloat();   
    }
    // validate user input. If fail re-promt.
    while(amount <= 0.000);
    
    // change from float to int
    int dollars = amount;
    int change = amount * 1000 - dollars * 1000;
    if (change % 10 >= 5)
    {
        change = change / 10 + 1;
    }
    else 
        change = change / 10;
    
    // calculate number of coins to return from whole dollars
    int coins = dollars * 4;
    
    // calculate number of extra quarters
    while (change >= 25)
    {
        change = change - 25;
        coins++;
    }
    
    // calculate number of dimes
    while (change >= 10)
    {
        change = change - 10;
        coins++;
    }
    
    // calculate number of nickels
    while (change >= 5)
    {
        change = change - 5;
        coins++;
    }
    
    // add pennies
    coins = coins + change;
    
    // print number of coins used to make change
    printf("%i\n", coins);
}
