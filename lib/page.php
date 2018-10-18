<?php

// 页数
//
// 数据
//
//
//
//
//
// 数据总数  total size


class Page{
    public $pages;
    public $mysql;
    public $size;
    function __construct($mysql,$size)
    {
        $this -> pages = 0;
        $this -> mysql = $mysql;
        $this -> size = $size;
    }
    function allPage()
    {
        $sql = "select count(*) as num from goods";
        $res = $this -> mysql -> query($sql) -> fetch_assoc();
        $len = $res['num'];
        $this ->pages = ceil($len/$this -> size);
        return $this -> pages;
    }
    function getdata($pagenum)
    {
        $offset = ($pagenum-1)*$this -> size;
        $len = $this -> size;
        $sql = "select goods.*,category.title as cname from goods,category where goods.cid=category.id order by id asc limit $offset,$len";
        $res = $this -> mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
        return $res;
    }
}