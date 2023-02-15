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
 $query = " SELECT * FROM job WHERE id='$id_value'";
 
 $result = $conn->query($query);
  if ($result->num_rows > 0) {
			   // output data of each row 
    while($row = $result->fetch_assoc()) {
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
        $empId=$row['emoloyer_id'];   
			}

     $query = " SELECT * FROM employer WHERE id='$empId'";
 
       $result = $conn->query($query);
       if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $cname=$row['company_name'];
		    }

       }
			
		}
        
        else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);}

                mysqli_close($conn);


                ?>




<!DOCTYPE html>
<html>

    <head>
    <title> Job Details </title>
    <link rel="stylesheet" href="Details_Style.css">

    </head>
    <body>
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

					<lable class="lab">Job Employer:<p> <?php echo $cname ?> </p>  </lable>
					<br> <br> <br> 
					<a href='employer_profile_from_job_seeker_view.php?ID=<?php echo $empId ?>'> <button type="button" class="prof"> <img id="user" src="user.png"> <?php echo $cname ?> </button> </a>			</div>
        </div>
    </body>

</html>
