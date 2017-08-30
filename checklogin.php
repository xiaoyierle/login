<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29/029
 * Time: 10:22
 */
$username=$_POST["username"];
$password=$_POST["password"];
$code=$_POST["code"];
session_start();
if($_SESSION["code"]!=strtoupper($code)){
    $msg="验证码错误";
    $href="login.html";
    include('message.html');
    exit();
}
include_once("db.php");
$sql="select * from user where username='$username'";
$result=$db->query($sql);
$row=$result->fetch_array(MYSQLI_ASSOC);
if($row){
    if($row["password"]==md5($password)){
        $msg="登陆成功";
        $href="index.php";
        $_SESSION["user"]=$username;
    }else{
        $msg="密码错误";
        $href="login.html";
    }
}else{
    $msg="用户名不存在";
    $href="login.html";
}
include("message.html");