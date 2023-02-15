<?php
    DEFINE('DB_USER','root');
    DEFINE('DB_PSWD','');
    DEFINE('DB_HOST','localhost');
    DEFINE('DB_NAME','website');

    if (!$conn = mysqli_connect(DB_HOST,DB_USER,DB_PSWD))
        die("Connection failed.");

    if(!mysqli_select_db($conn, DB_NAME))
        die("Could not open the ".DB_NAME." database.");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="style.css" type=text/css>

    <img id="logo" src="Logo.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="sadeem">
        <title>Search for an job seeker according to skills</title>
    </head>
    <body>
        <?php 
            $name="";
            // isset () function is used to check whether a variable is set or not
            if(isset($_GET['skills']))
            $name = $_GET['skills'];
        ?>
        
        <form method="get">
       <h1>Search for an job seeker according to skills</h1> 
            <input class="sb" type='text' name="skills" value="<?php echo $name;?>">
            </br>
            </br>
            <input id="button" type='submit' value="Search">
            <br><br>
        </form>
    
        <?php
            if(isset($_GET['skills'])) {
                $sql = "SELECT* FROM job_seeker
                    where skills='" .$_GET['skills']. "'";
                 
              
                                                                       
            
                
                //here branch and name
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) 
                {
        ?>
                 <div class="content">

        <table>
            <tr>
                <td>
                    <strong>first_name</strong>
                </td>                                          
                <td>
                    <strong>last_name</strong>
                </td>
                <td>
                    <strong>email</strong>
                </td>
                
                <td>
                    <strong>birth_date</strong>
                </td>
                <td>
                    <strong>gender</strong>
                </td>
                <td>
                    <strong>nationality</strong>
                </td>
                <td>
                    <strong>city</strong>
                </td>
                <td>
                    <strong>phone_number</strong>
                </td>
                <td>
                    <strong>current_job</strong>
                </td>
                <td>
                    <strong>major</strong>
                </td>
                <td>
                    <strong>experience</strong>
                </td>
                <td>
                    <strong>skills</strong>
                </td>
                                                    
            </tr>
            <?php
            //fetches a result row as an associative array
                while($row = mysqli_fetch_assoc($result))
                    echo '<tr> <td>'.$row['first_name'].'</td> <td>'.$row['last_name'].'</td> <td>'.$row['email'].'</td> 
                     <td>'.$row['birth_date'].'</td> <td>'.$row['gender'].'</td> 
                    <td>'.$row['nationality'].'</td> <td>'.$row['city'].'</td> <td>'.$row['phone_number'].'</td> 
                    <td>'.$row['current_job'].'</td> <td>'.$row['major'].'</td> <td>'.$row['experience'].'</td> 
                    <td>'.$row['skills'].'</td> 
                    </tr>'; 
                    //here html and php chang row
                }//end while
                else
                   echo '<h3>No results.</h3>';
            }
    
                mysqli_close($conn);
            ?>
        </table>
        </div>
    </body>
</html>

