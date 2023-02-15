<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";	
$conn = mysqli_connect($servername, $username, $password, $dbname);

$id_value = $_REQUEST['id_delete'];
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$select="DELETE FROM job WHERE id='$id_value'";
if ($conn->query($select) === TRUE) {
  header("Location: mainPageEmp.php?job deleted successfully");
} else {
echo "Error: " . $query . "<br>" . mysqli_error($conn);}
	

mysqli_close($conn);


 ?>