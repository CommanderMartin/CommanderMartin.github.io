<?php
$dbServerName = "mgajustice-db.cu92s72c9cow.us-east-1.rds.amazonaws.com";
$dbUsername = "mga2j";
$dbPassword = "justice23";
$dbName = "mgajusticedb";

// create connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

// check connection
if ($conn->connect_error) {
   die("Connection Failed: " . $conn->mysqli_connect_error());
}

//Statement collects database information and stores it in variables
//Statement below also probably not a good idea
$ticketSql = "Select * from Ticket";
$ticketResult = mysqli_query($conn, $ticketSql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$fName = $row['fName'];
		$lName = $row['lName'];
		$eMail = $row['eMail'];
		$description = $row['description'];
		
		echo "Name: " . $row['fName'] . " " .$row['lName'];
	}
}else{
	echo "No results";
}




///Use below statement to test connectivity


$sql = "Select * from Admin";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Email: " . $row["Email"]. " - Password: " . $row["Password"] . "<br>";
    }
} else {
    echo "0 results";
}





?>
