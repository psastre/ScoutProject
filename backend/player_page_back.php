<?php 
  
  if(isset($_GET["id"])){ 
    include_once("../backend/backend.demo.php");

    $playerid = $_GET["id"];

    $query= "SELECT * FROM player WHERE id = $playerid"; 

    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result)
            
        