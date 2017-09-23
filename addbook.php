<?php include 'inc/header.php';?>

<div class="addstudents">
<h3>Add Book</h3>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $bname      = $_POST['bname'];
    $btype      = $_POST['btype'];
    $publisher  = $_POST['publisher'];
    $batch      = $_POST['batch'];
    $semister   = $_POST['semister']; 
    $institute  = $_POST['institute'];
    $department = $_POST['department'];
    $permited   = array('pdf','docx');
    $file_name  = $_FILES['book']['name'];
    $file_size  = $_FILES['book']['size'];
    $file_temp  = $_FILES['book']['tmp_name'];
   $div       = explode('.', $file_name);
    $file_ext  = strtolower(end($div));
     $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image = "upload/".$unique_image;
    if ($bname == "" || $btype == "" || $publisher == "" || $file_name == "" || $batch == "" || $semister == "") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }
   elseif ($file_size >1.6e+8) {
     echo "<span class='error'>Book Size should be less then 1MB!
     </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
 }
    else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO  tbl_book
    (
    b_name,
    b_type,
    publisher,
    semister,
    batch,
    department,
    institute,
    book) 
    VALUES(
    '$bname',
    '$btype',
    '$publisher',
    '$semister',
    '$batch',
    '$department',
    '$institute',
    '$uploaded_image')";
    $inserted_rows = $dbcon->insert($query);
    
  
    if ($inserted_rows) {
 header('Location: booklist.php?msg='.urldecode('Book Added Successfully'));
     // echo "<span class='success'>Book Added Successfully.
     // </span>";
    }else 
    {
     echo "<span class='error'>Book Not Added !</span>";
    }
}
}
?>
<table width="100%">
<form action="" method="post" enctype="multipart/form-data">
    <tr>
        <td><label>Book Name</label></td>
        <td><input type="text" name="bname" id="bname"></td>
    </tr>
    <tr>
        <td><label>Book Type</label></td>
        <td><input type="text" name="btype" id="btype"></td>
    </tr>
    <tr>
        <td><label>Publiser</label></td>
        <td><input type="text" name="publisher" id="publisher"></td>
    </tr>
    <tr>
        <td><label>Batch</label></td>
        <td><input type="text" name="batch" id="batch"></td>
    </tr>
    <tr>
        <td><label>Semister</label></td>
        <td><input type="text" name="semister" id="semister"></td>
    </tr>
    <tr>
        <td><label>Institute</label></td>
        <td><input type="text" name="institute" id="institute"></td>
    </tr>
    <tr>
        <td><label>Department</label></td>
        <td><input type="text" name="department" id="department"></td>
    </tr>
    <tr>
        <td><label>Books</label></td>
        <td><input type="file" name="book" id="book"></td>
    </tr>
    <tr>
        <td><i class="fa fa-upload" aria-hidden="true"></i></td>
        <td>
    <input type="hidden" name="id" id="id" />  
        <input type="submit" name="insert" id="insert" value="Upload Your Books" class="btn btn-success" />
        </td>
    </tr>
</form>
</table>
</div>
<?php include"inc/footer.php";?>