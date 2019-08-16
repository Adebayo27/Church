 <?php 
    // session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<?php 
    require ('config.php');
    require ('session.php');
    require ('head.php');
?>
</head>
<body class="fixed-sidebar no-skin-config full-height-layout">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
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
                    <li class="active">
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
                    <li>
                        <a href="#"><i class="fa fa-money"></i> <span class="nav-label">Donations</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="seed.php">Refiner's Seed</a></li>
                            <li><a href="tithe.php">Tithe</a></li>
                            <li><a href="offering.php">Offering</a></li>
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
        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
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
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><i class="fa fa-fire"></i> Daily Fire</h2>
                    
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            <div class="fh-breadcrumb">

                <div class="fh-column">
                    <div class="full-height-scroll">
                        <ul class="list-group elements-list">
                        <?php  
                            $getList = "SELECT * FROM daily_fire";
                            $result = mysqli_query($conn,$getList);
                            $count = mysqli_num_rows($result);
                            if($count > 0){
                            while($row = $result->fetch_assoc()) {
                                $dd = date_create($row["date"]);
                                if ($row['date'] === date("Y-m-d")) {
                                ?>
                                <li class="list-group-item active">
                                <a data-toggle="tab" href="#om<?php echo $row['id']?>">
                                    <small class="pull-right text-muted"><?php //echo date_format("DsMY",$row['date']) ?></small>
                                    <strong><?php echo $row['title']; ?></strong>
                                    <div class="small m-t-xs">
                                        <p class="m-b-none">
                                            <i class="fa fa-clock-o"></i> <?php echo date_format($dd, 'l, jS-M-Y') ?>
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <?php
                                } else {
                            ?>
                            <li class="list-group-item">
                                <a data-toggle="tab" href="#om<?php echo $row['id']?>">
                                    <small class="pull-right text-muted"><?php //echo date_format("DsMY",$row['date']) ?></small>
                                    <strong><?php echo $row['title']; ?></strong>
                                    <div class="small m-t-xs">
                                        <p class="m-b-none">
                                            <i class="fa fa-clock-o"></i> <?php echo date_format($dd, 'l, jS-M-Y') ?>
                                        </p>
                                    </div>
                                </a>
                            </li>
                                 <?php   
                                }
                              }}  
                        ?>
                        </ul>
                     </div>
                </div>

                <div class="full-height">
                    <div class="full-height-scroll white-bg border-left">

                        <div class="element-detail-box">

                            <div class="tab-content">
                                <?php  
                    $getList = "SELECT * FROM daily_fire";
                    $result = mysqli_query($conn,$getList);
                    $count = mysqli_num_rows($result);
                    if($count > 0){
                    while($row = $result->fetch_assoc()) {
                        // $ss = "2019-07-26";
                        if ($row['date'] === date("Y-m-d")) { 
                ?>
                    <div id="om<?php echo $row['id']?>" class="tab-pane active">

                        <div class="pull-right">
                            <div class="tooltip-demo">
                                <button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>
                                <button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important"><i class="fa fa-exclamation"></i> </button>
                            </div>
                        </div>
                        <div class="small text-muted">
                                <?php $ddd = date_create($row["date"]); ?>
                            <h2><?php echo date_format($ddd, 'l, jS-M-Y') ?></h2>
                        </div>

                        <h1>
                            <?php echo $row['title']?>
                        </h1>

                        <p>
                            <?php echo $row['full_text']?>
                        </p>
                       
                        <p class="small">
                            <strong>Best regards, The Refiner's House Ministry </strong>
                        </p>
                     </div>
                    <?php
                       } else {  
                     ?>
                        <div id="om<?php echo $row['id']?>" class="tab-pane">

                        <div class="pull-right">
                            <div class="tooltip-demo">
                                <button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>
                                <button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important"><i class="fa fa-exclamation"></i> </button>
                            </div>
                        </div>
                        <div class="small text-muted">
                            <?php $dddd = date_create($row["date"]); ?>
                            <h2><?php echo date_format($dddd, 'l, jS-M-Y') ?></h2>
                        </div>

                        <h1>
                            <?php echo $row['title']?>
                        </h1>

                        <p>
                            <?php echo $row['full_text']?>
                        </p>
                       
                        <p class="small">
                            <strong>Best regards, The Refiner's House Ministry </strong>
                        </p>
                     </div>
                     <?php
                 }
                        }}
                     ?>
                            </div>

                        </div>

                    </div>
                </div>



            </div>

        <div class="footer">
            <div class="pull-right">
                <strong>Built by Supremeomega</strong>.
            </div>
            <div>
                <strong>Copyright</strong>&copy; The Refiner's House Ministry &copy; 2014-2017
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>


</body>
</html>
