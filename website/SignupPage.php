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
    
    if(isset($_SESSION['user'])){
    $email = $_SESSION['user'];
    $query = " SELECT * FROM employer WHERE email = '$email';"; 

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
        header("Location: mainPageEmp.php");
        
    }

    else  {
        $email = $_SESSION['user'];
        $query = " SELECT * FROM job_seeker WHERE email = '$email';"; 
    
        $result = mysqli_query($conn,$query);
    
        if(mysqli_num_rows($result) > 0){
            header("Location: mainPageJS.php");
            
        }

    }

}

else {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <tiltle> </tiltle>
    <link rel="stylesheet" href="Sign up page style.css">
    
</head>
<body>
    <div class="nav">
        <img id="logo" src="Logo.png">
        <h1 class="large">Sign Up</h1>
           </div>
          
<div class="container">
    <a href="SignupJS.php">
    <div class="card" > 
        <div class="box"> 
            <div class="content">
                <h1>Job Seeker</h1>
            </div>
        </div>
    </div>   
      </a>
      <a href="SignupEmp.php" >
     <div class="card" > 
        <div class="box"> 
            <div class="content">
                <h1>Employer</h1>
            </div>
        </div>
    </div>
       </a>
       
</div>

<div class="guest">
<a href="JSLogin.php">
    <p>Login as job seeker</p> </a> 
    <a href="EmpLogin.php">
        <p>Login as employer</p> </a> 
</div>
</body>
</html>

<?php 
    }
?>