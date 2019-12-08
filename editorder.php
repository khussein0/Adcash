<?php
	include('conn.php');

	$id=$_GET['order_id'];

	$user_id=$_POST['user_id'];
	$product_id=$_POST['product_id'];
	$order_quantity=$_POST['order_quantity'];

	$sql="select * from product where product_id='$product_id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

	if($product_id == 1 && $order_quantity >= 3){
		$order_price = $_POST['order_quantity'] * $row['product_price'] * 0.8;
	}else{
		$order_price = $_POST['order_quantity'] * $row['product_price'];
	}

	$sql="update orders set user_id='$user_id', product_id='$product_id', order_quantity='$order_quantity', order_price='$order_price' where order_id='$id'";
	$conn->query($sql);

	header('location:orderhistory.php');
?>