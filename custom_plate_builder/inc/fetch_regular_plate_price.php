<?php
function  fetch_regular_plate_price(){


$output['status'] = 0;
$output['price'] = 0;

 $args = [
    'post_type' => 'product',         
    'product_cat'   => 'numberplate',
    'post_status' => 'publish',
    'p' => $_POST['prod_id']    
    
];
$query = new WP_Query($args);
$price = [];
if($query->have_posts()){ 
    while($query->have_posts()){
        $query->the_post();
        // global $product;

        // $price[] = WC()->cart->get_product_price( $product );

        
        // $output['price'] = $price[0];

        if( get_field('plate_price') ){ 

            $output['price'] = get_field('plate_price');   
            $output['status'] = 1;  
           
        } 
        

    } wp_reset_postdata();

    // Border Price Calculate
    if(isset($_POST['border_color']) && !empty($_POST['border_color']) && $_POST['border_color'] !== 'none'){
        if( get_field('border', 'option') ){ 
            $border =get_field('border', 'option');
            $border_color_price = $border['border_color'];     

            $output['price'] = $output['price'] + $border_color_price;
        } 
    }
// Slogan Price Calculate
    if(isset($_POST['slogan']) && !empty($_POST['slogan']) && $_POST['slogan'] !== 'none' && $_POST['slogan'] !== ''){
        if( get_field('slogan', 'option') ){ 
            $slogan =get_field('slogan', 'option');
            $slogan_price = $slogan['slogan_price'];     

            $output['price'] = $output['price'] + $slogan_price;
        } 
    }
// Badge Price Calculate
    if(isset($_POST['badge_name']) && !empty($_POST['badge_name']) && $_POST['badge_name'] !== 'none' && $_POST['badge_name'] !== ''){
        $badge = $_POST['badge_name'];
        
        if($badge == 'standard_uk_car_gb_badge'){
            if( get_field('badge_old', 'option') ){ 
                $badge_field =get_field('badge_old', 'option');
                $badge_price = $badge_field['badge_price'];     
    
                $output['price'] = $output['price'] + $badge_price;
            }
        }else{
            if( have_rows('badge', 'option') ){
                while( have_rows('badge', 'option') ) { the_row();                
                  
                    $badge_name = get_sub_field('badge_name');
                    
    
                    if($badge_name == $badge){
                        $price = get_sub_field('price');
                        $output['price'] = $output['price'] + $price;
                    }                   
                
                }  
            } 
        }        

    }
// Text Style Price Calculate
    if(isset($_POST['text_style']) && !empty($_POST['text_style']) && $_POST['text_style'] !== 'none' && $_POST['text_style'] !== ''){
        // if( get_field('text_style', 'option') ){ 
            
        //     $text_style_g_field =get_field('text_style', 'option');

            $text_style = $_POST['text_style'];

        //     $text_style_price = $text_style_g_field["$text_style"];     

        //     $output['price'] = $output['price'] + $text_style_price;
        // } 

        if( have_rows('text_style', 'option') ){
            while( have_rows('text_style', 'option') ) { the_row();
                $title = get_sub_field('title');

                if($title == $text_style){
                    $price = get_sub_field('price');
                    $output['price'] = $output['price'] + $price;
                }
            }
        }

    }
    
}

wp_send_json($output);
}