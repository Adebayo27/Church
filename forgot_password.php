<?php  
  require('config.php');
  session_start();

  if (isset($_POST['submit']) && (!empty($_POST['email']))) {
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {
      $error = "<p>Invalid email address, please type the valid email address!</p>";
    } else {
        $sql = "SELECT * FROM mymembers WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
      
        if($count == 1) {
          $randpass = substr(md5(uniqid(rand(),1)),3,10);
          $output='<p>Dear user,</p>';
          $output.='<p>Your new password is</p>';
          $output.='<p>Username: </p>' .$row['sername']. '';
          $output.='<p>Password: </p>' .$randpass. '';
          $output.='<p>You can change your password when you log in.</p>';
          $output.='<p>-------------------------------------------------------------</p>';
          $output.='<p>Thanks,</p>';
          $output.='<p>The Refiner\'s House MInistry</p>';
          $body = $output; 
          $subject = "Password Recovery - The Refiner\'s House MInistry App";

          $email_to = $email;
          $fromserver = "therefinershouse.com"; 

          require_once "phpm/class.phpmailer.php"; $mail = new PHPMailer; 
          $mail->SMTPDebug = 3;                               
          $mail = new PHPMailer();
          $mail->IsSMTP(true);
          $mail->Host = "mail.therefinershouse.com"; // Enter your host here
          $mail->SMTPAuth = true;
          $mail->Username = "care@therefinershouse.com"; // Enter your email here
          $mail->Password = "care@therefiners"; //Enter your password here
          $mail->Port = 25;
          $mail->IsHTML(true);
          $mail->From = "care@therefinershouse.com";
          $mail->FromName = "The Refiner's House Ministry";
          $mail->Sender = $fromserver; // indicates ReturnPath header
          $mail->Subject = $subject;
          $mail->Body = $body;
          $mail->AddAddress($email_to);

          if(!$mail->Send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
          }else{
            $qqq = "UPDATE mymembers SET password = '$randpass' WHERE email = '$email'";
            echo "<div class='error'>
            <p>An email has been sent to you with instructions on how to reset your password.</p>
            </div><br /><br /><br />";
          }

          
        }else {
          echo $error = "No user is registered with the email provided!";
        }
    }
  }else{ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset password</title>

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
              <h1>The Refiner's House Ministry</h1>
              <h2>Reset Password.</h2>
            </center>
            <form class="m-t" role="form" action="" method="POST">
              <div class="form-group">
                  <input type="text" class="form-control" name="email" placeholder="Type your email" required="">
              </div>
              <button type="submit" class="btn btn-primary block full-width m-b" name="submit">Reset Password</button>
              <p class="text-muted text-center"><small>Do not have an account?</small></p>
              <a class="btn btn-sm btn-white btn-block" href="sign_up.php">Create an account</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
            <div class="pull-right">
                <strong>Built by Supremeomega</strong>.
            </div>
            <div>
                The Refiner's House Ministry &copy; 2014-2017
            </div>
        </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>




<?php    
  }
?>