<?php  

function display_header($title)
{
	?>
	<!DOCTYPE html>
	<html lang="en">
	  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title><?php echo "Tool Desa | ".$title; ?></title>
	    <link href="style.css" rel="stylesheet">
	    <script src="assets/bootstrap/js/jquery.min.js"></script>
	    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<!--datepicker-->
		<link href="assets/datepicker/jquery-ui.css" rel="stylesheet">
		<link rel="icon" href="assets/images/pavicon.ico" type="image/gif">
	  </head>
	  <body>
	    <div id="container" class="container-fluid">

	<?php
}
function display_sidebar()
{
	?>
	<!--sidebar -->
      <div id="sidebar" class="col-md-2 col-xs-12 col-sm-12">
        <div id="sidebar-header" class="col-md-12 col-xs-12 col-sm-12">
          <h3 class="text-center"><a href="index.php"><i class="fa fa-globe muda" aria-hidden="true"></i>&nbsp;<strong>Tool Desa</strong></a></h3>
        </div>
        <div id="sidebar-menu" class="col-md-12 col-xs-12 col-sm-12">
          <a href="index.php" class="col-md-12 col-xs-12 col-sm-12 each-menu"><i class="fa fa-home muda" aria-hidden="true"></i>&nbsp;&nbsp;Beranda</a>
          <a href="?page1=pbbdesa" class="col-md-12 col-xs-12 col-sm-12 each-menu"><i class="fa fa-tasks muda" aria-hidden="true"></i>&nbsp;&nbsp;PBB Desa</a>
          <a href="?page1=formulir" class="col-md-12 col-xs-12 col-sm-12 each-menu"><i class="fa fa-check-square-o muda" aria-hidden="true"></i>&nbsp;&nbsp;Formulir</a>
          <a href="?page1=info" class="col-md-12 col-xs-12 col-sm-12 each-menu"><i class="fa fa-info-circle muda"></i>&nbsp;&nbsp;Info</a>
          <a href="logout.php" class="col-md-12 col-xs-12 col-sm-12 each-menu"><i class="fa fa-sign-out muda" aria-hidden="true"></i>&nbsp;&nbsp;Logout</a>
        </div>
      </div>
      <!--/sidebar -->

	<?php
}
function display_content($title, $titlelink="", $subtitle="")
{
	?>
	<!--content-->
      <div id="content" class="col-md-10 col-xs-12 col-sm-12">
        <div id="content-header" class="col-md-12 col-xs-12 col-sm-12">
        	<?php
        	if (($titlelink)&&($subtitle)) {
        		?>
        		<h4 class="col-md-9 col-xs-12 col-sm-12"><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?php echo $titlelink; ?>"><?php echo $title; ?></a> <i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $subtitle; ?></h4>
        		<?php
        	} else {
        		?>
        		<h4 class="col-md-9 col-xs-12 col-sm-12"><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $title; ?></h4>
        		<?php
        	}

        	?>
          <p class="col-md-3 col-xs-12 col-sm-12">Halaman Admin Tool Desa</p>
        </div> 
        <div id="content-content" class="col-md-12 col-xs-12 col-sm-12">
	<?php
}
function display_footer()
{
	?>	
		</div> <!--/content-content-->     
	      </div>
	      <!--/content-->

	    </div> <!--container-->
	    
		<!--datepicker-->
		
		<script src="assets/datepicker/jquery-ui.js"></script>
		<script src="assets/datepicker/datepicker.js"></script>
	  </body>
	</html>
	<?php
}
function alert_gagal($message)
{
	?>
	<div class="alert alert-danger" role="alert"><?php echo $message; ?></div>
	<?php
}
function alert_sukses($message)
{
	?>
	<div class="alert alert-success" role="alert"><?php echo $message; ?></div>
	<?php
}



?>