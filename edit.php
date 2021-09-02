<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Document</title>
    <link href="edit.css" type="text/css" rel="stylesheet">
</head>
<body class="container">
    <?php 
        $get_id = $_GET['id'];
        $conn = mysqli_connect("localhost", "root", "", "test");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else{
            $sql = "SELECT id, name, password, email FROM form WHERE id='$get_id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name1 = $row['name'];
                    $password1 = $row['password'];
                    $email1 = $row['email'];
                }
            } else {
                echo "0 results";
            }
        }
    ?>
    <div class="row">
    <div class="divrow col-4">
        <form method="POST" enctype="multipart/form-data" class=" mb-n5">
            <div class="mb-3">
                <label for="name" class="form-label">User Name</label>
                <input type="text" name="name"  class="form-control" id="name" value='<?php echo $name1 ?>' required>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password</label>
                <input type="password" name="pwd" class="form-control" id="pwd" value='<?php echo $password1 ?>' required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value='<?php echo $email1 ?>' required>
            </div>
            <input type="submit" class="btn btn-primary formSubmit" name="submit" value="submit"></input><br>
        </form>
    </div>
    </div>
    <?php 
        if(isset($_POST['submit'])){
            
            $name = $_POST['name'];
            $pwd = $_POST['pwd'];
            $email = $_POST['email'];
            
            if ($name1 == $name and $password1 == $pwd and $email1 == $email){
                echo 'No changes found!!!';
            } else {
                require 'validate.php';
            }
        }
    ?>
    
</body>
</html>