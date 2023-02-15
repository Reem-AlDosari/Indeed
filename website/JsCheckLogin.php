<?php 
    session_start();
    // require_once() function can be used to include a PHP file in another one, when you may need to include the called file more than once. If it is found that the file has already been included, calling script is going to ignore further inclusions.
    define("DBHOST","localhost");
    define("DBUSER","root");
    define("DBPWD","");
    define("DBNAME","website");
    
      $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con))
        die("Fail to connect to database :" . mysqli_connect_error());

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM job_seeker WHERE email = '$email' AND password = '$password';";

    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){
   // $query = "SELECT jsname FROM js WHERE email = '$email'";
   // $result = mysqli_query($con,$query);
        $_SESSION['user'] = $email;
        mysqli_close();
        header("Location: mainPageJS.php");
        
    }
    else {
        mysqli_close();
        header("Location: JSLogin.php?error=Wrong Username/Password");
    }
?>