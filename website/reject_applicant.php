<?php
session_start();
$host = "localhost";
$user  = "root";
$password = "";
$database1 = "website";

$db1 = mysqli_connect($host, $user, $password, $database1);



$application_id = (int) $_GET['id'];

$query = " SELECT id_job FROM job_application WHERE id = $application_id";
 $result = mysqli_query($db1 , $query);
 if ( mysqli_num_rows($result) > 0 )
 {
    while ($data = mysqli_fetch_row($result)){
        $job_id = $data[0];}
 }


$q1 =  "UPDATE job_application SET decision='rejected' WHERE id=$application_id";

if (!mysqli_query($db1,$q1))
{
    echo("Error description: " . mysqli_error($db1));
}
else{

	$_SESSION['reject']="Applicant rejected successfuly";
    
    header('location:Job_Applicants.php?id='.$job_id);
}

 ?>

