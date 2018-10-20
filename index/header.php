<?php
include_once "../lib/publics.php";
// 输出一级标题
$sql = "select * from category where pid=0";
$res = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
//// 输出二级标题
//$sql2 = "select * from category where pid=1";
//$res2 = $mysql -> query($sql2);
//var_dump($res2);
//exit();
include_once "../template/index/header.html";