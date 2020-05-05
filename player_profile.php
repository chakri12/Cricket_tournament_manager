<?php
include 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GPL-Team1</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
	<link href="css/portfolio-item.css" rel="stylesheet">
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
<link type="text/css" href="bull busters.css" rel="stylesheet">
</head>

<body>

</style>

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

       <div class="row">
            <div class="box" style="">

                <div class="col-md-6">
                   <h2 class="intro-text text-center">Player Profile</h2>
					<hr>
					<table class="table col-lg-7 col-md-7 col-sm-8 col-xs-7">
							<?php
								$query=mysqli_query($conn,"select player_name,country,year(now())-year(DOB),batting_style,bowling_style,team_name,MoM,player.runs,average,strike_rate,highest_score,player.fours,player.sixes,hundreds,fifties,player.wickets,five_wickets from player,team where team.team_id=player.team_id and player_id='".$_GET['id']."'");
								$row = mysqli_fetch_array($query)
							
							?>
							<tr>
								<th>Name</th>
								<td><?php echo $row[0];?></td>
								
							</tr>
						
							<tr>
								<th>Country</th>
								<td><?php echo $row[1];?></td>
							</tr>
							<tr>
								<th>Age</th>
								<td><?php echo $row[2];?></td>
							</tr>
							<tr>
								<th>Batting Style</th>
								<td><?php echo $row[3];?></td>
							</tr>
							<tr>
								<th>Bowling Style</th>
								<td><?php echo $row[4];?></td>
							</tr>
							<tr>
								<th>Team Name</th>
								<td><?php echo $row[5];?></td>
							</tr>
							<tr>
								<th>MoM awards</th>
								<td><?php echo $row[6];?></td>
							</tr>
							<tr>
								<th>Runs</th>
								<td><?php echo $row[7];?></td>
							</tr>
							<tr>
								<th>Average</th>
								<td><?php echo $row[8];?></td>
							</tr>
							<tr>
								<th>strike Rate</th>
								<td><?php echo $row[9];?></td>
							</tr>
							<tr>
								<th>Highest score</th>
								<td><?php echo $row[10];?></td>
							</tr>
							<tr>
								<th>Fours</th>
								<td><?php echo $row[11];?></td>
							</tr>
							<tr>
								<th>sixes</th>
								<td><?php echo $row[12];?></td>
							</tr>
							<tr>
							<tr>
								<th>Hundreds</th>
								<td><?php echo $row[13];?></td>
							</tr>
							<tr>
								<th>fifties</th>
								<td><?php echo $row[14];?></td>
							</tr>
								<th>wickets</th>
								<td><?php echo $row[15];?></td>
							</tr>
							<tr>
								<th>5 wickets</th>
								<td><?php echo $row[16];?></td>
							</tr>


							</table>
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
