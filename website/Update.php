

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";	
$conn = mysqli_connect($servername, $username, $password, $dbname);

		$title=$_REQUEST['title'];
		$major=$_REQUEST['major'];
		$position=$_REQUEST['position'];
		$description=$_REQUEST['description'];
		$skills=$_REQUEST['skills'];
		$qualifications=$_REQUEST['qualifications'];
		$location=$_REQUEST['location'];
	    $id_value = $_REQUEST['id_edit'];
		$salary=$_REQUEST['salary'];    


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$select="UPDATE job SET title ='".$title."', major ='".$major."', position ='".$position."', description ='".$description."', skills ='".$skills."', qualifications ='".$qualifications."', location ='".$location."', salary ='".$salary."' WHERE id='$id_value'" ;
if (mysqli_query($conn, $select)) {
	header("Location: mainPageEmp.php?Record updated successfully");
} else {
  echo "Error updating record: " . mysqli_error($conn);
  echo "Error: " . $select . "<br>" . mysqli_error($conn);

}
	

                mysqli_close($conn);


                ?>