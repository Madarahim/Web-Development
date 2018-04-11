/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teamjaguar;

/**
 *
 * @author ctoph
 */
public class TimeCapsule {
    private String mName;
    private String mContent; 
    private String administrator;
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
    
    
        public TimeCapsule(String name, Users admin, String openDate)
        {
            mName = name;
            administrator = admin.getUserName();
            DateFormat df = new SimpleDateFormat("yyyy-MM-dd");
            Date dateobj = new Date();
            
            String createDate = df.format(dateobj).toString();
           
            
            try
            {
                Class.forName(JDBC_DRIVER);  
                Connection con=DriverManager.getConnection(DB_URL);  
                //here sonoo is database name, root is username and password 

                Statement stmt=con.createStatement();  
                stmt.executeUpdate("INSERT INTO TIMECAPSULE values ('"+mName+"', '"+java.sql.Date.valueOf(createDate)+"', '"+administrator+"', '"+java.sql.Date.valueOf(openDate)+"')");

                con.close();  
            }
            catch(Exception e){ System.out.println(e);}  

        }
	public String getmName() {
		return mName;
	}
	public void setmName(String mName) {
		this.mName = mName;//sos
	}
	public String getmContent() {
		return mContent;
	}
	public void setmContent(String mContent) {
		this.mContent = mContent;
	}
}
