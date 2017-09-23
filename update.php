<?php include 'inc/header.php';?>

<div class="studentlist">
<h3>Update Your Information</h3>

<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
  $name  = mysqli_real_escape_string($dbcon->link,$_POST['name']);
  $gender   = mysqli_real_escape_string($dbcon->link,$_POST['gender']);
  $username    = mysqli_real_escape_string($dbcon->link,$_POST['username']);
  // $password =$dfm->validation(md5($_POST['password']));
  $email  = mysqli_real_escape_string($dbcon->link,$_POST['email']); 
  $aemail  = mysqli_real_escape_string($dbcon->link,$_POST['aemail']); 
  $cell  = mysqli_real_escape_string($dbcon->link,$_POST['cell']);
  $roll  = mysqli_real_escape_string($dbcon->link,$_POST['roll']);
  $birth  = mysqli_real_escape_string($dbcon->link,$_POST['birth']);
  $website  = mysqli_real_escape_string($dbcon->link,$_POST['website']);
  $blood  = mysqli_real_escape_string($dbcon->link,$_POST['blood']);
  $updateid=$_POST['upDateId'];
    if ($name == "") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }
    else{
    $query = "UPDATE tbl_user
    SET  
    name     ='$name',
    gender   ='$gender',
    username ='$username',
    email    ='$email',
    aemail   ='$aemail',
    cell     ='$cell',
    birth 	 ='$birth',
    website  ='$website',
    blood    ='$blood',
    roll    ='$roll'
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
if (!isset($_GET['updateid']) || $_GET['updateid'] == NULL) {
  echo "<script>window.location='userlist.php';</script>";
}
else{
  $updateid=$_GET['updateid'];
}
?>
<?php
$query="SELECT  * FROM tbl_user WHERE id=$updateid";
$post=$dbcon->select($query);
if ($post) {
	$i=0;
while ($result=$post->fetch_array()) {
	$i++;
?>
 <form action="update.php" method="post">
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
		<th width="2%">Gender</th>
		<td>
		<input type="text" name="gender" value="<?php echo $result[2];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">UserName</th>
		<td>
		<input type="text" name="username" value="<?php echo $result[3];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Password</th>
		<td>
		<input type="text" name="password" value="<?php echo $result[4];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Email</th>
		<td>
		<input type="text" name="email" value="<?php echo $result[5];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">A Email</th>
		<td>
		<input type="text" name="aemail" value="<?php echo $result[6];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Cell</th>
		<td>
		<input type="text" name="cell" value="<?php echo $result[7];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Roll</th>
		<td>
		<input type="text" name="roll" value="<?php echo $result[13];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Birth</th>
		<td>
		<input type="text" name="birth" value="<?php echo $result[8];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Website</th>
		<td>
		<input type="text" name="website" value="<?php echo $result[9];?>">
		</td>
	</tr>
	<tr>
		<th width="2%">Blood</th>
		<td>
		<input type="text" name="blood" value="<?php echo $result[10];?>">
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