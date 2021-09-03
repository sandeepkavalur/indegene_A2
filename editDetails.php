<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body >
    <div class="container-fluid">
        <h1>Edit Personal Details</h1><hr>
        <?php
                $empid=$_GET['id'];
                $connSql=OpenCon();
                $sql = "SELECT id, fname, lname, email, experience FROM emp_table WHERE id='$empid'";
                $data = mysqli_query($connSql,$sql);
                $row = mysqli_fetch_assoc($data);
                $id=$row['id'];
                $fName=$row['fname'];
                $lName=$row['lname'];
                $email=$row['email'];
                $experience=$row['experience'];
            ?>
            <form method="post" enctype="multipart/form-data">
                First Name: <input type="text" name="first" value="<?php echo $fName;?>" class="inputShadow" required>
                Last Name: <input type="text" name="last" value="<?php echo $lName;?>" class="inputShadow" required><br><br>
                
                Email ID: <input type="email" name="mail" value="<?php echo $email;?>" class="inputShadow" required>
                Experience: <input type="number" name="experience" value="<?php echo $experience;?>" class="inputShadow" required><br><br>
                <input type="submit" name="submit" value="Confirm Edit" class="button">
                <span>&nbsp;</span>
                <button class="button"><a href="index.php">Click here to go back to main page</a></button><br><br>
            </form>
            <?php
                
                if(isset($_POST["submit"])){
                    $editedFName=$_POST["first"];
                    $editedLName=$_POST["last"];
                    $editedEmail=$_POST["mail"];
                    $editedExperience=$_POST["experience"];

                    if ($fName===$editedFName and $lName===$editedLName and $email===$editedEmail and $experience===$editedExperience){
                        echo "<strong>No Chanage in info of all fields</strong><br><br>";
                    } else {
                        // Validation of input data
                        require 'validate.php';
                        $validate=validate($editedFName,$editedLName,$editedEmail,$editedExperience);
                        if ($validate){
                            echo $editedFName."<br>".$editedLName."<br>".$editedEmail."<br>".$editedExperience;

                            // For editing DB
                            $sql="UPDATE emp_table SET fname='$editedFName', lname='$editedLName', email='$editedEmail', experience='$editedExperience' WHERE id='$id' ";
                            
                            if(mysqli_query($connSql,$sql)) {
                                header('Location: index.php');
                                $mesg="Record edited successfully";
                            } else {
                                $mesg= "Error: ".$sql."<br>".$connSql->error;
                            }
                            echo "<br>after up<br>";
                            CloseCon($connSql);
                        }
                    }
                }

                // Connect to DB
                function OpenCon()
                {
                    $dbhost = "localhost";
                    $dbuser = "root";
                    $dbpass = "";
                    $db = "emp";
                    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
            
                    //Check connection
                    if($conn->connect_errno){
                        echo "Connection to MySQL Unsuccessful: connect_error";
                        exit();
                    }                    
                    return $conn;
                }
                
                function CloseCon($conn)
                {
                    $conn -> close();
                }
            ?>
        </div>
    </body>
</html>