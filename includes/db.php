<?php

    $DB["db_host"] = "localhost";
    $DB["db_user"] = "root";
    $DB["db_password"] = "";
    $DB["db_name"] = "cms";


    foreach ($DB as $key => $value){
        define(strtoupper($key),$value);
    }


    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if(!$connect){
        echo "Somer ERROR occured" . mysqli_error($connect);
    }









?>
