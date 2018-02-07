<?php include 'inc/header.php'; ?>
<!--header start-->
<?php include 'inc/topNav.php'; ?>
<!--header end-->
<!--sidebar start-->
<?php include 'inc/navigation.php'; ?>
<?php include '../classes/Addborder.php'; ?>
<?php
    $addborder = new Addborder();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
        $insertBorder = $addborder->borderInsert($_POST);
    }
?>


<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                             <?php
                                    if (isset($insertBorder)) {
                                       echo $insertBorder;
                                    }
                                ?> 
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                           
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm"  action="" novalidate="novalidate" method="post">

                                    <div class="form-group ">
                                        <label for="full_name" class="control-label col-lg-3">Full Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="full_name" name="full_name" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="user_name" class="control-label col-lg-3">User Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="user_name" name="user_name" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="password" name="password" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="user_type" class="control-label col-lg-3">User Type</label>
                                        <div class="col-lg-6">
                                           <select class="form-control" name="user_type" id="user_type">
                                                <option>--Select status--</option>
                                                <option value="1">Member</option>
                                                <option value="2">Manager</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="join_date" class="control-label col-lg-3">Join Date</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="join_date" name="join_date" type="date">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="last_login" class="control-label col-lg-3">Last Join</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="last_login" name="last_login" type="date">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="is_active" class="control-label col-lg-3">Is Active</label>
                                        <div class="col-lg-6">
                                           <select class="form-control" name="is_active" id="is_active">
                                                <option>--Select status--</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                        
                                   
                                    

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                           
                        </div>
                    </section>
                </div>
            </div>
	</section>
</section>
 <!-- footer -->
		  <!-- <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div> -->
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<?php include 'inc/footer.php'; ?>