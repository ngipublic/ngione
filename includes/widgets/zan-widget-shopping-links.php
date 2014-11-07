<?php
/**
 * ZanBlog 商品购买链接组件
 *
 * @package    ZanBlog
 * @subpackage Widget
 */
 
class Zan_Shopping_Links extends WP_Widget {

  // 设定小工具信息
  function Zan_Shopping_Links() {
    $widget_options = array(
          'name'        => '商品购买链接（ZanBlog）', 
          'description' => 'ZanBlog 商品购买链接组件' 
    );
    parent::WP_Widget( false, false, $widget_options );  
  }

  // 设定小工具结构
  function widget( $args, $instance ) {  
  	extract($args);
    @$title = $instance['title'] ? $instance['title'] : '去哪儿买';
    echo $before_widget;
    ?>
      <div class="panel panel-zan hidden-xs">
        <div class="panel-heading"><?php echo $title; ?></div>
        <div class="panel-body">
          <ul class="list-group">
        
          </ul>
          <table class="shopping-links table table-hover">
      <thead>
        <tr>
          <th>状态</th>
          <th>价格</th>
          <th>商城</th>
          <th>入口</th>
        </tr>
      </thead>
      <tbody>
		<?php 
            $jingdong_price = get_post_meta(get_the_ID(),'jingdong_price',true); 
            $jingdong_shopping_url = get_post_meta(get_the_ID(),'jingdong_shopping_url',true);
        	$amazon_price = get_post_meta(get_the_ID(),'amazon_price',true); 
            $amazon_shopping_url = get_post_meta(get_the_ID(),'amazon_shopping_url',true);
			$taobao_price = get_post_meta(get_the_ID(),'taobao_price',true); 
            $taobao_shopping_url = get_post_meta(get_the_ID(),'taobao_shopping_url',true);
			$guanfang_price = get_post_meta(get_the_ID(),'guanfang_price',true); 
            $guanfang_shopping_url = get_post_meta(get_the_ID(),'guanfang_shopping_url',true);
        ?>
        
        <?php if($guanfang_price) {?>        
        <tr>
          <td>在售</td>
          
          <td><?php echo $guanfang_price; ?></td>
          <td>京东</td>
          <td><a href="<?php echo $guanfang_shopping_url; ?>">点&nbsp;我</a></td>
        </tr>
          <?php } ?>

        <?php if($taobao_price) {?>        
        <tr>
          <td>在售</td>
          
          <td><?php echo $taobao_price; ?></td>
          <td>淘宝</td>
          <td><a href="<?php echo $taobao_shopping_url; ?>">点&nbsp;我</a></td>
        </tr>
          <?php } ?>
<?php if($amazon_price) {?>        
        <tr>
          <td>在售</td>
          
          <td><?php echo $amazon_price; ?></td>
          <td>亚马逊</td>
          <td><a href="<?php echo $amazon_shopping_url; ?>">点&nbsp;我</a></td>
        </tr>
          <?php } ?>          
<?php if($jingdong_price) {?>        
        <tr>
          <td>在售</td>
          
          <td><?php echo $jingdong_price; ?></td>
          <td>京东</td>
          <td><a href="<?php echo $jingdong_shopping_url; ?>">点&nbsp;我</a></td>
        </tr>
          <?php } ?>          
      </tbody>
    </table>
        </div>
      </div>
    <?php
    echo $after_widget;
  }

  function update($new_instance, $old_instance) {                
     return $new_instance;
  }

  function form($instance) {        
    @$title = esc_attr( $instance['title'] );
    ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">
          标题（默认去哪儿买）：
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </label>
      </p>

    <?php 
  }
} 

register_widget( 'Zan_Shopping_Links' );
?>
