<?php  
	require_once('config.php');
	require ('session.php');
	require ('header.php');
	if(isset( $_SESSION['login_user'])){
		$id = $_SESSION['login_user'];
		if (isset($_POST['submit'])) {
			$oldP = $_POST['old_password'];
			$newP = $_POST['new_password'];
			$conP = $_POST['con_password'];

			$sql = "SELECT password FROM mymembers WHERE username = '$id'";
			$result = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($result);
			if($conn->query($sql)){
				if($count > 0){
                	while($row = $result->fetch_assoc()) {
						if ($oldP != $row['password']) {
							echo "Incorrect Password";
						} else if($newP == $conP) {
							$sss = "UPDATE mymembers SET password = '$newP' WHERE username = '$id'";
							if($conn->query($sss)){
								echo "Data Changed successfully";
				        	}else{
				            	die('could not enter data: '. $conn->error);
				        	} 
						}else{
							echo "New Password must match Confirm password";
						}
					}
				}else{
					die('could not enter data: '. $conn->error);
				}
	}
}

?>
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Change Password</h5>
                </div>
                <div class="ibox-content">
                <form method="POST" class="form-horizontal">
				 	<div class="form-group"><label class="col-sm-2 control-label">Old Password</label>
						<div class="col-sm-10"><input type="password" name="old_password" class="form-control" value=""></div>
				    </div>
				    <div class="form-group"><label class="col-sm-2 control-label">New Password</label>
						<div class="col-sm-10"><input type="password" name="new_password" class="form-control" value=""></div>
				    </div>
				    <div class="hr-line-dashed"></div>
				    <div class="form-group"><label class="col-sm-2 control-label">Confirm New Password</label>
						<div class="col-sm-10"><input type="password" name="con_password" class="form-control" value=""></div>
				    </div>
					 <div class="form-group">
				        <div class="col-sm-4 col-sm-offset-2">
				            <button class="btn btn-white" type="reset">Cancel</button>
				            <button class="btn btn-primary" name="submit" type="submit">Save</button>
				        </div>
				    </div>
				    </form>
                </div>
            </div>
        </div>
    </div>


<?php
}

	require ('footer.php');
?>