<?php
namespace Home\Controller;
use Think\Controller;

class AboutController extends Controller {
  public function About() {
    $cat = D('Cat');
    $catmodel = $cat->field('cat_id,catname,art_num')->select();
    $this->assign('catmodel',$catmodel);
    $this->display();
  }
}
 ?>
