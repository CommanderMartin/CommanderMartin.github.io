<style>
@media only screen and (min-width: 900px){
	.dropbtn{
		display: none;
	}
}
@media only screen and (max-width: 900px){
	button{
		border-radius: .5em;
	}
	
	.dropbtn {
	    background-color: #3498DB;
	    color: white;
	    padding: 15px 30px;
	    font-size: 16px;
	    border: none;
	    cursor: pointer;
	}
	
	.dropbtn:hover, .dropbtn:focus {
	    background-color: #2980B9;
	}
	
	.dropdown {
	    position: relative;
	    display: inline-block;
	    margin: 0 auto;
	}
	
	.dropdown-content {
	    display: none;
	    background-color: #f1f1f1;
	    min-width: 160px;
	    overflow: auto;
	    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	    z-index: 1;
	}
	
	.dropdown-content a {
	    color: black;
	    padding: 12px 16px;
	    text-decoration: none;
	    display: block;
	}
	
	.dropdown a:hover {background-color: #ddd}
	
	.show {display:block;}
}


</style>

<div class = "outerNavbar">
	<nav class = "navbar">
		<div class="dropdown">
			<button onclick="myFunction()" class="dropbtn">Menu</button>
			<div id="myDropdown" class="dropdown-content">
				<a class = "navbarA" href="index.php">Home</a>
					
				<a class = "navbarA" href="donate.php">Donations</a>
					
				<a class = "navbarA" href="events.php">Events</a>
					
				<a class = "navbarA" href="lawyer_incubator.php">Incubator Program</a>
					
				<a class = "navbarA" href="aboutus.php">About Us</a>
			</div>
		</div>
	</nav>
</div>

<script>
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>