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
                            <h5 class="m-b-10">Reports</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Reports</a></li>
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
                        <h5>Danh sách phản hồi</h5>
                        <!-- <a href="?c=Career&a=Create" class="btn-sm btn-primary float-right"><i class="feather icon-plus"></i> Thêm Mới</a> -->
                    </div>
                    <div class="card-body">
                        <table class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                <th>Report</th>
                                    <th>Comment</th>
                                    <th>Report On</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i = 1;
                                foreach ($dataRps as $cmt) {
                            ?>
                                
                                <tr>
                                <td><?= $cmt[1] ?></td>
                                <td><a target="_blank" href="?c=Post&a=ChiTiet&id=<?= $cmt[7] ?>"><?= $cmt[6] ?></a></td>
                                <td><?= $cmt[4] ?></td>
                                <td><a href="?c=Post&a=AdminDeleteComment&id=<?= $cmt[8] ?>&rpid=<?= $cmt[0] ?>">Xóa bình luận</a> </td>
                                 
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
<style>b { font-weight: bolder; }.cover-data-img img { height: 110%; width: auto; } .cover-data-img { width: 70px; height: 40px; overflow: hidden; border-radius: 5px; display: flex; justify-content: center; align-items: center; text-align: center; }</style>
</style>
<?php 
    require(ROOT. '/Views/admin/_layout/footer.php');
?>

<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} ?>