<?php
    
    session_start();
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

        

            <div class="title_container"><h3>Select the player for compare</h3></div>
            <div class="user_container"><a href="formSignUp.php"><img src="../img/Iconos/user-circle-svgrepo-com(2).svg" alt=""></a>
            <?php
        if(isset($_SESSION["userEmail"])){
                                    echo"<li><a href='usuario.php?section=general' id='userName_navbar'>" . $_SESSION["userName"] ."</a></li>";
        } ?>
        </div>

        </div>
    
    <?php include_once("../backend/jsonCreator.php"); ?>

    <input type="text" placeholder="Buscar..." class="search_bar" id="search_bar">
    <div class="players_table_complete">
        <div id="filters">
        
            <h4>Filtros</h4>
            <div class="filter position_filter">
                <span>Posicion</span><br/>
            <select name="position_fetchval" id="position_fetchval">
                
                <option value=""></option>
                <option value="DF">DF</option>
                <option value="D">D</option>
                <option value="P">P</option>
                <option value="M">M</option>
            </select>
            </div>
            <div class="filter team_filter">
                <span>Equipo</span><br/>
            <select name="team_fetchval" id="team_fetchval">
                <option value=""></option>
                <option value="Boca">Boca</option>
                <option value="River">River</option>
                <option value="Racing">Racing</option>
                
            </select>
            </div>
            <div class="filter team_filter">
                <span>Pie</span><br/>
            <select name="foot_fetchval" id="foot_fetchval">
                <option value=""></option>
                <option value="IZQ">IZQ</option>
                <option value="DER">DER</option>
                
            </select>
            </div>
        </div>

        <div class="container" id="container">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Jugador</th>
                        <th>Edad</th>
                        <th>Equipo</th>
                        <th>Posicion</th>
                        <th>Nacionalidad</th>
                        <th>PJ</th>
                        <th>Pie</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    while($row = mysqli_fetch_assoc($rPlayer)){
                ?>
                   
                    <tr class="rows_players">
                    <td><img class="player_img" src="../img/<?php echo $row['lastname']; ?>.jpg" alt=""></td>
                        <td><?php echo $row['name'] ." ". $row['lastname']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php 
                            $teamId = $row['team'];
                            $queryTeamId = "SELECT teamName FROM team WHERE teamID = '" . $teamId ."'";
                            $rTeamId = mysqli_query($conn, $queryTeamId);
                            $rowTeamId = mysqli_fetch_assoc($rTeamId);
                            echo $rowTeamId['teamName'];
                            ?></td>
                        <td><?php echo $row['position']; ?></td>
                        <td><?php echo $row['nationality']; ?></td>
                        <td><?php echo $row['gamesPlayed']; ?></td>
                        <td><?php echo $row['foot']; ?></td>
                        <td>
                        <a href="../frontend/comparestest.php?firstid=<?php echo $row["id"]; ?>">Compare</a></div>
                        </td>
                        
                        
                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>

        <script type="text/javascript">
            $(document).ready(function(){
                var searchBar = ""
                $("#search_bar").keyup(function(){
                searchBar = $(this).val();
                    
                })
            
                $("#position_fetchval, #team_fetchval, #foot_fetchval, #search_bar" ).on('change keyup', function(){
                    var positionValue = $("#position_fetchval").val();
                    var teamValue = $("#team_fetchval").val();
                    var footValue = $("#foot_fetchval").val();
                    console.log(footValue);
                    console.log(positionValue);
                    console.log(teamValue);
                    console.log(searchBar)
            

                    $.ajax({
                        url:"fetch.php",
                        type:"POST",
                        data: {position: positionValue, team: teamValue, foot: footValue, searchBar: searchBar } ,
                        
                        beforeSend:function(){
                            $(".container").html("<spam>Buscando...</spam>");
                        },
                        success: function(data){
                            $(".container").html(data)
                        }
                    });
                });
            });

        </script>
        <!--
    <div class="charts">
    <canvas id="myChart"></canvas>
    </div>
    <script type="text/javascript" src="jsonChartScript.js"></script>
    <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
        labels: ['Boca', 'River', 'Racing'],
        datasets: [{
            label: '# of Votes',
            data: teamCount,
            borderWidth: 1
        }]
        },
    
    });
    
    </script>
-->


        
</body>
</html>