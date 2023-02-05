
<!-- footer -->
<div class="container-fluid footer-wrap  clear-left clear-right">
  <div class="container footer">
    <div class="row">
      <div class="col-md-4 col-sm-8 col-12">
        <h2 class="footer-heading">
          <span>About</span>
        </h2>
        <p class="footer-content">
          Chu Văn Nam - Phạm Lâm Thành Phát - Tạ Minh Đăng
        </p>
        <ul class="footer-contact">
          <li>
            <a href="#">
              <i class="fa fa-phone fticn"></i> 0983244336
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-envelope fticn"></i>
              chunam47@gmail.com
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-map-marker fticn"></i>
              225 Chu Văn An - P26 - Bình Thạnh - Hồ Chí Minh
            </a>
          </li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-4 col-12">
        <h2 class="footer-heading">
          <span>Ngôn ngữ nổi bật</span>
        </h2>
        <ul class="footer-list">
          <li><a href="#">Javascript</a></li>
          <li><a href="#">Java</a></li>
          <li><a href="#">Frontend</a></li>
          <li><a href="#">SQL Server</a></li>
          <li><a href="#">.NET</a></li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-6 col-12">
        <h2 class="footer-heading">
          <span>Tất cả ngành nghề</span>
        </h2>
        <ul class="footer-list">
          <li><a href="#">Lập trình viên</a></li>
          <li><a href="#">Kiểm thử phần mềm</a></li>
          <li><a href="#">Quản lý dự án</a></li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-12 col-12">
        <h2 class="footer-heading">
          <span>Tất cả tỉnh thành</span>
        </h2>
        <ul class="footer-list">
          <li><a href="#">Hồ Chính Minh</a></li>
          <li><a href="#">Hà Nội</a></li>
          <li><a href="#">Đà Nẵng</a></li>
          <li><a href="#">Buôn Ma Thuột</a></li>
        </ul>
      </div>


    </div>
  </div>
</div>

<footer class="container-fluid copyright-wrap">
  <div class="container copyright">
    <p class="copyright-content">
      Copyright © 2021 <a href="index.php"> Tech<b>Job</b></a>. Design By <a href="https://www.facebook.com/Namcoii2302"> Nam Còii </a>
    </p>
  </div>
</footer>


<!-- (end) footer -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="Assets/client/js/readmore.js"></script>
    <script type="text/javascript">
      $('.catelog-list').readmore({
        speed: 75,
        maxHeight: 150,
        moreLink: '<a href="#">Xem thêm<i class="fa fa-angle-down pl-2"></i></a>',
        lessLink: '<a href="#">Rút gọn<i class="fa fa-angle-up pl-2"></i></a>'
      });
    </script>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="Assets/client/js/jquery-3.4.1.slim.min.js"></script>
    <script src="Assets/client/js/popper.min.js"></script>
    <script src="Assets/client/js/bootstrap.min.js"></script>
    <script src="Assets/client/js/select2.min.js"></script>
    <script src="Assets/client/js/jobdata.js"></script>

    <!-- <script type="text/javascript" src="js/pagination.js"></script> -->
    <!-- Owl Stylesheets Javascript -->
    <script src="Assets/client/js/owlcarousel/owl.carousel.js"></script>
    <!-- Read More Plugin -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<?php
    if(isset($_COOKIE['status'])) { ?>
        <script>
        swal({
            title: "<?php echo $_COOKIE['status']; ?>",
            icon: "<?php echo $_COOKIE['status_code']; ?>",
        });
        </script>
    <?php 
        setcookie("status", "", time() - 3600);
        setcookie("status_code", "", time() - 3600);
        } 
    ?>
   

</body>
</html>