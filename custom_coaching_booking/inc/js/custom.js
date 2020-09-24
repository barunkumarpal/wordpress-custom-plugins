$(document).ready(function(){
    $('#add_to_cart_coaching').on('click', function(){
        var dataID = $(this).data('id'),        
            dataUser = $(this).data('user'),
            prodQTY = $('#c_prod-'+dataID+' #c_prod_qty').val()
            prodInst = $('#c_prod-'+dataID+' #installment').val()            

        var form = {
            action: 'save_to_cart',
            prodID: dataID,
            userID: dataUser,
            prodQty: prodQTY,
            installments: prodInst
        }

        $.post(ccb_plgn_ajax.ajax_url, form, function(response){
            if(response.status == 1){
                alert('Product successfully added to your cart!')
            }
        })
    })

    $('.c_cart_remv').on('click', function(){
       
        var dataID = $(this).data('id');
        alert('clicked'+dataID)
        var form = {
            action: 'delete_from_c_cart',
            cartID: dataID            
        }

        $.post(ccb_plgn_ajax.ajax_url, form, function(response){
            if(response.status == 1){
                alert('Product successfully removed from your cart!')
            }else{
                alert('Sorry! we could not remove the product from your cart')
            }
        })
    })
   
})