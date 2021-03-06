<?php
function show_c_cart(){
    global $wpdb;
   $current_user = get_current_user_id();

  $table_name = $wpdb->prefix . "custom_cart";

  $sql = "SELECT * FROM $table_name WHERE user_id='$current_user'";

  $cart = $wpdb->get_results( $sql );
?>
    <div class="container">
        <div class="row"> 
        
        <?php

        foreach ($cart as $item){     

            $cart_id = $item->cart_id;
            $item_id = $item->product_id;
            $item_qty = $item->product_qty;
            $item_inst = $item->installments;

            include('single_c_cart_item_query.php');
            
            
            } 
        ?>
        <div class="col-md-12 text-center">        
            <button id="custom_cart_order_now" class="btn btn-info" data-id="<?php echo $current_user; ?>">Order Now</button>
        </div>
        </div>
    </div>

  
<?php }

 