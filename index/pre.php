<?php
include_once "../lib/publics.php";
$id = $_GET['id'];
$sql = "select * from goods where id<$id order by id asc limit 1 ";
$text = $mysql ->query($sql) -> fetch_assoc();
include_once "../template/index/info.html";