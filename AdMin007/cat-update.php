<?php

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "mystore";

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
  mysqli_select_db($conn, $dbname);

  $id = $_POST['id'];
  $name = $_POST['name'];
  $remark = $_POST['remark'];
  $sql = " UPDATE categories SET name='$name', remark='$remark', modified_date=now() WHERE id=$id ";
  mysqli_query( $conn, $sql );

  header("location: cat-list.php");
 ?>
