<?php
// get configration file
require_once("..\config.php");
// get product id 
$id= $_GET['id'];
$conn->query("DELETE FROM clothes WHERE id=$id");
header("location:index.php");