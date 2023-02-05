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
            <h3 class="rect-heading">Danh sách ngành nghề</h3>
            <a href="?c=Career&a=ThemMoi" class="btn-sm btn-primary float-right" style="margin-top: -45px"><i class="fa fa-plus mr-2"></i>Create</a>
            <table class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                         <th>Name</th>
                         <th style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1;
                        foreach ($careerData as $career) {
                    ?>
                                
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $career[1] ?></td>
                        <td>
                            <a href="?c=Career&a=ChinhSua&id=<?= $career[0] ?>" class="btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="?c=Career&a=Xoa&id=<?= $career[0] ?>" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
 
<?php 
    require(ROOT. '/Views/recruitment/_layout/sidebar.php');
    require(ROOT. '/Views/recruitment/_layout/footer.php');
?>
<?php } else {
  require(ROOT. '/Views/recruitment/Account/denied.php');
 } 
} ?>