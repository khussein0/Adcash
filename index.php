<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
	<!-- Page header -->
	<div class="container">
		<h1 class="page-header text-center">Adcash Food Ordering System</h1>
	</div>
	
	<!-- New order -->
	<div class="container">
		<h3 class="text-left">Add new order</h3>
		<form method="post" action="order.php">
		<div class="form-group">
			<label for="user">User:</label>
			<select name="user_id" class="form-control" required>
				<option value="">Select</option>
				<?php
				$sql = mysqli_query($conn, "SELECT * From user");
				$row = mysqli_num_rows($sql);
				while ($row = mysqli_fetch_array($sql)){
				echo "<option value='". $row['user_id'] ."'>" .$row['user_name'] ."</option>" ;
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="product">Product:</label>
			<select name="product_id" class="form-control" required>
				<option value="">Select</option>
				<?php
				$sql = mysqli_query($conn, "SELECT * From product");
				$row = mysqli_num_rows($sql);
				while ($row = mysqli_fetch_array($sql)){
				echo "<option value='". $row['product_id'] ."'>" .$row['product_name'] ."</option>" ;
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="quantity">Quantity:</label>
			<input type="number" class="form-control" name="order_quantity" id="order_quantity" min="1" placeholder="Quantity" required>
		</div>
		<div>
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Order</button>
		</div>
		</form>
	</div>
	
</body>
<footer><center>Brought To You By Khaled Hussein</center></footer>
</html>