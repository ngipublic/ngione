<?php
/**
 * ZanBlog 幻灯片组件
 *
 * @package    ZanBlog
 * @subpackage Widget
 */
 
class Zan_Slide extends WP_Widget {

  // 设定小工具信息
  function Zan_Slide() {
    $widget_options = array(
          'name'        => '幻灯片组件（ZanBlog）', 
          'description' => 'ZanBlog 幻灯片组件' 
    );
    parent::WP_Widget( false, false, $widget_options );  
  }

  // 设定小工具结构
  function widget( $args, $instance ) {  
  	extract( $args );
    @$id = $instance['id'] ? $instance['id'] : '';
    $args = array(
      'numberposts' => 6, // 最多获取6篇文章作为幻灯片
      'category' => $id,
    );
    $postQuery = get_posts( $args );
    echo $before_widget;
    ?>
 <div class="flexslider hidden-xs">
      <ul class="slides">
      <?php
          foreach ( $postQuery as $post ) {
      ?>
        <li>

<div class="col-md-12">
    <div class="row">
    <div class="col-md-8">
     <a href="<?php echo get_permalink($post->ID);?>">
    <?php echo get_the_post_thumbnail($post->ID, array(500,265)); ?>
    </a>


    </div>
  <div class="col-md-4">
  <a href="<?php echo get_permalink($post->ID);?>">
  <div style="font-size:19px;" class="slider-post-title"><?php echo $post->post_title ?>
  </div> 
  </a><br/> 
  <div style="font-size:13px;"><?php echo wp_trim_words($post->post_excerpt,80);?></div>
  </div>
  </div>
</div>

</li>
 <?php }?>
      </ul>
    </div>
    <?php
    echo $after_widget;
  }

  function update( $new_instance, $old_instance ) {                
     return $new_instance;
  }

  function form( $instance ) {        
    @$id = esc_attr( $instance['id'] );
    ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'id' ); ?>">
          文章分类ID：
          <input class="widefat"  name="<?php echo $this->get_field_name( 'id' ); ?>" type="text" value="<?php echo $id; ?>" />
        </label>
      </p>
    <?php 
  }
} 

register_widget( 'Zan_Slide' );
?>
