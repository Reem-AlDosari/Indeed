<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";	
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id_value = $_REQUEST['id_edit'];
 $query = " SELECT * FROM job WHERE id='$id_value'";

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
		$gender=$row['gender'];
		$salary=$row['salary'];     
			}
			
		}else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);}

                mysqli_close($conn);


                ?>

<!DOCTYPE html>	
<html>
    <head>
    <title> Post Job </title>
    <link rel="stylesheet" href="Post_Style.css">
    </head>


    <body> 
        

        <div class="nav">
			<img id="logo" src="Logo.png">
            <h1> Update job </h1>
       </div>

    <div  class="container">
        <div class="list">
			<form action="Update.php" method="POST">


				<div class="row">
					<div class="col-75">  <input name="title" id="title" type="text" size="25" maxlength="25" value="<?php print $title ?>"> </div> 
				</div>

				<div class="row">
					<div class="col-75"> <input id="major" name="major"  type="text" size="25" maxlength="25" value="<?php print $major ?>"> </div>
				</div>
					
				<div class="row">
					<div class="col-75"> <input id="position" name="position"placeholder="Position"  type="textarea" size="25" maxlength="25" value="<?php print $position ?>"> </div> 
				</div>

				<div class="row">
					<div class="col-75"> <textarea  name="description" placeholder="Job description"  rows="2" cols="30" value="<?php print $description ?>"><?php print $description ?></textarea> </div> 
				</div>

				<div class="row">
					<div class="col-75"> <textarea name="skills" placeholder="Required skills" rows="2" cols="30" value="<?php print $skills ?>"><?php print $skills ?></textarea>  </div> 
				</div>


				<div class="row">
					<div class="col-75"> <textarea name="qualifications" placeholder="Required qualification" rows="2" cols="30" value="<?php print $qualifications ?>"><?php print $qualifications ?></textarea>  </div> 
				</div>

				<div class="row">
					<div class="col-75"> <input name="location" placeholder="Location" type="text" size="25" maxlength="25" value="<?php print $location ?>"> </div> 
				</div>

				<div class="row">
					<div class="col-75"> <input name="salary"placeholder="Salary start from"  type="text" size="25" maxlength="25" value="<?php print $salary ?>"> </div>
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
						<input type="hidden" name="id_edit" id="id_edit" value="<?php echo $id; ?>">
				    <button type="submit" class="post">Update Job</button>

				
			</form>
		</div>
    </div>
    
    </body>

 </html>
