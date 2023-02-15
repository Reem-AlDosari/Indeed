<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";	
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 $id_value = $_GET['id'];
 $query = " SELECT * FROM job WHERE id= $id_value";
 $result = $conn->query($query);
       if ($result->num_rows > 0) {
			  
    while($row = $result->fetch_assoc()) {
		$id=$row['id'];
		$title=$row['title'];
		$major=$row['major'];
		$position=$row['position'];
		$description=$row['description'];
		$skills=$row['skills'];
		$qualifications=$row['qualifications'];
		$location=$row['location'];
		$time=$row['full time/part time'];
		
  if (!$row['gender']) {
    $gender='Female';
  }
  else {
    $gender='Male';
  }
		$salary=$row['salary'];     
			}
			
		}else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
                mysqli_close($conn);


                ?>
<!DOCTYPE html>
<html>

    <head>
    <title> Job Details </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="Details_Style.css">
    

    </head>
    <body>

	<div class="sidebar">
            <center>
              <img src="person_grey.png" class="profile_image" alt="">

			  <h4> </h4>
			  <br>
            </center>
            <a href="mainPageEmp.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            <a href="employer_profile.php"><i class="far fa-user"></i></i><span>Profile</span></a>
            <a href="saearch3.php"><i class="fas fa-search"></i><span>Search for a job seeker</span></a>
            <a href="empSignout.php"><i class="fas fa-sign-out-alt"></i><span>Sign out</span></a>
          </div>
          <!--sidebar end-->

        <div class="nav">
        <img id="logo" src="Logo.png">
        <h1> Job Details</h1>
		</div>


			<div  class="container">
				
					 <div class="singup" id="first">
				<p><lable class="lab">Job title :</lable> <p id="ans"> <?php echo $title ?> </p> </p> 
				<br>
				<p><lable class="lab">Major :</lable><p id="ans"><?php echo $major ?>  </p></p>
				<br>
				<p><lable class="lab">Position :</lable> <p id="ans"><?php echo $position ?>  </p> </p> 
				<br>
				<p><lable class="lab">Job description : </lable>  <p id="ans"><?php echo $description ?>  </p></p>
				<br>
				<p><lable class="lab">Required skills :</lable> <p id="ans"><?php echo $skills ?> </p></p>
				<br>
			</div>
			<div class="singup" id="second">
					<p><lable class="lab">Required qualification :</lable> <p id="ans"><?php echo $qualifications ?>   </p> </p>
					<br>
					<p><lable class="lab">Location : </lable> <p id="ans"><?php echo $location ?> </p> </p>
					<br>
					<p class="lab">Job time : <p id="ans"><?php echo $time ?> </p> </p> 
					<br>  
					<p class="lab">Gender : <p id="ans"> <?php echo $gender ?> </p> </p> 
					<br>  
					<p><lable class="lab">Salary start from :</lable> <p id="ans"><?php echo $salary ?>  </p> </p>
						<br>
						<br>
						<br>
						<form action="Delete_job.php" method='POST'> 
							 <input type="hidden" name="id_delete" id="id_delete" value="<?php echo $id; ?>">
                             <button class="delete" type="submit" name="details">Delete</button>
                        </form> 
						
						<form action="Post_Jop_Update.php" method='POST'> 
							 <input type="hidden" name="id_edit" id="id_edit" value="<?php echo $id; ?>">
                             <button type="submit" class="edit">Edit</button>
                        </form>
						
			
					</div>
		</div>
    </body>
	

</html>
