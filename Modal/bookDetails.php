<?php 
	require_once 'dbconfig.php';
	if (isset($_REQUEST['id'])) {
		$id = intval($_REQUEST['id']);
		$query = "SELECT * FROM tbl_book WHERE id=:id";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		?>	
		<div class="table-responsive">
		<table class="table table-striped table-bordered">
		    <tr>
			    <th>Boook Name</th>
				<td>
					<?php echo $b_name; ?>
				</td>
			</tr>
			<tr>
				<th>Boook Type</th>
				<td>
					<?php echo $b_type; ?>
				</td>
			</tr>
			<tr>
				<th>Publisher</th>
				<td>
					<?php echo $publisher; ?>
				</td>
			</tr>
			<tr>
				<th>Batch</th>
				<td>
					<?php echo $batch; ?>
				</td>
			</tr>
			<tr>
				<th>Semister</th>
				<td>
					<?php echo $semister; ?>
				</td>
			</tr>
			<tr>
				<th>Institute</th>
				<td>
					<?php echo $institute; ?>
				</td>
			</tr>
			<tr>
				<th>Department</th>
				<td>
					<?php echo $department; ?>
				</td>
			</tr>
			<tr>
				<th>Book</th>
				<td>
					<a href="<?php echo $book;?>">
      <img src="images/pdf.png" height="25px" width="25px">
      	<?php echo $b_name; ?>
      </a>
				</td>
			</tr>
			</tr>
			<tr>
				<th>Date</th>
				<td>
					<?php echo $date; ?>
				</td>
			</tr>
		</table>	
		</div>		
		<?php }
		