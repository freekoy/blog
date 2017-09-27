<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
      //用户名与密码
      $username = I('username');
      $password = I('password');
      $user = D('User');
      $usermodel = $user->where('user_id=1')->find();
      //验证码
      $verify = new \Think\Verify();
      $result = $verify->check(I('verify'));

      if(IS_POST) {
        if(!$result) {
          $this->error('验证码错误,正在跳转中...','http://17blog.com/index.php/admin/login/login',3);
        }
        if($usermodel['username'] !== $username) {
          echo '用户名不存在';
        } else if($usermodel['password'] !== md5($password.$usermodel['salt']) ) {
          echo '密码不正确';
        } else {
          $user->auth();
          $this->success('登陆成功,正在跳转中...','http://17blog.com/index.php/admin/cat/catadd',3);
        }
      }
      $this->display();
    }

    public function logout() {
      $user = D('User');
      $user->revoke();
      $this->redirect('admin/login/login');
    }

    public function vcode() {
      //中文验证码
      $Verify = new \Think\Verify();
      $Verify->useZh = true;
      $Verify->entry();
    }
}
?>
