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
team.teamID,
team.teamName,
GROUP_CONCAT(game.GameID) AS GameIDs,
GROUP_CONCAT(game.gameDate) AS Dates,
GROUP_CONCAT(team.teamName) AS Equipos
FROM
game
JOIN
game_team ON game.gameID = game_team.game_id
JOIN
team ON team.teamID = game_team.team_id
GROUP BY
game.gameID";

$rGame = mysqli_query($conn, $queryGame);

$rowGame = mysqli_fetch_assoc($rGame);
$rowTeam = mysqli_fetch_assoc($rTeam);

print_r($rowGame);


SELECT
  
    hola.GameIDs,
    hola.Dates,
    SUBSTRING_INDEX(hola.Equipos, ',', 1) AS Equipo1,
    SUBSTRING_INDEX(hola.Equipos, ',', -1) AS Equipo2
FROM (
SELECT

GROUP_CONCAT(DISTINCT game.gameID SEPARATOR ', ') AS GameIDs,
GROUP_CONCAT(DISTINCT game.gameDate SEPARATOR ', ') AS Dates,
    
GROUP_CONCAT(team.teamName) AS Equipos
FROM
game
JOIN
game_team ON game.gameID = game_team.game_id
JOIN
team ON team.teamID = game_team.team_id
GROUP BY
game.gameID
    ) as hola;