<?php 
  ob_start(); 
  include 'lib/Session.php';
  Session::init();
?>
<?php include 'config/dbcon.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/format.php';?>
<?php 
    $dbcon=new Database();
    $session=new Session();
    $dfm=new Format();

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login - <?php echo TITLE; ?></title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    
     <?php include 'Scripts/js.php'; ?>
     <link rel="apple-touch-icon-precomposed" sizes="114x114" href="css/favicon/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="css/favicon/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="css/favicon/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="css/favicon/apple-touch-icon-60x60.png" />
<link rel="icon" type="image/png" href="css/favicon/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="css/favicon/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="css/favicon/favicon-16x16.png" sizes="16x16" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="mstile-144x144.png" />
<meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="mstile-310x310.png" />

<script src="js/custom.js"></script>
<link rel="stylesheet" type="text/css" href="css/component.css">
<link rel="stylesheet" type="text/css" href="css/default.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
<a id="autoclosable-btn-success">
    <?php 
    if (isset($_GET['regmsg'])) {
      echo "<span class='logout_msg' id='myElem'>".$_GET['regmsg']."</span>";
    }
    ?>
</a>
<div class="container">

  <section id="content">
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
  $email=$dfm->validation($_POST['email']);
  $password=$dfm->validation(md5($_POST['password']));
$email=mysqli_real_escape_string($dbcon->link,$email);
$password=mysqli_real_escape_string($dbcon->link,$password);
$query="SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
  $result=$dbcon->select($query);
  if ($result !=false) {
      $row   =mysqli_num_rows($result);
        if ($row > 0) {
          $value =mysqli_fetch_array($result);
          Session::set("login", true);
          $_SESSION['id']= $value['id'] ;
          $_SESSION['name']= $value['name'] ;
          $_SESSION['roll']= $value['roll'] ;
          $_SESSION['image']= $value['image'] ;
          header('Location: index.php?msg='.urlencode('Welcome You have Successfully Log In'));
           exit();
        }
        else{
          echo "No result Found";
        }
  }
  else{
echo "<span style='color:red;font-size:16px'>username and password doesnt match..</span>";

  }
      
}
?>
    <form action="" method="post">
      <a href="login.php"><img src="images/logo2.png"></a>
      <h1>Admin Login</h1>
       <div id="successMessage">
              <?php 
            if (isset($_GET['msg'])) {
              echo "<span class='logout_msg' id='myElem'>".$_GET['msg']."</span>";
            }
            ?>
        </div>
         
      <div>
        <i class="fa fa-user"></i>
        <input type="text" placeholder="Enter Your Email" required="" name="email"/>
      </div>
      <div>
      <i class="fa fa-lock"></i>
        <input type="password" placeholder="Password" required="" name="password"/>
      </div>
      <div>
        <!-- <i class="fa fa-sign-in"></i> -->
        <input type="submit" value="Log in" />
        
      </div>
    </form><!-- form -->
    <div class="button">
      <a href="password.php">Forget Password !</a>
    </div><!-- button -->
    <div class="button">
    New | <button class="md-trigger" data-modal="modal-1">Register Now.</button>
    </div><!-- button -->
</section><!-- content -->
</div><!-- container -->
<div class="md-modal md-effect-8" id="modal-1">
      <div class="md-content">
        <h3>Register</h3>
        <div>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
  $name  = mysqli_real_escape_string($dbcon->link,$_POST['name']);
    $roll  = mysqli_real_escape_string($dbcon->link,$_POST['roll']);
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
    image, 
    roll) 
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
    '$uploaded_image',
    '$roll')";
    $inserted_rows = $dbcon->insert($query);
    if ($inserted_rows) {
     header('Location: login.php?regmsg='.urldecode('Congratulation Registered Added Successfully'));

   }else 
    {
     echo "<span class='error'>Registered Not Added !</span>";
    }
}
}
?>
<form class="form-signin app-cam" action="" method="post"  enctype="multipart/form-data">
    <p> Enter your account details below</p>
    <div class="registration">
        Already Registered.
        <a class="" href="login.php">Login</a>
    </div>
<table>
  <tr>
    <td>Name</td>
    <td><input type="text"  name="name" placeholder="Enter Your Name"></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input type="text"  name="username" placeholder="Enter Your User Name"></td>
  </tr>
  <tr>
    <td>Roll No</td>
    <td><input type="text"  name="roll" placeholder="Enter Your User roll"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password"   placeholder="Password" required=""></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email"  placeholder="Enter Your Valid Email" required=""></td>
  </tr>
  <tr>
    <td>Aemail</td>
    <td>
    <input type="text" name="aemail"  placeholder="Alternating Email" required=""></td>
  </tr>
  <tr>
    <td>Mobile No</td>
    <td><input type="text" name="cell"  placeholder="Enter Your Cell No" required=""></td>
  </tr>
  <tr>
    <td>Birth Date</td>
    <td><input type="date" name="birth"  placeholder="Enter Your Birth date" required=""></td>
  </tr>
  <tr>
    <td>Blood Group</td>
    <td><input type="text" name="blood"  placeholder="Enter Your Blood Group" required=""></td>
  </tr>
  <tr>
    <td>Website</td>
    <td><input type="text" name="website"  placeholder="Enter Your Website" required=""></td>
  </tr>
  <tr>
    <td><span>Upload Photo</span></td>
    <td><input type="file" name="image"></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td>
    <div class="radios">
        <label for="radio-01" class="label_radio">
    <input type="radio" name="gender" value="male"> Male
    <input type="radio" name="gender" value="female"> Female
        </label>
      </div></td>
  </tr>
  <tr>
    <td></td>
    <td><button class="btn btn-lg btn-success1 btn-block" name="submit" type="submit">Submit</button></td>
  </tr>
  <br>
</table>
</form>
<hr>
          <button class="md-close">Close me!</button>
        </div>
      </div>
</div>
<div class="md-overlay"></div><!-- the overlay element -->
    <!-- classie.js by @desandro: https://github.com/desandro/classie -->
    <script src="Modal/classie.js"></script>
    <script src="Modal/modernizr.custom.js"></script>
    <script src="Modal/modalEffects.js"></script>
    <script>
      // this is important for IEs
      var polyfilter_scriptpath = '/js/';
    </script>
    <script src="Modal/cssParser.js"></script>
    <script src="Modal/css-filters-polyfill.js"></script>
</body>
</html>