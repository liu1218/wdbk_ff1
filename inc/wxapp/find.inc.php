<?php
/**
 * 【金融分发】模块定义
 *
 * @author 金融分发
 * @url https://s.we7.cc/index.php?c=home&a=author&do=index&uid=59968
 */
defined('IN_IA') or exit('Access Denied');
global $_W, $_GPC;
$do = in_array($_GPC['do'], array('index'))?$_GPC['do']:'index';
if ($do == 'index') {
    //TODO
    $this->result(0, 'ok', array());
}
