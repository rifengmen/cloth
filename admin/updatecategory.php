<?php
include_once "../lib/checklogin.php";
include_once "../lib/publics.php";
include_once "../lib/function.php";
if ( $_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $res = $mysql -> query("select * from category where id=$id") -> fetch_assoc();
    $obj = new Menu();
    // 传入参数
    $str = $obj -> getCate($mysql,'category','0','0',$id);
    // 调用文档
    include_once "../template/admin/updatecategory.html";
}
else if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $arr = $_POST;
    $id1 = $arr['id'];
    array_pop($arr);
    $sql = "update category set ";
    foreach ($arr as $key => $value) {
        $sql .= "$key='$value',";
    }
    $sql = substr($sql,0,-1) . "where id=$id1";
//    $id1 = $_POST['id'];
//    $title = $_POST['title'];
//    $des = $_POST['des'];
//    $pid = $_POST['pid'];
//    $sql = "update category set title='$title',des='$des',pid='$pid' where id='$id1'";
    $mysql -> query($sql);
    if ($mysql -> affected_rows == 1) {
        $message = "修改成功";
        $panel = "success";
        $url = "querycategory.php";
    }
    else {
        $message = "修改失败";
        $panel = "danger";
        $url = "querycategory.php?=" . $id1;
    }
    include_once "../template/admin/notice.html";
}