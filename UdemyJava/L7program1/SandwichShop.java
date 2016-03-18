import static java.lang.System.out;
import java.util.Scanner;

public class SandwichShop
{
    public static void main(String[] args)
    {
        // Don't change these lines.
        Scanner keyboard = new Scanner(System.in);
        int goalForVeggies = 50;
        int goalForBurgers = 250;
        int goalForSubs = 180;
        int goalForSoup = 70;
        
        int soldVeggies = 0;
        int soldBurgers = 0;
        int soldSubs = 0;
        int soldSoup = 0;
        int goalCount = 0;
        
        out.println("How many veggie sanwiches did you sell today?");
        soldVeggies = keyboard.nextInt();
        keyboard.skip("\n");
        if (soldVeggies >= goalForVeggies)
        {
            out.println("Made goal.");
            goalCount += 1;
        }
        else
        {
           out.println("Fell short");
        }
        
        out.println("How many burgers did you sell today?");
        soldBurgers = keyboard.nextInt();
        keyboard.skip("\n");
        if (soldBurgers >= goalForBurgers)
        {
           out.println("Made goal.");
            goalCount += 1;
        }
        else
        {
            out.println("Fell short");
        }
        
        out.println("How many subs did you sell today?");
        soldSubs = keyboard.nextInt();
        keyboard.skip("\n");
        if (soldSubs >= goalForSubs)
        {
            out.println("Made goal.");
            goalCount += 1;
        }
        else
        {
            out.println("Fell short");
        }
        
       out.println("How many bowls of soup did you sell today?");
        soldSoup = keyboard.nextInt();
        keyboard.skip("\n");
        if (soldSoup >= goalForSoup)
        {
            out.println("Made goal.");
            goalCount += 1;
        }
        else
        {
            out.println("Fell short");
        }
        if (goalCount > 3)
        {
            out.println("Made goal for everything!");
        }
        
    }
}