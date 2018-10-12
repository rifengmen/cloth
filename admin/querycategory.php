<?php
include_once '../lib/publics.php';
$sql = "select * from category";
$res = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
include_once "../template/admin/category.html";