<?php $this->load->view('templates/front_end/includes/header_view')?>
</head>
<body>
<div id="main-container">
    <header><?php $this->load->view('templates/front_end/includes/header_page_view')?></header>
    <div id="main-wrapper">
        <div class="container">
            <h1>Financial Information</h1>
            
            <form id="reg_financial_form">
                <label>Tin Number</label>
                <input type="text" name="tin" value="" />
                <div class="clr"></div>
                
                <label>Company Name</labe>
                <input type="text" name="company" value="" />
                <div class="clr"></div>
                
                <label>Company Address</label>
                <input type="text" name="company_address" value="" />
                <div class="clr"></div>
                
                <label>Company Phone</label>
                <input type="text" name="company_phone" value="" />
                <div class="clr"></div>
                
                <label>Company Fax</label>
                <input type="text" name="company_fax" />
                <div class="clr"></div>
                
                <label>SEC Number</label>
                <input type="text" name="sec_number" />
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
    $('input[name="sec_number"], input[name="company_phone"], input[name="company_fax"]').ForceNumericOnly();
    
    $('input[name="submit"]').click(function() {
        $('*').removeClass('error');
        $('*').remove('.error-msg');
       
        $(inputText).each(function(n, input) {
            if($(input).val() === '') {
                $(this).addClass('error');
                $(input).after("<p class='error-msg'>Please fill the required field.</p>");

                error = 1;
            } else {
                error = 0;
            }
        });
       
        if(error === 0) {
            $.ajax({
                url: "<?php echo base_url(); ?>registration/process_financial_information",
                type: "POST",
                data: $("#reg_financial_form").serialize(),
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
});
</script>
</body>
</html>