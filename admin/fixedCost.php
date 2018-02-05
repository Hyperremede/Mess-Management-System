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
                                        <label for="full_name" class="control-label col-lg-3">Home Rent</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="homeRent" name="homeRent" type="number" min="0" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="full_name" class="control-label col-lg-3">Electricity</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="Electricity" name="Electricity" type="number" min="0" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="full_name" class="control-label col-lg-3">Internet</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="Internet" name="Internet" type="number" min="0" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="full_name" class="control-label col-lg-3">Dust</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="Dust" name="Dust" type="number" min="0" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="full_name" class="control-label col-lg-3">House Maid</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="HouseMaid" name="HouseMaid" type="number" min="0" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="full_name" class="control-label col-lg-3">Gas</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="Gas" name="Gas" type="number" min="0" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="full_name" class="control-label col-lg-3">Water</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="Water" name="Water" type="number" min="0" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="full_name" class="control-label col-lg-3">Paper</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="Paper" name="Paper" type="number" min="0" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="full_name" class="control-label col-lg-3">Cable Line</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="Cable" name="Cable" type="number" min="0" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="full_name" class="control-label col-lg-3">Service Charge</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="Service" name="Service" type="number" min="0" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="full_name" class="control-label col-lg-3">Extra Charge</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="Extra" name="Extra" type="number" min="0" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="full_name" class="control-label col-lg-3">Extra Charge Description</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="ExtraDesc" name="ExtraDesc" type="number" min="0" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="month_of" class="control-label col-lg-3">Month Of Type</label>
                                        <div class="col-lg-6">
                                           <select class="form-control" name="month_of" id="month_of">
                                                <option>--Select status--</option>
                                                <option value="1">January</option>
                                                <option value="2">Februaru</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">Auguest</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="year_of" class="control-label col-lg-3">Year Of</label>
                                        <div class="col-lg-6">
                                           <select class="form-control" name="year_of" id="year_of">
                                                <option>--Select status--</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
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