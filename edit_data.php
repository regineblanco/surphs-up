<?php

	require('connection.php');
	if(isset($_GET['n_id']))
		$n_id = $_GET['n_id'];
	if(isset($_GET['l_id']))
		$l_id = $_GET['l_id'];
	if(isset($_GET['f_id']))
		$f_id = $_GET['f_id'];

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
		$sql = "UPDATE galleries SET 
			img_url = '$image'";
	elseif (isset($_GET['n_id'])) 
		$sql = "UPDATE nearby_spots SET
			n_about = '$description',
			n_address = '$address'
			WHERE n_id = '$n_id'";
	elseif (isset($_GET['l_id']))
		$sql = "UPDATE lodgings SET 
			l_about = '$description',
			l_address = '$address',
			l_price_range = '$price'
			WHERE l_id = '$l_id'";
	elseif (isset($_GET['f_id']))
		$sql = "UPDATE food_finds SET 
			f_about = '$description',
			f_address = '$address',
			cuisine = '$cuisine',
			f_price_range = '$price'
			WHERE f_id = '$f_id'";

	mysqli_query($conn,$sql);

	header('location:index.php');

?>