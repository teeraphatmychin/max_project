$(document).ready(function(){
    $('.row-add-product').show();


    /*main panel option*/
    $('.main-panel')
    .on('click','.btn-modal-add-product',function(){ /*open modal add product*/
        $('.content').find('.row-add-product').show();
        $('.content').find('.row-add-product input[name=type]').val('add');
        $('.content').find('.row-add-product input[name=product_id]').remove();
        $('.content').find('.row-add-product input[name!=type]').val('');
        $('.content').find('.row-add-product textarea').val('');
        $('.content').find('.row-add-product select').val('');
    });
});
