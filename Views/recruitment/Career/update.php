<?php 
    require(ROOT. '/Views/recruitment/_layout/header.php');
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
        <div class="recuitment-form">
            <h3 class="rect-heading">Chỉnh sửa ngành nghề</h3>
            <form action="?c=Career&a=LuuChinhSua" method="POST" id="registration">
            <input type="hidden" name="id" value="<?=$career[0]?>"/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input name="Name" value="<?=$career[1]?>" class="form-control" placeholder="Tên ngành nghề" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Chỉnh Sửa" class="btn btn-primary" />
                </div>
            </form>   
      </div>
      </div>
 
<?php 
    require(ROOT. '/Views/recruitment/_layout/sidebar.php');
    require(ROOT. '/Views/recruitment/_layout/footer.php');
?>

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

<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} ?>