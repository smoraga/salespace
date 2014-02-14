<?php $this->load->view('templates/admin/includes/header_view')?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/admin/css/table-responsive.css')?>" />
</head>
<body>
<div id="container">
    <header class="header white-bg"><?php $this->load->view('templates/admin/includes/header_page_view')?></header>
    
    <?php $this->load->view('templates/admin/includes/sidebar_view')?>
    
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <button type="button" class="btn"><i class="icon-user"></i> Add User</button>
                        </div>
                    </section>
                    <section class="panel">
                        <header class="panel-heading">
                            Supplier Listing
                        </header>
                        <div class="panel-body">
                            <section id="flip-scroll">
                                <table class="table table-bordered table-striped table-condensed cf">
                                    <thead class="cf">
                                    <tr>
                                        <th>ID</th>
                                        <th>Full name</th>
                                        <th>Username</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>AAC</td>
                                        <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                                        <td>John Doe</td>
                                        <td>
                                            <a href="#"><i class="icon-book"></i> View</a>&nbsp;
                                            <a href="#"><i class="icon-edit"></i> Edit</a>&nbsp;
                                            <a href="#"><i class="icon-remove"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>AAD</td>
                                        <td>ARDENT LEISURE GROUP</td>
                                        <td>John Doe</td>
                                        <td>
                                            <a href="#"><i class="icon-book"></i> View</a>&nbsp;
                                            <a href="#"><i class="icon-edit"></i> Edit</a>&nbsp;
                                            <a href="#"><i class="icon-remove"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>AAX</td>
                                        <td>AUSENCO LIMITED</td>
                                        <td>John Doe</td>
                                        <td>
                                            <a href="#"><i class="icon-book"></i> View</a>&nbsp;
                                            <a href="#"><i class="icon-edit"></i> Edit</a>&nbsp;
                                            <a href="#"><i class="icon-remove"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ABC</td>
                                        <td>ADELAIDE BRIGHTON LIMITED</td>
                                        <td>John Doe</td>
                                        <td>
                                            <a href="#"><i class="icon-book"></i> View</a>&nbsp;
                                            <a href="#"><i class="icon-edit"></i> Edit</a>&nbsp;
                                            <a href="#"><i class="icon-remove"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ABP</td>
                                        <td>ABACUS PROPERTY GROUP</td>
                                        <td>John Doe</td>
                                        <td>
                                            <a href="#"><i class="icon-book"></i> View</a>&nbsp;
                                            <a href="#"><i class="icon-edit"></i> Edit</a>&nbsp;
                                            <a href="#"><i class="icon-remove"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ABY</td>
                                        <td>ADITYA BIRLA MINERALS LIMITED</td>
                                        <td>John Doe</td>
                                        <td>
                                            <a href="#"><i class="icon-book"></i> View</a>&nbsp;
                                            <a href="#"><i class="icon-edit"></i> Edit</a>&nbsp;
                                            <a href="#"><i class="icon-remove"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ACR</td>
                                        <td>ACRUX LIMITED</td>
                                        <td>John Doe</td>
                                        <td>
                                            <a href="#"><i class="icon-book"></i> View</a>&nbsp;
                                            <a href="#"><i class="icon-edit"></i> Edit</a>&nbsp;
                                            <a href="#"><i class="icon-remove"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ADU</td>
                                        <td>ADAMUS RESOURCES LIMITED</td>
                                        <td>John Doe</td>
                                        <td>
                                            <a href="#"><i class="icon-book"></i> View</a>&nbsp;
                                            <a href="#"><i class="icon-edit"></i> Edit</a>&nbsp;
                                            <a href="#"><i class="icon-remove"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>AGG</td>
                                        <td>ANGLOGOLD ASHANTI LIMITED</td>
                                        <td>John Doe</td>
                                        <td>
                                            <a href="#"><i class="icon-book"></i> View</a>&nbsp;
                                            <a href="#"><i class="icon-edit"></i> Edit</a>&nbsp;
                                            <a href="#"><i class="icon-remove"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>AGK</td>
                                        <td>AGL ENERGY LIMITED</td>
                                        <td>John Doe</td>
                                        <td>
                                            <a href="#"><i class="icon-book"></i> View</a>&nbsp;
                                            <a href="#"><i class="icon-edit"></i> Edit</a>&nbsp;
                                            <a href="#"><i class="icon-remove"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>AGO</td>
                                        <td>ATLAS IRON LIMITED</td>
                                        <td>John Doe</td>
                                        <td>
                                            <a href="#"><i class="icon-book"></i> View</a>&nbsp;
                                            <a href="#"><i class="icon-edit"></i> Edit</a>&nbsp;
                                            <a href="#"><i class="icon-remove"></i> Delete</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
</div>
<footer><?php $this->load->view('templates/admin/includes/footer_page_view')?></footer>
<?php $this->load->view('templates/admin/includes/footer_view')?>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/respond.min.js')?>"></script>
<script type="text/javascript">$(function(){ $('select.styled').customSelect(); });</script>
</body>
</html>