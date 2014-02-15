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
                            <li><a href="<?php echo base_url('admin/accounts/profile')?>"> <i class="icon-user"></i> Profile</a></li>
                            <li  class="active"><a href="<?php echo base_url('admin/accounts/edit')?>"> <i class="icon-edit"></i> Edit profile</a></li>
                        </ul>

                    </section>
                </aside>
                <aside class="profile-info col-lg-9">
                    <section class="panel">
                        <div class="bio-graph-heading"></div>
                        <div class="panel-body bio-graph-info">
                            <h1> Profile Info</h1>
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">First Name</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="f-name" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Last Name</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="l-name" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Country</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="c-name" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="email" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Mobile</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="mobile" placeholder=" ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <button type="button" class="btn btn-default">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                    <section>
                        <div class="panel panel-primary">
                            <div class="panel-heading"> Sets New Password & Avatar</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">Current Password</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="c-pwd" placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">New Password</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="n-pwd" placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">Re-type New Password</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="rt-pwd" placeholder=" ">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">Change Avatar</label>
                                        <div class="col-lg-6">
                                            <input type="file" class="file-pos" id="exampleInputFile">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button type="submit" class="btn btn-info">Save</button>
                                            <button type="button" class="btn btn-default">Cancel</button>
                                        </div>
                                    </div>
                                </form>
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
