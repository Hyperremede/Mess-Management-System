<?php include 'inc/header.php'; ?>
<!--header start-->
<?php include 'inc/topNav.php'; ?>
<!--header end-->
<!--sidebar start-->
<?php include 'inc/navigation.php'; ?>
<?php include '../classes/Meal.php'; ?>
<?php 
    $regMeal = new Meal();

    $getAllBorder = $regMeal->getAllborder();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
        $insertregMeal = $regMeal->mealInsert($_POST);
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
                                    if (isset($insertregMeal)) {
                                       echo $insertregMeal;
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
                                        <label for="border" class="control-label col-lg-3">Select Border</label>
                                        <div class="col-lg-6">
                                           <select class="form-control" name="border" id="border">
                                                <option>--Select Border--</option>
                                                <?php 
                                                    if(isset($getAllBorder)){
                                                        foreach ($getAllBorder as $key => $value) {
                                                            echo  '<option value="'.$value['id'].'">'.$value['full_name'].'</option>';
                                                        }
                                                    }
                                                    
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="amount" class="control-label col-lg-3">Meal Amount</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" min="1" id="amount" name="amount" type="number">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="month_of" class="control-label col-lg-3">Note</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control " id="ccomment" name="comment" required=""></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="year_of" class="control-label col-lg-3">Date Of Meal</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="meald_ate" name="date"  type="date"/>
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
<script type="text/javascript">
    var numberInput = document.getElementById('amount');

    numberInput.onkeydown = function(e) {
        if(!((e.keyCode > 95 && e.keyCode < 106)
          || (e.keyCode > 47 && e.keyCode < 58) 
          || e.keyCode == 8)) {
            return false;
        }
    }

    
</script>

