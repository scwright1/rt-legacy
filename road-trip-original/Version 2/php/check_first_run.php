<?php
    //check for firstload.config file
    $config_file = '../config/init.conf';
    if (file_exists($config_file)) {
        echo 'true';
    } else {
        echo 'false';
    }
?>
