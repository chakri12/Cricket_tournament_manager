<?php include 'dbcon.php';?>
<?php
   $errors = array(); 
   
   		// receive all input values from the form
   		
		$team_name = $_POST['name'];
   		//$capt_name = $_POST['team2'];
   		//$owner_name = $_POST['match_date'];
   		//$ven_id = $_POST['venue'];
   		
   		// form validation: ensure that the form is correctly filled
   		if (empty($team_1)) { array_push($errors, "Team 1 is required"); }
   		if (empty($team_2)) { array_push($errors, "team 2 is required"); }
   		if (empty($match_date)) { array_push($errors, "Date is required"); }
   		if (empty($venue)) { array_push($errors, "Venue is required"); }
   		
   //	$adminuser='conor.hammes';
   
  // 	if (count($errors) == 0) {
	
   	$query="INSERT INTO team (team_name,adm_id) VALUES ('$team_name',1)";
	//}   
   if (mysqli_query($conn, $query)) {
   
   		print_r("Created successfully");
		echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
   	
   	} 
   	else {
       echo "Error: " . $query . "<br>" . mysqli_error($conn);
   	echo "<script type='text/javascript'>location.href = 'add_team.php';</script>";
   	
	}
   
   
   mysqli_close($conn);
?>

