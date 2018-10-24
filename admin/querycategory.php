<?php
include_once "../lib/checklogin.php";
include_once '../lib/publics.php';

$num = 15;
$pagenum = isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
$sqla = "select count(*) as num from category";
$pages = $mysql -> query($sqla) -> fetch_assoc();
$len = $pages['num'];
$size = ceil($len/$num);

$page = ($pagenum-1)*$num;
$sqlb = "select * from category order by id asc limit $page,$num";
$res = $mysql -> query($sqlb) -> fetch_all(MYSQLI_ASSOC);

//$sql = "select * from category";
//$res = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
include_once "../template/admin/category.html";