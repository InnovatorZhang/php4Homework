<?php
/**
 * Created by PhpStorm.
 * User: 张
 * Date: 2019/5/1
 * Time: 13:54
 * 添加帖子
 *{
 *"type":1,
 *"content":{
 *"token":"34622caf486cfb8ff9b635ebc4c6ed1083c3973d",
 *"title":"考研哪一个学校好?",
 *"post":"请大家提一提意见和建议。"
 *}
 *}
 * 添加回复
 *{
 *"type":2,
 *"content":{
 *"token":"34622caf486cfb8ff9b635ebc4c6ed1083c3973d",
 *"content":"我觉得都好",
 *"postId":1
 *}
 * 获取帖子
 *{
 *"type":3,
 *"content":{
 *"token":"34622caf486cfb8ff9b635ebc4c6ed1083c3973d",
 *"offset":5,
 *"limit":0
 *}
 * 获取回复
 *{
 *"type":4,
 *"content":{
 *"token":"34622caf486cfb8ff9b635ebc4c6ed1083c3973d",
 *"postId":1
 *}
 */
include(dirname(__FILE__)."/../utils/mysqlConnect.php");
include(dirname(__FILE__)."/../utils/token.php");
include("control.php");

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

//拿到用户的id
$sql = $pdo->prepare("select id from user where username=?");
$sql->execute(array($username));
if($row = $sql->fetchAll(PDO::FETCH_NAMED)){
    $userId = $row[0]['id'];
    switch ($type){
        case 1:
            addPost($pdo,$data,$userId);
            break;
        case 2:
            addReply($pdo,$data,$userId);
            break;
        case 3:
            getPosts($pdo,$data);
            break;
        case 4:
            getReplies($pdo,$data);
            break;
        default:
            other_encode('type参数错误!');
    }
}else{
    other_encode("未知的错误");
}


