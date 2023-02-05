<?php
    class HomeController
    {
        public function Index()
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

            $sqlRandomPosts = "SELECT jobs.*, provinces.name, user_company.name FROM jobs, provinces, user_company, users
                      WHERE jobs.province_id = provinces.id 
                      AND jobs.created_by = users.id
                      AND user_company.user_id = users.id
                      AND jobs.is_active = 1
                      ORDER BY RAND()
                      LIMIT 16";
            $resultRandomPosts = $mysqli->query($sqlRandomPosts);
            $dataRandomPosts = $resultRandomPosts->fetch_all();

            // Hiển thị tin tức
            $sqlNews = "SELECT * FROM posts
            WHERE is_active = 1 ORDER BY update_on DESC LIMIT 6";
            $resultNews = $mysqli->query($sqlNews);
            $newsData = $resultNews->fetch_all();

            // Hiển thị danh sách ngành nghề
            $sqlListCareers = "SELECT careers.*, COUNT(job_career.job_id) as 'NumPost'  FROM careers, jobs, job_career
            WHERE jobs.id = job_career.job_id AND job_career.career_id = careers.id  GROUP By careers.id";
            $resultListCareers = $mysqli->query($sqlListCareers);
            $ListCareersData = $resultListCareers->fetch_all();

            

            require_once ROOT . '/Views/client/Home/index.php';
        
        }

        public function Admin()
        {
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

            // Đếm số Việc làm đã đăng
            $countJobPosition = "SELECT COUNT(jobs.id) FROM jobs WHERE jobs.is_active = 1";
            $resultCountJobPosition = $mysqli->query($countJobPosition);
            $numJobs = $resultCountJobPosition->fetch_all();
            $numJobPositions = $numJobs[0];

            // Đếm số Tin tức đã đăng
            $countPosts = "SELECT COUNT(posts.id) FROM posts WHERE posts.is_active = 1";
            $resultCountPosts = $mysqli->query($countPosts);
            $numPosts = $resultCountPosts->fetch_all();
            $numOfPosts = $numPosts[0];

            // Đếm số Bình luận trên tin tuyển dụng
            $countJobFeedbacks = "SELECT COUNT(feedback.id) FROM feedback, jobs WHERE jobs.id = feedback.job_id";
            $resultJobFeedbacks = $mysqli->query($countJobFeedbacks);
            $numJobFeedbacks = $resultJobFeedbacks->fetch_all();
            $numOfJobFeedbacks = $numJobFeedbacks[0];

            // Đếm số Hồ sơ ứng tuyển
            $countApplier = "SELECT COUNT(candidate_apply.id) FROM candidate_apply, jobs
            WHERE jobs.id = candidate_apply.job_id";
            $resultCountApplier = $mysqli->query($countApplier);
            $numApplier = $resultCountApplier->fetch_all();
            $numJobApplier = $numApplier[0];

            // Đếm số Bình luận trên tin tức
            $countPostComments = "SELECT COUNT(post_comment.id) FROM post_comment, posts WHERE posts.id = post_comment.post_id";
            $resultPostComments = $mysqli->query($countPostComments);
            $numPostComments = $resultPostComments->fetch_all();
            $numOfPostComments = $numPostComments[0];

             // Đếm số Users
             $countUsers = "SELECT COUNT(users.id) FROM users";
             $resultUsers = $mysqli->query($countUsers);
             $numUsers = $resultUsers->fetch_all();
             $numOfUsers = $numUsers[0];

             // Đếm số Nhà Tuyển Dụng
             $countUserRecruitment = "SELECT COUNT(users.id) FROM users, userrole, roles WHERE userrole.user_id = users.id
             AND userrole.role_id = roles.id AND roles.role_name = 'Recruitment'";
             $resultUserRecruitment = $mysqli->query($countUserRecruitment);
             $numUserRecruitment = $resultUserRecruitment->fetch_all();
             $numOfUserRecruitment = $numUserRecruitment[0];

            require_once ROOT . '/Views/admin/Home/index.php';
        }

        // - [QUỐC HIẾU] -- Trang quản lý chung, thống kê của NTD
        public function Recruitment()
        {
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

            // Hiển thị thông tin công ty
            $companyInfo = "SELECT user_company.* FROM user_company, users WHERE user_company.user_id = users.id AND users.email = '$user'";
            $resultCompanyInfo = $mysqli->query($companyInfo);
            $dataCompanyInfo = $resultCompanyInfo->fetch_all();
            $dataOfCompanyInfo = $dataCompanyInfo[0];

            // Đếm số Việc làm đã đăng
            $countJobPosition = "SELECT COUNT(jobs.id) FROM jobs WHERE jobs.is_active = 1 AND jobs.created_by = $user_id[0]";
            $resultCountJobPosition = $mysqli->query($countJobPosition);
            $numJobs = $resultCountJobPosition->fetch_all();
            $numJobPositions = $numJobs[0];

            // Đếm số Hồ sơ ứng tuyển
            $countApplier = "SELECT COUNT(candidate_apply.id) FROM candidate_apply, jobs
            WHERE jobs.id = candidate_apply.job_id 
            AND jobs.created_by = $user_id[0]";
            $resultCountApplier = $mysqli->query($countApplier);
            $numApplier = $resultCountApplier->fetch_all();
            $numJobApplier = $numApplier[0];

            // Đếm số Tin tức đã đăng
            $countPosts = "SELECT COUNT(posts.id) FROM posts WHERE posts.is_active = 1 AND posts.created_by = $user_id[0]";
            $resultCountPosts = $mysqli->query($countPosts);
            $numPosts = $resultCountPosts->fetch_all();
            $numOfPosts = $numPosts[0];

            // Đếm số Bình luận trên tin tuyển dụng
            $countJobFeedbacks = "SELECT COUNT(feedback.id) FROM feedback, jobs WHERE jobs.id = feedback.job_id AND jobs.created_by = $user_id[0]";
            $resultJobFeedbacks = $mysqli->query($countJobFeedbacks);
            $numJobFeedbacks = $resultJobFeedbacks->fetch_all();
            $numOfJobFeedbacks = $numJobFeedbacks[0];

            // Đếm số Bình luận trên tin tức
            $countPostComments = "SELECT COUNT(post_comment.id) FROM post_comment, posts WHERE posts.id = post_comment.post_id AND posts.created_by = $user_id[0]";
            $resultPostComments = $mysqli->query($countPostComments);
            $numPostComments = $resultPostComments->fetch_all();
            $numOfPostComments = $numPostComments[0];

            // Hiển thị danh sách Hồ sơ ứng tuyển
            $queryCandidate = "SELECT candidate_apply.*, users.full_name, jobs.position FROM candidate_apply, users, jobs, user_company 
            WHERE candidate_apply.user_id = users.id 
            AND candidate_apply.job_id = jobs.id
            AND user_company.user_id = $user_id[0]
            AND jobs.created_by = 11
            AND jobs.is_active = 1
            ORDER BY update_on DESC";
            $resultCandidate = $mysqli->query($queryCandidate);
            $candidateData = $resultCandidate->fetch_all();


            require_once ROOT . '/Views/recruitment/Home/index.php';
        }

    }
?>