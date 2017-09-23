<?php
	require_once 'dbconfig.php';
	
	// if ($_REQUEST['update']) {
		
	// 	$pid = $_REQUEST['update'];
	// 	$query = "UPDATE  tbl_book SET 
	// 	name   ='$name',
	// 	link   ='$link',
	// 	title  ='$title'
	// 	WHERE id=:pid";
	// 	$stmt = $DBcon->prepare( $query );
	// 	$stmt->execute(array(':pid'=>$pid));
		
	// 	if ($stmt) {
	// 		echo $name;
	// 	}
		
	// }
	if (isset($_REQUEST['update'])) {
			
		$pid = intval($_REQUEST['update']);
		$query = "SELECT * FROM tbl_book WHERE id=:pid";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		?>	
		<div class="table-responsive">
		
		<table class="table table-striped table-bordered">
		    <tr>
			    <th>Name</th>
				<td><?php echo $row['name']; ?></td>
			</tr>
			<tr>
				<th>Link</th>
				<td><?php echo $link;?></td>
			</tr>
			<tr>
				<th>title</th>
				<td><?php echo $title; ?></td>
			</tr>
			<tr>
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