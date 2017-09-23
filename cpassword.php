<?php include 'inc/header.php';?>

<div class="addstudents">
<h3>Password Change</h3>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    // $password   = mysqli_real_escape_string($dbcon->link,$_POST['password']);
    $npassword    = mysqli_real_escape_string($dbcon->link,$_POST['npassword']);
    $npassword=md5($npassword);

    if ($npassword =="") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }

    else{
    $query = "UPDATE tbl_user SET password='$npassword' WHERE id={$_SESSION['id']}";
    $inserted_rows = $dbcon->insert($query);
    
    if ($inserted_rows) {
  echo "<span class='success'>Password Change Successfully.
     </span>";
    }
    else 
    {
     echo "<span class='error'>Password Not Change!</span>";
    }
}
}
?>
<table width="100%">
<form action="" method="post">
  <tr>
    <td>
    <i class="fa fa-lock"></i>
    Current
    </td>
    <td>
    <input type="password" name="password" placeholder="Enter Current Password" required="">
    </td>
  </tr>
  <tr>
    <td>
      <i class="fa fa-lock"></i>
    New Password
    </td>
    <td>
    <input type="text" name="npassword" placeholder="Enter New Password" required="">
    </td>
  </tr>
  <tr>
    <td>
      <i class="fa fa-lock"></i>
    Confirm Password</td>
    <td>
      <input type="text" name="npassword" placeholder="Enter Confirm Password">
    </td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" value="Submit"></td>
  </tr>
</form>
</table>
</div>
<?php include"inc/footer.php";?>