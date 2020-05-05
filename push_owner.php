

<?php include 'dbcon.php';?>
<?php
   $errors = array(); 
   	 // receive all input values from the form
   		$name = $_POST['name'];
   		$team_id = $_POST['team'];
   		$phone_no=$_POST['phone'];
		// $user=$_SESSION['sess'];
   		
   		// form validation: ensure that the form is correctly filled
     //		if (empty($name)) { array_push($errors, "Name is required"); }
   	 //	if (empty($country)) { array_push($errors, "Country is required"); }
   	 //	if (empty($dob)) { array_push($errors, "DoB is required"); }
   	 //	if (empty($batting_style)) { array_push($errors, "Batting_Style is required"); }
   	 //	if (empty($bowling_style)) { array_push($errors, "Bowling_Style is required"); }
   	 //	if (empty($team)) { array_push($errors, "team is required"); }
   		
   	//$adminuser='conor.hammes';
    //echo "$phone_no";
   	if (count($errors) == 0) {
   	$query="INSERT INTO owner(owner_name,team_id,phone_no,adm_id) VALUES ('$name','$team_id','$phone_no','1')";
   	if (mysqli_query($conn, $query)) {
   	print_r("Created successfully");
    echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
   
   } 
   	else {
       echo "Error: " . $query . "<br>" . mysqli_error($conn);
	   echo "<script type='text/javascript'>location.href = 'add_owner.php';</script>";
   	
   	}
   }
   
   mysqli_close($conn);
   ?>

