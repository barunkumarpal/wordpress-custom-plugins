<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
    die;
}
if(!function_exists('add_action')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
    die;
}?>
<?php 
    $first_tab = get_field('first_portfolio_tab_id', 'option');
?>
<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <?php if(have_rows('portfolio_tabs', 'option')){ while( have_rows('portfolio_tabs', 'option') ){ the_row();?>
        <li class="nav-item">
        <a class="nav-link <?php echo get_sub_field('tab_id') == $first_tab? 'active':'';?>" href="#<?php echo get_sub_field('tab_id'); ?>"><?php echo get_sub_field('tab_title'); ?></a>
        </li>   
    <?php } } ?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <?php if(have_rows('portfolio_tabs', 'option')){ while( have_rows('portfolio_tabs', 'option') ){ the_row();
        $current_tab = get_sub_field('tab_id');
    ?>
        <div id="<?php echo get_sub_field('tab_id'); ?>" class="container tab-pane <?php echo get_sub_field('tab_id') == $first_tab? 'active':'';?>" href="#<?php echo get_sub_field('tab_id'); ?>"><br>

        <?php if(have_rows('portfolio_items', 'option')){ ?>
            
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    
        <?php while( have_rows('portfolio_items', 'option') ){ the_row();
            if($current_tab == get_sub_field('tab_id')){
        ?>
            
                    <div class="swiper-slide portfolio_item">
                        <?php echo get_sub_field('title'); ?>

                        <?php if( !empty(get_sub_field('image')) ){?>
                            <img src="<?php echo get_sub_field('image'); ?>" alt="">
                        <?php } ?>

                        <?php if( !empty(get_sub_field('link')) ){?>
                            <a href="<?php echo get_sub_field('link'); ?>" class="btn btn-primary">View</a>
                        <?php } ?>
                    </div>               
                
        <?php } } ?>
                </div>        
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>            
            </div>
    
        <?php } ?>

           
        </div>
    <?php } } ?>    
</div>