<?php 

	function display_content() {
		include('connection.php');
		mysqli_set_charset($conn,"UTF8");

		$sql = "SELECT * FROM spots s LEFT JOIN lodgings l ON s.lodging_id = l.id LEFT JOIN food_finds f ON s.food_find_id = f.id LEFT JOIN galleries g ON s.gallery_id = g.id";
		$result = mysqli_query($conn,$sql);

		while($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			$name = $row['name'];
			$about = $row['about'];
			$gallery = $row['img_url'];
			$nearby_spots = $row['nearby_spots'];
			$lodgings = $row['l_name'];
			$food_finds = $row['f_name'];

			echo "<div class='item_image'><img src='$gallery'></div>";

			echo "<h3>$name</h3> <h5>$about</h5> $nearby_spots <br> $lodgings <br> $food_finds";

			echo "<br><a href='edit.php?id=$id'><button>Edit</button></a>
				<a href='delete.php?id=$id'><button>Delete</button></a>";

			echo "<div style='clear:both'></div>";
		}

	}

require_once('template.php');

?>