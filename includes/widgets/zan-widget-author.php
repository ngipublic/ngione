<?php
/**
 * ZanBlog 作者组件
 *
 * @package    ZanBlog
 * @subpackage Widget
 */
 
class Zan_Author extends WP_Widget {

  // 设定小工具信息
  function Zan_Author() {
    $widget_options = array(
          'name'        => '作者文章组件（ZanBlog）', 
          'description' => 'ZanBlog 作者文章展示组件' 
    );
    parent::WP_Widget( false, false, $widget_options );  
  }

  // 设定小工具结构
  function widget( $args, $instance ) {  
  	extract( $args );
    @$title = $instance['title'] ? $instance['title'] : '作者相关文章';
    @$num = $instance['num'] ? $instance['num'] : 5;    
    echo $before_widget;
    ?>

    <div class="panel panel-zan hidden-xs">
      <div class="panel-body"> 
       <div class="zan-author text-center"> 
        <div class="author-top"></div>
        <div class="author-bottom">
          <?php echo get_avatar( get_the_author_meta( 'email' ), '120' ); ?>
          <!-- <div class="author-content">
            <span class="author-name"><?php echo get_the_author_meta( 'display_name' ); ?></span>
          </div> -->
        </div>
        </div>
        <div>
          <ul class="list-group">
            <?php 
              // 设置全局变量，实现post整体赋值
              global $post;
              $posts = get_author_related_posts( $num );
              foreach ( $posts as $post ) :
              setup_postdata( $post );
            ?>
              <li class="zan-list clearfix">
                <figure class="thumbnail zan-thumb">
                  <?php the_post_thumbnail( array(75,75) ); ?>
                </figure>
                <a href="<?php the_permalink();?>">
                 <h5><?php the_title();?></h5>
                </a>
                <div class="sidebar-info">
                  <span><i class="fa fa-calendar"></i> <?php the_time( 'm月j日, Y' ); ?></span>
                  <!-- <span><i class="fa fa-comment"></i> <a href="<?php the_permalink() ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></span> -->
                <!--   <span><i class="fa fa-eye"></i> <?php if( function_exists( 'the_views' ) ) { the_views(); print '次'; } ?></span> -->
                </div>
              </li>
            <?php
              endforeach;
              wp_reset_postdata();
            ?>
          </ul>            
          </div>
        </div>
    </div>

    <?php
    echo $after_widget;
  }

  function update( $new_instance, $old_instance ) {                
     return $new_instance;
  }

  function form($instance) {        
    @$title = esc_attr( $instance['title'] );
    @$num = esc_attr( $instance['num'] );
    ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">
          标题（默认作者相关文章）：
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </label>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'num' ); ?>">
          显示文章条数（默认显示5条）：
          <input class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" type="text" value="<?php echo $num; ?>" />
        </label>
      </p>
    <?php 
  }
} 

register_widget( 'Zan_Author' );
?>
