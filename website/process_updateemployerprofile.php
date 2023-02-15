

<?php

session_start();
$host = "localhost";
$user  = "root";
$password = "";
$database1 = "website";

$db1 = mysqli_connect($host, $user, $password, $database1);

//$id=1; // this is just for testing. Later delete it and uncomment the next lines
$user = $_SESSION['user'];

if(!isset($_SESSION['user']))
{
  header('location:EmpLogin.php?msg=please_login');
}



$company_name=$_POST['company_name'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone_number=$_POST['phone_number'];
$Address=$_POST['Address'];
$company_scope=$_POST['company_scope'];
$description_of_company=$_POST['description_of_company'];
$mission=$_POST['mission'];
$vision=$_POST['vision'];



//echo $address;

//$q1 =  "UPDATE job_seeker SET [first name]='$fname', [last name]='$lname',nationality='$nationality' WHERE job_seeker.email='myemail@email.com'"; // if id is a number remove the qoutes
$select =  "UPDATE employer SET company_name='$company_name', email='$email',password='$password',phone_number='$phone_number',Address='$Address',company_scope='$company_scope', description_of_company='$description_of_company',mission='$mission',vision='$vision' WHERE email='$user'";



if (!mysqli_query($db1,$select))
{
    echo("Error description: " . mysqli_error($db1));
}
else{

    header('location:employer_profile.php');
}

 ?>
