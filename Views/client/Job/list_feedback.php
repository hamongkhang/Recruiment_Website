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
            <h3 class="rect-heading" style="font-size: 18px; font-weight: 500;">Các bình luận của bạn</h3>
            <div class="user--profile-right">
                <div class="user--profile-group">
                    <table class="table">
                        <tr>
                            <th>Comments</th>
                            <th style="width: 150px">Rating</th>
                            <th>Author</th>
                            <th>Post</th>
                            <th>Created</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($jobData as $cmt) { ?>
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
                            <a href="?c=Job&a=DeleteClientFeedback&id=<?=$cmt[0]?>" class="btn-sm btn-danger"><i class="fa fa-times"></i></a>
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