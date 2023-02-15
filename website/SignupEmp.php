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
    <link rel="stylesheet" href="Signup.css">
<title> Employer Sign up </title>


</head>

<body> 

   <div class="nav">
        <img id="logo" src="Logo.png">
        <h1 class="large">Sign Up</h1>
           </div>
<div  class="container">
    <div class="singup" id="first">
        <h1>Personal information </h1>
       <form method="POST" action="EmpCheckSignup.php">
    <input type="text" name="cname" placeholder=" company's name" required>
    <input type="email" name="email" placeholder=" email" required>
    <input type="password" name="password" placeholder=" password" required > 
    <input type="number" name="phone" placeholder=" phone number">
    <input type="text" name="address" placeholder=" Address">
    </div>

    <div class="singup" id="second">
       <h1>Comapny's information </h1>

 <textarea  placeholder="company scope" name="scope" cols="57" rows="4" ></textarea>
 <textarea  placeholder="description of company" name="description" cols="57" rows="4" ></textarea>
 <textarea  placeholder="mission" name="mission" cols="57" rows="4" ></textarea>
 <textarea  placeholder="vision" name="vision" cols="57" rows="4" ></textarea>

    <button type="submit" name="signup-submit" >Sign up </button>

</form>


<a href="EmpLogin.php">have an account ? Login here</a>
</div>
</div>
</body>
</html>

<?php
    }
    ?>