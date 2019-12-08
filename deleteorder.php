<?php
	include('conn.php');

	$id = $_GET['order_id'];

	$sql="delete from orders where order_id='$id'";
	$conn->query($sql);

	header('location:orderhistory.php');
?>