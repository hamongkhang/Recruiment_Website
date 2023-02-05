<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register - HMKTECH</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Roboto Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="Assets/client/css/bootstrap.min.css">

	<!-- main css -->
	<link rel="stylesheet" type="text/css" href="Assets/client/css/style.css">

</head>
<body>
<div class="container-fluid login-fluid clear-left clear-right">
	<div class="login-container">
		<!-- login header -->
		<div class="login-header">
			<div class="w-login m-auto">
				<div class="login-logo">
					<h3>
						<!-- <a href="#">Tech<span class="txb-logo">Jobs.</span></a> -->
						<a href="#">
							<img src="Assets/client/img/techjobs_bgw.png" alt="HMKTECH">
						</a>
					</h3>
					<span class="login-breadcrumb"><em>/</em> Register as Employer</span>
				</div>
				<div class="login-right">
					<a href="#" class="btn btn-return">Return Home</a>
				</div>
			</div>
		</div>
		<!-- (end) login header -->

		<div class="clearfix"></div>

		<div class="padding-top-90"></div>
		
		<!-- login main -->
		<div class="login-main">
			<div class="w-login m-auto">
				<div class="row">
					<!-- login main descriptions -->
					<div class="col-md-6 col-sm-12 col-12 login-main-left">
						<img src="Assets/client/img/banner-login.png">
					</div>
					<!-- login main form -->
					<div class="col-md-6 col-sm-12 col-12 login-main-right">
						
						<form class="login-form reg-form" method="POST" id="registration" action="?c=User&a=ResponseSignUp">
							<div class="login-main-header">
								<h3>Đăng Ký Tài Khoản Nhà Tuyển Dụng</h3>
							</div>
						<div class="reg-info">
							<h3>Tài khoản</h3>
						</div>
						<div class="d-flex">
                        <div class="input-div one w-100 mr-1">
		           		   <div class="div lg-lable">
		           		   		<h5>First Name<span class="req">*</span></h5>
		           		   		<input type="text" name="FirstName" class="input form-control-lgin">
		           		   </div>
                           </div>
                           <div class="input-div one w-100 ml-1">
		           		   <div class="div lg-lable">
		           		   		<h5>Last Name<span class="req">*</span></h5>
		           		   		<input type="text" name="LastName" class="input form-control-lgin">
		           		   </div>
		           		</div>
                        </div>
						  <div class="input-div one">
		           		   <div class="div lg-lable">
		           		   		<h5>Địa Chỉ Email<span class="req">*</span></h5>
		           		   		<input type="text" name="Email" class="input form-control-lgin">
		           		   </div>
		           		</div>
		           		<div class="input-div one">
		           		   <div class="div lg-lable">
		           		    	<h5>Mật khẩu<span class="req">*</span></h5>
		           		    	<input type="password" name="Password" class="input form-control-lgin">
		            	   </div>
		            	</div>
		            	<div class="input-div one">
		           		   <div class="div lg-lable">
		           		    	<h5>Nhập Lại Mật khẩu<span class="req">*</span></h5>
		           		    	<input type="password" name="ConfirmPassword" class="input form-control-lgin">
		            	   </div>
		            	</div>
		            	<div class="reg-info">
							<h3>Công ty</h3>
						</div>
						 <div class="input-div one">
		           		   <div class="div lg-lable">
		           		   		<h5>Tên người liên hệ<span class="req">*</span></h5>
		           		   		<input type="text" name="ContactName" class="input form-control-lgin">
		           		   </div>
		           		</div>
		           	
		           		 <div class="input-div one">
		           		   <div class="div lg-lable">
		           		   		<h5>Tên công ty<span class="req">*</span></h5>
		           		   		<input type="text" name="CompanyName" class="input form-control-lgin">
		           		   </div>
		           		</div>
		           		 <div class="input-div one">
		           		   <div class="div lg-lable">
		           		   		<h5>Địa Chỉ Công Ty<span class="req">*</span></h5>
		           		   		<input type="text" name="CompanyAddress" class="input form-control-lgin">
		           		   </div>
		           		</div>
		           		<div class="input-div one">
		           		   <div class="div lg-lable">
								<select name="CompanyProvince" class="form-control recr_select_custom">
								<option value="0">-- Chọn Thành Phố -- </option>
								<?php 
							
									$i = 1;
									foreach ($data as $province) {
								?>
								
								<option value="<?= $province[0] ?>"><?= $province[1] ?></option>
								
								<?php
									$i++;
									}
								?>
								</select>
		           		   </div>
		           		</div>
						  <div class="form-group d-block frm-text">
						    <a href="#" class="fg-login d-inline-block"></a>
						    <a href="?c=User&a=SignIn" class="fg-login float-right d-inline-block">Bạn đã có tài khoản? Đăng Nhập</a>
						  </div>
						  <button type="submit" class="btn btn-primary float-right btn-login d-block w-100">Đăng Ký Nhà Tuyển Dụng</button>
						<div class="form-group d-block w-100 mt-5">
							<div class="text-or text-center">
								<span>Hoặc</span>
							</div>

							<div class="row">
								<div class="col-sm-6 col-12 pr-7">
									<button class="btn btn-secondary btn-login-facebook btnw w-100 float-left">
									<i class="fa fa-facebook" aria-hidden="true"></i>
									<span>Đăng nhập bằng Facebook</span>
							</button>
								</div>
								<div class="col-sm-6 col-12 pl-7">
									<button class="btn btn-secondary btn-login-google btnw w-100 float-left">
									<i class="fa fa-google" aria-hidden="true"></i>
									<span>Đăng nhập bằng Google</span>
								</button>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- (end) login main -->
	</div>
</div>
<footer class="login-footer">
		<div class="w-login m-auto">
			<div class="row">
				<!-- login footer left -->
				<div class="col-md-6 col-sm-12 col-12 login-footer-left">
					<div class="login-copyright">
						<p>Copyright © 2020 <a href="#"> HMKTECH</a>. All Rights Reserved.</p>
					</div>
				</div>
				<!-- login footer right -->
				<div class="col-md-6 col-sm-12 col-12 login-footer-right">
					<ul>
						<li><a href="#">Terms & Conditions</a></li>
						<li><a href="#">Privacy Policy</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="Assets/client/js/jquery-3.4.1.slim.min.js"></script>
    <script src="Assets/client/js/popper.min.js"></script>
    <script src="Assets/client/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="Assets/client/js/main.js"></script>
	<style>.recr_select_custom { font-size: 15px; color: #919191; font-family: 'Roboto', sans-serif; font-weight: 400; padding: 10px 7px; height: 46px; }</style>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#registration").validate({
            // Specify validation rules
            rules: {
                FirstName: "required",
                LastName: "required",
                Email: {
                    required: true,
                    email: true
                },
                Password: {
                    required: true,
                    minlength: 3
                },
                ConfirmPassword: {
                    required: true,
                    minlength: 3
                },
				ContactName: "required",
				CompanyName: "required",
				CompanyAddress: "required",
				CompanyProvince: "required",

            },
            messages: {
                FirstName: "Please enter your firstname",
                LastName: "Please enter your lastname",
                Password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                ConfirmPassword: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                Email: "Please enter a valid email address"
            },
            submitHandler: function(form) {
                form.submit();
            }

            
        });
    });
    </script>
<style>
    #registration label.error:after { content: " "; position: absolute; left: 5px; bottom: 100%; width: 0; height: 0; border-bottom: 10px solid #ff4e4e; border-right: 10px solid transparent; } #registration label.error { clear: both; top: 100%; position: absolute; display: inline-block; padding: 0 5px; font-size: .93em; line-height: 1.75em; margin: -2px 0 0 10px; color: #fff; background: #ff4e4e; } #registration input.error { border-color: red; }
</style>
</body>
</html>