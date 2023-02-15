<?php
session_start();
$host = "localhost";
$user  = "root";
$password = "";
$database1 = "website";

$db1 = mysqli_connect($host, $user, $password, $database1);



 $application_id = (int) $_GET['id'];
 $i1 = $_POST['i1'];
 $i2 = $_POST['i2'];
 $i3 = $_POST['i3'];

 $query = " SELECT * FROM job_application WHERE id = $application_id";
 $result = mysqli_query($db1 , $query);
 if ( mysqli_num_rows($result) > 0 )
 {
    while ($data = mysqli_fetch_row($result)){
       $job_id = $data[2];}
 }


$q1="UPDATE job_application SET suggested_interview_1='$i1',suggested_interview_2='$i2', suggested_interview_3='$i3' WHERE id=$application_id";

if (!mysqli_query($db1,$q1))
{
    echo("Error description: " . mysqli_error($db1));
}
else{
    
    $_SESSION['accept']="Applicant accepted successfully";
    header('location:Job_Applicants.php?id='.$job_id);
}

 ?>