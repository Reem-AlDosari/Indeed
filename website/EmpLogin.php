<?php 
    session_start();
    
    if(isset($_SESSION['user']))
        header("Location: mainPageEmp.php");

    else
    {
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="Login.css">
<title> Login page </title>
</head>

<body> 
    <div class="nav">
        <img id="logo" src="Logo.png">
           </div>

    <div class="login">
        <h1>Login here </h1>
       <form action="EmpCheckLogin.php" method="POST">

        <?php
            if(isset($_GET['error']))
            echo "<div class='alert'>".$_GET['error']."</div>";
        ?>
    <input type="email" name="email" placeholder="email" required autofocus>
   <input type="password" name="password" placeholder="password"required  >
   <button type="submit">Login</button>
 
</form>

<a href="SignupPage.php">Don't have an account ? Create one here</a>

</div>
</body>
</html>
<?php 
    }
?>