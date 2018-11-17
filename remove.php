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
            <img src="img/remove.png">
            <a href="index.php"><img src="img/Search.jpg" height="50px" title="Search USER!"> </a>
             <a href="insert.php"><img src="img/add.png" height="50px" title="add USER!"> </a>
           
           <?php
                require "inc/connect.php";
                $query="SELECT * FROM contacts";
                $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    
                    ?>
                    <div id="result">
                        <a href="inc/removeContact.php?id=<?php echo $row["id"];?>"><img src="img/remove.png"></a>
                        <p>Name: <?php echo $row["fname"]; ?></p>
                        <p>Surname: <?php echo $row["lname"]; ?></p>
                        <p>Tel: <?php echo $row["tel"];?>
                    </div>
                    
                    <?php
                }
            }else{
                echo "No connection";
            }
            
            ?>
           
        </div>
    </div>
    
    
    
    
</body>
</html>