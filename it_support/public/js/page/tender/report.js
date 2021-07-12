$(document).ready(function(){
    $('.loading-screen').show()
    list_tender()




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
            console.log(number);
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
                        console.log(data_search);
                        break;
                    default:
                }
            }
            if (number != '') {
                number = number.toLowerCase();
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





    function list_tender(){
        $.ajax({
            url: base_url('tender/list_report'),
            method: 'post',
            // data: {get_tender: true},
            dataType: 'json',
            success: function(data){
                console.log(data);
                $('.loading-screen').hide()
                if (data[0] == 'success') {
                    let html = '';
                    $.each(data[1],function(key,value){
                        if (value.sale_name != '') {
                            // let t_customer = value.t_customer
                            // value.t_customer_text = get_customer(t_customer)
                            html += '<tr>';
                            html += '<td class="text-center">'+value.sale_name+'</td>';
                            let job_status = value.t_job_status
                            let job_value = value.t_job_value
                            html += '<td class="text-right">'+job_status.success+'</td>';
                            html += '<td class="text-right">'+job_status.unsuccess+'</td>';
                            html += '<td class="text-right">'+job_status.wait+'</td>';
                            html += '<td class="text-right bg-light-orange">'+job_status.sum+'</td>';
                            html += '</tr>';
                            html += '<tr class="bg-light-red text-danger">';
                            html += '<td class="text-center">ราคา</td>';
                            html += '<td class="text-right">'+job_value.success_text+'</td>';
                            html += '<td class="text-right">'+job_value.unsuccess_text+'</td>';
                            html += '<td class="text-right">'+job_value.wait_text+'</td>';
                            html += '<td class="text-right">'+job_value.sum_text+'</td>';
                            html += '</tr>';
                        }
                    });
                    // $('.list-tender .list-number-order h4 b').html(data[1].length)
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
            console.log(number);
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
                        console.log(data_search);
                        break;
                    default:
                }
            }
            if (number != '') {
                number = number.toLowerCase();
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



});
