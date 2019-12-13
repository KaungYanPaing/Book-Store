<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Detail</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  </head>
  <body>
      <h1>Book Detail</h1>
        <?php
          $dbhost = "localhost";
          $dbuser = "root";
          $dbpass = "";
          $dbname = "MyStore";

          $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
          mysqli_select_db($conn, $dbname);

          $id = $_GET['id'];
          $books = mysqli_query( $conn, "SELECT * FROM books WHERE id = $id");
          $row = mysqli_fetch_assoc($books);
         ?>
       <div class="detail">
         <a href="index.php" class="back">&laquo; Back</a>
         <img src="covers/<?php echo $row['cover'] ?>" >

         <h2><?php echo $row['title'] ?></h2>
         <i>By <?php echo $row['author'] ?></i>
         <br><br>
         <b>$<?php echo $row['price'] ?></b>
         <p><?php echo $row['summary'] ?></p>

         <a href="add-to-cart.php?id=<?php echo $id ?>" class="add-to-cart">
           Add To Cart
         </a>
       </div>
     <div class="footer">
       &copy; <?php echo date("Y") ?>.All right reserved.Developed By Kaung Yan Paing.
     </div>
  </body>
</html>
