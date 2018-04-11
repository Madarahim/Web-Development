/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package timecapsule;

import java.awt.List;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.sql.Date;
import java.sql.SQLException;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.HashMap;
import java.util.InputMismatchException;
import java.util.Scanner;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.Box;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;

public class TimeCapsule {
    public static void main(String[] args) {
        Database db;
        try {
            Users u = new Users(); 
            db = Database.getInstance();
            Scanner in = new Scanner(System.in);
             int choice;
                //Users user = new Users(null, null, null, null);
             boolean keepGoing = true;
             while(keepGoing){//prompting user to select an option.
             System.out.println("1. Create Account\n"
               + "2. Log In\n"
               + "3. Quit");
             try{
                choice = in.nextInt();
                in.nextLine();//consume new line left over 
              } catch(InputMismatchException e){
               System.out.println("Invalid Choice. Try again.\n");
               choice = -1;   
               in.next();//clear scanner wrong input.
               continue;
             }
             switch (choice) {
                case 1:  
                        JTextField fname = new JTextField();
                        JTextField lname = new JTextField();
                        JTextField username = new JTextField();
                        JTextField password = new JPasswordField();
                        JTextField vpass = new JPasswordField();
                        Object[] message1 = {
                            "First Name:", fname,
                            "Last Name:", lname,
                            "Username:", username,
                            "Password:", password,
                            "Verify Password", vpass
                        };
                        /*dialog.setAlwaysOnTop(alwaysOnTop);*/
                        int option = JOptionPane.showConfirmDialog(null, message1, "Create Account", JOptionPane.OK_CANCEL_OPTION);
                        if (option == JOptionPane.OK_OPTION) {
                            //passwords do not match
                            if (!password.equals(vpass.getText())){
                                JOptionPane.showMessageDialog(null, "Passwords do not match"); 
                                System.out.println("Account setup failed\n");
                            } //user already exist
                            else if(db.checkUsersnames(username.getText())) {
                                JOptionPane.showMessageDialog(null, "Username already exit");
                                System.out.println("Account set up failed\n");
                            }
                            else if(fname.getText()=="" || lname.getText()=="" || username.getText()==""){
                                JOptionPane.showMessageDialog(null, "Missing Required Information");
                                System.out.println("Account set up failed\n");
                            }
                            else{
                                u = new Users(fname.getText(),lname.getText(),username.getText(),password.getText());
                                loggedIn(u);
                            }
                        } else {
                            System.out.println("Account Setup Canceled\n");
                        }                   
                                                        
                         break;
                case 2:                      
                        JTextField username1 = new JTextField();
                        JTextField password2 = new JPasswordField();
                        Object[] message = {
                            "Username:", username1,
                            "Password:", password2
                        };
                        int option1 = JOptionPane.showConfirmDialog(null, message, "Login", JOptionPane.OK_CANCEL_OPTION);
                        if (option1 == JOptionPane.OK_OPTION) {
                            if (db.checkPW(username1.getText(), password2.getText())) {
                                System.out.println("Login successful\n");
                                u = new Users(username1.getText(), password2.getText());
                                loggedIn(u);
                            } else {
                                System.out.println("login failed\n");
                            }
                        } else {
                            System.out.println("Login canceled\n");
                        }                   
                        break;
                case 3 ://quitting time, end switch statement
                         keepGoing = false;
                         System.out.println("GoodBye");
                         break;
                default: System.out.println("Invalid Choice: Try again\n");
                         break;
             }//end switch
           }//end while
        } catch (ClassNotFoundException | SQLException | IOException ex) {
            Logger.getLogger(TimeCapsule.class.getName()).log(Level.SEVERE, null, ex);
        }
    }//end main    
    
    public static void loggedIn(Users user){
        boolean loggedIn = true; 
        Scanner in = new Scanner(System.in);
        int choice; 
        while(loggedIn){
            
            System.out.println("1. Create TimeCapsule\n"
               + "2. Delete TimeCapsule\n"
               + "3. Change TimeCapsule Name\n"
               + "4. View Your TimeCapsules\n"
               + "5. Log Out\n");
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
                         
                         Capsule timecap = new Capsule(capsuleName, user, openDate);
                         break;
                case 2:  //delete all capsules
                        
                        try {
                            Database db = Database.getInstance();
                            
                            db.deleteCapsule(user.getUserName());
                        } catch (ClassNotFoundException | SQLException | IOException ex) {
                            Logger.getLogger(TimeCapsule.class.getName()).log(Level.SEVERE, null, ex);
                        }
                        
                         
                         break;
                 case 3:  //Change name of timecapsule
                         
                        try {
                           Database db = Database.getInstance();
                            
                            db.changeCapsuleName(user);
                        } catch (ClassNotFoundException | SQLException | IOException ex) {
                            Logger.getLogger(TimeCapsule.class.getName()).log(Level.SEVERE, null, ex);
                        }
                         break;
                case 4: 
                        Database db;
                        try {
                            
                           db = Database.getInstance();
                           db.viewCaps(user.getUserName());
                        } catch (ClassNotFoundException | SQLException | IOException ex) {
                            Logger.getLogger(TimeCapsule.class.getName()).log(Level.SEVERE, null, ex);
                        }
                        
                        break;
                case 5://logging out
                         System.out.println("GoodBye");
                         loggedIn = user.logOut(); 
                         break;
                default: System.out.println("Invalid Choice: Try again\n");
                         break;
            }//end switch statement
       }
    }
}
