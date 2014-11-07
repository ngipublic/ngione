<article class="col-md-6  per-post">
  <?php if( is_sticky() && is_home() ) echo '<i class="fa fa-bookmark article-stick"></i>';?>

	<!-- 大型设备文章显示 -->
	<section class="visible-md visible-lg">
      <div class="post-block">
    <!-- 如果文章有特色图片 -->
 <?php if ( has_post_thumbnail() ) { ?> 

         <div class="post-feature"> 
            <figure class="thumbnail zan-thumb">
              <a href="<?php the_permalink() ?>">
                <?php the_post_thumbnail( 'large' ); ?>
              </a>
              <?php if(in_category(1)) {?>
              <a class="post-is-in-catogary" href="<?php echo get_category_link(1); ?>"> 
                <span> <?php echo get_cat_name(1); ?></span>   
              </a>                
              <?php }else if(in_category(3)) {?>
                <a class="post-is-in-catogary" href="<?php echo get_category_link(3); ?>"> 
                <span> <?php echo get_cat_name(3); ?></span>   
              </a>  
           <?php } ?>
            </figure>  
            <div class="post-title-mask"></div>
            <div class="post-title"><a href="<?php the_permalink() ?>"><strong><?php the_title(); ?></strong></a></div>
          </div> <!-- post-feature is end -->      
    <?php } else {?> <!-- 文章无特色图片 -->
        <div class="zan-outline">          
          <?php if ( !empty($post->post_excerpt) ) { ?>
            <?php the_excerpt() ?>
          <?php } else {?>  
            <?php echo mb_strimwidth( strip_tags( apply_filters( 'the_content', $post->post_content ) ), 0, 250,"..." ); ?>
          <?php } ?> 
        </div>
    <?php } ?>
    <!-- 文章meta信息 -->
    <div class="post-meta">
      <span class="post-author-avatar"><?php echo get_avatar( get_the_author_email(), '40' ); ?></span>
      <span> <?php the_author_posts_link(); ?></span>
      <span><i class="fa fa-calendar"></i> <?php  the_time( 'm月j日, Y' ); ?></span>
      <!-- <span><i class="fa fa-eye"></i> <?php if( function_exists( 'the_views' ) ) { the_views(); print '次'; } ?></span> -->
      <!-- <span><i class="fa fa-comment"></i> <a href="<?php the_permalink() ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></span> -->
      <?php edit_post_link( '<span><i class="fa fa-edit"></i> 编辑', ' ', '</span>'); ?>
    </div>    
      <!-- 文章所属分类 -->
        <!-- <div class="category-cloud"><?php the_category(' '); ?></div> -->
	
			

      <!-- 文章摘要信息 -->
    <div class="zan-outline">
          <?php if ( !empty($post->post_excerpt) ) { ?>
            <?php the_excerpt() ?>
          <?php } else {?>  
            <?php echo mb_strimwidth( strip_tags( apply_filters( 'the_content', $post->post_content ) ), 0, 180,"..." ); ?>
          <?php } ?>     
    </div>   
   </div>
	</section>
	<!-- 大型设备文章显示结束 -->

	<!-- 小型设备文章显示 -->
	<section class="visible-xs  visible-sm">
		<div class="title-article">
			<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
		</div>
		<p class="post-info">
			<span><i class="fa fa-calendar"></i> <?php the_time( 'm月j日, Y' ); ?></span>
			<span><i class="fa fa-eye"></i> <?php if( function_exists( 'the_views' ) ) { the_views(); print '次'; } ?></span>
		</p>
		<div class="content-article">
      <figure class="thumbnail"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'large' ); ?></a></figure>		
			<div class="well">
        <?php if ( !empty($post->post_excerpt) ) { ?>
          <?php the_excerpt() ?>
        <?php } else {?>  
          <?php echo mb_strimwidth( strip_tags( apply_filters( 'the_content', $post->post_content ) ), 0, 150,"..." ); ?>
        <?php } ?>
			</div>
		</div>
		<a class="btn btn-zan-line-pp btn-block" href="<?php the_permalink() ?>"  title="详细阅读 <?php the_title(); ?>">阅读全文</span></a>
	</section>
	<!-- 小型设备文章显示结束 -->

</article>