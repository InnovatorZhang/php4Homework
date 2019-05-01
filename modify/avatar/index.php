<?php
/**
 * Created by PhpStorm.
 * User: 张
 * Date: 2019/4/24
 * Time: 18:24
 */

include(dirname(__FILE__)."/../../utils/mysqlConnect.php");
include(dirname(__FILE__)."/../../utils/token.php");

$postData = file_get_contents('php://input');

//将json数据解析成数组
$arrayData = json_decode($postData,true);
//拿到type属性的值
$type = $arrayData['type'];
//拿到请求的content数据
$data = $arrayData['content'];
//拿到用户的token
$token = $data['token'];
//拿到需要修改的头像地址
$avatarUrl = $data['avatarUrl'];
//检查token
$username = checkToken($pdo,$token);

if($type == 0){
    $sql = $pdo->prepare("update user set avatar = ? where username = ?");
    if($sql->execute(array($avatarUrl,$username))){
        success_encode($avatarUrl);
    }else{
        other_encode('头像更改失败!');
    }
}
