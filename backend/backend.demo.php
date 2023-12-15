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
