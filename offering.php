<?php
	require ('config.php');
	require ('session.php');
	// require ('header.php');
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 May 2018 05:59:00 GMT -->
<head>

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

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <!-- <i class="fa fa-user-circle-o fa-5x"></i> -->

                            <img alt="image" class="img-circle" src="img/images.png" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"><span class="block m-t-xs"> <br><strong class="font-bold"><i class="fa fa-diamond"></i>
                                <?php echo $_SESSION['login_user']; ?>
                                </strong>
                             </span></span></a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                               
                                <li><a href="change_password.php">Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <img src="assets/debtcollection.png">
                        </div>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard (alias)"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="dailyfire.php"><i class="fa fa-fire"></i> <span class="nav-label">Daily Fire</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-id-badge"></i> <span class="nav-label">Sermon</span></a>
                    </li>
                    <li>
                        <a href="videos.php"><i class="fa fa-film"></i> <span class="nav-label">Vidoes</span></a>
                    </li>
                    <li>
                        <a href="whatsapp.php"><i class="fa fa-comments"></i> <span class="nav-label">WhatsApp</span></a>
                    </li>
                    <li>
                        <a href="dreams.php"><i class="fa fa-bed"></i> <span class="nav-label">Dreams</span></a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-money"></i> <span class="nav-label">Donations</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="seed.php">Refiner's Seed</a></li>
                            <li><a href="tithe.php">Tithe</a></li>
                            <li class="active"><a href="offering.php">Offering</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.php"><i class="fa fa-address-book"></i> <span class="nav-label">Contact</span></a>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-user-circle-o"></i><span class="nav-label">Profile</span></a>
                    </li>
                    <li>
                        <a href="change_password.php"><i class="fa fa-wrench"></i><span class="nav-label">Change Password</span></a>
                    </li>
				</ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to The Refiner's House Ministry</span>
                </li>
                
                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Offering</h5>
                </div>
                <div class="ibox-content">
                <form method="POST" class="form-horizontal" action="https://voguepay.com/pay/">
					<div class="form-group"><label class="col-sm-2 control-label">Choose Currency</label>
						<div class="col-sm-5">
							<select name="cur" class="form-control">
								<option value="NGN">₦ - Nigerian Naira</option>
								<option value="USD">$ - US Dollar</option>
								<option value="EUR">€ - Euro</option>
								<option value="GBP">£ - British Pound</option>
							</select>
						</div>
					</div>
				    <div class="hr-line-dashed"></div>
				    <div class="form-group"><label class="col-sm-2 control-label">Amount</label>
						<div class="col-sm-5"><input type="number" name="total" class="form-control"></div>
					</div>
				    <div class="hr-line-dashed"></div>
				    <input type="hidden" name="v_merchant_id" value="12152-686" />
					<input type="hidden" name="success_url" value="success.php" />
					<input type="hidden" name="fail_url" value="fail.php" />
					<input type="hidden" name="memo" value="Refiner's House Offering" />
					<input type="hidden" name="developer_code" value="5a938e2e22158" />
					 <div class="form-group"><label class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<input type="image" src="https://voguepay.com/images/buttons/Donation.png" class="buynowimg">
							</div>
					</div>
				    <div class="hr-line-dashed"></div>
				</form>
	            </div>
	        </div>
	    </div>
	</div>
</div>
</div>
<?php
	require ('footer.php');
?>