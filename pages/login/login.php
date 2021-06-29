<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Private Office | Bluefox International</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="../../dist/img/logo.png" width="100px">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <div id="error" style="margin-top: 10px"></div>
      <form method="post" id="login-form">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="user_email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      <div class="social-auth-links text-center mt-2 mb-3">
        <button class="btn btn-block btn-danger" name="btn-login" id="btn-login">
           Sign in
        </button>
      </div>
  </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    $('document').ready(function()
    {
         /* validation */
      $("#login-form").validate({
          rules:
               {
               password:
                  {
                      required: true,
                  },
               user_email:
                  {
                      required: true,
                      email: true
                  },
                },
          messages:
                {
                password:{
                          required: "please enter your password"
                         },
                user_email: "please enter your email address",
              },
        submitHandler: submitForm
      });

       function submitForm()
       {
       var data = $("#login-form").serialize();

       $.ajax({

       type : 'POST',
       url  : '../../proses/login_proses.php',
       data : data,
       beforeSend: function()
       {
        $("#error").fadeOut();
        $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
       },
       success :  function(response)
          {
         if(response == "ok"){
           setTimeout(' window.location.href = "../../index.php?mod=home"; ',4000);
         }
         else{
          $("#error").fadeIn(1000, function(){
          $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   alamat email atau password salah!.</div>');
               $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span>   Sign In');

           });
          }
         }
       });
        return false;
      }
    });
</script>
</body>
</html>
