<?php

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = $_POST['Email'];
      $password = $_POST['Password'];
      $password = md5($password);

      $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

      $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND user_type = 3 AND is_active = 1";
      $result = $mysqli->query($query);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        //  session_register("myusername");
         $_SESSION['login_user'] = $email;
         
         header("location: /techjob/?c=Home&a=Admin");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="Assets/login/css/main.css">
</head>
<body>
    <span class="bg"></span>
    <div class="wrapper">
        <div class="left">
            <a class="left__title" href="#" target="_blank"><img src="Assets/login/assets/google.svg" alt="">Đăng nhập với Google</a>
            <span>or</span>
            <form method="POST" id="registration">
                <div class="left__input">
                    <label for="email">Email</label>
                    <input id="email" name="Email" type="text" placeholder="Nhập email của bạn">
                </div>

                <div class="left__input">
                    <label for="password">Mật khẩu</label>
                    <input id="password" name="Password" type="password" placeholder="Mật khẩu">
                </div>

                <div class="left__question">
                    <div class="left__remember">
                        <input type="checkbox" id="check" name="remember">
                        <label for="check"></label>
                        <p>Nhớ tôi</p>
                    </div>
                    <a href="#" class="left__forgot">Quên mật khẩu ?</a>
                </div>

                <button class="btn">Đăng nhập</button>

                <p class="left__text">Không có tài khoản? <a href="#" target="_blank">Đăng ký</a></p>
            </form>
        </div>

        <div class="right">
            <div class="right__text">
                <div class="right__title">
                    <img src="Assets/login/assets/development.svg" alt=""> Phát triển
                </div>
                <p class="right__desc">
                    Hệ thống thiết kế hiện đại và sạch sẽ để phát triển giao diện web nhanh và mạnh mẽ.
                </p>
            </div>

            <div class="right__text">
                <div class="right__title">
                    <img src="Assets/login/assets/features.svg" alt=""> Đặc trưng
                </div>
                <p class="right__desc">
                    Hệ thống thiết kế hiện đại và sạch sẽ để phát triển giao diện web nhanh và mạnh mẽ.
                </p>
            </div>

            <div class="right__text">
                <div class="right__title">
                    <img src="Assets/login/assets/update.svg" alt=""> Phát triển
                </div>
                <p class="right__desc">
                    Hệ thống thiết kế hiện đại và sạch sẽ để phát triển giao diện web nhanh và mạnh mẽ.
                </p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#registration").validate({
            // Specify validation rules
            rules: {
                Email: {
                    required: true,
                    email: true
                },
                Password: {
                    required: true,
                    minlength: 3
                },

            },
            messages: {
                Password: {
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
 #registration label.error { clear: both; top: 100%; display: inline-block; padding: 0 5px; font-size: .93em; line-height: 1.75em; margin: -2px 0 0 10px; color: #fff; background: #ff4e4e; } #registration input.error { border-color: red; }
</style>
</body>
</html>