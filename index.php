<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Document</title>
    <link href="index.css" type="text/css" rel="stylesheet">
</head>
<body class="container">
    <div class="row divrow">
        <form method="POST" enctype="multipart/form-data" class="col-6 mb-n5">
            <div class="mb-3">
                <label for="name" class="form-label">User Name</label>
                <input type="text" name="name"  class="form-control" id="name" placeholder="User Name" required>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password</label>
                <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <label for="experience" class="form-label">Experience</label>
                <select id="experience" name="experience" class="form-control">  
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
                    <option value="4"> 4 </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
            </div>
            <input type="file" name="file" ><br>
            <input type="submit" class="btn btn-primary formSubmit" name="submit" value="submit"></input><br>
            <a href="./index.txt" download="resume" >download resume file?</a><br>
        </form>
        <?php 
            $conn = mysqli_connect("localhost", "root", "", "test");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else{
                $sql = "SELECT id, name, password, email FROM form ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $id2 = $row['id'];
                        $name2 = $row['name'];
                        $password2 = $row['password'];
                        $email2 = $row['email'];
                    }
                } else {
                    echo "0 results";
                }
            }
            ?>
            <div class="col-6 text-center">
                <pre>
                <h1> User details </h1>
                <p> User Name: <i> <?php echo $name2; ?> </i></p>
                <p> Password: <i> <?php echo $password2; ?> </i></p>
                <p> Email: <i> <?php echo $email2; ?> </i></p>
            </div>


            <?php
            if(isset($_POST['submit'])){
                
                $name = $_POST['name'];
                $pwd = $_POST['pwd'];
                $expi = $_POST['experience'];
                $email = $_POST['email'];
                
                // require 'file_handle.php';

                require 'validate.php';
            }
        ?>
    </div>
</body>
</html>