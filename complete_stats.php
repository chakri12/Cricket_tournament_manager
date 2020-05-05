<?php include 'dbcon.php';

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

 ?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
     
	 
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
					<li class="filter" data-filter=".color-2"><a href="#0" data-type="Bowling">Batting</a></li>
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

      
    <div class='box'>
	     
	     
		 <div class="table-responsive">
        <table class="table table-bordered table-responsive table-hover">
			<thead>
				<tr>
				    <th>Player Name</th>
					<th colspan="1"><?php echo $_GET['stat'];?></th>

				</tr>
			</thead>
			<tbody id='completedata'>
				<?php include "dbcon.php";?>
				<?php
				$stattype=$_GET['stat'];
				$query=mysqli_query($conn,"select player_name,player_id,".$stattype. " from player where ".$stattype." is not NULL order by ".$stattype." DESC");
					while($row = mysqli_fetch_row($query))
					{
					echo "<tr>";
					//$matchdata=json_encode($row);
					echo "<td><a href=player_profile.php?id=".$row[1].">". $row[0] . "</td>";
					echo "<td>".$row[2]."</td>";
					echo "</tr>";
					}

				?>
				</tbody>
		</table>
		</div>


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
	
	var stattype="<?php echo $_GET['stat']?>";
	var teams = new Array();
	$("input:checkbox[name='team']:checked").each(function(){
    teams.push($(this).val());
	});
	$.post("fetch_data_complete.php", {age:age,country:country,teams:teams,stattype:stattype}, function(result){
		//alert(result);
	$('#completedata').html(result);
    });
	
	});
	
	
	
	
});

</script>
</body>
</html>