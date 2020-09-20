$(document).ready(
    function(){   
        
        $('#dest_rating').bind('rated', function(){
            $(this).rateit('readonly', true)

            // Save the Rating
            var form = {
                action: 'save_the_rating',
                rid: $(this).data('post-id'),
                rating: $(this).rateit('value')
            }
            
            $.post(dest_ajax_obj.ajax_url, form, function(response){
                console.log(response)
            })

        })
    }
)
