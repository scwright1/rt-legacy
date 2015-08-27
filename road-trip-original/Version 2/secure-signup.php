<?php
    include "connect.php";

    //the plan:
    //take the plain text password and immediately add a random salt to it, and the environment salt to it, then hash it using SHA1, then store the entire hash in the database along with the random salt
    //to check, perform the same action except for the store, and compare the hashes
    if($db) {
        $f_name = $_POST['firstName'];
        $l_name = $_POST['lastName'];
        $email = $_POST['email'];
        $u_name = $_POST['userName'];
        $pwd = $_POST['password'];
        $a_type = $_POST['accountType'];
        $approved = 0;
    
        //the character set for the random string generator
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        //create a random string to be used as the random salt for the password hash
        $size = strlen($chars);
        for($i = 0; $i < 22; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }
    
        //create the random blowfish salt to be used for the crypt
        $r_blowfish_salt = "$2a$12$" . $str . "$";
    
        //grab the website salt
        $salt = getenv('WEBSITE_SALT');
    
        //combine the website salt, and the password
        $password_to_hash = $pwd . $salt;
    
        //crypt the password string using blowfish
        $password = crypt($password_to_hash, $r_blowfish_salt);
    
        //fire this information off to the database
        $insertion = 'INSERT INTO `users` (`user_id`, `username`, `password`, `salt`, `firstName`, `lastName`, `email`, `accountType`, `approved`) VALUES (NULL, :uname, :pw, :salt, :fname, :lname, :email, :tb, :ab);';
        $result = $db->prepare($insertion);
        
        $result->bindValue(":uname", $u_name);
        $result->bindValue(":pw", $password);
        $result->bindValue(":salt", $r_blowfish_salt);
        $result->bindValue(":fname", $f_name);
        $result->bindValue(":lname", $l_name);
        $result->bindValue(":email", $email);
        $result->bindValue(":tb", $a_type);
        $result->bindValue(":ab", $approved);
        
        $result->execute();
        //complete the signup process and dump us back to the homepage
    }

    $db = null;
    header("Location: index.php");
    exit;
?>
