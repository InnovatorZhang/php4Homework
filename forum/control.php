<?php
/**
 * Created by PhpStorm.
 * User: 张
 * Date: 2019/5/1
 * Time: 13:55
 */

/**
 * @param $pdo
 * @param $data
 * @param $userId
* 添加帖子
 */
function addPost($pdo,$data,$userId){
    $post = $data['post'];
    $title = $data['title'];
    $sql = $pdo->prepare("insert into posts(post,userid,title) VALUES(?,?,?)");
    if($sql->execute(array($post,$userId,$title))){
        success_encode("发布帖子成功！");
    }else{
        other_encode("发布帖子失败！");
    }
}

/**
 * @param $pdo
 * @param $data
 * @param $userId
 * 添加回复
 */
function addReply($pdo,$data,$userId){
    $content = $data['content'];
    $postid = $data['postId'];
    $sql = $pdo->prepare("insert into replies(content,postid,userid) VALUES(?,?,?)");
    if($sql->execute(array($content,$postid,$userId))){
        success_encode("回复成功！");
    }else{
        other_encode("回复失败！");
    }
}

/**
 * @param $pdo
 * @param $data
 * 获取帖子
 */
function getPosts($pdo,$data){
    $limit = $data['limit'];
    $offset = $data['offset'];
    $sql = $pdo->prepare("select posts.id,user.avatar,user.username,userid,title,post from posts right join user on user.id=posts.userid limit ?,?");
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
 * 获取回复
 */
function getReplies($pdo,$data){
    $postId = $data['postId'];
    $sql = $pdo->prepare("select replies.id,user.avatar,user.username,userid,content,postid from replies right join user on user.id=replies.userid where postid=?");
    $sql->execute(array($postId));
    if ($row = $sql->fetchAll(PDO::FETCH_NAMED)){
        success_encode($row);
    }else{
        other_encode('亲，没有数据了哦!');
    }
}