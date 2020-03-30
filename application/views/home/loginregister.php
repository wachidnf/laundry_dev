<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="SemiColonWeb" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/canvas/') ?>css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/canvas/') ?>style.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/canvas/') ?>css/dark.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/canvas/') ?>css/font-icons.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/canvas/') ?>css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/canvas/') ?>css/magnific-popup.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/canvas/') ?>css/responsive.css" type="text/css" />
  <link rel="shortcut icon" type="image/jpg" href="<?= base_url('assets/images/logo.png') ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | Canvas</title>
</head>

<body class="stretched">
  <div id="wrapper" class="clearfix">
    <header id="header" class="full-header">
      <div id="header-wrap">
        <div class="container clearfix">
          <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
          <div id="logo">
            <a href="index.html" class="standard-logo" data-dark-logo="<?= base_url('assets/images/') ?>logo-dark.png"><img src="<?= base_url('assets/images/') ?>logo-dark.png" alt="Canvas Logo"></a>
            <a href="index.html" class="retina-logo" data-dark-logo="<?= base_url('assets/images/') ?>logo-dark.png"><img src="<?= base_url('assets/images/') ?>logo-dark.png" alt="Canvas Logo"></a>
          </div>
          <nav id="primary-menu">
            <ul class="one-page-menu">
              <li class="current">
                <a href="<?= base_url() ?>">
                  <div>Home</div>
                </a>
              </li>
              <li>
                <a href="<?= base_url('#section-testimonials') ?>">
                  <div>Testimoni</div>
                </a>
              </li>
              <li>
                <a href="<?= base_url('Home/LoginRegister') ?>">
                  <div>Login / Register</div>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <section id="content">
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">
            <ul class="tab-nav tab-nav2 center clearfix">
              <li class="inline-block"><a href="#tab-login">Login</a></li>
              <li class="inline-block"><a href="#tab-register">Register Laundry</a></li>
            </ul>
            <div class="tab-container">
              <div class="tab-content clearfix" id="tab-login">
                <?php if($this->session->flashdata("message")!=""){?>
                <div class="alert alert-danger nobottommargin">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon-remove-sign"></i><strong>Terjadi Kesalahan!</strong> <?=$this->session->flashdata("message");?>
                </div>
                <?php }?>
                <?php if($this->session->flashdata("message_register")!=""){?>
                <div class="alert alert-success nobottommargin">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon-remove-sign"></i><strong>Registrasi Berhasil !</strong> <?=$this->session->flashdata("message_register");?>
                </div>
                <?php }?>
                <div class="card nobottommargin">
                  <div class="card-body" style="padding: 40px;">
                    <form id="login-form" name="login-form" class="nobottommargin" action="<?= site_url('Home/Login') ?>" method="post">
                      <h3>Login Akun</h3>
                      <div class="col_full">
                        <label for="login-form-username">Username:</label>
                        <input type="text" name="username" class="form-control" />
                      </div>
                      <div class="col_full">
                        <label for="login-form-password">Password:</label>
                        <input type="password" name="password" class="form-control" />
                      </div>
                      <div class="col_full nobottommargin">
                        <button class="button button-3d button-black nomargin" id="loginButton" name="loginButton" value="login">Login</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="tab-content clearfix" id="tab-register">
                <div class="card nobottommargin">
                  <div class="card-body" style="padding: 40px;">
                    <h3>Register Pendaftarkan Akun Laundry</h3>
                    <form id="register-form" name="register-form" class="nobottommargin" action="<?= site_url('Home/register') ?>" method="post" enctype="multipart/form-data">
                      <div class="col_full">
                        <label for="register-form-username">Username:</label>
                        <input type="text" name="usernameRegis" class="form-control" />
                      </div>
                      <div class="col_full">
                        <label for="register-form-password">Password:</label>
                        <input type="password" name="passwordRegis" class="form-control" />
                      </div>
                      <div class="col_full">
                        <label for="register-form-password">Email:</label>
                        <input type="text" name="emailRegis" class="form-control" />
                      </div>
                      <div class="col_full nobottommargin">
                        <button class="button button-3d button-black nomargin" >Register</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer" class="dark">
      <div id="copyrights">
        <div class="container clearfix">
          <div class="col_half">
            Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.
          </div>
        </div>
      </div>
    </footer>
  </div>

  <div id="gotoTop" class="icon-angle-up"></div>

  <script src="<?= base_url('assets/bootstrap/canvas/') ?>js/jquery.js"></script>
  <script src="<?= base_url('assets/bootstrap/canvas/') ?>js/plugins.js"></script>
  <script src="<?= base_url('assets/bootstrap/canvas/') ?>js/functions.js"></script>
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 2500);
  </script>
</body>

</html>