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
                    <form class="form-horizontal" role="form" id="account_edit_form">
                        <section class="panel">
                            <div class="bio-graph-heading"></div>
                            <div class="panel-body bio-graph-info">
                                <h2> Account Status</h2>

                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Name:</label>
                                    <div class="col-lg-6">
                                        <p>Recurring</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Number of Days</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="last_name" attr-name="Last Name" value="" class="form-control" placeholder=" " />
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
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/jquery-knob/js/jquery.knob.js')?>"></script>
<script type="text/javascript">
$(function() {
    $('input[name="zip"], input[name="phone"], input[name="fax"], input[name="tin"], input[name="sec_number"], input[name="company_phone"], input[name="company_fax"]').ForceNumericOnly();
    
    $('input[name="submit"]').click(function() {
        $('*').removeClass('error');
        $('*').remove('.error-msg');
        var input_error = input_error = 0;
        $('input[type="hidden"]').val(error = "0");
        
        
        $(inputText).each(function(n, input) {
            if($(input).val() === '') {
                $(this).addClass('error');
                $(input).after("<p class='error-msg'>The " + $(input).attr('attr-name') + " field is required.</p>");

                input_error = input_error + 1;
                $('input[type="hidden"]').val(error);
            } 
        });
        
        if(!isValidEmail($(email).val()) && $(email).val() != 0) {
            $(email).addClass('error').next().html(" ");
            $(email).after("<p class='error-msg'>The Email field must contain a valid email address.</p>");

            input_error = input_error + 1;
            $('input[type="hidden"]').val(error);
        }

        if($(zip).val().length < 4 && $(zip).val() != 0) {
             $(zip).addClass('error').next().html(" ");
             $(zip).after("<p class='error-msg'>The " + $(zip).attr('attr-name') + " must be 4-digit</p>");

             input_error = input_error + 1;
             $('input[type="hidden"]').val(error);
        } 

        if($(phone).val().length < 7 && $(phone).val() != 0) {
            $(phone).addClass('error').next().html(" ");
            $(phone).after("<p class='error-msg'>The " + $(phone).attr('attr-name') + " must be 7-digit</p>");

            input_error = input_error + 1;
            $('input[type="hidden"]').val(error);
        } 

        if($(company_phone).val().length < 7 && $(company_phone).val() != '') {
            $(company_phone).addClass('error').next().html(" ");
            $(company_phone).after("<p class='error-msg'>The " + $(company_phone).attr('attr-name') + " must be 7-digit</p>");

            input_error = input_error + 1;
            $('input[type="hidden"]').val(error);
        } 

        if(!isValidEmail($(company_email).val()) && $(company_email).val() != 0) {
            $(company_email).addClass('error').next().html(" ");
            $(company_email).after("<p class='error-msg'>The Email field must contain a valid email address.</p>");

            input_error = input_error + 1;
            $('input[type="hidden"]').val(error);
        } 
        
        if(input_error == 1) {
            /*
             * Call AJAX if success
             */
            $.ajax({
                url: "<?php echo base_url(); ?>admin/accounts/add_client_account",
                type: "POST",
                data: $("#account_edit_form").serialize(),
                success: function(response){
                    var resp = jQuery.parseJSON(response);
                    if(resp.success === true) {
                        alert('Account Successfully Updated');
                    } else {
                        alert("Can't update at this moment.");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('error');
                }
            });
        }
        return false;
    });
});
</script>