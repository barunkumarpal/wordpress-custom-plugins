$(document).ready(function(){
    $('#form_submit_testimonial').on('submit', function(e){
        e.preventDefault();
        
        confirm("Are you sure you want to Submit your Comment?");

        $('#form_submit_testimonial').hide();
        $('#form_submit_status').html('Please wait while we are submiting your valuable comment!')

        var testi_Title = $('#testimonial_title').val()


        var form = {
            action: 'create_testimonial',
            title: testi_Title,
            content: tinymce.activeEditor.getContent()
        }
        
        $.post(mct_plugin_ajax_obj.ajax_url, form, function(response){
            
            if(response.status == 1 ){                
                $('#form_submit_status').html('<div class="alert alert-success">Your Comment Submitted Successfully!</div>')
            }else{
                $('#form_submit_status').html('<div class="alert alert-warning">Sorry! We Couldn\'t Submit  Your Comment Successfully!</div>')
                $('#form_submit_testimonial').show()
            }
            
            
        })

        window.alert('Comment Submitted');
    })
})