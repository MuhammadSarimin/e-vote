<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="assets/img/dolanan2.png" sizes="16x16"> 
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>E-Vote | UMRAH</title>
  </head>

<header>
  <div class="container header inner">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= base_url()?>">
          <img src="assets/img/logo1.jpg">
                </a>
        </div>
      </div>
      </nav>
  </div>
</header>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<?php
  echo form_open('autentikasi/cek_login');
?>
<section id="home">
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <div class="container">
<div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
       <div class="panel-heading clearfix">
          <h3 class="panel-title">Halaman Login</h3>
        </div>
        <div class="panel-body">
          <form role="form">
            <div class="form-group">
            <p class="login-box-msg text-center">Masukkan user dan password yang telah diberikan untuk mengakses sistem ini.</p>
              <input type="username" class="form-control" placeholder="Username" name="nim">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="pass">
            </div>

            <div class="col-xs-14">
          <button type='submit' name='submit' class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
          </form>
        </div><!--/panel-body-->
      </div>
    </div>
    <?php
        //include('chart.php');
    ?>
  </div>
</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->

    </div>
</section>

<footer class="footer-basic-centered">
            <p class="footer-company-name">&copy; Copyright 2017 Computer Cyber Study Club. All Right Reserved</p>
            </footer>

</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</html>