<?php
include(dirname(__FILE__)."/../utils/mysqlConnect.php");
include(dirname(__FILE__)."/../utils/token.php");
/**
 * Created by PhpStorm.
 * User: 张
 * Date: 2019/5/3
 * Time: 20:39
 */
$postData = file_get_contents('php://input');

//将json数据解析成数组
$arrayData = json_decode($postData,true);
//拿到type属性的值
$type = $arrayData['type'];
//拿到请求的content数据
$data = $arrayData['content'];
//拿到用户的token
$token = $data['token'];

//检查token
$username = checkToken($pdo,$token);

//返回可以下载的资料列表
$sql = $pdo->prepare("select * from download");
$sql->execute();
if($row = $sql->fetchAll(PDO::FETCH_NAMED)){
    success_encode($row);
}else{
    other_encode('没有信息啦！');
}