<?php include_once ("./Views/client/_layout/header.php") ?>

<!-- main banner -->
<div class="container-fluid clear-left clear-right">
  <div class="main-banner" style="margin-top: 0px;">
    <div class="banner-image">
      <img src="Assets/client/img/banner2.jpg" alt="banner-image">
    </div>
  </div>
  <div class="banner-content">
    <h3>1000+ Jobs For Developers</h3>
    <div class="banner-tags">
      <ul>
        <li><a href="#">Java</a></li>
        <li><a href="#">Python</a></li>
        <li><a href="#">Tester</a></li>
        <li><a href="#">QA QC</a></li>
        <li><a href="#">.NET</a></li>
        <li><a href="#">Javascript</a></li>
        <li><a href="#">Business Analyst</a></li>
        <li><a href="#">Designer</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- (end) main banner -->

<?php 
    require(ROOT. '/Views/client/_layout/search.php');
?>


<!-- job board & sidebar section  -->
<div class="container-fluid jb-wrapper">
  <div class="container">
    <div class="row">
    <!-- job board -->
    <div class="col-md-8 col-sm-12 col-12">
      <div class="job-board-wrap">
        <h2 class="widget-title">
          <span>Việc Làm Tuyển Gấp</span>
        </h2>

        <div class="job-group">
        <?php 
          foreach ($jobData as $job) {
        ?>
          <div class="job pagi">
              <div class="job-content">
                <div class="job-logo">
                  <a href="?c=Job&a=ChiTiet&id=<?= $job[0] ?>">
                    <img src="Assets/upload/job_image/<?= $job[3] ?>" class="job-logo-ima" alt="job-logo">
                  </a>
                </div>

                <div class="job-desc">
                  <div class="job-title">
                    <a href="?c=Job&a=ChiTiet&id=<?= $job[0] ?>"><?= $job[1] ?></a>
                  </div>
                  <div class="job-company">
                    <a href="#"><?= $job[19] ?></a> 
                  </div>

                  <div class="job-inf">
                    <a href="#" class="job-address"><i class="fa fa-map-marker pr-2" aria-hidden="true"></i><?= $job[18] ?></a>
                  </div>
                </div>

                <div class="wrap-btn-appl">

                  <a href="?c=Job&a=SavedJob&job=<?=$job[0]?>&uid=<?=$user_full_name[1]?>" class="btn btn-appl"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
            <?php } ?>
            <div class="readmorestyle-wrap">
              <a href="?c=Job&a=ListJobs" class="readallstyle reads1">Xem tất cả</a>
            </div>
</div>
      </div>
    </div>

    <!-- (end) job board -->
    <!-- sidebar -->
    <div class="col-md-4 col-sm-12 col-12 clear-left">
      <div class="job-sidebar">
        <h2 class="widget-title">
          <span>Ngành Nghề</span>
        </h2>
        <div class="catelog-list">
          <ul>
          <?php foreach( $dataCareer as $career) { ?>
            <li>
              <a href="?c=Job&a=Career&id=<?=$career[0]?>">
                <span class="cate-img">
                  <em><?=$career[1]?></em>
                </span>
                <span class="cate-count"><?=$career[2]?></span>
              </a>
            </li>
            <?php } ?>
            <li>
                <a href="#" class="readallstyle reads1">Xem tất cả</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="job-sidebar">
        <div class="sb-banner">
          <img src="/Assets/client/img/ads1.png" class="">
        </div>
      </div>
    </div>
    <!-- (end) sidebar -->
    </div>
  </div>
</div>
<!-- (end) job board & sidebar section  -->



<div class="clearfix"></div>



<!-- job board v2 -->
<div class="container-fluid">
  <div class="container job-board2">
    <div class="row">
      <div class="col-md-12 job-board2-wrap-header">
        <h3>Tin tuyển dụng, việc làm mới nhất</h3>
      </div>
      <div class="col-md-12 job-board2-wrap">
          <div class="owl-carousel owl-theme job-board2-contain">
            <?php foreach($dataRandomPosts as $randPost) { ?>
            <div class="item job-latest-item">
              <a href="?c=Job&a=ChiTiet&id=<?= $job[0] ?>" class="job-latest-group">
                <div class="job-lt-logo">
                  <img src="Assets/upload/job_image/<?= $job[3] ?>">
                </div>
                <div class="job-lt-info">
                  <h3><?=$randPost[1]?></h3>
                  <a class="company" href="#"><?= $job[19] ?></a>
                  <p class="address" ><i class="fa fa-map-marker pr-1" aria-hidden="true"></i> </i><?= $job[18] ?></p>
                </div>
              </a>
            </div>
            <?php } ?>
        </div>

      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                nav:true,
                slideBy: 2,
                dots: false
            },
            600:{
                items:4,
                nav:false,
                slideBy: 2,
                dots: false
            },
            1000:{
                items: 6,
                nav:true,
                loop: true,
                slideBy: 2
            }
        }
    });
})
</script>
<!-- (end) job board v2 -->

<!-- (end) top employer -->

<div class="clearfix"></div>




<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="home-ads">
          <a href="#">
            <img src="Assets/client/img/hna2.jpg">
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<!-- news -->
<div class="container-fluid">
  <div class="container news-wrapper">
    <div class="row">
      <div class="col-md-12 news-wrapper-head">
        Tư vấn nghề nghiệp
      </div>
      <?php foreach($newsData as $post) { ?>
      <div class="col-md-4 col-sm-12 col-12 news-item">
        <div class="news-item-inner">
          <a href="?c=Post&a=ChiTiet&id=<?= $post[0] ?>">
            <div class="news-thumb" style="background-image: url(Assets/upload/post_thumb/<?= $post[3] ?>);"></div>
          </a>
            <div class="news-details">
              <?php
                // Hiển thị tag
                $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');
                $sqlTagOfNews = "SELECT tags.name FROM tags, posts, post_tag
                WHERE tags.id = post_tag.tag_id AND posts.id = post_tag.post_id AND posts.id = $post[0]
                AND posts.is_active = 1 ORDER BY posts.update_on DESC LIMIT 3";
                $resultTagOfNews = $mysqli->query($sqlTagOfNews);
                $TagOfNewsData = $resultTagOfNews->fetch_all();
              ?>
              <div class="tags">
                <a href="#tag1">
                <?php
                        $numItems = count($TagOfNewsData);
                        $i = 0;
                        foreach($TagOfNewsData as $tag) {
                            if(++$i === $numItems) {
                                echo $tag[0].".";
                            } else {
                                echo $tag[0].", ";
                            }
                        }
                    ?>
                </a>
              </div>
              <div class="title">
                <a href="?c=Post&a=ChiTiet&id=<?= $post[0] ?>">
                  <?= $post[1] ?>
                </a>
                </div>
              <div class="meta">
              <?= $post[2] ?>
              </div>
            </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- (end) news -->

<!-- job support -->
<div class="container-fluid job-support-wrapper">
 <div class="container-fluid job-support-wrap">
  <div class="container job-support">
    <div class="row">
      <div class="col-md-6 col-sm-12 col-12">
        <ul class="spp-list">
          <li>
            <span><i class="fa fa-question-circle pr-2 icsp"></i>Hỗ trợ nhà tuyển dụng:</span>
          </li>
          <li>
            <span><i class="fa fa-phone pr-2 icsp"></i>098.3244.336</span>
          </li>
        </ul>
      </div>
      <div class="col-md-6 col-sm-12 col-12">
        <div class="newsletter">
            <span class="txt6">Đăng ký nhận bản tin việc làm</span>
            <div class="input-group frm1">
              <input type="text" placeholder="Nhập email của bạn" class="newsletter-email form-control">
              <a href="#" class="input-group-addon"><i class="fa fa-lg fa-envelope-o colorb"></i></a>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- (end) job support -->

<!-- footer -->
<?php include_once ("./Views/client/_layout/footer.php") ?>
</body>
</html>