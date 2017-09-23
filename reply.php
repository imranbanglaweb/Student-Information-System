<?php include 'inc/header.php';?>
<div class="addstudents">
<?php 
if (!isset($_GET['msg']) || $_GET['msg'] == NULL) {
	echo "<script>window.location='inbox.php';</script>";
}
else{
	$msgid=$_GET['msg'];
}
 ?>
<div class="box round first grid">
<h2>Reply Your Message</h2>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $to=$dfm->validation($_POST['email']);
    $formemail=$dfm->validation($_POST['formemail']);
    $subject=$dfm->validation($_POST['subject']);
    $body=$dfm->validation($_POST['body']);
    $sendemil=mail($to, $subject, $body,$formemail);
        if ($sendemil) {
            echo "<span>Your message send successfully.</span>";
        }
        else{
            echo "Your message not sent";
        }

}
?>               
<form action="" method="post">
<table class="form"> 
<?php 
	$query="SELECT * FROM tbl_email WHERE id='$msgid'";
	$contact=$dbcon->select($query);
	if ($contact) {
		while ($data=$contact->fetch_assoc()) {?>
    <tr>
        <td>
            <label>To</label>
        </td>
        <td>
            <input readonly type="text" 
            value ="<?php echo $data['email'] ;?>" 
            class="medium" name="email" />
        </td>
    </tr>
    <tr>
        <td>
            <label>From</label>
        </td>
        <td>
            <input type="text"
            placeholder="Enter your Email"
             class="medium" name="formemail" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Subject</label>
        </td>
        <td>
            <input type="text" placeholder="Enter your Subject"
             class="medium" name="subject" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Content</label>
        </td>
        <td>
            <textarea  name="body" rows="10" cols="70">
            </textarea>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="Send" />
        </td>
    </tr>
<?php } }?>
</table>
<a href="inbox.php" class="btn btn-info btn-lg">back</a>
</form>
</div>
<?php include 'inc/footer.php';?>
