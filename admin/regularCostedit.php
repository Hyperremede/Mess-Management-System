<?php include 'inc/header.php'; ?>
<!--header start-->
<?php include 'inc/topNav.php'; ?>
<!--header end-->
<!--sidebar start-->
<?php include 'inc/navigation.php'; ?>
<?php include '../classes/Regularcost.php'; ?>
<?php 
    $regCost = new Regularcost();

    if (!isset($_GET['regcostid']) || $_GET['regcostid'] == NULL) {
        echo " <script>window.location = 'productlist.php';</script> ";
    }else{
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['regcostid']);
    }


 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
        $updateregCost = $regCost->regCostUpdate($_POST, $id);
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
                                    if (isset($updateregCost)) {
                                       echo $updateregCost;
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
                                <?php
                                    $regCost = $regCost->getCostById($id);
                                    if ($regCost) {
                                        while ($value = $regCost->fetch_assoc()) {
                                            
                                    ?> 
                                <form class="cmxform form-horizontal " id="signupForm"  action="" novalidate="novalidate" method="post">
                                    
                                    <div class="form-group ">
                                        <label for="title" class="control-label col-lg-3">Title</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="title" value="<?php echo $value['title']?>" name="title" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="descp" class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-6">
                                            <textarea style="resize: none;" class=" form-control"  name="descp" id="descp" >  <?php echo $value['descp'] ?> </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="amount" class="control-label col-lg-3">Amount</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" min="1"  value="<?php echo $value['amount']?>"  id="amount" name="amount" type="number">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="month_of" class="control-label col-lg-3">Month Of Type</label>
                                        <div class="col-lg-6">
                                           <select class="form-control" name="month_of" id="month_of">
                                                <option>--Select status--</option>
                                                <option value="1" <?php echo ($value['month_of'] == '1') ? 'selected':'' ?>>January</option>
                                                <option value="2" <?php echo ($value['month_of'] == '2') ? 'selected':'' ?>>February</option>
                                                <option value="3" <?php echo ($value['month_of'] == '3') ? 'selected':'' ?>>March</option>
                                                <option value="4" <?php echo ($value['month_of'] == '4') ? 'selected':'' ?>>April</option>
                                                <option value="5" <?php echo ($value['month_of'] == '5') ? 'selected':'' ?>>May</option>
                                                <option value="6" <?php echo ($value['month_of'] == '6') ? 'selected':'' ?>>June</option>
                                                <option value="7" <?php echo ($value['month_of'] == '7') ? 'selected':'' ?>>July</option>
                                                <option value="8" <?php echo ($value['month_of'] == '8') ? 'selected':'' ?>>Auguest</option>
                                                <option value="9" <?php echo ($value['month_of'] == '9') ? 'selected':'' ?>>September</option>
                                                <option value="10" <?php echo ($value['month_of'] == '10') ? 'selected':'' ?>>October</option>
                                                <option value="11" <?php echo ($value['month_of'] == '11') ? 'selected':'' ?>>November</option>
                                                <option value="12" <?php echo ($value['month_of'] == '12') ? 'selected':'' ?>>December</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                   

                                    <div class="form-group ">
                                        <label for="year_of" class="control-label col-lg-3">Year Of</label>
                                        <div class="col-lg-6">
                                           <select class="form-control" name="year_of" id="year_of">
                                                <option>--Select status--</option>
                                                <option value="2015" <?php echo ($value['year_of'] == '2015') ? 'selected':'' ?>>2015</option>
                                                <option value="2016" <?php echo ($value['year_of'] == '2016') ? 'selected':'' ?>>2016</option>
                                                <option value="2017" <?php echo ($value['year_of'] == '2017') ? 'selected':'' ?>>2017</option>
                                                <option value="2018" <?php echo ($value['year_of'] == '2018') ? 'selected':'' ?>>2018</option>
                                                <option value="2019" <?php echo ($value['year_of'] == '2019') ? 'selected':'' ?>>2019</option>
                                                <option value="2020" <?php echo ($value['year_of'] == '2020') ? 'selected':'' ?>>2020</option>
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
                                <?php } } ?>
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