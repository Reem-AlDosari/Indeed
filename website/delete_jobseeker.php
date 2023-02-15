<?php
session_start();
$host = "localhost";
$user  = "root";
$password = "";
$database1 = "website";

$db1 = mysqli_connect($host, $user, $password, $database1);

//$id="myemail@email.com"; // this is just for testing. Later delete it and uncomment the next lines
$id = $_SESSION[id];

if(!isset($_SESSION[id]))
{
  header('location:SignupPage.php?msg=please_login');
}


//echo $address;

//$q1 =  "UPDATE job_seeker SET [first name]='$fname', [last name]='$lname',nationality='$nationality' WHERE job_seeker.email='myemail@email.com'"; // if id is a number remove the qoutes
$q1 =  "DELETE FROM job_seeker WHERE job_seeker.id=$id"; // if id is a number remove the qoutes

if (!mysqli_query($db1,$q1))
{
    echo("Error description: " . mysqli_error($db1));
}
else{
    
    header('location:Signout.php');
}

 ?>
