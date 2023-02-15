<?php

//insertion doesn't work 
// ADD A SESSIONNN

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";	
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/*if(!isset($_SESSION['user'])){
  header("Location: JSLogin.php?error=Please Sign In again!");
  exit ;}*/

// $email = $_SESSION['email'];
// $query = "SELECT * FROM employer WHERE email = '$email'";

$empId = $_SESSION['user'];

if($_SERVER["REQUEST_METHOD"] == "POST") {

$title=$_POST['title'];
$major=$_POST['major'];
$position=$_POST['position'];
$description=$_POST['description'];
$skills=$_POST['skills'];
$qualifications=$_POST['qualifications'];
$location=$_POST['location'];
$time=$_POST['time'];
$gender=$_POST['gender'];
$salary=$_POST['salary'];

$query = " SELECT * FROM employer WHERE email='$empId'";
 
$result = $conn->query($query);
if ($result->num_rows > 0){
 while($row = $result->fetch_assoc()) {
     $Emp_id=$row['id'];}

}

$sql = "INSERT INTO job (`id`, `title`, `major`, `position`, `description`, `skills`, `qualifications`, `location`, `full time/part time`, `gender`, `salary`, `emoloyer_id`) 
VALUES ('NULL', '$title','$major','$position','$description','$skills','$qualifications','$location','$time','$gender','$salary','$Emp_id')";


if (mysqli_query($conn, $sql)) {
  header("Location: mainPageEmp.php?job added successfully");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

	
mysqli_close($conn);
?>

<!DOCTYPE html>	
<html>
    <head>
    <title> Post Job </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="Post_Style.css">
  
    </head>


    <body> 
	<div class="sidebar">
            <center>
              <img src="person_grey.png" class="profile_image" alt="">
            </center>
            <a href="mainPageEmp.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            <a href="employer_profile.php"><i class="far fa-user"></i></i><span>Profile</span></a>
            <a href="saearch3.php"><i class="fas fa-search"></i><span>Search for a job seeker</span></a>
            <a href="empSignout.php"><i class="fas fa-sign-out-alt"></i><span>Sign out</span></a>
          </div>
          <!--sidebar end-->

        <div class="nav">
			<img id="logo" src="Logo.png">
            <h1> Post a new job </h1>
		
       </div>

    <div  class="container">
        <div class="list">
			<form action="Post_job.php" method="POST">


				<div class="row">
					<div class="col-75">  <input name="title" id="title" placeholder="Job title" type="text" size="25" maxlength="25"> </div> 
				</div>

				<div class="row">
					<div class="col-75"> <input id="major" name="major" placeholder="Major" type="text" size="25" maxlength="25"> </div>
				</div>
					
				<div class="row">
					<div class="col-75"> <input id="position" name="position"placeholder="Position"  type="textarea" size="25" maxlength="25"> </div> 
				</div>

				<div class="row">
					<div class="col-75"> <textarea  name="description" placeholder="Job description"  rows="2" cols="30"></textarea> </div> 
				</div>

				<div class="row">
					<div class="col-75"> <textarea name="skills" placeholder="Required skills" rows="2" cols="30"></textarea>  </div> 
				</div>


				<div class="row">
					<div class="col-75"> <textarea name="qualifications" placeholder="Required qualification" rows="2" cols="30"></textarea>  </div> 
				</div>

				<div class="row">
					<div class="col-75"> <input name="location" placeholder="Location" type="text" size="25" maxlength="25"> </div> 
				</div>

				<div class="row">
					<div class="col-75"> <input name="salary"placeholder="Salary start from"  type="text" size="25" maxlength="25"> </div>
				</div>

				<div class="row">
					<div class="col-25"> <lable> Job time : </lable> </div>
					<div class="col-75"> <label> Full time <input id="time" name = "time" type="radio" value="full" ></label> 
					<label>Part time <input id="time" name = "time" type="radio" value="part" > </label> </div> 
				</div>
					

				<div class="row">
				   <div class="col-25"> <lable> Gender : </lable> </div>
				   <div class="col-75"> <label>Male <input name = "gender" type="radio" value="male" id="gender" > </label> 
				   <label>Female <input name = "gender" type="radio" value="female" id="gender" > </label> </div> 
				</div>

				    <button type="submit" class="post">Post A New Job</button>

				
			</form>
		</div>
    </div>
    
    </body>

 </html>

