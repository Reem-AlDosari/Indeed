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
           header("Location: EmpLogin.php?error=Please Sign In again!");
    
        else
        {    
?>

<!DOCTYPE html>
<html>
    <head>
<title> Main Page (Employer) </title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"> <!-- with sidebar  -->
     <link rel="stylesheet" href="main page ( Employer ).css">
    </head>

    <body>
          
          <div class="sidebar">
            <center>
              <img src="person_grey.png" class="profile_image" alt="">
              <?php

                if(isset($_SESSION['user'])){
                    $email = $_SESSION['user'];
                   $query = " SELECT * FROM employer WHERE email = '$email';"; 
                   $result = mysqli_query($conn , $query);
                   if ( mysqli_num_rows($result) > 0 )
                   {
                       while ($data = mysqli_fetch_row($result)){
                           $id = $data[9];
                           print "<h4>Hi, ".$data[0]."</h4>";}}

                           else { print " no query";}
                       }
                       else {print "NO user session";} 

                     
                       ?>
            </center>
            <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            <a href="employer_profile.php"><i class="far fa-user"></i></i><span>Profile</span></a>
            <a href="saearch3.php"><i class="fas fa-search"></i><span>Search for a job seeker</span></a>
            <a href="empSignout.php"><i class="fas fa-sign-out-alt"></i><span>Sign out</span></a>
          </div>
          <!--sidebar end-->
        <div>

            <div class="navigation">
                
               
                <div class="nav-links">

                    
                    <img id="logo" src="Logo.png">
                    
                    

                </div> <!-- navigation-->
                
            </div> <!-- Header-->


            <div class="site">
            <div class="content">
                <h1>Your Posted Jobs.           <a href="Post_job.php"><button type="button" id="Post" >Post A New Job</button></a></h1>
                
                <?php
                
                
                // $query = " SELECT * FROM Job WHERE emoloyer_id = '$id'; ";

                $id = $_SESSION['id'];


                $query =  " SELECT * FROM job WHERE job.emoloyer_id=$id";
                $result = mysqli_query($conn , $query);
                if ( mysqli_num_rows($result) > 0 )
                {
                    while ($data = mysqli_fetch_row($result)){

                        print "<div class='single-container'>
                        <div class='photo'><img src='job.png' ></div>
                        <p class='company_name'> ". $data[1]. "</p>
                        <p>". $data[3]. "</p>
                        <p>". $data[4]. "</p>
                        
                        <div class='inlineForm'>
                        <form action='Job_Applicants.php?id=".$data[0]."' method='POST'>  
                        <button type='submit' name='apply' >Applicants</button> 
                        </form>
                             <form action='Job_details_Emp.php?id=".$data[0]."' method='POST'>  
                             <button type='submit' name='details' >Details</button>
                             </form> 
                             </div>
                    </div>";
                    }
                }
                else {
                    echo "<h3> You haven't posted jobs yet, Start the future of another human by posting one. </h3>";
                    
                }

                mysqli_close($conn);

                ?>

           
            </div> 
            
            
        </div> <!-- site-->
       
    </body>
</html>

<?php 
    }
?>