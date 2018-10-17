<?php
// 创建一个类
class Menu {
    // 定义一个属性（变量）
    public $str;
    // 构造函数（通过构造函数可以实例化出一个对象）
    function __construct()
    {
        // 设置构造函数的属性（变量为空字符串）
        $this -> str = "";
    }
    // 给类定义一个方法
    // 拿到所有的栏目  连接数据库  定位那张表  定位那一栏 几级标题  id值          传入各项参数  查询第一层级
    function getCate($mysql,$tablename,$parentid,$flag,$currentid=null)
    {
        // 设置pid为空
        static $pid = null;
        // 当id值存在时
        if ($currentid) {
            // 查询数据库返回关联数组
            $arr = $mysql -> query("select * from category where id=$currentid") -> fetch_assoc();
            // 将查询到的pid值赋给$pid
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
            $str = str_repeat('*',$flag);
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
