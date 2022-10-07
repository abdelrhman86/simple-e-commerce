<?php
require_once("..\config.php");

$id= $_GET['id'];
$conn->query("DELETE FROM clothes WHERE id=$id");
header("location:index.php");
