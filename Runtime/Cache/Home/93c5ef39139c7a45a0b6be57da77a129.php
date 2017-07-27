<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="/Public/Home/js/jquery.js"></script>
  <script src="/Public/Home/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css">
  <link rel="stylesheet" href="/Public/Home/css/1.css">
</head>
<body>
  <div class="container">
    <div class="page-header">
      <h1>一键攻城狮</h1>
      <h4>兴趣使然的攻城狮,不止于代码</h4>
    </div>
    <nav class="navbar bg-info">
      <ul class="nav navbar-nav">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo U('Home/index/index');?>">首页</a></li>
          <li><a href="<?php echo U('Home/comment/comment');?>">留言</a></li>
          <li><a href="<?php echo U('Home/about/about');?>">关于</a></li>
        </ul>
      </ul>
    </nav>
    <div class="row">
      <div class="col-md-9">
        <article id="article-1">
          <h4>关于版权</h4>
          <span>
            发表时间于 一万年前
          </span>

          <p><br/>除特别说明外，本博客内容皆为原创，可以自由转载传播，但必须标明出处及原文链接.</p>
          </article>
      </div>
      <div class="col-md-3">
        <div class="panel panel-info">
          <div class="panel-heading text-center">栏目列表</div>
          <div class="panel-body">
            <ul class="text-left">
              <?php if(is_array($catmodel)): foreach($catmodel as $key=>$cat): ?><li><a href="<?php echo U('Home/index/category',array('cat_id'=>$cat['cat_id']));?>"><?php echo ($cat["catname"]); ?>(<?php echo ($cat["art_num"]); ?>)</a></li><?php endforeach; endif; ?>
            </ul>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading text-center">友情链接</div>
          <div class="panel-body">
            <ul>
              <li><a href="https://github.com/">github,程序员必备</a></li>
              <li><a href="https://git.oschina.net/">码云,程序员必备</a></li>
              <li><a href="http://www.yanshiba.com/about">十八哥的博客</a></li>
              <li><a href="https://www.zhihu.com/">知乎,看看世界有多大</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="well text-center">底部信息 &copy;2017</div>
    </div>
  </div>
</body>
</html>