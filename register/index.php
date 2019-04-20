<?php
/**
 * Created by PhpStorm.
 * User: 张
 * Date: 2019/4/20
 * Time: 17:48
 */
include(dirname(__FILE__)."/../utils/mysqlConnect.php");
include(dirname(__FILE__)."/../utils/jsonWrapper.php");

//解析android端传来的json数据
/**
 * {
 *"type":0,
 *"content":{
 *"username":"张中豪",
 *"password":"zhangzhonghao"
 *  }
 *  }
 */
$postData = file_get_contents('php://input');

//将json数据解析成数组
$arrayData = json_decode($postData,true);

echo $arrayData['content']['username'].$arrayData['content']['password'];
//拿到用户名和密码
if($arrayData['type'] == 0){
    $username = $arrayData['content']['username'];
    $password = $arrayData['content']['password'];
}else{
    other_encode('type属性错误');
}
echo $username+$password;
//用户名和密码不为空的话进入下一步
if($username && $password){
    $sql = $pdo->prepare("SELECT * FROM user WHERE username = ?");
    $sql->execute(array($username));

    if($sql->fetchAll(PDO::FETCH_NAMED)){
        other_encode('用户名已经被注册了哦！');
    }else{
        //增加用户
        $sql = $pdo->prepare("INSERT INTO user(username,password) VALUES(?,?)");
        $sql->execute(array($username,$password));
        //验证是否成功插入
        $sql = $pdo->prepare("SELECT * FROM user WHERE username = ?");
        $sql->execute(array($username));
        if($sql->fetchAll(PDO::FETCH_NAMED)){
            success_encode("注册成功啦!!");
        }
    }
}else{
    other_encode("用户名和密码不能为空哦！");
}

