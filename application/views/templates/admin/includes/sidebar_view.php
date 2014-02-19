    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="<?php echo base_url('admin/dashboard/home')?>">
                        <i class="icon-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a  href="login.html">
                        <i class="icon-user"></i>
                        <span>Registration Management</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url('admin/accounts/supplier_listing')?>">Supplier</a></li>
                        <li><a href="<?php echo base_url('admin/accounts/reseller_listing')?>">Reseller</a></li>
                        <li><a href="<?php echo base_url('admin/accounts/buyer_listing')?>">Buyer</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/configuration/')?>">
                        <i class="icon-cogs"></i>
                        <span>Configuration Management</span>
                    </a>
                </li>
                <?php 
                /*
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="icon-shopping-cart"></i>
                        <span>Shop</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="<?php echo base_url('admin/shop')?>">List View</a></li>
                        <li><a  href="<?php echo base_url('admin/shop/detail')?>">Details View</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="icon-glass"></i>
                        <span>Extra</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="invoice.html">Invoice</a></li>
                        <li><a  href="search_result.html">Search Result</a></li>
                    </ul>
                </li>
                 */
                ?>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->