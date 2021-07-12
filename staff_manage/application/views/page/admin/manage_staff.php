<!-- <!DOCTYPE html> -->
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>เช็คอินพนักงาน</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
            .tr{
                background-color: #f1f1f1;
            }
            .default-tr:nth-child(even){
                background-color: #f1f1f1;
            }
            .help-block {
                bottom: 58%;
            }
        </style>
    </head>
    <body class="light-grey">
        <?php $this->view('partail/nav_left') ?>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="overlay hide-large animate-opacity open_nav" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="main" style="margin-left:300px">

            <!-- Header -->
            <header id="portfolio">
                <span class="button hide-large xxlarge hover-text-grey open_nav" onclick="w3_open()"><i class="fa fa-bars"></i></span>
                <div class="container">
                    <h1><b>จัดการพนักงาน</b></h1>
                    <div class="section bottombar padding-16 filter row">
                        <div class="col s6 filter-group ">
                            <span class="margin-right">Filter:</span>
                            <button class="button round active all">ทั้งหมด</button>
                            <button value="ทำงานอยู่" class="button round white">ทำงานอยู่</button>
                            <button value="ลาออก" class="button round white">ลาออก</button>
                        </div>
                        <div class="col s1 filter-staff-detail" style="display:none">
                            <button class="button round red btn-return"><i class="fa fa-angle-left"></i> ย้อนกลับ</button>
                        </div>
                        <div class="col s2 right">
                            <button class="button round green btn-form-add-staff right"><i class="fa fa-plus"></i> เพิ่มพนักงาน</button>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container padding-bottom">
                <div class="list-staff ">
                    <div class="col l3 m3 s12 padding">
                        <label for="search">ค้นหา</label>
                        <input type="text" class="input border round" id="search" name="" value="">
                    </div>
                    <table class="table border white table-staff" border="1">
                        <thead>
                            <tr class="blue">
                                <th class="center">ลำดับ</th>
                                <th class="center">ชื่อ-สกุล</th>
                                <th class="center">ตำแหน่ง</th>
                                <th class="center">สถานะ</th>
                                <th class="center">เพิ่มเติม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" class="center">
                                    <img src="<?php echo $this->public_url('file/load/loading.gif') ?>" alt="">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="staff-detail row" style="display:none">
                    <div class="col l3 m12 s12 container data-staff margin-bottom">
                        <div class="card white row padding round margin-bottom">
                            <table class="table ">
                                <tr class="border-bottom">
                                    <th>รหัสพนักงาน</th>
                                    <td class="staff-user"></td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>ตำแหน่ง</th>
                                    <td class="staff-department"></td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>ชื่อ</th>
                                    <td class="staff-name"></td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>ที่อยู่</th>
                                    <td class="staff-address"></td>
                                </tr>
                                <tr>
                                    <th>สถานะ</th>
                                    <td class="staff-status"></td>
                                </tr>
                            </table>

                        </div>
                        <div class="col s12 padding center">
                            <div class="col s12 margin-bottom">
                                <a class="button card round orange text-white btn-edit-staff"><i class="fa fa-edit"></i> แก้ไขข้อมูล</a>
                            </div>
                            <div class="col s12">
                                <a class="button card round orange text-white btn-print"><i class="fa fa-print"></i> ปริ้นใบเงินเดือนล่าสุด</a>
                            </div>
                        </div>
                    </div>
                    <div class="col l9 m12 s12 ">
                        <div class="card white row padding round filter-cate-staff">
                            <div class="col s12 select-date">
                                <div class="col l6 m6 s12 container margin-bottom">
                                    <label><b>วันที่เริ่มต้น</b></label>
                                    <input class="input border round" type="date" placeholder="" name="start_date" value="<?php echo date("Y-m-d", strtotime("-1 Month")) ?>">
                                </div>
                                <div class="col l6 m6 s12 container">
                                    <label><b>วันที่สิ้นสุด</b></label>
                                    <input class="input border round" type="date" placeholder="" name="end_date" value="<?php echo date("Y-m-d") ?>">
                                </div>
                            </div>
                            <div class="col s12 row filter-staff ">
                                <div class="col l7 m7 s12  margin-top container">
                                    <div class=" card round row padding">
                                        <div class="col s12 border-bottom row margin-bottom">
                                            <div class="col s8">ทำงานปกติ</div>
                                            <div class="col s3 work-date text-theme-d1">0</div>
                                            <div class="col s1">วัน</div>
                                        </div>
                                        <div class="col s12 border-bottom row margin-bottom">
                                            <div class="col s8">ทำงานรายชั่วโมง</div>
                                            <div class="col s3 hourly-work text-theme-d1">0</div>
                                            <div class="col s1">วัน</div>
                                        </div>
                                        <div class="col s12 border-bottom row margin-bottom">
                                            <div class="col s8">เข้างานสาย</div>
                                            <div class="col s3 work-late text-orange">0</div>
                                            <div class="col s1">วัน</div>
                                        </div>
                                        <div class="col s12 border-bottom row margin-bottom">
                                            <div class="col s8">ขาดงาน</div>
                                            <div class="col s3 work-absent text-red">0</div>
                                            <div class="col s1">วัน</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col l5 m5 s12 margin-top container">
                                    <div class="card round row padding">
                                        <div class="col s12 border-bottom row margin-bottom">
                                            <div class="col s8">ค่าแรงปกติ</div>
                                            <div class="col s3 normal-money text-theme-d1">0</div>
                                            <div class="col s1">บาท</div>
                                        </div>
                                        <div class="col s12 border-bottom row margin-bottom">
                                            <div class="col s8">หักเงิน</div>
                                            <div class="col s3 deduct-money text-red">0</div>
                                            <div class="col s1">บาท</div>
                                        </div>
                                        <div class="col s12 border-bottom row margin-bottom">
                                            <div class="col s8">ค่าล่วงเวลา</div>
                                            <div class="col s3 ot-money text-theme-d2">0</div>
                                            <div class="col s1">บาท</div>
                                        </div>
                                        <div class="col s12 border-bottom row margin-bottom">
                                            <div class="col s8">รวมเป็นเงิน</div>
                                            <div class="col s3 sum-money text-theme-d1">0</div>
                                            <div class="col s1">บาท</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col s12 center padding margin-top">
                                <button type="button" class="button round card btn-deduct orange text-white">รายละเอียด <i class="fa fa-caret-down"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col l9 m12 s12 detail-deduct right" style="display:none">
                        <div class="padding round card white margin-top">
                            <table class="table-all" border="1">

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div id="id01" class="modal" style="z-index:5;">
                <div class="modal-content card-4 animate-zoom padding round row">
                    <header class="container white col s12 border-bottom margin-bottom" style="padding:0.01em 0 0.01em 16px">
                        <div class="display-container">
                            <span  class="button xxlarge display-topright" style="font-size:2em!important" onclick="$(this).closest('.modal').hide()">&times;</span>
                        </div>
                        <h2>เพิ่มพนักงาน</h2>
                    </header>

                    <div class="col s12 padding container">
                        <form class="form-add-staff">
                            <input type="hidden" name="type" value="">
                            <input type="hidden" name="staff_user" value="">
                            <table>
                                <tr class="row">
                                    <td class="col l6 m6 s12 container form-control">
                                        <label for="name">ชื่อ</label>
                                        <input id="name" type="text" class="input round border" name="name" value="">
                                    </td>
                                    <td class="col l6 m6 s12 container form-control">
                                        <label for="last_name">สกุล</label>
                                        <input id="last_name" type="text" class="input round border" name="last_name" value="">
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col l6 m6 s12 container form-control">
                                        <label for="staff_pass">วัน/เดือน/ปีเกิด</label>
                                        <input id="staff_pass" type="date" class="input round border" name="staff_pass" value="">
                                    </td>
                                    <td class="col l6 m6 s12 container form-control">
                                        <label for="staff_department">ตำแหน่ง</label>
                                        <select id="staff_department" class="chosen_select input round border" name="staff_department" style="width:100%"></select>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col l12 m6 s12 container form-control">
                                        <label for="staff_address">ที่อยู่</label>
                                        <textarea id="staff_address" name="staff_address" class="input border round" rows="5" cols="100" style="resize:none" placeholder="ที่อยู่"></textarea>
                                    </td>
                                    <td class="col l6 m6 s12 container form-control" style="display:none">
                                        <label for="staff_status">สถานะ</label>
                                        <select id="staff_status" class="input round border" name="staff_status" style="width:100%">
                                            <option value="ทำงานอยู่">ทำงานอยู่</option>
                                            <option value="ลาออก">ลาออก</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="container border-top padding col s12 center">
                        <button class="button green round border btn-add-staff"><i class="fa fa-save"></i> บันทึก</button>
                        <button class="button red round border" onclick="document.getElementById('id01').style.display='none'"><i class="fa fa-close"></i> ยกเลิก</button>
                    </div>
                </div>
            </div>


            <!-- End page content -->
        </div>
        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">

            $(document).ready(function(){

                list_staff();
                list_department();
                // $('.list-staff').hide();
                // $('.staff-detail').show();


                $('.btn-deduct').click(function(){
                    $('.detail-deduct').toggle();
                    if($('.detail-deduct').is(':visible')){
                        $('html, body').animate({scrollTop:($(".detail-deduct").offset().top - 150)}, 500);
                    }
                    if($('.detail-deduct').is(':hidden')){
                        $('html, body').animate({scrollTop:($('.btn-deduct').offset().top - 150)});
                    }

                });

                $('.btn-print').click(function(){
                    let staff_user = $('.data-staff .staff-user').html();
                    let url = "<?php echo $this->base_url('admin/print_slip/')?>"+staff_user;
                    window.location.href = url;
                });

                function staff_report(staff_user,data=[]){
                    if (data.length <= 0 ) {
                        var date = {'start_date':$('input[name=start_date]').val(),'end_date':$('input[name=end_date]').val()};
                    }else {
                        var date = data;
                    }
                    $.ajax({
                       url: '<?php echo $this->base_url('admin/report_staff') ?>',
                       method: 'post',
                       data:{staff_user:staff_user,date:date},
                       dataType: 'json',
                       success:function(data){
                           console.log(data);
                           if (data[1] != 'fail') {
                               let conclude = data[1];
                               $('.filter-cate-staff .filter-staff').find('.work-date').html(conclude.work_date);
                               $('.filter-cate-staff .filter-staff').find('.work-late').html(conclude.work_late);
                               $('.filter-cate-staff .filter-staff').find('.work-absent').html(conclude.work_absent);
                               $('.filter-cate-staff .filter-staff').find('.normal-money').html(conclude.normal_money);
                               $('.filter-cate-staff .filter-staff').find('.deduct-money').html(conclude.deduct_money);
                               $('.filter-cate-staff .filter-staff').find('.ot-money').html(conclude.ot_money);
                               $('.filter-cate-staff .filter-staff').find('.sum-money').html(conclude.sum_money);
                               $('.filter-cate-staff .filter-staff').find('.hourly-work').html(conclude.hourly_date);

                               let html = '';
                               let work_late = '';
                               let work_hourly = '';
                               let work_absent = '';
                               let work_in_time = '';
                               let num_absent = 1;
                               // console.log(data[2]);
                                $.each(data[2],function(key,value){
                                    // console.log(key);
                                    // console.log(value);
                                    if (key == 'work_absent') {
                                        $.each(value,function(key_ab,value_ab){
                                            if (work_absent == '') {
                                                html += '<tr class="red">';
                                                html += '<td colspan="3" class="center">ขาดงาน '+conclude.work_absent+' วัน</td>';
                                                html += '</tr>';
                                                html += '<tr class="">';
                                                html += '<td>ลำดับ</td>';
                                                html += '<td colspan="2">วันที่ขาดงาน</td>';
                                                html += '</tr>';
                                                work_absent = '1';
                                            }
                                            html += '<tr>';
                                            html += '<td class="center">'+num_absent+'</td>';
                                            html += '<td colspan="2">'+value_ab.date_absent+'</td>';
                                            html += '</tr>';
                                            num_absent++;
                                        });
                                    }
                                    if (key == 'work_hourly') {
                                        $.each(value,function(key_hourly,value_hourly){
                                            if (work_hourly == '') {
                                                html += '<tr class="theme-d1">';
                                                html += '<td colspan="3" class="center">ทำงานรายชั่วโมง</td>';
                                                html += '</tr>';
                                                html += '<tr class="">';
                                                html += '<td class="center">วันเวลาทำงาน</td>';
                                                html += '<td class="center">ชั่วโมงที่ทำงาน</td>';
                                                html += '<td class="center">จำนวนเงินที่ได้</td>';
                                                html += '</tr>';
                                                work_hourly = '1';
                                            }
                                            html += '<tr>';
                                            html += '<td>'+value_hourly.work_date+'</td>';
                                            html += '<td>'+value_hourly.work_hourly+'</td>';
                                            html += '<td>'+value_hourly.wage+'</td>';
                                            html += '</tr>';
                                        });
                                    }
                                    if (key == 'work_daily') {
                                        $.each(value,function(key_in_time,value_in_time){
                                            if (work_in_time == '') {
                                                html += '<tr class="theme-d1">';
                                                html += '<td colspan="3" class="center">ทำงานปกติ</td>';
                                                html += '</tr>';
                                                html += '<tr class="">';
                                                html += '<td class="center">วันเวลาทำงาน</td>';
                                                html += '<td class="center">ค่าแรง</td>';
                                                html += '<td class="center">ค่าล่วงเวลา</td>';
                                                html += '</tr>';
                                                work_in_time = '1';
                                            }
                                            html += '<tr>';
                                            html += '<td>'+value_in_time.work_date_in_time+'</td>';
                                            html += '<td>'+value_in_time.wage+'</td>';
                                            html += '<td>'+value_in_time.ot_money+'</td>';
                                            html += '</tr>';
                                        });
                                    }
                                    if (key == 'work_late') {
                                        $.each(value,function(key_late,value_late){
                                            if (work_late == '') {
                                                html += '<tr class="orange text-white">';
                                                html += '<td colspan="3" class="center">เข้างานสาย</td>';
                                                html += '</tr>';
                                                html += '<tr class="">';
                                                html += '<td class="center">วันเวลาเข้างาน</td>';
                                                html += '<td class="center">เวลาที่เข้างานสาย</td>';
                                                html += '<td class="center">จำนวนเงินหัก</td>';
                                                html += '</tr>';
                                                work_late = '1';
                                            }
                                            html += '<tr>';
                                            html += '<td>'+value_late.work_date+'</td>';
                                            html += '<td>'+value_late.late_time_start+' - '+value_late.late_time_end+'</td>';
                                            html += '<td>'+value_late.deduct_money+'</td>';
                                            html += '</tr>';
                                        });
                                    }
                                });
                               $('.detail-deduct table').html(html);
                           }else {
                               $('.filter-cate-staff .filter-staff').find('.work-date').html(0);
                               $('.filter-cate-staff .filter-staff').find('.work-late').html(0);
                               $('.filter-cate-staff .filter-staff').find('.work-absent').html(0);
                               $('.filter-cate-staff .filter-staff').find('.normal-money').html(0);
                               $('.filter-cate-staff .filter-staff').find('.deduct-money').html(0);
                               $('.filter-cate-staff .filter-staff').find('.ot-money').html(0);
                               $('.filter-cate-staff .filter-staff').find('.sum-money').html(0);
                               $('.filter-cate-staff .filter-staff').find('.hourly-work').html(0);
                           }
                       }
                    });
                }


                $('.select-date').on('change','input',function(){
                    var date = {'start_date':$('input[name=start_date]').val(),'end_date':$('input[name=end_date]').val()};
                    let staff_user = $('.staff-user').html();
                    staff_report(staff_user,date)
                });

                $('.staff-detail').on('click','.btn-edit-staff',function(){
                    var modal = $('#id01');
                    modal.find('.help-block').remove();
                    modal.show();
                    modal.find('header h2').html('แก้ไขข้อมูลพนักงาน');
                    modal.find(':input').val('');
                    modal.find('textarea').val('');
                    var staff_user = $(this).closest('.data-staff').find('.staff-user').html();
                    $.ajax({
                        url: '<?php echo $this->base_url('admin/staff_detail_ajax') ?>',
                        method: 'post',
                        data:{staff_user:staff_user},
                        dataType: 'json',
                        success: function(data){
                            if (data[0] = 'success') {
                                let staff = data[1];
                                let name = staff.staff_name
                                name = name.split(' ');
                                modal.find('input[name=type]').val('update');
                                modal.find('input[name=name]').val(name[0]);
                                modal.find('input[name=last_name]').val(name[1]);
                                modal.find('input[name=staff_user]').val(staff.staff_user);
                                modal.find('input[name=staff_pass]').val(staff.staff_pass);
                                modal.find('select[name=staff_department]').val(staff.staff_dep);
                                modal.find('select[name=staff_status]').closest('td').show();
                                modal.find('select[name=staff_status]').val(staff.staff_status);
                                modal.find('textarea').val(staff.staff_address);
                            }else if (data[0] = 'fail') {
                                swal({
                                    tilte: 'warning paramiter',
                                    type: 'error',
                                })
                            }else {
                                swal({
                                    tilte: 'warning database',
                                    type: 'error',
                                })
                            }
                        }
                    });
                });


                $('.btn-add-staff').click(function(){
                    var txt_error = '<span class="col help-block left-align"><li>กรุณากรอกข้อมูล</li></span>';
                    $(this).closest('#id01').find('.form-control').each(function(key,value){
                        $(this).find('.help-block').remove();
                        if ($(this).find('input').val() == '' || $(this).find('select').val() == '') {
                            $(this).append(txt_error);
                        }
                    });
                    var check = $(this).closest('#id01').find('.help-block').length;
                    var form = $(this).closest('#id01').find('.form-add-staff').serialize();
                    var url = '<?php echo $this->base_url('admin/add_staff') ?>';
                    if ($(this).closest('#id01').find('input[name=type]').val() == 'update') {
                        url = '<?php echo $this->base_url('admin/update_staff') ?>';
                        $('.list-staff').hide();
                        $('.staff-detail').show();
                    }
                    if (check == 0) {
                        $.ajax({
                            url: url,
                            method: 'post',
                            data:form,
                            async:false,
                            dataType: 'json',
                            success:function(data){
                                if (data[0] == 'success') {
                                    swal({
                                        title: 'บันทึกสำเร็จ',
                                        type: 'success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }else {
                                    swal({
                                        title: 'มีบางอย่างผิดพลาด',
                                        type: 'error',
                                        timer: 1500
                                    });
                                }
                                list_staff();
                                if(data[1] != ''){
                                    let staff_user = data[1];
                                    staff_detail(staff_user);
                                }
                                $('#id01').hide();
                            }
                        });
                    }
                });

                $('.btn-form-add-staff').click(function(){
                    var modal = $('#id01');
                    modal.show();
                    modal.find(':input').val('');
                    modal.find('textarea').val('');
                    modal.find('header h2').html('เพิ่มพนักงาน');
                });


                $('.table-staff').on('click','.btn-staff-detail',function(){
                    let staff_user = $(this).attr('value');
                    // let date = {'start_date':$('input[name=start_date]').val(),'end_date':$('input[name=end_date]').val()};
                    staff_detail(staff_user);
                    staff_report(staff_user);
                });

                $('.filter').on('click','.filter-staff-detail',function(){
                    $(this).closest('.filter').find('.filter-group').show();
                    $(this).hide();
                    $('.list-staff').show();
                    $('.staff-detail').hide();
                });

                $('.filter').on('click','.filter-group button',function(){
                    $(this).closest('.filter-group').find('button').each(function(key,value){
                        $(this).removeClass('active');
                        $(this).addClass('white');
                    });
                    var value_cate = $(this).attr('value');
                    var value_search = $('#search').val().toLowerCase();

                    if ($(this).hasClass('active') == false) {
                        if ($(this).hasClass('all')) {
                            if ($('#search').val() != '') {
                                filter = $(".table-staff tbody tr").filter(function() {
                                    return $(this).text().toLowerCase().indexOf(value_search) > -1;
                                });
                                filter.closest('tbody').find('tr').each(function(key,value){
                                    $(this).hide();
                                });
                                filter.closest('tr').show();
                            }else {
                                $(".table-staff tbody tr.not-found").remove();
                                $(".table-staff tbody tr").show();
                                sort(value_cate);
                            }
                        }else {
                            if ($('#search').val() != '') {
                                filter = $(".table-staff tbody tr").filter(function() {
                                    return $(this).text().toLowerCase().indexOf(value_search) > -1 && $(this).find('td.staff-status').text().toLowerCase().indexOf(value_cate) > -1;
                                });
                                filter.closest('tbody').find('tr').each(function(key,value){
                                    $(this).hide();
                                });
                                filter.closest('tr').show();
                                sort(value_cate);
                            }else {
                                $(".table-staff tbody tr td.staff-status").filter(function() {
                                    $(this).closest('tr').toggle($(this).text().toLowerCase().indexOf(value_cate) > -1)
                                });
                                sort(value_cate);
                            }
                        }
                    }

                    $(this).addClass('active');

                });


                $("#search").on("keyup keypress", function() {
                   var value_search = $(this).val().toLowerCase();
                   if (value_search != '') {
                       if ($('.filter .active').hasClass('all') == false) {
                           var value_cate = $('.filter .active').attr('value');
                           filter = $(".table-staff tbody tr").filter(function() {
                               return $(this).text().toLowerCase().indexOf(value_search) > -1 && $(this).find('td.staff-status').text().toLowerCase().indexOf(value_cate) > -1;
                           });
                           filter.closest('tbody').find('tr').each(function(key,value){
                               $(this).hide();
                           });
                           filter.closest('tr').show();
                           sort(value_search);
                       }else {
                           $(".table-staff tbody tr").filter(function() {
                               $(this).closest('tr').toggle($(this).text().toLowerCase().indexOf(value_search) > -1)
                           });

                           sort(value_search);
                       }

                   }else{
                       if ($('.filter .active').hasClass('all') == false) {
                           var value_cate = $('.filter .active').attr('value');
                           $(".table-staff tbody tr td:last-child").filter(function() {
                               $(this).closest('tr').toggle($(this).text().toLowerCase().indexOf(value_cate) > -1)
                           });
                           sort(value_cate);
                       }else {
                           $(".table-staff tbody tr.not-found").remove();
                           $(".table-staff tbody tr").show();
                           sort(value_search);
                       }
                   }

               });



               function staff_detail(staff_user){
                   $.ajax({
                       url: '<?php echo $this->base_url('admin/staff_detail_ajax') ?>',
                       method: 'post',
                       data:{staff_user:staff_user},
                       dataType: 'json',
                       success: function(data){
                           // console.log(data);
                           $('.list-staff').hide();
                           $('.filter-group').hide();
                           $('.staff-detail').show();
                           $('.filter-staff-detail').show();
                           if (data[0] = 'success') {
                               let tag_staff = $('.staff-detail');
                               let staff = data[1];
                               tag_staff.find('.staff-user').html(staff.staff_user);
                               tag_staff.find('.staff-department').html(staff.staff_department);
                               tag_staff.find('.staff-name').html(staff.staff_name);
                               tag_staff.find('.staff-address').html(staff.staff_address);
                               if (staff.staff_status == 'ทำงานอยู่') {
                                   var staff_status = '<span class="text-green">'+staff.staff_status+'</span>';
                               }else {
                                   var staff_status = '<span class="text-red">'+staff.staff_status+'</span>';
                               }
                               tag_staff.find('.staff-status').html(staff_status);
                           }else if (data[0] = 'fail') {
                               swal({
                                   tilte: 'warning paramiter',
                                   type: 'error',
                               });
                           }else {
                               swal({
                                   tilte: 'warning database',
                                   type: 'error',
                               });
                           }
                       }
                   });
               }
               function list_staff(){
                   $.ajax({
                       url:'<?php echo $this->base_url('admin/list_checkin_ajax') ?>',
                       method: 'post',
                       data: {type:'all'},
                       dataType: 'json',
                       success: function(data){
                           if (data[0] != 'fail') {
                               var html = '';
                               $.each(data[1],function(key,value){
                                   html += '<tr class="default-tr">';
                                       html += '<td>'+(key+1)+'</td>';
                                       html += '<td class="staff-name">'+ value.staff_name +'</td>';
                                       html += '<td class="center staff-department">'+ value.staff_department +'</td>';
                                       html += '<td class="center staff-status">';
                                       let staff_status = value.staff_status;
                                       let text_color = '';
                                       if (staff_status.indexOf('ทำงานอยู่') > -1) {
                                           text_color = 'text-green';
                                       }else {
                                           text_color = 'text-red';
                                       }
                                       html += '<span class="'+text_color+'">'+staff_status+'</span>';
                                       html += '</td>';
                                       html += '<td class="center"><a href="javascript:void(0)" class="button orange round text-white btn-staff-detail" value="'+value.staff_user+'"><i class="fa fa-search"></i> รายละเอียด</a></td>';
                                   html += '</tr>';
                               });

                           }else {
                               html += '<td class="center" colspan="5">ไม่มีข้อมูลพนักงาน</td>';
                           }
                           $('.table-staff tbody').html(html);
                           $('.table-staff').addClass('hoverable');
                       }
                   });
               }
               function list_department(){
                   $.ajax({
                       url:'<?php echo $this->base_url('admin/list_department') ?>',
                       dataType: 'json',
                       success: function(data){
                           if (data[0] != 'fail') {
                               var html = '<option value="">กรุณาเลือกตำแหน่งงาน</option>';
                               $.each(data[1],function(key,value){
                                   html += '<option value="'+value.dep_id+'">'+value.dep_name+'</option>';
                               });
                               $('#id01 .chosen_select').html(html);
                           }
                       }
                   });
               }

               function sort(value='') {
                   let num = $('.table-staff tbody tr[class!=not-found]:visible').length;
                   $(".table-staff tbody tr.not-found").remove();
                   if (num >= 1) {
                       $('.table-staff tbody tr:visible').each(function(key,value){
                           $(this).removeClass('tr');
                           $(this).removeClass('default-tr');
                           $(this).find('td:first-child').html(key+1);
                           if ((key+1)%2 == 0) {
                               $(this).addClass('tr');
                           }
                       });
                   }else {
                       let html = '<tr class="not-found"><td class="center" colspan="5">ไม่พบคำที่ตรงกับ "'+value+'" </td></tr>';
                       $('.table-staff tbody').append(html);
                   }
               }


            });
        </script>
    </body>
</html>
