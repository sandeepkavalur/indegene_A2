<?php
    if(isset($_POST["submit"]) and $_POST["first"] and $_POST["last"] and $_POST["mail"] ){
        $fName=$_POST["first"];
        $lName=$_POST["last"];
        $email=$_POST["mail"];
        $experience=$_POST["dropdown"];

        // Validation of input data
        require 'validate.php';
        if (validate($fName,$lName,$email)){
            //For mysql
            $connSql=OpenCon();
            $sql="INSERT INTO emp_table (fname, lname, email, experience) VALUES ('$fName','$lName','$email','$experience')";
            if(mysqli_query($connSql,$sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: ".$sql."<br>".$connSql->error;
            }
            CloseCon($connSql);
        }
        ?>
        <br><br>
        <?php
    }else {
        echo "<strong>All the fields are empty</strong><br><br>";
    }
    
?>