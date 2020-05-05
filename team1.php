<?php include 'dbcon.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IPL-Indian Premier League</title>

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

</head>

<body>
 

<script language="javascript">
var XMLHttpRequestObject=false;
if(window.XMLHttpRequest){
XMLHttpRequestObject=new XMLHttpRequest();
}
else if(window.ActiveXObject){
XMLHttpRequestObject=new
ActiveXObject("Microsoft.XMLHTTP");
}

function getData(player,dataSource, divID)
{
var a=player.value;
if(XMLHttpRequestObject)
{
var obj =document.getElementById(divID);
XMLHttpRequestObject.open("GET", dataSource +"?reg="+a);

XMLHttpRequestObject.onreadystatechange=function()
{
if(XMLHttpRequestObject.readyState==4 && 
XMLHttpRequestObject.status==200){
obj.innerHTML=XMLHttpRequestObject.responseText;
}
}
XMLHttpRequestObject.send(null);
}
}

</script>

   <?php
session_start();
if(!isset($_SESSION['sess']))
include 'index_nav.php';
else
include 'admin_nav.php';
	?>
    <div class="container">

	<?php
			      $query10=mysqli_query($conn,"select team_name from team where team_id='".$_GET['team']."'");
                  $row10=mysqli_fetch_array($query10);  
	?>                                            
				  
	 
       <div class="row">
            <div class="box" style="">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><?php echo $row10[0];?></strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive img-border-left" src="images/3.png" alt="">
                </div>
                <div class="col-md-6">
				
				   <h2 class="intro-text text-center">ABOUT THE TEAM</h2>
					<hr>
					<table class="table col-lg-7 col-md-7 col-sm-8 col-xs-7">
							<tr>
								<th>Team ID</th>
								<?php
								$owner='';
								$query=mysqli_query($conn,"select team_id from team where team.team_id='".$_GET['team']."'");
								while($row = mysqli_fetch_array($query))
								{
									$owner.=$row[0];
									$owner.=" , ";
								}
								echo "<td>" . $owner . "</td>";
								?>
								
							</tr>
								
							<tr>
								<th>Owner</th>
								<?php
								$owner='';
								$query=mysqli_query($conn,"select owner_name,team_name from owner,team where owner.team_id=team.team_id and team.team_id='".$_GET['team']."'");
								while($row = mysqli_fetch_array($query))
								{
									$owner.=$row[0];
									$owner.=" , ";
								}
								echo "<td>" . $owner . "</td>";
								?>
								
							</tr>
								
							<tr>
								<th>Captain</th>
								<?php
								$owner='';
								$query=mysqli_query($conn,"select player_name from player,team where team.capt_id=player.player_id and team.team_id='".$_GET['team']."'");
								while($row = mysqli_fetch_array($query))
								{
									$owner.=$row[0];
									$owner.=" , ";
								}
								echo "<td>" . $owner . "</td>";
								?>
								
							</tr>
                          	<tr>
								<th>Winning Percentage</th>
								<?php
								$owner='';
								$query=mysqli_query($conn,"select won/(won+lost)*100 from team where  team.team_id='".$_GET['team']."'");
								while($row = mysqli_fetch_array($query))
								{
									$owner.=$row[0];
									$owner.=" , ";
								}
								echo "<td>" . $owner . "</td>";
								?>
								
							</tr>
												
					     	<tr>
								<th>Total Runs</th>
								<?php
								$owner='';
								$query=mysqli_query($conn,"select runs from team where  team.team_id='".$_GET['team']."'");
								while($row = mysqli_fetch_array($query))
								{
									$owner.=$row[0];
									$owner.=" , ";
								}
								echo "<td>" . $owner . "</td>";
								?>
								
							</tr>
							<tr>
								<th>Total Wickets</th>
								<?php
								$owner='';
								$query=mysqli_query($conn,"select wickets from team where  team.team_id='".$_GET['team']."'");
								while($row = mysqli_fetch_array($query))
								{
									$owner.=$row[0];
									$owner.=" , ";
								}
								echo "<td>" . $owner . "</td>";
								?>
								
							</tr>
							
					</table>
                </div>
                <div class="clearfix"></div>
				
	        </div>
        </div>
			
			
			
              <div class="box" style="margin-top:10px;">  
			<h2 class="sub-header"><span><a href="team1.php">Squad List</a></span> </h2>
          <div id="targetdivision" class="table-responsive">
		      
            <table class="table table-striped">
			
              <thead>
                <tr>
                  <th>Name</th>
				  <th>Country</th>
				  <th>Age</th>
				  <th>Jersey No.</th>
                  <th>Batting Style</th>
                  <th>Bowling Style</th>
				  
                </tr>
              </thead>
              
			  <?php
				$query=mysqli_query($conn,"select player_name,country,year(now())-year(DOB),player_id,batting_style,bowling_style from player where team_id='".$_GET['team']."'");
				while($row = mysqli_fetch_array($query))
				{
				echo "<tr>";
				echo "<td><a href=player_profile.php?id=".$row[3].">". $row[0] . "</td>";
				echo "<td>" . $row[1] . "</td>";
				echo "<td>" . $row[2] . "</td>";
				echo "<td>" . $row[3] . "</td>";
				echo "<td>" . $row[4] . "</td>";
				echo "<td>" . $row[5] . "</td>";
				echo "</tr>";
				}
			

			  ?>
                
              
            </table>
          </div>
            </div>
        </div>

    </div>
    <!-- /.container -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
