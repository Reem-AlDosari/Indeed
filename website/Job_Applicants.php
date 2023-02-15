<?php
    session_start();
    DEFINE('DB_USER','root');
    DEFINE('DB_PSWD','');
    DEFINE('DB_HOST','localhost');
    DEFINE('DB_NAME','website');

    if (!$conn = mysqli_connect(DB_HOST,DB_USER,DB_PSWD))
        die("Connection failed.");

    if(!mysqli_select_db($conn, DB_NAME))
        die("Could not open the ".DB_NAME." database.");
?>
<!DOCTYPE html>
<html>
<head>

   <meta charset="utf-8">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&family=Rozha+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
   <link rel="stylesheet" href="Job_Applicants.css">
</head>

<body>
<div class="sidebar">
            <center>
              <img src="person_grey.png" class="profile_image" alt="">
            <?php  if(isset($_SESSION['user'])){
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
            <a href="mainPageEmp.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            <a href="employer_profile.php"><i class="far fa-user"></i></i><span>Profile</span></a>
            <a href="saearch3.php"><i class="fas fa-search"></i><span>Search for a job seeker</span></a>
            <a href="empSignout.php"><i class="fas fa-sign-out-alt"></i><span>Sign out</span></a>
          </div>
          <!--sidebar end-->
    <div class="nav">
      <img id="logo" src="Logo.png" alt="">
      <h1 class="large">Job Applicants</h1>
    </div>
    
        <div>

    <?php if(isset($_SESSION['accept'])){ ?>
        <div id='message' ><?php echo $_SESSION['accept'] ?> </div>
        <?php
          unset($_SESSION['accept']);
    }

    if(isset($_SESSION['reject'])){ ?>
        <div id='message' ><?php echo $_SESSION['reject'] ?> </div>
        <?php
          unset($_SESSION['reject']);
    }?>

    <div id = 'container'>

   <table class="tb">



    <?php 

        $job_id = (int) $_GET['id'];
       
        $sql = "SELECT id_job_seeker, id FROM job_application WHERE id_job = $job_id";//3
        $res = mysqli_query($conn, $sql);
        

        if(mysqli_num_rows($res)>0){

  
                echo " <table class='tb'>
                       <tr>
                         <th>S.N</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Email</th>
                        <th>Phone number</th>
                       </tr>  ";

            

                $sn=1;

                while($rows=mysqli_fetch_row($res)){

    

                    $sql2 = "SELECT * FROM job_seeker WHERE id = $rows[0]";
                    $ress = mysqli_query($conn, $sql2);
                    $res2 = mysqli_fetch_row($ress);

                    $fname = $res2[0];
                    $lname=$res2[1];
                    $email=$res2[2];
                    $phone=$res2[8];

                    ?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $fname; ?></td>
                        <td><?php echo $lname; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><a class='aa' href="the_job_seeker_profile_from_employer_view.php?id= <?php echo $rows[0]; ?>" >view pofile</a></td>
                        <td>
                            <a class='aa' href="accept_applicant.php?id= <?php echo $rows[1]; ?>" >accept</a>
                            <a class='aa' href="reject_applicant.php?id= <?php echo $rows[1]; ?>" >reject</a>

                        </td>

                    </tr>

                        <?php

                }


            
        }

        else {

        echo "<h1> No one applied yet </h1>";}

    ?>
</table>
</div>

</body>
</html>


