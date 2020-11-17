<?php
   session_start();
  

   require_once("config.php");
   	 
   
   
   
   
   $Email = $_SESSION["Email"];
   
 
	
    $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
	
   	header("location: ../index.php");
   	exit();
   }
   
  
   //$Squery = "SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = 'henrykombem@gmail.com';";
   $Sresult = mysqli_query($con, $Squery);
   $query = "DELETE FROM `FA20_3296_tul46491`.`Courses_AH` WHERE (SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = '$Email');";
   
   //Make sure info was inserted
   
   $result = mysqli_query($con, $query);
   
   
   
   if(!$result){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   	
   }
  
    
	
   	header("location: ../addCourse.php");
   exit();
   ?>