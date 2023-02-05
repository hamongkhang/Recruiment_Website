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
                            <h5 class="m-b-10">Posts</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Posts</a></li>
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
                        <h5>Danh sách tin tức</h5>
                        <!-- <a href="?c=Career&a=Create" class="btn-sm btn-primary float-right"><i class="feather icon-plus"></i> Thêm Mới</a> -->
                    </div>
                    <div class="card-body">
                        <table class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th style="width: 120px">Thumbnail</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>CreatedOn/ UpdatedOn</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i = 1;
                                foreach ($postData as $post) {
                            ?>
                                
                                <tr>
                                    <td>
                                    <?php if($post[3] != null) { ?>
                                        <div class="cover-data-img">
                                            <img src="Assets/upload/post_thumb/<?= $post[3] ?>"/>
                                        </div>
                                    <?php } else { ?>
                                        <div class="cover-data-img">
                                            <img src="Assets/upload/post_thumb/no-image.jpg"/>
                                        </div>
                                    <?php } ?>
                                    </td>
                                    <td><?= $post[1] ?></td>
                                    <td><b><?= $post[9] ?></b> (<?= $post[10] ?>)</td>
                                    <td>
                                        <?php  
                                            $date = str_replace('-"', '/', $post[5]);  
                                            $newDate = date("d/m/Y", strtotime($date)); 
                                            $dateCreated = $newDate;
                                            echo $dateCreated; 
                                        ?> <br/>
                                        <?php  
                                            $date = str_replace('-"', '/', $post[6]);  
                                            $newDate = date("d/m/Y", strtotime($date)); 
                                            $dateUpdated = $newDate;
                                            echo $dateUpdated; 
                                        ?>
                                    </td>
                                    <td>
                                    <?php if($post[8] == 1) { ?>
                                        <span class="badge badge-primary"><a href="?c=Post&a=SwitchStatus&id=<?= $post[0] ?>" style="color:#fff">Xuất Bản</a></span>
                                    <?php } else if($post[8] == 0) { ?>
                                        <span class="badge badge-danger"><a href="?c=Post&a=SwitchStatus&id=<?= $post[0] ?>" style="color:#fff">Nháp</a></span>
                                    <?php } ?>
                                    </td>
                                    <td>
                                        <a class="btn-sm btn-icon btn-primary" href="?c=Post&a=AdminUpdate&id=<?= $post[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                            <i class="feather icon-edit-2"></i>
                                        </a>
                                        <a class="btn-sm btn-icon btn-success" href="?c=Post&a=AdminDetail&id=<?= $post[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Details">
                                            <i class="feather icon-eye"></i>
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
<style>b { font-weight: bolder; }.cover-data-img img { height: 110%; width: auto; } .cover-data-img { width: 70px; height: 40px; overflow: hidden; border-radius: 5px; display: flex; justify-content: center; align-items: center; text-align: center; }</style>
</style>
<?php 
    require(ROOT. '/Views/admin/_layout/footer.php');
?>

<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} ?>