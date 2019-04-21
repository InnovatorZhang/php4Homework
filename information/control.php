<?php
/**
 * Created by PhpStorm.
 * User: 张
 * Date: 2019/4/20
 * Time: 17:44
 */

/**
 * @param $pdo
 * @param $data
 * 获取关于考研文章列表
 * 返回客户端文章的id、标题、作者信息
 */
function getArticleList($pdo,$data){
    $offset = $data['offset'];
    $limit = $data['limit'];

    $sql = $pdo->prepare("select id,author,title,avatar from essenceanswer limit ?,?");
    $sql->execute(array($offset,$limit));
    if ($row = $sql->fetchAll(PDO::FETCH_NAMED)){
        success_encode($row);
    }else{
        other_encode('亲，没有数据了哦!');
    }
}

/**
 * @param $pdo
 * @param $data
 * 获取具体文章的内容
 */
function getArticle($pdo,$data){
    //拿到文章的id
    $articleId = $data['articleId'];

    $sql = $pdo->prepare("select id,author,title,avatar,article from essenceanswer where id = ?");
    $sql->execute(array($articleId));

    if($row = $sql->fetchAll(PDO::FETCH_NAMED)){
        success_encode($row);
    }else{
        other_encode('没有此文章哦！');
    }
}

/**
 * @param $pdo
 * @param $data
 * 获取考研高校信息
 */
function getSchoolList($pdo,$data){
    $offset = $data['offset'];
    $limit = $data['limit'];

    $sql = $pdo->prepare("select id,schoolname from information limit ?,?");
    $sql->execute(array($offset,$limit));

    if($row = $sql->fetchAll(PDO::FETCH_NAMED)){
        success_encode($row);
    }else{
        other_encode('没有信息啦！');
    }

}

/**
 * @param $pdo
 * @param $data
 * 获取具体学校信息
 */
function getSchoolInformation($pdo,$data){
    $schoolName = $data['schoolname'];

    $sql = $pdo->prepare("select id,schoolname,title,link from baolubi where schoolname = ?");
    $sql->execute(array($schoolName));

    if($row = $sql->fetchAll(PDO::FETCH_NAMED)){
        success_encode($row);
    }else{
        other_encode('没有信息啦！');
    }
}