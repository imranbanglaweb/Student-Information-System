<?php 
	require_once 'dbconfig.php';
	if (isset($_REQUEST['id'])) {
		$id = intval($_REQUEST['id']);
		$query = "SELECT * FROM tbl_subject WHERE id=:id";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		?>	
		<div class="table-responsive">
		<table class="table table-striped table-bordered">
		    <tr>
			    <th>Name</th>
				<td>
					<?php echo $subname; ?>
				</td>
			</tr>
			<tr>
				<th>Sub No</th>
				<td>
					<?php echo $subno; ?>
				</td>
			</tr>
			<tr>
				<th>Teacher Name</th>
				<td>
					<?php echo $tname; ?>
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
		</table>	
		</div>		
		<?php }
		