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
                                
                                <div class="col-md-6 offset-md-3">
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
                                
                                <div class="col-md-6 offset-md-3">
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
                                
                                <th>Date <i class="fa fa-arrow-down" aria-hidden="true"></i> Boarders <i class="fa fa-arrow-right" aria-hidden="true"></th>
                                <?php 
                                    if(isset($getAllBorder)){
                                        foreach ($getAllBorder as $key => $value) {
                                            echo  '<th>'.$value['full_name'].'</th>';
                                        }
                                    }
                                ?>
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
    
    

    
    var BoarderArray = [];

    function queryDB() {

        var month_of = $("#month_of").val();
        var totalAmount = 0;
        var totalBoarder = '';
        $("#recrodDiv").html("");

        $.ajax({
            url: '../classes/recordHandler.php',
            dataType: "json",
            type: 'POST',
            async: false,
            cache: false,
            data: {
                reportMonth : month_of
            },
            success: function (data) {

                

                $.each(data.alBoarder,function(k,v){
                    BoarderArray.push(v.id);
                });

                if(data.totalDay > 0){

                   for (var i = 1; i <= data.totalDay; i++) {
                        
                        var dayNum =(i<10) ? '0'+i : i;
                        var currentDate = dayNum+'/'+data.month_of+'/'+data.year_of;
                        var entryDate = data.year_of+'-'+data.month_of+'-'+dayNum;

                        
                        var design = '<tr>';
                            design += '<td>'+currentDate+'</td>';
                            $.each(BoarderArray,function(k,v){
                                design += '<td id="boarderMe'+entryDate+'-'+v+'">0</td>';
                            });
                            design += '</tr>';
                        $("#recrodDiv").append(design); 
                   }

                   if(data.MealRecord.length > 0){

                        $.each(data.MealRecord,function(k,v){
                            totalAmount = parseInt(totalAmount) + parseInt(v.total_meal);
                            if ($.inArray(v.boarder_id, BoarderArray) >= 0) {
                                $("#boarderMe"+v.entry_date+"-"+v.boarder_id).html('<b style="color:RED">'+v.total_meal+'</b>');
                            }
                        });
                    }
                  

                    $("#totalAmount").html('<span><b>Total Meal :</b> '+totalAmount+'</span>'); 
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