<?php $this->load->view('templates/front_end/includes/header_view')?>
</head>
<body>
<div id="main-container">
    <header><?php $this->load->view('templates/front_end/includes/header_page_view')?></header>
    <div id="main-wrapper">
        <form action="" method="">
            <label>Creditcard Type</label>
            <select name="cc_type" attr-name="Credit Card Type">
                <option>- Choose -</option>
                <option value="Master Card">Master Card</option>
                <option value="Visa">Visa</option>
                <option value="American Express">American Express</option>
            </select>
            <div class="clr"></div>
            
            <label>Creditcard Number</label>
            <input type="text" name="cc_number" attr-name="Credit Card Number" value="" />
            <div class="clr"></div>
            
            <label>Expiration Date</label>
            <select name="month">
                <option>- MM -</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select name="year">
                <option>- YY -</option>
                <?php 
                    for($i =0; $i <= 4 ;$i++):
                        $year = date('Y') + $i;
                ?>
                <option value="<?php echo $year?>"><?php echo $year?></option>
                <?php endfor?>
            </select>
            <div class="clr"></div>
            
            <label>Last 3 digits</label>
            <input type="text" name="last_digit" attr-name="Last Digit" value="" />
            <div class="clr"></div>
            
            <input type="submit" name="submit" value="Pay" />
        </form>
    </div>
</div>
<footer><?php $this->load->view('templates/front_end/includes/footer_page_view')?></footer>
<div id="process" class="modal" data-backdrop="static">
    <div class="modal-body">
        Processing....

    </div>
</div>
<?php $this->load->view('templates/front_end/includes/footer_view')?>
<script type="text/javascript">
$(function() {
   
   /*
    * To call modal
    * $("#process").modal({ dynamic: true });
    */
   
   /*
    * To hide modal
    * $('#process').modal('hide');
    */
}

   $('input[name="creditcard_number"], input[name="last_digit"]').ForceNumericOnly();
   
   $('input[name="submit"]').click(function() {
        $('*').removeClass('error');
        $('*').remove('.error-msg');
       
        if($(cc_type).val() === '- Choose -') {
            $(cc_type).addClass('error');
            $(cc_type).next().html("<p class='error-msg'>Please choose your credit card type</p>");
            error = 1;
        } else {
            error = 0;
        }
        
        $(inputText).each(function(n, input) {
            if($(input).val() === '') {
                $(this).addClass('error');
                $(this).after("<p class='error-msg'>The " + $(input).attr('attr-name') + " field is required.</p>");
                
                error = 1;
            } else if($('input[name="last_digit"]').val().length < 3 && $('input[name="last_digit"]').val() != '') {
                $('input[name="last_digit"]').addClass('error').next().html(" ");
                $('input[name="last_digit"]').after("<p class='error-msg'>Minimum of 3 digits</p>");
                
                error = 1;
            } else if($('input[name="cc_number"]').val().length < 16 && $('input[name="cc_number"]').val() != '') {
                $('input[name="cc_number"]').addClass('error').next().html(" ");
                $('input[name="cc_number"]').after("<p class='error-msg'>Minimum of 16 digits</p>");
                
                error = 1;
            } else {
                error = 0;
            }
        });
        
        if($(month).val() === '- MM -' || $(year).val() === '- YY -') {
            $(year).after('<p class="error-msg">The Month/Year is required.</p>');
        }

        if(error === 0) {
            alert('Success');
        } else {
            return false;
        }
   });
});
</script>
</body>
</html>