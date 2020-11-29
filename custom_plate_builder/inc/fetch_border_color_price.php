<?php
function fetch_border_color_price(){
    $output['status'] = 0;
    $border_color_price = 0;
    $regular_price = 0;

    $border_color = $_POST['border_color'];

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
    
            // $output['status'] = 1;
            // $regular_price = $price[0];

            // $regular_price = strip_tags($regular_price);

            // preg_match_all('!\d+!', $regular_price, $matches);

            // $regular_price = $matches;

            // $regular_price = number_format($regular_price, 2);

            if( get_field('plate_price') ){ 

                $regular_price =get_field('plate_price');       
               
            } 
   
        } wp_reset_postdata();
    }
    
    
    if( get_field('border', 'option') ){ 

        $border =get_field('border', 'option');
        $border_color_price = $border['border_color'];
       
    }    
    

        if(isset($_POST['plate_count']) && $_POST['plate_count'] >= 1 && $border_color_price > 0){
            $border_color_price =  $border_color_price * $_POST['plate_count'];
        }

       
        

        if( $border_color !== 'none'){
            $output['status'] = 1;
            $output['price'] = $border_color_price + $regular_price ;
            // $output['price'] = $border_color ;
        }
        else if( $border_color == 'none'){
            $output['status'] = 1;
            $output['price'] = $regular_price;
            // $output['price'] = 500;
        }
   
       

     

    wp_send_json($output);
}
