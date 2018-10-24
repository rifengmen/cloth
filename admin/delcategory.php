<?php
include_once "../lib/checklogin.php";
include_once "../lib/publics.php";
$id = $_GET['id'];
$sql = "select * from category where pid=$id";
$res = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
if (count($res)) {
    $message = "当前目录存在子元素";
    $panel = "danger";
    $url = "querycategory.php";
}
else {
    $sql1 = "delete from category where id=$id";
    $mysql -> query($sql1);
    if ($mysql -> affected_rows == 1) {
        $message = "数据删除成功";
        $panel = "success";
        $url = "querycategory.php";
    }
    else {
        $message = "数据删除失败";
        $panel = "danger";
        $url = "querycategory.php";
    };
}
include_once "../template/admin/notice.html";