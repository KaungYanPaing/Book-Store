<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "mystore";

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	mysqli_select_db($conn, $dbname);
	
	$name = $_POST['name'];
	$remark = $_POST['remark'];
	$sql = "INSERT INTO categories( name, remark, created_date, modified_date )
			VALUES ( '$name', '$remark', now(), now())";

	mysqli_query( $conn, $sql );

	header("location: cat-list.php");

 ?>
