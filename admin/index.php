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
       <!-- normlaiz -->
       <link rel="stylesheet" href="../css/normalize.css">
       <!-- icon -->
       <link rel="stylesheet" href="../css/all.min.css">
       <!-- main style -->
       <link rel="stylesheet" href="../css/style.css">
       <!-- fonts -->
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
       <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
</head>
<body>
<header>
       <div class="contenar">
              <div class="one-line">
                     <div class="logo">
                            <a href="#">
                                   <h1>Logo</h1>
                            </a>
                     </div>
                     <div class="search">
                            <select name="filter" id="filter">
                                   <option value="o">test</option>
                                   <option value="tw">test</option>
                                   <option value="th">test</option>
                            </select>
                            <div>
                                   <input type="search" name="search" id="search" placeholder="Serach for more then 20,000 products">
                                   <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                            </div>
                     </div>
                     <div class="info-acount">
                     <div class="icon">
                            <i class="fa-solid fa-user"></i>
                     </div>
                     <div class="icon">
                            <i class="fa-solid fa-heart"></i>
                     </div>
                     <div class="icon">
                            <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                     </div>
                     </div>
              </div>
              <div class="two-line">
                     <nav>
                            <ul>
                                   <li class="active">
                                          <a href="#">Home</a>
                                   </li>
                                   <li>
                                          <a href="#">Category</a>
                                   </li>
                                   <li>
                                          <a href="#">acount</a>
                                   </li>
                                   <li>
                                          <a href="insert.php">insert data</a>
                                   </li>
                            </ul>
                     </nav>
              </div>
       </div>
</header>
       <h1> the clothes part </h1>
<main>
       <section class="data">
              <div class="contenar">
              <?php 
              $select = "SELECT * FROM clothes";
               // <button type="submit" name="delete">delete</button>
              $result= $conn->query($select);

              if($result->num_rows> 0 ):
                     while($row = $result->fetch_assoc()){
                            echo "<div class='card'>
                                   <div class='image'>
                                          <img src='$row[image]'>
                                   </div>
                                   <div class='desc'>
                                   <h2>$row[name]<span class='amount'>$row[Amount]</span></h2>
                                   <p>$row[price]</p>
                                   </div>
                                   <div class='chang'>
                                   <button type='submit' class='edit'>edit</button>
                                   <button type='submit' class='delet'>delet</button>
                                   </div>
                            </div>";
                     }
endif
?>
              </div>
       </section>
</main>
<script src="../js/script.js">
</script>
</body>
=======
<?php
/*
require_once("..\config.php");
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
header('location:..\login.php');
};
$select_users = "SELECT * from users";
$result_users= $conn->query($select_users);
$row = $result_users->fetch_assoc();
if (isset($user_id) && $row['email'] != "admin@ecommerce.com"){
       header("location:..\index.php");
}
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="..\css/all.min.css">
       <link rel="stylesheet" href="..\css/normalize.css">
       <link rel="stylesheet" href="..\css/style.css">
       <title>Admin panal</title>
</head>
<body>
<p>if you need need to insert a new product click <a href="insert.php">here</a></p> 
       <h1> the clothes part </h1>
<?php /*
$select = "SELECT * FROM clothes";
$result= $conn->query($select);

if($result->num_rows> 0 ):
       while($row = $result->fetch_assoc()){
              echo " <div ='container'>
              <div class='product'> 
              $row[name] <br>
              $row[price]<br>
              $row[description]<br>
              $row[Amount]<br>
              <img src='$row[image]'>
              <a href='edit.php?id=$row[id]'>edit</a>
       <a href='delete.php?id=$row[id]'>delete</a> 
       </div></div>
       <hr>";
       }
endif
*/
?>
<script src="..\js/script.js"></script>
</body>
</html> -->