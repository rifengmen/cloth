<?php
include_once "../lib/checklogin.php";
include_once "../lib/publics.php";
include_once "../lib/function.php";
include_once "../lib/upload.php";
if ( $_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    // 展示添加页面
    $sql = "select * from goods where id=$id";
    $res = $mysql -> query($sql) -> fetch_assoc();
    // 实例化出自定义方法
    $obj = new Menu();
    // 传入参数
    $str = $obj -> getCate($mysql,'category','0','0');
    // 调用文档
    include_once "../template/admin/updategoods.html";
}
else if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    if (count($_FILES) > 0) {
        $arr = $_POST;
        $file = $_FILES['thumb'];
        $upload = new Upload();
        $thumb = $upload -> upload($file);
        if ($thumb['code'] == 10) {
            $arr['thumb'] = $thumb['msg'];
            // 提交数据
            $sql1 = "insert into goods (";
            $keys = array_keys($arr);
            for ($i=0;$i<count($keys);$i++) {
                $sql1 .= $keys[$i] . ',';
            };
            $sql1 = substr($sql1,0,-1) . ") values (";
            foreach ($arr as $val) {
                $sql1 .= "'$val',";
            }
            $sql1 = substr($sql1,0,-1) . ")";
            $mysql -> query($sql1);
            if ($mysql -> affected_rows == 1) {
                $message = "商品修改成功";
                $panel = "success";
                $url = "querygoods.php";
            }
            else {
                $message = "商品修改失败";
                $panel = "danger";
                $url = "updategoods.php";
            }
        }
        else if ($thumb['code'] != 10) {
            $message = $thumb['msg'];
            $panel = "danger";
            $url = "updategoods.php";
        }
    }
    else {
        $message = "文件格式错误";
        $panel = "danger";
        $url = "updategoods.php";
    }
    include_once "../template/admin/notice.html";
}