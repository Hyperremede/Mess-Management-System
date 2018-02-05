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
        <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Basic table
    </div>
    <div>
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
            <th>Full Name</th>
            <th>User Name</th>
            <th>User Type</th>
            <th>Join Date</th>
            <th>Last Date</th>
            <th>Is Active</th>
            <th>Action</th>
           
          </tr>
        </thead>
        <tbody>
            <?php
                    $getborder = $addborder->getAllBorder();
                    if ($getborder) {
                        $i = 0;
                        while ($result = $getborder->fetch_assoc()) {
                            $i++;
                        
                    
                ?>
          <tr data-expanded="true">
            <td><?php echo $i;?></td>
            <td><?php echo $result['full_name'];?></td>
            <td><?php echo $result['user_name'];?></td>
            <td><?php echo $result['user_type'];?></td>
            
            <td><?php echo $result['join_date'];?></td>
            <td><?php echo $result['last_login'];?></td>
            <td><?php echo $result['is_active'];?></td>
            <td>
                <a href="borderedit.php?borderid=<?php echo $result['id']?>">Edit</a> || <a onclick="return confirm('Are You sure to Delete')" href="?delpro=<?php echo $result['id']?>">Delete</a>
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