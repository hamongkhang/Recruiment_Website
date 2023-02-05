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
            <h3 class="rect-heading">Danh sách bài viết</h3>
            <a href="?c=Post&a=Create" class="btn-sm btn-primary float-right" style="margin-top: -45px"><i class="fa fa-plus mr-2"></i>Create</a>
            <table class="display table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                         <th>Title</th>
                         <th>Created/Updated</th>
                         <th>Status</th>
                         <th style="width: 100px;">Action</th>
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
                        
                        <td>
                            <b><a href="?c=Post&a=ChiTiet&id=<?= $post[0] ?>" target="_blank"><?= $post[1] ?></a> </b>
                            <br/>
                            <?php 
                                $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

                                $query = "SELECT users.full_name FROM users WHERE id = $post[7]";
                                $result = $mysqli->query($query);
                                $data = $result->fetch_all();
                                $user_id = $data[0];
                                echo '# '.$user_id[0];
                            ?>
                        </td>
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
                            <span class="badge badge-primary">Xuất Bản</span>
                        <?php } else if($post[8] == 0) { ?>
                            <span class="badge badge-danger">Nháp</span>
                        <?php } ?>
                        </td>
                        
                        <td>
                            <a href="?c=Post&a=Update&id=<?= $post[0] ?>" class="btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="?c=Post&a=Delete&id=<?= $post[0] ?>" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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

<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} ?>