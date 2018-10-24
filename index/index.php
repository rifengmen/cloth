<?php
include_once "../lib/publics.php";
$sql = "select * from goods where recommend=1";
$recommend = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
$sql = "select * from goods where cid=1 and recommend=2";
$recommend2 = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
$sql = "select * from goods where cid=2";
$recommend3 = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
include_once "../template/index/index.html";
