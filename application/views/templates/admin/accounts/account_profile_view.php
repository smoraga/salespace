<?php $this->load->view('templates/admin/includes/header_view')?>
</head>
<body>
<div id="container">
    <header class="header white-bg"><?php $this->load->view('templates/admin/includes/header_page_view')?></header>
    
    <?php $this->load->view('templates/admin/includes/sidebar_view')?>

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <aside class="profile-nav col-lg-3">
                    <section class="panel">
                        <div class="user-heading round">
                            <h1><?php echo $client_info['first_name'].' '.$client_info['middle_name'].' '.$client_info['last_name']; ?></h1>
                            <p><?php echo $client_info['email']; ?></p>
                        </div>

                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?php echo base_url('admin/accounts/view/'.base64_encode($client_info['id']))?>"> <i class="icon-user"></i> Profile</a></li>
                            <li><a href="<?php echo base_url('admin/accounts/edit/'.base64_encode($client_info['id']))?>"> <i class="icon-edit"></i> Edit profile</a></li>
                            <li><a href="<?php echo base_url('admin/accounts/status/'.base64_encode($client_info['id']))?>"> <i class="icon-edit"></i>Account Status</a></li>
                        </ul>

                    </section>
                </aside>
                <aside class="profile-info col-lg-9">
                    <section class="panel">
                        <div class="bio-graph-heading"></div>
                        <div class="panel-body bio-graph-info">
                            <h2>Client Information</h2>
                            <div class="row">
                                <div class="bio-row">
                                    <p><span>First Name </span>: <?php echo $client_info['first_name']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Last Name </span>: <?php echo $client_info['last_name']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Middle Name </span>: <?php echo $client_info['middle_name']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Email </span>: <?php echo $client_info['email']; ?></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="panel panel-primary">
                            <div class="bio-graph-heading"></div>
                            <div class="panel-body">
                            <h2>Billing Information</h2>
                            <div class="row">
                                <div class="bio-row">
                                    <p><span>Company </span>: <?php echo $client_info['company']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Address </span>: <?php echo $client_info['address']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Country </span>: <?php echo $client_info['country']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>State </span>: <?php echo $client_info['state']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>City </span>: <?php echo $client_info['city']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Zip</span>: <?php echo $client_info['zip']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Phone </span>: <?php echo $client_info['phone']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>FAX </span>: <?php echo $client_info['fax']; ?></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="panel panel-primary">
                            <div class="bio-graph-heading"></div>
                            <div class="panel-body">
                            <h2>Financial Information</h2>
                            <div class="row">
                                <div class="bio-row">
                                    <p><span>Tin Number </span>: <?php echo $client_info['tin_number']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Company Name </span>: <?php echo $client_info['company_name']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Company Address </span>: <?php echo $client_info['company_address']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Company Phone </span>: <?php echo $client_info['company_email']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Company FAX </span>: <?php echo $client_info['company_fax']; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>SEC Number </span>: <?php echo $client_info['sec_number']; ?></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>

            <!-- page end-->
        </section>
    </section>
</div>
<footer><?php $this->load->view('templates/admin/includes/footer_page_view')?></footer>
<?php $this->load->view('templates/admin/includes/footer_view')?>
<script src="<?php echo base_url('assets/admin/js/plugins/jquery-knob/js/jquery.knob.js')?>"></script>
<script type="text/javascript">$(".knob").knob();</script>