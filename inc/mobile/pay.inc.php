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
    $id = intval($_GPC['id']);
    /*$order = pdo_get('paycenter_order', array('uniacid' => $_W['uniacid'], 'id' => $id));
    if (empty($order)) {
        message('订单不存在或已删除', '', 'error');
    }
    if ($order['status'] == 1) {
        message('该订单已付款', '', 'error');
    }
    if (!empty($_W['member']['uid']) || !empty($_W['fans'])) {
        $update = array(
            'uid' => $_W['member']['uid'],
            'openid' => $_W['openid'],
            'nickname' => $_W['fans']['nickname']
        );
        pdo_update('paycenter_order', $update, array('uniacid' => $_W['uniacid'], 'id' => $id));
        $order['uid'] = $_W['member']['uid'];
    }
    $params['module'] = "paycenter_order";
    $params['tid'] = $order['id'];
    $params['ordersn'] = $order['id'];
    $params['user'] = $order['uid'];
    $params['fee'] = $order['final_fee'];
    $params['title'] = $_W['account']['name'] . $order['body'] ? $order['body'] : '收银台收款';
    $this->pay($params);*/
}