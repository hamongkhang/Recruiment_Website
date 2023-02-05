<?php
    class CandidateController {
        // -[LÊ HIẾU] - ManageCandidate() -> Quản lý các đơn ứng tuyển vào các vị trí công việc
        function ManageCandidate () {
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
                $user = $_SESSION['login_user']; 
                include ROOT. '/Common/database.php'; 
                
        
                $query = "SELECT users.id, users.full_name FROM users WHERE email = '$user'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                $user_id = $data[0];

            // query hiển thị
            // Chỉ hiển thị các đơn ứng tuyển vào các vị trí công việc mà Nhà Tuyển Dụng đăng tuyển, và các cong việc active
            include ROOT. '/Common/database.php'; 
            $query = "SELECT DISTINCT candidate_apply.*, users.full_name, jobs.position FROM candidate_apply, users, jobs, user_company 
            WHERE candidate_apply.user_id = users.id 
            AND candidate_apply.job_id = jobs.id
            AND jobs.created_by = $user_id[0]
            AND jobs.is_active = 1
            ORDER BY update_on DESC";
            $result = $mysqli->query($query);
            $candidateData = $result->fetch_all();

            require_once ROOT . '/Views/recruitment/Candidate/index.php';
        }

        // -[LÊ HIẾU] - ReadCandidate() ->Xem chi tiết đơn ứng tuyển
        function ReadCandidate () { 
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

                    require_once ROOT . '/Views/recruitment/Candidate/detail.php';
                }
        }

        // -[LÊ HIẾU] - MessagesFromEmployers() -> Ứng viên xem phản hồi từ nhà tuyển dụng
        function MessagesFromEmployers () {
            $userid = $_POST['UserId'];
            $pid = $_POST['pid'];
            $companyId = $_POST['CompanyId'];
            $title = $_POST['Title'];
            $content = $_POST['Content'];

            // Xử lý ảnh
            $temp = explode(".", $_FILES["Attachment"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES['Attachment']['tmp_name'], "Assets/upload/attachment/".$newfilename);

            $file = $newfilename;

            $orgDateNow = date('Y-m-d');  
            $dateNow = str_replace('-"', '/', $orgDateNow);  
            $newDateNow = date("Y/m/d", strtotime($dateNow)); 

            $created_on = $newDateNow;

            include ROOT. '/Common/database.php'; 
                $query = "INSERT INTO messages_from_employers(company_id, user_id, title, content, attachment, created_on) 
                VALUES($companyId, $userid, '$title', '$content', '$file', '$created_on')";
                $result = $mysqli->query($query);

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Candidate&a=ManageCandidate');
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=Candidate&a=ReadCandidate&id=$pid");
                }
        }
    }
?>