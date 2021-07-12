<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>จัดการค่าแรง</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
            .help-block {
                bottom: 58%;
            }
            .holiday{
                width: 20%;
            }
            .my-panel{
                position: relative;
            }
            .my-panel .my-panel-head .button{
                padding: 0px;
            }
            .my-panel-body{
                display:none;
            }
            div[class*=deduct-]{
                display: none;
            }
            @media (min-width:601px){
                .holiday{
                    width: 14.28571428571429%;
                }
            }
            @media (min-width:993px){
                .holiday{
                    width: 14.28571428571429%;
                }
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
                <span class="button hide-large xxlarge hover-text-grey open_nav"><i class="fa fa-bars"></i></span>
                <div class="container">
                    <h1><b>จัดการค่าแรง</b></h1>
                    <div class="section bottombar padding-16">
                        <!-- <span class="margin-right">Filter:</span>
                        <button class="button black">ALL</button>
                        <button class="button white"><i class="fa fa-diamond margin-right"></i>Design</button>
                        <button class="button white hide-small"><i class="fa fa-photo margin-right"></i>Photos</button>
                        <button class="button white hide-small"><i class="fa fa-map-pin margin-right"></i>Art</button> -->
                    </div>
                </div>
            </header>

            <div class="container padding-small round">
                <form class="form-setting">
                    <div class="col l5 m3 s12 container data-setting margin-bottom">
                        <div class="card white row padding round">
                            <input type="hidden" name="type" value="update">
                            <div class="col s12 my-panel wage" name="wage">
                                <div class="my-panel-head center">
                                    <div class="button col s6 center padding round active" target="daily">ค่าแรงรายวัน <i class="fa fa-caret-down"></i></div>
                                    <div class="button col s6 center padding round" target="hourly">ค่าแรงรายชั่วโมง <i class="fa fa-caret-down"></i></div>
                                </div>
                                <div class="my-panel-body daily row" style="display:block">
                                    <div class="col s12 form-control">
                                        <label><b>ค่าแรง / วัน</b></label>
                                        <input class="input border round" type="number" placeholder="" name="daily_wage" value="">
                                    </div>
                                    <div class="col l12 m12 s12 padding-small form-control">
                                        <label><b>เวลาเข้างาน</b></label>
                                        <input class="input border round" type="time" placeholder="" name="start_time" value="08:30">
                                    </div>
                                    <div class="col l12 m12 s12 padding-small form-control">
                                        <label><b>เวลากำหนดที่จะหักเงิน</b></label>
                                        <input class="input border round" type="time" placeholder="" name="late_time" value="">
                                    </div>
                                    <div class="col l12 m12 s12 padding-small form-control">
                                        <label><b>เลิกงาน</b></label>
                                        <input class="input border round" type="time" placeholder="" name="end_time" value="">
                                    </div>

                                    <div class="col s12 deduct margin-top">
                                        <input id="manule" type="checkbox" class="check manule col s1" name="" value="" >
                                        <label for="manule" class="col l8 m8 s9 left-align margin-right text-red">กำหนดระยะเวลาหักเงิน</label>
                                        <div class="deduct-default row" style="display:block">
                                            <div class="col l12 m12 s12 padding-small form-control">
                                                <label><b>หักเงินมาสาย นาทีละ / บาท</b></label>
                                                <input class="input border round" type="number" placeholder="" name="deduct_default" value="">
                                            </div>
                                        </div>
                                        <div class="deduct-manule row">
                                            <div class="col s12 ">
                                                <div class="col s6 form-control" style="padding-right:10px">
                                                    <label><b>ชั่วโมง</b></label>
                                                    <input class="input border round" type="number" placeholder="" min="0" max="12" name="hour_deduct" value="">
                                                </div>
                                                <div class="col s6 form-control">
                                                    <label><b>นาที</b></label>
                                                    <input class="input border round" type="number" placeholder="" min="1" max="59" name="minute_deduct" value="">
                                                </div>
                                                <div class="col s12 center form-control">
                                                    <label><b>จำนวนเงินที่จะหัก</b></label>
                                                    <input class="input border round" type="number" placeholder="" min="1" name="deduct_manule" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-panel-body hourly row">
                                    <div class="form-control">
                                        <label><b>ค่าแรง / ชั่วโมง</b></label>
                                        <input id="test" class="input border round" type="number" placeholder="" name="hourly_wage" value="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col l7 m9 s12 container">
                        <div class="card white row padding round">
                            <div class="col s12 center">
                                <h1>วันหยุด</h1>
                            </div>
                            <div class="col s12 data-holiday">
                                <div class="col holiday padding-small center">
                                    <label><b>จันทร์</b></label><br>
                                    <input class="check border round " type="checkbox" name="holiday[]" value="จันทร์">
                                </div>
                                <div class="col holiday padding-small center">
                                    <label><b>อังคาร</b></label><br>
                                    <input class="check border round " type="checkbox" name="holiday[]" value="อังคาร">
                                </div>
                                <div class="col holiday padding-small center">
                                    <label><b>พุธ</b></label><br>
                                    <input class="check border round " type="checkbox" name="holiday[]" value="พุธ">
                                </div>
                                <div class="col holiday padding-small center">
                                    <label><b>พฤหัส</b></label><br>
                                    <input class="check border round " type="checkbox" name="holiday[]" value="พฤหัส">
                                </div>
                                <div class="col holiday padding-small center">
                                    <label><b>ศุกร์</b></label><br>
                                    <input class="check border round " type="checkbox" name="holiday[]" value="ศุกร์">
                                </div>
                                <div class="col holiday padding-small center">
                                    <label><b>เสาร์</b></label><br>
                                    <input class="check border round " type="checkbox" name="holiday[]" value="เสาร์">
                                </div>
                                <div class="col holiday padding-small center">
                                    <label><b>อาทิตย์</b></label><br>
                                    <input class="check border round " type="checkbox" name="holiday[]" value="อาทิตย์">
                                </div>
                            </div>
                            <div class="col s12 padding-24 center">
                                <a class="button card round green margin-right btn-save large" href="javascript:void(0)"><i class="fa fa-save"></i> บันทึก</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


            <!-- End page content -->
        </div>
        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){

                data_setting();

                $('.deduct').on('click','input[type=checkbox]',function(){
                    $(this).closest('.deduct').find(':input').val('');
                    if ($(this).prop('checked') == true) {
                        $(this).closest('.deduct').find('.deduct-manule').show()
                        $(this).closest('.deduct').find('.deduct-default').hide()
                    }else {
                        $(this).closest('.deduct').find('.deduct-manule').hide()
                        $(this).closest('.deduct').find('.deduct-default').show()
                    }
                });

                $('.btn-save').click(function(){
                    var txt_error = '<span class="col help-block left-align"><li>กรุณากรอกข้อมูล</li></span>';
                    $(this).closest('.form-setting').find('.data-setting input').each(function(key,value){
                        $(this).closest('.form-control').find('.help-block').remove();
                        if ($(this).is(':visible')) {
                            if ($(this).val() == '') {
                                if($(this).attr('name') == 'hour_deduct' ){
                                    console.log($(this));
                                    if($(this).closest('.form-control').find('input[name=minute_deduct]').val() == ''){
                                        $(this).closest('.form-control').append(txt_error);
                                    }
                                }else{
                                    $(this).closest('.form-control').append(txt_error);
                                }

                            }
                        }
                    });
                    var check = $(this).closest('.form-setting').find('.help-block').length;


                    if (check == 0) {
                        let form = $(this).closest('.form-setting').serialize();
                        $.ajax({
                            url: '<?php echo $this->base_url('admin/setting') ?>',
                            method: 'post',
                            data: form,
                            dataType: 'json',
                            success:function(data){
                                // console.log(data);
                                if (data == 'success') {
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
                                data_setting();
                            }
                        });
                    }
                });
                $('.my-panel[name=wage]').on('click','.my-panel-head .button',function(){
                    let target = $(this).attr('target');
                    if($(this).hasClass('active') == false){
                        $(this).closest('.my-panel-head').find('.active').removeClass('active');
                        $(this).addClass('active');
                        $(this).closest('.my-panel').find(':input').val('');
                        if ($(this).closest('.my-panel').find('.my-panel-body.'+target).is(':visible')) {
                            $(this).closest('.my-panel').find('.my-panel-body.'+target).hide();
                        }else {
                            $(this).closest('.my-panel').find('.my-panel-body').hide();
                            $(this).closest('.my-panel').find('.my-panel-body.'+target).show();
                        }
                    }
                });




                function data_setting() {
                    $.ajax({
                        url: '<?php echo $this->base_url('admin/setting') ?>',
                        method: 'post',
                        data:{type:'list'},
                        dataType: 'json',
                        success: function(data){
                            // console.log(data);
                            if (data[0] == 'success') {
                                let dat = data[1];
                                let holiday = dat.set_holiday.split(',');
                                let wage = dat.set_wage;
                                if (wage.indexOf('d') > -1) {
                                    wage = wage.split('/');
                                    $('input[name=daily_wage]').val(wage[0]);
                                }else {
                                    wage = wage.split('/');
                                    $('.my-panel.wage .my-panel-head .button').each(function(key,value){
                                        if ($(this).attr('target') == 'hourly') {
                                            $(this).addClass('active');
                                        }else {
                                            $(this).removeClass('active');
                                        }
                                    });
                                    $('.my-panel .my-panel-body.hourly').show();
                                    $('.my-panel .my-panel-body.daily').hide();
                                    $('input[name=hourly_wage]').val(wage[0]);
                                }

                                $('input[name=start_time]').val(dat.set_start_time);
                                $('input[name=late_time]').val(dat.set_late_time);
                                $('input[name=end_time]').val(dat.set_end_time);
                                $('input[name=end_time]').val(dat.set_end_time);
                                let deduct = dat.set_deduct;
                                if(deduct.indexOf('/') > -1){
                                    $('.deduct .deduct-default').hide();
                                    $('.deduct .deduct-manule').show();
                                    $('.deduct input[type=checkbox]').prop('checked',true);
                                    let split_deduct = deduct.split('/');
                                    if (split_deduct[0].indexOf('.') > -1) {
                                        let split_time = split_deduct[0].split('.') ;
                                        $('.my-panel input[name=hour_deduct]').val(split_time[0]);
                                        $('.my-panel input[name=minute_deduct]').val(split_time[1]);
                                        $('.my-panel input[name=deduct_manule]').val(split_deduct[1]);
                                    }else {
                                        $('.my-panel input[name=minute_deduct]').val(split_deduct[0]);
                                        $('.my-panel input[name=deduct_manule]').val(split_deduct[1]);
                                    }
                                }else {
                                    $('input[name=deduct_default]').val(deduct);
                                }

                                $.each(holiday,function(key,value){
                                    $('.data-holiday .holiday').each(function(key_sub,value_sub){
                                        if ($(this).find('label b').html() == value) {
                                            $(this).find('input').prop('checked',true);
                                        }
                                    });
                                });

                            }
                        }
                    });
                }
            });
        </script>
    </body>
</html>
