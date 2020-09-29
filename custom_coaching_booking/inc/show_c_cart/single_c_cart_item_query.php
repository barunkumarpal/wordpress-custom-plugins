<?php

    $args = [
        'post_type' => 'c_product',
        'post_id' => $item_id       
       
    ];

    $query = new WP_Query($args);

    if($query->have_posts()){ ?>

        
        

    <?php
        while($query->have_posts()){
            $query->the_post();
            
            include('single_c_cart_item.php');
        } wp_reset_postdata(); ?>


<?php
    }
