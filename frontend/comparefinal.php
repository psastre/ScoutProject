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
            <div class="title_container" style=font-size:1.5em><a href="index.php">Comparative Analysis</a></div>
            <div class="user_container"><a href=""><img src="../img/Iconos/user-circle-svgrepo-com(2).svg" alt=""></a></div>
        </div>

        <?php 
        if(isset($_GET["firstid"])&& isset($_GET["secondid"])){ 
          include_once("../backend/backend.demo.php");

          $player1id = $_GET["firstid"];

          $queryp1= "SELECT * FROM player WHERE id = $player1id"; 

          $resultp1 = mysqli_query($conn, $queryp1);
          $countp1 = mysqli_num_rows($resultp1);
          $rowp1 = mysqli_fetch_assoc($resultp1);

          $player2id = $_GET["secondid"];

          $queryp2= "SELECT * FROM player WHERE id = $player2id"; 

          $resultp2 = mysqli_query($conn, $queryp2);
          $countp2 = mysqli_num_rows($resultp2);
          $rowp2 = mysqli_fetch_assoc($resultp2);
                  
        ?>

       
    
    

   
    <div class="player_analysis_table compare_table">
       <div class="compare_players compare_players_left">
            <div class="compare_players_basic">
                <div class="compare_players_basic_photo">
                    <img src="../img/<?php echo $rowp1['lastname']; ?>.jpg" alt="">
                </div>
                <div class="compare_players_basic_info">
                    <div class="compare_players_basic_info_name">
                        <h3><?php echo $rowp1["name"]; ?> <?php echo $rowp1["lastname"]; ?></h3>
                    </div>
                    <div class="compare_players_basic_info_others">
                        <div class="compare_players_basic_info_other_unit">
                            <h4>Age    <?php echo $rowp1["age"]; ?></h4>
                        </div>
                        <div class="compare_players_basic_info_other_unit">
                            <h4>Age    <?php echo $rowp1["age"]; ?></h4>
                        </div>
                        <div class="compare_players_basic_info_other_unit">
                             <h4>Age    <?php echo $rowp1["age"]; ?></h4>
                        </div>
                        <div class="compare_players_basic_info_other_unit">
                            <h4>Age    <?php echo $rowp1["age"]; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="compare_players_detail">
                <img src="../img/graph2.jpg" alt="">
                <img src="../img/graph3.jpg" alt="">
                <img src="../img/graph4.jpg" alt="">
                <img src="../img/graph5.jpg" alt="">
               
            </div>
       </div>
       <div class="compare_players compare_players_right">
            <div class="compare_players_basic">
                <div class="compare_players_basic_photo">
                    <img src="../img/<?php echo $rowp2['lastname']; ?>.jpg" alt="">
                </div>
                <div class="compare_players_basic_info">
                    <div class="compare_players_basic_info_name">
                        <h3><?php echo $rowp2["name"]; ?> <?php echo $rowp2["lastname"]; ?></h3>
                    </div>
                    <div class="compare_players_basic_info_others">
                        <div class="compare_players_basic_info_other_unit">
                            <h4>Age    <?php echo $rowp2["age"]; ?></h4>
                        </div>
                        <div class="compare_players_basic_info_other_unit">
                            <h4>Age    <?php echo $rowp1["age"]; ?></h4>
                        </div>
                        <div class="compare_players_basic_info_other_unit">
                             <h4>Age    <?php echo $rowp1["age"]; ?></h4>
                        </div>
                        <div class="compare_players_basic_info_other_unit">
                            <h4>Age    <?php echo $rowp1["age"]; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="compare_players_detail">
                <img src="../img/graph2.jpg" alt="">
                <img src="../img/graph3.jpg" alt="">
                <img src="../img/graph4.jpg" alt="">
                <img src="../img/graph5.jpg" alt="">
               
            </div>
       </div>


      
    </div>
    </div>
    </div>

       



        
</body>
</html>


<!--
<div class="top_main_player_info">
            <img src="../img/<?php echo $rowp1['lastname']; ?>.jpg" alt="">
            <h4><?php echo $row["name"]; ?> <?php echo $row["lastname"]; ?></h4>
          </div>
          <div class="bottom_main_player_info">
            <div>
            <h5>Age</h5><h4><?php echo $row["age"]; ?></h4>
            </div>
            <div>
            <h5>Club</h5><h4>Club</h4>
            </div>
            <div>
            <h5>Position</h5><h4>Position</h4>
            </div>
            <div>
            <h5>Country</h5><h4></h4>
            </div>
            
          </div>
        <?php }else{echo "no se encontro registro";}; ?>