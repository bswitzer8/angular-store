<?php
    $servername = "localhost"; // getenv('IP');
    $username = "n01388635"; //getenv('C9_USER');
    $password = "summer2017388635";
    $database = "n01388635";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    
?>