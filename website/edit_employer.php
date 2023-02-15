<?php
$host = "localhost";
$user  = "root";
$password = "";
$database1 = "website";

$db1 = mysqli_connect($host, $user, $password, $database1);

session_start();

  if(!isset($_SESSION['user'])){
  header("Location: JSLogin.php?error=Please Sign In again!");}

  else
  {
  // $id=1; // this is just for testing. Later delete it and uncomment the next lines
  $email = $_SESSION['user'];

    $q = "select * from employer WHERE email ='$email'"; // if id is a number remove the qoutes
   $result = mysqli_query($db1, $q);
   $row = mysqli_fetch_array($result);
    //from here
   if ($row == 0 ) {  //In case of error
   printf("Error: %s\n", mysqli_error($db1));
   exit();
    }
      //check if its correct
  //  $_SESSION['jsname']=$row['cust_name'];
  //  $_SESSION['jsid']=$row[id];

}
?>


<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" href="design.css">
<title> edit employer profile  </title>



<!--sidebar start-->



      <div class="sidebar">
                 <center>
                   <img src="person_grey.png" class="profile_image" alt="">




                 </center>
                 <a href="mainPageEmp.php"><i class="far fa-user"></i></i><span>Dashboard</span></a>
                 <a href="employer_profile.php"><i class="far fa-user"></i></i><span>Profile</span></a>
                 <a href="saearch3.php"><i class="far fa-bell"></i><span>Search</span></a>

                 <a href="Signout.php"><i class="fas fa-sign-out-alt"></i><span>Sign out</span></a>
               </div>
               <!--sidebar end-->



</head>

<body>
    <div class="nav">
      <img id="logo" src="Logo.png">
        <h1>Edit employer profile</h1>
           </div>

    <div  class="container">
    <div class="singup" id="first">

        <h2>Company Information </h2>
       <form id="form1" METHOD="post" ACTION="process_updateemployerprofile.php" enctype="multipart/form-data" class="form-horizontal">
   <p>company name:</p> <input type="text" placeholder="company_name" name="company_name" value =<?php echo $row['company_name']; ?>>
    <p>email:</p>  <input type="email" placeholder="email" name="email" value =<?php echo $row['email']; ?>>
   <p>password:</p>  <input type="password" placeholder="password" name="password" value =<?php echo $row['password']; ?>>
    <p>phone number:</p>  <input type="number" placeholder="phone_number" name="phone_number" value =<?php echo $row['phone_number']; ?>>
    <p>Address:</p>  <input type="text" placeholder="Address" name="Address" value =<?php echo $row['Address']; ?>>

</div>
       <div class="singup" id="second">
        <h2>Comapny's information </h2>

   <p>company scope:</p> <textarea  id="company_scope" placeholder="company_scope" name="company_scope" cols="30" rows="1" ><?php echo $row['company_scope']; ?></textarea>
    <p>description of company:</p> <textarea id="description_of_company" placeholder="description_of_company" name="description_of_company" cols="57" rows="1"  ><?php echo $row['description_of_company']; ?></textarea>
    <p>mission:</p> <textarea  id="mission" placeholder="mission" name="mission" cols="57" rows="1" ><?php echo $row['mission']; ?></textarea>
    <p>vision:</p> <textarea  placeholder="vision" name="vision" cols="57" rows="1" ><?php echo $row['vision']; ?></textarea>


<button> <a type="button" href="delete_employer.php" onClick="return confirm('Delete This profile?')">delete profile</a> </button>
<h5><button><a type="button" href="employer_profile.php">Cancel</a> </button>

<button><a type="submit"  >Done</a></button></h5>

</form>
</div>
</body>
</html>
