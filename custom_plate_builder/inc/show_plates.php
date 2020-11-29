<?php
function show_plates(){?>
   <div class="plate_image_showcase">
       <div class="plate_image_show">
           <div class="plate_image front">
            <div class="text_section">
                <img src="<?php echo plugins_url('/img/cym-badge.png', CPBN_PLUGIN_PATH); ?>" alt="" id="badge_img" class="badge_show simple"/>               

                <img src="<?php echo plugins_url('/img/gb_badge.png', CPBN_PLUGIN_PATH); ?>" alt="" id="badge_img" class="badge_show gb_badge"/>
                <div class="reg_no"></div>   
                <div class="slogan"></div>
            </div>               
            <img src="<?php echo plugins_url('/img/number-front-plate.png', CPBN_PLUGIN_PATH); ?>" alt="" id="front_img" class="plate_show"/>
           </div>
           <div class="plate_image rear">
               <div class="text_section">
                    <img src="<?php echo plugins_url('/img/cym-badge.png', CPBN_PLUGIN_PATH); ?>" alt="" id="badge_img" class="badge_show simple"/>                
                                
                    <img src="<?php echo plugins_url('/img/gb_badge.png', CPBN_PLUGIN_PATH); ?>" alt="" id="badge_img" class="badge_show gb_badge"/>                
                    <div class="reg_no"></div>
                    <div class="slogan"></div>
               </div>               
                <img src="<?php echo plugins_url('/img/number-rear-plate.png', CPBN_PLUGIN_PATH); ?>" alt="" id="back_img" class="plate_show"/>                
                <!-- <img src="//localhost/ALL_WORDPRESS/numberplates/wp-content/uploads/2020/11/number-rear-plate.png" alt="" id="back_img" class="plate_show"/>                 -->
           </div>
       </div>
       <img src="<?php echo plugins_url('/img/your_reg_banner.png', CPBN_PLUGIN_PATH); ?>" alt="" id="first_view">
   </div>
<?php }