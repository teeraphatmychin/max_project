<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Schedule Detail</title>

    <?php $this->view('partail/main_css') ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->public_url('libs/chosen/docsupport/prism.css') ?>">
    <link rel="stylesheet" href="<?php echo $this->public_url('libs/chosen/chosen.css') ?>">
    <style media="screen">
        .help-block {
            width: 160px;
            background-color: #f44336;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 10px;
            position: absolute;
            z-index: 1;
            bottom: 120%;
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
        .form-group input[type=file] {
            opacity:1;
            position: relative;
        }
        .custom-control-input{
            opacity:1;
            position: relative;
            z-index: 1;
        }
        .note-editor.note-frame > .note-toolbar-wrapper > .note-toolbar > .note-btn-group >.btn,.note-editor.note-frame > .note-toolbar-wrapper > .note-toolbar > .note-btn-group > .note-btn-group >.btn {
            background-color: white;
            color: #000;
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
                <div class="col-md-9 col-sm-12">
                    <div class="card">
                        <a class="btn btn-neutral dropdown-toggle col-1 position-absolute" style="right:0;padding:0.9% 0px;" href="http://example.com" id="navbarDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="nc-icon nc-settings-gear-65"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow " aria-labelledby="navbarDropdownMenu">
                          <a class="dropdown-item btn-edit-event" href="javascript:void(0)"><i class="nc-icon nc-settings-gear-65"></i> Edit</a>
                          <a class="dropdown-item text-danger btn-delete-event" href="javascript:void(0)"><i class="nc-icon nc-simple-remove"></i> Delete</a>
                        </div>
                        <div class="card-header">
                            <h5 class="card-title title"></h5>
                            <p class="card-category due text-danger"></p>
                            <hr>
                        </div>
                        <div class="card-body detail">

                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats posted">
                                <!-- <i class="fa fa-history"></i> Updated 3 minutes ago -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-header ">
                            <h5 class="card-title">Submissions</h5>
                            <p class="card-category text-danger"></p>
                            <hr>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12 submissions text-center text-muted">
                                    <!-- <a href="<?php echo $this->public_url('file/แบบประเมินความพึงพอใจของผู้เชี่ยวชาญ.docx') ?>">แบบประเมินความพึงพอใจของผู้เชี่ยวชาญ</a> -->
                                    No Item
                                </div>
                                <!-- <div class="col-12">
                                    <button type="button" class="btn btn-success"><i class="nc-icon nc-simple-add"></i>&nbsp;&nbsp;Submit Assignment</button>
                                </div> -->
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats item">
                                <!-- <i class="fa fa-history"></i> Updated 3 minutes ago -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal-->
    <div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="type" value="">
                    <div class="card card-user">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-4 pr-1 col-sm-6 form-validate">
                                        <div class="form-group">
                                            <label>start date</label>
                                            <input type="date" name="start_date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1 col-sm-6 form-validate">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">start time</label>
                                            <input type="time" name="start_time" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1 col-sm-12" style="padding-top: 0.9rem!important">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-info btn-add-end-time" >Add End Time</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row end-time" style="display:none">
                                    <div class="col-md-6 pr-1 form-validate">
                                        <div class="form-group">
                                            <label>end date</label>
                                            <input type="date" name="end_date" class="form-control"  >
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1 form-validate">
                                        <div class="form-group">
                                            <label>end time</label>
                                            <input type="time" name="end_time" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 pr-1 form-validate">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <div id="summernote" class="form-control"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Refer</label>
                                            <select data-placeholder="refer" class="chosen_select form-control" multiple name="user[]" style="width:100%"> </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-create-event">Create</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <?php $this->view('partail/main_js') ?>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script type="text/javascript" src="<?php echo $this->public_url('libs/material/assets/demo/demo.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/chosen.jquery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/docsupport/prism.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/docsupport/init.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var url = '<?php echo $_GET['url'] ?>';
            var id = url.split('/');
            $.ajax({
                url: '<?php echo $this->base_url('manager/data_schedule') ?>',
                method: 'post',
                data:{id:id[2],get_date_foemat:'1'},
                dataType: 'json',
                success: function(data){
                    if (data[0].title != '') {
                        let card = $('.card');
                        card.find('.title').html(data[0].title);
                        card.find('.due').html('Due : '+data[0].due);
                        card.find('.detail').html(data[0].detail);
                        card.find('.posted').html('Posted  : '+data[0].posted);
                    }else {
                        swal({
                            title: 'This event has been deleted',
                            type: 'warning',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){window.location.href = '<?php echo $this->base_url('manager/schedule') ?>';},1500);
                    }
                }
            });
            $('.modal').on('click','.btn-add-end-time',function(){
                if($(this).html() == 'Add End Time'){
                    $(this).closest('.modal').find('.end-time').show();
                    $(this).closest('.modal').find('.end-time :input').val('');
                    $(this).html('Remove End Time');
                    $(this).toggleClass('btn-info btn-danger');

                }else {
                    $(this).closest('.modal').find('.end-time').hide();
                    $(this).closest('.modal').find('.end-time :input').val('');
                    $(this).html('Add End Time');
                    $(this).toggleClass('btn-info btn-danger');
                }
            });
            $('.modal').on('click','.btn-create-event',function(){
                var txt_error = '<span class="col help-block left-align"><li>กรุณากรอกข้อมูล</li></span>';
                var dat = [];
                $(this).closest('.modal').find('.form-validate').each(function(key,value){
                    $(this).find('.help-block').remove();
                    if ($(this).find('input:visible').val() == '' && $(this).find('input[name!=start_time]') && $(this).find('input[name!=end_time]')) {
                        if($(this).find('input').attr('name') == 'end_date'){
                            $(this).closest('.form-validate').append('<span class="col help-block left-align"><li>กรุณาใส่วันที่</li></span>');
                        }else {
                            $(this).closest('.form-validate').append(txt_error);
                        }
                    }else {

                    }
                });
                var check = $(this).closest('.modal').find('.help-block').length;
                var type = $(this).html();
                if (check == 0) {
                    let modal = $(this).closest('.modal');
                    var description = $('#summernote').summernote('code');
                    data = new FormData();
                    data.append('description',description);
                    data.append('id',id[2]);
                    data.append('type',modal.find('input[name=type]').val());
                    data.append('title',modal.find('input[name=title]').val());
                    data.append('start_date',modal.find('input[name=start_date]').val());
                    data.append('start_time',modal.find('input[name=start_time]').val());
                    data.append('end_date',modal.find('input[name=end_date]').val());
                    data.append('end_time',modal.find('input[name=end_time]').val());
                    data.append('refer',modal.find('select').val());
                    $.ajax({
                       url: '<?php echo $this->base_url('manager/create_event') ?>' ,
                       method: 'post',
                       data:data,
                       dataType: 'json',
                       cache: false,
                       async: false,
                       contentType: false,
                       processData: false,
                       success: function(data){
                           // console.log(data);
                           if(data == 'success'){
                               swal({
                                   title: type.toUpperCase() + ' SUCCESS',
                                   type: 'success',
                                   timer: 1500
                               });
                               setTimeout(function(){window.location.href = '<?php echo $this->base_url('manager/schedule_detail/') ?>'+id[2];},1500);
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
            $('.btn-delete-event').click(function(){
                swal({
                    title: 'Do you want delete this event',
                    type: 'warning',
                    showCancelButton: true,
                }).then((result) => {
                    $.ajax({
                        url: '<?php echo $this->base_url('manager/delete_event') ?>',
                        method: 'post',
                        data:{id:id[2]},
                        dataType: 'json',
                        success: function(data){
                            if (data == 'success') {
                                swal({
                                    title: 'Deleted!',
                                    text: 'Your event has been deleted.',
                                    type: 'success',
                                    timer: 1500
                                });
                                setTimeout(function(){window.location.href = '<?php echo $this->base_url('manager/schedule') ?>';},1500);
                            }else {
                                swal({
                                    title: 'Something Wrong',
                                    type: 'error',
                                    timer: 1500
                                });
                            }
                        }

                    });

                });
            });
            $('.btn-edit-event').click(function(){
                $.ajax({
                    url: '<?php echo $this->base_url('manager/data_schedule') ?>',
                    method: 'post',
                    data:{id:id[2]},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        let modal = $('.modal');
                        let dat = data[0];
                        let start_date = dat.start;
                        if (start_date.indexOf('T') > -1) {
                            start_date = start_date.split('T');
                            modal.find('input[name=start_date]').val(start_date[0]);
                            modal.find('input[name=start_time]').val(start_date[1]);
                        }else {
                            modal.find('input[name=start_date]').val(start_date);
                        }
                        if (dat.end != '') {
                            modal.find('.end-time').show();
                            modal.find('.btn-add-end-time').html('Remove End Time');
                            modal.find('.btn-add-end-time').addClass('btn-danger');
                            modal.find('.btn-add-end-time').removeClass('btn-info');
                            let end_date = dat.end;
                            modal.find('input[name=end_date]').val(end_date);
                            if (end_date.indexOf('T') > -1) {
                                end_date = end_date.split('T');
                                modal.find('input[name=end_date]').val(end_date[0]);
                                modal.find('input[name=end_time]').val(end_date[1]);
                            }
                        }

                        $('#modal').modal('show');
                        modal.find('.btn-create-event').html('edit');
                        modal.find('.btn-create-event').removeClass('btn-primary');
                        modal.find('.btn-create-event').addClass('btn-warning');
                        modal.find('input[name=id]').val(id);
                        modal.find('input[name=type]').val('update');
                        modal.find('input[name=title]').val(dat.title);
                        modal.find("#summernote").summernote("code", dat.detail);
                        modal.find('select').html('');
                        if (dat.status != 0) {
                            modal.find('input[name=holiday]').prop('checked',true);
                        }else {
                            modal.find('input[name=holiday]').prop('checked',false);
                        }

                        let refer_emp = dat.refer;
                        refer_emp = refer_emp.split(',');
                        $.ajax({
                            url: '<?php echo $this->base_url('manager/list_employee') ?>',
                            dataType: 'json',
                            success: function(data){
                                // console.log(data);
                                if (data[0] == 'success') {
                                    var html = '';
                                    var department = '';
                                    var check_close = '';
                                    var selected = '';

                                    $.each(data[1],function(key,value){
                                        if (department != value.emp_department) {
                                            html += '</optgroup>';
                                            html += '<optgroup label="'+ value.emp_department +'">';
                                                department = value.emp_department;
                                        }
                                            $.each(refer_emp,function(key_re,value_re){
                                                    if (value_re == value.emp_id) {
                                                        selected = 'selected';
                                                    }
                                            });

                                            html += '<option value="'+value.emp_id+'" '+selected+'>'+ value.emp_name +'</option>';
                                            selected = '';
                                        //     emp_id = value.emp_id;
                                        // }
                                    });
                                    $('.modal select.chosen_select').html(html.substring (11));
                                    $('.chosen_select').chosen();
                                    $('.chosen_select').trigger("chosen:updated");
                                    $('.chosen-container .chosen-choices').addClass('rounded');
                                    $('.chosen-container .chosen-choices').css({'padding':'5px'});
                                    $('.chosen-container').css({'width':'100%'});

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
            });


            $('#summernote').summernote({
                tabsize: 2,
                height: 300,
                disableResizeEditor: true,
                toolbar: [
                    ["style", ["bold", "italic", "underline"]],
                    ["fontname", ["fontname"]],
                    ["font", ["strikethrough", "superscript", "subscript"]],
                    ["fontsize", ["fontsize"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ['insert', ['link', 'picture']]
                ],
                callbacks: {
                    onImageUpload: function(files, editor, welEditable) {
                        if((files[0].size / 1024) > 3072){
                            swal({
                                title: 'ขนาดไฟล์ใหญ่เกินไป',
                                text: 'กรุณาอัพโหลดไฟล์ขนาดไม่เกิน 3 MB',
                                type: 'warning',
                                confirmButtonText: 'OK'
                            })
                        }else{
                            // var check = 'success';
                            // for(var i = files.length - 1; i >= 0; i--) {
                            //     if (check == 'success') {
                            //         check = 'fail';
                            //         check = sendFile(files[i], this);
                            //         // console.log(check);
                            //         // console.log(files[i]);
                            //     }
                            // }
                            sendFile(files[0], this);
                        }
                    },
                    onMediaDelete : function($target, editor, $editable) {
                         // alert($target.context.dataset.filename);
                         $target.remove();
                     }
                },
            });
            function sendFile(file, el) {
                data = new FormData();
                data.append("file", file);
                $.ajax({
                    url: '<?php echo $this->base_url('manager/upload_image') ?>',
                    data: data,
                    type: "POST",
                    cache: false,
                    async: false,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        $(el).summernote('editor.insertImage', url);
                    }
                });


            }
        });
    </script>

</body>

</html>
