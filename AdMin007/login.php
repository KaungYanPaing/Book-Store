<?php
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ( $username == "KaungKaung" and $password == "12345") {
    $_SESSION['auth'] = true;
    header("location: book-list.php");
  } else {
    header("location: index.php");
  }
 ?>
