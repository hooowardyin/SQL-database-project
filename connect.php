<?php
function OpenCon()
{
$dbhost = "localhost";
$dbuser = "hotel";
     $dbpass = "hotel";
     // $db = "hotelSys";
     $db = "test";
     $conn = new mysqli($dbhost, $dbuser,
     $dbpass,$db) or die("Connect failed: %s\n".
     $conn -> error);
     return $conn;
}
function CloseCon($conn)
{
$conn -> close(); }
?>