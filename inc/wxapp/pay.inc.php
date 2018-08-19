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
    $orderid = 1; //TODO
    $money = 0.01; //TODO
    $params = array(
        'tid' => $orderid,
        'user' => $_W['openid'],
        'fee' => $money,
        'title' => '测试小程序支付功能',
    );
    $result = $this->pay($params);
    if (is_error($result)) {
        WeUtility::logging('fatal', '[pay] failed, result='.var_export($result, true));
        return $this->json(-1, '支付失败，请重试');
    }

    //发送模板消息需要prepay_id参数，可保存到数据库备用
    //$prepay_id = str_replace('prepay_id=', '', $result['package']);
    //pdo_update('', array(), array());

    $this->json(ERRNO::OK, '', $result);
}
