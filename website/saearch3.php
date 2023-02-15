<?php
    DEFINE('DB_USER','root');
    DEFINE('DB_PSWD','');
    DEFINE('DB_HOST','localhost');
    DEFINE('DB_NAME','website');

    if (!$conn = mysqli_connect(DB_HOST,DB_USER,DB_PSWD))
        die("Connection failed.");

    if(!mysqli_select_db($conn, DB_NAME))
        die("Could not open the ".DB_NAME." database.");

    session_start();

        if(!isset($_SESSION['user']))
           header("Location: JSLogin.php?error=Please Sign In again!");
    
        else
        {    

            ?>

  <!DOCTYPE html>
   <html>
    <head><meta charset="utf-8">
        <title>Job Seeker Search</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"> <!-- with sidebar  -->

        <link rel="stylesheet" href="style.css" type=text/css>
    </head>

     <!--sidebar start-->
         
     <div class="sidebar">
                 <center>
                   <img src="person_grey.png" class="profile_image" alt="">
<h4></h4>
                    
                
                 </center>
                 <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            <a href="employer_profile.php"><i class="far fa-user"></i></i><span>Profile</span></a>
            <a href="saearch3.php"><i class="fas fa-search"></i><span>Search for a job seeker</span></a>
            <a href="empSignout.php"><i class="fas fa-sign-out-alt"></i><span>Sign out</span></a>
                         </div>
               <!--sidebar end-->
        
        <body >


            <script type="text/javascript">
               
                    
                
                </script>
            <div class="nav">
            <img id="logo" src="Logo.png">
            <h1 class=titlead> Job seeker Search </h1>
            </div>
            
                      <div class="container">
<button ><a class="lab" href="search_for_job_seeker1.php">gender</a></button>
<button ><a class="lab" href="search_for_job_seeker2.php"> nationality</a></button>
<button ><a class="lab" href="search_for_job_seeker3.php"> skill</a></button>
<button ><a  class="lab" href="search_for_job_seeker4.php"> major</a></button>

            </div>
          

           
           
           
            
        </body>
         </html>

         <?php 
    }
?>