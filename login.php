<?php  
	require('config.php');
	// require ('header.php');
	session_start();
	if (isset($_POST['submit'])) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
    $myPassword = mysqli_real_escape_string($conn, $_POST['password']);
		$sql = "SELECT * FROM mymembers WHERE username = '$username' AND password = '$myPassword'";
    if($_POST['remember']) {
      $year = time() + 31536000;
      setcookie('remember_me', $_POST['username'], $year);
    }elseif(!$_POST['remember']) {
      if(isset($_COOKIE['remember_me'])) {
        $past = time() - 100;
        setcookie('remember_me', gone, $past);
      }
    }
    // if(!empty($_POST["remember"])) {
    //   setcookie ("username",$_POST["username"],time()+ 3600);
    //   setcookie ("password",$_POST["password"],time()+ 3600);
    //   echo "Cookies Set Successfuly";
    // } else {
    //   setcookie("username","");
    //   setcookie("password","");
    //   echo "Cookies Not Set";
    // }
      	$result = mysqli_query($conn,$sql);
      	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      	$active = $row['active'];

      
      	$count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      	if($count == 1) {
      	    $_SESSION['login_user'] = $username;
         	header("location: dashboard.php");
      	}else {
        	$error = "Your Login Name or Password is invalid";
      	}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CHURCH | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body class="gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>
            <br>
            <br>
            <br>
            <center>
              <h1>Welcome to CHURCH, God bless you</h1>
              <h2>Login in.</h2>
            </center>
            <form class="m-t" role="form" action="" method="POST">
              <div class="form-group">
                  <input type="text" class="form-control" name="username" placeholder="Username" required value="<?php echo $_COOKIE['username']; ?>">
              </div>
              <div class="form-group">
                  <input type="password" id="myInput" class="form-control" name="password" placeholder="Password" required="">
              </div>
              <div style="float: left;">
                <input type="checkbox" onclick="myFunction()"> Show Password
              </div>
              <div style="float: right;">
                <input type="checkbox" name="remember" value="<?php if(isset($_COOKIE['remember_me'])){ echo 'checked="checked"';} else { echo '';}?>" > Remember me
              </div>

              
              <button type="submit" class="btn btn-primary block full-width m-b" name="submit">Login</button>

              <a href="forgot_password.php" style="float: right;"><small>Forgot password?</small></a>
              <p class="text-muted text-center"><small>Do not have an account?</small></p>
              <a class="btn btn-sm btn-white btn-block" href="sign_up.php">Create an account</a>
            </form>
            <!-- <div style="float: right;">
              <i class="fa fa-home"></i><a href="index.php">HOME</a>
            </div>  -->
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
            <div>
                <center>The Refiner's House Ministry &copy; 2014-2017</center>
            </div>
            <div>
                <center><strong>Built by Supremeomega</strong>.</center>
            </div>
            
        </div>

    <!-- Mainly scripts -->
    <script type="text/javascript">
      function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 May 2018 06:01:52 GMT -->
</html>
