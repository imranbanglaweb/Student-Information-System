<?php include 'inc/header.php';?>

<div class="studentlist">
<h3>User Details</h3>
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
<!-- <?php 
global $userId,$msg;
	if (isset($_GET['msg'])) {
	 echo "<span class='logout_msg' id='myElem'>".$_GET['msg']."</span>";
	}	
?> -->
</div>
<?php 
if (isset($_GET['userid']) ) {
        $userId=$_GET['userid'];
}
 ?>
<?php
$query="SELECT  * FROM tbl_user WHERE id='$userId'";
$post=$dbcon->select($query);
if ($post) {
	$i=0;
while ($result=$post->fetch_array()) {
	$i++;
?>
<table class="admin" cellpadding="5">
<tr>
	<td>
	<a class="updateid" href="update.php?updateid=<?php echo $result[0];?>">
	<i class="fa fa-edit"></i> Edit
	</a></td>
	<td>
	<a class="delid" onclick="return confirm('Are you sure to Deleted');" href="?deluser=<?php echo $result[0];?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
	</td>
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
		<th width="2%">Gender</th>
		<td><?php echo $result[2];?></td>
	</tr>
	<tr>
		<th width="2%">UserName</th>
		<<td><?php echo $result[3];?></td>
	</tr>
	<tr>
		<th width="2%">Password</th>
		<td><?php echo $result[4];?></td>
	</tr>
	<tr>
		<th width="2%">Email</th>
		<td><?php echo $result[5];?></td>
	</tr>
	<tr>
		<th width="2%">A Email</th>
		<td><?php echo $result[6];?></td>
	</tr>
	<tr>
		<th width="2%">Cell</th>
		<td><?php echo $result[7];?></td>
	</tr>
	<tr>
		<th width="2%">Birth</th>
		<td><?php echo $result[8];?></td>
	</tr>
	<tr>
		<th width="2%">Website</th>
		<td><?php echo $result[9];?></td>
	</tr>
	<tr>
		<th width="2%">Blood</th>
		<td><?php echo $result[10];?></td>
	</tr>
	<tr>
		<th width="2%">Roll</th>
		<td><?php echo $result[13];?></td>
	</tr>
	<tr>
		<th width="2%">Photo</th>
		<td>
		<img src="<?php echo $result[11];?>" height="40px" width="50px">
		</td>
	</tr>


<?php }}?>

</table>

</div>
<?php include"inc/footer.php";?>