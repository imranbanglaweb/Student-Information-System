<?php include 'inc/header.php';?>

<div class="addstudents">
<h3>Add Routine</h3>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $day   = mysqli_real_escape_string($dbcon->link,$_POST['day']);
    $sub1    = mysqli_real_escape_string($dbcon->link,$_POST['sub1']);
    $sub2    = mysqli_real_escape_string($dbcon->link,$_POST['sub2']);
    $subno1    = mysqli_real_escape_string($dbcon->link,$_POST['subno1']);
    $subno2    = mysqli_real_escape_string($dbcon->link,$_POST['subno2']);
    $teacher_name    = mysqli_real_escape_string($dbcon->link,$_POST['teacher_name']);
    if ($day == "") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }
  
    else{
    $query = "INSERT INTO  tbl_routine
    (
    day,
    sub1,
    sub2,
    subno1,
    subno2,
    teacher_name
    ) 
    VALUES(
    '$day',
    '$sub1',
    '$sub2',
    '$subno1',
    '$subno2',
    '$teacher_name'
    )";
    $inserted_rows = $dbcon->insert($query);
    
  
    if ($inserted_rows) {
     echo "<span class='success'>Routine Added Successfully.
     </span>";
    }else 
    {
     echo "<span class='error'>Routine Not Added !</span>";
    }
}
}
?>
<table width="100%">
<form action="addroutine.php" method="post">
	<tr>
		<td><label>Day</label></td>
		<td><input type="text" name="day"></td>
	</tr>
    <tr>
        <td><label>Subject Name</label></td>
        <td><input type="text" name="sub1"></td>
    </tr>
    <tr>
        <td><label>Subject Name</label></td>
        <td><input type="text" name="sub2"></td>
    </tr>
    <tr>
        <td><label>Subject Course No</label></td>
        <td><input type="text" name="subno1"></td>
    </tr>
    <tr>
        <td><label>Subject Course No</label></td>
        <td><input type="text" name="subno2"></td>
    </tr>
	<tr>
		<td><label>Teacher Name</label></td>
		<td><input type="text" name="teacher_name"></td>
	</tr>
	<tr>
		<td><i class="fa fa-upload" aria-hidden="true"></i></td>
		<td><input type="submit" value="Submit"></td>
	</tr>
</form>
</table>
</div>
<?php include"inc/footer.php";?>