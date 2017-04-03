<?php
	session_start();
	$name = $_POST['name'];

	require('connection.php');
	$sql = "SELECT * FROM 
			spots s 
			WHERE s.name = '$name' ";

		$result = mysqli_query($conn,$sql);

	while($row = mysqli_fetch_assoc($result)) {
		// $name = $row['name'];
		// $about = $row['about'];
		// $gallery = $row['img_url'];
		// $nearby_spots = $row['n_name'];
		// $lodgings = $row['l_name'];
		// $food_finds = $row['f_name'];
		// $directions = $row['directions'];

		extract($row);
		// $sql2 = "SELECT * FROM nearby_spots n JOIN galleries g ON g.nearby_spot_id = n.n_id WHERE g.nearby_spot_id = '$n_id'";
		// $result2 = mysqli_query($conn,$sql2);
		// $result2 = mysqli_fetch_assoc($result2);

		
			$sql3 = "SELECT * FROM spots s JOIN galleries g ON g.spot_id = s.s_id WHERE g.spot_id = '$s_id'";
			$result3 = mysqli_query($conn,$sql3);
?>
<!-- ADMIN AND USER RIGHTS TO VIEW SPOTS, VIEW MODALS, ADD, EDIT, DELETE ITEMS -->

			<!-- gallery -->
			<div class='gallery'>
				<?php while($r = mysqli_fetch_assoc($result3)){
					extract($r);
					echo"	<img src='$img_url'> ";
					}
					
					if(isset($_SESSION['role'])) {	?>
				<div class='customize'>
					<button class='btn btn-default' data-toggle='modal' data-target='#add-photo'>Add</button>
				</div>
					<?php } ?>
			</div>

			<!-- name and about -->
			<div class='details'>
				<h3><?php echo $name ?></h3>
				<span class=''><?php echo $about ?></span>

				<!-- surf spot -->
				<h5>Surf Spots</h5>

			<?php
			//while loop for surf spots
			$sql4 = "SELECT * FROM  nearby_spots WHERE spot_id = '$s_id'";
			$result4 = mysqli_query($conn,$sql4);
			while($r = mysqli_fetch_assoc($result4)){
				extract($r);
			?>

				<span class='nearby' data-toggle='modal' data-target='<?php echo "#view-spots$n_id" ?>'>
					<?php echo $n_name; ?>
				</span>	

				<!-- modal surf spot -->
				<div id='<?php echo "view-spots$n_id" ?>' class='modal fade' role='dialog'>
					<div class='modal-dialog'>
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal'>&times;</button>
								<h4 class='modal-title'><?php echo $n_name ?></h4>
							</div>
							<!-- view spot -->
							<div id='view-spot<?php echo $n_id; ?>'>
								<div class='modal-body'>	
									<div class='gallery' style='display: none'><img src='<?php echo $result2['img_url'] ?>'></div>
									<span class='about'><?php echo $n_about ?></span> 
									<span class='about'><strong>Address:</strong> <?php echo $n_address ?></span>
								</div>
								<div class='modal-footer'>
									<?php if(isset($_SESSION['role'])) { ?>
									<button id='<?php echo $n_id; ?>' type='button' class='btn btn-default' onclick='editSpot(this.id)'>Edit</button>
									<a href='delete_data.php?n_id=<?php echo $n_id; ?>'><button type='button' class='btn btn-default'>Delete</button></a>
									<?php } ?>
					  				<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
								</div>
							</div>
							<!-- edit spot -->
							<div id='edit-spot<?php echo $n_id; ?>' style='display: none;'>
								<form method="POST" action="edit_data.php?n_id=<?php echo $n_id; ?>">
									<div class='modal-body'>	
										<input type='hidden' name='spot_id' value='<?php echo $s_id; ?>'></input>
										<textarea name="description" class="form-control" rows="2" ><?php echo $n_about; ?></textarea><br>
										<input type="text" name="address" class="form-control" value="<?php echo $n_address; ?>"><br>
										<input type="hidden" name="image" class="form-control">	
									</div>
									<div class='modal-footer'>
										<?php if(isset($_SESSION['role'])) { ?>
										<button type='submit' class='btn btn-default'>Save</button>
										<button id='back<?php echo $n_id; ?>' type='button' class='btn btn-default' onclick='backSpot(this.id)'>Back</button></a>
										<?php } ?>
						  				<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

			<?php }	
				if(isset($_SESSION['role'])) {	?>
				<!-- add button for nearby spots -->
				<div class='customize'>
					<button class='btn btn-default' data-toggle='modal' data-target='#add-spots'>Add</button>
				</div>
				<?php } ?>

				<!-- lodging -->
				<h5>Lodgings</h5>

			<?php 
			//while loop for lodgings
			$sql5 = "SELECT * FROM spots s JOIN lodgings l ON l.spot_id = s.s_id WHERE l.spot_id = '$s_id'";
			$result5 = mysqli_query($conn,$sql5);
			while($r = mysqli_fetch_assoc($result5)){
				extract($r);
			?>
				<span class='lodgings' data-toggle='modal' data-target='<?php echo "#view-lodgings$l_id" ?>'>
					<?php echo $l_name; ?>
				</span>

				<!-- modal lodging -->
				<div id='<?php echo "view-lodgings$l_id" ?>' class='modal fade' role='dialog'>
					<div class='modal-dialog'>
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal'>&times;</button>
								<h4 class='modal-title'><?php echo $l_name ?></h4>
							</div>
							<!-- view lodging -->
							<div id='view-lodging<?php echo $l_id; ?>'>
								<div class='modal-body'>
									<span class='about'><?php echo $l_about ?></span>
									<span class='about'><strong>Address:</strong> <?php echo $l_address ?></span>
									<span class='about'><strong>Price Range:</strong> <?php echo $l_price_range ?></span>
								</div>
								<div class='modal-footer'>
									<?php if(isset($_SESSION['role'])) { ?>
									<button id='<?php echo $l_id; ?>' type='button' class='btn btn-default' onclick='editLodging(this.id)'>Edit</button>
									<a href='delete_data.php?l_id=<?php echo $l_id; ?>'><button type='submit' class='btn btn-default'>Delete</button></a>
									<?php } ?>
					  				<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
								</div>
							</div>
							<!-- edit lodging -->
							<div id='edit-lodging<?php echo $l_id; ?>' style='display: none;'>
								<form method="POST" action="edit_data.php?l_id=<?php echo $l_id; ?>">
									<div class='modal-body'>								
										<input type='hidden' name='lodging_id' value='<?php echo $l_id; ?>'></input>
										<textarea name="description" class="form-control" rows="2"><?php echo $l_about; ?></textarea><br>
										<input type="text" name="address" class="form-control" value='<?php echo $l_address; ?>'><br>
										<input type="text" name="price" class="form-control" value='<?php echo $l_price_range; ?>'>
									</div>
									<div class='modal-footer'>
										<?php if(isset($_SESSION['role'])) { ?>
										<button type='submit' class='btn btn-default'>Save</button>
										<button id="back<?php echo $l_id; ?>" type='button' class='btn btn-default' onclick='backLodging(this.id)'>Back</button>
										<?php } ?>
						  				<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>	

			<?php } 
				if(isset($_SESSION['role'])) { ?>
				<!-- add button for lodgings -->
				<div class='customize'>
					<button class='btn btn-default' data-toggle='modal' data-target='#add-lodgings'>Add</button>
				</div>
				<?php } ?>

				<!-- food find -->
				<h5>Food Finds</h5>

			<?php 
			//while loop for food finds
			$sql6 = "SELECT * FROM spots s JOIN food_finds f ON f.spot_id = s.s_id WHERE f.spot_id = '$s_id'";
			$result6 = mysqli_query($conn,$sql6);
			while($r = mysqli_fetch_assoc($result6)){
				extract($r);
			?>

				<span class='food' data-toggle='modal' data-target='<?php echo "#view-foods$f_id" ?>'>
					<?php echo $f_name; ?>
				</span>

				<!-- modal food find -->
				<div id='<?php echo "view-foods$f_id" ?>' class='modal fade' role='dialog'>
					<div class='modal-dialog'>
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal'>&times;</button>
								<h4 class='modal-title'><?php echo $f_name ?></h4>
							</div>
							<!-- view food find -->
							<div id='view-food<?php echo $f_id; ?>'>
								<div class='modal-body'>	
									<span class='about'><?php echo $f_about ?></span>
									<span class='about'><strong>Address:</strong> <?php echo $f_address ?></span>
									<span class='about'><strong>Cuisine:</strong> <?php echo $cuisine ?></span>
									<span class='about'><strong>Price Range:</strong> <?php echo $f_price_range ?></span>
								</div>
								<div class='modal-footer'>
									<?php if(isset($_SESSION['role'])) { ?>
									<button id='<?php echo $f_id; ?>' type='button' class='btn btn-default' onclick='editFood(this.id)'>Edit</button>
									<a href='delete_data.php?f_id=<?php echo $f_id; ?>'><button type='submit' class='btn btn-default'>Delete</button></a>
									<?php } ?>
					  				<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
								</div>
							</div>
							<!-- edit food find -->
							<div id='edit-food<?php echo $f_id; ?>' style='display: none;'>
								<form method="POST" action="edit_data.php?f_id=<?php echo $f_id; ?>">	
									<div class='modal-body'>	
										<input type='hidden' name='food_id' value='<?php echo $f_id; ?>'></input>
										<textarea name="description" class="form-control" rows="2"><?php echo $f_about; ?></textarea><br>
										<input type="text" name="address" class="form-control" value="<?php echo $f_address; ?>"><br>
										<input type="text" name="cuisine" class="form-control" value="<?php echo $cuisine; ?>"><br>
										<input type="text" name="price" class="form-control" value="<?php echo $f_price_range; ?>">
									</div>
									<div class='modal-footer'>
										<?php if(isset($_SESSION['role'])) { ?>
										<button type='submit' class='btn btn-default'>Save</button>
										<button id="back<?php echo $f_id; ?>" type='button' class='btn btn-default' onclick='backFood(this.id)'>Back</button>
										<?php } ?>
						  				<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

			<?php } 
				if(isset($_SESSION['role'])) { ?>
				<!-- add button for food finds -->
				<div class='customize'>
					<button class='btn btn-default' data-toggle='modal' data-target='#add-food'>Add</button>
				</div>
				<?php } ?>

				<!-- travel details -->
				<h5>Travel Details</h5>
				<span class='directions'><?php echo $directions ?></span>
			</div>

			<div style='clear:both'></div>

<!-- ADD MODALS -->

<!-- add photo -->
<div id="add-photo" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Image</h4>
			</div>
			<form method="POST" action="add_data.php">
				<div class="modal-body">
				<input type='hidden' name='image_id' value='<?php echo $s_id; ?>'></input>
					<input type="file" name="image" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" name="add_photo">Add</button>
					</form>
	  				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- add spots -->
<div id="add-spots" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Surf Spots</h4>
			</div>
			<form method="POST" action="add_data.php">	
				<div class="modal-body">	
					<input type='hidden' name='spot_id' value='<?php echo $s_id; ?>'></input>			
					<input type="text" name="name" class="form-control" placeholder="What surf spot did we miss?"><br>
					<textarea name="description" class="form-control" rows="2" placeholder="Write a short description"></textarea><br>
					<input type="text" name="address" class="form-control" placeholder="Where can we find this?"><br>
					<input style='display: none' type="file" name="image" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" name="add_spots">Add</button>
					</form>
	  				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- add lodgings -->
<div id="add-lodgings" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Lodgings</h4>
			</div>
			<form method="POST" action="add_data.php">
				<div class="modal-body">
					<input type='hidden' name='lodging_id' value='<?php echo $s_id; ?>'></input>
					<input type="text" name="name" class="form-control" placeholder="Know a place to stay?"><br>
					<textarea name="description" class="form-control" rows="2" placeholder="How was it?"></textarea><br>
					<input type="text" name="address" class="form-control" placeholder="Full address"><br>
					<input type="text" name="price" class="form-control" placeholder="How much does it roughly cost?">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" name="add_lodgings">Add</button>
	  				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- add food finds -->
<div id="add-food" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Food Finds</h4>
			</div>
			<form method="POST" action="add_data.php">
				<div class="modal-body">
					<input type='hidden' name='food_id' value='<?php echo $s_id; ?>'></input>
					<input type="text" name="name" class="form-control" placeholder="Did we miss any awesome places to eat?"><br>
					<textarea name="description" class="form-control" rows="2" placeholder="Yummy food? Good service? Hip ambiance? Tell us about it!"></textarea><br>
					<input type="text" name="address" class="form-control" placeholder="Where will we find this?"><br>
					<input type="text" name="cuisine" class="form-control" placeholder="Type of cuisine it offers"><br>
					<input type="text" name="price" class="form-control" placeholder="Price estimate?">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" name="add_food">Add</button>
					</form>
	  				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php } ?>


