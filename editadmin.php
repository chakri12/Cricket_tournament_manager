<?php include 'dbcon.php';
session_start();
if(!isset($_SESSION['sess']))
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
          <h3>EDIT ADMIN</h3>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>ADMIN ID<label>*</label></span>
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
          <h3>Admin Details</h3>

            <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Admin id<label>*</label></span>
            <input type="text" id='adm_id' name='adm_id' readonly> 
           </div>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Password<label>*</label></span>
            <input type="text"  id='passwd' name='passwd' > 
           </div>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Role<label>*</label></span>
            <input type="text"  id='role' name='role' > 
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
               $query="select adm_id,passwd,role.role_id from admin,role,user_role where  adm_id='".$id."' and user_role.user_id='".$id."' and role.role_id=user_role.role_id";
               $result=mysqli_query($conn,$query);
               $numrows=mysqli_num_rows($result);
               if($numrows==1)
               {
                 $row=mysqli_fetch_array($result);
                 $adm_id=$row[0];
                 $passwd=$row[1];
				 $role=$row[2];
                
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
           if(!empty($_POST['adm_id']))
           {
			 //  echo "Hello";
             $id=$_POST['adm_id'];
			 $passwd=$_POST['passwd'];
			 $role=$_POST['role'];
			 echo $role;
             //$query="DELETE FROM team where team_id='".$id."'";
			 $query="UPDATE admin set adm_id='".$id."',passwd='".$passwd."' where adm_id='".$id."'";
             $query1="insert into user_role values('".$id."','".$role."')";
                        
			if(mysqli_query($conn,$query) && mysqli_query($conn,$query))
			 {
				 print_r("Updated Successfully");
                echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
			 }
			 else
			 {
			  echo "<script type='text/javascript'>location.href = 'editadmin.php';</script>";
			  echo "Error: " . $query . "<br>" . mysqli_error($conn);

			 }
 	}
         }
         ?>
		  <script type="text/javascript">
	     document.getElementById('adm_id').value="<?php echo $adm_id; ?>";
         document.getElementById('passwd').value="<?php echo $passwd; ?>";
         document.getElementById('role').value="<?php echo $role; ?>";
        
      </script>
</body>
</html>