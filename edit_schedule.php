<?php include 'dbcon.php';
session_start();
if(!isset($_SESSION['sess']))
{
	header("Location: admin_login.php");
}
$path="edit_schedule.php";
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
          <h3>EDIT SCHEDULE</h3>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>MATCH ID<label>*</label></span>
            <input type="text" name="Id" id="Id"> 
            <div class="clearfix"> </div>
           </div>
        <div class="clearfix"> </div>
        <div class="register-but">
             <input type="submit" value="submit" name='sub' id='sub'>
             <div class="clearfix"> </div>
           </form>
        </div>
       </div>
       </div>
      </div>

   <div class="container">
      <div class="register">
          <form action='' method='post'> 
         <div class="register-top-grid">
          <h3>MATCH Details</h3>

            <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>MATCH id<label>*</label></span>
            <input type="text" id='match_id' name='match_id' readonly> 
           </div>
		   <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>TEAM A<label>*</label></span>
            <div class="wow fadeInRight" data-wow-delay="0.4s">
             <select name='team1' id='team1'>
              <option value="1">Kolkota Knight riders</option>
              <option value="2">Royal Challengers Bangalore</option>
              <option value="3">Chennai Super kings</option>
              <option value="4">Kings XI Punjab</option>
			  <option value="5">Rajasthan Royals</option>
			  <option value="6">Delhi Dare Devils</option>
			  <option value="7">Mumbai Indians</option>
              <option value="8">Sun Risers Hyderabad</option>
			</select>
           </div>
           </div>
		   <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>TEAM B<label>*</label></span>
            <select name='team2' id='team2'>
              <option value="1">Kolkota Knight riders</option>
              <option value="2">Royal Challengers Bangalore</option>
              <option value="3">Chennai Super kings</option>
              <option value="4">Kings XI Punjab</option>
			  <option value="5">Rajasthan Royals</option>
			  <option value="6">Delhi Dare Devils</option>
			  <option value="7">Mumbai Indians</option>
              <option value="8">Sun Risers Hyderabad</option>
			</select>
           </div>
		   <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>DATE<label>*</label></span>
            <input type="date" id='date' name='date'> 
           </div>
		   <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>VENUE<label>*</label></span>
            <select name='venue' id='venue'>
		     <option value="1011"> M Chinnaswamy Stadium</option>
             <option value="1012">Punjab Cricket Association Stadium, Mohali</option>
             <option value="1013">Feroz Shah Kotla</option>
             <option value="1014">Wankhede Stadium</option>
             <option value="1015">Eden Gardens</option>
             <option value="1016">Sawai Mansingh Stadium</option>
             <option value="1017">Rajiv Gandhi International Stadium, Uppal</option>
             <option value="1018">MA Chidambaram Stadium, Chepauk</option>
             <option value="1019">Dr DY Patil Sports Academy</option>
            </select>
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
				 $venue_id=$row[4];
			    //$capacity=$row[3];
               }
			    //echo $team1;
              // echo $venue_id;
			  // echo $venue_name;
			//	echo $city;
				//echo $owner_name;
             }
         
         if(isset($_POST['del']))
         {
			 
           if(!empty($_POST['match_id']))
           {
			  // echo "Hello";
             $id=$_POST['match_id'];
			 $team1=$_POST['team1'];
             $team2=$_POST['team2'];
             $match_date=$_POST['date'];
             $venue_id=$_POST['venue'];
             
			 $query="update matches set team_1='".$team1."', team_2='".$team2."',match_date='".$match_date."',ven_id='".$venue_id."' where match_id='".$id."'";
             if(mysqli_query($conn,$query))
			 {
				 print_r("Updated Successfully");
				 echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
   	
           }
		   else
		   {
			   echo "<script type='text/javascript'>location.href = 'edit_schedule.php';</script>";
		       echo "Error: " . $query . "<br>" . mysqli_error($conn);

		   }
		   
         }
		 }
         ?>
		 
		<script type="text/javascript">
        document.getElementById('match_id').value="<?php echo $match_id; ?>";
        document.getElementById('team1').value="<?php echo $team1; ?>";
        document.getElementById('team2').value="<?php echo $team2; ?>";
        document.getElementById('team2').value="<?php echo $team2; ?>";
        document.getElementById('date').value="<?php echo $match_date; ?>";
		document.getElementById('venue').value="<?php echo $venue_id; ?>";
        
	  </script>
      
</body>
</html>