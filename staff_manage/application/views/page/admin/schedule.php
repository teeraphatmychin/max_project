<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>ตารางงาน</title>
        <?php $this->view('partail/main_css') ?>
        <link rel="stylesheet" href="<?php echo $this->public_url('libs/calendar/fullcalendar-3.6.2/fullcalendar.min.css') ?>">
        <link rel="stylesheet" href="<?php echo $this->public_url('libs/chosen/docsupport/prism.css') ?>">
        <link rel="stylesheet" href="<?php echo $this->public_url('libs/chosen/chosen.css') ?>">
        <style media="screen">
            .fc td, .fc th{
                background-color: white;
            }
            .fc-toolbar.fc-header-toolbar .fc-left,.fc-toolbar.fc-header-toolbar .fc-right{
                float: unset;
                display: inline-block;
            }
            .fc-toolbar.fc-header-toolbar .fc-center{
                float: unset;
                display: inline-block;
            }
            .help-block {
                bottom: 58%;
            }
            @media (min-width:601px){
                .fc-toolbar.fc-header-toolbar .fc-left{
                    float:left;
                }
                .fc-toolbar.fc-header-toolbar .fc-right{
                    float:right;
                }
                .fc-toolbar.fc-header-toolbar .fc-left,.fc-toolbar.fc-header-toolbar .fc-right,.fc-toolbar.fc-header-toolbar .fc-center{
                    width: unset;
                }
                .help-block {
                    bottom: 64%;
                }
            }
            @media (min-width:993px){
                .fc-toolbar.fc-header-toolbar .fc-left,.fc-toolbar.fc-header-toolbar .fc-right,.fc-toolbar.fc-header-toolbar .fc-center{
                    width: unset;
                }
                .help-block {
                    bottom: 70%;
                }
            }

        </style>
    </head>
    <body class="light-grey">
        <?php $this->view('partail/nav_left') ?>

        <!-- !PAGE CONTENT! -->
        <div class="main" style="margin-left:300px">
            <header>
                <a href="#"><img src="<?php echo $this->public_url('file/images/employee/pexels-photo-925786.jpeg'); ?>" style="width:65px;" class="circle right margin hide-large hover-opacity"></a>
                <span class="button hide-large xxlarge hover-text-grey open_nav"><i class="fa fa-bars"></i></span>
                <div class="container">
                    <h1><b>ตารางงาน</b></h1>
                    <div class="section bottombar"></div>
                </div>
            </header>

                <div class="row container margin-bottom" id="calendar" style="padding-bottom:64px;"></div>


        </div>
        <div id="id01" class="modal" style="z-index:5;">
            <div class="modal-content card-4 animate-zoom padding round row">
                <header class="container white col s12 border-bottom margin-bottom" style="padding:0.01em 0 0.01em 16px">
                    <div class="display-container">
                        <span  class="button xxlarge display-topright" style="font-size:2em!important" onclick="$(this).closest('.modal').hide()">&times;</span>
                    </div>
                    <h2>สร้างงาน</h2>
                </header>

                <div class="col s12 padding container">
                    <form class="form-schedule">
                        <input type="hidden" name="type" value="">
                        <input type="hidden" name="id" value="">
                        <table>
                            <tr class="row">
                                <td class="col l2 m2 s2 hide-small">วันที่/เวลา</td>
                                <td class="col l2 m2 s12 hide-large hide-medium">วันที่</td>
                                <td class="col l3 m3 s12">
                                    <input type="date" class="input round border" name="start_date" value="">
                                </td>
                                <td class="col l2 m2 s12 hide-large hide-medium">เวลา</td>
                                <td class="col l2 m2 s12">
                                    <input type="time" class="input round border" name="time" value="">
                                </td>
                                <td class="col s1 padding-small hide-small"> &nbsp;น.</td>
                                <td class="col l2 m2 s6 padding-small btn-add-time">
                                    <a href="javascript:void(0)" class="link text-theme" for="add">เพิ่มเวลาสิ้นสุด</a>
                                    <a href="javascript:void(0)" class="link text-red" style="display:none" for="remove">ลบเวลาสิ้นสุด</a>
                                </td>
                                <td class="col l2 m2 s6 padding-small btn-add-time">
                                    <input id="holiday" type="checkbox" class="check col s3" name="holiday" value="1">
                                    <label for="holiday" class="col s6 text-red">วันหยุด</label>
                                </td>
                            </tr>
                            <tr class="row end-time" style="display:none">
                                <td class="col l2 m2 s2 hide-small">สิ้นสุด</td>
                                <td class="col l2 m2 s12 hide-large hide-medium">วันที่</td>
                                <td class="col l3 m3 s12">
                                    <input type="date" class="input round border" name="end_date" value="">
                                </td>
                                <td class="col l2 m2 s12 hide-large hide-medium">เวลา</td>
                                <td class="col l2 m2 s12">
                                    <input type="time" class="input round border" name="end_time" value="">
                                </td>
                                <td class="col s1 padding-small hide-small"> &nbsp;น.</td>
                            </tr>
                            <tr class="row">
                                <td class="col l2 m2 s12">หัวข้อ</td>
                                <td class="col l9 m9 s12">
                                    <input type="text" class="input round border" name="title" value="">
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col l2 m2 s12">รายละเอียด</td>
                                <td class="col l9 m9 s12">
                                    <textarea name="detail" class="input border round" rows="5" cols="100" style="resize:none"></textarea>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col l2 m2 s12">แท็ก</td>
                                <td class="col l9 m9 s12 chosen">
                                    <select data-placeholder="เลือกพนักงาน" class="chosen_select" multiple name="staff_name[]" style="width:100%"></select>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

                <div class="container border-top padding col s12 center">
                    <button class="button green round border btn-save-work"><i class="fa fa-save"></i> บันทึก</button>
                    <button class="button red round border" onclick="document.getElementById('id01').style.display='none'"><i class="fa fa-close"></i> ยกเลิก</button>
                </div>
            </div>
        </div>

</div>


        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript" src="<?php echo $this->public_url('libs/calendar/fullcalendar-3.6.2/lib/moment.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo $this->public_url('libs/calendar/fullcalendar-3.6.2/fullcalendar.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo $this->public_url('libs/calendar/fullcalendar-3.6.2/locale/th.js') ?>"></script>

        <!-- <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/docsupport/jquery-3.2.1.min.js') ?>"></script> -->
        <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/chosen.jquery.js') ?>"></script>
        <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/docsupport/prism.js') ?>"></script>
        <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/docsupport/init.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){


                calendar();


                function calendar(){
                    $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next today',  //  prevYear nextYea
                            center: 'title',
                            // right: 'month,agendaWeek,agendaDay',
                            right: 'month',
                        },
                        buttonIcons:{
                            prev: 'left-single-arrow',
                            next: 'right-single-arrow',
                            prevYear: 'left-double-arrow',
                            nextYear: 'right-double-arrow'
                        },
                        events: {
                            url: '<?php echo $this->base_url('admin/data_schedule') ?>',
                            error: function() {
                            }
                        },
                        eventLimit:true,
                        lang: 'th',
                        dayClick: function() {
                        },
                        eventClick: function(calEvent, jsEvent, view) {

                            // console.log(calEvent);
                            // console.log(view.start);  // วันที่เริ่มต้นในปฏิทิน ได้ค่าในรูปแบบ moment object แปลงเป็นวันที่ได้
                            // console.log(view.end);
                            // console.log('start',moment(calEvent.start).format('YYYY-MM-DD'));
                            var id = calEvent.id;
                            let start = moment(calEvent.start).format('YYYY-MM-DD');
                            let end = moment(calEvent.end).format('YYYY-MM-DD');
                            let title = calEvent.title;

                            $.ajax({
                                url: '<?php echo $this->base_url('admin/data_schedule') ?>',
                                method: 'post',
                                data:{id:id},
                                dataType: 'json',
                                success: function(data){
                                    let modal = $('#id01');
                                    let dat = data[0];
                                    let start_date = dat.start;
                                    if (start_date.indexOf('T') > -1) {
                                        start_date = start_date.split('T');
                                        modal.find('input[name=start_date]').val(start_date[0]);
                                        modal.find('input[name=time]').val(start_date[1]);
                                    }else {
                                        modal.find('input[name=start_date]').val(start_date);
                                    }
                                    if (dat.end == '') {
                                        let end_date = dat.end;
                                        modal.find('input[name=end_date]').val(end_date);
                                        if (end_date.indexOf('T') > -1) {
                                            end_date = start_date.split('T');
                                            modal.find('input[name=end_date]').val(end_date[0]);
                                            modal.find('input[name=end_time]').val(end_date[1]);
                                        }
                                    }

                                    modal.show();
                                    modal.find('header h2').html('แก้ไขงาน');
                                    modal.find('input[name=type]').val('1');
                                    modal.find('input[name=id]').val(id);
                                    modal.find('input[name=title]').val(dat.title);
                                    modal.find('textarea[name=detail]').val(dat.detail);
                                    modal.find('select').html('');
                                    if (dat.status != 0) {
                                        modal.find('input[name=holiday]').prop('checked',true);
                                    }else {
                                        modal.find('input[name=holiday]').prop('checked',false);
                                    }

                                    let refer_staff = dat.refer;
                                    refer_staff = refer_staff.split(',');
                                    $.ajax({
                                        url: '<?php echo $this->base_url('admin/list_staff_for_schedule') ?>',
                                        dataType: 'json',
                                        success: function(data){
                                            if (data[0] == 'success') {
                                                var html = '';
                                                var department = '';
                                                var check_close = '';
                                                var selected = '';

                                                $.each(data[1],function(key,value){
                                                    if (department != value.staff_department) {
                                                        html += '</optgroup>';
                                                        html += '<optgroup label="'+ value.staff_department +'">';
                                                            department = value.staff_department;
                                                    }
                                                        $.each(refer_staff,function(key_re,value_re){
                                                                if (value_re == value.staff_id) {
                                                                    selected = 'selected';
                                                                }
                                                        });

                                                        html += '<option value="'+value.staff_id+'" '+selected+'>'+ value.staff_name +'</option>';
                                                        selected = '';
                                                    //     staff_id = value.staff_id;
                                                    // }
                                                });
                                                $('.modal select.chosen_select').html(html.substring (11));
                                                $('.chosen_select').chosen();
                                                $('.chosen_select').trigger("chosen:updated");
                                                $('.chosen-container .chosen-choices').addClass('round');
                                                $('.chosen-container .chosen-choices').css({'padding':'5px'});

                                                $('.chosen-container').on('click','.group-result',function(){
                                                    var unselected = $(this).nextUntil('.group-result').not('.result-selected');
                                                    if(unselected.length) {
                                                        // Select all items in this group
                                                        unselected.trigger('mouseup');
                                                    } else {
                                                        $(this).nextUntil('.group-result').each(function() {
                                                            // Deselect all items in this group
                                                            $('a.search-choice-close[data-option-array-index="' + $(this).data('option-array-index') + '"]').trigger('click');
                                                        });
                                                    }

                                                });
                                            }
                                        }
                                    });






                                }
                            });


                        }
                    });


                }


                $('.modal').on('click','.btn-add-time a',function(){
                    let type = $(this).attr('for');
                    // alert(type);
                    if (type == 'add') {
                        $(this).hide();
                        $(this).closest('table').find('.end-time').show();
                        $(this).closest('.btn-add-time').find('a:last-child').show();
                    }else {
                        $(this).hide();
                        $(this).closest('table').find('.end-time').hide();
                        $(this).closest('.btn-add-time').find('a:first-child').show();
                    }
                });


                $('#calendar').on('mouseenter','.fc-day.fc-widget-content',function(){
                    let plus = '<i class="fa fa-plus" style="margin-left:3%"></i>';
                    $(this).append(plus);
                });
                $('#calendar').on('mouseleave','.fc-day.fc-widget-content',function(){
                    $(this).find('i').remove();
                });
                $('#calendar').on('click','.fc-day.fc-widget-content',function(){
                    let modal = $('#id01');
                    modal.show();
                    modal.find('header h2').html('สร้างงาน');
                    modal.find('input[name=start_date]').val($(this).attr('data-date'));
                    modal.find('input[name=time]').val('');
                    modal.find('input[name=end_date]').val('');
                    modal.find('input[name=end_time]').val('');
                    modal.find('input[name=title]').val('');
                    modal.find('textarea[name=detail]').val('');
                    modal.find('input[name=holiday]').prop('checked',false);
                    modal.find('select').html('');

                    $.ajax({
                        url: '<?php echo $this->base_url('admin/list_staff_for_schedule') ?>',
                        dataType: 'json',
                        success: function(data){
                            if (data[0] == 'success') {
                                var html = '';
                                var department = '';
                                var check_close = '';


                                $.each(data[1],function(key,value){
                                    if (department != value.staff_department) {
                                        html += '</optgroup>';
                                        html += '<optgroup label="'+ value.staff_department +'">';
                                            department = value.staff_department;
                                    }

                                    html += '<option value="'+value.staff_id+'">'+ value.staff_name +'</option>';

                                });
                                $('.modal select.chosen_select').html(html.substring (11));
                                $('.chosen_select').chosen();
                                $('.chosen_select').trigger("chosen:updated");
                                $('.chosen-container .chosen-choices').addClass('round');
                                $('.chosen-container .chosen-choices').css({'padding':'5px'});

                                $('.chosen-container').on('click','.group-result',function(){
                                    var unselected = $(this).nextUntil('.group-result').not('.result-selected');
                                    if(unselected.length) {
                                        // Select all items in this group
                                        unselected.trigger('mouseup');
                                    } else {
                                        $(this).nextUntil('.group-result').each(function() {
                                            // Deselect all items in this group
                                            $('a.search-choice-close[data-option-array-index="' + $(this).data('option-array-index') + '"]').trigger('click');
                                        });
                                    }

                                });
                            }
                        }
                    });


                });


                // $('#calendar').on('click','.fc-slats .fc-widget-content',function(){
                //     let day = $(this).closest('.fc-time-grid.fc-unselectable').find('.fc-bg .fc-day').attr('data-date');
                //     $('#id01').show();
                //     $('#id01').find('input[name=day]').val(day);
                //     $('#id01').find('input[name=time]').val($(this).closest('tr').attr('data-time'));
                //     $('.chosen_select').chosen();
                //     $('.chosen-container .chosen-choices').addClass('round');
                //     $('.chosen-container .chosen-choices').css({'padding':'5px'});
                // });

                $('.btn-save-work').click(function(){
                    let form = $(this).closest('.form-schedule');
                    if ($('#id01').find('input[name=title]').val() != '') {
                        $.ajax({
                            url: '<?php echo $this->base_url('admin/add_schedule_ajax') ?>',
                            method: 'post',
                            data:$(this).closest('.modal').find('.form-schedule').serialize(),
                            async: false,
                            dataType: 'json',
                            success:function(data){
                                // console.log(data);
                                if (data == 'success') {
                                    swal({
                                        title: 'สร้างงานเรียบร้อย ',
                                        type: 'success',
                                        timer: 1500
                                    });

                                }else {
                                    swal({
                                        title: 'ผิดพลาด ไม่สามารถสร้างงานได้',
                                        type: 'error'
                                    });
                                }
                                $('#id01').hide();
                                setTimeout(function(){window.location.href = "<?php echo $this->base_url('admin/schedule') ?>";},1000);

                            }
                        });
                    }else {
                        $('#id01').find('.help-block ').remove();
                        txt_error = '<span class="col help-block left-align"><li>กรุณากรอกข้อมูล</li></span>';
                        $('#id01').find('input[name=title]').closest('td').append(txt_error);
                    }

                });

            });
        </script>
    </body>
</html>
