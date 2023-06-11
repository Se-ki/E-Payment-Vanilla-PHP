<?php
function connect()
{
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'ceitonlinepaymentdb';
    $port = 3307;

    $connect = new mysqli($host, $user, $password, $database, $port);
    if ($connect->error)
        die("Error Occured at this moment!" . $connect->error);
    // echo "Connected Successfuly!";
    return $connect;
}
?>