<?php
/*
$hn= 'localhost';
$db ='apuntesv2';
$un ='root';
$pw ='joaquin12';
*/
$servername = "localhost";
$username = "root";
$password = "joaquin12";
$dbname = "apuntesV2";

if(!$con = new mysqli($servername, $username, $password, $dbname))
{

	die("failed to connect!");
}



?>

