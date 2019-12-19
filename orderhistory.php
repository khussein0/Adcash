<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
	<!-- Page header -->
	<div class="container">
		<h1 class="page-header text-center">Adcash Food Ordering System</h1>
	</div>
	
	<!-- Search -->
	<div class="container">
		<h3 class="text-left">Search</h3>
		<div class="col-md-4">
		<form method="post" action="">
			<div class="form-group">
				<select name="search_date" class="form-control">
					<option value="100000">Date</option>
					<option value="100000">All time</option>
					<option value="7">Last 7 days</option>
					<option value="0">Today</option>
				</select>
			</div>
			<div class="form-group">
				<select name="user_id" class="form-control">
					<option value="%">User</option>
					<option value="1">John Smith</option>
					<option value="2">Laura Stone</option>
					<option value="3">Jon Olseen</option>
				</select>
			</div>
			<div class="form-group">
				<select name="product_id" class="form-control">
					<option value="%">Product</option>
					<option value="1">Pepsi Cola</option>
					<option value="2">Coca Cola</option>
					<option value="3">Fanta</option>
				</select>
			</div>
			<div>
				<button type="submit" name="search" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Filter</button>
			</div>
		</form>
		</div>
	</div>
	
	<!-- Order History -->
	<div class="container">
		<h3 class="text-left">Order History</h3>
		<table class="table table-striped table-bordered">
			<thead>
				<th>User</th>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
				<th>Date</th>
				<th>Actions</th>
			</thead>
			<tbody>
				<?php
					if(isset($_POST["search"])){
						$sql="SELECT * FROM orders o JOIN user u ON o.user_id=u.user_id JOIN product p ON o.product_id=p.product_id WHERE o.product_id LIKE '$_POST[product_id]' AND o.user_id LIKE '$_POST[user_id]' AND o.order_date>=DATE(NOW()) - INTERVAL '$_POST[search_date]' DAY";
					}else{
						$sql="SELECT * FROM orders o JOIN user u ON o.user_id=u.user_id JOIN product p ON o.product_id=p.product_id";
					}
						$query=$conn->query($sql);
						while($row=$query->fetch_array()){
                ?>
                    <tr>
						<td><?php echo $row['user_name']; ?></td>
						<td><?php echo $row['product_name']; ?></td>
						<td><?php echo $row['product_price']; ?></td>
						<td><?php echo $row['order_quantity']; ?></td>
						<td><?php echo $row['order_price']; ?></td>
						<td><?php echo $row['order_date']; ?></td>
						<td>
							<a href="#editorder<?php echo $row['order_id']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <?php include('order_modal.php'); ?>|| <a href="#deleteorder<?php echo $row['order_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
							<?php include('order_modal.php'); ?>
						</td>
					</tr>
                <?php                
                    }
                ?>
			</tbody>
		</table>
	</div>

</body>
<footer><center>Brought To You By Khaled Hussein</center></footer>
</html>
