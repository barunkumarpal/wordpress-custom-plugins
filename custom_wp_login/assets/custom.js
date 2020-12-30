$(document).ready(function(){
    $('.cwpl_custom_login').on('click', function(){
        var btn = $(this),
        btnTxt = btn.text(),
        username = $('#username').val()
        pwd = $('#pwd').val()


        if(username == ''){
            $('span.form_error').text('Username is required')
            $('input#username').css('margin-top', '20px')
        }
        else if(pwd == ''){
            $('span.form_error').text('Password is required')
            $('input#username').css('margin-top', '20px')
        }else{

        var form = {
            action: 'cwpl_login',
            username: username,
            pwd: pwd
        }

        btn.attr('disabled', 'true')
        btn.html('<div class="spinner-border text-light" id="spinner"></div>')

        $.post(cwpl_wp_ajax_obj.ajax_url, form, function(response){ 
            
            if(response.status == 1 ){                
                btn.removeAttr('disabled')
                $('.cwpl_custom_login div#spinner').remove()
                btn.text(btnTxt) 

                window.location = response.url
            }else{
                $('span.form_error').text(response.status)
                $('input#username').css('margin-top', '20px')

                btn.removeAttr('disabled')
                $('.cwpl_custom_login div#spinner').remove()
                btn.text(btnTxt)
            }           
            
        })

    }


    })
})