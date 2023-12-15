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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  
    <title>Document</title>
</head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>
    <?php include_once("../backend/jsonCreator.php"); ?>
    <div class="players_table_complete">
        <div id="filters">
        <input type="text" placeholder="Buscar..." class="search_bar" id="search_bar">
            <h4>Filtros</h4>
            <div class="filter position_filter">
                <span>Liga</span><br/>
            <select name="position_fetchval" id="position_fetchval">
                
                <option value=""></option>
                <option value="DF">DF</option>
                <option value="D">D</option>
                <option value="P">P</option>
                <option value="M">M</option>
            </select>
            </div>
           

        <div class="container" id="container">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Equipo</th>
                        <th>Liga</th>
                       
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    while($row = mysqli_fetch_assoc($rTeam)){
                ?>
                   
                    <tr class="rows_players">
                    <td><img class="player_img" src="../img/<?php echo $row['teamPhoto']; ?>.jpg" alt=""></td>
                        <td><?php echo $row['teamName']; ?></td>
                        <td><?php echo $row['leagueName']; ?></td>
                       
                        <td>
                            <a href="http://localhost/ScoutingProject/frontend/team.php?id=<?php echo $row['teamID']; ?> " >
                                 Select
                             </a>
                        </td>
                        
                        
                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
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



        
</body>
</html>