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
                <aside class="profile-info col-lg-9">
                    <form class="form-horizontal" role="form" id="configuration_edit_form">
                        <section class="panel">
                            <div class="bio-graph-heading"></div>
                            <div class="panel-body bio-graph-info">
                                <h2> Account Status</h2>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Name:</label>
                                    <div class="col-lg-6">
                                        <p><?php echo $configuration_info['label']; ?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Number of Days</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="config_value" value="<?php echo $configuration_info['value']; ?>" class="form-control" placeholder=" " />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="submit" name="submit" value="Save" class="btn btn-success" />
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>    
                </aside>
            </div>

            <!-- page end-->
        </section>
    </section>
</div>
<footer><?php $this->load->view('templates/admin/includes/footer_page_view')?></footer>
<?php $this->load->view('templates/admin/includes/footer_view')?>
<script type="text/javascript">
$(function() {
    $('input[name="config_value"]').ForceNumericOnly();
    
    $('input[name="submit"]').click(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/configuration/update",
                type: "POST",
                data: $("#configuration_edit_form").serialize(),
                success: function(response){
                    var resp = jQuery.parseJSON(response);
                    if(resp.success === true) {
                        alert('Config Successfully Updated');
                    } else {
                        alert("Can't update at this moment.");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('error');
                }
            });
        return false;
    });
});
</script>