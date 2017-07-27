<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends Controller {
    public function __construct (){
      parent::__construct();
      $this->comment = D('Comment');
      //登陆验证
      $this->user = D('User');
      $usermodel = $this->user->where('user_id=1')->find();
      $ccode = cookie('ccode');
      if($ccode !== md5($usermodel['user_id'].$usermodel['username'])) {
        $this->error('非法登陆,跳转中...','http://17blog.com/index.php/admin/login/login',3);
      }

    }

    public function commentlist(){
      $p = I('p')?I('p'):1;
      $commentmodel = $this->comment->field('username,comment_id,pubtime,qq,ip')->page($p.',8')->select();
      $this->assign('commentmodel',$commentmodel);
      $count      = $this->comment->count();// 查询满足要求的总记录数
      $Page       = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
      $show       = $Page->show();// 分页显示输出
      $this->assign('page',$show);// 赋值分页输出
      $this->display();
    }

    public function commentdel(){
      $comment_id = I('comment_id');
      $result = $this->comment->where('comment_id='.$comment_id)->delete();
      if($result) {
        $this->success('删除成功,正在跳转中...','',3);
      }else {
        $this->error('删除失败,正在跳转中...','',3);
      }
    }
}
