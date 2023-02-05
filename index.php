<?php
    //Kiem tra Controller
    define('ROOT', __DIR__);
    $get_controller = isset($_GET['c'])?$_GET['c']:'Home';
    //Kiem tra Action
    $get_action = isset($_GET['a'])?$_GET['a']:'Index';
    $controller = $get_controller.'Controller';
    $file_controller = 'Controllers/'.$controller.'.php';
    if(!file_exists($file_controller)){
    //Xử lý nếu không tồn tại Controller
        echo '404';
        die();
    }
    //Chèn file controller vào index
    require_once $file_controller;
    //Khởi tạo đối tượng.
    $controllerObject = new $controller();
    //Kiểm tra action có tồn tại không
    if(!method_exists($controllerObject,$get_action)){
        echo '404';
        die();
    }
    //Gọi đến action mà người dùng yêu cầu
    $controllerObject->{$get_action}();
?>