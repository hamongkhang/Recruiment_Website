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
                         <th>Comment</th>
                         <th>Post Name</th>
                         <th>Commented On</th>
                         <th>Status</th>
                         <th style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($dataCmts as $cmt) {
                    ?>
                                
                    <tr>
                        <td><?= $cmt[2] ?></td>
                        <td><a target="_blank" href="?c=Post&a=ChiTiet&id=<?= $cmt[8] ?>"><?= $cmt[7] ?></a></td>
                        <td><?= $cmt[3] ?></td>
                        <td>
                        <?php if($cmt[4] == 1) { ?>
                            <span class="badge badge-primary">Hiển Thị</span>
                        <?php } else if($cmt[4] == 0) { ?>
                            <span class="badge badge-danger">Ẩn/Vi phạm</span>
                        <?php } ?>
                        </td>
                        <td>
                            <a title="Báo cáo bình luận này với admin" data-toggle="modal" data-target="#reportComment" href="#report" class="btn-sm btn-danger"><i class="fa fa-flag"></i></a>
                        </td>
                    </tr>
                    <!-- Modal -->
<div class="modal fade" id="reportComment" tabindex="-1" role="dialog" aria-labelledby="reportComment" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reportComment">Report to Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="?c=Post&a=ReportComment">
      <div class="modal-body">
        <p>Bạn đang báo cáo nội dung:</p>
        <pre class="rpCmt"><?= $cmt[2] ?></pre>
        <p class="mb-3">Bạn có thể báo cáo bình luận sau khi chọn vấn đề:</p>
        <div class="form-group">
            <input type="radio" value="Lăng mạ chúng tôi" name="Content"> <label for="Content">Lăng mạ chúng tôi</label> <br/>
            <input type="radio" value="Nội dung thô tục, phản cảm" name="Content"> <label for="Content">Nội dung thô tục, phản cảm</label><br/>
            <input type="radio" value="Thông tin sai sự thật" name="Content"> <label for="Content">Thông tin sai sự thật</label><br/>
            <input type="radio" value="Spam" name="Content"> <label for="Content">Spam</label><br/>
            <input type="radio" value="Khủng bố" name="Content"> <label for="Content">Khủng bố</label><br/>
            <input type="radio" value="Ảnh khỏa thân/ bạo lực" name="Content"> <label for="Content">Ảnh khỏa thân/ bạo lực</label><br/>
        </div>
        <input type="hidden" name="comment_id" value="<?= $cmt[0] ?>">
        <input type="hidden" name="report_by" value="<?= $user_id[1] ?>"">
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn-sm btn-primary" value="Report"/>
      </div>
      </form>
    </div>
  </div>
</div>       
                <?php
                    }
                ?>
               </tbody>
            </table>
                     
      </div>
      </div>
<style>
pre.rpCmt {
    padding: 5px 10px;
    background: #fafafa;
    border-radius: 3px;
    margin: 7px 0;
    color: #818181;
}</style>
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