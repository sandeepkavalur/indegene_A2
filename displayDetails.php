<?php
    $connSql=OpenCon();
    $sql="SELECT * FROM emp_table";
    $data = mysqli_query($connSql,$sql);

    // Displays the DB data in table
    if (mysqli_num_rows($data) > 0) {
        ?>
        <table>
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email id</th>
        <th>Experience</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($data)) {
            ?>
            <tr>
            <td><?php echo $row["fname"]; ?></td>
            <td><?php echo $row["lname"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["experience"]; ?></td>
            <td style="background-color: black;"><a type="button" href='editDetails.php?id=<?php echo $row["id"];?>'><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td style="background-color: black;"><a type="button" href='deleteDetails.php?id=<?php echo $row["id"];?>'><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
            <?php

        $i++;
        }
        ?>
        </table>
        <?php
        }
        else{
            echo "No result found";
        }
        CloseCon($connSql);
?>