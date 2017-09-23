<?php 
	require_once 'dbconfig.php';
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
				<td>
				<?php echo $name; ?>
				</td>
			</tr>
			<tr>
				<th>Roll</th>
				<td>
					<?php echo $roll; ?>
				</td>
			</tr>
			<tr>
				<th>Reg</th>
				<td>
					<?php echo $reg; ?>
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
				<th>Blood</th>
				<td>
					<?php echo $blood; ?>
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
				<th><?php echo $name; ?></th>
				<td> 
	<img src="<?php echo $image;?>" height="100px" width="150px">
				</td>
			</tr>
		</table>	
		</div>		
		<?php }?>
<?php 		
require_once 'dbconfig.php';
	if (isset($_GET['update'])) {
		$id 	= intval($_GET['update']);
		$name   = $_POST['name'];
		$roll   = $_POST['roll'];
		$reg    = $_POST['reg'];
		$department = $_POST['department'];
		$batch  = $_POST['batch'];
		$semister = $_POST['semister'];
		$blood    = $_POST['blood'];
		$institute = $_POST['institute'];
		$query  = "UPDATE tbl_student_info SET 
				name  ='$name',
				roll  ='$roll',
				reg   ='$reg',
				department   ='$department',
				batch ='$batch',
				semister='$semister',
				batch ='$batch',
				blood ='$blood'
		 WHERE id=:id";
		$stmt   = $DBcon->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		if ($stmt) {
			echo "Data Updated Successfully";
		}
	}
		?>