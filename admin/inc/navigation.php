<?php 
    $urlName = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
    $userType = Session::get('adminType');
?>
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="<?php if($urlName == 'index.php'){
                        echo 'active';
                    } ?>" href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                        <span></span>
                    </a>
                </li>

                <?php 
                    if($userType == 2){
                    ?>
                        <li class="sub-menu">
                            <a class="<?php if($urlName == 'addBorder.php' || $urlName == 'manageBorder.php'){ echo 'active';} ?>" href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Borders</span>
                            </a>
                            <ul class="sub">
                                <li><a class="<?php if($urlName == 'addBorder.php'){ echo 'active'; } ?>" href="addBorder.php">Add Border</a></li>
                                <li><a class="<?php if($urlName == 'manageBorder.php'){ echo 'active'; } ?>" href="manageBorder.php">Manage Border</a></li>
                            </ul>
                        </li>

                    <?php
                    }
                ?>
                

                <li class="sub-menu">
                    <a class="<?php if($urlName == 'regularcost.php' || $urlName == 'manageCost.php' || $urlName == 'fixedCost.php'){ echo 'active';} ?>" href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Cost</span>
                    </a>
                    <ul class="sub">
                        <li><a class="<?php if($urlName == 'regularcost.php'){ echo 'active'; } ?>" href="regularcost.php">Regular Cost</a></li>
                        <li><a class="<?php if($urlName == 'manageCost.php'){ echo 'active'; } ?>" href="manageCost.php">Manage Cost</a></li>
                        <?php 
                            if($userType == 2){
                            ?>
                                <li><a class="<?php if($urlName == 'fixedCost.php'){ echo 'active'; } ?>" href="fixedCost.php">Fixed Cost</a></li>
                            <?php
                            }
                        ?>
                    </ul>
                </li>

                <li>
                    <a class="<?php if($urlName == 'bpay.php' || $urlName == 'bpayrecord.php'){ echo 'active';} ?>" href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Border Payable</span>
                    </a>
                    <ul class="sub">
                        <li><a class="<?php if($urlName == 'bpay.php'){ echo 'active'; } ?>" href="bpay.php">Payment</a></li>
                        <li><a class="<?php if($urlName == 'bpayrecord.php'){ echo 'active'; } ?>" href="bpayrecord.php">Payment Record</a></li>
                    </ul>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>