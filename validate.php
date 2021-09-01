<?php 
    $err = false;
    class validate{
        public function val_name($name, &$err){
            if (!preg_match("/^[a-zA-Z-' ]{5,15}$/", $name)) {
                $err = true;
                return "User Name does not meet the requirements!";
            }
        }
        public function val_pwd($pwd, &$err){
            if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pwd)) {
                $err = true;
                return 'the password does not meet the requirements!';
            }
        }
        public function val_email($email, &$err){
            if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) {
                $err = true;
                return "Invalid email format";
            }
        }
    }
    
    $val = new validate;
    $name_err = $val->val_name($name, $err);
    $pwd_err = $val->val_pwd($pwd, $err);
    $email_err = $val->val_email($email, $err);
    if($err){
        echo '<p class=" text-danger">'.$name_err.'<br>'. $pwd_err.'<br>'. $email_err.'<br></p>';
    } else {
        require 'dbput.php';
    }
    
?>