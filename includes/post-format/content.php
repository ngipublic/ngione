<article class="col-md-4  per-post">
  <?php if( is_sticky() && is_home() ) echo '<i class="fa fa-bookmark article-stick"></i>';?>

	<!-- 大型设备文章显示 -->
	<section class="visible-md visible-lg">
      <div class="post-block">
    <!-- 如果文章有特色图片 -->
 <?php if ( has_post_thumbnail() ) { ?> 

         <div class="post-feature"> 
            <figure class="thumbnail zan-thumb">
              <a href="<?php the_permalink() ?>">
                <?php the_post_thumbnail( 'medium' ); ?> 
            </figure>  
          </div> <!-- post-feature is end -->      
    <?php } else {?> <!-- 文章无特色图片 -->
        <div class="zan-outline">          
          <?php if ( !empty($post->post_excerpt) ) { ?>
            <?php the_excerpt() ?>
          <?php } else {?>  
            <?php echo mb_strimwidth( strip_tags( apply_filters( 'the_content', $post->post_content ) ), 0, 250," " ); ?>
          <?php } ?> 
        </div>
    <?php } ?>
      <!-- 文章摘要信息 -->
    <div class="zan-outline">
          <?php if ( !empty($post->post_excerpt) ) { ?>
            <?php the_excerpt() ?>
          <?php } else {?>  
            <?php echo mb_strimwidth( strip_tags( apply_filters( 'the_content', $post->post_content ) ), 0, 180," " ); ?>
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