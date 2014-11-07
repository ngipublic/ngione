<?php
/**
 * Index 主题文件
 *
 * @package    YEAHZAN
 * @subpackage ZanBlog
 * @since      ZanBlog 3.0.2
 */
?>

<?php get_header(); ?>
<section id="zan-bodyer">
  <div class="container">
      <div class="col-md-12" id="home-slide-area">
          <?php
               $posts_cat_id = 1;
               $slide_posts = new WP_Query( array(
                  'post_type'       => array( 'post' ),
                  'showposts'       => 4,
                  'cat'         => $posts_cat_id,
                  'ignore_sticky_posts' => true,
                ) );     
          
          ?>          
      <!--  幻灯片部分-->
      <div id="qupu-carousel" class="carousel slide hidden-xs" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php for($j = 0; $j < 4; $j++) { ?>
            <li data-target="#qupu-carousel" data-slide-to="<?php $j; ?>" class="<?php if($j==0) echo "active"?>"></li>
            <?php } ?>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
               <?php $i = 0; while ($slide_posts->have_posts()): $slide_posts->the_post(); $i++;?>
              <div class="item <?php if($i==1) echo "active"; ?>">
                    <a href="<?php the_permalink() ?>">
                        <img class="home-slide-img" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(),'full')[0]; ?>">
                    </a>          
                   <!--  <img src="<?php wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); ?>" alt="..."> -->
                    <div class="carousel-caption">
                         <h2><?php the_title(); ?></h2>
                    </div>
              </div>
               <?php endwhile; ?>
              
          </div>

            <!-- Controls -->
            <!-- <a class="left carousel-control" href="#qupu-carousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#qupu-carousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a> -->
       </div> <!-- 幻灯片内容结束 -->
     </div><!-- home-slide-area is end -->
    <div class="row">
      <div class="main" id="mainstay"> 

        <!-- 内容主体 -->
      <div id="article-list" class="post-list group">
        <?php $i = 1; echo '<div class="post-row">'; while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
        <?php get_template_part( 'includes/post-format/content', get_post_format() ); ?>
        <?php if($i % 3 == 0) { echo '</div><div class="post-row">'; } $i++; endwhile; echo '</div>'; ?>
      </div><!--/.post-list-->                              
      <!-- 内容主体结束 -->

      

      </div>
     
    </div>
  </div>
</section>
<?php get_footer(); ?>
</body>
</html>
