





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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"> <!-- with sidebar  -->

        <link rel="stylesheet" href="style.css" type=text/css>
    <img id="logo" src="Logo.png">
        <meta charset="utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="sadeem">
        <title>Search for a company name</title>
    </head>
    <body>
        <?php 
            $name="";
            // isset () function is used to check whether a variable is set or not
            if(isset($_GET['company_name']))
            $name = $_GET['company_name'];
        ?>
        
        <form method="get">
        <h1>Search for an employer according to company's name</h1>
            <input class="sb" type='text' name="company_name" value="<?php echo $name;?>">
            </br>
            </br>
            <input id=button  type='submit' value="Search">
        </form>
    
        <?php
            if(isset($_GET['company_name'])) {
                $sql = "SELECT* FROM employer
                    where `company_name`='" .$_GET['company_name']. "'"
                 
              
                                                                       
            
                
                ;//here branch and name
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) 
                {
        ?>
        <div class="content">
        <table>
            <tr>
                <td>
                    <strong>company’s_name</strong>
                </td>                                          
                <td>
                    <strong>email</strong>
                </td>
               
                <td>
                    <strong>phone_number</strong>
                </td>
                <td>
                    <strong>Address</strong>
                </td>
                <td>
                    <strong>company_scope</strong>
                </td>
                <td>
                    <strong>description_of_company</strong>
                </td>
                <td>
                    <strong>mission</strong>
                </td>
                <td>
                    <strong>vision</strong>
                </td>
                                                    
            </tr>
            <?php
            //fetches a result row as an associative array
                while($row = mysqli_fetch_assoc($result))
                    echo '<tr> <td>'.$row['company_name'].'</td> <td>'.$row['email'].'</td> 
                    <td>'.$row['phone_number'].'</td> <td>'.$row['Address'].'</td> <td>'.$row['company_scope'].'</td> 
                    <td>'.$row['description_of_company'].'</td> <td>'.$row['mission'].'</td> <td>'.$row['vision'].'</td> 
                   
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