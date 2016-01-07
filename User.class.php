<?php 

class User{
	
	private $connection;
	
	function __construct($mysqli){
		$this->connection=$mysqli;
	}
		

	function logInUser($email, $hash){
        
        // GLOBALS saab kätte kõik muutujad mis kasutusel
       
        
        $stmt = $this->connection->prepare("SELECT id, email FROM user_sample WHERE email=? AND password=?");
        $stmt->bind_param("ss", $email, $hash);
        $stmt->bind_result($id_from_db, $email_from_db);
        $stmt->execute();
        if($stmt->fetch()){
            echo "Kasutaja logis sisse id=".$id_from_db;
            
            //session, salvestatakse serveris
            $_SESSION['logged_in_user_id'] =  $id_from_db;
            $_SESSION['logged_in_user_email'] =  $email_from_db;
            
            //suuname kasutaja teisele lehele
            header("Location: data.php");
            
        }else{
            echo "Wrong credentials!";
        }
        $stmt->close();
        
        
        
    }
    
    
    function createUser($create_email, $hash){
        
        
        $stmt = $this->connection->prepare("INSERT INTO user_sample (email, password) VALUES (?,?)");
        $stmt->bind_param("ss", $create_email, $hash);
        $stmt->execute();
        $stmt->close();
          
    }
}
?>