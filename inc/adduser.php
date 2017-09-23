<?php include 'config/dbcon.php';?>
<?php include 'lib/Database.php';?>
<!-- <?php include 'helpers/format.php';?> -->
<?php 
    // $username   = Session::get('name');
    $dbcon=new Database();
    $dfm=new Format();

?>
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Modern an Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<style type="text/css">
  .success{
  color: green;
  font-size: 16px;
  font-family: arial
}

</style>
</head>
<body id="login">
  <h2 class="form-heading">Register</h2>
  <form class="form-signin app-cam" action="register.php" method="post"  enctype="multipart/form-data">
      <p> Enter your account details below</p>
      <?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
  $name  = mysqli_real_escape_string($dbcon->link,$_POST['name']);
  $gender   = mysqli_real_escape_string($dbcon->link,$_POST['gender']);
  $username    = mysqli_real_escape_string($dbcon->link,$_POST['username']);
  $password =$dfm->validation(md5($_POST['password']));
  $email  = mysqli_real_escape_string($dbcon->link,$_POST['email']); 
  $aemail  = mysqli_real_escape_string($dbcon->link,$_POST['aemail']); 
  $cell  = mysqli_real_escape_string($dbcon->link,$_POST['cell']);
  $birth  = mysqli_real_escape_string($dbcon->link,$_POST['birth']);
  $website  = mysqli_real_escape_string($dbcon->link,$_POST['website']);
  $blood  = mysqli_real_escape_string($dbcon->link,$_POST['blood']);
   // $image  = mysqli_real_escape_string($dbcon->link,$_POST['image']);

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $div       = explode('.', $file_name);
    $file_ext  = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
    if ($name == "") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }
   elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
 }
    else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO  
    tbl_user
    (
    name,
    gender,
    username,
    password,
    email,
    aemail,
    cell,
    birth,
    website,
    blood,
    image) 
    VALUES(
    '$name',
    '$gender',
    '$username',
    '$password',
    '$email',
    '$aemail',
    '$cell',
    '$birth',
    '$website',
    '$blood',
    '$uploaded_image')";
    $inserted_rows = $dbcon->insert($query);
    if ($inserted_rows) {
     echo "<span class='success'>Registered Successfully Completed.
     </span>";
    }else 
    {
     echo "<span class='error'>Registered Not Added !</span>";
    }
}
}
?>
    <input type="text"  name="name" placeholder="Enter Your Name">
    <input type="text"  name="username" placeholder="Enter Your User Name">
    <input type="password" name="password"   placeholder="Password" required="">
    <input type="text" name="email"  placeholder="Enter Your Valid Email" required="">
    <input type="text" name="aemail"  placeholder="Alternating Email" required="">
    <input type="text" name="cell"  placeholder="Enter Your Cell No" required="">
    <input type="date" name="birth"  placeholder="Enter Your Birth date" required="">
    <input type="text" name="website"  placeholder="Enter Your Website" required="">
    <input type="text" name="blood"  placeholder="Enter Your Blood Group" required="">
    <span>Upload Your Photo</span>
    <input type="file" name="image">
    <br>
      <div class="radios">
        <label for="radio-01" class="label_radio">
  <input type="radio" name="gender" value="male"> Male
  <input type="radio" name="gender" value="female"> Female
        </label>
	    </div>
      <button class="btn btn-lg btn-success1 btn-block" name="submit" type="submit">Submit</button>
      <div class="registration">
          Already Registered.
          <a class="" href="login.php">
              Login
          </a>
      </div>
  </form>
   <div class="copy_layout login register">
      <p>Copyright &copy; 2016 Imran. All Rights Reserved | Design by <a href="http://imranweb-bd.com">imranweb-bd.com</a> </p>
   </div>
</body>
</html>
