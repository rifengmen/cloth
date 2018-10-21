<?php
include_once "../lib/publics.php";
$id = $_GET['id'];
$sql = "select * from category where id=$id";
$cate = $mysql -> query($sql) -> fetch_assoc();
if ($cate['module'] == 'list') {
    $num = 3;
    $pagenum = isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
    $sqla = "select count(*) as num from goods where cid=$id";
    $resa = $mysql -> query($sqla) -> fetch_assoc();
    $len = $resa['num'];
    $size = ceil($len/$num);
    $pages = ($pagenum-1)*$num;
    $sqlb = "select * from goods where cid=$id order by id asc limit $pages,$num";
    $resb = $mysql -> query($sqlb) -> fetch_all(MYSQLI_ASSOC);
    include_once "../template/index/list.html";
}
else if ($cate['module'] == 'comment') {
    if ($_SERVER['REQUEST_METHOD'] =='GET') {
        $pagenum = isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
        $num = 3;
        $pages = $num * $pagenum;
        $sqll = "select * from comment order by id asc limit 0,$pages";
        $result = $mysql -> query($sqll) -> fetch_all(MYSQLI_ASSOC);
        include_once "../template/index/comment.html";
    }
    else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $names = $_POST['names'];
        $text = $_POST['text'];
        $sql = "insert into comment (names,text) values ('$names','$text')";
        $mysql->query($sql);
        if ($mysql->affected_rows == 1) {
            $message = "留言添加成功！";
            $panel = "success";
            $url = "list.php?id=37";
        } else {
            $message = "留言添加失败";
            $panel = "danger";
            $url = "list.php?id=37";
        };
        include_once "../template/admin/notice.html";
    };
}
else if ($cate['module'] == 'aboutus') {
    include_once "../template/index/aboutus.html";
}