<?php $this->load->helper('url') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url() ?>res/assets/ico/favicon.png">

    <title>Sign in</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>res/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>res/assets/css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url() ?>res/assets/js/html5shiv.js"></script>
      <script src="<?php echo base_url() ?>res/assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      
    <div class="container">
        <?php 
            $attributes = array('class' => 'form-signin');
            echo form_open('login/logiraj', $attributes);
        ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" name="username" placeholder="User name" autofocus/>
        <input type="password" class="form-control" name="password" placeholder="Password"/>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"/> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>

