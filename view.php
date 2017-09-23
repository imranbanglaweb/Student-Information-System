<?php include 'inc/header.php';?>
<?php

if (isset($_GET['msg']) ) {
	// echo "<script>window.location='inbox.php';</script>";
	$id=$_GET['msg'];
}
else{
	// $id=$_GET['msg'];
}
 ?>
<div class="addstudents">
<h2>View Your Massage</h2>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
 $fname=mysqli_real_escape_string($dbcon->link,$_POST['fname']);
 $lname=mysqli_real_escape_string($dbcon->link,$_POST['lname']);
 $email=mysqli_real_escape_string($dbcon->link,$_POST['email']);
 $body=mysqli_real_escape_string($dbcon->link,$_POST['body']);
    if ($fname == " " || $lname == " " || $body == " ") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }
    else{
    $query ="UPDATE  tbl_email
    SET
    fname='$fname',
    lname='$lname',
    email='$email',
    body='$body'
    WHERE id='$id'";
    $contact=$dbcon->update($query);
  
    if ($contact) {
		header("Location:inbox.php");
    }else 
    {
     echo "<span class='error'>Page Not Added !</span>";
    }
}
}
?>
<form action="" method="post">
<table> 
<?php 
	$query="SELECT * FROM tbl_email WHERE id=$id";
	$contact=$dbcon->select($query);
	if ($contact) {
		while ($data=$contact->fetch_assoc()) {?>
    <tr>
        <td>
            <label>First Name</label>
        </td>
        <td>
            <input readonly type="text" 
            value ="<?php echo $data['fname'] ;?>" 
             />
        </td>
    </tr>
    <tr>
        <td>
            <label>Last Name</label>
        </td>
        <td>
            <input readonly type="text"
            value ="<?php echo $data['lname'] ;?>" 
             />
        </td>
    </tr>
      <tr>
        <td>
            <label>Email</label>
        </td>
        <td>
            <input readonly type="text" 
            	value ="<?php echo $data['email'] ;?>" 
            class="medium" name="email" />
        </td>
    </tr>
    <tr>
	<td>
	</td>
    </tr>
    <tr>
        <td>
            <label>Content</label>
        </td>
        <td>
            <textarea  name="body" rows="10" cols="70">
            <?php echo $data['body'] ;?>
            </textarea>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="View" />
        </td>
    </tr>
<?php } }?>
</table>
</form>
</div>
<?php include"inc/footer.php";?>