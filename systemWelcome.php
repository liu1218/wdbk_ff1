<?php
/**
 * 【金融分发】模块定义
 *
 * @author 金融分发
 * @url https://s.we7.cc/index.php?c=home&a=author&do=index&uid=59968
 */
defined('IN_IA') or exit('Access Denied');
class wdbk_ffModuleSystemWelcome extends WeModuleSystemWelcome {
    /*
     * 首页加载主函数入口，可处理业务逻辑、加载配置参数等
     */
	public function systemWelcomeDisplay() {
        global $_GPC, $_W;
        $row = pdo_get('wdbk_ff_kv', array(
            'skey' => 'setting',
        ));
        $setting = $row&&$row['svalue']?iunserializer($row['svalue']):array(
            'title' => '页面标题',
            'keywords' => '页面关键字',
            'description' => '页面描述',
        );
        include $this->template("system-welcome/home");
	}
	
	/*
	 * 后台参数设置，加载和保存参数，如页面标题、关键字、描述等
	 */
	public function doPageSetting(){
        global $_W, $_GPC;
        $row = pdo_get('wdbk_ff_kv', array(
            'skey' => 'setting',
        ));
        $setting = $row&&$row['svalue']?iunserializer($row['svalue']):array();
        $id = $row?$row['id']:0;
        if (checksubmit()) {
            $svalue = $_GPC['svalue'];
            if (!empty($id)) {
                pdo_update('wdbk_ff_kv', array(
                    'skey' => 'setting',
                    'svalue' => iserializer($svalue),
                ), array(
                    'id' => $id
                ));
            } else {
                pdo_insert('wdbk_ff_kv', array(
                    'skey' => 'setting',
                    'svalue' => iserializer($svalue),
                ));
            }
            message('操作成功！', referer(), 'success');
        }
        include $this->template('system-welcome/setting');
    }
}