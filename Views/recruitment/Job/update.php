<?php 
    require(ROOT. '/Views/recruitment/_layout/header.php');
    if(isset($_SESSION['login_user'])){
        $user = $_SESSION['login_user']; 
        $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

        $query = "SELECT users.id, users.full_name FROM users WHERE email = '$user'";
        $result = $mysqli->query($query);
        $data = $result->fetch_all();
        $user_id = $data[0];

    }
?>

<?php
// Kiểm tra quyền
require(ROOT. '/Common/checkrole.php');
foreach($data_check_role as $userrole) {
  if($userrole[0] == "Recruitment") { ?>
<!-- published recuitment -->
<div class="container-fluid published-recuitment-wrapper">
  <div class="container published-recuitment-content">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-12 recuitment-inner">
      <form class="recuitment-form" method="POST" action="?c=Job&a=RequestUpdate" id="registration" enctype="multipart/form-data">
      <input type="hidden" value="<?= $user_id[0] ?>" name="CreatedBy">
      <input type="hidden" value="<?=$jobitem[0]?>" name="id">
<div class="accordion" id="accordionExample">
  <div class="card recuitment-card">
    <div class="card-header recuitment-card-header" id="headingOne">
      <h2 class="mb-0">
        <a class="btn btn-link btn-block text-left recuitment-header" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <?=$jobitem[1]?>
          <span id="clickc1_advance2" class="clicksd">
            <i class="fa fa fa-angle-up"></i>
          </span>
        </a>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body recuitment-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label text-right label">Tiêu đề<span style="color: red" class="pl-2">*</span></label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="Position" value="<?=$jobitem[1]?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label text-right label">Email ứng tuyển<span style="color: red" class="pl-2">*</span></label>
          <div class="col-sm-9">
            <input type="email" class="form-control" placeholder="techjob@gmail.com" name="ApplicationEmail" value="<?=$jobitem[2]?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label text-right label">Hình ảnh</label>
          <div class="col-sm-9 " >
            <div class="imgwrap" style="height: 200px; overflow: hidden; display: flex; justify-content: center; align-items: center; border-radius: 5px;">
                <img src="Assets/upload/job_image/<?=$jobitem[3]?>" style="width: 100%; height: auto;">
            </div>
            <a href="#" data-toggle="modal" data-target="#uploadImage">Đổi ảnh</a>
            
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label text-right label">Số lượng cần tuyển</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="1" name="Amount" value="<?=$jobitem[5]?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label text-right label">Mô tả công việc<span style="color: red" class="pl-2">*</span></label>
          <div class="col-sm-9">
            <textarea type="text" class="form-control" id="content" placeholder="Nhập mô tả công việc" rows="5" name="Details"><?=$jobitem[4]?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label text-right label">Kinh nghiệm<span style="color: red" class="pl-2">*</span></label>
          <div class="col-sm-9">
            <select type="text" class="form-control" id="jobExperience" name="Experience">
              <option value="">Chọn kinh nghiệm</option>
              <option <?php if($jobitem[6] == 0) { echo "selected"; } else { echo ""; } ?> value="0">Chưa có kinh nghiệm</option>
              <option <?php if($jobitem[6] == 7) { echo "selected"; } else { echo ""; } ?> value="7">Dưới 1 năm</option>
              <option <?php if($jobitem[6] == 1) { echo "selected"; } else { echo ""; } ?> value="1">1 năm</option>
              <option <?php if($jobitem[6] == 2) { echo "selected"; } else { echo ""; } ?> value="2">2 năm</option>
              <option <?php if($jobitem[6] == 3) { echo "selected"; } else { echo ""; } ?> value="3">3 năm</option>
              <option <?php if($jobitem[6] == 4) { echo "selected"; } else { echo ""; } ?> value="4">4 năm</option>
              <option <?php if($jobitem[6] == 5) { echo "selected"; } else { echo ""; } ?> value="5">5 năm</option>
              <option <?php if($jobitem[6] == 6) { echo "selected"; } else { echo ""; } ?> value="6">Trên 5 năm</option>
              <option <?php if($jobitem[6] == 8) { echo "selected"; } else { echo ""; } ?> value="8">Không yêu cầu kinh nghiệm</option>  
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label text-right label">Mức lương</label>
          <div class="col-sm-9 d-flex">
            <input type="number" class="form-control" placeholder="Lương Khoảng Từ" name="SalaryMin" value="<?=$jobitem[7]?>"> <label class="m-1"></label>
            <input type="number" class="form-control" placeholder="Đến" name="SalaryMax" value="<?=$jobitem[8]?>"> <label class="m-1"></label>
            <select type="text" class="form-control" id="jobSalary" name="SalaryUnit">
              <option selected="selected" value="">Chọn đơn vị</option>
              <option <?php if($jobitem[9] == "đ") { echo "selected"; } else { echo ""; } ?> value="đ">VND</option>
              <option <?php if($jobitem[9] == "$") { echo "selected"; } else { echo ""; } ?> value="$">USD</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label text-right label">Giờ làm việc</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="8" name="WorkTime" value="<?=$jobitem[10]?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label text-right label">Nơi làm việc</label>
          <div class="col-sm-9">
            <select type="text" class="form-control" id="jobProvince" name="ProvinceId">
            <?php
                foreach ($provinceData as $province){
            ?>
                <option <?php if($jobitem[13] == $province[0]) { echo "selected"; } else { echo ""; } ?> value="<?=$province[0]?> "> <?=$province[1]?></option>
            <?php
                }
            ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label text-right label">Địa chỉ</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="Address" placeholder="Nhập địa chỉ làm việc" value="<?=$jobitem[11]?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label text-right label">Hạn nộp hồ sơ<span style="color: red" class="pl-2">*</span></label>
          <div class="col-sm-9">
            <input type="date" class="form-control" value="<?=$jobitem[12]?>" name="Deadline">
          </div>
        </div>
        

      </div>
    </div>
  </div>

</div>
<div class="rec-submit">
  <button type="submit" class="btn-submit-recuitment" name="">
    <i class="fa fa-floppy-o pr-2"></i>Lưu Tin
  </button>
</div>
</form>

<!-- Modal -->
<div class="modal fade" id="createCareers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới ngành nghề</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="?c=Job&a=LuuThemMoi" method="POST" id="careerForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input name="Name" class="form-control" placeholder="Tên ngành nghề" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Thêm mới" class="btn btn-primary" />
                </div>
            </form> 
      </div>
    </div>
  </div>
</div>

      </div>
<!-- Modal -->
<div class="modal fade" id="uploadImage" tabindex="-1" role="dialog" aria-labelledby="uploadImage" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="?c=Job&a=ChangeJobThumbnail" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadImage">Thay đổi ảnh</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="id" value="<?=$jobitem[0]?>">
      <div class="modal-body">
      <div id="drop-area">
        
        <input type="file" id="fileElem" name="Thumbnail" multiple accept="image/*" onchange="handleFiles(this.files)">
        <label style="cursor: pointer;" for="fileElem">Tải ảnh lên hoặc kéo thả vào đây</label>
        <progress id="progress-bar" max=100 value=0 class="d-none"></progress>
         <div id="gallery"></div>
     
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save">
      </div>
      </form>
    </div>
  </div>
</div>
<style>
b { font-weight: bolder; }.cover-data-img img { height: 110%; width: auto; } .cover-data-img { width: 70px; height: 40px; overflow: hidden; border-radius: 5px; display: flex; justify-content: center; align-items: center; text-align: center; }</style>
<?php 
    require(ROOT. '/Views/recruitment/_layout/sidebar.php');
    require(ROOT. '/Views/recruitment/_layout/footer.php');
?>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<style>
table {
    color: #000000!important;
    font-size: 13px;
}table thead { background: #0065d1; color: #fff; border: none; }a.paginate_button.current { background: #fff!important; color: #fff!important; border: none; border-radius: 50%!important; width: 35px; height: 35px; display: flex; text-align: center; justify-content: center; align-items: center; }table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1,table.dataTable.display tbody tr:hover>.sorting_1, table.dataTable.order-column.hover tbody tr:hover>.sorting_1,table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd { background-color: #ffffff!important; }</style>
<!-- Editor plugin -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
$(document).ready(function() {
  $('#content').summernote({
        placeholder: 'Nhập nội dung bài viết...',
        tabsize: 1,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
});</script>
<style>.note-btn {font-size: 10px;}</style>


<!-- Multi select  -->
<script src="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Multiple-Select-With-Checkboxes-multi-select-js/jquery.multi-select.js?v2"></script>
<script>
  $('#multiCareers').multiSelect({
            positionMenuWithin: $('.position-menu-within')
        });  
</script>
<style>
    .multi-select-container {
    display: inline-block;
    position: relative;
}

.multi-select-menu {
    position: absolute;
    left: 0;
    top: 0.8em;
    z-index: 1;
    float: left;
    min-width: 100%;
    background: #fff;
    margin: 1em 0;
    border: 1px solid #aaa;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    display: none;
}

.multi-select-menuitem {
    display: block;
    font-size: 0.875em;
    padding: 0.6em 1em 0.6em 30px;
    white-space: nowrap;
}

.multi-select-menuitem--titled:before {
    display: block;
    font-weight: bold;
    content: attr(data-group-title);
    margin: 0 0 0.25em -20px;
}

.multi-select-menuitem--titledsr:before {
    display: block;
    font-weight: bold;
    content: attr(data-group-title);
    border: 0;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}

.multi-select-menuitem + .multi-select-menuitem {
    padding-top: 0;
}

.multi-select-presets {
    border-bottom: 1px solid #ddd;
}

.multi-select-menuitem input {
    position: absolute;
    margin-top: 0.25em;
    margin-left: -20px;
}

.multi-select-button {
    display: inline-block;
    font-size: 0.875em;
    padding: 0.2em 0.6em;
    max-width: 100%;
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    vertical-align: -0.5em;
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    cursor: default;
}
.multi-select-container.multi-select-container--open {
    width: 100%;
}

.multi-select-button:after {
    content: "";
    display: inline-block;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0.4em 0.4em 0 0.4em;
    border-color: #999 transparent transparent transparent;
    margin-left: 0.4em;
    vertical-align: 0.1em;
}

.multi-select-container--open .multi-select-menu {
    display: block;
}

.multi-select-container--open .multi-select-button:after {
    border-width: 0 0.4em 0.4em 0.4em;
    border-color: transparent transparent #999 transparent;
}

.multi-select-container--positioned .multi-select-menu {
    /* Avoid border/padding on menu messing with JavaScript width calculation */
    box-sizing: border-box;
}

.multi-select-container--positioned .multi-select-menu label {
    /* Allow labels to line wrap when menu is artificially narrowed */
    white-space: normal;
}
.multi-select-container {
    width: 100%;
}
.multi-select-menuitem input {
    margin-top: -9px;
}
.multi-select-menu {
    height: 190px;
    overflow: scroll;
    background: #fff;
    z-index: 9998;
}
</style>


<!-- validate js  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#registration").validate({
            // Specify validation rules
            rules: {
                Position: "required",
                Image: "required",
                Amount: "required",
                Details: "required",
                Experience: "required",
                SalaryMin: "required",
                SalaryMax: "required",
                SalaryUnit: "required",
                Careers: "required",
                WorkTime: "required",
                ProvinceId: "required",
                Address: "required",
                Deadline: "required",
                ApplicationEmail: {
                    required: true,
                    email: true
                },
            },
            messages: {
                Position: "Hãy nhập vị trí công việc",
                Image: "Hãy chọn hình ảnh",
                Amount: "Hãy nhập số lượng tuyển",
                Details: "Hãy nhập mô tả công việc",
                Experience: "Hãy chọn kinh nghiệm làm việc",
                SalaryMin: "Nhập mức lương tối tiểu",
                SalaryMax: "Nhập mức lương tối đa",
                SalaryUnit: "Chọn đơn vị tiền tệ",
                Careers: "Chọn các ngành nghề",
                ProvinceId: "Chọn nơi làm việc",
                Address: "Hãy nhập địa chỉ làm việc",
                ProvinceId: "Chọn nơi làm việc",
                Deadline: "Nhập hạn nộp hồ sơ",
                Image: "Hãy chọn hình ảnh",
                ApplicationEmail: "Hãy nhập email hợp lệ"
            },
            submitHandler: function(form) {
                form.submit();
            }

            
        });
    });
    </script>
<style>
    #registration label.error:after { content: " "; position: absolute; left: 5px; bottom: 100%; width: 0; height: 0; border-bottom: 10px solid #ff4e4e; border-right: 10px solid transparent; } #registration label.error { clear: both; top: 100%; position: absolute; display: inline-block; padding: 0 5px; font-size: .93em; line-height: 1.75em; margin: -2px 0 0 10px; color: #fff; background: #ff4e4e; } #registration input.error { border-color: red; }
</style>

<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} 
?>

