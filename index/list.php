<?php
include_once "../lib/publics.php";
$id = $_GET['id'];
$sql = "select * from category where id=$id";
$cate = $mysql -> query($sql) -> fetch_assoc();
if ($cate['module'] == 'list') {
    $num = 3;
    $pagenum = isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
    $sqla = "select count(*) as num from goods where cid=$id";
    $resa = $mysql -> query($sqla) -> fetch_assoc();
    $len = $resa['num'];
    $size = ceil($len/$num);
    $pages = ($pagenum-1)*$num;
    $sqlb = "select * from goods where cid=$id order by id asc limit $pages,$num";
    $resb = $mysql -> query($sqlb) -> fetch_all(MYSQLI_ASSOC);
}
else if ($cate['module'] == 'comment') {
}
else if ($cate['module'] == 'aboutus') {
}
include_once "../template/index/{$cate['tem']}";