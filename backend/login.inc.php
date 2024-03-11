
<?php

if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once "dbh.inc.php";
    require_once "function.inc.php";

    $errorEmpty = false;
    $errorEmail = false;
    $errorPassword = false;
    $emailExistsObj = emailExists($conn, $email);

    if(emptyInputLogin($email, $pwd) !== false){
        echo"<span class='form-error'>Completa todos los campos</span><br>";
        $errorEmpty=true;
        exit();
    }

    if(invalidEmail($email) !== false){
        echo"<span class='form-error'>El mail escrito no es invalido</span><br>";
        $errorEmail=true;
        exit();
    }

    if(emailExists($conn, $email) === false){
    echo"<span class='form-error'>El mail escrito no esta registrado</span>";
    $errorEmail=true;
    exit();
    }
    
    //REVIEW THIS
    $pwdHashed = $emailExistsObj["pwdTest"];
    $checkPwd = password_verify($pwd, $pwdHashed);

 
   
    if($pwdHashed !== $pwd){
        
        echo"<span class='form-error'>Hay un error en la contraseña</span>";
        exit();
    }


      
    
      if($errorEmpty == true || $errorEmail == true ||   $errorPassword == true  ){ exit();}
    
    
    
      loginUser($conn, $email, $pwd);
       
     
       
        ?>
        <script>
         
            window.location.href = "http://localhost/ScoutingProject/frontend/index.php?user=creado";
          
        </script>
       <?php
        
    
        exit();

    
       
    }else{
        header("location:../index.php?conexion-error");
        
    }
    