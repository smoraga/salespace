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
                            <a href="#">
                                <img src="<?php echo base_url('assets/admin/img/profile-avatar.jpg')?>" alt="">
                            </a>
                            <h1>Jonathan Smith</h1>
                            <p>jsmith@flatlab.com</p>
                        </div>

                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="<?php echo base_url('admin/accounts/profile')?>"> <i class="icon-user"></i> Profile</a></li>
                            <li><a href="<?php echo base_url('admin/accounts/edit')?>"> <i class="icon-edit"></i> Edit profile</a></li>
                        </ul>

                    </section>
                </aside>
                <aside class="profile-info col-lg-9">
                    <section class="panel">
                        <div class="bio-graph-heading"></div>
                        <div class="panel-body bio-graph-info">
                            <h1>Bio Graph</h1>
                            <div class="row">
                                <div class="bio-row">
                                    <p><span>First Name </span>: Jonathan</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Last Name </span>: Smith</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Country </span>: Australia</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Birthday</span>: 13 July 1983</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Occupation </span>: UI Designer</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Email </span>: jsmith@flatlab.com</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Mobile </span>: (12) 03 4567890</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Phone </span>: 88 (02) 123456</p>
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