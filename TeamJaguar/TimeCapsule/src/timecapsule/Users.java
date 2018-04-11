/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package timecapsule;
import java.io.IOException;
import java.sql.*;
import java.util.InputMismatchException;
import java.util.Scanner;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author abdulrahim
 */
public class Users {
    private String userName;
    //private String password;
    
    //First Name and Last Name are the only basic things you need to create an
    //account.
    private String firstName,lastName;
    
    //Returns whether you should be allowed to log in or not to the application.
    private boolean logIn=false;
    
    //SQL Stuff
    static final String JDBC_DRIVER="org.apache.derby.jdbc.ClientDriver";
    static final String DB_URL="jdbc:derby://localhost:1527/TeamJaguar";
    
    public Users(){
        userName = "";
        String password = "";
        firstName = "";
        lastName = "";
    }
    public Users(String fName, String lName, String usrName, String pass)
    {
        userName = usrName;
        String password = pass;
        firstName = fName;
        lastName = lName;
        
	//Add to Database (NOT DONE YET EVERYTHING INVOLVING MYSQL)
        try
        {
            Class.forName(JDBC_DRIVER);  
            Connection con=DriverManager.getConnection(DB_URL);  
            //here sonoo is database name, root is username and password 

            Statement stmt=con.createStatement();  
            stmt.executeUpdate("INSERT INTO users VALUES ('"+firstName+"', '"+lastName+"', '"+userName+"', '"+password+"')");
            System.out.println(firstName+" "+lastName+" "+userName+" ");

            con.close();  
        }
        catch(Exception e){ System.out.println(e);}  
          
    }
    
    public Users(String username, String password)
    {
        try
        {
            Class.forName(JDBC_DRIVER);  
            Connection con=DriverManager.getConnection(DB_URL);  
            //here sonoo is database name, root is username and password 

            Statement stmt=con.createStatement();  
            ResultSet rs=stmt.executeQuery("select * from users");  
            while(rs.next())  {
                //If username and password found in database, then we can log in to that account.
                if(rs.getString(3).equals(username) && rs.getString(4).equals(password))
                {
                    
                    firstName = rs.getString(1);
                    lastName = rs.getString(2);
                    userName = rs.getString(3);
                    //password = pass;
                    logIn=true;
                    break;
                }
            }
            con.close();  
        }
        catch(Exception e){ System.out.println(e);}   
        //Return wheter you are allowed to log in or not into the application.
    }
    
    
    public boolean logIn_Status(){
        return logIn; 
    }
    
    public boolean logOut()
    {
        //Change Log in status to false so you can successfully log out.
        logIn=false;
        
        return logIn;
    }
    
    public String getUserName()
    {
        //Return the UserName for this specific User.
        return userName;
    }
    
    public String getFirstName()
    {
        //Return the First Name for this specific User.
        return firstName;
    }
    
    public String getLastName()
    {
        //Return the Last Name for this specific User.
        return lastName;
    }
}
