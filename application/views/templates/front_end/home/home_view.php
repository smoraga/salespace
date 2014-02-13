<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="javascript:void(0);" attr-name="supplier" onclick="set_client_type(2);">Register as Supplier</a>
<a href="javascript:void(0);" attr-name="reseller" onclick="set_client_type(1);">Register as Reseller</a>
<a href="javascript:void(0);" attr-name="buyer" onclick="set_client_type(3);">Register as Buyer</a>
<h1>This is Home page</h1>
<script type="text/javascript" src="assets/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
    function set_client_type(type   )
    {
         $.ajax({
             url: '<?php echo base_url()?>registration/set_client_type_session/'+type,
             type: "GET",
             success: function(response){
                if(response == 1) {
                     window.location.href = '<?php echo base_url()?>registration';
                }
                return;
             },
             error: function(jqXHR, textStatus, errorThrown){
                 //alert('error');
             }
         });
    }
</script>
</body>
</html>