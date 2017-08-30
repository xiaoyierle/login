<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        header{
            text-align: right;
        }
    </style>
</head>
<body>
    <header>
        <?php
            session_start();
            if(isset($_SESSION["user"])){
                echo "欢迎".$_SESSION["user"]."登录<a href='exit.php'>退出</a>";
            }else{
                echo "未登录<a href='login.html'>登录</a>/<a href='sign.php'>注册</a>";
            }
        ?>
    </header>
    <h1>网站首页</h1>
</body>
</html>