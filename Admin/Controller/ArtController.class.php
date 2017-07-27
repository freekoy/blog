<?php
namespace Admin\Controller;
use Think\Controller;

class ArtController extends Controller {
  public function __construct() {
    parent::__construct();
    $this->art = D('Art');
    $this->cat = D('Cat');
    //登陆验证
    $this->user = D('User');
    $usermodel = $this->user->where('user_id=1')->find();
    $ccode = cookie('ccode');
    if($ccode !== md5($usermodel['user_id'].$usermodel['username'])) {
      $this->error('非法登陆,跳转中...','http://17blog.com/index.php/admin/login/login',3);
    }
  }

  public function artadd() {
    $catmodel = $this->cat->field('cat_id,catname')->select();
    $this->assign('catmodel',$catmodel);
    if(IS_POST) {
      if(!$this->art->create()) {
        exit($this->art->getError());
      }else {
        $result = $this->art->add();
        if($result) {
          //栏目文章数修改
          $cat_id = I('cat_id');
          $art_num = $this->cat->find($cat_id)['art_num']+1;
          $this->cat->where('cat_id='.$cat_id)->setField('art_num',$art_num);
          //添加成功跳转
          $this->success('添加成功,正在跳转中.....','',3);
        }else {
          $this->error('添加失败,正在跳转中.....','',3);
        }
      }
    }
    $this->display();
  }

  public function artlist() {
    $p = I('p')?I('p'):1;
    $artmodel = $this->art->field('art_id,catname,title,content,pubtime,comment_num,click')->join('cat on art.cat_id = cat.cat_id')->page($p.',8')->select();
    $this->assign('artmodel',$artmodel);
    // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
    $count = $this->art->count();// 查询满足要求的总记录数
    $Page = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
    $show = $Page->show();// 分页显示输出
    $this->assign('page',$show);// 赋值分页输出
    //var_dump($artmodel);
    $this->display();
  }

  public function artedit() {
    $art_id = I('get.art_id');
    $artmodel = $this->art->field('art_id,catname,title,content,pubtime,comment_num,click')->join('cat on art.cat_id = cat.cat_id')->find($art_id);
    $this->assign('artmodel',$artmodel);
    $catmodel = $this->cat->field('cat_id,catname,art_num')->select();
    $this->assign('catmodel',$catmodel);
    if(IS_POST) {
      $this->art->title = I('title');
      $this->art->cat_id = I('cat_id');
      $this->art->content = I('content');
      $result = $this->art->where('art_id='.$art_id)->save();
      if($result) {
        $this->success('编辑成功,正在跳转中....','',3);
      }else {
        $this->error('编辑失败,正在跳转中....','',3);
      }
    }
    $this->display();
  }

  public function artdel() {
    $art_id = I('get.art_id');
    $cat_id = $this->art->field('cat_id')->find($art_id)['cat_id'];
    $result = $this->art->delete($art_id);
    if($result) {
      //减少文章数
      $art_num = $this->cat->find($cat_id)['art_num']-1;
      $this->cat->where('cat_id='.$cat_id)->setField('art_num',$art_num);
      //成功提示
      $this->success('删除成功,正在跳转中....','',3);
    }else {
      $this->error('删除失败,正在跳转中....','',3);
    }
  }
}
 ?>
