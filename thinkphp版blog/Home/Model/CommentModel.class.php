<?php
namespace Home\Model;
use Think\Model;

/**
 * commentmodel
 */
class CommentModel extends Model
{
  protected $_validate = array(
    array('username','1,10','访客名长度在1到10之间,不能为空',0,'length'),
    array('qq','6,12','qq长度在6到12之间,不能为空',0,'length'),
    array('content','1,100','留言内容在100字数以内,不能为空',0,'length'),
  );
  protected $_auto = array (
         array('pubtime','time',1,'function'),
         array('ip','get_client_ip',1,'function'),//自动获取ip地址
     );
}

 ?>
 <meta charset="utf-8">
