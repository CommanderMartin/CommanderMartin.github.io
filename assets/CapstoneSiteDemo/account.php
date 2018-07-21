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
			
			<p class="lead">Account Details</p>
			
			<form>
				<!---- First name and Last name --->
				<div class="form-row">
					<div class="col">
					<label for="firstName">First Name</label>
					<input type="text" class="form-control" placeholder="First name">
					</div>
					
					<div class="col">
					<label for="firstName">Last Name</label>
					<input type="text" class="form-control" placeholder="Last name">
					</div>
				</div>
				
				<br>
				<!---- Email --->
				<div class="form-row">
					<div class="form-group col-md-6">
					
					<label for="inputEmail4">Email</label>
					<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
					
					</div>
				<!---- Password --->
					<div class="form-group col-md-6">
					
					<label for="inputPassword4">Password</label>
					<input type="password" class="form-control" id="inputPassword4" placeholder="Password">
					
					</div>
				</div>
				<!---- Address --->
				<div class="form-group">
				
				<label for="inputAddress">Address</label>
				<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
				
				</div>
				<!---- Address 2 --->
				<div class="form-group">
				
				<label for="inputAddress2">Address 2</label>
				<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
				
				</div>
				<!---- City--->
				<div class="form-row">
					<div class="form-group col-md-6">
					
					<label for="inputCity">City</label>
					<input type="text" class="form-control" id="inputCity">
					
					</div>
				<!---- State --->
					<div class="form-group col-md-4">
					
					<label for="inputState">State</label>
					<select id="inputState" class="form-control">
					<option selected>Choose...</option>
					<option>...</option>
					
					</select>
					</div>
				<!---- Zip code --->
					<div class="form-group col-md-2">
					
					<label for="inputZip">Zip</label>
					<input type="text" class="form-control" id="inputZip">
					
					</div>
				</div>
				<!---- Button --->
				<button type="submit" class="button button-block">Update</button>			
			</form>
		</div>
	</main>	
	
	<!-- Footer include -->
	<?php include("includes/footer.php"); ?>
	
</body>

</html>