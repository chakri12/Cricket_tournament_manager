<?php include 'dbcon.php';
session_start();
if(!isset($_SESSION['sess']))
{
	header("Location: admin_login.php");
}
$path="add_matchdata.php";
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
          <form action="" method="post"> 
         <div class="register-top-grid">
          <h3>ADD MATCH DATA</h3>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>MATCH ID<label>*</label></span>
            <input type="text" name="Id" id="Id"> 
            <div class="clearfix"> </div>
           </div>
		   
           
        <div class="clearfix"> </div>
        <div class="register-but">
           
             <input type="submit" value="submit" name='sub'></form>
			 
             <div class="clearfix"> </div>
      
        </div>
       </div>
       </div>
      </div>

  <div class="main">
     <div class="container">
      <div class="register">
  
         <div class="register-top-grid">
		 <form action="" method="post">
          <h3>Match Details</h3>

            <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>match id<label>*</label></span>
            <input type="text" id="match_id" name="match_id" readonly> 
           </div>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>venue<label>*</label></span>
            <input type="text" id='venue' name='venue' readonly> 
           </div>
           <div class="wow fadeInRight" data-wow-delay="0.4s">
             <span>Date<label>*</label></span>
             <input type="text" id='match_date' name='match_date' readonly> 
           </div>
		    <div class="wow fadeInRight" data-wow-delay="0.4s">
             <span>Team A<label>*</label></span>
             <input type="text" id='team1' name='team1' readonly> 
           </div>
		    <div class="wow fadeInRight" data-wow-delay="0.4s">
             <span>Team B<label>*</label></span>
             <input type="text" id='team2' name='team2' readonly> 
           </div>
		   <div class="wow fadeInRight" data-wow-delay="0.4s">
             <span>Toss won by<label>*</label></span>
             <input type="text" id='tossw' name='tossw'> 
           </div>
		   <div class="wow fadeInRight" data-wow-delay="0.4s">
             <span>Toss Decision<label>*</label></span>
             <input type="text" id='tossd' name='tossd'> 
           </div>
		    <div class="wow fadeInRight" data-wow-delay="0.4s">
             <span>Winning Team<label>*</label></span>
             <input type="text" id='result' name='result'> 
           </div>
		    <div class="wow fadeInRight" data-wow-delay="0.4s">
             <span>Win type<label>*</label></span>
             <input type="text" id='wintype' name='wintype'> 
           </div>
		    <div class="wow fadeInRight" data-wow-delay="0.4s">
             <span>win Margin<label>*</label></span>
             <input type="text" id='winmargin' name='winmargin'> 
           </div>
		    
                      </div>
          <div class="clearfix"> </div>

            
      
        <div class="clearfix"> </div>
        <div class="register-but">
      
             <input type="submit" value="Update" name='del'></form>
             <div class="clearfix"> </div>
      
        </div>
       </div>
       </div>
      </div>

<div class="clearfix"></div>
	      <?php
		  include 'dbcon.php';
         if(isset($_POST['sub']))
         {
           
			if(!empty($_POST['Id']))
               $id=$_POST['Id'];
		  // echo $id;
				//$player_name=$_POST['pname'];
               $query="SELECT match_id,team_1,team_2,match_date,ven_id from matches where match_id='".$id."'";
               $result=mysqli_query($conn,$query);
               $numrows=mysqli_num_rows($result);
               if($numrows==1)
               {
                 $row=mysqli_fetch_array($result);
                 $match_id=$row[0];
                 $team1=$row[1];
                 $team2=$row[2];
                 $match_date=$row[3];
                 $venue=$row[4];
               
			   }
         
             }
         
         if(isset($_POST['del']))
         {
			 
           if(!empty($_POST['match_id']))
           {
			 //  echo "Hello";
             $id=$_POST['match_id'];
			 $tossw=$_POST['tossw'];
			 $tossd=$_POST['tossd'];
			 $win_type=$_POST['wintype'];
			 $winmargin=$_POST['winmargin'];
			 $result=$_POST['result'];
			 
			 
			 
             $query="update matches set toss_id='".$tossw."', toss_decision='".$tossd."',win_type='".$win_type."',won_by='".$winmargin."',result='".$result."' where match_id='".$id."'";
             if(mysqli_query($conn,$query))
			 {
			 print_r("Updated Successfully");
				 echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
			 }
            else    
            {	   
	         echo "<script type='text/javascript'>location.href = 'edit_player.php';</script>";
             echo "Error: " . $query . "<br>" . mysqli_error($conn);

             } 	
		   }
         }
         
         ?>
      <script type="text/javascript">
	  document.getElementById('match_id').value="<?php echo $match_id; ?>";
         document.getElementById('match_date').value="<?php echo $match_date; ?>";
         document.getElementById('team1').value="<?php echo $team1; ?>";
         document.getElementById('team2').value="<?php echo $team2; ?>";
		 document.getElementById('venue').value="<?php echo $venue; ?>";
      </script>
      

</body>
</html>