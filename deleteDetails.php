<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body >
    <div class="container-fluid">
        <h1>Delete Personal Details</h1><hr>
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
            <table>
            <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email id</th>
            <th>Experience</th>
            </tr>
            <tr>
            <td><?php echo $fName; ?></td>
            <td><?php echo $lName; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $experience; ?></td>
            </tr>
            </table>
            <form method="post" enctype="multipart/form-data">
                <br><br>
                <input type="submit" name="submit" value="Confirm Delete" class="button">
                <span>&nbsp;</span>
                <button class="button"><a href="index.php">Click here to go back to main page</a></button><br><br>
            </form>
            <?php
                
                if(isset($_POST["submit"])){

                    // For Deleting row in DB
                    $sql="DELETE FROM emp_table WHERE id='$id' ";
                    
                    if(mysqli_query($connSql,$sql)) {
                        $mesg="Record deleted successfully";
                        header('Location: index.php');
                    } else {
                        $mesg= "Error: ".$sql."<br>".$connSql->error;
                    }
                    echo "<br>after up<br>";
                    CloseCon($connSql);
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