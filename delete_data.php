<?php

	require('connection.php');
	if(isset($_GET['n_id']))
		$n_id = $_GET['n_id'];
	if(isset($_GET['l_id']))
		$l_id = $_GET['l_id'];
	if(isset($_GET['f_id']))
		$f_id = $_GET['f_id'];

	if (isset($_GET['n_id'])) 
		$sql = "DELETE FROM nearby_spots 
			WHERE n_id = '$n_id'";
	elseif (isset($_GET['l_id']))
		$sql = "DELETE FROM lodgings
			WHERE l_id = '$l_id'";
	elseif (isset($_GET['f_id']))
		$sql = "DELETE FROM food_finds
			WHERE f_id = '$f_id'";

	mysqli_query($conn,$sql);

	header('location:index.php');

?>