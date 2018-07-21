
<?php
echo "<p>Welcome to login.php</p>";
		$conn = new mysql("mgajustice-db.cu92s72c9cow.us-east-1.rds.amazonaws.com","mga2j", "justice23", "lawyerdb");
		
		$email = $_GET[email];
		$pass = $_GET[password];
				
		<!-----$result = mysql_query("SELECT email, password FROM admin_login WHERE email = '" . $email . "' and password = '". $pass . "'");
		
		if($result === true){
			echo "<br><br><span>Welcome</span>";
		}else{
			echo"<span>Incorrrect username and/or password</span>";
		}---->
?>