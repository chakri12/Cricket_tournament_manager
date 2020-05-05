<?php include 'dbcon.php';
session_start();
  if(!($_SESSION['sess']=="admin" ||$_SESSION['sess']=="superadmin" ))
      header("Location: admin_login.php");
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
          <h3>EDIT TEAM</h3>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>TEAM ID<label>*</label></span>
            <input type="text" name="Id" id="Id" > 
            <div class="clearfix"> </div>
           </div>
         
        <div class="clearfix"> </div>
        <div class="register-but">
           
             <input type="submit" value="submit" name='sub'>
             <div class="clearfix"> </div>
           
        </div>
       </div>
       </div>
      </div>

  <div class="main">
     <div class="container">
      <div class="register">
          
         <div class="register-top-grid">
          <h3>TEAM Details</h3>

            <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Team id<label>*</label></span>
            <input type="text" id='team_id' name='team' readonly> 
           </div>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Team Name<label>*</label></span>
            <input type="text"  id='team_name' name='team_name' > 
           </div>
           
		  <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Captain Id<label>*</label></span>
            <input type="text"  id='capt_id' name='capt_id'> 
           </div>
           
        
		   <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Captain Name<label>*</label></span>
            <input type="text" id='capt_name' name='capt_name' readonly> 
           </div>
           
           </div>
          <div class="clearfix"> </div>
        <div class="clearfix"> </div>
        <div class="register-but">
             <input type="submit" value="Update" name='del'>
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
				//$player_name=$_POST['pname'];
               $query="SELECT teamId,teamName,pname,owner_name,owner_id,capt_id from (SELECT team.team_id as teamId,team_name as teamName, player_name as pname,capt_id FROM player RIGHT JOIN team on player.player_id=team.capt_id ) as t LEFT JOIN owner on owner.team_id=t.teamId where teamId='".$id."' LIMIT 1;";
               $result=mysqli_query($conn,$query);
               $numrows=mysqli_num_rows($result);
               if($numrows==1)
               {
                 $row=mysqli_fetch_array($result);
                 $team_id=$row[0];
                 $team_name=$row[1];
                 $capt_name=$row[2];
				 $owner_name=$row[3];
				 $capt_id=$row[5];
				 $owner_id=$row[4];
				 //echo $capt_id;
               }
			    //echo $id;
                //echo $team_id;
				//echo $team_name;
				//echo $capt_name;
				//echo $owner_name;
             }
         
         if(isset($_POST['del']))
         { 
           if(!empty($_POST['team']))
           {
			 //  echo "Hello";
             $id=$_POST['team'];
			 $tname=$_POST['team_name'];
			 $captid=$_POST['capt_id'];
			 //echo $captid;
             //$query="DELETE FROM team where team_id='".$id."'";
			 $query="UPDATE team set team_name='".$tname."',capt_id='".$captid."' where team_id='".$id."'";
             if(mysqli_query($conn,$query))
			 {
				 print_r("Updated Successfully");
                echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
			 }
			 else
				echo "<script type='text/javascript'>location.href = 'edit_team.php';</script>";
   	 
 	}
         }
         ?>
		  <script type="text/javascript">
	     document.getElementById('team_id').value="<?php echo $team_id; ?>";
         document.getElementById('team_name').value="<?php echo $team_name; ?>";
         document.getElementById('capt_name').value="<?php echo $capt_name; ?>";
         document.getElementById('owner_name').value="<?php echo $owner_name; ?>";
		 document.getElementById('capt_id').value="<?php echo $capt_id; ?>";
		 document.getElementById('owner_id').value="<?php echo $owner_id; ?>";
      </script>
</body>
</html>