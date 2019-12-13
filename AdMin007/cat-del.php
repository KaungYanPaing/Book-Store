<?php 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "mystore";

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	mysqli_select_db($conn, $dbname);

	$id = $_GET['id'];
	$sql = "DELETE FROM categories WHERE id=$id ";
	mysqli_query( $conn, $sql );

	header("location: cat-list.php");
 ?>
