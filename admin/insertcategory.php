<?php
include_once "../lib/checklogin.php";
include_once "../lib/publics.php";
include_once "../lib/function.php";
if ( $_SERVER["REQUEST_METHOD"] == "GET") {
    // 展示添加页面
    // 实例化出自定义方法
    $obj = new Menu();
    // 传入参数
    $str = $obj -> getCate($mysql,'category','0','0');
    // 调用文档
    include_once "../template/admin/insertcategory.html";
}
else if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    // 提交数据
    $sql1 = "insert into category (";
    $keys = array_keys($_POST);
    for ($i=0;$i<count($keys);$i++) {
        $sql1 .= $keys[$i] . ',';
    };
    $sql1 = substr($sql1,0,-1) . ") values (";
    foreach ($_POST as $value) {
        $sql1 .= "'$value',";
    }
    $sql1 = substr($sql1,0,-1) . ")";
    $mysql -> query($sql1);
    if ($mysql -> affected_rows == 1) {
        $message = "添加成功";
        $panel = "success";
        $url = "querycategory.php";
    }
    else {
        $message = "添加失败";
        $panel = "danger";
        $url = "insertcategory.php";
    }
    include_once "../template/admin/notice.html";
}