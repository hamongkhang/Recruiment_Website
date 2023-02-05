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
                            <h5 class="m-b-10">Users</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/techjob"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Users</a></li>
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
                        <h5>Danh sách users</h5>
                        <a href="?c=Career&a=Create" class="btn-sm btn-primary float-right"><i class="feather icon-plus"></i> Thêm Mới</a>
                    </div>
                    <div class="card-body">
                        <table class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i = 1;
                                foreach ($userData as $user3) {
                            ?>
                                
                                <tr>
                                    <td><?= $user3[0] ?></td>
                                    <td><?= $user3[1] ?></td>
                                    <td>
                                    <?php if($user3[12] == 1) { ?>
                                       <a href="?c=User&a=DisableAccount&id=<?= $user3[0] ?>"><span class="badge badge-primary">Hoạt Động</span></a> 
                                    <?php } else if($user3[12] == 0) { ?>
                                        <a href="?c=User&a=DisableAccount&id=<?= $user3[0] ?>"><span class="badge badge-danger">Khóa</span></a>
                                    <?php } ?>
                                    </td>
                                    <td>
                                        <a class="btn-sm btn-icon btn-primary" href="?c=Role&a=UserAuthen&id=<?= $user3[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Phân quyền">
                                            <i class="feather icon-shield"></i>
                                        </a>
                                        <a class="btn-sm btn-icon btn-primary" href="?c=Career&a=Update&id=<?= $user3[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xem chi tiết">
                                            <i class="feather icon-eye"></i>
                                        </a>
                                        <a class="btn-sm btn-icon btn-danger" href="?c=Career&a=Delete&id=<?= $user3[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Khóa tài khoản">
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