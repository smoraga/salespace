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
                   Reseller Listing
               </header>
               <div class="panel-body">
				   <a href="<?php echo base_url('admin/accounts/add')?>" class="btn btn-primary">Add User</a>
                   <div class="adv-table editable-table ">
                       <div class="space15"></div>
                       <table class="table table-striped table-hover table-bordered" id="reseller_tbl">
                           <thead>
                           <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Actions</th>
                           </tr>
                           </thead>
                           <tbody>
                            <?php foreach($reseller_listing as $k => $v) : ?>
                            <?php $id = base64_encode($v['id']); ?>
                            <tr class="">
                                <td><?php echo $v['id']; ?></td>
                                <td><?php echo $v['username']; ?></td>
                                <td><?php echo $v['first_name'].' '.$v['middle_name'].' '.$v['last_name']; ?></td>
                                <td>
                                    <button class="btn btn-success btn-xs" id="<?php echo $id; ?>" title="View"><i class="icon-ok"></i></button>
                                    <button class="btn btn-primary btn-xs" id="<?php echo $id; ?>" title="Edit"><i class="icon-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs" id="<?php echo $id; ?>" title="Delete"><i class="icon-trash "></i></button>
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
        $('#reseller_tbl').dataTable({
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

        if(process == 'Delete') {
            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }
            var oTR = $(this).parent().parent();
            $("#supplier_tbl").dataTable().fnDeleteRow(oTR[0]); 
            //alert($(this).attr('id'));
        }
        
        if(process == 'View') {
            var redirect_url = '<?php echo base_url('admin/accounts/view')?>/'+id;
            window.location.href = (redirect_url);
        }
        
        if(process == 'Edit') {
            var redirect_url = '<?php echo base_url('admin/accounts/edit')?>/'+id;
            window.location.href = (redirect_url);
        }
    });
</script>
</body>
</html>