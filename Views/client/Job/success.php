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
<!-- Phần thân -->
<div class="wrapper">
  <div class="container">
    <div class="row">
      <!-- Main wrapper -->
      <div class="col-md-12 col-sm-12 col-12 clear-left">
        <div class="main-wrapper">
        <div class="complete-redirect-page bg-white box_shadow text-center pd-20">
                    <h2 class="color-ed145b fs-30 fw-700 mb-10">
                        Chúc mừng bạn đã ứng tuyển việc làm thành công.
                    </h2>
                    <p class="fs-16">Nhà tuyển dụng sẽ kiểm tra thông tin của bạn và liên hệ bạn sớm nhất!</p>
                    <div class="btn-actions mt-20 mb-20 fs-12">
                        <a href="/techjob" class="btn bg-main color-white ph-30 mr-10">
                            Về trang chủ
                        </a>
                        <a href="/techjob" class="btn bg-ed145b color-white ph-30">
                            Tìm việc làm
                        </a>
                    </div>
                </div>
        </div>
      </div>

<style>
h2.color-ed145b.fs-30.fw-700.mb-10 { color: #ed145b; margin: 40px 20px; }.btn-actions.mt-20.mb-20.fs-12 { margin: 25px; }</style>

<style>
.identify-contact p { line-height: 1.9; margin-bottom: 10px; } .identify-contact input { border: 1px solid #bfcbd9; width: 100%; border-radius: 5px; padding: 10px 10px; } .identify-contact { border: 1px solid #bfcbd9; background: #fffdf3; border-radius: 10px; padding: 20px; margin-bottom: 20px; }
</style>
<?php 
    // require(ROOT. '/Views/client/_layout/sidebar.php');
    require(ROOT. '/Views/client/_layout/footer.php');
?>