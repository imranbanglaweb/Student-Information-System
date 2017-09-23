<?php include 'inc/header.php';?>
<div class="addstudents">
<h3><a href=""></a>Add Subject</h3>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $sname   = mysqli_real_escape_string($dbcon->link,$_POST['sname']);
    $subno   = mysqli_real_escape_string($dbcon->link,$_POST['course']);
    $tname    = mysqli_real_escape_string($dbcon->link,$_POST['teacher_name']);
    $batch  = mysqli_real_escape_string($dbcon->link,$_POST['batch']);
    $semister  = mysqli_real_escape_string($dbcon->link,$_POST['semister']); 
    $department  = mysqli_real_escape_string($dbcon->link,$_POST['department']); 
    $institute  = mysqli_real_escape_string($dbcon->link,$_POST['institute']);

    if ($sname == "" || $subno == "" || $tname == "" || $department == "" || $batch == "" || $semister == "" || $institute == "") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }
    else{
    $query = "INSERT INTO tbl_subject
    (
    subname,
    subno,
    tname,
    batch,
    semister,
    department,
    institute) 
    VALUES(
    '$sname',
    '$subno',
    '$tname',
    '$batch',
    '$semister',
    '$department',
    '$institute')";
    $inserted_rows = $dbcon->insert($query);
    
    if ($inserted_rows) {
     header('Location: subjectlist.php?msg='.urldecode('Subject Added Successfully'));
    }else 
    {
     echo "<span class='error'>Subject Not Added !</span>";
    }
}
}
?>


<table width="100%">
<form action="" method="post">
	<tr>
		<td><label>Subject Name</label></td>
		<td><input type="text" name="sname"></td>
	</tr>
	<tr>
		<td><label>Subject Course</label></td>
		<td><input type="text" name="course"></td>
	</tr>
	<tr>
		<td><label>Teacher Name</label></td>
		<td><input type="text" name="teacher_name"></td>
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
		<td><label>Department</label></td>
		<td><input type="text" name="department"></td>
	</tr>
	<tr>
		<td><label>Institute</label></td>
		<td><input type="text" name="institute"></td>
	</tr>
	<tr>
		<td><i class="fa fa-upload" aria-hidden="true"></i></td>
		<td><input type="submit" value="Submit"></td>
	</tr>

</form>
</table>
</div>
<?php include"inc/footer.php";?>