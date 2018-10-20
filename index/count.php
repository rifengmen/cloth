<?php
include_once "../lib/publics.php";
$id = $_GET['id'];
$count = $_GET['count'];
$sql = "update goods set count=$count where id=$id";
$mysql -> query($sql);