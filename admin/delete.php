<?php
	include 'conn.php';
	$id = $_GET['id'];
	$sql = "Delete from users where id = '$id'";
	if($conn->query($sql) === true){
		echo "Sucessfully deleted data";
		header('location:list.php');
	}else{
		echo "Oppps something error ";
	}
	$conn->close();
?>