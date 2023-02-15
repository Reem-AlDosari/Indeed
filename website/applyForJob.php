<?php 
    session_start();

    define("DBHOST","localhost");
    define("DBUSER","root");
    define("DBPWD","");
    define("DBNAME","website");
    
      $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con))
        die("Fail to connect to database :" . mysqli_connect_error());

        if(!isset($_SESSION['user']))
           header("Location: JSLogin.php?error=Please Sign In again!");

           else { 
//'apply.php?id=". $data[0] . "'
//$_SESSION['id'] = $data[13];


// $query = "SELECT * FROM job_application WHERE 'Id_job_seeker' = '".$_SESSION['id']."' AND 'id_job' = '".$_GET['id']."'";
//         $result=mysqli_query($con,$query);
//         if (mysqli_num_rows($result)>1)
//         {
//             header("Location: mainPageJS.php?error=Already applied");
//             mysqli_close();
//             exit;
//         }

            $query = " INSERT INTO `job_application`(`id`, `Id_job_seeker`, `id_job`, `decision`, `suggested_interview_1`, `suggested_interview_2`, `suggested_interview_3`, `date_selected`)
                     VALUES ('NULL','".$_SESSION['id']."','".$_GET['id']."','Waiting','null','null','null','null') ";
            if (mysqli_query($con, $query)) {
                        header("Location: mainPageJS.php?Applied to job successfully");
                        mysqli_close();
                        exit;
                    } else {
                        header("Location: mainPageJS.php?error=Already applied");
                                     mysqli_close();
                                     exit;
              }

           }
    
        
?>
