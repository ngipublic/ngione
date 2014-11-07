<?php
/**
 * Sidebar 主题文件
 *
 * @package    YEAHZAN
 * @subpackage ZanBlog
 * @since      ZanBlog 3.0.2
 */
?>


<aside class="col-md-4" id="sidebar">
  <?php if( is_single() ) ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( '文章侧边栏' ) ) ? true : false; ?>
  <?php if( is_home() ) {
  	$html = "<div class=\"sidebar-top group\"><p>关注:</p><ul class=\"social-links\"><li><a rel=\"nofollow\" class=\"social-tooltip\" title=\"Twitter\" href=\"http://twitter.com/AlxBeing\"><i class=\"fa fa-twitter\"></i></a></li><li><a rel=\"nofollow\" class=\"social-tooltip\" title=\"Facebook\" href=\"#\"><i class=\"fa fa-facebook\"></i></a></li><li><a rel=\"nofollow\" class=\"social-tooltip\" title=\"Google+\" href=\"#\"><i class=\"fa fa-google-plus\"></i></a></li><li><a rel=\"nofollow\" class=\"social-tooltip\" title=\"Dribbble\" href=\"#\"><i class=\"fa fa-dribbble\"></i></a></li><li><a rel=\"nofollow\" class=\"social-tooltip\" title=\"RSS Feed\" href=\"/hueman/feed\"><i class=\"fa fa-rss\"></i></a></li></ul></div>";
  			echo $html;
  ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( '首页侧边栏' ) ) ? true : false; }?>
  <?php if( is_archive() | is_search() ) ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( '归档侧边栏' ) ) ? true : false; ?>
  <?php if( is_page() ) ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( '页面侧边栏' ) ) ? true : false; ?>
</aside>

