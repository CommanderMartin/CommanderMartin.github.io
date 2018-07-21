<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0 "); // Proxies.
session_start();
if (!isset($_SESSION['authenticated']))
{
    header("Location: index.php");
    exit;
}
else
{
   echo("You are logged in.");
}
?>

<?php

if($_SERVER['REQUEST_METHOD'] == "GET") {
	if (!isset($_SESSION['authenticated']))
	{
	    header("Location: index.php");
	    exit;
	}
}


if($_SERVER['REQUEST_METHOD'] == "POST"){header("Location: lawyer_portal_admin.php");}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Middle Georgia Justice</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!--[if lt EI 9]>
		<script src= "http://html5shim.googlecode.com/svn/trunk/html5.js">
		</script>
		<![endif]-->
	
		<link rel="icon" href="images/hammerFavicon.ico" type="image/gif">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
		<link rel="stylesheet" href="css/custom/adminStyle.css"/>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="js/app.js"></script>
	</head>	

					
<form method="post" id="myForm">
	<body>
		<header>
			<div class="header">
				<img src="images/Header.png" alt="Middle Georgia Justice" />
				<img src="images/newLogo.png" width="200" height="180" alt="Access To Justice Council, Inc." />
			</div>
		
			
			
		</header>

		
		<main role="main" class="container">
			<div>
				<h2>Admin</h2>
				<br />
				<input type="button" id="logoutBtn" name="logoutBtn" onclick="window.location.href='logout.php'" value="Logout"/>
				<br />
				<br />
				<h3>Middle Georgia Justice</h3>
			</div>

			
			<div class="jumbotron">
				<?php
					$conn= new mysqli("mgajustice-db.cu92s72c9cow.us-east-1.rds.amazonaws.com","mga2j","justice23", "mgajusticedb");
					
					$sql = "Select * from Ticket";
					$lawyer_sql = "SELECT * FROM Lawyers";
					$sent_sql = "SELECT * FROM sentTickets";
					$lawyer_data = mysqli_query($conn, $lawyer_sql);
					$result = mysqli_query($conn, $sql);
					$sent_data = mysqli_query($conn, $sent_sql);
					
					$ticket_radio = $_POST['ticket_radio'];
					$lawyer_radio= $_POST['lawyer_radio'];
					
					$deleteRow = $_POST['deleteRow'];
					$deleteLawyer = $_POST['deleteLawyer'];
					
					$ticket_radio = explode ("|",$ticket_radio);
					
					//Tickets table
					echo "<div class='tickets'>";
					if ($result) {
						echo "<h2>Tickets</h2><br><form method='post'><table name = 'Tickets' class = 'displayTable'>";                                
						
						echo "<tr><th></th>" . "<th> First Name </th> " .  "<th> Last Name </th>" .  "<th> Email </th>"  .  "<th> Description </th>" . "<th>Category</th></tr>";
		
						// output data of each row
						while($row = $result->fetch_assoc()) {			    	
							echo "<tr><td><input type='radio' id='ticket_radio' name='ticket_radio' value='" . $row["TicketID"] . "|" .htmlspecialchars($row["fName"], ENT_QUOTES). "|" .htmlspecialchars($row["lName"], ENT_QUOTES). "|" .htmlspecialchars($row["eMail"], ENT_QUOTES). "|" .$row["phone"]. "|" .htmlspecialchars($row["description"], ENT_QUOTES). "'></td><td>" .$row["fName"]. "</td>" . "<td>" .$row["lName"]. "</td>" . "<td>" . $row["eMail"] . "</td>" . "<td>" .$row["description"]. "</td>" . "<td>" . $row["ticketCat"] . "</td>". "<td><button type='submit' id='deleteRow' name = 'deleteRow' value='" .$row["TicketID"]. "'>Delete</button></td></tr>";		       			        			        
						}
						
						echo "</table></form>";
		
					} else {
						echo "0 results";
					}
					
				
			
					echo "</div>";
				
					
					//Laywers table
					echo "<div class='lawyers'>";
					if ($lawyer_data) {
						echo "<h2>Lawyers</h2><br><table class = 'displayTable'>";                                
						
						echo "<tr><th></th>" . "<th> First Name </th> " .  "<th> Last Name </th>" .  "<th> Email </th>"  .  "<th> Phone Number </th>" . "<th>Category</th></tr>";
		
						// output data of each row
						while($row = $lawyer_data->fetch_assoc()) {			    	
							echo "<tr><td><input type='radio' name='lawyer_radio' id='lawyer_radio' value='" . $row["lawyerEMail"] . "'></td><td>" . $row["lawyerFName"] . "</td>" . "<td>" .$row["lawyerLName"]. "</td>" . "<td>" . $row["lawyerEMail"]. "</td>" . "<td>" .$row["lawyerPhoneNum"]. "</td>" . "<td>" . $row["lawyerCat"] . "</td><td><button type='submit' id='deleteLawyer' name = 'deleteLawyer' value='" .$row["LawyerID"]. "'>Delete</button></td></tr>";
						}
						
						 echo "</table>";
		
					} else {
						echo "0 results";
					}
						
					echo "</div>";
					
					
					
					
					 
					//Sent Tickets table
					echo "<input type='button' id='sentTicketButton' onclick='hideArchive()' value='Show Archived Tickets' class='hideButton'></input>";
					echo "<div class='sentTickets' id='sentTickets' style='display: none;'>";
					if ($sent_data) {
						echo "<h2>Sent Tickets</h2><br><form method='post'><table class = 'displayTable'>";                                
						
						echo "<tr>" . "<th style='width10%;'> First Name </th> " .  "<th> Last Name </th>" .  "<th> Email </th>"  .  "<th> Description </th></tr>";
		
						// output data of each row
						while($row = $sent_data->fetch_assoc()) {			    	
							echo "<tr><td>" .$row["fName"]. "</td>" . "<td>" .$row["lName"]. "</td>" . "<td>" . 		$row["eMail"]. "</td>" . "<td>" .$row["description"]. "</td></tr>";			       			        			        
						}
						
						echo "</table></form>";
		
					} else {
						echo "0 results";
					}
					
					echo "</div>";
					
	
					
					//EMAIL TICKET TO LAWYER
					if (isset($_POST["submit_button"])) {
					
						
						//ticket_radio[0] = TicketID, 
						//ticket_radio[1] = fName, 
						//ticket_radio[2] = lName,
						//ticket_radio[3] = eMail,
						//ticket_radio[4] = phone number,
						//ticket_radio[5] = description
						//we can add more values if someone wants like categories or phone number so we can put them in the eMail - Brad
						
						$to = "$lawyer_radio";
						$subject = "Middle Georgia Justice: $ticket_radio[1] $ticket_radio[2]";
						$body = "
							<html>
								<head>
									<title>Middle Georgia Justice</title>
								</head>
								<body>
									<h1>Middle Georgia Justice</h1>
									<p><b>Name:</b> $ticket_radio[1] $ticket_radio[2] <br>
									<b>eMail:</b> $ticket_radio[3] <br>
									<b>Phone Number:</b> $ticket_radio[4] <br>
									<b>Problem:</b> $ticket_radio[5]</p>
								</body>
							</html>";
							
						$headers = "From: web@cap2.triumpdesigns.org" . "\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					
						mail($to,$subject,$body,$headers);
			
						}
					
					
					//SEND TICKET to sentTickets
					if(isset($_POST['submit_button'])){ 
						
						//SEND TICKET
						$stmt = $conn->prepare("INSERT INTO sentTickets (fName,lName,eMail,description) SELECT fName,lName,eMail,description FROM Ticket WHERE TicketID = ?");
						$stmt->bind_param('s', $ticket_radio[0]);
							
						$stmt->execute();
						$stmt->close();
						
						
						//DELETE TICKET
						$stmt = $conn->prepare("DELETE from Ticket WHERE TicketID = ?");
						$stmt->bind_param('s', $ticket_radio[0]);
						
						$stmt->execute();
						$stmt->close();		

							
					 }
					 
					 //DELETES THE ROW OF THE TICKET TABLE
					 if(isset($_POST['deleteRow'])){
						$stmt = $conn->prepare("DELETE from Ticket WHERE TicketID = '$deleteRow'");
						
						$stmt->execute();
						$stmt->close();
						}
						
					if(isset($_POST['deleteLawyer'])){
						$stmt = $conn->prepare("DELETE from Lawyers WHERE LawyerID = '$deleteLawyer'");
						
						$stmt->execute();
						$stmt->close();
						}
					 
					 $conn->close();
				?>		
       			
					<br><br>

					<input  id="submit_button" name="submit_button" type="submit">

			<hr />	
			<p class="lead">
			<h3>Add A New Lawyer To The Site</h3>
			<form name="contactform" method="post" action="insertLawyer.php">
				
				<!-- Client name ------------------------------------------------------------------------- -->					
				<div class = "fiftypercentofwidth">
				
				<!--- First Name ------------->
				<div class="form-group">
					<div class="col">
						<label for="lawyerFName">First Name</label>
							<input type="text" class="form-control" placeholder="First Name" name="lawyerFName" required>
					</div>
				</div>
				
				<!--Last Name -------------->
				<div class="form-group">
					<div class="col">
						<label for="lawyerLName">Last Name</label>
							<input type="text" class="form-control" placeholder="Last Name" name="lawyerLName" required>
					</div>
				</div>
						
				<!-- Email -->
				<div class="form-group">
					<div class="col">
						<label for="lawyerEMail">Email</label>
							<input type="text" class="form-control" placeholder="Email" name="lawyerEMail" required>
					</div>
				</div>
				<br>
						
						
				<!-- Lawyer Phone Number -->
				<div class="form-group">
					<div class="col">
						<label for="lawyerPhoneNum">Phone Number</label>
							<input type="text" class="form-control" placeholder="Phone number" name="lawyerPhoneNum" required>
					</div>
				</div>
				<br><br>
						
				<!--Client Question Topic----------------------------------------------------------------------->
				<h5>Select Area of Expertise</h5>
				<div class="form-group ">
					<select id="qCategory" name="lawyerCat" required>
						<option selected></option>
						<option value="Family Law">Family Law</option>
						<option value="Housing Issues">Housing Issues</option>
						<option value="Landlord/Tennant">Landlord/Tennant</option>
						<option value="Social Security & Other Benefits">Social Security & Other Benefits</option>
						<option value="Consumer Law">Consumer Law</option>
						<option value="Education Law">Education Law</option>
						<option value="Elder Law">Elder Law</option>
						<option value="Immigration">Immigration</option>
						<option value="Veterans">Veterans</option>
						<option value="Post-conviction Issues">Post-Conviction Issues</option>
						<option value="Driver&#39s License/Id Issues">Driver&#39s License/ ID Issues</option>
						<option value="Criminal Law">Criminal Law</option>
						<option value="Probate Matters">Probate Matters</option>
						<option value="Estate Planning">Estate Planning</option>
						<option value="Small Business Development">Small Business Development</option>
					</select>
				<br><br>
											
				
				</div>
				
				<div>
					<input type="submit" id="lawyerSubmit" name="lawyerSubmit" value="Create New Lawyer">
				</div>
			</form>	
			</div> <br>
		</main>
		
		<footer>
			&emsp;
		</footer>
		<script>
			function hideArchive() {
			var x = document.getElementById("sentTickets");
			if (x.style.display === "none") {
		        	x.style.display = "block";}
		        else {
		        	x.style.display = "none";}
		        	
		        	var elem = document.getElementById("sentTicketButton");
		    if (elem.value=="Hide Archived Tickets") {elem.value = "Show Archived Tickets";}
		    else {elem.value = "Hide Archived Tickets";}
		}
		


</script>
		
	</body>
	</form>
</html>