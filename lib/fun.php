<?php
// 创建一个类
class Menu{
    // 定义一个公共属性
    public $str;
    // 创建构造函数
    function __construct()
    {
        // 设置公共属性
        $this -> str = "";
    }
    // 定义类上面的方法
    function getCate($mysql,$tablename,$parentid,$flag,$currentid = null)
    {


        $sql = "select * from $tablename where pid=$parentid";
        $res = $mysql -> query($sql);
        $flag++;
        while($row = $res -> fetch_assoc()){
            $this -> str .= "<option value={$row['id']}> {$row['title']} </option>";
            $this -> getCate($mysql,$tablename,$row['id'],$flag);
        }
        return $this -> str;
    }
}