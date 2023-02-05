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
                            <h5 class="m-b-10">Roles</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Roles</a></li>
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
                        <h5>Danh sách các quyền</h5>
                        <a href="?c=Role&a=Create" class="btn-sm btn-primary float-right"><i class="feather icon-plus"></i> Thêm Mới</a>
                    </div>
                    <div class="card-body">
                        <table class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i = 1;
                                foreach ($roleData as $role) {
                            ?>
                                
                                <tr>
                                    <td><?= $role[0] ?></td>
                                    <td><?= $role[1] ?></td>
                                    <td><?= $role[2] ?></td>
                                    <td>
                                        <a class="btn-sm btn-icon btn-primary" href="?c=Role&a=Update&id=<?= $role[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                            <i class="feather icon-edit-2"></i>
                                        </a>
                                        <a class="btn-sm btn-icon btn-danger" href="?c=Role&a=Delete&id=<?= $role[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove">
                                            <i class="feather icon-trash-2"></i>
                                        </a>
                                    </td>
                                 
                                </tr>
                                
                            <?php
                                $i++;
                                }
                            ?>
                            </tbody>
                        </table>
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
} ?>