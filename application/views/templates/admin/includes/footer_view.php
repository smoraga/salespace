<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/global.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script type="text/javascript" class="include" src="<?php echo base_url('assets/js/plugins/jquery.dcjqaccordion.2.7.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.scrollTo.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.nicescroll.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.sparkline.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/owl.carousel.js')?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.customSelect.min.js')?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/respond.min.js')?>" ></script>

<script type="text/javascript" class="include" src="<?php echo base_url()?>assets/js/jquery.dcjqaccordion.2.7.js"></script>

<!--common script for all pages-->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/common-scripts.js"></script>

<!--script for this page-->
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/sparkline-chart.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/easy-pie-chart.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/count.js')?>"></script>

<script type="text/javascript">
//owl carousel
$(document).ready(function() {
    $("#owl-demo").owlCarousel({
        navigation : true,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem : true,
        autoPlay:true
    });
});

//custom select box
$(function(){
    $('select.styled').customSelect();
});
</script>
</body>
</html>