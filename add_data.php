<?php

	require('connection.php');

	if(isset($_POST['image_id']))
		$image_id = $_POST['image_id'];
	if(isset($_POST['spot_id']))
		$spot_id = $_POST['spot_id'];
	if(isset($_POST['lodging_id']))
		$lodging_id = $_POST['lodging_id'];
	if(isset($_POST['food_id']))
		$food_id = $_POST['food_id'];

	if(isset($_POST['name']))
		$name = $_POST['name'];
	if(isset($_POST['description']))
		$description = $_POST['description'];
	if(isset($_POST['address']))
		$address = $_POST['address'];
	if(isset($_POST['price']))
		$price = $_POST['price'];
	if(isset($_POST['cuisine']))
		$cuisine = $_POST['cuisine'];
	if(isset($_POST['image']))
		$image = "gallery/".$_POST['image'];
	else
		$image = '';

	if(isset($_POST['add_photo']))
		$sql = "INSERT INTO galleries (img_url, spot_id) VALUES ('$image','$image_id')";
	elseif (isset($_POST['add_spots'])) 
		$sql = "INSERT INTO nearby_spots (n_name, n_about, n_address, spot_id) VALUES ('$name', '$description', '$address', '$spot_id')";
	elseif (isset($_POST['add_lodgings']))
		$sql = "INSERT INTO lodgings (l_name, l_about, l_address, l_price_range, spot_id) VALUES ('$name', '$description', '$address', '$price', $lodging_id)";
	elseif (isset($_POST['add_food']))
		$sql = "INSERT INTO food_finds (f_name, f_about, f_address, cuisine, f_price_range, spot_id) VALUES ('$name', '$description', '$address', '$cuisine', '$price', '$food_id')";
	$result = mysqli_query($conn, $sql);


	header('location:index.php');

?>