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


        if(!isset($_SESSION['user']))
           header("Location: JSLogin.php?error=Please Sign In again!");
    
        else
        {    

?>
<!DOCTYPE html>
<html>

  <head>
    <title>applied jop list</title>
    <meta charset="utf-8">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&family=Rozha+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="jobListApplied.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"> 

 </head>

  <body>

    <div class="nav">
      <img id="logo" src="Logo.png" alt="">
      <h1 class="large">My Jobs</h1>
    </div>
    <!--sidebar start-->
         
    <div class="sidebar">
                 <center>
                   <img src="person_grey.png" class="profile_image" alt="">
                   <h4></h4>
                 </center>
                 <a href="mainpageJs.php"><i class="fas fa-desktop"></i><span class="bar">Dashboard</span></a>
                 <a href="the_job_seeker_profile.php"><i class="far fa-user"></i></i><span  class="bar">Profile</span></a>
                 <a href="searchpage.php"><i class="fas fa-search"></i><span class="bar">Search for an employer</span></a>
                 <a href="Search_Page_2.php"><i class="fas fa-search"></i><span class="bar">Search for a job</span></a>
                 <a href="JobListApplied.php?id=<?php echo $js_id; ?>" ><i class="fas fa-business-time"></i><span class="bar">My Jobs</span></a>
                 <a href="Signout.php"><i class="fas fa-sign-out-alt"></i><span class="bar">Sign out</span></a>
               </div>
               <!--sidebar end-->
  
    <?php 
        

        $js_id = (int) $_GET['id'];
        
        $sql = "SELECT * FROM job_application Where id_job_seeker = $js_id ";//2
        $res = mysqli_query($conn, $sql);
        

        if(mysqli_num_rows($res)>0){

             //display successfull message

              if(isset($_SESSION['status'])){

              ?>
                <div id='message' ><?php echo $_SESSION['status'] ?> </div>
                <?php 
                unset($_SESSION['status']);
              }

              if(isset($_SESSION['inter'])){

               ?>
                <div id='message' ><?php echo $_SESSION['inter'] ?> </div>
                <?php
                unset($_SESSION['inter']);
              }


              
            	while($rows=mysqli_fetch_row($res)){

            		$sql2 = "SELECT * FROM job WHERE id = $rows[2]";
            		$ress = mysqli_query($conn, $sql2);
                $res2 = mysqli_fetch_row($ress);


                    $status = $rows[3];
                    $title = $res2[1];
                    $position = $res2[3];
                    $location = $res2[7];
                    $inter1 = $rows[4];
                    $inter2 = $rows[5];
                    $inter3 = $rows[6];
                 ?>

                 <div id='container'>
         	       <div class='job'>
    	      	     <div class='icon'>
    		          	 <img class='icona'src='job.png' alt=''>
    		         </div>
    		           <div class='content'>
    		    	     <p>Status <span><?php echo $status; ?></span> </p>
    		    	     <p><?php echo $title; ?>
                    || <?php echo $position; ?></p>
    		    	     <p><?php echo $location; ?></p>
    		    	     <a class="aa" href="deleteJobRequest.php?id=<?php echo $rows[0]; ?>" >cancel request</a>
    		       </div>
    		      </div>

    		         <?php 
    		         if($status=='accepted' ){

    		         print ("
                             <div class='content'>
                             <div class='job2'>
                             <h5>Select Interview time</h5>
                             <form method='POST' action='select_interview.php?id=$rows[0]'>

    		         	           <select name='select'>
                               <option name='op1'>$inter1</option>
                               <option name='op2'>$inter2</option>
                               <option name='op3'>$inter3</option>
                             </select> 
                             <input type='submit' value='submit'>
                             </form>
                             </div>
                             </div>"
                     ); } 
                     ?>

                     

                  </div>

               
       <?php 
            }
           }
         }
             ?>

   </body>
</html>

