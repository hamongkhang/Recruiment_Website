<?php
    class UserController {

        // Đăng ký --> vai trò Ứng Viên
        function DangKyUser()
        {
            require_once ROOT . '/Views/client/Account/signup.php';
        }

        // Đăng ký --> vai trò Ứng Viên
        function DangKy_User()
        {
            if (isset($_POST)) {
                if ($_POST['Password'] !== $_POST['ConfirmPassword']) {
                    die('Password and Confirm password should match!');   
                } 
                else 
                {
                    $email = $_POST['Email'];
                    $password = $_POST['Password'];
                    $phone = $_POST['Phone'];
                    $first_name = $_POST['FirstName'];
                    $last_name = $_POST['LastName'];
                    $full_name = ($last_name .' '. $first_name);

                    // Mã khóa mật khẩu
                    $password = md5($password);

                    $user_type = 1; // 1 -> candidate // 2 -> recruitment
                    $is_active = 1; // 1 -> active // 0 -> inactive

                    include ROOT. '/Common/database.php'; 

                    // Kiểm tra tồn tại
                    $checkExists = "SELECT * FROM users WHERE email = '$email'";
                    $resultExists = $mysqli->query($checkExists);
                    $countExists = mysqli_num_rows($resultExists);

                    

                    $errorExists ="";
                    if($countExists > 0) {
                        die("Tài khoản đã tồn tại");
                    } else {
                        $query = "INSERT INTO users(email, phone, password, first_name, last_name, full_name, user_type, is_active) 
                        VALUES ('$email', '$phone', '$password', '$first_name', '$last_name', '$full_name', $user_type, $is_active)";

                        $result = $mysqli->query($query);

                        // thêm vào bảng userrole 
                        // set quyền client cho user
                        $sql_insert_userrole = "INSERT INTO userrole(user_id, role_id) 
                        SELECT users.id, roles.id 
                        FROM roles, users 
                        WHERE roles.role_name = 'Client' 
                        AND users.email = '$email'";

                        $result_insert_userrole = $mysqli->query($sql_insert_userrole);


                        header('location: /techjob/?c=User&a=getSignUpStatus');
                    }
                }
            }
        }

        // Đăng ký thành công --> vai trò Ứng Viên
        function getSignUpStatus () {
            require_once ROOT . '/Views/client/Account/signup_status.php';
        }

        // Đăng nhập --> vai trò Ứng Viên
        function DangNhapUser () {
            require_once ROOT . '/Views/client/Account/signin.php';
        }

        // Quản lý profile --> vai trò ứng viên
        function Profile() {
            $id = $_GET['id'];

            include ROOT. '/Common/database.php'; 
            $query = "SELECT users.*FROM users
            WHERE users.id = $id";
            $result = $mysqli->query($query);
            $data = $result->fetch_all();

            $sqlExperiences = "SELECT * FROM experiences, users, user_experiences 
            WHERE experiences.id = user_experiences.experience_id
            AND user_experiences.user_id = users.id 
            AND users.id = $id";
            $resultExperiences = $mysqli->query($sqlExperiences);
            $dataExperiences = $resultExperiences->fetch_all();

            $sqlSkills = "SELECT skills.name, skills.level FROM skills, users, user_skills 
            WHERE skills.id = user_skills.skill_id AND user_skills.user_id = users.id
            AND users.id = $id";
            $resultSkills = $mysqli->query($sqlSkills);
            $dataSkills = $resultSkills->fetch_all();

            if (count($data) == 0) {
                header('location: index.php?c=Home&a=Index');
            } else {
                $user2 = $data[0];
                $query = 'SELECT * FROM users';
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                require_once ROOT . '/Views/client/Account/profile.php';
            }
     
        }

        // Cập nhật avatar --> vai trò ứng viên
        function UpdateAvatar () {
            $id = $_POST["id"];
             
            // Xử lý ảnh
            $temp = explode(".", $_FILES["UserAvatar2"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES['UserAvatar2']['tmp_name'], "Assets/upload/user_avatar/".$newfilename);

            $url_avatar = $newfilename;

            include ROOT. '/Common/database.php'; 
                $query = "UPDATE users
                            SET url_avatar = '$url_avatar'
                          WHERE id = $id ";
                $result = $mysqli->query($query);
            
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=User&a=Profile&id=$id");
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=User&a=Profile&id=$id'");
                }

        }

        // Cập nhật thông tin --> vai trò Ứng viên
        function UpdateProfile () {
            $id = $_POST["id"];

            $first_name = $_POST['FirstName'];
            $last_name = $_POST['LastName'];
            $full_name = ($last_name .' '. $first_name);
            $gender = $_POST['Gender'];
            $address = $_POST['Address'];
            $phone = $_POST['Phone'];

            $orgDate = $_POST['Birth'];
            $date = str_replace('-"', '/', $orgDate);  
            $newDate = date("Y/m/d", strtotime($date)); 
            $birth = $newDate;
            // $contact_name = $_POST['ContactName'];
            // $name = $_POST['CompanyName'];
            // $address = $_POST['CompanyAddress'];
            // $province_id = $_POST['CompanyProvince'];
            // $company_is_active = 1; // 1 -> active // 0 -> inactive

            include ROOT. '/Common/database.php'; 
                $query = "UPDATE users
                            SET first_name = '$first_name',
                                last_name = '$last_name',
                                full_name = '$full_name',
                                date_of_birth = '$birth',
                                phone = '$phone',
                                gender = $gender,
                                address = '$address'
                          WHERE id = $id ";
                $result = $mysqli->query($query);
            
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=User&a=Profile&id=$id");
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=User&a=Profile&id=$id'");
                }
        }

        // Đăng xuất
        function DangXuat()
        {
            session_start(); 
 
            if (isset($_SESSION['login_user'])){
                unset($_SESSION['login_user']); // xóa session login
                session_destroy();

                header("Location: index.php");
            }
            
        }

        // Đăng ký --> vai trò Nhà Tuyển Dụng
        function SignUp()
        {
             include ROOT. '/Common/database.php'; 
             $query = 'SELECT * FROM provinces';
             $result = $mysqli->query($query);
             $data = $result->fetch_all();

             require_once ROOT . '/Views/recruitment/Account/signup.php';
        }

        // Đăng ký --> vai trò Nhà Tuyển Dụng
        function ResponseSignUp()
        {
            if (isset($_POST)) {
                if ($_POST['Password'] !== $_POST['ConfirmPassword']) {
                    die('Password and Confirm password should match!');   
                } 
                else 
                {
                    $email = $_POST['Email'];
                    $password = $_POST['Password'];
                    $first_name = $_POST['FirstName'];
                    $last_name = $_POST['LastName'];
                    $full_name = ($last_name .' '. $first_name);

                    $contact_name = $_POST['ContactName'];
                    $name = $_POST['CompanyName'];
                    $address = $_POST['CompanyAddress'];
                    $province_id = $_POST['CompanyProvince'];
                    $company_is_active = 1; // 1 -> active // 0 -> inactive

                    // Mã khóa mật khẩu
                    $password = md5($password);

                    $user_type = 2; // 1 -> candidate // 2 -> recruitment
                    $is_active = 1; // 1 -> active // 0 -> inactive

                    include ROOT. '/Common/database.php'; 

                    // Kiểm tra tồn tại
                    $checkExists = "SELECT * FROM users WHERE email = '$email'";
                    $resultExists = $mysqli->query($checkExists);
                    $countExists = mysqli_num_rows($resultExists);

                    $errorExists ="";
                    if($countExists > 0) {
                        die("Tài khoản đã tồn tại");
                    } else {
                        $query = "INSERT INTO users(email, password, first_name, last_name, full_name, user_type, is_active) 
                        VALUES ('$email', '$password', '$first_name', '$last_name', '$full_name', $user_type, $is_active)";

                        $result = $mysqli->query($query);

                        $query2 = "INSERT INTO user_company(user_id,contact_name,name,address,province_id,is_active) 
                        VALUES ((SELECT users.id FROM users WHERE email = '$email'), '$contact_name', '$name', '$address', $province_id, $is_active)";
                        $result2 = $mysqli->query($query2);

                        // thêm vào bảng userrole 
                        // set quyền client cho user
                        $sql_insert_userrole = "INSERT INTO userrole(user_id, role_id) 
                        SELECT users.id, roles.id 
                        FROM roles, users 
                        WHERE roles.role_name = 'Recruitment' 
                        AND users.email = '$email'";

                        $result_insert_userrole = $mysqli->query($sql_insert_userrole);

                        header('location: /techjob/?c=User&a=SignUpStatus');
                    }

                    
                }

                
            }
        }

        // Đăng ký thành công --> vai trò NTD
        function getSignUp () {
            require_once ROOT . '/Views/recruitment/Account/signupstatus.php';
        }

        // Đăng ký thành công --> vai trò NTD
        function SignUpStatus () {
            require_once ROOT . '/Views/recruitment/Account/signupstatus.php';
        }

        // Quản lý profile --> vai trò NTD
        function RecProfile() {
            $id = $_GET['id'];

            include ROOT. '/Common/database.php'; 
            $query = "SELECT users.*, user_company.*, provinces.name FROM users, user_company, provinces 
            WHERE users.id = $id AND users.id = user_company.user_id AND provinces.id = user_company.province_id";
            $result = $mysqli->query($query);
            $data = $result->fetch_all();

            $sqlExperiences = "SELECT * FROM experiences, users, user_experiences 
            WHERE experiences.id = user_experiences.experience_id
            AND user_experiences.user_id = users.id
            AND users.id = $id";
            $resultExperiences = $mysqli->query($sqlExperiences);
            $dataExperiences = $resultExperiences->fetch_all();

            $sqlSkills = "SELECT skills.name, skills.level FROM skills, users, user_skills 
            WHERE skills.id = user_skills.skill_id AND user_skills.user_id = users.id
            AND users.id = $id";
            $resultSkills = $mysqli->query($sqlSkills);
            $dataSkills = $resultSkills->fetch_all();

            if (count($data) == 0) {
                header('location: index.php?c=Home&a=Index');
            } else {
                $user2 = $data[0];
                $query = 'SELECT * FROM users';
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                require_once ROOT . '/Views/recruitment/Account/profile.php';
            }
     
        }

        // Cập nhật avatar --> vai trò NTD
        function RecUpdateAvatar () {
            $id = $_POST["id"];
             
            // Xử lý ảnh
            $temp = explode(".", $_FILES["UserAvatar"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES['UserAvatar']['tmp_name'], "Assets/upload/user_avatar/".$newfilename);

            $url_avatar = $newfilename;

            include ROOT. '/Common/database.php'; 
                $query = "UPDATE users
                            SET url_avatar = '$url_avatar'
                          WHERE id = $id ";
                $result = $mysqli->query($query);
            
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=User&a=RecProfile&id=$id");
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=User&a=RecProfile&id=$id'");
                }

        }

        // Cập nhật logo công ty --> vai trò NTD
        function RecUpdateLogo () {
            $id = $_POST["id"];
            $uid = $_POST["uid"];
             
            // Xử lý ảnh
            $temp = explode(".", $_FILES["CompanyLogo"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES['CompanyLogo']['tmp_name'], "Assets/upload/company_image/".$newfilename);

            $url_avatar = $newfilename;

            include ROOT. '/Common/database.php'; 
                $query = "UPDATE user_company
                            SET image_logo = '$url_avatar'
                          WHERE id = $id ";
                $result = $mysqli->query($query);
            
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=User&a=RecProfile&id=$uid");
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=User&a=RecProfile&id=$uid'");
                }

        }

         // Cập nhật thông tin công ty --> vai trò NTD
        function UpdateCompanyInfo () {
            $id = $_POST["id"];
            $uid = $_POST["uid"];

            $name = $_POST['Name'];
            $size = $_POST['Size'];
            $contact_name = $_POST['ContactName'];
            $website = $_POST['Website'];
            $province_id = $_POST['ProvinceId'];
            $address = $_POST['Address'];
            $detail = $_POST['Introduction'];

            include ROOT. '/Common/database.php'; 
                $query = "UPDATE user_company
                            SET name = '$name',
                                size = $size,
                                contact_name = '$contact_name',
                                website = '$website',
                                province_id = $province_id,
                                detail = '$detail',
                                address = '$address'
                          WHERE id = $id ";
                $result = $mysqli->query($query);
            
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=User&a=RecProfile&id=$uid");
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=User&a=RecProfile&id=$uid'");
                }
            
        }

        // Cập nhật thông tin --> vai trò NTD
        function UpdateReProfile () {
            $id = $_POST["id"];

            $first_name = $_POST['FirstName'];
            $last_name = $_POST['LastName'];
            $full_name = ($last_name .' '. $first_name);
            $gender = $_POST['Gender'];
            $address = $_POST['Address'];
            $phone = $_POST['Phone'];

            $orgDate = $_POST['Birth'];
            $date = str_replace('-"', '/', $orgDate);  
            $newDate = date("Y/m/d", strtotime($date)); 
            $birth = $newDate;
            // $contact_name = $_POST['ContactName'];
            // $name = $_POST['CompanyName'];
            // $address = $_POST['CompanyAddress'];
            // $province_id = $_POST['CompanyProvince'];
            // $company_is_active = 1; // 1 -> active // 0 -> inactive

            include ROOT. '/Common/database.php'; 
                $query = "UPDATE users
                            SET first_name = '$first_name',
                                last_name = '$last_name',
                                full_name = '$full_name',
                                date_of_birth = '$birth',
                                phone = '$phone',
                                gender = $gender,
                                address = '$address'
                          WHERE id = $id ";
                $result = $mysqli->query($query);
            
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=User&a=RecProfile&id=$id");
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=User&a=RecProfile&id=$id'");
                }
        }

        // Cập nhật  kinh nghiệm làm việc --> vai trò NTD
        function AddUserExperience () {
            $id = $_POST["id"];

            $name = $_POST['Name'];
            $company_name = $_POST['CompanyName'];
            
            $orgDate = $_POST['DateBegin'];  
            $date = str_replace('-"', '/', $orgDate);  
            $newDate = date("Y/m/d", strtotime($date)); 
            $time_begin = $newDate;

            $orgDate2 = $_POST['DateEnd'];  
            $date2 = str_replace('-"', '/', $orgDate2);  
            $newDate2 = date("Y/m/d", strtotime($date2)); 
            $time_end = $newDate2;

            // Thêm vào bảng experience
            include ROOT. '/Common/database.php'; 
                $query = "INSERT INTO experiences(name, company_name, time_begin, time_end) VALUES('$name', '$company_name', '$time_begin', '$time_end')";
                $result = $mysqli->query($query);

                $experienceid = $mysqli->insert_id;

            // Thêm và bảng user_experiences
                $query2 = "INSERT INTO user_experiences(user_id, experience_id) VALUES($id, $experienceid)";
                $result2 = $mysqli->query($query2);

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=User&a=RecProfile&id=$id");
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=User&a=RecProfile&id=$id");
                }

        }

        // Cập nhật  kinh nghiệm làm việc --> vai trò Ứng viên
        function AddExperience () {
            $id = $_POST["id"];

            $name = $_POST['Name'];
            $company_name = $_POST['CompanyName'];
            
            $orgDate = $_POST['DateBegin'];  
            $date = str_replace('-"', '/', $orgDate);  
            $newDate = date("Y/m/d", strtotime($date)); 
            $time_begin = $newDate;

            $orgDate2 = $_POST['DateEnd'];  
            $date2 = str_replace('-"', '/', $orgDate2);  
            $newDate2 = date("Y/m/d", strtotime($date2)); 
            $time_end = $newDate2;

            // Thêm vào bảng experience
            include ROOT. '/Common/database.php'; 
                $query = "INSERT INTO experiences(name, company_name, time_begin, time_end) VALUES('$name', '$company_name', '$time_begin', '$time_end')";
                $result = $mysqli->query($query);

                $experienceid = $mysqli->insert_id;

            // Thêm và bảng user_experiences
                $query2 = "INSERT INTO user_experiences(user_id, experience_id) VALUES($id, $experienceid)";
                $result2 = $mysqli->query($query2);

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=User&a=Profile&id=$id");
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=User&a=Profile&id=$id");
                }

        }

        // Cập nhật kỹ năng --> vai trò NTD
        function AddUserSkill () {
            $id = $_POST["id"];

            $name = $_POST['Name'];
            $level = $_POST['Level'];

            // Thêm vào bảng experience
            include ROOT. '/Common/database.php'; 
                $query = "INSERT INTO skills(name, level) VALUES('$name', $level)";
                $result = $mysqli->query($query);

                $skillid = $mysqli->insert_id;

            // Thêm và bảng user_experiences
                $query2 = "INSERT INTO user_skills(user_id, skill_id) VALUES($id, $skillid)";
                $result2 = $mysqli->query($query2);

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=User&a=RecProfile&id=$id");
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=User&a=RecProfile&id=$id");
                }

        }

        // Cập nhật kỹ năng --> vai trò Ứng viên
        function AddSkill () {
            $id = $_POST["id"];

            $name = $_POST['Name'];
            $level = $_POST['Level'];

            // Thêm vào bảng experience
            include ROOT. '/Common/database.php'; 
                $query = "INSERT INTO skills(name, level) VALUES('$name', $level)";
                $result = $mysqli->query($query);

                $skillid = $mysqli->insert_id;

            // Thêm và bảng user_experiences
                $query2 = "INSERT INTO user_skills(user_id, skill_id) VALUES($id, $skillid)";
                $result2 = $mysqli->query($query2);

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=User&a=Profile&id=$id");
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=User&a=Profile&id=$id");
                }

        }


        // Đang nhập --> vai trò NTD
        function SignIn () {
            require_once ROOT . '/Views/recruitment/Account/signin.php';
        }

        // Đăng Nhập --> vai trò Admin
        function SignInAdmin()
        {
             require_once ROOT . '/Views/admin/Account/signin.php';
        }

        // Hiển thị ds user --> vai trò Admin
        function ListUser () {
            include ROOT. '/Common/database.php'; 
            $query = "SELECT * FROM users";
            $result = $mysqli->query($query);
            $userData = $result->fetch_all();

            require_once ROOT . '/Views/admin/User/index.php';
        }

        // Từ chối truy cập (không có quyên) --> vai trò Admin
        function AdminDenied()
        {
            require_once ROOT . '/Views/admin/Account/denied.php';
        }

        // Khóa tài khoản --> vai trò Admin
        function DisableAccount () {
            $id = $_GET['id'];
            include ROOT. '/Common/database.php'; 
            $query = "SELECT * FROM users WHERE users.id='$id'";
            $result = $mysqli->query($query);
            $data = $result->fetch_all();

            $us = $data[0];

            if($us[12] == 1) {
                // include ROOT. '/Common/database.php'; 
                $queryS0 = "UPDATE users
                            SET is_active = 0
                          WHERE id = $id ";
                $resultS0 = $mysqli->query($queryS0);

                if($resultS0) {
                    setcookie("status", "Khóa tài khoản thành công!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=User&a=ListUser');
                } else {
                    setcookie("status", "Data not switched successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=User&a=ListUser');
                }
            } else if ($us[12] == 0) {
                $queryS1 = "UPDATE users
                            SET is_active = 1
                          WHERE id = $id ";
                $resultS1 = $mysqli->query($queryS1);

                if($resultS1) {
                    setcookie("status", "Active tài khoản thành công!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=User&a=ListUser');
                } else {
                    setcookie("status", "Data not switched successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=User&a=ListUser');
                }
            }
        }

        // Quản lý tài khoản Admin --> vai trò Admin
        function AdminProfile () {
            $id = $_GET['id'];

            include ROOT. '/Common/database.php'; 
            $query = "SELECT users.*FROM users
            WHERE users.id = $id";
            $result = $mysqli->query($query);
            $data = $result->fetch_all();

            if (count($data) == 0) {
                header('location: index.php?c=Home&a=Admin');
            } else {
                $user2 = $data[0];
                $query = 'SELECT * FROM users';
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                require_once ROOT . '/Views/admin/Account/profile.php';
            }
        }

        // Cập nhật thông tin --> vai trò Admin
        function UpdateAdminProfile () {
            $id = $_POST["id"];

            $first_name = $_POST['FirstName'];
            $last_name = $_POST['LastName'];
            $full_name = ($last_name .' '. $first_name);
            $gender = $_POST['Gender'];
            $address = $_POST['Address'];
            $phone = $_POST['Phone'];

            $orgDate = $_POST['Birth'];
            $date = str_replace('-"', '/', $orgDate);  
            $newDate = date("Y/m/d", strtotime($date)); 
            $birth = $newDate;
            // $contact_name = $_POST['ContactName'];
            // $name = $_POST['CompanyName'];
            // $address = $_POST['CompanyAddress'];
            // $province_id = $_POST['CompanyProvince'];
            // $company_is_active = 1; // 1 -> active // 0 -> inactive

            include ROOT. '/Common/database.php'; 
                $query = "UPDATE users
                            SET first_name = '$first_name',
                                last_name = '$last_name',
                                full_name = '$full_name',
                                date_of_birth = '$birth',
                                phone = '$phone',
                                gender = $gender,
                                address = '$address'
                          WHERE id = $id ";
                $result = $mysqli->query($query);
            
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=User&a=AdminProfile&id=$id");
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=User&a=AdminProfile&id=$id'");
                }
        }

        // Cập nhật avatar --> vai trò Admin
        function AdminUpdateAvatar () {
            $id = $_POST["id"];
             
            // Xử lý ảnh
            $temp = explode(".", $_FILES["UserAvatar2"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES['UserAvatar2']['tmp_name'], 'Assets/upload/user_avatar/' . $newfilename);

            $url_avatar = $newfilename;
            

            include ROOT. '/Common/database.php'; 
                $query = "UPDATE users
                            SET url_avatar = '$url_avatar'
                          WHERE id = $id ";
                $result = $mysqli->query($query);
            
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header("location: index.php?c=User&a=AdminProfile&id=$id");
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header("location: index.php?c=User&a=AdminProfile&id=$id'");
                }

        }


        // -- // -- // -- // -- // ... ... // -- // -- // -- // -- //

        
        // - [LÊ HIẾU] -- Ứng viên xem phản hồi từ NTD
        function UserReceivedMessages () {
            $id = $_GET['id'];

            include ROOT. '/Common/database.php'; 
            $query = "SELECT * FROM messages_from_employers
            WHERE user_id = $id";
            $result = $mysqli->query($query);
            $dataMessages = $result->fetch_all();

            require_once ROOT . '/Views/client/Account/messages.php';
        }

    }
?>