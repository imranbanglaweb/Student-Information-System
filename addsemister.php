<?php include 'inc/header.php';?>

<div class="addstudents">
<h3>Add Semister</h3>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $name   = mysqli_real_escape_string($dbcon->link,$_POST['name']);
    $roll   = mysqli_real_escape_string($dbcon->link,$_POST['roll']);
    $reg    = mysqli_real_escape_string($dbcon->link,$_POST['reg']);
    $batch  = mysqli_real_escape_string($dbcon->link,$_POST['batch']);
    $semister  = mysqli_real_escape_string($dbcon->link,$_POST['semister']); 
    $department  = mysqli_real_escape_string($dbcon->link,$_POST['department']);

    if ($name == "" || $roll == "" || $reg == "" || $department == "" || $batch == "" || $semister == "") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }

    else{
    $query = "INSERT INTO  tbl_semister
    (
    name,
    roll,
    reg,
    batch,
    semister,
    department) 
    VALUES(
    '$name',
    '$roll',
    '$reg',
    '$batch',
    '$semister',
    '$department')";
    $inserted_rows = $dbcon->insert($query);
    
    if ($inserted_rows) {
  echo "<span class='success'>Semister Added Successfully.
     </span>";
    }
    else 
    {
     echo "<span class='error'>Student Not Added !</span>";
    }
}
}
?>
<table width="100%">
<form action="addsemister.php" method="post" enctype="multipart/form-data">
  <tr>
    <td><label>Name</label></td>
    <td><input type="text" name="name"></td>
  </tr>
  <tr>
    <td><label>Roll</label></td>
    <td><input type="text" name="roll"></td>
  </tr>
  <tr>
    <td><label>Reg</label></td>
    <td><input type="text" name="reg"></td>
  </tr>
  <tr>
    <td><label>Semister</label></td>
    <td><input type="text" name="semister"></td>
  </tr>
  <tr>
    <td><label>Batch</label></td>
    <td><input type="text" name="batch"></td>
  </tr>
  <tr>
    <td><label>Department</label></td>
    <td><input type="text" name="department"></td>
  </tr>
  <tr>
    <td><i class="fa fa-upload" aria-hidden="true"></i></td>
    <td><input type="submit" value="Submit"></td>
  </tr>
</form>
</table>
</div>
<?php include"inc/footer.php";?>