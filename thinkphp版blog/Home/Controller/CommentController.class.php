<?php
namespace Home\Controller;
use Think\Controller;

/**
 * comment
 */
class CommentController extends Controller
{

  public function comment()
  {
    $comment = D('Comment');
    $commentmodel = $comment->field('username,content,pubtime')->select();
    $this->assign('commentmodel',$commentmodel);
    if(IS_POST) {
      if (!$comment->create()){
        // 创建数据对象
       // 如果创建失败 表示验证没有通过 输出错误提示信息
       exit($comment->getError());
      }else{
           // 验证通过 写入新增数据
           $result = $comment->add();
           if($result) {
             $this->success('评论成功,正在跳转中...','',3);
           }else {
             $this->error('评论失败,正在跳转中...','',3);
           }
      }
    }
    $cat = D('Cat');
    $catmodel = $cat->field('cat_id,catname,art_num')->select();
    $this->assign('catmodel',$catmodel);
    $this->display();
  }
}

 ?>
