<?php   
	require_once ('config.php');
	require ('session.php');
  require ('header.php');
  
  // require ('css/header.php');
	$dates = date("d-m-Y");
  
	if(isset( $_SESSION['login_user'])){
		$id = $_SESSION['login_user'];
    $sql = "";
    // $result = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    // $active = $row['active'];
    // $count = mysqli_num_rows($result);


		
?>


<?php  
  
?>
  <div class="col-lg-4">
    <a href="dailyfire.php">
      <div class="widget navy-bg p-lg text-center">
            <div class="m-b-md">
              <i class="fa fa-fire fa-5x"></i>
              <h3 class="font-bold no-margins">
                  <br>Daily fire
              </h3>
            </div>
        </div>
    </a>
  </div>
  <div class="col-lg-4">
    <a href="#">
      <div class="widget navy-bg p-lg text-center">
            <div class="m-b-md">
              <i class="fa fa-id-badge fa-5x"></i>
              <h3 class="font-bold no-margins">
                  <br>Sermon
              </h3>
            </div>
        </div>
    </a>
  </div>
  <div class="col-lg-4">
    <a href="videos.php">
      <div class="widget navy-bg p-lg text-center">
            <div class="m-b-md">
              <i class="fa fa-film fa-5x"></i>
              <h3 class="font-bold no-margins">
                  <br>Videos
              </h3>
            </div>
        </div>
    </a>
  </div>
  <div class="col-lg-4">
    <a href="whatsapp.php">
      <div class="widget navy-bg p-lg text-center">
            <div class="m-b-md">
              <i class="fa fa-comments fa-5x"></i>
              <h3 class="font-bold no-margins">
                  <br>WhatsApp
              </h3>
            </div>
        </div>
    </a>
  </div>
  <div class="col-lg-4">
    <a href="dreams.php">
      <div class="widget navy-bg p-lg text-center">
            <div class="m-b-md">
              <i class="fa fa-bed fa-5x"></i>
              <h3 class="font-bold no-margins">
                  <br>Dreams
              </h3>
            </div>
        </div>
    </a>
  </div>
  <div class="col-lg-4">
    <a href="#">
      <div class="widget navy-bg p-lg text-center">
            <div class="m-b-md">
              <i class="fa fa-money fa-5x"></i><span><i class="fa fa-dollar fa-5x"></i></span>
              <h3 class="font-bold no-margins">
                  <br>Donations
              </h3>
            </div>
        </div>
    </a>
  </div>
  <div class="col-lg-4">
    <a href="contact.php">
      <div class="widget navy-bg p-lg text-center">
            <div class="m-b-md">
              <i class="fa fa-address-book fa-5x"></i>
              <h3 class="font-bold no-margins">
                  <br>Contact
              </h3>
            </div>
        </div>
    </a>
  </div>
  <div class="col-lg-4">
    <a href="profile.php">
      <div class="widget navy-bg p-lg text-center">
            <div class="m-b-md">
              <i class="fa fa-user fa-5x"></i>
              <h3 class="font-bold no-margins">
                  <br>Profile
              </h3>
            </div>
        </div>
    </a>
</div>
  
  
<?php 
  }
  require ('footer.php');
?>


 