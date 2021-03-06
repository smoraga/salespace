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
                <aside class="profile-info col-lg-10">
                    <form class="form-horizontal" role="form" id="account_add_form">
                        <section class="panel">
                            <div class="bio-graph-heading"></div>
                            <div class="panel-body bio-graph-info">
                                <h2> Client Information</h2>

                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">First Name</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="first_name" attr-name="Firstname" class="form-control" placeholder=" " />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">Last Name</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="last_name" attr-name="Last Name" class="form-control" placeholder=" " />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">Middle Name</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="middle_name" attr-name="Middle Name" class="form-control" placeholder=" " />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">Email</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="email" attr-name="Email" class="form-control" placeholder=" " />
                                        </div>
                                    </div>
                            </div>
                        </section>
                        <section class="panel">
                            <div class="bio-graph-heading"></div>
                            <div class="panel-body bio-graph-info">
                                <h2> Billing Information</h2>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">Company</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="company" class="form-control" attr-name="Company" placeholder=" " />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">Address</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="address" class="form-control" attr-name="Address" placeholder=" " />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">Country</label>
                                        <div class="col-lg-6">
                                            <select name="country">
                                                <option selected="selected" value="Philippines">Philippines</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">State</label>
                                        <div class="col-lg-6">
                                            <select name="state">
                                                <option>- Choose -</option>
                                                <?php foreach($states as $state):?>
                                                <option><?php echo $state->state?></option>
                                                <?php endforeach?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">City</label>
                                        <div class="col-lg-6">
                                            <select name="city">
                                                <option>- Chooose -</option>
                                                <?php foreach($cities as $city):?>
                                                <option><?php echo $city->city?></option>
                                                <?php endforeach?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">Zip</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="zip" class="form-control" attr-name="Zip" placeholder=" " />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">Phone</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="phone" class="form-control" attr-name="Phone" placeholder=" " />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">FAX</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="fax" class="form-control" placeholder=" " />
                                        </div>
                                    </div>
                            </div>
                        </section>
                        <section>
                            <div class="panel panel-primary">
                                <div class="bio-graph-heading"></div>
                                <div class="panel-body bio-graph-info">
                                    <h2> Financial Information</h2>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Tin Number</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="tin" class="form-control" attr-name="Tin Number" placeholder=" " />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Company Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="company" class="form-control" attr-name="Company" placeholder=" " />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Company Address</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="company_address" class="form-control" attr-name="Company Address" placeholder=" " />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Company Phone</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="company_phone" class="form-control" attr-name="Company Phone" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Company FAX</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="company_fax" class="form-control" attr-name="Company Fax" placeholder=" " />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">SEC Number</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="sec_number" class="form-control" attr-name="SEC Number" placeholder=" " />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Company Email</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="company_email" class="form-control" attr-name="Company Email" placeholder=" " />
                                            </div>
                                        </div>
                                        <input type="hidden" name="count" value="" id="" />
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <input type="submit" name="submit" value="Register" class="btn btn-success" />
                                            </div>
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
                data: $("#account_add_form").serialize(),
                success: function(response){
                    var resp = jQuery.parseJSON(response);
                    if(resp.success === true) {
                        alert('Account Successfully Added');
                    } else {
                        alert("Can't add at this moment.");
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