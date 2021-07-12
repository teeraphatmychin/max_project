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
            .modal{
                padding-top: 15%;
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
                    <h1><b>เช็คอินพนักงาน</b></h1>
                    <div class="section bottombar padding-16 row filter">
                        <span class="margin-right">Filter:</span>
                        <button class="button round active all">ทั้งหมด</button>
                        <button value="เช็ค" class="button round white">ยังไม่ได้เช็ค</button>
                        <button value="ยกเลิก" class="button round white">เช็คแล้ว</button>
                    </div>
                </div>
            </header>

            <div class="container padding-bottom">
                <div class="col s3 padding">
                    <label for="search">ค้นหา</label>
                    <input type="text" class="input border round" id="search" name="" value="">
                </div>
                <table class="table border white table-staff" border="1">
                    <thead>
                        <tr class="blue">
                            <th class="center">ลำดับ</th>
                            <th class="center">รหัสพนักงาน</th>
                            <th class="center">ชื่อ-สกุล</th>
                            <th class="center">ตำแหน่ง</th>
                            <th class="center">ค่าล่วงเวลา</th>
                            <th class="center">เช็คอิน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6" class="center">
                                <img src="<?php echo $this->public_url('file/load/loading.gif') ?>" alt="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="id01" class="modal" style="z-index:5;">
                <div class="modal-content card-4 animate-zoom padding round row" style="max-width:450px">
                    <header class="container white col s12 border-bottom margin-bottom" style="padding:0.01em 0 0.01em 16px">
                        <div class="display-container">
                            <span  class="button xxlarge display-topright" style="font-size:2em!important" onclick="$(this).closest('.modal').hide()">&times;</span>
                        </div>
                        <h2>ค่าลวงเวลา</h2>
                    </header>

                    <div class="col s12 padding container row">
                        <div class="hide staff-user"></div>
                        <div class="hide staff-ot"></div>
                        <div class="col s12 center ot"></div>
                        <div class="col s12 form-control">
                            <input type="number" name="ot" class="input border round col s6" value="" style="margin:auto;float:unset">
                        </div>
                    </div>

                    <div class="container border-top padding col s12 center">
                        <button class="button green round border btn-add-ot"><i class="fa fa-plus"></i> เพิ่ม</button>
                        <button class="button red round border" onclick="document.getElementById('id01').style.display='none'"><i class="fa fa-close"></i> ยกเลิก</button>
                    </div>
                </div>
            </div>


            <div id="id02" class="modal modal-leave" style="z-index:5;">
                <div class="modal-content card-4 animate-zoom padding round row" style="max-width:450px">
                    <header class="container white col s12 border-bottom margin-bottom" style="padding:0.01em 0 0.01em 16px">
                        <div class="display-container">
                            <span  class="button xxlarge display-topright" style="font-size:2em!important" onclick="$(this).closest('.modal').hide()">&times;</span>
                        </div>
                        <h2>ลางาน</h2>
                    </header>

                    <div class="col s12 padding container row">
                        <form class="form-leave">
                            <div class="form-control">
                                <label for="">รหัสพนักงาน</label>
                                <input id="staff_user" type="text" name="staff_user"class="input border round" value="">
                            </div>
                            <div class="form-control">
                                <label for="">วันที่</label>
                                <input id="start_date" type="datetime" name="start_date"class="input border round" value="">
                            </div>
                            <div class="form-control">
                                <label for="">วันที่สิ้นสุด</label>
                                <input id="end_date" type="date" name="end_date"class="input border round" value="">
                            </div>
                        </form>
                    </div>
                    <div class="container border-top padding col s12 center">
                        <button class="button green round border btn-save-leave"><i class="fa fa-save"></i> บันทึก</button>
                        <button class="button red round border" onclick="document.getElementById('id02').style.display='none'"><i class="fa fa-close"></i> ยกเลิก</button>
                    </div>
                </div>
            </div>


            <!-- End page content -->
        </div>
        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">

            $(document).ready(function(){

                list_staff();


                $('.table-staff').on('click','.btn-work-success',function(){
                    let staff_user = $(this).closest('tr').find('.staff-user').html();
                    let staff_name = $(this).closest('tr').find('.staff-name').html();
                    let staff_department = $(this).closest('tr').find('.staff-department').html();
                    let type = 'work_success';
                    swal({
                        title: 'ต้องการทำการบันการทำงานของ',
                        html: staff_name + ' <b>ตำแหน่ง</b> ' + staff_department,
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'ยกเลิก',
                        confirmButtonText: 'ยืนยัน'
                    }).then((result) => {
                        $.ajax({
                            url: '<?php echo $this->base_url('admin/update_check_in') ?>',
                            method: 'post',
                            data:{type:type,staff_user:staff_user},
                            dataType: 'json',
                            success:function(data){
                                // console.log(data);
                                if (data == 'success') {
                                    swal({
                                        title:'บันทึกสำเร็จ',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        type: 'success'
                                    });
                                    if($('.filter button.all').hasClass('active')){
                                       list_staff();
                                    }else{
                                       list_staff('check');
                                    }
                               }else {
                                   swal({
                                      title: 'มีบางอย่างผิดพลาด',
                                      type: 'error',
                                      timer: 1500
                                  });
                               }
                            }

                        });
                    });
                });

                $('.table-staff').on('click','.btn-ot',function(){
                    let staff_user = $(this).closest('tr').find('.staff-user').html();
                    show_ot(staff_user);
                });

                $('#id01').on('click','.ot .btn-cancel-ot',function(){
                    let index = $(this).closest('p').index();
                    let staff_user = $('#id01').find('.staff-user').html();
                    $(this).closest('p').hide();
                    let ot = get_ot(staff_user);

                    $.ajax({
                        url: '<?php echo $this->base_url('admin/update_ot') ?>',
                        method: 'post',
                        data: {staff_user:staff_user,index_ot:index,ot:ot},
                        success:function(data){
                            list_staff();
                            show_ot(staff_user);
                        }
                    });
                });

                function get_ot(staff_user){
                    var ot;
                    $.ajax({
                        url: '<?php echo $this->base_url('admin/list_ot') ?>',
                        method: 'post',
                        data:{staff_user:staff_user,type:'data'},
                        dataType: 'json',
                        async: false,
                        success: function(data){
                            ot = data[1];
                        }
                    });
                    return ot;
                }

                $('#id01').on('click','.btn-add-ot',function(){
                    txt_error = '<span class="col help-block left-align"><li>กรุณากรอกข้อมูล</li></span>';
                    let modal = $(this).closest('.modal');
                    let value = $(this).closest('.modal').find('input').val();
                    let staff_user = modal.find('.staff-user').html();
                    if (value == ''){
                        modal.find('input').closest('.form-control').append(txt_error);
                    }else{
                        $.ajax({
                            url: '<?php echo $this->base_url('admin/add_ot') ?>',
                            method: 'post',
                            data:{staff_user:staff_user,ot:value},
                            dataType: 'json',
                            success: function(data){
                                list_staff();
                                if (data == 'success') {
                                    swal({
                                        title:'เพิ่มสำเร็จ',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        type: 'success'
                                    });
                                    modal.hide();
                                }else {
                                    swal({
                                        title:'มีบางอย่างผิดพลาด',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        type: 'error'
                                    });
                                }
                            }

                        });
                    }
                });

                function show_ot(staff_user){
                    $.ajax({
                        url: '<?php echo $this->base_url('admin/list_ot') ?>',
                        method: 'post',
                        data:{staff_user:staff_user},
                        dataType: 'json',
                        success: function(data){
                            // console.log(data);
                            let modal = $('#id01');
                                let html = '';
                                if (data[0] == 'success') {
                                    $.each(data[1],function(key,value){
                                        html += '<p>'+value+' <i class="fa fa-close margin-left btn-cancel-ot"></i></p>';
                                    });
                                }
                                modal.show();
                                modal.find('.staff-user').html(staff_user);
                                modal.find('.help-block').remove();
                                modal.find('input').val('');
                                modal.find('.ot').html(html);

                        }
                    });

                }



                $('.table-staff').on('mouseenter mouseleave','.btn-ot',function(){$(this).find('i').toggleClass('show hide');});

                $('.table-staff').on('click','.btn-cancel-check',function(){
                    let staff_name = $(this).closest('tr').find('.staff-name').html();
                    let staff_department = $(this).closest('tr').find('.staff-department').html();
                    let staff_user = $(this).closest('tr').find('.staff-user').html();
                    let type = 'cancel_check_in';
                    swal({
                        title: 'ต้องการยกเลิกการเข้างานของ',
                        html: staff_name + ' <b>ตำแหน่ง</b> ' + staff_department,
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'ยกเลิก',
                        confirmButtonText: 'ยืนยัน'
                    }).then((result) => {
                        $.ajax({
                            url: '<?php echo $this->base_url('admin/update_check_in') ?>',
                            method: 'post',
                            data:{type:type,staff_user:staff_user},
                            dataType: 'json',
                            success:function(data){
                                // console.log(data);
                                if (data == 'success') {
                                    swal({
                                        title:'ยกเลิกการเข้างานสำเร็จ',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        type: 'success'
                                    });
                                    if($('.filter button.all').hasClass('active')){
                                       list_staff();
                                    }else{
                                       list_staff('check');
                                    }
                               }else {
                                   swal({
                                      title: 'มีบางอย่างผิดพลาด',
                                      type: 'error',
                                      timer: 1500
                                  });
                               }
                            }

                        });
                    });
                });

                $('.table-staff').on('click','.btn-check',function(){
                    let staff_name = $(this).closest('tr').find('.staff-name').html();
                    let staff_department = $(this).closest('tr').find('.staff-department').html();
                    let staff_user = $(this).closest('tr').find('.staff-user').html();
                    let type = 'check_in';

                    $.ajax({
                        url: '<?php echo $this->base_url('admin/update_check_in') ?>',
                        method: 'post',
                        data:{type:type,staff_user:staff_user},
                        dataType: 'json',
                        success:function(data){
                            // console.log(data);
                            if (data == 'success') {
                                swal({
                                   title: 'เช็คชื่อเข้างานของ',
                                   html: staff_name + ' <b>ตำแหน่ง</b> ' + staff_department,
                                   type: 'success',
                                   showConfirmButton: false,
                                   timer: 1500
                               });
                               list_staff('check');
                               $('.filter button').each(function(key,value){
                                   if($(this).hasClass('active')){
                                        $(this).removeClass('active');
                                        $(this).addClass('white')
                                   }
                                   if($(this).attr('value') == 'ยกเลิก'){
                                       $(this).addClass('active');
                                   }
                               });
                           }else{
                               swal({
                                  title: 'มีบางอย่างผิดพลาด',
                                  type: 'error',
                                  timer: 1500
                              });
                          }
                        }

                    })

                });



                $('.filter').on('click','button',function(){
                    $(this).closest('.filter').find('button').each(function(key,value){
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
                                    return $(this).text().toLowerCase().indexOf(value_search) > -1 && $(this).find('td:last-child').text().toLowerCase().indexOf(value_cate) > -1;
                                });
                                filter.closest('tbody').find('tr').each(function(key,value){
                                    $(this).hide();
                                });
                                filter.closest('tr').show();
                                sort(value_cate);
                            }else {
                                $(".table-staff tbody tr td:last-child").filter(function() {
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
                               return $(this).text().toLowerCase().indexOf(value_search) > -1 && $(this).find('td:last-child').text().toLowerCase().indexOf(value_cate) > -1;
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



               function list_staff(type=''){
                   $.ajax({
                       url:'<?php echo $this->base_url('admin/list_checkin_ajax') ?>',
                       dataType: 'json',
                       success: function(data){
                           if (data[0] != 'fail') {
                               console.log(data);
                               var html = '';
                               var cate = '';
                               var html_cate = '';
                               $.each(data[1],function(key,value){
                                   html += '<tr class="default-tr">';
                                       html += '<td>'+(key+1)+'</td>';
                                       html += '<td class="staff-user">'+ value.staff_user +'</td>';
                                       html += '<td class="staff-name">'+ value.staff_name +'</td>';
                                       html += '<td class="center staff-department">'+ value.staff_department +'</td>';

                                       let staff_check = value.staff_check;

                                       if (value.staff_check != 0){
                                           html += '<td class="center btn-ot display-container">+'+value.ot+'';
                                           html += '<i class="fa fa-plus display-topright hide "></i>';
                                           html += '</td>';
                                           html += '<td class="center row" style="width:20%">';
                                           html += '<span class="col s12" style="margin-bottom:2px;">'+value.work_date+'</span>';
                                           html += '<button type="button" class="button round red btn-cancel-check">ยกเลิก</button>';
                                           let work_wage = value.work_wage;
                                           if (work_wage.indexOf('h') > -1) {
                                               html += '<button type="button" class="button round orange text-white margin-left btn-work-success">เลิกงาน</button>';
                                           }
                                           html += '';
                                           html += '</td>';
                                       }else {
                                           html += '<td class="center">+0</td>';
                                           html += '<td class="center"><button type="button" class="button round green btn-check">เช็ค</button></td>';
                                       }
                                   html += '</tr>';
                               });
                               $('.table-staff tbody').html(html);
                               $('.table-staff').addClass('hoverable');
                                if(type == 'check'){
                                    var value_cate = 'ยกเลิก';
                                    $(".table-staff tbody tr td:last-child").filter(function() {
                                            $(this).closest('tr').toggle($(this).text().toLowerCase().indexOf(value_cate) > -1)
                                    });
                                    sort(value_cate);
                                }
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
                       html = '<tr class="not-found"><td class="center" colspan="6">ไม่พบคำที่ตรงกับ "'+value+'" </td></tr>';
                       $('.table-staff tbody').append(html);
                   }
               }


            });
        </script>
    </body>
</html>
