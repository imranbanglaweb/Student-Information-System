<?php include 'inc/header.php';?>

<div class="addstudents">
<h3>Add Social Site</h3>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $Name       = $_POST['Name'];
    $Link       = $_POST['Link'];
    $Title      = $_POST['Title'];
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name  = $_FILES['image']['name'];
    $file_size  = $_FILES['image']['size'];
    $file_temp  = $_FILES['image']['tmp_name'];
    $div       = explode('.', $file_name);
    $file_ext  = strtolower(end($div));
     $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image = "upload/".$unique_image;
    if ($Name == "" || $Link == "" || $Title == "" || $file_name == "") {
    echo "<span class='error'>Field Not Must be empty</span>";
    }
   elseif ($file_size >1.6e+8) {
     echo "<span class='error'>Image Size should be less then 20MB!
     </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
 }
    else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO  tbl_social
    (
    name,
    link,
    title,
    image,
    date) 
    VALUES(
    '$Name',
    '$Link',
    '$Title',
    '$uploaded_image',
    NOW())";
    $inserted_rows = $dbcon->insert($query);
    if ($inserted_rows) {
  header('Location: Sociallist.php?msg='.urldecode('Social Site Added Successfully'));
     // echo "<span class='success'>Social Site Added Successfully.
     //  </span>";
    }else 
    {
     echo "<span class='error'>Social Site Not Added !</span>";
    }
}
}
?>
<table width="100%">
<form action="" method="post" enctype="multipart/form-data">
    <tr>
        <td><label>Name</label></td>
        <td><input type="text" name="Name"></td>
    </tr>
    <tr>
        <td><label>Link</label></td>
        <td><input type="text" name="Link"></td>
    </tr>
    <tr>
        <td><label>Title</label></td>
        <td><input type="text" name="Title"></td>
    </tr>
    <tr>
        <td><label>Image</label></td>
        <td><input type="file" name="image"></td>
    </tr>
    <tr>
        <td><i class="fa fa-upload" aria-hidden="true"></i></td>
        <td><input type="submit" value="Added Social Site"></td>
    </tr>
</form>
</table>
</div>
<?php include"inc/footer.php";?>