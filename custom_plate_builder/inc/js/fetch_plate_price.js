$(document).ready(function(){
    var prod_btn = $('.btn.prod-title.active'),
        prod_id = prod_btn.attr('prod_id')

        var form = {
            action: 'fetch_regular_plate_price',
            prod_id: prod_id            
        }
        
        $.post(cpbn_plugin_ajax.ajax_url, form, function(response){
            
            if(response.status == 1 ){
               var price = response.price
               $('span#plate_price').text(price)
            }else if(response.status == 0){
                // alert(response.error_message)
            }else{
                // alert(response.empty_data)
            }
            
        })
})