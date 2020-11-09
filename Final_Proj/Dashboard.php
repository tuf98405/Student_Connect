<?php

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>t1</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="css/lab2.css">
	<link rel="stylesheet" href="css/styles.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>


	
</head>

<body style="height: 644px;padding: -6px;">
    
			   <div id ="smallerButton">
					<form action="php/Logout.php">
						<input class="btn  btn-primary btn-block" type="submit" value="Logout" />
					</form>
					
					
			   </div>
		<button class="open-button" onclick="openForm()">Open Form</button>


			
			<div class="form-popup" id= "myForm">
									<form action="php/addCourse.php" method="GET" class = "form-container">
									
								<p class= "fancytitle"><strong>Please add course details below</strong></p>
								
										
											<input class="form-control" type="text" name="CourseName" placeholder="Course Name"> 
									    
											<input class="form-control" type="text" name="CourseID" placeholder="Course ID. Ex. CIS 3296"> 
									   
											<input class="form-control" type="text" name="InstructorName" placeholder="Instructor Name. Ex. Mr. John"> 
									   
										    <input class="form-control" type="text" name="Category" placeholder="Category. Ex. Homework, Quizzes, In-class problems"> 
										
										    <input class="form-control" type="text" name="classSection" placeholder="Class Section Number"> 
										
											<button class="btn btn-primary btn-block" type="submit">Add Course</button>
											<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
										
										<p style="color: red;">
											<?php
												echo $_SESSION["Message"];
												$_SESSION["Message"] = "";
											?>
										</p>
								</div>
								<script src="assets/js/jquery.min.js"></script>
								<script src="assets/bootstrap/js/bootstrap.min.js"></script>

			<script>
			function openForm() {
			  document.getElementById("myForm").style.display = "block";
			}

			function closeForm() {
			  document.getElementById("myForm").style.display = "none";
			}
			</script>

</body>

</html>