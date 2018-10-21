<?php

echo GetPreNext(pre,news,$_REQUEST[catid],$_REQUEST[id]);
//显示上一篇下一篇
function GetPreNext($gtype,$table,$catid,$id)
{
//id比传入id小的最近一条
$preR=mysql_fetch_array(mysql_query("select * from ".$table." where catid=".$catid." and id<$id order by id desc limit 0,1"));
//id比传入id大的最近一条
$nextR=mysql_fetch_array(mysql_query("select * from ".$table." where catid=".$catid." and id>$id order by id asc limit 0,1"));
$next = (is_array($nextR) ? " where id={$nextR['id']} " : ' where 1>2 ');
$pre = (is_array($preR) ? " where id={$preR['id']} " : ' where 1>2 ');
$query = "Select * from ".$table." ";
$nextRow =mysql_query($query.$next);
$preRow = mysql_query($query.$pre);
if($PreNext=mysql_fetch_array($preRow)) {
    echo $PreNext['pre'] = "上一篇：<a href='newsshow.php?id=".$preR['id']."&&catid=".$catid."'>".$PreNext['title']."</a> ";
}
else {
    echo $PreNext['pre'] = "上一篇：没有了 "; }
if($PreNext=mysql_fetch_array($nextRow)) {
    echo $PreNext['next'] = "下一篇：<a href='newsshow.php?id=".$nextR['id']."&&catid=".$catid."'>".$PreNext['title']."</a> ";
}
else {
    echo $PreNext['next'] = "下一篇：没有了 "; }
}