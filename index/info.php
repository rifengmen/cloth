<?php
include_once "../lib/publics.php";
$id = $_GET['id'];
$cid = $_GET['cid'];
$sqlp = "select * from goods where cid=$cid and id<$id order by id desc limit 1 ";
$sql = "select * from goods where id=$id";
$sqln = "select * from goods where cid=$cid and id>$id order by id asc limit 1 ";
$textp = $mysql -> query($sqlp) -> fetch_assoc();
$text = $mysql ->query($sql) -> fetch_assoc();
$textn = $mysql -> query($sqln) -> fetch_assoc();
$sql = "select * from goods where cid=$cid and recommend=2";
$recommend = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
include_once "../template/index/info.html";