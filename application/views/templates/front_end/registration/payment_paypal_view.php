<?php $this->load->view('templates/front_end/includes/header_view')?>
</head>
<body>
<div id="main-container">
    <header><?php $this->load->view('templates/front_end/includes/header_page_view')?></header>
    <div id="main-wrapper">
        <form action="" method="">
            <label>Creditcard Type</labe>
            <select name="">
                <option value="Master Card">Master Card</option>
                <option value="Visa">Visa</option>
                <option value="American Express">American Express</option>
            </select>
            <div class="clr"></div>
            
            <label>Creditcard Number</label>
            <input type="text" name="creditcard_number" value="" />
            <div class="clr"></div>
            
            <label>Expiration Date</label>
            <select name="">
                <option>- MM -</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>
            <select name="">
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