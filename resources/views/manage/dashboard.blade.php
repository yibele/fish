<!DOCTYPE html>
<html lang="en">

<style>
  .left {
    width : 200px;
    height : 800px;
    float : left;
    border : 1px #333 solid;
  }

  .right {
    margin-left : 200px;
    height : 800px;
    border : 1px #333 solid;
  }
</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/bulma.css')}}">
</head>
<body>
  <div class="header">
    <nav>
      <div class="navbar">
        慢递鱼--管理员界面
      </div>
    </nav>
  </div>
  <div class="container">
    <div class="left">
      <ul>
        <li>未发送信件</li>
        <li>以发送信件</li>
        <li>+信纸管理
            <ul>
              <li>|--添加信纸</li>
              <li>|--编辑信纸</li>
              <li>|--删除信纸</li>
              <li>|--查看信纸</li>
            </ul>
        </li>
        <li>+明信片管理
          <ul>
            <li>|--添加明信片</li>
            <li>|--编辑明信片</li>
            <li>|--删除明信片</li>
            <li>|--查看信用卡</li>
          </ul>
        </li>
        <li>+用户管理及联系人管理
          <ul>
            <li>查看用户</li>
            <li>删除用户</li>
            <li>编辑用户</li>
          </ul>
        </li>
        <li>+留言管理
          <ul>
            <li>删除留言</li>
            <li>查看留言</li>
          </ul>
        </li>
        <li>+晒单管理
          <ul>
            <li>查看晒单</li>
            <li>删除晒单</li>
            <li>编辑晒单</li>
          </ul>
        </li>
        <li>+客服界面管理</li>
      </ul>
    </div>
    <div class="right"></div>
  </div>
  <div class="footer"></div>
</body>
</html>
