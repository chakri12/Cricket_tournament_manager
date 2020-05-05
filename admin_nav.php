<?php include 'dbcon.php';
$path="admin_nav.php";
$query0=mysqli_query($conn,"select perm_id from permissions where perm_desc='".$path."'");
$row0=mysqli_fetch_row($query0);
$query3=mysqli_query($conn,"select role_id from role where role_name='".$_SESSION['sess']."'");
$row3=mysqli_fetch_row($query3);
$perm_id=$row0[0];
$role_id=$row3[0];
$query4=mysqli_query($conn,"select * from role_perm where perm_id='".$perm_id."' and role_id='".$role_id."'");
$numrows=mysqli_num_rows($query4);               
if($numrows==0)
{
    header("Location: admin_login.php");
}	


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IPL-Indian Premier League</title>

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style-1.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	 <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/paytm.css"/>
<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>



<body>
<div class="brand">IPL-Indian Premier League</div>
    <div class="address-bar"><b>Live cricket</b></div>
  <div class="menu-bar">
      <div class="container">
        <div class="top-menu">
          <ul>
		      <li>
		           <a href='admin_home.php'>
				    Home </a>
              <li>
                  <div class="dropdown">
                   <a class="active" >View</a>
                   <div class="dropdown-content">
                    <a href="player_list.php">Players</a>
                    <a href="teams.php">Teams</a>
                    <a href="schedule.php">Matches</a>
                    <a href="venues.php">Venues</a>
                    <a href="stats.php">stats</a>      
                  </div>
                  </div>
				  </li>
<?php
  	  if($_SESSION['sess']== "admin" || $_SESSION['sess']== "superadmin")
	  {
	      echo '
			        
   			<li>
                  <div class="dropdown">
                   <a class="active" >Player</a>
                   <div class="dropdown-content">
                  <a href="add_player.php">ADD Player</a>
                    <a href="deleteplayer.php">DELETE Player</a>
   
                  </div>
                  </div></li>';
		    echo
			'
             <li>
                <div class="dropdown">
              <a class="active">Team</a>
                <div class="dropdown-content">
            <a href="add_team.php">ADD Teams</a>
                 <a href="deleteteam.php">DELETE Teams</a>
               </div>
           </div></li>';
		   echo 
		   '
            <li>
                <div class="dropdown">
              <a class="active">Owner</a>
                <div class="dropdown-content">
            <a href="add_owner.php">ADD Owners</a>
                 <a href="deleteowner.php">DELETE Owners</a>
               </div>
           </div></li>';
		   echo 
		   '
             <li>
                <div class="dropdown">
              <a class="active">Matches</a>
                <div class="dropdown-content">
            <a href="add_match.php">ADD Matches</a>
                 <a href="deletematch.php">DELETE Matches</a>
               </div>
           </div></li>';
		   echo
		   '
		    <li>
                <div class="dropdown">
              <a class="active">Venues</a>
                <div class="dropdown-content">
            <a href="add_venue.php">ADD venues</a>
                 <a href="deletevenue.php">DELETE venues</a>
               </div>
           </div></li>';
	  }
	   ?>
		   <?php
		  if($_SESSION['sess']== "superadmin")
		  { 
	        echo '
			 <li>
                <div class="dropdown">
              <a class="active">Admin</a>
                <div class="dropdown-content">
                 <a href="add_admin.php">ADD Admin</a>
                 <a href="deleteadmin.php">DELETE Admin</a>
                 <a href="editadmin.php">EDIT Admin</a>
                 <a href="deleterole.php">DELETE Admin Role</a>
                   
			   </div>
           </div></li>';
		   
	        echo '
			 <li>
                <div class="dropdown">
              <a class="active">Scorer</a>
                <div class="dropdown-content">
                 <a href="add_scorer.php">ADD Scorer</a>
                 <a href="deletescorer.php">DELETE Scorer</a>
                 <a href="editscorer.php">EDIT Scorer</a>
                 <a href="deleterole.php">DELETE Scorer Role</a>
               
			   </div>
           </div></li>';
		  }
		   ?>
              <div class="clearfix"></div>
          </ul>
        </div>
    
        <div class="login-section" >
          <ul>
            <li><a class="active" href="logout.php">Logout</a></li>|
            <li><a  href="#"></a> </li> 
        
          </ul>
        </div>
      
    </div>
    
  </div> 
  
  </body>
  </html>