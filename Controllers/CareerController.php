<?php
    class CareerController {

        // Quản lý ngành nghề trên Admin 
        function Index()
        {
            include ROOT. '/Common/database.php'; 
            $query = "SELECT * FROM careers";
            $result = $mysqli->query($query);
            $careerData = $result->fetch_all();

            require_once ROOT . '/Views/admin/Career/index.php';
        }

        function Create()
        {
            require_once ROOT . '/Views/admin/Career/create.php';
        }

        function RequestCreate()
        {
            if (isset($_POST)) {
                $name = $_POST['Name'];

                include ROOT. '/Common/database.php'; 
                $query = "INSERT INTO careers(name) VALUES('$name')";
                $result = $mysqli->query($query);

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Career&a=Index');
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Career&a=Create');
                }
                
            }
        }

        function Update()
        {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Career&a=Index');
            } else {
                $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "SELECT * FROM careers WHERE id='$id'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                if (count($data) == 0) {
                    header('location: index.php?c=Career&a=Index');
                } else {
                    $career = $data[0];
                    
                    $query = 'SELECT * FROM careers';
                    $result = $mysqli->query($query);
                    $data = $result->fetch_all();
                    require_once ROOT . '/Views/admin/Career/update.php';
                }
            }
        }

        function RequestUpdate()
        {
            if (isset($_POST)) {
                $id = $_POST['id'];
                $name = $_POST['Name'];
                
                include ROOT. '/Common/database.php'; 
                $query = "UPDATE careers
                            SET name ='$name' 
                          WHERE id = $id ";
                $result = $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Career&a=Index');
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Career&a=Update');
                }

            }
        }

        function Delete()
        {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Career&a=Index');
            } else {
                $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "DELETE FROM careers WHERE id='$id'";
                $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if(!$result) {
                    setcookie("status", "Deleted data successfully!", time() + 1, "/");
                    setcookie("status_code", "success", time() + 1, "/");

                    
                } else {
                    setcookie("status", "Data not deleted successfully!", time() + 1, "/");
                    setcookie("status_code", "error", time() + 1, "/");

                }

                header('location: index.php?c=Career&a=Index');

            }
        }

        // Quản lý ngành nghề trên Recruitment
        function DanhSach()
        {
            include ROOT. '/Common/database.php'; 
            $query = "SELECT * FROM careers";
            $result = $mysqli->query($query);
            $careerData = $result->fetch_all();

            require_once ROOT . '/Views/recruitment/Career/index.php';
        }

        function ThemMoi()
        {
            require_once ROOT . '/Views/recruitment/Career/create.php';
        }

        function LuuThemMoi()
        {
            if (isset($_POST)) {
                $name = $_POST['Name'];

                include ROOT. '/Common/database.php'; 
                $query = "INSERT INTO careers(name) VALUES('$name')";
                $result = $mysqli->query($query);

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Career&a=DanhSach');
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Career&a=ThemMoi');
                }
                
            }
        }

        function ChinhSua()
        {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Career&a=DanhSach');
            } else {
                $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "SELECT * FROM careers WHERE id='$id'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();
                if (count($data) == 0) {
                    header('location: index.php?c=Career&a=DanhSach');
                } else {
                    $career = $data[0];
                    
                    $query = 'SELECT * FROM careers';
                    $result = $mysqli->query($query);
                    $data = $result->fetch_all();
                    require_once ROOT . '/Views/recruitment/Career/update.php';
                }
            }
        }

        function LuuChinhSua()
        {
            if (isset($_POST)) {
                $id = $_POST['id'];
                $name = $_POST['Name'];
                
                include ROOT. '/Common/database.php'; 
                $query = "UPDATE careers
                            SET name ='$name' 
                          WHERE id = $id ";
                $result = $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Career&a=DanhSach');
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Career&a=ChinhSua');
                }

            }
        }

        function Xoa()
        {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Career&a=DanhSach');
            } else {
                $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "DELETE FROM careers WHERE id='$id'";
                $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if(!$result) {
                    setcookie("status", "Deleted data successfully!", time() + 1, "/");
                    setcookie("status_code", "success", time() + 1, "/");

                    
                } else {
                    setcookie("status", "Data not deleted successfully!", time() + 1, "/");
                    setcookie("status_code", "error", time() + 1, "/");

                }

                header('location: index.php?c=Career&a=DanhSach');

            }
        }
    }
?>