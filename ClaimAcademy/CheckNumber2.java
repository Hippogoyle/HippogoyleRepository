import static java.lang.System.out;
import java.util.Arrays;

public class CheckNumber2{
    public static void main(String[] args){
        // default number for use with Check
        int number = 3;
        
        // create a new check object
        Check checkNum = new Check();
        
        // different methods available to call on new check object
        checkNum.setNumber(number);
        checkNum.getNumber();
        checkNum.isEven();
        checkNum.divisible();
        checkNum.changeToString();
        checkNum.sumsOf3and5();
    }
}

class Check{
    private int number;
    private String result;
    public void setNumber(int integer){
        this.number = integer;
             if(number % 3 == 0 && number % 5 == 0){
            result = "Divisible by both 3 and 5";
        }
        else{
            if(this.number % 3 == 0){
                result = "Divisible by 3";
            }
            else if(this.number % 5 == 0){
                result = "Divisible by 5";
            }
            else{
                result = "Indivisible by 3 or 5";
            }
        }
    }
    public int getNumber(){
        out.println(number);
        return number;
    }
    public void isEven(){
        if(number % 2 == 0){
            out.println("Even");
        }
        else{
            out.println("Odd");
        }
    }
    public void divisible(){
        out.println(result);
    }
    public void changeToString(){
        int i = 0;
        String[] splitString = result.split(" ");
        if("Indivisible".equals(splitString[0])){
           out.println("Indivisible, with Liberty and Justice for All");
        }
        else{
            
            while(i < splitString.length){
                if(splitString[i].equals("3")){
                    splitString[i] = "three";
                }
                else if( splitString[i].equals("5")){
                    splitString[i] = "five";
                }
                out.print(splitString[i] + " ");
                i = i + 1;
            }
            out.print("\n");
        }
    }
    public void sumsOf3and5(){
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
       
