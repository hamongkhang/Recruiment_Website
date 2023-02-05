<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    $mysqli = new mysqli('localhost', 'root', 'Yeulaitudau240320012001', 'test_2');

    $user_email = $_SESSION['login_user'];

    $query_check_role = "SELECT roles.role_name FROM users, roles, userrole
    WHERE users.email = '$user_email'
    AND userrole.role_id = roles.id
    AND userrole.user_id = users.id";

    $result_check_role = $mysqli->query($query_check_role);
    $data_check_role = $result_check_role->fetch_all();

    // $list_role = $data_check_role[0];

    // Kết quả trả về là list các role của user trong session
?>