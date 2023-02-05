<?php 
    require(ROOT. '/Views/admin/_layout/sidebar.php');
    require(ROOT. '/Views/admin/_layout/navbar.php');
?>

<?php
// Kiểm tra quyền
require(ROOT. '/Common/checkrole.php');
foreach($data_check_role as $userrole) {
    if($userrole[0] == "Administrator") { 

?>


    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Profile</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Quản lý tài khoản</h5>
                        <a href="?c=Career&a=Create" data-toggle="modal" data-target="#adminProfile" class="btn-sm btn-primary float-right"><i class="feather icon-edit"></i> Cập Nhật</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                            <form action="?c=User&a=AdminUpdateAvatar" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $user2[0] ?>" name="id" />
                                <div id="ImgPreview" class="img">
                                    <img id="blah" src="Assets/upload/user_avatar/<?= $user2[11] ?>">
                                    <input type="file" name="UserAvatar2" id="imgInp" class="custom-fileinput">
                                    <label class="lbcfip">Chọn ảnh ...</label>
                                    <input type="submit" id="sbAvatar" value="✓" style="display: none;">
                                </div>
                            </form>
                            </div>
                            <div class="col-md-8 col-xs-12">
          <div class="row">
            <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="form-group">
                <label for="FamilyName" class="required" aria-required="true">Họ và tên
                </label>
              </div>
            </div>
            <div class="col-lg-9 col-sm-8 col-xs-12">
              <div class="form-group">
                <span id="span-name" class="span-display" style="display: block;"><?= $user2[7] ?>
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="form-group">
                <label for="BirthYear">Ngày sinh
                </label>
              </div>
            </div>
            <div class="col-lg-9 col-sm-8 col-xs-12">
              <div class="form-group">
                <span id="span-birthday" class="span-display" style="display: block;"><?= $user2[8] ?>
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="form-group">
                <label for="text" class="required" aria-required="true">Số điện thoại
                </label>
              </div>
            </div>
            <div class="col-lg-9 col-sm-8 col-xs-12">
              <div class="form-group">
                <span id="span-phone" class="span-display" style="display: block;"><?= $user2[4] ?>
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="form-group">
                <label for="EmailAddress" class="required" aria-required="true">Địa chỉ Email
                </label>
              </div>
            </div>
            <div class="col-lg-9 col-sm-8 col-xs-12">
              <div class="form-group">
                <span id="span-email" class="span-display" style="display: block;"><?= $user2[1] ?>
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="form-group">
                <label for="EmailAddress" class="required" aria-required="true">Giới tính
                </label>
              </div>
            </div>
            <div class="col-lg-9 col-sm-8 col-xs-12">
              <div class="form-group">
                <span id="span-email" class="span-display" style="display: block;"><?php if($user2[9] == 1) {echo "Nữ";} else if($user2[9] == 0) {echo "Nam";} ?>
                </span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="form-group">
                <label for="EmailAddress" class="required" aria-required="true">Địa chỉ
                </label>
              </div>
            </div>
            <div class="col-lg-9 col-sm-8 col-xs-12">
              <div class="form-group">
                <span id="span-email" class="span-display" style="display: block;"><?= $user2[10] ?>
                </span>
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

<!-- Modal -->
<div class="modal fade" id="adminProfile" tabindex="-1" role="dialog" aria-labelledby="adminProfile" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form action="?c=User&a=UpdateAdminProfile" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="adminProfile">Cập nhật tài khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <input type="hidden" name="id" value="<?= $user2[0] ?>"/>
            <div class="row">
                <div class="col-md-6 pr-0">
                    <div class="form-group">
                        <label class="control-label">First Name</label>
                        <input name="FirstName" class="form-control iptt" value="<?= $user2[5] ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Last Name</label>
                        <input name="LastName" class="form-control iptt" value="<?= $user2[6] ?>" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input disabled name="Email" class="form-control iptt" value="<?= $user2[1] ?>" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Phone</label>
                        <input name="Phone" class="form-control iptt" value="<?= $user2[4] ?>" />
                    </div>
                </div>
                <div class="col-md-6 pr-0">
                    <div class="form-group">
                        <label class="control-label">Birth</label>
                        <input type="date" name="Birth" class="form-control iptt" value="<?= $user2[8] ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Gender</label>
                        <select name="Gender" class="form-control iptt">
                            <option value="">Chọn giới tính</option>
                            <option <?php if($user2[9] == 0) echo "selected"; ?> value="0">Nam</option>
                            <option <?php if($user2[9] == 1) echo "selected"; ?> value="1">Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <input name="Address" class="form-control iptt" value="<?= $user2[10] ?>" />
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Cập Nhật Tài Khoản</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php 
    require(ROOT. '/Views/admin/_layout/footer.php');
?>


<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} ?>

<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah2').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
  $("#sbAvatar").attr('style','display: block');
});

$("#imgInp2").change(function() {
  readURL2(this);
  $("#sbAvatar2").attr('style','display: block');
});
</script>

 <!-- custom input file  -->
<style>
.lbcfip, .lbcfip2 {cursor: pointer; background: #3F51B5; color: #fff; padding: 4px 14px; border-radius: 3px; text-align: center; font-size: 12px; z-index: -1; margin-top: -25px; display: block; width: 100px; }.custom-fileinput { opacity: 0; border: 1px solid; margin-top: 10px; cursor: pointer; z-index: 2; }
#sbAvatar, #sbAvatar2 { border: none; position: absolute; top: 0; right: 0; background: #3F51B5; color: #fff; border-radius: 50%; width: 23px; height: 22px; text-align: center; }
.row.rowdiv { border-bottom: 1px dashed #ccc; margin-bottom: 45px; padding-bottom: 45px; }
.user--profile-right .user--profile-title-group { display: block; font-weight: 600; font-size: 14px; color: #919191; margin-bottom: 25px; }.img2div { width: 100px; height: 100px; overflow: hidden; display: flex; justify-content: center; align-items: center;box-shadow: 0px 0px 18px #cccccc42; border-radius: 3px; border: 1px solid #cccccc3b; } img#blah2 { width: 100%; height: auto; border-radius: 0; border: none; }
img#blah { width: 150px; height: 150px; border-radius: 50%; } input#sbAvatar { left: 120px; }
</style>