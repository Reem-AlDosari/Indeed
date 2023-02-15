<?php
session_start();
$host = "localhost";
$user  = "root";
$password = "";
$database1 = "website";

$db1 = mysqli_connect($host, $user, $password, $database1);

 $application_id = (int) $_GET['id'];



$q1 =  "UPDATE job_application SET decision='accepted' WHERE id=$application_id";

if (!mysqli_query($db1,$q1))
{
    echo("Error description: " . mysqli_error($db1));
}

 ?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&family=Rozha+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
   <link rel="stylesheet" href="accept_applicant.css">

  
  </head>
  <body>
  
    
    <div class="nav">
      <img id="logo" src="Logo.png" alt="">
      <h1 class="large">Select Interview Appointment</h1>
    </div>

    <div id='container'>
  	<?php print ("<form method='POST' action='procces_accept_applicant.php?id=$application_id'>"); ?>
  		<p>Suggested Interview Appointment 1</p>
  		<input type=date name="i1">
  		<p>Suggested Interview Appointment 2</p>
  		<input type=date name="i2">
  		<p>Suggested Interview Appointment 3</p>
  		<input type=date name="i3">
  		<p id='submit'><input type='submit' value='submit'></p>
    </form>
   </div>

  </body>
</html>



