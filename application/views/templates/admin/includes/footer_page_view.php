<?php
$page = "/salespace/admin/dashboard";
$current_page = $_SERVER['REQUEST_URI'];
if($page === $current_page):
    
else:
?>
<div>
    <div class="text-center">
        2014 &copy; N-hauz.
        <a href="#" class="go-top">
            <i class="icon-angle-up"></i>
        </a>
    </div>
</div>
<?php endif?>