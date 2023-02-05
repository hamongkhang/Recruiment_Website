<?php
    class PostController {
        // - [CHI] - Hiển thị danh sách các tin tức ở trang NTD
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
                include ROOT. '/Common/database.php'; 
                $query = "SELECT * FROM posts WHERE created_by = $user_id[0] ORDER BY update_on DESC";
                $result = $mysqli->query($query);
                $postData = $result->fetch_all();

            require_once ROOT . '/Views/recruitment/Post/index.php';
           
        }

        // - [CHI] - function xử lý chuỗi
        public function to_slug($str) {
            $str = trim(mb_strtolower($str));
            $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
            $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
            $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
            $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
            $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
            $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
            $str = preg_replace('/(đ)/', 'd', $str);
            $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
            $str = preg_replace('/([\s]+)/', '-', $str);
            return $str;
        }

        // - [CHI] - Thêm mới tin tức ở trang NTD
        function Create()
        {
            require_once ROOT . '/Views/recruitment/Post/create.php';
        }

        // - [CHI] - Thêm mới tin tức ở trang NTD
        function RequestCreate()
        {
            if (isset($_POST)) {
                $name = $_POST['Name'];
                $description = $_POST['Description'];
                $content = $_POST['Content'];

                // Xử lý ảnh
                $temp = explode(".", $_FILES["Thumbnail"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                move_uploaded_file($_FILES['Thumbnail']['tmp_name'], "Assets/upload/post_thumb/".$newfilename);

                $thumbnail = $newfilename;
                
                // Lấy thời gian hiện tại
                $orgDateNow = date('Y-m-d');  
                $dateNow = str_replace('-"', '/', $orgDateNow);  
                $newDateNow = date("Y/m/d", strtotime($dateNow)); 

                $created_on = $newDateNow;
                $update_on= $newDateNow;

                $created_by = $_POST['CreatedBy'];
                $is_active = 1; // 1 -> Active // 0 -> InActive

                include ROOT. '/Common/database.php'; 

                // Thêm dữ liệu vào bảng posts
                $query = "INSERT INTO posts(name, description, thumbnail, content, created_on, update_on, created_by, is_active) 
                VALUES('$name', '$description', '$thumbnail', '$content', '$created_on', '$update_on', $created_by, $is_active)";
                $result = $mysqli->query($query);

                // Tìm đến id của post vừa tạo
                $query_select_id = "SELECT posts.id FROM posts WHERE name = '$name' ";
                $result_select_id = $mysqli->query($query_select_id);

                // gán id tìm đc cho $postid
                $data_select_id = $result_select_id->fetch_all();
                $postid = $data_select_id[0];

                // Xử lý tags -> tách các tag từ chuỗi và cắt nhỏ sau dấu phẩy
                $tags = $_POST['Tags'];
                $tag = explode(",", $tags);

                foreach($tag as $tag_item) {
                    include ROOT. '/Common/database.php'; 

                    // Xử lý tag name để định nghĩa id cho tag, ví dụ tagname là việt nam -> tag_id sẽ là viet-nam
                    $slug = $this->to_slug('"' . $tag_item . '"');

                    // Kiểm tra tồn tại của tag
                    $checkExistTag = "SELECT * FROM tags WHERE id = '$slug'";
                    $ExistTagresult = $mysqli->query($checkExistTag);

                    // Thêm tất cả tag vào bảng tags
                    if(mysqli_num_rows($ExistTagresult) <= 0) {
                        $sql = "INSERT INTO tags VALUES('$slug', '$tag_item')";
                        $result2 = $mysqli->query($sql);
                    }

                    // Thêm dữ liệu vào bảng post_tag
                    $insert_post_tag = "INSERT INTO post_tag(tag_id, post_id) VALUES('$slug', $postid[0])";
                    $result_insert = $mysqli->query($insert_post_tag);
                    
                }

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Post&a=Index');
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Post&a=Create');
                }
                
            }
        }

        // - [CHI] - Chỉnh sửa tin tức ở trang NTD
        function Update()
        {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Post&a=Index');
            } else {
                $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "SELECT * FROM posts WHERE posts.id='$id'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();

                // Lấy dữ liệu của bảng tag
                $sql_tag = "SELECT tags.name FROM post_tag, tags WHERE post_id = '$id' AND post_tag.tag_id = tags.id";
                $resultTag = $mysqli->query($sql_tag);
                $datatag = $resultTag->fetch_all();

                if (count($data) == 0) {
                    header('location: index.php?c=Post&a=Index');
                } else {
                    $post = $data[0];
                    
                    $query = 'SELECT * FROM posts';
                    $result = $mysqli->query($query);
                    $data = $result->fetch_all();
                    require_once ROOT . '/Views/recruitment/Post/update.php';
                }
            }
        }

        // - [CHI] - Chỉnh sửa tin tức ở trang NTD (Fixed OK)
        function RequestUpdate()
        {
            if (isset($_POST)) {
                $id = $_POST['id'];
                $name = $_POST['Name'];
                $description = $_POST['Description'];
                $content = $_POST['Content'];

                
                

                // Lấy thời gian hiện tại
                $orgDateNow = date('Y-m-d');  
                $dateNow = str_replace('-"', '/', $orgDateNow);  
                $newDateNow = date("Y-m-d", strtotime($dateNow)); 

                $update_on = $newDateNow;

                $created_by = $_POST['CreatedBy'];
                $is_active = 1; // 1 -> Active // 0 -> InActive
                
                include ROOT. '/Common/database.php'; 
                // Xử lý ảnh
                if(!isset($_FILES["Thumbnail"]["name"])) {
                    $query = "UPDATE posts
                            SET name ='$name',
                                description = '$description',
                                content = '$content',
                                update_on = '$update_on',
                                created_by = $created_by,
                                is_active = $is_active
                          WHERE id = $id ";
                } else {
                    $temp = explode(".", $_FILES["Thumbnail"]["name"]);
                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    move_uploaded_file($_FILES['Thumbnail']['tmp_name'], "Assets/upload/post_thumb/".$newfilename);

                    $thumbnail = $newfilename;
                    $query = "UPDATE posts
                            SET name ='$name',
                                description = '$description',
                                content = '$content',
                                thumbnail = '$thumbnail',
                                update_on = '$update_on',
                                created_by = $created_by,
                                is_active = $is_active
                          WHERE id = $id ";
                }
                
                $result = $mysqli->query($query);

                // Xử lý tags -> tách các tag từ chuỗi và cắt nhỏ sau dấu phẩy
                $tags = $_POST['Tags'];
                $tag = explode(",", $tags);

                // (test case 2: Xóa tag trong khi sửa post)
                $delete_post_tag = "DELETE FROM post_tag WHERE post_id = $id";
                $result_delete = $mysqli->query($delete_post_tag);

                foreach($tag as $tag_item) {
                    include ROOT. '/Common/database.php'; 

                    // Xử lý tag name để định nghĩa id cho tag, ví dụ tagname là việt nam -> tag_id sẽ là viet-nam
                    $slug = $this->to_slug('"' . $tag_item . '"');

                    // Kiểm tra tồn tại của tag
                    $checkExistTag = "SELECT * FROM tags WHERE id = '$slug'";
                    $ExistTagresult = $mysqli->query($checkExistTag);

                    // Kiểm tra tồn tại của tag trong posttag (test case 1: Xử lý lỗi double record of tags)
                    $checkExistPostTag = "SELECT * FROM post_tag WHERE tag_id = '$slug' AND post_id = $id";
                    $ExistPostTagresult = $mysqli->query($checkExistPostTag);

                    // (test case 3: Lỗi on change image)

                    // Thêm tất cả tag vào bảng tags
                    if(mysqli_num_rows($ExistTagresult) <= 0) {
                        $sql = "INSERT INTO tags VALUES('$slug', '$tag_item')";
                        $result2 = $mysqli->query($sql);
                    }

                    if(mysqli_num_rows($ExistPostTagresult) <= 0) {
                        // Thêm dữ liệu vào bảng post_tag
                        $insert_post_tag = "INSERT INTO post_tag(tag_id, post_id) VALUES('$slug', $id)";
                        $result_insert = $mysqli->query($insert_post_tag);
                    } 


                    
                    
                }
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Post&a=Index');
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Post&a=Update');
                }

            }
        }

        // - [CHI] - Xóa tin tức ở trang NTD
        function Delete()
        {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Post&a=Index');
            } else {
                $id = $_GET['id'];

                // Để xóa record trong post, phải xóa đc các bảng con trước
                // 1. Xóa trong bảng post_tag
                // 1.1. Xóa record bảng tag 
                // 1.1.1. Kiểm tra tag, nếu chỉ có 1 thì xóa luôn, 2 trở lên thì để tag lại
                // 1.2. Xóa record post_tag
                // 2. Xóa record bảng comments

                // DO IT

                // Kiểm tra tồn tại của tag
                include ROOT. '/Common/database.php'; 
                $queryPosts = "SELECT * FROM posts WHERE posts.id='$id'";
                $resultPosts = $mysqli->query($queryPosts);
                $dataPosts = $resultPosts->fetch_all();

                $checkExistTag = "SELECT tags.id FROM tags, post_tag WHERE post_tag.post_id = $id AND post_tag.tag_id = tags.id";
                $ExistTagresult = $mysqli->query($checkExistTag);
                $dataExistTag = $ExistTagresult->fetch_all();

                // Kiểm tra post_tag, nếu chỉ có 1 thì xóa luôn, 2 trở lên thì để tag lại
                foreach($dataExistTag as $dataTag) {
                    include ROOT. '/Common/database.php'; 
                    $checkExistTag2 = "SELECT * FROM post_tag WHERE post_tag.tag_id = '$dataTag[0]'";
                    $ExistTagresult2 = $mysqli->query($checkExistTag2);

                    if(mysqli_num_rows($ExistTagresult2) == 1) {
                        $sqlDeleteTag = "DELETE FROM tags WHERE id= '$dataTag[0]'";
                        $resultDeleteTag = $mysqli->query($sqlDeleteTag);
                    }

                }

                // Xóa record trong bảng post_tag
                $queryDeletePostTag = "DELETE FROM post_tag WHERE post_id=$id";
                $mysqli->query($queryDeletePostTag);

                // Xóa record trong bảng comments
                $queryDeletePostTag = "DELETE FROM post_comment WHERE post_id = $id";
                $mysqli->query($queryDeletePostTag);

                // Kiểm tra nêu không có tag nào thì xóa luôn
                if(mysqli_num_rows($ExistTagresult) <= 0) {
                    $sql = "DELETE FROM posts WHERE id=$id";
                    $result2 = $mysqli->query($sql);
                }
                

                include ROOT. '/Common/database.php'; 
                $query = "DELETE FROM posts WHERE id=$id";
                $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if(!$result) {
                    setcookie("status", "Deleted data successfully!", time() + 1, "/");
                    setcookie("status_code", "success", time() + 1, "/");

                    
                } else {
                    setcookie("status", "Data not deleted successfully!", time() + 1, "/");
                    setcookie("status_code", "error", time() + 1, "/");

                }

                header('location: index.php?c=Post&a=Index');

            }
        }

        // - [CHI] - Xem chi tiết bài viết ở Client
        function ChiTiet() {
            $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "SELECT posts.*, user_company.name, users.full_name, users.url_avatar, user_company.image_logo, user_company.detail
                FROM posts, users, user_company 
                WHERE posts.id = $id AND posts.created_by = users.id AND user_company.user_id = users.id";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();

                $list_comment = "SELECT post_comment.*, users.full_name, users.url_avatar FROM post_comment, users
                WHERE post_comment.post_id = $id AND users.id = post_comment.user_id";
                $result_cmt = $mysqli->query($list_comment);
                $dataListComment = $result_cmt->fetch_all();

                $list_tags = "SELECT tags.name, tags.id FROM posts, post_tag, tags
                WHERE posts.id = $id AND posts.id = post_tag.post_id AND post_tag.tag_id = tags.id";
                $result_tags = $mysqli->query($list_tags);
                $dataListTags = $result_tags->fetch_all();

                if (count($data) == 0) {
                    header('location: index.php?c=Home&a=Index');
                } else {
                    $post = $data[0];
                    $query = 'SELECT * FROM jobs';
                    $result = $mysqli->query($query);
                    $data = $result->fetch_all();
                    require_once ROOT . '/Views/client/Post/detail.php';
                }
        }

        

        // - [Chi] - Hiển thị bài viết theo tag ở client
        function Tag () {
            $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $queryPT = "SELECT posts.*, users.full_name, tags.name FROM posts, post_tag, tags, users
                WHERE tags.id = '$id' AND posts.id = post_tag.post_id AND post_tag.tag_id = tags.id AND posts.created_by = users.id";
                $resultPT = $mysqli->query($queryPT);
                $dataPostFromTag = $resultPT->fetch_all();

                $queryTag = "SELECT tags.*, COUNT(post_tag.post_id) as 'NumPost'  FROM tags, posts, post_tag 
                WHERE posts.id = post_tag.post_id AND post_tag.tag_id = tags.id  GROUP By tags.id";
                $resultTag = $mysqli->query($queryTag);
                $dataTag = $resultTag->fetch_all();


                require_once ROOT . '/Views/client/Post/tags.php';
                if (count($dataPostFromTag) == 0) {
                    header('location: index.php?c=Home&a=Index');
                }
        }

        // - [Chi] - Hiển thị tất cả bài viết ở client
        function ListAllPosts () {

                include ROOT. '/Common/database.php'; 
                $queryPT = "SELECT posts.*, users.full_name FROM posts, users WHERE posts.created_by = users.id";
                $resultPT = $mysqli->query($queryPT);
                $dataPosts = $resultPT->fetch_all();

                $queryTag = "SELECT tags.*, COUNT(post_tag.post_id) as 'NumPost'  FROM tags, posts, post_tag 
                WHERE posts.id = post_tag.post_id AND post_tag.tag_id = tags.id  GROUP By tags.id";
                $resultTag = $mysqli->query($queryTag);
                $dataTag = $resultTag->fetch_all();

                require_once ROOT . '/Views/client/Post/list_posts.php';
                
        }

        
        

        // - [CHI] - Danh sách Tin tức trên trang ADMIN
        function ListPosts()
        {
                // Hiển thị
                include ROOT. '/Common/database.php'; 
                $query = "SELECT posts.*, users.full_name, user_company.name FROM posts, users , user_company
                WHERE posts.created_by = users.id AND users.id = user_company.user_id ORDER BY update_on DESC";
                $result = $mysqli->query($query);
                $postData = $result->fetch_all();

            require_once ROOT . '/Views/admin/Post/index.php';
           
        }

        // - [CHI] - Chuyển đổi trạng thái Tin tức trên trang ADMIN
        function SwitchStatus () {
            $id = $_GET['id'];
            include ROOT. '/Common/database.php'; 
            $query = "SELECT * FROM posts WHERE posts.id='$id'";
            $result = $mysqli->query($query);
            $data = $result->fetch_all();

            $post = $data[0];

            if($post[8] == 1) {
                // include ROOT. '/Common/database.php'; 
                $queryS0 = "UPDATE posts
                            SET is_active = 0
                          WHERE id = $id ";
                $resultS0 = $mysqli->query($queryS0);

                if($resultS0) {
                    setcookie("status", "Switched status successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Post&a=ListPosts');
                } else {
                    setcookie("status", "Data not switched successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Post&a=ListPosts');
                }
            } else if ($post[8] == 0) {
                $queryS1 = "UPDATE posts
                            SET is_active = 1
                          WHERE id = $id ";
                $resultS1 = $mysqli->query($queryS1);

                if($resultS1) {
                    setcookie("status", "Switched status successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Post&a=ListPosts');
                } else {
                    setcookie("status", "Data not switched successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Post&a=ListPosts');
                }
            }

            
        }

        // - [CHI] - Chỉnh sửa bài viết trên trang ADMIN
        function AdminUpdate()
        {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Post&a=ListPosts');
            } else {
                $id = $_GET['id'];
                include ROOT. '/Common/database.php'; 
                $query = "SELECT * FROM posts WHERE posts.id='$id'";
                $result = $mysqli->query($query);
                $data = $result->fetch_all();

                // Lấy dữ liệu của bảng tag
                $sql_tag = "SELECT tags.name FROM post_tag, tags WHERE post_id = '$id' AND post_tag.tag_id = tags.id";
                $resultTag = $mysqli->query($sql_tag);
                $datatag = $resultTag->fetch_all();

                if (count($data) == 0) {
                    header('location: index.php?c=Post&a=ListPosts');
                } else {
                    $post = $data[0];
                    
                    $query = 'SELECT * FROM posts';
                    $result = $mysqli->query($query);
                    $data = $result->fetch_all();
                    require_once ROOT . '/Views/admin/Post/update.php';
                }
            }
        }

        // - [CHI] - Chỉnh sửa bài viết trên trang ADMIN
        function RequestAdminUpdate()
        {
            if (isset($_POST)) {
                $id = $_POST['id'];
                $name = $_POST['Name'];
                $description = $_POST['Description'];
                $content = $_POST['Content'];

                // Xử lý ảnh
                $temp = explode(".", $_FILES["Thumbnail"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                move_uploaded_file($_FILES['Thumbnail']['tmp_name'], "Assets/upload/post_thumb/".$newfilename);

                $thumbnail = $newfilename;

                // Lấy thời gian hiện tại
                $orgDateNow = date('Y-m-d');  
                $dateNow = str_replace('-"', '/', $orgDateNow);  
                $newDateNow = date("Y-m-d", strtotime($dateNow)); 

                $update_on = $newDateNow;
                $is_active = 1; // 1 -> Active // 0 -> InActive
                
                include ROOT. '/Common/database.php'; 
                $query = "UPDATE posts
                            SET name ='$name',
                                description = '$description',
                                content = '$content',
                                thumbnail = '$thumbnail',
                                update_on = '$update_on',
                                is_active = $is_active
                          WHERE id = $id ";
                $result = $mysqli->query($query);

                // Xử lý tags -> tách các tag từ chuỗi và cắt nhỏ sau dấu phẩy
                $tags = $_POST['Tags'];
                $tag = explode(",", $tags);

                foreach($tag as $tag_item) {
                    include ROOT. '/Common/database.php'; 

                    // Xử lý tag name để định nghĩa id cho tag, ví dụ tagname là việt nam -> tag_id sẽ là viet-nam
                    $slug = $this->to_slug('"' . $tag_item . '"');

                    // Kiểm tra tồn tại của tag
                    $checkExistTag = "SELECT * FROM tags WHERE id = '$slug'";
                    $ExistTagresult = $mysqli->query($checkExistTag);

                    // Thêm tất cả tag vào bảng tags
                    if(mysqli_num_rows($ExistTagresult) <= 0) {
                        $sql = "INSERT INTO tags VALUES('$slug', '$tag_item')";
                        $result2 = $mysqli->query($sql);
                    }

                    // Thêm dữ liệu vào bảng post_tag
                    $insert_post_tag = "INSERT INTO post_tag(tag_id, post_id) VALUES('$slug', $id)";
                    $result_insert = $mysqli->query($insert_post_tag);
                    
                }
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Updated data successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Post&a=ListPosts');
                } else {
                    setcookie("status", "Data not updated successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Post&a=ListPosts');
                }

            }
        }

        
        // -- // -- // -- // -- // ... ... // -- // -- // -- // -- //


        // - [ĐứC HÙNG] - Bình luận tin tức ở Client
        function Comment () {
            if (isset($_POST)) {
                $userid = $_POST['UserId'];
                $postid = $_POST['PostId'];
                $content = $_POST['Content'];

                // Lấy thời gian hiện tại
                $orgDateNow = date('Y-m-d');  
                $dateNow = str_replace('-"', '/', $orgDateNow);  
                $newDateNow = date("Y/m/d", strtotime($dateNow)); 

                $comment_on = $newDateNow;
                $is_active = 1; // 1 -> Active // 0 -> InActive

                include ROOT. '/Common/database.php'; 

                // Thêm dữ liệu vào bảng posts
                $query = "INSERT INTO post_comment(comment, post_id, user_id, comment_on, is_active) 
                VALUES('$content', $postid, $userid, '$comment_on', $is_active)";
                $result = $mysqli->query($query);

                if($result) {
                    setcookie("status", "Created successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Post&a=ChiTiet&id='.$postid);
                } else {
                    setcookie("status", "Data not created successfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Post&a=ChiTiet&id='.$postid);
                }
            }
        }

        // - [ĐứC HÙNG] - Hiển thị danh sách Bình luận về tin tức ở NTD
        function ListComments () {
            $userid = $_GET['id'];

            include ROOT. '/Common/database.php'; 
            $queryCmt = "SELECT post_comment.*, posts.name, posts.id FROM post_comment, posts WHERE posts.id = post_comment.post_id AND posts.created_by = $userid";
            $resultCmt = $mysqli->query($queryCmt);
            $dataCmts = $resultCmt->fetch_all();

            require_once ROOT . '/Views/recruitment/Post/comments.php';
            
        }


        // -- // -- // -- // -- // ... ... // -- // -- // -- // -- //


        // - [QUỐC HIẾU] - Hiển thị  danh sách các report NTD
        function ListReports () {
            $userid = $_GET['id'];

            include ROOT. '/Common/database.php'; 
            $queryRp = "SELECT report_post_comment.*, post_comment.comment, posts.id
            FROM report_post_comment, post_comment, posts
            WHERE report_post_comment.report_by = $userid AND post_comment.id = report_post_comment.comment_id
            AND post_comment.post_id = posts.id";
            $resultRp = $mysqli->query($queryRp);
            $dataRps = $resultRp->fetch_all();

            require_once ROOT . '/Views/recruitment/Post/report_comments.php';
            
        }

        // - [QUỐC HIẾU] - Báo cáo comment
        function ReportComment () {
            if (isset($_POST)) {
                $comment_id = $_POST['comment_id'];
                $report_by = $_POST['report_by'];
                $content = $_POST['Content'];

                // Lấy thời gian hiện tại
                $orgDateNow = date('Y-m-d');  
                $dateNow = str_replace('-"', '/', $orgDateNow);  
                $newDateNow = date("Y-m-d", strtotime($dateNow)); 

                $report_on = $newDateNow;

                include ROOT. '/Common/database.php'; 
                $query = "INSERT INTO report_post_comment(content,comment_id,report_by,report_on, status) 
                VALUES('$content', $comment_id, $report_by, '$report_on', 1)";
                $result = $mysqli->query($query);

                // Tạo modal dialog thông báo trạng thái CRUD
                if($result) {
                    setcookie("status", "Reported successfully!", time() + 3, "/");
                    setcookie("status_code", "success", time() + 3, "/");

                    header('location: index.php?c=Post&a=Index');
                } else {
                    setcookie("status", "Reported unsuccessfully!", time() + 3, "/");
                    setcookie("status_code", "error", time() + 3, "/");

                    header('location: index.php?c=Post&a=Create');
                }
            }
        }

        // - [QUỐC HIẾU] - Thu hồi report
        function DeleteReport()
        {
            $uid = $_GET['uid'];
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Post&a=ListReports&id='.$uid);
            } else {
                $id = $_GET['id'];
                
                include ROOT. '/Common/database.php'; 
                $query = "DELETE FROM report_post_comment WHERE id=$id";
                $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if(!$result) {
                    setcookie("status", "Deleted data successfully!", time() + 1, "/");
                    setcookie("status_code", "success", time() + 1, "/");

                    
                } else {
                    setcookie("status", "Data not deleted successfully!", time() + 1, "/");
                    setcookie("status_code", "error", time() + 1, "/");

                }

                header('location: index.php?c=Post&a=ListReports&id='.$uid);

            }
        }

        // - [QUỐC HIẾU] - Xem danh sách các report trên ADMIN
        function ListAdminReports () {
            include ROOT. '/Common/database.php'; 
            $queryRp = "SELECT report_post_comment.*, post_comment.comment, posts.id, post_comment.id
            FROM report_post_comment, post_comment, posts
            WHERE post_comment.id = report_post_comment.comment_id
            AND post_comment.post_id = posts.id";
            $resultRp = $mysqli->query($queryRp);
            $dataRps = $resultRp->fetch_all();

            require_once ROOT . '/Views/admin/Post/report_comments.php';
            
        }

        // - [QUỐC HIẾU] - xóa bình luận vi phạm trên ADMIN
        function AdminDeleteComment()
        {
            if (!isset($_GET['id'])) {
                header('location: index.php?c=Post&a=ListAdminReports');
            } else {
                $id = $_GET['id'];
                $rpid = $_GET['rpid'];
                
                include ROOT. '/Common/database.php'; 
                $queryRP = "DELETE FROM report_post_comment WHERE id=$rpid";
                $mysqli->query($queryRP);

                $query = "DELETE FROM post_comment WHERE id=$id";
                $mysqli->query($query);
                
                // Tạo modal dialog thông báo trạng thái CRUD
                if(!$result) {
                    setcookie("status", "Deleted data successfully!", time() + 1, "/");
                    setcookie("status_code", "success", time() + 1, "/");

                    
                } else {
                    setcookie("status", "Data not deleted successfully!", time() + 1, "/");
                    setcookie("status_code", "error", time() + 1, "/");

                }

                header('location: index.php?c=Post&a=ListAdminReports');

            }
        }
        
    }
?>