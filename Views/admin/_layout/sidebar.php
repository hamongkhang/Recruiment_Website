<?php
   if(!isset($_SESSION)) 
   { 
	   session_start(); 
   } 
      if(isset($_SESSION['login_user'])){
      $user = $_SESSION['login_user']; 
      $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

      $query = "SELECT users.full_name, users.* FROM users WHERE email = '$user'";
      $result = $mysqli->query($query);
      $data = $result->fetch_all();
      $user_full_name = $data[0];
      $us = $data[0];

	  // Kiểm tra quyền
	  $queryCheckRole = "SELECT * FROM userrole WHERE user_id = $us[1] AND role_id = 2";
	  $resultCheckRole = $mysqli->query($queryCheckRole);
      $dataCheckRole = $resultCheckRole->fetch_all();
      

	  if(mysqli_num_rows($resultCheckRole) <= 0) {
		header("location: index.php?c=User&a=AdminDenied");
	  } else {
		$checkRole = $dataCheckRole[0];
	  }
   }

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>TechJob Dashboard</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="Assets/admin/ablepro/dist/assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="Assets/admin/ablepro/dist/assets/css/style.css">
    
    

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="Assets/upload/user_avatar/<?=$us[12]?>" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details"><?=$user_full_name[0]?> <i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="?c=User&a=AdminProfile&id=<?=$user_full_name[1]?>"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
							<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
							<li class="list-group-item"><a href="?c=User&a=DangXuat"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
					    <label>Management</label>
					</li>
					<li class="nav-item">
					    <a href="?c=Home&a=Admin" class="nav-link "><span class="pcoded-micon">
					    	<i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Component</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="?c=Career&a=Index">Careers</a></li>
					        <li><a href="?c=Role&a=Index">Roles</a></li>
					        <li><a href="?c=Post&a=ListPosts">Post</a></li>
							<li><a href="?c=Post&a=ListAdminReports">List Reports</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Users & Roles</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="?c=User&a=ListUser">Users</a></li>
					        <li><a href="?c=Role&a=Index">Roles</a></li>
					    </ul>
					</li>
					
				</ul>
		
				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
