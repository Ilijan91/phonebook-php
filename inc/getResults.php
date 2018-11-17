<?php
require "connect.php";


//provera unosa u polje search
if(isset($_GET["criteria"])){
    if(!empty($_GET["criteria"])){
        $criteria=trim($_GET["criteria"]);
        $criteria=mysqli_real_escape_string($conn,$criteria);
        //dobavlja rezultate od svih polja da bilo gde u tekstu ima ta slova sto je uneo u $criteria
        $query="SELECT * FROM contacts WHERE fname LIKE '%{$criteria}%' OR lname LIKE '%{$criteria}%'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
            
            //while petljom uzima rezultate 
            while($row=mysqli_fetch_assoc($result)){
                ?>
                <div id="result">
                    <img src="img/user.png">
                    <p>Name: <?php echo $row["fname"]; ?></p>
                    <p>Surname: <?php echo $row["lname"]; ?></p>
                    <p>Tel: <?php echo $row["tel"];?></p>
                </div>
                
                <?php
            }
            echo "Number of results is " . mysqli_num_rows($result) . "!";
        }else{
            echo "no reults";
        }
    }else{
        echo "Criteria is empty please insert something";
    }
}



?>