<?php
require_once("..\config.php");

// insert product to database
if(isset($_POST['insert']) && isset($_FILES['image'])){

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$amount = $_POST['amount'];
$image_location = $_FILES['image']['tmp_name'];
$image_name = $_FILES['image']['name'];
move_uploaded_file($image_location,'image/'.$image_name);
$image_up = "image/". $image_name;
$query=$conn->query("INSERT INTO clothes (name , price , description , amount ,image)VALUES ('$name','$price','$description','$amount','$image_up')");
if($query){
  header("location:index.php");
}}
// update products to database

if(isset($_POST['update'])){
      $id =$_POST['id'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $description = $_POST['description'];
      $amount = $_POST['amount'];
      $IMAGE = $_FILES['image'];
      $image_location = $_FILES['image']['tmp_name'];
      $image_name = $_FILES['image']['name'];
    
      move_uploaded_file($image_location,'image/'.$image_name);
      $image_up = "image/".$image_name;
        $query= $conn->query("UPDATE clothes SET name = '$name' ,price = '$price' , description ='$description',Amount ='$amount' , image='$image_up' WHERE id = $id");
        if($query){
        header("location:index.php");
        }else{
        echo"ther are a error in the query";
      }
      } 