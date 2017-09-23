<?php include 'inc/header.php';?>

<div class="studentlist">
<h3>Student Details</h3>
<button><a href="result.php"><i class="fa fa-code"></i>Show Your Result</a></button>
<?php 
if (isset($_GET['deluser'])) {
$deluser=$_GET['deluser'];
$query="DELETE FROM tbl_user
 WHERE id='$deluser'";
 $deluser=$dbcon->delete($query);
  if ($deluser) {
  	header("Location:userlist.php");
	// echo "<span class='success'>Deleted User Succsesfully</span>";
	   }
	   else{
	    echo "No Deleted User";
	   }
	                }
?>
<div id="successMessage">
<?php 
global $userId,$msg;
	if (isset($_GET['msg'])) {
	 echo "<span class='logout_msg' id='myElem'>".$_GET['msg']."</span>";
	}	
?> 
</div>
<?php 
if (isset($_GET['stid']) ) {
        $stid=$_GET['stid'];
}
 ?>
<?php
$query="SELECT  * FROM  tbl_student_info WHERE id='$stid'";
$post=$dbcon->select($query);
if ($post) {
	$i=0;
while ($result=$post->fetch_array()) {
	$i++;
?>
<table class="admin" cellpadding="5">
<tr>
	<td>
	<a class="updateid" href="studentupdate.php?stupdateid=<?php echo $result[0];?>">
	<i class="fa fa-edit"></i> Edit
	</a></td>
</tr>
	<tr>
		<th width="2%">SL No</th>
		<td><?php echo $i;?></td>
	</tr>
	<tr>
		<th width="2%">Name</th>
		<td><?php echo $result[1];?></td>
	</tr>
	<tr>
		<th width="2%">Roll</th>
		<td><?php echo $result[2];?></td>
	</tr>
	<tr>
		<th width="2%">Reg</th>
		<<td><?php echo $result[3];?></td>
	</tr>
	<tr>
		<th width="2%">Batch</th>
		<td><?php echo $result[4];?></td>
	</tr>
	<tr>
		<th width="2%">Semister</th>
		<td><?php echo $result[5];?></td>
	</tr>
	<tr>
		<th width="2%">Institute</th>
		<td><?php echo $result[6];?></td>
	</tr>
	<tr>
		<th width="2%">Blood</th>
		<td><?php echo $result[7];?></td>
	</tr>
	<tr>
		<th width="2%">Department</th>
		<td><?php echo $result[9];?></td>
	</tr>
	<tr>
		<th width="2%">Photo</th>
		<td>
		<img src="<?php echo $result[8];?>" height="40px" width="50px">
		</td>
	</tr>


<?php }}?>

</table>

</div>
<?php include"inc/footer.php";?>