<?php
include_once "../lib/publics.php";
$num = $_GET['num'];
$pagenum = $_GET['pagenum'];
$offset = ($pagenum-1)*$num;
$sql = "select * from comment order by id desc limit $offset,$num";
$res = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
echo json_encode($res);