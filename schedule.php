<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IPL-16 Schedule</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
 
	

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link type="text/css" href="schedule.css" rel="stylesheet">
</head>

<body>

 <?php
session_start();
if(!isset($_SESSION['sess']))
include 'index_nav.php';
else
include 'admin_nav.php';
	?>
  
  
    <div class="container">
       <div class="row ">
	     
		 <div class="table-responsive">
        <table class="table table-bordered table-responsive table-hover">
			<thead>
				<tr>
				    <th>Match Id</th>
					<th colspan="2">Teams</th>
					<th>Date</th>
					<th>Venue</th>
					
				</tr>
			</thead>
				<?php include "dbcon.php";?>
				<?php
				$query=mysqli_query($conn,"select match_id,t1.team_name,t2.team_name,match_date,venue_name,t1.team_id,t2.team_id,venue.venue_id  from matches,venue,team t1,team t2 where matches.ven_id=venue.venue_id and t1.team_id=matches.team_1 and t2.team_id=matches.team_2 order by match_id;");
					while($row = mysqli_fetch_row($query))
					{
					echo "<tr>";
					//$matchdata=json_encode($row);
					echo "<td><a href=match_score.php?matchid=".$row[0].">". $row[0] . "</td>";
					echo "<td><a href=team1.php?team=".$row[5].">" . $row[1] . "</td>";
					echo "<td><a href=team1.php?team=".$row[6].">" . $row[2] . "</td>";
					echo "<td>" . $row[3] . "</td>";
					echo "<td><a href=venue1.php?venue=".$row[7].">" . $row[4] . "</td>";
					echo "</tr>";
					}

				?>
		</table>
		</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
