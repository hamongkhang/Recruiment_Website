<?php 
    require(ROOT. '/Views/admin/_layout/sidebar.php');
    require(ROOT. '/Views/admin/_layout/navbar.php');
?>

<?php
// Kiểm tra quyền
require(ROOT. '/Common/checkrole.php');
foreach($data_check_role as $userrole) {
  if($userrole[0] == "Administrator") { ?>

    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Career</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Career</a></li>
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
                        <h5>Thêm mới ngành nghề</h5>
                    </div>
                    <div class="card-body">
                        <form action="?c=Career&a=RequestCreate" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên ngành nghề</label>
                                        <input name="Name" class="form-control" placeholder="Ngành Nghề" />
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

<?php 
    require(ROOT. '/Views/admin/_layout/footer.php');
?>

<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} 
?>