<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>test chosen</title>
    </head>
    <link href="<?php echo $this->public_url('libs/material/') ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <link href="<?php echo $this->public_url('libs/chosen/css/component-chosen.min.css') ?>" rel="stylesheet" />
    <style media="screen">
        body{
            height: 1000px;
        }
        .max-wrap-chosen{
            width: 100%;
        }
        .max-chosen-container{
            display: inline-block;
            position: relative;
            width: 100%!important;
            font-size: 1rem;
            text-align: left;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .max-chosen-container .max-chosen-single{
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            border-bottom-right-radius: .25rem;
            border-bottom-left-radius: .25rem;
            color: #6c757d;
            display: block;
            height: calc(1.5em + .75rem);
            overflow: hidden;
            line-height: calc(1.5em + .75rem);
            padding: 0 0 0 .75rem;
            position: relative;
            text-decoration: none;
            white-space: nomax-wrap;
            z-index: 10;
        }
        .max-wrap-chosen-drop{
            position: relative;
            z-index: 100;
        }
        .max-chosen-drop{
            /* display: none; */
            position: absolute;
            top: 0px;
            margin-top: -1px;
        }
        .max-wrap-chosen .max-chosen-drop{
            width: 100%;
            margin-top: -1px;
            border-bottom-right-radius: .25rem;
            border-bottom-left-radius: .25rem;
            background-clip: padding-box;
            background-color: #fff;
            left: 0px;
            right: 0px;
        }
        .max-chosen-drop .max-chosen-result{
            overflow-x: hidden;
            overflow-y: auto;
        }
        .max-chosen-container-single .max-chosen-single div {
            display: block;
            position: absolute;
            top: 0;
            right: 0;
            width: 2rem;
            height: 100%;
            padding-left: .5rem;
            background-color: #fff;
        }
        .max-chosen-container-single .max-chosen-single div:after {
            display: inline-block;
            position: relative;
            top: .125rem;
            left: -1rem;
            width: 2rem;
            height: 2rem;
            content: "";
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23adb5bd' d='M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z'/%3E%3C/svg%3E");
            background-size: 2rem 2rem;
            background-position: center center;
            background-repeat: no-repeat;
            background-color: #fff;
            box-shadow: 4px 0 16px 16px #fff;
        }
        .max-chosen-with-drop .max-chosen-container-single .max-chosen-single div:after {
            display: inline-block;
            position: relative;
            top: .125rem;
            left: -1rem;
            width: 2rem;
            height: 2rem;
            content: "";
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23adb5bd' d='M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z'/%3E%3C/svg%3E") !important;
            background-size: 2rem 2rem;
            background-position: center center;
            background-repeat: no-repeat;
            background-color: #fff;
            box-shadow: 4px 0 16px 16px #fff;
        }
        .max-wrap-chosen .max-chosen-search {
            margin: 0;
            padding: .5rem .5rem 0 .5rem;
            position: relative;
            white-space: nomax-wrap;
            z-index: 1000;
        }
        .max-wrap-chosen .max-chosen-search input[type=text] {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            outline: 0;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            border-bottom-right-radius: .25rem;
            border-bottom-left-radius: .25rem;
            padding: .25rem 1rem .25rem .5rem;
            width: 100%;
            z-index: 11;
        }
        .max-wrap-chosen .max-chosen-results {
            margin: 0;
            position: relative;
            max-height: 15rem;
            padding: .5rem 0 0 0;
            color: #6c757d;
            overflow-x: hidden;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }
        .max-wrap-chosen .max-chosen-results li.result-selected {
            color: #495057;
        }
        .max-wrap-chosen .max-chosen-results li.active-result {
            cursor: pointer;
            display: list-item;
        }
        .max-wrap-chosen .max-chosen-results li {
            display: none;
            line-height: 1.5;
            list-style: none;
            margin: 0;
            padding: .25rem .25rem .25rem 1.5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .max-wrap-chosen-drop .max-chosen-results li.active-result:hover{
            background-color: #007bff;
            background-image: none;
            color: #fff;
        }
        .max-wrap-chosen .max-chosen-drop .max-chosen-search:after{
            display: inline-block;
            position: relative;
            top: -1.635rem;
            /* left: 20.6rem; */
            left: calc(100% - 2rem);
            width: 1.25rem;
            height: 1.25rem;
            content: "";
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23adb5bd' d='M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z'/%3E%3C/svg%3E");
            background-size: 1.25rem 1.25rem;
            background-position: center center;
            background-repeat: no-repeat;
        }
        #max-chosen-results::-webkit-scrollbar-track{}

        #max-chosen-results::-webkit-scrollbar
        {
            width: 6px;
        }
        #max-chosen-results::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            background-color: #cccccc;
        }
        .max-chosen-results li.result-selected:before {
            display: inline-block;
            position: relative;
            top: .3rem;
            width: 1.25rem;
            height: 1.25rem;
            margin-left: -1.25rem;
            content: "";
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23495057' d='M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z'/%3E%3C/svg%3E");
            background-size: 1.25rem 1.25rem;
            background-position: center center;
            background-repeat: no-repeat;
        }
        .max-wrap-chosen .max-chosen-results li.result-selected {
            color: #495057;
        }
        .max-wrap-chosen .max-chosen-container .max-chosen-single span{
            display: block;
            margin-right: 1.5rem;
            text-overflow: ellipsis
        }
        .test{
            height: 200px;
            width:200px;
            background-color: red;
        }
    </style>
    <body>
        <select class="form-control test-off">
            <option value="1">111111</option>
            <option value="2">22222</option>
            <option value="3">33333</option>
            <option value="4">44444</option>
        </select>


        <!-- <div class="test"></div> -->
        <select class="form-control form-control-chosen list-customer" name="q_customer_id" >
            <option value="">เลือกลูกค้า..</option>
            <option value="1">โรงพยาบาลสมเด็จพระยุพราชด่านซ้าย</option>
            <option value="2">บริษัท สมุทรเวชกิจ จำกัด (โรงพยาบาลเมืองสมุทรปากน้ำ)</option>
            <option value="3">โรงพยาบาลโพธิ์ประทับช้าง</option>
            <option value="4">บริษัท หนองบัวเวชการ จำกัด</option>
            <option value="5">คลินิกพิเศษผู้ป่วยใน นม.8 (โรงพยาบาลจุฬาลงกรณ์)</option>
            <option value="6">บริษัท นัดพบบางใหญ่ จำกัด (สำนักงานใหญ่)</option>
            <option value="7">โรงพยาบาลสมเด็จพระสังฆราชญาณสังวรเพื่อผู้สูงอายุ จังหวัดชลบุรี</option>
            <option value="8">JJ-PUN (S) Pte Ltd.</option>
            <option value="9">โรงพยาบาลพุนพิน</option>
            <option value="10">บริษัท กรุงเทพดุสิตเวชการ จำกัด (มหาชน)</option>
            <option value="11">คณะแพทยศาสตร์ มหาวิทยาลัยมหาสารคาม</option>
            <option value="12">โรงพยาบาลไทรโยค</option>
            <option value="13">โรงพยาบาลท่ากระดาน (สาขาที่ 18)</option>
            <option value="14">บริษัท โรงพยาบาลกรุงเทพสนามจันทร์ จำกัด (โรงพยาบาลเมืองเพชร)</option>
            <option value="15">โรงพยาบาลศรีบรรพต</option>
            <option value="16">บริษัท สตาร์ ปิโตรเลียม รีไฟน์นิ่ง จำกัด (มหาชน)</option>
            <option value="17">บริษัท เอ็ชเอ็มซี โปลีเมอส์ จำกัด</option>
            <option value="18">ห้างหุ้นส่วนจำกัด ส.อรัญออยล์ แอนด์ ออโตพาร์ท</option>
            <option value="19">โรงพยาบาลอาภากรเกียรติวงศ์</option>
            <option value="20">บริษัท ไทยเครื่องสนาม (2525) จำกัด</option>
            <option value="21">โรงพยาบาลกรุงธน  1</option>
            <option value="22">บริษัท เทเบิล สปูน จำกัด (สำนักงานใหญ่)</option>
            <option value="23">มูลนิธิตึกสงฆ์ โรงพยาบาลอ่างทอง</option>
            <option value="24">บริษัท ร่วมกำชัย จำกัด</option>
            <option value="25">ห้างหุ้นส่วนจำกัด เอ็ม.เอ.มัลติมีเดีย</option>
            <option value="26">หลวงปู่บุญฤทธิ์  บัณฑิโต</option>
            <option value="27">บริษัท เทพรัตน์ เฮ้าส์ซิ่ง จำกัด</option>
            <option value="28">บริษัท ศิริโกมล โฮลดิ้ง จำกัด</option>
            <option value="29">บริษัท อิงฟ้าร่วมพัฒนา จำกัด</option>
            <option value="30">บริษัท เกียรติสิทธุ สเตชั่นเนอรี่ จำกัด (สำนักงานใหญ่)</option>
            <option value="31">บริษัท ยูสมาร์ทคอร์ปอเรชั่น จำกัด</option>
            <option value="32">โรงพยาบาลกรุงธน 3</option>
            <option value="33">โรงพยาบาลเฉลิมพระเกียรติ สมเด็จพระเทพรัตนราชสุดาฯ สยามบรมราชกุมารี ระยอง</option>
            <option value="34">โรงพยาบาลกงไกรลาศ</option>
            <option value="35">บริษัท เคพีไฟว์ จำกัด</option>
            <option value="36">โรงแรม โกลเด้น ซิตี้ ระยอง</option>
            <option value="37">บริษัท เอเซีย อินดัสเตรียลแก๊ส จำกัด</option>
            <option value="38">บริษัท เอซีซี เมดิคอล โซลูชั่น จำกัด</option>
            <option value="39">โรงพยาบาลเทศบาลนครนครศรีธรรมราช</option>
            <option value="40">บริษัท โซเด็กซ์โซ่ เฮ็ลธแคร์ ซัพพอร์ท เซอร์วิส (ประเทศไทย) จำกัด</option>
            <option value="41">บริษัท อินจันทร์ เซอร์วิส แอนด์ ซัพพลาย จำกัด</option>
            <option value="42">โรงพยาบาลโนนแดง</option>
            <option value="43">โรงพยาบาลกรุงเทพคริสเตียน</option>
            <option value="44">ห้างหุ้นส่วนจำกัด เจ.เอส.แอล.อินเตอร์เทรด</option>
            <option value="45">ห้างหุ้นส่วนจำกัด เอ็กซ์ไทร์ บาย โกศล</option>
            <option value="46">บริษัท อี ฟอร์ แอล เอม จำกัด  (มหาชน)</option>
            <option value="1731">โรงพยาบาลค่ายอดิศร</option>
            <option value="1732">คุณอรุณวรรณ จั่นแก้ว</option>
            <option value="1733">เปิดบิลในนามบุคคลธรรม</option>
            <option value="1746">ทดสอบเพิ่มลูกค้าใหม่</option>
            <option value="1750">test</option>
            <option value="1751">โรงพยาบาลสมเด็จพระยุพราชด่านซ้าย แผนก ICU</option>
            <option value="1752">โรงพยาบาลสมเด็จพระยุพราชด่านซ้าย สาขา 2</option>
        </select>
        <select class="form-control" name="test">
            <option value="1">111111</option>
            <option value="2">22222</option>
            <option value="3">33333</option>
            <option value="4">44444</option>
        </select>
        <div class="wrap-test">
            <select class="max-chosen-select" name=""></select>
        </div>

        <script src="<?php echo $this->public_url('js/jquery-3.3.1.js') ?>"></script>
        <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/jquery.min.js"></script>
        <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/popper.min.js"></script>
        <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/bootstrap-material-design.min.js"></script>
        <!-- <script src="<?php echo $this->public_url('libs/chosen/js/chosen.jquery.min.js') ?>"></script> -->
        <!-- <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/bootstrap-material-design.min.js"></script> -->
        <script type="text/javascript">
        // $('select[name=q_customer_id]').chosen();
        // $('select[name=test]').chosen();
            // max_chosen($('select[name=test]'));
            $('select[name=q_customer_id]').val(46);
            max_chosen($('select[name=q_customer_id]'),'','get_value_select');
            // max_chosen($('select[name=q_customer_id]'),'update');
$('select[name=test]').change(function(){
    alert($(this).val())
});
$('select[name=test]').val(3).change();
            // // max chosen paramiter max_chosen(tag,status,component)
            function max_chosen(tag,status='',log=''){
                if (status != '') {
                    switch (status) {
                        case 'update':
                            let list_option = '';
                            let first_option = '';
                            tag.find('option').each(function(key,value){
                                if (key == 0) {
                                    if (tag.val() != '') {
                                        first_option = tag.find('option:selected').html();
                                        list_option += '<li class="active-result result-selected" data-option-array-index="'+key+'">'+tag.find('option:selected').html()+'</li>'
                                    }else {
                                        first_option = $(this).html();
                                        list_option += '<li class="active-result result-selected" data-option-array-index="'+key+'">'+$(this).html()+'</li>'
                                    }
                                    first_option = $(this).html();
                                    list_option += '<li class="active-result result-selected" data-option-array-index="'+key+'">'+$(this).html()+'</li>'
                                }else {
                                    list_option += '<li class="active-result" data-option-array-index="'+key+'">'+$(this).html()+'</li>'
                                }
                            });
                            let wrap_chosen = tag.next();
                            wrap_chosen.find('.max-chosen-container .max-chosen-single span').html(first_option);
                            wrap_chosen.find('.max-wrap-chosen-drop .max-chosen-drop ul.max-chosen-results').html(list_option);
                            break;
                        default:

                    }
                }else {
                    tag.hide();
                    let html = '<div class="max-wrap-chosen">';
                    html += '<div class="max-chosen-container max-chosen-container-single" title="" style="width: 0px;">';
                    html += '<a class="max-chosen-single"><span></span><div><b></b></div></a>';
                    html += '</div>';
                    html += '<div class="max-wrap-chosen-drop">';
                    html += '<div class="max-chosen-drop" style="display:none">';
                    html += '<div class="max-chosen-search">';
                    html += '<input class="max-chosen-search-input" type="text" id="maxmax">';
                    html += '</div>';
                    html += '<ul class="max-chosen-results" id="max-chosen-results"></ul>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    let list_option = '';
                    let first_option = '';
                    tag.find('option').each(function(key,value){
                        if (key == 0) {
                            if (tag.val() != '') {
                                first_option = tag.find('option:selected').html();
                                list_option += '<li class="active-result result-selected" data-option-array-index="'+key+'">'+tag.find('option:selected').html()+'</li>'
                            }else {
                                first_option = $(this).html();
                                list_option += '<li class="active-result result-selected" data-option-array-index="'+key+'">'+$(this).html()+'</li>'
                            }
                        }else {
                            list_option += '<li class="active-result" data-option-array-index="'+key+'">'+$(this).html()+'</li>'
                        }
                    });
                    tag.after(html);
                    let wrap_chosen = tag.next();
                    wrap_chosen.find('.max-chosen-container .max-chosen-single span').html(first_option);
                    wrap_chosen.find('.max-wrap-chosen-drop .max-chosen-drop ul.max-chosen-results').html(list_option);
                    $(document).click(function(){
                        $('.max-wrap-chosen').removeClass('max-chosen-with-drop');
                        $('.max-chosen-drop').hide();
                    });
                    wrap_chosen.on('click','.max-chosen-container a.max-chosen-single',function(e){
                        e.stopPropagation();
                        $(this).closest(document).find('.max-wrap-chosen').removeClass('max-chosen-active');
                        $(this).closest('.max-wrap-chosen').addClass('max-chosen-active');
                        let this_chosen = $(this);
                        this_chosen.closest('.max-wrap-chosen').find('.max-wrap-chosen-drop .max-chosen-search-input').val('');
                        wrap_chosen.find('.max-wrap-chosen-drop ul.max-chosen-results li').show();
                        // this_chosen.closest('.max-wrap-chosen').find('.max-wrap-chosen-drop #maxmax').focus();
                        // document.getElementById("maxmax").focus();
                        $(this).closest(document).find('.max-wrap-chosen').each(function(key,value){
                            if ($(this).hasClass('max-chosen-active') != true) {
                                if($(this).find('.max-chosen-drop').is(':visible')){
                                    $(this).find('.max-chosen-drop').hide();
                                    $(this).closest('.max-wrap-chosen').removeClass('max-chosen-with-drop');
                                }
                            }
                        });
                        if (this_chosen.closest('.max-wrap-chosen').find('.max-chosen-drop').is(':visible')) { //close chosen
                            this_chosen.closest('.max-wrap-chosen').removeClass('max-chosen-with-drop');
                            this_chosen.closest('.max-wrap-chosen').find('.max-chosen-drop').hide();
                        }else { //open chosen
                            this_chosen.closest('.max-wrap-chosen').find('.max-chosen-drop').show();
                            this_chosen.closest('.max-wrap-chosen').addClass('max-chosen-with-drop');
                            this_chosen.closest('.max-wrap-chosen').find('.max-wrap-chosen-drop .max-chosen-search-input').focus();
                        }
                    });
                    wrap_chosen.find('.max-wrap-chosen-drop .max-chosen-drop ul.max-chosen-results').on('click','li.active-result',function(e){ //choose value chosen
                        e.stopPropagation();
                        let value = $(this).html();
                        let index_li = $(this).attr('data-option-array-index');
                        $(this).closest('.max-chosen-results').find('li').each(function(key,value){
                            $(this).removeClass('result-selected');
                        });
                        $(this).addClass('result-selected');
                        $(this).closest('.max-wrap-chosen').find('.max-chosen-container .max-chosen-single span').html(value);
                        $(this).closest('.max-wrap-chosen').removeClass('max-chosen-with-drop');
                        // tag.selectedIndex = "3";
                        tag.prop('selectedIndex',index_li).change();
                        $(this).closest('.max-wrap-chosen').find('.max-chosen-drop').hide();
                        if (log == 'get_value_select') {
                            console.log(tag.val());
                        }
                    });
                    wrap_chosen.on('click','.max-chosen-drop',function(e){ //search chosen
                        e.stopPropagation();
                    });
                    wrap_chosen.on('keyup','.max-chosen-drop .max-chosen-search input.max-chosen-search-input',function(e){ //search chosen
                        e.stopPropagation();
                        $(this).closest('.max-wrap-chosen').find('.max-wrap-chosen-drop ul.max-chosen-results li.no-results').remove();
                        let search = $(this).val();
                        let count_search = 0;
                        $(this).closest('.max-wrap-chosen').find('.max-wrap-chosen-drop ul.max-chosen-results li').each(function(key,value){
                            let value_search = $(this).html();
                            if ($(this).hasClass('no-results') == false) {
                                if (value_search.indexOf(search) > -1) {
                                    $(this).show();
                                    count_search++;
                                }else {
                                    $(this).hide();
                                }
                            }
                        });
                        if (count_search < 1) {
                            let html = '<li class="no-results text-danger" style="display:block">ไม่พบตามคำค้น <span>"'+search+'"</span></li>';
                            $(this).closest('.max-wrap-chosen').find('.max-wrap-chosen-drop ul.max-chosen-results').append(html);
                        }
                    });
                }
            }

        </script>
    </body>
</html>
