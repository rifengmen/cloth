<?php
session_start();
if (!isset($_SESSION['islogin']) == "yes") {
    $message = "请进行登录";
    $url = "login.php";
    $panel = "danger";
    $color = "red";
    include_once "../template/admin/notice.html";
    exit();
}