<?php 
    $tmp_name = $_FILES["file"]['tmp_name'];
    $file_name = $_FILES['file']['name'];
    $dir = getcwd().'/'.$file_name;

    if(move_uploaded_file($tmp_name, $dir)){
        echo "File uploaded successfully! <br>";
    } else {
        echo "Sorry, file not uploaded <br>";
    }

    $myfile = fopen('resume.csv', "a+");
            $form_data = array(
                'Name' => $name,
                'Password' => $pwd,
                'Experience' => $expi,
                'Email' => $email
            );
            fputcsv($myfile, $form_data);
            fclose($myfile);

            $myfile = fopen('resume.csv', "r");
            $row = 1;
            echo "
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