$(document).ready(function(){
    // $('.row-add-borrowing').show();
    // $('.modal-review-borrowing').modal('show');

    list_borrowing();
    list_customer();
    list_borrower();
    // add_province();
    /*main panel option*/
    var $list_product_action = true;
    $('.main-panel')
    .on('click','.btn-modal-add-borrowing',function(){ /*open modal add borrowing*/
        $('.content').find('.row-add-borrowing').show();
        $('.content').find('.row-add-borrowing input[name=type]').val('add');
        $('.content').find('.row-add-borrowing input[name=borrowing_id]').remove();
        $('.content').find('.row-add-borrowing input[name!=type]').val('');
        $('.content').find('.row-add-borrowing textarea').val('');
        $('.content').find('.row-add-borrowing select').val('');
        list_customer();
        max_chosen($('.content').find('.row-add-borrowing select.list-borrower'),'update');
        max_chosen($('.content').find('.row-add-borrowing select.list-customer'),'update');
        // clearTimeout($list_product_action);
        if ($('.row-add-borrowing input[name=add_customer]').prop('checked')) {
            $('.row-add-borrowing input[name=add_customer]').trigger('click');
        }

        $('.content').find('.row-add-borrowing .wrap-product .product-item:not(:last-child)').remove();
        $('.content').find('.row-add-borrowing .wrap-product .list-product').off();
        max_chosen($('.content').find('.row-add-borrowing .wrap-product .list-product'));
        list_product($('.content').find('.row-add-borrowing .wrap-product .list-product'));
        // $list_product_action = setTimeout(function(){
        if ($list_product_action) {
            list_product_action($('.content').find('.row-add-borrowing .wrap-product .list-product'));
            $list_product_action = false;
        }
        $('.content').find('.row-add-borrowing .btn-edit-borrowing').hide();
        $('.content').find('.row-add-borrowing .btn-add-borrowing').show();

        // },200)
        // console.log(list_borrower());
        cal_date();
    })
    .on('click','.btn-add-borrowing',function(){ /*btn add borrowing*/
        if (validate()) {
            let data = $('.row-add-borrowing .form-add-borrowing').serialize();
            $.ajax({
                url: base_url('Borrowing/add'),
                // url: sql_server('Borrowing/add'),
                method: 'post',
                data: data,
                dataType: 'json',
                success: function(respond){
                    // console.log(respond);
                    if (respond[0] == 'success') {
                        Swal.fire({
                            title: 'บันทึกสำเร็จ',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        list_borrowing();
                        $('.content').find('.row-add-borrowing').hide();
                    }else if(respond[0] == 'fail'){
                        Swal.fire({
                            title: 'ไม่สามารถบันทึกได้',
                            html: respond[1],
                            type: 'error'
                        });
                        list_borrowing();
                    }

                }
            });
        }
    })
    .on('click','.btn-cancel-borrowing',function(){ /*open modal cancel borrowing*/
        $('.content').find('.row-add-borrowing').hide();
    })
    .on('click','.btn-edit-borrowing',function(){ /*btn edit borrowing*/
        if (validate()) {
            let data = $('.row-add-borrowing .form-add-borrowing').serialize();
            $.ajax({
                url: base_url('Borrowing/update'),
                // url: sql_server('Borrowing/add'),
                method: 'post',
                data: data,
                dataType: 'json',
                success: function(respond){
                    // console.log(respond);
                    if (respond[0] == 'success') {
                        Swal.fire({
                            title: 'บันทึกสำเร็จ',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        list_borrowing();
                        $('.content').find('.row-add-borrowing').hide();
                    }else if(respond[0] == 'fail'){
                        Swal.fire({
                            title: 'ไม่สามารถบันทึกได้',
                            html: respond[1],
                            type: 'error'
                        });
                        list_borrowing();
                    }
                }
            });
        }
    });

    /*modal add borrowing action*/
    $('.row-add-borrowing')
    .on('click','input.add-customer',function(){ /* manual customer*/
        let wrap = $(this).closest('.row-add-borrowing');
        if ($(this).prop('checked') == true) {
            if (wrap.find('.list-customer').val() != '') {
                let customer_name = wrap.find('.list-customer option:selected').html();
                wrap.find('input.input-customer-name').closest('.form-group').addClass('is-filled');
                wrap.find('input.input-customer-name').val(customer_name);
            }else {
                wrap.find('input[name=add_customer]').prop('checked',true);
            }
            $(this).closest('.row-add-borrowing').find('.list-customer').closest('.form-group').hide();
            $(this).closest('.row-add-borrowing').find('input.input-customer-name').closest('.form-group').show();
            $(this).closest('.row-add-borrowing').find('input.input-customer-name').attr('name','b_customer_name');
            $(this).closest('.row-add-borrowing').find('select.list-customer').attr('name','');
        }else {
            $(this).closest('.row-add-borrowing').find('.list-customer').closest('.form-group').show();
            $(this).closest('.row-add-borrowing').find('input.input-customer-name').closest('.form-group').hide();
            $(this).closest('.row-add-borrowing').find('input.input-customer-name').attr('name','');
            $(this).closest('.row-add-borrowing').find('select.list-customer').attr('name','b_customer');
        }
    })



    /*table action*/
    $('.list-borrowing')
    .on('click','.btn-check-borrowing',function(){
        let b_id = $(this).attr('id');
        $.ajax({
            // url: sql_server('Borrowing/get'),
            url: base_url('Borrowing/get'),
            method: 'post',
            data:{b_id:b_id},
            dataType: 'json',
            success: function(respond){
                // console.log(respond);
                if (respond[0] == 'success') {
                    let html = '';
                    respond[1] = respond[1][0];
                    // console.log(respond);
                    html += '<div class="row wrap-borrowing" borrowing-id="'+respond[1].b_id+'">';
                        html += '<div class="col-md-12 text-center">'+respond[1].b_customer_name+'</div>';
                        html += '<div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2 " style="font-size:0.8rem">';
                            html += '<div class="col-sm-12 col-md-12 col-lg-12 row m-0">';
                                html += '<div class="row m-0 border rounded">';
                                    html += '<div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>ข้อมูการยืม</strong></div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>เลขที่ใบยืม :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond[1].b_number+'</div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>ชื่อผู้ยืม :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond[1].b_borrow_fullname+'</div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>วันที่ยืม/คืน :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond[1].b_date_th+' / '+respond[1].b_return_th+' </div>';
                                    html += '<div class="col-sm-7 col-md-4 border-right"><strong>จำนวนวันที่ยืม. :</strong></div>';
                                    html += '<div class="col-sm-5 col-md-8 ">'+respond[1].b_len+'</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="row m-0 col-sm-12 col-md-6 col-lg-6 mt-2 mb-2" style="font-size:0.8rem;height: fit-content;">';
                            html += '<div class="col-md-12 row m-0">';
                                html += '<div class="row m-0 border rounded col-12 p-0">';
                                    html += '<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>หมายเหตุ</strong></div>';
                                    html += '<div class="col-md-12">'+respond[1].b_remark+'</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="row m-0 col-12 mt-2 mb-2" style="font-size:0.8rem">';
                            html += '<div class="col-12 row m-0">';
                                html += '<div class="row col-12 m-0 border rounded p-0">';
                                    html += '<div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>รายการสินค้า</strong></div>';
                                    html += '<div class="row p-0 m-0">'
                                    html += '<div class="col-md-2 border-bottom border-right text-center"><strong>รหัสสินค้า</strong></div>';
                                    html += '<div class="col-md-3 border-bottom border-right text-center"><strong>รายละเอียด</strong></div>';
                                    html += '<div class="col-md-2 border-bottom border-right text-center"><strong>SN</strong></div>';
                                    html += '<div class="col-md-1 border-bottom border-right text-center"><strong>จำนวน</strong></div>';
                                    html += '<div class="col-md-2 border-bottom border-right text-center"><strong>สถานะ</strong></div>';
                                    html += '<div class="col-md-2 border-bottom text-center"><strong>วันที่คืน</strong></div>';
                                    $.each(respond[1].product,function(key_product,value_product){
                                        html += '<div class="row p-0 m-0 col-12" >'
                                        html += '<div class="col-md-2 border-bottom border-right text-center">'+value_product.bd_p_code+'</div>';
                                        html += '<div class="col-md-3 border-bottom border-right text-center">'+value_product.bd_p_detail+'</div>';
                                        html += '<div class="col-md-2 border-bottom border-right text-center">'+value_product.bd_p_sn+'</div>';
                                        html += '<div class="col-md-1 border-bottom border-right text-center">'+value_product.bd_p_qty+'</div>';
                                        // let bd_p_status = value_product.bd_p_status;
                                        let return_date = '-';
                                        let bd_p_status = '';
                                        switch (value_product.bd_p_status) {
                                            case 'borrowing':
                                                bd_p_status = '<span class="text-info">ยืม</span>';
                                                break;
                                            case 'returned':
                                                bd_p_status = '<span class="text-success">คืน</span>';
                                                if (value_product.bd_p_return_date_th != '') {
                                                    return_date = value_product.bd_p_return_date_th;
                                                }
                                                break;
                                            default:
                                        }
                                        html += '<div class="col-md-2 border-bottom border-right text-center">'+bd_p_status+'</div>';
                                        html += '<div class="col-md-2 border-bottom text-center">'+return_date+'</div>';
                                        html += '</div>';
                                    });
                                    // html += '<div class="col-sm-7 col-md-8 border-bottom">'+respond[1].borrowing_software_version+'</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                    html += '</div>';
                    // console.log(respond);
                    $('.modal-review-borrowing .modal-content .modal-footer').html(respond[2]);
                    $('.modal-review-borrowing .modal-body').html(html);
                    $('.modal-review-borrowing').modal('show');
                    $('.loading-screen').hide();
                }
            }
        })
    });

    /*modal borrowing footer button action*/
    $('.modal-review-borrowing').on('click','.btn-option',function(){
        let type = $(this).attr('option-type');
        let b_id = $(this).closest('.modal-review-borrowing').find('.wrap-borrowing').attr('borrowing-id');
        // console.log(type);
        switch (type) {
            case 'print':
                break;
            case 'edit':
                $.ajax({
                    url: base_url('Borrowing/get'),
                    method: 'post',
                    data:{b_id:b_id},
                    dataType: 'json',
                    success: function(respond){
                        if (respond[0] == 'success') {
                            let data = respond[1][0];
                            $('.content').find('.row-add-borrowing').show();
                            $('.content').find('.row-add-borrowing input[name=type]').val('edit');
                            $('.content').find('.form-add-borrowing input[name=b_id]').remove();
                            let input_id = '<input type="hidden" name="b_id" value="'+b_id+'">';
                            $('.content').find('.form-add-borrowing').prepend(input_id);
                            if($('.row-add-borrowing input[name=add_customer]').prop('checked')){
                                $('.row-add-borrowing input[name=add_customer]').trigger('click');
                            }
                            $('.modal-review-borrowing').modal('hide');
                            let wrap = $('.row-add-borrowing form.form-add-borrowing');
                            setTimeout(function(){$('.content').find('.row-add-borrowing select.list-borrower').val(data.b_borrower)},100);
                            setTimeout(function(){max_chosen($('.content').find('.row-add-borrowing select.list-borrower'),'update');},300);
                            $('.content').find('.row-add-borrowing input[name=b_number]').val(data.b_number);
                            $('.content').find('.row-add-borrowing input[name=b_remark]').val(data.b_remark);
                            let b_date = data.b_date;
                            b_date = b_date.split(' ');
                            b_date = b_date[0];
                            $('.content').find('.row-add-borrowing input[name=b_date]').val(b_date);
                            let b_return = data.b_return;
                            b_return = b_return.split(' ');
                            b_return = b_return[0];
                            $('.content').find('.row-add-borrowing input.date_back').val(b_return);
                            $('.content').find('.row-add-borrowing input[name=b_len]').val(data.b_len);
                            $('.content').find('.row-add-borrowing select.list-customer').val(data.b_customer);
                            max_chosen($('.content').find('.row-add-borrowing select.list-customer'),'update');
                            $('.content').find('.row-add-borrowing .wrap-product .product-item:not(:last-child)').remove();
                            $('.content').find('.row-add-borrowing .wrap-product .list-product').off();
                            max_chosen($('.content').find('.row-add-borrowing .wrap-product .list-product'));
                            list_product($('.content').find('.row-add-borrowing .wrap-product .list-product'));
                            list_product_action($('.content').find('.row-add-borrowing .wrap-product .list-product'));
                            $('.content').find('.row-add-borrowing .form-group').addClass('is-filled');
                            cal_date();
                            let select = '<div class="product-item col-12 row ml-0 mr-0 pl-0 pr-0">';
                                select += '<div class="col-4 wrap-input">';
                                    // select += '<div class="form-group bmd-form-group">';
                                    //     select += '<select class="form-control form-control-chosen list-product" name="bd_p_barcode_qr2[]" >';
                                    //         select += '<option value="">ค้นหาสินค้า</option>';
                                    //     select += '</select>';
                                    // select += '</div>';
                                    // select += '<input type="hidden" class="bd_id" name="bd_id[]" value="">';
                                    select += '<input type="hidden" class-"bd_p_status" name="bd_p_status[]">';
                                    select += '<div class="form-group bmd-form-group">';
                                        select += '<input type="text" class="form-control qr_borrowing" name="bd_p_barcode_qr2[]" value="" disabled>';
                                    select += '</div>';
                                select += '</div>';
                                select += '<div class="col-4">';
                                    select += '<div class="form-group bmd-form-group">';
                                        select += '<label class="bmd-label-floating"><strong>รายละเอียด</strong></label>';
                                        select += '<input type="text" class="form-control detail_borrowing" name="bd_p_detail[]" value="" disabled>';
                                    select += '</div>';
                                select += '</div>';
                                select += '<div class="col-3">';
                                    select += '<div class="form-group bmd-form-group">';
                                        select += '<label class="bmd-label-floating"><strong>SN</strong></label>';
                                        select += '<input type="text" class="form-control sn_borrowing" name="bd_p_sn[]" value="" disabled>';
                                    select += '</div>';
                                select += '</div>';
                                // select += '<div class="col-1">';
                                //     // select += '<button type="button" class="btn btn-warning pr-2 pl-2 btn-return-product">ยกเลิกการคืน</button>';
                                //     select += '<button type="button" class="btn btn-warning pr-2 pl-2 btn-return-product">คืน</button>';
                                //     // select += '<button type="button" class="btn btn-warning pr-2 pl-2 btn-return-product"><i class="material-icons">undo</i></button>';
                                // select += '</div>';
                                select += '<div class="col-md-1 wrap-input">';
                                            select += '<div class="form-check pt-3">';
                                                select += '<label class="form-check-label">';
                                                    select += '<input class="form-check-input btn-return-product" name="return_product[]" type="checkbox" value="return">';
                                                    select += '<span class="form-check-sign">';
                                                        select += '<span class="check"></span>';
                                                    select += '</span>';
                                                    select += '<div class="text-dark"><strong>คืน</strong></div>';
                                                select += '</label>';
                                            select += '</div>';
                                        select += '</div>';
                            select += '</div>';
                            let tag = $('.content').find('.row-add-borrowing .wrap-product');
                            tag.html('');

                            // html += '<option value="'+value.BarcodeQR2+'" product-name="'+value.Product_name+'">'+value.Product_code+' : '+value.BarcodeQR+'</option>';
                            $.each(data.product,function(key,value){
                                tag.append(select);
                                // tag.find('.product-item:last-child .list-product').html('<option value="'+value.bd_p_barcode_qr2+'" product-name="'+value.bd_p_detail+'" selected>'+value.bd_p_code+' : '+value.bd_p_sn+'</option>');
                                // max_chosen(tag.find('.product-item:last-child .list-product'));
                                // max_chosen(tag.find('.product-item:last-child .list-product'),'update');
                                // tag.find('.product-item:last-child input.bd_id').val(value.bd_id);
                                tag.find('.product-item:last-child input.btn-return-product').val(value.bd_id);
                                tag.find('.product-item:last-child input.qr_borrowing').val(value.bd_p_barcode_qr2);
                                tag.find('.product-item:last-child input.detail_borrowing').val(value.bd_p_detail);
                                tag.find('.product-item:last-child input.sn_borrowing').val(value.bd_p_sn);
                                if (value.bd_p_status == 'returned') {
                                    tag.find('.product-item:last-child input.btn-return-product').prop('checked',true);
                                }else {
                                    tag.find('.product-item:last-child input.btn-return-product').prop('checked',false);
                                }
                            });
                            tag.find('.bmd-form-group').addClass('is-filled');
                            $('.content').find('.row-add-borrowing .btn-add-borrowing').hide();
                            $('.content').find('.row-add-borrowing .btn-edit-borrowing').remove();
                            $('.content').find('.row-add-borrowing .card-footer').append('<a class="btn btn-success btn-edit-borrowing" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>');
                            // tag.append(select);
                            // max_chosen(tag.find('.product-item:last-child .list-product'));
                            let new_select = '<div class="product-item col-12 row ml-0 mr-0 pl-0 pr-0">';
                                new_select += '<div class="col-4 wrap-input">';
                                    new_select += '<div class="form-group bmd-form-group">';
                                        new_select += '<select class="form-control form-control-chosen list-product" name="bd_p_barcode_qr2[]" >';
                                            new_select += '<option value="">ค้นหาสินค้า</option>';
                                        new_select += '</select>';
                                    new_select += '</div>';
                                new_select += '</div>';
                                new_select += '<div class="col-4">';
                                    new_select += '<div class="form-group bmd-form-group">';
                                        new_select += '<label class="bmd-label-floating"><strong>รายละเอียด</strong></label>';
                                        new_select += '<input type="text" class="form-control detail_borrowing" name="bd_p_detail[]" value="">';
                                    new_select += '</div>';
                                new_select += '</div>';
                                new_select += '<div class="col-3">';
                                    new_select += '<div class="form-group bmd-form-group">';
                                        new_select += '<label class="bmd-label-floating"><strong>SN</strong></label>';
                                        new_select += '<input type="text" class="form-control sn_borrowing" name="bd_p_sn[]" value="">';
                                    new_select += '</div>';
                                new_select += '</div>';
                                new_select += '<input type="hidden" name="bd_p_status">';
                                new_select += '<div class="col-1">';
                                    new_select += '<button type="button" class="btn btn-danger pr-2 pl-2 btn-delete-product"><i class="material-icons">close</i></button>';
                                new_select += '</div>';
                            new_select += '</div>';

                            tag.append(new_select);
                            max_chosen(tag.find('.product-item:last-child .list-product'));
                            list_product(tag.find('.product-item:last-child .list-product'));
                            list_product_action(tag.find('.product-item:last-child .list-product'));

                            // let btn_return = '<div class="wrap-btn-option">';
                            // $('.content').find('.row-add-borrowing form.form-add-borrowing').append('');
                            $('html, body').animate({scrollTop:($(".row-add-borrowing").offset().top - 150)}, 500);/* focus help-block*/
                        }
                    }
                })
                break;
            case 'cancel':
                $('.modal-review-borrowing').modal('hide');
                break;
            default:

        }
    });

    function list_borrower(){
        let data;
        $.ajax({
            url: base_url('Borrowing/list_borrower'),
            dataType: 'json',
            success: function(respond){
                let html = '';
                if (respond[0] == 'success') {
                    html = '<option value="">เลือกผู้ยืม</option>'
                    $.each(respond[1],function(key,value){
                        html += '<option value="'+value.id+'">'+value.first_name+' '+value.last_name+'</option>';
                    });
                }else {
                    html = '<option value="">ไม่มีรายชื่อให้เลือก</option>'
                }
                $('.row-add-borrowing select.list-borrower').html(html);
                max_chosen($('.row-add-borrowing select.list-borrower'));
            }
        });
    }
    function list_customer(){
        $.ajax({
            url: base_url('Borrowing/list_customer'),
            dataType: 'json',
            success: function(respond){
                // console.log(respond);
                let html = '';
                if (respond[0] == 'success') {
                    html = '<option value="">ยืมไป</option>'
                    $.each(respond[1],function(key,value){
                        html += '<option value="'+value.id+'">'+value.cus_name+'</option>';
                    });
                }else {
                    html = '<option value="">ไม่มีรายชื่อให้เลือก</option>'
                }
                $('.row-add-borrowing select.list-customer').html(html);
                max_chosen($('.row-add-borrowing select.list-customer'));
            }
        })
    }
    $('.wrap-product')
    .on('click','.btn-delete-product',function(){
        if ($('.wrap-product .product-item').length > 1 && $(this).closest('.product-item').is(':last-child') == false) {
            let product_code = '-';
            let product_detail = '-';
            let product_serial = '-';
            if ($(this).closest('.product-item').find('select.list-product').val() != '') {
                product_code = $(this).closest('.product-item').find('select.list-product option:selected').html();
                product_code = product_code.split(' : ');
                product_code = product_code[0];
            }
            if ($(this).closest('.product-item').find('input.detail_borrowing').val() != '') {
                product_detail = $(this).closest('.product-item').find('input.detail_borrowing').val();
            }
            if ($(this).closest('.product-item').find('input.sn_borrowing').val() != '') {
                product_serial = $(this).closest('.product-item').find('input.sn_borrowing').val();
            }

            let html = '';
            html += '<div class="row m-0 p-0"><div class="col-12 text-left"><b>Product code : </b>'+product_code+' </div><div class="col-12 text-left"><b>Detail : </b>'+product_detail+' </div><div class="col-12 text-left"><b>Serial : </b>'+product_serial+'</div></div>';
            if (product_code != '-' && product_detail != '-' && product_serial != '-') {
                Swal.fire({
                    title: 'คุณต้องการลบรายการนี้หรือไม่?',
                    html: html,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4caf50 ',
                    cancelButtonColor: '#f44336 ',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.value) {
                        $(this).closest('.product-item').remove();
                    }
                });
            }else {
                $(this).closest('.product-item').remove();
            }
        }
    })
    .on('click','.btn-return-product',function(){
        // let qr_borrowing = $(this).closest('.product-item').find('input.qr_borrowing').val();
        // $.ajax({
        //     url: base_url('Borrowing/')
        // })
    });
    function list_product_action(selector=''){
        // let tag_chosen = '';
        // if (selector != '') {
            tag_chosen = selector;
        // }else {
        //     tag_chosen = $('.row-add-borrowing .wrap-product select.list-product');
        // }
        tag_chosen.off('change');
        tag_chosen.closest('.product-item').find('input.sn_borrowing').off('keyup');
        let select = '<div class="product-item col-12 row ml-0 mr-0 pl-0 pr-0">';
            select += '<div class="col-4 wrap-input">';
                select += '<div class="form-group bmd-form-group">';
                    select += '<select class="form-control form-control-chosen list-product" name="bd_p_barcode_qr2[]" >';
                        select += '<option value="">ค้นหาสินค้า</option>';
                    select += '</select>';
                select += '</div>';
            select += '</div>';
            select += '<div class="col-4">';
                select += '<div class="form-group bmd-form-group">';
                    select += '<label class="bmd-label-floating"><strong>รายละเอียด</strong></label>';
                    select += '<input type="text" class="form-control detail_borrowing" name="bd_p_detail[]" value="" >';
                select += '</div>';
            select += '</div>';
            select += '<div class="col-3">';
                select += '<div class="form-group bmd-form-group">';
                    select += '<label class="bmd-label-floating"><strong>SN</strong></label>';
                    select += '<input type="text" class="form-control sn_borrowing" name="bd_p_sn[]" value="" >';
                select += '</div>';
            select += '</div>';
            select += '<div class="col-1">';
                select += '<button type="button" class="btn btn-danger pr-2 pl-2 btn-delete-product"><i class="material-icons">close</i></button>';
            select += '</div>';
        select += '</div>';
        tag_chosen.closest('.product-item').on('change keyup','.list-product,input.sn_borrowing,input.detail_borrowing',function(){
            if ($(this).is('input') == false) {
                if ($(this).closest('.product-item').find('select.list-product').val() != '') {
                    let value = $(this).find('option:selected').attr('product-name');
                    let sn_borrowing = $(this).closest('.product-item').find('select.list-product option:selected').html();
                    sn_borrowing = sn_borrowing.split(' : ');
                    sn_borrowing = sn_borrowing[1];
                    $(this).closest('.product-item').find('input.sn_borrowing').val(sn_borrowing);
                    $(this).closest('.product-item').find('input.sn_borrowing').closest('.form-group').addClass('is-filled');
                    $(this).closest('.product-item').find('input.detail_borrowing').val(value);
                    $(this).closest('.product-item').find('input.detail_borrowing').closest('.form-group').addClass('is-filled');
                }
            }else {
                $(this).closest('.form-group').addClass('is-filled');
            }
            const product = $(this).closest('.wrap-product').find('.product-item:last-child select.list-product').val();
            const detail = $(this).closest('.wrap-product').find('.product-item:last-child input.detail_borrowing').val();
            const serial = $(this).closest('.wrap-product').find('.product-item:last-child input.sn_borrowing').val();
            if (product != '' || detail != '' || serial != '') {
                let tag = $(this);
                tag.closest('.wrap-product').append(select);
                max_chosen(tag.closest('.wrap-product').find('.product-item:last-child select.list-product'));
                list_product(tag.closest('.wrap-product').find('.product-item:last-child select.list-product'));
                list_product_action(tag.closest('.wrap-product').find('.product-item:last-child select.list-product'));
                // setTimeout(function(){tag.closest('.wrap-product').append(select);},100);
                // setTimeout(function(){
                //     max_chosen(tag.closest('.wrap-product').find('.product-item:last-child select.list-product'));
                //     list_product(tag.closest('.wrap-product').find('.product-item:last-child select.list-product'));
                //     list_product_action(tag.closest('.wrap-product').find('.product-item:last-child select.list-product'),'test');
                // },200);
            }
        });
    }
    function list_product(selector=''){
        let tag_chosen = '';
        if (selector != '') {
            tag_chosen = selector;
        }else {
            tag_chosen = $('.row-add-borrowing .wrap-product select.list-product');
        }
        var search_product;
        tag_chosen.closest('.form-group').find('.max-wrap-chosen .max-chosen-drop .max-chosen-search .max-chosen-search-input').keyup(function(){
            var tag = $(this);
            clearTimeout(search_product);
            search_product = setTimeout(function(){
                $.ajax({
                    url: sql_server('Borrowing/list_product'),
                    method: 'post',
                    data: {search:tag.val()},
                    dataType: 'json',
                    success: function(respond){
                        // console.log(respond);
                        let html = '<option value="">กรุณาเลือกรายการสินค้า..</option>';
                        if (respond[0] == 'success') {
                            $.each(respond[1],function(key,value){
                                html += '<option value="'+value.BarcodeQR2+'" product-name="'+value.Product_name+'">'+value.Product_code+' : '+value.BarcodeQR+'</option>';
                            });
                            tag.closest('.form-group').find('select.list-product').html(html);
                            // $('.row-add-borrowing .card .card-body select').trigger("chosen:updated");
                            max_chosen(tag.closest('.form-group').find('select.list-product'),'update');
                            tag.val(tag.val());
                        }
                    }
                });
            });
        });
    }

    /*search action*/
    function search_sort(data){
        $('.navbar .form-search').off();
        $('.navbar .form-search')
        .on('click','.btn-reset-search',function(){
            $('.navbar .form-search .search-job').val('');
            $('.navbar .form-search .search-date-start').val('');
            $('.navbar .form-search .search-date-end').val('');
            $('.navbar .form-search .search-cate').val('');
            $('.navbar .form-search .search-sort').val('');
            list_borrowing();
        })
        .on('change keyup','.search,.search-date-start,.search-date-end,.search-sort,.search-status',function(){
            let date_start = $('.navbar .form-search .search-date-start').val();
            let date_end = $('.navbar .form-search .search-date-end').val();
            let sort = $('.navbar .form-search .search-sort').val();
            let status = $('.navbar .form-search .search-status').val();
            let status_text = $('.navbar .form-search .search-status option:selected').html();
            let year_start = $('.navbar .form-search .search-year-start').val();
            let year_end = $('.navbar .form-search .search-year-end').val();
            let search = $('.navbar .form-search .search').val();
            let data_search = [];
            let key_data_search = 0;
            if (date_start != '' || date_end != '') {
                if (date_end < date_start) {
                    let data_swap = date_start;
                    date_start = date_end;
                    date_end = data_swap;
                }
                let date_start_split = date_start.split('-');

                for (var i = 0; i < data.length; i++) {
                    let date = data[i].b_date;
                    date = date.split(' ');
                    date = date[0];
                    if (date_start != '' && date_end != '') {
                        if (date >= date_start && date <= date_end) {
                            data_search[key_data_search++] = data[i];
                        }
                    }else if (date_start != '' && date_end == '') {
                        if (date >= date_start) {
                            data_search[key_data_search++] = data[i];
                        }
                    }else if (date_end != '' && date_start == '') {
                        if (date >= date_end) {
                            data_search[key_data_search++] = data[i];
                        }
                        date_start = date_end; //ใช้ assign ค่าไว้ใช้เมื่อ search ไม่เจอ
                        date_end = '';
                    }
                }
                if (data_search.length < 1) {
                    $.ajax({
                        url: base_url('Borrowing/list'),
                        method: 'post',
                        data: {date_start:date_start,date_end:date_end},
                        dataType: 'json',
                        async: false,
                        success: function(respond){
                            if (respond[0] == 'success') {
                                data_search = respond[1];
                            }
                        }
                    });
                }
            }else {
                data_search = data;
            }

            if (search != '') {
                search = search.toLowerCase();
                let data_search_search = [];
                let data_key_search = 0;
                let check_search = false;
                let check_key_sub = ['b_number','b_customer_name','borrow_fullname','b_len'];
                $.each(data_search,function(key,value){
                    $.each(value,function(key_sub,value_sub){
                        if (check_key_sub.indexOf(key_sub) > -1) {
                            if (value_sub != '' && value_sub != null) {
                                if (value_sub.indexOf(search) > -1) {
                                    check_search = true;
                                }
                            }
                        }
                    });
                    if (check_search) {
                        data_search_search[data_key_search] = value;
                        check_search = false;
                        data_key_search++;
                    }
                });
                data_search = data_search_search;
            }

            if (data_search.length > 0 && sort != '') {
                switch (sort) {
                    case 'asc':
                        //ยังไม่มีคำสั่งภายในนี้เพราะ ข้อมูลได้ทำการเรียงจาก ล่าสุดไปเก่าสุดอยู่แล้ว
                        break;
                    case 'desc':
                        let new_data_search = [];
                        let j = 0;
                        for (var i = (data_search.length - 1); i > -1; i--) {
                            new_data_search[j++] = data_search[i];
                        }
                        data_search = new_data_search;
                        break;
                    default:
                }
            }
            if (status != '') {
                status = status.toLowerCase();
                var data_search_status = [];
                let data_key_status = 0;
                for (var i = 0; i < data_search.length; i++) {
                    if (data_search[i].b_status == status) {
                        data_search_status[data_key_status++] = data_search[i];
                    }
                }
                data_search = data_search_status;
            }
            // if (job != '') {
            //     job = job.toUpperCase();
            //     let data_search_job = [];
            //     let data_key_job = 0;
            //     let check_search = false;
            //     let check_key_sub = ['jo_order_form','jo_note_product_detail','jo_note_additional_option','jo_note_help','jo_remark'];
            //     let = check_search_key_sub = false;
            //     $.each(data_search,function(key,value){
            //         $.each(value,function(key_sub,value_sub){
            //             if (check_key_sub.indexOf(key_sub) > -1) {
            //                 if (value_sub != '' && value_sub != null) {
            //                     if (value_sub.indexOf(job) > -1) {
            //                         check_search = true;
            //                     }
            //                 }
            //             }
            //         });
            //         if (check_search) {
            //             data_search_job[data_key_job] = value;
            //             check_search = false;
            //             data_key_job++;
            //         }
            //     });
            //     data_search = data_search_job;
            // }
            //event select year
            setTimeout(function(){
                let html = '';
                if (data_search.length < 1) {
                    $('table.list-borrowing tbody').html('<tr><td class="text-center" colspan="'+$('table.list-borrowing th').length+'">ไม่พบตามคำค้น</td></tr>');
                    $('.wrap-list-borrowing .card-title b').html(data_search.length);
                }else {
                    $.each(data_search,function(key,value){
                        html += '<tr>';
                        html += '<td>'+value.b_number+'</td>';
                        html += '<td>'+value.b_customer_name+'</td>';
                        html += '<td>'+value.borrow_fullname+'</td>';
                        // html += '<td>'+value.Remark+'</td>';
                        html += '<td>'+value.b_date_th+' <b>/</b> '+value.b_return_th+'</td>';
                        // html += '<td>'+value.Return_date_th+'</td>';
                        html += '<td class="text-center">'+value.b_len+'</td>';
                        let b_status = '';
                        switch (value.b_status) {
                            case 'borrowing':
                                b_status = '<span class="text-info">ยืม</span>';
                                break;
                            case 'some_return':
                                b_status = '<span class="text-warning">คืนบางชิ้น</span>';
                                break;
                            case 'returned':
                                b_status = '<span class="text-success">คืนแล้ว</span>';
                                break;
                            default:
                        }
                        html += '<td>'+b_status+'</td>';
                        html += '<td><button class="btn btn-info pl-2 pr-2 btn-check-borrowing" id="'+value.b_id+'"><i class="material-icons" >search</i> ตรวจสอบ</td>';
                        html += '</tr>';
                    });
                    $('table.list-borrowing tbody').html(html);
                    $('.wrap-list-borrowing .card-title b').html(data_search.length);

                    // $.each(data_search,function(key,value){
                    //     html += '<tr jo-id="'+value.jo_id+'">';
                    //     html += '<td>'+value.jo_customer_name+'</td>';
                    //     html += '<td>'+value.jo_order_form+'</td>';
                    //     html += '<td>'+value.jo_date_th+'</td>';
                    //
                    //     let jo_status = value.jo_status;
                    //     switch (jo_status) {
                    //         case 'new':
                    //             jo_status = '<span class="text-info">สร้างใหม่</span>';
                    //         break;
                    //         case 'accept':
                    //             jo_status = '<span class="text-warning">กำลังดำเนินการ</span>';
                    //         break;
                    //         case 'cancel':
                    //             jo_status = '<span class="text-danger">ยกเลิก</span>';
                    //         break;
                    //         case 'success':
                    //             jo_status = '<span class="text-success">ดำเนินการเรียบร้อยแล้ว</span>';
                    //         break;
                    //         default:
                    //     }
                    //     html += '<td>'+jo_status+'</td>';
                    //     html += '<td><button class="btn btn-info btn-check-job"><i class="material-icons">search</i> ดูรายละเอียด</butoon></td>';
                    //     html += '</tr>';
                    // });
                    // $('.list-job .card-header .card-title b').html(data_search.length);
                    // $('.list-job .card-body tbody').html(html);
                }
            },150);


        });
    }
    function list_borrowing() {
        $.ajax({
            url: base_url('Borrowing/list'),
            // url: sql_server('Borrowing/list'),
            method: 'post',
            dataType: 'json',
            success: function(respond){
                console.log(respond);
                
                let html = '';
                // console.log('test list',respond);
                if (respond[0] == 'success') {
                    $.each(respond[1],function(key,value){
                        html += '<tr>';
                        html += '<td>'+value.b_number+'</td>';
                        html += '<td>'+value.b_customer_name+'</td>';
                        html += '<td>'+value.borrow_fullname+'</td>';
                        // html += '<td>'+value.Remark+'</td>';
                        html += '<td>'+value.b_date_th+' <b>/</b> '+value.b_return_th+'</td>';
                        // html += '<td>'+value.Return_date_th+'</td>';
                        html += '<td class="text-center">'+value.b_len+'</td>';
                        let b_status = '';
                        switch (value.b_status) {
                            case 'borrowing':
                                b_status = '<span class="text-info">ยืม</span>';
                                break;
                            case 'some_return':
                                b_status = '<span class="text-warning">คืนบางชิ้น</span>';
                                break;
                            case 'returned':
                                b_status = '<span class="text-success">คืนแล้ว</span>';
                                break;
                            case 'cancel':
                                b_status = '<span class="text-danger">ยกเลิก</span>';
                                break;
                            default:
                        }
                        html += '<td>'+b_status+'</td>';
                        html += '<td><button class="btn btn-info pl-2 pr-2 btn-check-borrowing" id="'+value.b_id+'"><i class="material-icons" >search</i> ตรวจสอบ</td>';
                        html += '</tr>';
                    });
                    search_sort(respond[1]);
                    $('table.list-borrowing tbody').html(html);
                    $('.wrap-list-borrowing .card-title b').html(respond[1].length);
                }else {

                }
            }
        })
    }

    function validate(){
        $('.row-add-borrowing').on('keyup change','*[name*=b_],*[name*=bd_]',function(){
            if ($(this).hasClass('bd_p_sn') == false && $(this).hasClass('bd_p_detail') == false && $(this).hasClass('list-product') == false) {
                if ($(this).val() != '') {
                    $(this).closest('.form-group').find('.help-block').remove();
                }
            }
        });
        $('.row-add-borrowing .help-block').each(function(){
            $(this).remove();
        });
        $('.row-add-borrowing *[name*=b_],.row-add-borrowing *[name*=bd_]').each(function(key,value){
            if ($(this).hasClass('bd_p_sn') == false && $(this).hasClass('bd_p_detail') == false && $(this).hasClass('list-product') == false) {
                if ($(this).val() == '' && $(this).attr('required')) {
                    $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
                }
            }else {
                if ($(this).val() == '' && $(this).closest('.product-item').length > 1) {
                    $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
                }
            }
        });
        if ($('.row-add-borrowing .help-block').length == 0) { /*check help-block*/
            return true;
        }else {
            $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);/* focus help-block*/
            return false;
        }

    }
    function cal_date(){
        $('.row-add-borrowing input[name=b_date],.row-add-borrowing input[name=b_len]').off();
        $('.row-add-borrowing').on('change keyup','input[name=b_date],input[name=b_len]',function(){
            let date_start = $('.content').find('.row-add-borrowing input[name=b_date]').val();
            let date_num = $('.content').find('.row-add-borrowing input[name=b_len]').val();
            if (date_start != '' && date_num != '') {
                Date.prototype.addDays = function(days) {
                    var date = new Date(this.valueOf());
                    date.setDate(date.getDate() + days);
                    return date;
                }
                var date = new Date(date_start);
                date_num = parseInt(date_num);
                let newdate = date.addDays(date_num);
                let year = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(newdate);
                let month = new Intl.DateTimeFormat('en', { month: 'numeric' }).format(newdate);
                let day = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(newdate);
                month = month.toString();
                if (month.length == 1) {
                    month = '0' + month;
                }
                day = day.toString();
                if (day.length == 1) {
                    day = '0' + day;
                }
                back = year+'-'+month+'-'+day;
                $('.content').find('.row-add-borrowing input.date_back').val(back);
            }else {
                $('.content').find('.row-add-borrowing input.date_back').val('');
            }
        })
    }
});
