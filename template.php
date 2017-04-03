<?php
	$current_page = basename($_SERVER['PHP_SELF']);

	session_start();
	
	require_once('functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>SurPH's Up!</title>

	<!-- FONT AWESOME & GOOGLE FONTS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Kalam|Michroma|Work+Sans" rel="stylesheet">
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<!-- PERSONAL STYLE -->
	<link rel="stylesheet" type="text/css" href="surphstyle.css">
</head>
<body>

	<!-- NAVIGATION BAR -->
	<nav class="navbar navbar-default nav-justified">
		<div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-list">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>                        
		    </button>
		    <div class="navbar-brand" id="mylogo">
				<a href="index.php">SurPH's Up!</a>
			</div>
		</div>
		<div class="collapse navbar-collapse" id="nav-list">
			<ul class="nav navbar-nav navbar-right">

			<!-- INDEX NAVIGATION -->
			<?php
				if($current_page == 'index.php') {
			?>

				<!-- <li><a href="#">Luzon</a></li>
				<li><a href="#">Visayas</a></li>
				<li><a href="#">Mindanao</a></li> -->

				<!-- USERNAME AND LOGOUT BUTTONS -->		
				<?php 
					if(isset($_SESSION['username'])) {
						echo "<li><a href='#'>".$_SESSION['username']."</a></li>
							<li><a href='log_out.php'>Logout</a></li>"; 
					} else {
						echo "<li><a href='landing_page.php'>Done Peeping</a></li>";
					} 
				?>
			</ul>

			<!-- LANDING PAGE NAVIGATION -->
			<?php
				} else {
			?>

				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>

			<?php
				}
			?>
		</div>
	</nav>

<!-- IF ELSE FOR NAVIGATING AROUND PAGES -->
<?php 
	if ($current_page == 'landing_page.php') {
?>

	<div class="intro" id="landing-page">
		<h1>SurPH's Up!</h1>
		<h4>An interactive directory for surfers <br> and aficionados on the best places <br> to surf, stay, and pig out <br> in the Philippines.</h4>
		<h4>Website created by Regine Blanco.</h4>	

		<div class="button">
			<a href="sign_up.php"><button class="btn btn-default">Sign Up</button></a>
			<a href="log_in.php"><button class="btn btn-default">Log In</button>
			<a href="index.php"><button class="btn btn-default">Just Peep</button></a>
		</div>
	</div>

<?php 
	} else if ($current_page == 'sign_up.php') {
?>

	<div class="signup" id="sign-up">
		<h1>SurPH's Up!</h1>
		<form method="POST">
			<input type="text" class="form-control" name='full_name' placeholder='Full Name'><br>
			<input type="email" class="form-control" name='email' placeholder='Email Add'><br>
			<input type="text" class="form-control" name='username' placeholder='Username'><br>
			<input type="password" class="form-control" name='password' placeholder='Password'><br>
			<input type="password" class="form-control" name='confirmpw' placeholder='Confirm Password'><br>

			<div class="button">
				<button type="submit" name="signup" class="btn btn-default">Create Account</button>
				<a href="landing_page.php"><button type="button" class="btn btn-default">Cancel</button></a>
			</div>
		</form>
	</div>

<?php 
	} else if ($current_page == 'log_in.php') {
?>
	<div class="signup-alert">
		<?php signUpAlert(); ?> 
	</div>

	<div class="login" id="log-in">
		<h1>SurPH's Up!</h1>
		<form method="POST">
			<input type="text" class="form-control" name='username' placeholder='Username'><br>
			<input type="password" class="form-control" name='password' placeholder='Password'><br>

			<div class="button">
				<button type="submit" name="login" class="btn btn-default">Log In</button>
				<a href="landing_page.php"><button type="button" class="btn btn-default">Back</button></a>
			</div>
		</form>
		
	</div>

<?php 
	} else if ($current_page == 'about.php') {
?>

	<div class="about-surphs" id="about-surphs">
		<h1>SurPH's Up!</h1>
		<h4>"Surf's Up" is a surfing term from the 60's <br> that means that the swell has picked up <br> and the waves are going to be powerful.</h4>
		<h4>"PH" at the end means, obviously, Philippines.</h4>
		<h4>SurPH's Up is a single page app <br>thought of and created by Regine Blanco, <br>student of Tuitt Coding Bootcamp, <br>
			out of her instense frustration to become <br> an awesome surfer.</h4>
		<h4>A little bit inspired by Magicseaweed.com, <br> Booky, and Google Maps combined.</h4>

		<div class="button">
			<a href="landing_page.php"><button class="btn btn-default">Back</button></a>
		</div>
	</div>

<?php 
	} else if ($current_page == 'contact.php') {
?>

	<div class="contact" id="contact">
		<h1>SurPH's Up</h1>
		<div class='contact-details'>
			<h4><span>Digits</span> 09xx-xxx-xxxx</h4>
			<h4><span>Email</span> regineannblanco@YAHOO.com</h4>
			<h4><span>Address</span> Tuitt Coding Bootcamp<br>
			Centro Plaza Building <br> Sct. Madriñan cor. Sct. Torillo<br>
			Brgy. South Triangle, Quezon City</h4>
			<h4><span>Social Media</span></h4>
			<a href="https://www.facebook.com/regine.blanco.39" target="_blank">
				<i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
			</a>
				
			<a href="https://www.instagram.com/regineblanco/" target="_blank">
				<i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
			</a>

			<a href="https://twitter.com/regineblanco" target="_blank">
				<i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
			</a>
			<a href="https://www.linkedin.com/profile/preview?locale=en_US&trk=prof-0-sb-preview-primary-button" target="_blank">
				<i class="fa fa-linkedin fa-2x" aria-hidden="true"></i>
			</a>

			<a href="https://github.com/regineblanco" target="_blank">
				<i class="fa fa-github fa-2x" aria-hidden="true"></i>
			</a>

			<a href="https://slack.com/signin" target="_blank">
				<i class="fa fa-slack fa-2x" aria-hidden="true"></i>
			</a>
		
			<a href="https://www.freecodecamp.com/">
				<i class="fa fa-free-code-camp fa-2x" aria-hidden="true"></i>
			</a>
		</div><br>

		<div class="button">
			<a href="landing_page.php"><button class="btn btn-default">Back</button></a>
		</div>
	</div>

<?php
	} else { 
?>

	<!-- MAIN PAGE -->
	<div class="container">
		<div class="row">
			<!-- LEFT -->
			<div class="col-xs-12 col-sm-6 box">
				<?php display_content(); ?>
			</div>
			
			<!-- RIGHT -->
			<div class="col-xs-12 col-sm-6" id="map">
			</div>
		</div> <!-- close row -->
	</div> <!-- close container -->

<?php 
	}
?>
	
  <script>
    function initMap() {
        var ph = {lat: 12.890345, lng: 122.437161};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: ph
        });

        // LA UNION
	    var launion = {lat: 16.599274, lng: 120.335143};
	    var la = new google.maps.Marker({
	      position: launion,
	      map: map,
	      title: 'La Union'
	    });

	    la.addListener('click', function() {
          map.setZoom(7);
          map.setCenter(la.getPosition());
          $.post("spots_api.php",
              {
                  name: "La Union",
              },
              function(data, status){
                  $(".box").html(data);
              });
        });

	    // BALER
	    var baler = {lat: 15.759554, lng: 121.556153};
	    var ba = new google.maps.Marker({
	      position: baler,
	      map: map,
	      title: 'Baler'
	    });

	    ba.addListener('click', function() {
          map.setZoom(7);
          map.setCenter(ba.getPosition());
          $.post("spots_api.php",
              {
                  name: "Baler",
              },
              function(data, status){
                  $(".box").html(data);
              });
        });

	    // ZAMBALES
	    var zambales = {lat: 15.035688, lng: 120.076272};
	    var za = new google.maps.Marker({
	      position: zambales,
	      map: map,
	      title: 'Zambales'
	    });

	    za.addListener('click', function() {
          map.setZoom(7);
          map.setCenter(za.getPosition());
          $.post("spots_api.php",
              {
                  name: "Zambales",
              },
              function(data, status){
                  $(".box").html(data);
              });
        });

	    // SIARGAO
	    var siargao = {lat: 9.849555, lng: 126.034227};
	    var si = new google.maps.Marker({
	      position: siargao,
	      map: map,
	      title: 'Siargao'
	    });

  		si.addListener('click', function() {
          map.setZoom(7);
          map.setCenter(si.getPosition());
          $.post("spots_api.php",
              {
                  name: "Siargao",
              },
              function(data, status){
                  $(".box").html(data);
              });
        });

	    // EL NIDO
	    var elnido = {lat: 11.318946, lng: 119.426665};
	    var el = new google.maps.Marker({
	      position: elnido,
	      map: map,
	      title: 'El Nido'
	    });

        el.addListener('click', function() {
          map.setZoom(7);
          map.setCenter(el.getPosition());
          $.post("spots_api.php",
              {
                  name: "El Nido",
              },
              function(data, status){
                  $(".box").html(data);
              });
        });
  	}
	  
	function editSpot(id) {
		$("#view-spot"+id).hide();
		$("#edit-spot"+id).show();
	}

	function backSpot(id) {
		id = id.substring(4);
		$("#edit-spot"+id).hide();
		$("#view-spot"+id).show();
	}

	function editLodging(id) {
		$("#view-lodging"+id).hide();
		$("#edit-lodging"+id).show();
	}

	function backLodging(id) {
		id = id.substring(4);
		$("#edit-lodging"+id).hide();
		$("#view-lodging"+id).show();
	}

	function editFood(id) {
		$("#view-food"+id).hide();
		$("#edit-food"+id).show();
	}
	
	function backFood(id) {
		id = id.substring(4);
		$("#edit-food"+id).hide();
		$("#view-food"+id).show();
	}

  </script>

  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIlmLWyplxtASXpJUIVXxXxQCxHvkH1vo&callback=initMap">
  </script>

</body>
</html>