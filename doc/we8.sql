/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : we8

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-01-16 07:42:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ims_account
-- ----------------------------
DROP TABLE IF EXISTS `ims_account`;
CREATE TABLE `ims_account` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `hash` varchar(8) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `isconnect` tinyint(4) NOT NULL,
  `isdeleted` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_account
-- ----------------------------
INSERT INTO `ims_account` VALUES ('1', '1', 'uRr8qvQV', '1', '0', '0');

-- ----------------------------
-- Table structure for ims_account_wechats
-- ----------------------------
DROP TABLE IF EXISTS `ims_account_wechats`;
CREATE TABLE `ims_account_wechats` (
  `acid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `token` varchar(32) NOT NULL,
  `encodingaeskey` varchar(255) NOT NULL,
  `level` tinyint(4) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `account` varchar(30) NOT NULL,
  `original` varchar(50) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `country` varchar(10) NOT NULL,
  `province` varchar(3) NOT NULL,
  `city` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `key` varchar(50) NOT NULL,
  `secret` varchar(50) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `subscribeurl` varchar(120) NOT NULL,
  `auth_refresh_token` varchar(255) NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `idx_key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_account_wechats
-- ----------------------------
INSERT INTO `ims_account_wechats` VALUES ('1', '1', 'omJNpZEhZeHj1ZxFECKkP48B5VFbk1HP', '', '1', '微信营销系统', '', '', '', '', '', '', '', '', '0', '', '', '1', '', '');

-- ----------------------------
-- Table structure for ims_account_wxapp
-- ----------------------------
DROP TABLE IF EXISTS `ims_account_wxapp`;
CREATE TABLE `ims_account_wxapp` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `token` varchar(32) NOT NULL,
  `encodingaeskey` varchar(43) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `account` varchar(30) NOT NULL,
  `original` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `secret` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_account_wxapp
-- ----------------------------

-- ----------------------------
-- Table structure for ims_article_category
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_category`;
CREATE TABLE `ims_article_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_category
-- ----------------------------

-- ----------------------------
-- Table structure for ims_article_news
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_news`;
CREATE TABLE `ims_article_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_show_home` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `cateid` (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_news
-- ----------------------------

-- ----------------------------
-- Table structure for ims_article_notice
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_notice`;
CREATE TABLE `ims_article_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_show_home` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `cateid` (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_notice
-- ----------------------------

-- ----------------------------
-- Table structure for ims_article_unread_notice
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_unread_notice`;
CREATE TABLE `ims_article_unread_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notice_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `is_new` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `notice_id` (`notice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_unread_notice
-- ----------------------------

-- ----------------------------
-- Table structure for ims_basic_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_basic_reply`;
CREATE TABLE `ims_basic_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_basic_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_business
-- ----------------------------
DROP TABLE IF EXISTS `ims_business`;
CREATE TABLE `ims_business` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `lng` varchar(10) NOT NULL,
  `lat` varchar(10) NOT NULL,
  `industry1` varchar(10) NOT NULL,
  `industry2` varchar(10) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_lat_lng` (`lng`,`lat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_business
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_attachment
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_attachment`;
CREATE TABLE `ims_core_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_cache
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_cache`;
CREATE TABLE `ims_core_cache` (
  `key` varchar(50) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_cache
-- ----------------------------
INSERT INTO `ims_core_cache` VALUES ('setting', 'a:6:{s:9:\"copyright\";a:1:{s:6:\"slides\";a:3:{i:0;s:58:\"https://img.alicdn.com/tps/TB1pfG4IFXXXXc6XXXXXXXXXXXX.jpg\";i:1;s:58:\"https://img.alicdn.com/tps/TB1sXGYIFXXXXc5XpXXXXXXXXXX.jpg\";i:2;s:58:\"https://img.alicdn.com/tps/TB1h9xxIFXXXXbKXXXXXXXXXXXX.jpg\";}}s:8:\"authmode\";i:1;s:5:\"close\";a:2:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";}s:8:\"register\";a:4:{s:4:\"open\";i:1;s:6:\"verify\";i:0;s:4:\"code\";i:1;s:7:\"groupid\";i:1;}s:18:\"module_receive_ban\";a:0:{}s:8:\"platform\";a:5:{s:5:\"token\";s:32:\"ii4o4yFo8d4cIiXkMHCKB8Do8MkmacXy\";s:14:\"encodingaeskey\";s:43:\"bjih3393kIki2k32Bk4f92Kd9bi7hbx9h9H2IhXKbk2\";s:9:\"appsecret\";s:0:\"\";s:5:\"appid\";s:0:\"\";s:9:\"authstate\";i:1;}}');
INSERT INTO `ims_core_cache` VALUES ('system_frame', 'a:6:{s:7:\"account\";a:6:{s:5:\"title\";s:9:\"公众号\";s:4:\"icon\";s:18:\"wi wi-white-collar\";s:3:\"url\";s:41:\"./index.php?c=home&a=welcome&do=platform&\";s:7:\"section\";a:5:{s:13:\"platform_plus\";a:2:{s:5:\"title\";s:12:\"增强功能\";s:4:\"menu\";a:6:{s:14:\"platform_reply\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"自动回复\";s:3:\"url\";s:31:\"./index.php?c=platform&a=reply&\";s:15:\"permission_name\";s:14:\"platform_reply\";s:4:\"icon\";s:11:\"wi wi-reply\";s:12:\"displayorder\";i:6;s:2:\"id\";N;s:14:\"sub_permission\";a:0:{}}s:13:\"platform_menu\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:15:\"自定义菜单\";s:3:\"url\";s:30:\"./index.php?c=platform&a=menu&\";s:15:\"permission_name\";s:13:\"platform_menu\";s:4:\"icon\";s:16:\"wi wi-custommenu\";s:12:\"displayorder\";i:5;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:11:\"platform_qr\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:22:\"二维码/转化链接\";s:3:\"url\";s:28:\"./index.php?c=platform&a=qr&\";s:15:\"permission_name\";s:11:\"platform_qr\";s:4:\"icon\";s:12:\"wi wi-qrcode\";s:12:\"displayorder\";i:4;s:2:\"id\";N;s:14:\"sub_permission\";a:0:{}}s:18:\"platform_mass_task\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"定时群发\";s:3:\"url\";s:30:\"./index.php?c=platform&a=mass&\";s:15:\"permission_name\";s:18:\"platform_mass_task\";s:4:\"icon\";s:13:\"wi wi-crontab\";s:12:\"displayorder\";i:3;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:17:\"platform_material\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:16:\"素材/编辑器\";s:3:\"url\";s:34:\"./index.php?c=platform&a=material&\";s:15:\"permission_name\";s:17:\"platform_material\";s:4:\"icon\";s:12:\"wi wi-redact\";s:12:\"displayorder\";i:2;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:13:\"platform_site\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:16:\"微官网-文章\";s:3:\"url\";s:38:\"./index.php?c=site&a=multi&do=display&\";s:15:\"permission_name\";s:13:\"platform_site\";s:4:\"icon\";s:10:\"wi wi-home\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";a:0:{}}}}s:15:\"platform_module\";a:3:{s:5:\"title\";s:12:\"应用模块\";s:4:\"menu\";a:0:{}s:10:\"is_display\";b:1;}s:2:\"mc\";a:2:{s:5:\"title\";s:6:\"粉丝\";s:4:\"menu\";a:2:{s:7:\"mc_fans\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"粉丝管理\";s:3:\"url\";s:24:\"./index.php?c=mc&a=fans&\";s:15:\"permission_name\";s:7:\"mc_fans\";s:4:\"icon\";s:16:\"wi wi-fansmanage\";s:12:\"displayorder\";i:2;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:9:\"mc_member\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"会员管理\";s:3:\"url\";s:26:\"./index.php?c=mc&a=member&\";s:15:\"permission_name\";s:9:\"mc_member\";s:4:\"icon\";s:10:\"wi wi-fans\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";N;}}}s:7:\"profile\";a:2:{s:5:\"title\";s:6:\"配置\";s:4:\"menu\";a:2:{s:7:\"profile\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"参数配置\";s:3:\"url\";s:33:\"./index.php?c=profile&a=passport&\";s:15:\"permission_name\";s:15:\"profile_setting\";s:4:\"icon\";s:23:\"wi wi-parameter-setting\";s:12:\"displayorder\";i:2;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:7:\"payment\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"支付参数\";s:3:\"url\";s:32:\"./index.php?c=profile&a=payment&\";s:15:\"permission_name\";s:19:\"profile_pay_setting\";s:4:\"icon\";s:17:\"wi wi-pay-setting\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";N;}}}s:10:\"statistics\";a:2:{s:5:\"title\";s:6:\"统计\";s:4:\"menu\";a:1:{s:3:\"app\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"访问统计\";s:3:\"url\";s:31:\"./index.php?c=statistics&a=app&\";s:15:\"permission_name\";s:14:\"statistics_app\";s:4:\"icon\";s:9:\"wi wi-api\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";N;}}}}s:9:\"is_system\";b:1;s:10:\"is_display\";b:1;}s:5:\"wxapp\";a:6:{s:5:\"title\";s:9:\"小程序\";s:4:\"icon\";s:19:\"wi wi-small-routine\";s:3:\"url\";s:38:\"./index.php?c=wxapp&a=display&do=home&\";s:7:\"section\";a:3:{s:14:\"wxapp_entrance\";a:3:{s:5:\"title\";s:15:\"小程序入口\";s:4:\"menu\";a:1:{s:11:\"module_link\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"入口页面\";s:3:\"url\";s:54:\"./index.php?c=wxapp&a=version&do=module_entrance_link&\";s:15:\"permission_name\";s:26:\"wxapp_module_entrance_link\";s:4:\"icon\";s:18:\"wi wi-data-synchro\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";N;}}s:10:\"is_display\";b:1;}s:12:\"wxapp_module\";a:3:{s:5:\"title\";s:6:\"应用\";s:4:\"menu\";a:0:{}s:10:\"is_display\";b:1;}s:20:\"platform_manage_menu\";a:2:{s:5:\"title\";s:6:\"管理\";s:4:\"menu\";a:3:{s:11:\"module_link\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"数据同步\";s:3:\"url\";s:53:\"./index.php?c=wxapp&a=version&do=module_link_uniacid&\";s:15:\"permission_name\";s:25:\"wxapp_module_link_uniacid\";s:4:\"icon\";s:18:\"wi wi-data-synchro\";s:12:\"displayorder\";i:3;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:13:\"wxapp_profile\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"支付参数\";s:3:\"url\";s:30:\"./index.php?c=wxapp&a=payment&\";s:15:\"permission_name\";s:13:\"wxapp_payment\";s:4:\"icon\";s:16:\"wi wi-appsetting\";s:12:\"displayorder\";i:2;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:14:\"front_download\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:15:\"小程序下载\";s:3:\"url\";s:48:\"./index.php?c=wxapp&a=version&do=front_download&\";s:15:\"permission_name\";s:20:\"wxapp_front_download\";s:4:\"icon\";s:20:\"wi wi-wxapp-download\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";N;}}}}s:9:\"is_system\";b:1;s:10:\"is_display\";b:1;}s:6:\"module\";a:6:{s:5:\"title\";s:6:\"应用\";s:4:\"icon\";s:11:\"wi wi-apply\";s:3:\"url\";s:31:\"./index.php?c=module&a=display&\";s:7:\"section\";a:0:{}s:10:\"is_display\";b:1;s:9:\"is_system\";b:1;}s:6:\"system\";a:6:{s:5:\"title\";s:12:\"系统管理\";s:4:\"icon\";s:13:\"wi wi-setting\";s:3:\"url\";s:39:\"./index.php?c=home&a=welcome&do=system&\";s:7:\"section\";a:6:{s:10:\"wxplatform\";a:2:{s:5:\"title\";s:9:\"公众号\";s:4:\"menu\";a:4:{s:14:\"system_account\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:16:\" 微信公众号\";s:3:\"url\";s:45:\"./index.php?c=account&a=manage&account_type=1\";s:15:\"permission_name\";s:14:\"system_account\";s:4:\"icon\";s:12:\"wi wi-wechat\";s:12:\"displayorder\";i:4;s:2:\"id\";N;s:14:\"sub_permission\";a:6:{i:0;a:2:{s:5:\"title\";s:21:\"公众号管理设置\";s:15:\"permission_name\";s:21:\"system_account_manage\";}i:1;a:2:{s:5:\"title\";s:15:\"添加公众号\";s:15:\"permission_name\";s:19:\"system_account_post\";}i:2;a:2:{s:5:\"title\";s:15:\"公众号停用\";s:15:\"permission_name\";s:19:\"system_account_stop\";}i:3;a:2:{s:5:\"title\";s:18:\"公众号回收站\";s:15:\"permission_name\";s:22:\"system_account_recycle\";}i:4;a:2:{s:5:\"title\";s:15:\"公众号删除\";s:15:\"permission_name\";s:21:\"system_account_delete\";}i:5;a:2:{s:5:\"title\";s:15:\"公众号恢复\";s:15:\"permission_name\";s:22:\"system_account_recover\";}}}s:13:\"system_module\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:15:\"公众号应用\";s:3:\"url\";s:51:\"./index.php?c=module&a=manage-system&account_type=1\";s:15:\"permission_name\";s:13:\"system_module\";s:4:\"icon\";s:14:\"wi wi-wx-apply\";s:12:\"displayorder\";i:3;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:15:\"system_template\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:15:\"微官网模板\";s:3:\"url\";s:32:\"./index.php?c=system&a=template&\";s:15:\"permission_name\";s:15:\"system_template\";s:4:\"icon\";s:17:\"wi wi-wx-template\";s:12:\"displayorder\";i:2;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:15:\"system_platform\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:19:\" 微信开放平台\";s:3:\"url\";s:32:\"./index.php?c=system&a=platform&\";s:15:\"permission_name\";s:15:\"system_platform\";s:4:\"icon\";s:20:\"wi wi-exploitsetting\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";N;}}}s:6:\"module\";a:2:{s:5:\"title\";s:9:\"小程序\";s:4:\"menu\";a:2:{s:12:\"system_wxapp\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:15:\"微信小程序\";s:3:\"url\";s:45:\"./index.php?c=account&a=manage&account_type=4\";s:15:\"permission_name\";s:12:\"system_wxapp\";s:4:\"icon\";s:11:\"wi wi-wxapp\";s:12:\"displayorder\";i:2;s:2:\"id\";N;s:14:\"sub_permission\";a:6:{i:0;a:2:{s:5:\"title\";s:21:\"小程序管理设置\";s:15:\"permission_name\";s:19:\"system_wxapp_manage\";}i:1;a:2:{s:5:\"title\";s:15:\"添加小程序\";s:15:\"permission_name\";s:17:\"system_wxapp_post\";}i:2;a:2:{s:5:\"title\";s:15:\"小程序停用\";s:15:\"permission_name\";s:17:\"system_wxapp_stop\";}i:3;a:2:{s:5:\"title\";s:18:\"小程序回收站\";s:15:\"permission_name\";s:20:\"system_wxapp_recycle\";}i:4;a:2:{s:5:\"title\";s:15:\"小程序删除\";s:15:\"permission_name\";s:19:\"system_wxapp_delete\";}i:5;a:2:{s:5:\"title\";s:15:\"小程序恢复\";s:15:\"permission_name\";s:20:\"system_wxapp_recover\";}}}s:19:\"system_module_wxapp\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:15:\"小程序应用\";s:3:\"url\";s:51:\"./index.php?c=module&a=manage-system&account_type=4\";s:15:\"permission_name\";s:19:\"system_module_wxapp\";s:4:\"icon\";s:17:\"wi wi-wxapp-apply\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";N;}}}s:4:\"user\";a:2:{s:5:\"title\";s:13:\"帐户/用户\";s:4:\"menu\";a:3:{s:9:\"system_my\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"我的帐户\";s:3:\"url\";s:29:\"./index.php?c=user&a=profile&\";s:15:\"permission_name\";s:9:\"system_my\";s:4:\"icon\";s:10:\"wi wi-user\";s:12:\"displayorder\";i:3;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:11:\"system_user\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"用户管理\";s:3:\"url\";s:29:\"./index.php?c=user&a=display&\";s:15:\"permission_name\";s:11:\"system_user\";s:4:\"icon\";s:16:\"wi wi-user-group\";s:12:\"displayorder\";i:2;s:2:\"id\";N;s:14:\"sub_permission\";a:7:{i:0;a:2:{s:5:\"title\";s:12:\"编辑用户\";s:15:\"permission_name\";s:16:\"system_user_post\";}i:1;a:2:{s:5:\"title\";s:12:\"审核用户\";s:15:\"permission_name\";s:17:\"system_user_check\";}i:2;a:2:{s:5:\"title\";s:12:\"店员管理\";s:15:\"permission_name\";s:17:\"system_user_clerk\";}i:3;a:2:{s:5:\"title\";s:15:\"用户回收站\";s:15:\"permission_name\";s:19:\"system_user_recycle\";}i:4;a:2:{s:5:\"title\";s:18:\"用户属性设置\";s:15:\"permission_name\";s:18:\"system_user_fields\";}i:5;a:2:{s:5:\"title\";s:31:\"用户属性设置-编辑字段\";s:15:\"permission_name\";s:23:\"system_user_fields_post\";}i:6;a:2:{s:5:\"title\";s:18:\"用户注册设置\";s:15:\"permission_name\";s:23:\"system_user_registerset\";}}}s:25:\"system_user_founder_group\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:15:\"副创始人组\";s:3:\"url\";s:32:\"./index.php?c=founder&a=display&\";s:15:\"permission_name\";s:21:\"system_founder_manage\";s:4:\"icon\";s:16:\"wi wi-co-founder\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";a:6:{i:0;a:2:{s:5:\"title\";s:18:\"添加创始人组\";s:15:\"permission_name\";s:24:\"system_founder_group_add\";}i:1;a:2:{s:5:\"title\";s:18:\"编辑创始人组\";s:15:\"permission_name\";s:25:\"system_founder_group_post\";}i:2;a:2:{s:5:\"title\";s:18:\"删除创始人组\";s:15:\"permission_name\";s:24:\"system_founder_group_del\";}i:3;a:2:{s:5:\"title\";s:15:\"添加创始人\";s:15:\"permission_name\";s:23:\"system_founder_user_add\";}i:4;a:2:{s:5:\"title\";s:15:\"编辑创始人\";s:15:\"permission_name\";s:24:\"system_founder_user_post\";}i:5;a:2:{s:5:\"title\";s:15:\"删除创始人\";s:15:\"permission_name\";s:23:\"system_founder_user_del\";}}}}}s:10:\"permission\";a:2:{s:5:\"title\";s:12:\"权限管理\";s:4:\"menu\";a:2:{s:19:\"system_module_group\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:15:\"应用权限组\";s:3:\"url\";s:29:\"./index.php?c=module&a=group&\";s:15:\"permission_name\";s:19:\"system_module_group\";s:4:\"icon\";s:21:\"wi wi-appjurisdiction\";s:12:\"displayorder\";i:2;s:2:\"id\";N;s:14:\"sub_permission\";a:3:{i:0;a:2:{s:5:\"title\";s:21:\"添加应用权限组\";s:15:\"permission_name\";s:23:\"system_module_group_add\";}i:1;a:2:{s:5:\"title\";s:21:\"编辑应用权限组\";s:15:\"permission_name\";s:24:\"system_module_group_post\";}i:2;a:2:{s:5:\"title\";s:21:\"删除应用权限组\";s:15:\"permission_name\";s:23:\"system_module_group_del\";}}}s:17:\"system_user_group\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:15:\"用户权限组\";s:3:\"url\";s:27:\"./index.php?c=user&a=group&\";s:15:\"permission_name\";s:17:\"system_user_group\";s:4:\"icon\";s:22:\"wi wi-userjurisdiction\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";a:3:{i:0;a:2:{s:5:\"title\";s:15:\"添加用户组\";s:15:\"permission_name\";s:21:\"system_user_group_add\";}i:1;a:2:{s:5:\"title\";s:15:\"编辑用户组\";s:15:\"permission_name\";s:22:\"system_user_group_post\";}i:2;a:2:{s:5:\"title\";s:15:\"删除用户组\";s:15:\"permission_name\";s:21:\"system_user_group_del\";}}}}}s:7:\"article\";a:2:{s:5:\"title\";s:13:\"文章/公告\";s:4:\"menu\";a:2:{s:14:\"system_article\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"文章管理\";s:3:\"url\";s:29:\"./index.php?c=article&a=news&\";s:15:\"permission_name\";s:19:\"system_article_news\";s:4:\"icon\";s:13:\"wi wi-article\";s:12:\"displayorder\";i:2;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:21:\"system_article_notice\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"公告管理\";s:3:\"url\";s:31:\"./index.php?c=article&a=notice&\";s:15:\"permission_name\";s:21:\"system_article_notice\";s:4:\"icon\";s:12:\"wi wi-notice\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";N;}}}s:5:\"cache\";a:2:{s:5:\"title\";s:6:\"缓存\";s:4:\"menu\";a:1:{s:26:\"system_setting_updatecache\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"更新缓存\";s:3:\"url\";s:35:\"./index.php?c=system&a=updatecache&\";s:15:\"permission_name\";s:26:\"system_setting_updatecache\";s:4:\"icon\";s:12:\"wi wi-update\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";N;}}}}s:9:\"is_system\";b:1;s:10:\"is_display\";b:1;}s:4:\"site\";a:7:{s:5:\"title\";s:12:\"站点管理\";s:4:\"icon\";s:17:\"wi wi-system-site\";s:3:\"url\";s:30:\"./index.php?c=cloud&a=upgrade&\";s:7:\"section\";a:3:{s:5:\"cloud\";a:2:{s:5:\"title\";s:9:\"云服务\";s:4:\"menu\";a:4:{s:14:\"system_profile\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"系统升级\";s:3:\"url\";s:30:\"./index.php?c=cloud&a=upgrade&\";s:15:\"permission_name\";s:20:\"system_cloud_upgrade\";s:4:\"icon\";s:11:\"wi wi-cache\";s:12:\"displayorder\";i:4;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:21:\"system_cloud_register\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"注册站点\";s:3:\"url\";s:30:\"./index.php?c=cloud&a=profile&\";s:15:\"permission_name\";s:21:\"system_cloud_register\";s:4:\"icon\";s:18:\"wi wi-registersite\";s:12:\"displayorder\";i:3;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:21:\"system_cloud_diagnose\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:15:\"云服务诊断\";s:3:\"url\";s:31:\"./index.php?c=cloud&a=diagnose&\";s:15:\"permission_name\";s:21:\"system_cloud_diagnose\";s:4:\"icon\";s:14:\"wi wi-diagnose\";s:12:\"displayorder\";i:2;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:16:\"system_cloud_sms\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"短信管理\";s:3:\"url\";s:26:\"./index.php?c=cloud&a=sms&\";s:15:\"permission_name\";s:16:\"system_cloud_sms\";s:4:\"icon\";s:13:\"wi wi-message\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";N;}}}s:7:\"setting\";a:2:{s:5:\"title\";s:6:\"设置\";s:4:\"menu\";a:6:{s:19:\"system_setting_site\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"站点设置\";s:3:\"url\";s:28:\"./index.php?c=system&a=site&\";s:15:\"permission_name\";s:19:\"system_setting_site\";s:4:\"icon\";s:18:\"wi wi-site-setting\";s:12:\"displayorder\";i:6;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:19:\"system_setting_menu\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"菜单设置\";s:3:\"url\";s:28:\"./index.php?c=system&a=menu&\";s:15:\"permission_name\";s:19:\"system_setting_menu\";s:4:\"icon\";s:18:\"wi wi-menu-setting\";s:12:\"displayorder\";i:5;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:25:\"system_setting_attachment\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"附件设置\";s:3:\"url\";s:34:\"./index.php?c=system&a=attachment&\";s:15:\"permission_name\";s:25:\"system_setting_attachment\";s:4:\"icon\";s:16:\"wi wi-attachment\";s:12:\"displayorder\";i:4;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:25:\"system_setting_systeminfo\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"系统信息\";s:3:\"url\";s:34:\"./index.php?c=system&a=systeminfo&\";s:15:\"permission_name\";s:25:\"system_setting_systeminfo\";s:4:\"icon\";s:17:\"wi wi-system-info\";s:12:\"displayorder\";i:3;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:19:\"system_setting_logs\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"查看日志\";s:3:\"url\";s:28:\"./index.php?c=system&a=logs&\";s:15:\"permission_name\";s:19:\"system_setting_logs\";s:4:\"icon\";s:9:\"wi wi-log\";s:12:\"displayorder\";i:2;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:26:\"system_setting_ipwhitelist\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:11:\"IP白名单\";s:3:\"url\";s:35:\"./index.php?c=system&a=ipwhitelist&\";s:15:\"permission_name\";s:26:\"system_setting_ipwhitelist\";s:4:\"icon\";s:8:\"wi wi-ip\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";N;}}}s:7:\"utility\";a:2:{s:5:\"title\";s:12:\"常用工具\";s:4:\"menu\";a:5:{s:24:\"system_utility_filecheck\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:18:\"系统文件校验\";s:3:\"url\";s:33:\"./index.php?c=system&a=filecheck&\";s:15:\"permission_name\";s:24:\"system_utility_filecheck\";s:4:\"icon\";s:10:\"wi wi-file\";s:12:\"displayorder\";i:5;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:23:\"system_utility_optimize\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"性能优化\";s:3:\"url\";s:32:\"./index.php?c=system&a=optimize&\";s:15:\"permission_name\";s:23:\"system_utility_optimize\";s:4:\"icon\";s:14:\"wi wi-optimize\";s:12:\"displayorder\";i:4;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:23:\"system_utility_database\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:9:\"数据库\";s:3:\"url\";s:32:\"./index.php?c=system&a=database&\";s:15:\"permission_name\";s:23:\"system_utility_database\";s:4:\"icon\";s:9:\"wi wi-sql\";s:12:\"displayorder\";i:3;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:19:\"system_utility_scan\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:12:\"木马查杀\";s:3:\"url\";s:28:\"./index.php?c=system&a=scan&\";s:15:\"permission_name\";s:19:\"system_utility_scan\";s:4:\"icon\";s:12:\"wi wi-safety\";s:12:\"displayorder\";i:2;s:2:\"id\";N;s:14:\"sub_permission\";N;}s:18:\"system_utility_bom\";a:9:{s:9:\"is_system\";i:1;s:10:\"is_display\";i:1;s:5:\"title\";s:15:\"检测文件BOM\";s:3:\"url\";s:27:\"./index.php?c=system&a=bom&\";s:15:\"permission_name\";s:18:\"system_utility_bom\";s:4:\"icon\";s:9:\"wi wi-bom\";s:12:\"displayorder\";i:1;s:2:\"id\";N;s:14:\"sub_permission\";N;}}}}s:7:\"founder\";b:1;s:9:\"is_system\";b:1;s:10:\"is_display\";b:1;}s:4:\"help\";a:7:{s:5:\"title\";s:12:\"帮助系统\";s:4:\"icon\";s:12:\"wi wi-market\";s:3:\"url\";s:29:\"./index.php?c=help&a=display&\";s:7:\"section\";a:0:{}s:5:\"blank\";b:1;s:9:\"is_system\";b:1;s:10:\"is_display\";b:1;}}');
INSERT INTO `ims_core_cache` VALUES ('userbasefields', 'a:45:{s:7:\"uniacid\";s:17:\"同一公众号id\";s:7:\"groupid\";s:8:\"分组id\";s:7:\"credit1\";s:6:\"积分\";s:7:\"credit2\";s:6:\"余额\";s:7:\"credit3\";s:19:\"预留积分类型3\";s:7:\"credit4\";s:19:\"预留积分类型4\";s:7:\"credit5\";s:19:\"预留积分类型5\";s:7:\"credit6\";s:19:\"预留积分类型6\";s:10:\"createtime\";s:12:\"加入时间\";s:6:\"mobile\";s:12:\"手机号码\";s:5:\"email\";s:12:\"电子邮箱\";s:8:\"realname\";s:12:\"真实姓名\";s:8:\"nickname\";s:6:\"昵称\";s:6:\"avatar\";s:6:\"头像\";s:2:\"qq\";s:5:\"QQ号\";s:6:\"gender\";s:6:\"性别\";s:5:\"birth\";s:6:\"生日\";s:13:\"constellation\";s:6:\"星座\";s:6:\"zodiac\";s:6:\"生肖\";s:9:\"telephone\";s:12:\"固定电话\";s:6:\"idcard\";s:12:\"证件号码\";s:9:\"studentid\";s:6:\"学号\";s:5:\"grade\";s:6:\"班级\";s:7:\"address\";s:6:\"地址\";s:7:\"zipcode\";s:6:\"邮编\";s:11:\"nationality\";s:6:\"国籍\";s:6:\"reside\";s:9:\"居住地\";s:14:\"graduateschool\";s:12:\"毕业学校\";s:7:\"company\";s:6:\"公司\";s:9:\"education\";s:6:\"学历\";s:10:\"occupation\";s:6:\"职业\";s:8:\"position\";s:6:\"职位\";s:7:\"revenue\";s:9:\"年收入\";s:15:\"affectivestatus\";s:12:\"情感状态\";s:10:\"lookingfor\";s:13:\" 交友目的\";s:9:\"bloodtype\";s:6:\"血型\";s:6:\"height\";s:6:\"身高\";s:6:\"weight\";s:6:\"体重\";s:6:\"alipay\";s:15:\"支付宝帐号\";s:3:\"msn\";s:3:\"MSN\";s:6:\"taobao\";s:12:\"阿里旺旺\";s:4:\"site\";s:6:\"主页\";s:3:\"bio\";s:12:\"自我介绍\";s:8:\"interest\";s:12:\"兴趣爱好\";s:8:\"password\";s:6:\"密码\";}');
INSERT INTO `ims_core_cache` VALUES ('usersfields', 'a:46:{s:8:\"realname\";s:12:\"真实姓名\";s:8:\"nickname\";s:6:\"昵称\";s:6:\"avatar\";s:6:\"头像\";s:2:\"qq\";s:5:\"QQ号\";s:6:\"mobile\";s:12:\"手机号码\";s:3:\"vip\";s:9:\"VIP级别\";s:6:\"gender\";s:6:\"性别\";s:9:\"birthyear\";s:12:\"出生生日\";s:13:\"constellation\";s:6:\"星座\";s:6:\"zodiac\";s:6:\"生肖\";s:9:\"telephone\";s:12:\"固定电话\";s:6:\"idcard\";s:12:\"证件号码\";s:9:\"studentid\";s:6:\"学号\";s:5:\"grade\";s:6:\"班级\";s:7:\"address\";s:12:\"邮寄地址\";s:7:\"zipcode\";s:6:\"邮编\";s:11:\"nationality\";s:6:\"国籍\";s:14:\"resideprovince\";s:12:\"居住地址\";s:14:\"graduateschool\";s:12:\"毕业学校\";s:7:\"company\";s:6:\"公司\";s:9:\"education\";s:6:\"学历\";s:10:\"occupation\";s:6:\"职业\";s:8:\"position\";s:6:\"职位\";s:7:\"revenue\";s:9:\"年收入\";s:15:\"affectivestatus\";s:12:\"情感状态\";s:10:\"lookingfor\";s:13:\" 交友目的\";s:9:\"bloodtype\";s:6:\"血型\";s:6:\"height\";s:6:\"身高\";s:6:\"weight\";s:6:\"体重\";s:6:\"alipay\";s:15:\"支付宝帐号\";s:3:\"msn\";s:3:\"MSN\";s:5:\"email\";s:12:\"电子邮箱\";s:6:\"taobao\";s:12:\"阿里旺旺\";s:4:\"site\";s:6:\"主页\";s:3:\"bio\";s:12:\"自我介绍\";s:8:\"interest\";s:12:\"兴趣爱好\";s:7:\"uniacid\";s:17:\"同一公众号id\";s:7:\"groupid\";s:8:\"分组id\";s:7:\"credit1\";s:6:\"积分\";s:7:\"credit2\";s:6:\"余额\";s:7:\"credit3\";s:19:\"预留积分类型3\";s:7:\"credit4\";s:19:\"预留积分类型4\";s:7:\"credit5\";s:19:\"预留积分类型5\";s:7:\"credit6\";s:19:\"预留积分类型6\";s:10:\"createtime\";s:12:\"加入时间\";s:8:\"password\";s:12:\"用户密码\";}');
INSERT INTO `ims_core_cache` VALUES ('module_receive_enable', 'a:13:{s:5:\"image\";a:1:{i:0;s:6:\"fz_wlw\";}s:5:\"voice\";a:1:{i:0;s:6:\"fz_wlw\";}s:5:\"video\";a:1:{i:0;s:6:\"fz_wlw\";}s:10:\"shortvideo\";a:1:{i:0;s:6:\"fz_wlw\";}s:8:\"location\";a:1:{i:0;s:6:\"fz_wlw\";}s:4:\"link\";a:1:{i:0;s:6:\"fz_wlw\";}s:9:\"subscribe\";a:1:{i:0;s:6:\"fz_wlw\";}s:11:\"unsubscribe\";a:1:{i:0;s:6:\"fz_wlw\";}s:2:\"qr\";a:1:{i:0;s:6:\"fz_wlw\";}s:5:\"trace\";a:1:{i:0;s:6:\"fz_wlw\";}s:5:\"click\";a:1:{i:0;s:6:\"fz_wlw\";}s:4:\"view\";a:1:{i:0;s:6:\"fz_wlw\";}s:14:\"merchant_order\";a:1:{i:0;s:6:\"fz_wlw\";}}');
INSERT INTO `ims_core_cache` VALUES ('we7:module_info:fz_wlw', 'a:25:{s:3:\"mid\";s:2:\"12\";s:4:\"name\";s:6:\"fz_wlw\";s:4:\"type\";s:8:\"business\";s:5:\"title\";s:18:\"移动支付设备\";s:7:\"version\";s:3:\"1.2\";s:7:\"ability\";s:24:\"移动支付硬件设备\";s:11:\"description\";s:24:\"移动支付硬件设备\";s:6:\"author\";s:6:\"锋哥\";s:3:\"url\";s:26:\"http://www.fengzhi360.com/\";s:8:\"settings\";s:1:\"1\";s:10:\"subscribes\";a:14:{i:0;s:4:\"text\";i:1;s:5:\"image\";i:2;s:5:\"voice\";i:3;s:5:\"video\";i:4;s:10:\"shortvideo\";i:5;s:8:\"location\";i:6;s:4:\"link\";i:7;s:9:\"subscribe\";i:8;s:11:\"unsubscribe\";i:9;s:2:\"qr\";i:10;s:5:\"trace\";i:11;s:5:\"click\";i:12;s:4:\"view\";i:13;s:14:\"merchant_order\";}s:7:\"handles\";a:12:{i:0;s:5:\"image\";i:1;s:5:\"voice\";i:2;s:5:\"video\";i:3;s:10:\"shortvideo\";i:4;s:8:\"location\";i:5;s:4:\"link\";i:6;s:9:\"subscribe\";i:7;s:2:\"qr\";i:8;s:5:\"trace\";i:9;s:5:\"click\";i:10;s:14:\"merchant_order\";i:11;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:6:\"a:0:{}\";s:13:\"title_initial\";s:1:\"Y\";s:13:\"wxapp_support\";s:1:\"1\";s:11:\"app_support\";s:1:\"2\";s:9:\"isdisplay\";i:1;s:4:\"logo\";s:56:\"http://wlw.my/addons/fz_wlw/icon-custom.jpg?v=1516025829\";s:11:\"main_module\";b:0;s:11:\"plugin_list\";a:0:{}s:11:\"is_relation\";b:0;}');
INSERT INTO `ims_core_cache` VALUES ('we7:module_info:basic', 'a:25:{s:3:\"mid\";s:1:\"1\";s:4:\"name\";s:5:\"basic\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本文字回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:24:\"和您进行简单对话\";s:11:\"description\";s:201:\"一问一答得简单对话. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的回复内容.\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:13:\"title_initial\";s:0:\"\";s:13:\"wxapp_support\";s:1:\"1\";s:11:\"app_support\";s:1:\"2\";s:9:\"isdisplay\";i:1;s:4:\"logo\";s:48:\"http://wlw.my/addons/basic/icon.jpg?v=1516025669\";s:11:\"main_module\";b:0;s:11:\"plugin_list\";a:0:{}s:11:\"is_relation\";b:0;}');
INSERT INTO `ims_core_cache` VALUES ('we7:module_info:news', 'a:25:{s:3:\"mid\";s:1:\"2\";s:4:\"name\";s:4:\"news\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:24:\"基本混合图文回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:33:\"为你提供生动的图文资讯\";s:11:\"description\";s:272:\"一问一答得简单对话, 但是回复内容包括图片文字等更生动的媒体内容. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的图文回复内容.\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:13:\"title_initial\";s:0:\"\";s:13:\"wxapp_support\";s:1:\"1\";s:11:\"app_support\";s:1:\"2\";s:9:\"isdisplay\";i:1;s:4:\"logo\";s:47:\"http://wlw.my/addons/news/icon.jpg?v=1516025669\";s:11:\"main_module\";b:0;s:11:\"plugin_list\";a:0:{}s:11:\"is_relation\";b:0;}');
INSERT INTO `ims_core_cache` VALUES ('we7:module_info:music', 'a:25:{s:3:\"mid\";s:1:\"3\";s:4:\"name\";s:5:\"music\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本音乐回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:39:\"提供语音、音乐等音频类回复\";s:11:\"description\";s:183:\"在回复规则中可选择具有语音、音乐等音频类的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝，实现一问一答得简单对话。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:13:\"title_initial\";s:0:\"\";s:13:\"wxapp_support\";s:1:\"1\";s:11:\"app_support\";s:1:\"2\";s:9:\"isdisplay\";i:1;s:4:\"logo\";s:48:\"http://wlw.my/addons/music/icon.jpg?v=1516025669\";s:11:\"main_module\";b:0;s:11:\"plugin_list\";a:0:{}s:11:\"is_relation\";b:0;}');
INSERT INTO `ims_core_cache` VALUES ('we7:module_info:userapi', 'a:25:{s:3:\"mid\";s:1:\"4\";s:4:\"name\";s:7:\"userapi\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:21:\"自定义接口回复\";s:7:\"version\";s:3:\"1.1\";s:7:\"ability\";s:33:\"更方便的第三方接口设置\";s:11:\"description\";s:147:\"自定义接口又称第三方接口，可以让开发者更方便的接入微信营销系统，高效的与微信公众平台进行对接整合。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:13:\"title_initial\";s:0:\"\";s:13:\"wxapp_support\";s:1:\"1\";s:11:\"app_support\";s:1:\"2\";s:9:\"isdisplay\";i:1;s:4:\"logo\";s:50:\"http://wlw.my/addons/userapi/icon.jpg?v=1516025669\";s:11:\"main_module\";b:0;s:11:\"plugin_list\";a:0:{}s:11:\"is_relation\";b:0;}');
INSERT INTO `ims_core_cache` VALUES ('we7:module_info:recharge', 'a:25:{s:3:\"mid\";s:1:\"5\";s:4:\"name\";s:8:\"recharge\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:24:\"会员中心充值模块\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:24:\"提供会员充值功能\";s:11:\"description\";s:0:\"\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:13:\"title_initial\";s:0:\"\";s:13:\"wxapp_support\";s:1:\"1\";s:11:\"app_support\";s:1:\"2\";s:9:\"isdisplay\";i:1;s:4:\"logo\";s:51:\"http://wlw.my/addons/recharge/icon.jpg?v=1516025669\";s:11:\"main_module\";b:0;s:11:\"plugin_list\";a:0:{}s:11:\"is_relation\";b:0;}');
INSERT INTO `ims_core_cache` VALUES ('we7:module_info:custom', 'a:25:{s:3:\"mid\";s:1:\"6\";s:4:\"name\";s:6:\"custom\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:15:\"多客服转接\";s:7:\"version\";s:5:\"1.0.0\";s:7:\"ability\";s:36:\"用来接入腾讯的多客服系统\";s:11:\"description\";s:0:\"\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:17:\"http://bbs.we7.cc\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:6:{i:0;s:5:\"image\";i:1;s:5:\"voice\";i:2;s:5:\"video\";i:3;s:8:\"location\";i:4;s:4:\"link\";i:5;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:13:\"title_initial\";s:0:\"\";s:13:\"wxapp_support\";s:1:\"1\";s:11:\"app_support\";s:1:\"2\";s:9:\"isdisplay\";i:1;s:4:\"logo\";s:49:\"http://wlw.my/addons/custom/icon.jpg?v=1516025669\";s:11:\"main_module\";b:0;s:11:\"plugin_list\";a:0:{}s:11:\"is_relation\";b:0;}');
INSERT INTO `ims_core_cache` VALUES ('we7:module_info:images', 'a:25:{s:3:\"mid\";s:1:\"7\";s:4:\"name\";s:6:\"images\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本图片回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供图片回复\";s:11:\"description\";s:132:\"在回复规则中可选择具有图片的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝图片。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:13:\"title_initial\";s:0:\"\";s:13:\"wxapp_support\";s:1:\"1\";s:11:\"app_support\";s:1:\"2\";s:9:\"isdisplay\";i:1;s:4:\"logo\";s:49:\"http://wlw.my/addons/images/icon.jpg?v=1516025669\";s:11:\"main_module\";b:0;s:11:\"plugin_list\";a:0:{}s:11:\"is_relation\";b:0;}');
INSERT INTO `ims_core_cache` VALUES ('we7:module_info:video', 'a:25:{s:3:\"mid\";s:1:\"8\";s:4:\"name\";s:5:\"video\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本视频回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供图片回复\";s:11:\"description\";s:132:\"在回复规则中可选择具有视频的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝视频。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:13:\"title_initial\";s:0:\"\";s:13:\"wxapp_support\";s:1:\"1\";s:11:\"app_support\";s:1:\"2\";s:9:\"isdisplay\";i:1;s:4:\"logo\";s:48:\"http://wlw.my/addons/video/icon.jpg?v=1516025669\";s:11:\"main_module\";b:0;s:11:\"plugin_list\";a:0:{}s:11:\"is_relation\";b:0;}');
INSERT INTO `ims_core_cache` VALUES ('we7:module_info:voice', 'a:25:{s:3:\"mid\";s:1:\"9\";s:4:\"name\";s:5:\"voice\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本语音回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供语音回复\";s:11:\"description\";s:132:\"在回复规则中可选择具有语音的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝语音。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:13:\"title_initial\";s:0:\"\";s:13:\"wxapp_support\";s:1:\"1\";s:11:\"app_support\";s:1:\"2\";s:9:\"isdisplay\";i:1;s:4:\"logo\";s:48:\"http://wlw.my/addons/voice/icon.jpg?v=1516025669\";s:11:\"main_module\";b:0;s:11:\"plugin_list\";a:0:{}s:11:\"is_relation\";b:0;}');
INSERT INTO `ims_core_cache` VALUES ('we7:module_info:chats', 'a:25:{s:3:\"mid\";s:2:\"10\";s:4:\"name\";s:5:\"chats\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"发送客服消息\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:77:\"公众号可以在粉丝最后发送消息的48小时内无限制发送消息\";s:11:\"description\";s:0:\"\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:13:\"title_initial\";s:0:\"\";s:13:\"wxapp_support\";s:1:\"1\";s:11:\"app_support\";s:1:\"2\";s:9:\"isdisplay\";i:1;s:4:\"logo\";s:48:\"http://wlw.my/addons/chats/icon.jpg?v=1516025669\";s:11:\"main_module\";b:0;s:11:\"plugin_list\";a:0:{}s:11:\"is_relation\";b:0;}');
INSERT INTO `ims_core_cache` VALUES ('we7:module_info:wxcard', 'a:25:{s:3:\"mid\";s:2:\"11\";s:4:\"name\";s:6:\"wxcard\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"微信卡券回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"微信卡券回复\";s:11:\"description\";s:18:\"微信卡券回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:13:\"title_initial\";s:0:\"\";s:13:\"wxapp_support\";s:1:\"1\";s:11:\"app_support\";s:1:\"2\";s:9:\"isdisplay\";i:1;s:4:\"logo\";s:49:\"http://wlw.my/addons/wxcard/icon.jpg?v=1516025669\";s:11:\"main_module\";b:0;s:11:\"plugin_list\";a:0:{}s:11:\"is_relation\";b:0;}');
INSERT INTO `ims_core_cache` VALUES ('we7:module:all_uninstall', 'a:2:{s:6:\"expire\";i:1516061314;s:4:\"data\";a:4:{s:13:\"cloud_m_count\";N;s:7:\"modules\";a:2:{s:7:\"recycle\";a:0:{}s:11:\"uninstalled\";a:0:{}}s:9:\"app_count\";i:0;s:11:\"wxapp_count\";i:0;}}');
INSERT INTO `ims_core_cache` VALUES ('we7:all_cloud_upgrade_module:', 'a:2:{s:6:\"expire\";i:1516027487;s:4:\"data\";a:0:{}}');
INSERT INTO `ims_core_cache` VALUES ('we7:uni_group', 'a:1:{i:1;a:7:{s:2:\"id\";s:1:\"1\";s:9:\"owner_uid\";s:1:\"0\";s:4:\"name\";s:18:\"体验套餐服务\";s:7:\"modules\";s:2:\"N;\";s:9:\"templates\";s:2:\"N;\";s:7:\"uniacid\";s:1:\"0\";s:5:\"wxapp\";a:0:{}}}');
INSERT INTO `ims_core_cache` VALUES ('we7:unimodules::', 'a:12:{s:5:\"basic\";a:1:{s:4:\"name\";s:5:\"basic\";}s:4:\"news\";a:1:{s:4:\"name\";s:4:\"news\";}s:5:\"music\";a:1:{s:4:\"name\";s:5:\"music\";}s:7:\"userapi\";a:1:{s:4:\"name\";s:7:\"userapi\";}s:8:\"recharge\";a:1:{s:4:\"name\";s:8:\"recharge\";}s:6:\"custom\";a:1:{s:4:\"name\";s:6:\"custom\";}s:6:\"images\";a:1:{s:4:\"name\";s:6:\"images\";}s:5:\"video\";a:1:{s:4:\"name\";s:5:\"video\";}s:5:\"voice\";a:1:{s:4:\"name\";s:5:\"voice\";}s:5:\"chats\";a:1:{s:4:\"name\";s:5:\"chats\";}s:6:\"wxcard\";a:1:{s:4:\"name\";s:6:\"wxcard\";}s:6:\"fz_wlw\";a:1:{s:4:\"name\";s:6:\"fz_wlw\";}}');
INSERT INTO `ims_core_cache` VALUES ('we7:user_modules:1', 'a:12:{i:0;s:6:\"fz_wlw\";i:1;s:6:\"wxcard\";i:2;s:5:\"chats\";i:3;s:5:\"voice\";i:4;s:5:\"video\";i:5;s:6:\"images\";i:6;s:6:\"custom\";i:7;s:8:\"recharge\";i:8;s:7:\"userapi\";i:9;s:5:\"music\";i:10;s:4:\"news\";i:11;s:5:\"basic\";}');
INSERT INTO `ims_core_cache` VALUES ('unisetting:1', 'a:22:{s:7:\"uniacid\";s:1:\"1\";s:8:\"passport\";a:3:{s:8:\"focusreg\";i:0;s:4:\"item\";s:5:\"email\";s:4:\"type\";s:8:\"password\";}s:5:\"oauth\";a:2:{s:6:\"status\";s:1:\"0\";s:7:\"account\";s:1:\"0\";}s:11:\"jsauth_acid\";s:1:\"0\";s:2:\"uc\";a:1:{s:6:\"status\";i:0;}s:6:\"notify\";a:1:{s:3:\"sms\";a:2:{s:7:\"balance\";i:0;s:9:\"signature\";s:0:\"\";}}s:11:\"creditnames\";a:5:{s:7:\"credit1\";a:2:{s:5:\"title\";s:6:\"积分\";s:7:\"enabled\";i:1;}s:7:\"credit2\";a:2:{s:5:\"title\";s:6:\"余额\";s:7:\"enabled\";i:1;}s:7:\"credit3\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit4\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit5\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}}s:15:\"creditbehaviors\";a:2:{s:8:\"activity\";s:7:\"credit1\";s:8:\"currency\";s:7:\"credit2\";}s:7:\"welcome\";s:0:\"\";s:7:\"default\";s:0:\"\";s:15:\"default_message\";s:0:\"\";s:7:\"payment\";a:4:{s:6:\"credit\";a:1:{s:6:\"switch\";b:0;}s:6:\"alipay\";a:4:{s:6:\"switch\";b:0;s:7:\"account\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:6:\"secret\";s:0:\"\";}s:6:\"wechat\";a:5:{s:6:\"switch\";b:0;s:7:\"account\";b:0;s:7:\"signkey\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:3:\"key\";s:0:\"\";}s:8:\"delivery\";a:1:{s:6:\"switch\";b:0;}}s:4:\"stat\";s:0:\"\";s:12:\"default_site\";s:1:\"1\";s:4:\"sync\";s:1:\"0\";s:8:\"recharge\";s:0:\"\";s:9:\"tplnotice\";s:0:\"\";s:10:\"grouplevel\";s:1:\"0\";s:8:\"mcplugin\";s:0:\"\";s:15:\"exchange_enable\";s:1:\"0\";s:11:\"coupon_type\";s:1:\"0\";s:7:\"menuset\";s:0:\"\";}');
INSERT INTO `ims_core_cache` VALUES ('uniaccount:1', 'a:31:{s:4:\"acid\";s:1:\"1\";s:7:\"uniacid\";s:1:\"1\";s:5:\"token\";s:32:\"omJNpZEhZeHj1ZxFECKkP48B5VFbk1HP\";s:14:\"encodingaeskey\";s:0:\"\";s:5:\"level\";s:1:\"1\";s:4:\"name\";s:18:\"微信营销系统\";s:7:\"account\";s:0:\"\";s:8:\"original\";s:0:\"\";s:9:\"signature\";s:0:\"\";s:7:\"country\";s:0:\"\";s:8:\"province\";s:0:\"\";s:4:\"city\";s:0:\"\";s:8:\"username\";s:0:\"\";s:8:\"password\";s:0:\"\";s:10:\"lastupdate\";s:1:\"0\";s:3:\"key\";s:0:\"\";s:6:\"secret\";s:0:\"\";s:7:\"styleid\";s:1:\"1\";s:12:\"subscribeurl\";s:0:\"\";s:18:\"auth_refresh_token\";s:0:\"\";s:4:\"type\";s:1:\"1\";s:9:\"isconnect\";s:1:\"0\";s:9:\"isdeleted\";s:1:\"0\";s:3:\"uid\";N;s:9:\"starttime\";N;s:7:\"endtime\";N;s:6:\"groups\";a:1:{i:1;a:5:{s:7:\"groupid\";s:1:\"1\";s:7:\"uniacid\";s:1:\"1\";s:5:\"title\";s:15:\"默认会员组\";s:6:\"credit\";s:1:\"0\";s:9:\"isdefault\";s:1:\"1\";}}s:7:\"setting\";a:22:{s:7:\"uniacid\";s:1:\"1\";s:8:\"passport\";a:3:{s:8:\"focusreg\";i:0;s:4:\"item\";s:5:\"email\";s:4:\"type\";s:8:\"password\";}s:5:\"oauth\";a:2:{s:6:\"status\";s:1:\"0\";s:7:\"account\";s:1:\"0\";}s:11:\"jsauth_acid\";s:1:\"0\";s:2:\"uc\";a:1:{s:6:\"status\";i:0;}s:6:\"notify\";a:1:{s:3:\"sms\";a:2:{s:7:\"balance\";i:0;s:9:\"signature\";s:0:\"\";}}s:11:\"creditnames\";a:5:{s:7:\"credit1\";a:2:{s:5:\"title\";s:6:\"积分\";s:7:\"enabled\";i:1;}s:7:\"credit2\";a:2:{s:5:\"title\";s:6:\"余额\";s:7:\"enabled\";i:1;}s:7:\"credit3\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit4\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit5\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}}s:15:\"creditbehaviors\";a:2:{s:8:\"activity\";s:7:\"credit1\";s:8:\"currency\";s:7:\"credit2\";}s:7:\"welcome\";s:0:\"\";s:7:\"default\";s:0:\"\";s:15:\"default_message\";s:0:\"\";s:7:\"payment\";a:4:{s:6:\"credit\";a:1:{s:6:\"switch\";b:0;}s:6:\"alipay\";a:4:{s:6:\"switch\";b:0;s:7:\"account\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:6:\"secret\";s:0:\"\";}s:6:\"wechat\";a:5:{s:6:\"switch\";b:0;s:7:\"account\";b:0;s:7:\"signkey\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:3:\"key\";s:0:\"\";}s:8:\"delivery\";a:1:{s:6:\"switch\";b:0;}}s:4:\"stat\";s:0:\"\";s:12:\"default_site\";s:1:\"1\";s:4:\"sync\";s:1:\"0\";s:8:\"recharge\";s:0:\"\";s:9:\"tplnotice\";s:0:\"\";s:10:\"grouplevel\";s:1:\"0\";s:8:\"mcplugin\";s:0:\"\";s:15:\"exchange_enable\";s:1:\"0\";s:11:\"coupon_type\";s:1:\"0\";s:7:\"menuset\";s:0:\"\";}s:10:\"grouplevel\";s:1:\"0\";s:4:\"logo\";s:54:\"http://wlw.my/attachment/headimg_1.jpg?time=1516025863\";s:6:\"qrcode\";s:53:\"http://wlw.my/attachment/qrcode_1.jpg?time=1516025863\";}');
INSERT INTO `ims_core_cache` VALUES ('we7:lastaccount:kbxMr', 'a:1:{s:7:\"account\";i:1;}');
INSERT INTO `ims_core_cache` VALUES ('we7:unimodules:1:', 'a:12:{s:5:\"basic\";a:1:{s:4:\"name\";s:5:\"basic\";}s:4:\"news\";a:1:{s:4:\"name\";s:4:\"news\";}s:5:\"music\";a:1:{s:4:\"name\";s:5:\"music\";}s:7:\"userapi\";a:1:{s:4:\"name\";s:7:\"userapi\";}s:8:\"recharge\";a:1:{s:4:\"name\";s:8:\"recharge\";}s:6:\"custom\";a:1:{s:4:\"name\";s:6:\"custom\";}s:6:\"images\";a:1:{s:4:\"name\";s:6:\"images\";}s:5:\"video\";a:1:{s:4:\"name\";s:5:\"video\";}s:5:\"voice\";a:1:{s:4:\"name\";s:5:\"voice\";}s:5:\"chats\";a:1:{s:4:\"name\";s:5:\"chats\";}s:6:\"wxcard\";a:1:{s:4:\"name\";s:6:\"wxcard\";}s:6:\"fz_wlw\";a:1:{s:4:\"name\";s:6:\"fz_wlw\";}}');
INSERT INTO `ims_core_cache` VALUES ('stat:todaylock:1', 'a:1:{s:6:\"expire\";i:1516064889;}');
INSERT INTO `ims_core_cache` VALUES ('unicount:1', 's:1:\"1\";');
INSERT INTO `ims_core_cache` VALUES ('we7:unimodules:1:1', 'a:12:{s:5:\"basic\";a:1:{s:4:\"name\";s:5:\"basic\";}s:4:\"news\";a:1:{s:4:\"name\";s:4:\"news\";}s:5:\"music\";a:1:{s:4:\"name\";s:5:\"music\";}s:7:\"userapi\";a:1:{s:4:\"name\";s:7:\"userapi\";}s:8:\"recharge\";a:1:{s:4:\"name\";s:8:\"recharge\";}s:6:\"custom\";a:1:{s:4:\"name\";s:6:\"custom\";}s:6:\"images\";a:1:{s:4:\"name\";s:6:\"images\";}s:5:\"video\";a:1:{s:4:\"name\";s:5:\"video\";}s:5:\"voice\";a:1:{s:4:\"name\";s:5:\"voice\";}s:5:\"chats\";a:1:{s:4:\"name\";s:5:\"chats\";}s:6:\"wxcard\";a:1:{s:4:\"name\";s:6:\"wxcard\";}s:6:\"fz_wlw\";a:1:{s:4:\"name\";s:6:\"fz_wlw\";}}');

-- ----------------------------
-- Table structure for ims_core_cron
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_cron`;
CREATE TABLE `ims_core_cron` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cloudid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `lastruntime` int(10) unsigned NOT NULL,
  `nextruntime` int(10) unsigned NOT NULL,
  `weekday` tinyint(3) NOT NULL,
  `day` tinyint(3) NOT NULL,
  `hour` tinyint(3) NOT NULL,
  `minute` varchar(255) NOT NULL,
  `extra` varchar(5000) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `createtime` (`createtime`),
  KEY `nextruntime` (`nextruntime`),
  KEY `uniacid` (`uniacid`),
  KEY `cloudid` (`cloudid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_cron
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_cron_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_cron_record`;
CREATE TABLE `ims_core_cron_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `note` varchar(500) NOT NULL,
  `tag` varchar(5000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `tid` (`tid`),
  KEY `module` (`module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_cron_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_menu
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_menu`;
CREATE TABLE `ims_core_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `append_title` varchar(30) NOT NULL,
  `append_url` varchar(255) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_system` tinyint(3) unsigned NOT NULL,
  `permission_name` varchar(50) NOT NULL,
  `group_name` varchar(30) NOT NULL,
  `icon` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_menu
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_paylog
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_paylog`;
CREATE TABLE `ims_core_paylog` (
  `plid` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `acid` int(10) NOT NULL,
  `openid` varchar(40) NOT NULL,
  `uniontid` varchar(64) NOT NULL,
  `tid` varchar(128) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `module` varchar(50) NOT NULL,
  `tag` varchar(2000) NOT NULL,
  `is_usecard` tinyint(3) unsigned NOT NULL,
  `card_type` tinyint(3) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `card_fee` decimal(10,2) unsigned NOT NULL,
  `encrypt_code` varchar(100) NOT NULL,
  PRIMARY KEY (`plid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_tid` (`tid`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `uniontid` (`uniontid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_paylog
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_performance
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_performance`;
CREATE TABLE `ims_core_performance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `runtime` varchar(10) NOT NULL,
  `runurl` varchar(512) NOT NULL,
  `runsql` varchar(512) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_performance
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_queue
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_queue`;
CREATE TABLE `ims_core_queue` (
  `qid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `message` varchar(2000) NOT NULL,
  `params` varchar(1000) NOT NULL,
  `keyword` varchar(1000) NOT NULL,
  `response` varchar(2000) NOT NULL,
  `module` varchar(50) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`qid`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `module` (`module`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_queue
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_refundlog
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_refundlog`;
CREATE TABLE `ims_core_refundlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `refund_uniontid` varchar(64) NOT NULL,
  `reason` varchar(80) NOT NULL,
  `uniontid` varchar(64) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `refund_uniontid` (`refund_uniontid`),
  KEY `uniontid` (`uniontid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_refundlog
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_resource
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_resource`;
CREATE TABLE `ims_core_resource` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `media_id` varchar(100) NOT NULL,
  `trunk` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `acid` (`uniacid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_resource
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_sendsms_log
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_sendsms_log`;
CREATE TABLE `ims_core_sendsms_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `createtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_sendsms_log
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_settings
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_settings`;
CREATE TABLE `ims_core_settings` (
  `key` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_settings
-- ----------------------------
INSERT INTO `ims_core_settings` VALUES ('copyright', 'a:1:{s:6:\"slides\";a:3:{i:0;s:58:\"https://img.alicdn.com/tps/TB1pfG4IFXXXXc6XXXXXXXXXXXX.jpg\";i:1;s:58:\"https://img.alicdn.com/tps/TB1sXGYIFXXXXc5XpXXXXXXXXXX.jpg\";i:2;s:58:\"https://img.alicdn.com/tps/TB1h9xxIFXXXXbKXXXXXXXXXXXX.jpg\";}}');
INSERT INTO `ims_core_settings` VALUES ('authmode', 'i:1;');
INSERT INTO `ims_core_settings` VALUES ('close', 'a:2:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";}');
INSERT INTO `ims_core_settings` VALUES ('register', 'a:4:{s:4:\"open\";i:1;s:6:\"verify\";i:0;s:4:\"code\";i:1;s:7:\"groupid\";i:1;}');
INSERT INTO `ims_core_settings` VALUES ('module_receive_ban', 'a:0:{}');
INSERT INTO `ims_core_settings` VALUES ('platform', 'a:5:{s:5:\"token\";s:32:\"ii4o4yFo8d4cIiXkMHCKB8Do8MkmacXy\";s:14:\"encodingaeskey\";s:43:\"bjih3393kIki2k32Bk4f92Kd9bi7hbx9h9H2IhXKbk2\";s:9:\"appsecret\";s:0:\"\";s:5:\"appid\";s:0:\"\";s:9:\"authstate\";i:1;}');

-- ----------------------------
-- Table structure for ims_coupon_location
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon_location`;
CREATE TABLE `ims_coupon_location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `province` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `photo_list` varchar(10000) NOT NULL,
  `avg_price` int(10) unsigned NOT NULL,
  `open_time` varchar(50) NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `offset_type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon_location
-- ----------------------------

-- ----------------------------
-- Table structure for ims_cover_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_cover_reply`;
CREATE TABLE `ims_cover_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  `do` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_cover_reply
-- ----------------------------
INSERT INTO `ims_cover_reply` VALUES ('1', '1', '0', '7', 'mc', '', '进入个人中心', '', '', './index.php?c=mc&a=home&i=1');
INSERT INTO `ims_cover_reply` VALUES ('2', '1', '1', '8', 'site', '', '进入首页', '', '', './index.php?c=home&i=1&t=1');

-- ----------------------------
-- Table structure for ims_custom_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_custom_reply`;
CREATE TABLE `ims_custom_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `start1` int(10) NOT NULL,
  `end1` int(10) NOT NULL,
  `start2` int(10) NOT NULL,
  `end2` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_custom_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_fz_devuse
-- ----------------------------
DROP TABLE IF EXISTS `ims_fz_devuse`;
CREATE TABLE `ims_fz_devuse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `devnum` varchar(255) DEFAULT NULL,
  `isuse` int(11) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `rssi` varchar(255) DEFAULT NULL,
  `gpsAddr` varchar(255) DEFAULT NULL,
  `isGps` varchar(255) DEFAULT NULL,
  `voltage` varchar(255) DEFAULT NULL,
  `simNo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_fz_devuse
-- ----------------------------
INSERT INTO `ims_fz_devuse` VALUES ('19', '862991528813725', '2', '2017-07-07 13:02:58', '0', '0', '21', '0', '1', '4143', '898602B6111770033852');
INSERT INTO `ims_fz_devuse` VALUES ('20', '862991528813642', '2', '2017-07-07 14:46:39', '0', '0', '14', '0', '1', '4128', '898602B7091701052976');
INSERT INTO `ims_fz_devuse` VALUES ('21', '862991528813634', '2', '2017-07-09 14:16:35', '0', '0', '14', '0', '1', '4062', '898607B2091700080010');
INSERT INTO `ims_fz_devuse` VALUES ('22', '862991528813709', '2', '2017-07-09 14:24:34', '0', '0', '15', '0', '1', '4110', '898607B2091700080011');
INSERT INTO `ims_fz_devuse` VALUES ('23', '862991528813717', '2', '2017-07-09 14:51:35', '0', '0', '10', '0', '1', '4143', '898607B2091700080012');
INSERT INTO `ims_fz_devuse` VALUES ('24', '862991528813758', '2', '2017-07-09 15:19:45', '0', '0', '6', '0', '1', '4125', '898607B2091700080013');

-- ----------------------------
-- Table structure for ims_fz_dev_info
-- ----------------------------
DROP TABLE IF EXISTS `ims_fz_dev_info`;
CREATE TABLE `ims_fz_dev_info` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `devname` varchar(255) DEFAULT NULL,
  `devNum` varchar(255) DEFAULT NULL,
  `devregcode` varchar(255) DEFAULT NULL,
  `unuser` varchar(100) DEFAULT NULL,
  `devtype` varchar(255) DEFAULT NULL,
  `cycle` varchar(255) DEFAULT NULL,
  `interval` varchar(255) DEFAULT NULL,
  `heartbeat` varchar(255) DEFAULT NULL,
  `giftnum` int(11) DEFAULT NULL,
  `devlogo` varchar(350) DEFAULT NULL,
  `telnum` varchar(255) DEFAULT NULL,
  `bustime` varchar(255) DEFAULT NULL,
  `feature` text,
  `live` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `busemail` varchar(255) DEFAULT NULL,
  `emailonoff` int(2) DEFAULT NULL,
  `dsort` int(2) DEFAULT NULL,
  `dstate` int(2) DEFAULT NULL,
  `addtime` int(10) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `online` int(5) DEFAULT '0',
  `bkType` varchar(100) DEFAULT NULL,
  `zType` varchar(100) DEFAULT NULL,
  `sortV` varchar(100) DEFAULT NULL,
  `bkTime` int(11) DEFAULT NULL,
  `zLast1` varchar(100) DEFAULT NULL,
  `zLast2` varchar(100) DEFAULT NULL,
  `devport` varchar(50) DEFAULT NULL,
  `devip` varchar(100) DEFAULT NULL,
  `simNo` varchar(255) DEFAULT NULL,
  `rssi` varchar(255) DEFAULT NULL,
  `voltage` varchar(255) DEFAULT NULL,
  `isGps` varchar(255) DEFAULT NULL,
  `gpsAddr` varchar(255) DEFAULT NULL,
  `maxBuy` int(11) DEFAULT NULL,
  `startwork` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=15010 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_fz_dev_info
-- ----------------------------
INSERT INTO `ims_fz_dev_info` VALUES ('15002', '1', '1', 'long', '测试设备1', '862991528813725', '', '', '1', '40', '40', '8000', '-1', 'images/13/2017/07/Iz3mzgTq9qjq8bqr8gg5Q94bf8eh6E.jpg', '18523833648', '00:00-24:00', '&lt;p&gt;欢迎咨询本设备，移动支付模块&lt;/p&gt;', 'images/13/2017/07/QMjyZoZgq3tO7AEokQ6tToQZQ1yklY.jpg', '江苏省', '苏州市', '昆山市', '昆山微商通网络科技有限公司', '120.808566', '31.398718', '', '0', '1', '1', '1499439650', null, '0', null, null, '100', '1516028036', null, null, '33961', '223.104.254.26', '898602B6111770033852', '23', '4131', null, '', null, '1499586461');
INSERT INTO `ims_fz_dev_info` VALUES ('15003', '1', '1', 'long', '自助洗车', '862991528813642', '123', '', '1', '40', '40', '3000', '-1', 'images/13/2017/07/Vj3R6ZNGS11mRMgtTt1SM63wL0WmN6.jpg', '13285152960', '00:00-24:00', '&lt;p&gt;24小时自助洗车服务&lt;/p&gt;', 'images/13/2017/07/s83w7py7y0we8C7Wl833Le29261XP6.jpg;images/13/2017/07/KitiTiJIHik7Jz9a6MIzem0U2jU0d6.jpg', '江苏省', '苏州市', '昆山市', '青秀路118号', '120.954882', '31.419675', '', '0', '0', '1', '1499416680', null, '0', null, null, '100', '1516028036', null, null, '33213', '223.104.255.215', '898602B7091701052976', '22', '4134', null, '', null, '1499412417');
INSERT INTO `ims_fz_dev_info` VALUES ('15005', '1', '1', 'long', '自助洗车', '862991528813634', '122', '', '1', '40', '100', '80', '-1', '../app/resource/sui/img/bann5.jpg', '', '00:00-24:00', '', '../app/resource/sui/img/bann5.jpg', '', '', '', '', '', '', '', '0', '0', '1', '1499581119', null, '0', null, null, '100', '1516028036', null, null, '47922', '223.104.255.98', '898607B2091700080010', '10', '4068', null, '', null, null);
INSERT INTO `ims_fz_dev_info` VALUES ('15006', '1', '1', 'admin', '自助洗车', '862991528813709', '123', '', '1', '40', '40', '3000', '-1', 'images/13/2017/07/Vj3R6ZNGS11mRMgtTt1SM63wL0WmN6.jpg', '13285152960', '00:00-24:00', '&lt;p&gt;24小时自助洗车服务&lt;/p&gt;', 'images/13/2017/07/s83w7py7y0we8C7Wl833Le29261XP6.jpg;images/13/2017/07/KitiTiJIHik7Jz9a6MIzem0U2jU0d6.jpg', '江苏省', '苏州市', '昆山市', '青秀路118号', '120.954882', '31.419675', '', '0', '0', '1', '1499582560', '', '0', '', '', '100', '1516028036', '', '', '33213', '', '898602B7091701052976', '22', '4134', '', '', '0', '1499412417');
INSERT INTO `ims_fz_dev_info` VALUES ('15007', '1', '1', 'admin', '自助洗车', '862991528813717', '123', '', '1', '40', '40', '300', '-1', 'images/13/2017/07/Vj3R6ZNGS11mRMgtTt1SM63wL0WmN6.jpg', '13285152960', '00:00-24:00', '&lt;p&gt;24小时自助洗车服务&lt;/p&gt;', 'images/13/2017/07/s83w7py7y0we8C7Wl833Le29261XP6.jpg;images/13/2017/07/KitiTiJIHik7Jz9a6MIzem0U2jU0d6.jpg', '江苏省', '苏州市', '昆山市', '青秀路118号', '120.954882', '31.419675', '', '0', '0', '1', '1499583128', '', '0', '', '', '100', '1516028036', '', '', '16885', '223.104.254.91', '898607B2091700080012', '23', '4143', '', '', '0', '1499584215');
INSERT INTO `ims_fz_dev_info` VALUES ('15008', '1', '1', 'admin', '测试设备1', '862991528813758', '', '', '1', '40', '40', '3', '-1', 'images/13/2017/07/Iz3mzgTq9qjq8bqr8gg5Q94bf8eh6E.jpg', '18523833648', '00:00-24:00', '&lt;p&gt;欢迎咨询本设备，移动支付模块&lt;/p&gt;', 'images/13/2017/07/QMjyZoZgq3tO7AEokQ6tToQZQ1yklY.jpg', '江苏省', '苏州市', '昆山市', '昆山微商通网络科技有限公司', '120.808566', '31.398718', '', '0', '1', '1', '1499584891', '', '0', '', '', '100', '1516028036', '', '', '64446', '223.104.255.9', '898607B2091700080013', '24', '4158', '', '', '0', '1499589577');
INSERT INTO `ims_fz_dev_info` VALUES ('15009', '1', '1', 'long', '测试测试', '353453245', '3453245435', '', '1', '40', '40', '80', '-1', '../app/resource/sui/img/bann5.jpg', '', '00:00-24:00', '', '../app/resource/sui/img/bann5.jpg', '河北省', '唐山市', '开平区', '阿斯顿发斯蒂芬', '116.403851', '39.915177', '', '0', '0', '1', '1516027500', null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for ims_fz_order
-- ----------------------------
DROP TABLE IF EXISTS `ims_fz_order`;
CREATE TABLE `ims_fz_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `buyuser` varchar(255) DEFAULT NULL,
  `buyopenid` varchar(255) DEFAULT NULL,
  `paynum` int(11) DEFAULT NULL,
  `paymoney` double(10,2) DEFAULT NULL,
  `paymode` int(11) DEFAULT NULL,
  `paystate` int(11) DEFAULT NULL,
  `paysend` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `paytime` int(11) DEFAULT NULL,
  `payordernum` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `devNum` varchar(250) DEFAULT NULL,
  `devname` varchar(255) DEFAULT NULL,
  `txstate` int(11) DEFAULT NULL,
  `txtime` int(11) DEFAULT NULL,
  `txremark` varchar(255) DEFAULT NULL,
  `packname` varchar(255) DEFAULT NULL,
  `packageid` int(11) DEFAULT NULL,
  `isyuyue` int(11) DEFAULT NULL,
  `ystarttime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10098 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_fz_order
-- ----------------------------
INSERT INTO `ims_fz_order` VALUES ('10075', '13', '智能微商通', '1567', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '1', '0.01', '1', '1', '2', '1499404510', '1499404521', '10075', null, '15002', '测试设备1-测试套餐', '0', null, null, '测试套餐', '39', null, null);
INSERT INTO `ims_fz_order` VALUES ('10076', '13', '智能微商通', '1567', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '1', '0.01', '1', '1', '2', '1499405005', '1499405016', '10076', null, '15002', '测试设备1-测试套餐', '0', null, null, '测试套餐', '39', null, null);
INSERT INTO `ims_fz_order` VALUES ('10077', '13', '智能微商通', '1567', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '1', '0.01', '1', '1', '2', '1499405327', '1499405334', '10077', null, '15002', '测试设备1-测试套餐', '0', null, null, '测试套餐', '39', null, null);
INSERT INTO `ims_fz_order` VALUES ('10078', '13', '智能微商通', '1569', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '1', '1.00', '0', '0', '0', '1499411612', null, null, null, '15003', '自助洗车-1元洗车', '0', null, null, '1元洗车', '40', null, null);
INSERT INTO `ims_fz_order` VALUES ('10079', '13', '智能微商通', '1569', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '1', '1.00', '1', '1', '2', '1499411687', '1499411696', '10079', null, '15003', '自助洗车-1元洗车', '0', null, null, '1元洗车', '40', null, null);
INSERT INTO `ims_fz_order` VALUES ('10080', '13', '智能微商通', '1569', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '4', '5.00', '1', '1', '2', '1499412218', '1499412230', '10080', null, '15003', '自助洗车-5元洗车', '0', null, null, '5元洗车', '41', null, null);
INSERT INTO `ims_fz_order` VALUES ('10081', '13', '智能微商通', '1569', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '4', '5.00', '1', '1', '2', '1499412409', '1499412416', '10081', null, '15003', '自助洗车-5元洗车', '0', null, null, '5元洗车', '41', null, null);
INSERT INTO `ims_fz_order` VALUES ('10082', '13', '测试代理用户1', '1568', 'os-pEt1OsU04JVX5FjMhHlvjWUKI', '1', '1.00', '0', '0', '0', '1499434902', null, null, null, '15003', '自助洗车-1元洗车', '0', null, null, '1元洗车', '40', null, null);
INSERT INTO `ims_fz_order` VALUES ('10083', '13', '测试代理用户1', '1568', 'os-pEt1OsU04JVX5FjMhHlvjWUKI', '1', '1.00', '0', '0', '0', '1499434911', null, null, null, '15003', '自助洗车-1元洗车', '0', null, null, '1元洗车', '40', null, null);
INSERT INTO `ims_fz_order` VALUES ('10084', '13', '智能微商通', '1567', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '1', '0.01', '0', '0', '0', '1499582243', null, null, null, '15002', '测试设备1-测试套餐', '0', null, null, '测试套餐', '39', null, null);
INSERT INTO `ims_fz_order` VALUES ('10085', '13', '智能微商通', '1567', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '1', '0.01', '0', '0', '0', '1499582281', null, null, null, '15002', '测试设备1-测试套餐', '0', null, null, '测试套餐', '39', null, null);
INSERT INTO `ims_fz_order` VALUES ('10086', '13', '智能微商通', '1567', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '1', '0.01', '0', '0', '0', '1499582287', null, null, null, '15002', '测试设备1-测试套餐', '0', null, null, '测试套餐', '39', null, null);
INSERT INTO `ims_fz_order` VALUES ('10087', '13', '测试代理用户1', '1569', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '4', '5.00', '0', '0', '0', '1499583599', null, null, null, '15007', '自助洗车-5元洗车', '0', null, null, '5元洗车', '52', null, null);
INSERT INTO `ims_fz_order` VALUES ('10088', '13', '测试代理用户1', '1569', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '4', '5.00', '1', '1', '2', '1499583621', '1499583629', '10088', null, '15007', '自助洗车-5元洗车', '0', null, null, '5元洗车', '52', null, null);
INSERT INTO `ims_fz_order` VALUES ('10089', '13', '测试代理用户1', '1569', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '1', '1.00', '1', '1', '2', '1499584205', '1499584210', '10089', null, '15007', '自助洗车-1元洗车', '0', null, null, '1元洗车', '51', null, null);
INSERT INTO `ims_fz_order` VALUES ('10090', '13', '智能微商通', '1567', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '1', '0.01', '0', '0', '0', '1499584490', null, null, null, '15002', '测试设备1-测试套餐', '0', null, null, '测试套餐', '39', null, null);
INSERT INTO `ims_fz_order` VALUES ('10091', '13', '智能微商通', '1567', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '1', '0.01', '0', '0', '0', '1499584808', null, null, null, '15002', '测试设备1-测试套餐', '0', null, null, '测试套餐', '39', null, null);
INSERT INTO `ims_fz_order` VALUES ('10092', '13', '智能微商通', '1567', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '1', '0.01', '0', '0', '0', '1499584881', null, null, null, '15002', '测试设备1-测试套餐', '0', null, null, '测试套餐', '39', null, null);
INSERT INTO `ims_fz_order` VALUES ('10093', '13', '智能微商通', '1567', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '1', '0.01', '1', '1', '2', '1499586454', '1499586457', '', null, '15002', '测试设备1-测试套餐', '0', null, null, '测试套餐', '39', null, null);
INSERT INTO `ims_fz_order` VALUES ('10094', '13', '智能微商通', '1569', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '1', '0.01', '1', '1', '2', '1499586872', '1499586877', '', null, '15008', '测试设备1-测试套餐', '0', null, null, '测试套餐', '55', null, null);
INSERT INTO `ims_fz_order` VALUES ('10095', '13', '智能微商通', '1569', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '1', '0.01', '1', '1', '2', '1499589498', '1499589501', '', null, '15008', '测试设备1-测试套餐', '0', null, null, '测试套餐', '55', null, null);
INSERT INTO `ims_fz_order` VALUES ('10096', '13', '智能微商通', '1569', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '1', '0.01', '1', '1', '2', '1499589526', '1499589535', '', null, '15008', '测试设备1-测试套餐', '0', null, null, '测试套餐', '55', null, null);
INSERT INTO `ims_fz_order` VALUES ('10097', '13', '智能微商通', '1569', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '1', '0.01', '1', '1', '2', '1499589553', '1499589576', '10097', null, '15008', '测试设备1-测试套餐', '0', null, null, '测试套餐', '55', null, null);

-- ----------------------------
-- Table structure for ims_fz_package
-- ----------------------------
DROP TABLE IF EXISTS `ims_fz_package`;
CREATE TABLE `ims_fz_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `typeid` int(11) DEFAULT NULL,
  `tcname` varchar(255) DEFAULT NULL,
  `tcprice` double(10,2) DEFAULT NULL,
  `signnum` int(11) DEFAULT NULL,
  `stocks` int(11) DEFAULT NULL,
  `sellnum` int(11) DEFAULT NULL,
  `quota` int(11) DEFAULT '-1',
  `issend` int(11) DEFAULT NULL,
  `packimg` varchar(255) DEFAULT NULL,
  `psort` int(11) DEFAULT NULL,
  `packdes` varchar(2000) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `devid` int(11) DEFAULT NULL,
  `countdown` int(11) DEFAULT NULL,
  `isyuyue` int(9) DEFAULT NULL,
  `prewarning_value` int(11) DEFAULT '0' COMMENT '预警值',
  `isadvpay` tinyint(4) DEFAULT '0',
  `isgz` tinyint(4) DEFAULT NULL,
  `advImg` varchar(255) DEFAULT NULL,
  `advUrl` varchar(255) DEFAULT NULL,
  `ptype` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_fz_package
-- ----------------------------
INSERT INTO `ims_fz_package` VALUES ('39', '1', 'admin', null, '测试套餐', '0.01', '1', '-1', '3', '-1', '1', 'images/13/2017/07/Iz3mzgTq9qjq8bqr8gg5Q94bf8eh6E.jpg', '-1', '', '1499441082', null, '15002', '10', '1', '10', '0', '0', '', '', '1');
INSERT INTO `ims_fz_package` VALUES ('40', '13', 'admin', null, '1元洗车', '1.00', '1', '-1', '0', '-1', '1', 'images/13/2017/07/U4uvo8u242Yzlic2827IOZwCLF7w7o.jpg', '-1', '', '1499411512', null, '15003', '0', '1', '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('41', '13', 'admin', null, '5元洗车11', '5.00', '4', '-1', '1', '-1', '1', 'images/13/2017/07/v5PGbF6G6WpG5Fpb68SMK6kpggkbmG.jpg', '-1', '', '1499412161', null, '15003', '0', '2', '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('42', '13', '', null, '10元洗车', '10.00', '10', '21', '0', '-1', '1', 'images/13/2017/07/r4Ry5ZpLbaPyxBCCYtWy5PLyr4Pw4Y.jpg', '0', '', '1499416873', null, '15003', null, null, '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('44', '13', '', null, '3元', '3.00', '3', '4', '0', '-1', '1', 'images/13/2017/07/F9gUEG4q0bHBogB2E4tTQUNTY9Z63E.jpg', '0', '', '1499417096', null, '15003', null, null, '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('47', '13', 'admin', '0', '1元洗车', '1.00', '1', '-1', '0', '-1', '1', 'images/13/2017/07/U4uvo8u242Yzlic2827IOZwCLF7w7o.jpg', '-1', '', '1499582560', '', '15006', '0', '1', '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('48', '13', 'admin', '0', '5元洗车', '5.00', '4', '-1', '1', '-1', '1', 'images/13/2017/07/v5PGbF6G6WpG5Fpb68SMK6kpggkbmG.jpg', '-1', '', '1499582560', '', '15006', '0', '2', '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('49', '13', '', '0', '10元洗车', '10.00', '10', '21', '0', '-1', '1', 'images/13/2017/07/r4Ry5ZpLbaPyxBCCYtWy5PLyr4Pw4Y.jpg', '0', '', '1499582560', '', '15006', '0', '0', '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('50', '13', '', '0', '3元', '3.00', '3', '4', '0', '-1', '1', 'images/13/2017/07/F9gUEG4q0bHBogB2E4tTQUNTY9Z63E.jpg', '0', '', '1499582560', '', '15006', '0', '0', '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('51', '13', 'admin', '0', '1元洗车', '1.00', '1', '-1', '1', '-1', '1', 'images/13/2017/07/U4uvo8u242Yzlic2827IOZwCLF7w7o.jpg', '-1', '', '1499583128', '', '15007', '0', '1', '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('52', '13', 'admin', '0', '5元洗车', '5.00', '4', '-1', '2', '-1', '1', 'images/13/2017/07/v5PGbF6G6WpG5Fpb68SMK6kpggkbmG.jpg', '-1', '', '1499583128', '', '15007', '0', '2', '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('53', '13', '', '0', '10元洗车', '10.00', '10', '21', '0', '-1', '1', 'images/13/2017/07/r4Ry5ZpLbaPyxBCCYtWy5PLyr4Pw4Y.jpg', '0', '', '1499583128', '', '15007', '0', '0', '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('54', '13', '', '0', '3元', '3.00', '3', '4', '0', '-1', '1', 'images/13/2017/07/F9gUEG4q0bHBogB2E4tTQUNTY9Z63E.jpg', '0', '', '1499583128', '', '15007', '0', '0', '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('55', '13', '智能微商通', '0', '测试套餐', '0.01', '1', '-1', '6', '-1', '1', 'images/13/2017/07/Iz3mzgTq9qjq8bqr8gg5Q94bf8eh6E.jpg', '-1', '', '1499584891', '', '15008', '10', '1', '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('57', '1', 'admin', null, null, null, null, null, null, '-1', null, null, null, null, '1516030897', null, '15003', null, null, '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('58', '1', 'admin', null, '啥地方萨芬', '0.00', '1', '-1', '-1', '-1', '1', '', null, null, '1516030931', null, '15003', null, null, '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('59', '1', 'admin', null, '啥地方萨芬', '0.00', '1', '-1', '-1', '-1', '1', '../app/resource/sui/img/head_default.png', '-1', '大师傅', '1516030954', null, '15003', '0', '1', '0', null, null, null, null, null);
INSERT INTO `ims_fz_package` VALUES ('60', '1', 'admin', null, '啥地方萨芬', '0.00', '1', '-1', '-1', '-1', '1', '../app/resource/sui/img/head_default.png', '-1', '大师傅', '1516031217', null, '15003', '0', '1', '0', '0', '0', '', '', '1');

-- ----------------------------
-- Table structure for ims_fz_packtype
-- ----------------------------
DROP TABLE IF EXISTS `ims_fz_packtype`;
CREATE TABLE `ims_fz_packtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `typename` varchar(255) DEFAULT NULL,
  `typesort` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `devid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_fz_packtype
-- ----------------------------

-- ----------------------------
-- Table structure for ims_fz_recard
-- ----------------------------
DROP TABLE IF EXISTS `ims_fz_recard`;
CREATE TABLE `ims_fz_recard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `typename` varchar(255) DEFAULT NULL,
  `typesort` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `devid` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,3) DEFAULT NULL,
  `ison` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20002 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_fz_recard
-- ----------------------------

-- ----------------------------
-- Table structure for ims_fz_tx
-- ----------------------------
DROP TABLE IF EXISTS `ims_fz_tx`;
CREATE TABLE `ims_fz_tx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `txopenid` varchar(255) DEFAULT NULL,
  `txAmount` double(12,2) DEFAULT NULL,
  `txmode` int(11) DEFAULT NULL,
  `txstate` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `txremark` varchar(255) DEFAULT NULL,
  `tradno` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `txfree` double(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20027 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_fz_tx
-- ----------------------------
INSERT INTO `ims_fz_tx` VALUES ('20016', '0', '智能微商通', '1569', '10.00', '1', '1', '1499417696', '', '1000018301201707078460559454', '提现成功', '0.00');
INSERT INTO `ims_fz_tx` VALUES ('20017', '0', '智能微商通', '1568', '1.03', '1', '2', '1499435189', '测试到帐情况', null, 'FATAL_ERROR更换了openid，但商户单号未更新', '0.00');
INSERT INTO `ims_fz_tx` VALUES ('20018', '13', '测试代理用户1', '1569', '5.00', '1', '2', '1499587921', '', null, 'FATAL_ERROR更换了openid，但商户单号未更新', '0.00');
INSERT INTO `ims_fz_tx` VALUES ('20019', '13', '智能微商通', '1567', '1.50', '1', '2', '1499590138', '', null, 'FATAL_ERROR更换了金额，但商户单号未更新', '0.00');
INSERT INTO `ims_fz_tx` VALUES ('20020', '13', '智能微商通', '1567', '1.20', '1', '2', '1499591443', '', null, 'PARAM_ERROR参数错误:单号必须为33位以下的数字或字母', '0.00');
INSERT INTO `ims_fz_tx` VALUES ('20021', '13', '智能微商通', '1567', '1.20', '1', '1', '1499591494', '', '1000018301201707098486991371', '提现成功', '0.00');
INSERT INTO `ims_fz_tx` VALUES ('20022', '13', '智能微商通', '1567', '1.05', '1', '1', '1499591579', '', '1000018301201707098486909570', '提现成功', '0.00');
INSERT INTO `ims_fz_tx` VALUES ('20023', '13', '测试代理用户1', '1569', '1.10', '1', '1', '1499593722', '', '1000018301201707098487488282', '提现成功', '0.00');
INSERT INTO `ims_fz_tx` VALUES ('20024', '13', '智能微商通', '1567', '1.10', '1', '1', '1499594214', '', '1000018301201707098487510541', '提现成功', '0.00');
INSERT INTO `ims_fz_tx` VALUES ('20025', '13', '智能微商通', '1569', '1.10', '1', '1', '1499596072', '', '1000018301201707098488067093', '提现成功', '0.00');
INSERT INTO `ims_fz_tx` VALUES ('20026', '13', '测试代理用户1', '1569', '1.10', '1', '1', '1499599907', '', '1000018301201707098488843348', '提现成功', '0.00');

-- ----------------------------
-- Table structure for ims_fz_ye_detail
-- ----------------------------
DROP TABLE IF EXISTS `ims_fz_ye_detail`;
CREATE TABLE `ims_fz_ye_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `chanceMoney` decimal(10,2) DEFAULT NULL,
  `chanceMode` int(11) DEFAULT NULL,
  `chanceTime` datetime DEFAULT NULL,
  `chanceType` int(11) DEFAULT NULL,
  `chanceReason` varchar(255) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `acceptedAccount` varchar(255) DEFAULT NULL,
  `acceptedUsername` varchar(255) DEFAULT NULL,
  `isSettlement` int(11) DEFAULT NULL,
  `serialNumber` varchar(255) DEFAULT NULL,
  `fee` decimal(10,2) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `devNum` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=390 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_fz_ye_detail
-- ----------------------------
INSERT INTO `ims_fz_ye_detail` VALUES ('366', '13', '智能微商通', '0.01', '2', '2017-07-07 13:21:15', '1', '测试设备1-测试套餐', '0.00', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '', '1', '10075', '0.00', '销售收入', '15002');
INSERT INTO `ims_fz_ye_detail` VALUES ('367', '13', '智能微商通', '0.01', '2', '2017-07-07 13:23:39', '1', '测试设备1-测试套餐', '0.00', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '', '1', '10076', '0.00', '销售收入', '15002');
INSERT INTO `ims_fz_ye_detail` VALUES ('368', '13', '智能微商通', '0.01', '2', '2017-07-07 13:28:57', '1', '测试设备1-测试套餐', '0.00', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '', '1', '10077', '0.00', '销售收入', '15002');
INSERT INTO `ims_fz_ye_detail` VALUES ('369', '13', '智能微商通', '1.00', '2', '2017-07-07 15:14:57', '1', '自助洗车-1元洗车', '0.00', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '', '1', '10079', '0.00', '销售收入', '15003');
INSERT INTO `ims_fz_ye_detail` VALUES ('370', '13', '智能微商通', '5.00', '2', '2017-07-07 15:23:55', '1', '自助洗车-5元洗车', '0.00', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '', '1', '10080', '0.00', '销售收入', '15003');
INSERT INTO `ims_fz_ye_detail` VALUES ('371', '13', '智能微商通', '5.00', '2', '2017-07-07 15:26:57', '1', '自助洗车-5元洗车', '0.00', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '', '1', '10081', '0.00', '销售收入', '15003');
INSERT INTO `ims_fz_ye_detail` VALUES ('372', '13', '智能微商通', '10.00', '3', '2017-07-07 16:54:57', '2', '手续费:0.06元', '9.94', '', '', '1', '20016', '0.00', null, null);
INSERT INTO `ims_fz_ye_detail` VALUES ('373', '13', '智能微商通', '0.50', '1', '2017-07-09 15:03:52', '1', '销售奖金', '0.00', '62', '测试代理用户1', '1', '10088', '0.00', '一级奖金', '15007');
INSERT INTO `ims_fz_ye_detail` VALUES ('374', '13', '测试代理用户1', '4.50', '2', '2017-07-09 15:03:52', '1', '自助洗车-5元洗车', '0.00', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '', '1', '10088', '0.00', '销售收入', '15007');
INSERT INTO `ims_fz_ye_detail` VALUES ('375', '13', '测试代理用户1', '0.50', '2', '2017-07-09 15:03:52', '2', '提成扣去', '0.00', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '', '1', '10088', '0.00', '分销支出', '15007');
INSERT INTO `ims_fz_ye_detail` VALUES ('376', '13', '智能微商通', '0.10', '1', '2017-07-09 15:10:15', '1', '销售奖金', '0.00', '62', '测试代理用户1', '1', '10089', '0.00', '一级奖金', '15007');
INSERT INTO `ims_fz_ye_detail` VALUES ('377', '13', '测试代理用户1', '0.90', '2', '2017-07-09 15:10:15', '1', '自助洗车-1元洗车', '0.00', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '', '1', '10089', '0.00', '销售收入', '15007');
INSERT INTO `ims_fz_ye_detail` VALUES ('378', '13', '测试代理用户1', '0.10', '2', '2017-07-09 15:10:15', '2', '提成扣去', '0.00', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '', '1', '10089', '0.00', '分销支出', '15007');
INSERT INTO `ims_fz_ye_detail` VALUES ('379', '13', '智能微商通', '0.01', '2', '2017-07-09 15:47:41', '1', '测试设备1-测试套餐', '0.00', 'os-pEtwN-mEpTmuNAWhaYTtbzCaY', '', '1', '10093', '0.00', '销售收入', '15002');
INSERT INTO `ims_fz_ye_detail` VALUES ('380', '13', '智能微商通', '0.01', '2', '2017-07-09 15:54:41', '1', '测试设备1-测试套餐', '0.00', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '', '1', '10094', '0.00', '销售收入', '15008');
INSERT INTO `ims_fz_ye_detail` VALUES ('381', '13', '智能微商通', '0.01', '2', '2017-07-09 16:38:23', '1', '测试设备1-测试套餐', '0.00', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '', '1', '10095', '0.00', '销售收入', '15008');
INSERT INTO `ims_fz_ye_detail` VALUES ('382', '13', '智能微商通', '0.01', '2', '2017-07-09 16:38:56', '1', '测试设备1-测试套餐', '0.00', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '', '1', '10096', '0.00', '销售收入', '15008');
INSERT INTO `ims_fz_ye_detail` VALUES ('383', '13', '智能微商通', '0.01', '2', '2017-07-09 16:39:37', '1', '测试设备1-测试套餐', '0.00', 'os-pEt8yoSZufIm-2ZoCoDx-AduU', '', '1', '10097', '0.00', '销售收入', '15008');
INSERT INTO `ims_fz_ye_detail` VALUES ('384', '13', '智能微商通', '1.20', '3', '2017-07-09 17:11:35', '2', '手续费:0.036元', '1.16', '', '', '1', '20021', '0.00', null, null);
INSERT INTO `ims_fz_ye_detail` VALUES ('385', '13', '智能微商通', '1.05', '3', '2017-07-09 17:13:00', '2', '手续费:0.0315元', '1.02', '', '', '1', '20022', '0.00', null, null);
INSERT INTO `ims_fz_ye_detail` VALUES ('386', '13', '测试代理用户1', '1.10', '3', '2017-07-09 17:48:43', '2', '手续费:0.033元', '1.07', '', '', '1', '20023', '0.00', null, null);
INSERT INTO `ims_fz_ye_detail` VALUES ('387', '13', '智能微商通', '1.10', '3', '2017-07-09 17:56:55', '2', '手续费:0.033元', '1.07', '', '', '1', '20024', '0.00', null, null);
INSERT INTO `ims_fz_ye_detail` VALUES ('388', '13', '智能微商通', '1.10', '3', '2017-07-09 18:27:53', '2', '手续费:0.033元', '1.07', '', '', '1', '20025', '0.00', null, null);
INSERT INTO `ims_fz_ye_detail` VALUES ('389', '13', '测试代理用户1', '1.10', '3', '2017-07-09 19:31:48', '2', '手续费:0.033元', '1.07', '', '', '1', '20026', '0.00', null, null);

-- ----------------------------
-- Table structure for ims_images_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_images_reply`;
CREATE TABLE `ims_images_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mediaid` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_images_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_cash_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_cash_record`;
CREATE TABLE `ims_mc_cash_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `fee` decimal(10,2) unsigned NOT NULL,
  `final_fee` decimal(10,2) unsigned NOT NULL,
  `credit1` int(10) unsigned NOT NULL,
  `credit1_fee` decimal(10,2) unsigned NOT NULL,
  `credit2` decimal(10,2) unsigned NOT NULL,
  `cash` decimal(10,2) unsigned NOT NULL,
  `return_cash` decimal(10,2) unsigned NOT NULL,
  `final_cash` decimal(10,2) unsigned NOT NULL,
  `remark` varchar(255) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `trade_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_cash_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_chats_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_chats_record`;
CREATE TABLE `ims_mc_chats_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `flag` tinyint(3) unsigned NOT NULL,
  `openid` varchar(32) NOT NULL,
  `msgtype` varchar(15) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `openid` (`openid`),
  KEY `createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_chats_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_credits_recharge
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_credits_recharge`;
CREATE TABLE `ims_mc_credits_recharge` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `tid` varchar(64) NOT NULL,
  `transid` varchar(30) NOT NULL,
  `fee` varchar(10) NOT NULL,
  `type` varchar(15) NOT NULL,
  `tag` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `backtype` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid_uid` (`uniacid`,`uid`),
  KEY `idx_tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_credits_recharge
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_credits_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_credits_record`;
CREATE TABLE `ims_mc_credits_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `uniacid` int(11) NOT NULL,
  `credittype` varchar(10) NOT NULL,
  `num` decimal(10,2) NOT NULL,
  `operator` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `remark` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_credits_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_fans_groups
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_fans_groups`;
CREATE TABLE `ims_mc_fans_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `groups` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_fans_groups
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_fans_tag_mapping
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_fans_tag_mapping`;
CREATE TABLE `ims_mc_fans_tag_mapping` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fanid` int(11) unsigned NOT NULL,
  `tagid` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mapping` (`fanid`,`tagid`),
  KEY `fanid_index` (`fanid`),
  KEY `tagid_index` (`tagid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_fans_tag_mapping
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_groups
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_groups`;
CREATE TABLE `ims_mc_groups` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `isdefault` tinyint(4) NOT NULL,
  PRIMARY KEY (`groupid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_groups
-- ----------------------------
INSERT INTO `ims_mc_groups` VALUES ('1', '1', '默认会员组', '0', '1');

-- ----------------------------
-- Table structure for ims_mc_handsel
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_handsel`;
CREATE TABLE `ims_mc_handsel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `touid` int(10) unsigned NOT NULL,
  `fromuid` varchar(32) NOT NULL,
  `module` varchar(30) NOT NULL,
  `sign` varchar(100) NOT NULL,
  `action` varchar(20) NOT NULL,
  `credit_value` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`touid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_handsel
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_mapping_fans
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_mapping_fans`;
CREATE TABLE `ims_mc_mapping_fans` (
  `fanid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `groupid` varchar(30) NOT NULL,
  `salt` char(8) NOT NULL,
  `follow` tinyint(1) unsigned NOT NULL,
  `followtime` int(10) unsigned NOT NULL,
  `unfollowtime` int(10) unsigned NOT NULL,
  `tag` varchar(1000) NOT NULL,
  `updatetime` int(10) unsigned DEFAULT NULL,
  `unionid` varchar(64) NOT NULL,
  PRIMARY KEY (`fanid`),
  UNIQUE KEY `openid_2` (`openid`),
  KEY `acid` (`acid`),
  KEY `uniacid` (`uniacid`),
  KEY `nickname` (`nickname`),
  KEY `updatetime` (`updatetime`),
  KEY `uid` (`uid`),
  KEY `openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_mapping_fans
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_mapping_ucenter
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_mapping_ucenter`;
CREATE TABLE `ims_mc_mapping_ucenter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `centeruid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_mapping_ucenter
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_mass_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_mass_record`;
CREATE TABLE `ims_mc_mass_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `fansnum` int(10) unsigned NOT NULL,
  `msgtype` varchar(10) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `group` int(10) NOT NULL,
  `attach_id` int(10) unsigned NOT NULL,
  `media_id` varchar(100) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `cron_id` int(10) unsigned NOT NULL,
  `sendtime` int(10) unsigned NOT NULL,
  `finalsendtime` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_mass_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_members
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_members`;
CREATE TABLE `ims_mc_members` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(8) NOT NULL,
  `groupid` int(11) NOT NULL,
  `credit1` decimal(10,2) unsigned NOT NULL,
  `credit2` decimal(10,2) unsigned NOT NULL,
  `credit3` decimal(10,2) unsigned NOT NULL,
  `credit4` decimal(10,2) unsigned NOT NULL,
  `credit5` decimal(10,2) unsigned NOT NULL,
  `credit6` decimal(10,2) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `realname` varchar(10) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `vip` tinyint(3) unsigned NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthyear` smallint(6) unsigned NOT NULL,
  `birthmonth` tinyint(3) unsigned NOT NULL,
  `birthday` tinyint(3) unsigned NOT NULL,
  `constellation` varchar(10) NOT NULL,
  `zodiac` varchar(5) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `idcard` varchar(30) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `resideprovince` varchar(30) NOT NULL,
  `residecity` varchar(30) NOT NULL,
  `residedist` varchar(30) NOT NULL,
  `graduateschool` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `education` varchar(10) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `revenue` varchar(10) NOT NULL,
  `affectivestatus` varchar(30) NOT NULL,
  `lookingfor` varchar(255) NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `weight` varchar(5) NOT NULL,
  `alipay` varchar(30) NOT NULL,
  `msn` varchar(30) NOT NULL,
  `taobao` varchar(30) NOT NULL,
  `site` varchar(30) NOT NULL,
  `bio` text NOT NULL,
  `interest` text NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `groupid` (`groupid`),
  KEY `uniacid` (`uniacid`),
  KEY `email` (`email`),
  KEY `mobile` (`mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_members
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_member_address
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_member_address`;
CREATE TABLE `ims_mc_member_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(50) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `province` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `district` varchar(32) NOT NULL,
  `address` varchar(512) NOT NULL,
  `isdefault` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uinacid` (`uniacid`),
  KEY `idx_uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_member_address
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_member_fields
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_member_fields`;
CREATE TABLE `ims_mc_member_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `fieldid` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `displayorder` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_fieldid` (`fieldid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_member_fields
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_member_property
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_member_property`;
CREATE TABLE `ims_mc_member_property` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `property` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_member_property
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_oauth_fans
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_oauth_fans`;
CREATE TABLE `ims_mc_oauth_fans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oauth_openid` varchar(50) NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_oauthopenid_acid` (`oauth_openid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_oauth_fans
-- ----------------------------

-- ----------------------------
-- Table structure for ims_menu_event
-- ----------------------------
DROP TABLE IF EXISTS `ims_menu_event`;
CREATE TABLE `ims_menu_event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `picmd5` varchar(32) NOT NULL,
  `openid` varchar(128) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `picmd5` (`picmd5`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_menu_event
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mobilenumber
-- ----------------------------
DROP TABLE IF EXISTS `ims_mobilenumber`;
CREATE TABLE `ims_mobilenumber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(10) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `dateline` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mobilenumber
-- ----------------------------

-- ----------------------------
-- Table structure for ims_modules
-- ----------------------------
DROP TABLE IF EXISTS `ims_modules`;
CREATE TABLE `ims_modules` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `version` varchar(15) NOT NULL,
  `ability` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `author` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `settings` tinyint(1) NOT NULL,
  `subscribes` varchar(500) NOT NULL,
  `handles` varchar(500) NOT NULL,
  `isrulefields` tinyint(1) NOT NULL,
  `issystem` tinyint(1) unsigned NOT NULL,
  `target` int(10) unsigned NOT NULL,
  `iscard` tinyint(3) unsigned NOT NULL,
  `permissions` varchar(5000) NOT NULL,
  `title_initial` varchar(1) NOT NULL,
  `wxapp_support` tinyint(1) NOT NULL,
  `app_support` tinyint(1) NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `idx_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_modules
-- ----------------------------
INSERT INTO `ims_modules` VALUES ('1', 'basic', 'system', '基本文字回复', '1.0', '和您进行简单对话', '一问一答得简单对话. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的回复内容.', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', '', '1', '2');
INSERT INTO `ims_modules` VALUES ('2', 'news', 'system', '基本混合图文回复', '1.0', '为你提供生动的图文资讯', '一问一答得简单对话, 但是回复内容包括图片文字等更生动的媒体内容. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的图文回复内容.', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', '', '1', '2');
INSERT INTO `ims_modules` VALUES ('3', 'music', 'system', '基本音乐回复', '1.0', '提供语音、音乐等音频类回复', '在回复规则中可选择具有语音、音乐等音频类的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝，实现一问一答得简单对话。', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', '', '1', '2');
INSERT INTO `ims_modules` VALUES ('4', 'userapi', 'system', '自定义接口回复', '1.1', '更方便的第三方接口设置', '自定义接口又称第三方接口，可以让开发者更方便的接入微信营销系统，高效的与微信公众平台进行对接整合。', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', '', '1', '2');
INSERT INTO `ims_modules` VALUES ('5', 'recharge', 'system', '会员中心充值模块', '1.0', '提供会员充值功能', '', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '0', '1', '0', '0', '', '', '1', '2');
INSERT INTO `ims_modules` VALUES ('6', 'custom', 'system', '多客服转接', '1.0.0', '用来接入腾讯的多客服系统', '', 'WeEngine Team', 'http://bbs.we7.cc', '0', 'a:0:{}', 'a:6:{i:0;s:5:\"image\";i:1;s:5:\"voice\";i:2;s:5:\"video\";i:3;s:8:\"location\";i:4;s:4:\"link\";i:5;s:4:\"text\";}', '1', '1', '0', '0', '', '', '1', '2');
INSERT INTO `ims_modules` VALUES ('7', 'images', 'system', '基本图片回复', '1.0', '提供图片回复', '在回复规则中可选择具有图片的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝图片。', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', '', '1', '2');
INSERT INTO `ims_modules` VALUES ('8', 'video', 'system', '基本视频回复', '1.0', '提供图片回复', '在回复规则中可选择具有视频的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝视频。', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', '', '1', '2');
INSERT INTO `ims_modules` VALUES ('9', 'voice', 'system', '基本语音回复', '1.0', '提供语音回复', '在回复规则中可选择具有语音的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝语音。', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', '', '1', '2');
INSERT INTO `ims_modules` VALUES ('10', 'chats', 'system', '发送客服消息', '1.0', '公众号可以在粉丝最后发送消息的48小时内无限制发送消息', '', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '0', '1', '0', '0', '', '', '1', '2');
INSERT INTO `ims_modules` VALUES ('11', 'wxcard', 'system', '微信卡券回复', '1.0', '微信卡券回复', '微信卡券回复', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', '', '1', '2');
INSERT INTO `ims_modules` VALUES ('12', 'fz_wlw', 'business', '移动支付设备', '1.2', '移动支付硬件设备', '移动支付硬件设备', '锋哥', 'http://www.fengzhi360.com/', '1', 'a:14:{i:0;s:4:\"text\";i:1;s:5:\"image\";i:2;s:5:\"voice\";i:3;s:5:\"video\";i:4;s:10:\"shortvideo\";i:5;s:8:\"location\";i:6;s:4:\"link\";i:7;s:9:\"subscribe\";i:8;s:11:\"unsubscribe\";i:9;s:2:\"qr\";i:10;s:5:\"trace\";i:11;s:5:\"click\";i:12;s:4:\"view\";i:13;s:14:\"merchant_order\";}', 'a:12:{i:0;s:5:\"image\";i:1;s:5:\"voice\";i:2;s:5:\"video\";i:3;s:10:\"shortvideo\";i:4;s:8:\"location\";i:5;s:4:\"link\";i:6;s:9:\"subscribe\";i:7;s:2:\"qr\";i:8;s:5:\"trace\";i:9;s:5:\"click\";i:10;s:14:\"merchant_order\";i:11;s:4:\"text\";}', '1', '0', '0', '0', 'a:0:{}', 'Y', '1', '2');

-- ----------------------------
-- Table structure for ims_modules_bindings
-- ----------------------------
DROP TABLE IF EXISTS `ims_modules_bindings`;
CREATE TABLE `ims_modules_bindings` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(100) NOT NULL,
  `entry` varchar(10) NOT NULL,
  `call` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `do` varchar(30) NOT NULL,
  `state` varchar(200) NOT NULL,
  `direct` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `displayorder` tinyint(255) unsigned NOT NULL,
  PRIMARY KEY (`eid`),
  KEY `idx_module` (`module`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_modules_bindings
-- ----------------------------
INSERT INTO `ims_modules_bindings` VALUES ('1', 'fz_wlw', 'cover', '', '设备中心', 'devHome', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('2', 'fz_wlw', 'menu', '', '设备列表', 'devList', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('3', 'fz_wlw', 'menu', '', '钱包管理', 'walletManager', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('4', 'fz_wlw', 'menu', '', '订单管理', 'orderManager', '', '0', '', '', '0');

-- ----------------------------
-- Table structure for ims_modules_plugin
-- ----------------------------
DROP TABLE IF EXISTS `ims_modules_plugin`;
CREATE TABLE `ims_modules_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `main_module` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `main_module` (`main_module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_modules_plugin
-- ----------------------------

-- ----------------------------
-- Table structure for ims_modules_recycle
-- ----------------------------
DROP TABLE IF EXISTS `ims_modules_recycle`;
CREATE TABLE `ims_modules_recycle` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `modulename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `modulename` (`modulename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_modules_recycle
-- ----------------------------

-- ----------------------------
-- Table structure for ims_music_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_music_reply`;
CREATE TABLE `ims_music_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(300) NOT NULL,
  `hqurl` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_music_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_news_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_news_reply`;
CREATE TABLE `ims_news_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `parent_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `content` mediumtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `displayorder` int(10) NOT NULL,
  `incontent` tinyint(1) NOT NULL,
  `createtime` int(10) NOT NULL,
  `media_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_news_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_profile_fields
-- ----------------------------
DROP TABLE IF EXISTS `ims_profile_fields`;
CREATE TABLE `ims_profile_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `field` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `displayorder` smallint(6) NOT NULL,
  `required` tinyint(1) NOT NULL,
  `unchangeable` tinyint(1) NOT NULL,
  `showinregister` tinyint(1) NOT NULL,
  `field_length` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_profile_fields
-- ----------------------------
INSERT INTO `ims_profile_fields` VALUES ('1', 'realname', '1', '真实姓名', '', '0', '1', '1', '1', '0');
INSERT INTO `ims_profile_fields` VALUES ('2', 'nickname', '1', '昵称', '', '1', '1', '0', '1', '0');
INSERT INTO `ims_profile_fields` VALUES ('3', 'avatar', '1', '头像', '', '1', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('4', 'qq', '1', 'QQ号', '', '0', '0', '0', '1', '0');
INSERT INTO `ims_profile_fields` VALUES ('5', 'mobile', '1', '手机号码', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('6', 'vip', '1', 'VIP级别', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('7', 'gender', '1', '性别', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('8', 'birthyear', '1', '出生生日', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('9', 'constellation', '1', '星座', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('10', 'zodiac', '1', '生肖', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('11', 'telephone', '1', '固定电话', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('12', 'idcard', '1', '证件号码', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('13', 'studentid', '1', '学号', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('14', 'grade', '1', '班级', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('15', 'address', '1', '邮寄地址', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('16', 'zipcode', '1', '邮编', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('17', 'nationality', '1', '国籍', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('18', 'resideprovince', '1', '居住地址', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('19', 'graduateschool', '1', '毕业学校', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('20', 'company', '1', '公司', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('21', 'education', '1', '学历', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('22', 'occupation', '1', '职业', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('23', 'position', '1', '职位', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('24', 'revenue', '1', '年收入', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('25', 'affectivestatus', '1', '情感状态', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('26', 'lookingfor', '1', ' 交友目的', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('27', 'bloodtype', '1', '血型', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('28', 'height', '1', '身高', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('29', 'weight', '1', '体重', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('30', 'alipay', '1', '支付宝帐号', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('31', 'msn', '1', 'MSN', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('32', 'email', '1', '电子邮箱', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('33', 'taobao', '1', '阿里旺旺', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('34', 'site', '1', '主页', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('35', 'bio', '1', '自我介绍', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('36', 'interest', '1', '兴趣爱好', '', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for ims_qrcode
-- ----------------------------
DROP TABLE IF EXISTS `ims_qrcode`;
CREATE TABLE `ims_qrcode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  `extra` int(10) unsigned NOT NULL,
  `qrcid` bigint(20) NOT NULL,
  `scene_str` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `model` tinyint(1) unsigned NOT NULL,
  `ticket` varchar(250) NOT NULL,
  `url` varchar(256) NOT NULL,
  `expire` int(10) unsigned NOT NULL,
  `subnum` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_qrcid` (`qrcid`),
  KEY `uniacid` (`uniacid`),
  KEY `ticket` (`ticket`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_qrcode
-- ----------------------------

-- ----------------------------
-- Table structure for ims_qrcode_stat
-- ----------------------------
DROP TABLE IF EXISTS `ims_qrcode_stat`;
CREATE TABLE `ims_qrcode_stat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `qid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `qrcid` bigint(20) unsigned NOT NULL,
  `scene_str` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_qrcode_stat
-- ----------------------------

-- ----------------------------
-- Table structure for ims_rule
-- ----------------------------
DROP TABLE IF EXISTS `ims_rule`;
CREATE TABLE `ims_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `displayorder` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `containtype` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_rule
-- ----------------------------
INSERT INTO `ims_rule` VALUES ('1', '0', '城市天气', 'userapi', '255', '1', '');
INSERT INTO `ims_rule` VALUES ('2', '0', '百度百科', 'userapi', '255', '1', '');
INSERT INTO `ims_rule` VALUES ('3', '0', '即时翻译', 'userapi', '255', '1', '');
INSERT INTO `ims_rule` VALUES ('4', '0', '今日老黄历', 'userapi', '255', '1', '');
INSERT INTO `ims_rule` VALUES ('5', '0', '看新闻', 'userapi', '255', '1', '');
INSERT INTO `ims_rule` VALUES ('6', '0', '快递查询', 'userapi', '255', '1', '');
INSERT INTO `ims_rule` VALUES ('7', '1', '个人中心入口设置', 'cover', '0', '1', '');
INSERT INTO `ims_rule` VALUES ('8', '1', '微信系统入口设置', 'cover', '0', '1', '');

-- ----------------------------
-- Table structure for ims_rule_keyword
-- ----------------------------
DROP TABLE IF EXISTS `ims_rule_keyword`;
CREATE TABLE `ims_rule_keyword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_content` (`content`),
  KEY `rid` (`rid`),
  KEY `idx_rid` (`rid`),
  KEY `idx_uniacid_type_content` (`uniacid`,`type`,`content`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_rule_keyword
-- ----------------------------
INSERT INTO `ims_rule_keyword` VALUES ('1', '1', '0', 'userapi', '^.+天气$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('2', '2', '0', 'userapi', '^百科.+$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('3', '2', '0', 'userapi', '^定义.+$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('4', '3', '0', 'userapi', '^@.+$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('5', '4', '0', 'userapi', '日历', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('6', '4', '0', 'userapi', '万年历', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('7', '4', '0', 'userapi', '黄历', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('8', '4', '0', 'userapi', '几号', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('9', '5', '0', 'userapi', '新闻', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('10', '6', '0', 'userapi', '^(申通|圆通|中通|汇通|韵达|顺丰|EMS) *[a-z0-9]{1,}$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('11', '7', '1', 'cover', '个人中心', '1', '0', '1');
INSERT INTO `ims_rule_keyword` VALUES ('12', '8', '1', 'cover', '首页', '1', '0', '1');

-- ----------------------------
-- Table structure for ims_site_article
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_article`;
CREATE TABLE `ims_site_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `iscommend` tinyint(1) NOT NULL,
  `ishot` tinyint(1) unsigned NOT NULL,
  `pcate` int(10) unsigned NOT NULL,
  `ccate` int(10) unsigned NOT NULL,
  `template` varchar(300) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `incontent` tinyint(1) NOT NULL,
  `source` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `displayorder` int(10) unsigned NOT NULL,
  `linkurl` varchar(500) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `edittime` int(10) NOT NULL,
  `click` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  `credit` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_iscommend` (`iscommend`),
  KEY `idx_ishot` (`ishot`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_article
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_category
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_category`;
CREATE TABLE `ims_site_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `nid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `parentid` int(10) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `icon` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `linkurl` varchar(500) NOT NULL,
  `ishomepage` tinyint(1) NOT NULL,
  `icontype` tinyint(1) unsigned NOT NULL,
  `css` varchar(500) NOT NULL,
  `multiid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_category
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_multi
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_multi`;
CREATE TABLE `ims_site_multi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `site_info` text NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `bindhost` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `bindhost` (`bindhost`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_multi
-- ----------------------------
INSERT INTO `ims_site_multi` VALUES ('1', '1', 'WECMS', '1', '', '1', '');

-- ----------------------------
-- Table structure for ims_site_nav
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_nav`;
CREATE TABLE `ims_site_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `section` tinyint(4) NOT NULL,
  `module` varchar(50) NOT NULL,
  `displayorder` smallint(5) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `position` tinyint(4) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(500) NOT NULL,
  `css` varchar(1000) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `categoryid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_nav
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_page
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_page`;
CREATE TABLE `ims_site_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `params` longtext NOT NULL,
  `html` longtext NOT NULL,
  `multipage` longtext NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `goodnum` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_page
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_slide
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_slide`;
CREATE TABLE `ims_site_slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `displayorder` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_slide
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_store_goods
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_store_goods`;
CREATE TABLE `ims_site_store_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `title` varchar(100) NOT NULL,
  `module` varchar(50) NOT NULL,
  `account_num` int(10) NOT NULL,
  `wxapp_num` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `slide` varchar(1000) NOT NULL,
  `category_id` int(10) NOT NULL,
  `title_initial` varchar(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module` (`module`),
  KEY `category_id` (`category_id`),
  KEY `price` (`price`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_store_goods
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_store_order
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_store_order`;
CREATE TABLE `ims_site_store_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` varchar(28) NOT NULL,
  `goodsid` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `buyer` varchar(50) NOT NULL,
  `buyerid` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `changeprice` tinyint(1) NOT NULL,
  `createtime` int(10) NOT NULL,
  `uniacid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goodid` (`goodsid`),
  KEY `buyerid` (`buyerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_store_order
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_styles
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_styles`;
CREATE TABLE `ims_site_styles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `templateid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_styles
-- ----------------------------
INSERT INTO `ims_site_styles` VALUES ('1', '1', '1', '微站默认模板_gC5C');

-- ----------------------------
-- Table structure for ims_site_styles_vars
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_styles_vars`;
CREATE TABLE `ims_site_styles_vars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `templateid` int(10) unsigned NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `variable` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_styles_vars
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_templates
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_templates`;
CREATE TABLE `ims_site_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `version` varchar(64) NOT NULL,
  `description` varchar(500) NOT NULL,
  `author` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `sections` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_templates
-- ----------------------------
INSERT INTO `ims_site_templates` VALUES ('1', 'default', '微站默认模板', '', '默认微站模板套系', 'WECMS', 'http://we7.cc', '1', '0');

-- ----------------------------
-- Table structure for ims_stat_fans
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_fans`;
CREATE TABLE `ims_stat_fans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `new` int(10) unsigned NOT NULL,
  `cancel` int(10) unsigned NOT NULL,
  `cumulate` int(10) NOT NULL,
  `date` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`date`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_fans
-- ----------------------------
INSERT INTO `ims_stat_fans` VALUES ('1', '1', '0', '0', '0', '20180114');
INSERT INTO `ims_stat_fans` VALUES ('2', '1', '0', '0', '0', '20180113');
INSERT INTO `ims_stat_fans` VALUES ('3', '1', '0', '0', '0', '20180112');
INSERT INTO `ims_stat_fans` VALUES ('4', '1', '0', '0', '0', '20180111');
INSERT INTO `ims_stat_fans` VALUES ('5', '1', '0', '0', '0', '20180110');
INSERT INTO `ims_stat_fans` VALUES ('6', '1', '0', '0', '0', '20180109');
INSERT INTO `ims_stat_fans` VALUES ('7', '1', '0', '0', '0', '20180108');
INSERT INTO `ims_stat_fans` VALUES ('8', '1', '0', '0', '0', '20180115');

-- ----------------------------
-- Table structure for ims_stat_keyword
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_keyword`;
CREATE TABLE `ims_stat_keyword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` varchar(10) NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `hit` int(10) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_keyword
-- ----------------------------

-- ----------------------------
-- Table structure for ims_stat_msg_history
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_msg_history`;
CREATE TABLE `ims_stat_msg_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `type` varchar(10) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_msg_history
-- ----------------------------

-- ----------------------------
-- Table structure for ims_stat_rule
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_rule`;
CREATE TABLE `ims_stat_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `hit` int(10) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_rule
-- ----------------------------

-- ----------------------------
-- Table structure for ims_stat_visit
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_visit`;
CREATE TABLE `ims_stat_visit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `module` varchar(100) NOT NULL,
  `count` int(10) unsigned NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `module` (`module`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_visit
-- ----------------------------

-- ----------------------------
-- Table structure for ims_uni_account
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account`;
CREATE TABLE `ims_uni_account` (
  `uniacid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `default_acid` int(10) unsigned NOT NULL,
  `rank` int(10) DEFAULT NULL,
  `title_initial` varchar(1) NOT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account
-- ----------------------------
INSERT INTO `ims_uni_account` VALUES ('1', '-1', 'WECMS', '微信营销系统', '1', null, 'W');

-- ----------------------------
-- Table structure for ims_uni_account_group
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account_group`;
CREATE TABLE `ims_uni_account_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `groupid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account_group
-- ----------------------------

-- ----------------------------
-- Table structure for ims_uni_account_menus
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account_menus`;
CREATE TABLE `ims_uni_account_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `menuid` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `sex` tinyint(3) unsigned NOT NULL,
  `group_id` int(10) NOT NULL,
  `client_platform_type` tinyint(3) unsigned NOT NULL,
  `area` varchar(50) NOT NULL,
  `data` text NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `isdeleted` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `menuid` (`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account_menus
-- ----------------------------

-- ----------------------------
-- Table structure for ims_uni_account_modules
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account_modules`;
CREATE TABLE `ims_uni_account_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `settings` text NOT NULL,
  `shortcut` tinyint(1) unsigned NOT NULL,
  `displayorder` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_module` (`module`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account_modules
-- ----------------------------

-- ----------------------------
-- Table structure for ims_uni_account_users
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account_users`;
CREATE TABLE `ims_uni_account_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `role` varchar(255) NOT NULL,
  `rank` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_memberid` (`uid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account_users
-- ----------------------------

-- ----------------------------
-- Table structure for ims_uni_group
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_group`;
CREATE TABLE `ims_uni_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_uid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `modules` varchar(15000) NOT NULL,
  `templates` varchar(5000) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_group
-- ----------------------------
INSERT INTO `ims_uni_group` VALUES ('1', '0', '体验套餐服务', 'a:1:{i:0;s:6:\"fz_wlw\";}', 'N;', '0');

-- ----------------------------
-- Table structure for ims_uni_settings
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_settings`;
CREATE TABLE `ims_uni_settings` (
  `uniacid` int(10) unsigned NOT NULL,
  `passport` varchar(200) NOT NULL,
  `oauth` varchar(100) NOT NULL,
  `jsauth_acid` int(10) unsigned NOT NULL,
  `uc` varchar(500) NOT NULL,
  `notify` varchar(2000) NOT NULL,
  `creditnames` varchar(500) NOT NULL,
  `creditbehaviors` varchar(500) NOT NULL,
  `welcome` varchar(60) NOT NULL,
  `default` varchar(60) NOT NULL,
  `default_message` varchar(2000) NOT NULL,
  `payment` text NOT NULL,
  `stat` varchar(300) NOT NULL,
  `default_site` int(10) unsigned DEFAULT NULL,
  `sync` tinyint(3) unsigned NOT NULL,
  `recharge` varchar(500) NOT NULL,
  `tplnotice` varchar(1000) NOT NULL,
  `grouplevel` tinyint(3) unsigned NOT NULL,
  `mcplugin` varchar(500) NOT NULL,
  `exchange_enable` tinyint(3) unsigned NOT NULL,
  `coupon_type` tinyint(3) unsigned NOT NULL,
  `menuset` text NOT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_settings
-- ----------------------------
INSERT INTO `ims_uni_settings` VALUES ('1', 'a:3:{s:8:\"focusreg\";i:0;s:4:\"item\";s:5:\"email\";s:4:\"type\";s:8:\"password\";}', 'a:2:{s:6:\"status\";s:1:\"0\";s:7:\"account\";s:1:\"0\";}', '0', 'a:1:{s:6:\"status\";i:0;}', 'a:1:{s:3:\"sms\";a:2:{s:7:\"balance\";i:0;s:9:\"signature\";s:0:\"\";}}', 'a:5:{s:7:\"credit1\";a:2:{s:5:\"title\";s:6:\"积分\";s:7:\"enabled\";i:1;}s:7:\"credit2\";a:2:{s:5:\"title\";s:6:\"余额\";s:7:\"enabled\";i:1;}s:7:\"credit3\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit4\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit5\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}}', 'a:2:{s:8:\"activity\";s:7:\"credit1\";s:8:\"currency\";s:7:\"credit2\";}', '', '', '', 'a:4:{s:6:\"credit\";a:1:{s:6:\"switch\";b:0;}s:6:\"alipay\";a:4:{s:6:\"switch\";b:0;s:7:\"account\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:6:\"secret\";s:0:\"\";}s:6:\"wechat\";a:5:{s:6:\"switch\";b:0;s:7:\"account\";b:0;s:7:\"signkey\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:3:\"key\";s:0:\"\";}s:8:\"delivery\";a:1:{s:6:\"switch\";b:0;}}', '', '1', '0', '', '', '0', '', '0', '0', '');

-- ----------------------------
-- Table structure for ims_uni_verifycode
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_verifycode`;
CREATE TABLE `ims_uni_verifycode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `verifycode` varchar(6) NOT NULL,
  `total` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_verifycode
-- ----------------------------

-- ----------------------------
-- Table structure for ims_userapi_cache
-- ----------------------------
DROP TABLE IF EXISTS `ims_userapi_cache`;
CREATE TABLE `ims_userapi_cache` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_userapi_cache
-- ----------------------------

-- ----------------------------
-- Table structure for ims_userapi_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_userapi_reply`;
CREATE TABLE `ims_userapi_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `description` varchar(300) NOT NULL,
  `apiurl` varchar(300) NOT NULL,
  `token` varchar(32) NOT NULL,
  `default_text` varchar(100) NOT NULL,
  `cachetime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_userapi_reply
-- ----------------------------
INSERT INTO `ims_userapi_reply` VALUES ('1', '1', '\"城市名+天气\", 如: \"北京天气\"', 'weather.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('2', '2', '\"百科+查询内容\" 或 \"定义+查询内容\", 如: \"百科姚明\", \"定义自行车\"', 'baike.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('3', '3', '\"@查询内容(中文或英文)\"', 'translate.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('4', '4', '\"日历\", \"万年历\", \"黄历\"或\"几号\"', 'calendar.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('5', '5', '\"新闻\"', 'news.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('6', '6', '\"快递+单号\", 如: \"申通1200041125\"', 'express.php', '', '', '0');

-- ----------------------------
-- Table structure for ims_users
-- ----------------------------
DROP TABLE IF EXISTS `ims_users`;
CREATE TABLE `ims_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_uid` int(10) NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  `founder_groupid` tinyint(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `joindate` int(10) unsigned NOT NULL,
  `joinip` varchar(15) NOT NULL,
  `lastvisit` int(10) unsigned NOT NULL,
  `lastip` varchar(15) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users
-- ----------------------------
INSERT INTO `ims_users` VALUES ('1', '0', '0', '0', 'admin', '774c9a3478c8cd513c1b4cf3560ef893fb8d8174', 'f5c5a733', '0', '0', '1516025660', '', '1516025668', '127.0.0.1', '', '0', '0');
INSERT INTO `ims_users` VALUES ('2', '0', '1', '0', 'long', '4b80242660a8a932e47b623f363ea673dbdcf40d', 'HTODs99T', '0', '2', '1516025773', '127.0.0.1', '1516025773', '127.0.0.1', '', '1516025773', '1526652973');

-- ----------------------------
-- Table structure for ims_users_failed_login
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_failed_login`;
CREATE TABLE `ims_users_failed_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `username` varchar(32) NOT NULL,
  `count` tinyint(1) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_username` (`ip`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_failed_login
-- ----------------------------

-- ----------------------------
-- Table structure for ims_users_founder_group
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_founder_group`;
CREATE TABLE `ims_users_founder_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `package` varchar(5000) NOT NULL,
  `maxaccount` int(10) unsigned NOT NULL,
  `maxsubaccount` int(10) unsigned NOT NULL,
  `timelimit` int(10) unsigned NOT NULL,
  `maxwxapp` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_founder_group
-- ----------------------------

-- ----------------------------
-- Table structure for ims_users_group
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_group`;
CREATE TABLE `ims_users_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_uid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `package` varchar(5000) NOT NULL,
  `maxaccount` int(10) unsigned NOT NULL,
  `maxsubaccount` int(10) unsigned NOT NULL,
  `timelimit` int(10) unsigned NOT NULL,
  `maxwxapp` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_group
-- ----------------------------
INSERT INTO `ims_users_group` VALUES ('1', '0', '测试用户组', 'a:2:{i:0;i:1;i:1;i:-1;}', '3', '0', '123', '3');

-- ----------------------------
-- Table structure for ims_users_invitation
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_invitation`;
CREATE TABLE `ims_users_invitation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `fromuid` int(10) unsigned NOT NULL,
  `inviteuid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_invitation
-- ----------------------------

-- ----------------------------
-- Table structure for ims_users_permission
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_permission`;
CREATE TABLE `ims_users_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` varchar(100) NOT NULL,
  `permission` varchar(10000) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_permission
-- ----------------------------

-- ----------------------------
-- Table structure for ims_users_profile
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_profile`;
CREATE TABLE `ims_users_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `edittime` int(10) NOT NULL,
  `realname` varchar(10) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `fakeid` varchar(30) NOT NULL,
  `vip` tinyint(3) unsigned NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthyear` smallint(6) unsigned NOT NULL,
  `birthmonth` tinyint(3) unsigned NOT NULL,
  `birthday` tinyint(3) unsigned NOT NULL,
  `constellation` varchar(10) NOT NULL,
  `zodiac` varchar(5) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `idcard` varchar(30) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `resideprovince` varchar(30) NOT NULL,
  `residecity` varchar(30) NOT NULL,
  `residedist` varchar(30) NOT NULL,
  `graduateschool` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `education` varchar(10) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `revenue` varchar(10) NOT NULL,
  `affectivestatus` varchar(30) NOT NULL,
  `lookingfor` varchar(255) NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `weight` varchar(5) NOT NULL,
  `alipay` varchar(30) NOT NULL,
  `msn` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `taobao` varchar(30) NOT NULL,
  `site` varchar(30) NOT NULL,
  `bio` text NOT NULL,
  `interest` text NOT NULL,
  `workerid` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_profile
-- ----------------------------

-- ----------------------------
-- Table structure for ims_video_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_video_reply`;
CREATE TABLE `ims_video_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mediaid` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_video_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_voice_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_voice_reply`;
CREATE TABLE `ims_voice_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `mediaid` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_voice_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_wechat_attachment
-- ----------------------------
DROP TABLE IF EXISTS `ims_wechat_attachment`;
CREATE TABLE `ims_wechat_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `media_id` varchar(255) NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  `model` varchar(25) NOT NULL,
  `tag` varchar(5000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `media_id` (`media_id`),
  KEY `acid` (`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wechat_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for ims_wechat_news
-- ----------------------------
DROP TABLE IF EXISTS `ims_wechat_news`;
CREATE TABLE `ims_wechat_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned DEFAULT NULL,
  `attach_id` int(10) unsigned NOT NULL,
  `thumb_media_id` varchar(60) NOT NULL,
  `thumb_url` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `digest` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_source_url` varchar(200) NOT NULL,
  `show_cover_pic` tinyint(3) unsigned NOT NULL,
  `url` varchar(200) NOT NULL,
  `displayorder` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `attach_id` (`attach_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wechat_news
-- ----------------------------

-- ----------------------------
-- Table structure for ims_wxapp_general_analysis
-- ----------------------------
DROP TABLE IF EXISTS `ims_wxapp_general_analysis`;
CREATE TABLE `ims_wxapp_general_analysis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `session_cnt` int(10) NOT NULL,
  `visit_pv` int(10) NOT NULL,
  `visit_uv` int(10) NOT NULL,
  `visit_uv_new` int(10) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `stay_time_uv` varchar(10) NOT NULL,
  `stay_time_session` varchar(10) NOT NULL,
  `visit_depth` varchar(10) NOT NULL,
  `ref_date` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `ref_date` (`ref_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wxapp_general_analysis
-- ----------------------------

-- ----------------------------
-- Table structure for ims_wxapp_versions
-- ----------------------------
DROP TABLE IF EXISTS `ims_wxapp_versions`;
CREATE TABLE `ims_wxapp_versions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `version` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `modules` varchar(1000) NOT NULL,
  `design_method` tinyint(1) NOT NULL,
  `template` int(10) NOT NULL,
  `quickmenu` varchar(2500) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `version` (`version`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wxapp_versions
-- ----------------------------

-- ----------------------------
-- Table structure for ims_wxcard_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_wxcard_reply`;
CREATE TABLE `ims_wxcard_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `brand_name` varchar(30) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `success` varchar(255) NOT NULL,
  `error` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wxcard_reply
-- ----------------------------
