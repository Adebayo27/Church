<?php  
	require ('config.php');
	// require ('header.php');
	session_start();

	if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$country = $_POST['country'];
		$state = $_POST['state'];
		$birthday_month = $_POST['birthday_month'];
		$birthday_day = $_POST['birthday_day'];
		$gender = $_POST['gender'];
        $friend_array = $_POST['friend_array'];
		$password = $_POST['password'];
        $conPass = $_POST['re_password'];
        if ($password == $conPass) {
           $sql = "INSERT INTO mymembers (username, firstname, lastname, mobile, email, country, state, birthday_month, birthday_day, gender, friend_array, password) VALUES ('$username', '$fname', '$lname', '$mobile','$email', '$country', '$state', '$birthday_month', '$birthday_day', '$gender', '$friend_array', '$password')";
            if($conn->query($sql)){
                header("location: login.php");
            }else{
                die('could not enter data: '. $conn->error);
            } 
        } else {
            echo "password doesn't match";
        }
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CHURCH | Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
    
    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    
    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="container">
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        	<center><h2>Welcome to The Refiner's House Ministry</h2></center>
            <center><h2 class="section-title no-margin-top">Create Account</h2></center>
            <div class="panel panel-success animated fadeInDown">
                <div class="panel-heading">
        			<h1 class="page-title">Online Membership Form</h1>
				</div>
                <div class="panel-body">
				
					<form method="POST" id="form1">
                        <div class="form-group">
							<input type="text" name="username" id="username" value="" size="20" class="form-control"placeholder="Username"/>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									<input type="text" name="firstname" id="firstname" value="" size="32" class="form-control" placeholder="First Name"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
									<input type="text" name="lastname" id="lastname" value="" size="32" class="form-control" placeholder="Last Name"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									<input type="text" name="mobile" id="mobile" value="" size="32"class="form-control" placeholder="Phone Number" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
									<input type="text" name="email" id="email" value="" size="32" class="form-control" placeholder="Email Address"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									<select name="country" id="country" class="form-control">
									  <option value="NIG">Nigeria</option>
									  <option value="LIB">Liberia</option>
									  <option value="SIL">Sierra Leone</option>
									</select>
                                </div>
                            </div>
							 <div class="col-md-2">
                                <div class="form-group">
									<select name="state" id="state" class="form-control">
									    <option value="Lagos State">Lagos State</option>
									    <option value="Kebbi State">Kebbi State</option>
									    <option value="GANTA">GANTA</option>
									    <option value="Sierra Leone">Sierra Leone</option>
									</select>
                                </div>
                            </div>
							<div class="col-md-2">
                                <div class="form-group">
									<select name="birthday_month" id="birthday_month" class="form-control">
									    <option value="January">January</option>
									    <option value="February">February</option>
									    <option value="March">March</option>
									    <option value="April">April</option>
									    <option value="May">May</option>
									    <option value="June">June</option>
									    <option value="July">July</option>
									    <option value="August">August</option>
									    <option value="September">September</option>
									    <option value="October">October</option>
									    <option value="November">November</option>
									    <option value="December">December</option>
									</select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
									<select name="birthday_day" id="birthday_day" class="form-control">
									    <option value="01">01</option>
									    <option value="02">02</option>
									    <option value="03">03</option>
									    <option value="04">04</option>
									    <option value="05">05</option>
									    <option value="06">06</option>
									    <option value="07">07</option>
									    <option value="08">08</option>
									    <option value="09">09</option>
									    <option value="10">10</option>
									    <option value="11">11</option>
									    <option value="12">12</option>
									    <option value="13">13</option>
									    <option value="14">14</option>
									    <option value="15">15</option>
									    <option value="16">16</option>
									    <option value="17">17</option>
									    <option value="18">18</option>
									    <option value="19">19</option>
									    <option value="20">20</option>
									    <option value="21">21</option>
									    <option value="22">22</option>
									    <option value="23">23</option>
									    <option value="24">24</option>
									    <option value="25">25</option>
									    <option value="26">26</option>
									    <option value="27">27</option>
									    <option value="28">28</option>
									    <option value="29">29</option>
									    <option value="30">30</option>
									    <option value="31">31</option>
									</select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									<select name="gender" id="gender" class="form-control">
									    <option value="Male">Male</option>
									    <option value="Female">Female</option>
									</select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
									<select name="friend_array" id="friend_array" class="form-control">
									  <option value="" selected="selected">How Do You Locate The Church?</option>
									  <option value="Church Member">Church Member</option>
									  <option value="Facebook">Facebook</option>
									  <option value="Website">Website</option>
									  <option value="SMS">SMS</option>
									  <option value="Evangelism">Evangelism</option>
									  <option value="Youtube">Youtube</option>
									  <option value="Internet">Internet</option>
									</select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									<input type="password" name="password" id="password" value="" size="32" class="form-control" placeholder="Enter Password"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
									<input type="password" name="re_password" id="re_password" value="" size="32" class="form-control" placeholder="Re-Enter Password"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="option1" required>
                                    <label for="inlineCheckbox1">I'M NOT A ROBOT, AM TRULY A REFINER.</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-ar btn-primary pull-right" name="submit" id="KT_Insert1">Register</button>
                            </div>
                        </div>
                </form>
            	</div>
        	</div>
    	</div>
	</div>
</div> <!-- container  -->

14120-18320

</body>
</html>



