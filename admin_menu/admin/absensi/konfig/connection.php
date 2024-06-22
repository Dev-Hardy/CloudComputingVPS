<?php
$dbhost = 'localhost'; 
$dbuser = 'root';
$password = '';
$dbname = 'ppdb_sd13';

$dbconnect = new mysqli($dbhost, $dbuser, $password, $dbname);

if ($dbconnect->connect_error) {
    die('Server Error');
}
?>