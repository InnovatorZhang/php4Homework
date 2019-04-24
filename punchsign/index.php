<?php
/**
 * 签到的API
 * Created by PhpStorm.
 * User: 张
 * Date: 2019/4/24
 * Time: 9:01
 *
 * {
 *"type":0,
 *"content":{
 *"token":"50427f108b8495a70d7a4d7fbc58c797bd523dfb"
 *}
 *}
 */
include(dirname(__FILE__)."/../utils/mysqlConnect.php");
include(dirname(__FILE__)."/../utils/token.php");

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
//保存签到次数
$punchsign = 0;

if($type == 0){
    $sql = $pdo->prepare("select punchsign from user where username = ?");
    $sql->execute(array($username));
    if($row = $sql->fetchAll(PDO::FETCH_NAMED)){
        //拿到签到次数
        $punchsign = (int)$row[0]['punchsign'] + 1;
        //更改数据库中签到次数
        $sql = $pdo->prepare("update user set punchsign = ? where username = ?");
        if($sql->execute(array($punchsign,$username))){
            success_encode($punchsign);
        }else{
            other_encode('签到失败啦!!!');
        }
    }else{
        other_encode('签到失败啦!!!');
    }
}else{
    //获取签到次数
    $sql = $pdo->prepare("select punchsign from user where username = ?");
    $sql->execute(array($username));
    if($row = $sql->fetchAll(PDO::FETCH_NAMED)){
        success_encode($row[0]['punchsign']);
    }else{
        other_encode('获取信息失败！');
    }
}

