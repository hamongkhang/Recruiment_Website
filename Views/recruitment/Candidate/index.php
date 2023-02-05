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
            <h3 class="rect-heading">Danh sách ứng viên</h3>
            <table class="display table table-hover" id="myTable">
                <thead>
                    <tr>
                         <th>Name</th>
                         <th>Email/Phone</th>
                         <th>Position</th>
                         <th>Created</th>
                         <th style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($candidateData as $candidate) {
                    ?>
                    <tr>
                        <td>
                        <?= $candidate[11] ?>
                        </td>
                        <td>
                        <b><?= $candidate[2] ?></b> <br>
                        <?= $candidate[3] ?>
                        </td>
                        <td>
                        <?= $candidate[12] ?>
                        </td>
                        <td>
                        <?= $candidate[8] ?>
                        </td>
                        <td>
                            <a href="?c=Candidate&a=ReadCandidate&id=<?= $candidate[0] ?>" class="btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="?c=Post&a=Delete&id=<?= $candidate[0] ?>" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
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