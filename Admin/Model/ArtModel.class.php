<?php
namespace Admin\Model;
use Think\Model;

class ArtModel extends Model {
  protected $_validate = array(
    array('title','1,10','标题长度为1到10,不能为空',0,'length'),
    array('content','1,3000','内容长度为1到3000,不能为空',0,'length'),
  );
  protected $_auto = array(
    array('pubtime','time',1,'function'),
  );
}
 ?>
 <meta charset="utf-8">
