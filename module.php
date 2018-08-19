<?php
/**
 * 【金融分发】模块定义
 *
 * @author 金融分发
 * @url https://s.we7.cc/index.php?c=home&a=author&do=index&uid=59968
 */
defined('IN_IA') or exit('Access Denied');
class wdbk_ffModule extends WeModule {
    // ps: 配置此函数时，PC应用入口出现问题无法进入，可能有兼容问题
	public function welcomeDisplay($menus = array()) {
		ob_end_clean();
        @header('Location: '.$this->createWebUrl('dashboard'));
        exit;
	}
	public function settingsDisplay($settings) {
	    //TODO
    }
    public function fieldsFormDisplay($rid = 0) {
	    //TODO
    }
    public function fieldsFormValidate($rid = 0) {
        //TODO
    }
    public function fieldsFormSubmit($rid) {
        //TODO
    }
    public function ruleDeleted($rid) {
        //TODO
    }
}