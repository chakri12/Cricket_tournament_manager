<?php include 'dbcon.php';?>
<?php
   $errors = array(); 
  // echo "page opened";
   	 // receive all input values from the form
   		$name = $_POST['name'];
   		$city = $_POST['city'];
   		$capacity = $_POST['capacity'];
   		
		// $user=$_SESSION['sess'];
   		
   		// form validation: ensure that the form is correctly filled
     	//	if (empty($name)) { array_push($errors, "Name is required"); }
   		//if (empty($country)) { array_push($errors, "city is required"); }
   		//if (empty($team)) { array_push($errors, "capacity is required"); }
   		
   	//$adminuser='conor.hammes';
  // echo "values added\n$name\n $city $capacity\n";
   	if (count($errors) == 0) {
	//	echo "\nerrorrs count is zero";
   	$query="INSERT INTO venue (venue_name,city,capacity,adm_id) VALUES ('$name','$city','$capacity',1)";
  // 	echo "\nhi";
	if (mysqli_query($conn, $query)) {
   	print_r("Created successfully");
	echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
   	
   	} 
	
   	else {
       echo "Error: " . $query . "<br>" . mysqli_error($conn);
   	echo "<script type='text/javascript'>location.href = 'add_venue.php';</script>";
   	
	}
   }
     // echo  count($errors);
    //var_dump ($errors);
   mysqli_close($conn);
 ?>

