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
        <title>Search for a job  according to major</title>
 
    </head>
    <body>
        <?php 
            $name="";
            // isset () function is used to check whether a variable is set or not
            if(isset($_GET['major']))
            $name = $_GET['major'];
        ?>
        
        <form method="get">
        <h1>Search for a job  according to major</h1>
           
            <input class="sb" type='text' name="major" value="<?php echo $name;?>">
            </br>
            </br>
            <input id=button type='submit' value="Search">
            <br>
            <br>
        </form>
    
        <?php
            if(isset($_GET['major'])) {
                $sql = "SELECT* FROM job
                    where `major`='" .$_GET['major']. "'";
                 
              
                                                                       
            
                
                //here branch and name
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) 
                {
        ?>
        <div class="content">
        <table >
            <tr >
                <td>
                    <strong>job title	</strong>
                </td>                                          
                <td>
                    <strong>major</strong>
                </td>
                <td>
                    <strong>position</strong>
                </td>
                <td>
                    <strong>job description	</strong>
                </td>
                <td>
                    <strong>required skills	</strong>
                </td>
                <td>
                    <strong>required qualifications	</strong>
                </td>
                <td>
                    <strong>location</strong>
                </td>
                <td>
                    <strong>full time/part time	</strong>
                </td>
                <td>
                    <strong>gender</strong>
                </td>
                <td>
                    <strong>salary starts from	</strong>
                </td>
                
                                                    
            </tr>
            <?php
            //fetches a result row as an associative array
                while($row = mysqli_fetch_assoc($result))
                    echo '<tr> <td>'.$row['title'].'</td> <td>'.$row['major'].'</td> <td>'.$row['position'].'</td> 
                    <td>'.$row['description'].'</td> <td>'.$row['skills'].'</td> <td>'.$row['qualifications'].'</td> 
                    <td>'.$row['location'].'</td> <td>'.$row['full time/part time'].'</td> <td>'.$row['gender'].'</td> 
                    <td>'.$row['salary'].'</td>
                   
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
