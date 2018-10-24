<?php
session_start();
$_SESSION = [];
session_destroy();
$message = "退出成功";
$url = "login.php";
$panel = "success";
$color = "lawngreen";
include_once "../template/admin/notice.html";