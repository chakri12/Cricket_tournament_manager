<?php include 'dbcon.php';?>
<?php
   $errors = array(); 
   	 // receive all input values from the form
   		$name = $_POST['name'];
   		$country = $_POST['country'];
   		$dob = $_POST['dob'];
   		$batting_style = $_POST['batting_style'];
   		$bowling_style = $_POST['bowling_style'];
   		$team = $_POST['team'];
		
		// $user=$_SESSION['sess'];
   		
   		// form validation: ensure that the form is correctly filled
   		if (empty($name)) { array_push($errors, "Name is required"); }
   		if (empty($country)) { array_push($errors, "Country is required"); }
   		if (empty($dob)) { array_push($errors, "DoB is required"); }
   		if (empty($batting_style)) { array_push($errors, "Batting_Style is required"); }
   		if (empty($bowling_style)) { array_push($errors, "Bowling_Style is required"); }
   		if (empty($team)) { array_push($errors, "team is required"); }
   		
   	//$adminuser='conor.hammes';
   $adm_id=1;
   	if (count($errors) == 0) {
   	$query=mysqli_prepare($conn,"INSERT INTO player (player_name,country,DOB,Batting_Style,Bowling_Style,team_id,adm_id) VALUES (?,?,?,?,?,?,?)");
	mysqli_stmt_bind_param($query,'ssssssi',$name,$country,$dob,$batting_style,$bowling_style,$team,$adm_id);
	if(mysqli_stmt_execute($query))
	{
   	print_r("Created successfully");
	echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
   	} 
   	else {
       echo "Error: " . $query . "<br>" . mysqli_error($conn);
	 echo "<script type='text/javascript'>location.href = 'add_player.php';</script>";
   	
   	}
   }
   
   mysqli_close($conn);
   ?>

