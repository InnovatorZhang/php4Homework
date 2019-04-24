<?php
/**
 * Created by PhpStorm.
 * User: 张
 * Date: 2019/4/24
 * Time: 18:24
 */

if($_FILES['file']['error'] > 0){
    other_encode(400,"文件错误！！！");
}else{
    echo $_FILES['file']['tmp_name'];
    echo var_dump($_FILES);
}
