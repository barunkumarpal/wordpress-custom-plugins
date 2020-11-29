$(document).ready(function(){


    $('#nplate_add_to_cart').on( 'click', function() { 

        // var thisbutton =$(this),
        //     thisbutton_html =$(this).html()
    // alert(button)

    var $thisbutton = $(this),                
                product_qty = '1',
                product_id_d = $('.plate_prod.prod-title').attr('prod_id'),      
                product_id = $('.plate_prod.prod-title.active').attr('prod_id'),      
                plate_price = $('#plate_price').text(),
                reg_no = $('input#reg_no').val(),
                plate_size = $('input#plate_size').val(),
                text_style = $('input#text_style').val(),
                badge_name = $('input#badge_name').val(),
                border_color = $('input#border_color').val(),
                slogan_color = $('input#slogan_color').val(),
                slogan_text = $('input#slogan_text').val()

    // var completters = /^[A-Za-z 0-9]+$/;
    var numbers = /^[0-9]+$/;
    var reg_numbers = /^[A-Za-z 0-9]+$/;
    var valid = 0

    // alert(reg_no)
    
    if(text_style == '4d_laser'){
        var text_style = '4D Laser'
    }else if(text_style == '3d_text'){
        var text_style = '3D Text'
    }
    else if(text_style == '4d_neon_red'){
        var text_style = '4D Neon Red'
    }
    else if(text_style == '4d_neon_green'){
        var text_style = '4D Neon Green'
    }
    else if(text_style == '4d_neon_orange'){
        var text_style = '4D Neon Orange'
    }
    else if(text_style == '4d_neon_blue'){
        var text_style = '4D Neon Blue'
    }
    else if(text_style == '4d_white'){
        var text_style = '4D White'
    }

    if(border_color == 'black'){
        var border_color = 'Black'
    }
    if(border_color == 'none'){
        var border_color = 'None'
    }
    if(slogan_color == 'black'){
        var slogan_color = 'Black'
    }
    if(slogan_color == 'none'){
        var slogan_color = 'None'
    }

    if(product_id == undefined){
        $('.notify_modal').addClass('active')
        $('.notify_alert').addClass('active')
        $('.notify_alert .nofity_title').text('Please Select Plate Type')

        return false; 
    }   
    else if(product_id==='' && !product_id.match(numbers)){
        $('.notify_modal').addClass('active')
        $('.notify_alert').addClass('active')
        $('.notify_alert .nofity_title').text('Please Select Plate Type')
        return false; 
    }
    else if(reg_no===''){
        $('.notify_modal').addClass('active')
        $('.notify_alert').addClass('active')
        $('.notify_alert .nofity_title').text('Please enter your registration no')
        // alert('Please enter your registration no')
        return false; 
    } 
    else if(!reg_no.match(reg_numbers)){
        $('.notify_modal').addClass('active')
        $('.notify_alert').addClass('active')
        $('.notify_alert .nofity_title').text('Please enter a valid registration no.')
        // alert('Please enter a valid registration no.')
        return false; 
    }     
     else if (reg_no.length <= 3) {
        $('.notify_modal').addClass('active')
        $('.notify_alert').addClass('active')
        $('.notify_alert .nofity_title').text('Please enter a valid registration no. More than 3 characters are allowed.')
        // alert("Please enter a valid registration no. with 8 characters");   
        return false; 
    }    
    else if ( reg_no.length >= 9) {
        $('.notify_modal').addClass('active')
        $('.notify_alert').addClass('active')
        $('.notify_alert .nofity_title').text('Please enter a valid registration no. within 8 characters')
        // alert("Please enter a valid registration no. within 8 characters");   
        return false; 
    }   
    else if(text_style == ''){
        $('.notify_modal').addClass('active')
        $('.notify_alert').addClass('active')
        $('.notify_alert .nofity_title').text('Please select your text style type.')
        // alert("Please enter a valid registration no. within 8 characters");   
        return false; 
    }     
      
    
    else{
   
    var data = {
        action: 'woocommerce_ajax_add_to_cart',
        product_id: product_id,
        product_sku: '',
        quantity: product_qty,
        price: plate_price,                   
        reg_no: reg_no,                   
        plate_size: plate_size,                   
        text_style: text_style,                   
        badge_name: badge_name,                   
        border_color: border_color,                   
        slogan_color: slogan_color,                   
        slogan_text: slogan_text,                   
    };
        
                // $(document.body).trigger('adding_to_cart', [$thisbutton, data]);
                var add_cart_btn = $(this).html()
                $(this).text('Adding to Cart...')
                $.ajax({
                    type: 'post',
                    url: wc_add_to_cart_params.ajax_url,
                    data: data,
                    beforeSend: function (response) {
                        $thisbutton.removeClass('added').addClass('loading');
                    },
                    complete: function (response) {
                        $thisbutton.addClass('added').removeClass('loading');
                    },
                    success: function (response) {
        
                        if (response.error && response.product_url) {
                            window.location = response.product_url;
                            return;
                        } else {                           
                            $('#nplate_add_to_cart').html('Added to Cart')
                            
                            $('.recomend_modal').addClass('active')
                            $('body').addClass('modal_active')
                            
                            $('#nplate_add_to_cart').html(add_cart_btn)
                            
                        }
                    },
                });
        
                return false;

            }


            });


             
   



        })


    