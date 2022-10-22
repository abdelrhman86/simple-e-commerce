<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
</head>
<body>
       <?php
       // get configration file
       require_once("..\config.php");
       // get product id to edit
       $id = $_GET['id'];
        $row = mysqli_query($conn,"SELECT * from clothes where id =$id");
       $data = mysqli_fetch_array($row);
       ?>
       <form action="query.php" method="POST" enctype="multipart/form-data">

       <h2>edit product</h2>
       <input type="text" name="id" value="<?php echo $data['id'] ?>" style ="display:none;">

       <label for="product">edit the product name</label>
       <input type="text" name="name" id="product_name" value="<?php  echo $data['name'] ?>"><br>

       <label for="product_price">Enter the product price </label>
       <input type="text" name="price" id="product_price"value="<?php echo $data['price'] ?>"><br>

       <label for="product_description">Enter the product description</label>
       <textarea name="description" cols="30" rows="10" id="product_description">
       <?php echo $data['description'] ?></textarea><br>

       <label for="product_amount">Enter the product amount</label>
       <input type="number" name="amount" id="product_amount" value="<?php echo $data['Amount'] ?>"><br>

       <label for="file">Update product image</label>
       <input type="file" name='image' id="file" ><br>

       <input type="submit" name="update" value="update">
       </form>
</body>
</html>