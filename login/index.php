<?php
/**
 * Created by PhpStorm.
 * User: 张
 * Date: 2019/4/20
 * Time: 17:47
 */
include(dirname(__FILE__)."/../utils/mysqlConnect.php");
include(dirname(__FILE__)."/../utils/token.php");

/**
 * {
 * "type":0,
 * "content":{
 * "username":"张中豪",
 * "password":"zhagzhonghao"
 * }
 * }
 */

$postData = file_get_contents('php://input');

//将json数据解析成数组
$arrayData = json_decode($postData,true);
//拿到用户名和密码
if($arrayData['type'] == 0){
    $username = $arrayData['content']['username'];
    $password = $arrayData['content']['password'];
}else{
    other_encode('type属性错误');
}

//当用户登陆时更新token，以后每次请求必须带有token访问
create_unique($pdo,$username);

$sql = $pdo->prepare("SELECT id,username,password,nickname,avatar,phonenumber,sex,birthday,school,token FROM user WHERE username = ? AND password = ?");
$sql->execute(array($username, $password));
if ($row = $sql->fetch(PDO::FETCH_NAMED)) {
    success_encode($row);
} else {
    other_encode("账号密码错误");
}
