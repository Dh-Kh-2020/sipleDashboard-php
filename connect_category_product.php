<?php
$host ="127.0.0.1";
$user = "root";
$password = "";
// $database = "category_product";
$database = "simple_dashboard";

$conn = new mysqli($host,$user,$password,$database);

if($conn->connect_error)
{
    echo "Failed";
    exit();
}
else
    echo "Connected";

