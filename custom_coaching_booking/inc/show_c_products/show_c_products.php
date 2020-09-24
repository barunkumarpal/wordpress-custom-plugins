<?php
function show_c_products(){
    $args = [
        'post_type' => 'c_product',
        'tax_query' => array(
            array (
                'taxonomy' => 'Product Type',
                'field' => 'slug',
                'terms' => 'coaching'
            )
        )
    ];

    $query = new WP_Query($args);

    if($query->have_posts()){ ?>

    <div class="container">
        <div class="row">     
        

    <?php
        while($query->have_posts()){
            $query->the_post();
            
            include('single_c_product.php');
        } wp_reset_postdata(); ?>

    </div>
        </div>
<?php
    }
}