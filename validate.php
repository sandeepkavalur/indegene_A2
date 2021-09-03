<?php

    function validate($fName,$lName,$email){
        $fNameMsg="";
        $lNameMsg="";
        $emailMsg="";
        $namePattern="^[a-zA-Z]{5,20}$^";
        $mailPattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
        
        // Email validation
        if (!preg_match ($mailPattern, $email) ){  
            $emailMsg="<strong>Enter a valid Mail ID</strong><br>";
            echo "$emailMsg"; 
        }

        // First Name validation
        if (!preg_match ($namePattern, $fName) ){  
            $fNameMsg="<strong>Enter a valid First Name</strong><br>";
            echo "$fNameMsg"; 
        }

        // Last Name validation
        if (!preg_match ($namePattern, $lName) ){  
            $lNameMsg="<strong>Enter a valid Last Name</strong><br>";
            echo "$lNameMsg"; 
        }

        //Check if details are valid or not
        if($fNameMsg==="" and $lNameMsg==="" and $emailMsg===""){
            return true;
        } elseif($fNameMsg!=="" and $lNameMsg!=="" and $emailMsg!=="") {
            echo "<strong>Re-check all the field entries</strong>";
            return false;
        } else {
            return false;
        }
    }

?>