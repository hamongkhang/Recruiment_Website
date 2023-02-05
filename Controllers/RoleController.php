<?php
    class RoleController {

        // - [QUỐC HIẾU] - Hiển thị danh sách các quyền ở ADMIN
        function Index()
        {
            include ROOT. '/Common/database.php'; 
            $query = "SELECT * FROM roles";
            $result = $mysqli->query($query);
            $roleData = $result->fetch_all();

            require_once ROOT . '/Views/admin/Role/index.php';
        }

        // - [QUỐC HIẾU] - Thêm mới các quyền ở ADMIN
        function Create()
        {
            require_once ROOT . '/Views/admin/Role/create.php';
        }

        // - [QUỐC HIẾU] - Thêm mới các quyền ở ADMIN
        function RequestCreate()
        {
            if (isset($_POST)) {
                $name = $_POST['Name'];
                $description = $_POST['Description'];

                include ROOT. '/Common/database.php'; 
                $query = "INSERT INTO roles(role_name, description) VALUES('$name', '$description')";
                $result = $mysqli->query($query);

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Role&a=Index');
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Role&a=Create');
                }
                
            }
        }

        // - [QUỐC HIẾU] - Chỉnh sửa các quyền ở ADMIN
        function Update()
        {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Role&a=Index');
            } else {
                $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "SELECT * FROM roles WHERE id='$id'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                if (count($data) == 0) {
                    header('location: index.php?c=Role&a=Index');
                } else {
                    $role = $data[0];
                    
                    $query = 'SELECT * FROM roles';
                    $result = $mysqli->query($query);
                    $data = $result->fetch_all();
                    require_once ROOT . '/Views/admin/Role/update.php';
                }
            }
        }

        // - [QUỐC HIẾU] - Chỉnh sửa các quyền ở ADMIN
        function RequestUpdate()
        {
            if (isset($_POST)) {
                $id = $_POST['id'];
                $name = $_POST['Name'];
                $description = $_POST['Description'];
                
                include ROOT. '/Common/database.php'; 
                $query = "UPDATE Roles
                            SET role_name ='$name',
                                description = '$description'
                          WHERE id = $id ";
                $result = $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Role&a=Index');
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Role&a=Update');
                }

            }
        }

        // - [QUỐC HIẾU] - Xóa các quyền ở ADMIN
        function Delete()
        {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Role&a=Index');
            } else {
                $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "DELETE FROM Roles WHERE id='$id'";
                $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if(!$result) {
                    setcookie("status", "Deleted data successfully!", time() + 1, "/");
                    setcookie("status_code", "success", time() + 1, "/");

                    
                } else {
                    setcookie("status", "Data not deleted successfully!", time() + 1, "/");
                    setcookie("status_code", "error", time() + 1, "/");

                }

                header('location: index.php?c=Role&a=Index');

            }
        }

        // - [QUỐC HIẾU] - Phân quyền ở ADMIN
        function UserAuthen () {
            $id = $_GET["id"];
            if(!isset($id)) {
                header('location: index.php?c=User&a=ListUser');
            } else {
                include ROOT. '/Common/database.php'; 
                $query = "SELECT * FROM roles";
                $result = $mysqli->query($query);
                $roleData = $result->fetch_all();

                $query = "SELECT users.id, users.email FROM users WHERE id = $id";
                $result = $mysqli->query($query);
                $role_userData = $result->fetch_all();
                $roleItem = $role_userData[0];

                require_once ROOT . '/Views/admin/Role/userrole.php';
            }
            
        }

        // - [QUỐC HIẾU] - Phân quyền ở ADMIN
        function ApplyUserAnthen () {
            if (isset($_POST)) {
                $userid = $_POST['id'];
                $roleid = $_POST['RoleName'];
                include ROOT. '/Common/database.php'; 

                // Check exist roles of user
                $checkExists = "SELECT * FROM userrole WHERE user_id = $userid";
                $resultExists = $mysqli->query($checkExists);
                $countExists = mysqli_num_rows($resultExists);

                // Delete all exist roles of user
                if($countExists > 0) {
                    foreach($roleid as $role_item) { 
                    
                        $queryDelete = "DELETE FROM userrole WHERE user_id = $userid";
                        $resultDelete = $mysqli->query($queryDelete);

                        $query = "INSERT INTO userrole(user_id, role_id) VALUES ($userid, $role_item)";
                        $result = $mysqli->query($query);
                    }
                } else {

                // Insert into UserRole

                    foreach($roleid as $role_item) { 
                        
                        $query = "INSERT INTO userrole(user_id, role_id) VALUES ($userid, $role_item)";
                        $result = $mysqli->query($query);
                    }
                    
                }
                
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Role&a=Index');
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Role&a=Update');
                }

            }
        }



    }
?>