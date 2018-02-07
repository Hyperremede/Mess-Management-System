<?php include 'inc/header.php'; ?>
<!--header start-->
<?php include 'inc/topNav.php'; ?>
<!--header end-->
<!--sidebar start-->
<?php include 'inc/navigation.php'; ?>
<?php include '../classes/Bpay.php'; ?>
<?php 
    $regBpay = new Bpay();

    $getAllBorder = $regBpay->getAllborder();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
        $insertregBpay = $regBpay->BpayInsert($_POST);
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
                                    if (isset($insertregBpay)) {
                                       echo $insertregBpay;
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
                                <div class="form-group ">
                                    <label for="border" class="control-label col-lg-2">Select Border</label>
                                    <div class="col-lg-2">
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
                                        <label for="month_of" class="control-label col-lg-2">Month Of</label>
                                        <div class="col-lg-2">
                                           <select class="form-control" name="month_of" id="month_of">
                                                <option>--Select Month--</option>
                                                <option value="1"  <?php echo (date('m') == '01') ? 'selected':'' ?>>January</option>
                                                <option value="2"  <?php echo (date('m') == '02') ? 'selected':'' ?>>February</option>
                                                <option value="3"  <?php echo (date('m') == '03') ? 'selected':'' ?>>March</option>
                                                <option value="4"  <?php echo (date('m') == '04') ? 'selected':'' ?>>April</option>
                                                <option value="5"  <?php echo (date('m') == '05') ? 'selected':'' ?>>May</option>
                                                <option value="6"  <?php echo (date('m') == '06') ? 'selected':'' ?>>June</option>
                                                <option value="7"  <?php echo (date('m') == '07') ? 'selected':'' ?>>July</option>
                                                <option value="8"  <?php echo (date('m') == '08') ? 'selected':'' ?>>Auguest</option>
                                                <option value="9"  <?php echo (date('m') == '09') ? 'selected':'' ?>>September</option>
                                                <option value="10" <?php echo (date('m') == '10') ? 'selected':'' ?>>October</option>
                                                <option value="11" <?php echo (date('m') == '11') ? 'selected':'' ?>>November</option>
                                                <option value="12" <?php echo (date('m') == '12') ? 'selected':'' ?>>December</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="year_of" class="control-label col-lg-2">Year Of</label>
                                        <div class="col-lg-2">
                                           <select class="form-control" name="year_of" id="year_of">
                                                <option>--Select status--</option>
                                                <option value="2018" <?php echo (date('Y') == '2018') ? 'selected':'' ?>>2018</option>
                                                <option value="2019" <?php echo (date('Y') == '2019') ? 'selected':'' ?>>2019</option>
                                                <option value="2020" <?php echo (date('Y') == '2020') ? 'selected':'' ?>>2020</option>
                                                <option value="2021" <?php echo (date('Y') == '2021') ? 'selected':'' ?>>2021</option>
                                                <option value="2022" <?php echo (date('Y') == '2022') ? 'selected':'' ?>>2022</option>
                                                <option value="2023" <?php echo (date('Y') == '2023') ? 'selected':'' ?>>2023</option>
                                            </select>
                                        </div>
                                    </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-9">
                                        <button class="btn btn-primary" type="button" name="button" id="searchPayment" onclick="queryDB()">Search</button>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="table-responsive">
                          <table class="table table-striped b-t b-light">
                            <thead>
                              <tr>
                                
                                <th>Project</th>
                                <th>Task</th>
                                <th>Date</th>
                                <th style="width:30px;"></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Videodown</td>
                                <td>4c</td>
                                <td>Jul 1, 2013</td>
                                <td>
                                  <a href="" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
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
    function queryDB() {

        var borderid = $("#border").val();
        var month_of = $("#month_of").val();
        var year_of = $("#year_of").val();


        $.ajax({
            url: '../classes/recordHandler.php',
            dataType: "json",
            type: 'POST',
            async: false,
            cache: false,
            data: {
                borderid : borderid,
                month_of : month_of,
                year_of : year_of
            },
            success: function (data) {

                console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
</script>