$(document).ready(function(){
    $('.cwpl_custom_login').on('click', function(){
        var btn = $(this),
        btnTxt = btn.text(),
        username = $('#username').val()
        pwd = $('#pwd').val(),
        remember = $('#remember').val(),
        g_recaptcha_response = $('.g-recaptcha-response').val()

        if(remember !== ''){
            rememberme = 'true'
        }else{
            rememberme = 'false'
        }


        if(username == ''){
            $('.form_error').removeClass('d-none')
            $('.form_error').text('Username is required')
            // $('input#username').css('margin-top', '20px')
        }
        else if(pwd == ''){
            $('.form_error').removeClass('d-none')
            $('.form_error').text('Password is required')
            // $('input#username').css('margin-top', '20px')
        }else{

        var form = {
            action: 'cwpl_login',
            username: username,
            pwd: pwd,
            rememberme: rememberme,
            g_recaptcha_response: g_recaptcha_response
        }

        btn.attr('disabled', 'true')
        btn.html('<div class="spinner-border text-light" id="spinner"></div>')

        $.post(cwpl_wp_ajax_obj.ajax_url, form, function(response){             

            $('.error').text('')
            $('.form_error').text('')
            
            if(response.status == 1 ){                
                btn.removeAttr('disabled')
                $('.cwpl_custom_login div#spinner').remove()
                btn.text(btnTxt) 

                window.location = response.url
            }else{
                $('.form_error').removeClass('d-none')

                if(response.login_error !== ''){
                    $('.form_error').html(response.login_error)               
                }else{
                    // $('.form_error').html(response.status)    
                }

                btn.removeAttr('disabled')
                $('.cwpl_custom_login div#spinner').remove()
                btn.text(btnTxt) 
            }   
            
            if(response.captcha_error !== ''){
                $('.error.captcha_error').text(response.captcha_error)

                btn.removeAttr('disabled')
                $('.cwpl_custom_login div#spinner').remove()
                btn.text(btnTxt) 
            }
            
        })

    }


    })
})