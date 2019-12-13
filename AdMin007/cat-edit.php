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
	<title>Cat-Edit</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
</head>
<style>
	form label{
		display: block;
		margin-top: 8px;
	}
</style>
<body>
	<div class="h1">
      Edit Category
    </div>
	<?php
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "mystore";

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
		mysqli_select_db($conn, $dbname);
		
		$id = $_GET['id'];
		$sql = "SELECT * FROM categories WHERE id = $id";
		$result = mysqli_query( $conn, $sql);
		$row = mysqli_fetch_assoc($result);
 	?>

	<form action="cat-update.php" method="post">
		<input type="hidden" name="id" value="<?php echo $row['id'] ?>">

		<label for="name">Category Name</label>
		<input type="text" name="name" id="name" value="<?php echo $row['name'] ?>">

		<label for="remark">Remark</label>
		<textarea name="remark" id="remark"><?php echo $row['remark'] ?></textarea>


		<br><br>
		<input type="submit" value="Save" id="submit">
	</form>
	<a href="cat-list.php" class="back">Back</a>
</body>
</html>
