
<?php
session_start();
if(!isset($_SESSION['sess']))
include 'index_nav.php';
else
include 'admin_nav.php';
?>
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IPL Teams</title>

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
	 <link type="text/css" href="schedule.css" rel="stylesheet">
	<link href="css/thumbnail-gallery.css" rel="stylesheet">
	<link type="text/css" href="teams.css" rel="stylesheet">
</head>

<body>



    <!--<div class="address-bar"></div>-->

<br>
	<div class="brand">Teams</div>
	
	<div class="container">

        <div class="row">
          
		  <div class='box'>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="team1.php?team=1">
                    <img class="img-responsive" src="images/kkr.png" alt="">
                </a>
				<span id="team01Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="team1.php?team=1" >Kolkata Knight Riders <span>&gt;</span></a>
				</div>
			</div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="team1.php?team=2">
                    <img class="img-responsive" src="images/rcb.jpg" alt="">
                </a>
				<span id="team02Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="team1.php?team=2" >Royal Challengers Bangalore<span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="team1.php?team=3">
                    <img class="img-responsive" src="images/csk.jpg" alt="">
                </a>
				<span id="team03Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="team1.php?team=3" >Chennai Super Kings<span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="team1.php?team=4">
                    <img class="img-responsive" src="images/kxip.jpg" alt="">
                </a>
				<span id="team04Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="team1.php?team=4" >Kings XI Punjab<span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="team1.php?team=5">
                    <img class="img-responsive" src="images/rr.png" alt="">
                </a>
				<span id="team05Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="team1.php?team=5" >Rajasthan Royals<span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="team1.php?team=6">
                    <img class="img-responsive" src="images/dd.jpg" alt="">
                </a>
				<span id="team06Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="team1.php?team=6" >Delhi Dare devils<span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="team1.php?team=7">
                    <img class="img-responsive" src="images/mi.jpg" alt="">
                </a>
				<span id="team07Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="team1.php?team=7" >Mumbai Indians <span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="team1.php?team=8">
                    <img class="img-responsive" src="images/srh.jpg" alt="">
                </a>
				<span id="team08Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="team1.php?team=8" >Sun Risers Hyderabad <span>&gt;</span></a>
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

</body>

</html>
