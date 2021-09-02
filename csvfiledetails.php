<?php 
    $myfile = fopen('resume.csv', "r");
    $row = 1;
    echo "
    <h1 class='marTop'> CSV file details </h1>
    <table class='tabl'>
        <tr>
            <th>Name</th>
            <th>Password</th>
            <th>Experience</th>
            <th>Email</th>
        </tr>
    ";
    while (($data = fgetcsv($myfile, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<tr>";
        
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo "
                <td>$data[$c]</td>
            ";
        }
        echo "</tr>";
    }
    echo "</table>";

    fclose($myfile);
?>