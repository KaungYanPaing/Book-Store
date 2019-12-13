<?php
  session_start();
  if (!isset($_SESSION['auth'])) {
    header("location: index.php");
    exit();
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Book List</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
  </head>
  <body>

    <div class="h1">
      Admin Dashboard
      <a href="logout.php">Logout</a>
    </div>
    
    <ul class="menu">
      <li><a href="book-list.php">Manage Books</a></li>
      <li><a href="cat-list.php">Manage Categories</a></li>
      <li><a href="orders.php">Manage Orders</a></li>
    </ul>

    <a href="book-new.php" class="new"> + New Book</a>

    <?php
      include("confs/config.php");

      $sql = "SELECT books.*, categories.name
              FROM books LEFT JOIN categories ON
              books.category_id = categories.id
              ORDER BY books.created_date DESC";
      $result = mysqli_query( $conn, $sql );
     ?>
     <ul class="list">
       <?php while($row = mysqli_fetch_assoc($result)) : ?>
         <li>
           <img src="../covers/<?php echo $row['cover'] ?>" alt="" align="right" height="140">

           <b><?php echo $row['title'] ?></b>
           <i>By <?php echo $row['author'] ?></i>
           <small>(in <?php echo $row['name'] ?>)</small>
           <span>$<?php echo $row['price'] ?></span>
           <div><?php echo $row['summary'] ?></div>
           <a href="book-edit.php?id=<?php echo $row['id'] ?>" class="edit">Edit</a>
           <a href="book-del.php?id=<?php echo $row['id'] ?>" class="del">Delete</a>
           <br><br>
         </li>
       <?php endwhile; ?>
     </ul>
  </body>
</html>
