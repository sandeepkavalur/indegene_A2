<?php 

    class FileHandle{
        public function __construct(){
            $this->tmp_name = $_FILES["file"]['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $this->dir = getcwd().'/'.$file_name;

            $this->required_ext = array(
                "pdf", 
                "doc", 
                "docx",
                "txt"
            ); 

            $extension_arr = explode(".", $file_name);
            $this->extension = end($extension_arr);
        }

        public function updateFile($name, $pwd, $expi, $email){
            if(in_array($this->extension, $this->required_ext)){
                if(move_uploaded_file($this->tmp_name, $this->dir)){
                    echo "<p class='text-success'> File uploaded successfully! </P><br>";
                } else {
                    echo "<p class='text-danger'> Sorry, file not uploaded </p><br>";
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
            } else {
                die('<p class="text-danger"> Please provide another file type </P>');
            }
        }
    }
    
    $fileHandle = new FileHandle();
    $fileHandle->updateFile($name, $pwd, $expi, $email);
    
?>