<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT P_no FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		if(empty($mypassword)|| empty($myusername)){
         $error="Please fill all the fields required";
      }
      else{
      if($count == 1) {
        // session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: home.php");
      }else {
         $error = "Your Login Username or Password is invalid";
         
      } }
   }
?>
<!DOCTYPE html>
<html>


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forms</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styless.css" rel="stylesheet">


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
   <div id="heade">
       <span style="padding: 30px 500px;"><img src="images/logo.png"></span>
   </div>
   
   <div class="row">
      <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
         <div class="login-panel panel panel-default">
            <div class="panel-heading" style="height:90px; background-color:#fff;">Log in<br><span style="font-size:12px;color:red;"><?php echo $error; ?></span></div>
            <div class="panel-body">
               <form role="form" action="login.php" method="post">
                  <fieldset>
                     <div class="form-group">
                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
                     </div>
                     <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                     </div>
                     <div class="checkbox">
                        <label>
                           <input name="remember" type="checkbox" value="Remember Me">Remember Me
                        </label>
                     </div>

                     <button type="submit" class="btn btn-primary">Login</button>
                  </fieldset>
               </form>
            </div>
            
         </div>
         <div class="panel-heading" style="height:100px; background-color:#fff;">
               <Label style="float:right;"><span style="font-size:10px;">Admin Login</span></label><br>
               <a href="index.html" class="btn btn-primary" style="float:right;margin-left:300px;">Login</a>
            </div>
      </div><!-- /.col-->
   </div><!-- /.row --> 
   
      

   <script src="js/jquery-1.11.1.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/chart.min.js"></script>
   <script src="js/chart-data.js"></script>
   <script src="js/easypiechart.js"></script>
   <script src="js/easypiechart-data.js"></script>
   <script src="js/bootstrap-datepicker.js"></script>
   <script>
      !function ($) {
         $(document).on("click","ul.nav li.parent > a > span.icon", function(){       
            $(this).find('em:first').toggleClass("glyphicon-minus");   
         }); 
         $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
      }(window.jQuery);

      $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
      })
      $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
      })
   </script>   
</body>



</html>
