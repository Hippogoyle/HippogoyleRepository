import static java.lang.System.out;
import java.util.Scanner;
public class Entertainment{
    public static void main(String[] args){
        Scanner keyboard = new Scanner(System.in);
        // variables
        String weatherin;
        String w1 = "sunny"; // value 0
        String w2 = "cloudy"; // value 3
        String w3 = "rainy"; // value 6
        
        String moodin;
        String m1 = "exercise"; // value 0
        String m2 = "party"; // value 1
        String m3 = "quiet"; // value 2
        
        int index = 0;
        String[] result = new String[11];
        
        // results
        result[0] = "For exercise on a sunny day, try a brisk walk in a nature preserve.";
        result[1] = "For a fun party on a sunny day, look for a street festival.";
        result[2] = "A sunny day is a beautiful time to sit under a tree and read a book.";
        result[3] = "For exercise on a cloudy day, the botanical gardens are lovely walk.";
        result[4] = "For a fun party on a cloudy day, ride the paddle boats at the park.";
        result[5] = "On a cloudy day, take a camera or paints to sketch the flowers at the lakeside.";
        result[6] = "Giant indoor trampolines are a fun place to exercise on a rainy day.";
        result[7] = "See if your firneds are playing board games to pass a rainy day.";
        result[8] = "A rainy day is a peaceful time to journal and daydream.";
        result[9] = "Error: Your weather answer wasn't one of the valid options.";
        result[10] = "Error: Your mood answer wasn't one of the valid options.";
               
        out.print("What is the weather like today? Answer: " + w1 + " " + w2 + " or " + w3 + ".  > ");
        weatherin = keyboard.next();
        
        out.print("\nWhat kind of mood are you in for activities? Answer: " + m1 + " " + m2 + " or " + m3 +".   > ");
        moodin = keyboard.next();
        // weather logic
        if (weatherin.equals(w1)){
            index = 0;
        }
        else if (weatherin.equals(w2)){
            index = 3;
        }
        else if (weatherin.equals(w3)){
            index = 6;
        }
        else {
           index = 9;
        }
        if (index != 9){
             // mood logic
            if (moodin.equals(m1)){
                 index = index + 0;
            }
            else if (moodin.equals(m2)){
                index = index + 1;
            }
            else if (moodin.equals(m3)){
                index = index + 2;
            }
            else {
                index = 10;
            }
        }
        out.print(result[index]);
    }
}