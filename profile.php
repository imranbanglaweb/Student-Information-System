<?php include 'inc/header.php';?>

<div class="studentlist">
<h3><i class="fa fa-user"></i>User Details</h3>
<h2 class="success">
Welcome <?php echo $_SESSION['name']."&nbsp;See Your Profile"; ?>
	
</h2>
<div class="row">
	<div class="col-md-4">
		<div class="profile_left">
			<ul>
			<li>
			<a href="">
			<i class="fa fa-dot-circle-o" aria-hidden="true"></i>No.
			</a>
			</li>
			<li>
			<a href="">
			<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
			Name</a></li>
			<li>
			<a href="">
			<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
			Gender</a></li>
			<li><a href="">
			<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
			UserName</a></li>
			<li><a href="">
			<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
			Cell</a></li>
			<li><a href="">
			<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
			Birth Date</a></li>
			<li><a href="">
			<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
			Blood</a></li>
			<!-- <li><a href="">Photo</a></li> -->
			</ul>
		</div>
	</div>
	<div class="col-md-7">
		<?php 
		$query="SELECT  * FROM tbl_user WHERE id={$_SESSION['id']}";
		$post=$dbcon->select($query);
		if ($post) {
			$i=0;
		while ($result=$post->fetch_array()) {
			$i++;
		?>
		<div class="profile_right">
			<ul>
				<li><a href="">
				<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
				<?php echo $i;?></a></li>
				<li><a href=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?php echo $result[1];?></a></li>
				<li><a href=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?php echo $result[2];?></a></li>
				<li><a href=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?php echo $result[3];?></a></li>
				<li><a href=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?php echo $result[7];?></a></li>
				<li><a href=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?php echo $result[8];?></a></li>
				<li><a href=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?php echo $result[10];?></a></li>
				<li><a href="">
				<img src="<?php echo $result[11];?>" height="150px" width="200px">
				</a></li>
			</ul>			
		</div>
<?php }}?>
	</div>
</div>
	<!-- end row -->
</div>
<?php include"inc/footer.php";?>