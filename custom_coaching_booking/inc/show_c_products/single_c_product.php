<div class="col-md-6">
    <div class="single-box" id="c_prod-<?php echo get_the_ID(); ?>">
        <?php
        if(get_the_post_thumbnail( get_the_ID(), 'full' )){
            echo get_the_post_thumbnail( get_the_ID(), 'full' );
        }         
        ?>
        <h3><?php the_title(); ?></h3>

        <p>Price: $<?php if(get_field('c_price')){ echo get_field('c_price');} ?></p>

        <select id="installment">      
        

       <?php if(have_rows('installments')){
            while(have_rows('installments')){
                the_row();
                $sub_value = get_sub_field('installment_type');

                ?>
                    <option value="<?php echo $sub_value; ?>"><?php echo $sub_value; ?></option>
                <?php
            }
        }?>

        </select>
        <input type="number" min="1" id="c_prod_qty">

        <button id="add_to_cart_coaching" data-id="<?php echo get_the_ID(); ?>" data-user="<?php echo get_current_user_id(); ?>">Add to Cart</button>
    </div>
</div>