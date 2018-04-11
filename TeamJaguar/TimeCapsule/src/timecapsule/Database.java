/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package timecapsule;

import java.io.FileNotFoundException;
import java.io.IOException;
import java.sql.*;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Scanner;


/**
 *  server: cecs-db01.coe.csulb.educecs491a1im7Eir
 * cecs491at4	cecs491a14	rohX3i  7412039	        Christopher Vargas
   cecs491at4	cecs491a15	au9eiH	12577784	Giang Trong
   cecs491at4	cecs491a16	cu7koF	11600158	Michael Zatlin
   cecs491at4	cecs491a17	Aae3me	10748086	Abdul Rahim
 * @author Michael
 */
public class Database {
    private static Database instance = null;
    private boolean DBExists;
    private String sql, sql1;
    private Connection conn;
    private Statement stmt;
    private ResultSet rs;
    private ResultSetMetaData rsmd;
    private final String JDBC_DRIVER="org.apache.derby.jdbc.ClientDriver";
    private final String DB_URL="jdbc:derby://localhost:1527/TeamJaguar";
    
    
    private Database() throws ClassNotFoundException, SQLException, FileNotFoundException, IOException
    {
       // DBExists = false;
        getconnection(); 
    }
    public static Database getInstance() throws ClassNotFoundException, SQLException, IOException{
        if(instance == null){
            instance = new Database();
        }
        return instance;
    }
    
    
    public void getconnection() throws ClassNotFoundException, SQLException{
      
       // System.out.println(DB_URL);
        conn = null; //initialize the connection
        stmt = null;  //initialize the statement that we're using
        try 
        {
            //STEP 2: Register JDBC driver
           
            Class.forName(JDBC_DRIVER);  
            //STEP 3: Open a connection
            //System.out.println("Connecting to database...");
            conn = DriverManager.getConnection(DB_URL);
            //createTable();
        }
        catch (SQLException se) 
        {
            //Handle errors for JDBC
            se.printStackTrace();
        } 
        catch (Exception e) 
        {
            //Handle errors for Class.forName
            e.printStackTrace();
        } 
       /* finally 2
        {
            //finally block used to close resources
            try 
            {
                if (stmt != null) 
                {
                    stmt.close();
                }
            } 
            catch (SQLException se2) 
            {
            }// nothing we can do
            try 
            {
                if (conn != null) 
                {
                    conn.close();
                }
            } 
            catch (SQLException se) 
            {
                se.printStackTrace();
            }//end finally try
        }//end try*/
    }
    public void testconnect(){
        try{
            if(!conn.isClosed())
            {
                System.out.println("CONNECTION WORKS");
            }
        }
        catch(SQLException e)
        {
            System.out.println("NOT CONNECTED");
        } 
    }
    
    public void viewCaps(String username){
        try{
            stmt = conn.createStatement(); 
            rs = stmt.executeQuery("SELECT distinct timecapsule.cname from users \n" 
                                     + "natural join timecapsule where "
                                     + "timecapsule.ADMINISTRATOR = '"+username+"'\n");
             if(!rs.next()){
                System.out.println("You have no Timecapsules :(\n");
            }else{
                 System.out.println(username+"'s TimeCapsules:");
                do{
                   System.out.println(rs.getString(1));
                }while(rs.next());
                System.out.println();
            }
        }
        catch(SQLException ex) {
            //Logger.getLogger(DBConnection.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    public void changeCapsuleName(Users admin){
        Scanner in = new Scanner(System.in); 
        ArrayList<String> caps = new ArrayList<String>();
        ArrayList<Date> datett = new ArrayList<Date>();
        String administrator = admin.getUserName();
       
        try{
            stmt = conn.createStatement(); 
            rs = stmt.executeQuery("SELECT CNAME, DATECREATED FROM TIMECAPSULE where administrator = '"+administrator+"'");
            int i = 1; 
            System.out.println();
            while(rs.next()){
                String title = rs.getString(1);
                caps.add(title);
                Date dt = rs.getDate(2);
                datett.add(dt);
                System.out.println(i+") "+title);
                i++;      
            }
           
            DateFormat df = new SimpleDateFormat("yyyy-MM-dd");
            java.util.Date dateobj = new java.util.Date();
           
            int pick; 
            System.out.print("Which TimeCapsule's name do you want to change: ");
            pick = in.nextInt()-1; 
            in.nextLine();//consume new line left over 
            System.out.print("Type new name: ");
            String newName = in.nextLine();
            String createDate = df.format(datett.get(pick)).toString();
            stmt.executeUpdate("UPDATE TIMECAPSULE SET CNAME = '"+newName+"' WHERE CNAME = '"+caps.get(pick)+"' AND DATECREATED ='"+java.sql.Date.valueOf(createDate)+"' AND ADMINISTRATOR = '"+administrator+"'");
            
            //clean up environement
            stmt.close();
           // con.close();
            rs.close();
        } catch (SQLException ex) {
            //Logger.getLogger(DBConnection.class.getName()).log(Level.SEVERE, null, ex);
        }//end try catch
    }
    public boolean checkUsersnames(String username){
        boolean e = false;
        try{
            stmt = conn.createStatement(); 
            rs = stmt.executeQuery("SELECT username from users where username = '"+username+"'");
            System.out.println();
            while(rs.next()){
               e=true;
            }
        }catch(SQLException ex) {
            //Logger.getLogger(DBConnection.class.getName()).log(Level.SEVERE, null, ex);
        }//end try catch
        finally{   
            return e;
        }
    }
    public boolean checkPW(String username, String pw){
        boolean e = false;
        try{
            stmt = conn.createStatement(); 
            rs = stmt.executeQuery("SELECT username, password from users where username = '"+username+"'");
            
            while(rs.next()){
               if(rs.getString(2).equals(pw)){
                   
                   e =true;
                 
               }
            }
        }catch(SQLException ex) {
            //Logger.getLogger(DBConnection.class.getName()).log(Level.SEVERE, null, ex);
        }//end try catch
        finally{   
            return e;
        }
    }
    
    public void deleteCapsule(String admin){
        
        Scanner in = new Scanner(System.in); 
        ArrayList<String> caps = new ArrayList<String>();
        ArrayList<Date> datett = new ArrayList<Date>();
      
       
        try{
            stmt = conn.createStatement(); 
            rs = stmt.executeQuery("SELECT CNAME, DATECREATED FROM TIMECAPSULE where administrator = '"+admin+"'");
            int i = 1; 
            System.out.println();
            while(rs.next()){
                String title = rs.getString(1);
                caps.add(title);
                Date dt = rs.getDate(2);
                datett.add(dt);
                System.out.println(i+") "+title);
                i++;      
            }
           
            DateFormat df = new SimpleDateFormat("yyyy-MM-dd");
            java.util.Date dateobj = new java.util.Date();
           
            int pick; 
            System.out.print("Which capsule do you want to delete: ");
            pick = in.nextInt()-1; 
            String createDate = df.format(datett.get(pick)).toString();
             System.out.println(caps.get(pick));
            System.out.println(datett.get(pick));
            stmt.executeUpdate("DELETE FROM TIMECAPSULE WHERE CNAME = '"+caps.get(pick)+"' AND DATECREATED ='"+java.sql.Date.valueOf(createDate)+"' AND ADMINISTRATOR = '"+admin+"'");
            
            //clean up environement
            stmt.close();
           // con.close();
            rs.close();
        } catch (SQLException ex) {
            //Logger.getLogger(DBConnection.class.getName()).log(Level.SEVERE, null, ex);
        }//end try catch
    }
}
