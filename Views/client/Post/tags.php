<?php 
    require(ROOT. '/Views/client/_layout/header.php');
    if(isset($_SESSION['login_user'])){
        $user = $_SESSION['login_user']; 
        $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

        $query = "SELECT users.id, users.full_name FROM users WHERE email = '$user'";
        $result = $mysqli->query($query);
        $data = $result->fetch_all();
        $user_id = $data[0];

    }
?>

<!-- search section -->
<div class="container-fluid search-fluid">
  <div class="container">
    <div class="search-wrapper">

    <div class="tab-content search-tab-content" id="myTabContent">

      <!-- content tab 2 -->
      <div class="tab-pane stab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <form class="bn-search-form">
          <div class="row">
            <div class="col-md-10 col-sm-12">
                  <div class="input-group s-input-group w-100">
                    <input type="text" class="form-control sinput" placeholder="Nhập từ khóa, bài viết,...">
                    <span><i class="fa fa-search"></i></span>
                  </div>
            </div>
            <div class="col-md-2 col-sm-12">
              <button type="submit" class="btn btn-primary btn-search col-sm-12">Tìm kiếm</button>
            </div>
          </div>
        </form> 
      </div>
      <!-- (end) content tab 2 -->
    </div>

    </div>
  </div>
</div>
<!-- (end) search section -->



<div class="container-fluid">
  <div class="container search-wrapper">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-12">
                    <a id="click_advance" class="btn btn-c-filter" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                <i class="pr-2 fa fa-times" id="icon-s-sw" aria-hidden="true"></i>
              </a>

            <div class="collapse show" id="collapseExample" style="">
              <div class="card card-body bg-card-body-filter">
                <div class="filter-bar">
                    <div class="filter-form">
                         <div class="filter-form-item">
                           <p>
                              <a id="clickc_advance" class="btnf btn-filter" data-toggle="collapse" href="#filter-topic" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Danh Mục
                                <i class="fa fa-angle-up" aria-hidden="true"></i>
                              </a>
                            </p>
                            <div class="collapse show" id="filter-topic">
                              <div class="card o-card card-body">
                                <div class="filter-panel">
                                    <div class="panel-content">
                                        <?php foreach($dataTag as $tag) { ?>
                                        <div class="filter-topic cotain-common-filter">
                                            <a href="?c=Post&a=Tag&id=<?=$tag[0]?>" class="filter-action"><?=$tag[1]?></a>
                                            <span class="filter-count"><?=$tag[2]?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                               </div>
                            </div>


                        </div>

                        </div>
                    </div> <!-- filter bar -->
                    <script type="text/javascript">
                        window.onload = function() {screenCollapse()};

                        let ele = document.getElementsByClassName("collapse");

                        function screenCollapse() { 
                            if(window.innerWidth < 720) {
                                $(".collapse").removeClass("show");
                                $(".collapse").addClass("hide");
                            }
                        }
                    </script>
              </div>
            </div> <!-- ./ collapse -->
                </div>
    <div class="col-md-9 col-sm-12 col-12">
      <h4 class="search-find">Danh mục: 
      <?php foreach($dataPostFromTag as $tPost) { ?>
            <?=$tPost[10]?>
    <?php break; } ?>  
      </h4>
      <div class="job-board-wrap">
        <div class="job-group">
        <?php foreach($dataPostFromTag as $tPost) { ?>
            <div class="job pagi">
              <div class="job-content">
                <div class="job-logo">
                  <a href="?c=Post&a=ChiTiet&id=<?=$tPost[0]?>">
                    <img src="Assets/upload/post_thumb/<?=$tPost[3]?>" class="job-logo-ima" alt="job-logo">
                  </a>
                </div>

                <div class="job-desc">
                  <div class="job-title">
                    <a href="?c=Post&a=ChiTiet&id=<?=$tPost[0]?>"><?=$tPost[1]?></a>
                  </div>
                  <div class="job-company">
                    <a href="?c=Post&a=ChiTiet&id=<?=$tPost[0]?>"><?=$tPost[9]?></a> 
                  </div>

                  <div class="job-inf">
                    <div class="job-main-skill">
                      <i class="fa fa-clock-o" aria-hidden="true"></i>  <a href="?c=Post&a=ChiTiet&id=<?=$tPost[0]?>"> <?=$tPost[6]?></a>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            

      </div>
      
    </div>
    </div>
  </div>
</div>

<?php 
    // require(ROOT. '/Views/client/_layout/sidebar.php');
    require(ROOT. '/Views/client/_layout/footer.php');
?>