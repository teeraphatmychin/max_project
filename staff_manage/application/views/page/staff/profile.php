<!DOCTYPE html>
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
        <?php $this->view('partail/nav_staff') ?>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="overlay hide-large animate-opacity open_nav" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="main" style="margin-left:300px">

            <!-- Header -->
            <header id="portfolio">
                <span class="button hide-large xxlarge hover-text-grey open_nav" onclick="w3_open()"><i class="fa fa-bars"></i></span>
                <div class="container">
                    <h1><b>ข้อมูลส่วนตัว</b></h1>
                    <div class="section bottombar padding-16 filter row">

                    </div>
                </div>
            </header>

            <div class="container padding-bottom">
                <div class="staff-detail row">
                    <div class="col l3 m12 s12 container data-staff margin-bottom">
                        <div class="card white row padding round margin-bottom">
                            <table class="table ">
                                <tr class="border-bottom">
                                    <th>รหัสพนักงาน</th>
                                    <td class="staff-user"><?php echo $_SESSION['staff'][0]->staff_user ?></td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>ตำแหน่ง</th>
                                    <td class="staff-department"><?php echo $_SESSION['staff'][0]->staff_department ?></td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>ชื่อ</th>
                                    <td class="staff-name"><?php echo $_SESSION['staff'][0]->staff_name ?></td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>ที่อยู่</th>
                                    <td class="staff-address"><?php echo $_SESSION['staff'][0]->staff_address ?></td>
                                </tr>
                                <tr>
                                    <th>สถานะ</th>
                                    <td class="staff-status">
                                        <?php if ($_SESSION['staff'][0]->staff_status == 'ทำงานอยู่'): ?>
                                            <span class="text-green"><?php echo $_SESSION['staff'][0]->staff_status ?></span>
                                        <?php else: ?>
                                            <span class="text-red"><?php echo $_SESSION['staff'][0]->staff_status ?></span>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col s12 padding center">
                            <!-- <div class="col s12 margin-bottom">
                                <a class="button card round orange text-white btn-edit-staff"><i class="fa fa-edit"></i> แก้ไขข้อมูล</a>
                            </div> -->
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
                                            <div class="col s8">ค่าลวงเวลา</div>
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
                                <button type="button" class="button round card btn-deduct orange text-white">ตรวจสอบการหักเงิน <i class="fa fa-caret-down"></i></button>
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




            <!-- End page content -->
        </div>
        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">

            $(document).ready(function(){

                staff_report('<?php echo $_SESSION['staff'][0]->staff_user ?>');


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
                    let url = "<?php echo $this->base_url('staff/print_slip/')?>"+staff_user;
                    window.location.href = url;
                });


                function staff_report(staff_user,data=[]){
                    if (data.length <= 0 ) {
                        var date = {'start_date':$('input[name=start_date]').val(),'end_date':$('input[name=end_date]').val()};
                    }else {
                        var date = data;
                    }
                    $.ajax({
                       url: '<?php echo $this->base_url('staff/report_staff') ?>',
                       method: 'post',
                       data:{staff_user:staff_user,date:date},
                       dataType: 'json',
                       success:function(data){
                           // console.log(data);
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
                                    let num_daily = 1;
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
                                                     html += '<td class="center" style="width:20%">ลำดับ</td>';
                                                     html += '<td class="center">วันเวลาทำงาน</td>';
                                                     html += '<td class="center">ค่าแรง</td>';
                                                     html += '</tr>';
                                                     work_in_time = '1';
                                                 }

                                                 html += '<tr>';
                                                 html += '<td class="center">'+num_daily+'</td>';
                                                 html += '<td>'+value_in_time.work_date_in_time+'</td>';
                                                 html += '<td>'+value_in_time.wage+'</td>';
                                                 // html += '<td>'+value_in_time.ot_money+'</td>';
                                                 html += '</tr>';
                                                 num_daily++;
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
                                }else{
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





            });
        </script>
    </body>
</html>
