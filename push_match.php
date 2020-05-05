

<?php include 'dbcon.php';?>
<?php
   $errors = array(); 
   	 // receive all input values from the form
   		$team_1 = $_POST['team1'];
   		$team_2 = $_POST['team2'];
   		$match_date = $_POST['match_date'];
   		$ven_id = $_POST['venue'];
   		
		// $user=$_SESSION['sess'];
   		
   		// form validation: ensure that the form is correctly filled
     //		if (empty($name)) { array_push($errors, "Name is required"); }
   	 //	if (empty($country)) { array_push($errors, "Country is required"); }
   	 //	if (empty($dob)) { array_push($errors, "DoB is required"); }
   	 //	if (empty($batting_style)) { array_push($errors, "Batting_Style is required"); }
   	 //	if (empty($bowling_style)) { array_push($errors, "Bowling_Style is required"); }
   	 //	if (empty($team)) { array_push($errors, "team is required"); }
   		
   	//$adminuser='conor.hammes';
   
   	if (count($errors) == 0) {
   	$query="INSERT INTO matches (team_1,team_2,match_date,ven_id) VALUES ('$team_1','$team_2','$match_date','$ven_id')";
   	if (mysqli_query($conn, $query)) {
   	print_r("Created successfully");
	echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
   	} 
   	else {
       echo "Error: " . $query . "<br>" . mysqli_error($conn);
	echo "<script type='text/javascript'>location.href = 'add_match.php';</script>";
   	   
   	}
   }
   
   mysqli_close($conn);
   ?>