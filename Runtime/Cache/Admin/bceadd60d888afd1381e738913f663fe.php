<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>博客后台管理</title>
  <script src="/17blog/Public/Home/js/jquery.js"></script>
  <script src="/17blog/Public/Home/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/17blog/Public/Home/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="page-header">
      <h1>博客后台管理界面</h1>
    </div>

    <div class="row">
      <div class="col-md-3">
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
              <li><a href="<?php echo U('admin/art/artadd');?>">文章管理</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="catname" value="<?php echo ($catmodel[catname]); ?>">
          </div>
          <button type="submit" class="btn btn-info">提交</button>
        </form>
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