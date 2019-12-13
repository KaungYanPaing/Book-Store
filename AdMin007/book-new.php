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
    <title>Book New</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="h1">
      New Book
    </div>
    <form action="book-add.php" method="post" enctype="multipart/form-data">
      <label for="title">Book Title</label>
      <input type="text" name="title" id="title">

      <label for="author">Author</label>
      <input type="text" name="author" id="author">

      <label for="summary">Summary</label>
      <textarea name="summary" id="summary"></textarea>

      <label for="price">Price</label>
      <input type="text" name="price" id="price">

      <label for="categories">Category</label>
      <select name="category_id" id="categories">

        <option value="0">--Choose--</option>

        <?php
          $dbhost = "localhost";
          $dbuser = "root";
          $dbpass = "";
          $dbname = "mystore";

          $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
          mysqli_select_db($conn, $dbname);

          $sql = "SELECT id, name FROM categories";
          $result = mysqli_query( $conn, $sql );
          while($row = mysqli_fetch_assoc($result)):
        ?>

        <option value="<?php echo $row['id'] ?>" >
          <?php echo $row['name'] ?>
        </option>
      <?php endwhile; ?>
      </select>

      <label for="cover">Cover</label>
      <input type="file" name="cover" id="cover">

      <br><br>
      <input type="submit" value="Add Book" id="submit">
    </form>
    <br><br>
    <a href="book-list.php" class="back">Back</a>
  </body>
</html>
