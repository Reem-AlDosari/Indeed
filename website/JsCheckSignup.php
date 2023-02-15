<?php 
session_start();
   
if (isset($_POST['signup-submit'])) {
        
    define("DBHOST","localhost");
    define("DBUSER","root");
    define("DBPWD","");
    define("DBNAME","website");
        
        $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

        if(mysqli_connect_errno($con)){
            
            die("Fail to connect to database :" . mysqli_connect_error());
        }

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $date = $_POST['date'];
            $gender = $_POST['gender'];
            $nationality = $_POST['nationality'];
            $city = $_POST['city'];
            $phone = $_POST['phone'];
            $cjob = $_POST['cjob'];
            $major = $_POST['major'];
            $experinence = $_POST['experinence'];
            $skills = $_POST['skills'];
    

        //check if the email exits 
        $query = "SELECT * FROM job_seeker WHERE email = '$email' ";

        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0)
        {
            header("Location: SignupJS.php?error=email exists");
            mysqli_close();
            exit;
        }
        else {
            header("Location: SignupJS.php?error=email doesn't exists");
        }
        
        //  else if (!preg_match("/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/", $phone)) {
        //  header("Location: SignupJS.php?error=Phone syntax is wrong");
        //   exit; -->
        //  }

        $query= "INSERT INTO `job_seeker`(`first_name`, `last_name`, `email`, `password`, `birth_date`, `gender`, `nationality`, `city`, `phone_number`, `current_job`, `major`, `experience`, `skills`, `id`) VALUES ('$fname','$lname','$email','$password','$date','$gender','$nationality','$city','$phone','$cjob','$major','$experinence','$skills','NULL')";
        if (mysqli_query($con, $query)) {
            $_SESSION['user'] = $email;
            header("Location: mainPageJS.php");
            mysqli_close();
            exit;
        } else {
            echo "Error: ".mysqli_error($con);
  }
}