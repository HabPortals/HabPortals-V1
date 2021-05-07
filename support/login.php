<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project Athena - Team Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  </head>
  <body>
    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="img/athena.png" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">Project Athena - Support Team</h1>
           
            <p class="text-muted">If you do not have an account, contact the Athena Admin for your account process</p>

<div id="server-results"></div>
            <form id="loginForm" action="inc/userlogin.php" method='post' class="mt-4">
              <div class="form-group mb-4">
                <input type="text" name="username" placeholder="Username" class="form-control border-0 shadow form-control-lg">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="password" placeholder="Password" class="form-control border-0 shadow form-control-lg text-violet">
              </div>
                        <button type="submit" class="btn btn-primary shadow px-5">Log in</button>
		
            </form>
          </div>
        </div>
        <p class="mt-5 mb-0 text-gray-400 text-center">HabboFests &copy; 2021 - Project Athena<br>
	<a href="https://twitter.com/HabboFests" target="_blank" style="color:grey;"><i class="fab fa-twitter"></i></a>
	<a href="https://discord.gg/JDuepfv8DB" target="_blank" style="color:grey;"><i class="fab fa-discord"></i></a>

</p>
             </div>
    </div>
    <!-- JavaScript files-->
    <script type='text/javascript'>
        $('#loginForm').submit(function(event){
            event.preventDefault(); //prevent default action
            var post_url = $(this).attr('action'); //get form action url
            var form_data = $(this).serialize(); //Encode form elements for submission

            $.ajax({
                url : post_url,
                type: 'post',
                data : form_data
            }).done(function(response){ //
                $('#server-results').html(response);

            });
        });
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>