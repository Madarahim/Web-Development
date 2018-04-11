/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package teamjaguar;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.sql.*;

/**
 *  server: cecs-db01.coe.csulb.educecs491a1im7Eir
 * cecs491at4	cecs491a14	rohX3i  7412039	        Christopher Vargas
   cecs491at4	cecs491a15	au9eiH	12577784	Giang Trong
   cecs491at4	cecs491a16	cu7koF	11600158	Michael Zatlin
   cecs491at4	cecs491a17	Aae3me	10748086	Abdul Rahim
 * @author Michael
 */
public class TimeCapsuleDB {
    private boolean DBExists;
    private String sql, sql1;
    private Connection conn;
    private Statement stmt;
    private ResultSet rs;
    private ResultSetMetaData rsmd;
    private final String JDBC_DRIVER="org.apache.derby.jdbc.ClientDriver";
    private final String DB_URL="jdbc:derby://localhost:1527/TeamJaguar";
    
    
public TimeCapsuleDB() throws ClassNotFoundException, SQLException, FileNotFoundException, IOException
    {
       // DBExists = false;s
        getconnection(); 
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
    public boolean dbExists(){
       
        return false;
    }
    public void createTable() throws SQLException{
                try
        {
            if(!dbExists())
            {
                System.out.println("CREATING TABLE user");
                stmt = conn.createStatement();
                sql = "CREATE TABLE user (username VARCHAR(40), password VARCHAR(40), firstname VARCHAR (40), lastname VARCHAR(40))";
                stmt.execute(sql);
                sql1 ="CREATE TABLE timecapsule (timecapsulename VARCHAR(40), visibility BOOLEAN, firstname VARCHAR (40), viewers VARCHAR(200))";
                stmt.execute(sql1);
                stmt.close();
            }
            else                
            {
                System.out.println("TABLE DOESN'T EXIST");
            }
        }
        catch(SQLException e)
        {
            System.out.println("TABLE ALREADY EXISTS");
            //e.printStackTrace();
        }
    }
    public void dropTable(String tablename){
        try
        {
            conn = DriverManager.getConnection(DB_URL);
            stmt = conn.createStatement();
            sql = "DROP TABLE " + tablename;
            stmt.executeUpdate(sql);

            if(!dbExists())
            {
                System.out.println("TABLE DOES NOT EXIST");
            }
            else
            {
                System.out.println("TABLE EXISTS");
            }
            stmt.close();
        }
        catch(SQLException e)
        {
            e.printStackTrace();
        }
    
    }
   /* public void insertUser(){
        try{
            PreparedStatement pstmt = conn.prepareStatement("INSERT INTO USERS "
                    + "VALUES(?, ?, ?, ?, ?)");
            Statement st = conn.createStatement();
            ResultSet rs = st.executeQuery(sql);
            int i = 1;
            while(rs.next()){
                groups.add(rs.getString(1));
                System.out.println(i+") "+rs.getString(1));
                i++;
            }//end while
            System.out.print("\nSelect author group: ");
            int choice = in.nextInt()-1;
            while(choice>groups.size()||choice<0){
               System.out.print("Invalid Choice, pick again: "); 
               choice = in.nextInt()-1;
            }//end while
            String wg = groups.get(choice);
            sql = "SELECT PUBLISHERNAME FROM PUBLISHER";
            rs = st.executeQuery(sql);
            i = 1;
            System.out.println();
            while(rs.next()){
                publishers.add(rs.getString(1));
                System.out.println(i+") "+rs.getString(1));
                i++;
            }//end while
            System.out.print("\nSelect Publihser: ");
            choice = in.nextInt()-1;
             while(choice>groups.size()||choice<0){
               System.out.print("Invalid Choice, pick again: "); 
               choice = in.nextInt()-1;
            }//end while
            String pub = publishers.get(choice);
            pstmt.setString(1, wg);
            pstmt.setString(2, title);
            pstmt.setString(3, pub);
            pstmt.setDate(4,java.sql.Date.valueOf(yr));
            pstmt.setInt(5, pages);
            pstmt.executeUpdate();
        
            //clean up environement
            pstmt.close();
            st.close();
            rs.close();
        } catch (SQLException ex) {
            
        }//end try catch 
    }
    }*/
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
    public void deleteCapsule(Users admin){
        
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
            System.out.print("Which capsule do you want to delete: ");
            pick = in.nextInt()-1; 
            String createDate = df.format(datett.get(pick)).toString();
             System.out.println(caps.get(pick));
            System.out.println(datett.get(pick));
            stmt.executeUpdate("DELETE FROM TIMECAPSULE WHERE CNAME = '"+caps.get(pick)+"' AND DATECREATED ='"+java.sql.Date.valueOf(createDate)+"' AND ADMINISTRATOR = '"+administrator+"'");
            
            //clean up environement
            stmt.close();
           // con.close();
            rs.close();
        } catch (SQLException ex) {
            //Logger.getLogger(DBConnection.class.getName()).log(Level.SEVERE, null, ex);
        }//end try catch
    }
}

