<?php
// 创建一个类
class Menu {
    // 定义一个属性
    public $str;
    // 构造函数
    function __construct()
    {
        // 定义为空的字符串
        $this -> str = "";
    }
    // 拿到所有的栏目
    // 定义一个方法      传入各项参数  查询第一层级
    function getCate($mysql,$tablename,$parentid,$flag,$currentid=null)
    {
        $pid = null;
        if ($currentid) {
            $arr = $mysql -> query("select * from category where id=$currentid") -> fetch_assoc();
            $pid = $arr['pid'];
        }
        // sql查询语句
        $sql = "select * from $tablename where pid=$parentid";
        // 返回值
        $res = $mysql -> query($sql);
        // 设置flag标明标题层级
        $flag++;
        // 循环  $row遍历出的每一条都是一栏   fetch——assoc（）转化为关联数组，处理结果集，每次只转化一个
        while ($row = $res -> fetch_assoc()) {
            // 每调用一次增加一个层级
            $str = str_repeat('-',$flag);
            if ($row['id'] == $pid) {
                // 定义字符串值
                $this -> str .= "<option selected value={$row['id']}> {$str} {$row['title']} </option>";
            }
            else {
                $this -> str .= "<option value={$row['id']}> {$str} {$row['title']} </option>";
            }
            // 再次执行自定义方法查询第二层级
            $this -> getCate($mysql,$tablename,$row['id'],$flag);
        }
        // 返回字符串
        return $this -> str;
    }
}
