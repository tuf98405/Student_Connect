<?php
   session_start();
   require_once("config.php");
   	
   
   
   //Add all php mailer stuff
   $CourseName=$_GET["CourseName"];
   $CourseID=$_GET["CourseID"];
   $Category=$_GET["Category"];
   $ClassSection=$_GET["classSection"];
   $InstructorName=$_GET["InstructorName"];
   
   
   
   
   
	
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
   $query = "INSERT INTO Courses_AH(CourseName, CourseID, ACategory,Instructor,Section) values ('$CourseName', '$CourseID', '$Category', '$InstructorName','$ClassSection');";
   
   //Make sure info was inserted
   $result = mysqli_query($con, $query);
   if(!$result){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   	
   }
  
    
	$_SESSION["Email"]= $Email; 
   	header("location:../Dashboard.php");
   exit();
   ?>