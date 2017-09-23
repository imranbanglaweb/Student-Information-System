<?php 
	require_once 'dbconfig.php';
	if (isset($_REQUEST['id'])) {
		$id = intval($_REQUEST['id']);
		$query = "SELECT * FROM tbl_user WHERE id=:id";
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
				<th>Gender</th>
				<td>
					<?php echo $gender; ?>
				</td>
			</tr>
			<tr>
				<th>Username</th>
				<td>
					<?php echo $username; ?>
				</td>
			</tr>
			<tr>
				<th>Password</th>
				<td>
					<?php echo $password; ?>
				</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>
					<?php echo $email; ?>
				</td>
			</tr>
			<tr>
				<th>Cell</th>
				<td>
					<?php echo $cell; ?>
				</td>
			</tr>
			<tr>
				<th>Birth</th>
				<td>
					<?php echo $birth; ?>
				</td>
			</tr>
			<tr>
				<th>Website</th>
				<td>
					<?php echo $website; ?>
				</td>
			</tr>
			<tr>
				<th>Blood</th>
				<td>
					<?php echo $blood; ?>
				</td>
			</tr>
			<tr>
				<th>Photo</th>
				<td>
					<img src="<?php echo $image; ?>" width="60px" height="60px">
				</td>
			</tr>
		</table>	
		</div>		
		<?php }
		