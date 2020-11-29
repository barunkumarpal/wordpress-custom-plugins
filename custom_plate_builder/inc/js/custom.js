$(document).ready(function(){   


    $('.btn.prod-title').on('click',function(){
        var active_btn = $('.btn.prod-title.active')
        active_btn.removeClass('active')
        $(this).addClass('active')

       
        

        var active_btn = $('.btn.prod-title.active'),            
        plate_type = active_btn.attr('plate_type')           

        if(plate_type !== undefined){
            if(plate_type == 'both'){
                $('.plate_image.front').css('display', 'block')
                $('.plate_image.rear').css('display', 'block')

                $('.plate_image_showcase img#first_view').css('display', 'none')
                $('.plate_image_show').addClass('active') 

                $('.plate_image_show .plate_show#back_img').removeClass('active')
                $('.plate_image_show .plate_show#front_img').removeClass('active')

                $('.plate_image_show .plate_show#front_img').addClass('active')
                $('.plate_image_show .plate_show#back_img').addClass('active')

            }else if(plate_type == 'front'){
                
                $('.plate_image.rear').css('display', 'none')
                $('.plate_image.front').css('display', 'block')

                $('.plate_image_showcase img#first_view').css('display', 'none')
                
                $('.plate_image_show .plate_show#back_img').removeClass('active')
                $('.plate_image_show').addClass('active')                
                $('.plate_image_show .plate_show#front_img').addClass('active')
            }else if(plate_type == 'back'){   
                $('.plate_image.rear').css('display', 'block')
                $('.plate_image.front').css('display', 'none')

                $('.plate_image_show .plate_show#front_img').removeClass('active')
                $('.plate_image_showcase img#first_view').css('display', 'none')
                
                // $('.plate_image_show').attr('src', location.protocol + "//" + location.host+'/ALL_WORDPRESS/numberplates/wp-content/uploads/2020/11/number-rear-plate.png')
                $('.plate_image_show').addClass('active')
                $('.plate_image_show .plate_show#back_img').addClass('active')
            }
        }else{
            // alert('select plate type first')
            $('.notify_alert').addClass('active')
            $('.notify_modal').addClass('active')
            $('.notify_alert .nofity_title').text('Please Select Plate Type')
            return false;
        }
        
        var slogan_text = $('#slogal_text').val(),
        selected_border = $('#border_color').val(),
        badge_name =  $('#badge_name').val(),
        selected_border = $('#border_color').val(),
        text_style = $('#text_style').val()
        

        // Fetch Product Price
        var prod_btn = $('.btn.prod-title.active'),
        prod_id = prod_btn.attr('prod_id') 
        
        var add_to_cart_btn = $('#nplate_add_to_cart')
                        add_to_cart_btn.attr('disabled', true)
        
        var form = {
            action: 'fetch_regular_plate_price',
            prod_id: prod_id,
            border_color: selected_border,
            slogan: slogan_text,
            badge_name: badge_name,
            text_style: text_style             
        }
        
        $.post(cpbn_plugin_ajax.ajax_url, form, function(response){
            
            if(response.status == 1 ){ //alert(response.price)
               var price = response.price
               $('span#plate_price').html('£'+price)
               add_to_cart_btn.removeAttr('disabled')

            }else if(response.status == 0){
                // alert(response.error_message) 
                //alert('failed1')
                // add_to_cart_btn.removeAttr('disabled')

            }else{
                // alert(response.empty_data)
                //alert('failed')
                // add_to_cart_btn.removeAttr('disabled')

            }
            
        })


    })
    $('.front_option').on('click', function(){
        var back_id = $(this).attr('back_id')
        $('.front_option').addClass('hidden')

        $('#'+back_id).addClass('active')
    })
    $('.back_to').on('click', function(){
        var back_id = $(this).attr('back_id')

        $(this).removeClass('active')
        $('.front_option').removeClass('hidden').addClass('active')    

        $('#'+back_id).removeClass('active')
    })
    // Closeups
    $('.close-closeup').on('click',function(){
        $('.closeup.active').removeClass('active')
    })

    $('.text_style_closeup').on('click', function(){ 
        var close_up_id = $(this).attr('close_up_id')        
        $('#'+close_up_id).addClass('active')
    })

   

    // Select Text Style
    $('.text-style-img').on('click',function(){
        $('.text-style-img.selected').removeClass('selected')
        $(this).addClass('selected')
    })

    $('.badge-style-img').on('click',function(){
        $('.badge-style-img.selected').removeClass('selected')
        $(this).addClass('selected')
    })

    $('.border-style-img').on('click',function(){
        $('.border-style-img.selected').removeClass('selected')
        $(this).addClass('selected')
    })

    $('.slogan-style-img').on('click',function(){
        $('.slogan-style-img.selected').removeClass('selected')
        $(this).addClass('selected')
    })

    $('.ok-btn').on('click', function(){
        $('.notify_modal').removeClass('active')
        $('.notify_alert').removeClass('active')
    })
    
})

function closeModal(){
    $('.recomend_modal').removeClass('active')
    $('body').removeClass('modal_active')
  }