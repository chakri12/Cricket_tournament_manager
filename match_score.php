<?php
include 'dbcon.php';
$id=$_GET['matchid'];

// teams  and ids
$query=mysqli_query($conn,"select match_id,t1.team_name,t2.team_name,match_date,venue_name,matches.team_1,matches.team_2  from matches,venue,team t1,team t2 where matches.ven_id=venue.venue_id and t1.team_id=matches.team_1 and t2.team_id=matches.team_2 and match_id='".$id."'");

//toss and decision
$query1=mysqli_query($conn," select toss.team_name,matches.toss_decision from matches,team toss  where toss.team_id=matches.toss_id and match_id='".$id."'");
$row = mysqli_fetch_row($query);
$row1= mysqli_fetch_row($query1);

//result and margin
$query2=mysqli_query($conn," select result.team_name,matches.won_by,matches.win_type from matches,team result  where result.team_id=matches.result and match_id='".$id."'");
$row2= mysqli_fetch_row($query2);

//MoM name
$query3=mysqli_query($conn," select player_name,player_id from matches,player where player_id=matches.MoM and match_id='".$id."'");
$row3= mysqli_fetch_row($query3);

//match_summary score
$query4=mysqli_query($conn,"select sum(runs),sum(wicket) from ball_to_ball  where match_id='".$id."' and batting_id='".$row[5]."'");
$row4= mysqli_fetch_row($query4);
$query5=mysqli_query($conn,"select sum(runs),sum(wicket) from ball_to_ball  where match_id='".$id."' and batting_id='".$row[6]."'");
$row5= mysqli_fetch_row($query5);

//MoM runs
$query6=mysqli_query($conn,"select sum(runs) from ball_to_ball  where match_id='".$id."' and striker='".$row3[1]."'");
$row6= mysqli_fetch_row($query6);

//MoM fours
$query7=mysqli_query($conn,"select count(*) from ball_to_ball  where ball_to_ball.runs=4 and match_id='".$id."' and striker='".$row3[1]."'");
$row7= mysqli_fetch_row($query7);

//MoM wickets
$query8=mysqli_query($conn,"select count(*) from ball_to_ball  where wicket=1 and match_id='".$id."' and bowler='".$row3[1]."'");
$row8= mysqli_fetch_row($query8);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
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
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">


  </head>
  <body>
   
   <?php
session_start();
if(!isset($_SESSION['sess']))
include 'index_nav.php';
else
include 'admin_nav.php';
	?>
    
    <!--Whole Container -->
    <div class="rca-container rca-margin">
      
	 
          <!--Match Schedule Info-->
          <div class="rca-mini-widget rca-history-info">
            <div class="rca-row">
              <span class="rca-col rca-history-title">Match:</span>
              <span class="rca-col"> <?php echo '<b>'.$row[1].'</b>'." vs ".'<b>'.$row[2].'</b>';?></span>
            </div>
            <div class="rca-row">
              <span class="rca-col rca-history-title">Series:</span>
              <span class="rca-col"> IPL 2008 Season</span>
            </div>
            <div class="rca-row">
              <span class="rca-col rca-history-title">Date (GMT):</span>
              <span class="rca-col"><?php echo $row[3];?></span>
            </div>
            <div class="rca-row">
              <span class="rca-col rca-history-title">Venue:</span>
              <span class="rca-col"><?php echo $row[4];?></span>
            </div>
            <div class="rca-row">
              <span class="rca-col rca-history-title">Match Type:</span>
              <span class="rca-col"> Qualifying match</span>
            </div>
            <div class="rca-row">
              <span class="rca-col rca-history-title">Toss:</span>
              <span class="rca-col"><?php echo '<b>'.$row1[0].'</b>'." won the toss and chose to ".'<b>'. $row1[1].'</b>'. " first "?></span>
            </div>
          </div>

          <!--Completed Match Series-->
          <div class="rca-medium-widget rca-padding rca-completed-match rca-top-border">
            <div class="rca-clear"></div>
            <div class="rca-padding">       
              <h3 class="rca-match-title rca-theme-text">
               <?php echo $row2[0].' won by '.$row2[1].' '.$row2[2];?>               
              </h3>
              <p class="rca-match-info">
               
              </p>
              <div class="rca-top-padding">
                <div class="rca-team-score">
                  <span class="team"><?php echo $row[1].": ";?></span>
                  <span> <?php echo $row4[0].'/'.$row4[1];?></span>
                </div>
                <div class="rca-team-score">
                  <span class="team"><?php echo $row[2].": ";?></span>
                  <span> <?php echo $row5[0].'/'.$row5[1];?></span>
                </div>
              </div>
              <div class="rca-man-match">
                <h3>Man of the Match <span><?php echo '<a href=player_profile.php?id='.$row3[1].'>'.$row3[0];?></span></a></h3>
                <div class="rca-padding">
                  <p class="rca-man-match-record"><span class="title">Runs:</span> <?php if($row6[0]==null) echo 0; else echo $row6[0] ;?><span></span></p>
                  <p class="rca-man-match-record"><span class="title">Boundaries:</span><span><?php if($row7[0]==null) echo 0; else echo $row7[0] ;?> </span></p>
                  <p class="rca-man-match-record"><span class="title">Wickets:</span><span> <?php if($row8[0]==null) echo 0; else echo $row8[0] ;?></span></p>
                </div>
              </div>
            </div>      
          </div>

  <div class='box rca-container rca-margin'>
    
          <!-- Innings Score Card-->
       <span><h3><?php echo $row[1]." Score Card";?></li></span></h3>
             
		 <div class="table-responsive" id='41'>
        <table class="table table-bordered table-responsive table-hover">
			<thead>
				<tr>
				    <th>Player Name</th>
					<th>Runs</th>
					<th>Wicket-Taker </th>					
					
				</tr>
			</thead>
				<?php
				//echo $row[5];
				$query10=mysqli_query($conn," select p1.player_id,p1.player_name,sum(b1.runs) from ball_to_ball b1,player p1 where p1.player_id=b1.striker and match_id='".$id."' and batting_id='".$row[5]."' group by player_id");
				
				//echo 'hi';
					//var_dump($query10);
					while($row10 = mysqli_fetch_row($query10))
					{
						//echo 'hi';
						//echo $row10[0];
				$query11=mysqli_query($conn," select p1.player_name from ball_to_ball b1,player p1 where p1.player_id=b1.bowler and wicket=1 and match_id='".$id."' and striker='".$row10[0]."'");
					$row11 = mysqli_fetch_row($query11)	;
					echo "<tr>";
					echo "<td>". $row10[1] . "</td>";
					echo "<td>" . $row10[2] . "</td>";
					echo "<td>" . $row11[0] . "</td>";
					echo "</tr>";
					}
                       
				?>
		</table>
		</div>

		
		
		<br>
		<br>
		<br>
		<br>
		
		<span><h3><?php echo $row[2]." Score Card ";?></li></span></h3>
       <div clas="box ">        
		<div class="table-responsive ">
        <table class="table table-bordered table-responsive table-hover">
			<thead>
				<tr>
				    <th>Player Name</th>
					<th>Runs</th>
					<th>Wicket-Taker </th>					
					
				</tr>
			</thead>
				<?php
				//echo $row[5];
				$query10=mysqli_query($conn," select p1.player_id,p1.player_name,sum(b1.runs) from ball_to_ball b1,player p1 where p1.player_id=b1.striker and match_id='".$id."' and batting_id='".$row[6]."' group by player_id");
				
				//echo 'hi';
					//var_dump($query10);
					while($row10 = mysqli_fetch_row($query10))
					{
						//echo 'hi';
						//echo $row10[0];
				$query11=mysqli_query($conn," select p1.player_name from ball_to_ball b1,player p1 where p1.player_id=b1.bowler and wicket=1 and match_id='".$id."' and striker='".$row10[0]."'");
					$row11 = mysqli_fetch_row($query11)	;
					echo "<tr>";
					echo "<td>". $row10[1] . "</td>";
					echo "<td>" . $row10[2] . "</td>";
					echo "<td>" . $row11[0] . "</td>";
					echo "</tr>";
					}
                       
				?>
		</table>
		</div>
	</div>	  
    </div>
  <script>
     function showTab(event) {
        var sourceParent = event.parentElement.parentElement;
        var sourceChilds = sourceParent.getElementsByClassName("rca-tab-content");
        var sourceLinkParent = sourceParent.getElementsByClassName("rca-tab-link");
        for (var i=0; i < sourceChilds.length; i++) {
          sourceChilds.item(i).classList.remove("active");
        }
        for (var i=0; i < sourceLinkParent.length; i++) {
          sourceLinkParent.item(i).classList.remove("active");
        }
        var dataTab= event.getAttribute("data-tab");

        event.classList.add("active");
        document.getElementById(dataTab).className += ' active';
      }
    }
  </script>
    
  </body>
</html>