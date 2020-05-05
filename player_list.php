
<?php include "dbcon.php";?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IPL-Points Table</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
	<link type="text/css" href="schedule.css" rel="stylesheet">
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

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Points
                        <strong>Table</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="table-responsive">
        <table class="table table-bordered table-responsive table-hover">
			<thead>
				<tr>
				    <th colspan="1">Player_ID</th>
					<th colspan="1">Name</th>
					<th>Country	</th>
					<th>Age</th>
					<th>Runs</th>
					<th>Strike Rate</th>
					<th>Average</th>
					<th>Highest Score</th>
					<th>Wickets</th>
					<th>MoM</th>
					
				</tr>
			</thead>
				<?php
				$query=mysqli_query($conn,"select player_name,country,year(now())-year(DOB),runs,strike_rate,average,highest_score,wickets,MoM,player_id from player");
				while($row = mysqli_fetch_array($query))
				{
				echo "<tr>";
				echo "<td><a href=player_profile.php?id=".$row[9].">" . $row[9] . "</td>";
				echo "<td><a href=player_profile.php?id=".$row[9].">" . $row[0] . "</td>";
				echo "<td>" . $row[1] . "</td>";
				echo "<td>" . $row[2] . "</td>";
				echo "<td>" . $row[3] . "</td>";
				echo "<td>" . $row[4] . "</td>";
				echo "<td>" . $row[5] . "</td>";
				echo "<td>" . $row[6] . "</td>";
				echo "<td>" . $row[7] . "</td>";
				echo "<td>" . $row[8] . "</td>";
				echo "</tr>";
				}

			  ?>
				
				
		</table>
		</div>
		</div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
