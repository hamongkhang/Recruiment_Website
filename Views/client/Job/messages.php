<?php 
    require(ROOT. '/Views/client/_layout/header.php');
    if(isset($_SESSION['login_user'])){
        $user = $_SESSION['login_user']; 
        $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

        $query = "SELECT users.id, users.full_name, users.user_type FROM users WHERE email = '$user'";
        $result = $mysqli->query($query);
        $data = $result->fetch_all();
        $user_id = $data[0];
    }
    
?>

<?php
// Kiểm tra quyền
require(ROOT. '/Common/checkrole.php');
foreach($data_check_role as $userrole) {
  if($userrole[0] == "Client") { ?>

<!-- published recuitment -->
<div class="container-fluid published-recuitment-wrapper">
  <div class="container published-recuitment-content">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-12 recuitment-inner mt-3">
        <div class="recuitment-form">
            <h3 class="rect-heading" style="font-size: 18px; font-weight: 500;">Các phản hồi từ NTD</h3>
            <div class="user--profile-right">
                <div class="user--profile-group">
                    <table class="table">
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Gửi từ</th>
                            <th>Ngày gửi</th>
                            <th></th>
                        </tr>
                        <?php foreach($dataMessages as $item) { ?>
                        <tr>
                            <td><?=$item[3] ?></td>
                            <td><?=$item[8] ?></td>
                            <td><?=$item[6] ?></td>
                            <td>
                                <a href="?c=Job&a=ReadMessage&id=<?=$item[0] ?>" class="btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-12">

<?php 
    require(ROOT. '/Views/client/_layout/sidebar.php');
    require(ROOT. '/Views/client/_layout/footer.php');
?>


<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} ?>