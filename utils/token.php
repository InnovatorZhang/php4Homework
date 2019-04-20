<?php
include("jsonWrapper.php");

function checkToken(PDO $pdo, $token)
{
    $sql = $pdo->prepare("SELECT `username` FROM `user` WHERE `token` = ?");
    $sql->execute(array($token));
    if ($row = $sql->fetch(PDO::FETCH_NAMED)) {
        return $row["username"];
    } else {
        other_encode("错误的token:{$token}");
        return null;
    }
}
function create_unique(PDO $pdo, $username)
{
    $data = $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'].time().rand();
    $data = sha1($data);
    $pdo->prepare("UPDATE user SET `token` = ? WHERE `username` = ?")->execute(array($data, $username));
    return $data;
}

?>
