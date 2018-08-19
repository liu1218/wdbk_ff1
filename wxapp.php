<?php
/**
 * 【金融分发】模块定义
 *
 * @author 金融分发
 * @url https://s.we7.cc/index.php?c=home&a=author&do=index&uid=59968
 */
defined('IN_IA') or exit('Access Denied');
class wdbk_ffModuleWxapp extends WeModuleWxapp {
    public function __construct() {
        $this->_init_member();
    }
    /*
     * 支付notify回调函数，无返回值
     */
    public function payResult($params) {
        global $_W;
        WeUtility::logging('debug', "[wxapp] payResult: params=".var_export($params, true));
        $paylog = pdo_get('core_paylog', array(
            'tid' => $params['tid'],
            'module' => 'wdbk_ff',
        ));
        if (empty($paylog)) {
            WeUtility::logging('fatal', "[wxapp] payResult: paylog is null, tid={$params['tid']}");
            return;
        }
        $order = array(
            //TODO
        );
        if ($paylog['fee'] != $order['amount'] || $paylog['status'] != 1) {
            WeUtility::logging('fatal', "[wxapp] payResult: invalid fee, paylog=".var_export($paylog, true).", order=".var_export($order, true));
            return;
        }
        if ($order['status'] != 0) {
            WeUtility::logging('fatal', "[wxapp] payResult: payed, order=".var_export($order, true));
            return;
        }
        if ($params['result'] == 'success'
            && $params['from'] == 'notify') {
            //TODO: update
            WeUtility::logging('info', "[wxapp] payResult: success, id={$order['id']}");
        }
    }
    private function _init_member() {
        global $_W;
        $openid = $_W['openid']?$_W['openid']:($_SESSION['openid']?$_SESSION['openid']:($_W['fans']?$_W['fans']['openid']:''));
        if (empty($_W['member']) && !empty($openid)) {
            $_W['member'] = mc_fetch(mc_openid2uid($openid));
        }
    }
}