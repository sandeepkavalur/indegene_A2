<?php 
    $conn = mysqli_connect("localhost", "root", "", "test");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else{
        // $sql = "SELECT name, password, email FROM form ORDER BY id DESC LIMIT 1";
        // $result = mysqli_query($conn, $sql);
        if ($id) {
            $sql = "UPDATE form SET name='$name', password='$pwd', email='$email' WHERE id='$id'";
            if (mysqli_query($conn, $sql)) {
                header('Location: index.php');
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else{
            $sql = "INSERT INTO form (name, password, email) VALUES ('$name', '$pwd', '$email')";
            if (mysqli_query($conn, $sql)) {
                header('Location: edit.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
?>