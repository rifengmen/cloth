<?php
include_once "../lib/publics.php";
include_once "../lib/function.php";
if ( $_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $res = $mysql -> query("select * from category where id=$id") -> fetch_assoc();
    $obj = new Menu();
    // 传入参数
    $str = $obj -> getCate($mysql,'category','0','0',$id);
    // 调用文档
    include_once "../template/admin/updatecategory.html";
}
else if( $_SERVER["REQUEST_METHOD"] == "POST" ) {

}