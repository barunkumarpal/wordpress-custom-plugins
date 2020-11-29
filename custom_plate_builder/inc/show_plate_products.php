<?php
function show_woo_plate_products(){   ?>   
    
    <?php 
    $args = [
        'post_type' => 'product',         
        'product_cat'   => 'numberplate',
        'post_status' => 'publish'
    ];
    $query = new WP_Query($args);

    if($query->have_posts()){ ?>
    <div class="plates_section">
        <div class="left_section_btns">
            <div class="plates-req">
                <h5 class="title">Plates Required:</h5>
            </div>
        <?php
        while($query->have_posts()){
            $query->the_post(); 

            $plate_count = 0;

            if(get_field('plate_count')){
                $plate_count = get_field('plate_count');
            }
            if(get_field('plate_type')){
                $plate_type = get_field('plate_type');
            }
            
            ?>

            <button class="btn btn-dark plate_prod prod-title" plate_type="<?php echo $plate_type; ?>" plates="<?php echo $plate_count; ?>" prod_url="<?php echo get_the_permalink();?>" prod_id="<?php echo get_the_ID();?>"><?php echo get_the_title();?></button>
            

<?php  } wp_reset_postdata(); global $product; ?>

    </div>
    <div class="right_section_btns">
        <div class="plate_price">Price: <span id="plate_price">Select Plate Type</span></div>
        <div class="add_to_cart_bt_sec">    
            <button id="nplate_add_to_cart" name="add-to-cart" prod_id="<?php echo get_the_ID(); ?>">
            <img src="<?php echo plugins_url('/img/shopping-cart.png', CPBN_PLUGIN_PATH); ?>" alt="">
            Add to Cart</button>
        </div>
    </div>
</div><!-- Plates Section end -->



<!-- <form id="my_plate_add_to_cart" class="cart" action="" method="post" enctype='multipart/form-data'> -->
		
<input type="hidden" placeholder="reg_no" id="reg_no" name="reg_no" />
<input type="hidden" placeholder="plate_size" id="plate_size" name="plate_size" />
<input type="hidden" placeholder="text_style" id="text_style" name="text_style" />
<input type="hidden" placeholder="badge_name" id="badge_name" name="badge_name" />
<input type="hidden" placeholder="border_color" id="border_color" name="border_color" />
<input type="hidden" placeholder="slogan_color" id="slogan_color" name="slogan_color"/>
<input type="hidden" placeholder="slogan_text" id="slogan_text" name="slogan_text" />

<!-- 		
</form>     -->

<?php }



// $output['status'] = 0;
//     $border_color_price = 0;
//     $regular_price = 0;

//     $args = [
//         'post_type' => 'product',         
//         'product_cat'   => 'numberplate',
//         'post_status' => 'publish',
//         'p' => 278    
        
//     ];
//     $query = new WP_Query($args);
//     $price = [];
//     if($query->have_posts()){ 
//         while($query->have_posts()){
//             $query->the_post();
//             global $product;
    
//             $price[] = WC()->cart->get_product_price( $product );
    
//             $output['status'] = 1;
//             $regular_price = $price[0];

//             $regular_price = strip_tags($regular_price);
//             $regular_price = htmlspecialchars($regular_price);
//             $regular_price = esc_html( $regular_price );

//             // preg_match_all('!\d+!', $regular_price, $matches);

//             // $regular_price = $matches;

//             // $regular_price = (int)$regular_price;
   
//         } wp_reset_postdata();
//     }

//     $output['price'] = $regular_price ;

// $data =  $output['price'];
// print_r($regular_price);


}