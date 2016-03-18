import static java.lang.System.out;
import java.util.Scanner;

public class GroceryList
{
    public static void main(String[] args)
    {
        // ask for number of items
        Scanner keyboard = new Scanner(System.in);
        out.print("How many items do you need to grab? ");
        int numberOfItems = keyboard.nextInt();
        keyboard.skip("\n");
        
        // ask for items
        String[] item = new String[numberOfItems];
        for (int counter = 0; counter < numberOfItems; counter++)
        {
            
            out.print("What is item number " + (counter+1) + "? ");      
            item[counter] = keyboard.nextLine();
        }
        
       // ask for item prices
        float[] itemCost = new float[numberOfItems];
        for (int counter =0; counter < numberOfItems; counter++)
        {
            
            out.print("How much does one unit of " + item[counter] + " cost? "); 
            itemCost[counter] = keyboard.nextFloat();
        }
        
        // ask for quantity of items needed
        int[] quantity = new int[numberOfItems];
        for (int counter = 0; counter < numberOfItems; counter++)
        {
           
           out.print("How many " + item[counter] + " would you like? ");  
           quantity[counter] = keyboard.nextInt();
        }
        // calculatethe subtotal
        float subTotal = 0.000f;
        for (int counter = 0; counter < numberOfItems; counter++)
        {
            subTotal = subTotal + (itemCost[counter] * quantity[counter]);
        }
       
        out.print("Your subtotal will be $" + String.format("%.2f",subTotal) + ".");
        
    }
    
}