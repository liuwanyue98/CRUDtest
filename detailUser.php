<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>查看用户明细</title>
</head>
<body>
<?php
require_once 'inc/dbConn.php';
$userId = $_GET['id'];
//这是啥东东。。
date_default_timezone_set("PRC");
//读数据。。。
$sql = "SELECT * FROM users WHERE id=" . $userId;
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_array($result);
?>
<table width="444" border="1" align="center">
    <tr>
        <td>用户ID</td>
        <td> <?php echo $userId ?> </td>
    </tr>
    <tr>
        <td>用户名</td>
        <td> <?php echo $user['username'] ?> </td>
    </tr>
    <tr>
        <td>密码</td>
        <td> <?php echo $user['password'] ?> </td>
    </tr>
    <tr>
        <td>性别</td>
        <!-- 最后的保密纯属多余，哈哈，写着玩的，不过呢，万一你的性别字段真的没有填写，就会显示保密两个字了 -->
        <td> <?php if ($user['sex'] == '1') echo "男"; else if ($user['sex'] == '2') echo "女"; else "保密"; ?>
        </td>
    </tr>
    <tr>
        <td>年龄</td>
        <td> <?php echo $user['age'] ?> </td>
    </tr>
    <tr>
        <td>出生年月</td>
        <td>
            <!-- 1。取得年月日。2。相应的年月日。。。你懂的 -->
            <?php
            $birday_y = date("Y", strtotime($user['birthday']));
            echo $birday_y . "年";
            $birday_y = date("m", strtotime($user['birthday']));
            echo $birday_y . "月";
            $birday_y = date("d", strtotime($user['birthday']));
            echo $birday_y . "日";
            ?>
        </td>
    </tr>
    <tr>
        <td>爱好</td>
        <td> <?php echo $user['hobby'] ?> </td>
    </tr>
    <tr>
        <td>个人简介</td>
        <!--亦可框起 <td> <textarea name="profile" rows="10" cols="30" readonly><?php echo $user['profile'] ?> </textarea> </td> -->
        <td> <?php echo $user['profile'] ?> </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><a href="userListt.php">返回用户列表</a></td>
    </tr>
</table>
<p></p>
<p></p>
<p></p>
</body>
</html>