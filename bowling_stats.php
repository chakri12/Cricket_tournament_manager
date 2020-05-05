<?php include 'dbcon.php';


//total wickets
$query1=mysqli_query($conn,"select sum(wicket) from ball_to_ball");
$row1=mysqli_fetch_row($query1);

$query=mysqli_query($conn,"select count(*) from ball_to_ball where runs=0");
$row=mysqli_fetch_row($query);




 ?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style-1.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/paytm.css">
	
<!--
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="description" content="">
    <meta name="author" content="">

    <title>IPL-Indian Premier League</title>

	-->
	 <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    
   <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
	
	
	<title>IPL-Indian Preimer League</title>
</head>	
	
	<body>
	<?php
session_start();
if(!isset($_SESSION['sess']))
include 'index_nav.php';
else
include 'admin_nav.php';
?>
	<main class="cd-main-content">
		
		
		<div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
				<ul class="cd-filters">
					<li class="placeholder"> 
					</li> 
					<li class="filter" data-filter=".color-2"><a href="stats.php" data-type="Batting">Batting</a></li>
					<li class="filter" data-filter=".color-2"><a href="bowling_stats.php" data-type="Bowling">Bowling</a></li>
				</ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->
     <div class="rca-container rca-margin">
		<section class="cd-gallery">
			 <!--Whole Container -->
    
	<div class="rca-container rca-margin">
      <!--Widget Outer-->
      <div class="rca-row">
        <!--Widget Inner -->
        <div class="rca-column-12">
        </div>
      </div>

      
    
	      <div class="rca-clear"></div>
      <div class="rca-row">        
        <div class="rca-column-4">
          <div class="rca-micro-widget rca-stats">
            <div class="rca-match-start">
              <h3>Tournament Wickets</h3>
              <div class="rca-padding">
                <h2><?php echo $row1[0];?></h2> 
              </div>
            </div>  
          </div>
          <div class="rca-micro-widget rca-stats">
            <div class="rca-match-start">
              <h3>Tournament Dot balls</h3>
              <div class="rca-padding">
                <h2><?php echo $row[0];?></h2> 
              </div>
            </div>  
          </div>
        </div>
	
      <div class="rca-column-4" style="cursor: pointer;" onclick="window.location='complete_stats.php?stat=wickets';">
          <!--Season Stats-->
          <div class="rca-mini-widget rca-top-border rca-padding rca-stats">
            <div class="rca-clear"></div>
            <h2>
              Most Wickets
            </h2>
            <div class="rca-padding">    
              
              <div class="rca-match-start">
               
              </div>
              <div class="rca-row rca-name-tag" id='mostwickets'>
			  
                        <?php
			  $query2=mysqli_query($conn,"select player_name,wickets from player order by wickets DESC LIMIT 5");
			while($row2=mysqli_fetch_row($query2))
			{ 
           echo   '
                <div class="rca-table">
                  <div class="rca-col rca-name-info">
				  
                    <span class="rca-tag-info"></span>'.$row2[0].'
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
       
        <div class="rca-column-4" style="cursor: pointer;" onclick="window.location='complete_stats.php?stat=economy';">
          <!--Season Stats-->
          <div class="rca-mini-widget rca-top-border rca-padding rca-stats">
            <div class="rca-clear"></div>
             <h2>
			 Best Economy
            </h2>
            <div class="rca-padding">    
              
              <div class="rca-match-start">
                
              </div>
              <div class="rca-row rca-name-tag" id='besteconomy'>
			  
                        <?php
			  $query2=mysqli_query($conn,"select player_name,economy from player order by economy DESC LIMIT 5");
			while($row2=mysqli_fetch_row($query2))
			{ 
           echo   '
                <div class="rca-table">
                  <div class="rca-col rca-name-info">
				  
                    <span class="rca-tag-info"></span>'.$row2[0].'
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
        
			
     <div id="tab-41" class="rca-tab-content rca-padding active"> 
		 <div class="rca-clear"></div>
      <div class="rca-row">        
        	 
		<div class="rca-column-4" style="cursor: pointer;" onclick="window.location='complete_stats.php?stat=dots';">
          <!--Season Stats-->
          <div class="rca-mini-widget rca-top-border rca-padding rca-stats">
            <div class="rca-clear"></div>
            <h2>
             Most Dot balls
            </h2>
            <div class="rca-padding">    
              
              <div class="rca-match-start">
                
              </div>
              <div class="rca-row rca-name-tag" id='mostdot'>
			  
                        <?php
			  $query2=mysqli_query($conn,"select player_name,dots from player  order by dots desc LIMIT 5");
			while($row2=mysqli_fetch_row($query2))
			{ 
           echo   '
                <div class="rca-table">
                  <div class="rca-col rca-name-info">
				  
                    <span class="rca-tag-info"></span>'.$row2[0].'
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

		
		<div class="rca-column-4" style="cursor: pointer;" onclick="window.location='complete_stats.php?stat=bowling_avg';">
          <!--Season Stats-->
          <div class="rca-mini-widget rca-top-border rca-padding rca-stats">
            <div class="rca-clear"></div>
            <h2>
              Best Bowling average
            </h2>
            <div class="rca-padding">    
              
              <div class="rca-match-start">
                
              </div>
              <div class="rca-row rca-name-tag" id='bowlingavg'>
			  
                        <?php
			  $query2=mysqli_query($conn,"select player_name,bowling_avg from player  order by bowling_avg desc LIMIT 5");
			while($row2=mysqli_fetch_row($query2))
			{ 
           echo   '
                <div class="rca-table">
                  <div class="rca-col rca-name-info">
				  
                    <span class="rca-tag-info"></span>'.$row2[0].'
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

		
		 
		<div class="rca-column-4" style="cursor: pointer;" onclick="window.location='complete_stats.php?stat=runs_con';">
          <!--Season Stats-->
          <div class="rca-mini-widget rca-top-border rca-padding rca-stats">
            <div class="rca-clear"></div>
            <h2>
              Most Runs conceeded
            </h2>
            <div class="rca-padding">    
              
              <div class="rca-match-start">
                
              </div>
              <div class="rca-row rca-name-tag" id='runscon'>
			  
                        <?php
			  $query2=mysqli_query($conn,"select sum(ball_to_ball.runs),player_name from ball_to_ball,player where bowler=player_id group by bowler order by sum(ball_to_ball.runs) DESC LIMIT 5");
			while($row2=mysqli_fetch_row($query2))
			{ 
           echo   '
                <div class="rca-table">
                  <div class="rca-col rca-name-info">
				  
                    <span class="rca-tag-info"></span>'.$row2[0].'
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
		
		

     
        <div class="rca-column-3"></div>
        <div class="rca-clear"></div>
      </div>
	</div>
		</section>
		<div class="cd-filter" id='filterstats'>
			<form>
				

				<div class="cd-filter-block">
					<h4>Team</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter=".check1" type="checkbox" id="checkbox1" value='all' name='team' checked>
			    			<label class="checkbox-label" for="checkbox1">ALL</label>
						</li>
						<li>
							<input class="filter" data-filter=".check1" type="checkbox" id="checkbox1" value='1' name='team'>
			    			<label class="checkbox-label" for="checkbox1">KKR</label>
						</li>

						<li>
							<input class="filter" data-filter=".check2" type="checkbox" id="checkbox2" value='2'name='team'>
							<label class="checkbox-label" for="checkbox2">RCB</label>
						</li>

						<li>
							<input class="filter" data-filter=".check3" type="checkbox" id="checkbox3" value='3' name='team'>
							<label class="checkbox-label" for="checkbox3">CSK</label>
						</li>
						<li>
							<input class="filter" data-filter=".check4" type="checkbox" id="checkbox4" value='4' name='team'>
			    			<label class="checkbox-label" for="checkbox4">KXIP</label>
						</li>

						<li>
							<input class="filter" data-filter=".check5" type="checkbox" id="checkbox5" value='7' name='team'>
							<label class="checkbox-label" for="checkbox5">MI</label>
						</li>

						<li>
							<input class="filter" data-filter=".check6" type="checkbox" id="checkbox6" value='5' name='team'>
							<label class="checkbox-label" for="checkbox6">RR</label>
						</li>
						<li>
							<input class="filter" data-filter=".check7" type="checkbox" id="checkbox7" value='6' name='team'>
			    			<label class="checkbox-label" for="checkbox7">DD</label>
						</li>

						<li>
							<input class="filter" data-filter=".check8" type="checkbox" id="checkbox8" value='8' name='team'>
							<label class="checkbox-label" for="checkbox8">SRH</label>
						</li>

					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Age</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
								<option value="all">All</option>
								<option value="20 and 25">20-25</option>
								<option value="25 and 30">25-30</option>
								<option value="30 and 35">30-35</option>
								<option value="35 and 50">35-50</option>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Country</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" value="all" checked>
							<label class="radio-label" for="radio1">All</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2" value="India">
							<label class="radio-label" for="radio2">India</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3" value="Overseas">
							<label class="radio-label" for="radio3">Overseas</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
			</form>

			<a href="#0" class="cd-close">Close</a>
		</div> <!-- cd-filter -->

		<a href="#0" class="cd-filter-trigger">Filters</a>
	</main> <!-- cd-main-content -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<script>
//var value = $('#selectThis:selected').text();
$(document).ready(function(){
	
	$(document).change(function(){
	var country = $("input[name='radioButton']:checked").val();
	var age= $('#selectThis').val();
	var teams = new Array();
	$("input:checkbox[name='team']:checked").each(function(){
    teams.push($(this).val());
	});
	$.post("fetch_data_wickets.php", {age:age,country:country,teams:teams}, function(result){
	$('#mostwickets').html(result);
    });
	$.post("fetch_data_eco.php", {age:age,country:country,teams:teams}, function(result){
	$('#besteconomy').html(result);
	});
    $.post("fetch_data_dot.php", {age:age,country:country,teams:teams}, function(result){
	$('#mostdot').html(result);
	});
	$.post("fetch_data_bowavg.php", {age:age,country:country,teams:teams}, function(result){
	$('#bowlingavg').html(result);
	});
	$.post("fetch_data_bowsr.php", {age:age,country:country,teams:teams}, function(result){
	$('#runscon').html(result);
	});
	});
	
	
	
	
});

</script>
</body>
</html>