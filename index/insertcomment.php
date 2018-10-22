<?php
include_once "../lib/publics.php";
$names = $_GET['names'];
$phone = $_GET['phone'];
$text = $_GET['text'];
$sql = "insert into comment (names,phone,text) values ('$names','$phone','$text')";
$mysql->query($sql);
if ($mysql->affected_rows == 1) {
    echo "success";
} else {
    echo "fail";
};