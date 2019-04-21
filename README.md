# php4Homework
软件工程作业后台代码

## 请求格式
>>> json格式，请求方法为post，请求头中Content-Type:application/json


### 1.注册接口
>http://127.0.0.1/php4Homework/register/index.php
>>请求格式
```json
{
	"type":0,
	"content":{
		"username":"打篮球像蔡徐坤",
		"password":"ikunikun"
	}
}
```
>>返回格式
```json
{
    "ErrorCode": 0,
    "ErrorMessage": "NONE",
    "content": {
        "info": "success",
        "data": "注册成功啦!!"
    }
}
```

### 2.登陆接口

>http://127.0.0.1/php4Homework/login/index.php
>>请求格式
```json
{
	"type":0,
	"content":{
		"username":"打篮球像蔡徐坤",
		"password":"ikunikun"
	}
}
```
>>返回格式
```json
{
    "ErrorCode": 0,
    "ErrorMessage": "NONE",
    "content": {
        "info": "success",
        "data": {
            "id": 7,
            "username": "打篮球像蔡徐坤",
            "password": "ikunikun",
            "nickname": null,
            "avatar": "http://127.0.0.1/php4Homework/avatar/default.png",
            "phonenumber": "10010",
            "sex": 1,
            "birthday": null,
            "school": null,
            "token": "fe4a0068d4ae1c53474565d4277b55b856cc3689"
        }
    }
}
```

### 3.获取考研文章列表接口
>http://127.0.0.1/php4Homework/information/getInformation.php
>>请求格式
```json
{
	"type":1,
	"content":{
		"token":"fe4a0068d4ae1c53474565d4277b55b856cc3689",
		"offset":0,
		"limit":3
	}
}
```
>>返回格式
```json
{
    "ErrorCode": 0,
    "ErrorMessage": "NONE",
    "content": {
        "info": "success",
        "data": [
            {
                "id": 1,
                "author": "核聚",
                "title": "为了考研，我们能努力到什么程度？",
                "avatar": "https://pic4.zhimg.com/50/v2-d5c00b715ee6798031b6ab88843e4a2c_is.jpg"
            },
            {
                "id": 2,
                "author": "半夏学长",
                "title": "你考研的时候是怎么查找资料的？",
                "avatar": "https://pic3.zhimg.com/50/v2-445ff68d2f548b569ad6ddc546367260_is.jpg"
            },
            {
                "id": 3,
                "author": "上小弦",
                "title": "考研数学怎么学",
                "avatar": "https://pic4.zhimg.com/50/95b024f9c4f5bc915d3952a02f2256d5_is.jpg"
            }
        ]
    }
}
```

### 4.获取文章具体内容接口
>http://127.0.0.1/php4Homework/information/getInformation.php
>>请求格式
```json
{
	"type":2,
	"content":{
		"token":"fe4a0068d4ae1c53474565d4277b55b856cc3689",
		"articleId":1
	}
}
```
>>返回格式
```json
{
    "ErrorCode": 0,
    "ErrorMessage": "NONE",
    "content": {
        "info": "success",
        "data": [
            {
                "id": 1,
                "author": "核聚",
                "title": "为了考研，我们能努力到什么程度？",
                "avatar": "https://pic4.zhimg.com/50/v2-d5c00b715ee6798031b6ab88843e4a2c_is.jpg",
                "article": "我有一位师弟，考研数学149，差一分满分，还是在考数学前一天感冒的情况下。我问他怎么做到的。他说，他平时没事儿就默写概念，默写定义。另外，他用的考研参考书不是当年的，是二手的。他说，只要他做过的题，都确保不会再出错。\n\n\n还有一位师弟。全国力学竞赛一等奖保送到北大读博士。大学的时候上一门外系的课，每次上课必提问，把老师的问烦了。他那段时间打篮球把腿弄伤了，每次都拄着拐杖去上课，格外引人注目。高一的时候化学课睡觉，被老师抓到，地理课上睡觉被老师抓到。然后，考试的时候他的化学满分，地理也是满分。我问他怎么做到的？他说因为不知道什么地方是重点，所以哪里都是重点。\n\n\n我的另外一位师弟，也是北大博士。他高中生物满分。我问他怎么得满分的。他说，每次看到题目，他脑子里一定要想出那个东西的清晰图像（比如细胞结构、DNA双螺旋），就像想到家里的客厅什么地方有沙发、什么地方有张桌子、沙发的形状、桌子的颜色都、哪里放着几把椅子都“一目了然”那样。否则题目做对了也算失败。\n\n\n我的另外一位师弟比较奇怪。他做数学不怎么用草稿纸，而是直接往卷子上写。他得过全国大学生高等数学竞赛特等奖。我一直奇怪他为什么不用演算纸。有一天，我们几个兄弟聊一道微积分题目，别人都在算，他不动手，而是想了一会儿，报出个答案。答案是对的。他是在大脑里一步一步做演算的。\n\n\n我的一位学弟 @童哲 ，高中的时候做了46本习题册，只还是物理这一科。后来保送到北大物理学院。他不是偏科，而是高考成绩过线。\n\n\n我的一位学妹。北大文科的。起初她的成绩很差。有一天她留着眼泪下了决心。然后，背历史课本，背到哭。后来，她反反复复背了6遍，把高中的5本历史课本全部背了下来（贺舒婷：你凭什么上北大）。\n\n\n我的一位学生。今年刚刚考入清华的材料系。我注意到她笔记里的一个细节。有一道答题，她做了10遍，还是会出错。"
            }
        ]
    }
}
```

### 5.获取考研院校列表的接口
>http://127.0.0.1/php4Homework/information/getInformation.php
>>请求格式
```json
{
	"type":3,
	"content":{
		"token":"fe4a0068d4ae1c53474565d4277b55b856cc3689",
		"offset":0,
		"limit":5
	}
}
```
>>返回格式
```json
{
    "ErrorCode": 0,
    "ErrorMessage": "NONE",
    "content": {
        "info": "success",
        "data": [
            {
                "id": 1,
                "schoolname": "北京大学"
            },
            {
                "id": 2,
                "schoolname": "清华大学"
            },
            {
                "id": 3,
                "schoolname": "中国人民大学"
            },
            {
                "id": 4,
                "schoolname": "中国农业大学"
            },
            {
                "id": 5,
                "schoolname": "北京师范大学"
            }
        ]
    }
}
```

### 6.获取院校报录比信息的接口
>http://127.0.0.1/php4Homework/information/getInformation.php
>>请求格式
```json
{
	"type":4,
	"content":{
		"token":"fe4a0068d4ae1c53474565d4277b55b856cc3689",
		"schoolname":"重庆邮电大学"
	}
}
```
>>返回格式
```json
{
    "ErrorCode": 0,
    "ErrorMessage": "NONE",
    "content": {
        "info": "success",
        "data": [
            {
                "id": 34278,
                "schoolname": "重庆邮电大学",
                "title": "2019年重庆邮电大学考研复试招生计划（第二批）",
                "link": "http://yz.kaoyan.com/cqupt/baolubi/5c9c7f26a0be9.html"
            },
            {
                "id": 34279,
                "schoolname": "重庆邮电大学",
                "title": "2019重庆邮电大学各硕士生专业已接收推免生数量",
                "link": "http://yz.kaoyan.com/cqupt/baolubi/5c9a267bb6e72.html"
            }
        ]
    }
}
```
