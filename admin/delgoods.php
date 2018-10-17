<?php
include_once "../lib/publics.php";
$id = $_GET['id'];
$sql = "delete from goods where id=$id";
$mysql -> query($sql);
if ($mysql -> affected_rows == 1) {
    $message = "数据删除成功";
    $panel = "success";
    $url = "querygoods.php";
}
else {
    $message = "数据删除失败";
    $panel = "danger";
    $url = "querygoods.php";
};
include_once "../template/admin/notice.html";