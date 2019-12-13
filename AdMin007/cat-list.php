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
	<title>Category Lists</title>
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
	<a href="cat-new.php" class="new"> + New Category</a>
	<?php
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "mystore";

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
		mysqli_select_db($conn, $dbname);

		$sql = "SELECT * FROM categories";
		$result = mysqli_query( $conn, $sql );
	 ?>
	 <ul class="list">
		 <?php while($row = mysqli_fetch_assoc($result)) : ?>
		 	<li title="<?php echo $row['remark'] ?>">
		 		<a href="cat-del.php?id=<?php echo $row['id'] ?>" class="del">Delete</a>
		 		<a href="cat-edit.php?id=<?php echo $row['id'] ?>" class="edit">Edit</a>
		 		<?php echo $row['name'] ?>
		 	</li>
		 <?php endwhile; ?>
	 </ul>
</body>
</html>
