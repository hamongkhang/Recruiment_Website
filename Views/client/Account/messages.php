
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


<!-- published recuitment -->
<div class="container-fluid published-recuitment-wrapper">
  <div class="container published-recuitment-content">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-12 recuitment-inner">
        <div class="recuitment-form">
            <h3 class="rect-heading" style="font-size: 18px; padding-left: 22px; font-weight: 500;">Phản hồi từ nhà tuyển dụng</h3>
            <table class="display table table-hover">
            <tr>
                <th>Title</th>
                <th>Sent By</th>
                <th>Sent On</th>
                <th>Seen</th>
            </tr>
            
            <?php foreach ($dataMessages as $mess) {
            ?>
            <tr>
                <td><?= $mess[3] ?></td>
                <td><?= $mess[1] ?></td>
                <td><?= $mess[6] ?></td>
                <td><?= $mess[7] ?></td>
            </tr>    
            <?php } ?>
            
            </table>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-12">
<?php 
    require(ROOT. '/Views/client/_layout/sidebar.php');
    require(ROOT. '/Views/client/_layout/footer.php');
?>
