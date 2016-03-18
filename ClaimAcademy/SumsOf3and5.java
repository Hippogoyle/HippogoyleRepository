import static java.lang.System.out;

public class SumsOf3and5{
    public static void main(String[] args){
        int sum = 0;
        // for 1 to 1000 modulo 3
        int count = 1;
        while(count < 1000){
            if(count % 3 == 0 || count % 5 == 0){
                sum = sum + count;
            }
            count = count + 1;
        }
        out.print("The SUM of multiples of 3 OR 5 BELOW 1000 is " + sum + ".");
        
    }
}