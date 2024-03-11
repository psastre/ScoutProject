

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
            <div class="title_section"><h4>Log In</h4></div>
          <div class="signup_container">
            <form action="../backend/login.inc.php" method="post" class="signUp_form" id="login-form" style="justify-content: flex-start;" >
        <p class="login-form-message"></p>
      <div class="form-input">
        <label>
          <input id="login_email" name="email" type="text" placeholder="Email">
          
        </label>
      </div>
      <div class="form-input">
        <label>
        
          <input id="login_password" name="pwd" type="password" placeholder="Password">
          
         
          
        </label>
      </div>
      
      <button type="submit" name="submit" href="#" id="form-login" class="bttn bttn-primary" style="width: 500px;">Log In</button>
        <a class="password_forgot">Forgot password</a>
      
      
    </form>
                               
        </div>
        </div>
    </div>

       



        
</body>
</html>