
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

            <form action="../backend/createMatch.inc.php" method="post" >
                              
                                <p class="form-message"></p>
                                    <div class="form-double">
                                        <input type="text" id="form-name" name="name" class="firstName" placeholder="Nombre" >
                                        <input type="text" id="form-lastname" name="lastname" class="lastName" placeholder="Apellido">
                                    </div>
                                    
                                    <div class="form-double">
                                        <input type="text"  name="nationality" class="nationality" id="nationality" placeholder="Nacionalidad"  >
                                      <input type="number" pattern="[0-9]{7,15}" name="phone" class="telephoneNumber" id="phone-code" placeholder="Celular"  >
                                    </div>
                                    <div class="form-double">
                                        <input type="text"  name="email" class="email-input" id="form-email" placeholder="Correo Electrónico"  >
                                    </div>
                                    <div class="form-double">
                                        <input type="password" id="password" class="password-input" name="password" placeholder="Contraseña" >

                                        <input type="password" id="password-code" class="password-input" name="passwordRepeat" placeholder="Confirmar contraseña" >
                                    </div>
                                    <input type="checkbox" onclick="togglePassword()" > Mostrar Contraseña
                                    
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