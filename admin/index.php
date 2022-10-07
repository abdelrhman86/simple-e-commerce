<?php
require_once("..\config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Admin panal</title>
</head>
<body>
       if you need need to insert a new product click <a href="insert.php">here</a>
       <h1> the clothes part </h1>
<?php 
$select = "SELECT * FROM clothes";
 // <button type="submit" name="delete">delete</button>
$result= $conn->query($select);

if($result->num_rows> 0 ):
       while($row = $result->fetch_assoc()){
              echo "<div> 
              the product name is $row[name] <br>
              the product price is $row[price]<br>
              the decription for the product is $row[description]<br>
              the amount for the proudct is$row[Amount]<br>
              <img src='$row[image]'>
              <a href='edit.php?id=$row[id]'>edit</a>
       <a href='delete.php?id=$row[id]'>delete</a> 
       </div>
       <hr>";
       }
endif
?>
</body>
</html>