<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="/17blog/Public/Home/js/jquery.js"></script>
  <script src="/17blog/Public/Home/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/17blog/Public/Home/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="page-header">
      <h1>博客后台管理界面</h1>
    </div>

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
            <li><a href="<?php echo U('admin/art/artadd');?>">文章添加</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <form method="post">
        <div class="form-group">
          <label for="title">标题</label>
          <input type="text" class="form-control" name="title" id="title" value="<?php echo ($artmodel["title"]); ?>">
        </div>
        <div class="form-group">
          <label for="cat_id">栏目</label>
          <select class="form-control" id="cat_id" name="cat_id">
            <?php if(is_array($catmodel)): foreach($catmodel as $key=>$cat): ?><option value="<?php echo ($cat["cat_id"]); ?>"><?php echo ($cat["catname"]); ?></option><?php endforeach; endif; ?>
      		</select>
        </div>
        <div class="form-group">
          <label for="content">内容</label>
          <textarea class="form-control" name="content" id="content" cols="30" rows="6" ><?php echo ($artmodel["content"]); ?></textarea>
        </div>
        <button type="submit" class="btn btn-info">提交</button>
      </form>
    </div>
  </div>
  <nav class="navbar navbar-default navbar-fixed-bottom">
    <div style="text-align:center">
     版权所有&copy;2017
    </div>
  </nav>
</body>
</html>