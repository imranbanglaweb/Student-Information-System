<?php 
	require_once 'dbconfig.php';
	if (isset($_GET['editUser'])) {
		$id=$_GET['editUser'];
		$subname=$_POST['sname'];
		$sno=$_POST['sno'];
		$tname=$_POST['tname'];
		$batch=$_POST['batch'];
		$semister=$_POST['semister'];
		$institute=$_POST['institute'];
		$department=$_POST['department'];
		$query="UPDATE tbl_subject SET 
		subname 	='$subname',
		subno   	='$subno',
		tname   	='$tname',
		batch   	='$batch',
		semister 	='$semister',
		department  ='$department',
		institute   ='$institute' WHERE id=:id";
		$stmt = $DBcon->prepare($query);
		$stmt->execute(array(':id'=>$id));
		if ($stmt) {
	// header('Location:subjectlist.php?upmsg='.urldecode('Congratulation Updated Successfully'));
			echo "data Updated";
		}
	}

?>
<?php
	if (isset($_REQUEST['id'])) {
		$id = intval($_REQUEST['id']);
		$query = "SELECT * FROM tbl_subject WHERE id=:id";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		?>	
		<div class="table-responsive">
		<form action="" method="post" name="id" id="id">
			<table class="table table-striped table-bordered">
		    <tr>
			    <th>Name</th>
				<td>
					<input type="text" name="sname" value="<?php echo $subname; ?>">
				</td>
			</tr>
			<tr>
				<th>Sub No</th>
				<td>
					<input type="text" name="sno" value="<?php echo $subno; ?>">
				</td>
			</tr>
			<tr>
				<th>Teacher Name</th>
				<td>
					<input type="text" name="tname" value="<?php echo $tname; ?>">
				</td>
			</tr>
			<tr>
				<th>Batch</th>
				<td>
					<input type="text" name="batch" value="<?php echo $batch; ?>">
				</td>
			</tr>
			<tr>
				<th>Semister</th>
				<td>
					<input type="text" name="semister" value="<?php echo $semister; ?>">
				</td>
			</tr>
			<tr>
				<th>Institute</th>
				<td>
					<input type="text" name="institute" value="<?php echo $institute; ?>">
				</td>
			</tr>
			<tr>
				<th>Department</th>
				<td>
					<input type="text" name="department" value="<?php echo $department; ?>">
				</td>
			</tr>
			<tr>
				<th></th>
				<td>
			<button class="btn-info btn-sm uid" type="submit" 
            data-id="<?php echo $id; ?>" id="editUser">
            <i class="glyphicon glyphicon-edit"></i>&nbsp;Updated
            </button>
				</td>
			</tr>
			</table>
		</form>	
		</div>		
		<?php }
		