<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phonebook</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
    <div id="wrap">
        <div id="search">
            <img src="img/add.png">
            <a href="index.php"><img src="img/Search.jpg" height="50px" title="Search USER!"> </a>
             <a href="remove.php"><img src="img/remove.png" height="50px" title="remove USER!"> </a>
            <form action="#" method="POST">
               <label>First name:<br>
                <input type="text" name="fname"><br>
                </label>
                <label>Last name:<br>
                <input type="text" name="lname"><br>
                </label>
                <label>Telephone:<br>
                <input type="text" name="tel"><br>
                </label>
                <input type="submit" name="insert" value="insert">
            </form>
        </div>
       <div id="message">
           <?php
               if(isset($_POST["insert"])) {
                    if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["tel"])){
                        if(!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["tel"])){
                            $fname=trim($_POST["fname"]);
                            $lname=trim($_POST["lname"]);
                            $tel=trim($_POST["tel"]);
                            require "inc/connect.php";
                            $fname=mysqli_real_escape_string($conn,$fname);
                            $lname=mysqli_real_escape_string($conn,$lname);
                            $tel=mysqli_real_escape_string($conn,$tel);
                            
                            $query="INSERT INTO contacts (fname,lname,tel) VALUES ('{$fname}','{$lname}','{$tel}')";
                            
                            if(mysqli_query($conn,$query)===TRUE){
                                echo "New record is succesfuly inserted in database";
                                
                            }else{
                                echo "Error!";
                                
                            }
                            
                        }else{
                            echo "Please insert your name surname and telephpne";
                        }
                    }else{
                        echo "Please send your parameters";
                    }   
               }    
           
           ?>
       </div>
       
       
       
    </div>
    
    
    
    
</body>
</html>