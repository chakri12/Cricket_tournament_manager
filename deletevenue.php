<?php include 'dbcon.php';
session_start();
if(!isset($_SESSION['sess']))
{
	header("Location: admin_login.php");
}
$path="deletevenue.php";
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
</head>
<body>
  
	<div class="header">
		<div class="container">
			<!--<div class="top-header">
				<div class="logo">
					<a href="index.html"><img src="images/nitk.png" class="img-responsive" alt="" /></a>
				</div>
				<div class="queries">
						<p>Availability of food is restricted to Timings:<span>7pm-2am</span><label></label></p>
				</div>
				<div class="header-right">
						<div class="cart box_1">
							<a href="checkout.html">
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
	?>
	<div class="main">
     <div class="container">
      <div class="register">
          <form action="" method='post'> 
         <div class="register-top-grid">
          <h3>DELETE VENUE</h3>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>VENUE ID<label>*</label></span>
            <input type="text" name="Id" id="Id"> 
            <div class="clearfix"> </div>
           </div>
        <div class="clearfix"> </div>
        <div class="register-but">
             <input type="submit" value="submit" name='sub'>
             <div class="clearfix"> </div>
           </form>
        </div>
       </div>
       </div>
      </div>

  <div class="main">
     <div class="container">
      <div class="register">
          <form action='' method='post'> 
         <div class="register-top-grid">
          <h3>Venue Details</h3>

            <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Venue id<label>*</label></span>
            <input type="text" id='venue_id' name='venue' readonly> 
           </div>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Venue Name<label>*</label></span>
            <input type="text" id='venue_name' readonly> 
           </div>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Venue city<label>*</label></span>
            <input type="text" id='city' readonly> 
           </div>
           
           </div>
          <div class="clearfix"> </div>
        <div class="clearfix"> </div>
        <div class="register-but">
             <input type="submit" value="Delete" name='del'>
             <div class="clearfix"> </div>
           </form>
        </div>
       </div>
       </div>
      </div>
<div class="clearfix"></div>
		
<div class="clearfix"></div>
	      <?php
		  include 'dbcon.php';
         if(isset($_POST['sub']))
         {
           
			if(!empty($_POST['Id']))
               $id=$_POST['Id'];
		        // echo $id;
				//$player_name=$_POST['pname'];
               $query="SELECT venue_id,venue_name,city from venue where venue_id='".$id."'";
               $result=mysqli_query($conn,$query);
               $numrows=mysqli_num_rows($result);
               if($numrows==1)
               {
                 $row=mysqli_fetch_array($result);
                 $venue_id=$row[0];
                 $venue_name=$row[1];
                 $city=$row[2];
			    //$capacity=$row[3];
               }
			  //  echo $id;
              // echo $venue_id;
			  // echo $venue_name;
			//	echo $city;
				//echo $owner_name;
             }
         
         if(isset($_POST['del']))
         {
			 
           if(!empty($_POST['venue']))
           {
			  // echo "Hello";
             $id=$_POST['venue'];
             $query="DELETE FROM venue where venue_id='".$id."'";
             if(mysqli_query($conn,$query))
			 {
				 print_r("Deleted Successfully");
			 echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
   	
			 }
			 else
				echo "<script type='text/javascript'>location.href = 'deletevenue.php';</script>";
   	 
           }
         }
         ?>
		 
		 <script type="text/javascript">
	     document.getElementById('Id').value="<?php echo $venue_id; ?>";
         document.getElementById('venue_id').value="<?php echo $venue_id; ?>";
         document.getElementById('venue_name').value="<?php echo $venue_name; ?>";
         document.getElementById('city').value="<?php echo $city; ?>";
      </script>
      
</body>
</html>