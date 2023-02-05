<?php


    class JobController {
        // -[ĐỨC HIỀN] - Index() -> Quản lý các tin tuyển dụng ở trang NTD
        function Index()
        {
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
            // Chỉ hiển thị các bài viết cỉa nhà tuyển dụng nên ta dùng session để lấy id nhà tuyển dụng
                $user = $_SESSION['login_user'];
                include ROOT. '/Common/database.php'; 
        
                $query = "SELECT users.id, users.full_name FROM users WHERE email = '$user'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                $user_id = $data[0];

                // Hiển thị
                $query = "SELECT * FROM jobs WHERE created_by = $user_id[0] ORDER BY update_on DESC";
                $result = $mysqli->query($query);
                $jobData = $result->fetch_all();

            require_once ROOT . '/Views/recruitment/Job/index.php';
           
        }

        // -[ĐỨC HIỀN] - ChiTiet() -> Xem chi tiết tin tuyển dụng ở Client
        function ChiTiet() {
            $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "SELECT jobs.*, provinces.name, user_company.name, user_company.address, user_company.size, user_company.image_logo, user_company.id
                FROM jobs, provinces, user_company, users
                WHERE jobs.province_id = provinces.id 
                AND jobs.created_by = users.id AND jobs.id = '$id'
                AND user_company.user_id = users.id";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();

                $sqlCareers = "SELECT careers.name FROM careers, jobs, job_career
                WHERE careers.id = job_career.career_id
                AND job_career.job_id = jobs.id AND jobs.id = $id";
                $resultCareers = $mysqli->query($sqlCareers);
                $dataCareers = $resultCareers->fetch_all();


                $sqlListComment = "SELECT feedback.*, users.full_name, users.url_avatar FROM feedback, users
                WHERE feedback.job_id = $id AND feedback.user_id = users.id";
                $resultCmts = $mysqli->query($sqlListComment);
                $dataComments = $resultCmts->fetch_all();

                if (count($data) == 0) {
                    header('location: index.php?c=Home&a=Index');
                } else {
                    $job = $data[0];
                    $query = 'SELECT * FROM jobs';
                    $result = $mysqli->query($query);
                    $data = $result->fetch_all();
                    require_once ROOT . '/Views/client/Job/detail.php';
                }
        }

        // -[ĐỨC HIỀN] - Create() -> Thêm mới tin tuyển dụng ở trang NTD
        function Create()
        {
            include ROOT. '/Common/database.php'; 
            $query = "SELECT * FROM provinces";
            $result = $mysqli->query($query);
            $provinceData = $result->fetch_all();

            include ROOT. '/Common/database.php'; 
            $query = "SELECT * FROM careers";
            $result = $mysqli->query($query);
            $careerData = $result->fetch_all();

            require_once ROOT . '/Views/recruitment/Job/create.php';
        }

        // -[ĐỨC HIỀN] - RequestCreate() -> Thêm mới tin tuyển dụng ở trang NTD
        function RequestCreate()
        {
            if (isset($_POST)) {
                $position = $_POST['Position'];
                $application_email = $_POST['ApplicationEmail'];

                $details = $_POST['Details'];
                $amount = $_POST['Amount'];
                $experience = $_POST['Experience'];
                $salary_min = $_POST['SalaryMin'];
                $salary_max = $_POST['SalaryMax'];
                $salary_unit = $_POST['SalaryUnit'];
                $work_time = $_POST['WorkTime'];
                $address = $_POST['Address'];
                
                $province_id = $_POST['ProvinceId'];
                
                
                // Lấy thời gian hiện tại
                $orgDateNow = date('Y-m-d');  
                $dateNow = str_replace('-"', '/', $orgDateNow);  
                $newDateNow = date("Y/m/d", strtotime($dateNow)); 

                $created_on = $newDateNow;
                $update_on= $newDateNow;

                $orgDate = $_POST['Deadline'];  
                $date = str_replace('-"', '/', $orgDate);  
                $newDate = date("Y/m/d", strtotime($date)); 
                $deadline_for_submission = $newDate;

                $created_by = $_POST['CreatedBy'];
                $is_active = 1; // 1 -> Active // 0 -> InActive

                // Xử lý ảnh
                $temp = explode(".", $_FILES["Image"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                move_uploaded_file($_FILES['Image']['tmp_name'], "Assets/upload/job_image/".$newfilename);

                $image = $newfilename;
                

                include ROOT. '/Common/database.php'; 

                // Thêm dữ liệu vào bảng jobs
                $query = "INSERT INTO jobs(position, application_email,image, details, amount,experience,salary_min,salary_max,salary_unit,work_time,address,deadline_for_submission,province_id,created_on, update_on, created_by, is_active) 
                VALUES('$position', '$application_email', '$image', '$details', $amount, $experience, $salary_min, $salary_max, '$salary_unit', $work_time, '$address', '$deadline_for_submission', $province_id, '$created_on', '$update_on', $created_by, $is_active)";
                $result = $mysqli->query($query);

                // // Tìm đến id của jobs vừa tạo
                // // gán id tìm đc cho $jobid
                $jobid = $mysqli->insert_id;


                // Xử lý careers -> tách các tag từ chuỗi và cắt nhỏ sau dấu phẩy
                $tags = $_POST['Careers'];

           

                foreach($tags as $tag_item) {
                    include ROOT. '/Common/database.php'; 

                    //Thêm dữ liệu vào bảng post_tag
                    $insert_post_tag = "INSERT INTO job_career(job_id, career_id) VALUES($jobid,$tag_item)";
                    $result_insert = $mysqli->query($insert_post_tag);
                    
                }

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Job&a=Index');
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Job&a=Create');
                }
                
            }
        }

        // -[ĐỨC HIỀN] - ListJobs() -> Hiển thị tất cả công việc ở trang XEM TẤT CẢ CÔNG VIỆC
        public function ListJobs()
        {
            // Hiển thị bài viết
            include ROOT. '/Common/database.php'; 
            $query = "SELECT jobs.*, provinces.name, user_company.name FROM jobs, provinces, user_company, users
                      WHERE jobs.province_id = provinces.id 
                      AND jobs.created_by = users.id
                      AND user_company.user_id = users.id
                      AND jobs.is_active = 1
                      ORDER BY jobs.update_on DESC
                      LIMIT 6";
            $result = $mysqli->query($query);
            $jobData = $result->fetch_all();

            $queryCareer = "SELECT careers.*, COUNT(job_career.job_id) as 'NumPost'  FROM careers, jobs, job_career
            WHERE jobs.id = job_career.job_id AND job_career.career_id = careers.id  GROUP By careers.id";
            $resultCareer = $mysqli->query($queryCareer);
            $dataCareer = $resultCareer->fetch_all();

            require_once ROOT . '/Views/client/Job/list_jobs.php';
        
        }

        function Update()
        {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Job&a=Index');
            } else {
                $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "SELECT * FROM jobs WHERE id='$id'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                if (count($data) == 0) {
                    header('location: index.php?c=Job&a=Index');
                } else {
                    $jobitem = $data[0];

                    $querya = "SELECT * FROM provinces";
                    $resulta = $mysqli->query($querya);
                    $provinceData = $resulta->fetch_all();

                    require_once ROOT . '/Views/recruitment/Job/update.php';
                }
            }

            

            require_once ROOT . '/Views/recruitment/Job/update.php';
        }

        function RequestUpdate()
        {
            if (isset($_POST)) {
                $id = $_POST['id'];
                $position = $_POST['Position'];
                $application_email = $_POST['ApplicationEmail'];

                $details = $_POST['Details'];
                $amount = $_POST['Amount'];
                $experience = $_POST['Experience'];
                $salary_min = $_POST['SalaryMin'];
                $salary_max = $_POST['SalaryMax'];
                $salary_unit = $_POST['SalaryUnit'];
                $work_time = $_POST['WorkTime'];
                $address = $_POST['Address'];
                $province_id = $_POST['ProvinceId'];

                // Lấy thời gian hiện tại
                $orgDateNow = date('Y-m-d');  
                $dateNow = str_replace('-"', '/', $orgDateNow);  
                $newDateNow = date("Y/m/d", strtotime($dateNow)); 

                $update_on= $newDateNow;

                $orgDate = $_POST['Deadline'];  
                $date = str_replace('-"', '/', $orgDate);  
                $newDate = date("Y/m/d", strtotime($date)); 
                $deadline_for_submission = $newDate;

                $created_by = $_POST['CreatedBy'];
                $is_active = 1; // 1 -> Active // 0 -> InActive


                include ROOT. '/Common/database.php'; 

                $query = "UPDATE jobs
                            SET position ='$position',
                                application_email = '$application_email',
                                details = '$details',
                                amount = $amount,
                                experience = $experience,
                                salary_min = $salary_min,
                                salary_max = $salary_max,
                                salary_unit = '$salary_unit',
                                work_time = $work_time,
                                address = '$address',
                                deadline_for_submission = '$deadline_for_submission',
                                province_id = $province_id,
                                update_on = '$update_on',
                                created_by = $created_by,
                                is_active = $is_active
                          WHERE id = $id ";
                $result = $mysqli->query($query);

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Job&a=Index');
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Job&a=Update');
                }
                
            }
        }

        function ChangeJobThumbnail () {
            if (isset($_POST)) {
                $jobid = $_POST['id'];

            // Xử lý ảnh
            $temp = explode(".", $_FILES["Thumbnail"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES['Thumbnail']['tmp_name'], "Assets/upload/job_image/".$newfilename);

            $thumbnail = $newfilename;

            include ROOT. '/Common/database.php'; 
            $query = "UPDATE jobs
                            SET image ='$thumbnail'
                          WHERE id = $jobid ";
                $result = $mysqli->query($query);

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Changed job thumbnail successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
                } else {
                    setcookie("status", "Changed job thumbnail not successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
                }
            }
            

        }

        function DeletePosition()
        {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Job&a=Index');
            } else {
                $id = $_GET['id'];

                // Để xóa record trong jobs, phải xóa đc các bảng con trước
                // 1. Xóa trong bảng job_career
                // 1.1. Xóa record bảng career 
                // 1.1.1. Kiểm tra career, nếu chỉ có 1 thì xóa luôn, 2 trở lên thì để career lại
                // 1.2. Xóa record post_tag
                // 2. Xóa record bảng comments

                // DO IT

                // Kiểm tra tồn tại của career
                include ROOT. '/Common/database.php'; 
                $queryPosts = "SELECT * FROM jobs WHERE jobs.id='$id'";
                $resultPosts = $mysqli->query($queryPosts);
                $dataPosts = $resultPosts->fetch_all();

                $checkExistTag = "SELECT careers.id FROM careers, job_career WHERE job_career.job_id = $id AND job_career.career_id = careers.id";
                $ExistTagresult = $mysqli->query($checkExistTag);
                $dataExistTag = $ExistTagresult->fetch_all();

                // Kiểm tra post_tag, nếu chỉ có 1 thì xóa luôn, 2 trở lên thì để tag lại
                foreach($dataExistTag as $dataTag) {
                    $checkExistTag2 = "SELECT * FROM job_career WHERE job_career.career_id = '$dataTag[0]'";
                    $ExistTagresult2 = $mysqli->query($checkExistTag2);

                    if(mysqli_num_rows($ExistTagresult2) == 1) {
                        $sqlDeleteTag = "DELETE FROM careers WHERE id= '$dataTag[0]'";
                        $resultDeleteTag = $mysqli->query($sqlDeleteTag);
                    }

                }

                // Xóa record trong bảng post_tag
                $queryDeletePostTag = "DELETE FROM job_career WHERE job_id = $id";
                $mysqli->query($queryDeletePostTag);

                // Xóa record trong bảng comments
                $queryDeletePostTag = "DELETE FROM feedback WHERE job_id = $id";
                $mysqli->query($queryDeletePostTag);

                 // Xóa record trong bảng candidate apply
                 $querycandidate_apply = "DELETE FROM candidate_apply WHERE job_id = $id";
                 $mysqli->query($querycandidate_apply);

                 // Xóa record trong bảng save job
                 $querysv = "DELETE FROM save_jobs WHERE job_id = $id";
                 $mysqli->query($querysv);

                // Kiểm tra nêu không có tag nào thì xóa luôn
                if(mysqli_num_rows($ExistTagresult) <= 0) {
                    $sql = "DELETE FROM jobs WHERE id=$id";
                    $result2 = $mysqli->query($sql);
                }
                

                $query = "DELETE FROM jobs WHERE id=$id";
                $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if(!$result) {
                    setcookie("status", "Deleted data successfully!", time() + 1, "/");
                    setcookie("status_code", "success", time() + 1, "/");

                    
                } else {
                    setcookie("status", "Data not deleted successfully!", time() + 1, "/");
                    setcookie("status_code", "error", time() + 1, "/");

                }

                header('location: index.php?c=Job&a=Index');

            }
        }

        // -[ĐỨC HIỀN] - SavedJob() -> Ứng viên lưu công việc yêu thích
        function SavedJob () {
            $jobid = $_GET["job"];
            $userid = $_GET["uid"];

             // Lấy thời gian hiện tại
             $orgDateNow = date('Y-m-d');  
             $dateNow = str_replace('-"', '/', $orgDateNow);  
             $newDateNow = date("Y/m/d", strtotime($dateNow)); 

             $saved_on = $newDateNow;
             $is_active = 1; // 1 -> Active // 0 -> InActive

             include ROOT. '/Common/database.php'; 

             // Thêm dữ liệu vào bảng posts
             $query = "INSERT INTO save_jobs(job_id,user_id,saved_on) 
             VALUES($jobid, $userid, '$saved_on')";
             $result = $mysqli->query($query);

             if($result) {
                 setcookie("status", "Lưu công việc thành công!", time() + 3, "/");
                 setcookie("status_code", "success", time() + 3, "/");

                 header('Location: ' . $_SERVER["HTTP_REFERER"] );

             } else {
                 setcookie("status", "Data not created successfully!", time() + 3, "/");
                 setcookie("status_code", "error", time() + 3, "/");

                 header('Location: ' . $_SERVER["HTTP_REFERER"] );
             }
        } 

        // -[ĐỨC HIỀN] - ListSavedJob() -> Hiển thị danh sách các công việc Ứng viên đã lưu
        function ListSavedJob () {
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
            include ROOT. '/Common/database.php'; 

                $user = $_SESSION['login_user']; 
        
                $query = "SELECT users.id, users.full_name FROM users WHERE email = '$user'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                $user_id = $data[0];

            $query = "SELECT jobs.*, provinces.name, user_company.name, save_jobs.id FROM jobs, provinces, user_company, users, save_jobs
                      WHERE jobs.province_id = provinces.id 
                      AND jobs.created_by = users.id
                      AND user_company.user_id = users.id
                      AND jobs.is_active = 1
                      AND save_jobs.user_id = $user_id[0]
                      AND save_jobs.job_id = jobs.id
                      ORDER BY jobs.update_on DESC";
            $result = $mysqli->query($query);
            $jobData = $result->fetch_all();

            $queryCareer = "SELECT careers.*, COUNT(job_career.job_id) as 'NumPost'  FROM careers, jobs, job_career
            WHERE jobs.id = job_career.job_id AND job_career.career_id = careers.id  GROUP By careers.id";
            $resultCareer = $mysqli->query($queryCareer);
            $dataCareer = $resultCareer->fetch_all();

            require_once ROOT . '/Views/client/Job/saved_job.php';
        }

        // -[ĐỨC HIỀN] - DeleteSavedJob() -> Xóa cv yêu thích
        function DeleteSavedJob () {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Job&a=ListJobs');
            } else {
                $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "DELETE FROM save_jobs WHERE id='$id'";
                $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if(!$result) {
                    setcookie("status", "Deleted data successfully!", time() + 1, "/");
                    setcookie("status_code", "success", time() + 1, "/");

                    
                } else {
                    setcookie("status", "Data not deleted successfully!", time() + 1, "/");
                    setcookie("status_code", "error", time() + 1, "/");

                }

                header('Location: ' . $_SERVER["HTTP_REFERER"] );

            }
        }

        // -- // -- // -- // -- // ... ... // -- // -- // -- // -- //
        

        // -[ĐỨC HÙNG] - ListClientFeedback() -> ỨNG VIÊN Xem các bình luận đánh giá của mình
        function ListClientFeedback () {
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
            include ROOT. '/Common/database.php'; 

                $user = $_SESSION['login_user']; 
        
                $query = "SELECT users.id, users.full_name FROM users WHERE email = '$user'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                $user_id = $data[0];

            $query = "SELECT feedback.*, users.full_name, jobs.position, jobs.id  FROM feedback, jobs, users
                      WHERE feedback.user_id = $user_id[0]
                      AND feedback.user_id = users.id
                      AND feedback.job_id = jobs.id
                      ORDER BY feedback.comment_on DESC";
            $result = $mysqli->query($query);
            $jobData = $result->fetch_all();

            require_once ROOT . '/Views/client/Job/list_feedback.php';
        }

        // -[ĐỨC HÙNG] - DeleteClientFeedback() -> ỨNG VIÊN Xóa các bình luận đánh giá của mình
        function DeleteClientFeedback () {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Job&a=ListClientFeedback');
            } else {
                $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "DELETE FROM feedback WHERE id='$id'";
                $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if(!$result) {
                    setcookie("status", "Deleted data successfully!", time() + 1, "/");
                    setcookie("status_code", "success", time() + 1, "/");

                    
                } else {
                    setcookie("status", "Data not deleted successfully!", time() + 1, "/");
                    setcookie("status_code", "error", time() + 1, "/");

                }

                header('Location: ' . $_SERVER["HTTP_REFERER"] );

            }
        }

        // -[ĐỨC HÙNG] - JobSearch() -> Tìm kiếm công việc theo từ khóa, ngành nghề, nơi làm việc
        function JobSearch () {
            if (isset($_POST)) {
                $q = $_POST['q'];
                $p = $_POST['p'];
                $c = $_POST['c'];

            include ROOT. '/Common/database.php'; 
            $query = "SELECT jobs.*, provinces.name, user_company.name FROM jobs, provinces, user_company, users, careers, job_career
                      WHERE jobs.province_id = provinces.id 
                      AND jobs.created_by = users.id
                      AND user_company.user_id = users.id
                      AND jobs.id = job_career.job_id 
                      AND job_career.career_id = careers.id
                      AND jobs.is_active = 1
                      AND jobs.position LIKE '%$q%'
                      AND provinces.id LIKE '%$p%'
                      AND careers.id LIKE '%$c%'
                      ORDER BY jobs.update_on DESC";
            $result = $mysqli->query($query);
            $jobData = $result->fetch_all();

            $queryCareer = "SELECT careers.*, COUNT(job_career.job_id) as 'NumPost'  FROM careers, jobs, job_career
            WHERE jobs.id = job_career.job_id AND job_career.career_id = careers.id  GROUP By careers.id";
            $resultCareer = $mysqli->query($queryCareer);
            $dataCareer = $resultCareer->fetch_all();

            require_once ROOT . '/Views/client/Job/list_jobs.php';
            }
        }

        // -[ĐỨC HÙNG] - JobSearchByCompany() -> Tìm kiếm công việc theo công ty
        function JobSearchByCompany () {
            if (isset($_POST)) {
                $company = $_POST['company'];

                include ROOT. '/Common/database.php'; 
                $query = "SELECT jobs.*, provinces.name, user_company.name FROM jobs, provinces, user_company, users, careers, job_career
                          WHERE jobs.province_id = provinces.id 
                          AND jobs.created_by = users.id
                          AND user_company.user_id = users.id
                          AND jobs.id = job_career.job_id 
                          AND job_career.career_id = careers.id
                          AND jobs.is_active = 1
                      AND user_company.name LIKE '%$company%'
                      ORDER BY jobs.update_on DESC";
            $result = $mysqli->query($query);
            $jobData = $result->fetch_all();

            $queryCareer = "SELECT careers.*, COUNT(job_career.job_id) as 'NumPost'  FROM careers, jobs, job_career
            WHERE jobs.id = job_career.job_id AND job_career.career_id = careers.id  GROUP By careers.id";
            $resultCareer = $mysqli->query($queryCareer);
            $dataCareer = $resultCareer->fetch_all();

            require_once ROOT . '/Views/client/Job/list_jobs.php';
            }
        }

        // -[ĐỨC HÙNG] - Lọc
        function Filter () {
            
        }

        // -[ĐỨC HÙNG] - Lọc theo mức lương
        function Filter_PriceRange () {
            if (isset($_POST)) {
                /*
                * @Hiếu
                * Filter theo giá có 2 loại đơn vị là VND và $ 
                * Để filter ta filter theo đồng nhất đơn vị VND
                * Vậy đối các job tuyển dụng để giá là $, ta sẽ chuyển sang VND rồi filter
                */
                $price_min = $_POST['PriceMin'];
                $price_max = $_POST['PriceMax'];

                include ROOT. '/Common/database.php'; 
                $query = "SELECT jobs.*, provinces.name, user_company.name FROM jobs, provinces, user_company, users, careers, job_career
                          WHERE jobs.province_id = provinces.id 
                          AND jobs.created_by = users.id
                          AND user_company.user_id = users.id
                          AND jobs.id = job_career.job_id 
                          AND job_career.career_id = careers.id
                          AND jobs.is_active = 1
                      AND jobs.salary_min < $price_min
                      AND jobs.salary_max > $price_max
                      ORDER BY jobs.update_on DESC";
                $result = $mysqli->query($query);
                $jobData = $result->fetch_all();

            $queryCareer = "SELECT careers.*, COUNT(job_career.job_id) as 'NumPost'  FROM careers, jobs, job_career
            WHERE jobs.id = job_career.job_id AND job_career.career_id = careers.id  GROUP By careers.id";
            $resultCareer = $mysqli->query($queryCareer);
            $dataCareer = $resultCareer->fetch_all();

            require_once ROOT . '/Views/client/Job/list_jobs.php';
            }
        }

        // -[ĐỨC HÙNG] - NTD xem danh sách các bình luận về tin tuyển dụng của mình
        function ListFeedback () {
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
            include ROOT. '/Common/database.php'; 

                $user = $_SESSION['login_user']; 
        
                $query = "SELECT users.id, users.full_name FROM users WHERE email = '$user'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                $user_id = $data[0];

            $query = "SELECT feedback.*, users.full_name, jobs.position, jobs.id  FROM feedback, jobs, users
                      WHERE jobs.created_by = $user_id[0]
                      AND feedback.user_id = users.id
                      AND feedback.job_id = jobs.id
                      ORDER BY feedback.comment_on DESC";
            $result = $mysqli->query($query);
            $jobData = $result->fetch_all();

            require_once ROOT . '/Views/recruitment/Job/list_feedback.php';
        }

        // -[ĐỨC HÙNG] - Career() -> Lọc công việc theo ngành nghề
        function Career () {
            $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 

                $queryPT = "SELECT jobs.*, provinces.name, user_company.name, careers.name FROM jobs, job_career, careers, provinces, user_company, users
                WHERE careers.id = $id AND jobs.id = job_career.job_id AND job_career.career_id = careers.id
                AND jobs.province_id = provinces.id 
                      AND jobs.created_by = users.id
                      AND user_company.user_id = users.id
                      AND jobs.is_active = 1
                      ORDER BY jobs.update_on DESC";
                $resultPT = $mysqli->query($queryPT);
                $dataPostFromCareer = $resultPT->fetch_all();

                $queryCareer = "SELECT careers.*, COUNT(job_career.job_id) as 'NumPost'  FROM careers, jobs, job_career
                WHERE jobs.id = job_career.job_id AND job_career.career_id = careers.id  GROUP By careers.id";
                $resultCareer = $mysqli->query($queryCareer);
                $dataCareer = $resultCareer->fetch_all();


                require_once ROOT . '/Views/client/Job/careers.php';
                if (count($dataPostFromTag) == 0) {
                    header('location: index.php?c=Home&a=Index');
                }
        }

        // -[ĐỨC HÙNG] - Comment() -> ỨNG VIÊN bình luận đánh giá của mình
        function Comment () {
            if (isset($_POST)) {
                $userid = $_POST['UserId'];
                $jobid = $_POST['JobId'];
                $content = $_POST['Content'];
                $numRate = $_POST['RateScore'];

                // Lấy thời gian hiện tại
                $orgDateNow = date('Y-m-d');  
                $dateNow = str_replace('-"', '/', $orgDateNow);  
                $newDateNow = date("Y/m/d", strtotime($dateNow)); 

                $comment_on = $newDateNow;
                $is_active = 1; // 1 -> Active // 0 -> InActive

                include ROOT. '/Common/database.php'; 

                // Thêm dữ liệu vào bảng posts
                $query = "INSERT INTO feedback(comment, rating, job_id, user_id, comment_on, is_active) 
                VALUES('$content',$numRate, $jobid, $userid, '$comment_on', $is_active)";
                $result = $mysqli->query($query);

                if($result) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Job&a=ChiTiet&id='.$jobid);
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Job&a=ChiTiet&id='.$jobid);
                }
            }
        }

        

        // -- // -- // -- // -- // ... ... // -- // -- // -- // -- //

        // -[LÊ HIẾU] - CandidateApplySuccess() -> Nếu ứng tuyển thành công thì direct sang trang thông báo ứng tuyển thành công
        function CandidateApplySuccess()
        {
            require_once ROOT . '/Views/client/Job/success.php';
        }

        // -[LÊ HIẾU] - ListCandidateApply() -> Ứng Viên xem lại các đơn đã ứng tuyển ở Client
        function ListCandidateApply () {
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
            include ROOT. '/Common/database.php'; 

                $user = $_SESSION['login_user']; 
        
                $query = "SELECT users.id, users.full_name FROM users WHERE email = '$user'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                $user_id = $data[0];

                $queryCa = "SELECT candidate_apply.*, jobs.position FROM candidate_apply, jobs
                WHERE candidate_apply.user_id = $user_id[0]
                AND candidate_apply.job_id = jobs.id
                ORDER BY candidate_apply.update_on DESC";
            $resultCa = $mysqli->query($queryCa);
            $dataCandApply = $resultCa->fetch_all();


            require_once ROOT . '/Views/client/Job/list_apply.php';
        }

        // -[LÊ HIẾU] - ReadCandidateApply() -> Ứng Viên xem CHI TIẾT lại đơn đã ứng tuyển ở Client
        function ReadCandidateApply () {
            $id = $_GET['id'];
            include ROOT. '/Common/database.php'; 
            $query = "SELECT candidate_apply.*, jobs.position, users.*, user_company.*  FROM candidate_apply, users, jobs, user_company 
            WHERE candidate_apply.user_id = users.id AND jobs.id = candidate_apply.job_id
            AND user_company.user_id = jobs.created_by
            AND jobs.is_active = 1 AND candidate_apply.id = $id";

            

            $result = $mysqli->query($query);
            $data = $result->fetch_all();

            if (count($data) == 0) {
                header('location: index.php?c=Home&a=Index');
            } else {
                $candidate = $data[0];

                $sqlExperiences = "SELECT * FROM experiences, users, user_experiences 
                WHERE experiences.id = user_experiences.experience_id
                AND user_experiences.user_id = users.id 
                AND users.id = $candidate[7]";
                $resultExperiences = $mysqli->query($sqlExperiences);
                $dataExperiences = $resultExperiences->fetch_all();

                $sqlSkills = "SELECT skills.name, skills.level FROM skills, users, user_skills 
                WHERE skills.id = user_skills.skill_id AND user_skills.user_id = users.id
                AND users.id = $candidate[7]";
                $resultSkills = $mysqli->query($sqlSkills);
                $dataSkills = $resultSkills->fetch_all();

                require_once ROOT . '/Views/client/Job/detail_resume.php';
            }
        }

        // -[LÊ HIẾU] - DeleteCandidateApply() -> Ứng Viên xóa đơn đã ứng tuyển ở Client
        function DeleteCandidateApply () {
            if (!isset($_GET['id'])) {
                header('Location: ' . $_SERVER["HTTP_REFERER"] );
            } else {
                $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "DELETE FROM candidate_apply WHERE id= $id";
                $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if(!$result) {
                    setcookie("status", "Deleted data successfully!", time() + 1, "/");
                    setcookie("status_code", "success", time() + 1, "/");

                    
                } else {
                    setcookie("status", "Data not deleted successfully!", time() + 1, "/");
                    setcookie("status_code", "error", time() + 1, "/");

                }

                header('Location: ' . $_SERVER["HTTP_REFERER"] );

            }
        }

        // -[LÊ HIẾU] - CandidateApply() -> Ứng Viên ứng tuyển công việc
        function CandidateApply()
        {
            if (isset($_POST)) {
                $jobid = $_POST['JobId'];
                $userid = $_POST['UserId'];

                $phone = $_POST['Phone'];
                $email = $_POST['Email'];
                $intro = $_POST['Introduction'];
                
                // Lấy thời gian hiện tại
                $orgDateNow = date('Y-m-d');  
                $dateNow = str_replace('-"', '/', $orgDateNow);  
                $newDateNow = date("Y/m/d", strtotime($dateNow)); 

                $created_on = $newDateNow;
                $update_on= $newDateNow;

                $is_active = 1; // 1 -> Active // 0 -> InActive

                // Xử lý ảnh
                $temp = explode(".", $_FILES["Resume"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                move_uploaded_file($_FILES['Resume']['tmp_name'], "Assets/upload/resume/".$newfilename);

                $resume = $newfilename;
                

                include ROOT. '/Common/database.php'; 

                // Thêm dữ liệu vào bảng jobs
                $query = "INSERT INTO candidate_apply(email, phone, introduction, resume, job_id, user_id, created_on, update_on, is_active) 
                VALUES('$email', '$phone', '$intro', '$resume', $jobid, $userid, '$created_on', '$update_on', $is_active)";
                $result2 = $mysqli->query($query);

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result2) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=Job&a=CandidateApplySuccess");
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: ?c=Job&a=ChiTiet&id=$userid");
                }
                
            }
        }

        // -[LÊ HIẾU] - ListMessages() -> Hiển thị danh sách các phản hồi của NTD đến ứng viên
        function ListMessages () {
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
            include ROOT. '/Common/database.php'; 

                $user = $_SESSION['login_user']; 
        
                $query = "SELECT users.id, users.full_name FROM users WHERE email = '$user'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                $user_id = $data[0];

            $query = "SELECT messages_from_employers.*, user_company.name FROM messages_from_employers, user_company
                      WHERE messages_from_employers.user_id = $user_id[0]
                      AND user_company.id = messages_from_employers.company_id
                      ORDER BY messages_from_employers.created_on DESC";
            $result = $mysqli->query($query);
            $dataMessages = $result->fetch_all();

            require_once ROOT . '/Views/client/Job/messages.php';
        }

        // -[LÊ HIẾU] - ReadMessage() -> Xem chi tiết các phản hồi của NTD đến ứng viên
        function ReadMessage () {
            $id = $_GET['id'];
            include ROOT. '/Common/database.php'; 
            $query = "SELECT messages_from_employers.*  FROM messages_from_employers
            WHERE messages_from_employers.id = $id";

            

            $result = $mysqli->query($query);
            $data = $result->fetch_all();

            if (count($data) == 0) {
                header('location: index.php?c=Home&a=Index');
            } else {
                $message = $data[0];

                require_once ROOT . '/Views/client/Job/detail_message.php';
            }
        }

    }
?>