<?php
include 'dbcon.php';

//total runs
$query=mysqli_query($conn,"select sum(runs) from ball_to_ball");
$row=mysqli_fetch_row($query);

//total wickets
$query1=mysqli_query($conn,"select sum(wicket) from ball_to_ball");
$row1=mysqli_fetch_row($query1);


//Most runs
$query2=mysqli_query($conn,"select player_name,sum(ball_to_ball.runs),fours,sixes from ball_to_ball,player where player_id=striker group by striker order by sum(runs) desc LIMIT 5");
$row2=mysqli_fetch_row($query2);
//Most wickets
$query4=mysqli_query($conn,"select player_name,sum(ball_to_ball.wicket) from ball_to_ball,player where player_id=bowler group by bowler order by sum(wicket) desc LIMIT 5");
$row4=mysqli_fetch_row($query4);


// previous match
$query_prev=mysqli_query($conn," select match_id,t1.team_name,t2.team_name,match_date,team_1,team_2 from matches,team t1,team t2 where match_date<date(now()) and team_1=t1.team_id and t2.team_id=team_2 order by match_date DESC LIMIT 1;");
$row_prev=mysqli_fetch_row($query_prev);
$query_team1=mysqli_query($conn,"select sum(runs),sum(wicket) from ball_to_ball  where match_id='".$row_prev[0]."' and batting_id='".$row_prev[4]."'");
$row_team1= mysqli_fetch_row($query_team1);
$query_team2=mysqli_query($conn,"select sum(runs),sum(wicket) from ball_to_ball  where match_id='".$row_prev[0]."' and batting_id='".$row_prev[5]."'");
$row_team2= mysqli_fetch_row($query_team2);
//result and margin
$query_result=mysqli_query($conn," select result.team_name,matches.won_by,matches.win_type from matches,team result  where result.team_id=matches.result and match_id='".$row_prev[0]."'");
$row_result= mysqli_fetch_row($query_result);



//Live Match
$query_live=mysqli_query($conn," select match_id,t1.team_name,t2.team_name,match_date,team_1,team_2 from matches,team t1,team t2 where match_date=date(now()) and team_1=t1.team_id and t2.team_id=team_2 ");
$row_live=mysqli_fetch_row($query_live);
$query_live_team1=mysqli_query($conn,"select sum(runs),sum(wicket) from ball_to_ball  where match_id='".$row_live[0]."' and batting_id='".$row_live[4]."'");
$row_live_team1= mysqli_fetch_row($query_live_team1);
$query_live_team2=mysqli_query($conn,"select sum(runs),sum(wicket) from ball_to_ball  where match_id='".$row_live[0]."' and batting_id='".$row_live[5]."'");
$row_live_team2= mysqli_fetch_row($query_live_team2);


//Upcoming Match
$query_up=mysqli_query($conn," select match_id,t1.team_name,t2.team_name,match_date,team_1,team_2,venue_name from matches,venue,team t1,team t2 where matches.ven_id=venue.venue_id and match_date>date(now()) and team_1=t1.team_id and t2.team_id=team_2 order by match_date ASC LIMIT 1");
$row_up=mysqli_fetch_row($query_up);


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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	
<?php
session_start();
if(!isset($_SESSION['sess']))
include 'index_nav.php';
else
include 'admin_nav.php';
?>

    <div class='container'>
        <div class="row">
                <img src="images/b5.jpg" width="1200" height="500" alt="Image not avaialable" >
            
	    </div>
	</div>
        
            <div class="box">
                <div class="col-lg-12">     
                    <hr class="visible-xs">
                    <div class="rca-column-4">
          <!--Match Series-->
          <div class="rca-mini-widget rca-top-border  rca-tab-simple">
            
              <div id="iltab-1" class="rca-tab-content active"  >         
                <div class="rca-padding" style="cursor: pointer;" onclick="window.location='match_score.php?matchid='+<?php echo $row_prev[0];?>;">
                  <h3 class="rca-match-title">
                    Previous Match
                  </h3>
                  <div class="rca-top-padding">
                    <div class="rca-batsman striker">
                      <span class="player"><?php echo $row_prev[1]."  " ; ?></span>
                      <span><?php echo $row_team1[0]." / ".$row_team1[1]; ?></span>
                    </div>
                    <div class="rca-batsman">
                      <span class="player"><?php echo $row_prev[2]. "  ";?></span>
                      <span><?php echo $row_team2[0]." / ".$row_team2[1]; ?></span>
                    </div>
                  </div>
                </div>				 
				 
				
                <div class="rca-top-padding rca-score-status">
                  <?php echo $row_result[0].' won by '.$row_result[1].' '.$row_result[2];?>   
                </div>
              </div>
            </div>
          </div>
		   <div class="rca-column-4">
          <!--Match Series-->
          <div class="rca-mini-widget rca-top-border  rca-tab-simple">
            
              <div id="iltab-1" class="rca-tab-content active">         
                <div class="rca-padding"  style="cursor: pointer;" onclick="window.location='match_score.php?matchid='+<?php echo $row_live[0];?>;" >
                  <h3 class="rca-match-title">
                   Live Match
                  </h3>
                  <div class="rca-top-padding">
                    <div class="rca-batsman striker">
                      <span class="player"><?php echo $row_live[1]."  " ; ?></span>
                      <span><?php echo $row_live_team1[0]." / ".$row_live_team1[1]; ?></span>
                    </div>
                    <div class="rca-batsman">
                      <span class="player"><?php echo $row_live[2]."  " ; ?></span>
                      <span><?php echo $row_live_team2[0]." / ".$row_live_team1[1]; ?></span>
                    </div>
              </div>
            </div>
          </div>
		</div>
		</div>

		   <div class="rca-mini-widget rca-top-border  rca-tab-simple">
            
              <div id="iltab-1" class="rca-tab-content active">         
                <div class="rca-padding" style="cursor: pointer;" onclick="window.location='match_score.php?matchid='+<?php echo $row_up[0];?>;" >
                  <h3 class="rca-match-title">
                    Upcoming Match
                  </h3>
                  <div class="rca-top-padding">
                    <div class="rca-batsman striker">
                      <span class="player"><h6><?php echo $row_up[1]."   vs   ".$row_up[2]."</b>" ; ?></h6></span>
                      <span></span>
                    </div>
                    <div class="rca-batsman">
                      <span class="player"><?php echo $row_up[3];?></span>
                      <span><?php echo $row_up[6];?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                    
                
              </div>
            </div>
          
      <h2 class="rca-stats-title">Tournament STATS</h2>
      <div class="rca-row">        
        <div class="rca-column-4">
          <div class="rca-micro-widget rca-stats">
            <div class="rca-match-start">
              <h3>Total Runs</h3>
              <div class="rca-padding">
                <h2><?php echo $row[0];?></h2> 
              </div>
            </div>  
          </div>
          <div class="rca-micro-widget rca-stats">
            <div class="rca-match-start">
              <h3>Total Wickets</h3>
              <div class="rca-padding">
                <h2><?php echo $row1[0];?></h2> 
              </div>
            </div>  
          </div>
        </div>
        <div class="rca-column-4">
          <!--Season Stats-->
          <div class="rca-mini-widget rca-top-border rca-padding rca-stats">
            <div class="rca-clear"></div>
            <h2>
              Most Runs
            </h2>
            <div class="rca-padding">    
              
              <div class="rca-match-start">
                <h3 class=" top-score"><?php echo $row2[0];?></h3>
                <div class="rca-padding">
                  <h2><?php echo $row2[1];?></h2>                  
                  <p class="rca-center">
                   <?php echo $row2[2];?>x4  <?php echo $row2[3];?>x6
                  </p>
                </div>
              </div>
              <div class="rca-row rca-name-tag">
			  
                        <?php
			  $query2=mysqli_query($conn,"select player_name,sum(ball_to_ball.runs),fours,sixes from ball_to_ball,player where player_id=striker group by striker order by sum(runs) desc LIMIT 1,4");
			while($row2=mysqli_fetch_row($query2))
			{ 
           echo   '
                <div class="rca-table">
                  <div class="rca-col rca-name-info">
				  
                    <span class="rca-tag-info"></span>'.$row2[0].'
                  </div>
                  <div class="rca-col rca-tag-info">'.
                    $row2[2].'x4, '.$row2[3].'x6
                  </div>
                  <div class="rca-col rca-name-score">'.
                   $row2[1].'
                  </div>
                </div>';
			}
				?>
               
                
              </div>
            </div>      
          </div>
        </div>

        <div class="rca-column-4">
          <!--Season Stats-->
          <div class="rca-mini-widget rca-top-border rca-padding rca-stats">
            <div class="rca-clear"></div>
            <h2>
              Most Wickets
            </h2>
            <div class="rca-padding">    
              
              <div class="rca-match-start">
                <h3 class="top-bowl"><?php echo $row4[0];?></h3>
                <div class="rca-padding">
                  <h2><?php echo $row4[1];?></h2>                  
                  
                </div>
              </div>
              <div class="rca-row rca-name-tag">
                        <?php
			  $query5=mysqli_query($conn,"select player_name,sum(ball_to_ball.wicket) from ball_to_ball,player where player_id=bowler group by bowler order by sum(wicket) desc LIMIT 1,4");
			while($row5=mysqli_fetch_row($query5))
			{ 
           echo   '
                <div class="rca-table">
                  <div class="rca-col rca-name-info">
				  
                    <span class="rca-tag-info"></span>'.$row5[0].'
                  </div>
                  <div class="rca-col rca-name-score">'.
                   $row5[1].'
                  </div>
                </div>';
			}
				?>
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
