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
        <li><a href="<?php echo U('Home/index/index');?>">首页</a></li>
        <li><a href="<?php echo U('Home/comment/comment');?>">留言</a></li>
        <li><a href="<?php echo U('Home/about/about');?>">关于</a></li>
      </ul>
    </nav>
    <div class="row">
      <div class="col-md-9">
        <?php if(is_array($artmodel)): foreach($artmodel as $key=>$art): ?><article id="article-1">
          <h2><a href="<?php echo U('home/art/art',array('art_id'=>$art['art_id']));?>"><?php echo ($art["title"]); ?></a></h2>
          <span>
            <?php echo (date("Y-m-d",$art["pubtime"])); ?> by 一键攻城狮
          </span>
          <br />
          <span>栏目:<a href=""><?php echo ($art["catname"]); ?></a></span>
          <br />
          <br />
          <p><?php echo ($art["content"]); ?></p>
        </article><?php endforeach; endif; ?>

        <div class="text-center">
          <?php echo ($page); ?>
        </div>
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