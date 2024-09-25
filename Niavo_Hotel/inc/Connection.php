<?php

function bdbConnection() {

    $dbHost = 'localhost'; 
    $dbName = 'niavo_hotel';
    $dbUser = 'root'; 
    $dbPassword = ''; 
    
    try{
        $dbConn= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPassword);
    } catch(Exception $e){
        echo "connexion failed" . $e->getMessage();
    }

    return $dbConn;
}

?>