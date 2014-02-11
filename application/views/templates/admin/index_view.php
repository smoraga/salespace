<?php $this->load->view('templates/admin/includes/header_view')?>
</head>
<body>
<div id="main-container">
    <header><?php $this->load->view('templates/admin/includes/header_page_view')?></header>
    <div id="main-wrapper">
        <div class="container">
          <form class="form-signin" id="signin_form">
            <h2 class="form-signin-heading">sign in now</h2>
            <div class="login-wrap">
                <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right">
                        <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                    </span>
                </label>
                <input type="submit" name="submit" value="Sign in" class="btn btn-lg btn-login btn-block"/>
                <!--<button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>-->
                <p>or you can sign in via social network</p>
                <div class="login-social-link">
                    <a href="javascript:void(0)" class="facebook">
                        <i class="icon-facebook"></i>
                        Facebook
                    </a>
                    <a href="javascript:void(0)" class="twitter">
                        <i class="icon-twitter"></i>
                        Twitter
                    </a>
                </div>
                <div class="registration">
                    Don't have an account yet?
                    <a class="" href="registration.html">
                        Create an account
                    </a>
                </div>

            </div>

              <!-- Modal -->
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Forgot Password ?</h4>
                          </div>
                          <div class="modal-body">
                              <p>Enter your e-mail address below to reset your password.</p>
                              <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                              <button class="btn btn-success" type="button">Submit</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- modal -->

          </form>

        </div>
    </div>
</div>
<footer><?php $this->load->view('templates/admin/includes/footer_page_view')?></footer>
<?php $this->load->view('templates/admin/includes/footer_view')?>
<script type="text/javascript">
$(function() {
    $('input[type="submit"]').click(function() {
        $('*').removeClass('error error-succes');
        $('*').remove('.error-msg');
        
        if($(username).val() === '') {
            username.addClass('error');
            username.after('<p class="error-msg">Please fill the required field</p>');
            error = 1;
        } else {
            username.addClass('error-succes');
            error = 0;
        }
        
        if($(password).val() === '') {
            password.addClass('error');
            password.after('<p class="error-msg">Please fill the required field</p>');
            error = 1;
        } else {
-           password.addClass('error-succes');
        }
        
        if(error == 0) {
            //$(this).submit();
            $.ajax({
                url: "<?php echo base_url(); ?>admin/dashboard/login",
                type: "POST",
                data: $("#signin_form").serialize(),
                success: function(response){
                    var resp = jQuery.parseJSON(response);
                    alert(resp.success);
                    alert(resp.msg);
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