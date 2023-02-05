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
      $user_id = $data[0];
   }
?>
 <!-- Side bar -->
     <div class="col-md-4 col-sm-12 col-12 sbwrap">


        <div class="block-sidebar" style="margin-bottom: 20px;">
   <header>
      <h3 class="title-sidebar font-roboto bg-primary">
         Trung tâm quản lý
      </h3>
   </header>
   <div class="content-sidebar menu-trung-tam-ql menu-ql-employer">
      <h3 class="menu-ql-ntv">
         Quản lý tài khoản
      </h3>
      <ul>
         <li>
            <a href="#">
            Tài khoản
            </a>
         </li>
         <li>
            <a href="#">
            Giấy phép kinh doanh
            </a>
         </li>
      </ul>
      <h3 class="menu-ql-ntv">
         Quản lý tin tức 
      </h3>
      <ul>
         <li>
            <a href="?c=Post&a=Index">
            Danh sách tin tức
            </a>
         </li>
         <li>
            <a href="?c=Post&a=ListComments&id=<?= $user_id[1] ?>" target="_blank">
            Quản lý bình luận
            </a>
         </li>
         <li>
            <a href="?c=Post&a=ListReports&id=<?= $user_id[1] ?>" target="_blank">
            Quản lý các báo cáo
            </a>
         </li>
      </ul>
      <h3 class="menu-ql-ntv">
         Quản lý tin tuyển dụng
      </h3>
      <ul>
         <li>
            <a href="?c=Job&a=Create">
            Đăng tin tuyển dụng
            </a>
         </li>
         <li>
            <a href="?c=Job&a=Index">
            Danh sách tin tuyển dụng
            </a>
         </li>
         <li>
            <a href="?c=Job&a=ListFeedback">
            Bình luận về tin tuyển dụng
            </a>
         </li>
      </ul>
      <h3 class="menu-ql-ntv">
         Quản lý ứng viên
      </h3>
      <ul>
         <li>
            <a href="#">
            Tìm kiếm hồ sơ
            </a>
         </li>
         <li>
            <a href="#">
            Hồ sơ đã lưu
            </a>
         </li>
         <li>
            <a href="?c=Candidate&a=ManageCandidate">
            Hồ sơ đã ứng tuyển
            </a>
         </li>
         <li>
            <a href="#" title="Thông báo hồ sơ phù hợp">
            Thông báo hồ sơ phù hợp
            </a>
         </li>
      </ul>
      <h3 class="menu-ql-ntv">
         Hỗ trợ và thông báo
      </h3>
      <ul>
         <li>
            <a href="#" title="Gửi yêu cầu đến ban quản trị">
            Gửi yêu cầu đến ban quản trị
            </a>
         </li>
         <li>
            <a href="#" title="Ban quản trị thông báo">
            Ban quản trị thông báo
            </a>
         </li>
         <li>
            <a href="#" title="Hướng dẫn thao tác">
            Hướng dẫn thao tác
            </a>
         </li>
         <li>
            <a href="#" target="_blank">
            <span>Thông tin thanh toán</span>
            </a>
         </li>
         <li>
            <a target="_blank" href="#">
            <span>Cổng tra cứu lương</span>
            </a>
         </li>
         <li>
            <a target="_blank" href="#">
            <span> Cẩm nang tuyển dụng</span>
            </a>
         </li>
      </ul>
      <ul>
         <li class="logout">
            <a href="#" title="Đăng xuất">
            Đăng xuất
            </a>
         </li>
      </ul>
   </div>
</div>
      </div>
    </div>
  </div>
</div>

<!-- (end) published recuitment -->

<div class="clearfix"></div>





<!-- job support -->
<div class="container-fluid job-support-wrapper">
 <div class="container-fluid job-support-wrap">
  <div class="container job-support">
    <div class="row">
      <div class="col-md-6 col-sm-12 col-12">
        <ul class="spp-list">
          <li>
            <span><i class="fa fa-question-circle pr-2 icsp"></i>Hỗ trợ nhà tuyển dụng:</span>
          </li>
          <li>
            <span><i class="fa fa-phone pr-2 icsp"></i>0123.456.789</span>
          </li>
        </ul>
      </div>
      <div class="col-md-6 col-sm-12 col-12">
        <div class="newsletter">
            <span class="txt6">Đăng ký nhận bản tin việc làm</span>
            <div class="input-group frm1">
              <input type="text" placeholder="Nhập email của bạn" class="newsletter-email form-control">
              <a href="#" class="input-group-addon"><i class="fa fa-lg fa-envelope-o colorb"></i></a>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- (end) job support -->