<?php include 'inc/header.php';?>
<div class="studentlist">
<h3>Update Your Information</h3>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
  $name  = mysqli_real_escape_string($dbcon->link,$_POST['name']);
  $roll   = mysqli_real_escape_string($dbcon->link,$_POST['roll']);
  $reg    = mysqli_real_escape_string($dbcon->link,$_POST['reg']);
  $batch  = mysqli_real_escape_string($dbcon->link,$_POST['batch']); 
  $semister  = mysqli_real_escape_string($dbcon->link,$_POST['semister']); 
  $institute  = mysqli_real_escape_string($dbcon->link,$_POST['institute']);
  $blood  = mysqli_real_escape_string($dbcon->link,$_POST['blood']);
$department  = mysqli_real_escape_string($dbcon->link,$_POST['department']);
  $updateid=$_POST['upDateId'];
    if ($name == "") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }
    else{
    $query = "UPDATE tbl_student_info
    SET  
    name       ='$name',
    roll       ='$roll',
    reg 	   ='$reg',
    batch      ='$batch',
    institute  ='$institute',
    blood      ='$blood',
    department ='$department'
    WHERE id=$updateid";
    $update_rows = $dbcon->update($query);
    if ($update_rows) {
    	    // header('Location:details.php?msg='.urlencode('Data Updated Succesfully'));
      echo "<span style='color:white;font-size:18px;text-align:center;margin:0 auto; display:block'>Updated Successfully.</span>";
    }
    else {
      echo "<p style='color:green;font-size:18px;text-align:center;margin:0 auto; display:block'>".'sorry data not updated'."</p>";   
      }
}



}
?>

<?php 
if (!isset($_GET['stupdateid']) || $_GET['stupdateid'] == NULL) {
}
else{
  $stupdateid=$_GET['stupdateid'];
}
?>
<?php
$query="SELECT  * FROM  tbl_student_info WHERE id=$stupdateid";
$post=$dbcon->select($query);
if ($post) {
	$i=0;
while ($result=$post->fetch_array()) {
	$i++;
?>
 <form action="" method="post">
<table class="admin" cellpadding="5">
	<tr>
		<th width="2%">SL No</th>
		<td><?php echo $i;?></td>
	</tr>
	<tr>
		<th width="2%">Name</th>
		<td>
		<input type="text" name="name" value="<?php echo $result[1];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Roll</th>
		<td>
		<input type="text" name="roll" value="<?php echo $result[2];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Reg</th>
		<td>
		<input type="text" name="reg" value="<?php echo $result[3];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Batch</th>
		<td>
		<input type="text" name="batch" value="<?php echo $result[4];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Semister</th>
		<td>
		<input type="text" name="semister" value="<?php echo $result[5];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">institute</th>
		<td>
		<input type="text" name="institute" value="<?php echo $result[6];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Blood</th>
		<td>
		<input type="text" name="blood" value="<?php echo $result[7];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Department</th>
		<td>
		<input type="text" name="department" value="<?php echo $result[9];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Photo</th>
		<td>
		<img src="<?php echo $result[8];?>" height="40px" width="50px">
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
		<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		<input type="submit" value="Update">
	<input type="hidden" name="upDateId" value="<?php echo $result[0];?>">
		</td>
	</tr>

<?php }}?>

</table>
</form>
</div>

<!-- end student list -->
<?php include"inc/footer.php";?>