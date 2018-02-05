<?php include 'inc/header.php'; ?>
<!--header start-->
<?php include 'inc/topNav.php'; ?>
<!--header end-->
<!--sidebar start-->
<?php include 'inc/navigation.php'; ?>
<?php include '../classes/Regularcost.php'; ?>
<?php
    $regCost = new Regularcost();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
        $insertRegCost = $regCost->regularCostInsert($_POST);
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
                                    if (isset($insertRegCost)) {
                                       echo $insertRegCost;
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
                                        <label for="title" class="control-label col-lg-3">Title</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="title" name="title" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="descp" class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-6">
                                            <textarea style="resize: none;" class=" form-control"  name="descp" id="descp" ></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="amount" class="control-label col-lg-3">Amount</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " min="0" id="amount" name="amount" type="number">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="month_of" class="control-label col-lg-3">Month Of Type</label>
                                        <div class="col-lg-6">
                                           <select class="form-control" name="month_of" id="month_of">
                                                <option>--Select status--</option>
                                                <option value="1">Jan</option>
                                                <option value="2">Feb</option>
                                                <option value="3">Mar</option>
                                                <option value="4">Apr</option>
                                                <option value="5">May</option>
                                                <option value="6">Jun</option>
                                                <option value="7">Jul</option>
                                                <option value="8">Aug</option>
                                                <option value="9">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                   

                                    <div class="form-group ">
                                        <label for="year_of" class="control-label col-lg-3">Year Of</label>
                                        <div class="col-lg-6">
                                           <select class="form-control" name="year_of" id="year_of">
                                                <option>--Select status--</option>
                                                <option value="1">2015</option>
                                                <option value="2">2016</option>
                                                <option value="3">2017</option>
                                                <option value="4">2018</option>
                                                <option value="5">2019</option>
                                                <option value="6">2020</option>
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