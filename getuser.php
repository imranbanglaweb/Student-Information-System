<?php
		 
	require_once 'Modal/dbconfig.php';
	
	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
		$query = "SELECT * FROM tbl_student_info WHERE id=:id";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		?>	
		<div class="table-responsive">
		
		<table class="table table-striped table-bordered">
		    <tr>
			    <th>Name</th>
				<td><?php echo $name; ?></td>
			</tr>
			<tr>
				<th>Roll</th>
				<td><?php echo $roll; ?></td>
			</tr>
			<tr>
				<th>Reg</th>
				<td><?php echo $reg; ?></td>
			</tr>
			<tr>
				<th>Batch</th>
				<td><?php echo $batch; ?></td>
			</tr>
			<tr>
				<th>Semister</th>
				<td><?php echo $semister; ?></td>
			</tr>
			<tr>
				<th>Blood</th>
				<td><?php echo $blood; ?></td>
			</tr>
			<tr>
				<th>Institute</th>
				<td><?php echo $institute; ?></td>
			</tr>
			<tr>
				<th>Department</th>
				<td><?php echo $department; ?></td>
			</tr>
			<tr>
				<th>Image</th>
				<td> 
					<img src="<?php echo $image;?>" height="100px" width="150px">
				</td>
			</tr>
		</table>
			
		</div>
			
		<?php				
	}