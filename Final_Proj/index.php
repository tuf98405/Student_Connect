<?php
	session_regenerate_id(true);
	session_start();
	if(!isset($_SESSION["regState"])) $_SESSION["regState"] = 8;
	if(!isset($_SESSION["Authenticate"])) $_SESSION["Authenticate"] = 0;
	
	//Display Errors
	error_reporting(E_ALL);
	ini_set('display_errors',1);

	//Read Dropdown Data from a file
	$collegesFile = file('Colleges.txt', FILE_IGNORE_NEW_LINES);
	$collegeMajorsFile = file('CollegeMajors.txt', FILE_IGNORE_NEW_LINES);
	
	


?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title>Final Project</title>
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/fonts/ionicons.min.css">
		<link rel="stylesheet" href="assets/css/Login_Reset_Form.css">
		<link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="css/styles.css">
		
		<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<!-- Latest compiled Bootstrap JS-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		

	

	</head>

	<body>
		<?php
	if ($_SESSION["regState"] <= 0) {
	
?>
			<div class="login-clean">
				<form action="php/Login.php" method="post">
					<h2 class="sr-only">Login Form</h2>
					<div class="illustration"><i class="icon ion-ios-navigate"></i></div>
					<div class="form-group">
						<input class="form-control" type="email" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block" type="submit">Log In</button>
					</div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a style="color: rgb(163, 160, 160); font-size: 15px" href="php/Register.php">Register </a> | <a style="color: rgb(163, 160, 160); font-size: 15px" href="php/ResetPassword.php">Forgot Password</a>
					<p style="color: red;">
						<?php  
							echo $_SESSION["Message"];
							$_SESSION["Message"] = "";   
				        ?>
					</p>
				</form>
			</div>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.min.js"></script>
			<?php
} 
 if($_SESSION["regState"] == 1) {
?>
				<div class="register-photo">
					<div class="form-container">
						<div class="image-holder"></div>
						<form action="php/Register2.php" method="get">
							<h2 class="text-center"><strong>Create</strong> an account.</h2>
							
							<div class="form-group">
								<input class="form-control" type="text" name="FirstName" placeholder="First Name"> </div>
							<div class="form-group">
								<input class="form-control" type="text" name="LastName" placeholder="Last Name"> </div>
							
							<div class="form-group">
								<input class="form-control" type="Username" name="Username" placeholder="Username"> </div>
							<div class="form-group">
								<input class="form-control" type="email" name="Email" placeholder="Email"> </div>
							
							<div class="form-group">
							
								<select style = "width: 100%; height: 36px" id="value" name = "School">
								<option selected value="base">Please Select School</option>
							   <?php 
							   //Read file line by line into dropdown
									foreach($collegesFile as $lines){ //add php code here
									echo "<option value='".$lines."'>$lines</option>";
									}
								?>
								</select>	 
								 
							</div>
							<div class="form-group">
							
								<select style = "width: 100%; height: 36px" id="value" name = "Major">
								<option selected value="base">Please Select Major</option>
							   <?php 
							   //Read file line by line into dropdown
									foreach($collegeMajorsFile as $lines){ //add php code here
									echo "<option value='".$lines."'>$lines</option>";
									}
								?>
								</select>	 
								 
							</div>
								
							<div class="form-group">
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox">I agree to the license terms.</label>
								</div>
							</div>
							<div class="form-group">
								<button class="btn btn-primary btn-block" type="submit"> Sign Up </button>
							</div> <a class="already" href="index.php">
					You already have an account? Login here.
					<?php  
					
						$_SESSION["regState"] = 0;   
					?>
				</a> </form>
					</div>
				</div>
				<script src="assets/js/jquery.min.js"></script>
				<script src="assets/bootstrap/js/bootstrap.min.js"></script>
				<?php
} 
?>

<?php
 if($_SESSION["regState"] == 2) {
	 
?>
						<div class="ResetPassword">
							<form action="php/ResetPassword.php" method="POST">
								<h2 class="sr-only">ResetPassword</h2>
								<div class="illustration"><i class="icon ion-ios-navigate"></i></div>
								<h1 class="" style="font-size: 15px; text-align: center;">Please enter a registered email</h1>
								<div class="form-group">
									<input class="form-control" type="email" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" type="submit">Authenticate</button>
								</div>
								<p style="color: red;">
									<?php
										echo $_SESSION["Message"];
										$_SESSION["Message"] = "";
				
									?>
								</p>
							</form>
						</div>
						<script src="assets/js/jquery.min.js"></script>
						<script src="assets/bootstrap/js/bootstrap.min.js"></script>
						<?php
} 
?>

<?php
 if($_SESSION["regState"] == 3) {
?>
								<div class="SetPassword">
									<form action="php/SetPassword.php" method="POST">
										<h2 class="sr-only">SetPassword</h2>
										<div class="illustration"><i class="icon ion-ios-navigate"></i></div>
										<h1 class="" style="font-size: 15px; text-align: center; white-space: nowrap;">Enter New Password</h1>
										<div class="form-group">
											<input class="form-control" type="password" name="password1" placeholder="New Password">
										</div>
										<div class="form-group">
											<input class="form-control" type="password" name="password2" placeholder="Re-enter Password">
										</div>
										<div class="form-group">
											<button class="btn btn-primary btn-block" type="submit">Set Password</button>
										</div>
										<p style="color: red;">
											<?php
												echo $_SESSION["Message"];
												$_SESSION["Message"] = "";
											?>
										</p>
								</div>
								<script src="assets/js/jquery.min.js"></script>
								<script src="assets/bootstrap/js/bootstrap.min.js"></script>
								<?php
} 
?>
									<?php
 if($_SESSION["regState"] == 5) {
?>
										<div style="text-align: left;" class="alert alert-success" role="alert"><span>Verification Link Sent</span></div>
										<div class="login-clean">
											<form>
												<h2 class="sr-only">Login Form</h2>
												<div class="illustration"><i class="icon ion-ios-navigate"></i></div> <span> A verification link was sent to <b style ="color : rgb(3, 156, 153);"><i><?php echo $_SESSION["Email"]; ?></i></b> &nbsp;</span>
												<!--	Why does span mess it up <button class="btn btn-primary btn-block" ><a href = "google.com" ><span >Gmail</span></a></button> --><a href="https://accounts.google.com/signin/v2/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="btn btn-primary btn-block">Gmail</a> <a href="https://www.icloud.com/mail" class="btn btn-primary btn-block">icloud</a> <a href="https://login.yahoo.com/" class="btn btn-primary btn-block">Yahoo</a>
												<br>
												<div style="text-align:center;"> <a href="php/Register.php" style="color: rgb(163, 160, 160); font-size: 15px">Not your Email? Go back</a> </div>
											</form>
											<script src="assets/js/jquery.min.js"></script>
											<script src="assets/bootstrap/js/bootstrap.min.js"></script>
											<?php
} 
?>

<?php
 if($_SESSION["regState"] == 6) { //Add Courses Page
?>
								<div class="login-clean">
									<form action="php/addCourse.php" method="GET">
										<h2 class="sr-only">Please add all course information</h2>
										<div class="form-group">
											<input class="form-control" type="text" name="CourseName" placeholder="Course Name"> 
									    </div>
										<div class="form-group">
											<input class="form-control" type="text" name="CourseID" placeholder="Course ID. Ex. CIS 3296, CIS 111"> 
									   </div>
										
										<div class="form-group">
											<input class="form-control" type="text" name="InstructorName" placeholder="InstructorName"> 
									   </div>
										<div class="form-group">
										    <input class="form-control" type="text" name="Category" placeholder="Assignment Category. Ex. Homework, Quizzes, In-class problems"> 
										</div>
										<div class="form-group">
										    <input class="form-control" type="text" name="classSection" placeholder="Class Section. Ex. 1, 2, 3"> 
										</div>
										
										<div class="form-group">
											<button class="btn btn-primary btn-block" type="submit">Add Course</button>
										</div>
										<p style="color: red;">
											<?php
												echo $_SESSION["Message"];
												$_SESSION["Message"] = "";
											?>
										</p>
								</div>
								<script src="assets/js/jquery.min.js"></script>
								<script src="assets/bootstrap/js/bootstrap.min.js"></script>
								<?php
} 
?>

<?php
 if($_SESSION["regState"] == 7) {   //AddProblem Page
	 
?>
	<div style = "">
     <form action="php/addQuestion.php" style=" height: 100vh; width:100vw;"  method="get">
        <div>
            <p class= "fancytitle"><strong>Fill in the question details below</strong></p>
           <div class="form-row">
				<div class="form-group col-md-6">
					  <label for="CourseName">Course Name</label>
					  <input type="name" class="form-control" id="courseName"  name = "courseName">
				</div>
				<div class="form-group col-md-6">
					  <label for="CourseID">Course ID</label>
					  <input type="name"  name = "courseID" class="form-control" id="courseID" placeholder="Ex. CIS 3296">
				</div>
		  </div>
          <div class="form-group">
				<label>
					Assignment Category
				</label>
				<input type="aCategory"  name = "Category" class="form-control" id="aCategory" placeholder="Ex. Homework, Quiz, in-class problem">
		 </div>
		 <div class="form-row">
				<div class="form-group col-md-6">
					  <label for="InstructorName">Instructor's Name</label>
					  <input type="name"  name = "InstructorName" class="form-control" id="instructorName" >
				</div>
				<div class="form-group col-md-6">
					  <label for="classSection">Class Section</label>
					  <input type="name" name = "classSection" class="form-control" id="classSection" >
				</div>
		  </div>
		  		 <div class="form-row">
				<div class="form-group col-md-6">
					  <label for="dueDate">Due Date</label>
					  <input type="date" name = "dueDate" class="form-control" id="dueDate" >
				</div>
				<div class="form-group col-md-6">
				<label>Attach File</label>
					  <input type="file" name = "inputFile" class="form-control" id="Afile" >
				</div>
		  </div>
		  
		
            <div class="form-group">
			     <label>Caption attached file or type question in text area below</label>
				<textarea name = "Caption_question" style="height: 30vh;width: 100vw" class="form-control"></textarea>
				
			</div>
			<div style="text-align: center;"class="form-group">
			    <button class="btn btn-primary " style="background: rgb(129, 134, 138)" type="submit">Post Question</button>
			</div>
			
        </div>
    </form>
	
	
	
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!---Fancy TextArea -->
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
   <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</div>	
						<?php
} 
?>

<?php
 if($_SESSION["regState"] == 8) {   //Add Course Page
	 
?>
	<div style = "">
     <form action="php/addXourse.php" style=" width:100vw;"  method="get">
        <div>
            <p class= "fancytitle"><strong>Fill in the question details below</strong></p>
           <div class="form-row">
				<div class="form-group col-md-6">
					  <label for="CourseName">Course Name</label>
					  <input type="name" class="form-control" id="courseName"  name = "courseName">
				</div>
				<div class="form-group col-md-6">
					  <label for="CourseID">Course ID</label>
					  <input type="name"  name = "courseID" class="form-control" id="courseID" placeholder="Ex. CIS 3296">
				</div>
		  </div>
          <div class="form-group">
				<label>
					Assignment Category
				</label>
				<input type="aCategory"  name = "Category" class="form-control" id="aCategory" placeholder="Ex. Homework, Quiz, in-class problem">
		 </div>
		 <div class="form-row">
				<div class="form-group col-md-6">
					  <label for="InstructorName">Instructor's Name</label>
					  <input type="name"  name = "InstructorName" class="form-control" id="instructorName" >
				</div>
				<div class="form-group col-md-6">
					  <label for="classSection">Class Section</label>
					  <input type="name" name = "classSection" class="form-control" id="classSection" >
				</div>
		  </div>
		  		 <div class="form-row">
				<div class="form-group col-md-6">
					  <label for="dueDate">Due Date</label>
					  <input type="date" name = "dueDate" class="form-control" id="dueDate" >
				</div>
				<div class="form-group col-md-6">
				<label>Attach File</label>
					  <input type="file" name = "inputFile" class="form-control" id="Afile" >
				</div>
		  </div>
		  
	
			
        </div>
    </form>
	
	
	<div class="table-responsive">
<table contentEditable == "true" class="table table-hover table-striped">
	<caption>Example of hovering effect in table rows in Bootstrap 4.</caption>
	<thead>
		<tr>
			<th> Name </th>
			<th> City <button> Hey</button></th>
			<th> Phone </th>
		</tr>
	</thead> 
	<tbody>
		<tr>
			<td> Alex </td>
			<td> New York </td>
			<td> 2034938411 </td>
		</tr> 
		<tr>
			<td> Vejey </td>
			<td> Bangaluru </td>
			<td> 8723495860 </td>
		</tr>      
		<tr>
			<td> Suzane </td>
			<td> Toronto </td>
			<td> 3002298484 </td>
		</tr>
	</tbody>
</table>
</div>
	
	
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!---Fancy TextArea -->
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
   <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</div>	
<?php
} 
?>

	</body>

	</html>