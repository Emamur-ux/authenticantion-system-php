<?php

$hostName = "localhost";
$dbUser = "root";
$dbPsk = "";
$dbName = "sneat_web";

// sql => local project

try {
    $db = mysqli_connect($hostName, $dbUser, $dbPsk, $dbName);
} catch(\Exception $error) {
    echo $error->getMessage();
    exit();
}