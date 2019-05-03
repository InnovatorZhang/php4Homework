<?php
/**
 * Created by PhpStorm.
 * User: 张
 * Date: 2019/4/21
 * Time: 10:50
 */
include(dirname(__FILE__)."/../utils/mysqlConnect.php");
include(dirname(__FILE__)."/../utils/token.php");
include("control.php");

/**
 * 获取文章列表
 *{
 *	"type":1,
 *	"content":{
 *		"token":"7ab39f94c73e806113d317367a804f5df30fdd61",
 *		"offset":0,
 *		"limit":10
 * 	}
 * }
 *获取具体文章信息
 * {
 * 	"type":2,
 *	"content":{
 *		"token":"7ab39f94c73e806113d317367a804f5df30fdd61",
 * 		"articleId":1
 * 	}
 * }
 * 获取考研学校列表
 *{
 *	"type":3,
 *	"content":{
 *		"token":"7ab39f94c73e806113d317367a804f5df30fdd61",
 *		"offset":0,
 *		"limit":10
 * 	}
 * }
 * 获取学校的报录比信息
 * {
 * 	"type":4,
 *	"content":{
 *		"token":"7ab39f94c73e806113d317367a804f5df30fdd61",
 * 		"schoolname":"北京大学"
 * 	}
 * }
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

switch ($type){
    case 1:
        getArticleList($pdo,$data);
        break;
    case 2:
        getArticle($pdo,$data);
        break;
    case 3:
        getSchoolList($pdo,$data);
        break;
    case 4:
        getSchoolInformation($pdo,$data);
        break;
    case 5:
        getMusicList($pdo);
        break;
    default:
        other_encode('type参数错误!');
}
