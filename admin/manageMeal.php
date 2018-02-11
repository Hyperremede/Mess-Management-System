<?php include 'inc/header.php'; ?>
<!--header start-->
<?php include 'inc/topNav.php'; ?>
<!--header end-->
<!--sidebar start-->
<?php include 'inc/navigation.php'; ?>
<?php include '../classes/Meal.php'; ?>
<?php 
    $regBpay = new Meal();

    $getAllBorder = $regBpay->getAllborder();
?>


<style>
    .searchPayment{margin-top: 20px;}
</style>

<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                             <p id="totalAmount"></p>
                            <!-- <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span> -->
                        </header>
                        <div class="panel-body">
                            
                            <div class="form">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="border" class="control-label col-lg-12">Select Border</label>
                                        <div class="col-lg-12">
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
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="month_of" class="control-label col-lg-12">Month Of</label>
                                        <div class="col-lg-12">
                                           <select class="form-control" name="month_of" id="month_of">
                                                <option>--Select Month--</option>
                                                <option value="01"  <?php echo (date('m') == '01') ? 'selected':'' ?>>January</option>
                                                <option value="02"  <?php echo (date('m') == '02') ? 'selected':'' ?>>February</option>
                                                <option value="03"  <?php echo (date('m') == '03') ? 'selected':'' ?>>March</option>
                                                <option value="04"  <?php echo (date('m') == '04') ? 'selected':'' ?>>April</option>
                                                <option value="05"  <?php echo (date('m') == '05') ? 'selected':'' ?>>May</option>
                                                <option value="06"  <?php echo (date('m') == '06') ? 'selected':'' ?>>June</option>
                                                <option value="07"  <?php echo (date('m') == '07') ? 'selected':'' ?>>July</option>
                                                <option value="08"  <?php echo (date('m') == '08') ? 'selected':'' ?>>Auguest</option>
                                                <option value="09"  <?php echo (date('m') == '09') ? 'selected':'' ?>>September</option>
                                                <option value="10" <?php echo (date('m') == '10') ? 'selected':'' ?>>October</option>
                                                <option value="11" <?php echo (date('m') == '11') ? 'selected':'' ?>>November</option>
                                                <option value="12" <?php echo (date('m') == '12') ? 'selected':'' ?>>December</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="col-md-3 offset-md-3">
                                            <button class="btn btn-primary btn-block searchPayment" type="button" name="button" id="searchPayment" onclick="queryDB()">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="table-responsive">
                          <table class="table table-striped b-t b-light">
                            <thead>
                              <tr>
                                
                                <th>Sl.</th>
                                <th>Meal Amount</th>
                                <th>Meal Date</th>
                                <th style="width:30px;">####</th>
                              </tr>
                            </thead>
                            <tbody id="recrodDiv">
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
        var totalAmount = 0;


        $.ajax({
            url: '../classes/recordHandler.php',
            dataType: "json",
            type: 'POST',
            async: false,
            cache: false,
            data: {
                MyBoarderID : borderid,
                month_of : month_of
            },
            success: function (data) {

                $("#recrodDiv").html("");
                if(data.paymentRecords.length > 0){
                    $.each(data.paymentRecords, function(k,v){
                        totalAmount = parseInt(totalAmount) + parseInt(v.total_meal);
                        var design = '<tr>';
                            design += '<td>'+(parseInt(k)+1)+'</td>';
                            design += '<td>'+v.total_meal+'</td>';
                            design += '<td>'+moment(v.entry_date).format('L');+'</td>';
                            design += '<td><a href="" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a></td>';
                            design += '</tr>';
                        $("#recrodDiv").append(design);
                    });

                    $("#totalAmount").html('<span><b>Total Meal :</b> '+totalAmount+'</span>');
                    
                }else{
                    var design = '<tr>';
                        design += '<td>No Record Found</td>';
                        design += '</tr>';
                    $("#recrodDiv").append(design);
                }


                
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
</script>