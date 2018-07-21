<?php


	$conn= new mysqli("mgajustice-db.cu92s72c9cow.us-east-1.rds.amazonaws.com","mga2j","justice23", "mgajusticedb");
	
	$fName = mysqli_real_escape_string($conn,$_POST['fName']);
	$lName = mysqli_real_escape_string($conn,$_POST['lName']);
	$eMail = mysqli_real_escape_string($conn,$_POST['eMail']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$phone = mysqli_real_escape_string($conn,$_POST['phoneNumber']);
	$categories = mysqli_real_escape_string($conn, $_POST['ticketCat']);
	
	if($eMail == null){
		header ("Location: index.php");
		exit;
	}
	
	
	if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO Ticket (fName, lName, eMail, phone, description, ticketCat ) values ('$fName','$lName','$eMail', '$phone', '$description', '$categories');";

	if($conn->query($sql)=== TRUE){
	}
	else{
	echo "Data Insertion Failed: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Capstone Website | Title Undetermined</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt EI 9]>
	<script src= "http://html5shim.googlecode.com/svn/trunk/html5.js">
	</script>
	<![endif]-->
	
	<link rel="icon" href="images/hammerFavicon.ico" type="image/gif">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href = "css/custom/siteStyle.css">
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

	<!-- Header include -->
	<?php include("includes/header.php"); ?>
	
	<!-- Navigation include -->
	<?php include("includes/navigation.php"); ?>

	<!-- Main Content section -->
	<main role="main" class="container">
		
		<div class="jumbotron">
			<p>Thank you for your question! A lawyer will be in contact with you through one of your two listed forms of contact as soon as possible.</p>
			<br>
			<a href="index.php"> Return Home </a>
		</div>	
		
	</main>	
	
	<!-- Footer include -->
	<?php include("includes/footer.php"); ?>
	
</body>

</html>
