$(document).ready(function() {
    list_customer();
    list_license();


    /*main panel option*/
    $('.main-panel')
    .on('click','.btn-modal-add-license',function(){ /*open modal add license*/
        $('.content').find('.row-add-license').show();
        $('.content').find('.row-add-license input[name=type]').val('add');
        $('.content').find('.row-add-license input[name=license_id]').remove();
        $('.content').find('.row-add-license input[name!=type]').val('');
        $('.content').find('.row-add-license textarea').val('');
        $('.content').find('.row-add-license select').val('');
        max_chosen($('.content').find('.row-add-license select'),'update');
    });

    /*modal detail license*/
    $('.modal-review-license').on('click','.btn-detail-option',function(){
        if ($('.modal-review-license .wrap-detail-option').is(':visible')) {
            $(this).find('i').html('keyboard_arrow_down');
            $('.modal-review-license .wrap-detail-option').hide();
        }else {
            $(this).find('i').html('keyboard_arrow_up');
            $('.modal-review-license .wrap-detail-option').show();
        }
    });

    /*form license*/
    $('.row-add-license')
    .on('keyup keypress','input[name=license_software_sn]',function(){ /* auto - */
        let value = $(this).val().toUpperCase();
        let new_value = '';
        if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode>=65 && event.keyCode<=122)) //48-57(ตัวเลข) ,65-90(Eng ตัวพิมพ์ใหญ่ ) ,97-122(Eng ตัวพิมพ์เล็ก)
        {
            if (value.length > 4) {
                value = value.split('-');
                let sum_value = '';

                for (var i = 0; i < value.length; i++) {
                    sum_value += value[i];
                }
                value = sum_value;
            }
            for (var i = 0; i < value.length; i++) {
                if (i != 0) {
                    if (i % 4 == 0) {
                        new_value += '-';
                    }
                }
                new_value += value.substr(i,1);
            }
            $(this).val(new_value);
        }else{
            return false;
        }
    })
    .on('keyup keypress','input[name=license_hardware_sn]',function(){ /*  */
        console.log('test');
        let value = $(this).val().toUpperCase();
        $(this).val(value)
    })
    .on('click','.btn-cancel-license',function(){ /* close modal */
        $('.content').find('.row-add-license').hide();
    })
    .on('click','input.add-customer',function(){ /* manual customer*/
        let wrap = $(this).closest('.row-add-license');
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
            $(this).closest('.row-add-license').find('.list-customer').closest('.form-group').hide();
            $(this).closest('.row-add-license').find('input.input-customer-name').closest('.form-group').show();
            $(this).closest('.row-add-license').find('input.input-customer-name').attr('name','license_customer_name');
            $(this).closest('.row-add-license').find('select.list-customer').attr('name','');
        }else {
            $(this).closest('.row-add-license').find('.list-customer').closest('.form-group').show();
            $(this).closest('.row-add-license').find('input.input-customer-name').closest('.form-group').hide();
            $(this).closest('.row-add-license').find('input.input-customer-name').attr('name','');
            $(this).closest('.row-add-license').find('select.list-customer').attr('name','license_customer_id');

        }
    })
    .on('click','.btn-add-license',function(){
        $('.loading-screen').show();
    })
    .on('click','.btn-add-license',function(){ /* add license*/
        let data = $('.row-add-license .form-add-license').serialize();
        if (validate_form_add_license()) {
            $.ajax({
                url: base_url('software_license/add'),
                method: 'post',
                data: data,
                dataType: 'json',
                success: function (respond){
                    // console.log(respond);
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
                                title: 'ไม่สามารถบันทึกได้',
                            });
                        break;
                        case 'can not add':
                            Swal.fire({
                                type: 'error',
                                title: 'ไม่สามารถเพิ่มโรงพยาบาลใหม่ได้',
                            });
                        break;
                        default:
                    }
                    $('.row-add-license').hide();
                    $('.loading-screen').hide();
                    list_license();
                }
            });
        }else {
            $('.loading-screen').hide();
        }

    })
    .on('click','.btn-update-license',function(){
        $('.loading-screen').show();
    })
    .on('click','.btn-update-license',function(){ /* update license*/
        let data = $('.row-add-license .form-add-license').serialize();
        $.ajax({
            url: base_url('software_license/update'),
            method: 'post',
            data: data,
            dataType: 'json',
            success: function (respond){
                // console.log(respond);
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
                            title: 'ไม่สามารถบันทึกได้',
                        });
                    break;
                    case 'can not add':
                        Swal.fire({
                            type: 'error',
                            title: 'ไม่สามารถเพิ่มโรงพยาบาลใหม่ได้',
                        });
                    break;
                    default:
                }
                list_license();
                $('.content').find('.row-add-license .card-body form.form-add-license input[name=license_id]').remove();
                $('.row-add-license').hide();
                $('.loading-screen').hide();
            }
        });
    })

    /*action modal review license*/
    $('.modal-review-license')
    .on('click','.btn-option',function(){
        $('.loading-screen').show();
    })
    .on('click','.btn-option',function(){
        let option_type = $(this).attr('option-type');
        let license_id = $(this).closest('.modal-content').find('.modal-body .wrap-license').attr('license-id');
        switch (option_type) {
            case 'edit':
                $.ajax({
                    url: base_url('Software_license/get'),
                    method: 'post',
                    data: {license_id:license_id},
                    dataType: 'json',
                    success: function(respond){
                        // console.log(respond);
                        if (respond[0] == 'success') {
                            $('.modal-review-license').modal('hide');

                            $('.content').find('.row-add-license').show();
                            $('.content').find('.row-add-license input').val('');
                            $('.content').find('.row-add-license textarea').val('');
                            $('.content').find('.row-add-license select').val('');
                            $('.content').find('.row-add-license select').val(respond[1].license_customer_id);
                            max_chosen($('.content').find('.row-add-license select'),'update');
                            $('.content').find('.row-add-license input[name=type]').val('update');
                            $('.content').find('.row-add-license .card-body form.form-add-license').prepend('<input type="hidden" name="license_id" value="'+respond[1].license_id+'">');
                            $('.content').find('.row-add-license input[name=license_po]').val(respond[1].license_po);
                            $('.content').find('.row-add-license input[name=license_of]').val(respond[1].license_of);
                            $('.content').find('.row-add-license input[name=license_software_sn]').val(respond[1].license_software_sn);
                            $('.content').find('.row-add-license input[name=license_son]').val(respond[1].license_son);
                            $('.content').find('.row-add-license input[name=license_software_version]').val(respond[1].license_software_version);
                            $('.content').find('.row-add-license input[name=license_hardware_sn]').val(respond[1].license_hardware_sn);
                            $('.content').find('.row-add-license textarea[name=license_remark]').val(respond[1].license_remark);
                            $.each(respond[1].license_option,function(key,value){
                                $('.content').find('.row-add-license input[name=option_'+key+']').val(value);
                            });
                            material_input();
                            $('.content').find('.row-add-license .card-footer .btn-add-license').toggleClass('btn-add-license btn-update-license');
                            $('.loading-screen').hide();
                        }

                    }
                });
                break;
            case 'cancel':
                    $('.loading-screen').hide();
                    Swal.fire({
                        title: 'คุณต้องการลบการบันทึกนี้หรือไม่?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#4caf50 ',
                        cancelButtonColor: '#f44336 ',
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: base_url('software_license/update'),
                                method: 'post',
                                data: {license_id:license_id,type:'cancel'},
                                dataType: 'json',
                                success: function(respond){
                                    // console.log(respond);
                                    if (respond[0] == 'success') {
                                        Swal.fire({
                                            type: 'success',
                                            title: 'บันทึกสำเร็จ',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                    }else {
                                        Swal.fire({
                                            type: 'warning',
                                            title: 'ไม่สามารถลบได้',
                                        });
                                    }
                                    $('.loading-screen').hide();
                                    $('.modal-review-license').modal('hide');
                                    list_license();
                                }
                            });

                        }
                    })
                break;
            default:

        }
    });

    /*action table license*/
    $('.content .tb-license-list tbody')
    .on('click','.btn-check-license',function(){
        $('.loading-screen').show();
    })
    .on('click','.btn-check-license',function(){ //get detail
        let license_id = $(this).closest('tr').attr('license-id');
        $.ajax({
            url: base_url('Software_license/get'),
            method: 'post',
            data: {license_id:license_id},
            dataType: 'json',
            success: function(respond){
                // console.log(respond);
                if (respond[0] == 'success') {
                    let html = '';
                    let option = piicix_option();
                    // respond[1] = respond[1][0];
                    html += '<div class="row wrap-license" license-id="'+respond[1].license_id+'">';
                        html += '<div class="col-md-12 text-center">'+respond[1].license_customer_name+'</div>';
                        html += '<div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2 " style="font-size:0.8rem">';
                            html += '<div class="col-sm-12 col-md-12 col-lg-12 row m-0">';
                                html += '<div class="row m-0 border rounded">';
                                    html += '<div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>Detail</strong></div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>OF :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond[1].license_of+'</div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>PO :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond[1].license_po+'</div>';
                                    html += '<div class="col-sm-7 col-md-4 border-right"><strong>Sale Order No. :</strong></div>';
                                    html += '<div class="col-sm-5 col-md-8 ">'+respond[1].license_son+'</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2" style="font-size:0.8rem;height: fit-content;">';
                            html += '<div class="col-sm-12 col-md-12 col-lg-12 row m-0">';
                                html += '<div class="row m-0 border rounded col-12 p-0">';
                                    html += '<div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>Hardware Serial</strong></div>';
                                    html += '<div class="col-sm-12 col-md-6 text-center">'+respond[1].license_hardware_sn+'</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="row m-0 col-sm-12 col-md-6 col-lg-6 mt-2 mb-2" style="font-size:0.8rem">';
                            html += '<div class="col-md-12 row m-0">';
                                html += '<div class="row m-0 border rounded">';
                                    html += '<div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>Software</strong></div>';
                                    html += '<div class="col-sm-4 col-md-4 border-bottom border-right"><strong>Serial :</strong></div>';
                                    html += '<div class="col-sm-8 col-md-8 border-bottom">'+respond[1].license_software_sn+'</div>';
                                    html += '<div class="col-sm-5 col-md-4 border-bottom border-right"><strong>Version :</strong></div>';
                                    html += '<div class="col-sm-7 col-md-8 border-bottom">'+respond[1].license_software_version+'</div>';
                                    html += '<div class="row m-0 col-12 p-0">';
                                        html += '<div class="row m-0 col-12 p-0">';
                                            html += '<div class="col-7 border-bottom border-right text-center"><strong>Option</strong></div>';
                                            html += '<div class="col-5 border-bottom text-center row m-0 p-0 pl-1 btn-detail-option" style="cursor:pointer;"><div class="col-12 p-0"><strong>Detail <i class="material-icons" style="position:absolute">keyboard_arrow_down</i></strong></div>';
                                            // <strong>Commercial Option</strong></div>
                                        html += '</div>';
                                    $.each(respond[1].license_option,function(key_option,value_option){
                                        html += '<div class="row m-0 col-12 p-0">';
                                            html += '<div class="col-12 border-bottom text-center"><p class="m-0">'+key_option+' : '+value_option+'</p></div>';
                                                html += '<div class="col-12 row m-0 p-0 wrap-detail-option" style="display:none">';
                                        $.each(option[key_option]['option'],function(key_main_option,value_main_option){
                                                    html += '<div class="row m-0 p-0 col-12 border-bottom sub-option">';
                                                        html += '<div class="col-2 border-right p-0 text-center">'+key_main_option+'</div>';
                                                        html += '<div class="col-10 pr-0 pl-1"> '+value_main_option+'</div>';
                                                    html += '</div>';
                                        });
                                                html += '</div>';
                                            html += '</div>';
                                    });
                                        html += '</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                    html += '</div>';
                    html += '<div class="row m-0 col-sm-12 col-md-6 col-lg-6 mt-2 mb-2" style="font-size:0.8rem;height: fit-content;">';
                        html += '<div class="col-md-12 row m-0">';
                            html += '<div class="row m-0 border rounded col-12 p-0">';
                                html += '<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>Remark</strong></div>';
                                html += '<div class="col-md-12">'+respond[1].license_remark+'</div>';
                            html += '</div>';
                        html += '</div>';
                    html += '</div>';

                    let btn = '';
                    if (respond[2] == 'admin') {
                        btn += '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                        btn += '<button class="btn btn-danger btn-option" option-type="cancel"><i class="material-icons">delete</i> ลบ</button>';
                        $('.modal-review-license .modal-footer').html(btn);
                    }


                    $('.modal-review-license .modal-body').html(html);
                    $('.modal-review-license').modal('show');
                    $('.loading-screen').hide();
                }else {

                }
            }
        })


    });
    piicix_option();
    /* array option*/
    function piicix_option(){
        let array = {};
        array['0VB'] = {};
        array['0VB']['name'] = 'includes the following commercial Options';
        array['0VB']['option'] = {};
        array['0VB']['option']['MAP'] = 'ST MAP';
        array['0VB']['option']['TRD'] = 'Horizon Trends';
        array['0VB']['option']['C01'] = 'Dual display';
        array['0VB']['option']['RPT'] = 'Electronic';
        array['0VB']['option']['00N'] = 'verview connectivity';
        array['12B'] = {};
        array['12B']['name'] = 'includes the following commercial Options';
        array['12B']['option'] = {};
        array['12B']['option']['SPE'] = 'specialty review advanced';
        array['12B']['option']['FDB'] = '12 lead full disclosure';
        array['12B']['option']['C17'] = '12-lead capture and export';
        array['12B']['option']['LED'] = '12-lead orders';
        array['12B']['option']['C23'] = 'Holter data export';
        array['12B']['option']['WSX'] = 'Wave strip export PNG';
        array['12B']['option']['RPT'] = 'Electronic reporting PDF';
        array['12B']['option']['CX2'] = 'ADT interface';
        array['PRB'] = {};
        array['PRB']['name'] = 'includes the following commercial Options';
        array['PRB']['option'] = {};
        array['PRB']['option']['MAP'] = 'ST MAP';
        array['PRB']['option']['TRD'] = 'Horizon Trends';
        array['PRB']['option']['SPE'] = 'specialty review advanced';
        array['PRB']['option']['CX2'] = 'ADT interface';
        array['PRB']['option']['C14'] = 'HL7 interface';
        array['PRB']['option']['LAB'] = 'Lab interface';
        array['PRB']['option']['RPT'] = 'Electronic reporting PDF';
        array['PRB']['option']['WSX'] = 'Wave strip export PNG';
        array['PRB']['option']['MP3'] = 'MP80/90,MX800 interface';
        array['V1B'] = {};
        array['V1B']['name'] = 'includes the following commercial Options';
        array['V1B']['option'] = {};
        array['V1B']['option']['WEB'] = 'Web single patient view';
        array['V1B']['option']['MPW'] = 'Web multi-patient view';
        array['V1B']['option']['MOB'] = 'Mobile Caregiver';
        array['10N'] = {};
        array['10N']['name'] = 'includes the following commercial Options';
        array['10N']['option'] = {};
        array['10N']['option']['RE1'] = 'General review';
        array['10N']['option']['D07'] = '7days full disclosure';
        array['10N']['option']['C01'] = 'Dual display';
        array['10N']['option']['C67'] = 'CareEvent interface';
        array['10N']['option']['DEV'] = 'EC40/80 interface';
        array['10N']['option']['WLD'] = 'Telemetry & device location';
        array['10N']['option']['MP0'] = 'X2/3,MP5/20/30,MX400/450';
        array['10N']['option']['MP1'] = 'MRX,MP40/50,MX500';
        array['10N']['option']['MP2'] = 'MP60/70,MX550 to MX700';
        array['30N'] = {};
        array['30N']['name'] = 'includes the following commercial Options';
        array['30N']['option'] = {};
        array['30N']['option']['RE1'] = 'General review';
        array['30N']['option']['D07'] = '7days full disclosure';
        array['30N']['option']['C01'] = 'Dual display';
        array['10N']['option']['C67'] = 'CareEvent interface';
        array['10N']['option']['DEV'] = 'EC40/80 interface';
        array['30N']['option']['WLD'] = 'Telemetry & device location';
        array['30N']['option']['MP0'] = 'X2/3,MP5/20/30,MX400/450';
        array['30N']['option']['MP1'] = 'MRX,MP40/50,MX500';
        array['30N']['option']['MP2'] = 'MP60/70,MX550 to MX700';
        array['GTW'] = {};
        array['GTW']['name'] = 'includes the following commercial Options';
        array['GTW']['option'] = {};
        array['GTW']['option']['D07'] = '7days full disclosure';
        array['GTW']['option']['MP0'] = 'X2/3,MP5/20/30,MX400/450';
        array['GTW']['option']['MP1'] = 'MRX,MP40/50,MX500';
        array['GTW']['option']['MP2'] = 'MP60/70,MX550 to MX700';
        array['MP3'] = {};
        array['MP3']['name'] = 'includes the following commercial Options';
        array['MP3']['option'] = {};
        array['MP3']['option']['MP0'] = 'X2/3,MP5/20/30,MX400/450';
        array['MP3']['option']['MP1'] = 'MRX,MP40/50,MX500';
        array['MP3']['option']['MP2'] = 'MP60/70,MX550 to MX700';
        array['MP3']['option']['MP3'] = 'MP80/90,MX800';
        return array;
    }

    function validate_form_add_license(){
        $('.form-add-license .help-block').each(function(key,value){ /*remove help-block*/
            $(this).remove();
        });
        $('.form-add-license *[name*=license_]').each(function(key,value){ /*check input & select*/
            if ($(this).attr('name') != 'license_remark' && $(this).attr('name') != 'license_po') {
                if ($(this).val() == '') {
                    $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
                }
            }
        });
        let length_of_option = $('.form-add-license *[name*=option_]').length;
        let check_option = 0;
        $('.form-add-license *[name*=option_]').each(function(key,value){ /*check input & select*/
            if ($(this).val() == '') {
                check_option++;
            }
        });
        if (check_option == length_of_option) {
            $('.form-add-license .wrap-option').append('<span class="help-block left-align" style="width: 242px;left: 10%;bottom: 82%;"><li>กรุณากรอกข้อมูลอย่างน้อย 1 Option</li></span>');
        }
        if ($('.form-add-license .help-block').length == 0) { /*check help-block*/
            return true;
        }else {
            $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);/* focus help-block*/
            return false;
        }
    }

    function search_sort(data,user_status){
        $('.navbar .form-search').off();
        $('.navbar .form-search')
        .on('click','.btn-reset-search',function(){
            $('.navbar .form-search .search-license').val('');
            $('.navbar .form-search .search-date-start').val('');
            $('.navbar .form-search .search-date-end').val('');
            $('.navbar .form-search .search-cate').val('');
            $('.navbar .form-search .search-sort').val('');
            list_license();
            // let html = '';
            // $.each(data,function(key,value){
            //     html += '<tr>';
            //     html += '<td class="">'+value.license_customer_name+'</td>';
            //     html += '<td class="">'+value.license_po+'</td>';
            //     html += '<td class="">'+value.license_of+'</td>';
            //     html += '<td class="">'+value.license_software_sn+'</td>';
            //     html += '<td class="">'+value.license_son+'</td>';
            //     html += '<td class="">'+value.license_software_version+'</td>';
            //     html += '<td class="">'+value.license_hardware_sn+'</td>';
            //     html += '<td class="">'+value.license_remark+'</td>';
            //     html += '</tr>';
            // });
            // $('.content .tb-license-list tbody').html(html);
            // $('.content .list-license .list-number-order b').html(data_search.length);
        })
        .on('change keyup','.search-license,.search-date-start,.search-date-end,.search-sort,.search-cate,.search-year-start,.search-year-end',function(){
            let license = $('.navbar .form-search .search-license').val();
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
                    let date = data[i].license_create_date	;
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
                        url: base_url('Software_license/list'),
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

            if (license != '') {
                license = license.toUpperCase();
                let data_search_license = [];
                let data_key_license = 0;
                let check_search = false;
                let check_key_sub = ['license_id','license_customer_id','license_create_date','license_creator','license_update_date','license_status'];
                let = check_search_key_sub = false;
                $.each(data_search,function(key,value){
                    $.each(value,function(key_sub,value_sub){

                        if (check_key_sub.indexOf(key_sub) == -1) {
                            if (value_sub != '') {
                                if (value_sub.indexOf(license) > -1) {
                                    check_search = true;
                                }
                            }
                        }
                    });
                    if (check_search) {
                        data_search_license[data_key_license] = value;
                        check_search = false;
                        data_key_license++;
                    }
                });
                data_search = data_search_license;
            }
            //event select year
            setTimeout(function(){
                let html = '';
                let check_month = '0';
                if (data_search.length < 1) {
                    $('.content .tb-license-list tbody').html('<tr><td class="text-center" colspan="'+$('.content .tb-license-list th').length+'">ไม่พบตามคำค้น</td></tr>');
                    $('.content .list-license .list-number-order b').html(data_search.length);
                }else {
                    let check_line_today = 0;
                    $.each(data_search,function(key,value){
                        html += '<tr license-id="'+value.license_id+'">';
                        html += '<td class="">'+value.license_customer_name+'</td>';
                        html += '<td class="max-d-none-sm">'+value.license_software_sn+'</td>';
                        html += '<td class="max-d-none-sm">'+value.license_software_version+'</td>';
                        html += '<td class="max-d-none-sm">'+value.license_hardware_sn+'</td>';
                        html += '<td class="">';
                        html += '<button class="btn btn-info btn-check-license"><i class="material-icons">search</i> รายละเอียด</button>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    $('.content .tb-license-list tbody').html(html);
                    $('.content .list-license .list-number-order b').html(data_search.length);
                }
            },150);


        });
    }


    function list_license(){
        $.ajax({
            url: base_url('software_license/list'),
            dataType: 'json',
            success: function(respond){
                // console.log(respond);
                let html = '';
                if (respond[0] == 'success') {
                    $.each(respond[1],function(key,value){
                        html += '<tr license-id="'+value.license_id+'">';
                        html += '<td class="">'+value.license_customer_name+'</td>';
                        // html += '<td class="">'+value.license_po+'</td>';
                        // html += '<td class="">'+value.license_of+'</td>';
                        html += '<td class="max-d-none-sm">'+value.license_software_sn+'</td>';
                        // html += '<td class="">'+value.license_son+'</td>';
                        html += '<td class="max-d-none-sm">'+value.license_software_version+'</td>';
                        html += '<td class="max-d-none-sm">'+value.license_hardware_sn+'</td>';
                        // html += '<td class="">'+value.license_remark+'</td>';
                        html += '<td class="">';
                        html += '<button class="btn btn-info btn-check-license"><i class="material-icons">search</i> รายละเอียด</button>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    $('.content .tb-license-list tbody').html(html);
                    $('.content .list-license .list-number-order b').html(respond[1].length);
                    search_sort(respond[1],respond[2]);
                }

            }
        });
    }
    function list_customer(){
        $.ajax({
            url: base_url('employee/list_customer_ajax'),
            dataType: 'json',
            success: function (data){
                if (data[0] == 'success') {
                    let html = '<option value="">เลือกโรงพยาบาล..</option>';
                    $.each(data[1],function(key,value){
                        html += '<option value="'+value.id+'">'+value.cus_name+'</option>';
                    });
                    $('.form-add-license .list-customer').html(html);
                    max_chosen($('.form-add-license .list-customer'));

                }
            }
        });
    }

    function list_license_option(){
        $.ajax({
            url: base_url('license_option/list'),
            dataType: 'json',
            success: function(respond){
            }
        })
    }
});
