<?php
	include('conn.php');
		
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
		
	$sql="insert into orders (order_date, order_price, order_quantity, user_id, product_id) VALUES (NOW(), '$order_price', '$order_quantity', '$user_id', '$product_id')";
	$conn->query($sql);
	header('location:orderhistory.php');
?>