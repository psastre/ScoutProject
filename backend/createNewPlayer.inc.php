<?php

if(isset($_POST["submit"])){
   $firstName = $_POST["name"];
   $lastName = $_POST["lastname"];
   $nationality = $_POST["nationality"];
   $age = $_POST["age"];
   $team = $_POST["team"];
   $position = $_POST["position"];
   $foot = $_POST["foot"];
   $games = $_POST["games"];
   
  

   

   $clientCreateDate = new DateTime();
   $clientCreateDate = $clientCreateDate->format('d/m/Y') . PHP_EOL;

   $clientExpirateDate = new DateTime();
   $clientExpirateDate->add(new DateInterval('P30D'));
  $clientExpirateDate = $clientExpirateDate->format('d/m/Y') . PHP_EOL;
   
   
   $createDate = new DateTime();
   $createDate -> setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
   $createDate = $createDate->format('d/m/Y') . PHP_EOL;
   $createTime = new DateTime();
   $createTime -> setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
   $createTime = $createTime->format('H:i:s') . PHP_EOL;

   $errorEmpty = false;
   $errorEmail = false;
   $errorPhone = false;
   $errorName = false;
   $errorLast = false;
   $errorPassword = false;
    
   require_once  'dbh.inc.php';
   require_once 'function.inc.php';

   if(emptyInputSignup($firstName,  $lastName, $age, $team,  $position, $nationality, $games , $foot) !== false){
    echo"<span class='form-error'> • Completa todos los campos</span><br>";
    $errorEmpty=true;
    
    
   }
   if(invalidfirstName($firstName) !== false){
    echo"<span class='form-error'> • El campo de nombre no puede tener números ni signos de puntuación</span><br>";
    $errorName=true;
    
   }
   if(invalidfirstName($lastName) !== false){
    echo"<span class='form-error'> • El campo de apellido no puede tener números ni signos de puntuación</span><br>";
    $errorLast=true;
    
   }
   if(invalidPhone($age) !== false){
    echo"<span class='form-error'> • El campo del celular no puede tener letras ni signos de puntuación</span><br>";
    $errorPhone=true;
    
   }
   
  
 
   
  
   ?>
   <script>
 var errorEmpty = "<?php echo $errorEmpty; ?>";
var errorEmail = "<?php echo $errorEmail; ?>";
var errorPhone = "<?php echo $errorPhone; ?>";
var errorName = "<?php echo $errorName; ?>";
var errorLast = "<?php echo $errorLast; ?>";
var errorPassword = "<?php echo $errorPassword; ?>";


if (errorEmpty == true){
   $("#form-name, #form-lastname, #phone-code, #form-email, #password, #password-code").addClass("input-error");
   
 }else{
   $("#form-name, #form-lastname, #phone-code, #form-email, #password, #password-code").removeClass("input-error");
 }
if (errorEmail == true){
   $("#form-email").addClass("input-error");   
}else{
   $("#form-email").removeClass("input-error");
 }
if (errorPhone == true){
   $("#phone-code").addClass("input-error");
}else{
   $("#phone-code").removeClass("input-error");
 }
if (errorName == true){
   $("#form-name").addClass("input-error");
}else{
   $("#form-name").removeClass("input-error");
 }
if (errorLast == true){
   $("#form-lastname").addClass("input-error");
}else{
   $("#form-lastname").removeClass("input-error");
 }
if (errorPassword == true){
   $("#password,  #password-code").addClass("input-error");
}else{
   $("#password,  #password-code").removeClass("input-error");
 }

</script>

<?php

  if($errorEmpty == true || $errorEmail == true ||  $errorPhone == true || $errorName == true || $errorLast == true || $errorPassword == true  ){ exit();}



   createPlayer($conn, $firstName,  $lastName, $age, $team,  $position, $nationality, $games , $foot, $clientCreateDate);
   
   ?>
     <script>
       if (errorEmpty == false && errorEmail == false && errorPhone == false && errorName == false && errorLast == false && errorPassword == false ){
         window.location.href = "http://localhost/ScoutingProject/frontend/index.php?user=creado";
       }
     </script>
    <?php

   
   
   exit();
 
  
    
}else{
    header("location:../frontend/index.php");
}