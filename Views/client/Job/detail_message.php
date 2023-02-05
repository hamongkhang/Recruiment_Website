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
            <h3 class="rect-heading" style="font-size: 18px; font-weight: 500;"><?= $message[3] ?></h3>
            <div class="user--profile-right">
                <div class="user--profile-group">
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">

                            </div>
                            <h5 class="fs-16 fw-700 mb-3 mt-3">Nội dung thư</h5>
                            <div class="cover-letterx">
                                <textarea class="w-100" rows="15" class="letterx">
                                <?= $message[4] ?>
                                </textarea>
                            </div>
                            
                            <h5 class="fs-16 fw-700 mb-3 mt-3">Hồ sơ đính kèm</h5>
                            </div>
                            <a href="#" class="mb-5 d-block"> <?= $message[5] ?></a>
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