<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>insert products</title>
</head>
<body>
<form action="query.php" method="post" enctype="multipart/form-data">

       <label for="product_name">Enter the product name</label>
       <input type="text" name="name" id="product_name"><br>

       <label for="product_price">Enter the product price </label>
       <input type="text" name="price" id="product_price"><br>

       <label for="product_description">Enter the product description</label>
       <textarea name="description" cols="30" rows="10" id="product_description">
       </textarea><br>

       <label for="product_amount">Enter the product amount</label>
       <input type="number" name="amount" id="product_amount">

       <label for="image"></label>
       <input type="file" name="image" id="image"><br>
       
       <button type="submit" name="insert">submit</button>
</form> 
</body>
</html>