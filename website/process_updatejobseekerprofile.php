<?php
session_start();
$host = "localhost";
$user  = "root";
$password = "";
$database1 = "website";

$db1 = mysqli_connect($host, $user, $password, $database1);

//$id=1; // this is just for testing. Later delete it and uncomment the next lines
$id = $_SESSION['id'];

if(!isset($_SESSION['id']))
{
  header('location:JSLogin.php?msg=please_login');
}


$fname=$_POST['fname'];
$lname=$_POST['lname'];

$password=$_POST['password'];
$birth_date=$_POST['birth_date'];
$gender=$_POST['gender'];
$city=$_POST['city'];
$nationality=$_POST['nationality'];
$phone_number=$_POST['phone_number'];
$current_job=$_POST['current_job'];
$major=$_POST['major'];
$public=$_POST['public'];
$experience=$_POST['experience'];
$skills=$_POST['skills'];


//$q1 =  "UPDATE job_seeker SET first_name='$fname', last_name='$lname',email='$email',password='$password',birth_date='$birth_date',gender='$gender',public='$public', nationality='$nationality', city='$city',phone_number=$phone_number,current_job='$current_job',major='$major',experience='$experience',skills='$skills' WHERE job_seeker.email = '$id' "; // if id is a number remove the qoutes

//The following line contains all fields except 'public'
$q1 =  "UPDATE job_seeker SET first_name='$fname', last_name='$lname',password='$password',birth_date='$birth_date',gender='$gender', nationality='$nationality', city='$city',phone_number=$phone_number,current_job='$current_job',major='$major',experience='$experience',skills='$skills' WHERE job_seeker.id = $id "; // if id is a number remove the qoutes

if (!mysqli_query($db1,$q1))
{
    echo("Error description: " . mysqli_error($db1));
}
else{

    header('location:the_job_seeker_profile.php');
}

 ?>
