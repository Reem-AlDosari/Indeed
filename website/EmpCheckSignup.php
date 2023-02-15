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

            $cname = $_POST['cname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $Address = $_POST['address'];
            $phone = $_POST['phone'];

            $scope = $_POST['scope'];
            $description = $_POST['description'];
            $mission = $_POST['mission'];
            $vision = $_POST['vision'];
    

        //check if the email exits 
        $query = "SELECT * FROM employer WHERE email = '$email' ";

        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0)
        {
            header("Location: SignupEmp.php?error=email exists");
            mysqli_close();
            exit;
        }
        
        //  else if (!preg_match("/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/", $phone)) {
        //  header("Location: SignupJS.php?error=Phone syntax is wrong");
        //   exit; -->
        //  }

        $query= "INSERT INTO `employer`(`company_name`, `email`, `password`, `phone_number`, `Address`, `company_scope`, `description_of_company`, `mission`, `vision`, `id`) 
        VALUES ('$cname','$email','$password','$phone','$Address','$scope','$description','$mission','$vision','NULL')";
        if (mysqli_query($con, $query)) {
            $_SESSION['user'] = $email;
            header("Location: mainPageEmp.php");
            mysqli_close();
            exit;
        } else {
            echo "Error: ".mysqli_error($con);
  }
}