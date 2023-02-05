<?php 
    require(ROOT. '/Views/admin/_layout/sidebar.php');
    require(ROOT. '/Views/admin/_layout/navbar.php');
?>

<?php 

    if(isset($_SESSION['login_user'])){
        $user = $_SESSION['login_user']; 
        $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

        $query = "SELECT users.id, users.full_name, users.email FROM users WHERE email = '$user'";
        $result = $mysqli->query($query);
        $data = $result->fetch_all();
        $user_id = $data[0];
    }
    
?>

<?php
// Kiểm tra quyền
require(ROOT. '/Common/checkrole.php');
foreach($data_check_role as $userrole) {
    if($userrole[0] == "Administrator") { 

?>

    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">User Authentication</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/techjob"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">User Authentication</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Phân quyền cho user <?= $roleItem[1] ?></h5>
                    </div>
                    <div class="card-body">
                        <form action="?c=Role&a=ApplyUserAnthen" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input readonly name="id" class="form-control" placeholder="User id" value="<?= $roleItem[0] ?>" />
                                        <input readonly name="Email" class="form-control" placeholder="User email" value="<?= $roleItem[1] ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <label class="control-label">Role</label> <br>
                                        <?php 
                                        $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');
                                        $query = "SELECT * FROM userrole WHERE user_id = $roleItem[0]";
                                        $result = $mysqli->query($query);
                                        $userroleData = $result->fetch_all();

                                        $ur = $userroleData[0]; // ur[0] -> userid ;; ur[1] -> roleid
                                        foreach($roleData as $role) {
                                            
                                        if(count($userroleData) != 0 ) {
                                            
                                        ?>
                                        <input <?php if(($role[0] == $ur[1]) && ($ur[0] == $roleItem[0])) { echo "checked"; } else { echo $ur[1];} ?> type="radio" name="RoleName[]" value="<?= $role[0] ?>"> <?= $role[1] ?> <br/>
                                        <?php } 
                                         else { ?>
                                        <input type="radio" name="RoleName[]" value="<?= $role[0] ?>"> <?= $role[1] ?> <br/>
                                        <?php } }?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Phân Quyền" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php 
    require(ROOT. '/Views/admin/_layout/footer.php');
?>

<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} ?>