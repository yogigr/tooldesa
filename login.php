
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tool Desa | Login</title>
    <link href="style.css" rel="stylesheet">
    <link rel="icon" href="assets/images/pavicon.ico" type="image/gif">
  </head>
  <body>
    <div id="login-container" class="container-fluid">
      

      <div id="login-form" class="col-md-4 col-md-offset-4 col-xs-12 col-sm-12">
        <div id="login-form-header" class="col-md-12">
          <h4 class="col-md-6">Tool Desa</h4>
          <h4 class="col-md-6 text-right">Login</h4>
        </div>
        <div id="login-form-content" class="col-md-12 col-xs-12 col-sm-12">
          <h4 class="text-center">Selamat <span class="muda"><strong>Datang</strong></span></h4>
          <form class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12" method="post" action="index.php">
            <div class="input-group-custom col-md-12 col-xs-12 col-sm-12">
              <label><span class="muda"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span></label>&nbsp;&nbsp;
              <input type="text" name="username" placeholder="Username" class="custom-input">
            </div>
            <div class="input-group-custom col-md-12 col-xs-12 col-sm-12">
              <label><span class="muda"><i class="fa fa-key fa-2x" aria-hidden="true"></i></span></label>&nbsp;
              <input type="password" name="password" placeholder="Password" class="custom-input">
            </div>
            <div class="clear"></div>
            <button type="submit" class="btn btn-block btn-login">Login</button>  
      
          </form>
        </div>
      </div>


    </div>
    <script src="assets/bootstrap/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>