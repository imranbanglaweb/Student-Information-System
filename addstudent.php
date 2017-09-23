<?php include 'inc/header.php';?>

<div class="addstudents">
<h3>Add Student</h3>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $name   = mysqli_real_escape_string($dbcon->link,$_POST['name']);
    $roll   = mysqli_real_escape_string($dbcon->link,$_POST['roll']);
    $reg    = mysqli_real_escape_string($dbcon->link,$_POST['regNo']);
    $batch  = mysqli_real_escape_string($dbcon->link,$_POST['batch']);
    $semister  = mysqli_real_escape_string($dbcon->link,$_POST['semister']); 
    $institute  = mysqli_real_escape_string($dbcon->link,$_POST['institute']);
   $blood  = mysqli_real_escape_string($dbcon->link,$_POST['blood']);
   $department  = mysqli_real_escape_string($dbcon->link,$_POST['department']);
 //   $image  = mysqli_real_escape_string($dbcon->link,$_POST['image']);
	// $userid    = mysqli_real_escape_string($dbcon->link,$_POST['userid']);
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $div       = explode('.', $file_name);
    $file_ext  = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
    if ($name == "" || $roll == "" || $reg == "" || $file_name == "" || $batch == "" || $semister == "") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }
   elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
 }
    else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO  tbl_student_info
    (name,roll,reg,batch,semister,institute,blood,image,department) 
    VALUES('$name','$roll','$reg','$batch','$semister','$institute','$blood','$uploaded_image','$department')";
    $inserted_rows = $dbcon->insert($query);
    
  
    if ($inserted_rows) {
        header('Location: studentlist.php?msg='.urldecode('Student Added Successfully'));
     // echo "<span class='success'>Student Added Successfully.
     // </span>";
    }else 
    {
     echo "<span class='error'>Student Not Added !</span>";
    }
}
}
?>
<table width="100%">
<form action="addstudent.php" method="post" enctype="multipart/form-data">
	<tr>
		<td><label>Name</label></td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td><label>Roll</label></td>
		<td><input type="text" name="roll"></td>
	</tr>
	<tr>
		<td><label>Reg No</label></td>
		<td><input type="text" name="regNo"></td>
	</tr>
	<tr>
		<td><label>Batch</label></td>
		<td><input type="text" name="batch"></td>
	</tr>
	<tr>
		<td><label>Semister</label></td>
		<td><input type="text" name="semister"></td>
	</tr>
	<tr>
		<td><label>Institute</label></td>
		<td><input type="text" name="institute"></td>
	</tr>
    <tr>
        <td><label>Blood Group</label></td>
        <td><input type="text" name="blood"></td>
    </tr>
	<tr>
		<td><label>Department</label></td>
		<td><input type="text" name="department"></td>
	</tr>
	<tr>
		<td><label>Photo</label></td>
		<td><input type="file" name="image"></td>
	</tr>
	<tr>
		<td><i class="fa fa-upload" aria-hidden="true"></i></td>
		<td><input type="submit" value="Submit"></td>
	</tr>
</form>
</table>
</div>
<?php include"inc/footer.php";?>