

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

            <form action="../backend/createNewPlayer.inc.php" method="post" >
                               
                                <p class="form-message"></p>
                                    <div class="form-double">

                                        <input type="text" id="form-name" name="name" class="firstName" placeholder="Nombre" >
                                        <input type="text" id="form-lastname" name="lastname" class="lastName" placeholder="Apellido">
                                    </div>
                                    
                                    <div class="form-double">
                                      
                                      <input type="number"  name="age" class="age_player_form" id="phone-code" placeholder="Age"  >
                                    </div>
                                    <div class="form-double">
                                        <input type="text"  name="team" class="team_player_form" id="form-email" placeholder="Team"  >
                                        <input type="text"  name="games" class="games_player_form" id="form-email" placeholder="Games"  >
                                    </div>
                                    <div class="form-double">
                                        <label for="select_player_position">Select Position:</label>
                                            <select id="select_player_position" name="position" size="1">
                                            <option value="DE">DE</option>
                                            <option value="DF">DF</option>
                                            <option value="ARQ">ARQ</option>
                                            <option value="MED">MED</option>
                                            </select>
                                    </div>
                                    <div class="form-double">
                                        <label for="select_player_position">Foot:</label>
                                            <select id="select_player_position" name="foot" size="1">
                                            <option value="IZQ">IZQ</option>
                                            <option value="DER">DER</option>
                                            </select>
                                    </div>
                                    <div class="form-double">
                                      
                                      <input type="text"  name="nationality" class="nationality_player_form" id="phone-code" placeholder="Nationality"  >
                                    </div>
                                    
                                    
                                    <!--<div class="col-md-12">
                                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                            <label style="margin-bottom:20px;" class="custom-control-label" for="defaultUnchecked">Acepto los <a style="color:#034783;" href="terminos-y-condiciones.html">términos y condiciones</a></label>
                                    </div>-->
                                    
                                    <button type="submit" name="submit" id="form-submit" class="bttn bttn-primary" style="margin: 30px 40% 15px 40%;">Enviar</button>
                                    <a onclick='myFunction()'  style="text-align:center;margin: 20px 24% 25px 38%;">Ya estoy registrado</a>
                                    
    
                                </form>
                               
        </div>
    </div>

       



        
</body>
</html>