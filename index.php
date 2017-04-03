<?php 

	function display_content() {
		include('connection.php');
		mysqli_set_charset($conn,"UTF8");

		$sql = "SELECT * FROM 
			spots s LEFT JOIN nearby_spots n ON s.s_id = n.spot_id
				LEFT JOIN lodgings l ON l.spot_id = s.s_id
				LEFT JOIN food_finds f ON f.spot_id = s.s_id
				LEFT JOIN galleries g ON g.spot_id = n.n_id";
		$result = mysqli_query($conn,$sql);

		while($row = mysqli_fetch_assoc($result)) {
			// $name = $row['name'];
			// $about = $row['about'];
			// $gallery = $row['img_url'];
			// $nearby_spots = $row['n_name'];
			// $lodgings = $row['l_name'];
			// $food_finds = $row['f_name'];

			// echo "	<div class='gallery'>
			// 			<img src='$gallery'>
			// 		</div>";

			// echo "	<div class='details'>
			// 			<h3>$name</h3>
			// 			<span class='about'>$about</span>
			// 			<h5>Nearby Spots</h5>
			// 			<span class='nearby'>$nearby_spots</span>
			// 			<h5>Lodgings</h5>
			// 			<span class='lodgings'>$lodgings</span>
			// 			<h5>Food Finds</h5>
			// 			<span class='food'>$food_finds</span>
			// 		</div>";

			// echo "	<a href='edit.php?id=$id'><button class='btn btn-default'>Edit</button></a>
			// 		<a href='delete.php?id=$id'><button class='btn btn-default'>Delete</button></a>";

			// echo "	<div style='clear:both'></div>";
		}
		echo "	<h2>Welcome to SurPH's Up!</h2>
				<h4>Click on the coordinates to check out some awesome surf spots around the Philippines.</h4>
				<h4>Once you click 'em, you'll see a bunch of lists of where you can surf, stay, or eat out.</h4>
				<h4>Click on any of those to view the details.</h4>";
	}

require_once('template.php');

?>