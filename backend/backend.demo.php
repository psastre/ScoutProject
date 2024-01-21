<?php

$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "scouting_project";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);
$conn->set_charset("utf8");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$queryPlayer = "SELECT * FROM player";
$rPlayer = mysqli_query($conn, $queryPlayer);


$queryTeam = "SELECT team.teamID, team.teamPhoto, team.teamName, league.leagueName FROM team
    INNER JOIN  league ON team.teamLeague = league.leagueID";
$rTeam = mysqli_query($conn, $queryTeam);

$queryGame = "SELECT
GROUP_CONCAT(goal.goalID) AS Goles,
game.gameID AS GameIDs,
game.gameDate AS Dates,
SUBSTRING_INDEX(GROUP_CONCAT(team.teamName), ',', 1) AS Equipo1,
SUBSTRING_INDEX(GROUP_CONCAT(team.teamName), ',', -1) AS Equipo2


FROM
game
JOIN
game_team ON game.gameID = game_team.game_id
JOIN
team ON team.teamID = game_team.team_id
JOIN
goal ON goal.goalGame = game.gameID 
GROUP BY
game.gameID";

$rGame = mysqli_query($conn, $queryGame);

$rowGame = mysqli_fetch_assoc($rGame);
$rowTeam = mysqli_fetch_assoc($rTeam);




