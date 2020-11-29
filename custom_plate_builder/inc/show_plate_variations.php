<?php

function show_plate_variations(){?>
<div class="variations">
    <div class="your_reg_front front_option" back_id="your_reg_input">
        <p class="title">1 Your Reg
            <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_into_img">
        </p>
    </div>
    <div class="your_reg_input back_option" id="your_reg_input">
        <div class="back_to" back_id="your_reg_input" >
            <p class="title">
                <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_back_img">
            Back to the builder</p>
        </div>
        <div class="input_section">
            <p class="title section_title">Enter your registration number below:</p>
            <input type="text" class="text" id="you_reg_no"/>
            <p class="desc section_desc">Please remember to enter your spaces where they need to be as they aren't automatically added.</p>
        </div>
        <button class="continue" back_id="your_reg_input" id="you_reg_submit">Continue
            <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_back_img">
        </button>
    </div>

    <div class="plate_size_front front_option"  back_id="plate_size_input">
        <p class="title">2 Plate Size
            <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_into_img">
        </p>
    </div>
    <div class="plate_size_input back_option" id="plate_size_input">
        <div class="back_to" back_id="plate_size_input" >
            <p class="title">
                <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_back_img">
            Back to the builder</p>
        </div>
        <div class="input_section">
            <p class="title section_title">Choose a size from below:</p>
            <select name="" id="plate_size_input">
                <option value="standard_uk_car">Standard Uk Car</option>
                <option value="standard_uk_car_gb_badge">Standard UK car - GB Badge</option>
            </select>
            <p class="desc section_desc">Most UK cars will require the standard car plate (522mm wide x 112mm high). Some are model specific which you'll see listed here.</p>
        </div>
        <button class="continue" id="plate_size_submit">Continue
            <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_back_img">
        </button>
    </div>

    <div class="text_style_front front_option" back_id="text_style_input">
        <p class="title">3 Text Style
            <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_into_img">
        </p>
    </div>
    <div class="text_style_input back_option" id="text_style_input">
        <div class="back_to" back_id="text_style_input" >
            <p class="title">
                <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_back_img">
            Back to the builder</p>
        </div>
        <div class="input_section">
            <p class="title section_title">Choose a text style from below:</p>
            <div class="tex-style-sec image-list">

            <?php
            if( have_rows('text_style', 'option') ):

                // Loop through rows.
                while( have_rows('text_style', 'option') ) : the_row();
            
                    // Load sub field value.
                    $title = get_sub_field('title');
                    $front_image = get_sub_field('front_image');
                    $closeup_id = get_sub_field('closeup_id');
                    $closeup_image = get_sub_field('closeup_image');
                    $text_style_class = get_sub_field('text_style_class');
                    // Do something...
?>
                    <div class="image">
                        <img src="<?php echo $front_image; ?>" alt="" text_style_name="<?php echo $title; ?>" text_style_class="<?php echo $text_style_class; ?>" data-id="1" class="text-style-img">
                    </div>
                    <div class="desc-row">
                        <div class="left">
                            <p class="title"><?php echo $title; ?></p>
                        </div>
                        <div class="right">
                            <p class="btn btn-primary text_style_closeup" close_up_id="<?php echo  $closeup_id; ?>">
                                <img src="<?php echo plugins_url('/img/zoom-in.png', CPBN_PLUGIN_PATH); ?>" alt="" class="zoom_in_close">
                                Close Up
                            </p>                        
                            <!-- The Closeup -->
                            <div class="closeup" id="<?php echo  $closeup_id; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">     

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <img src="<?php echo $closeup_image; ?>" alt="">
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer text-right">
                                        <button type="button" class="btn btn-danger close-closeup">&times;</button>
                                    </div>

                                    </div>
                                </div>
                            </div><!-- /Closeup -->

                        </div>
                    </div>
            
<?php                // End loop.
                endwhile;
            
            // No value.
            else :
                // Do something...
            endif;
            ?>              


            </div> 
        </div>       
        <button class="continue" id="text_style_submit">Continue
         <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_back_img">
        </button>
    </div>

    <!-- Badges -->
    <div class="badge_style_front front_option" back_id="badge_style_input">
        <p class="title">4 Badge
            <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_into_img">
        </p>
    </div>
    <div class="badge_style_input back_option" id="badge_style_input">
        <div class="back_to" back_id="badge_style_input" >
            <p class="title">
                <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_back_img">
            Back to the builder</p>
        </div>
        <div class="input_section">
            <p class="title section_title">Choose a Badge from below:</p>
                <div class="tex-style-sec image-list">
                    <div class="badge border brdr_white">
                        <img src="<?php echo plugins_url('/img/border-none.png', CPBN_PLUGIN_PATH); ?>" alt="" badge_name="None" badge_img="" class="badge-style-img style_select_image">
                    </div>
                <?php 
                     if( have_rows('badge', 'option') ){
                        while( have_rows('badge', 'option') ) { the_row(); 
                            
                            $list_image = get_sub_field('list_image');
                            $badge_name = get_sub_field('badge_name');
                            $badge_img = get_sub_field('badge_image');
                        
                        ?>
                            <div class="badge border brdr_white">
                                <img src="<?php echo $list_image; ?>" alt="" badge_name="<?php echo $badge_name; ?>" badge_img="<?php echo $badge_img; ?>" class="badge-style-img style_select_image">
                            </div>
                  <?php   }  }  ?>
                    
                </div>        
            </div>
            <button class="continue" id="badge_style_submit">Continue
            <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_back_img">
        </button>
    </div>

    <!-- Border -->
    <div class="border_style_front front_option" back_id="border_style_input">
        <p class="title">5 Border
            <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_into_img">
        </p>
    </div>
    <div class="border_style_input back_option" id="border_style_input">
        <div class="back_to" back_id="border_style_input" >
            <p class="title">
                <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_back_img">
            Back to the builder</p>
        </div>
        <p class="title section_title">Choose Border from below:</p>
            <div class="tex-style-sec image-list">
                <!-- border 1 -->
                <div class="border brdr_white">
                    <img src="<?php echo plugins_url('/img/border-none.png', CPBN_PLUGIN_PATH); ?>" alt="" border_id="none" class="border-style-img style_select_image">
                </div> 
                <div class="border brdr_white">
                    <img src="<?php echo plugins_url('/img/border-black.png', CPBN_PLUGIN_PATH); ?>" alt="" border_id="black" class="border-style-img style_select_image">
                </div>   
                  
            </div>        
        <button class="continue" id="border_style_submit">Continue
            <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_back_img">
        </button>
    </div>

    <!-- Slogan -->
    <div class="slogan_style_front front_option" back_id="slogan_style_input">
        <p class="title">6 Slogan
            <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_into_img">
        </p>
    </div>
    <div class="slogan_style_input back_option" id="slogan_style_input">
        <div class="back_to" back_id="slogan_style_input" >
            <p class="title">
                <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_back_img">
            Back to the builder</p>
        </div>
        <div class="input_section">
            <input type="text" placeholder="Type your slogan here" id="slogal_text">
            <p class="title section_title">Choose slogan colour from below:</p>
            <div class="slogan_color_sec slogan-color-list">
                <!-- slogan colour 1 -->
                <div class="slogan">
                    <img src="<?php echo plugins_url('/img/border-black.png', CPBN_PLUGIN_PATH); ?>" alt="" slogan_id="black" class="slogan-style-img style_select_image selected">
                </div>   
            </div> 
        </div>       
        <button class="continue" id="slogan_color_submit">Continue
            <img src="<?php echo plugins_url('/img/right.png', CPBN_PLUGIN_PATH); ?>" alt="" class="go_back_img">
        </button>
    </div>
</div>
<?php }