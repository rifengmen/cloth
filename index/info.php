<?php
include_once "../lib/publics.php";
$id = $_GET['id'];
$sql = "select * from goods where id=$id";
$text = $mysql -> query($sql) -> fetch_assoc();
include_once "../template/index/info.html";