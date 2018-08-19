<?php
/**
 * 【金融分发】模块定义
 *
 * @author 金融分发
 * @url https://s.we7.cc/index.php?c=home&a=author&do=index&uid=59968
 */
defined('IN_IA') or exit('Access Denied');
global $_W, $_GPC;
$do = $_GPC['do'];
$act = in_array($_GPC['act'], array('display'))?$_GPC['act']:'display';
if ($act == 'display') {
    //TODO
}
include $this->template('web/dashboard');