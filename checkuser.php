<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29/029
 * Time: 10:35
 */
$username=$_GET["username"];
include_once("db.php");
$sql="select * from user where username='$username'";
$resule=$db->query($sql);
if($resule->num_rows==1){
    echo json_encode(false);
}else{
    echo json_encode(true);
}