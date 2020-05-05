<?php include 'dbcon.php';
session_start();
if(!isset($_SESSION['sess']))
{
	header("Location: admin_login.php");
}
//echo $_SESSION['sess'];
$path="admin_home.php";
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
//total players
$query=mysqli_query($conn,"select count(*) from player");
$row=mysqli_fetch_row($query);
//total matches
$query1=mysqli_query($conn,"select count(*) from matches");
$row1=mysqli_fetch_row($query1);
//include 'core.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>IPL</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<script src="js/jquery.min.js"></script>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<script src="js/wow.min.js"></script>
<link href="css/animate.css" rel='stylesheet' type='text/css' />
<script>
	new WOW().init();
</script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
<script src="js/simpleCart.min.js"> </script>


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
  
	<div class="header">
		<div class="container">
			<!--<div class="top-header">
				<div class="logo">
					<a href="index.php"><img src="images/nitk.png" class="img-responsive" alt="" /></a>
				</div>
				<div class="queries">
						<p>Availability of food is restricted to Timings:<span>7pm-2am</span><label></label></p>
				</div>
				<div class="header-right">
						<div class="cart box_1">
							<a href="checkout.php">
								<h3> <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span> items)<img src="images/bag.png" alt=""></h3>
							</a>	
							<p><a href="javascript:;" class="simpleCart_empty">Empty card</a></p>
							<div class="clearfix"> </div>
						</div>
					</div>
				<div class="clearfix"></div>
			</div>-->
		</div>
	<?php 
	include "admin_nav.php";
	
	// echo $_SESSION['sess'];
    ?>
  <div class="container">
<div class="clearfix"></div>
	
      <div class="row">
            <div class="box">
			   <div class="rca-clear"></div>
      <div class="rca-row">        
        <div class="rca-column-4">
          <div class="rca-micro-widget rca-stats">
            <div class="rca-match-start">
              <h3>Total Players</h3>
              <div class="rca-padding">
                <h2><?php echo $row[0];?></h2> 
              </div>
            </div>  
          </div>
		  <div class="rca-micro-widget rca-stats">
            <div class="rca-match-start">
              <h3>Total Matches</h3>
              <div class="rca-padding">
                <h2><?php echo $row1[0];?></h2> 
              </div>
            </div>  
          </div>
        </div>
       </div>
	   <?php
		  if($_SESSION['sess']=="admin" || $_SESSION['sess']=="superadmin" )
		  {
    echo '
	<div class="rca-column-4" style="cursor: pointer;" onclick=window.location="edit_player.php";>
          <!--Season Stats-->
         <div>
            <div class="rca-clear"></div>
            <h2>
              EDIT PLAYER
            </h2>
			<br>
			<br>
              <img src="images/player.jpg" width="200" height="300">    
          </div>
        </div>	
<div class="rca-column-4" style="cursor: pointer;" onclick=window.location="edit_team.php";>
          <!--Season Stats-->
          <div>
            <div class="rca-clear"></div>
            <h2>
              EDIT TEAM
            </h2>  
			<br>
			<br>
              <img src="images/3.png" width="200" height="300">    			
          </div>
        </div>';
		  }
		?>
<?php
  	  if($_SESSION['sess']=="scorer" || $_SESSION['sess']=="superadmin")
	  {
 echo '		  
<div class="rca-column-4" style="cursor: pointer;" onclick=window.location="add_matchdata.php";>
          <!--Season Stats-->
          <div>
            <div class="rca-clear"></div>
            <h2>
              ADD MATCH SUMMARY
            </h2>
             <br>
			<br>
              <img src="images/match.jpg" width="200" height="300">         
          </div>
        </div>';
	  }
	  ?>
<?php
  	  if($_SESSION['sess']== "scorer" || "superadmin")
	  {
 echo '		  

	  <div class="rca-column-4" style="cursor: pointer;" onclick=window.location="edit_venue.php";>
          <!--Season Stats-->
          <div>
            <div class="rca-clear"></div>
            <h2>
            ADD MATCH DATA
            </h2>
            <img src="images/venue.jpg" width="200" height="300">      
          </div>
        </div>
		';
	  }
	  ?>
<div class="rca-column-4" style="cursor: pointer;" onclick="window.location='edit_schedule.php';">
          <!--Season Stats-->
          <div>
           
            <h2>
              EDIT  SCHEDULE
            </h2>
             <br>
			<br>
              <img src="images/1.jpg" width="200" height="300">      
          </div>
        </div>		
    </div>
	
	</div>
    </div>
	</div>
    <!-- /.container -->

    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</html>
