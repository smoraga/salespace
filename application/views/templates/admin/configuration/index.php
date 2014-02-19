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
                   Configuration Management
               </header>
               <div class="panel-body">
                   <div class="adv-table editable-table ">
                       <div class="space15"></div>
                       <table class="table table-striped table-hover table-bordered" id="configuration_tbl">
                           <thead>
                           <tr>
                                <th>ID</th>
                                <th>Configuration Name</th>
                                <th>Value</th>
                                <th>Actions</th>
                           </tr>
                           </thead>
                           <tbody>
                            <?php foreach($configuration_listing as $k => $v) : ?>
                            <?php $id = base64_encode($v['id']); ?>
                            <tr class="">
                                <td><?php echo $v['id']; ?></td>
                                <td><?php echo $v['label']; ?></td>
                                <td><?php echo $v['value']; ?></td>
                                <td>
                                    <button class="btn btn-primary btn-xs" id="<?php echo $id; ?>" title="Edit"><i class="icon-pencil"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
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
<script type="text/javascript">
    $(function(){ 
        $('select.styled').customSelect(); 
        $('#configuration_tbl').dataTable({
            "aLengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 20,
            "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0]
                }
            ]
        });
    });
    
    $("body").delegate("button", "click", function() {
        var process = $(this).attr('title');
        var id = $(this).attr('id');

        if(process == 'Edit') {
            var redirect_url = '<?php echo base_url('admin/configuration/edit')?>/'+id;
            window.location.href = (redirect_url);
        }
    });
</script>
</body>
</html>