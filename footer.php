<?php
/**
 * Footer 主题文件
 *
 * @package    YEAHZAN
 * @subpackage ZanBlog
 * @since      ZanBlog 3.0.2
 */
?>

<footer id="zan-footer">
	<section class="zan-link" id="zan-link">
		<div class="container">
      <div class="row">
          <div class="col-md-12">
         <div class="container">
          <p class="pull-left">版权说明</p>
            <nav class="navbar-collapse bs-navbar-collapse collapse in pull-right" role="navigation" aria-expanded="true">
                 <ul class="nav navbar-nav" id="menu-top_menu">       
                 <!-- footer_menu items -->
                <?php
                  $defaults = array(  
                    'container' => '',
                    'walker' => new Zan_Nav_Menu(''),
                    'items_wrap' => '%3$s'
                  );
                  wp_nav_menu( $defaults );
                ?>
				         <li><a href="#">沐肆洲动态</a></li>
				
               </ul>
             </nav>
         </div>
        </div>
         
        
      </div>
  	</div>
	</section>
</footer>
<?php wp_footer(); ?>