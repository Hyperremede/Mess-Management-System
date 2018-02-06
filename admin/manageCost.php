<?php include 'inc/header.php'; ?>
<!--header start-->
<?php include 'inc/topNav.php'; ?>
<!--header end-->
<!--sidebar start-->
<?php include 'inc/navigation.php'; ?>
<?php include '../classes/Regularcost.php'; ?>
<?php
     $regularcost = new Regularcost();

      if (isset($_GET['delcost'])) {
      $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcost']);
      $delregularcost = $regularcost->delRegCostById($id);
}
?>


<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">

     <h2>Manage Cost</h2> <br>
     
    </div>
    
    <div>
      <h5 class="text-center">
      <?php
          if (isset($delregularcost)) {
             echo $delregularcost;
          }
      ?> 
      </h5>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th data-breakpoints="xs">ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Entry Date</th>
            <th>Month Of</th>
            <th>Year Of</th>
            <th>Action</th>
           
          </tr>
        </thead>
        <tbody>
            <?php
                    $regularcost = $regularcost->getAllRegularCost();
                    if ($regularcost) {
                        $i = 0;
                        while ($result = $regularcost->fetch_assoc()) {
                            $i++;
                        
                    
                ?>
          <tr data-expanded="true">
            <td><?php echo $i;?></td>
            <td><?php echo $result['title'];?></td>
            <td><?php echo $result['descp'];?></td>
            <td><?php echo $result['amount'];?></td>
            
            <td><?php echo $result['entry_date'];?></td>
            <td><?php echo $result['month_of'];?></td>
            <td><?php echo $result['year_of'];?></td>
            <td>
                <a href="regularCostedit.php?regcostid=<?php echo $result['id']?>">Edit</a> || <a onclick="return confirm('Are You sure to Delete')" href="?delcost=<?php echo $result['id']?>">Delete</a>
            </td>
          </tr>
          <?php } } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
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