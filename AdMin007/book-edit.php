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
    <title>Book Edit</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php
      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "";
      $dbname = "mystore";

      $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
      mysqli_select_db($conn, $dbname);

      $id = $_GET['id'];
      $sql1 = "SELECT * FROM books WHERE id = $id";
      $result = mysqli_query( $conn, $sql1 );
      $row = mysqli_fetch_assoc($result);
     ?>

    <div class="h1">
      Book Edit
    </div>

    <form action="book-update.php" method="post" enctype="multipart/form-data">

      <input type="hidden" name="id" value="<?php echo $row['id']?>">

      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="<?php echo $row['title'] ?>">

      <label for="author">Author</label>
      <input type="text" name="author" id="author" value="<?php echo $row['author'] ?>">

      <label for="summary">Summary</label>
      <textarea name="summary" id="summary"><?php echo $row['summary'] ?></textarea>

      <label for="price">Price</label>
      <input type="text" name="price" id="price" value="<?php echo $row['price'] ?>">

      <label for="categories">Category</label>
      <select name="category_id" id="categories">
        <?php
          $sql2 = "SELECT id, name FROM categories";
          $categories = mysqli_query( $conn, $sql2 );
         ?>
          <option value="0">--Choose--</option>
          <?php
            while($cat = mysqli_fetch_assoc($categories)):
           ?>
           <option value="<?php echo $cat['id'] ?>" >
             <?php if($cat['id'] == $row['category_id']) echo "selected" ?>
             <?php echo $cat['name'] ?>
           </option>
         <?php endwhile; ?>
      </select>

      <br><br>
      <img src="../covers/<?php echo $row['cover'] ?>" alt="" height="150">

      <br><br>
      <label for="cover">Change Cover</label>
      <input type="file" name="cover" id="cover">

      <br><br>
      <input type="submit" value="Update" id="submit">
    </form>
    <br><br>
    <a href="book-list.php" class="back">Back</a>
  </body>
</html>
