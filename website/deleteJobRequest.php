<?php
session_start();
$host = "localhost";
$user  = "root";
$password = "";
$database1 = "website";

$db1 = mysqli_connect($host, $user, $password, $database1);

$application_id = (int)$_GET['id'];

$query = " SELECT id_job_seeker FROM job_application WHERE id = $application_id";
$result = mysqli_query($db1 , $query);
 if ( mysqli_num_rows($result) > 0 )
 {
    while ($data = mysqli_fetch_row($result)){
          $jobSeeker_id = $data[0];}
 }



$q1 =  "DELETE FROM job_application WHERE id=$application_id";

if (!mysqli_query($db1,$q1))
{
    echo("Error description: " . mysqli_error($db1));
}
else{

	$_SESSION['status']="job cancelled successfully";
    
    header('location:jobListApplied.php?id='.$jobSeeker_id);
}

 ?>