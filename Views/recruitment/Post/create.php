
<?php 
    require(ROOT. '/Views/recruitment/_layout/header.php');
?>

<?php
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


<style>.sbwrap {display: none;}</style>
<!-- published recuitment -->
<div class="container-fluid published-recuitment-wrapper">
  <div class="container published-recuitment-content">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-12 recuitment-inner">
        <div class="recuitment-form">
            <h3 class="rect-heading">Thêm mới bài viết</h3>
            <form action="?c=Post&a=RequestCreate" method="POST" id="registration" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <!-- <label class="control-label">Tiêu đề bài viết</label> -->
                            <input name="Name" class="form-control iptt" placeholder="Nhập tiêu đề..." />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <!-- <label class="control-label">Nội Dung</label> -->
                            <textarea name="Content" class="form-control" id="content"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group input-file-container">
                            <!-- <label class="control-label">Chọn ảnh bài viết... </label> -->
                            <input type="file" name="Thumbnail"id="file" class="input-file" />
                            <label tabindex="0" for="my-file" class="input-file-trigger">Chọn ảnh bài viết...</label>
                            <p class="file-return"></p>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Thẻ/Từ Khóa</label>
                            <input name="Tags" id="tag" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mô tả bài viết </label>
                            <textarea type="file" name="Description" class="form-control"></textarea>
                        </div>
                        <input type="hidden" value="<?= $user_id[0] ?>" name="CreatedBy">
                        <p><b>Tác giả: </b><?= $user_id[1] ?></p>
                        <p><b>Trạng thái: </b>Xuất bản</p>
                        
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Xuất bản" class="btn btn-primary" />
                </div>
            </form>   
      </div>
      </div>
 <!-- custom input file  -->
<style>.recuitment-form b { font-weight: bold; } input.form-control.iptt:focus { outline: none; box-shadow: none; } input.form-control.iptt { border: none; margin-top: 17px; background: #cccccc24; } .input-file-container { position: relative; width: 100%; text-align: center; border-radius: 3px; } .js .input-file-trigger { display: block; padding: 14px 45px; background: #39D2B4; color: #fff; font-size: 1em; transition: all .4s; cursor: pointer; } .js .input-file { position: absolute; top: 0; left: 0; width: 225px; opacity: 0; padding: 14px 0; cursor: pointer; } .js .input-file:hover + .input-file-trigger, .js .input-file:focus + .input-file-trigger, .js .input-file-trigger:hover, .js .input-file-trigger:focus { background: #34495E; color: #39D2B4; } .file-return { margin: 0; } .file-return:not(:empty) { margin: 1em 0; } .js .file-return { font-style: italic; font-size: .9em; font-weight: bold; } .js .file-return:not(:empty):before { content: "Selected file: "; font-style: normal; font-weight: normal; } /* Useless styles, just for demo styles */ </style>
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
<?php 
    require(ROOT. '/Views/recruitment/_layout/sidebar.php');
    require(ROOT. '/Views/recruitment/_layout/footer.php');
?>


<!-- Validate  -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#registration").validate({
            // Specify validation rules
            rules: {
                Name: "required",
            },
            messages: {
                Name: "Please enter career name"
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

<!-- Editor plugin -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
$(document).ready(function() {
  $('#content').summernote({
        placeholder: 'Nhập nội dung bài viết...',
        tabsize: 1,
        height: 400,
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

<!-- Tag suggest plugin  -->
    <script src="Assets/plugins/tags/jquery.amsify.suggestags.js"></script>
    <link href="Assets/plugins/tags/amsify.suggestags.css" rel="stylesheet" />
    <link href="Assets/plugins/tags/jquerysctipttop.css" rel="stylesheet" />
    <style>input.amsify-suggestags-input { font-size: 13px; } .amsify-suggestags-input-area .disabled.amsify-select-tag, .amsify-suggestags-input-area .amsify-select-tag.col-bg { background: #3F51B5; color: #ffffff; font-size: 12px; } .amsify-suggestags-input-area.form-control { padding: 5px 11px 6px 10px; border: 1px solid #cccccc8a; border-radius: 3px; }</style>
    <script type="text/javascript">
        $('#tag').amsifySuggestags({
            suggestions: [
                'test'
            ],
            whiteList: false
        }
        );
    </script>

<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} ?>