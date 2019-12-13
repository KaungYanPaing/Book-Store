<?php
  session_start();

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "MyStore";

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
  mysqli_select_db($conn, $dbname);

  $cart = 0;
  if(isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $qty) {
      $cart += $qty;
    }
  }

  if (isset($_GET['cat'])) {
    $cat_id = $_GET['cat'];
    $books = mysqli_query($conn, "SELECT * FROM books WHERE category_id = $cat_id");
  } else {
    $books = mysqli_query($conn, "SELECT * FROM books");
  }
  $cats = mysqli_query($conn, "SELECT * FROM categories");
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Book Store</title>
     <link rel="stylesheet" href="css/style.css">
      <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
   </head>
   <body>
      <h1>
        <img src="./covers/logo.png">
        KK Online Book Store
      </h1>
    
     <div class="sidebar">
       <ul class="cats">
         <li>
           <b><a href="index.php">Home</a></b>
         </li>
         <?php while($row = mysqli_fetch_assoc($cats)): ?>
           <li>
             <b><a href="index.php?cat=<?php echo $row['id'] ?>">
               <?php echo $row['name'] ?>
             </a></b>
           </li>
         <?php endwhile; ?>
       </ul>
     </div>

     <div class="banner">
       <h1 class="header">Welcome</h1>
     </div>

     <div class="info">
       <a href="view-cart.php">
         (<?php echo $cart ?>) books in your cart
       </a>
     </div>

     <div class="main">
       <ul class="books">
         <?php while($row = mysqli_fetch_assoc($books)): ?>
           <li>
             <img src="covers/<?php echo $row['cover'] ?>" width="150" height="150">
             <b>
               <a href="book-detail.php?id=<?php echo $row['id'] ?>">
                 <?php echo $row['title'] ?>
               </a>
             </b>
             <i>$<?php echo $row['price'] ?></i>
             <a href="add-to-cart.php?id=<?php echo $row['id'] ?>" class="add-to-cart">Add To Cart</a>
           </li>
         <?php endwhile; ?>
       </ul>
     </div>
     <div class="footer">
       &copy; <?php echo date("Y"); ?>.All right reserved.Developed By Kaung Yan Paing.
     </div>
   </body>
 </html>
