<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>

    <?php $this->view('partail/main_css') ?>
    <style media="screen">
        .help-block {
            width: 207px;
            background-color: #f44336;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 10px;
            position: absolute;
            z-index: 1;
            bottom: 77%;
            left: 75%;
            margin-left: -60px;
            font-size: 12px;
        }

         .help-block::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #f44336  transparent transparent transparent;
        }
    </style>
</head>

<body id="page-top">

    <?php $this->view('partail/nav-left') ?>


    <div class="main-panel">
        <!-- Sidebar -->
        <?php $this->view('partail/nav-top') ?>

        <div class="content">
            <div class="row employee-detail">
                <div class="col-md-3">
                    <div class="card card-user">
                        <div class="card-body">
                            <div class="col-12 text-center">
                                <a href="#">
                                    <img class="avatar border-gray emp-image" src="<?php echo $this->public_url('file/images/employee/pexels-photo-925786.jpeg') ?>" alt="...">
                                    <h5 class="title emp-name"></h5>
                                </a>
                            </div>
                            <div class="button-container">
                                <div class="row mb-3">
                                    <div class="col-12 ml-auto mr-auto mb-1 emp-department"></div>
                                    <div class="col-6 ml-auto emp-user border-right"></div>
                                    <div class="col-6 mr-auto emp-status"></div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-warning btn-form-edit-peofile"><i class="fa fa-edit"></i> Edit Profile</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-user">
                        <div class="card-header text-center">
                            <h5 class="card-title">Report</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row d-flex justify-content-center select-date">
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <input type="date" class="form-control" name="start_date" value="<?php echo date("Y-m-d", strtotime("-1 Month")) ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <input type="date" class="form-control" name="end_date" value="<?php echo date("Y-m-d") ?>">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="content pl-2 pr-2 report-conclude">
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-12 ">
                                        <div class="card-header p-0">
                                            <div class="card">
                                                <div class="card-footer">
                                                    <div class="row mb-1 rounded">
                                                        <div class="col-6 border-right text-primary">Log in </div>
                                                        <div class="col-6 text-right"><span class="text-primary log-in"></span> &nbsp;&nbsp;&nbsp;&nbsp;times</div>
                                                    </div>
                                                    <hr>
                                                    <div class="row mb-1 rounded">
                                                        <div class="col-6 border-right">Posted</div>
                                                        <div class="col-6 text-right "><span class="text-primary posted"></span> &nbsp;&nbsp;&nbsp;&nbsp;times</div>
                                                    </div>
                                                    <hr>
                                                    <div class="row mb-1 rounded">
                                                        <div class="col-6 border-right">Tagged</div>
                                                        <div class="col-6 text-right "><span class="text-primary referenced"></span> &nbsp;&nbsp;&nbsp;&nbsp;times</div>
                                                    </div>
                                                    <hr>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-4 col-sm-12 data">
                                        <div class="card-header p-0">
                                            <div class="card">
                                                <div class="card-footer">
                                                    <div class="row mb-1 rounded">
                                                        <div class="col-6 border-right">Submission </div>
                                                        <div class="col-6 text-right "><span class="text-primary submission"></span> &nbsp;&nbsp;&nbsp;&nbsp;times</div>
                                                    </div>
                                                    <hr>
                                                    <div class="row mb-1 rounded">
                                                        <div class="col-6 border-right text-success">On Time </div>
                                                        <div class="col-6 text-right"><span class="text-success on-time"></span> &nbsp;&nbsp;&nbsp;&nbsp;times</div>
                                                    </div>
                                                    <hr>
                                                    <div class="row mb-1 rounded">
                                                        <div class="col-6 border-right text-danger">Late </div>
                                                        <div class="col-6 text-right"><span class="text-warning late"></span> &nbsp;&nbsp;&nbsp;&nbsp;times</div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center ">
                                        <button type="button" class="btn btn-warning btn-report-detail"><i class="nc-icon nc-bullet-list-67"></i>&nbsp;&nbsp; SHOW DETAIL</button>
                                    </div>
                                    <!-- <div class="card col-12 list-detail-report border-top" style="display:none"> -->

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-3"></div> -->
                <div class="col-md-12 list-detail-report float-right" style="display:none"></div>
            </div>
        </div>
                <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-user">
                        <div class="card-body">
                            <form class="form-add-employee">
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="text" class="form-control emp-status" disabled="" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" class="form-control emp-department" disabled="" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Employee ID</label>
                                            <input type="text" class="form-control emp-user" disabled="" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-validate">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" class="form-control emp-first-Name" placeholder="First Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-validate">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" class="form-control emp-last-name" placeholder="Last Name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="btn btn-success text-white btn-select-image" for="image_record"><i class="nc-icon nc-simple-add"></i> Image</label>
                                            <input type="file" id="image_record" class="emp-image" accept="image/*" name="user_file" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Picture</label>
                                        <div class="preview_file_record emp-image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center mb-2 mt-2">
                                    <h6>Reset Password</h6>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="new_password " class="form-control new-password" placeholder="" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="confirm_password " class="form-control confirm-password" placeholder="">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning btn-edit-profile">Edit</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>



    <?php $this->view('partail/main_js') ?>
    <script type="text/javascript">
        $(document).ready(function(){
            employee_detail('<?php echo $_SESSION['emp']->emp_id ?>');

            report_employee();

            $('.select-date').on('change','input',function(){
                var date = {'start_date':$('input[name=start_date]').val(),'end_date':$('input[name=end_date]').val()};
                report_employee(date)
            });
            function report_employee(data=[]){
                if (data.length <= 0 ) {
                    var date = {'start_date':$('input[name=start_date]').val(),'end_date':$('input[name=end_date]').val()};
                }else {
                    var date = data;
                }
                $.ajax({
                    url: '<?php echo $this->base_url('employee/employee_report') ?>',
                    method: 'post',
                    data:{start_date:date['start_date'],end_date:date['end_date']},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        // if (data[1] != 'fail') {
                            let conclude = data[0];
                            $('.report-conclude').find('.log-in').html(conclude.login);
                            $('.report-conclude').find('.posted').html(conclude.posted);
                            $('.report-conclude').find('.referenced').html(conclude.referenced);
                            $('.report-conclude').find('.submission').html(conclude.submission);
                            $('.report-conclude').find('.on-time').html(conclude.ontime);
                            $('.report-conclude').find('.late').html(conclude.late);

                            var html = '';
                            if (data[3].length > 0) {
                                html += '<div class="card col-12">';
                                html += '<div class="card-header row">';
                                html += '<div class="col-md-12">';
                                html += '<h4 class="card-title text-center bg-primary rounded text-white p-1">Schedule Work</h4>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="card-footer">';
                                html += '<div class="table-responsive" style="overflow:hidden">';
                                html += '<table class="table">';
                                html += '<thead>';
                                html += '<tr>';
                                html += '<th class="text-center">No.</th>';
                                html += '<th class="text-center">Date</th>';
                                html += '<th class="text-center">Status</th>';
                                html += '<th></th>';
                                html += '</tr>';
                                html += '</thead>';
                                html += '<tbody>';
                                $.each(data[3],function(key,value){
                                    if (value.refer == '' || value.owner == '<?php echo $_SESSION['emp']->emp_id ?>' || value.refer.indexOf('<?php echo $_SESSION['emp']->emp_id ?>') > -1) {
                                        html += '<tr class="btn-detail-submit" value="'+value.id+'">';
                                        html += '<td class="text-center">'+(key+1)+'</td>';
                                        html += '<td class="text-center">'+value.date_format+'</td>';
                                        if (value.owner == '<?php echo $_SESSION['emp']->emp_id ?>') {
                                            html += '<td class="text-success text-center">Owner</td>';
                                        }else if(value.refer.indexOf('<?php echo $_SESSION['emp']->emp_id ?>') > -1 || value.refer == ''){
                                            html += '<td class="text-warning text-center">Tagged</td>';
                                        }
                                        html += '<td class="text-center"><a href="<?php echo $this->base_url('employee/schedule_detail/') ?>'+value.id+'" class="btn btn-primary btn-go-to">Go to</a></td>';
                                        html += '</tr>';
                                    }
                                });
                                html += '</tbody>';
                                html += '</table>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                            }
                            if (data[1].length > 0) {
                                html += '<div class="card col-12">';
                                html += '<div class="card-header row">';
                                html += '<div class="col-md-12">';
                                html += '<h4 class="card-title text-center bg-danger rounded text-white p-1">Submission</h4>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="card-footer">';
                                html += '<div class="table-responsive" style="overflow:hidden">';
                                html += '<table class="table">';
                                html += '<thead>';
                                html += '<tr>';
                                html += '<th class="text-center">No.</th>';
                                html += '<th class="text-center">Date</th>';
                                html += '<th class="text-center">Period Time</th>';
                                html += '<th></th>';
                                html += '</tr>';
                                html += '</thead>';
                                html += '<tbody>';
                                $.each(data[1],function(key,value){
                                    html += '<tr class="btn-detail-submit" value="'+value.id+'">';
                                    html += '<td class="text-center">'+(key+1)+'</td>';
                                    html += '<td class="text-center">'+value.date_format+'</td>';
                                    if (value.time == 'On time') {
                                        html += '<td class="text-success text-center">'+value.time+'</td>';
                                    }else {
                                        html += '<td class="text-danger text-center">'+value.time+'</td>';
                                    }
                                    html += '<td class="text-center"><a href="<?php echo $this->base_url('employee/schedule_detail/') ?>'+value.schedule_id+'" class="btn btn-primary btn-go-to">Go to</a></td>';
                                    html += '</tr>';
                                });
                                html += '</tbody>';
                                html += '</table>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                            }
                            if (data[2].length > 0) {
                                html += '<div class="card col-12" >';
                                html += '<div class="card-header row">';
                                html += '<div class="col-md-12">';
                                html += '<h4 class="card-title text-center bg-primary rounded text-white p-1">Log In</h4>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="card-footer">';
                                html += '<div class="table-responsive" style="overflow:hidden">';
                                html += '<table class="table">';
                                html += '<thead>';
                                html += '<tr>';
                                html += '<th class="text-center">No.</th>';
                                html += '<th class="text-center">Date</th>';
                                html += '</tr>';
                                html += '</thead>';
                                html += '<tbody>';
                                $.each(data[2],function(key,value){
                                    html += '<tr>';
                                    html += '<td class="text-center">'+(key+1)+'</td>';
                                    html += '<td class="text-center">'+value.date_format+'</td>';
                                    html += '</tr>';
                                });
                                html += '</tbody>';
                                html += '</table>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                            }
                            // console.log(html);
                        $('.list-detail-report').html(html);
                        // $('body').html(html);
                    }
                });
            }


            $('.report').on('click','.card-footer .row',function(){

            });
            $('.btn-report-detail').click(function(key,value){
                $('.list-detail-report').toggle();
            });
            $('.btn-edit-profile').click(function(){
                var txt_error = '<span class="col help-block left-align"><li>Please fill in the information</li></span>';
                $(this).closest('.modal').find('.form-validate').each(function(key,value){
                    $(this).find('.help-block').remove();
                        if ($(this).find('input').val() == '') {
                            $(this).append(txt_error);
                        }
                });
                var data = new FormData();

                let new_pass = $(this).closest('.modal').find('.new-password');
                let con_pass = $(this).closest('.modal').find('.confirm-password');
                $(this).closest('.modal').find('.help-block').remove();
                if (new_pass.val() != '') {
                    if (con_pass.val() == '') {
                        con_pass.closest('.form-group').append(txt_error)
                        // $(this).append(txt_error);
                    }else if(new_pass.val() != con_pass.val()){
                        var txt_error = "<span class='col help-block left-align' style='width: 283px;left: 48%;bottom: 69%;'><li>Those passwords didn't match. Try again.</li></span>";
                        con_pass.closest('.form-group').append(txt_error);

                    }else if(new_pass.val() == con_pass.val()){
                        data.append('password',new_pass.val());
                    }
                }

                var check = $(this).closest('.modal').find('.help-block').length;
                var filedata = $(this).closest('.modal').find('input[type=file]');
                $.each(filedata[0].files, function(i, file) {
                    data.append('userfile', file);
                });
                data.append('name',$(this).closest('.modal').find('input[name=first_name]').val()+' '+$(this).closest('.modal').find('input[name=last_name]').val());
                if (check < 1) {
                    $.ajax({
                        url: '<?php echo $this->base_url('employee/edit_profile') ?>',
                        method: 'post',
                        data:data,
                        dataType: 'json',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data){
                            // console.log(data);
                            if (data == 'success') {
                                swal({
                                    title: 'Edit Succees',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $('.modal').modal('hide');
                                employee_detail('<?php echo $_SESSION['emp']->emp_id ?>');
                            }else {
                                swal({
                                    title: 'Something Wrong',
                                    type: 'error',
                                    timer: 1500
                                });
                            }
                        }
                    });
                }
            });
            $('.btn-form-edit-peofile').click(function(){
                $('#modal').modal('show');
            });

            $('.preview_file_record').on('click','.cancel-img', function(){
                $("#image_record").val('');
                $('.preview_file_record').html('');
                $('.btn-select-image').show();
            });

            $("#image_record").change(function(){
                readURL(this);
                $('.btn-select-image').hide();
            });

            function readURL(input) {
                var img = '<img class="preview_img" src="" alt="" width="100"/>';
                var link = '<a class="file" href=""></a>';
                var cancel = '<a class="btn btn-danger cancel-img close text-white" style="position: absolute;top: 20%;"><i class="fa fa-close"></i></a>';
                var image = img+' '+ cancel;
                var file = input.files;
                if((file[0].size / 1024) > 3072){
                    swal({
                        title: 'File size is too large.',
                        text: 'Please upload files up to 3 MB in size.',
                        type: 'warning',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        $("#image_record").val('');
                        $('.preview_file_record').html('');
                        $('.btn-select-image').show();
                    });
                }else {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        if (input.files[0].type.indexOf('image') > -1) {

                            reader.onload = function(e) {
                                $('.preview_file_record').html(image);
                                $('.preview_img').attr('src', e.target.result);
                            }
                        }else{
                            // $('.preview_file').html(link);
                            // $('.file').html(input.files[0].name);
                        }
                        reader.readAsDataURL(input.files[0]);

                    }
                }
            }


            function employee_detail(emp_id){
                $.ajax({
                    url: '<?php echo $this->base_url('employee/employee_detail_ajax') ?>',
                    method: 'post',
                    data:{emp_id:emp_id},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        $('.btn-return').show();
                        if (data[0] = 'success') {
                            let tag_employee = $('.employee-detail');
                            let modal = $('#modal');
                            let emp = data[1];
                            if (emp.emp_img != ''){
                                tag_employee.find('.emp-image').attr('src',emp.emp_img);
                            }
                            tag_employee.find('.emp-user').html(emp.emp_user);
                            tag_employee.find('.emp-department').html(emp.emp_department+'<hr>');
                            tag_employee.find('.emp-name').html(emp.emp_name);
                            modal.find('.emp-user').val(emp.emp_user);
                            modal.find('.emp-department').val(emp.emp_department);
                            modal.find('.emp-status').val(emp.emp_status.toUpperCase());

                            if (emp.emp_image != '') {
                                var cancel = '<a class="btn btn-danger cancel-img close text-white" style="position: absolute;top: 20%;"><i class="fa fa-close"></i></a>';
                                let image = '<img src="'+emp.emp_img+'" width="100">'
                                modal.find('.emp-image').html(image+cancel);
                                modal.find('.btn-select-image').hide();
                            }else {
                                modal.find('.btn-select-image').show();
                            }



                            let name = emp.emp_name.split(' ');
                            modal.find('.emp-first-Name').val(name[0]);
                            modal.find('.emp-last-name').val(name[1]);
                            if (emp.emp_status == 'enable'){
                                var emp_status = '<span class="text-success">'+emp.emp_status.toUpperCase()+'</span>';
                                modal.find('.emp-status').addClass('text-success');
                            }else{
                                var emp_status = '<span class="text-danger">'+emp.emp_status.toUpperCase()+'</span>';
                                modal.find('.emp-status').addClass('text-danger');
                            }
                            tag_employee.find('.emp-status').html(emp_status);
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

            // $('.report').on('mouseenter','.card-footer .row',function(){
            //     $(this).addClass('bg-secondary text-white');
            // });
            // $('.report').on('mouseleave','.card-footer .row',function(){
            //     $(this).removeClass('bg-secondary text-white');
            // });
        });
    </script>

</body>

</html>
