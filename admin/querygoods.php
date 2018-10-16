<?php
include_once '../lib/publics.php';
$sql = "select * from goods";
$res = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
include_once "../template/admin/querygoods.html";