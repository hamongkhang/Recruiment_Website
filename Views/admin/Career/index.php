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
                        <h5>Danh sách ngành nghề</h5>
                        <a href="?c=Career&a=Create" class="btn-sm btn-primary float-right"><i class="feather icon-plus"></i> Thêm Mới</a>
                    </div>
                    <div class="card-body">
                        <table class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ngành Nghề</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i = 1;
                                foreach ($careerData as $career) {
                            ?>
                                
                                <tr>
                                    <td><?= $career[0] ?></td>
                                    <td><?= $career[1] ?></td>
                                    <td>
                                        <a class="btn-sm btn-icon btn-primary" href="?c=Career&a=Update&id=<?= $career[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                            <i class="feather icon-edit-2"></i>
                                        </a>
                                        <a class="btn-sm btn-icon btn-danger" href="?c=Career&a=Delete&id=<?= $career[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove">
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