<?php
namespace Admin\Model;
use Think\Model;

class CatModel extends Model {
  protected $_validate = array(
     array('catname','1,10','不能为空或长度不符1到10！',0,'length'), // 验证标题长度
   );
}
 ?>
<meta charset='utf-8'>
