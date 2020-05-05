<?php include 'dbcon.php';
session_start();
if(!isset($_SESSION['sess']))
{
	header("Location: admin_login.php");
}
$path="edit_venue.php";
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
          <h3>ADD MATCH DATA</h3>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>MATCH ID<label>*</label></span>
            <input type="text" name="Id" id="Id"> 
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
          <h3>Match Details</h3>
            
			 <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>MATCH ID<label>*</label></span>
			<input type="text" id='match_id' name='match_id' readonly> 
           </div>
			<div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Batting Team<label>*</label></span>
              <select name='team_id' id='team_id'>
			  <?php
			  include 'dbcon.php';
			  if(!empty($_POST['Id']))
			  {
				$query=mysqli_query($conn," select team_1,team_2,t1.team_name,t2.team_name from matches,team t1,team t2 where team_1=t1.team_id and team_2=t2.team_id and match_id='".$_POST['Id']."'");
				$row = mysqli_fetch_row($query);
            echo  "<option value=".$row[0].">".$row[2]."</option>
			   <option value=".$row[1].">".$row[3]."</option>";
			  }
			  ?>
     		</select> 
           </div>
		   
		    <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>STRIKER<label>*</label></span>
			<input type="text" id='striker' name='striker'> 
           </div>
		   
            <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Non-striker<label>*</label></span>
             <input type="text" id='non_striker' name='non_striker'> 
           </div>
		   
            <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Bowler<label>*</label></span>
             <input type="text" id='bowler' name='bowler'>
           </div>
		   
           
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Over No.<label>*</label></span>
              <select id='over_id' name='over_id'>
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			  <option value="5">5</option>
			  <option value="6">6</option>
			  <option value="7">7</option>
			  <option value="9">8</option>
			  <option value="10">10</option>
			  <option value="11">11</option>
			  <option value="12">12</option>
			  <option value="13">13</option>
			  <option value="14">14</option>
			  <option value="15">15</option>
			  <option value="16">16</option>
			  <option value="17">17</option>
			  <option value="18">18</option>
			  <option value="19">19</option>
			  <option value="20">20</option>
			  </select>
			</div>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Ball<label>*</label></span>
            <input type="text" id='ball_no' name='ball_no'> 
           </div>
		   <div class="wow fadeInLeft" data-wow-delay="0.4s">
               <span>Runs<label>*</label></span>
             <input type="text" id='runs' name='runs'> 
           </div>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>is Wicket<label>*</label></span>
             <select id='wicket' name='wicket'>
			  <option value="0">no wicket</option>
			  <option value="1">wicket fall</option>
			  </select>
           </div>
           
           </div>
          <div class="clearfix"> </div>
        <div class="clearfix"> </div>
        <div class="register-but">
             <input type="submit" value="Update" name='del'>
           </form>
        </div>
       </div>
       </div>
      </div>
      <?php
		  include 'dbcon.php';
		  // $d=$_POST['Id'];
         
         if(isset($_POST['sub']))
         {
           
			//if(!empty($_POST['Id']))
               
		        // echo $id;
				//$player_name=$_POST['pname'];
              //  $query="SELECT venue_id,venue_name,city from venue where venue_id='".$id."'";
               // $result=mysqli_query($conn,$query);
               //$numrows=mysqli_num_rows($result);
             //  if($numrows==1)
              // {
              //   $row=mysqli_fetch_array($result);
              //   $venue_id=$row[0];
              //   $venue_name=$row[1];
               //  $city=$row[2];
			    //$capacity=$row[3];
               //}
			  //  echo $id;
              // echo $venue_id;
			  // echo $venue_name;
			//	echo $city;
				//echo $owner_name;
            // }
		if(!empty($_POST['Id']))
			  {
				 $id=$_POST['Id'];
				$query=mysqli_query($conn," select team_1,team_2,t1.team_name,t2.team_name from matches,team t1,team t2 where team_1=t1.team_id and team_2=t2.team_id and match_id='".$_POST['Id']."'");
				$row = mysqli_fetch_row($query);
            echo  "<option value=".$row[0].">".$row[2]."</option>
			   <option value=".$row[1].">".$row[3]."</option>";
			  }
			 }
			// echo "hello";
         if(isset($_POST['del']))
         {
			 //echo "Hello";
			//$va=$_POST['Id'];
			//echo va;
            if(!empty($_POST['match_id']))         
		  {
			   echo 'hello';
             $id=$_POST['match_id'];
			 $team_id=$_POST['team_id'];
			 $over_id=$_POST['over_id'];
			 $ball_no=$_POST['ball_no'];
			 $striker=$_POST['striker'];
			 $non_striker=$_POST['non_striker'];
			 $bowler=$_POST['bowler'];
			 $runs=$_POST['runs'];
			 $wicket=$_POST['wicket'];
             $query="insert into ball_to_ball(batting_id,over_id,ball_id,striker,non_striker,bowler,runs,wicket,match_id) values('".$team_id."','".$over_id."','".$ball_no."','".$striker."','".$non_striker."','".$bowler."','".$runs."','".$wicket."','".$id."')";
             echo $runs;
			 if(mysqli_query($conn,$query))
			 {
				 print_r("Updated Successfully");
				echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
   	
			 }
			 else
			 {
				 echo "<script type='text/javascript'>location.href = 'edit_venue.php';</script>";
                 echo "Error: " . $query . "<br>" . mysqli_error($conn);
              
			 }			   
			}
			
         }
		// echo "hello";
         ?>
		 
		 <script type="text/javascript">
	     document.getElementById('Id').value="<?php echo $id; ?>";
         document.getElementById('match_id').value="<?php echo $id; ?>";
				
		</script>
      
</body>
</html>