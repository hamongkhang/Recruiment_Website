<?php 
  $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');
  $queryCareer = "SELECT careers.*, COUNT(job_career.job_id) as 'NumPost'  FROM careers, jobs, job_career
  WHERE jobs.id = job_career.job_id AND job_career.career_id = careers.id  GROUP By careers.id";
  $resultCareer = $mysqli->query($queryCareer);
  $dataCareer = $resultCareer->fetch_all();

  $queryProvices = "SELECT * FROM provinces";
  $resultProvinces = $mysqli->query($queryProvices);
  $dataProvinces = $resultProvinces->fetch_all();
?>
<!-- search section -->
<div class="container-fluid search-fluid">
  <div class="container">
    <div class="search-wrapper" style="margin-top: -11rem;">

      <ul class="nav nav-tabs search-nav-tabs" id="myTab" role="tablist">
      <li class="nav-item search-nav-item">
        <a class="nav-link snav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="color: red;" >Tìm việc làm</a>
      </li>
      <li class="nav-item search-nav-item">
        <a class="nav-link snav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"  style="color: red;">Tìm công ty</a>
      </li>
    </ul>
    <div class="tab-content search-tab-content" id="myTabContent">
      <!-- content tab 1 -->
      <div class="tab-pane stab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <form class="bn-search-form" action="?c=Job&a=JobSearch" method="post">
          <div class="row">
            <div class="col-md-10 col-sm-12">
              <div class="row">
                <div class="col-md-5">
                  <div class="input-group s-input-group">
                    <input name="q" value="<?php if (isset($_POST['q'])) echo $_POST['q']; ?>" type="text" class="form-control sinput" placeholder="Nhập kỹ năng, công việc,...">
                    <span><i class="fa fa-search"></i></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <select id="computer-languages" name="c">
                    <option value="" selected hidden >Tất cả ngành nghề</option>
                    <?php foreach($dataCareer as $career) { ?>
                    <option value="<?=$career[0] ?>"><?=$career[1] ?></option>
                    <?php } ?>
                </select>
                <i class="fa fa-code sfa" aria-hidden="true"></i>
                </div>
                <div class="col-md-3">
                  <select id="s-provinces" name="p">
                    <option value="" selected hidden >Tất cả địa điểm</option>
                    <?php foreach($dataProvinces as $item) { ?>
                    <option value="<?=$item[0] ?>"><?=$item[1] ?></option>
                    <?php } ?>
                </select>
                <i class="fa fa-map-marker sfa" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-12">
              <button type="submit" class="btn btn-primary btn-search col-sm-12">Tìm kiếm</button>
            </div>
          </div>
        </form>  
      </div>
      <!-- (end) content tab 1 -->
      <!-- content tab 2 -->
      <div class="tab-pane stab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <form class="bn-search-form" action="?c=Job&a=JobSearchByCompany" method="post">
          <div class="row">
            <div class="col-md-10 col-sm-12">
                  <div class="input-group s-input-group w-100">
                    <input name="company" type="text" class="form-control sinput" placeholder="Nhập tên công ty...">
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