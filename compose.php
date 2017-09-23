<?php include 'inc/header.php';?>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
$fname=$dfm->validation($_POST['fname']);
$lname=$dfm->validation($_POST['lname']);
$body=$dfm->validation($_POST['body']);
$email=$dfm->validation($_POST['email']);

$fname = mysqli_real_escape_string($dbcon->link,$fname);
$lname = mysqli_real_escape_string($dbcon->link,$lname);
$email = mysqli_real_escape_string($dbcon->link,$email);
$body  = mysqli_real_escape_string($dbcon->link,$body);
$error = "";
$msg = "";
if (empty($fname)) {
$error="First Name Must not be Empty";
}
elseif (empty($lname)) {
$error="Last Name Must not be Empty";
}
elseif (empty($body)) {
$error="Message Must not be Empty";
}
elseif (empty($email)) {
$error="Email Must not be Empty";
}
elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
$error="Enter Valide Email";
}
else{
$query="INSERT INTO tbl_email 
(fname,lname,body,email,date)values('$fname','$lname','$body','$email',NOW())";
$result=$dbcon->insert($query);
if ($result) {
$msg ="Your Email Send to the Server";
header('Location: inbox.php?msg='.urldecode('Email Send Successfully'));
}
else{

$error ="Email Not send";
}

}
}
?>
<div id="page-wrapper">
<div class="graphs">
 <div class="xs">
       <h3>Compose</h3>
   <?php 
   if (isset($error)) {
        echo "<span style='color:red'>$error</span>";
    } 
        if (isset($msg)) {
            echo "<span style='color:green'>$msg</span>";
        }
    ?>
</div>
<div class="col-md-8 inbox_right">
	<div class="Compose-Message">               
        <div class="panel panel-default">
            <div class="panel-heading">
                Compose New Message 
            </div>
            <form acction="" method="post">
                <div class="panel-body">
                <div class="alert alert-info">
                    Please fill details to send a new message
                </div>
                <hr>
                <label>Enter First Name:</label>
                <input type="text" class="form-control1 control3" name="fname">
                <label>Enter Last Name:</label>
                <input type="text" name="lname"class="form-control1 control3">
                <label>Enter Message : </label>
                <textarea rows="6" class="form-control1 control2" name="body"></textarea>
                <label>Enter Email address:</label>
                <input type="text" name="email"class="form-control1 control3">
                <hr>
                <span class="glyphicon glyphicon-envelope tag_02"></span>
                 <input class="btn btn-info btn-lg" type="submit" name="submit" value="Send">
                 </a>&nbsp;
              <a href="#" class="btn btn-success btn-warng1">
              <span class="glyphicon glyphicon-tags tag_01"></span> Save To Drafts </a>
            </div>
            </form>
         </div>
      </div>
 </div>
<div class="clearfix"> </div>
<?php include"inc/footer.php";?>
