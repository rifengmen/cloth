<?php
include_once "../lib/publics.php";
$id = $_GET['id'];
$sql = "select * from category where id=$id";
$cate = $mysql -> query($sql) -> fetch_assoc();
if ($cate['module'] == 'list') {
    $num = 3;
    $pagenum = isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
    $sql = "select count(*) as num from goods where cid=$id";
    $resa = $mysql -> query($sql) -> fetch_assoc();
    $len = $resa['num'];
    $size = ceil($len/$num);
    $pages = ($pagenum-1)*$num;
    $sql = "select * from goods where cid=$id order by id asc limit $pages,$num";
    $resb = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    $sql = "select * from goods where cid=$id and recommend=2";
    $recommend = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
}
else if ($cate['module'] == 'comment') {
}
else if ($cate['module'] == 'aboutus') {
    $sql = "select * from aboutus";
    $aboutus = $mysql -> query($sql) -> fetch_assoc();
}
include_once "../template/index/{$cate['tem']}";