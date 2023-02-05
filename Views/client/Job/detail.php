<?php 
    require(ROOT. '/Views/client/_layout/header.php');
    if(isset($_SESSION['login_user'])){
        $user = $_SESSION['login_user']; 
        $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

        $query = "SELECT users.id, users.full_name, users.* FROM users WHERE email = '$user'";
        $result = $mysqli->query($query);
        $data = $result->fetch_all();
        $user_id = $data[0];

    }
?>

<!-- Modal -->
<div class="modal fade" id="apply" tabindex="-1" role="dialog" aria-labelledby="apply" aria-hidden="true" style="z-index: 9999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="apply">Nộp hồ sơ ứng tuyển</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="?c=Job&a=CandidateApply" method="POST">
      <input type="hidden" name="JobId" value="<?= $job[0] ?>">
      <input type="hidden" name="UserId" value="<?= $user_id[0] ?>">
      <div class="modal-body">
        <p class="mb-3">Bạn đang ứng tuyển vào vị trí: <b><?=$job[1]?></b></p>
        <div class="row">
          <div class="col-md-12">
          <div class="form-group input-file-container">
            <input type="file" name="Resume" id="file" class="input-file" />
              <label tabindex="0" for="my-file" class="input-file-trigger">Tải lên hồ sơ của bạn...</label>
              <p class="file-return"></p>
          </div>
          </div>
          <div class="col-md-12">
          <div class="identify-contact">
            <h5 class="fs-16 fw-700">Xác định thông tin liên hệ.
            </h5>
            <p class="mb-0">Vui lòng xác nhận các thông tin dưới đây để nhà tuyển dụng có thể tìm thấy bạn.
            </p>
            <p>Các thay đổi sẽ cập nhật vào hồ sơ
            </p>
            <div class="row">
              <div class="col-6 pr-10">
                <div class="form-group">
                  <label for="mf_phone">Số điện thoại:
                  </label>
                  <br>
                  <input type="text" class="w-full" id="mf_phone" name="Phone" value="<?= $user_id[6] ?>" placeholder="Số điện thoại">
                </div>
              </div>
              <div class="col-6 pl-10">
                <div class="form-group">
                  <label for="mf_email">Email:
                  </label>
                  <br>
                  <input type="email" class="w-full" id="mf_email" name="Email" value="<?= $user_id[3] ?>" placeholder="Email">
                </div>
              </div>
            </div>
          </div>
          <div class="pa-20">
                                    <h5 class="fw-700 fs-18">Thư tự giới thiệu</h5>
                                    <p>
                                        Sử dụng thư tự giới thiệu là 1 cách tôn trọng NTD và thể hiện sự nghiêm túc với công việc.
                                        Bạn có thể tham khảo thư mẫu hoặc tự viết một bức thư tự giới thiệu hoàn chỉnh.
                                    </p>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="fw-700 mt-4 mb-2 d-block">Nội dung thư:</span>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group g-mt-15">
                                                <textarea class="w-full" name="Introduction" id="mf-apply-content" rows="4" style="height: 186px; width: 100%; border: 1px solid #ccc; border-radius: 8px;">
                                               
Kính gửi Quý Công ty Công ty TNHH FFG,

Tôi là: <?= $user_id[1] ?>,

Qua website techjob.vn, tôi được biết Quý công ty đang có nhu cầu tuyển dụng nhân sự cho vị trí "<?=$job[1]?>".

Qua thông tin tuyển dụng công ty cung cấp, tôi tin rằng với năng lực của mình, tôi hoàn toàn đáp ứng được yêu cầu công việc của Quý công ty.

Vì vậy, qua techjob.vn, tôi xin nộp đơn ứng tuyển vào vị trí "<?=$job[1]?>" của Quý công ty.

Tôi xin cam đoan những điều nêu trong hồ sơ hoàn toàn là sự thật, nếu có gì sai trái tôi xin chịu hoàn toàn trách nhiệm.

Rất mong có cơ hội được tham gia phỏng vấn tại Quý công ty trong một ngày gần đây.

Xin trân trọng cảm ơn,

                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn-sm btn-primary">Nộp hồ sơ ứng tuyển</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- job detail header -->
<div class="container-fluid job-detail-wrap">
  <div class="container job-detail">
    <div class="job-detail-header">
      <div class="row">
        <div class="col-md-2 col-sm-12 col-12">
          <div class="job-detail-header-logo">
            <a href="#">
              <img src="Assets/upload/job_image/<?= $job[3] ?>" class="job-logo-ima" alt="job-logo">
            </a>
          </div>
        </div>
        <div class="col-md-7 col-sm-12 col-12">
          <div class="job-detail-header-desc">
              <div class="job-detail-header-title">
                  <a href="#"><?=$job[1]?></a>
              </div>
              <div class="job-detail-header-company">
                  <a href="#"><?= $job[19] ?></a>
              </div>
              <div class="job-detail-header-de">
                <ul>
                  <li><i class="fa fa-map-marker icn-jd"></i><span><?= $job[18] ?></span></li>
                  <li><i class="fa fa-usd icn-jd"></i><span><?= $job[7] ?> <?= $job[9] ?> - <?= $job[8] ?> <?= $job[9] ?></span></li>
                  <li><i class="fa fa-calendar icn-jd"></i><span><?= $job[12] ?></span></li>
                </ul>
              </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-12 col-12">
          <div class="jd-header-wrap-right">
            <div class="jd-center">
              <a href="javascript:void(0);" class="btn btn-primary btn-apply" data-toggle="modal" data-target="#apply">Nộp đơn</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- (end) job detail header -->

<div class="clearfix"></div>

<!-- Phần thân -->
<div class="wrapper">
  <div class="container">
    <div class="row">
      <!-- Main wrapper -->
      <div class="col-md-8 col-sm-12 col-12 clear-left">
        <div class="main-wrapper">
          <h2 class="widget-title">
            <span>Mô tả công việc</span>
          </h2>
          <div class="jd-content">
          <?= $job[4] ?>
          </div>
          

        </div>
        
        <div class="comment-wrapper">
        <?php if(isset($_SESSION['login_user'])) { ?>
          <form method="post" action="?c=Job&a=Comment">
                <section class='rating-widget'>
                  <!-- Rating Stars Box -->
                  <div class='rating-stars text-center'>
                    <ul id='stars'>
                      <li class='star' title='Poor' data-value='1'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Fair' data-value='2'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Good' data-value='3'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Excellent' data-value='4'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='WOW!!!' data-value='5'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                    </ul>
                  </div>
                  </section>
                  <div class='success-box'>
                    <div class='text-message'>Hãy đánh giá vị trí công việc này.</div>
                  </div>
                  <p>Comments as <b><?= $user_id[1] ?></b></p>
                  <div class="feedback-main">
                  <input type="hidden" name="UserId" readonly value="<?= $user_id[0] ?>">
                  <input type="hidden" name="RateScore" id="rateScore">
                  <input type="hidden" name="JobId" readonly value="<?= $job[0] ?>">
                  <textarea name="Content" rows="5"></textarea>
                  <input type="submit" value="Comment">
                  </div>
                </form>
                <?php } else { ?> Hãy là người bình luận đầu tiên. <a href="?c=User&a=DangNhapUser">Đăng nhập</a> hoặc <a href="?c=User&a=DangKyUser">Đăng ký</a> tài khoản. <?php } ?>
          </div>
          <div id="comment-holder">
            <div class="comment-thread toplevel-thread">
              <ol id="top-ra">
              <?php foreach($dataComments as $cmt) { ?>
                <li class="comment">
                  <div class="avatar-image-container">
                    <img src="Assets/upload/user_avatar/<?= $cmt[9] ?>" alt="<?= $cmt[8] ?>">
                  </div>
                  <div class="comment-block">
                    <div class="comment-header">
                      <cite class="user">
                        <span><?= $cmt[8] ?>
                        </span>
                      </cite>
                      <span class="icon user ">
                      </span>
                      <span class="datetime secondary-text">
                        <a rel="nofollow" href="#">
                        <?php
                              switch ($cmt[3]) {
                                case 1:
                                ?>
                                <span class="cmt-star">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                </span>
                                <?php
                                  break;
                                  case 2:
                                    ?>
                                <span class="cmt-star">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                </span>
                                <?php
                                    break;
                                    case 3:
                                      ?>
                                <span class="cmt-star">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                </span>
                                <?php
                                      break;
                                      case 4:
                                        ?>
                                        <span class="cmt-star">
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </span>
                                        <?php
                                        break;
                                        case 5:
                                          ?>
                                <span class="cmt-star">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                </span>
                                <?php
                                          break;
                                default:
                                  echo "Không đánh giá";
                                  break;
                              } 
                            ?>
                        </a>
                        </a>
                      </span>
                    </div>
                    <p class="comment-content"><?= $cmt[2] ?>
                    </p>
                  
                  </div>

                </li>
                <?php } ?>
               </ol>

            </div>
          </div>



      </div>
 <!-- Sidebar -->
 <div class="col-md-4 col-sm-12 col-12 clear-right">
        <div class="side-bar mb-3">
          <h2 class="widget-title">
            <span>Thông tin</span>
          </h2>
          
          <div class="job-info-wrap">
            <div class="job-info-list">
              <div class="row">
                <div class="col-sm-4">
                  <span class="ji-title">Nơi làm việc:</span>
                </div>
                <div class="col-sm-8">
                  <span class="ji-main"><?= $job[18] ?></span>
                </div>
              </div>
            </div>

            <div class="job-info-list">
              <div class="row">
                <div class="col-sm-4">
                  <span class="ji-title">Mail ứng tuyển:</span>
                </div>
                <div class="col-sm-8">
                  <span class="ji-main"><?= $job[2] ?></span>
                </div>
              </div>
            </div>

            <div class="job-info-list">
              <div class="row">
                <div class="col-sm-4">
                  <span class="ji-title">Lương:</span>
                </div>
                <div class="col-sm-8">
                  <span class="ji-main"><?= $job[7] ?> <?= $job[9] ?> - <?= $job[8] ?> <?= $job[9] ?></span>
                </div>
              </div>
            </div>

            <div class="job-info-list">
              <div class="row">
                <div class="col-sm-4">
                  <span class="ji-title">Hạn nộp:</span>
                </div>
                <div class="col-sm-8">
                  <span class="ji-main"><?= $job[12] ?></span>
                </div>
              </div>
            </div>

            <div class="job-info-list">
              <div class="row">
                <div class="col-sm-4">
                  <span class="ji-title">Ngành nghề:</span>
                </div>
                <div class="col-sm-8">
                  <span class="ji-main">
                    <?php 
                        $numItems = count($dataCareers);
                        $i = 0;
                        foreach($dataCareers as $career) { 
                            if(++$i === $numItems) {
                                echo $career[0].".";
                            } else {
                                echo $career[0].", "; 
                            }
                        } 
                    ?>
                  </span>
                </div>
              </div>
            </div>

            <div class="job-info-list">
              <div class="row">
                <div class="col-sm-4">
                  <span class="ji-title">Số lượng tuyển:</span>
                </div>
                <div class="col-sm-8">
                  <span class="ji-main"><?= $job[5] ?></span>
                </div>
              </div>
            </div>

            <div class="job-info-list">
              <div class="row">
                <div class="col-sm-4">
                  <span class="ji-title">Kinh nghiệm:</span>
                </div>
                <div class="col-sm-8">
                  <span class="ji-main"><?= $job[6] ?> năm</span>
                </div>
              </div>
            </div>
          </div>


        </div>

        <div class="side-bar mb-3">
          <h2 class="widget-title">
            <span>Giới thiệu công ty</span>
          </h2>
          <div class="company-intro">
            <a href="#">
              <img src="Assets/upload/company_image/<?= $job[22] ?>" class="job-logo-ima" alt="job-logo">
            </a>
          </div>
            <h2 class="company-intro-name"><?= $job[19] ?></h2>
            <ul class="job-add">
              <li>
                <i class="fa fa-map-marker ja-icn"></i>
                <span>Trụ sở: <?= $job[20] ?> </span>
              </li>
              <li>
                <i class="fa fa-bar-chart ja-icn"></i>
                <span>Quy mô công ty: <?= $job[21] ?> người</span>
              </li>
            </ul>

            <div class="wrap-comp-info mb-2">
              <a href="?c=Company&a=About&id=<?= $job[23] ?>" class="btn btn-primary btn-company">Xem thêm</a>
            </div>
        </div>

<!-- custom input file  -->
<style>
  .recuitment-form b {
    font-weight: bold;
  }
  input.form-control.iptt:focus {
    outline: none;
    box-shadow: none;
  }
  input.form-control.iptt {
    border: none;
    margin-top: 17px;
    background: #cccccc24;
  }
  .input-file-container {
    position: relative;
    width: 100%;
    text-align: center;
    border-radius: 3px;
  }
  .js .input-file-trigger {
    display: block;
    padding: 14px 45px;
    background: #39d2b4;
    color: #fff;
    font-size: 1em;
    transition: all 0.4s;
    cursor: pointer;
  }
  .js .input-file {
    position: absolute;
    top: 0;
    left: 0;
    width: 225px;
    opacity: 0;
    padding: 14px 0;
    cursor: pointer;
  }
  .js .input-file:hover + .input-file-trigger,
  .js .input-file:focus + .input-file-trigger,
  .js .input-file-trigger:hover,
  .js .input-file-trigger:focus {
    background: #34495e;
    color: #39d2b4;
  }
  .file-return {
    margin: 0;
  }
  .file-return:not(:empty) {
    margin: 1em 0;
  }
  .js .file-return {
    font-style: italic;
    font-size: 0.9em;
    font-weight: bold;
  }
  .js .file-return:not(:empty):before {
    content: "Selected file: ";
    font-style: normal;
    font-weight: normal;
  } /* Useless styles, just for demo styles */

</style>
<script>
document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
button.addEventListener( "keydown", function( event ) {
    if ( event.keyCode == 13 || event.keyCode == 32 ) {
        fileInput.focus();
    }
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});
fileInput.addEventListener( "change", function( event ) {
    the_return.innerHTML = this.value;
});
</script>

<style>
.identify-contact p { line-height: 1.9; margin-bottom: 10px; } .identify-contact input { border: 1px solid #bfcbd9; width: 100%; border-radius: 5px; padding: 10px 10px; } .identify-contact { border: 1px solid #bfcbd9; background: #fffdf3; border-radius: 10px; padding: 20px; margin-bottom: 20px; }
</style>
<?php
    require(ROOT. '/Views/client/_layout/sidebar.php');
    require(ROOT. '/Views/client/_layout/footer.php');
?>
<style>
  .post-info .info-authorImage {
    width: 36px;
    height: 36px;
  }
  .post-info .info-author {
    font-size: 11px;
  }
  .post-info .info-author .info-authorName {
    font-size: 13px;
  }
  .post-info .info-author .info-datePost {
    margin-top: 2px;
  }
  .post-info {
    display: flex;
    display: -webkit-flex;
    justify-content: space-between;
    -webkit-justify-content: space-between;
    align-items: center;
    -webkit-align-items: center;
  }
  .blog-posts article img {
    border-radius: 3px;
    display: inline-block;
    width: 95% !important;
  }
  .info-authorImage img {
    border-radius: 50%;
    display: inline-block;
    width: 100% !important;
  }
  .info-right div {
    width: 16px;
    text-align: right;
    float: right;
    margin-left: 9px;
  }
  .info-right {
    width: 50%;
    float: left;
  }
  .info-left {
    width: 50%;
    float: left;
  }
  .post-info .info-authorImage {
    width: 36px;
    height: 36px;
  }
  .info-authorImage img {
    border-radius: 50%;
    display: inline-block;
    width: 100% !important;
  }
  .post-info .info-authorImage {
    margin-right: 15px;
  }
  .post-info .info-authorImage {
    margin-right: 15px;
    float: left;
  }
  span.info-authorName a {
    display: block;
    color: #4d4d4d;
  }
  span.info-datePost time,
  span.info-datePost a {
    color: #8f8f8f;
  }
  .byline.post-labels a:not(:last-child) {
    margin-right: 7px;
    margin-bottom: 7px;
  }
  .byline.post-labels a {
    display: inline-block;
    padding: 5px 15px;
    position: relative;
    line-height: 20px;
    border-radius: 5px;
    background-color: rgba(0, 0, 0, 0.05);
    color: rgba(0, 0, 0, 0.65);
  }
  .byline.post-labels {
    display: flex;
    display: -webkit-flex;
    flex-wrap: wrap;
    -webkit-flex-wrap: wrap;
    align-items: flex-start;
    -webkit-align-items: flex-start;
    font-size: 13px;
    width: calc(100% - 81px);
    padding-right: 15px;
  }

  .postAuthor {
    display: table;
    width: 100%;
    margin-bottom: 40px;
  }
  .postAuthor > div {
    display: table-cell;
    vertical-align: middle;
  }
  .postAuthor > div:not(:first-child) {
    padding-left: 20px;
  }
  .postAuthor .authorImage {
    width: 80px;
  }
  .postAuthor .authorImage .authorImg {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    overflow: hidden;
  }
  .postAuthor .authorFollow {
    text-align: right;
  }
  .postAuthor .authorFollow a {
    display: inline-block;
    padding: 7px 15px;
    border: 1px solid #e94c39;
    border-radius: 5px;
    font-size: 13px;
  }
  .postAuthor .authorFollow a:hover {
    border-color: #989b9f;
  }
  .postAuthor .authorFollow a:before {
    content: "View";
    display: inline-block;
    margin-right: 4px;
  }
  .postAuthor img {
    border-radius: 50%;
  }
  .postAuthor .author-name {
    font-size: 16px;
    font-weight: 600;
  }
  .postAuthor .author-name:before {
    content: "About Our Company";
    display: block;
    font-size: 12px;
    font-weight: 400;
    margin-bottom: 2px;
    color: #989b9f;
  }
  .postAuthor .author-name span {
    display: inline-block;
    color: #09204c;
  }
  .postAuthor .author-desc {
    font-size: 12px;
    margin-top: 7px;
  }

  .authorImage img {
    border-radius: 50%;
    width: 80px;
    height: 80px;
  }
  .authorImage {
    float: left;
    margin-right: 25px;
  }
  .postAuthor {
    display: table;
    width: 100%;
    margin-bottom: 40px;
    margin-top: 15px;
    border-top: 1px solid #ccc;
    padding-top: 20px;
  }

  /* Post Comment */
  #disqus_thread,
  #showhide-comment {
    margin-top: 25px;
  }
  #showhide-comment + .comments {
    display: none;
  }
  .dummy-comment {
    text-align: center;
  }
  .dummy-comment a,
  .comments .continue a,
  .comments .loadmore a {
    display: block;
    padding: 18px 20px;
    border: 1px solid #e94c39;
    border-radius: 5px;
    font-size: 13px;
  }
  .dummy-comment a:hover,
  .comments .continue a:hover,
  .comments .loadmore a:hover {
    border-color: #989b9f;
  }
  .comments,
  .comments .comment-replybox-thread,
  .comments .comment-form {
    margin-top: 25px;
  }
  .comments p,
  .comments ol {
    margin: 0;
    padding: 0;
    list-style: none;
    -webkit-transition: all 0.2s ease-in;
    transition: all 0.2s ease-in;
  }
  .comments .continue,
  .comments .loadmore {
    margin: 20px auto;
    text-align: center;
  }
  .comments .loadmore.loaded {
    max-height: 0;
    opacity: 0;
    overflow: hidden;
  }
  .comments ol > li {
    list-style-type: none;
    position: relative;
    padding: 20px;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 6px 18px 0 rgba(9, 32, 76, 0.075);
  }
  .comments ol > li:not(:last-child) {
    margin-bottom: 15px;
  }
  .comment .avatar-image-container {
    position: absolute;
    width: 35px;
    height: 35px;
    background: #f2f2f7
      url("data:image/svg+xml,<svg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'><path d='M16,17a8,8,0,1,1,8-8A8,8,0,0,1,16,17ZM16,3a6,6,0,1,0,6,6A6,6,0,0,0,16,3Z' fill='rgba(0,0,0,.1)'/><path d='M23,31H9a5,5,0,0,1-5-5V22a1,1,0,0,1,.49-.86l5-3a1,1,0,0,1,1,1.72L6,22.57V26a3,3,0,0,0,3,3H23a3,3,0,0,0,3-3V22.57l-4.51-2.71a1,1,0,1,1,1-1.72l5,3A1,1,0,0,1,28,22v4A5,5,0,0,1,23,31Z' fill='rgba(0,0,0,.1)'/></svg>")
      center / 18px no-repeat;
    border-radius: 50%;
    overflow: hidden;
  }
  .comment .comment-block {
    position: relative;
  }
  .comment .comment-block .comment-header {
    display: flex;
    display: -webkit-flex;
    flex-wrap: wrap;
    align-items: flex-end;
    -webkit-align-items: flex-end;
    margin: 0 0 15px 45px;
  }
  .comment .comment-block .comment-header .user span,
  .comment .comment-block .comment-header .user a {
    margin-right: 5px;
    font-style: normal;
    font-weight: 600;
    font-size: 13px;
    color: #09204c;
    white-space: nowrap;
  }
  .comment .comment-block .comment-header .datetime {
    display: block;
    width: 100%;
    color: #989b9f;
    margin-top: 2px;
    font-size: 10px;
    font-family: "Segoe UI", Roboto, san-serif;
  }
  .comment .comment-block .comment-header .datetime a,
  .comment .comment-footer .comment-timestamp a {
    color: #989b9f;
  }
  .comment .comment-block .comment-content {
    color: #4d4d4d;
  }
  .comment .comment-block .icon.blog-author {
    display: inline-block;
    vertical-align: top;
    width: 22px;
    margin-right: 5px;
  }
  .comment .comment-block .icon.blog-author:before {
    content: "";
    width: 17px !important;
    height: 17px;
    display: block;
    background: url("data:image/svg+xml,<svg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z' fill='%23519bd6'></path></svg>")
      center left / 16px no-repeat;
  }
  .comment .comment-replybox-single > * {
    margin-top: 15px;
  }
  .comment .comment-replies .inline-thread {
    padding-top: 10px;
    margin-top: 15px;
    border-top: 1px solid rgba(0, 0, 0, 0.03);
  }
  .comment .comment-replies .thread-toggle {
    display: flex;
    display: -webkit-flex;
    align-items: center;
    -webit-align-items: center;
    margin: 0px 0 0 -3px;
    font-size: 13px;
  }
  .comment .comment-replies .thread-toggle a {
    color: #989b9f;
  }
  .comment .comment-replies .thread-toggle .thread-count {
    margin: 0 auto 0 2.5px;
  }
  .comment .comment-replies .thread-toggle .thread-arrow:before {
    content: "";
    display: block;
    position: relative;
    width: 16px;
    height: 16px;
    background: url("data:image/svg+xml,<svg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'><path d='M256 294.1L383 167c9.4-9.4 24.6-9.4 33.9 0s9.3 24.6 0 34L273 345c-9.1 9.1-23.7 9.3-33.1.7L95 201.1c-4.7-4.7-7-10.9-7-17s2.3-12.3 7-17c9.4-9.4 24.6-9.4 33.9 0l127.1 127z' fill='%23989b9f'/></svg>")
      center / 12px no-repeat;
    -webkit-transition: all 0.2s ease-in;
    transition: all 0.2s ease-in;
  }
  .comment .comment-replies .thread-collapsed .thread-arrow:before {
    transform: rotate(-90deg);
    -webkit-transform: rotate(-90deg);
  }
  .comment .comment-replies ol {
    margin-top: 15px;
  }
  .comment .comment-replies ol.thread-collapsed {
    display: none;
  }
  .comment .comment-actions {
    display: flex;
    display: -webkit-flex;
    align-items: center;
    -webkit-align-items: center;
    margin-top: 10px;
    font-size: 13px;
  }
  .comment .comment-actions > * {
    display: block;
  }
  .comment .comment-actions a {
    color: #989b9f;
  }
  .comment .comment-actions .item-control:before {
    content: "\00b7";
    display: inline-block;
    margin: 0 6px;
    color: #989b9f;
  }
  .comment .comment .avatar-image-container {
    width: 30px;
    height: 30px;
  }
  .comment .comment .comment-block {
    margin-left: 40px;
    margin-bottom: 12px;
    padding: 12px 15px 25px;
    background-color: #f1f1f0;
    border-radius: 15px;
    overflow: hidden;
  }
  .comment .comment:last-child .comment-block {
    margin-bottom: 0;
  }
  .comment .comment .comment-block .comment-header {
    display: flex;
    display: -webkit-flex;
    align-items: flex-end;
    -webkit-align-items: flex-end;
    margin: 0 0 10px 0;
  }
  .comment .comment .comment-block .comment-header .datetime {
    display: block;
    align-self: center;
    -webkit-align-self: center;
    width: auto;
    position: relative;
    top: 1px;
    margin: 0 0 0 auto;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  .comment .comment .comment-actions {
    display: block;
    position: absolute;
    bottom: 0;
    right: 0;
    margin: 0;
  }
  .comment .comment .comment-actions span:before {
    display: none;
  }
  .comment .comment .comment-actions a {
    display: block;
    background-color: rgba(0, 0, 0, 0.03);
    padding: 5px 10px;
    font-size: 11px;
    border-radius: 15px 0 10px 0;
    color: #989b9f;
  }
  .comments .comment-thread .comment-replies .continue {
    margin: 10px 0 0 45px;
  }
  .comments .comment-thread .comment-replies .continue a {
    color: #09204c;
    padding: 0;
    border: 0;
    text-align: left;
  }
  .comments .comment-thread .comment-replies .continue a:before {
    content: "";
    display: inline-block;
    position: relative;
    top: 3px;
    margin-right: 5px;
    width: 14px;
    height: 16px;
    background: url("data:image/svg+xml,<svg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'><path d='M444.7 230.4l-141.1-132c-1.7-1.6-3.3-2.5-5.6-2.4-4.4.2-10 3.3-10 8v66.2c0 2-1.6 3.8-3.6 4.1C144.1 195.8 85 300.8 64.1 409.8c-.8 4.3 5 8.3 7.7 4.9 51.2-64.5 113.5-106.6 212-107.4 2.2 0 4.2 2.6 4.2 4.8v65c0 7 9.3 10.1 14.5 5.3l142.1-134.3c2.6-2.4 3.4-5.2 3.5-8.4-.1-3.2-.9-6.9-3.4-9.3z' fill='%2309204C'></path></svg>")
      center / 13px no-repeat;
  }
  #comment-editor-src,
  .comments .comment-form h4 {
    display: none;
  }
  li.comment {
    padding: 17px 13px;
    border-bottom: 1px dashed #cccccc4d;
  }
  .job-explain {
    flex: auto;
  }
  .job-feedback-container {
    padding: 20px;
    border-top: 15px solid #fafafb;
  }
  .success-box img {
    margin-right: 10px;
    display: inline-block;
    vertical-align: top;
  }
  .success-box > div {
    vertical-align: top;
    display: inline-block;
    color: #888;
  }
  .feedback-main textarea {
    width: 100%;
    border: 1px solid #e6e6e6;
    background: #f8f8f87a;
    border-radius: 3px;
    padding: 10px;
  }
  .feedback-main input[type="submit"] {
    border: navajowhite;
    padding: 7px 15px;
    border-radius: 5px;
    background: #2196f3;
    color: #fff;
    font-weight: 600;
    position: relative;
    float: right;
  } /* Rating Star Widgets Style */
  .rating-stars ul {
    list-style-type: none;
    padding: 0;
    -moz-user-select: none;
    -webkit-user-select: none;
  }
  .rating-stars ul > li.star {
    display: inline-block;
  } /* Idle State of the stars */
  .rating-stars ul > li.star > i.fa {
    font-size: 2.5em; /* Change the size of the stars */
    color: #ccc; /* Color on idle state */
  } /* Hover state of the stars */
  .rating-stars ul > li.star.hover > i.fa {
    color: #ffcc36;
  } /* Selected state of the stars */
  .rating-stars ul > li.star.selected > i.fa {
    color: #ff912c;
  }

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    var ratingScore = null;
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
        ratingScore = ratingValue;
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        ratingScore = ratingValue;
    }
    responseMessage(msg,ratingScore);
    
  });
  
  
});


function responseMessage(msg,ratingScore) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
  $('.success-box div.text-score').html(ratingScore);
  $('#rateScore').val(ratingScore);
}
</script>

<style>.avatar-image-container img { width: 100%; height: 100%; } span.cmt-star { color: #FF9800; font-size: 10px; }</style>