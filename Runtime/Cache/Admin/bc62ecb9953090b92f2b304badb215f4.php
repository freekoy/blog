<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>博客后台管理</title>
  <script src="/Public/Home/js/jquery.js"></script>
  <script src="/Public/Home/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="page-header">
      <h1>博客后台管理界面</h1>
    </div>

    <div class="col-md-3">
      <div class="panel panel-info">
        <div class="panel-heading">欢迎光临</div>
        <div class="panel-body">
          <ul>
            <li><a href="<?php echo U('admin/login/logout');?>">退出登陆</a></li>
          </ul>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">栏目管理</div>
        <div class="panel-body">
          <ul>
            <li><a href="<?php echo U('admin/cat/catlist');?>">栏目列表</a></li>
            <li><a href="<?php echo U('admin/cat/catadd');?>">栏目添加</a></li>
          </ul>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">文章管理</div>
        <div class="panel-body">
          <ul>
            <li><a href="<?php echo U('admin/art/artlist');?>">文章列表</a></li>
            <li><a href="<?php echo U('admin/art/artadd');?>">文章添加</a></li>
          </ul>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">留言管理</div>
        <div class="panel-body">
          <ul>
            <li><a href="<?php echo U('admin/comment/commentlist');?>">留言列表</a></li>
          </ul>
        </div>
      </div>
    </div>

      <div class="col-md-9">
        <table class="table">
          <tr class="info">
            <th>序号</th>
            <th>文章标题</th>
            <th>发表时间</th>
            <th>分类</th>
            <th>评论数</th>
            <th>操作</th>
          </tr>
          <?php if(is_array($artmodel)): foreach($artmodel as $key=>$art): ?><tr>
            <td><?php echo ($art["art_id"]); ?></td>
            <td><?php echo ($art["title"]); ?></td>
            <td><?php echo (date("Y-m-d",$art["pubtime"])); ?></td>
            <td><?php echo ($art["catname"]); ?></td>
            <td><?php echo ($art["comment_num"]); ?></td>
            <td>
              <a href="<?php echo U('admin/art/artedit',array('art_id'=>$art['art_id']));?>">编辑</a>||
              <a href="<?php echo U('admin/art/artdel',array('art_id'=>$art['art_id']));?>">删除</a>
            </td>
          </tr><?php endforeach; endif; ?>
        </table>
        <div class="text-center">
          <?php echo ($page); ?>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-default navbar-fixed-bottom">
      <div style="text-align:center">
       版权所有&copy;2017
      </div>
    </nav>
</body>
</html>