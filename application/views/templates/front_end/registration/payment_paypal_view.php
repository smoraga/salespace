<?php $this->load->view('templates/front_end/includes/header_view')?>
</head>
<body>
<div id="main-container">
    <header><?php $this->load->view('templates/front_end/includes/header_page_view')?></header>
    <div id="main-wrapper">
        <form action="" method="">
            <label>Creditcard Type</label>
            <select name="cc_tye">
                <option value="Master Card">Master Card</option>
                <option value="Visa">Visa</option>
                <option value="American Express">American Express</option>
            </select>
            <div class="clr"></div>
            
            <label>Creditcard Number</label>
            <input type="text" name="creditcard_number" value="" />
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
            <input type="text" name="last_digit" value="" />
            <div class="clr"></div>
            
            <input type="submit" name="submit" value="Pay" />
        </form>
    </div>
</div>
<footer><?php $this->load->view('templates/front_end/includes/footer_page_view')?></footer>
<?php $this->load->view('templates/front_end/includes/footer_view')?>
<script type="text/javascript">
$(function() {
   $('input[name="creditcard_number"], input[name="last_digit"]').ForceNumericOnly();
});
</script>
</body>
</html>