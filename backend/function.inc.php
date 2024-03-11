<?php
    
    function emptyInputSignup($firstName,  $lastName, $nationality, $telephoneNumber, $email, $pwd){
       $result;
       if(empty($firstName) || empty($lastName) ||  empty($nationality) || empty($telephoneNumber) || empty($email) || empty($pwd)){
           $result =true;
           
       }
       else{
           $result = false;
       }
       return $result;
    }
   
    function invalidfirstName ($firstName){
       $result;
       if (!preg_match("/^[a-zA-Z\s]*$/", $firstName)){
           $result=true;
       }
       else{
           $result= false;
       }
        return $result;
    }
    function invalidPhone ($telephoneNumber){
       $result;
       if (!preg_match("/^(\s*[0-9]+\s*)+$/", $telephoneNumber)){
           $result=true;
       }
       else{
           $result= false;
       }
        return $result;
    }
    function invalidPwd ($pwd){
       $result;
       if (!preg_match("/(?=^.{8,}$)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $pwd)){
           $result=true;
       }
       else{
           $result= false;
       }
        return $result;
    }
    function invalidEmail ($email){
       $result;
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $result=true;
       }
       else{
           $result= false;
       }
        return $result;
    }
   
    function pwdMatch($pwd, $pwdRepeat){
       $result;
       if($pwd !== $pwdRepeat){
           $result = true;
       }
       else{
           $result=false;
   
       }
       return $result;
    }
   
    function emailExists($conn, $email){
       $sql = "SELECT * FROM users  WHERE  email = ?";
       $stmt = mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt, $sql)){
           header("location:../formSignUp.php?error=stmtfailed");
           exit();
       }
       mysqli_stmt_bind_param($stmt, "s", $email);
       mysqli_stmt_execute($stmt);
   
       $resultData = mysqli_stmt_get_result($stmt);
   
       if($row=mysqli_fetch_assoc($resultData)){
           return $row;
       }
       else{
           $result = false;
           return $result; 
       }
       mysqli_stmt_close($stmt);
    }
   
   
    function createUser( $conn, $firstName,  $lastName, $nationality, $telephoneNumber, $email, $pwd,  $clientCreateDate){
        $sql = "INSERT INTO  users (firstName, lastName, nationality,  telephoneNumber, email, pwd, pwdTest, clientCreateDate) VALUES (?,?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location:../registrarse.php?error=errorcreateuser");
            exit();
        }
    
        $hashedPwd = password_hash( $pwd, PASSWORD_DEFAULT);
    
        mysqli_stmt_bind_param($stmt, "ssssssss", $firstName,  $lastName, $nationality,  $telephoneNumber, $email, $hashedPwd, $pwd, $clientCreateDate);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
 
        session_start();
             $_SESSION["userEmail"]= $email;
             
             $_SESSION["userEmail"]= $email;
             $_SESSION["userStatus"]= 0 ;
             
         
             $_SESSION["userName"] =  $firstName;
             $_SESSION["userLastName"] = $lastName;
             $_SESSION["userTelephone"] = $telephoneNumber;
             
             $_SESSION["userId"] = mysqli_insert_id($conn);
         
         
        
        
     }
    function createPlayer( $conn, $firstName,  $lastName, $age, $team,  $position, $nationality, $games , $foot, $clientCreateDate){
        $sql = "INSERT INTO  player (name, lastname, age,  team, position, nationality, gamesPlayed, foot,  clientCreateDate) VALUES (?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location:../registrarse.php?error=errorcreateuser");
            exit();
        }
    
       
    
        mysqli_stmt_bind_param($stmt, "sssssssss",$firstName,  $lastName, $age, $team,  $position, $nationality, $games , $foot, $clientCreateDate);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
 
       
         
         
        
        
     }
      // LOGIN
    function emptyInputLogin($email, $pwd){
       $result;
       if( empty($email) || empty($pwd)){
           $result =true;
       }
       else{
           $result = false;
       }
       return $result;
    }
   
    function emptyInputContact($name, $phone, $email, $message){
       $result;
       if( empty($name) || empty($phone) || empty($email) || empty($message)){
           $result =true;
       }
       else{
           $result = false;
       }
       return $result;
    }
   
    function loginUser($conn, $email, $pwd){
       $emailExists = emailExists($conn, $email);
   
       if($emailExists === false){
           header("location:../frontend/index.php?error=wronglogin");
           exit();
       }
   
       $pwdHashed = $emailExists["pwd"];
       $checkPwd = password_verify($pwd, $pwdHashed);
   
       if($checkPwd === true){
           header("location:../frontend/index.html?error=wrongpwdlogin");
           exit();
       }
       else if($checkPwd === false){
           session_start();
           $_SESSION["userEmail"]= $emailExists["email"];
          
           $_SESSION["userName"] = $emailExists["firstName"];
           $_SESSION["userLastName"] = $emailExists["lastName"];
           $_SESSION["userTelephone"] = $emailExists["telephoneNumber"];
           $_SESSION["userId"] = $emailExists["id"];
 
           
       }
    }
    
    // ORDER
   
    function emptyOrder($detalle){
       $result;
       if(empty($detalle)){
           $result =true;
       }
       else{
           $result = false;
       }
       return $result;
    }
   
    function createOrder($conn, $userid,  $detalle, $codigoRubro, $createDate, $createTime){
       $sql = "INSERT INTO  pedidos ( detail, userid, codigoRubro, createDate, createTime) VALUES (?,?,?,?,?);";
       $stmt = mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt, $sql)){
           header("location:../contratar.php?error=errorcreateorder");
           exit();
       }
   
       
   
       mysqli_stmt_bind_param($stmt, "sssss",  $detalle, $userid, $codigoRubro, $createDate, $createTime);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_close($stmt);
       
       
    }