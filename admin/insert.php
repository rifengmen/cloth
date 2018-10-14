<?php
include_once "../lib/publics.php";
$header1 = $_GET['header1'];
$header2 = $_GET['header2'];
$pid = $_GET['pid'];
$sql = "insert into category (title,des,pid) values ('$header1','$header2','$pid')";
$res = $mysql -> query($sql);
if ($mysql -> affected_rows == 1) {
    echo "yes";
}
else {
    echo "no";
}
