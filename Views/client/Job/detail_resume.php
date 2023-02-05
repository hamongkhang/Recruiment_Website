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

<?php if($user_id[2] == 1) { ?>

<!-- published recuitment -->
<div class="container-fluid published-recuitment-wrapper">
  <div class="container published-recuitment-content">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-12 recuitment-inner mt-3">
        <div class="recuitment-form">
            <h3 class="rect-heading pl-3" style="font-size: 18px; font-weight: 500;"><?= $candidate[11] ?></h3>
            <div class="user--profile-right">
                <div class="user--profile-group">
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body recuitment-body">
                <div class="identify-contact">
                    <h5 class="fs-16 fw-700 mb-3">Thông tin ứng viên
                    </h5>
                    <div class="row">
                    <div class="col-12 pr-10 row pt-2 pb-2">
                        <div class="col-md-2">Họ tên</div>
                        <div class="col-md-8 pl-5 ml-2"> <b>  <?= $candidate[19] ?></b> </div>
                    </div>
                    <div class="col-6 pr-10 row pt-2 pb-2">
                        <div class="col-md-6">Số điện thoại</div>
                        <div class="col-md-6"> <b><?= $candidate[3] ?></b> </div>
                    </div>
                    <div class="col-6 pr-10 row pt-2 pb-2">
                        <div class="col-md-4">Email</div>
                        <div class="col-md-8"> <b><?= $candidate[2] ?></b> </div>
                    </div>
                    </div>
                    <h5 class="fs-16 fw-700 mb-3 mt-3">Kinh nghiệm làm việc</h5>
                    <?php foreach($dataExperiences as $exp) { ?>
                        <div class="row">
                            <div class="col-6 pr-10 row pt-2 pb-2">
                                <div class="col-md-6">Chức vụ</div>
                                <div class="col-md-6"> <b> <?= $exp[1] ?></b> </div>
                            </div>
                            <div class="col-6 pr-10 row pt-2 pb-2">
                                <div class="col-md-4">Công ty</div>
                                <div class="col-md-8"> <b> <?= $exp[2] ?></b> </div>
                            </div>
                            <div class="col-12 row pt-2 pb-2">
                                <div class="col-md-3">Thời gian làm việc</div>
                                <div class="col-md-9"> <b>  <?= $exp[4] ?> - <?= $exp[4] ?></b> </div>
                            </div>
                            <p style="border-bottom: 1px dashed #ccc; display: block; width: 100%;"></p>
                        </div>
                    <?php } ?>
                    <h5 class="fs-16 fw-700 mb-3 mt-3">Kỹ năng</h5>
                    <?php foreach($dataSkills as $skill) { ?>
                    <div class="user_exp_edu Experience_11642 div-exp-height">
                        <div class="row">
                        <div class="col-md-6">
                            <?= $skill[0] ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            switch ($skill[1]) {
                                case 1:
                                ?>
                                <span style="color: #ffc107">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </span> 
                                <?php
                                break;
                                case 2:
                                    ?>
                                    <span style="color: #ffc107">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    </span> 
                                    <?php
                                    break;
                                    case 3:
                                    ?>
                                    <span style="color: #ffc107">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span> 
                                    <?php
                                    break;
                                    case 4:
                                        ?>
                                        <span style="color: #ffc107">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        </span> 
                                        <?php
                                        break;
                                        case 5:
                                        ?>
                                        <span style="color: #ffc107">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span> 
                                        <?php
                                        break;
                                        case 0:
                                            ?>
                                            <span style="color: #ffc107">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            </span> 
                                            <?php
                                            break;
                                default:
                                
                                break;
                            } 
                            ?>
                            
                        </div>
                        </div>


                        <div class="row">
                        <div class="col-md-12">
                            <hr class="break-line pt-1 pb-1">
                        </div>
                        </div>
                    </div>
                    <?php } ?>
                                </div>
                                </div>
                            </div>
                            <h5 class="fs-16 fw-700 mb-3 mt-3">Nội dung thư</h5>
                            <div class="cover-letterx">
                                <textarea class="w-100" rows="15" class="letterx">
                                <?= $candidate[4] ?>
                                </textarea>
                            </div>
                            
                            <h5 class="fs-16 fw-700 mb-3 mt-3">Hồ sơ đính kèm</h5>
                            </div>
                            <a href="#" class="mb-5 d-block"> <?= $candidate[5] ?></a>
                        </div>
           
                        
               
       
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-12">

<?php 
    require(ROOT. '/Views/client/_layout/sidebar.php');
    require(ROOT. '/Views/client/_layout/footer.php');
?>
 <style>.identify-contact { border: 1px solid #bfcbd9; background: #fffdf3; border-radius: 10px; padding: 20px; margin-bottom: 20px; }</style>
<style>
.cover-letterx textarea { background: #fafafa; border: none; padding: 0 15px; color: #333; } .cover-letterx:after { content: ""; position: absolute; left: 0; width: 100%; height: 10px; background-color: transparent; background-size: 15px 15px; background-image: radial-gradient(farthest-side,rgba(0,0,0,0) 6px,#fafafa 0); bottom: -6px; } .cover-letterx:before { content: ""; position: absolute; left: 0; width: 100%; height: 10px; background-color: transparent; background-size: 15px 15px; background-image: radial-gradient(farthest-side,rgba(0,0,0,0) 6px,#fafafa 0); transform: rotate(180deg); top: -10px; } .cover-letterx { position: relative; }
.clw textarea, .clw {background: #fff;} .clw:after , .clw:before {background-image: radial-gradient(farthest-side,rgba(0,0,0,0) 6px,#fff 0);}
</style>

<style>
.identify-contact p { line-height: 1.9; margin-bottom: 10px; } .identify-contact input { border: 1px solid #bfcbd9; width: 100%; border-radius: 5px; padding: 10px 10px; } .identify-contact { border: 1px solid #bfcbd9; background: #fffdf3; border-radius: 10px; padding: 20px; margin-bottom: 20px; }
</style>

<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 }?>