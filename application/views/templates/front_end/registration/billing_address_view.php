<?php $this->load->view('templates/front_end/includes/header_view')?>
</head>
<body>
<div id="main-container">
    <header><?php $this->load->view('templates/front_end/includes/header_page_view')?></header>
    <div id="main-wrapper">
        <div class="container">
        <h1>Billing Information</h1>
            <form id="reg_billing_form">
                <label>Company</label>
                <input type="text" name="company" value=""/>
                <div class="clr"></div>

                <label>Address</label>
                <input type="text" name="address" value="" />
                <div class="clr"></div>

                <label>Country</label>
                <select name="country">
                    <option selected="selected" value="Philippines">Philippines</option>
                </select>
                <div class="clr"></div>

                <label>City</label>
                <select name="city">
                    <option>- Chooose -</option>
                    <?php foreach($cities as $city):?>
                    <option><?php echo $city->city?></option>
                    <?php endforeach?>
                </select>
                <div class="clr"></div>
                
                <label>State</label>
                <input type="text" name="state" value="" />
                <div class="clr"></div>

                <label>Zip</label>
                <input type="text" name="zip" value="" />
                <div class="clr"></div>

                <label>Phone</label>
                <input type="text" name="phone" value="" />
                <div class="clr"></div>

                <label>Fax</label>
                <input type="text" name="fax" value="" />
                <div class="clr"></div>

                <input type="submit" name="submit" value="Next" />
            </form>    
        </div>
    </div>
</div>
<footer><?php $this->load->view('templates/front_end/includes/footer_page_view')?></footer>
<?php $this->load->view('templates/front_end/includes/footer_view')?>
<script type="text/javascript">
$(function() {
    $('input[name="zip"], input[name="phone"], input[name="fax"]').ForceNumericOnly();
    
    $('input[name="submit"]').click(function() {
        $('*').removeClass('error');
        $('*').remove('.error-msg');
        
        $(inputText).each(function(n, input) {
            if($(input).val() == 0) {
                $(this).addClass('error');
                $(input).after("<p class='error-msg'>Please fill the required field.</p>");

                error = 1;
            } else if($(zip).val().length < 4 && $(zip).val() != '') {
                $(zip).addClass('error').next().html(" ");
                $(zip).after("<p class='error-msg'>Zip must be 4-digit</p>");
                
                error = 1;
            } else {
                error = 0;
            }
        });
        
        /*
         if($(countries).val() === '- Select -') {
            $(countries).addClass('error');
            $(countries).after("<p class='error-msg'>Please choose your country.</p>");
            
            error = 1;
        } 
         */
        
        if(error == 0) {
            $.ajax({
                url: "<?php echo base_url(); ?>registration/process_billing_information",
                type: "POST",
                data: $("#reg_billing_form").serialize(),
                success: function(response){
                    var resp = jQuery.parseJSON(response);
                    if(resp.success === true) {
                        window.location.href = resp.redirect_url;
                    } else {
                        alert(resp.success);
                        alert(resp.errors.username);
                        alert(resp.errors.password);
                    }             
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('error');
                }
            });
        } 
        return false;
    });
})
</script> 