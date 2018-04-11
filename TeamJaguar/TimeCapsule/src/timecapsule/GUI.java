/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package timecapsule;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.IOException;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.BoxLayout;
import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;

public class GUI {
    //Chris
    //public GUI(){
      //  LoginPage start = new LoginPage();
    //}
    public boolean lgin = false;
    
    static class LoginPage extends JFrame {
        JButton login = new JButton("Login");
        JButton signUp = new JButton("Sign Up");
        JPanel panel = new JPanel();
        boolean lgin = false;
        String username;
        String pw;
        JTextField txtuser = new JTextField(15);
        JPasswordField pass = new JPasswordField(15);
        Database db;
        
        public LoginPage(){
            super("Welcome");
            try {
                this.db = Database.getInstance();
            } catch (ClassNotFoundException | SQLException | IOException ex) {
                Logger.getLogger(GUI.class.getName()).log(Level.SEVERE, null, ex);
            }
            //these sizes are for my high res screen
            setSize(600,400);
            setLocation(500,280);
            panel.setLayout(null);

            txtuser.setBounds(70,30,150,20);
            pass.setBounds(70,65,150,20);
            login.setBounds(110, 110, 80, 20);
            signUp.setBounds(110, 135, 80, 20);
            
            login.addActionListener(new ActionListener(){
                public void actionPerformed(ActionEvent e) {
                     username = txtuser.getText();
                     pw = pass.getText();
                    //here we can have a boolean to check if us and pw in DB
                    if(db.checkPW(username, pw)){
                      System.out.println("2343 "+db.checkPW(username, pw));
                      lgin = true;
                      System.out.println("lgin = " + lgin);
                      //dispose();  //Remove JFrame 1
     
                    } else {
                        JOptionPane.showMessageDialog(null, "Wrong UserName/Password");
                        txtuser.setText("");
                        pass.setText("");
                        txtuser.requestFocus();
                    }
                    setVisible(true);
                    
                          setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
                }       
            });
            /*signUp.addActionListener(new ActionListener(){
                public void actionPerformed(ActionEvent e) {
                    SignUpFrame sg = new SignUpFrame();
                }       
            });*/
            panel.add(txtuser);
            panel.add(pass);
            panel.add(login);
            //panel.add(signUp);

            getContentPane().add(panel);
            setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
            setVisible(true);
        }
        public boolean getLogIn(){
            if(lgin == true){
                System.out.print("Loggien iddndnd");
                dispose();
            }
            return lgin;
        }
        public String getUsername(){
            return username;
        }
        public String getPW(){
            return pw;
        }
    }
        
    static class MainInterface extends JFrame{
        JPanel panel = new JPanel();
        public MainInterface(){  
            super("Welcome");
            setSize(300, 200);
            setLocation(500, 280);
            panel.setLayout(null);
            JLabel welcome = new JLabel("Welcome to Jaguar Capsules");
            welcome.setBounds(70,50,150,60);
            panel.add(welcome);
            getContentPane().add(panel);
            setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
            setVisible(true);
        }
    }
    
    static class SignUpFrame extends JFrame {
        JButton done = new JButton("Sign Up");
        JLabel label1 = new JLabel("First Name");
        JLabel label2= new JLabel("Last Name");

        JLabel label4 = new JLabel("Username");
        JLabel label5= new JLabel("Password");
        JLabel label6 = new JLabel ("Verify Password");
        JTextField txtf1 = new JTextField(15);
        JTextField txtf2 = new JTextField(15);
        boolean check = false;
        
        String fname;
        String lname;
        String username; 
        static String password;
        Database db;
        JTextField txtf4 = new JTextField(15);
        JPasswordField pwf1 = new JPasswordField(15);
        JPasswordField pwf2 = new JPasswordField(15);
        
        JPanel mainPanel = new JPanel(); 
        JPanel panel = new JPanel();
        JPanel panel2 = new JPanel(); 
        
        public SignUpFrame(Users u){
            try {
                db = Database.getInstance();
            } catch (ClassNotFoundException | SQLException | IOException ex) {
                Logger.getLogger(GUI.class.getName()).log(Level.SEVERE, null, ex);
            }
            setSize(600,400);
            setLocation(500,280);
            mainPanel.setLayout(new BoxLayout(mainPanel, BoxLayout.Y_AXIS));
            GroupLayout layout = new GroupLayout(panel);
            panel.setLayout(layout);
            layout.setAutoCreateGaps(true);
            layout.setAutoCreateContainerGaps(true);
            GroupLayout.SequentialGroup hGroup = layout.createSequentialGroup();
            
            hGroup.addGroup(layout.createParallelGroup().addComponent(label1).addComponent(label2).
                    addComponent(label4).addComponent(label5).addComponent(label6));       
            hGroup.addGroup(layout.createParallelGroup().addComponent(txtf1).addComponent(txtf2).
                    addComponent(txtf4).addComponent(pwf1).addComponent(pwf2));
            
            layout.setHorizontalGroup(hGroup);
           
            GroupLayout.SequentialGroup vGroup = layout.createSequentialGroup();
            vGroup.addGroup(layout.createParallelGroup(Alignment.BASELINE).addComponent(label1).addComponent(txtf1));
            vGroup.addGroup(layout.createParallelGroup(Alignment.BASELINE).addComponent(label2).addComponent(txtf2));
            vGroup.addGroup(layout.createParallelGroup(Alignment.BASELINE).addComponent(label4).addComponent(txtf4));
            vGroup.addGroup(layout.createParallelGroup(Alignment.BASELINE).addComponent(label5).addComponent(pwf1));
            vGroup.addGroup(layout.createParallelGroup(Alignment.BASELINE).addComponent(label6).addComponent(pwf2));
          //  vGroup.addGroup(layout.createParallelGroup(Alignment.BASELINE).addComponent(done));
            layout.setVerticalGroup(vGroup);
          //  layout.add(done);
           // panel.add(done);p
            panel2.add(done);
            mainPanel.add(panel);
            mainPanel.add(panel2);
            this.add(mainPanel);
           
            done.addActionListener(new ActionListener(){
                public void actionPerformed(ActionEvent e) {
                    fname = txtf1.getText();
                    lname = txtf2.getText();
                    username = txtf4.getText(); 
                    password = pwf1.getText(); 
                    //passwords don't match
                    if(!password.equals(pwf2.getText())){
                        JOptionPane.showMessageDialog(null, "Passwords do not match"); 
                        pwf1.setText("");
                        pwf2.setText("");
                        password = "";
                        txtf1.requestFocus();
                      
                    }//this methods will check if username is already in db 
                    else if(db.checkUsersnames(username)) {
                        JOptionPane.showMessageDialog(null, "Username already exit!");
                        txtf4.setText(""); 
                        pwf1.setText("");
                        pwf2.setText("");
                        txtf1.requestFocus();
                    } 
                    else if(username ==""||password==""||fname==""||lname==""){
                        JOptionPane.showMessageDialog(null, "Missing Required Information");
                        
                        pwf1.setText("");
                        pwf2.setText("");
                        txtf1.requestFocus();
                    }
                    //make new user object 
                    else{
                        
                    }          
                }       
            });
            u = new Users(fname, lname, username, password);
            setVisible(true);
            setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
          
        }
        public String getFname(){
            return fname;
        }
        public String getLname(){
            return fname;
        }
        public String getUsername(){
            return fname;
        }
        public String getPW(){
            return fname;
        }
        public boolean getCheck(){
            return check;
        }
    }
}
