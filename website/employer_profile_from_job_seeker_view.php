<?php
$host = "localhost";
$user  = "root";
$password = "";
$database1 = "website";

$db1 = mysqli_connect($host, $user, $password, $database1);

session_start();

$id=$_GET['ID'];

    $q = "select * from employer WHERE employer.id = $id"; // if id is a number remove the qoutes

    $result = mysqli_query($db1, $q);
    $row = mysqli_fetch_array($result);
    //from here
    if (!$row) {  //In case of error
        printf("Error: %s\n", mysqli_error($db1));
        exit();
      }
?>

<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" href="design.css">
<title> Employer profile  </title>


<!--sidebar start-->
        <div class="sidebar">
                 <center>
                   <img src="person_grey.png" class="profile_image" alt="">





                 </center>
                 <a href="mainPageJS.php"><i class="far fa-user"></i></i><span>Dashboard</span></a>
                 <a href="the_job_seeker_profile.php"><i class="far fa-user"></i></i><span>Profile</span></a>
              <a href="searchpage.php"><i class="far fa-bell"></i><span>Search for an employer</span></a>
                 <a href="Search_Page_2.php"><i class="far fa-bell"></i><span>Search for a job</span></a>
                 <a href="JobListApplied.php?id=<?php echo $js_id; ?>" ><i class="fas fa-business-time"></i><span>My Jobs</span></a>
                 <a href="Signout.php"><i class="fas fa-sign-out-alt"></i><span>Sign out</span></a>
               </div>
               <!--sidebar end-->



    </head>
    <body>
     <div class="nav">
      <img id="logo" src="Logo.png">
         <h1>Employer profile</h1>
        </div>
         <div  class="container">
                 <div class="singup" id="first">
                    <form>
       <h2>Company's name:</h2>
      <p>  <?php echo $row['company_name'];?>
</p>

   <h2>Email:</h2>
<p> <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?> </a></p>
 </p>
   <h2>Address:</h2>
   <p> <?php echo $row['Address'];?>
</p>
   <h2>Company scope:</h2>
    <p><?php echo $row['company_scope'];?>
</p>

</div>
  <div  class="container1">
 <div class="singup" id="second">

<h2>  Description of company:</h2>
<p class="overflow">
 <?php echo $row['description_of_company'];?> </p>
 <h2>Phone number:</h2>
 <p><?php echo $row['phone_number'];?>
   </p>

   <h2>Mission:</h2>
<p><?php echo $row['mission'];?>
</p>

   <h2>vision:</h2>
<p><?php echo $row['vision'];?>
</p>

</form>
</div>






    </body>
</html>
