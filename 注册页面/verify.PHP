<?php
header('content-type:text/html;charset=utf-8');
//接收用户名
$username=$_POST['username'];
//echo $username.'<br/>';
$password=$_POST['pwd'];
$password1=$_POST['pwd1'];
$email = $_POST['email'];
//判断用户是否选择了兴趣爱好
$fav=$_POST['fav'];
if(!empty($fav)){
    //将数组转换成字符串，以，分隔
    $favStr=join(',',$fav); //implode()
}
//先转换成小写，再把两端的空白去掉
$verify=trim(strtolower($_POST['verify']));//统一转换成小写，进行字符串比较
$verify1=trim(strtolower($_POST['verify1']));//统一转换成小写，进行字符串比较
$redircecUrl='<a href="register.php">重新注册</a>';

//检测用户名的合法性
//检测用户名首字母是否为大写
$char=substr($username,0,1);

//检测用户名第一个字母是否字母
$ascii=ord($char);//得到指定字符的ascii

//检测ascii是否在65~90(A~Z)或者97~122(a~z)
if(!(($ascii>=65&&$ascii<=90)||($ascii>=97&&$ascii<=122))){
    exit('用户名首字母不是以字母开始<br/>'.$redircecUrl);
}
//检测用户名的长度是否符合要求6~10
$userLen=strlen($username);
if($userLen<6||$userLen>10){
    exit('用户名长度不符合规范<br/>'.$redircecUrl);
}
//检测密码不能为空
$pwdLen=strlen($password);
if($pwdLen==0){
    exit('密码不能为空<br/>'.$redircecUrl);
}
//检测密码长度是否符合规范
if($pwdLen<6||$pwdLen>10){
    exit('密码长度不符合规范<br/>'.$redircecUrl);
}

if(strcmp($password,$password1)!==0){
    exit('两次密码不一致<br/>'.$redircecUrl);
}
// if(strcasecmp($password,$password1)!==0){
//     exit('两次密码不一致<br/>'.$redircecUrl);
// }

//检测邮箱的合法性，字符串中包含@
/**
 * 字符串查找
 * strpos($string,$search):返回字符串首次出现的位置,区分大小写
 * stripos($string,$search)忽略大小写的去查找
 * strrpos($string,$search)最后一次出现的位置
 * strripos();忽略大小写的查找最后一次的位置
 */
if(strpos($email,'@')==false){ //条件0==false，查找位置从0开始,如果出现在第一位则为0，则为假
    exit('非法邮箱<br/>'.$redircecUrl);
}

if($verify!==$verify1){
    exit ('验证码错误<br/>'.$redircecUrl);
}

$password=md5($password);//进行md5进行加密
echo '恭喜你注册成功,用户信息如下：<br/>';

$useInfo=<<<EOF
<table border='1' cellspacing='0' cellpadding='0' width="80%" >
	<tr>
		<td>用户名</td>
		<td>密码</td>
		<td>邮箱</td>
		<td>兴趣爱好</td>
	</tr>
    <tr>
       <td>{$username}</td>
       <td>{$password}</td>
       <td>{$email}</td>
       <td>{$favStr}</td>
    </tr>
</table>
EOF;

echo $useInfo;
