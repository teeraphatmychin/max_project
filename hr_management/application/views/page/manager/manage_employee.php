<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage Employee</title>

    <?php $this->view('partail/main_css') ?>
    <style media="screen">
        @media (max-width:576px) {
            .d-sm-none { display:none !important; }
            .short { display:none !important; }
            .text-sm-center{text-align:center!important}
        }
        .help-block {
            width: 195px;
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

    <?php $this->view('partail/nav-left-manager') ?>


    <div class="main-panel">
        <!-- Sidebar -->
        <?php $this->view('partail/nav-top-manager') ?>

        <div class="content">
            <div class="row">
                <div class="col-12 mb-3">
                    <button type="button"class="btn float-left m-0 btn-danger btn-return" style="display:none"><i class="nc-icon nc-minimal-left"></i>&nbsp;back</button>
                    <button type="button"class="btn float-right m-0 btn-warning btn-form-add-department"><i class="nc-icon nc-simple-add"></i>&nbsp;Add Department</button>
                    <button type="button"class="btn float-right m-0 mr-2 btn-success btn-form-add-employee"><i class="nc-icon nc-simple-add"></i>&nbsp;Add Employee</button>
                </div>
                <div class="card col-12 list-employee">
                    <div class="card-header row">
                        <div class="col-md-8 col-sm-12">
                            <h4 class="card-title text-sm-center text-md-left">Employee</h4>
                        </div>
                        <div class="col-md-4 col-sm-12 pt-3 filter">
                            <form>
                                <div class="row">
                                    <div class="input-group no-border col-md-6">
                                        <select class="custom-select" name="employee_department" style="text-align: center;text-align-last: center;"></select>
                                    </div>
                                    <div class="input-group no-border col-md-6">
                                        <input type="text" id="search" name="search" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="nc-icon nc-zoom-split"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow:hidden">
                            <table class="table table-employee">
                                <thead class=" text-primary">
                                    <th class="d-sm-none d-md-block">No.</th>
                                    <th><span>emp</span><span class="short">loyee</span> <span>id</span></th>
                                    <th class="d-sm-none d-md-block">Name</th>
                                    <th>Department</th>
                                    <th>option</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 employee-detail" style="display:none">
                    <div class="row">
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
                                        <div class="row">
                                            <div class="col-12 ml-auto mr-auto mb-1 emp-department"></div>
                                            <div class="col-6 ml-auto emp-user border-right"></div>
                                            <div class="col-6 mr-auto emp-status"></div>
                                        </div>
                                    </div>
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
                        <div class="col-md-12 list-detail-report float-right" style="display:none"></div>
                    </div>
                <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <!-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> -->
    <div id="modal2" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-user">
                        <div class="card-body">
                            <form class="form-add-department">
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Full Department</label>
                                            <input type="text" name="full" class="form-control"  value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label>Initials Department</label>
                                            <input type="text" name="initials" class="form-control"  value="">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-add-department">Add</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-user">
                        <div class="card-body">
                            <form class="form-add-employee">
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row select">
                                    <div class="col-md-8">
                                        <div class="form-group ">
                                            <label>Department</label>
                                            <select class="custom-select" name="department"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="btn btn-success text-white btn-select-image" for="image_record"><i class="nc-icon nc-simple-add"></i> Image</label>
                                            <input type="file" id="image_record" accept="image/*" name="user_file" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="preview_file_record">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-add-employee">Add</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <?php $this->view('partail/main_js') ?>
    <script type="text/javascript">
        $(document).ready(function(){

            list_employee();
            list_department();

            // $('.list-employee').hide();
            // $('.employee-detail').show();
            report_employee();




            $('.btn-add-department').click(function(){
                var txt_error = '<span class="col help-block left-align"><li>Please fill in the information</li></span>';
                $(this).closest('.modal').find('.form-group').each(function(key,value){
                    $(this).find('.help-block').remove();
                    if ($(this).find('input').val() == '' || $(this).find('select').val() == '') {
                        $(this).append(txt_error);
                    }
                });
                var check = $(this).closest('.modal').find('.help-block').length;
                if (check < 1) {
                    $.ajax({
                        url: '<?php echo $this->base_url('manager/add_department') ?>',
                        method: 'post',
                        data:$(this).closest('.modal').find('.form-add-department').serialize(),
                        dataType: 'json',
                        success: function(data){
                            // console.log(data);
                            if (data == 'success') {
                                swal({
                                    title: 'Add Succees',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $('.modal').modal('hide');
                                setTimeout(function(){window.location.href = "<?php echo $this->base_url('manager/manage_employee') ?>"},1500);
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
            $('.btn-form-add-department').click(function(){
                $('#modal2').modal('show');
            });
            $('.btn-report-detail').click(function(){
                $('.list-detail-report').toggle();
            });
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
                    url: '<?php echo $this->base_url('manager/employee_report') ?>',
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
                                        html += '<td class="text-center"><a href="<?php echo $this->base_url('manager/schedule_detail/') ?>'+value.id+'" class="btn btn-primary btn-go-to">Go to</a></td>';
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
                                    html += '<td class="text-center"><a href="<?php echo $this->base_url('manager/schedule_detail/') ?>'+value.schedule_id+'" class="btn btn-primary btn-go-to">Go to</a></td>';
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




            $('.btn-return').click(function(){
                $(this).hide();
                $('.list-employee').show();
                $('.employee-detail').hide();
            });

            $('.table-employee').on('click','.btn-detail-employee',function(){
                let emp_id = $(this).attr('value');
                employee_detail(emp_id);
            });

            function employee_detail(emp_id){
                $.ajax({
                    url: '<?php echo $this->base_url('manager/employee_detail_ajax') ?>',
                    method: 'post',
                    data:{emp_id:emp_id},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        $('.list-employee').hide();
                        $('.employee-detail').show();
                        $('.btn-return').show();
                        if (data[0] = 'success') {
                            let tag_employee = $('.employee-detail');
                            let emp = data[1];
                            if (emp.emp_img != ''){
                                tag_employee.find('.emp-image').attr('src',emp.emp_img);
                            }
                            tag_employee.find('.emp-user').html(emp.emp_user);
                            tag_employee.find('.emp-department').html(emp.emp_department+'<hr>');
                            tag_employee.find('.emp-name').html(emp.emp_name);
                            if (emp.emp_status == 'enable'){
                                var emp_status = '<span class="text-success">'+emp.emp_status.toUpperCase()+'</span>';
                            }else{
                                var emp_status = '<span class="text-danger">'+emp.emp_status.toUpperCase()+'</span>';
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


            $('.preview_file_record').on('click','.cancel-img', function(){
                $("#image_record").val('');
                $('.preview_file_record').html('');
                $('.btn-select-image').show();
            });

            $("#image_record").change(function() {
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

            $('.btn-add-employee').click(function(){
                var txt_error = '<span class="col help-block left-align"><li>Please fill in the information</li></span>';
                $(this).closest('.modal').find('.form-control').each(function(key,value){
                    $(this).find('.help-block').remove();
                    if ($(this).find('input').val() == '' || $(this).find('select').val() == '') {
                        $(this).append(txt_error);
                    }
                });
                var check = $(this).closest('.modal').find('.help-block').length;
                var url = '<?php echo $this->base_url('manager/add_employee') ?>';
                // if ($(this).closest('.modal').find('input[name=type]').val() == 'update') {
                //     url = '<?php echo $this->base_url('manager/update_employee') ?>';
                //     $('.list-employee').hide();
                //     $('.employee-detail').show();
                // }
                var filedata = $(this).closest('.modal').find('input[type=file]');
                var data = new FormData();
                $.each(filedata[0].files, function(i, file) {
                    data.append('userfile', file);
                });
                data.append('first_name',$(this).closest('.modal').find('input[name=first_name]').val());
                data.append('last_name',$(this).closest('.modal').find('input[name=last_name]').val());
                data.append('department',$(this).closest('.modal').find('select[name=department]').val());
                if (check == 0) {
                    $.ajax({
                        url: url,
                        method: 'post',
                        data:data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        // dataType: 'json',
                        success:function(data){
                            console.log(data);
                            if (data[0] == 'success') {
                                swal({
                                    title: 'Save succees',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $('.modal').modal('hide');
                            }else {
                                swal({
                                    title: 'Something Wrong',
                                    type: 'error',
                                    timer: 1500
                                });
                            }
                            // list_employee();
                            // if(data[1] != ''){
                            //     let employee_user = data[1];
                            //     employee_detail(employee_user);
                            // }
                            // $('.modal').hide();
                        }
                    });
                }
            });


            $('.filter').on('change','select[name=employee_department]',function(){
                var value_cate = $(this).val().toLowerCase();
                var value_search = $('#search').val().toLowerCase();
                if ($(this).val() == 'all') {
                    if ($('#search').val() != '') {
                        filter = $(".table-employee tbody tr").filter(function() {
                            return $(this).text().toLowerCase().indexOf(value_search) > -1;
                        });
                        filter.closest('tbody').find('tr').each(function(key,value){
                            $(this).hide();
                        });
                        filter.closest('tr').show();
                    }else {
                        $(".table-employee tbody tr.not-found").remove();
                        $(".table-employee tbody tr").show();
                        sort(value_cate);
                    }
                }else {
                    if ($('#search').val() != '') {
                        filter = $(".table-employee tbody tr").filter(function() {
                            return $(this).text().toLowerCase().indexOf(value_search) > -1 && $(this).find('td.employee-status').text().toLowerCase().indexOf(value_cate) > -1;
                        });
                        filter.closest('tbody').find('tr').each(function(key,value){
                            $(this).hide();
                        });
                        filter.closest('tr').show();
                        sort(value_cate);
                    }else {
                        $(".table-employee tbody tr td.emp-department").filter(function() {
                            $(this).closest('tr').toggle($(this).text().toLowerCase().indexOf(value_cate) > -1)
                        });
                        sort(value_cate);
                    }
                }
            });


            $("#search").on("keyup keypress", function() {
               var value_search = $(this).val().toLowerCase();
               if (value_search != '') {
                   if ($('select[name=employee_department]').val() != 'all') {
                       var value_cate = $('select[name=employee_department]').val().toLowerCase();
                       filter = $(".table-employee tbody tr").filter(function() {
                           return $(this).text().toLowerCase().indexOf(value_search) > -1 && $(this).find('td.emp-department').text().toLowerCase().indexOf(value_cate) > -1;
                       });
                       console.log(filter);
                       filter.closest('tbody').find('tr').each(function(key,value){
                           $(this).hide();
                       });
                       filter.closest('tr').show();
                       sort(value_search);
                   }else {
                       $(".table-employee tbody tr").filter(function() {
                           $(this).closest('tr').toggle($(this).text().toLowerCase().indexOf(value_search) > -1)
                       });

                       sort(value_search);
                   }

               }else{
                   if ($('select[name=employee_department]').val() != 'all') {
                       var value_cate = $('select[name=employee_department]').val().toLowerCase();
                       $(".table-employee tbody tr td.employee-department").filter(function() {
                           $(this).closest('tr').toggle($(this).text().toLowerCase().indexOf(value_cate) > -1)
                       });
                       sort(value_cate);
                   }else {
                       $(".table-employee tbody tr.not-found").remove();
                       $(".table-employee tbody tr").show();
                       sort(value_search);
                   }
               }

            });



            $('.btn-form-add-employee').click(function(){
                $('.modal').modal('show');
            });

            function list_department(){
                $.ajax({
                    url: '<?php echo $this->base_url('manager/list_employee') ?>',
                    method: 'post',
                    data:{dpm:'1'},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        if(data[0] == 'success'){
                            let html = '<option value="all">All</option>';
                            let department = '';
                            $.each(data[1],function(key,value){
                                html += '<option value="'+value.dpm_full_name+'">'+value.dpm_full_name+'</option>';
                                department += '<option value="'+value.id+'">'+value.dpm_full_name+'</option>';
                            });
                            $('select[name=employee_department]').html(html);
                            $('select[name=department]').html(department);
                        }
                    }
                })

            }
            function list_employee(){
                $.ajax({
                    url: '<?php echo $this->base_url('manager/list_employee') ?>',
                    method: 'post',
                    data:{type:'all'},
                    dataType: 'json',
                    success: function(data){
                        if(data[0] == 'success'){
                            let html = '';
                            $.each(data[1],function(key,value){
                                html += '<tr>';
                                    html += '<td class="d-sm-none d-md-block">'+(key+1)+'</td>';
                                    html += '<td>'+value.emp_user+'</td>';
                                    html += '<td class="d-sm-none d-md-block">'+value.emp_name+'</td>';
                                    html += '<td class="emp-department">'+value.emp_department+'</td>';
                                    html += '<td>';
                                        html += '<button type="button" class="btn btn-sm d-md-none d-sm-block btn-primary m-0 btn-detail-employee" value="'+value.emp_id+'">Detail</button>';
                                        html += '<button type="button" class="btn d-sm-none d-md-block btn-primary m-0 btn-detail-employee" value="'+value.emp_id+'">Detail</button>';
                                    html += '</td>';
                                html += '</tr>';
                            });
                            $('.table-employee tbody').html(html);

                        }
                    }
                })

            }
            function sort(value='') {
                let num = $('.table-employee tbody tr[class!=not-found]:visible').length;
                $(".table-employee tbody tr.not-found").remove();
                if (num >= 1) {
                    $('.table-employee tbody tr:visible').each(function(key,value){
                        $(this).removeClass('tr');
                        $(this).removeClass('default-tr');
                        $(this).find('td:first-child').html(key+1);
                        if ((key+1)%2 == 0) {
                            $(this).addClass('tr');
                        }
                    });
                }else {
                    let html = '<tr class="not-found"><td class="center" colspan="5">No results match "'+value+'" </td></tr>';
                    $('.table-employee tbody').append(html);
                }
            }
        });
    </script>

</body>

</html>
