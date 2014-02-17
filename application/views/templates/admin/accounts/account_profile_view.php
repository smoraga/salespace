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
                            <h1>Jonathan Smith</h1>
                            <p>jsmith@flatlab.com</p>
                        </div>

                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="<?php echo base_url('admin/accounts/view')?>"> <i class="icon-user"></i> Profile</a></li>
                            <li><a href="<?php echo base_url('admin/accounts/edit')?>"> <i class="icon-edit"></i> Edit profile</a></li>
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
                                    <p><span>First Name </span>: Jonathan</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Last Name </span>: Smith</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Middle Name </span>: Smith</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Email </span>: jsmith@flatlab.com</p>
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
                                    <p><span>Company </span>: Filament</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Address </span>: 123 block st.</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Country </span>: Philippines</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>State </span>: NCR</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>City </span>: Makati</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Zip</span>: Makati</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Phone </span>: 1234567</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>FAX </span>: 1234567</p>
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
                                    <p><span>Tin Number </span>: Jonathan</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Company Name </span>: Smith</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Company Address </span>: Australia</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Company Phone </span>: jsmith@flatlab.com</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Company FAX </span>: (12) 03 4567890</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>SEC Number </span>: (12) 03 4567890</p>
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