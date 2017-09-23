<?php
	require_once 'dbconfig.php';
	
	if ($_REQUEST['delete']) {
		
		$pid = $_REQUEST['delete'];
		$query = "DELETE FROM tbl_social WHERE id=:pid";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
		
		if ($stmt) {
			echo "Social Site Deleted Successfully ...";
		}
		
	}
	
	  