import static java.lang.System.out;
import java.util.Scanner;

public class SellingApples
{
    public static void main(String[] args)
    {
        Scanner keyboard = new Scanner(System.in);
        
        out.print("How many apples? ");
        int appleCount = keyboard.nextInt();
        
        out.print("How many cents each? ");
        int appleCostInCents = keyboard.nextInt();
        
        int priceInCents = appleCount * appleCostInCents;
        float priceInDollars = priceInCents / 100f;
        out.println("The order price is " + priceInDollars + " dollars.");
        out.println("The order price is " + priceInCents + " cents.");
    }
}