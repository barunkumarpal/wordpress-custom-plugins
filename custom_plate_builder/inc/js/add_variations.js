$(document).ready(function(){

    $('input#border_color').val('')
    $('#slogal_text').val('')
    $('#badge_name').val('')

    $('#you_reg_submit').on('click',function(){
        var reg_no = $('#you_reg_no').val()          

        

        var active_btn = $('.btn.prod-title.active'),
            plates = active_btn.attr('plates'),
            prod_id = active_btn.attr('prod_id')            

            if(plates !== undefined){

                if (reg_no.length <= 3) {
                    $('.notify_modal').addClass('active')
                    $('.notify_alert').addClass('active')
                    $('.notify_alert .nofity_title').text('Please enter a valid registration no. More than 4 characters are allowed.')
                    // alert("Please enter a valid registration no. More than 4 characters are allowed.");   
                    return false; 
                }    
                else if ( reg_no.length >= 9) {
                    $('.notify_modal').addClass('active')
                    $('.notify_alert').addClass('active')
                    $('.notify_alert .nofity_title').text('Please enter a valid registration no. within 8 characters')
                    // alert("Please enter a valid registration no. within 8 characters");   
                    return false; 
                }else{
                    $('#reg_no').val(reg_no)

                    $('#your_reg_input').removeClass('active')
                    $('.front_option').removeClass('hidden').addClass('active')
    
                   
                    $('.plate_image_showcase .plate_image_show .reg_no').html('<p>'+reg_no+'</p>')
                }  
                
            }else{
                $('.notify_modal').addClass('active')
                $('.notify_alert').addClass('active')
                $('.notify_alert .nofity_title').text('Please select plate type first')
                // alert('select plate type first')
                return false;
            }
    })

    $('#plate_size_submit').on('click', function(){

        

        var active_btn = $('.btn.prod-title.active'),
            plates = active_btn.attr('plates'),
            prod_id = active_btn.attr('prod_id')            

            if(plates !== undefined){
                var plate_size = $('#plate_size_input option:selected').val()
                $('#plate_size').val(plate_size)

                var plate_size = $('#plate_size').val()
                if(plate_size == 'standard_uk_car_gb_badge'){ 
                    $('#badge_name').val(plate_size)

                    $('.badge_show').removeClass('active')              
                    $('.badge_show.gb_badge').addClass('active')
                    $('.plate_image_showcase .plate_image').addClass('badge_active')

                    $('.badge_style_front.front_option').css('display', 'none')
                    $('.badge_style_input.back_option').css('display', 'none')
                }else{
                    $('#badge_name').val('')
                    $('.badge_style_front.front_option').css('display', 'block')
                    $('.badge_style_input.back_option').css('display', 'block')

                    $('.badge_show').removeClass('active') 
                    $('.plate_image_showcase .plate_image').removeClass('badge_active')
                }



                $('#plate_size_input').removeClass('active')
                $('.front_option').removeClass('hidden').addClass('active')
        
        
                var slogan_text = $('#slogal_text').val(),
                        selected_border = $('#border_color').val(),
                        badge_name =  $('#badge_name').val(),
                        selected_border = $('#border_color').val(),
                        text_style = $('#text_style').val()                        
                       
                        var add_to_cart_btn = $('#nplate_add_to_cart')
                        add_to_cart_btn.attr('disabled', true)

                        var form = {
                            action: 'fetch_regular_plate_price',
                            plate_count: plates,
                            prod_id: prod_id,
                            border_color: selected_border,
                            slogan: slogan_text,
                            badge_name: badge_name,
                            text_style: text_style  
                        }
                        
                        $.post(cpbn_plugin_ajax.ajax_url, form, function(response){ //alert(response)
                            //alert(response.price)
                            
                            if(response.status == 1 ){ 
                            var price = response.price
                            
                            var old_price = $('span#plate_price').html('£'+price)

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



            }else{
                $('.notify_modal').addClass('active')
                $('.notify_alert').addClass('active')
                $('.notify_alert .nofity_title').text('Please select plate type first')
                // add_to_cart_btn.removeAttr('disabled')
                return false;
            }      


    })

    $('#text_style_submit').on('click', function(){ 
        var active_btn = $('.btn.prod-title.active'),
            plates = active_btn.attr('plates'),
            prod_id = active_btn.attr('prod_id')            

            if(plates !== undefined){
                var selected_style_img = $('.text-style-img.selected').attr('text_style_name')              
                var selected_style_class = $('.text-style-img.selected').attr('text_style_class')              

               

                var reg_numbers = /^[A-Za-z 0-9]+$/;
                var reg_no = $('#you_reg_no').val()

                if(!reg_no.match(reg_numbers)){
                    $('.notify_modal').addClass('active')
                    $('.notify_alert').addClass('active')
                    $('.notify_alert .nofity_title').text('Please type your registration no first')
                    // alert('Please type your registration no first')
                }else{

                    $('#text_style').val(selected_style_img)
        
                    $('#text_style_input').removeClass('active')
                    $('.front_option').removeClass('hidden').addClass('active')
    
                    $('.plate_image_showcase .reg_no p').removeAttr('class')
                  
    
                    $('.plate_image_showcase .reg_no p').addClass(selected_style_class)
    
                    var slogan_text = $('#slogal_text').val(),
                    selected_border = $('#border_color').val(),
                    badge_name =  $('#badge_name').val(),
                    selected_border = $('#border_color').val(),
                    text_style = $('#text_style').val()
    
                    var add_to_cart_btn = $('#nplate_add_to_cart')
                        add_to_cart_btn.attr('disabled', true)
    
                    var form = {
                        action: 'fetch_regular_plate_price',
                        plate_count: plates,
                        prod_id: prod_id,
                        border_color: selected_border,
                        slogan: slogan_text,
                        badge_name: badge_name,
                        text_style: text_style 
                    }
                    
                    $.post(cpbn_plugin_ajax.ajax_url, form, function(response){ //alert(response)
                        //alert(response.price)
                        
                        if(response.status == 1 ){ 
                        var price = response.price
                        
                        var old_price = $('span#plate_price').html('£'+price)
                        add_to_cart_btn.removeAttr('disabled')
                        }else if(response.status == 0){
                            // alert(response.error_message) 
                            $('.notify_modal').addClass('active')
                            $('.notify_alert').addClass('active')
                            $('.notify_alert .nofity_title').text('Process Failed! Please try again')
                            // add_to_cart_btn.removeAttr('disabled')
                        }else{
                            // alert(response.empty_data)
                            $('.notify_modal').addClass('active')
                            $('.notify_alert').addClass('active')
                            $('.notify_alert .nofity_title').text('Process Failed! Please try again')
                            // add_to_cart_btn.removeAttr('disabled')
                        }
                        
                    })
                }               

            }else{
                $('.notify_modal').addClass('active')
                $('.notify_alert').addClass('active')
                $('.notify_alert .nofity_title').text('Please select plate type first')
                // add_to_cart_btn.removeAttr('disabled')
                // alert('select plate type first')
                return false;
            }
        
    })

    $('#badge_style_submit').on('click', function(){ 
        var active_btn = $('.btn.prod-title.active'),
            plates = active_btn.attr('plates'),
            prod_id = active_btn.attr('prod_id')            

            if(plates !== undefined){
                $('.badge_show').removeClass('active')

                var selected_badge = $('.badge-style-img.selected').attr('badge_name')              
                var selected_badge_img = $('.badge-style-img.selected').attr('badge_img')              

                $('#badge_name').val(selected_badge)

                var badge_name =  $('#badge_name').val()
                if(badge_name =='none'){
                    $('.badge_show').removeClass('active')
                    $('.plate_image_showcase .plate_image').removeClass('badge_active')
                }else{
                    $('.badge_show.simple').addClass('active')
                    $('.badge_show.simple').attr('src', selected_badge_img)
                    $('.plate_image_showcase .plate_image').addClass('badge_active')
                }

                $('#badge_style_input').removeClass('active')                
                $('.front_option').removeClass('hidden').addClass('active')

                // var slogan_text = $('#slogal_text').val(),
                // selected_border = $('#border_color').val()
                var slogan_text = $('#slogal_text').val(),
                selected_border = $('#border_color').val(),
                badge_name =  $('#badge_name').val(),
                selected_border = $('#border_color').val(),
                text_style = $('#text_style').val()

                var add_to_cart_btn = $('#nplate_add_to_cart')
                        add_to_cart_btn.attr('disabled', true)

                var form = {
                    action: 'fetch_regular_plate_price',
                    plate_count: plates,
                    prod_id: prod_id,
                    border_color: selected_border,
                    slogan: slogan_text,
                    badge_name: badge_name,
                    text_style: text_style  
                }
                
                $.post(cpbn_plugin_ajax.ajax_url, form, function(response){ //alert(response)
                    //alert(response.price)
                    
                    if(response.status == 1 ){ 
                    var price = response.price
                    
                    var old_price = $('span#plate_price').html('£'+price)
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

            }else{
                $('.notify_modal').addClass('active')
                    $('.notify_alert').addClass('active')
                    $('.notify_alert .nofity_title').text('Please select plate type first')
                    // add_to_cart_btn.removeAttr('disabled')
                return false;
            }
       
    })

    $('#border_style_submit').on('click', function(){ 
        var selected_border = $('.border-style-img.selected').attr('border_id')              

        
        // var plates = $('.plate_prod.prod-title.active').attr('plates')
        var prod_btn = $('.plate_prod.prod-title.active'),
        plates = prod_btn.attr('plates'),
        prod_id = prod_btn.attr('prod_id')

        if(plates !== undefined){
            $('#border_color').val(selected_border)
            var selected_border = $('#border_color').val()

            $('#border_style_input').removeClass('active')
            $('.front_option').removeClass('hidden').addClass('active')
            $('.plate_image_showcase .plate_image_show .plate_image').addClass('border_black')

            if(selected_border == 'none'){
                $('.plate_image_showcase .plate_image_show .plate_image').removeClass('border_black')
            }

            // if(selected_border !== 'none'){
                
            // var slogan_text = $('#slogal_text').val(),                
            //     badge_name =  $('#badge_name').val()
            var slogan_text = $('#slogal_text').val(),
                selected_border = $('#border_color').val(),
                badge_name =  $('#badge_name').val(),
                selected_border = $('#border_color').val(),
                text_style = $('#text_style').val()

                var add_to_cart_btn = $('#nplate_add_to_cart')
                        add_to_cart_btn.attr('disabled', true)

                var form = {
                    action: 'fetch_regular_plate_price',
                    plate_count: plates,
                    prod_id: prod_id,
                    border_color: selected_border,
                    slogan: slogan_text,
                    badge_name: badge_name,
                    text_style: text_style   
                }
                
                $.post(cpbn_plugin_ajax.ajax_url, form, function(response){ //alert(response)
                    //alert(response.price)
                    
                    if(response.status == 1 ){ 
                    var price = response.price
                    
                    var old_price = $('span#plate_price').html('£'+price)
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
            // }

    }else{
        $('.notify_modal').addClass('active')
        $('.notify_alert').addClass('active')
        $('.notify_alert .nofity_title').text('Please select plate type first')
        // add_to_cart_btn.removeAttr('disabled')
        return false;
    }


    })

    $('#slogan_color_submit').on('click', function(){ 

        var prod_btn = $('.plate_prod.prod-title.active'),
        plates = prod_btn.attr('plates'),
        prod_id = prod_btn.attr('prod_id')
        if(plates !== undefined){

            var selected_slogan_color = $('.slogan-style-img.selected').attr('slogan_id'),
            slogan_text = $('#slogal_text').val()              
    
            $('#slogan_color').val(selected_slogan_color)
            $('#slogan_text').val(slogan_text)
    
            $('#slogan_style_input').removeClass('active')
            $('.front_option').removeClass('hidden').addClass('active')

            if(slogan_text !== ''){
                $('.plate_image_showcase .slogan').addClass('active')
                $('.plate_image_showcase .slogan').html('<p>'+slogan_text+'</p>')
            }else{
                $('.plate_image_showcase .slogan').removeClass('active')
                $('.plate_image_showcase .slogan').html('')
            }

            // var selected_border = $('#border_color').val(),
            //     badge_name =  $('#badge_name').val()
            var slogan_text = $('#slogal_text').val(),
                selected_border = $('#border_color').val(),
                badge_name =  $('#badge_name').val(),
                selected_border = $('#border_color').val(),
                text_style = $('#text_style').val()

                var add_to_cart_btn = $('#nplate_add_to_cart')
                        add_to_cart_btn.attr('disabled', true)

            var form = {
                action: 'fetch_regular_plate_price',
                plate_count: plates,
                prod_id: prod_id,
                border_color: selected_border,
                slogan: slogan_text,
                badge_name: badge_name,
                text_style: text_style            
            }
            
            $.post(cpbn_plugin_ajax.ajax_url, form, function(response){ //alert(response)
                //alert(response.price)
                
                if(response.status == 1 ){ 
                var price = response.price
                
                var old_price = $('span#plate_price').html('£'+price)
                add_to_cart_btn.removeAttr('disabled')
                }else if(response.status == 0){
                    // alert(response.error_message) 
                    $('.notify_modal').addClass('active')
                    $('.notify_alert').addClass('active')
                    $('.notify_alert .nofity_title').text('Process Failed! Please try again')
                    // add_to_cart_btn.removeAttr('disabled')
                }else{
                    // alert(response.empty_data)
                    $('.notify_modal').addClass('active')
                    $('.notify_alert').addClass('active')
                    $('.notify_alert .nofity_title').text('Process Failed! Please try again')
                    // add_to_cart_btn.removeAttr('disabled')
                }
                
            })

        }else{
            $('.notify_modal').addClass('active')
            $('.notify_alert').addClass('active')
            $('.notify_alert .nofity_title').text('Please select plate type first')
            // add_to_cart_btn.removeAttr('disabled')
            return false;
        }


       
    })
})