<?php $this->load->helper('url') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url() ?>res/assets/ico/favicon.png">

    <title><?php echo $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>res/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>res/assets/css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url() ?>res/assets/js/html5shiv.js"></script>
      <script src="<?php echo base_url() ?>res/assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() ?>index.php/pages/view"><div class="glyphicon glyphicon-tint"></div> Incident controller</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url() ?>index.php/pages/view">Home</a></li>
              <li><a href="<?php echo base_url() ?>index.php/login/index">Log in</a></li>
              <li><a href="<?php echo base_url() ?>index.php/korisnik/create">New User entry</a></li>
              <li><a href="<?php echo base_url() ?>index.php/incident/create">Manage Incidents</a></li>
            </ul>
          <?php if (!empty($this->session) && $this->session->userdata('logged_in')):?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('username') ?>&nbsp;<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/login/logout">Log out</a></li>
              </ul>
            </li>
          </ul>
          <?php endif; ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>

      <!-- Begin page content -->
      <div class="container">
