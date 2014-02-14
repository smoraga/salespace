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
           <!-- page start-->
           <section class="panel">
               <header class="panel-heading">
                   Buyer Listing
               </header>
               <div class="panel-body">
                   <div class="adv-table editable-table ">
                       <div class="space15"></div>
                       <table class="table table-striped table-hover table-bordered" id="editable-sample">
                           <thead>
                           <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Actions</th>
                           </tr>
                           </thead>
                           <tbody>
                            <tr class="">
                                <td>1</td>
                                <td>Jondi Rose</td>
                                <td>Alfred Jondi Rose</td>
                                <td>
                                    <button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
                                    <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
                                </td>
                            </tr>
                           </tbody>
                       </table>
                   </div>
               </div>
           </section>
           <!-- page end-->
       </section>
    </section>
</div>
<footer><?php $this->load->view('templates/admin/includes/footer_page_view')?></footer>
<?php $this->load->view('templates/admin/includes/footer_view')?>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/data-tables/jquery.dataTables.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/data-tables/DT_bootstrap.js')?>"></script>
<!--script for this page only-->
<script src="<?php echo base_url('assets/admin/js/plugins/editable-table.js')?>"></script>
<script type="text/javascript">$(function(){ $('select.styled').customSelect(); EditableTable.init();});</script>
</body>
</html>