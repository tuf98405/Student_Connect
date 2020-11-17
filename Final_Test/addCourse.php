




<!DOCTYPE html>

<?php
	session_regenerate_id(true);
	session_start();
	if ($_SESSION["regState"] != 4) header("location: index.php");
	
	if(!isset($_SESSION["regState"])) $_SESSION["regState"] = 0;
	if(!isset($_SESSION["Authenticate"])) $_SESSION["Authenticate"] = 0;
	

	//Display Errors
	//error_reporting(E_ALL);
	//ini_set('display_errors',1);

	//Read Dropdown Data from a file
	$collegesFile = file('Colleges.txt', FILE_IGNORE_NEW_LINES);
	$collegeMajorsFile = file('CollegeMajors.txt', FILE_IGNORE_NEW_LINES);
	$courseNamesFile = file('CourseNames.txt', FILE_IGNORE_NEW_LINES);
	$courseIDFile = file('CourseID.txt', FILE_IGNORE_NEW_LINES);
	$professorsFile = file('Professors.txt', FILE_IGNORE_NEW_LINES);
 
 $_SESSION["ms"]= "myTable";



?>
	
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
	 <link rel="stylesheet" href="css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	


	
	
</head>

<body id="page-top " >
    <div id="wrapper " style = "display: inline-flex;">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"  >
            <div class="container-fluid d-flex flex-column p-0 "style=" ">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>T Connect</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar ">
                    <li class="nav-item"><a class="nav-link" href="NewDash1.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="addCourse.php"><i class="fas fa-user"></i><span>Add Courses</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="askQuestion.php"><i class="fas fa-table"></i><span>Add Question</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Courses</span></a></li>
                    
					<li class="nav-item"><a class="nav-link" href="php/Logout.php"><i class="fas fa-user-circle"></i><span>Logout</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper"style=" padding:2px;">
            <div id="content" >
			
			<div style = "">
     <form action="php/AjaxAction.php"   method="POST">
	
        <div>
            <p class= "fancytitle"  style = "width: 85vw;"><strong>Please fill in Course Information  </strong></p>
           <div class="form-row">
				<div class="form-group col-md-6">
					  <label for="CourseName">Course Name</label>
					 <select style = "width: 100%; height: 36px" id="CNvalue" name = "CourseName">
								<option selected value="base">Select Course Name</option>
							   <?php 
							   //Read file line by line into dropdown
									foreach($courseNamesFile as $lines){ //add php code here
									echo "<option CNvalue='".$lines."'>$lines</option>";
									}
								?>
								</select>
				</div>
				<div class="form-group col-md-6">
					  <label for="CourseID">Course ID</label>
					 <select style = "width: 100%; height: 36px" id="CIDvalue" name = "CourseID">
								<option selected value="base">Select Course ID</option>
							   <?php 
							   //Read file line by line into dropdown
									foreach($courseIDFile as $lines){ //add php code here
									echo "<option CIDvalue='".$lines."'>$lines</option>";
									}
								?>
								</select>
				</div>
		  </div>
          
		 <div class="form-row">
				<div class="form-group col-md-6">
					  <label for="InstructorName">Instructor's Name</label>
					  <select style = "width: 100%; height: 36px" id="ProfID" name = "InstructorName">
								<option selected value="base">Select Instructor</option>
							   <?php 
							   //Read file line by line into dropdown
									foreach($professorsFile as $lines){ //add php code here
									echo "<option ProfID='".$lines."'>$lines</option>";
									}
								?>
					</select>
				</div>
				<div class="form-group col-md-6">
					  <label for="classSection">Class Section</label>
					  <input type="name" name = "classSection" class="form-control" id="classSection" >
				</div>
		  </div>
		  		 
						
			
        </div>
    </form>
	<div style="display: flex; justify-content: center;">
						<button type = "submit" id="ACButton" onclick="AddRowFunction()" class = "btn btn-primary ">Add Course</button> 
								<span style="padding-left: 35px;"></span>
						<button  id ="DCButton"  class = "btn btn-primary ">Delete Course</button> 
				    </div>
			<script>
			// use ajax to access php file with database instructions without altering the page
            $(document).ready(function(){
                $("#ACButton").click(function(){
                    var cn=$("#CNvalue").val();
                    var cid=$("#CIDvalue").val();
					 var p=$("#ProfID").val();
                    var cs=$("#classSection").val();
					var AjaxID = "AddCourse"; // AJAX  function identifier for php file using ajax variables
					 
					 
					
                    $.ajax({
                        url:'php/AjaxAction.php',
                        method:'POST',
                        data:{
                            cn:cn,
                            cid:cid,
							p:p,
							cs:cs,
							AjaxID:AjaxID
							
                        },
                        success:function(response){
                           // alert(response);
                        }
                    });
                });
            });
        </script>
		<br>
		 <p class= "fancytitle"><strong>Your Courses</strong></p>
	<div class="table-responsive">
<table id = "myTable"class="table table-hover table-striped">
	
	<thead >
		<tr id="mythead">
			<th>Course Name </th>
			<th>Course ID </th>
			<th>Instructor Name</th>
			<th> Class Section</th>
			
			<?php 
			//Keep track of user
			$Email = $_SESSION["Email"];
			//Pull data from database
			
			 require_once("php/config.php");
			  $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
			 if(!$con){
					$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
					$_SESSION["regState"] = -1;
					
					header("location: addCourse.php");
					exit();
			 }
			 $query = "SELECT * FROM FA20_3296_tul46491.Courses_AH where UID = (SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = '$Email' );";
   
   
   
             $result = mysqli_query($con, $query);
   
   
   
			   if(!$result){
				$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
				$_SESSION["regState"] = -2;
				header("location: /addCourse.php");
				exit();
				
			   }
			 if(mysqli_num_rows($result) > 0){

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr style="" onclick="highlightFunction(this)" ">';
                    echo '<td>'. $row['CourseName'] .'</td>';
                    echo '<td>'. $row['CourseID'] .'</td>';
					echo '<td>'. $row['Instructor'] .'</td>';
					echo '<td>'. $row['Section'] .'</td>';
                    echo '</tr>';
                }
            }
			
			
			?>
		</tr>
	</thead> 
	<tbody>
	</tbody>
	
</table>
					
<!--Hidden dive to Communicate session variable with javaScript via text content"-->
	
<div style = " display:none;" id = "sa" value = "wawa"><?php echo $_SESSION["ms"]; ?></div>
					
					
<!--Script to add course to front end table-->
						<script>
						var rowIndexNum;
						var previousRow = document.getElementById("myTable");
						 var courseID;
						
							function AddRowFunction(){
								var sessionV = document.getElementById("sa").textContent;
								//<?php $_SESSION["ms"]?>
								//'<%= Session["haha"] %>';
								
								
								
								var CourseName = document.getElementById("CNvalue").value;
								var CourseID = document.getElementById("CIDvalue").value;
								var InstructorName = document.getElementById("ProfID").value;
								var ClassSection = document.getElementById("classSection").value;
								
								
							  var table = document.getElementById("myTable");
							  var row = table.insertRow(1);
							  row.setAttribute('onclick', 'highlightFunction(this)');
							  var cell1 = row.insertCell(0);
							  var cell2 = row.insertCell(1);
							  var cell3 = row.insertCell(2);
							  var cell4 = row.insertCell(3);
							  
							  
							  cell1.innerHTML = CourseName;
							  cell2.innerHTML = CourseID
							  cell3.innerHTML = InstructorName;
							  cell4.innerHTML = ClassSection;
							 
							 // Add stuff to database via php
															
									
								
							}
							
						 
							function highlightFunction(oRow){
								
								
								previousRow.style.backgroundColor = "white";
								previousRow = oRow;
								
								
								var empTab = document.getElementById('myTable');
								 rowIndexNum = oRow.rowIndex;  // Keep track of changing index
								
								document.getElementById("DCButton").setAttribute('onclick', 'DeleteRowFunction()');
                                oRow.style.backgroundColor = "rgb(200, 218, 247)";
								
								
							 
							}
							function DeleteRowFunction(){
						 if(rowIndexNum != -1){
							 
							    var table = document.getElementById("myTable");
								var AjaxID = "DeleteCourse"; // AJAX  function identifier for php file using ajax variables
						
							     courseID = table.rows[rowIndexNum].cells[1].innerHTML;
							
								table.deleteRow(rowIndexNum);
							    rowIndexNum = -1; //Make sure it does not delete unselected rows on front end table
								
								 $.ajax({
								url:'php/AjaxAction.php',
								method:'POST',
								data:{
									courseID:courseID,
									AjaxID: AjaxID
									
									
								},
								success:function(response){
								   alert(response);
								}
								});
								
							}
							
						
							
								
							//Use ajax to delete from database	
											
							// use ajax to access php file with database instructions without altering the page
							
									//var cn=$("#CNvalue").val();
									//var cid=$("#CIDvalue").val();
									// var p=$("#ProfID").val();
									//var cs=$("#classSection").val();
									 
									 
							 
									
							
							}
						
    
							function EditRowFunction(){
								//table.contentEditable = true;
								
								//document.getElementById("myTable").contentEditable = true;
								//document.getElementById("mythead").contentEditable  = false;
								
					

							}

						 function saveFunction() {
							 //document.getElementById("myTable").contentEditable = false;
							
							 
							}
						</script>
						<?php
	 $_SESSION["ms"]= "myTablea"; ?>
</div>
	
	
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!---Fancy TextArea -->
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
   <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</div>	
               
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Brand 2020</span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
	
</body>

</html>
