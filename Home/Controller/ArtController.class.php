<?php
namespace Home\Controller;
use Think\Controller;

/**
 * art
 */
class ArtController extends Controller
{

  public function art()
  {
    $art_id = I('art_id');
    $art = D('Art');
    $artmodel = $art->field('art_id,catname,title,content,pubtime,comment_num,click')->join('cat on art.cat_id = cat.cat_id')->find($art_id);
    $this->assign('artmodel',$artmodel);
    $cat = D('Cat');
    $catmodel = $cat->field('cat_id,catname,art_num')->select();
    $this->assign('catmodel',$catmodel);
    $this->display();
  }
}


 ?>
