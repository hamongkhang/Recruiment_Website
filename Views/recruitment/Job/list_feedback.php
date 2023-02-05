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
            <h3 class="rect-heading">Danh sách các bình luận, đánh giá</h3>
            <table class="display table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>Comments</th>
                         <th style="width: 75px">Rating</th>
                         <th>Author</th>
                         <th>Post</th>
                         <th>Created</th>
                         <th>Status</th>
                         <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1;
                        foreach ($jobData as $cmt) {
                    ?>
                                
                    <tr>
                        <td>
                        <?=$cmt[2]?>
                        </td>
                        
                        <td>
                        <?php
                              switch ($cmt[3]) {
                                case 1:
                                ?>
                                <span class="cmt-star">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                </span>
                                <?php
                                  break;
                                  case 2:
                                    ?>
                                <span class="cmt-star">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                </span>
                                <?php
                                    break;
                                    case 3:
                                      ?>
                                <span class="cmt-star">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                </span>
                                <?php
                                      break;
                                      case 4:
                                        ?>
                                        <span class="cmt-star">
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </span>
                                        <?php
                                        break;
                                        case 5:
                                          ?>
                                <span class="cmt-star">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                </span>
                                <?php
                                          break;
                                default:
                                  echo "Không đánh giá";
                                  break;
                              } 
                            ?>
                        </td>
                        <td>
                            <?=$cmt[8]?>
                        </td>
                        <td>
                            <a target="_blank" href="?c=Job&a=ChiTiet&id=<?=$cmt[10]?>"><?=$cmt[9]?></a>
                        </td>
                        <td>
                             <?=$cmt[4]?>
                        </td>
                        <td>
                            <?php if($cmt[5] == 1) { ?>
                                <span class="badge badge-primary">Hiển Thị</span>
                            <?php } else if($cmt[5] == 0) { ?>
                                <span class="badge badge-danger">Ẩn/Vi phạm</span>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="#" class="btn-sm btn-danger"><i class="fa fa-flag"></i></a>
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