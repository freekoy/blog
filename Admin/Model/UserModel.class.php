<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model {
  // 授权
  public function auth() {
    //cookie('user_id',$this->user_id);
    //cookie('username',$this->username);
    cookie('ccode',md5($this->user_id.$this->username));
  }
  // 收回权限
  public function revoke() {
    //cookie('user_id',null);
    //cookie('username',null);
    cookie('ccode',null);
  }
}
 ?>
