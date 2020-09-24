<div class="col-md-6">
    <div class="single-box" data-id="<?php echo get_the_ID(); ?>">
    <button class="btn btn-primary c_cart_remv" data-id="<?php echo $cart_id; ?>">Remove</button>
           <?php
        if(get_the_post_thumbnail( get_the_ID(), 'full' )){
            echo get_the_post_thumbnail( get_the_ID(), 'full' );
        }         
        ?>
        <h3><?php the_title(); ?></h3>

        <p>Price: $<?php if(get_field('c_price')){ echo get_field('c_price');} ?></p>


        </select>
        <p>Quantity: <?php echo $item_qty; ?></p>
        <br><br>
        
        
    </div>
</div>