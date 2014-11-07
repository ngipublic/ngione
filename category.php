<?php
/**
 * Category 主题文件
 *
 * @package    YEAHZAN
 * @subpackage ZanBlog
 * @since      ZanBlog 3.0.2
 */
?>

<?php get_header(); ?>
<section id="zan-bodyer">
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="mainstay">
        
       
        <!-- 内容主体 -->
      <div id="article-list" class="post-list group">
        <?php $i = 1; echo '<div class="post-row">'; while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
        <?php get_template_part( 'includes/post-format/content', get_post_format() ); ?>
        <?php if($i % 2 == 0) { echo '</div><div class="post-row">'; } $i++; endwhile; echo '</div>'; ?>
      </div><!--/.post-list-->                              
      <!-- 内容主体结束 -->

        <!-- 分页 -->
        <?php if ( function_exists( 'show_paginate' ) ) { show_paginate(); } ?>
        <!-- 分页结束 -->

      </div>
			
		</div>
	</div>
</section>
<?php get_footer(); ?>
</body>
</html>