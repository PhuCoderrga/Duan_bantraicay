<?php
	session_start();
	include("class/config.php");
	if(isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['ten']))
	{
		header('location:index.php');
	}
	else
	{
	include('class/clslogin.php');
	$p = new login();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng Nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="admin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="admin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/css/util.css">
	<link rel="stylesheet" type="text/css" href="admin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="admin/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title">
						<b>Đăng Nhập</b>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "<?php echo 'Phải có vd: abc@gmail.com' ?>">
						<input class="input100" type="text" name="email" placeholder="Tài Khoản">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "<?php echo 'Không được để trống' ?>">
						<input class="input100" type="password" name="password" placeholder="Mật Khẩu">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                   	<?php
						 switch($_POST['btn_submit'])
						  {
							case 'Đăng nhập':
							{
								$email = $_POST["email"];
								$password = $_POST["password"];
									if($p->mylogin($email,$password)==1)
									{
										header('location:index.php');
									}
									else
									{
										echo 'Đăng Nhập Không Thành Công';
									}
									break;
								}
						 }

				 	 ?>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" id="btn_submit" name="btn_submit" value="Đăng nhập">
							<b>Đăng Nhập</b>
						</button>
					</div>
					<br><br>
    				<div class="text-center p-t-120">
                    
						<a class="txt2" href="signup.php">
							Tạo Tài Khoản Mới
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="admin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/vendor/bootstrap/js/popper.js"></script>
	<script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="admin/js/main.js"></script>
</body>
</html>