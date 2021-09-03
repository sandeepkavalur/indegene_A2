<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel = "stylesheet" type = "text/css" href = "style.css">
    </head>
<body >
    <div class="container-fluid">
    <h1>Personal Details</h1><hr>
    <form action="index.php" method="post" enctype="multipart/form-data">
        First Name: <input type="text" name="first" class="inputShadow">
        Last Name: <input type="text" name="last" class="inputShadow"><br><br>
        
        Email ID: <input type="email" name="mail" class="inputShadow">
        Experience: <select name = "dropdown" class="inputShadow">
            <option value = 0 selected>0 Year</option>
            <option value = 1>1 Years</option>
            <option value = 2>2 Years</option>
            <option value = 3>3 Years</option>
            <option value = 4>4 Years</option>
            <option value = 5>5 Years</option>
         </select><br><br>

         Upload Resume:<br><input type="file" name="resumeFile">
         <input type="submit" value="Upload Resume" name="submitResume" class="inputShadow"><br><br>
         <input type="submit" name="submit" class="button">
         <span>&nbsp;</span>
         <button class="button"><a href="./details.csv">Download employee DB as CSV file</a></button><br><br>
    </form>
    <?php

        // Write to MySQL DB
        require 'addDetails.php';

        // Checking file upload
        require 'fileUpload.php';

        // Display personal details as table
        echo "<h2>Employee Personal Details</h2><hr>\n\n";
        require 'displayDetails.php';


        // Connect to DB
        function OpenCon()
        {
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $db = "emp";
            $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
    
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