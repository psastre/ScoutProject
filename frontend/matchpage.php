

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
    
    

   
    <div class="match_analysis_table">
      <div class="match_teams">
        <div class="match_team_first">
          <div class="match_team_shield">
            <?php 
                           
                           $queryGameId = "SELECT teamName, teamID FROM team 
                           JOIN game_team 
                           ON team.teamID = game_team.team_id
                           WHERE game_id = '" . $gameid ."'
                           LIMIT 1 OFFSET 1";
                           $rGameId = mysqli_query($conn, $queryGameId);
                           while($rowGameId = mysqli_fetch_assoc($rGameId)){
                               echo $rowGameId['teamName'] 
                           

                             

            ?>
          
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
        -
        <div class="match_team_second">
          <div class="match_team_score"></div>
          <div class="match_team_shield"></div>
        </div>

      </div>

    
   

       
         
          

           
         
          
         <?php }else{echo "no se encontro registro";}; ?>


        
        
        
        
        

      
        </div>
    </div>
    </div>

       



        
</body>
</html>