<?php include 'inc/header.php';?>

<div class="studentlist">
<h3>User Routine</h3>
<?php
$query="SELECT  * FROM tbl_routine WHERE id=3";
$post=$dbcon->select($query);
if ($post) {
while ($result=$post->fetch_array()) {
?>
<table class="radmin" cellpadding="5">
	<tr>
		<th width="2%">Day</th>
		<td><?php echo $result[1];?></td>
	</tr>
	<tr>
		<th width="2%">9:40-11:20 AM</th>
		<td><?php echo $result[5];?><br>
			<span>Lab-4</span>
		</td>
	</tr>
	<tr>
		<th width="2%">11:20-1:00 AM</th>
		<<td><?php echo $result[5];?><br>
			<span>Lab-4</span>
		</td>
	</tr>
	<tr>
		<th width="2%">Subject Name</th>
		<td><?php echo $result[3];?></td>
	</tr>
	<tr>
		<th width="2%">Teacher Name</th>
		<td><?php echo $result[6];?></td>
	</tr>
<?php }}?>

</table>
<?php
$query="SELECT  * FROM tbl_routine WHERE id=4";
$post=$dbcon->select($query);
if ($post) {
while ($result=$post->fetch_array()) {
?>
<table class="radmin" cellpadding="5">
	<tr>
		<th width="2%">Day</th>
		<td><?php echo $result[1];?></td>
	</tr>
	<tr>
		<th width="2%">6:00-8:30 PM</th>
		<td><?php echo $result[4];?></td>

	</tr>
	<tr>
		<th width="2%">Subject Name</th>
		<td><?php echo $result[2];?></td>
	</tr>
	<tr>
		<th width="2%">Teacher Name</th>
		<td><?php echo $result[6];?></td>
	</tr>
<?php }}?>

</table>

</div>
<?php include"inc/footer.php";?>