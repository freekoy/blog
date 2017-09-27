<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function __construct() {
      parent::__construct();
      $this->art = D('Art');
    }
    public function index(){
      $p = I('p')?I('p'):1;
      $artmodel = $this->art->field('art_id,catname,title,content,pubtime,comment_num,click')->join('cat on art.cat_id = cat.cat_id')->page($p.',8')->select();
      $this->assign('artmodel',$artmodel);
      $count      = $this->art->count();// 查询满足要求的总记录数
      $Page       = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
      $show       = $Page->show();// 分页显示输出
      $this->assign('page',$show);// 赋值分页输出
      //var_dump($artmodel);
      $cat = D('Cat');
      $catmodel = $cat->field('cat_id,catname,art_num')->select();
      $this->assign('catmodel',$catmodel);
      $this->display();
    }

    public function category(){
      $p = I('p')?I('p'):1;
      $cat_id = I('get.cat_id');
      $artmodel = $this->art->field('art_id,title,content,pubtime,comment_num,click')->where('cat_id='.$cat_id)->page($p.',8')->select();
      $this->assign('artmodel',$artmodel);
      $count      = $this->art->where('cat_id='.$cat_id)->count();// 查询满足要求的总记录数
      $Page       = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
      $show       = $Page->show();// 分页显示输出
      $this->assign('page',$show);// 赋值分页输出
      //var_dump($artmodel);
      $cat = D('Cat');
      $catmodel = $cat->field('cat_id,catname,art_num')->select();
      $this->assign('catmodel',$catmodel);
      $catname = $cat->field('catname')->where('cat_id='.$cat_id)->find();
      $this->assign('catname',$catname);
      $this->display();
    }
}
