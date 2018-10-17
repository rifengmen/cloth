<?php
include_once '../lib/publics.php';
$sql = "select goods.*,category.title as cname from goods,category where goods.cid=category.id";
$res = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
include_once "../template/admin/querygoods.html";