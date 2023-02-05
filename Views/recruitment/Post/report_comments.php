<?php 
    require(ROOT. '/Views/recruitment/_layout/header.php');
?>
<?php
      if(!isset($_SESSION)) 
      { 
          session_start(); 
      } 
      if(isset($_SESSION['login_user'])){
      $user = $_SESSION['login_user']; 
      $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

      $query = "SELECT users.full_name, users.id FROM users WHERE email = '$user'";
      $result = $mysqli->query($query);
      $data = $result->fetch_all();
      $user_full_name = $data[0];
      $user_id = $data[0];
   }
?>
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
                         <th>Report</th>
                         <th>Comment</th>
                         <th>Report On</th>
                         <th style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($dataRps as $cmt) {
                    ?>
                                
                    <tr>
                        <td><?= $cmt[1] ?></td>
                        <td><a target="_blank" href="?c=Post&a=ChiTiet&id=<?= $cmt[7] ?>"><?= $cmt[6] ?></a></td>
                        <td><?= $cmt[4] ?></td>
                        <td><a href="?c=Post&a=DeleteReport&id=<?= $cmt[0] ?>&uid=<?= $user_id[1] ?>">Thu Hồi</a> </td>
                    </tr>    
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