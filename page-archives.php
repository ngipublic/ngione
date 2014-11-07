<?php
/**
 * Template Name: 加入我们
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
        <div id="introduce">
          <article class="container">
        
              <?php echo "获取公司简介文章" ?>
                 <?php  
                    $id = "";// 文章的id  
                    $content = get_post($id)->post_content;  
                    echo $content;   //输出文章的 标题  
                 ?>  
            
             </article>
        </div>
        <!-- 锚点分类参考，调用不同分类下面的文章内容 -->
          <?php
               $posts_cat_id = 1;
               $wp_query1 = new WP_Query( array(
                  'post_type'       => array( 'post' ),
                  'showposts'       => 6,
                  'cat'         => $posts_cat_id,
                  'ignore_sticky_posts' => true,
                ) );  
              $posts_cat_id = 2;
               $wp_query2 = new WP_Query( array(
                  'post_type'       => array( 'post' ),
                  'showposts'       => 6,
                  'cat'         => $posts_cat_id,
                  'ignore_sticky_posts' => true,
                ) );                    
          
          ?>            
       <div id="team">
          <div id="article-list" class="post-list group">
                <?php $i = 1; echo '<div class="post-row">'; while ( $wp_query1->have_posts() ) : $wp_query->the_post(); ?>
                <?php get_template_part( 'includes/post-format/content', get_post_format() ); ?>
                <?php if($i % 3 == 0) { echo '</div><div class="post-row">'; } $i++; endwhile; echo '</div>'; ?>
          </div><!--/.post-list-->       
       </div>
      <div id="reward">
          <div id="article-list" class="post-list group">
                <?php $i = 1; echo '<div class="post-row">'; while ( $wp_query2->have_posts() ) : $wp_query->the_post(); ?>
                <?php get_template_part( 'includes/post-format/content', get_post_format() ); ?>
                <?php if($i % 3 == 0) { echo '</div><div class="post-row">'; } $i++; endwhile; echo '</div>'; ?>
          </div><!--/.post-list-->       
       </div>    
             
   
      </div>
    </div>
	</div>
</section>
<?php get_footer(); ?>
</body>
</html>