<!-- Edit Order -->
<div class="modal fade" id="editorder<?php echo $row['order_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Order</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editorder.php?order_id=<?php echo $row['order_id']; ?>" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
						<div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">User:</label>
                            </div>
                            <div class="col-md-9">
                                <select name="user_id" class="form-control">
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
                        </div>
						<div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Product:</label>
                            </div>
                            <div class="col-md-9">
                                <select name="product_id" class="form-control">
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
                        </div>
						<div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Quantity:</label>
                            </div>
                            <div class="col-md-9">
								<input type="number" class="form-control" name="order_quantity" id="order_quantity" min="1" placeholder="Quantity">
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Delete Order -->
<div class="modal fade" id="deleteorder<?php echo $row['order_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Order</h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Are you sure you want to delete this order?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <a href="deleteorder.php?order_id=<?php echo $row['order_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>