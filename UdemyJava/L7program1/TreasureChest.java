import static java.lang.System.out;
import java.util.Scanner;

public class TreasureChest
{
    public static void main(String[] args)
    {
        // variables
        Scanner keyboard = new Scanner(System.in);
        int boardsPerChest = 9;
        int silverPiecesPerBoard ;
        int costForBoards; // boardsPerChest * silverPiecesPerBoard;
        int costPerLock;
        int totalChestCost; // costForBoards + costPerLock;
        int investment; // spending capital
        int numChests; // # of chests invetment will buy
        int leftOverSilver; // // change from transaction
        
        // user input
        out.println("Pirate Lady Ching wants to build son locking treasure chests.");
        out.println("The chests are a standard size to fit inthe ship's cargo area.");
        out.println("Every chest requres 9 boards.\n");
        
        out.print("What is today's price for boards, in silver pieces?");
        silverPiecesPerBoard = keyboard.nextInt();
        costForBoards = boardsPerChest * silverPiecesPerBoard;
        out.println("The cost per chest is " + costForBoards + " silver pieces for boards.\n");
        
        out.print("Each chest also requires lock hardware.\nWhat is today's price for locks, in silver pieces?");
        costPerLock = keyboard.nextInt();
        out.print("How many silver pieces does Lady Ching wish to invest in building\nchests?");
        investment = keyboard.nextInt();
        totalChestCost = costForBoards + costPerLock;
        numChests = investment / totalChestCost;
        leftOverSilver = investment - (numChests * totalChestCost); 
        out.print("That will pay for the creation of " + numChests + " chests.\n");
        out.print("Left over silver pieces: " + leftOverSilver);
    }   
    
}