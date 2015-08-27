<?php
    
    //session name
    session_name('journee');
    
    //cookie active period (2 weeks)
    session_set_cookie_params(2*7*24*60*60);

    session_start();
   
    if(isset($_GET['logoff']))
    {
    	$_SESSION = array();
    	session_destroy();
    	
    	header("Location: index.php");
    	exit;
    }

    if($_POST['submit']=='Login') {
        include "connect.php";
    
        if($db) {
            $errs = array();
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            if(!$_POST['username'] || !$_POST['password'])
                $errs[] = 'All the fields must be filled in!';
    
            if(!count($errs)) {
                //there are no errors here, continue
    
                //grab the password and the random salt from the database for the logging in user and check that it matches what we're expecting
                $q = 'SELECT * FROM `users` WHERE `username` = :user';
                $result = $db->prepare($q);
    
                $result->bindValue(":user", $username);
    
                $result->execute();
    
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $salt = getenv('WEBSITE_SALT');
    
                    $pwd = $password . $salt;
    
                    $fullpwd = crypt($pwd, $row['salt']);
    
                    if($fullpwd == $row['password']) {
                        $_SESSION['usr'] = $row['username'];
                        $_SESSION['id'] = $row['user_id'];
                        $_SESSION['acc'] = $row['accountType'];
                    }
                    else {
                        //something went badly wrong
                    }
                }
            }
    
            else {
                $_SESSION['msg']['login-err'] = implode('<br />',$errs);
                // Save the error messages in the session
            }
        }
        $db = null;
        header("Location: index.php");
        exit;
    }
?>
