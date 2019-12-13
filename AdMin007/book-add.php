<?php
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "mystore";

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
  mysqli_select_db($conn, $dbname);

  $title = $_POST['title'];
  $author = $_POST['author'];
  $summary = $_POST['summary'];
  $price = $_POST['price'];
  $category_id = $_POST['category_id'];
  $cover = $_FILES['cover']['name'];
  $tmp = $_FILES['cover']['tmp_name'];
  $type = $_FILES['cover']['type'];

  if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png" || $type == "image/gif") {
    move_uploaded_file( $tmp, "../covers/$cover");
  }

  $sql = "INSERT INTO books( title, author, summary, price, category_id, cover, created_date, modified_date)
          VALUES ('$title','$author', '$summary', '$price', '$category_id', '$cover', now(), now())";
  mysqli_query( $conn, $sql );

  header("location: book-list.php");
 ?>
