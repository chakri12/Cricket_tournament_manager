<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IPL VENUES</title>

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

	<?php
session_start();
if(!isset($_SESSION['sess']))
include 'index_nav.php';
else
include 'admin_nav.php';
	?>
	<div class="clearfix"></div>
	<div class="brand">Venues</div>
	
	<div class="container">

        <div class="row box">
       
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="venue1.php?venue=1011">
                    <img class="img-responsive" src="images/a1.jpg" alt="">
                </a>
				<span id="team01Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="venue1.php?venue=1011" >Chinnaswamy Stadium  <span>&gt;</span></a>
				</div>
			</div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="venue1.php?venue=1012">
                    <img class="img-responsive" src="images/a2.jpg" alt="">
                </a>
				<span id="team02Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="venue1.php?venue=1012" >PCA Stadium, Mohali<span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="venue1.php?venue=1013">
                    <img class="img-responsive" src="images/a3.jpg" alt="">
                </a>
				<span id="team03Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="venue1.php?venue=1013" >Feroz shah kotla stadium<span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="venue1.php?venue=1014">
                    <img class="img-responsive" src="images/a4.jpg" alt="">
                </a>
				<span id="team04Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="venue1.php?venue=1014" >Wankhede stadium<span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="venue1.php?venue=1015">
                    <img class="img-responsive" src="images/a5.jpg" alt="">
                </a>
				<span id="team05Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="venue1.php?venue=1015" >Eden Gardens<span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="venue1.php?venue=1016">
                    <img class="img-responsive" src="images/a6.jpg" alt="">
                </a>
				<span id="team06Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="venue1.php?venue=1016" >Sawai Mansingh Stadium<span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="venue1.php?venue=1017">
                    <img class="img-responsive" src="images/a7.jpg" alt="">
                </a>
				<span id="team07Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="venue1.php?venue=1017" >Rajiv Gandhi International stadium<span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="venue1.php?venue=1018">
                    <img class="img-responsive" src="images/a8.jpg" alt="">
                </a>
				<span id="team08Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="venue1.php?venue=1018" >Chidambaram stadium <span>&gt;</span></a>
				</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">
                <a class="thumbnail" href="venue1.php?venue=1019">
                    <img class="img-responsive" src="images/dy_patil.jpg" alt="">
                </a>
				<span id="team08Name"></span>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<a class="col-lg-3 col-md-4 col-sm-6 col-xs-12" href="venue1.php?venue=1014" >DY Patil stadium Mumbai<span>&gt;</span></a>
				</div>
            </div>
            
        </div>
	</div>
            
            
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p></p>
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
