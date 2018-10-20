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
    // 声明属性
    private $url;
    private $size;
    private $type;
    private $errorarr;
    // 构造函数
    function __construct()
    {
        // 初始化属性
        $this -> url = "";
        // 设置上传文件最大为50kb
        $this -> size = 50;
        // 设置上传文件格式为['image/png','image/jpg','image/jpeg','image/gif'],设为关联数组以便遍历
        $this -> type = ['image/png','image/jpg','image/jpeg','image/gif'];
        // 设置报错信息
        $this->errorarr = [
            0 => '没有错误发生，文件上传成功',
            1 => '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值',
            2 => '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值',
            3 => '文件只有部分被上传',
            4 => '没有文件被上传',
            6 => '找不到临时文件夹',
            7 => '文件写入失败',
            8 => '上传文件超过50kb',
            9 => '上传文件格式错误'
        ];
    }
    // 定义方法
    function upload($file)
    {
        $code = $file['error'];
        // 先判断文件上传是否成功，不成功就返回错误信息，以关联数组的形式
        if ($file['error'] > 0) {
            return ['code' => $code, 'msg' => $this->errorarr[$code]];
        }
        // 再判断上传文件大小是够过大
        if ($this->isSize($file['size'])) {
            return ['code' => 8,'msg' => $this->errorarr[8]];
        }
        // 再判断文件格式是否正确
        if (!$this->isType($file['type'])) {
            return ['code' => 9,'msg' => $this->errorarr[9]];
        }
        // 最后判断如果是上传文件
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
//            $ext = explode('.',$file['name'])[1];

            // 将名字打散转化为数组
            $arr = explode('.',$file['name']);
            // 获取最后一组数据，即文件扩展名
            $ext = $arr[count($arr)-1];

            // 设置文件名字
            $filename = time().'.'.$ext;
            // 设定移动路径
            $path = "../uploadimg/".$date."/".$filename;
            // 移动文件到指定目录
            move_uploaded_file($file['tmp_name'],$path);
            // 返回文件路径
            return ['code' => 10,'msg' => "../uploadimg/".$date."/".$filename];
        }
    }
    function isSize($size){
        return $size / 1024 > $this -> size ? true : false;
    }
    function isType($type){
        for($i = 0; $i < count($this->type); $i++){
            if ($this -> type[$i] == $type){
                return true;
            }
        }
        return false;
    }
}