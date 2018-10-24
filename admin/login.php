<?php
// 处理登录模块
// 1.打开登录页面
// 2.验证登录信息

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include_once '../template/admin/login.html';
}
else {
    $mysql = new mysqli('localhost','root','','cloth','3306');
    if ($mysql -> connect_errno) {
        echo "数据库连接失败，失败原因是" . $mysql -> connect_errno;
        exit();
    };
    $mysql -> query('set names utf8');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from manage where username='$username'";
    $res = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    if (!count($res)) {
        $color = "red";
        $panel = "danger";
        $message = "用户不存在";
        $url = "login.php";
        include_once '../template/admin/notice.html';
        exit();
    };
    for ($i = 0;$i < count($res);$i++) {
        if ($res[$i]['password'] == $password) {
            session_start();
            $_SESSION['islogin'] = "yes";
            $_SESSION['username'] = $username;
            $color = "lawngreen";
            $panel = "success";
            $message = "登录成功";
            $url = "index.php";
            include_once '../template/admin/notice.html';
            exit();
        }
    };
    $color = "red";
    $panel = "danger";
    $message = "用户密码错误";
    $url = "login.php";
    include_once '../template/admin/notice.html';
}
