

<?php
    include_once("../backend/backend.demo.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <body>
    <div id="hero">
      <?php require_once 'left_nav.php'; ?>
      <div class="container_hero">
        <div class="title_user_nav">
          <div class="title_container" style=font-size:1.5em><img src="../img/Iconos/icons8-arrow-left-24.png" alt=""><a href="index.php">Back to database</a></div>
          <div class="user_container"><a href=""><img src="../img/Iconos/user-circle-svgrepo-com(2).svg" alt=""></a></div>
        </div>
        <?php 
          if(isset($_GET["id"])){ 
            include_once("../backend/backend.demo.php");

            $gameid = $_GET["id"];

            $query= "SELECT * FROM game WHERE gameID = $gameid"; 

            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result)
                  
        ?>
        <div class="title_section"><h4>Match</h4></div>
        <div class="match_analysis_container">
          <div class="match_analysis_table">
            <div class="match_teams">
              <div class="match_team_first">
                <div class="match_team_shield">
                <?php 
                              
                $queryGameId = "SELECT teamName, teamID, teamPhoto FROM team 
                  JOIN game_team 
                  ON team.teamID = game_team.team_id
                  WHERE game_id = '" . $gameid ."'
                  LIMIT 1 OFFSET 1";
                  $rGameId = mysqli_query($conn, $queryGameId);
                  while($rowGameId = mysqli_fetch_assoc($rGameId)){
                  
                ?>
                  <img class="player_img" src="../img/<?php echo $rowGameId['teamPhoto']; ?>.png" alt="">
                </div>
                <div class="match_team_score">
                  <?php
                  $teamid= $rowGameId['teamID'];
                  $queryGameScoreSum = "SELECT Count(goalID) AS goalsC FROM goal
                                WHERE goalGame =  '" . $gameid ."' 
                                AND goalTeam =  '" . $teamid ."' ";
                  $rScoreId = mysqli_query($conn, $queryGameScoreSum);
                  while($rowScoreId = mysqli_fetch_assoc($rScoreId)){
                  echo $rowScoreId['goalsC'] ;
                  };
                  };
                ?>
                </div>
              </div> 
              <div class="match_team_separador">-</div>
              <div class="match_team_second">
                <?php 
                  $queryGameSecondTeam = "SELECT teamName, teamID FROM team 
                  JOIN game_team 
                  ON team.teamID = game_team.team_id
                  WHERE game_id = '" . $gameid ."'
                  LIMIT 1 OFFSET 0";
                  $rGameSecondTeamId = mysqli_query($conn, $queryGameSecondTeam);
                  while($rowGameSecondTeam = mysqli_fetch_assoc($rGameSecondTeamId)){
                ?>
                <div class="match_team_score">
                  <?php
                    $secondTeamid= $rowGameSecondTeam['teamID'];
                    $queryGameScoreSumSecondTeam = "SELECT Count(goalID) AS goalsC FROM goal
                                  WHERE goalGame =  '" . $gameid ."' 
                                  AND goalTeam =  '" . $secondTeamid ."' ";
                    $rScoreSecondTeamId = mysqli_query($conn, $queryGameScoreSumSecondTeam);
                    while($rowScoreSecondTeamId = mysqli_fetch_assoc($rScoreSecondTeamId)){
                    echo $rowScoreSecondTeamId['goalsC'] ;
                    };
                    
                  ?>
                </div>
                <div class="match_team_shield">
                  <?php
                    echo $rowGameSecondTeam['teamName'] ;
                  };
                    ?>                                               
                </div>
              </div>
            </div>  

            <!--MATCH DETAILS-->
            <div class="match_details">
              <div class="match_details_team_first">
                                         
                <div class="match_details_team_first_scs">
                  
                    <div class="match_detail_score_title">Score</div>
                    <div class="match_detail_score">
                    <?php 
                    $queryGameId = "SELECT teamName, teamID, teamPhoto FROM team 
                    JOIN game_team 
                    ON team.teamID = game_team.team_id
                    WHERE game_id = '" . $gameid ."'
                    LIMIT 1 OFFSET 1";
                    $rGameId = mysqli_query($conn, $queryGameId);
                    while($rowGameId = mysqli_fetch_assoc($rGameId)){ 
                        $teamid= $rowGameId['teamID'];
                      $queryGameScoreSum = 
                      "SELECT  player.name AS playerName,
                      player.lastname AS playerLastName,
                      goalTime 
                      FROM goal
                      JOIN player ON goal.goalPlayer = player.id
                      WHERE goalGame =  '" . $gameid ."' 
                      AND goalTeam =  '" . $teamid ."' ";
                      $rScoreId = mysqli_query($conn, $queryGameScoreSum);
                      while($rowScoreId = mysqli_fetch_assoc($rScoreId)){
                      echo $rowScoreId['playerName'] ;
                      echo $rowScoreId['playerLastName'] ;
                    
                      echo $rowScoreId['goalTime'] ;
                      ?> </br><?php
                      
                      };
                    };               ?>       
                      
                    </div>
                    
                    <div class="match_detail_score_title">Yellow Card</div>
                    <div class="match_detail_score">
                    <?php 
                    $queryGameId = "SELECT teamName, teamID, teamPhoto FROM team 
                    JOIN game_team 
                    ON team.teamID = game_team.team_id
                    WHERE game_id = '" . $gameid ."'
                    LIMIT 1 OFFSET 1";
                    $rGameId = mysqli_query($conn, $queryGameId);
                    while($rowGameId = mysqli_fetch_assoc($rGameId)){ 
                        $teamid= $rowGameId['teamID'];
                      $queryGameScoreSum = 
                      "SELECT  player.name AS playerName,
                      player.lastname AS playerLastName,
                      yellowCardTime
                      FROM yellowcard
                      JOIN player ON yellowcard.yellowCardPlayer = player.id
                      WHERE yellowCardGame =  '" . $gameid ."' 
                      AND yellowCardTeam =  '" . $teamid ."' ";
                      $rScoreId = mysqli_query($conn, $queryGameScoreSum);
                      while($rowScoreId = mysqli_fetch_assoc($rScoreId)){
                      echo "-".$rowScoreId['playerName'] ;
                      echo $rowScoreId['playerLastName'] ;
                    
                      echo $rowScoreId['yellowCardTime'] ;
                      ?> </br><?php
                      
                      };
                    };               ?>       
                      
                    </div>
                    <div class="match_detail_score_title">Red Card</div>
                    <div class="match_detail_score">
                    <?php 
                    $queryGameId = "SELECT teamName, teamID, teamPhoto FROM team 
                    JOIN game_team 
                    ON team.teamID = game_team.team_id
                    WHERE game_id = '" . $gameid ."'
                    LIMIT 1 OFFSET 1";
                    $rGameId = mysqli_query($conn, $queryGameId);
                    while($rowGameId = mysqli_fetch_assoc($rGameId)){ 
                        $teamid= $rowGameId['teamID'];
                      $queryGameScoreSum = 
                      "SELECT  player.name AS playerName,
                      player.lastname AS playerLastName,
                      redCardTime
                      FROM redcard
                      JOIN player ON redcard.redCardPlayer = player.id
                      WHERE redCardGame =  '" . $gameid ."' 
                      AND redCardTeam =  '" . $teamid ."' ";
                      $rScoreId = mysqli_query($conn, $queryGameScoreSum);
                      while($rowScoreId = mysqli_fetch_assoc($rScoreId)){
                      echo $rowScoreId['playerName'] ;
                      echo $rowScoreId['playerLastName'] ;
                    
                      echo $rowScoreId['redCardTime'] ;
                      ?> </br><?php
                      
                      };
                    };               ?>       
                      
                    </div>
                    <div class="match_detail_score_title">Substitutions</div>
                    <div class="match_detail_score">
                    <?php 
                    $queryGameId = "SELECT teamName, teamID, teamPhoto FROM team 
                    JOIN game_team 
                    ON team.teamID = game_team.team_id
                    WHERE game_id = '" . $gameid ."'
                    LIMIT 1 OFFSET 1";
                    $rGameId = mysqli_query($conn, $queryGameId);
                    while($rowGameId = mysqli_fetch_assoc($rGameId)){ 
                        $teamid= $rowGameId['teamID'];
                      $queryGameScoreSum = 
                      "SELECT  
                      player_outgoing.name AS playerOutgoingName,
                      player_outgoing.lastname AS playerOutgoingLastName,
                      player_incoming.name AS playerIncomingName,
                      player_incoming.lastname AS playerIncomingLastName,
                      substitutionsTime
                      FROM substitutions
                      JOIN player player_outgoing ON substitutions.substitutionsOutgoing = player_outgoing.id
                      JOIN player player_incoming ON substitutions.substitutionsIncoming = player_incoming.id
                      WHERE substitutionsGame =  '" . $gameid ."' 
                      AND substitutionsTeam =  '" . $teamid ."' ";
                      $rScoreId = mysqli_query($conn, $queryGameScoreSum);
                      while($rowScoreId = mysqli_fetch_assoc($rScoreId)){
                      echo $rowScoreId['playerOutgoingName'] ;
                      echo $rowScoreId['playerOutgoingLastName'] ;

                      ?> <p> x </p>   
                      <?php
                    
                       echo $rowScoreId['playerIncomingName'] ;
                       echo $rowScoreId['playerIncomingLastName'] ;
                       echo " ";
                      echo $rowScoreId['substitutionsTime'] ;
                      ?> </br><?php
                      
                      };
                    };               ?>
                     

                      
                    </div>
                  
                  

                </div>
                <div class="match_details_team_first_lineup">
                  <div class="match_details_team_first_lineup_title">
                  <?php 
                              
                              $queryGameId = "SELECT teamName, teamID, teamPhoto FROM team 
                                JOIN game_team 
                                ON team.teamID = game_team.team_id
                                WHERE game_id = '" . $gameid ."'
                                LIMIT 1 OFFSET 1";
                                $rGameId = mysqli_query($conn, $queryGameId);
                                while($rowGameId = mysqli_fetch_assoc($rGameId)){
                                  echo $rowGameId['teamName']; 
                                }
                                
                              ?>
                  </div>
                  <div class="match_details_team_first_lineup_title">Lineup</div>
                  <div class="match_details_team_first_lineup_players">
                  <?php 
                    $queryGameId = "SELECT teamName, teamID, teamPhoto FROM team 
                    JOIN game_team 
                    ON team.teamID = game_team.team_id
                    WHERE game_id = '" . $gameid ."'
                    LIMIT 1 OFFSET 1";
                    $rGameId = mysqli_query($conn, $queryGameId);
                    while($rowGameId = mysqli_fetch_assoc($rGameId)){ 
                        $teamid= $rowGameId['teamID'];
                        $query = "SELECT ";

                        for ($i = 1; $i <= 18; $i++) {
                            $query .= "player{$i}.name AS lineupPlayer{$i}Name, ";
                            $query .= "player{$i}.lastname AS lineupPlayer{$i}LastName, ";
                        }
                        
                        $query = rtrim($query, ", ");
                        
                        $query .= " FROM lineup ";
                        
                        for ($i = 1; $i <= 18; $i++) {
                            $query .= "JOIN player player{$i} ON lineup.lineupPlayer{$i} = player{$i}.id ";
                        }
                        
                        $query .= "WHERE lineupGame = '" . $gameid . "' ";
                        $query .= "AND lineupTeam = '" . $teamid . "' ";
                        
                        
                      $rScoreId = mysqli_query($conn, $query);
                      while($rowScoreId = mysqli_fetch_assoc($rScoreId)){
                        for ($i = 1; $i <= 11; $i++) {
                          echo $rowScoreId["lineupPlayer{$i}Name"];
                          echo " ";
                          echo $rowScoreId["lineupPlayer{$i}LastName"];
                          echo "</br>";
                      }
                      ?><div class="match_details_team_first_lineup_title">Substitutes</div>
                      <?php 
                        for ($i = 11; $i <= 18; $i++) {
                          echo $rowScoreId["lineupPlayer{$i}Name"];
                          echo " ";
                          echo $rowScoreId["lineupPlayer{$i}LastName"];
                          echo "</br>";
                      }
                      
                      };
                    };               ?>            
                      
                  </div>
                  <div class="match_details_team_first_lineup_title">Substitutes</div>
                  <div class="match_details_team_first_lineup_substitutes"></div>
                </div>
              </div>
              <div class="match_details_team_second">
                <div class="match_details_team_first_scs"></div>
                <div class="match_details_team_first_lineup"></div>
              </div>
            </div> 
            <?php }else{echo "no se encontro registro";}; ?>
          </div>
        </div>
      </div>
    </div>   
  </body>
</html>