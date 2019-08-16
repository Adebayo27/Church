 <?php 
    // session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<?php 
    require ('config.php');
    require ('session.php');
    require ('head.php');
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno']; 
    } else {
        $pageno = 1; 
    }
    $no_of_records_per_page = 10;
    $offset = ($pageno-1) * $no_of_records_per_page;
?>
</head>
<body>

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
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daily fire</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row wrapper border-bottom white-bg page-heading">
                            <div class="col-lg-10">
                                <h2><i class="fa fa-fire"></i> Daily Fire</h2>
                            </div>
                            <?php
                            $ssqqll = "SELECT * FROM daily_fire"; 
        
                            $resqq = mysqli_query($conn,$ssqqll);

                            $total_pages_sql = "SELECT COUNT(*) FROM daily_fire";
                            $res = mysqli_query($conn,$total_pages_sql);
                            $total_rows= mysqli_num_rows($resqq);
                            // $total_rows = mysqli_fetch_array($res);
                            $total_p = $total_rows / $no_of_records_per_page;
                            $total_pages = ceil($total_p);
                            $getList = "SELECT * FROM daily_fire LIMIT $offset, $no_of_records_per_page";
                            $result = mysqli_query($conn,$getList);
                            // $count = mysqli_num_rows($result);
                            // if($count > 0){
                            while($row = $result->fetch_assoc()) {
                                $dd = date_create($row["date"]);
                                ?>
                                <div class="col-lg-4">
                                    <a data-toggle="modal" data-target="#om<?php echo $row['id']?>">
                                      <div class="widget navy-bg p-lg text-center">
                                        <div>
                                            <strong>
                                                <i class="fa fa-clock-o"></i> <?php echo date_format($dd, 'l, jS-M-Y') ?>
                                            </strong>
                                        </div>
                                        <div>
                                            <strong><?php echo $row['title']; ?></strong>
                                        </div>

                                     </div>
                                    </a>
                                </div>
                                 <?php   
                                
                              }//}  
                        ?>
                        </div>
                        
                    </div>
                    <?php  
                    $getList = "SELECT * FROM daily_fire";
                    $result = mysqli_query($conn,$getList);
                    $count = mysqli_num_rows($result);
                    if($count > 0){
                    while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="modal inmodal" id="om<?php echo $row['id']?>" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title"><?php echo $row['title']; ?></h4>
                                    <h4><?php echo date_format($dd, 'l, jS-M-Y') ?></h4>
                                </div>
                                <div class="modal-body">
                                    <?php echo $row['full_text']?>
                                    <br>
                                    <br>
                                    <div>
                                        <p>
                                            <strong>Best regards, The Refiner's House Ministry </strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php }} ?>
                   

       <!--  <div class="footer">
            <div class="pull-right">
                <strong>Built by Supremeomega</strong>.
            </div>
            <div>
                <strong>Copyright</strong>&copy; The Refiner's House Ministry &copy; 2014-2017
            </div>
        </div> -->
         <ul class="pagination pull-right">
            <li><a href="?pageno=1">First</a></li>
            <li class="<?php if($pageno <= 1){echo 'disabled';} ?>">
                <a href="<?php if($pageno <= 1){echo '#';}else { echo "?pageno=".($pageno - 1);} ?>">Prev</a>
            </li>
             <li class="<?php if($pageno >= $total_pages){echo 'disabled';} ?>">
                <a href="<?php if($pageno >= $total_pages){echo '#';}else { echo "?pageno=".($pageno + 1);} ?>">Next</a>
            </li>
        </ul>
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
