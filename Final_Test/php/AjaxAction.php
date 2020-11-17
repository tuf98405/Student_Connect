<?php
   session_start();
   $AjaxID = $_POST["AjaxID"];
   
   if($AjaxID =="AddCourse"){

   require_once("config.php");
   	
   
   //Add all php mailer stuff
   $CourseName=$_POST["cn"];
   $CourseID=$_POST["cid"];
   $ClassSection=$_POST["cs"];
   $InstructorName=$_POST["p"];
   
   //$_SESSION["Email"] = "henrykombem@gmail";
   
   $Email = $_SESSION["Email"];
   
   //$test = "henrykombem@gmail.com";
   
   
   
	
    $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
	
   	header("location: ../index.php");
   	exit();
   }
   
   //Login Data Items
   $Acode = rand();
   $Rdatetime = date("Y-m-d h:i:s");
   
   //$Squery = "SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = 'henrykombem@gmail.com';";
   $Sresult = mysqli_query($con, $Squery);
   $query = "INSERT INTO Courses_AH(UID,CourseName, CourseID,Instructor,Section) values ((SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = '$Email' ),'$CourseName', '$CourseID',  '$InstructorName','$ClassSection');";
   
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
}

 if($AjaxID == "DeleteCourse"){
	
	
   require_once("config.php");
   	 
   
   
  // Add all php mailer stuff
   
   $CourseID=$_POST["courseID"];
   
   
   $Email = $_SESSION["Email"];
    echo "$CourseID";
 //$test = "henrykombem@gmail.com";
   

   
	
    $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
     if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
	
   	header("location: ../index.php");
   	exit();
   }
   

   //$Squery = "SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = 'henrykombem@gmail.com';";
    $query = "DELETE FROM `FA20_3296_tul46491`.`Courses_AH` WHERE (`CourseID` = '$CourseID') AND (UID = (SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = '$Email' )) ;";
   $Sresult = mysqli_query($con, $Squery);
  
  
   
   //Make sure info was inserted
   
   $result = mysqli_query($con, $query);
   
   
   
   if(!$result){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   	
   }
  
    
	
  // 	header("location: ../addCourse.php");
   exit(); 
}
   ?>