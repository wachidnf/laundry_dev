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
  <title>Home</title>
</head>

<body class="stretched">
  <div id="wrapper" class="clearfix">
    <header id="header" class="transparent-header page-section dark">
      <div id="header-wrap">
        <div class="container clearfix">
          <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
          <div id="logo">
            <a href="index.html" class="standard-logo" data-dark-logo="<?= base_url('assets/images/') ?>logo-dark.png">
              <img src="<?= base_url('assets/images/') ?>logo-dark.png" alt="Canvas Logo">
            </a>
            <a href="index.html" class="retina-logo" data-dark-logo="<?= base_url('assets/images/') ?>logo-dark.png">
              <img src="<?= base_url('assets/images/') ?>logo-dark.png" alt="Canvas Logo">
            </a>
          </div>
          <nav id="primary-menu">
            <ul class="one-page-menu">
              <li class="current">
                <a href="#" data-href="#header">
                  <div>Home</div>
                </a>
              </li>
              <li>
                <a href="#" data-href="#section-testimonials">
                  <div>Testimoni</div>
                </a>
              </li>
              <li>
                <a href="<?= site_url('Home/LoginRegister') ?>">
                  <div>Login / Register</div>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <section id="slider" class="slider-element slider-parallax full-screen dark" style="background: url(<?= base_url('assets/images/') ?>2714933.jpg) center center no-repeat; background-size: cover">
      <div class="slider-parallax-inner">
        <div class="container-fluid vertical-middle clearfix">
          <div class="heading-block title-center nobottomborder">
            <h1>Starter's Guide to create Landing Pages</h1>
            <span>Building a Landing Page was never so Easy &amp; Interactive</span>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="content-wrap">
        <div class="section">
          <div class="container clearfix">
            <div id="section-testimonials" class="heading-block title-center page-section">
              <h2>Testimonials</h2>
            </div>
            <ul class="testimonials-grid grid-3 clearfix">
                <?php
                foreach ($testimoni as $t) {
                    ?>
                    <li>
                        <div class="testimonial">
                            <div class="testi-image">
                                <a href="#">
                                    <img src="<?= base_url('assets/images/') ?>person-flat.png" alt="Customer Testimonails">
                                </a>
                            </div>
                            <div class="testi-content">
                                <p><?= $t->message ?></p>
                                <div class="testi-meta">
                                    <?= $t->customer_name ?>
                                    <span><?= $t->laundry_name ?></span>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
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
    $(function() {
      $("#side-navigation").tabs({
        show: {
          effect: "fade",
          duration: 400
        }
      });
    });
  </script>
</body>

</html>