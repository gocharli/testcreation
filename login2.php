<?php 
  include('include/connection.php');
  if(isset($_SESSION['student_login'])) {
    header("Location:billing_info?cid=".$_REQUEST['cid']);  
  }
  $cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
</head>
<body data-spy="scroll" data-target="#navbarHeader" data-offset="100">
  <!-- Loading -->
  <div id="loading" class="loader-wrapper theme-g-bg">
    <div class="center">
      <div class="d d1"></div><div class="d d2"></div><div class="d d3"></div>
      <div class="d d4"></div><div class="d d5"></div>
    </div>
  </div>

  <!-- Header -->
  <header class="header header-01">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index"><img src="static/img/logo.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span></span><span></span><span></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarHeader">
          <ul class="navbar-nav ml-auto">
            <li><a class="nav-link active" href="login">My Account</a></li>
            <li><a class="nav-link" href="javascript:;">Help</a></li>
            <?php if($cid!='') { ?>
              <li><a class="nav-link-btn m-btn-white" href="cart?cid=<?php echo $cid; ?>"><i class="fa fa-shopping-cart"></i> View Cart - 1</a></li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <!-- /Header -->

  <!-- Auth Split (no banner) -->
  <main style="margin-top: 150px; margin-bottom: -16px;">
    <section class="auth-wrapper py-5">
      <div class="container">
        <div class="auth-card shadow-lg">
          <!-- Image side -->
          <div class="auth-image d-none d-lg-block" style="background-image:url('static/img/login-img.png');">
            <a href="index" class="auth-logo">
              <!-- <img src="static/img/logo.png" alt="Logo"> -->
            </a>
          </div>

          <!-- Forms side -->
          <div class="auth-panel">
            <!-- Tabs -->
            <div class="auth-tabs mb-4">
              <button class="tab-btn btn btn-primary active" data-show="login">Login</button>
              <button class="tab-btn btn btn-primary" data-show="register">Create account</button>
            </div>

            <!-- LOGIN -->
            <div id="loginView">
              <h3 class="mb-3">Already a member?</h3>
              <form class="login-form" id="l">
                <input name="userEmail" id="userEmail" type="email" class="form-field" placeholder="Email" required />
                <input name="userPassword" id="userPassword" type="password" class="form-field" placeholder="Password" required />
                <label class="d-flex align-items-center mb-3">
                  <input type="checkbox" id="remember" name="remember" class="mr-2">
                  <span style="color:#666;font-size:0.9em;">Show Password</span>
                </label>
                <input class="btn btn-primary w-100 " type="submit" value="Login" >
              </form>
              <p class="mt-3 mb-0" style="font-size:.95rem;color:#666;">
                Don’t have an account?
                <a href="#" class="link-to-register" data-show="register">Create one</a>
              </p>
            </div>

            <!-- REGISTER -->
            <div id="registerView" style="display:none;">
              <h3 class="mb-3">Create an account</h3>
              <form id="register-form" action="javascript:;" method="post" class="login-form">
                <input name="register_email" id="register_email" type="text" class="form-field" placeholder="Email Address" required/>
                <input name="register_password" id="register_password" type="password" class="form-field" placeholder="Password" required/>
                <input name="confirm_password" id="confirm_password" type="password" class="form-field" placeholder="Confirm Password" required/>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="1" required>
                  <label class="form-check-label" for="inlineCheckbox5">
                    I am over 13 and agree to the terms and conditions.
                  </label>
                </div>
                <input class="btn btn-primary w-100" type="submit" value="Register" style="border:none; width:100%;"/>
              </form>
              <p class="mt-3 mb-0" style="font-size:.95rem;color:#666;">
                Already a member?
                <a href="#" class="link-to-login" data-show="login">Sign in</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include('footer.php');?>

  <!-- Scripts -->
  <script src="static/js/jquery-3.2.1.min.js"></script>
  <script src="static/js/jquery-migrate-3.0.0.min.js"></script>
  <script src="static/plugin/bootstrap/js/popper.min.js"></script>
  <script src="static/plugin/bootstrap/js/bootstrap.min.js"></script>
  <script src="static/plugin/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="static/js/custom.js"></script>
  <script type="text/javascript" src="admin/files/assets/js/jquery-confirm.js"></script>

  <style>
    /* Layout + spacing */
    .auth-wrapper {min-height: calc(100vh - 140px);} /* keeps nice top/bottom spacing */
    .auth-card {
      display:flex; border-radius:18px; overflow:hidden; background:#fff;
      min-height:560px;
    }
    .auth-image {
      flex: 1.1; background-size:cover; background-position:center;
      position:relative;
    }
    .auth-image::after { /* soft overlay for legibility */
      content:""; position:absolute; inset:0; background:linear-gradient(180deg,rgba(0,0,0,.15),rgba(0,0,0,.25));
    }
    .auth-logo { position:absolute; top:18px; left:18px; z-index:2; }
    .auth-logo img{ height:36px; }

    .auth-panel { flex:1; padding:32px 32px 28px; display:flex; flex-direction:column; justify-content:center; }
    .auth-tabs { display:flex; gap:8px; }
    .auth-tabs .tab-btn{
      border:none; background:#6e7d8d; padding:10px 14px; border-radius:10px; font-weight:600;
    }
    .auth-tabs .tab-btn.active{ background:#222; color:#fff; }

    .login-form .form-field, #register-form .form-field, .subbt{
      width:100%; margin-bottom:14px; border-radius:10px; padding:12px 14px;
      border:1px solid #e5e7eb; background:#fff;
    }
    .subbt{ background:#222; color:#fff; cursor:pointer; font-weight:600; }
    .subbt:hover{ opacity:.95; }
    @media (max-width: 991.98px){
      .auth-card{min-height:auto;}
      .auth-panel{ padding:24px; }
    }
  </style>

  <script>
    jQuery(function($){

      // ------- Tabs / toggles (default: Login)
      function showView(target){
        if(target === 'register'){
          $('#loginView').hide();
          $('#registerView').show();
          $('.tab-btn').removeClass('active');
          $('.tab-btn[data-show="register"]').addClass('active');
        } else {
          $('#registerView').hide();
          $('#loginView').show();
          $('.tab-btn').removeClass('active');
          $('.tab-btn[data-show="login"]').addClass('active');
        }
      }
      $('.tab-btn').on('click', function(e){ e.preventDefault(); showView($(this).data('show')); });
      $('.link-to-register').on('click', function(e){ e.preventDefault(); showView('register'); });
      $('.link-to-login').on('click', function(e){ e.preventDefault(); showView('login'); });
      showView('login'); // default

      // Show/Hide password
      $('#remember').on('change', function(){
        $('#userPassword').attr('type', this.checked ? 'text' : 'password');
      });

      // ************* SIGN IN (unchanged)
      $("#l").on("submit", function(){
        var frm = $(this);
        $.confirm({
          icon: 'fa fa-spinner fa-spin',
          title: 'Working!',
          content: function (){
            var self = this;
            return $.ajax({
              url: "include/post_func.php",
              dataType: 'json',
              data: frm.serialize() + "&submit=SignIn",
              method: 'post'
            }).done(function (response){
              self.close();
              if(response.code==1){
                window.location = 'billing_info?cid=<?php echo $cid; ?>';
              } else {
                $.confirm({
                  title: 'Error!',
                  icon: 'fa fa-warning',
                  closeIcon: true,
                  content: response.message || 'Login failed',
                  type: 'red',
                  autoClose: 'close|10000',
                  typeAnimated: true,
                  buttons:{ close: function(){} }
                });
              }
            }).fail(function(){
              self.close();
              $.confirm({ title:'Encountered an error!', content:'Something went wrong.', type:'red', typeAnimated:true, buttons:{close:function(){}} });
            });
          },
          buttons:{ close:function(){} }
        });
        return false;
      });

      // ************* REGISTER (unchanged, plus client-side password match)
      $("#register-form").on("submit", function(){
        var userPassword = $('#register_password').val();
        var confirmPassword = $('#confirm_password').val();

        if(userPassword !== confirmPassword){
          $.confirm({
            title: 'Error!', icon:'fa fa-warning', closeIcon:true,
            content: 'Password does not match confirmation.',
            type:'red', autoClose:'close|10000', typeAnimated:true, buttons:{ close:function(){} }
          });
          return false;
        }

        var registerForm = $('#register-form').serialize();
        $.confirm({
          icon: 'fa fa-spinner fa-spin',
          title: 'Working!',
          content: function (){
            var self = this;
            return $.ajax({
              url: "include/post_func.php",
              dataType: 'json',
              data: registerForm + "&submit=Register2",
              method: 'post'
            }).done(function (response){
              self.close();
              if(response.code==1){
                window.location = 'billing_info?cid=<?php echo $cid; ?>';
              } else {
                $.confirm({
                  title: 'Error!', icon:'fa fa-warning', closeIcon:true,
                  content: response.message || 'Registration failed',
                  type: 'red', autoClose:'close|10000', typeAnimated:true, buttons:{ close:function(){} }
                });
              }
            }).fail(function(){
              self.close();
              $.confirm({ title:'Encountered an error!', content:'Something went wrong.', type:'red', typeAnimated:true, buttons:{close:function(){}} });
            });
          },
          buttons:{ close:function(){} }
        });
        return false;
      });

    });
  </script>
</body>
</html>
