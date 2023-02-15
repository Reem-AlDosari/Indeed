<?php 
    session_start();

    define("DBHOST","localhost");
    define("DBUSER","root");
    define("DBPWD","");
    define("DBNAME","website");
    
      $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con))
        die("Fail to connect to database :" . mysqli_connect_error());

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM employer WHERE email = '$email' AND password = '$password';";

    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){
   // $query = "SELECT jsname FROM js WHERE email = '$email'";
   // $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
      $name=$row['company_name'];
      $id=$row['id'];

      $_SESSION['user'] = $email;
      $_SESSION['name'] = $name;
      $_SESSION['id'] = $id;
      $_SESSION['type'] = "employer";
        mysqli_close();
        header("Location: mainPageEmp.php");
        
    }
    else {
        mysqli_close();
        header("Location: EmpLogin.php?error=Wrong Username/Password");
    }
?>