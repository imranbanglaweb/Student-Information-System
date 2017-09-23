<?php include 'inc/header.php';?>
   <div id="page-wrapper">

        	<div class="admin_content">

	        	<button class="Dashboard ">
	        	<div id="successMessage">
			          <?php 
			        if (isset($_GET['msg'])) {
			          echo "<span class='logout_msg' id='myElem'>".$_GET['msg']."</span>";
			        }
			        ?>
			    </div>
	        			<i class="fa fa-user-circle fa-4x" aria-hidden="true"></i>
	        			Dashboard
	        		</button>
	        		<div class="row">
	        		
			        	<div class="col-sm-6 admin_style">
			        		<h3>
			        		Welcome to <?php echo $_SESSION['name'];?>
			        		</h3>
			        		<h1>
			        			<?php echo "Today is " . date("D-Y")."<br>";?>
			        		</h1>
			        		<p>Features of this site are</p>
			        		<ul>
			        			<li><a href="">Student add</a></li>
			        			<li><a href="">Student Delete</a></li>
			        			<li><a href="">Student Change</a></li>
			        			<p>Users Features</p>
			        			<li><a href="">User Add</a></li>
			        			<li><a href="">User Delete</a></li>
			        			<li><a href="">User Edit</a></li>
			        			<li><a href="">Student Routine</a></li>
			        			<li><a href="">Student Semister</a></li>
			        			<li><a href="">Student Subject</a></li>
			        			<li><a href="">Student Result</a></li>
			        		</ul>
			        	</div>
			        	<div class="col-sm-4 admin_style">
			        		<h3>User List</h3>
			        		<?php 
			        			$query="SELECT * FROM tbl_user";
			        			$user=$dbcon->select($query);
			        			while ($result=$user->fetch_array()) {?>
			        		<ul>
			        			<li><a href=""><?php echo $result[1];?></a></li>
			        		</ul>
			        			<?php } ?>
			        	</div>
			        </div>
	        		<div class="row">
			        	<div class="col-sm-6 admin_style">
			        		<h3>
			        			Student List
			        		</h3>
			        		<?php 
			        			$query="SELECT name FROM tbl_student_info order by id desc";
			        			$user=$dbcon->select($query);
			        			while ($result=$user->fetch_array()) {?>
			        		<ul>
			        			<li><a href=""><?php echo $result[0];?></a></li>
			        		</ul>
			        		<?php } ?>
			        	</div>
			        	<div class="col-sm-4 admin_style">
			        		<h3>Connect Social Site</h3>
			        		<ul>
			        			<li>
				        			<a href="">
				        			<i class="fa fa-facebook"></i>Facebook
				        			</a>
			        			</li>
			        			<li>
				        			<a href="">
				        			<i class="fa fa-twitter"></i>Twitter
				        			</a>
			        			</li>
			        			<li>
				        			<a href="">
				        			<i class="fa fa-google-plus"></i>Goole-Plus
				        			</a>
			        			</li>
			        			<li>
				        			<a href="">
				        			<i class="fa fa-youtube"></i>Youtube
				        			</a>
			        			</li>
			        			<li>
				        			<a href="">
				        			<i class="fa fa-Linkedin-square"></i> Linkd-In
				        			</a>
			        			</li>
			        			<li>
				        			<a href="">
				        			<i class="fa fa-rss"></i> RSS
				        			</a>
			        			</li>
			        			<li>
				        			<a href="http://imranweb-bd.com" target="blank"><i class="fa fa-external-link"></i> Imranweb-bd.com</a> 
			        			</li>
			        		</ul>
			        	</div>
			        </div>
        	</div>
        	<!-- end admin_content -->  	
<?php include"inc/footer.php";?>