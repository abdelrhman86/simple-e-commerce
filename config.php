<?php
$conn = new mysqli ("localhost","root","mysql","e-commerce");
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}