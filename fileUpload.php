<?php
    // Check for File Upload
    if(key_exists('resumeFile',$_FILES)) {
        // $_FILES is a superglobal variable    
        $fileName = $_FILES['resumeFile']['name'];
        $fileSize =$_FILES['resumeFile']['size'];
        $fileTmp=$_FILES['resumeFile']['tmp_name'];
        $fileExt=explode('.',$fileName);
        $fileExt=end($fileExt);
        $extension= array("pdf","doc","txt");
        $errMesg="";

        $dir=getcwd().'/'.$fileName; 
        if(in_array($fileExt,$extension)=== false){
            $errMesg="Inavlid file type, please upload pdf,doc or txt files";
        }
        if($fileSize> (1.5*1024*1024)) {
            $errMesg ="File size larger than 1.5 MB not allowed, reduce the file size";
        }
        if($errMesg){
            echo "<strong>".$errMesg."<br>File Upload Unsuccessful, Retry!</strong><br><br></strong>";
        } elseif(move_uploaded_file($fileTmp,$dir)) {
            echo "<strong>Congratulations! Resume Uploaded successfully</strong><br><br>";
        }
    }

?>