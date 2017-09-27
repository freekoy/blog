<?php
namespace Admin\Controller;
use Think\Controller;

class CatController extends Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cat = D('Cat');
    //登陆验证
    $this->user = D('User');
    $usermodel = $this->user->where('user_id=1')->find();
    $ccode = cookie('ccode');
    if($ccode !== md5($usermodel['user_id'].$usermodel['username'])) {
      $this->error('非法登陆,跳转中...','http://17blog.com/index.php/admin/login/login',3);
    }
  }

  public function catadd() {
    if(IS_POST){
      if (!$this->cat->create()){
        // 如果创建失败 表示验证没有通过 输出错误提示信息
        exit($this->cat->getError());
    }else{
         // 验证通过 可以进行其他数据操作
         $result = $this->cat->add(); // 写入数据到数据库
         if($result) {
           $this->success('添加成功,正在跳转中......','',3);
         }else {
           $this->error('添加失败,正在跳转中......','',3);
         }
    }
  }
  $this->display();
}

  public function catlist() {    
    $catmodel = $this->cat->field('cat_id,catname,art_num')->select();
    $this->assign('catmodel',$catmodel);
    //var_dump($catmodel);
    $this->display();
  }

  public function catedit() {
    $cat_id = I('get.cat_id');
    $catmodel = $this->cat->field('cat_id,catname,art_num')->find($cat_id);
    $this->assign('catmodel',$catmodel);
    if(IS_POST) {
      if (!$this->cat->create()){
        // 如果创建失败 表示验证没有通过 输出错误提示信息
        exit($this->cat->getError());
    }else{
         // 验证通过 可以进行其他数据操作
         $result = $this->cat->where('cat_id='.$cat_id)->save(); // 写入数据到数据库
         if($result) {
           $this->success('修改成功,正在跳转中......','',3);
         }else {
           $this->error('修改失败,正在跳转中......','',3);
         }
    }
    }
    //var_dump($catmodel);
    $this->display();
  }

  public function catdel() {
    $cat_id = I('get.cat_id');
    $art_num = $this->cat->field('art_num')->where('cat_id='.$cat_id)->find()['art_num'];
    if($art_num == 0) {
      $result = $this->cat->delete($cat_id);
      if($result) {
        $this->success('删除成功,正在跳转中.....','',3);
      }else {
        $this->error('删除失败,正在跳转中.....','',3);
      }
    }else {
      $this->error('栏目下有文章,删除失败,正在跳转中.....','',3);
    }
  }
}
 ?>
