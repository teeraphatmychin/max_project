$(document).ready(function(){
    list_customer()
    list_service_name()
    list_tender()
    setInterval(check_online_status,5000)
    // $('.loading-screen').show()
    setInterval(list_tender_realtime,5000)
    max_chosen($('.form-add-tender select[name=t_contract_type]'));
    max_chosen($('.form-add-tender select[name=t_contract_status]'));
    // $('.modal-tender-detail').modal('show')




    $('.row-add-tender')
        .on('click','input.add-customer',function(){ /* manual customer*/
            let wrap = $(this).closest('.row-add-tender');
            wrap.find('.list-customer').closest('.form-group').find('.help-block').remove();
            wrap.find('input.input-customer-name').closest('.form-group').find('.help-block').remove();
            if ($(this).prop('checked') == true) {
                if (wrap.find('.list-customer').val() != '') {
                    let customer_name = wrap.find('.list-customer option:selected').html();
                    wrap.find('input.input-customer-name').closest('.form-group').addClass('is-filled');
                    wrap.find('input.input-customer-name').val(customer_name);
                }else {
                    wrap.find('input[name=add_customer]').prop('checked',true);
                }
                $(this).closest('.row-add-tender').find('.list-customer').closest('.form-group').hide();
                $(this).closest('.row-add-tender').find('input.input-customer-name').closest('.form-group').show();
                $(this).closest('.row-add-tender').find('input.input-customer-name').attr('name','t_customer_name');
                $(this).closest('.row-add-tender').find('select.list-customer').attr('name','');
            }else {
                $(this).closest('.row-add-tender').find('.list-customer').closest('.form-group').show();
                $(this).closest('.row-add-tender').find('input.input-customer-name').closest('.form-group').hide();
                $(this).closest('.row-add-tender').find('input.input-customer-name').attr('name','');
                $(this).closest('.row-add-tender').find('select.list-customer').attr('name','t_customer_id');
            }
        })
        .on('click','.btn-add-tender',function(){ /* add  tender*/
            // $('.loading-screen').show();
        })
        .on('click','.btn-add-tender',function(){ /* add  tender*/
                let data = $(this).closest('.row-add-tender').find('form.form-add-tender').serialize();
                let type = $('.row-add-tender').find('input[name=type]').val()
                if (validate()) {
                    switch (type) {
                        case 'add':
                            $.ajax({
                                url: base_url('tender/add'),
                                method: 'post',
                                data: data,
                                 dataType: 'json',
                                success: function(data){
                                    // console.log(data);
                                    if (data[0] == 'success') {
                                        $('.loading-screen').hide();
                                        $('.row-add-tender').hide();
                                        Swal.fire({
                                            type: 'success',
                                            title: 'บันทึกสำเร็จ',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                        list_tender()
                                    }else {
                                        $('.loading-screen').hide();
                                        Swal.fire({
                                            type: 'error',
                                            title: data[1],
                                            text: data[3],
                                        });
                                    }
                                }
                            })
                            break;
                        case 'edit':
                            $.ajax({
                                url: base_url('tender/update'),
                                method: 'post',
                                data: data,
                                dataType: 'json',
                                success: function(data){
                                    // console.log(data);
                                    if (data[0] == 'success') {
                                        $('.loading-screen').hide()
                                        $('.row-add-tender').hide()
                                        Swal.fire({
                                            type: 'success',
                                            title: 'บันทึกสำเร็จ',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                    }else {
                                        $('.loading-screen').hide();
                                        Swal.fire({
                                            type: 'error',
                                            title: data[1],
                                            text: data[3],
                                        });
                                    }
                                    list_tender()
                                }
                            })
                            break;
                        default:

                    }

                }
        })
        $('.row-add-tender-detail')
        .on('click','.btn-add-tender-detail',function(){ /* add  tender*/
            $('.loading-screen').show();
        })
        .on('click','.btn-add-tender-detail',function(){ /* add  tender*/
            let data = $(this).closest('.row-add-tender-detail').find('form.form-add-tender-detail').serialize()
            $.ajax({
                url: base_url('tender/add_detail'),
                method: 'post',
                data: data,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if(data[0] == 'success'){
                        Swal.fire({
                            type: 'success',
                            title: 'บันทึกสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('.row-add-tender-detail').hide()
                        list_tender()
                    }else {
                        Swal.fire({
                            type: 'error',
                            title: data[1],
                            text: data[3],
                        });
                    }

                    $('.loading-screen').hide();

                }
            })
        })
        $('.row-update-draf')
        .on('click','.btn-cancel-draf',function(){
            $('.row-update-draf').hide()
        })
        .on('click','.btn-update-draf',function(){
            $('.loading-screen').show()
        })
        .on('click','.btn-update-draf',function(){
            let data = $(this).closest('.row-update-draf').find('form.form-update-draf').serialize()
            $.ajax({
                url: base_url('tender/update_draf'),
                method: 'post',
                data: data,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if(data[0] == 'success'){
                        Swal.fire({
                            type: 'success',
                            title: 'บันทึกสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('.row-update-draf').hide()
                        list_tender()
                    }else {
                        Swal.fire({
                            type: 'error',
                            title: data[1],
                            text: data[3],
                        });
                    }
                    $('.loading-screen').hide();

                }
            })
        })


        function validate(){
            $('.row-add-tender .first-step *[name*=t_]').each(function(key,value){
                if ($(this).val() == '' && typeof $(this).attr('required') !== typeof undefined && $(this).attr('required') !== false) {
                    if ($(this).prop('tagName') == 'SELECT') {
                        $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                    }else {
                        $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
                    }
                }
            })
            $('.row-add-tender').on('change keyup','.first-step *[name*=t_]',function(){
                if ($(this).val() != '') {
                    $(this).closest('.form-group').find('.help-block').remove();
                }else {
                    $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                }
            });
            var error = true;
            if ($('.row-add-tender .help-block').length > 0) {
                error = false;
                $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);
            }
            // $('.row-add-quotation .help-block').each(function(key,value){
            //     console.log($(this));
            // });
            return error;
        }




        var $list_product_action = true;
        $('.modal-tender-detail').on('click','.modal-footer .btn-option',function(){
            let type = $(this).attr('option-type');
            let id = $(this).closest('.modal-tender-detail').find('.wrap-tender-detail').attr('tender-id')
            switch (type) {
                case 'edit':
                    $('html, body').animate({scrollTop:($('.row-add-tender').offset().top - 150)}, 500);
                    $('.modal-tender-detail').modal('hide')
                    $('.row-add-tender-detail').hide()
                    $('.row-add-tender').hide()
                    $('.loading-screen').show()
                    let wrap_row_add_tender = $('.row-add-tender')
                    wrap_row_add_tender.find('input').val('')
                    wrap_row_add_tender.find('input').closest('.form-group').addClass('is-filled')
                    wrap_row_add_tender.find('select').val('')
                    $.ajax({
                        url: base_url('Tender/get'),
                        method: 'post',
                        data: {t_id:id},
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            if (data[0] == 'success') {
                                $('.row-add-tender').show()
                                data = data[1][0]
                                wrap_row_add_tender.find('select[name=t_sale]').val(data.t_sale)
                                max_chosen(wrap_row_add_tender.find('select[name=t_sale]'),'update')
                                wrap_row_add_tender.find('select[name=t_budget_type]').val(data.t_budget_type)
                                max_chosen(wrap_row_add_tender.find('select[name=t_budget_type]'),'update')
                                wrap_row_add_tender.find('select[name=t_customer]').val(data.t_customer)
                                max_chosen(wrap_row_add_tender.find('select[name=t_customer]'),'update')
                                wrap_row_add_tender.find('select[name=t_contract_type]').val(data.t_contract_type)
                                max_chosen(wrap_row_add_tender.find('select[name=t_contract_type]'),'update')
                                wrap_row_add_tender.find('select[name=t_contract_status]').val(data.t_contract_status)
                                max_chosen(wrap_row_add_tender.find('select[name=t_contract_status]'),'update')
                                wrap_row_add_tender.find('input[name=t_open_letter]').val(data.t_open_letter)
                                wrap_row_add_tender.find('input[name=t_bank_confirm]').val(data.t_bank_confirm)
                                wrap_row_add_tender.find('input[name=t_compare]').val(data.t_compare)
                                wrap_row_add_tender.find('input[name=t_year_warranty]').val(data.t_year_warranty)
                                wrap_row_add_tender.find('input[name=t_contract_date]').val(data.t_contract_date)
                                wrap_row_add_tender.find('input[name=t_contract_number]').val(data.t_contract_number)
                                wrap_row_add_tender.find('input[name=t_start_contract]').val(data.t_start_contract)
                                wrap_row_add_tender.find('input[name=t_end_contract]').val(data.t_end_contract)
                                wrap_row_add_tender.find('input[name=t_zone]').val(data.t_zone)
                                wrap_row_add_tender.find('input[name=type]').val('edit')
                                wrap_row_add_tender.find('input[name=add_tender]').val('1')
                                wrap_row_add_tender.find('input[name=t_number]').val(data.t_id)
                                console.log(wrap_row_add_tender.find('select[name=t_sale]').val());
                            }else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'ไม่สามารถแสดงข้อมูลได้',
                                    text: data[1]
                                });
                            }
                            $('.loading-screen').hide()

                        }
                    })

                    break;
                case 'add_tender_detail':
                    $('.modal-tender-detail').modal('hide')
                    $('.row-add-tender-detail').show()
                    $('.row-add-tender').hide()
                    $('html, body').animate({scrollTop:($('.row-add-tender-detail').offset().top)}, 500)
                    let tag = $('.row-add-tender-detail form.form-add-tender-detail')
                    max_chosen(tag.find('.product-item select.td-brand'))
                    max_chosen(tag.find('.product-item select.td-status'))
                    max_chosen(tag.find('.product-item select.td-type'))
                    tag.find('input').val('')
                    tag.find('input[name=t_id]').val(id)
                    $.each(tag.find('.product-item'),function(){
                        if ($(this).index() > 0) {
                            $(this).remove();
                        }
                    })
                    let html = '';
                    html += '<div class="product-item border rounded col-12 row ml-0 mr-0 pt-3">';
                        html += '<div class="col-md-3 wrap-input">';
                            html += '<div class="form-group bmd-form-group">';
                                html += '<select class="form-control form-control-chosen td-brand" name="td_brand[]">';
                                    html += '<option value="">เลือกแบรนด์..</option>';
                                    html += '<option value="PHILIPS">Philips</option>';
                                    html += '<option value="ZOLL">ZOLL</option>';
                                    html += '<option value="Bennett">Bennett</option>';
                                    html += '<option value="CMVS">CMVS</option>';
                                    html += '<option value="Hill-Rom">Hill-Rom</option>';
                                    html += '<option value="Air Liquide">Air Liquide</option>';
                                    html += '<option value="OBCD">OBCD</option>';
                                    html += '<option value="CDY">CDY</option>';
                                    html += '<option value="PMD">PMD</option>';
                                    html += '<option value="WelchAllyn">WelchAllyn</option>';
                                    html += '<option value="Schiller">Schiller</option>';
                                    html += '<option value="BARD">BARD</option>';
                                    html += '<option value="ICU Medical">ICU Medical</option>';
                                    html += '<option value="arjo">arjo</option>';
                                html += '</select>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="col-md-5 wrap-input">';
                            html += '<div class="form-group bmd-form-group is-filled">';
                                html += '<label class="bmd-label-floating"><strong>รุ่น</strong></label>';
                                html += '<input type="text" class="form-control" name="td_gen[]" value="" required>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="col-md-2 wrap-input">';
                            html += '<div class="form-group bmd-form-group is-filled">';
                                html += '<label class="bmd-label-floating"><strong>จำนวน</strong></label>';
                                html += '<input type="text" class="form-control" name="td_num[]" value="" required>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="col-md-2 wrap-input">';
                            html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                html += '<select class="form-select form-control-chosen td-type" name="td_type[]">';
                                    html += '<option value="">หน่วย..</option>';
                                    html += '<option value="ก้อน">ก้อน</option>';
                                    html += '<option value="คัน">คัน</option>';
                                    html += '<option value="เครื่อง">เครื่อง</option>';
                                    html += '<option value="งาน">งาน</option>';
                                    html += '<option value="ชิ้น">ชิ้น</option>';
                                    html += '<option value="ชุด">ชุด</option>';
                                    html += '<option value="ตัว">ตัว</option>';
                                    html += '<option value="ตู้">ตู้</option>';
                                    html += '<option value="เตียง">เตียง</option>';
                                    html += '<option value="ระบบ">ระบบ</option>';
                                    html += '<option value="รายการ">รายการ</option>';
                                    html += '<option value="หลัง">หลัง</option>';
                                    html += '<option value="อัน">อัน</option>';
                                html += '</select>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="col-md-4 wrap-input">';
                            html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                html += '<label class="bmd-label-floating"><strong>ราคา</strong></label>';
                                html += '<input type="number" class="form-control" name="td_price[]" value="" required>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="col-md-3 wrap-input">';
                            html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                html += '<label class="bmd-label-floating"><strong>จำนวนวันส่งของ</strong></label>';
                                html += '<input type="number" class="form-control" name="td_send_product[]" value="" required>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="col-md-3 wrap-input">';
                            html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                html += '<label class="bmd-label-floating"><strong>จำนวนวันยืนราคา</strong></label>';
                                html += '<input type="number" class="form-control" name="td_date_submit_price[]" value="" required>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="col-md-2 wrap-input">';
                            html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                html += '<select class="form-select form-control-chosen td-status" name="td_status[]">';
                                    html += '<option value="">สถานะ..</option>';
                                    html += '<option value="ได้งาน">ได้งาน</option>';
                                    html += '<option value="ไม่ได้งาน">ไม่ได้งาน</option>';
                                    html += '<option value="รอ">รอ</option>';
                                html += '</select>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="col-md-10 wrap-input">';
                            html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                html += '<label class="bmd-label-floating"><strong>หมายเหตุ</strong></label>';
                                html += '<input type="text" class="form-control" name="td_remark[]" value="" required>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="col-md-2 text-center">';
                            html += '<button type="button" class="btn btn-danger pr-2 pl-2 btn-delete-product"><i class="material-icons">close</i> ลบออก</button>';
                        html += '</div>';
                    html += '</div>';
                    tag.find('.btn-add-product').click(function(){
                        tag.find('.wrap-product').append(html)
                        max_chosen(tag.find('.wrap-product .product-item:last-child select.td-brand'))
                        max_chosen(tag.find('.wrap-product .product-item:last-child select.td-status'))
                        max_chosen(tag.find('.wrap-product .product-item:last-child select.td-type'))
                    })

                    break;
                case 'edit_tender_detail':
                    $('.modal-tender-detail').modal('hide')
                    $('.row-add-tender-detail').hide()
                    $('.row-add-tender').hide()
                    $('html, body').animate({scrollTop:($('.row-add-tender-detail').offset().top)}, 500)
                    let wrap_row_add_tender_detail = $('.row-add-tender-detail')
                    wrap_row_add_tender_detail.find('input').val('')
                    wrap_row_add_tender_detail.find('input').closest('.form-group').addClass('is-filled')
                    wrap_row_add_tender_detail.find('select').val('')
                    wrap_row_add_tender_detail.find('input[name=type]').val('edit')
                    wrap_row_add_tender_detail.find('input[name=t_id]').val(id)
                    let tag2 = $('.row-add-tender-detail form.form-add-tender-detail')
                    max_chosen(tag2.find('.product-item select.td-brand'))
                    max_chosen(tag2.find('.product-item select.td-status'))
                    max_chosen(tag2.find('.product-item select.td-type'))
                    $.ajax({
                        url: base_url('Tender/get_detail'),
                        method: 'post',
                        data: {t_id:id},
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            if (data[0] == 'success') {
                                $('.row-add-tender-detail').show()
                                data = data[1]
                                tag2.find('.wrap-product').html('')
                                $.each(data,function(key,value){
                                        let html = '';
                                        html += '<div class="product-item border rounded col-12 row ml-0 mr-0 pt-3">';
                                            html += '<div class="col-md-3 wrap-input">';
                                                html += '<div class="form-group bmd-form-group">';
                                                    html += '<select class="form-control form-control-chosen td-brand" name="td_brand[]">';
                                                        html += '<option value="">เลือกแบรนด์..</option>';
                                                        html += '<option value="'+value.td_brand+'" selected>'+value.td_brand+'</option>';
                                                        html += '<option value="PHILIPS">Philips</option>';
                                                        html += '<option value="ZOLL">ZOLL</option>';
                                                        html += '<option value="Bennett">Bennett</option>';
                                                        html += '<option value="CMVS">CMVS</option>';
                                                        html += '<option value="Hill-Rom">Hill-Rom</option>';
                                                        html += '<option value="Air Liquide">Air Liquide</option>';
                                                        html += '<option value="OBCD">OBCD</option>';
                                                        html += '<option value="CDY">CDY</option>';
                                                        html += '<option value="PMD">PMD</option>';
                                                        html += '<option value="WelchAllyn">WelchAllyn</option>';
                                                        html += '<option value="BARD">BARD</option>';
                                                        html += '<option value="ICU Medical">ICU Medical</option>';
                                                        html += '<option value="arjo">arjo</option>';
                                                    html += '</select>';
                                                html += '</div>';
                                            html += '</div>';
                                            html += '<div class="col-md-5 wrap-input">';
                                                html += '<div class="form-group bmd-form-group is-filled">';
                                                    html += '<label class="bmd-label-floating"><strong>รุ่น</strong></label>';
                                                    html += '<input type="text" class="form-control td_gen" name="td_gen[]" value="'+value.td_gen+'" required>';
                                                html += '</div>';
                                            html += '</div>';
                                            html += '<div class="col-md-2 wrap-input">';
                                                html += '<div class="form-group bmd-form-group is-filled">';
                                                    html += '<label class="bmd-label-floating"><strong>จำนวน</strong></label>';
                                                    html += '<input type="text" class="form-control td_num" name="td_num[]" value="'+value.td_num+'" required>';
                                                html += '</div>';
                                            html += '</div>';
                                            html += '<div class="col-md-2 wrap-input">';
                                                html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                                    html += '<select class="form-select form-control-chosen td-type" name="td_type[]">';
                                                        html += '<option value="">หน่วย..</option>';
                                                        html += '<option value="'+value.td_type+'" selected>'+value.td_type+'</option>';
                                                        html += '<option value="ก้อน">ก้อน</option>';
                                                        html += '<option value="คัน">คัน</option>';
                                                        html += '<option value="เครื่อง">เครื่อง</option>';
                                                        html += '<option value="งาน">งาน</option>';
                                                        html += '<option value="ชิ้น">ชิ้น</option>';
                                                        html += '<option value="ชุด">ชุด</option>';
                                                        html += '<option value="ตัว">ตัว</option>';
                                                        html += '<option value="ตู้">ตู้</option>';
                                                        html += '<option value="เตียง">เตียง</option>';
                                                        html += '<option value="ระบบ">ระบบ</option>';
                                                        html += '<option value="รายการ">รายการ</option>';
                                                        html += '<option value="หลัง">หลัง</option>';
                                                        html += '<option value="อัน">อัน</option>';
                                                    html += '</select>';
                                                html += '</div>';
                                            html += '</div>';
                                            html += '<div class="col-md-4 wrap-input">';
                                                html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                                    html += '<label class="bmd-label-floating"><strong>ราคา</strong></label>';
                                                    html += '<input type="number" class="form-control td_price" name="td_price[]" value="'+value.td_price+'" required>';
                                                html += '</div>';
                                            html += '</div>';
                                            html += '<div class="col-md-3 wrap-input">';
                                                html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                                    html += '<label class="bmd-label-floating"><strong>จำนวนวันส่งของ</strong></label>';
                                                    html += '<input type="number" class="form-control td_send_product" name="td_send_product[]" value="'+value.td_send_product+'" required>';
                                                html += '</div>';
                                            html += '</div>';
                                            html += '<div class="col-md-3 wrap-input">';
                                                html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                                    html += '<label class="bmd-label-floating"><strong>จำนวนวันยืนราคา</strong></label>';
                                                    html += '<input type="number" class="form-control td_date_submit_price" name="td_date_submit_price[]" value="'+value.td_date_submit_price+'" required>';
                                                html += '</div>';
                                            html += '</div>';
                                            html += '<div class="col-md-2 wrap-input">';
                                                html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                                    html += '<select class="form-select form-control-chosen td-status" name="td_status[]">';
                                                        html += '<option value="">สถานะ..</option>';
                                                        html += '<option value="'+value.td_status+'" selected>'+value.td_status+'</option>';
                                                        html += '<option value="ได้งาน">ได้งาน</option>';
                                                        html += '<option value="ไม่ได้งาน">ไม่ได้งาน</option>';
                                                        html += '<option value="รอ">รอ</option>';
                                                    html += '</select>';
                                                html += '</div>';
                                            html += '</div>';
                                            html += '<div class="col-md-10 wrap-input">';
                                                html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                                    html += '<label class="bmd-label-floating"><strong>หมายเหตุ</strong></label>';
                                                    html += '<input type="text" class="form-control td_remark" name="td_remark[]" value="'+value.td_remark+'" required>';
                                                html += '</div>';
                                            html += '</div>';
                                            html += '<div class="col-md-2 text-center">';
                                                html += '<button type="button" class="btn btn-danger pr-2 pl-2 btn-delete-product"><i class="material-icons">close</i> ลบออก</button>';
                                            html += '</div>';
                                        html += '</div>';
                                        tag2.find('.wrap-product').append(html)
                                        max_chosen(tag2.find('.wrap-product .product-item:last-child select.td-brand'))
                                        max_chosen(tag2.find('.wrap-product .product-item:last-child select.td-status'))
                                        max_chosen(tag2.find('.wrap-product .product-item:last-child select.td-type'))
                                    // }
                                })
                                let html = '';
                                html += '<div class="product-item border rounded col-12 row ml-0 mr-0 pt-3">';
                                    html += '<div class="col-md-3 wrap-input">';
                                        html += '<div class="form-group bmd-form-group">';
                                            html += '<select class="form-control form-control-chosen td-brand" name="td_brand[]">';
                                                html += '<option value="">เลือกแบรนด์..</option>';
                                                html += '<option value="PHILIPS">Philips</option>';
                                                html += '<option value="ZOLL">ZOLL</option>';
                                                html += '<option value="Bennett">Bennett</option>';
                                                html += '<option value="CMVS">CMVS</option>';
                                                html += '<option value="Hill-Rom">Hill-Rom</option>';
                                                html += '<option value="Air Liquide">Air Liquide</option>';
                                                html += '<option value="OBCD">OBCD</option>';
                                                html += '<option value="CDY">CDY</option>';
                                                html += '<option value="PMD">PMD</option>';
                                                html += '<option value="WelchAllyn">WelchAllyn</option>';
                                                html += '<option value="BARD">BARD</option>';
                                                html += '<option value="ICU Medical">ICU Medical</option>';
                                                html += '<option value="arjo">arjo</option>';
                                            html += '</select>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="col-md-5 wrap-input">';
                                        html += '<div class="form-group bmd-form-group is-filled">';
                                            html += '<label class="bmd-label-floating"><strong>รุ่น</strong></label>';
                                            html += '<input type="text" class="form-control" name="td_gen[]" value="" required>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="col-md-2 wrap-input">';
                                        html += '<div class="form-group bmd-form-group is-filled">';
                                            html += '<label class="bmd-label-floating"><strong>จำนวน</strong></label>';
                                            html += '<input type="text" class="form-control" name="td_num[]" value="" required>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="col-md-2 wrap-input">';
                                        html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                            html += '<select class="form-select form-control-chosen td-type" name="td_type[]">';
                                                html += '<option value="">หน่วย..</option>';
                                                html += '<option value="ก้อน">ก้อน</option>';
                                                html += '<option value="คัน">คัน</option>';
                                                html += '<option value="เครื่อง">เครื่อง</option>';
                                                html += '<option value="งาน">งาน</option>';
                                                html += '<option value="ชิ้น">ชิ้น</option>';
                                                html += '<option value="ชุด">ชุด</option>';
                                                html += '<option value="ตัว">ตัว</option>';
                                                html += '<option value="ตู้">ตู้</option>';
                                                html += '<option value="เตียง">เตียง</option>';
                                                html += '<option value="ระบบ">ระบบ</option>';
                                                html += '<option value="รายการ">รายการ</option>';
                                                html += '<option value="หลัง">หลัง</option>';
                                                html += '<option value="อัน">อัน</option>';
                                            html += '</select>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="col-md-4 wrap-input">';
                                        html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                            html += '<label class="bmd-label-floating"><strong>ราคา</strong></label>';
                                            html += '<input type="number" class="form-control" name="td_price[]" value="" required>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="col-md-3 wrap-input">';
                                        html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                            html += '<label class="bmd-label-floating"><strong>จำนวนวันส่งของ</strong></label>';
                                            html += '<input type="number" class="form-control" name="td_send_product[]" value="" required>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="col-md-3 wrap-input">';
                                        html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                            html += '<label class="bmd-label-floating"><strong>จำนวนวันยืนราคา</strong></label>';
                                            html += '<input type="number" class="form-control" name="td_date_submit_price[]" value="" required>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="col-md-2 wrap-input">';
                                        html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                            html += '<select class="form-select form-control-chosen td-status" name="td_status[]">';
                                                html += '<option value="">สถานะ..</option>';
                                                html += '<option value="ได้งาน">ได้งาน</option>';
                                                html += '<option value="ไม่ได้งาน">ไม่ได้งาน</option>';
                                                html += '<option value="รอ">รอ</option>';
                                            html += '</select>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="col-md-10 wrap-input">';
                                        html += '<div class="form-group bmd-form-group dropdown is-focused">';
                                            html += '<label class="bmd-label-floating"><strong>หมายเหตุ</strong></label>';
                                            html += '<input type="text" class="form-control" name="td_remark[]" value="" required>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="col-md-2 text-center">';
                                        html += '<button type="button" class="btn btn-danger pr-2 pl-2 btn-delete-product"><i class="material-icons">close</i> ลบออก</button>';
                                    html += '</div>';
                                html += '</div>';
                                tag2.find('.btn-add-product').click(function(){
                                    tag2.find('.wrap-product').append(html)
                                    max_chosen(tag2.find('.wrap-product .product-item:last-child select.td-brand'))
                                    max_chosen(tag2.find('.wrap-product .product-item:last-child select.td-status'))
                                    max_chosen(tag2.find('.wrap-product .product-item:last-child select.td-type'))
                                })
                            }else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'ไม่สามารถแสดงข้อมูลได้',
                                    text: data[1]
                                });
                            }
                            $('.loading-screen').hide()
                        }
                    })
                    break;
                case 'update_draf':
                    $.ajax({
                        url: base_url('Tender/get_detail'),
                        method: 'post',
                        data: {t_id:id},
                        dataType: 'json',
                        success: function(data){
                            if (data[0] == 'success') {
                                $('.modal-tender-detail').modal('hide')
                                $('.row-add-tender-detail').hide()
                                $('.row-add-tender').hide()
                                $('.row-update-draf').show()
                                $('html, body').animate({scrollTop:($('.row-add-tender-detail').offset().top)}, 500)
                                let html = ''
                                $.each(data[1],function(key,value){
                                    html += '<input type="hidden" name="td_id[]" value="'+value.td_id+'">';
                                    html += '<div class="row pr-0 pl-0 m-0 col-12 mt-2 mb-2" style="font-size:0.8rem;height: fit-content;">';
                                        html += '<div class="col-md-12 row m-0 pr-0 pl-0">';
                                            html += '<div class="row m-0 border rounded col-12 p-0">';
                                                html += '<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>รายละเอียด</strong></div>';
                                                html += '<div class="row p-0 m-0 col-12 ">';
                                                html += '<div class="row p-0 m-0 col-2 ">';
                                                html += '<div class="col-md-12 border-bottom border-right text-center"><strong>แบรนด์</strong></div>';
                                                html += '</div>';
                                                html += '<div class="row p-0 m-0 col-10 ">';
                                                html += '<div class="col-md-2 border-bottom border-right text-center"><strong>รุ่น</strong></div>';
                                                html += '<div class="col-md-2 border-bottom border-right text-center"><strong>จำนวน</strong></div>';
                                                html += '<div class="col-md-2 border-bottom border-right text-center"><strong>ราคา</strong></div>';
                                                html += '<div class="col-md-1 border-bottom border-right text-center"><strong>ส่งของ</strong></div>';
                                                html += '<div class="col-md-1 border-bottom border-right text-center"><strong>ยืนราคา</strong></div>';
                                                // html += '<div class="col-md-1 border-bottom border-right text-center"><strong>สถานะ</strong></div>';
                                                html += '<div class="col-md-2 border-bottom border-right text-center row mr-0 ml-0 pr-0 pl-0">';
                                                html += '<div class="col-12"><strong>สถานะ</strong></div>';
                                                html += '<div class="col border-right border-top">งาน</div>';
                                                html += '<div class="col  border-top">คลังสินค้า</div>';
                                                html += '</div>';
                                                // html += '<div class="col-md-3 border-bottom text-center"><strong>หมายเหตุ</strong></div>';
                                                html += '<div class="col-md-1 border-bottom border-right text-center"><strong>วันส่งของ</strong></div>';
                                                html += '<div class="col-md-1 border-bottom border-right text-center"><strong>เลขที่ Do</strong></div>';
                                                html += '</div>';
                                                html += '<div class="row p-0 m-0 col-12 list-tender-detail" >';

                                                html += '<div class="row m-0 p-0 col-12">';
                                                html += '<div class="row m-0 p-0 col-2">';
                                                html += '<div class="col-md-12 text-truncate border-right text-center" data-bs-toggle="tooltip" title="'+value.td_brand+'">'+value.td_brand+'</div>';
                                                html += '</div>';
                                                html += '<div class="row m-0 p-0 col-10">';
                                                html += '<div class="row m-0 p-0 col-12">';
                                                html += '<div class="col-md-2 border-right text-center data-bs-toggle="tooltip" title="'+value.td_gen+'">'+value.td_gen+'</div>';
                                                html += '<div class="col-md-2 text-truncate border-right text-center data-bs-toggle="tooltip" title="'+value.td_num+'">'+value.td_num+' '+value.td_type+'</div>';
                                                html += '<div class="col-md-2 text-truncate border-right text-center">'+value.td_price_text+'</div>';
                                                html += '<div class="col-md-1 text-truncate border-right text-center">'+value.td_send_product+'</div>';
                                                html += '<div class="col-md-1 text-truncate border-right text-center">'+value.td_date_submit_price+'</div>';
                                                html += '<div class="col-md-1 text-truncate border-right text-center">'+value.td_status_text+'</div>';
                                                html += '<div class="col-md-1 text-truncate border-right text-center">'+value.td_stock_status_text+'</div>';
                                                html += '<div class="col-md-1 text-truncate border-right text-center">'+value.td_stock_send_product+'</div>';
                                                html += '<div class="col-md-1 text-truncate border-right text-center">'+value.td_do_number+'</div>';
                                                // html += '<div class="col-md-1 text-truncate text-center">'+value.td_of_number+'</div>';
                                                html += '</div>';
                                                html += '</div>';
                                                html += '</div>';

                                                html += '</div>';
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="draf-item col-12 row mt-3">';
                                        html += '<div class="col-md-4 wrap-input">';
                                            html += '<div class="form-group bmd-form-group is-filled">';
                                                html += '<label class="bmd-label-floating"><strong>SR</strong></label>';
                                                html += '<input type="date" class="form-control td_gen" name="td_signature_sr[]" value="'+value.td_signature_sr+'">';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="col-md-4 wrap-input">';
                                            html += '<div class="form-group bmd-form-group is-filled">';
                                                html += '<label class="bmd-label-floating"><strong>AM</strong></label>';
                                                html += '<input type="date" class="form-control td_gen" name="td_signature_am[]" value="'+value.td_signature_am+'">';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="col-md-4 wrap-input">';
                                            html += '<div class="form-group bmd-form-group is-filled">';
                                                html += '<label class="bmd-label-floating"><strong>SM</strong></label>';
                                                html += '<input type="date" class="form-control td_gen" name="td_signature_sm[]" value="'+value.td_signature_sm+'">';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="col-md-3 wrap-input">';
                                            html += '<div class="form-group bmd-form-group is-filled">';
                                                // html += '<label class="bmd-label-floating"><strong>Draf OF</strong></label>';
                                                // html += '<input type="text" class="form-control td_num" name="td_draf_of_status[]" value="'+value.td_draf_of_status+'">';
                                                let value_draf_of = ''
                                                if (value.td_draf_of_status == 'ส่ง') {
                                                    value_draf_of = 'selected'
                                                }
                                                html += '<select class="form-control form-control-chosen td_draf_of_status" name="td_draf_of_status[]"><option value="">Draf OF</option><option value="ส่ง" '+value_draf_of+'>ส่ง</option></select>';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="col-md-3 wrap-input">';
                                            html += '<div class="form-group bmd-form-group is-filled">';
                                                html += '<label class="bmd-label-floating"><strong>เลขที่ OF</strong></label>';
                                                html += '<input type="text" class="form-control td_num" name="td_of_number[]" value="'+value.td_of_number+'">';
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                })
                                $('.row-update-draf .form-update-draf .wrap-product').html(html)
                                $('.row-update-draf .form-update-draf .wrap-product .draf-item').each(function(){
                                    max_chosen($(this).find('select.td_draf_of_status'))
                                })
                            }else {

                            }

                        }
                    })
                    break;
                case 'manage_contract': //get_contract

                    $('html, body').animate({scrollTop:($('.row-add-tender').offset().top - 150)}, 500);
                    $('.row-manage-contract').hide()
                    $('.row-add-tender').hide()
                    $('.row-add-tender-detail').hide()
                    $('.row-update-draf').hide()
                    $('.modal-tender-detail').modal('hide')
                    $('.row-add-contract').show()

                    let data_contract = get_contract(id)
                    // console.log('data contract',data_contract);
                    if (data_contract[0] != 'empty') {
                        let html = '';
                        $.each(data_contract[1],function(key,value){
                            html += '<div class="row m-0 col-12 mt-2 mb-2 p-0" style="font-size:0.8rem;height: fit-content;">';
                                html += '<div class="col-md-12 row m-0">';
                                    html += '<div class="col-sm-12 col-md-12 col-lg-12 row m-0 p-0">';
                                        html += '<div class="row m-0 border border-primary rounded">';
                                            html += '<div class="col-md-12 border-bottom text-center text-white bg-primary p-1" style="border-radius: 6px 6px 0px 0px">';
                                                html += '<strong>สัญญา</strong>';
                                            html += '</div>';
                                            html += '<div class="col-sm-4 col-md-4 border-bottom border-right">';
                                                html += '<strong>คู่สัญญา/ใบสั่งซื้อ :</strong>';
                                            html += '</div>';
                                            html += '<div class="col-sm-8 col-md-8 border-bottom">';
                                                html += value['contract'].tc_type;
                                            html += '</div>';
                                            html += '<div class="col-sm-4 col-md-4 border-bottom border-right">';
                                                html += '<strong>เลขสัญญา :</strong>';
                                            html += '</div>';
                                            html += '<div class="col-sm-8 col-md-8 border-bottom">';
                                                html += value['contract'].tc_number;
                                            html += '</div>';
                                            html += '<div class="col-sm-4 col-md-4 border-bottom border-right">';
                                                html += '<strong>วันเรียกทำสัญญา :</strong>';
                                            html += '</div>';
                                            html += '<div class="col-sm-8 col-md-8 border-bottom">';
                                                html += value['contract'].tc_date_text;
                                            html += '</div>';
                                            html += '<div class="col-sm-4 col-md-4 border-bottom border-right">';
                                                html += '<strong>สถานะใบสัญญา :</strong>';
                                            html += '</div>';
                                            html += '<div class="col-sm-8 col-md-8 border-bottom t-contract-status">';
                                                html += value['contract'].tc_status;
                                            html += '</div>';
                                            html += '<div class="col-sm-7 col-md-4 border-bottom border-right">';
                                                html += '<strong>วันเริ่ม - สิ้นสุดสัญญา :</strong>';
                                            html += '</div>';
                                            html += '<div class="col-sm-5 col-md-8 border-bottom">';
                                                html += value['contract'].tc_start_text+' - '+value['contract'].tc_end_text;
                                            html += '</div>';
                                            html += '<div class="col-12 p-0 m-0">';
                                                html += '<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center text-white bg-primary" style="border-radius: 0px 0px 0px 0px">';
                                                    html += '<strong>รายละเอียด</strong>';
                                                html += '</div>';
                                                html += '<div class="row p-0 m-0 col-12 ">';
                                                    html += '<div class="row p-0 m-0 col-1 ">';
                                                        html += '<div class="col-md-12 border-bottom border-right text-center">';
                                                            html += '<strong>แบรนด์</strong>';
                                                        html += '</div>';
                                                    html += '</div>';
                                                    html += '<div class="row p-0 m-0 col-11 ">';
                                                        html += '<div class="col-md-2 border-bottom border-right text-center">';
                                                            html += '<strong>รุ่น</strong>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                            html += '<strong>จำนวน</strong>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-2 border-bottom border-right text-center">';
                                                            html += '<strong>ราคา</strong>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                            html += '<strong>ส่งของ</strong>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                            html += '<strong>ยืนราคา</strong>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-2 border-bottom border-right text-center row mr-0 ml-0 pr-0 pl-0">';
                                                            html += '<div class="col-12">';
                                                                html += '<strong>สถานะ</strong>';
                                                            html += '</div>';
                                                            html += '<div class="col border-right border-top">';
                                                                html += 'งาน';
                                                            html += '</div>';
                                                            html += '<div class="col  border-top">';
                                                                html += 'คลังสินค้า';
                                                            html += '</div>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-3 border-bottom border-right text-center">';
                                                            html += '<strong>ตัวเลือก</strong>';
                                                        html += '</div>';
                                                        // html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                        //     html += '<strong>วันส่งของ</strong>';
                                                        // html += '</div>';
                                                        // html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                        //     html += '<strong>เลขที่ Do</strong>';
                                                        // html += '</div>';
                                                        // html += '<div class="col-md-1 border-bottom text-center">';
                                                        //     html += '<strong>Draf OF</strong>';
                                                        // html += '</div>';
                                                    html += '</div>';
                                                    html += '<div class="row p-0 m-0 col-12 list-tender-detail">';
                                                        html += '<div class="row m-0 p-0 col-12 border-bottom">';
                                                        $.each(value['contract']['product'],function(key_pro,value_pro){
                                                            let bg_item = '';
                                                            if (key_pro%2 == 0) {
                                                                bg_item = 'bg-secondary-item';
                                                            }
                                                            html += '<div class="row m-0 p-0 col-1">';
                                                            html += '<div class="col-md-12 '+bg_item+' text-truncate border-right text-center" data-bs-toggle="tooltip" title="'+value_pro.td_brand+'">'+value_pro.td_brand+'</div>';
                                                            html += '</div>';
                                                            html += '<div class="row m-0 p-0 col-11">';
                                                            html += '<div class="row m-0 p-0 col-12">';
                                                            html += '<div class="col-md-2 '+bg_item+' border-bottom border-right text-center data-bs-toggle="tooltip" title="'+value_pro.td_gen+'">'+value_pro.td_gen+'</div>';
                                                            html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center data-bs-toggle="tooltip" title="'+value_pro.td_num+'">'+value_pro.td_num+' '+value_pro.td_type+'</div>';
                                                            html += '<div class="col-md-2 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_price_text+'</div>';
                                                            html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_send_product+'</div>';
                                                            html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_date_submit_price+'</div>';
                                                            html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_status_text+'</div>';
                                                            html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_stock_status_text+'</div>';
                                                            html += '<div class="col-md-3 '+bg_item+' text-truncate border-bottom border-right text-center">';
                                                            html += '<button type="button" class="btn btn-danger btn-delete-product"><i class="material-icons">close</i> นำออก</button>';
                                                            html += '</div>';
                                                            // html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_stock_send_product+'</div>';
                                                            // html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_do_number+'</div>';
                                                            // html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom text-center text-success">'+value_pro.td_draf_of_status+'</div>';
                                                            html += '</div>';
                                                            // html += '<div class="row m-0 p-0 col-12">';
                                                            // html += '<div class="col-md-1 table-head text-white text-truncate border-right  text-center">SR</div>';
                                                            // html += '<div class="col-md-2 '+bg_item+' text-truncate  border-right text-center">'+value_pro.td_signature_sr_text+'</div>';
                                                            // html += '<div class="col-md-1 table-head text-white text-truncate border-right  text-center">AM</div>';
                                                            // html += '<div class="col-md-2 '+bg_item+' text-truncate  border-right text-center">'+value_pro.td_signature_am_text+'</div>';
                                                            // html += '<div class="col-md-1 table-head text-white text-truncate border-right  text-center">SM</div>';
                                                            // html += '<div class="col-md-2 '+bg_item+' text-truncate  border-right text-center">'+value_pro.td_signature_sm_text+'</div>';
                                                            // html += '<div class="col-md-1 table-head text-white text-truncate border-right border-bottom text-center">OF</div>';
                                                            // html += '<div class="col-md-2 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_of_number+'</div>';
                                                            // html += '</div>';
                                                            html += '</div>';
                                                            html += '<div class="row m-0 p-0 col-12 border-top">';
                                                            html += '<div class="col-md-12 text-truncate border-right text-center">';
                                                            html += '&nbsp;';
                                                            html += '</div>';
                                                            html += '</div>';
                                                            html += '</div>';
                                                        })

                                                    html += '</div>';




                                                    html += '<div class="col-12 p-0 m-0 border border-info mt-3 rounded">';
                                                        html += '<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center text-danger bg-warning p-1" style="border-radius: 0px 0px 0px 0px">';
                                                            html += '<strong>ยังไม่มีสัญญา</strong>';
                                                        html += '</div>';
                                                        html += '<div class="row p-0 m-0 col-12 ">';
                                                            html += '<div class="row p-0 m-0 col-1 ">';
                                                                html += '<div class="col-md-12 border-bottom border-right text-center">';
                                                                    html += '<strong>แบรนด์</strong>';
                                                                html += '</div>';
                                                            html += '</div>';
                                                            html += '<div class="row p-0 m-0 col-11 ">';
                                                                html += '<div class="col-md-2 border-bottom border-right text-center">';
                                                                    html += '<strong>รุ่น</strong>';
                                                                html += '</div>';
                                                                html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                                    html += '<strong>จำนวน</strong>';
                                                                html += '</div>';
                                                                html += '<div class="col-md-2 border-bottom border-right text-center">';
                                                                    html += '<strong>ราคา</strong>';
                                                                html += '</div>';
                                                                html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                                    html += '<strong>ส่งของ</strong>';
                                                                html += '</div>';
                                                                html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                                    html += '<strong>ยืนราคา</strong>';
                                                                html += '</div>';
                                                                html += '<div class="col-md-2 border-bottom border-right text-center row mr-0 ml-0 pr-0 pl-0">';
                                                                    html += '<div class="col-12">';
                                                                        html += '<strong>สถานะ</strong>';
                                                                    html += '</div>';
                                                                    html += '<div class="col border-right border-top">';
                                                                        html += 'งาน';
                                                                    html += '</div>';
                                                                    html += '<div class="col  border-top">';
                                                                        html += 'คลังสินค้า';
                                                                    html += '</div>';
                                                                html += '</div>';
                                                                html += '<div class="col-md-3 border-bottom border-right text-center">';
                                                                    html += '<strong>ตัวเลือก</strong>';
                                                                html += '</div>';
                                                                // html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                                //     html += '<strong>วันส่งของ</strong>';
                                                                // html += '</div>';
                                                                // html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                                //     html += '<strong>เลขที่ Do</strong>';
                                                                // html += '</div>';
                                                                // html += '<div class="col-md-1 border-bottom text-center">';
                                                                //     html += '<strong>Draf OF</strong>';
                                                                // html += '</div>';
                                                            html += '</div>';
                                                            html += '<div class="row p-0 m-0 col-12 list-tender-detail">';
                                                                html += '<div class="row m-0 p-0 col-12 border-bottom">';
                                                                $.each(value['without_contract'],function(key_without,value_without){
                                                                    let bg_item = '';
                                                                    if (key_without%2 == 0) {
                                                                        bg_item = 'bg-secondary-item';
                                                                    }
                                                                    html += '<div class="row m-0 p-0 col-1">';
                                                                    html += '<div class="col-md-12 '+bg_item+' text-truncate border-right text-center" data-bs-toggle="tooltip" title="'+value_without.td_brand+'">'+value_without.td_brand+'</div>';
                                                                    html += '</div>';
                                                                    html += '<div class="row m-0 p-0 col-11">';
                                                                    html += '<div class="row m-0 p-0 col-12">';
                                                                    html += '<div class="col-md-2 '+bg_item+' border-bottom border-right text-center data-bs-toggle="tooltip" title="'+value_without.td_gen+'">'+value_without.td_gen+'</div>';
                                                                    html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center data-bs-toggle="tooltip" title="'+value_without.td_num+'">'+value_without.td_num+' '+value_without.td_type+'</div>';
                                                                    html += '<div class="col-md-2 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_price_text+'</div>';
                                                                    html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_send_product+'</div>';
                                                                    html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_date_submit_price+'</div>';
                                                                    html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_status_text+'</div>';
                                                                    html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_stock_status_text+'</div>';
                                                                    html += '<div class="col-md-3 '+bg_item+' text-truncate border-bottom border-right text-center">';
                                                                    html += '<button type="button" class="btn btn-success btn-add-product"><i class="material-icons">add</i> เพิ่ม</button>';
                                                                    html += '</div>';
                                                                    // html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_stock_send_product+'</div>';
                                                                    // html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_do_number+'</div>';
                                                                    // html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom text-center text-success">'+value_without.td_draf_of_status+'</div>';
                                                                    html += '</div>';
                                                                    // html += '<div class="row m-0 p-0 col-12">';
                                                                    // html += '<div class="col-md-1 table-head text-white text-truncate border-right  text-center">SR</div>';
                                                                    // html += '<div class="col-md-2 '+bg_item+' text-truncate  border-right text-center">'+value_without.td_signature_sr_text+'</div>';
                                                                    // html += '<div class="col-md-1 table-head text-white text-truncate border-right  text-center">AM</div>';
                                                                    // html += '<div class="col-md-2 '+bg_item+' text-truncate  border-right text-center">'+value_without.td_signature_am_text+'</div>';
                                                                    // html += '<div class="col-md-1 table-head text-white text-truncate border-right  text-center">SM</div>';
                                                                    // html += '<div class="col-md-2 '+bg_item+' text-truncate  border-right text-center">'+value_without.td_signature_sm_text+'</div>';
                                                                    // html += '<div class="col-md-1 table-head text-white text-truncate border-right border-bottom text-center">OF</div>';
                                                                    // html += '<div class="col-md-2 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_of_number+'</div>';
                                                                    // html += '</div>';
                                                                    html += '</div>';
                                                                    html += '<div class="row m-0 p-0 col-12 border-top">';
                                                                    html += '<div class="col-md-12 text-truncate border-right text-center">';
                                                                    html += '&nbsp;';
                                                                    html += '</div>';
                                                                    html += '</div>';
                                                                    html += '</div>';
                                                                })

                                                            html += '</div>';



                                                html += '</div>';
                                            html += '</div>';












                                                html += '</div>';


                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';



                        })
                        $('.row-add-contract .wrap-contract').html(html)
                        }
                    break;
                case 'cancel':
                    Swal.fire({
                        title: 'คุณต้องการลบ tender นี้หรือไม่?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#4caf50 ',
                        cancelButtonColor: '#f44336 ',
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: base_url('Tender/cancel'),
                                method: 'post',
                                data: {t_id:id},
                                dataType: 'json',
                                success: function(data){
                                    console.log(data);
                                    if (data[0] == 'success') {
                                        Swal.fire({
                                            title: 'ลบ tender เรียบร้อยแล้ว',
                                            type: 'success',
                                            showConfirmButton: true,
                                            timer: 1500
                                        })
                                        // window.location.href = base_url('page/manage_tender0')
                                        list_tender();
                                        $('.modal-tender-detail ').modal('hide')
                                    }
                                }
                            })
                        }
                    });
                    break;
                default:

            }
        })

        $('.row-add-tender-detail')
        .on('click','.btn-add-tender',function(){
            // $.each($('.row-add-tender-detail form.form-add-tender-detail'))
        })
        .on('click','.btn-delete-product',function(){
            let count_item = $(this).closest('.wrap-product').find('.product-item').length
            if (count_item > 1) {
                Swal.fire({
                    title: 'คุณต้องการลบรายการนี้หรือไม่?',
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
            }
        })

        function get_contract(id){
            var $return = 'ไม่มีรายการ product'
            $.ajax({
                url:base_url('Tender/get_contract'),
                method:'post',
                data: {t_id:id},
                dataType:'json',
                async: false,
                success:function(data){
                    $return = data
                }
            })
            return $return
        }

        $('.tb-tender-list').on('click','.btn-check',function(){
            let id = $(this).closest('tr').attr('id');
            let tender_number = $(this).closest('tr').find('td').eq(0).html();
            let customer = $(this).closest('tr').find('td').eq(1).html();
            let budget_type = $(this).closest('tr').find('td').eq(2).html();
            let sale_name = $(this).closest('tr').find('td').eq(3).attr('full-data');
            let job_status = $(this).closest('tr').find('td').eq(4).html();
            let status = $(this).closest('tr').find('td').eq(5).html();
            let html = '';
            $.ajax({
                url: base_url('Tender/get'),
                method: 'post',
                data: {t_id:id},
                dataType: 'json',
                success: function(respond){
                    if (respond[0] == 'success') {
                        respond = respond[1][0]
                        html += '<div class="row wrap-tender-detail" tender-id="'+respond.id+'">';
                            html += '<div class="col-md-12 text-center">'+respond.t_customer_name+'</div>';
                            html += '<div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2 data-tender" style="font-size:0.8rem">';
                                html += '<div class="col-sm-12 col-md-12 col-lg-12 row m-0">';
                                    html += '<div class="row m-0 border rounded">';
                                        html += '<div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>ข้อมูล</strong></div>';
                                        html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>เลขที่ tender :</strong></div>';
                                        html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond.t_number_text+'</div>';
                                        html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>ลักษณะงบ :</strong></div>';
                                        html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond.t_budget_type+'</div>';
                                        html += '<div class="col-sm-7 col-md-4 border-bottom border-right"><strong>เจ้าของเขต :</strong></div>';
                                        html += '<div class="col-sm-5 col-md-8 border-bottom">'+respond.t_sale_full+'</div>';
                                        html += '<div class="col-sm-7 col-md-4 border-bottom border-right"><strong>ระยะเวลาประกัน :</strong></div>';
                                        html += '<div class="col-sm-5 col-md-8 border-bottom">'+respond.t_year_warranty+' ปี</div>';
                                        html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>คู่เทียบ :</strong></div>';
                                        html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond.t_compare+'</div>';
                                    html += '</div>';
                                html += '</div>';
                            html += '</div>';

                        //get contract
                        let data_contract = get_contract(id)
                        // console.log('data contract',data_contract);
                        if (data_contract[0] != 'empty') {
                            $.each(data_contract[1],function(key,value){
                                html += '<div class="row m-0 col-12 mt-2 mb-2 p-0" style="font-size:0.8rem;height: fit-content;">';
                                    html += '<div class="col-md-12 row m-0">';
                                        html += '<div class="col-sm-12 col-md-12 col-lg-12 row m-0 p-0">';
                                            html += '<div class="row m-0 border border-primary rounded">';
                                                html += '<div class="col-md-12 border-bottom text-center text-white bg-primary p-1" style="border-radius: 6px 6px 0px 0px">';
                                                    html += '<strong>สัญญา</strong>';
                                                html += '</div>';
                                                html += '<div class="col-sm-4 col-md-4 border-bottom border-right">';
                                                    html += '<strong>คู่สัญญา/ใบสั่งซื้อ :</strong>';
                                                html += '</div>';
                                                html += '<div class="col-sm-8 col-md-8 border-bottom">';
                                                    html += value['contract'].tc_type;
                                                html += '</div>';
                                                html += '<div class="col-sm-4 col-md-4 border-bottom border-right">';
                                                    html += '<strong>เลขสัญญา :</strong>';
                                                html += '</div>';
                                                html += '<div class="col-sm-8 col-md-8 border-bottom">';
                                                    html += value['contract'].tc_number;
                                                html += '</div>';
                                                html += '<div class="col-sm-4 col-md-4 border-bottom border-right">';
                                                    html += '<strong>วันเรียกทำสัญญา :</strong>';
                                                html += '</div>';
                                                html += '<div class="col-sm-8 col-md-8 border-bottom">';
                                                    html += value['contract'].tc_date_text;
                                                html += '</div>';
                                                html += '<div class="col-sm-4 col-md-4 border-bottom border-right">';
                                                    html += '<strong>สถานะใบสัญญา :</strong>';
                                                html += '</div>';
                                                html += '<div class="col-sm-8 col-md-8 border-bottom t-contract-status">';
                                                    html += value['contract'].tc_status;
                                                html += '</div>';
                                                html += '<div class="col-sm-7 col-md-4 border-bottom border-right">';
                                                    html += '<strong>วันเริ่ม - สิ้นสุดสัญญา :</strong>';
                                                html += '</div>';
                                                html += '<div class="col-sm-5 col-md-8 border-bottom">';
                                                    html += value['contract'].tc_start_text+' - '+value['contract'].tc_end_text;
                                                html += '</div>';
                                                html += '<div class="col-12 p-0 m-0">';
                                                    html += '<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center text-white bg-primary" style="border-radius: 0px 0px 0px 0px">';
                                                        html += '<strong>รายละเอียด</strong>';
                                                    html += '</div>';
                                                    html += '<div class="row p-0 m-0 col-12 ">';
                                                        html += '<div class="row p-0 m-0 col-1 ">';
                                                            html += '<div class="col-md-12 border-bottom border-right text-center">';
                                                                html += '<strong>แบรนด์</strong>';
                                                            html += '</div>';
                                                        html += '</div>';
                                                        html += '<div class="row p-0 m-0 col-11 ">';
                                                            html += '<div class="col-md-2 border-bottom border-right text-center">';
                                                                html += '<strong>รุ่น</strong>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                                html += '<strong>จำนวน</strong>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-2 border-bottom border-right text-center">';
                                                                html += '<strong>ราคา</strong>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                                html += '<strong>ส่งของ</strong>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                                html += '<strong>ยืนราคา</strong>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-2 border-bottom border-right text-center row mr-0 ml-0 pr-0 pl-0">';
                                                                html += '<div class="col-12">';
                                                                    html += '<strong>สถานะ</strong>';
                                                                html += '</div>';
                                                                html += '<div class="col border-right border-top">';
                                                                    html += 'งาน';
                                                                html += '</div>';
                                                                html += '<div class="col  border-top">';
                                                                    html += 'คลังสินค้า';
                                                                html += '</div>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                                html += '<strong>วันส่งของ</strong>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                                html += '<strong>เลขที่ Do</strong>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-1 border-bottom text-center">';
                                                                html += '<strong>Draf OF</strong>';
                                                            html += '</div>';
                                                        html += '</div>';
                                                        html += '<div class="row p-0 m-0 col-12 list-tender-detail">';
                                                            html += '<div class="row m-0 p-0 col-12 border-bottom">';
                                                            $.each(value['contract']['product'],function(key_pro,value_pro){
                                                                let bg_item = '';
                                                                if (key_pro%2 == 0) {
                                                                    bg_item = 'bg-secondary-item';
                                                                }
                                                                html += '<div class="row m-0 p-0 col-1">';
                                                                html += '<div class="col-md-12 '+bg_item+' text-truncate border-right text-center" data-bs-toggle="tooltip" title="'+value_pro.td_brand+'">'+value_pro.td_brand+'</div>';
                                                                html += '</div>';
                                                                html += '<div class="row m-0 p-0 col-11">';
                                                                html += '<div class="row m-0 p-0 col-12">';
                                                                html += '<div class="col-md-2 '+bg_item+' border-bottom border-right text-center data-bs-toggle="tooltip" title="'+value_pro.td_gen+'">'+value_pro.td_gen+'</div>';
                                                                html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center data-bs-toggle="tooltip" title="'+value_pro.td_num+'">'+value_pro.td_num+' '+value_pro.td_type+'</div>';
                                                                html += '<div class="col-md-2 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_price_text+'</div>';
                                                                html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_send_product+'</div>';
                                                                html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_date_submit_price+'</div>';
                                                                html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_status_text+'</div>';
                                                                html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_stock_status_text+'</div>';
                                                                html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_stock_send_product+'</div>';
                                                                html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_do_number+'</div>';
                                                                html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom text-center text-success">'+value_pro.td_draf_of_status+'</div>';
                                                                html += '</div>';
                                                                html += '<div class="row m-0 p-0 col-12">';
                                                                html += '<div class="col-md-1 table-head text-white text-truncate border-right  text-center">SR</div>';
                                                                html += '<div class="col-md-2 '+bg_item+' text-truncate  border-right text-center">'+value_pro.td_signature_sr_text+'</div>';
                                                                html += '<div class="col-md-1 table-head text-white text-truncate border-right  text-center">AM</div>';
                                                                html += '<div class="col-md-2 '+bg_item+' text-truncate  border-right text-center">'+value_pro.td_signature_am_text+'</div>';
                                                                html += '<div class="col-md-1 table-head text-white text-truncate border-right  text-center">SM</div>';
                                                                html += '<div class="col-md-2 '+bg_item+' text-truncate  border-right text-center">'+value_pro.td_signature_sm_text+'</div>';
                                                                html += '<div class="col-md-1 table-head text-white text-truncate border-right border-bottom text-center">OF</div>';
                                                                html += '<div class="col-md-2 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_pro.td_of_number+'</div>';
                                                                html += '</div>';
                                                                html += '</div>';
                                                                html += '<div class="row m-0 p-0 col-12 border-top">';
                                                                html += '<div class="col-md-12 text-truncate border-right text-center">';
                                                                html += '&nbsp;';
                                                                html += '</div>';
                                                                html += '</div>';
                                                                html += '</div>';
                                                            })

                                                        html += '</div>';
                                                    html += '</div>';


                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';


                                        html += '<div class="col-12 p-0 m-0 border border-info mt-3 rounded">';
                                            html += '<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center text-danger bg-warning p-1" style="border-radius: 0px 0px 0px 0px">';
                                                html += '<strong>ยังไม่มีสัญญา</strong>';
                                            html += '</div>';
                                            html += '<div class="row p-0 m-0 col-12 ">';
                                                html += '<div class="row p-0 m-0 col-1 ">';
                                                    html += '<div class="col-md-12 border-bottom border-right text-center">';
                                                        html += '<strong>แบรนด์</strong>';
                                                    html += '</div>';
                                                html += '</div>';
                                                html += '<div class="row p-0 m-0 col-11 ">';
                                                    html += '<div class="col-md-2 border-bottom border-right text-center">';
                                                        html += '<strong>รุ่น</strong>';
                                                    html += '</div>';
                                                    html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                        html += '<strong>จำนวน</strong>';
                                                    html += '</div>';
                                                    html += '<div class="col-md-2 border-bottom border-right text-center">';
                                                        html += '<strong>ราคา</strong>';
                                                    html += '</div>';
                                                    html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                        html += '<strong>ส่งของ</strong>';
                                                    html += '</div>';
                                                    html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                        html += '<strong>ยืนราคา</strong>';
                                                    html += '</div>';
                                                    html += '<div class="col-md-2 border-bottom border-right text-center row mr-0 ml-0 pr-0 pl-0">';
                                                        html += '<div class="col-12">';
                                                            html += '<strong>สถานะ</strong>';
                                                        html += '</div>';
                                                        html += '<div class="col border-right border-top">';
                                                            html += 'งาน';
                                                        html += '</div>';
                                                        html += '<div class="col  border-top">';
                                                            html += 'คลังสินค้า';
                                                        html += '</div>';
                                                    html += '</div>';
                                                    html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                        html += '<strong>วันส่งของ</strong>';
                                                    html += '</div>';
                                                    html += '<div class="col-md-1 border-bottom border-right text-center">';
                                                        html += '<strong>เลขที่ Do</strong>';
                                                    html += '</div>';
                                                    html += '<div class="col-md-1 border-bottom text-center">';
                                                        html += '<strong>Draf OF</strong>';
                                                    html += '</div>';
                                                html += '</div>';
                                                html += '<div class="row p-0 m-0 col-12 list-tender-detail">';
                                                    html += '<div class="row m-0 p-0 col-12 border-bottom">';
                                                    $.each(value['without_contract'],function(key_without,value_without){
                                                        let bg_item = '';
                                                        if (key_without%2 == 0) {
                                                            bg_item = 'bg-secondary-item';
                                                        }
                                                        html += '<div class="row m-0 p-0 col-1">';
                                                        html += '<div class="col-md-12 '+bg_item+' text-truncate border-right text-center" data-bs-toggle="tooltip" title="'+value_without.td_brand+'">'+value_without.td_brand+'</div>';
                                                        html += '</div>';
                                                        html += '<div class="row m-0 p-0 col-11">';
                                                        html += '<div class="row m-0 p-0 col-12">';
                                                        html += '<div class="col-md-2 '+bg_item+' border-bottom border-right text-center data-bs-toggle="tooltip" title="'+value_without.td_gen+'">'+value_without.td_gen+'</div>';
                                                        html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center data-bs-toggle="tooltip" title="'+value_without.td_num+'">'+value_without.td_num+' '+value_without.td_type+'</div>';
                                                        html += '<div class="col-md-2 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_price_text+'</div>';
                                                        html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_send_product+'</div>';
                                                        html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_date_submit_price+'</div>';
                                                        html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_status_text+'</div>';
                                                        html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_stock_status_text+'</div>';
                                                        html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_stock_send_product+'</div>';
                                                        html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_do_number+'</div>';
                                                        html += '<div class="col-md-1 '+bg_item+' text-truncate border-bottom text-center text-success">'+value_without.td_draf_of_status+'</div>';
                                                        html += '</div>';
                                                        html += '<div class="row m-0 p-0 col-12">';
                                                        html += '<div class="col-md-1 table-head text-white text-truncate border-right  text-center">SR</div>';
                                                        html += '<div class="col-md-2 '+bg_item+' text-truncate  border-right text-center">'+value_without.td_signature_sr_text+'</div>';
                                                        html += '<div class="col-md-1 table-head text-white text-truncate border-right  text-center">AM</div>';
                                                        html += '<div class="col-md-2 '+bg_item+' text-truncate  border-right text-center">'+value_without.td_signature_am_text+'</div>';
                                                        html += '<div class="col-md-1 table-head text-white text-truncate border-right  text-center">SM</div>';
                                                        html += '<div class="col-md-2 '+bg_item+' text-truncate  border-right text-center">'+value_without.td_signature_sm_text+'</div>';
                                                        html += '<div class="col-md-1 table-head text-white text-truncate border-right border-bottom text-center">OF</div>';
                                                        html += '<div class="col-md-2 '+bg_item+' text-truncate border-bottom border-right text-center">'+value_without.td_of_number+'</div>';
                                                        html += '</div>';
                                                        html += '</div>';
                                                        html += '<div class="row m-0 p-0 col-12 border-top">';
                                                        html += '<div class="col-md-12 text-truncate border-right text-center">';
                                                        html += '&nbsp;';
                                                        html += '</div>';
                                                        html += '</div>';
                                                        html += '</div>';
                                                    })

                                                html += '</div>';



                                    html += '</div>';
                                html += '</div>';
                            })
                        }
                        $('.modal-tender-detail .modal-footer').html(data_contract[2]);
                        $('.modal-tender-detail .modal-body').html(html)
                        $('.modal-tender-detail').modal('show')
                    }else {
                        Swal.fire({
                            type: 'error',
                            title: data[1],
                            text: data[2],
                        });
                    }
                }
            })

        })

            function list_tender_realtime(){
                // url: base_url('tender/list'),
                // // url: sql_server('tender/list'),
                // method: 'post',
                // data: {get_tender: true},
                // dataType: 'json',
                // success: function(respond){
                //
                // }
            }

            function list_tender(){
                $.ajax({
                    url: base_url('tender/list'),
                    // url: sql_server('tender/list'),
                    method: 'post',
                    data: {get_tender: true},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        if (data[0] == 'success') {
                            let html = '';
                            $.each(data[1],function(key,value){
                                let t_customer = value.t_customer
                                value.t_customer_text = get_customer(t_customer)
                                html += '<tr id="'+value.id+'">';
                                html += '<td class="text-center">'+value.t_number_text+'</td>';
                                html += '<td style="font-size: 0.85em;">'+value.t_customer_text+'</td>';
                                html += '<td class="text-center">'+value.t_budget_type+'</td>';
                                html += '<td full-data="'+value.t_zone+' / '+value.t_sale_name+' '+value.t_sale_lastname+'">'+value.t_sale_name+'</td>';
                                html += '<td class="text-center">'+value.t_job_status_text+'</td>';
                                // html += '<td>'+value.t_status_text+'</td>';
                                html += '<td><button class="btn btn-info btn-check"><i class="material-icons">visibility</i> ตรวจสอบ</button></td>';
                                html += '</tr>';
                            });
                            $('.list-tender .list-number-order h4 b').html(data[1].length)
                            $('.list-tender .tb-tender-list tbody').html(html)
                            search_sort(data[1])
                        }else {
                            Swal.fire({
                                type: 'error',
                                title: data[1],
                                text: data[2],
                            });

                            let num_th = $('.list-tender .tb-tender-list thead th').length
                            let html = '';
                            html += '<tr>';
                            html += '<td colspan="'+num_th+'" class="text-center">ไม่มีรายการ tender</td>';
                            html += '</tr>';

                            $('.list-tender .tb-tender-list tbody').html(html)

                        }
                        $('.loading-screen').hide()
                    }
                })
            }

            function list_service_name(){
                $.ajax({
                    url: base_url('Tender/list_sale'),
                    dataType: 'json',
                    success: function (data){
                        // console.log(data);
                        if (data[0] == 'success') {
                            let html = '<option value="">เลือกผู้แทน..</option>';
                            $.each(data[1],function(key,value){
                                let tel = '';
                                if (value.tel != '') {
                                    tel = value.tel;
                                }
                                html += '<option tel="'+tel+'" zone="'+value.zone+'" value="'+value.id+'">'+value.first_name+' '+value.last_name+' ('+value.zone+')</option>';
                            });
                            $('.form-add-tender .wrap-list-service .list-service-name').html(html);
                            max_chosen($('.form-add-tender .wrap-list-service .list-service-name'));
                            $('.form-add-tender .wrap-list-service').on('change','.list-service-name',function(){
                                let zone = $(this).find('option:selected').attr('zone');
                                $(this).closest('.wrap-list-service').find('input[name=t_zone]').val(zone);
                            });
                            // $('.form-add-quotation .wrap-list-service .list-service-name').chosen({allow_single_deselect: true,width: '100%',search_contains:true});
                        }
                    }
                });
            }
            // function get_sale(emp_id){
            //     let $return = 'ไม่พบข้อมูลลูกค้า'
            //     $.ajax({
            //         url: base_url('Employee/get'),
            //         dataType: 'json',
            //         method: 'post',
            //         async: false,
            //         data: {id: emp_id},
            //         success: function(data){
            //            if (data[0] == 'success') {
            //                $return = data[1][0].cus_name
            //            }
            //         }
            //     });
            //     return $return;
            // }
            function get_customer(cus_id) {
                let $return = 'ไม่พบข้อมูลลูกค้า'
                $.ajax({
                    url: base_url('Customer/get'),
                    dataType: 'json',
                    method: 'post',
                    async: false,
                    data: {id: cus_id},
                    success: function(data){
                       if (data[0] == 'success') {
                           $return = data[1][0].cus_name
                       }
                    }
                });
                return $return;
            }
            function list_customer(cus_id=''){
                $.ajax({
                    url: base_url('Customer/list'),
                    dataType: 'json',
                    method: 'post',
                    data: {get_customer: true},
                    success: function (data){
                        if (data[0] == 'success') {
                            let html = '<option value="">เลือกลูกค้า..</option>';
                            $.each(data[1],function(key,value){
                                html += '<option value="'+value.id+'">'+value.cus_name+'</option>';
                            });
                            $('.form-add-tender .list-customer').html(html);
                            max_chosen($('.form-add-tender .list-customer'));
                        }
                    }
                });
            }

            /*เปิด card form add tender*/
            $('.btn-modal-add-tender').click(function(){
                $('.row-add-tender').show();
                $('.row-add-tender').find('input').val('')
                $('.row-add-tender').find('select').val('')
                max_chosen($('.row-add-tender').find('select.list-service-name'),'update')
                max_chosen($('.row-add-tender').find('select[name=t_budget_type]'),'update')
                max_chosen($('.row-add-tender').find('select.list-customer'),'update')
                max_chosen($('.row-add-tender').find('select[name=t_contract_type]'),'update')
                max_chosen($('.row-add-tender').find('select[name=t_contract_status]'),'update')
                $('.row-add-tender').find('input[name=type]').val('add')
                $('.row-add-tender').find('input[name=add_tender]').val('1')
                $('.row-add-tender-detail').hide();
            });

            /*close form add*/
            $('.btn-cancel-tender').click(function(){
                $('.row-add-tender').hide();
                $('.row-add-tender-detail').hide();
            });

            function check_online_status() {
                $.ajax({
                    url: base_url('Tender/check_online_status'),
                    dataType: 'json',
                    success: function(data){
                            if (data == 'logout') {
                                window.location.href = base_url()
                            }
                    }
                })
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
                    list_tender();
                })
                .on('change keyup','.search-number,.search-sort',function(){
                    let number = $('.navbar .form-search .search-number').val();
                    let sort = $('.navbar .form-search .search-sort').val();
                    let data_search = [];
                    let key_data_search = 0;
                    data_search = data;
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
                    if (number != '') {
                        //ติดปัญหาการค้นหา 231 กับ 31 ถ้าเจอ 231 ก่อน ก็จะไม่ค้นหา 31 [แก้โดยให้ค้นหา database ก่อน]
                        number = number.toLowerCase();
                        $.ajax({
                            url: base_url('Tender/search'),
                            method: 'post',
                            data:{number:number},
                            async: false,
                            dataType: 'json',
                            success: function(data){
                                console.log(data);
                                if (data[0] == 'success') {
                                    data_search = data[1];
                                }
                            }
                        })
                        if (data_search.length < 1) {
                            var data_search_number = [];
                            let data_key_number = 0;
                            for (var i = 0; i < data_search.length; i++) {
                                let value_customer = data_search[i].t_customer_text;
                                let value_number = data_search[i].t_number_text;
                                if (value_customer.indexOf(number) > -1 || value_number.indexOf(number) > -1) {
                                    data_search_number[data_key_number++] = data_search[i];
                                }
                            }
                            data_search = data_search_number;
                        }
                    }
                    setTimeout(function(){
                        let html = '';
                        if (data_search.length < 1) {
                            $('table.list-borrowing tbody').html('<tr><td class="text-center" colspan="'+$('table.list-borrowing th').length+'">ไม่พบตามคำค้น</td></tr>');
                            $('.wrap-list-borrowing .card-title b').html(data_search.length);
                        }else {
                            $.each(data_search,function(key,value){
                                let t_customer = value.t_customer
                                html += '<tr id="'+value.id+'">';
                                html += '<td class="text-center">'+value.t_number_text+'</td>';
                                html += '<td style="font-size: 0.85em;">'+get_customer(t_customer)+'</td>';
                                html += '<td class="text-center">'+value.t_budget_type+'</td>';
                                html += '<td full-data="'+value.t_zone+' / '+value.t_sale_name+' '+value.t_sale_lastname+'">'+value.t_sale_name+'</td>';
                                html += '<td class="text-center">'+value.t_job_status_text+'</td>';
                                // html += '<td>'+value.t_status_text+'</td>';
                                html += '<td><button class="btn btn-info btn-check"><i class="material-icons">visibility</i> ตรวจสอบ</button></td>';
                                html += '</tr>';
                            });
                            $('.list-tender .list-number-order h4 b').html(data_search.length)
                            $('.list-tender .tb-tender-list tbody').html(html)

                        }
                    },150);


                });
            }

})
