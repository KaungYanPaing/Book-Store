<?php
  session_start();
  if (!isset($_SESSION['auth'])) {
    header("location: index.php");
    exit();
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cat-New</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
</head>
<body>
	<div class="h1">
      New Category
    </div>
	<form action="cat-add.php" method="post">
		<label for="name">Category Name</label>
		<input type="text" name="name" id="name">

		<label for="remark">Remark</label>
		<textarea name="remark" id="remark"></textarea>

		<br><br>
		<input type="submit" value="Submit" id="submit">
	</form>
	<a href="cat-list.php" class="back">Back</a>
</body>
</html>
