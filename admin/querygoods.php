<?php
include_once '../lib/publics.php';
include_once '../lib/page.php';
// 每页中需要显示几天内容
$num = 8;
// 点击的页码
$pagenum = isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
// 实例化出来一个对象
$pages = new Page($mysql,$num);
// 用对象身上的函数获取总共有多少页
$size = $pages -> allPage();
// 用对象身上的方法获取每页显示的内容
$res = $pages -> getdata($pagenum);



//$sql = "select goods.*,category.title as cname from goods,category where goods.cid=category.id";
//$res = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);


include_once "../template/admin/querygoods.html";