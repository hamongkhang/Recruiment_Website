<?php
      if(!isset($_SESSION)) 
      { 
          session_start(); 
      } 
      if(isset($_SESSION['login_user'])){
      $user = $_SESSION['login_user']; 
      $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

      $query = "SELECT users.full_name, users.id FROM users WHERE email = '$user'";
      $result = $mysqli->query($query);
      $data = $result->fetch_all();
      $user_full_name = $data[0];
   } ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HMKTECH</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Roboto Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">

  <!-- bootstrap css -->
  <link rel="stylesheet" type="text/css" href="Assets/client/css/bootstrap.min.css">



  <!-- Font Awesome -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- select 2 css -->
  <link rel="stylesheet" href="Assets/client/css/select2.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="Assets/client/css/owlcarousel/owl.carousel.min.css">
  <link rel="stylesheet" href="Assets/client/css/owlcarousel/owl.theme.default.min.css">
   <!-- main css -->
  <link rel="stylesheet" type="text/css" href="Assets/client/css/style.css"> 
</head>
<body>
<!-- main nav -->
<div class="container-fluid fluid-nav another-page" style="margin-bottom: 0px;">
  <div class="container cnt-tnar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light tjnav-bar">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <a href="index.php" class="nav-logo">
    <img src="Assets/client/img/techjobs_bgw.png">
  </a>
  <button class="navbar-toggler tnavbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <!-- <span class="navbar-toggler-icon"></span> -->
    <i class="fa fa-bars icn-res" aria-hidden="true"></i>

  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto tnav-left tn-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?c=Job&a=ListJobs">Việc Làm IT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.google.com/">Tin Tức</a>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto my-2 my-lg-0 tnav-right tn-nav">
      <?php if(isset($_SESSION['login_user'])){ ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=$user_full_name[0]?>
        </a>
        <div class="dropdown-menu tdropdown" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="?c=Job&a=ListMessages">Tin nhắn</a>
        <a class="dropdown-item" href="?c=User&a=Profile&id=<?=$user_full_name[1]?>">Trang cá nhân</a>
          <a class="dropdown-item" href="?c=Job&a=ListSavedJob">Công việc đã lưu</a>
          <a class="dropdown-item" href="?c=Job&a=ListCandidateApply">Công việc đã ứng tuyển</a>
          <a class="dropdown-item" href="?c=Job&a=ListClientFeedback">Bình luận</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?c=User&a=DangXuat">Đăng Xuất</a>
        </div>
      </li>
        <?php } else if(!isset($_SESSION['login_user'])){  ?>
      <li class="nav-item">
        <a class="nav-link" href="?c=User&a=DangKyUser">Đăng Ký</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?c=User&a=DangNhapUser">Đăng Nhập</a>
      </li>
      <?php }  ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          VI
        </a>
        <div class="dropdown-menu tdropdown" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">English</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link btn-employers" href="?c=User&a=SignIn" tabindex="-1" aria-disabled="true" style="color: #fff!important">Nhà Tuyển Dụng</a>
      </li>
    </ul>
  </div>
</nav>
  </div>
</div>
<!-- (end) main nav -->

<div class="clearfix"></div>