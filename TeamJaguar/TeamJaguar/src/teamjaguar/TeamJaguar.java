/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teamjaguar;
import java.util.*;
/**
 *
 * @author ctoph
 */
public class TeamJaguar {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
    	
    	Scanner in = new Scanner(System.in);
        int choice;
        Users user = new Users(null, null, null, null);
        boolean keepGoing = true;
        while(keepGoing){//prompting user to select an option.
            System.out.println("1. Create Account\n"
               + "2. Log In\n"
               + "3. Quit");
            try{//sjs
                choice = in.nextInt();
                in.nextLine();//consume new line left over 
            } catch(InputMismatchException e){
               System.out.println("Invalid Choice. Try again.\n");
               choice = -1;   
               in.next();//clear scanner wrong input.
               continue;
            }//end try catch
            switch (choice) {
                case 1:  //create account
                         System.out.print("Enter first Name: ");
                         String fname = in.nextLine();
                         System.out.print("Enter Last Name: ");
                         String lname  = in.nextLine(); 
                         System.out.print("Enter Username: ");
                         String username = in.nextLine(); 
                         System.out.print("Enter password: "); 
                         String password = in.nextLine();
                         user = new Users(fname, lname, username, password);
                         loggedIn(user);
                                    
                         break;
                case 2:  //list all the data for a group specified by the user
                         System.out.print("Username: ");
                         String username2 = in.nextLine(); 
                         System.out.print("Password: ");
                         String password2 = in.nextLine(); 
                         user = new Users(username2, password2);
                         if(user.logIn_Status()){
                             System.out.println("Welcome Back, "+user.getUserName()+"!");
                             
                              loggedIn(user);  
                         }
                         else{
                             System.out.println("Invalid Username/Password");
                         }
                         break;
                case 3://quitting time, end switch statement
                         keepGoing = false;
                         System.out.println("GoodBye");
                         break;
                default: System.out.println("Invalid Choice: Try again\n");
                         break;
            }//end switch
        }//end while
    }//end main    
    
    public static void loggedIn(Users user){
        boolean loggedIn = true; 
        Scanner in = new Scanner(System.in);
        int choice; 
        while(loggedIn){
            
            System.out.println("1. Create TimeCapsule\n"
               + "2. Delete TimeCapsule\n"
               + "3. Change TimeCapsule Name\n"
               + "4. Log Out");
            try{
                choice = in.nextInt();
                in.nextLine();//consume new line left over 
            } catch(InputMismatchException e){
               System.out.println("Invalid Choice. Try again.\n");
               choice = -1;   
               in.next();//clear scanner wrong input.
               continue;
            }//end try catch
            switch(choice){
                
                 case 1:  //create Timecapsule
                         System.out.print("Enter TimeCapsule Name: ");
                         String capsuleName = in.nextLine();
                         System.out.print("Enter Date to Open TimeCapsule (yyyy-mm-dd): ");
                         String openDate = in.nextLine();
                         
                         TimeCapsule timecap = new TimeCapsule(capsuleName, user, openDate);
                         break;
                case 2:  //delete all capsules
                        
                        try {
                            TimeCapsuleDB db = new TimeCapsuleDB();
                            
                            db.deleteCapsule(user);
                        } catch (ClassNotFoundException | SQLException | IOException ex) {
                            Logger.getLogger(TimeCapsule.class.getName()).log(Level.SEVERE, null, ex);
                        }
                        
                         
                         break;
                 case 3:  //Change name of timecapsule
                         
                        try {
                            TimeCapsuleDB db = new TimeCapsuleDB();
                            
                            db.changeCapsuleName(user);
                        } catch (ClassNotFoundException | SQLException | IOException ex) {
                            Logger.getLogger(TimeCapsule.class.getName()).log(Level.SEVERE, null, ex);
                        }
                         break;
                case 4://logging out
                         System.out.println("GoodBye");
                         loggedIn = user.logOut(); 
                         break;
                default: System.out.println("Invalid Choice: Try again\n");
                         break;
            }//end switch statement
       }
    }
    
}
