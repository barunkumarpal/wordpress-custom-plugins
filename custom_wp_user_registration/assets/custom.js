$(document).ready(function(){
    $('.cwpl_custom_registration').on('click', function(){
        var btn = $(this),
        btnTxt = btn.text(),
        username = $('#username').val()
        email = $('#email').val()
        pwd = $('#pwd').val()
        re_pwd = $('#re_pwd').val()


        if(username == ''){
            $('.form_error').removeClass('d-none')   
            $('.form_error').text('Username is required')            
        }
        else if(email == ''){
            $('.form_error').removeClass('d-none')            
            $('.form_error').text('Email is required')            
        }
        else if(pwd == ''){
            $('.form_error').removeClass('d-none')            
            $('.form_error').text('Password is required')            
        }
        else if(re_pwd == ''){
            $('.form_error').removeClass('d-none')   
            $('.form_error').text('Confirm Password is required')            
        }else if(re_pwd !== pwd){
            $('.form_error').removeClass('d-none')   
            $('.form_error').text('Passwords are not the same!') 
        }
        else{

        var form = {
            action: 'cwpur_register',
            username: username,
            email: email,
            pwd: pwd
        }

        btn.attr('disabled', 'true')
        btn.html('<div class="spinner-border text-light" id="spinner"></div>')

        $.post(cwpl_wp_ajax_obj.ajax_url, form, function(response){ 
            
            if(response.status == 1 ){                
                btn.removeAttr('disabled')
                $('.cwpl_custom_registration div#spinner').remove()
                btn.text(btnTxt) 

                window.location = response.url
            }else{
                $('.form_error').removeClass('d-none')   
                $('.form_error').html(response.status)
                $('input#username').css('margin-top', '20px')

                btn.removeAttr('disabled')
                $('.cwpl_custom_registration div#spinner').remove()
                btn.text(btnTxt)
            }           
            
        })

    }


    })
})