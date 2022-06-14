<?php
	include("class/config.php");
	include('class/clssignup.php');
	$p = new login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng Ký Tài Khoản</title>
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
						<b>Đăng Ký</b>
					</span>
                    
					<div class="wrap-input100 validate-input" data-validate = "<?php echo 'không được để trống' ?>">
						<input class="input100" type="text" name="ten" placeholder="Tên Người Dùng">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "<?php echo 'không được để trống' ?>">
						<input class="input100" type="text" name="hodem" placeholder="Họ Đệm">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
                    
					<div class="wrap-input100 validate-input" data-validate = "<?php echo 'Phải có vd: abc@gmail.com' ?>">
						<input class="input100" type="text" name="email" placeholder="Tài Khoản">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>                                     

					<div class="wrap-input100 validate-input" data-validate = "<?php echo 'không được để trống' ?>">
						<input class="input100" type="password" name="password" placeholder="Mật Khẩu">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "<?php echo 'không được để trống' ?>">
						<input class="input100" type="password" name="repassword" placeholder="Nhập Lại Mật Khẩu">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
				<?php
					switch($_POST['btn_submit'])
					{
						case 'Đăng nhập';
						{
							$ten=$_REQUEST['ten'];
							$hodem=$_REQUEST['hodem'];
							$email=$_REQUEST['email'];
							$password=$_REQUEST['password'];
							$repassword=$_REQUEST['repassword'];
							if($password != $repassword)
							{
								echo 'Mật khẩu nhập lại không trùng khớp';		
							}
							else
							{
								if($p->cruser($email,$password,$ten,$hodem)==1)
								{
									header('location:index.php');
								}
								else
								{
									echo 'Tạo tài khoản thất bại';
								}
								break;
							}
							
						}	
					}
				?>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn type="submit" id="btn_submit" name="btn_submit" value="Đăng nhập"">
                        	<b>Đăng Ký Tài Khoản</b>
						</button>
					</div>
                    
    				<div class="text-center p-t-1">
						<a class="txt2" href="Login.php">
							Bạn đã có tài khoản
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
                    
					<br><br>    
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