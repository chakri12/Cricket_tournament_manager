<?php

include 'dbcon.php';

$teams=$_POST['teams'];
$team=json_encode($teams);
$team = trim($team, '[]');
$age=$_POST['age'];
$country=$_POST['country'];

//total ".$_POST['stattype']."
$query=mysqli_query($conn,"select sum(".$_POST['stattype'].") from ball_to_ball");
//$row=mysqli_fetch_row($query);

//total runs_con
$query1=mysqli_query($conn,"select sum(wicket) from ball_to_ball");
//$row1=mysqli_fetch_row($query1);
if($age!='all' && $country=='India' && (strpos($team, 'all') == false))
$query5=" select player_name,player_id,player.".$_POST['stattype']." from player,team where player.team_id=team.team_id and player.team_id in (".$team.") and player.country='".$country."' and 2008-year(DOB) between ".$age." order by ".$_POST['stattype']." desc  ";
else if($age=='all' && $country=='Overseas' && (strpos($team, 'all') == false))
$query5=" select player_name,player.".$_POST['stattype']." from player,team where player.team_id=team.team_id and player.team_id in (".$team.")  and player.country!='India' order by ".$_POST['stattype']." desc  ";
else if($age!='all' && $country=='Overseas' && (strpos($team, 'all') == false))
$query5=" select player_name,player_id,player.".$_POST['stattype']." from player,team where player.team_id=team.team_id and player.team_id in (".$team.") and player.country!='India' and 2008-year(DOB) between ".$age." order by ".$_POST['stattype']." desc  ";
else if($age!='all' && $country=='all' && (strpos($team, 'all') == false))
$query5=" select player_name,player_id,player.".$_POST['stattype']." from player,team where player.team_id=team.team_id and player.team_id in (".$team.") and 2008-year(DOB) between ".$age." order by ".$_POST['stattype']." desc  ";
else if($age=='all' && $country=='India' && (strpos($team, 'all') == false))
$query5=" select player_name,player_id,player.".$_POST['stattype']." from player,team where player.team_id=team.team_id and player.team_id in (".$team.")  and player.country='India' order by ".$_POST['stattype']." desc  ";
else if($age=='all' && $country=='all' && (strpos($team, 'all') == false))
$query5=" select player_name,player_id,player.".$_POST['stattype']." from player,team where player.team_id=team.team_id and player.team_id in (".$team.") order by ".$_POST['stattype']." desc  ";
else if($age!='all' && $country=='India' && (strpos($team, 'all') !== false))
$query5=" select player_name,player_id,player.".$_POST['stattype']." from player,team where player.team_id=team.team_id and player.country='".$country."' and 2008-year(DOB) between ".$age." order by ".$_POST['stattype']." desc  ";
else if($age=='all' && $country=='Overseas' && (strpos($team, 'all') !== false))
$query5=" select player_name,player_id,player.".$_POST['stattype']." from player,team where player.team_id=team.team_id  and player.country!='India' order by ".$_POST['stattype']." desc  ";
else if($age!='all' && $country=='Overseas' && (strpos($team, 'all') !== false))
$query5=" select player_name,player_id,player.".$_POST['stattype']." from player,team where player.team_id=team.team_id  and player.country!='India' and 2008-year(DOB) between ".$age." order by ".$_POST['stattype']." desc  ";
else if($age!='all' && $country=='all' && (strpos($team, 'all') !== false))
$query5=" select player_name,player_id,player.".$_POST['stattype']." from player,team where player.team_id=team.team_id  and 2008-year(DOB) between ".$age." order by ".$_POST['stattype']." desc  ";
else if($age=='all' && $country=='India' && (strpos($team, 'all') !== false))
$query5=" select player_name,player_id,player.".$_POST['stattype']." from player,team where player.team_id=team.team_id and player.country='India' order by ".$_POST['stattype']." desc  ";
else if($age=='all' && $country=='all' && (strpos($team, 'all') !== false))
$query5=" select player_name,player_id,player.".$_POST['stattype']." from player,team where player.team_id=team.team_id  order by ".$_POST['stattype']." desc  ";



//print_r($query5);
//Most ".$_POST['stattype']."
$query2=mysqli_query($conn,$query5);
//Most runs_con
$query4=mysqli_query($conn,"select player_name,sum(ball_to_ball.wicket) from ball_to_ball,player where player_id=bowler group by bowler order by sum(wicket) desc  ");
//$row4=mysqli_fetch_row($query4);

$output='';

while($row2=mysqli_fetch_row($query2))
{
	$output.=  "<tr>

					<td><a href=player_profile.php?id=".$row2[1].">". $row2[0] . "</td>
					<td>".$row2[2]."</td>
					</tr>";
                		
}


//Most Runs
//$query

echo $output;

?>