<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php 
  //include_once("../backend/players.back.php");
  if(isset($_GET["id"])){ 
    include_once("../backend/backend.demo.php");

    $teamid = $_GET["id"];

    $query= "SELECT team.teamID, team.teamPhoto, team.teamName, league.leagueName FROM team
    INNER JOIN  league ON team.teamLeague = league.leagueID
    WHERE teamID = $teamid"; 


    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);


    $queryplayers = "SELECT * FROM player WHERE team = $teamid";
    $resultplayers = mysqli_query($conn, $queryplayers);
    $countplayers = mysqli_num_rows($resultplayers);
    $rowplayers = mysqli_fetch_assoc($resultplayers)
            
        ?>

    <img class="player_img" src="../img/<?php echo $row['teamPhoto']; ?>.jpg" alt="">
    <h4>Nombre: <?php echo $row["teamName"]; ?></h4>
    
    <h4>Liga:  <?php echo $row["leagueName"]; ?></h4>

    <?php
        while($row = mysqli_fetch_assoc($rTeam)){
    ?>            
        <img class="player_img" src="../img/<?php echo $rowplayers['photo']; ?>.jpg" alt="">
        <h3><?php echo $rowplayers['name']; ?></h3>
        <h3><?php echo $rowplayers['age']; ?></h3>
                      
                    
    <?php } ?>
    

  <?php }else{echo "no se encontro registro";}; ?>


</body>
</html>