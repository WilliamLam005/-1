<?php
$string='012456789zxcbnmasdhjkqewuijonfsmdasdASDFDSFSDYUJKHG';
//echo $string{mt_rand(0,strlen($string)-1)};
$code='';
for($i=1;$i<=4;$i++){
    $code.= '<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).')">'.$string{mt_rand(0,strlen($string)-1)}.'</span>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
</head>
<body>
<form  method='post' action='verify.PHP'>
    <table align='' border='1' cellpadding = "0" cellspacing="0" width="80%" >
        <tr>
            <td align="right">用户名</td>
            <td><input type= "text" name = "username" id="" placeholder='请输入合法用户名...'>
                用户名首字母不是以字母开始，并且长度为6~10</td>
        </tr>
        <tr>
            <td align='right'>密码</td>
            <td><input type = 'password' name='pwd' placeholder='请输入密码...'>密码长度为6~10</td>
        </tr>
        <tr>
            <td align='right'>确定密码</td>
            <td><input type ="password" name="pwd1" id="" placeholder='请输入确认密码...'>密码不能为空，长度为6~10，两次密码为一致</td>
        </tr>
        <tr>
            <td align='right'>邮箱</td>
            <td><input type ="text" name="email" id="" placeholder='请输入邮箱...'>必须以@形式</td>
        </tr>
        <tr>
            <td align='right'>兴趣爱好</td>
            <td>
                <input type ="checkbox" name="fav[]" id="" value='PHP' >PHP
                <input type ="checkbox" name="fav[]" id="" value='C#' >C#
                <input type ="checkbox" name="fav[]" id="" value='JAVA' >JAVA
                <input type ="checkbox" name="fav[]" id="" value='C' >C
                <input type ="checkbox" name="fav[]" id="" value='C++' >C++
                <input type ="checkbox" name="fav[]" id="" value='go' >go
            </td>
        </tr>
        <tr>
            <td align='right'>验证码</td>
            <td><input type ="text" name="verify" id="" placeholder='请输入验证码...'><?php echo $code;?>
                <input type="hidden" name="verify1" value= '<?php echo strip_tags($code);?>'>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="立即注册" ></td>
        </tr>
    </table>
</form>
</body>
</html>