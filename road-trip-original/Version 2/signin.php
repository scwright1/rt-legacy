<?php
    include "connect.php";

    if($db) {
        $errs = array();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = (int)$_POST['rememberMe'];

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

                    $_SESSION['rememberMe'] = $_POST['rememberMe'];
			
        			// Store some data in the session
        			
        			setcookie('rememberMe',$_POST['rememberMe']);

                    header("Location: index.php");
                    exit;
                }
                else {
                    echo "something went wrong.  Here are the details: ";
                    echo "Website Salt: " . $salt;
                    echo "Blowfish Salt: " . $row['salt'];
                    echo "Password passed in: " . $password;
                    echo "Crypt now: " . $fullpwd;
                    echo "Crypt stored in DB: " . $row['password'];
                }
            }
        }

        else {
            echo "got here somehow";
            $_SESSION['msg']['login-err'] = implode('<br />',$errs);
            // Save the error messages in the session
        }
    }
    $db = null;
    header("Location: index.php");
    exit;
?>
