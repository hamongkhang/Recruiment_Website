<?php 
    require(ROOT. '/Views/client/_layout/header.php');
    if(isset($_SESSION['login_user'])){
        $user = $_SESSION['login_user']; 
        $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

        $query = "SELECT users.id, users.full_name, users.user_type FROM users WHERE email = '$user'";
        $result = $mysqli->query($query);
        $data = $result->fetch_all();
        $user_id = $data[0];
    }
    
?>

<?php
// Kiểm tra quyền
require(ROOT. '/Common/checkrole.php');
foreach($data_check_role as $userrole) {
  if($userrole[0] == "Client") { ?>

<!-- published recuitment -->
<div class="container-fluid published-recuitment-wrapper">
  <div class="container published-recuitment-content">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-12 recuitment-inner">
        <div class="recuitment-form">
            <h3 class="rect-heading" style="font-size: 18px; padding-left: 22px; font-weight: 500;">Hồ sơ</h3>
            <!-- <a href="?c=User&a=UpdateProfile" class="btn-sm btn-primary float-right" style="margin-top: -45px"><i class="fa fa-user mr-2"></i>Cập Nhật Tài Khoản</a> -->
            <div class="user--profile-right">
  <div class="user--profile-group">
    <h2 class="user--profile-title-group">Thông tin
    </h2>
    <!-- <form class="" method="post" id="frm-info" novalidate="novalidate"> -->
      <div class="row rowdiv">
        <div class="col-md-3 col-xs-12">
          <div class="row">
          <form action="?c=User&a=UpdateAvatar" method="POST" enctype="multipart/form-data">
          <input type="hidden" value="<?= $user2[0] ?>" name="id" />
            <div id="ImgPreview" class="img">
              <img id="blah" src="Assets/upload/user_avatar/<?= $user2[11] ?>">
              <input type="file" name="UserAvatar2" id="imgInp" class="custom-fileinput">
              <label class="lbcfip">Chọn ảnh ...</label>
              <input type="submit" id="sbAvatar" value="✓" style="display: none;">
            </div>
            </form>
          </div>

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
        <div class="col-md-1">
          <p style="float: right;">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#editInformation">
              <i class="fa fa-edit" id="edit-pencil-info">
              </i>
            </a>
          </p>
        </div>
      </div>



    <!-- </form> -->
    <h2 class="user--profile-title-group" style="margin-bottom: -10px;">Kinh nghiệm
    </h2>
    <div class="row">
    <a href="javascript:void(0)" data-toggle="modal" data-target="#addExperience" style="float: right; display: block; text-align: center; width: 25px; height: 25px; position: relative; right: -91%; background: #3F51B5; border-radius: 50%; line-height: 27px; color: #fff;">
        <span class="fa fa-plus"></span>
    </a>
      <div class="col-md-12">
      <?php foreach($dataExperiences as $exp) { ?>
      <div class="user_exp_edu Experience_11642 div-exp-height">
        <div class="row">
          <div class="col-md-12">
            
            <div class="form-group">
              <label for="Position" id="LabelPosition_11642" class="required edu-exp-label">Chức danh công việc
              </label>
              <span id="span-Position-11642" class="span-display-education-univer" style="display: block;"><?= $exp[1] ?>
              </span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="CompanyName" id="LabelCompanyName_11642" class="required edu-exp-label">Tên công ty
              </label>
              <span id="span-CompanyName-11642" class="span-display-education" style="display: block;"><?= $exp[2] ?>
              </span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label for="FromDateExp" id="LabelFromDateExp_11642" class="required edu-exp-label" style="display: none;">Từ
              </label>
              <label id="LabelWorkingTime_11642" class="required edu-exp-label" style="display: block;">Thời gian làm việc
              </label>
              <span id="span-time-Exp-11642" class="span-display-education" style="display: block;"><?= $exp[4] ?> - <?= $exp[5] ?>
              </span>      </div>
          </div>
        
        </div>

        <div class="row">
          <div class="col-md-12">
            <hr class="break-line">
          </div>
        </div>
      </div>
      <?php } ?>
      

      </div>

      
    </div>

    <!-- </form> -->
    <h2 class="user--profile-title-group" style="margin-bottom: -10px;">Kỹ năng
    </h2>
    <div class="row">
    <a href="javascript:void(0)" data-toggle="modal" data-target="#addSkill" style="float: right; display: block; text-align: center; width: 25px; height: 25px; position: relative; right: -91%; background: #3F51B5; border-radius: 50%; line-height: 27px; color: #fff;">
        <span class="fa fa-plus"></span>
    </a>
      <div class="col-md-12">
      <?php foreach($dataSkills as $skill) { ?>
      <div class="user_exp_edu Experience_11642 div-exp-height">
        <div class="row">
          <div class="col-md-6">
            <?= $skill[0] ?>
          </div>
          <div class="col-md-6">
            <?php
              switch ($skill[1]) {
                case 1:
                  ?>
                  <span style="color: #ffc107">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                  </span> 
                  <?php
                  break;
                  case 2:
                    ?>
                    <span style="color: #ffc107">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                    </span> 
                    <?php
                    break;
                    case 3:
                      ?>
                      <span style="color: #ffc107">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                      </span> 
                      <?php
                      break;
                      case 4:
                        ?>
                        <span style="color: #ffc107">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                        </span> 
                        <?php
                        break;
                        case 5:
                          ?>
                          <span style="color: #ffc107">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </span> 
                          <?php
                          break;
                          case 0:
                            ?>
                            <span style="color: #ffc107">
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                            </span> 
                            <?php
                            break;
                default:
                  
                  break;
              } 
            ?>
            
          </div>
        </div>


        <div class="row">
          <div class="col-md-12">
            <hr class="break-line">
          </div>
        </div>
      </div>
      <?php } ?>
      

      </div>

      
    </div>

    <!-- <div class="row">
      <div class="col-md-3">
        <span id="add-experience" onclick="genSingleExperience()" style="cursor: pointer">
          <i class="cl-icon-plus-circle-full add-education-img">
          </i>
        </span>
      </div>
    </div> -->
    <form id="frm-experience">
      <div id="experience-section">
      </div>
    </form>
  
  </div>
</div>

      </div>
      </div>
      <div class="col-md-4 col-sm-12 col-12">
<!-- MODAL  -->
<!-- Modal edit info -->
<div class="modal fade" id="editInformation" tabindex="-1" role="dialog" aria-labelledby="editInformation" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editInformation">Cập nhập thông tin tài khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?c=User&a=UpdateProfile" method="POST">
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
            <button class="btn btn-primary" type="submit">Cập Nhật Tài Khoản</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit info COMPANY -->
<div class="modal fade" id="infoCompany" tabindex="-1" role="dialog" aria-labelledby="infoCompany" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoCompany">Cập nhập thông tin công ty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?c=User&a=UpdateCompanyInfo" method="POST">
        <input type="hidden" name="id" value="<?= $user2[13] ?>"/>
        <input type="hidden" name="uid" value="<?= $user2[0] ?>"/>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input name="Name" class="form-control iptt" value="<?= $user2[14] ?>"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Company size</label>
                        <input type="number" name="Size" class="form-control iptt" value="<?= $user2[20] ?>" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Contact Name</label>
                        <input name="ContactName" class="form-control iptt" value="<?= $user2[22] ?>" />
                    </div>
                </div>
                <div class="col-md-6 pr-0">
                    <div class="form-group">
                        <label class="control-label">Website</label>
                        <input name="Website" class="form-control iptt" value="<?= $user2[19] ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Province/City</label>
                        <select name="ProvinceId" class="form-control iptt">
                            <option value="">Choose province</option>
                            <?php
                            $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');
                            $query = "SELECT * FROM provinces";
                            $result = $mysqli->query($query);
                            $provinceData = $result->fetch_all();

                            foreach ($provinceData as $province){
                            ?>
                                <option <?php if($province[0] == $user2[21]) {echo "selected";} ?> value="<?=$province[0]?> "> <?=$province[1]?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <input name="Address" class="form-control iptt" value="<?= $user2[18] ?>" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Introduction</label>
                        <textarea name="Introduction" class="form-control iptt"><?= $user2[15] ?></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Cập Nhật Tài Khoản</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal add experience-->
<div class="modal fade" id="addExperience" tabindex="-1" role="dialog" aria-labelledby="addExperience" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addExperience">Thêm kinh nghiệm làm việc</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?c=User&a=AddExperience" method="POST">
        <input type="hidden" name="id" value="<?= $user2[0] ?>"/>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Tên chức vụ</label>
                        <input name="Name" class="form-control iptt" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Tên công ty</label>
                        <input name="CompanyName" class="form-control iptt" />
                    </div>
                </div>
                <div class="col-md-6 pr-0">
                    <div class="form-group">
                        <label class="control-label">Ngày bắt đầu</label>
                        <input type="date" name="DateBegin" class="form-control iptt"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Ngày kết thúc</label>
                        <input type="date" name="DateEnd" class="form-control iptt"/>
                    </div>
                </div>
                
                
            </div>
            <button class="btn-sm btn-primary" type="submit">Thêm mới</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal add skill-->
<div class="modal fade" id="addSkill" tabindex="-1" role="dialog" aria-labelledby="addSkill" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSkill">Thêm kỹ năng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?c=User&a=AddSkill" method="POST">
        <input type="hidden" name="id" value="<?= $user2[0] ?>"/>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Tên kỹ năng</label>
                        <input name="Name" class="form-control iptt" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Mức độ</label>
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="range-slider">
                    <input class="range-slider__range" type="range" value="0" min="1" max="5" step="1" name="Level">
                    <span class="range-slider__value">0</span>
                  </div>
                </div>
                
            </div>
            <button class="btn-sm btn-primary" type="submit">Thêm mới</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- slider range  -->
<script>
var rangeSlider = function(){
  var slider = $('.range-slider'),
      range = $('.range-slider__range'),
      value = $('.range-slider__value');
    
  slider.each(function(){

    value.each(function(){
      var value = $(this).prev().attr('value');
      $(this).html(value);
      
    });

    range.on('input', function(){
      $(this).next(value).html(this.value);
    });
  });
 
};

rangeSlider();</script>
<style>
.range-slider { margin: 60px 0 0 0%; } .range-slider { width: 100%; } .range-slider__range { -webkit-appearance: none; width: calc(100% - (73px)); height: 10px; border-radius: 5px; background: #d7dcdf; outline: none; padding: 0; margin: 0; } .range-slider__range::-webkit-slider-thumb { -webkit-appearance: none; appearance: none; width: 20px; height: 20px; border-radius: 50%; background: #2c3e50; cursor: pointer; -webkit-transition: background 0.15s ease-in-out; transition: background 0.15s ease-in-out; } .range-slider__range::-webkit-slider-thumb:hover { background: #1abc9c; } .range-slider__range:active::-webkit-slider-thumb { background: #1abc9c; } .range-slider__range::-moz-range-thumb { width: 20px; height: 20px; border: 0; border-radius: 50%; background: #2c3e50; cursor: pointer; -moz-transition: background 0.15s ease-in-out; transition: background 0.15s ease-in-out; } .range-slider__range::-moz-range-thumb:hover { background: #1abc9c; } .range-slider__range:active::-moz-range-thumb { background: #1abc9c; } .range-slider__range:focus::-webkit-slider-thumb { box-shadow: 0 0 0 3px #fff, 0 0 0 6px #1abc9c; } .range-slider__value { display: inline-block; position: relative; width: 60px; color: #fff; line-height: 20px; text-align: center; border-radius: 3px; background: #2c3e50; padding: 5px 10px; margin-left: 8px; } .range-slider__value:after { position: absolute; top: 8px; left: -7px; width: 0; height: 0; border-top: 7px solid transparent; border-right: 7px solid #2c3e50; border-bottom: 7px solid transparent; content: ""; }
.range-slider { margin: 0; }
</style>

<style>
b { font-weight: bolder; }.cover-data-img img { height: 110%; width: auto; } .cover-data-img { width: 70px; height: 40px; overflow: hidden; border-radius: 5px; display: flex; justify-content: center; align-items: center; text-align: center; }</style>

<?php 
    require(ROOT. '/Views/client/_layout/sidebar.php');
    require(ROOT. '/Views/client/_layout/footer.php');
?>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<style>
#frm-info .col-md-9 .row{display:flex;align-items:center;justify-content:center;vertical-align:middle}.user--profile{background:#fff}.user--profile .span-display{overflow:hidden;white-space:nowrap;text-overflow:ellipsis}.user--profile .form-control[readonly]{background-color:#fff}#span-summary{white-space:pre-line}#frm-info #span-achievement{list-style:none;margin:0 0 0 -8%;padding:0 0 0 10px;text-align:left}#frm-info #span-achievement li{margin-left:10px}#frm-info #span-achievement i{color:#86a1a7;font-size:13px;position:absolute;left:-4%;margin-top:3px}#frm-info #span-achievement span{color:#333}#frm-info #more-achievement{font-style:italic;color:#898989;display:block;margin-top:10px;margin-left:-8%}#frm-info #more-achievement:hover{cursor:pointer;text-decoration:underline}.user--profile-left .user--profile--list-function{list-style:none;padding:30px 30px}.user--profile-left .user--profile--list-function li{margin-bottom:14px}.user--profile-left .user--profile--list-function li a{color:#333;font-size:14px;line-height:16px}.user--profile-left .user--profile--list-function li.active a,.user--profile-left .user--profile--list-function li a:hover{font-weight:bold;color:#4d96ff;text-decoration:none}.user--profile .user--profile-right-container{background:#f1f1f1}.user--profile-group{background:#fff;padding:30px}.user--profile-right .user--profile-title-group{padding:0;margin:0;color:#4d96ff;font-size:24px;font-weight:bold;line-height:28px;margin-bottom:20px}.user--profile-right.editing .form-group{margin-bottom:30px}.user--profile-right .form-group label{color:#898989;font-size:14px;line-height:16px;font-weight:normal}.user--profile-right .form-group label.error{color:#f00}.user--profile-right .btn-save,.user--profile-right .btn-save:focus,.user--profile-right .btn-save:active{height:45px;width:167px;border-radius:31.5px;background-color:#4d96ff;color:#fff;font-size:14px;font-weight:500;line-height:34px;text-align:center;outline:none}.user--profile-right .btn-save.btn-success:focus,.user--profile-right .btn-save.btn-success:active{background-color:#4d96ff;border-color:#4d96ff;color:#fff}.user--profile-right .btn-save:hover,.user--profile-right .btn-save:active{border:1px solid #4d96ff;border-radius:33px;box-shadow:0 10px 10px 0 #d1e6ff;color:#4d96ff;background:#fff}.user--profile-right .btn-save.disabled{background-color:#c8c8c8;border-color:#c8c8c8;color:#fff}.select2-container--bootstrap .select2-selection--single .select2-selection__rendered{margin-top:6px}#ImgPreview.no-img{width:100px;height:100px;border:1px solid #d8d8d8;border-radius:50%;float:left;margin:0 15px 0 15px;text-align:center;line-height:100px;background-image:url("../../../Images/code-learn/img-preview-bg.png");background-color:#d8d8d8;background-position:center center;background-repeat:no-repeat}#ImgPreview.img{float:left;margin:0 15px 20px 15px}#ImgPreview img{width:100px;height:100px;border-radius:50%;border:1px solid #d8d8d8}.avatar-selector{padding:0 15px;text-align:center}.UploadAvatar{margin-top:20px;width:100px}.UploadAvatar label{color:#000 !important}.UploadAvatar::after{content:"";clear:both}.UploadAvatar .browse{height:35px;width:104px;border-radius:3px !important;background-color:#4d96ff !important;border:none;color:#fff}.UploadAvatar .browse:hover,.UploadAvatar .browse:active{background-color:#fff !important;border:1px solid #4d96ff;color:#4d96ff}.UploadAvatar label.redColor{color:#f00 !important}.add-education-img{height:32px;width:26px;color:#4d96ff;font-family:Ionicons;font-size:26px;font-weight:500;line-height:35px;margin-top:0%;margin-bottom:11%}.experience-checkbox{height:18px;width:18px;color:#898989;font-family:Ionicons;font-size:18px;font-weight:500;line-height:20px;margin-left:-9% !important;vertical-align:middle;margin-top:0 !important;float:left}.experience-checkbox-label{height:16px;width:111px;font-style:italic;margin-bottom:0;margin-left:5px;color:#898989;font-size:14px;line-height:16px;font-weight:normal}.user--profile-right .btn-cancel{color:#000;font-size:14px;font-weight:500;line-height:34px;text-align:center;height:37px;width:100px;border:1px solid #c8c8c8;border-radius:3px;background-color:#fff}.user--profile-right .btn-cancel:hover,.user--profile-right .btn-cancel:active{border:1px solid #4d96ff;border-radius:33px;box-shadow:0 10px 10px 0 #d1e6ff;color:#4d96ff !important;background:#fff}.user--profile-right .btn-cancel.disabled{background-color:#c8c8c8;border-color:#c8c8c8;color:#fff}.view-only-info{border:0 !important;background:transparent !important;box-shadow:0 0 0 0 !important}.disable-button{cursor:not-allowed !important;opacity:.65 !important;box-shadow:none !important}select.ui-datepicker-month{width:110px !important}.ui-datepicker{width:270px}.span-display{height:16px;color:#333;font-size:14px;line-height:16px}#CountrySelect.hide+*,#StateSelect.hide+*{display:none}#frm-info.init input,#frm-info.init select,#frm-info.init textarea,#frm-info.init button,#frm-info.init .UploadAvatar{display:none}@media(min-width:1024px){.span-display-margin{margin-left:-8%}}.span-display-education-univer{width:400px;height:16px;color:#333;max-width:100%;font-size:14px;line-height:16px}.span-display-education{height:16px;width:312px;color:#333;max-width:100%;font-size:14px;line-height:16px}.user_exp_edu .btn-cancel{color:#000;font-size:14px;font-weight:500;line-height:34px;text-align:center;height:37px;width:100px;border:1px solid #c8c8c8;border-radius:3px;background-color:#fff}.user_exp_edu .btn-cancel:hover,.user_exp_edu .btn-cancel:active{border:1px solid #4d96ff;border-radius:33px;box-shadow:0 10px 10px 0 #d1e6ff;color:#4d96ff !important;background:#fff}.user_exp_edu .btn-cancel.disabled{background-color:#c8c8c8;border-color:#c8c8c8;color:#fff}.curent-job-label{color:#898989;font-size:14px;line-height:16px;font-weight:normal}.pencil-class{margin-top:-36px}.edu-exp-label{height:16px;width:160px;font-size:14px;font-style:italic;line-height:16px}.break-line{box-sizing:border-box;height:1px;width:788px;border:1px dotted #ddd}@media only screen and (max-width:990px){.user--profile{margin-bottom:0}}@media(max-width:992.98px){#frm-info{position:relative}#frm-info .col-md-1{position:absolute;right:0;top:-45px}}@media(max-width:556px){#frm-info .col-md-9 .row{flex-wrap:wrap;margin-bottom:15px}#frm-info .col-md-9 .row .form-group{margin-bottom:5px}.user--profile .span-display:empty{display:none !important}.user--profile-right .form-group label{width:auto;text-align:left}.form-group{width:100%;display:inline-block}.form-group button.btn:last-child{margin-right:0}}.break-line{max-width:100%}.file{visibility:hidden;position:absolute}.input-sm{background-color:#fff;color:#333;border:1px solid #ccc;padding:4px 10px}.select2-container--bootstrap .select2-dropdown{z-index:1}
.user--profile-right .user--profile-title-group { padding: 0; margin: 0; color: #2196F3; font-size: 17px; font-weight: bold; line-height: 28px; margin-bottom: 9px; }table {
    color: #000000!important;
    font-size: 13px;
}table thead { background: #0065d1; color: #fff; border: none; }a.paginate_button.current { background: #fff!important; color: #fff!important; border: none; border-radius: 50%!important; width: 35px; height: 35px; display: flex; text-align: center; justify-content: center; align-items: center; }table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1,table.dataTable.display tbody tr:hover>.sorting_1, table.dataTable.order-column.hover tbody tr:hover>.sorting_1,table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd { background-color: #ffffff!important; }</style>

<!-- Preview image before upload  -->
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
</style>

<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} ?>