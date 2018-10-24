<?php
include_once "../lib/publics.php";
$search = $_GET['search'];
//$sql = "select * from goods where des like '%$search%'";
//$searchp = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
$num = 3;
$pagenum = isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
$sql = "select count(*) as len from goods where des like '%$search%'";
$resa = $mysql -> query($sql) -> fetch_assoc();
$len = $resa['len'];
$size = ceil($len/$num);
$pages = ($pagenum-1)*$num;
$sql = "select * from goods where des like '%$search%' order by id asc limit $pages,$num";
$searchp = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
include_once "../template/index/search.html";