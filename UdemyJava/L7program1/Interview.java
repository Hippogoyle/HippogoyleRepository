import static java.lang.System.out;
import java.util.Scanner;

public class Interview
{
    public static void main(String[] args)
    {
        Scanner key = new Scanner(System.in);
        String name;
        int favoriteNumber;
        out.println("Hi. I'm going to ask you a few qwuestions.");
        out.print("What's your name?");
        name = key.next();
        
        out.println("Hi, " + name.toLowerCase() + " it's good to mee you.");
        out.println("Oops, did I forget to capitalize your name?\n");
        out.println("Hi, " + name.toUpperCase() + " it's good to meet you.");
        out.println("Wait, that's not right either. \n");
        out.println("Hi, " + name + " it's good to meet you. \n");
        out.println("Your name has " + name.length() + " letters in it.");
        
        // There is more code on the next page.
        
        out.print("What's your favorite number?");
        favoriteNumber = key.nextInt();
        if (favoriteNumber > 100){
            out.println(favoriteNumber +  " is a really big number!");
        } else {
            out.println("Here is a bar " + favoriteNumber + " x's long.");
            for (int counter = 0; counter < favoriteNumber; counter++)
            {
                out.print("x");
            }
            out.println("");
            out.println("I hope it made you smile!");
        
}     
    }
}