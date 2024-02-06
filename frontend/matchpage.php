
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

          $playerid = $_GET["id"];

          $query= "SELECT * FROM player WHERE id = $playerid"; 

          $result = mysqli_query($conn, $query);
          $count = mysqli_num_rows($result);
          $row = mysqli_fetch_assoc($result)
                  
        ?>

        <div class="title_section"><h4>Player Analysis</h4> <a href="../frontend/comparestest.php?firstid=<?php echo $row["id"]; ?>">Compare</a></div>
    
    

   
    <div class="player_analysis_table">
       

        <div class="player_analysis_container" >
          <div class="top_player_analysis_container">
          <div class="left_top_player_analysis_container">

           
          <div class="top_main_player_info">
            <img src="../img/<?php echo $row['lastname']; ?>.jpg" alt="">
            <h4><?php echo $row["name"]; ?> <?php echo $row["lastname"]; ?></h4>
          </div>
          <div class="bottom_main_player_info">
            <div>
            <h5>Age</h5><h4><?php echo $row["age"]; ?></h4>
            </div>
            <div>
            <h5>Club</h5><h4><?php 
                            $teamId = $row['team'];
                            $queryTeamId = "SELECT teamName FROM team WHERE teamID = '" . $teamId ."'";
                            $rTeamId = mysqli_query($conn, $queryTeamId);
                            $rowTeamId = mysqli_fetch_assoc($rTeamId);
                            echo $rowTeamId['teamName'];
                            ?></h4>
            </div>
            <div>
            <h5>Position</h5><h4><?php echo $row["position"]; ?></h4>
            </div>
            <div>
            <h5>Country</h5><h4><?php echo $row["nationality"]; ?></h4>
            </div>
            
          </div>
        <?php }else{echo "no se encontro registro";}; ?>


        </div>  
        <div class="right_top_player_analysis_container">
          <img src="../img/graph1.jpg" alt="">
        </div>
        </div>  
        <div class="bottom_player_analysis_container">
          <div class="right_bottom_player_analysis_container"><img src="../img/graph2.jpg" alt=""></div>
          <div class="middle_bottom_player_analysis_container"><img src="../img/graph3.jpg" alt=""></div>
          <div class="middle_bottom_player_analysis_container"><img src="../img/graph4.jpg" alt=""></div>
          <div class="left_bottom_player_analysis_container"><img src="../img/graph5.jpg" alt=""></div>
        </div>
        

      </div>
        </div>
    </div>
    </div>

       



        
</body>
</html>