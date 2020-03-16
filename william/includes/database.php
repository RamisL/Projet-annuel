<?php
    define('HOST','localhost');
    define('DB_NAME','william');
    define('USER','root');
    define('PASS','');

    try{ 
        $bdd = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER,PASS,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch(PDOException $e){
        echo $e;
    }
?>