

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
            <div class="title_section"><h4>Create your profile</h4></div>
            <div class="signup_container">
                <form action="../backend/signup.inc.php" method="post" class="signUp_form >
                                
                                    <p class="form-message"></p>
                                        
                                            <input type="text" id="form-name" name="name" class="firstName" placeholder="Name" >
                                            <input type="text" id="form-lastname" name="lastname" class="lastName" placeholder="Lastname">
                                        
                                        
                                        
                                            <input type="text"  name="nationality" class="nationality" id="nationality" placeholder="Nacionality"  >
                                        <input type="number" pattern="[0-9]{7,15}" name="phone" class="telephoneNumber" id="phone-code" placeholder="Phone"  >
                                        
                                        
                                            <input type="text"  name="email" class="email-input" id="form-email" placeholder="Email"  >
                                        
                                        
                                            <input type="password" id="password" class="password-input" name="password" placeholder="Password" >

                                            <input type="password" id="password-code" class="password-input" name="passwordRepeat" placeholder="Repeat Password" >
                                            <div class="form-double">
                                            <input type="checkbox" onclick="togglePassword()" style="margin: 0;padding: 0;width: 15px;"> <p class="show_password">Show Password</p>
                                            </div>
                                        <!--<div class="col-md-12">
                                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                                <label style="margin-bottom:20px;" class="custom-control-label" for="defaultUnchecked">Acepto los <a style="color:#034783;" href="terminos-y-condiciones.html">términos y condiciones</a></label>
                                        </div>-->
                                        
                                        <button type="submit" name="submit" id="form-submit" class="bttn bttn-primary" >Sign Up</button>
                                        <a href="formLogIn.php" onclick='myFunction()' >Already Login</a>
                                        
    
                </form>
            </div>
                               
        </div>
    </div>

       



        
</body>
</html>