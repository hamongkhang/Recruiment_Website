<?php 
    require(ROOT. '/Views/recruitment/_layout/header.php');
?>

<?php
// Kiểm tra quyền
require(ROOT. '/Common/checkrole.php');
foreach($data_check_role as $userrole) {
  if($userrole[0] == "Recruitment") { ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<!-- published recuitment -->
<div class="container">
  <div class="tv-content-left">
    <div class="tv-profile-left">
      <div class="tv-published-recruitment bg-fc205c color-white text-center ph-20 pv-8">
        <a href="?c=Job&a=Create" class="color-white" style="color: white !important;">
          <p class="mb-5 fw-500">
            <img class="icon-flat" src="https://timviec.com.vn/icon-menu/upload-1.png"> Đăng tin tuyển dụng
          </p>
          <p class="mb-0 fs-13 font-italic">Cách nhanh nhất để tìm ứng viên
          </p>
        </a>
      </div>
      <div class="tv-profile-main text-center">
        <img class="tv-profile-img" src="Assets/upload/company_image/<?=$dataOfCompanyInfo[3]?>">
        <h2 class="tv-profile-name fs-16 mt-10"><?=$dataOfCompanyInfo[1]?>
        </h2>
      </div>
      <div class="tv-pro-nav-side-menu" style="">
        <div class="menu-list">
          <ul class="tv-pro-nav-menu list-unstyled text-left ps-container ps-theme-default ps-active-y" data-ps-id="b0985f30-527e-fae4-aa45-ed03f81550bc">
            <li class="active">
              <a href="?c=Home&a=Recruitment">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/setting.png"> Quản lý chung 
              </a>
            </li>
            <li class="">
              <a href="?c=Job&a=Create">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/upload.png"> Đăng tin tuyển dụng
              </a>
            </li>
            <li class="">
              <a href="?c=Job&a=Index">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/forms.png"> Tất cả tuyển dụng
              </a>
            </li>
            <li class="" id="tooltip_ung_vien">
              <a href="?c=Candidate&a=ManageCandidate" style="padding-left: 12px;">
                <i class="fas fa-users" style="margin-right: 6px;font-size: 18px;color: #666;">
                </i>Ứng viên
              </a>
            </li>
            <li class="">
              <a href="#">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/start.png"> Hồ sơ đã lưu
              </a>
            </li>
            <li class="">
              <a href="https://timviec.com.vn/nha-tuyen-dung/ho-so-da-ung-tuyen">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/resume.png"> Hồ sơ đã ứng tuyển
              </a>
            </li>
            <li class="">
              <a href="https://timviec.com.vn/nha-tuyen-dung/ho-so-da-xem">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/check.png"> Hồ sơ đã xem thông tin
              </a>
            </li>
            <li class="">
              <a href="https://timviec.com.vn/nha-tuyen-dung/quan-ly-dich-vu-va-dang-tin">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/system.png"> Quản lý dịch vụ
              </a>
            </li>
            <li class="">
              <a href="https://timviec.com.vn/nha-tuyen-dung/thong-bao-ho-so-phu-hop">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/notification.png"> Thông báo hồ sơ phù hợp
              </a>
            </li>
            <li class="">
              <a href="https://timviec.com.vn/nha-tuyen-dung/tin-nhan">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/email.png"> Tin nhắn
              </a>
            </li>
            <li class="">
              <a href="https://timviec.com.vn/nha-tuyen-dung/cap-nhat-thong-tin-cong-ty">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/work.png"> Thông tin công ty
              </a>
            </li>
            <li class="">
              <a href="https://timviec.com.vn/nha-tuyen-dung/giay-phep-kinh-doanh" style="padding-left: 12px;">
                <i class="far fa-file-certificate" style="margin-right: 6px;font-size: 18px;color: #666;">
                </i>Giấy phép kinh doanh
              </a>
            </li>
            <li class="">
              <a href="https://timviec.com.vn/nha-tuyen-dung/danh-sach-chien-dich">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/resume.png"> Danh sách chiến dịch
              </a>
            </li>
            <li class="">
              <a href="https://timviec.com.vn/nha-tuyen-dung/quan-ly-email">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/email.png"> Mẫu Email phỏng vấn
              </a>
            </li>
            <li class="">
              <a href="https://timviec.com.vn/nha-tuyen-dung/email-da-gui">
                <img class="icon-flat" src="https://timviec.com.vn/icon-menu/email.png"> Email đã gửi
              </a>
            </li>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -94.6px;">
              <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;">
              </div>
            </div>
            <div class="ps-scrollbar-y-rail" style="top: 97.6px; height: 658px; right: 3px;">
              <div class="ps-scrollbar-y" tabindex="0" style="top: 85px; height: 572px;">
              </div>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="tv-content-right">
    <div class="tv-profile-right">
      <!-- Top content -->
      <div class="tv-box-traffic">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-4">
            <a href="#">
              <div class="bg-white box_shadow pd-20 mb-20">
                <i class="fas fa-briefcase mr-10">
                </i>
                <span class="fs-24 fw-500">
                  <?php if($numJobPositions[0] != null) {echo $numJobPositions[0];} else { echo "0";} ?>
                </span>
                <p class="mb-0">Việc làm đã đăng
                </p>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4">
            <a href="#">
              <div class="bg-white box_shadow pd-20 mb-20">
                <i class="fas fa-file-signature mr-10">
                </i>
                <span class="fs-24 fw-500">
                <?php if($numJobApplier[0] != null) {echo $numJobApplier[0];} else { echo "0";} ?>
                </span>
                <p class="mb-0">Hồ sơ ứng tuyển
                </p>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4">
            <a href="#">
              <div class="bg-white box_shadow pd-20 mb-20">
                <i class="fas fa-newspaper mr-10">
                </i>
                <span class="fs-24 fw-500">
                <?php if($numOfPosts[0] != null) {echo $numOfPosts[0];} else { echo "0";} ?>
                </span>
                <p class="mb-0">Tin tức đã đăng
                </p>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4">
            <a href="#">
              <div class="bg-white box_shadow pd-20 mb-20">
                <i class="fas fa-eye mr-10">
                </i>
                <span class="fs-24 fw-500">
                <?php if($numOfPosts[0] != null) {echo $numOfPosts[0];} else { echo "0";} ?>
                </span>
                <p class="mb-0">Lượt tương tác trên việc làm
                </p>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="bg-white box_shadow pd-20 mb-20">
              <i class="fas fa-sync mr-10">
              </i>
              <span class="fs-24 fw-500">
              <?php if($numOfPostComments[0] != null) {echo $numOfPostComments[0];} else { echo "0";} ?>
              </span>
              <p class="mb-0">Lượt tương tác trên tin tức
              </p>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="bg-white box_shadow pd-20 mb-20">
              <i class="fas fa-file-signature mr-10">
              </i>
              <span class="fs-24 fw-500">
                0
              </span>
              <p class="mb-0">Lượt xem việc làm
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="tv-box-list-service">
        <div class="row">
          <div class="col-6">
            <h2 class="fs-18">Danh sách dịch vụ
            </h2>
            <div class="bg-white box_shadow" style="height: 235px;">
              <div class="text-center pd-20">
                <div class="mb-10 text-center">
                  <img src="https://timviec.com.vn/images/icon_not_service.png" width="200px" alt="images">
                </div>
                Quý khách chưa đăng ký gói dịch vụ nào.
                <br>
                <a href="#" target="_blank" style="color: blue">Click vào đây
                </a> để biết thêm chi tiết hoặc vui lòng liên hệ chuyên viên hỗ trợ, tư vấn.
              </div>
            </div>
          </div>
          <div class="col-6">
            <h2 class="fs-18">Xem hồ sơ
            </h2>
            <div class="table-responsive">
              <table class="table text-nowrap bg-white mb-0">
                <thead>
                  <tr class="bg-main color-white">
                    <th class="fw-500 fs-15 pv-8">Số hồ sơ đã xem
                    </th>
                    <th class="fw-500 fs-15 pv-8 text-center">Dịch vụ hồ sơ
                    </th>
                    <th class="fw-500 fs-15 pv-8 text-center">Dịch vụ đăng tin
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="text-center">
                        <a href="https://timviec.com.vn/nha-tuyen-dung/ho-so-da-xem" class="name-job-number color-main mt-8 mb-0 d-inline-block"> 0 
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="name-job-status mt-8 mb-0"> 0/0
                        </p>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="name-job-time mt-8 mb-0">0
                          /0
                        </p>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="banner mt-20">
              <a href="https://salary.timviec.com.vn/" target="_blank">
                <img src="https://timviec.com.vn/images/banner-ntd.jpg" alt="banner">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-20">
      </div>
      <div class="mb-20">
      </div>
      <div class="tv-box-latest-application">
        <a href="?c=Candidate&a=ManageCandidate" class="color-main float-right pt-10">Xem tất cả &gt;&gt;
        </a>
        <h2 class="fs-18">Hồ sơ ứng tuyển mới nhất
        </h2>
        <div class="table-responsive">
          <table class="table text-nowrap bg-white mb-0">
            <thead>
              <tr class="bg-main color-white">
                <th class="fw-500 fs-16 pv-8">Hồ sơ
                </th>
                <th class="fw-500 fs-16 pv-8 text-center">Vị trí ứng tuyển
                </th>
                <th class="fw-500 fs-1 pv-8 text-center">Ngày nộp
                </th>
              </tr>
            </thead>
            <tbody>
            <?php if($candidateData == null) { ?>
              <tr>
                <td class="no-data" colspan="3">
                  <div class="text-center">
                    <p class="fs-14">
                      <i style="color: #000">Không có dữ liệu phù hợp ...
                      </i>
                    </p>
                  </div>
                </td>
              </tr>
              <?php } else { 
                  foreach($candidateData as $candidate) {
              ?>
              <tr>
                <td><?=$candidate[5] ?></td>
                <td><?=$candidate[12] ?></td>
                <td><?=$candidate[9] ?></td>
              </tr>
              <?php } }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="mb-20">
      </div>
      <div class="modal fade" id="modal-btn-suitability-id-33869092" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 600px">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="text-center pd-20">
              <button type="button" class="close" data-dismiss="modal">×
              </button>
              <h2 class="fs-20 color-333 mb-10">
                Chi tiết mức độ phù hợp của ứng viên Trần Minh Đức
              </h2>
            </div>
            <div class="modal-body box-evaluate ph-40">
              <div class="row align-items-center">
                <div class="col-6">
                  <div class="box-chart">
                    <div class="chart" data-percent="41" data-scale-color="#ffb400">41%
                      <canvas height="287" width="287" style="height: 230px; width: 230px;">
                      </canvas>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="list-point-candi">
                    <ul class="list-unstyled">
                      <li>
                        <span>
                          <strong>1. 
                          </strong>
                          <span class="border-fc2e66">10/10
                          </span>
                          <label>Ngành nghề
                          </label>
                        </span>
                      </li>
                      <li>
                        <span>
                          <strong>2. 
                          </strong>
                          <span class="border-fc2e66">10/10
                          </span>
                          <label>Địa điểm
                          </label>
                        </span>
                      </li>
                      <li>
                        <span>
                          <strong>3. 
                          </strong>
                          <span class="border-fc2e66">10/10
                          </span>
                          <label>Vị trí ứng tuyển
                          </label>
                        </span>
                      </li>
                      <li>
                        <span>
                          <strong>4. 
                          </strong>
                          <span class="border-fc2e66">0/10
                          </span>
                          <label>Từ khóa
                          </label>
                        </span>
                      </li>
                      <li>
                        <span>
                          <strong>5. 
                          </strong>
                          <span class="border-fc2e66">10/15
                          </span>
                          <label>Năm kinh nghiệm
                          </label>
                        </span>
                      </li>
                      <li>
                        <span>
                          <strong>6. 
                          </strong>
                          <span class="border-fc2e66">0/5
                          </span>
                          <label>Hình thức làm việc
                          </label>
                        </span>
                      </li>
                      <li>
                        <span>
                          <strong>7. 
                          </strong>
                          <span class="border-fc2e66">0/10
                          </span>
                          <label>Lương
                          </label>
                        </span>
                      </li>
                      <li>
                        <span>
                          <strong>8. 
                          </strong>
                          <span class="border-fc2e66">0/10
                          </span>
                          <label>Điểm chuẩn CV
                          </label>
                        </span>
                      </li>
                      <li>
                        <span>
                          <strong>9. 
                          </strong>
                          <span class="border-fc2e66">1/20
                          </span>
                          <label>Kinh nghiệm làm việc
                          </label>
                        </span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<style>
.main-form input::-webkit-input-placeholder{color:rgba(25,25,25,.7)}.main-form input:-ms-input-placeholder{color:rgba(25,25,25,.7)}.main-form input::placeholder{color:rgba(25,25,25,.7)}.form-control{border-color:#ddd;background:#fff;border-radius:5px;height:40px;font-size:14px}.form-control:focus{background-color:#fff;border-color:#80bdff;outline:0;box-shadow:0 0 0 1px rgba(0,123,255,0.25)}.btn-block{border-radius:5px!important;height:41px!important;font-size:16px;line-height:16px}.btn{font-size:14px}.btn:hover{opacity:0.8}.btn.color-white:hover{color:#fff}#header-wrapper{box-shadow:0 1px 15px 1px rgba(0,0,0,0.04),0 1px 6px rgba(0,0,0,0.08);position:fixed;left:0;right:0;width:100%;z-index:999;background:#0091ce}.main-navbar{position:relative;z-index:10;height:56px;padding:0}.main-navbar h1{line-height:1;margin-bottom:0}.logo-navbar{width:110px}.main-navbar .nav-item{position:relative}.main-navbar .nav-item > a{padding:8px 20px 10px;font-size:14px;color:#fff;display:block;height:56px;font-weight:500;transition:none!important;text-transform:uppercase;line-height:44px;cursor:pointer}.main-navbar .nav-item.active > a{color:#fff;background:rgba(0,0,0,0.3)}.main-navbar .nav-item:hover > a{color:#fff}.main-navbar .nav-item .hs-sub-menu{display:none;top:50px;right:0;position:absolute;background:#fff;z-index:99;border-top:1px solid #ccc;box-shadow:1px 1px 1px 1px rgba(0,0,0,.08)}.has-sub-menu{position:relative}.main-navbar .nav-item.has-sub-menu .hs-sub-menu{min-width:230px}.main-navbar .nav-item.has-sub-menu .hs-sub-menu li{padding:10px 10px;border-bottom:1px solid #f1f1f1}.main-navbar .nav-item.has-sub-menu .hs-sub-menu li.background-read{background:#e5f4fa}.main-navbar .nav-item.has-sub-menu .hs-sub-menu li a{padding:5px 0}.main-navbar .nav-item.has-sub-menu .hs-sub-menu li a i{min-width:20px;display:inline-block}.main-navbar .nav-item.has-sub-menu .hs-sub-menu.hs-notification{width:350px}.main-navbar .nav-item.has-sub-menu .hs-sub-menu.hs-notification li{padding:10px 5px;border-bottom:1px solid #ddd}.main-navbar .nav-item.has-sub-menu .hs-sub-menu.hs-notification li:last-child{padding:1px}.tv-ringing-message-menu .tv-avatar-box{width:44px;height:44px;border-radius:50%;overflow:hidden;border:1px solid rgba(0,0,0,.15);min-width:44px;margin:0 10px}.tv-ringing-message-menu .tv-info-box{max-width:80%;display:inline-block}.tv-ringing-message-menu .tv-info-box p{margin-bottom:5px;color:#191919;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:block;max-width:100%}.tv-ringing-message-menu .tv-info-box .description{margin-bottom:0;color:#9398a1;font-size:13px}.tv-ringing-message-menu .tv-info-box .time{margin-bottom:0;color:#999;font-size:13px}.box-view-all{display:block;text-align:center;background:#ccc}.notification-number{position:absolute;font-size:10px;background:#ed145b;width:16px;height:16px;line-height:16px;text-align:center;border-radius:50%;color:#fff}.user-online{position:absolute;font-size:10px;background:#16d39a;width:10px;height:10px;text-align:center;border-radius:50%;color:#fff;bottom:8px;left:55px}.avatar-profile span{text-transform:none}.avatar img{border-radius:50%;width:35px;height:35px;margin-left:20px}.tv-content-left{width:230px;float:left}.tv-content-right{margin-left:calc(230px + 20px)}.tv-profile-left{position:relative;background:#fff;min-height:calc(100vh - 100px);height:100%;width:230px}.tv-pro-nav-side-menu.is_stuck{position:fixed!important;top:60px!important;width:100%}.tv-pro-nav-side-menu.is_stuck .menu-list{background:#fff}.tv-profile-main{padding:30px 20px}.tv-profile-img{width:100px;border-radius:50%}.progress{font-size:1rem;line-height:inherit;background-color:#fff;margin-top:7px}.profile-progress-bar{height:7px;background-color:#0091ce;border-radius:5px}.btn-refresh{background:#fc205c;color:#fff!important}.tv-pro-nav-menu{max-height:calc(100vh - 100px);position:relative}.tv-pro-nav-menu li{position:relative;display:block}.tv-pro-nav-menu li.active,.tv-pro-nav-menu li.nav-open{background:#f6f7fa}.tv-pro-nav-menu > li:hover{background:#f6f7fa}.tv-pro-nav-menu li.active:before,.tv-pro-nav-menu li.nav-open:before{content:"";position:absolute;left:0;top:0;border-left:3px solid #0091ce;height:38px}.tv-pro-nav-menu li span i{float:right}.tv-pro-nav-menu li .sub-menu,.tv-pro-nav-menu li .fa-chevron-up,.tv-pro-nav-menu li.nav-open .fa-chevron-down{display:none}.tv-pro-nav-menu li.nav-open .fa-chevron-up,.tv-pro-nav-menu li.nav-open .sub-menu{display:block}.tv-pro-nav-menu li a{padding:10px 15px 9px;font-size:15px;display:block}.tv-profile-right{}.tv-box-traffic i{float:left;font-size:20px;background:#ddd;border-radius:50%;width:50px;height:50px;line-height:50px;text-align:center;margin-top:1px}.tv-box-traffic .row > div:nth-child(1) i{background:#ffedd2;color:#feaa2f}.tv-box-traffic .row > div:nth-child(2) i{background:#ccf2f4;color:#01c0c8}.tv-box-traffic .row > div:nth-child(3) i{background:#ccf3e9;color:#00c292}.tv-box-traffic .row > div:nth-child(4) i{background:#eee8fa;color:#ab8ce4}.tv-box-traffic .row > div:nth-child(5) i{background:#e7ebcc;color:#afbc58}.tv-box-traffic .row > div:nth-child(6) i{background:#fed2de;color:#fc225e}.table-responsive tbody{color:#999999}.tv-box-search-uv-count{background:url("https://timviec.com.vn/images/bg-search-home.jpg");background-size:cover;padding:30px 20px}.counter{text-align:center;padding:10px 100px}.counter .box-count{background:#fea31e;border-radius:50%;width:130px;height:130px;padding:30px 10px;text-align:center;color:#fff}.counter .box-count .count-number{font-size:24px;font-weight:500}.form-search-uv-count{padding:20px;background:rgba(1,45,206,0.3)}.has-icon-position,.form-search-action .input-group{position:relative}.has-icon-position input,.form-search-action .input-group input{padding-left:30px}.has-icon-position i,.form-search-action .input-group i{position:absolute;left:10px;top:12px;z-index:99}.has-link a.active{color:#0091ce;text-decoration:underline}.name-info-job{max-width:400px}.name-info-job .name-job,.name-info-job .name-company,.name-info-uv p{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:block}.pagination-wrapper ul li{display:inline-block}.pagination-wrapper ul li:first-child span,.pagination-wrapper ul li:last-child span{border:1px solid #bcbcbc}.pagination-wrapper ul li span,.pagination-wrapper ul li a{border:1px solid #0091ce;width:32px;height:32px;border-radius:50%;display:inline-block;line-height:32px}.pagination-wrapper ul li span:hover,.pagination-wrapper ul li.active span,.pagination-wrapper ul li a:hover{background:#0091ce;color:#fff}.view-ntd span{width:60px;height:60px;text-align:center;background:#999999;color:#fff;border-radius:50%;padding-top:18%;display:inline-block;margin-right:10px}.select2-container--default .select2-selection--multiple:before{content:"";display:block;position:absolute;border-color:#888 transparent transparent transparent;border-style:solid;border-width:6px 5px 0 5px;height:0;right:6px;margin-left:-4px;margin-top:-2px;top:50%;width:0;cursor:pointer}.select2-container--open .select2-selection--multiple:before{content:"";display:block;position:absolute;border-color:transparent transparent #888 transparent;border-width:0 5px 6px 5px;height:0;right:6px;margin-left:-4px;margin-top:-2px;top:50%;width:0;cursor:pointer}.tv-box-chien-dich ul li{display:inline-block;width:33%;font-size:15px;color:#666}.card{border-radius:0;border:1px solid rgba(0,0,0,0.03);height:calc(100vh - 100px);overflow:hidden}.contacts_body{padding:0!important;white-space:nowrap}.msg_card_body{height:calc(100vh - 250px);overflow:hidden;padding-bottom:10px!important}.card-header{border-bottom:1px solid #f1f1f1;background:#fff}.container{align-content:center}.search{border-radius:15px 0 0 15px!important;background-color:rgba(0,0,0,0.3)!important;border:0!important;color:white!important}.search:focus{box-shadow:none!important;outline:0!important}.type_msg{background-color:rgba(0,0,0,.05);border:0!important;height:60px!important;overflow-y:auto}.type_msg:focus{box-shadow:none!important;outline:0!important}.attach_btn{border-radius:15px 0 0 15px!important;background-color:rgba(0,0,0,0.2)!important;border:0!important;color:white!important;cursor:pointer}.send_btn{border-radius:0 10px 10px 0!important;background-color:rgba(0,0,0,.05);border:0!important;color:#0091ce;cursor:pointer}.search_btn{border-radius:0 10px 10px 0!important;background-color:rgba(0,0,0,0.2)!important;border:0!important;color:white!important;cursor:pointer}.contacts{list-style:none;padding:0}.contacts li{width:100%!important;border-bottom:1px solid #f1f1f1}.contacts li a{padding:15px 10px;display:block;overflow:hidden;width:100%}.contacts li a span,.contacts li a p{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:block}.contacts li a .user_info{width:75%}.contacts li.active{background-color:#f5f5f5}.user_img{height:40px;width:40px}.user_img_msg{height:40px;width:40px;border:1px solid #f5f6fa}.img_cont{position:relative;height:40px;width:40px}.img_cont_msg{height:40px;width:40px}.user_info{margin-top:auto;margin-bottom:auto;margin-left:15px}.user_info span{font-size:15px}.user_info p{font-size:12px;color:#999;margin-bottom:0}.msg_container{margin-top:15px;margin-bottom:auto;background-color:#f5f5f5;padding:8px;position:relative;display:inline-block;min-width:40px}.msg_container:before{content:"";position:absolute;width:0;height:0;top:-8px;border-left:10px solid transparent;border-right:10px solid transparent;border-bottom:10px solid #f5f5f5}.msg_container_send{margin-top:15px;margin-bottom:auto;background-color:#e8f1f3;padding:10px;position:relative;display:inline-block;width:auto}.msg_container_send:before{content:"";position:absolute;width:0;height:0;right:20px;top:-8px;border-left:10px solid transparent;border-right:10px solid transparent;border-bottom:10px solid #e8f1f3}.msg_time{line-height:2.8;margin-left:10px;color:#999}.msg_time_send{color:#999}.msg_head{position:relative}.tv-quydinh-number-table{display:table}.tv-number-list{margin-bottom:20px;display:table-row}.tv-number-list .tv-col-number{vertical-align:middle;display:table-cell;width:30px;height:30px;border-radius:90px;border:2px solid #353535;position:relative;text-align:center;float:left;margin:20px 15px 5px 0}.tv-number-list .tv-col-number span{font-size:16px;font-weight:700;color:#353535;line-height:26px}.tv-number-list .tv-col-intro{vertical-align:middle;display:table-cell;padding:10px 0}.title-bottom{border-bottom:1px solid #ddd;position:relative;color:#0091ce;padding-bottom:10px;margin-bottom:15px}.title-bottom:after{content:"";position:absolute;border-bottom:2px solid #0091ce;width:60px;bottom:0;left:0}.tv-tags{background:#ededed;padding:4px 10px;margin-right:1px;border-radius:3px;font-size:13px;display:inline-block;margin-bottom:5px}.tv-tags:hover{background:#0091ce;color:#fff}.tv-candidate-timeline ul li{position:relative;border-left:2px solid #ccc;padding-left:30px}.tv-candidate-timeline ul li:before{content:"";position:absolute;width:10px;height:10px;border-radius:50%;background:#0090cd;top:0;left:-6px}.modal.right .modal-dialog{position:fixed;margin:auto;width:800px;height:100%;-webkit-transform:translate3d(0%,0,0);-ms-transform:translate3d(0%,0,0);-o-transform:translate3d(0%,0,0);transform:translate3d(0%,0,0)}.modal.right .modal-content{height:100%;overflow-y:auto}.modal.right .modal-body{padding:15px 15px 15px}.modal.right.fade .modal-dialog{right:-320px;-webkit-transition:opacity 0.3s linear,right 0.3s ease-out;-moz-transition:opacity 0.3s linear,right 0.3s ease-out;-o-transition:opacity 0.3s linear,right 0.3s ease-out;transition:opacity 0.3s linear,right 0.3s ease-out}.modal.right.fade.show .modal-dialog{right:0;margin-right:0}.icon-flat{vertical-align:text-top;margin-right:5px}.main-navbar .nav-item.has-sub-menu .hs-sub-menu{min-width:230px}.tv-ringing-message-menu .tv-avata-box{display:inline-block;width:50px;height:50px;border-radius:50%;overflow:hidden;margin:5px 5px 5px 0;border:1px solid rgba(0,0,0,.15);min-width:50px}.page-item.active .page-link{z-index:1;color:#fff;background-color:#0091ce;border-color:#0091ce}.DTTTFooter{margin-top:30px}.DTTTFooter .pagination{justify-content:center}.DTTTFooter .pagination .page-item .page-link{border-radius:50%;margin:0 2px;border:1px solid #0091ce}.DTTTFooter .pagination .page-item.disabled .page-link{border:1px solid #bcbcbc}.DTTTFooter .pagination .page-item.active .page-link{z-index:1;color:#fff;background-color:#0091ce;border-color:#0091ce}.DTTTFooter .pagination .page-item .page-link:hover{color:#fff;background-color:#0091ce;border-color:#0091ce}@media (max-width:576px){.contacts_card{margin-bottom:15px!important}}@media (min-width:1200px){.container{max-width:1170px}}@media (min-width:992px){}@media only screen and (max-width:992px) and (min-width:320px){.navbar .collapse{background:#fff;margin-top:2px}.logo-candidate ul li{float:left;width:48.33%;padding:25px 70px;border:1px solid #ddd;text-align:center;margin:0 5px 20px}.job-detail-right{padding-left:0}}.switch{position:relative;display:inline-block;width:30px;height:15px}.switch input{opacity:0;width:0;height:0}.slider{position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background-color:#ccc;-webkit-transition:.4s;transition:.4s}.slider:before{position:absolute;content:"";height:11px;width:11px;left:3px;bottom:2px;background-color:white;-webkit-transition:.4s;transition:.4s}input:checked + .slider{background-color:#0091ce}input:focus + .slider{box-shadow:0 0 1px #0091ce}input:checked + .slider:before{-webkit-transform:translateX(12px);-ms-transform:translateX(12px);transform:translateX(12px)}.slider.round{border-radius:34px}.slider.round:before{border-radius:50%}.scroll-to-top{width:40px;height:40px;border-radius:5px;text-align:center;position:fixed;bottom:22px;right:100px;background-color:#19a2dc;-webkit-transition:.3s;transition:.3s;cursor:pointer;opacity:0;z-index:999}.scroll-to-top:hover{background:#0091ce}.scroll-to-top i{color:#fff;display:block;line-height:40px;text-align:center;font-size:20px}#gridTable,.gridTable{position:relative;min-height:20vh}#loading{display:inline-block;width:50px;height:50px;border:5px solid rgba(255,255,255,.3);border-radius:50%;border-top-color:#0091ce;animation:spin 1s ease-in-out infinite;-webkit-animation:spin 1s ease-in-out infinite;position:absolute;top:50%;left:47%}.tv-messenger-ntd .scroll-wrapper .card-body{padding:0 16px}@keyframes spin{to{-webkit-transform:rotate(360deg)}}@-webkit-keyframes spin{to{-webkit-transform:rotate(360deg)}}.logo-user-candidate span{background:#ccc none repeat scroll 0 0;display:inline-block;font-size:12px;line-height:22px;text-align:center;width:100%}.box-width-left{width:61%;margin-right:20px}.box-width-right{width:37%}.box-width-left-w{width:66.5%;margin-right:20px}.box-width-right-w{width:31.5%}.count-uv .col-4 h4,.count-ut .col-4 h4{width:35px;height:35px;line-height:35px;text-align:center;border-radius:100%;padding:2px}.count-uv .col-4:nth-child(1) h4{color:rgba(254,163,30,1);background:rgba(254,163,30,0.2)}.count-uv .col-4:nth-child(2) h4{color:rgba(1,192,200,1);background:rgba(1,192,200,0.2)}.count-uv .col-4:nth-child(3) h4{color:rgba(0,194,146,1);background:rgba(0,194,146,0.2)}.count-ut .col-4:nth-child(1) h4{color:rgba(133,153,0,1);background:rgba(133,153,0,0.2)}.count-ut .col-4:nth-child(2) h4{color:rgba(252,42,99,1);background:rgba(252,42,99,0.2)}.count-ut .col-4:nth-child(3) h4{color:rgba(171,140,228,1);background:rgba(171,140,228,0.2)}.time-day{text-align:center;margin-right:10px;border-radius:5px}.time-day .time{font-size:12px;background:#dd5050;color:#fff;padding:2px 12px;border-top-left-radius:5px;border-top-right-radius:5px;margin-bottom:5px}.time-day > div{border:1px solid #ebebeb;border-bottom-left-radius:5px;border-bottom-right-radius:5px;font-size:11px}.time-day.time-day-big .time{font-size:14px;background:#dd5050;color:#fff;padding:3px 20px}.time-day.time-day-big > div{font-size:13px}.tv-interview-schedule .name-info-job{max-width:165px}.tv-candidates-apply-recently .name-info-job{max-width:105px}.tv-interview-schedule .name-info-job h4,.tv-interview-schedule .name-info-job p,.tv-candidates-apply-recently .name-info-job h4,.tv-candidates-apply-recently .name-info-job p{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:block}.tv-latest-recruit .col-3{max-width:22%!important}.number-uv{border:1px solid #0091ce;border-radius:5px;padding:18px 0;text-align:center;margin-bottom:10px;margin-top:5px}.tv-recruitment-all-title{width:1315px;background:#fff;margin-top:1px}.tv-recruitment-all-title ul{margin-bottom:0}.tv-recruitment-all-title ul li{width:260px;display:inline-block;padding:13px 20px 13px 10px;position:relative}.tv-recruitment-all-title ul li:after{content:"";position:absolute;background:url("../images/icon-next.png") no-repeat;width:15px;height:48px;top:0;right:0}.tv-recruitment-all-title ul li:last-child:after{background:none}.ribbon{width:80px;height:70px;overflow:hidden;position:absolute}.ribbon span{position:absolute;display:block;width:150px;padding:2px 0;background-color:#0091ce;color:#fff;font-size:9px;text-align:center}.ribbon-top-right{top:-1px;right:-1px}.ribbon-top-right span{left:-15px;top:15px;transform:rotate(45deg)}.ribbon .show-hover{display:none}.column-pv-2 .portlet:hover .ribbon .show-hover{display:block}.show-hover.dahuypv{background-color:red}.show-hover.dapv{background-color:green}.show-hover.chuapv{background-color:#0c5460}.tv-recruitment-all{overflow:hidden}.tv-recruitment-all-scroll-table .mCustomScrollBox{min-height:calc(100vh - 300px)}.tv-recruitment-all-scroll .mCustomScrollBox{min-height:calc(100vh - 190px)}.tv-recruitment-all-list{width:1315px}.column{width:240px;float:left;padding-bottom:100px;margin-right:25px}.column:last-child{margin-right:0}.column .portlet-header{margin-bottom:10px;position:relative}.column .portlet-placeholder{border:1px dotted #ccc;margin:0 0 10px 0;height:83px}.column .portlet-header:hover .bg-white{background:rgba(223,234,241,1)!important}.tv-interviewer{background:#f9f8f9;border-radius:5px;border:1px solid #eae8ea;margin-top:20px}.interview-status ul li{padding:5px 6px;border:1px solid #eee;display:inline-block;font-size:12px;margin-right:-4px}.interview-status ul li.active{background:#fff;color:#0091ce}.tv-detail-jobs-tab .nav-tabs{border-bottom:none}.tv-detail-jobs-tab .nav-tabs .nav-item{margin:0}.tv-detail-jobs-tab .nav-tabs .nav-item .nav-links{padding:18px 20px 17px;border-bottom:3px solid transparent;display:inline-block;font-size:16px;font-weight:400}.tv-detail-jobs-tab .nav-tabs .nav-item .nav-links.active{border-bottom:3px solid #0091ce;color:#0091ce;font-weight:500}.rating-stars-item{margin-bottom:10px}.rating-stars-item i.fas{color:#f6dc02}.stage-list li{display:inline-block;margin-right:10px}.stage-list li:last-child{margin-right:0}.stage-list li span{width:8px;height:8px;border-radius:50%;border:1px solid #c1c1c1;display:inline-block;position:relative}.stage-list li span:before{content:"";position:absolute;width:15px;height:1px;border:1px solid;top:2px;left:6px}.stage-list li:last-child span:before{display:none}.stage-list li.active{color:#0091ce}.stage-list li.active span{background:#0091ce;border:1px solid #0091ce}.title-bottom{border-bottom:1px solid #ddd;position:relative;color:#0091ce;padding-bottom:10px;margin-bottom:15px}.title-bottom:after{content:"";position:absolute;border-bottom:2px solid #0091ce;width:60px;bottom:0;left:0}.form-filter-uv input::-webkit-input-placeholder{color:rgba(0,0,0,0.5)}.form-filter-uv input:-ms-input-placeholder{color:rgba(0,0,0,0.5)}.form-filter-uv input::placeholder{color:rgba(0,0,0,0.5)}.tv-ntd-register-job .form-control.form-textarea::placeholder,.tv-ntd-register-job .form-group input::placeholder{font-size:13px;color:#999}.tv-candidate-detail-info .border-dotted{border:1px dashed #999}.box-chart .chart{position:relative;font-size:34px;font-weight:bold;text-align:center;line-height:160px;height:160px;width:160px;color:#ed145b}.box-chart canvas{position:absolute;top:0;left:0;width:100%}.box-chart-bar{position:relative;width:100%;border-left:2px dashed #333}.box-color-chart ul li{list-style:none;width:24%;display:inline-block;margin-bottom:10px}.box-color-chart ul li span{margin-right:5px;width:12px;height:12px;display:inline-block}#box-confirm-sent-email-modal .title-body i{color:#f7ba2a;font-size:50px}#box-confirm-sent-msg-modal .title-body i{color:#f7ba2a;font-size:50px}.tv-recruitment-all .dropdown-item{color:#999}.tv-recruitment-all .dropdown-item:hover{color:#333;font-weight:bold}.fw-200{font-weight:200!important}.fw-300{font-weight:300!important}.fw-400{font-weight:400!important}.fw-500{font-weight:500!important}.fw-600{font-weight:600!important}.fw-700{font-weight:700!important}.fw-800{font-weight:800!important}.fs-8{font-size:8px!important}.fs-9{font-size:9px!important}.fs-10{font-size:10px!important}.fs-11{font-size:11px!important}.fs-12{font-size:12px!important}.fs-12-h{font-size:12.5px!important}.fs-13{font-size:13px!important}.fs-13-h{font-size:13.5px!important}.fs-14{font-size:14px!important}.fs-15{font-size:15px!important}.fs-16{font-size:16px!important}.fs-17{font-size:17px!important}.fs-18{font-size:18px!important}.fs-19{font-size:19px!important}.fs-20{font-size:20px!important}.fs-22{font-size:22px!important}.fs-24{font-size:24px!important}.fs-25{font-size:25px!important}.fs-26{font-size:26px!important}.fs-28{font-size:28px!important}.fs-30{font-size:30px!important}.fs-35{font-size:35px!important}.fs-40{font-size:40px!important}.fs-50{font-size:50px!important}.fs-60{font-size:60px!important}.fs-70{font-size:70px!important}.fs-80{font-size:80px!important}.fs-90{font-size:90px!important}.fs-100{font-size:100px!important}.mg-0{margin:0!important}.mt-0{margin-top:0!important}.mb-0{margin-bottom:0!important}.ml-0{margin-left:0!important}.mr-0{margin-right:0!important}.pd-0{padding:0!important}.pv-0{padding-top:0!important;padding-bottom:0!important}.ph-0{padding-left:0!important;padding-right:0!important}.pt-0{padding-top:0!important}.pb-0{padding-bottom:0!important}.pl-0{padding-left:0!important}.pr-0{padding-right:0!important}.prt--0,.prt-0{position:relative;top:0!important}.prl--0,.prl-0{position:relative;left:0!important}.mg-1{margin:1px!important}.mt-1{margin-top:1px!important}.mb-1{margin-bottom:1px!important}.ml-1{margin-left:1px!important}.mr-1{margin-right:1px!important}.pd-1{padding:1px!important}.pv-1{padding-top:1px!important;padding-bottom:1px!important}.ph-1{padding-left:1px!important;padding-right:1px!important}.pt-1{padding-top:1px!important}.pb-1{padding-bottom:1px!important}.pl-1{padding-left:1px!important}.pr-1{padding-right:1px!important}.prt-1{top:1px!important}.prt-1,.prt--1{position:relative}.prt--1{top:-1px!important}.prl-1{left:1px!important}.prl-1,.prl--1{position:relative}.prl--1{left:-1px!important}.mg-2{margin:2px!important}.mt-2{margin-top:2px!important}.mb-2{margin-bottom:2px!important}.ml-2{margin-left:2px!important}.mr-2{margin-right:2px!important}.pd-2{padding:2px!important}.pv-2{padding-top:2px!important;padding-bottom:2px!important}.ph-2{padding-left:2px!important;padding-right:2px!important}.pt-2{padding-top:2px!important}.pb-2{padding-bottom:2px!important}.pl-2{padding-left:2px!important}.pr-2{padding-right:2px!important}.prt-2{top:2px!important}.prt-2,.prt--2{position:relative}.prt--2{top:-2px!important}.prl-2{left:2px!important}.prl-2,.prl--2{position:relative}.prl--2{left:-2px!important}.mg-3{margin:3px!important}.mt-3{margin-top:3px!important}.mb-3{margin-bottom:3px!important}.ml-3{margin-left:3px!important}.mr-3{margin-right:3px!important}.pd-3{padding:3px!important}.pv-3{padding-top:3px!important;padding-bottom:3px!important}.ph-3{padding-left:3px!important;padding-right:3px!important}.pt-3{padding-top:3px!important}.pb-3{padding-bottom:3px!important}.pl-3{padding-left:3px!important}.pr-3{padding-right:3px!important}.prt-3{top:3px!important}.prt-3,.prt--3{position:relative}.prt--3{top:-3px!important}.prl-3{left:3px!important}.prl-3,.prl--3{position:relative}.prl--3{left:-3px!important}.mg-4{margin:4px!important}.mt-4{margin-top:4px!important}.mb-4{margin-bottom:4px!important}.ml-4{margin-left:4px!important}.mr-4{margin-right:4px!important}.pd-4{padding:4px!important}.pv-4{padding-top:4px!important;padding-bottom:4px!important}.ph-4{padding-left:4px!important;padding-right:4px!important}.pt-4{padding-top:4px!important}.pb-4{padding-bottom:4px!important}.pl-4{padding-left:4px!important}.pr-4{padding-right:4px!important}.prt-4{top:4px!important}.prt-4,.prt--4{position:relative}.prt--4{top:-4px!important}.prl-4{left:4px!important}.prl-4,.prl--4{position:relative}.prl--4{left:-4px!important}.mg-5{margin:5px!important}.mt-5{margin-top:5px!important}.mb-5{margin-bottom:5px!important}.ml-5{margin-left:5px!important}.mr-5{margin-right:5px!important}.pd-5{padding:5px!important}.pv-5{padding-top:5px!important;padding-bottom:5px!important}.ph-5{padding-left:5px!important;padding-right:5px!important}.pt-5{padding-top:5px!important}.pb-5{padding-bottom:5px!important}.pl-5{padding-left:5px!important}.pr-5{padding-right:5px!important}.prt-5{top:5px!important}.prt-5,.prt--5{position:relative}.prt--5{top:-5px!important}.prl-5{left:5px!important}.prl-5,.prl--5{position:relative}.prl--5{left:-5px!important}.mg-6{margin:6px!important}.mt-6{margin-top:6px!important}.mb-6{margin-bottom:6px!important}.ml-6{margin-left:6px!important}.mr-6{margin-right:6px!important}.pd-6{padding:6px!important}.pv-6{padding-top:6px!important;padding-bottom:6px!important}.ph-6{padding-left:6px!important;padding-right:6px!important}.pt-6{padding-top:6px!important}.pb-6{padding-bottom:6px!important}.pl-6{padding-left:6px!important}.pr-6{padding-right:6px!important}.prt-6{top:6px!important}.prt-6,.prt--6{position:relative}.prt--6{top:-6px!important}.prl-6{left:6px!important}.prl-6,.prl--6{position:relative}.prl--6{left:-6px!important}.mg-7{margin:7px!important}.mt-7{margin-top:7px!important}.mb-7{margin-bottom:7px!important}.ml-7{margin-left:7px!important}.mr-7{margin-right:7px!important}.pd-7{padding:7px!important}.pv-7{padding-top:7px!important;padding-bottom:7px!important}.ph-7{padding-left:7px!important;padding-right:7px!important}.pt-7{padding-top:7px!important}.pb-7{padding-bottom:7px!important}.pl-7{padding-left:7px!important}.pr-7{padding-right:7px!important}.prt-7{top:7px!important}.prt-7,.prt--7{position:relative}.prt--7{top:-7px!important}.prl-7{left:7px!important}.prl-7,.prl--7{position:relative}.prl--7{left:-7px!important}.mg-8{margin:8px!important}.mt-8{margin-top:8px!important}.mb-8{margin-bottom:8px!important}.ml-8{margin-left:8px!important}.mr-8{margin-right:8px!important}.pd-8{padding:8px!important}.pv-8{padding-top:8px!important;padding-bottom:8px!important}.ph-8{padding-left:8px!important;padding-right:8px!important}.pt-8{padding-top:8px!important}.pb-8{padding-bottom:8px!important}.pl-8{padding-left:8px!important}.pr-8{padding-right:8px!important}.prt-8{top:8px!important}.prt-8,.prt--8{position:relative}.prt--8{top:-8px!important}.prl-8{left:8px!important}.prl-8,.prl--8{position:relative}.prl--8{left:-8px!important}.mg-9{margin:9px!important}.mt-9{margin-top:9px!important}.mb-9{margin-bottom:9px!important}.ml-9{margin-left:9px!important}.mr-9{margin-right:9px!important}.pd-9{padding:9px!important}.pv-9{padding-top:9px!important;padding-bottom:9px!important}.ph-9{padding-left:9px!important;padding-right:9px!important}.pt-9{padding-top:9px!important}.pb-9{padding-bottom:9px!important}.pl-9{padding-left:9px!important}.pr-9{padding-right:9px!important}.prt-9{top:9px!important}.prt-9,.prt--9{position:relative}.prt--9{top:-9px!important}.prl-9{left:9px!important}.prl-9,.prl--9{position:relative}.prl--9{left:-9px!important}.mg-10{margin:10px!important}.mt-10{margin-top:10px!important}.mb-10{margin-bottom:10px!important}.ml-10{margin-left:10px!important}.mr-10{margin-right:10px!important}.pd-10{padding:10px!important}.pv-10{padding-top:10px!important;padding-bottom:10px!important}.ph-10{padding-left:10px!important;padding-right:10px!important}.pt-10{padding-top:10px!important}.pb-10{padding-bottom:10px!important}.pl-10{padding-left:10px!important}.pr-10{padding-right:10px!important}.prt-10{top:10px!important}.prt-10,.prt--10{position:relative}.prt--10{top:-10px!important}.prl-10{left:10px!important}.prl-10,.prl--10{position:relative}.prl--10{left:-10px!important}.mg-11{margin:11px!important}.mt-11{margin-top:11px!important}.mb-11{margin-bottom:11px!important}.ml-11{margin-left:11px!important}.mr-11{margin-right:11px!important}.pd-11{padding:11px!important}.pv-11{padding-top:11px!important;padding-bottom:11px!important}.ph-11{padding-left:11px!important;padding-right:11px!important}.pt-11{padding-top:11px!important}.pb-11{padding-bottom:11px!important}.pl-11{padding-left:11px!important}.pr-11{padding-right:11px!important}.prt-11{top:11px!important}.prt-11,.prt--11{position:relative}.prt--11{top:-11px!important}.prl-11{left:11px!important}.prl-11,.prl--11{position:relative}.prl--11{left:-11px!important}.mg-12{margin:12px!important}.mt-12{margin-top:12px!important}.mb-12{margin-bottom:12px!important}.ml-12{margin-left:12px!important}.mr-12{margin-right:12px!important}.pd-12{padding:12px!important}.pv-12{padding-top:12px!important;padding-bottom:12px!important}.ph-12{padding-left:12px!important;padding-right:12px!important}.pt-12{padding-top:12px!important}.pb-12{padding-bottom:12px!important}.pl-12{padding-left:12px!important}.pr-12{padding-right:12px!important}.prt-12{top:12px!important}.prt-12,.prt--12{position:relative}.prt--12{top:-12px!important}.prl-12{left:12px!important}.prl-12,.prl--12{position:relative}.prl--12{left:-12px!important}.mg-13{margin:13px!important}.mt-13{margin-top:13px!important}.mb-13{margin-bottom:13px!important}.ml-13{margin-left:13px!important}.mr-13{margin-right:13px!important}.pd-13{padding:13px!important}.pv-13{padding-top:13px!important;padding-bottom:13px!important}.ph-13{padding-left:13px!important;padding-right:13px!important}.pt-13{padding-top:13px!important}.pb-13{padding-bottom:13px!important}.pl-13{padding-left:13px!important}.pr-13{padding-right:13px!important}.prt-13{top:13px!important}.prt-13,.prt--13{position:relative}.prt--13{top:-13px!important}.prl-13{left:13px!important}.prl-13,.prl--13{position:relative}.prl--13{left:-13px!important}.mg-14{margin:14px!important}.mt-14{margin-top:14px!important}.mb-14{margin-bottom:14px!important}.ml-14{margin-left:14px!important}.mr-14{margin-right:14px!important}.pd-14{padding:14px!important}.pv-14{padding-top:14px!important;padding-bottom:14px!important}.ph-14{padding-left:14px!important;padding-right:14px!important}.pt-14{padding-top:14px!important}.pb-14{padding-bottom:14px!important}.pl-14{padding-left:14px!important}.pr-14{padding-right:14px!important}.prt-14{top:14px!important}.prt-14,.prt--14{position:relative}.prt--14{top:-14px!important}.prl-14{left:14px!important}.prl-14,.prl--14{position:relative}.prl--14{left:-14px!important}.mg-15{margin:15px!important}.mt-15{margin-top:15px!important}.mb-15{margin-bottom:15px!important}.ml-15{margin-left:15px!important}.mr-15{margin-right:15px!important}.pd-15{padding:15px!important}.pv-15{padding-top:15px!important;padding-bottom:15px!important}.ph-15{padding-left:15px!important;padding-right:15px!important}.pt-15{padding-top:15px!important}.pb-15{padding-bottom:15px!important}.pl-15{padding-left:15px!important}.pr-15{padding-right:15px!important}.prt-15{top:15px!important}.prt-15,.prt--15{position:relative}.prt--15{top:-15px!important}.prl-15{left:15px!important}.prl-15,.prl--15{position:relative}.prl--15{left:-15px!important}.mg-16{margin:16px!important}.mt-16{margin-top:16px!important}.mb-16{margin-bottom:16px!important}.ml-16{margin-left:16px!important}.mr-16{margin-right:16px!important}.pd-16{padding:16px!important}.pv-16{padding-top:16px!important;padding-bottom:16px!important}.ph-16{padding-left:16px!important;padding-right:16px!important}.pt-16{padding-top:16px!important}.pb-16{padding-bottom:16px!important}.pl-16{padding-left:16px!important}.pr-16{padding-right:16px!important}.prt-16{top:16px!important}.prt-16,.prt--16{position:relative}.prt--16{top:-16px!important}.prl-16{left:16px!important}.prl-16,.prl--16{position:relative}.prl--16{left:-16px!important}.mg-17{margin:17px!important}.mt-17{margin-top:17px!important}.mb-17{margin-bottom:17px!important}.ml-17{margin-left:17px!important}.mr-17{margin-right:17px!important}.pd-17{padding:17px!important}.pv-17{padding-top:17px!important;padding-bottom:17px!important}.ph-17{padding-left:17px!important;padding-right:17px!important}.pt-17{padding-top:17px!important}.pb-17{padding-bottom:17px!important}.pl-17{padding-left:17px!important}.pr-17{padding-right:17px!important}.prt-17{top:17px!important}.prt-17,.prt--17{position:relative}.prt--17{top:-17px!important}.prl-17{left:17px!important}.prl-17,.prl--17{position:relative}.prl--17{left:-17px!important}.mg-18{margin:18px!important}.mt-18{margin-top:18px!important}.mb-18{margin-bottom:18px!important}.ml-18{margin-left:18px!important}.mr-18{margin-right:18px!important}.pd-18{padding:18px!important}.pv-18{padding-top:18px!important;padding-bottom:18px!important}.ph-18{padding-left:18px!important;padding-right:18px!important}.pt-18{padding-top:18px!important}.pb-18{padding-bottom:18px!important}.pl-18{padding-left:18px!important}.pr-18{padding-right:18px!important}.prt-18{top:18px!important}.prt-18,.prt--18{position:relative}.prt--18{top:-18px!important}.prl-18{left:18px!important}.prl-18,.prl--18{position:relative}.prl--18{left:-18px!important}.mg-19{margin:19px!important}.mt-19{margin-top:19px!important}.mb-19{margin-bottom:19px!important}.ml-19{margin-left:19px!important}.mr-19{margin-right:19px!important}.pd-19{padding:19px!important}.pv-19{padding-top:19px!important;padding-bottom:19px!important}.ph-19{padding-left:19px!important;padding-right:19px!important}.pt-19{padding-top:19px!important}.pb-19{padding-bottom:19px!important}.pl-19{padding-left:19px!important}.pr-19{padding-right:19px!important}.prt-19{top:19px!important}.prt-19,.prt--19{position:relative}.prt--19{top:-19px!important}.prl-19{left:19px!important}.prl-19,.prl--19{position:relative}.prl--19{left:-19px!important}.mg-20{margin:20px!important}.mt-20{margin-top:20px!important}.mb-20{margin-bottom:20px!important}.ml-20{margin-left:20px!important}.mr-20{margin-right:20px!important}.pd-20{padding:20px!important}.pv-20{padding-top:20px!important;padding-bottom:20px!important}.ph-20{padding-left:20px!important;padding-right:20px!important}.pt-20{padding-top:20px!important}.pb-20{padding-bottom:20px!important}.pl-20{padding-left:20px!important}.pr-20{padding-right:20px!important}.prt-20{top:20px!important}.prt-20,.prt--20{position:relative}.prt--20{top:-20px!important}.prl-20{left:20px!important}.prl-20,.prl--20{position:relative}.prl--20{left:-20px!important}.mg-22{margin:22px!important}.mt-22{margin-top:22px!important}.mb-22{margin-bottom:22px!important}.ml-22{margin-left:22px!important}.mr-22{margin-right:22px!important}.pd-22{padding:22px!important}.pv-22{padding-top:22px!important;padding-bottom:22px!important}.ph-22{padding-left:22px!important;padding-right:22px!important}.pt-22{padding-top:22px!important}.pb-22{padding-bottom:22px!important}.pl-22{padding-left:22px!important}.pr-22{padding-right:22px!important}.prt-22{top:22px!important}.prt-22,.prt--22{position:relative}.prt--22{top:-22px!important}.prl-22{left:22px!important}.prl-22,.prl--22{position:relative}.prl--22{left:-22px!important}.mg-25{margin:25px!important}.mt-25{margin-top:25px!important}.mb-25{margin-bottom:25px!important}.ml-25{margin-left:25px!important}.mr-25{margin-right:25px!important}.pd-25{padding:25px!important}.pv-25{padding-top:25px!important;padding-bottom:25px!important}.ph-25{padding-left:25px!important;padding-right:25px!important}.pt-25{padding-top:25px!important}.pb-25{padding-bottom:25px!important}.pl-25{padding-left:25px!important}.pr-25{padding-right:25px!important}.prt-25{top:25px!important}.prt-25,.prt--25{position:relative}.prt--25{top:-25px!important}.prl-25{left:25px!important}.prl-25,.prl--25{position:relative}.prl--25{left:-25px!important}.mg-26{margin:26px!important}.mt-26{margin-top:26px!important}.mb-26{margin-bottom:26px!important}.ml-26{margin-left:26px!important}.mr-26{margin-right:26px!important}.pd-26{padding:26px!important}.pv-26{padding-top:26px!important;padding-bottom:26px!important}.ph-26{padding-left:26px!important;padding-right:26px!important}.pt-26{padding-top:26px!important}.pb-26{padding-bottom:26px!important}.pl-26{padding-left:26px!important}.pr-26{padding-right:26px!important}.prt-26{top:26px!important}.prt-26,.prt--26{position:relative}.prt--26{top:-26px!important}.prl-26{left:26px!important}.prl-26,.prl--26{position:relative}.prl--26{left:-26px!important}.mg-28{margin:28px!important}.mt-28{margin-top:28px!important}.mb-28{margin-bottom:28px!important}.ml-28{margin-left:28px!important}.mr-28{margin-right:28px!important}.pd-28{padding:28px!important}.pv-28{padding-top:28px!important;padding-bottom:28px!important}.ph-28{padding-left:28px!important;padding-right:28px!important}.pt-28{padding-top:28px!important}.pb-28{padding-bottom:28px!important}.pl-28{padding-left:28px!important}.pr-28{padding-right:28px!important}.prt-28{top:28px!important}.prt-28,.prt--28{position:relative}.prt--28{top:-28px!important}.prl-28{left:28px!important}.prl-28,.prl--28{position:relative}.prl--28{left:-28px!important}.mg-30{margin:30px!important}.mt-30{margin-top:30px!important}.mb-30{margin-bottom:30px!important}.ml-30{margin-left:30px!important}.mr-30{margin-right:30px!important}.pd-30{padding:30px!important}.pv-30{padding-top:30px!important;padding-bottom:30px!important}.ph-30{padding-left:30px!important;padding-right:30px!important}.pt-30{padding-top:30px!important}.pb-30{padding-bottom:30px!important}.pl-30{padding-left:30px!important}.pr-30{padding-right:30px!important}.prt-30{top:30px!important}.prt-30,.prt--30{position:relative}.prt--30{top:-30px!important}.prl-30{left:30px!important}.prl-30,.prl--30{position:relative}.prl--30{left:-30px!important}.mg-35{margin:35px!important}.mt-35{margin-top:35px!important}.mb-35{margin-bottom:35px!important}.ml-35{margin-left:35px!important}.mr-35{margin-right:35px!important}.pd-35{padding:35px!important}.pv-35{padding-top:35px!important;padding-bottom:35px!important}.ph-35{padding-left:35px!important;padding-right:35px!important}.pt-35{padding-top:35px!important}.pb-35{padding-bottom:35px!important}.pl-35{padding-left:35px!important}.pr-35{padding-right:35px!important}.prt-35{top:35px!important}.prt-35,.prt--35{position:relative}.prt--35{top:-35px!important}.prl-35{left:35px!important}.prl-35,.prl--35{position:relative}.prl--35{left:-35px!important}.mg-40{margin:40px!important}.mt-40{margin-top:40px!important}.mb-40{margin-bottom:40px!important}.ml-40{margin-left:40px!important}.mr-40{margin-right:40px!important}.pd-40{padding:40px!important}.pv-40{padding-top:40px!important;padding-bottom:40px!important}.ph-40{padding-left:40px!important;padding-right:40px!important}.pt-40{padding-top:40px!important}.pb-40{padding-bottom:40px!important}.pl-40{padding-left:40px!important}.pr-40{padding-right:40px!important}.prt-40{top:40px!important}.prt-40,.prt--40{position:relative}.prt--40{top:-40px!important}.prl-40{left:40px!important}.prl-40,.prl--40{position:relative}.prl--40{left:-40px!important}.mg-45{margin:45px!important}.mt-45{margin-top:45px!important}.mb-45{margin-bottom:45px!important}.ml-45{margin-left:45px!important}.mr-45{margin-right:45px!important}.pd-45{padding:45px!important}.pv-45{padding-top:45px!important;padding-bottom:45px!important}.ph-45{padding-left:45px!important;padding-right:45px!important}.pt-45{padding-top:45px!important}.pb-45{padding-bottom:45px!important}.pl-45{padding-left:45px!important}.pr-45{padding-right:45px!important}.prt-45{top:45px!important}.prt-45,.prt--45{position:relative}.prt--45{top:-45px!important}.prl-45{left:45px!important}.prl-45,.prl--45{position:relative}.prl--45{left:-45px!important}.mg-50{margin:50px!important}.mt-50{margin-top:50px!important}.mb-50{margin-bottom:50px!important}.ml-50{margin-left:50px!important}.mr-50{margin-right:50px!important}.pd-50{padding:50px!important}.pv-50{padding-top:50px!important;padding-bottom:50px!important}.ph-50{padding-left:50px!important;padding-right:50px!important}.pt-50{padding-top:50px!important}.pb-50{padding-bottom:50px!important}.pl-50{padding-left:50px!important}.pr-50{padding-right:50px!important}.prt-50{top:50px!important}.prt-50,.prt--50{position:relative}.prt--50{top:-50px!important}.prl-50{left:50px!important}.prl-50,.prl--50{position:relative}.prl--50{left:-50px!important}.mg-60{margin:60px!important}.mt-60{margin-top:60px!important}.mb-60{margin-bottom:60px!important}.ml-60{margin-left:60px!important}.mr-60{margin-right:60px!important}.pd-60{padding:60px!important}.pv-60{padding-top:60px!important;padding-bottom:60px!important}.ph-60{padding-left:60px!important;padding-right:60px!important}.pt-60{padding-top:60px!important}.pb-60{padding-bottom:60px!important}.pl-60{padding-left:60px!important}.pr-60{padding-right:60px!important}.prt-60{top:60px!important}.prt-60,.prt--60{position:relative}.prt--60{top:-60px!important}.prl-60{left:60px!important}.prl-60,.prl--60{position:relative}.prl--60{left:-60px!important}.mg-70{margin:70px!important}.mt-70{margin-top:70px!important}.mb-70{margin-bottom:70px!important}.ml-70{margin-left:70px!important}.mr-70{margin-right:70px!important}.pd-70{padding:70px!important}.pv-70{padding-top:70px!important;padding-bottom:70px!important}.ph-70{padding-left:70px!important;padding-right:70px!important}.pt-70{padding-top:70px!important}.pb-70{padding-bottom:70px!important}.pl-70{padding-left:70px!important}.pr-70{padding-right:70px!important}.prt-70{top:70px!important}.prt-70,.prt--70{position:relative}.prt--70{top:-70px!important}.prl-70{left:70px!important}.prl-70,.prl--70{position:relative}.prl--70{left:-70px!important}.mg-80{margin:80px!important}.mt-80{margin-top:80px!important}.mb-80{margin-bottom:80px!important}.ml-80{margin-left:80px!important}.mr-80{margin-right:80px!important}.pd-80{padding:80px!important}.pv-80{padding-top:80px!important;padding-bottom:80px!important}.ph-80{padding-left:80px!important;padding-right:80px!important}.pt-80{padding-top:80px!important}.pb-80{padding-bottom:80px!important}.pl-80{padding-left:80px!important}.pr-80{padding-right:80px!important}.prt-80{top:80px!important}.prt-80,.prt--80{position:relative}.prt--80{top:-80px!important}.prl-80{left:80px!important}.prl-80,.prl--80{position:relative}.prl--80{left:-80px!important}.mg-90{margin:90px!important}.mt-90{margin-top:90px!important}.mb-90{margin-bottom:90px!important}.ml-90{margin-left:90px!important}.mr-90{margin-right:90px!important}.pd-90{padding:90px!important}.pv-90{padding-top:90px!important;padding-bottom:90px!important}.ph-90{padding-left:90px!important;padding-right:90px!important}.pt-90{padding-top:90px!important}.pb-90{padding-bottom:90px!important}.pl-90{padding-left:90px!important}.pr-90{padding-right:90px!important}.prt-90{top:90px!important}.prt-90,.prt--90{position:relative}.prt--90{top:-90px!important}.prl-90{left:90px!important}.prl-90,.prl--90{position:relative}.prl--90{left:-90px!important}.mg-100{margin:100px!important}.mt-100{margin-top:100px!important}.mb-100{margin-bottom:100px!important}.ml-100{margin-left:100px!important}.mr-100{margin-right:100px!important}.pd-100{padding:100px!important}.pv-100{padding-top:100px!important;padding-bottom:100px!important}.ph-100{padding-left:100px!important;padding-right:100px!important}.pt-100{padding-top:100px!important}.pb-100{padding-bottom:100px!important}.pl-100{padding-left:100px!important}.pr-100{padding-right:100px!important}.prt-100{position:relative;top:100px!important}.prt--100{position:relative;top:-100px!important}.prl-100{position:relative;left:100px!important}.prl--100{position:relative;left:-100px!important}.mg-150{margin:150px!important}.mt-150{margin-top:150px!important}.mb-150{margin-bottom:150px!important}.ml-150{margin-left:150px!important}.mr-150{margin-right:150px!important}.pd-150{padding:150px!important}.pv-150{padding-top:150px!important;padding-bottom:150px!important}.ph-150{padding-left:150px!important;padding-right:150px!important}.pt-150{padding-top:150px!important}.pb-150{padding-bottom:150px!important}.pl-150{padding-left:150px!important}.pr-150{padding-right:150px!important}.prt-150{position:relative;top:150px!important}.prt--150{position:relative;top:-150px!important}.prl-150{position:relative;left:150px!important}.prl--150{position:relative;left:-150px!important}.mg-200{margin:200px!important}.mt-200{margin-top:200px!important}.mb-200{margin-bottom:200px!important}.ml-200{margin-left:200px!important}.mr-200{margin-right:200px!important}.pd-200{padding:200px!important}.pv-200{padding-top:200px!important;padding-bottom:200px!important}.ph-200{padding-left:200px!important;padding-right:200px!important}.pt-200{padding-top:200px!important}.pb-200{padding-bottom:200px!important}.pl-200{padding-left:200px!important}.pr-200{padding-right:200px!important}.prt-200{position:relative;top:200px!important}.prt--200{position:relative;top:-200px!important}.prl-200{position:relative;left:200px!important}.prl--200{position:relative;left:-200px!important}.mg-250{margin:250px!important}.mt-250{margin-top:250px!important}.mb-250{margin-bottom:250px!important}.ml-250{margin-left:250px!important}.mr-250{margin-right:250px!important}.pd-250{padding:250px!important}.pv-250{padding-top:250px!important;padding-bottom:250px!important}.ph-250{padding-left:250px!important;padding-right:250px!important}.pt-250{padding-top:250px!important}.pb-250{padding-bottom:250px!important}.pl-250{padding-left:250px!important}.pr-250{padding-right:250px!important}.prt-250{position:relative;top:250px!important}.prt--250{position:relative;top:-250px!important}.prl-250{position:relative;left:250px!important}.prl--250{position:relative;left:-250px!important}.mg-300{margin:300px!important}.mt-300{margin-top:300px!important}.mb-300{margin-bottom:300px!important}.ml-300{margin-left:300px!important}.mr-300{margin-right:300px!important}.pd-300{padding:300px!important}.pv-300{padding-top:300px!important;padding-bottom:300px!important}.ph-300{padding-left:300px!important;padding-right:300px!important}.pt-300{padding-top:300px!important}.pb-300{padding-bottom:300px!important}.pl-300{padding-left:300px!important}.pr-300{padding-right:300px!important}.prt-300{position:relative;top:300px!important}.prt--300{position:relative;top:-300px!important}.prl-300{position:relative;left:300px!important}.prl--300{position:relative;left:-300px!important}.mg-350{margin:350px!important}.mt-350{margin-top:350px!important}.mb-350{margin-bottom:350px!important}.ml-350{margin-left:350px!important}.mr-350{margin-right:350px!important}.pd-350{padding:350px!important}.pv-350{padding-top:350px!important;padding-bottom:350px!important}.ph-350{padding-left:350px!important;padding-right:350px!important}.pt-350{padding-top:350px!important}.pb-350{padding-bottom:350px!important}.pl-350{padding-left:350px!important}.pr-350{padding-right:350px!important}.prt-350{position:relative;top:350px!important}.prt--350{position:relative;top:-350px!important}.prl-350{position:relative;left:350px!important}.prl--350{position:relative;left:-350px!important}.mg-400{margin:400px!important}.mt-400{margin-top:400px!important}.mb-400{margin-bottom:400px!important}.ml-400{margin-left:400px!important}.mr-400{margin-right:400px!important}.pd-400{padding:400px!important}.pv-400{padding-top:400px!important;padding-bottom:400px!important}.ph-400{padding-left:400px!important;padding-right:400px!important}.pt-400{padding-top:400px!important}.pb-400{padding-bottom:400px!important}.pl-400{padding-left:400px!important}.pr-400{padding-right:400px!important}.prt-400{position:relative;top:400px!important}.prt--400{position:relative;top:-400px!important}.prl-400{position:relative;left:400px!important}.prl--400{position:relative;left:-400px!important}.mg-450{margin:450px!important}.mt-450{margin-top:450px!important}.mb-450{margin-bottom:450px!important}.ml-450{margin-left:450px!important}.mr-450{margin-right:450px!important}.pd-450{padding:450px!important}.pv-450{padding-top:450px!important;padding-bottom:450px!important}.ph-450{padding-left:450px!important;padding-right:450px!important}.pt-450{padding-top:450px!important}.pb-450{padding-bottom:450px!important}.pl-450{padding-left:450px!important}.pr-450{padding-right:450px!important}.prt-450{position:relative;top:450px!important}.prt--450{position:relative;top:-450px!important}.prl-450{position:relative;left:450px!important}.prl--450{position:relative;left:-450px!important}.mg-500{margin:500px!important}.mt-500{margin-top:500px!important}.mb-500{margin-bottom:500px!important}.ml-500{margin-left:500px!important}.mr-500{margin-right:500px!important}.pd-500{padding:500px!important}.pv-500{padding-top:500px!important;padding-bottom:500px!important}.ph-500{padding-left:500px!important;padding-right:500px!important}.pt-500{padding-top:500px!important}.pb-500{padding-bottom:500px!important}.pl-500{padding-left:500px!important}.pr-500{padding-right:500px!important}.prt-500{position:relative;top:500px!important}.prt--500{position:relative;top:-500px!important}.prl-500{position:relative;left:500px!important}.prl--500{position:relative;left:-500px!important}.w-5{width:5px!important}.minw-5{min-width:5px!important}.maxw-5{max-width:5px!important}.h-5{height:5px!important}.minh-5{min-height:5px!important}.maxh-5{max-height:5px!important}.w-10{width:10px!important}.minw-10{min-width:10px!important}.maxw-10{max-width:10px!important}.h-10{height:10px!important}.minh-10{min-height:10px!important}.maxh-10{max-height:10px!important}.w-15{width:15px!important}.minw-15{min-width:15px!important}.maxw-15{max-width:15px!important}.h-15{height:15px!important}.minh-15{min-height:15px!important}.maxh-15{max-height:15px!important}.w-20{width:20px!important}.minw-20{min-width:20px!important}.maxw-20{max-width:20px!important}.h-20{height:20px!important}.minh-20{min-height:20px!important}.maxh-20{max-height:20px!important}.w-30{width:30px!important}.minw-30{min-width:30px!important}.maxw-30{max-width:30px!important}.h-30{height:30px!important}.minh-30{min-height:30px!important}.maxh-30{max-height:30px!important}.w-40{width:40px!important}.minw-40{min-width:40px!important}.maxw-40{max-width:40px!important}.h-40{height:40px!important}.minh-40{min-height:40px!important}.maxh-40{max-height:40px!important}.w-50{width:50px!important}.minw-50{min-width:50px!important}.maxw-50{max-width:50px!important}.h-50{height:50px!important}.minh-50{min-height:50px!important}.maxh-50{max-height:50px!important}.w-100{width:100px!important}.minw-100{min-width:100px!important}.maxw-100{max-width:100px!important}.h-100{height:100px!important}.minh-100{min-height:100px!important}.maxh-100{max-height:100px!important}.w-150{width:150px!important}.minw-150{min-width:150px!important}.maxw-150{max-width:150px!important}.h-150{height:150px!important}.minh-150{min-height:150px!important}.maxh-150{max-height:150px!important}.w-200{width:200px!important}.minw-200{min-width:200px!important}.maxw-200{max-width:200px!important}.h-200{height:200px!important}.minh-200{min-height:200px!important}.maxh-200{max-height:200px!important}.w-250{width:250px!important}.minw-250{min-width:250px!important}.maxw-250{max-width:250px!important}.h-250{height:250px!important}.minh-250{min-height:250px!important}.maxh-250{max-height:250px!important}.w-300{width:300px!important}.minw-300{min-width:300px!important}.maxw-300{max-width:300px!important}.h-300{height:300px!important}.minh-300{min-height:300px!important}.maxh-300{max-height:300px!important}.w-350{width:350px!important}.minw-350{min-width:350px!important}.maxw-350{max-width:350px!important}.h-350{height:350px!important}.minh-350{min-height:350px!important}.maxh-350{max-height:350px!important}.w-400{width:400px!important}.minw-400{min-width:400px!important}.maxw-400{max-width:400px!important}.h-400{height:400px!important}.minh-400{min-height:400px!important}.maxh-400{max-height:400px!important}.w-450{width:450px!important}.minw-450{min-width:450px!important}.maxw-450{max-width:450px!important}.h-450{height:450px!important}.minh-450{min-height:450px!important}.maxh-450{max-height:450px!important}.w-500{width:500px!important}.minw-500{min-width:500px!important}.maxw-500{max-width:500px!important}.h-500{height:500px!important}.minh-500{min-height:500px!important}.maxh-500{max-height:500px!important}.w-full{width:100%!important}.lh-10{line-height:10px!important}.lh-14{line-height:14px!important}.lh-16{line-height:16px!important}.lh-18{line-height:18px!important}.lh-20{line-height:20px!important}.lh-22{line-height:22px!important}.lh-24{line-height:24px!important}.lh-28{line-height:28px!important}.lh-30{line-height:30px!important}.smothing{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.overlay{position:absolute;width:100%;height:100%;background-color:rgba(47,47,47,.5)}.flex-image{position:relative}.flex-image .thumb{border:none;position:relative;opacity:1;-webkit-transition:opacity .1s;transition:opacity .1s;width:200px;height:200px}.flex-image .thumb,.flex-image .thumb:after{overflow:hidden;top:0;right:0;bottom:0;left:0}.flex-image .thumb:after{content:"";display:block;position:absolute}.flex-image .thumb .centered{position:absolute;top:0;left:0;width:140%;height:100%;-webkit-transform:translate(50%,50%);transform:translate(50%,50%)}.flex-image .thumb .centered img{top:0;left:0;position:absolute;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);max-width:100%}.br{border:1px solid #eee!important}.br-t{border-top:1px solid #eee!important}.br-b{border-bottom:1px solid #eee!important}.br-l{border-left:1px solid #eee!important}.br-r{border-right:1px solid #eee!important}.br-0{border:none!important}.brt-0{border-top:none!important}.brb-0{border-bottom:none!important}.brl-0{border-left:none!important}.brr-0{border-right:none!important}.g-width-20x{width:20%!important}.g-width-30x{width:30%!important}.g-width-40x{width:40%!important}.g-width-45x{width:45%!important}.g-width-50x{width:50%!important}.g-width-60x{width:60%!important}.g-width-70x{width:70%!important}.g-width-80x{width:80%!important}.g-width-85x{width:85%!important}.g-width-90x{width:90%!important}.g-width-10{width:10px!important}.g-width-12{width:12px!important}.g-width-16{width:16px!important}.g-width-18{width:18px!important}.g-width-20{width:20px!important}.g-width-24{width:24px!important}.g-width-25{width:25px!important}.g-width-26{width:26px!important}.g-width-28{width:28px!important}.g-width-30{width:30px!important}.g-width-32{width:32px!important}.g-width-35{width:35px!important}.g-width-36{width:36px!important}.g-width-40{width:40px!important}.g-width-45{width:45px!important}.g-width-48{width:48px!important}.g-width-50{width:50px!important}.g-width-54{width:54px!important}.g-width-55{width:55px!important}.g-width-60{width:60px!important}.g-width-64{width:64px!important}.g-width-70{width:70px!important}.g-width-75{width:75px!important}.g-width-80{width:80px!important}.g-width-85{width:85px!important}.g-width-95{width:95px!important}.g-width-100{width:100px!important}.flex-container,.flex-container .col-flex{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap}.flex-container .col-flex{position:relative}.pull-right{float:right!important}.required{color:#ff0000}.box_shadow{box-shadow:1px 1px 1px 1px rgba(0,0,0,0.03)}.box_shadow_top{-webkit-box-shadow:1px 1px 4px 2px rgba(0,0,0,0.05);-moz-box-shadow:1px 1px 4px 2px rgba(0,0,0,0.05);box-shadow:1px 1px 4px 2px rgba(0,0,0,0.05)}.border-c5c5c5{border:1px solid #c5c5c5}.color-333{color:#333}.color-666{color:#666}.color-999{color:#999}.color-white{color:#fff}.color-eaa603{color:#eaa603}.color-70ce01{color:#70ce01}.color-076306{color:#076306}.color-d80101{color:#d80101}.color-f6dc02{color:#f6dc02}.color-77ab1b{color:#77ab1b}.color-eaa603{color:#eaa603}.color-ff0000{color:#ff0000}.color-f07959{color:#f07959}.bg-white-hover{background:#fff;color:#0091ce}.color-main{color:#0091ce}.bg-main{background:#0091ce}.bg-main-hover:hover{background:#0091ce;color:#fff}a.bg-main:hover{color:#ddd}.border-main{border:1px solid #0091ce}.border-7cdbf8{border:1px solid #7cdbf8}.border-d0d0d0{border:1px solid #d0d0d0}.border-eae8ea{border:1px solid #eae8ea}.border-dcdcdc{border:1px solid #dcdcdc}.border-d0d0d0-hover:hover{background:#0091ce;color:#fff}.border-d80101{border:1px solid #d80101}.border-77ab1b{border:1px solid #77ab1b}.border-eaa603{border:1px solid #eaa603}.border-dotted{border:1px dotted #d8d8d8}.border-radius{border-radius:5px}.border-radius-0{border-radius:0}.border-radius-10{border-radius:10px}.border-radius-20{border-radius:20px}.border-radius-30{border-radius:30px}.color-ed145b{color:#ed145b}.bg-ed145b{background:#ed145b}.bg-e4e8f1{background:#e4e8f1}.bg-f2f2f2{background:#f2f2f2}.bg-fc205c{background:#fc205c}.bg-fc205c:hover{opacity:0.8}.bg-fea31e{background:#fea31e}.bg-d80101{background:#d80101}.bg-77ab1b{background:#77ab1b}.bg-eaa603{background:#eaa603}.bg-ebeff3{background:#ebeff3}.bg-ffdd0e{background:#ffdd0e}.bg-fbedcd{background:#fbedcd}.bg-d4d4d4{background:#d4d4d4}.bg-eeedef{background:#eeedef}.bg-40b660{background:#40b660}.text-decoration-underline{text-decoration:underline}.form-group{margin-bottom:15px}.form-group input{border:1px solid #bfcbd9;width:100%;border-radius:5px;padding:9px 10px 8px}.form-group textarea{border:1px solid #bfcbd9;width:100%;border-radius:5px;padding:7px 10px}.table th,.table td{padding:1rem;vertical-align:top;border-top:1px solid #dee2e6}.modal.show .modal-dialog{transform:none}.text-ellipsis{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:block;
</style>
 
<?php 
    require(ROOT. '/Views/recruitment/_layout/footer.php');
?>

<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} ?>