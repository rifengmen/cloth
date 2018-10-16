<?php
// name size type tmp_name error

// 1.是否为上传文件
//  is_uploaded_file()
// 2.创建目录 uploadimg/日期/文件
//  file_exists()文件夹是否存在
//  mkdir()创建文件夹
//  date()获取当前日期
//  explode()将字符串以指定方法打散
//  time()事件戳
//  是否存在 uploadimg文件夹
//  是否存在 当前日期文件夹
//  设置文件名字  时间戳.后缀名  以防止重名
// 3.移动文件 tmp_name  到指定目录
//  move_uploaded_file()
//  返回文件当前路径

//创建一个类
class Upload {
    // 声明一个属性
    private $url;
    // 构造函数
    function __construct()
    {
        // 定义属性
        $this -> url = "";
    }
    // 定义方法
    function upload($file)
    {
        // 如果是上传文件
        if (is_uploaded_file($file['tmp_name'])) {
            // 如果不存在uploadimg文件夹
            if (!file_exists('../uploadimg')) {
                // 创建uploadimg文件夹
                mkdir('../uploadimg');
            }
            // 获取当前日期
            $date = date('Y-m-d');
            // 如果不存在当前日期这个文件夹
            if (!file_exists('../uploadimg/'.$date)) {
                // 创建当前日期文件夹
                mkdir('../uploadimg/'.$date);
            }
            // 获取扩展名
            $ext = explode('.',$file['name'])[1];
            // 设置文件名字
            $filename = time().'.'.$ext;
            // 设定移动路径
            $path = "../uploadimg/".$date."/".$filename;
            // 移动文件到指定目录
            move_uploaded_file($file['tmp_name'],$path);
            // 返回文件路径
            return "/cloth/uploadimg/".$date."/".$filename;
        }
    }
}