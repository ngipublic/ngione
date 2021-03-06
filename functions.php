<?php
/**
 * Functions 整体函数调用
 *
 * @package    YEAHZAN
 * @subpackage ZanBlog
 * @since      ZanBlog 3.0.2
 *
 */

// 自定义theme路径
define( 'THEMEPATH', TEMPLATEPATH . '/' );

// 自定义includes路径
define( 'INCLUDESEPATH', THEMEPATH . 'includes/' );

// 自定义widgets路径
define( 'WIDGETSPATH', INCLUDESEPATH . 'widgets/' );

// 自定义classes路径
define( 'CLASSESPATH', INCLUDESEPATH . 'classes/' );

// 自定义admin路径
define( 'ADMINPATH', INCLUDESEPATH . 'admin/' );

// 加载主题配置文件
require_once( INCLUDESEPATH . 'theme-options.php' );

// 加载主题函数文件
require_once( INCLUDESEPATH . 'theme-functions.php' );

// 加载短代码文件
require_once( INCLUDESEPATH . 'shortcodes.php' );

// 加载小工具文件
require_once( WIDGETSPATH . 'widgets.php' );

// 加载类文件
require_once( CLASSESPATH . 'classes.php' );

// 自定义登录
require_once( ADMINPATH . 'custom-login.php' );

// 自定义用户资料
require_once( ADMINPATH . 'custom-user.php' );

// 自定义仪表盘
require_once( ADMINPATH . 'custom-dashboard.php' );

add_filter('pre_site_transient_update_core',    create_function('$a', "return null;")); // 关闭核心提示

add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;")); // 关闭插件提示

add_filter('pre_site_transient_update_themes',  create_function('$a', "return null;")); // 关闭主题提示

remove_action('admin_init', '_maybe_update_core');    // 禁止 Wordpress 检查更新

remove_action('admin_init', '_maybe_update_plugins'); // 禁止 Wordpress 更新插件

remove_action('admin_init', '_maybe_update_themes');  // 禁止 Wordpress 更新主题

?>