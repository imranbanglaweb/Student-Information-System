<?php include 'inc/header.php';?>
<div class="addstudents">
<h3>Add Student</h3>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $theme   = mysqli_real_escape_string($dbcon->link,$_POST['theme']);
    if ($theme == "") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }
 
    else{
    $query = "UPDATE  tbl_theme SET theme ='$theme' WHERE id=1";
    $inserted_rows = $dbcon->insert($query);
    
    if ($inserted_rows) {
     echo "<span class='themesuccess'>Theme Change Successfully.
     </span>";
    }else 
    {
     echo "<span class='error'>Theme Not Change !</span>";
    }
}
}
?>
<table width="100%" class="theme_table">
<?php 
$query="SELECT * FROM tbl_theme WHERE id=1";
$theme=$dbcon->select($query);
while ($result=$theme->fetch_assoc()) {?>

<form action="theme.php" method="post">
	<tr>
		<td>Default</td>
		<td>
<input <?php if($result['theme']=='default'){
    echo "checked";
};?> type="radio" name="theme" value="default">
</td>
	</tr>
    <tr>
        <td>Green</td>
        <td>
        <input <?php if($result['theme']=='green'){ echo "checked";};?>  type="radio" name="theme" value="green"></td>
    </tr>
    <tr>
        <td>
        Blue
        </td>
        <td>
        <input <?php if($result['theme']=='blue'){echo "checked";};?> type="radio" name="theme" value="blue">
        </td>
    </tr>
    <tr>
        <td>
        Red
        </td>
        <td>
        <input <?php if($result['theme']=='red'){echo "checked";};?> type="radio" name="theme" value="red">
    </td>
    </tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Change Theme.."></td>
	</tr>
</form>
<?php }?>
</table>
</div>
<?php include"inc/footer.php";?>