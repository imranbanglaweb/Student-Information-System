<?php ob_start(); ?>
<?php 
    include 'lib/Session.php';
    Session::checksession();
?>
<?php include 'config/dbcon.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/format.php';?>
<?php 
    $dbcon=new Database();
    $dfm=new Format();

?>
<?php 
    if (isset($_GET['action']) && $_GET['action'] =='logout') {
    Session::destroy();

    }
 ?>
<!DOCTYPE HTML5>
<html>
<script src="css/custombox.min.css"></script>
<head>
 <?php include 'Scripts/meta.php'; ?>
 <?php include 'Scripts/js.php'; ?>
 <?php include 'Scripts/css.php'; ?>
 
</head>
<body>
         <div class="demo_panel">
			<span id="close_b" class="demo_panel_cross">
			<i class="fa fa-cog fa-spin"></i>
			</span>
			<span id="open_b" class="demo_panel_cross">
			<i class="fa fa-cog fa-spin"></i>
			</span>
        	<div class="color_scheme">
        	<p class="theme_title">Change Theme Color</p><br>
        		<span class="d">D</span>
        		<span class="red">R</span>
        		<span class="green">G</span>
        		<span class="blue">B</span>
        		<span class="orange">O</span>
        		<span class="yellow">Y</span>
        		<span class="black">B</span>
        		<span class="white">W</span>
        		<span class="pink">P</span>
        		<span class="s">S</span>
        		<span class="sp">S</span>
        		<span class="sl">S</span>
        	</div>
        	<div class="bg_change"></div>
        </div>
<div id="wrapper">

     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0px">
            <div class="navbar-header">
            
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


               <a class="" href="index.php">
                            </a>
            	<a href="result.php" class="btn-primary btn-lg"
            	style="display:block;float:right;background-color:blue;color:white;text-decoration:none;margin-left:360px"><i class="fa fa-hand-o-down" aria-hidden="true"></i>            	View Result
				</a>
            	
            		 
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comments-o"></i><span class="badge">4</span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header">
							<strong>Messages</strong>
							<div class="progress thin">
							  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
							    <span class="sr-only">40% Complete (success)</span>
							  </div>
							</div>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/1.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
								<span class="label label-info">NEW</span>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/2.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
								<span class="label label-info">NEW</span>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/3.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="dropdown-menu-footer text-center">
							<a href="#">View all messages</a>
						</li>	
	        		</ul>
	      		</li>
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
	       <img src="<?php echo $_SESSION['image']; ?>"/>
	        		<span class="badge">4</span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header text-center">
							<strong>Account</strong>
						</li>
					<li class="text-center"><?php echo $_SESSION['name']; ?></li>
					<br>
						<li class="m_2">
						<a href="profile.php">
						<i class="fa fa-user"></i>
						 Profile
						</a>
						</li>
						<li class="m_2">
						<a href="settings.php">
						<i class="fa fa-wrench"></i> Settings
						</a>
						</li>
						<li class="m_2">
						<a href="projets.php">
						<i class="fa fa-file"></i>
						 Projects <span class="label label-primary">6</span>
						 </a>
						 </li>
						<li class="divider"></li>
						<li class="m_2">
						<a href="?action=logout"><i class="fa fa-lock"></i> Logout</a></li>	

	        		</ul>
	      		</li>
			</ul>



			<?php include 'sidebar.php'; ?>
		</nav>
<!-- end header -->