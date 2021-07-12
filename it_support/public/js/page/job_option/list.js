$(document).ready(function() {
    list_customer();
    list_job_option();
    // list_owner();
    // $('.modal-review-job').modal('show');
    // $('.row-add-job').show();

    /*main panel option*/
    $('.main-panel')
    .on('click','.btn-modal-add-job',function(){ /*open modal add job*/
        $('.content').find('.row-add-job').show();
        $('.content').find('.row-add-job .btn-add-job').remove();
        let btn_add_job = '<a class="btn btn-success btn-add-job" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>';
        $('.content').find('.row-add-job .card-footer').append(btn_add_job);
        $('.content').find('.row-add-job .btn-edit-job').remove();
        $('.content').find('.row-add-job input[name=type]').val('add');
        $('.content').find('.row-add-job input[name=jo_id]').remove();
        // $('.content .row-add-job iframe').contents().find("#summernote").next().find('.note-editable').html('');
    })

    /*modal job*/
    $('.row-add-job')
    .on('click','.btn-cancel-job',function(){ /* close modal */
        $('.content').find('.row-add-job').hide();
    })
    .on('click','input.add-customer',function(){ /* manual customer*/
        let wrap = $(this).closest('.row-add-job');
        wrap.find('select.list-customer').closest('.form-group').find('.help-block').remove();
        wrap.find('input.input-customer-name').closest('.form-group').find('.help-block').remove();
        if ($(this).prop('checked') == true) {
            if (wrap.find('.list-customer').val() != '') {
                let customer_name = wrap.find('.list-customer option:selected').html();
                wrap.find('input.input-customer-name').closest('.form-group').addClass('is-filled');
                wrap.find('input.input-customer-name').val(customer_name);
            }else {
                wrap.find('input[name=add_customer]').prop('checked',true);
            }
            $(this).closest('.row-add-job').find('.list-customer').closest('.form-group').hide();
            $(this).closest('.row-add-job').find('input.input-customer-name').closest('.form-group').show();
            $(this).closest('.row-add-job').find('input.input-customer-name').attr('name','jo_customer_name');
            $(this).closest('.row-add-job').find('select.list-customer').attr('name','');
        }else {
            $(this).closest('.row-add-job').find('.list-customer').closest('.form-group').show();
            $(this).closest('.row-add-job').find('input.input-customer-name').closest('.form-group').hide();
            $(this).closest('.row-add-job').find('input.input-customer-name').attr('name','');
            $(this).closest('.row-add-job').find('select.list-customer').attr('name','jo_customer_id');

        }
    })
    .on('click','.btn-add-job',function(){ /* add job*/
        let data = $('.row-add-job .form-add-job').serialize();
        if (validate_form_add_job()) {
            $.ajax({
                url: base_url('Job_option/add'),
                method: 'post',
                data: data,
                dataType: 'json',
                success: function (respond){
                    // console.log('respond',respond);
                    switch (respond[0]) {
                        case 'success':
                        Swal.fire({
                            type: 'success',
                            title: 'บันทึกสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        break;
                        case 'fail':
                        Swal.fire({
                            type: 'error',
                            title: 'ไม่สามารถสร้างใบแจ้งงานได้',
                            // showConfirmButton: false,
                            // timer: 1500
                        });
                        break;
                        case 'can not add':
                        Swal.fire({
                            type: 'error',
                            title: 'ไม่สามารถเพิ่มโรงพยาบาลใหม่ได้',
                            // showConfirmButton: false,
                            // timer: 1500
                        });
                        break;
                        default:

                    }
                    list_job_option();
                    $('.row-add-job').hide();
                }
            });
        }
    })
    .on('click','.btn-edit-job',function(){ /* add job*/
        let data = $('.row-add-job .form-add-job').serialize();
        if (validate_form_add_job()) {
            $.ajax({
                url: base_url('Job_option/update'),
                method: 'post',
                data: data,
                dataType: 'json',
                success: function(respond){
                    if (respond[0] == 'success') {
                        Swal.fire({
                            type: 'success',
                            title: 'บันทึกสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }else {
                        Swal.fire({
                            type: 'error',
                            title: respond[1],
                        });
                    }
                    list_job_option();
                    $('.row-add-job').hide();
                }
            })
        }

    });
    /*search job*/
    function search_sort(data){
        $('.navbar .form-search').off();
        $('.navbar .form-search')
        .on('click','.btn-reset-search',function(){
            $('.navbar .form-search .search-job').val('');
            $('.navbar .form-search .search-date-start').val('');
            $('.navbar .form-search .search-date-end').val('');
            $('.navbar .form-search .search-cate').val('');
            $('.navbar .form-search .search-sort').val('');
            list_job_option();
        })
        .on('change keyup','.search-job,.search-date-start,.search-date-end,.search-sort,.search-cate,.search-year-start,.search-year-end',function(){
            let job = $('.navbar .form-search .search-job').val();
            let date_start = $('.navbar .form-search .search-date-start').val();
            let date_end = $('.navbar .form-search .search-date-end').val();
            let sort = $('.navbar .form-search .search-sort').val();
            let cate = $('.navbar .form-search .search-cate').val();
            let cate_text = $('.navbar .form-search .search-cate option:selected').html();
            let year_start = $('.navbar .form-search .search-year-start').val();
            let year_end = $('.navbar .form-search .search-year-end').val();
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
                    let date = data[i].jo_create_date;
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
                        date_start = date_end; //ใช้ assign ค่าใว้ใช้เมื่อ search ไม่เจอ
                        date_end = '';
                    }
                }
                if (data_search.length < 1) {
                    $.ajax({
                        url: base_url('Job_option/list'),
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
            if (cate != '') {
                cate = cate.toLowerCase();
                var data_search_cate = [];
                let data_key_cate = 0;
                for (var i = 0; i < data_search.length; i++) {
                    if (data_search[i].jo_status == cate) {
                        data_search_cate[data_key_cate++] = data_search[i];
                    }
                }
                data_search = data_search_cate;

            }
            if (job != '') {
                job = job.toUpperCase();
                let data_search_job = [];
                let data_key_job = 0;
                let check_search = false;
                let check_key_sub = ['jo_order_form','jo_note_product_detail','jo_note_additional_option','jo_note_help','jo_remark'];
                let = check_search_key_sub = false;
                $.each(data_search,function(key,value){
                    $.each(value,function(key_sub,value_sub){
                        if (check_key_sub.indexOf(key_sub) > -1) {
                            if (value_sub != '' && value_sub != null) {
                                if (value_sub.indexOf(job) > -1) {
                                    check_search = true;
                                }
                            }
                        }
                    });
                    if (check_search) {
                        data_search_job[data_key_job] = value;
                        check_search = false;
                        data_key_job++;
                    }
                });
                data_search = data_search_job;
            }
            //event select year
            setTimeout(function(){
                let html = '';
                let check_month = '0';
                if (data_search.length < 1) {
                    $('.content .tb-job-list tbody').html('<tr><td class="text-center" colspan="'+$('.content .tb-job-list th').length+'">ไม่พบตามคำค้น</td></tr>');
                    $('.content .list-job .list-number-order b').html(data_search.length);
                }else {
                    $.each(data_search,function(key,value){
                        html += '<tr jo-id="'+value.jo_id+'">';
                        html += '<td>'+value.jo_customer_name+'</td>';
                        html += '<td>'+value.jo_order_form+'</td>';
                        html += '<td>'+value.jo_date_th+'</td>';

                        let jo_status = value.jo_status;
                        switch (jo_status) {
                            case 'new':
                                jo_status = '<span class="text-info">สร้างใหม่</span>';
                            break;
                            case 'accept':
                                jo_status = '<span class="text-warning">กำลังดำเนินการ</span>';
                            break;
                            case 'cancel':
                                jo_status = '<span class="text-danger">ยกเลิก</span>';
                            break;
                            case 'success':
                                jo_status = '<span class="text-success">ดำเนินการเรียบร้อยแล้ว</span>';
                            break;
                            default:
                        }
                        html += '<td>'+jo_status+'</td>';
                        html += '<td><button class="btn btn-info btn-check-job"><i class="material-icons">search</i> ดูรายละเอียด</butoon></td>';
                        html += '</tr>';
                    });
                    $('.list-job .card-header .card-title b').html(data_search.length);
                    $('.list-job .card-body tbody').html(html);
                }
            },150);


        });
    }

    /*modal review job action,modal action*/
    $('.modal-review-job')
    .on('click','.btn-option',function(){ /*open form*/
        let type = $(this).attr('option-type');
        let jo_id = '';
        switch (type) {
            case 'accept':
                $(this).closest('.modal-review-job').find('.wrap-form .form-owner').show(200);
                break;
            case 'success':
                $(this).closest('.modal-review-job').find('.wrap-form .form-remark').show(200);
                break;
            case 'edit':
                jo_id = $(this).attr('jo-id');
                $('.content').find('.row-add-job').show();
                $.ajax({
                    url: base_url('Job_option/get'),
                    method: 'post',
                    data: {jo_id:jo_id},
                    dataType: 'json',
                    success: function(respond){
                        if (respond[0] == 'success') {
                            respond[1] = respond[1][0];
                            if (respond[1].jo_creator_tel != '-') {
                                $('.content').find('.row-add-job input[name=jo_tel]').val(respond[1].jo_creator_tel);
                            }
                            if (respond[1].jo_creator_mail != '-') {
                                $('.content').find('.row-add-job input[name=jo_mail]').val(respond[1].jo_creator_mail);
                            }
                            $('.content').find('.row-add-job input[name=jo_order_form]').val(respond[1].jo_order_form);
                            $('.content').find('.row-add-job select[name=jo_customer_id]').val(respond[1].jo_customer_id);
                            max_chosen($('.content').find('.row-add-job select[name=jo_customer_id]'),'update');
                            $('.content').find('.row-add-job input[name=jo_customer_department]').val(respond[1].jo_customer_department);
                            $('.content').find('.row-add-job textarea[name=jo_note_product_detail]').val(respond[1].jo_note_product_detail);
                            $('.content').find('.row-add-job textarea[name=jo_note_additional_option]').val(respond[1].jo_note_additional_option);
                            $('.content').find('.row-add-job textarea[name=jo_note_help]').val(respond[1].jo_note_help);
                            $('.modal-review-job').modal('hide');
                            let btn_edit_job = '<a class="btn btn-success btn-edit-job" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>';
                            $('.content').find('.row-add-job .card-footer').append(btn_edit_job);
                            $('.content').find('.row-add-job .btn-add-job').remove();
                            $('.content').find('.row-add-job input[name=type]').val('edit');
                            $('.content').find('.row-add-job .form-add-job').append('<input type="hidden" name="jo_id" value="'+respond[1].jo_id+'">');

                        }
                    }
                });
                break;
            case 'cancel':
                jo_id = $(this).attr('jo-id');
                Swal.fire({
                    type: 'warning',
                    title: 'ท่านต้องการยกเลิกการแจ้งงานนี้หรือไม่',
                    showCancelButton: true,
                    confirmButtonColor: '#4caf50 ',
                    cancelButtonColor: '#f44336 ',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: base_url('Job_option/update'),
                            method: 'post',
                            data: {jo_id:jo_id,type:type},
                            dataType: 'json',
                            success: function(respond){
                                console.log(respond);
                                if (respond[0] == 'success') {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'บันทึกสำเร็จ',
                                        timer: 1500
                                    });
                                    $('.modal-review-job .jo-status strong').html('<span class="text-danger">ยกเลิกการแจ้งงาน</span>');
                                    $('.modal-review-job .modal-footer').html('');
                                    list_job_option();
                                }
                            }
                        });
                    }
                });
                break;
            default:
        }
    })
    .on('click','.btn-save-form',function(){ /*save form*/
        let form_type = $(this).attr('data-form');
        form = $(this).closest('.'+form_type).find('form');
        // switch (form_type) {
        //     case 'form-owner':
                if (validate_form(form)) {
                    $.ajax({
                        url: base_url('Job_option/update'),
                        method: 'post',
                        data: form.serialize(),
                        dataType: 'json',
                        success: function(respond){
                            // console.log(respond);
                            if (respond[0] == 'success') {
                                Swal.fire({
                                    type: 'success',
                                    title: respond[1],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                form.closest('.'+form_type).hide();
                                switch (respond[2]) {
                                    case 'success':
                                        $('.modal-review-job .jo-status strong').html('<span class="text-success">ดำเนินการเรียบร้อยแล้ว</span>');
                                        $('.modal-review-job .jo-success-date-th').html(respond[3]);
                                        $('.modal-review-job .jo-remark').html(respond[4]);
                                        break;
                                    case 'accept':
                                        $('.modal-review-job .jo-status strong').html('<span class="text-warning">กำลังดำเนินการ</span>');
                                        $('.modal-review-job .modal-footer').html('');
                                        break;
                                    default:
                                }
                                list_job_option();
                            }else if(respond[0] == 'fail'){
                                Swal.fire({
                                    type: 'warning',
                                    title: respond[1]
                                });
                            }
                        }
                    })
                }
        //         break;
        //     default:
        //
        // }

    })
    .on('click','.btn-cancel-form',function(){ /*close form */
        let form = $(this).attr('data-form');
        $(this).closest('.'+form).hide();
    })

    /*table action*/
    $('.list-job .tb-job-list')
    .on('click','.btn-check-job',function(){
        let jo_id = $(this).closest('tr').attr('jo-id');
        $.ajax({
            url: base_url('Job_option/get'),
            method: 'post',
            data: {jo_id:jo_id},
            dataType: 'json',
            success: function(respond){
                // console.log(respond);
                if (respond[0] == 'success') {
                    respond[1] = respond[1][0];
                    let html = '';
                    html += '<div class="row">';
                        html += '<div class="col-md-12 text-center">'+respond[1].jo_customer_name+' แผนก '+respond[1].jo_customer_department+'</div>';
                        html += '<div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2 " style="font-size:0.8rem">';
                            html += '<div class="col-sm-12 col-md-12 col-lg-12 row m-0">';
                                html += '<div class="row m-0 border rounded">';
                                    html += '<div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>ข้อมูลผู้แจ้ง</strong></div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>ชื่อ :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond[1].jo_creator_name+'</div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>เขต :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond[1].jo_creator_zone+'</div>';
                                    html += '<div class="col-sm-7 col-md-4 border-right border-bottom"><strong>เบอร์โทรติดต่อ :</strong></div>';
                                    html += '<div class="col-sm-5 col-md-8 border-bottom">'+respond[1].jo_creator_tel+'</div>';
                                    html += '<div class="col-sm-7 col-md-4 border-right"><strong>E-mail :</strong></div>';
                                    html += '<div class="col-sm-5 col-md-8 ">'+respond[1].jo_creator_mail+'</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2" style="font-size:0.8rem;height: fit-content;">';
                            html += '<div class="col-md-12 row m-0">';
                                html += '<div class="row m-0 border rounded col-12 p-0">';
                                    html += '<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>สถานะใบแจ้งงาน</strong></div>';
                                    let jo_status = respond[1].jo_status;
                                    switch (jo_status) {
                                        case 'new':
                                            jo_status = '<span class="text-info">สร้างใหม่</span>';
                                        break;
                                        case 'accept':
                                            jo_status = '<span class="text-warning">กำลังดำเนินการ</span>';
                                        break;
                                        case 'cancel':
                                            jo_status = '<span class="text-danger">ยกเลิก</span>';
                                        break;
                                        case 'success':
                                            jo_status = '<span class="text-success">ดำเนินการเรียบร้อยแล้ว</span>';
                                        break;
                                        default:
                                    }
                                    html += '<div class="col-12 border-bottom text-center jo-status"><strong>'+jo_status+'</strong></div>';
                                    html += '<div class="col-12 border-bottom bg-primary text-white text-center"><strong>ดำเนินการแล้วเสร็จ</strong></div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>วันที่ :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom jo-success-date-th">'+respond[1].jo_success_date_th+'</div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>หมายเหตุ :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom jo-remark">'+respond[1].jo_remark+'</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2" style="font-size:0.8rem;height: fit-content;">';
                            html += '<div class="col-sm-12 col-md-12 col-lg-12 row m-0">';
                                html += '<div class="row m-0 border rounded col-12 p-0">';
                                    html += '<div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>ข้อมูล IT</strong></div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>ผู้รับเรื่อง :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond[1].jo_it_name+'</div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>วันที่รับเรื่อง :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond[1].jo_it_date_th+'</div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>ผู้รับผิดชอบงาน :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond[1].jo_owner_name+'</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2" style="font-size:0.8rem">';
                            html += '<div class="col-sm-12 col-md-12 col-lg-12 row m-0">';
                                html += '<div class="col-12 row m-0 border rounded p-0">';
                                    html += '<div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>ข้อตกลงการแจ้งงาน</strong></div>';
                                    html += '<div class="col-sm-12 col-md-5 border-bottom border-right"><strong>รายละเอียดผลิตภัณฑ์ :</strong></div>';
                                    html += '<div class="col-sm-12 col-md-7 border-bottom" style="overflow-wrap: break-word;">'+respond[1].jo_note_product_detail+'</div>';
                                    html += '<div class="col-sm-12 col-md-5 border-bottom border-right"><strong>สิ่งที่ต้องการให้มีเพิ่ม :</strong></div>';
                                    html += '<div class="col-sm-12 col-md-7 border-bottom" style="overflow-wrap: break-word;">'+respond[1].jo_note_additional_option+'</div>';
                                    html += '<div class="col-sm-12 col-md-5 border-bottom border-right"><strong>ต้องการความช่วยเหลือ :</strong></div>';
                                    html += '<div class="col-sm-12 col-md-7 border-bottom" style="overflow-wrap: break-word;">'+respond[1].jo_note_help+'</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        html += respond[4]; /*form modal*/
                    html += '</div>';

                    let btn = '';
                    if (respond[3] != '') {
                        $('.modal-review-job .modal-footer').html(respond[3]);
                    }
                    list_owner();
                    $('.modal-review-job .modal-body').html(html);
                    $('.modal-review-job').modal('show');
                    $('.loading-screen').hide();

                }else {

                }
            }
        })
    })

    function validate_form(form,input=[]){
        form.find('.help-block').each(function(key,value){ /*remove help-block*/
            $(this).remove();
        });
        form.find('input').each(function(key,value){ /*remove help-block*/
            if ($(this).val() == '' && $(this).attr('required')) {
                $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
            }
        });
        form.find('select').each(function(key,value){ /*remove help-block*/
            if ($(this).val() == '' && $(this).attr('required')) {
                $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
            }
        });

        if (form.find('.help-block').length == 0) { /*check help-block*/
            return true;
        }else {
            $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);/* focus help-block*/
            return false;
        }
    }

    function validate_form_add_job(){
        $('.form-add-job .help-block').each(function(key,value){ /*remove help-block*/
            $(this).remove();
        });
        $('.form-add-job *[name*=jo_]').each(function(key,value){ /*check input & select*/
            if ($(this).val() == '' && $(this).attr('required')) {
                if ($(this).attr('name') != 'jo_note_help') {
                    $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
                }
            }
        });
        // $('.form-add-job .wrap-iframe-summernote').each(function(key,value){ /*validate summernote*/
        //     if ($(this).find('iframe').hasClass('note-help') == false) {
        //         if ($(this).find('iframe').contents().find("#summernote").next().find('.note-editable').html() == '') {
        //             console.log($(this).find('iframe').closest('.form-group'));
        //             $(this).append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
        //         }
        //     }
        // });

        if ($('.form-add-job .help-block').length == 0) { /*check help-block*/
            return true;
        }else {
            $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);/* focus help-block*/
            return false;
        }
    }



    function list_customer(){
        $.ajax({
            url: base_url('employee/list_customer_ajax'),
            method: 'post',
            data: {zone:'active'},
            dataType: 'json',
            success: function (data){
                console.log(data);
                if (data[0] == 'success') {
                    let html = '<option value="">เลือกโรงพยาบาล..</option>';
                    $.each(data[1],function(key,value){
                        html += '<option value="'+value.id+'">'+value.cus_name+'</option>';
                    });
                    $('.form-add-job .list-customer').html(html);
                    max_chosen($('.form-add-job .list-customer'));

                }
            }
        });
    }
    function list_owner(){
        $.ajax({
            url: base_url('Job_option/list_owner'),
            dataType: 'json',
            success: function (data){
                if (data[0] == 'success') {
                    let html = '<option value="">เลือกผู้รับผิดชอบงาน..</option>';
                    $.each(data[1],function(key,value){
                        html += '<option value="'+value.id+'">'+value.first_name+' '+value.last_name+' </option>';
                    });
                    $('.modal-review-job .list-owner').html(html);
                    max_chosen($('.modal-review-job .list-owner'));
                }
            }
        });
    }

    function list_job_option(){
        $.ajax({
            url: base_url('Job_option/list'),
            dataType: 'json',
            success: function(respond){
                // console.log(respond);
                if (respond[0] == 'success') {
                    let html = '';
                    $.each(respond[1],function(key,value){
                        html += '<tr jo-id="'+value.jo_id+'">';
                        html += '<td>'+value.jo_customer_name+'</td>';
                        html += '<td>'+value.jo_order_form+'</td>';
                        html += '<td>'+value.jo_date_th+'</td>';

                        let jo_status = value.jo_status;
                        switch (jo_status) {
                            case 'new':
                                jo_status = '<span class="text-info">สร้างใหม่</span>';
                            break;
                            case 'accept':
                                jo_status = '<span class="text-warning">กำลังดำเนินการ</span>';
                            break;
                            case 'cancel':
                                jo_status = '<span class="text-danger">ยกเลิก</span>';
                            break;
                            case 'success':
                                jo_status = '<span class="text-success">ดำเนินการเรียบร้อยแล้ว</span>';
                            break;
                            default:
                        }
                        html += '<td>'+jo_status+'</td>';
                        html += '<td><button class="btn btn-info btn-check-job"><i class="material-icons">search</i> ดูรายละเอียด</butoon></td>';
                        html += '</tr>';
                    });
                    $('.list-job .card-header .card-title b').html(respond[1].length);
                    $('.list-job .card-body tbody').html(html);
                    search_sort(respond[1]);
                }else {
                    let html = '<td class="text-center" colspan="4">ไม่มีการแจ้งงาน</td>';
                    $('.list-job .card-header .card-title b').html(0);
                    $('.list-job .card-body tbody').html(html);

                }
            }
        })
    }
});
