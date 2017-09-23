<?php include 'inc/header.php';?>

<div class="studentlist">
<h3>Result Details</h3>
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
$query="SELECT  * FROM eleventhsemester";
$post=$dbcon->select($query);
if ($post) {
while ($result=$post->fetch_array()) { ?>
<?php if ($result[5]== $_SESSION['roll']) {?>

<table class="admin" cellpadding="5">
	<tr>
		<th width="2%">Name</th>
		<td><?php echo $result[4];?></td>
	</tr>
	<tr>
		<th width="2%">Registration</th>
		<td><?php echo $result[1];?></td>
	</tr>
	<tr>
		<th width="2%">Batch</th>
		<<td><?php echo $result[2];?></td>
	</tr>
	<tr>
		<th width="2%">Semister</th>
		<td><?php echo $result[3];?></td>
	</tr>
	<tr>
		<th width="2%">Roll</th>
		<td><?php echo $result[5];?></td>
	</tr>
	<tr>
		<th width="2%">Artifical</th>
		<td><?php echo $result[6];?></td>
	</tr>
	<tr>
		<th width="2%">Artifical Lab</th>
		<td><?php echo $result[7];?></td>
	</tr>
	<tr>
		<th width="2%">Graphics</th>
		<td><?php echo $result[8];?></td>
	</tr>
	<tr>
		<th width="2%">Graphics Lab</th>
		<td><?php echo $result[9];?></td>
	</tr>
	<tr>
		<th width="2%">Parallel</th>
		<td><?php echo $result[10];?></td>
	</tr>
	<tr>
		<th width="2%">CGPA</th>
		<td><?php echo $result[11];?></td>
	</tr>
	<tr>
		<th width="2%">AG</th>
		<td><?php echo $result[12];?></td>
	</tr>
	<tr>
		<th width="2%">Result</th>
		<td><?php echo $result[13];?></td>
	</tr>
	<tr>
		<th width="2%">Session</th>
		<td><?php echo $result[15];?></td>
	</tr>
	<tr>
		<th width="2%">Department</th>
		<td><?php echo $result[16];?></td>
	</tr>
	<tr>
		<th width="2%">University</th>
		<td><?php echo $result[17];?></td>
	</tr>
	<tr>
		<th width="2%">Blood</th>
		<td><?php echo $result[18];?></td>
	</tr>
	<tr>
		<th width="2%">Year</th>
		<td><?php echo $result[19];?></td>
	</tr>


<?php } } } ?>

</table>

</div>
<?php include"inc/footer.php";?>