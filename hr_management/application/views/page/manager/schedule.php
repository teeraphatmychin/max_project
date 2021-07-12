<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Schedule Work</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <?php $this->view('partail/main_css') ?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $this->public_url('libs/calendar/fullcalendar-3.6.2/fullcalendar.min.css') ?>">
  <link rel="stylesheet" href="<?php echo $this->public_url('libs/chosen/docsupport/prism.css') ?>">
  <link rel="stylesheet" href="<?php echo $this->public_url('libs/chosen/chosen.css') ?>">
  <style media="screen">
    /* body,h1,h2,h3,h4,h5,h6,.wide {font-family: "Kanit", sans-serif;} */
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
    .form-group input[type=file] {
        opacity:1;
        position: relative;
    }
    .custom-control-input{
        opacity:1;
        position: relative;
        z-index: 1;
    }
    .fc-title,.fc-time{
        font-size: 1.3em;
    }
    @media (min-width: 992px){
        .modal-lg {
            max-width: 830px !important;
        }
    }
    .note-editor.note-frame > .note-toolbar-wrapper > .note-toolbar > .note-btn-group >.btn,.note-editor.note-frame > .note-toolbar-wrapper > .note-toolbar > .note-btn-group > .note-btn-group >.btn {
        background-color: white;
        color: #000;
    }
    .fc-content{
        color:white;
    }
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
    }
    @media (min-width:993px){
        .fc-toolbar.fc-header-toolbar .fc-left,.fc-toolbar.fc-header-toolbar .fc-right,.fc-toolbar.fc-header-toolbar .fc-center{
            width: unset;
        }
    }
  </style>
</head>

<body class="" id="page-top">
  <div class="wrapper ">
    <?php $this->view('partail/nav-left-manager') ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php $this->view('partail/nav-top-manager') ?>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg"></div> -->
      <div class="content">
          <div class="" id="calendar"></div>
      </div>
    </div>
  </div>

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
                  <div class="card card-user">
                      <div class="card-body">
                          <form>
                              <input type="hidden" name="id" value="">
                              <input type="hidden" name="type" value="">
                              <div class="row">
                                  <div class="col-md-4 col-sm-6 form-validate">
                                  <!-- <div class="col-md-4 pr-1 col-sm-6 form-validate"> -->
                                      <div class="form-group">
                                          <label>Start Date</label>
                                          <input type="date" name="start_date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6 form-validate">
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Start Time</label>
                                          <input type="time" name="start_time" class="form-control" >
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-sm-12" style="padding-top: 0.9rem!important">
                                      <div class="form-group">
                                          <button type="button" class="btn btn-info btn-add-end-time" >Add End Time</button>
                                      </div>
                                  </div>
                              </div>
                              <div class="row end-time" style="display:none">
                                  <div class="col-md-6 form-validate">
                                      <div class="form-group">
                                          <label>End Date</label>
                                          <input type="date" name="end_date" class="form-control"  >
                                      </div>
                                  </div>
                                  <div class="col-md-6 form-validate">
                                      <div class="form-group">
                                          <label>End Time</label>
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
  <script type="text/javascript" src="<?php echo $this->public_url('libs/calendar/fullcalendar-3.6.2/lib/moment.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $this->public_url('libs/calendar/fullcalendar-3.6.2/fullcalendar.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/chosen.jquery.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/docsupport/prism.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/docsupport/init.js') ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script> -->
  <script type="text/javascript">
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      // demo.initChartsPages();
      // calendar();

      $('.modal').on('click','.btn-create-event',function(){
          var txt_error = '<span class="col help-block left-align"><li>Please fill in the information</li></span>';
          var dat = [];
          $(this).closest('.modal').find('.form-validate').each(function(key,value){
              $(this).find('.help-block').remove();
              if ($(this).find('input:visible').val() == '' && $(this).find('input').attr('name') != 'start_time' && $(this).find('input').attr('name') != 'end_time') {
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
              data.append('id',modal.find('input[name=id]').val());
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
                             showConfirmButton: false,
                             timer: 1500
                         });
                         setTimeout(function(){window.location.href = '<?php echo $this->base_url('manager/schedule') ?>';},1500);
                     }else {
                         swal({
                             title: 'Something Wrong',
                             showConfirmButton: false,
                             type: 'error',
                             timer: 1500
                         });
                     }
                 }
              });
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
                          title: 'File size is too large.',
                          text: 'Please upload files up to 3 MB in size.',
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
      $('#summernote .note-group-select-from-files').append('<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>');
      $('#calendar').on('mouseenter','.fc-day.fc-widget-content,.fc-day-top',function(){
          let plus = '<i class="fa fa-plus" style="margin-left:3%"></i>';
          $(this).append(plus);
      });
      $('#calendar').on('mouseleave','.fc-day.fc-widget-content,.fc-day-top',function(){
          $(this).find('i').remove();
      });
      $('#calendar').on('click','.fc-day.fc-widget-content,.fc-content-skeleton .fc-day-top',function(){
          // if($(this).hasClass('fc-day-top')){
          //
          //
          // }
          $('#modal').modal('show');
          let modal = $('#modal');
          modal.find('input[name=id]').val('');
          modal.find('input[name=type]').val('');
          modal.find('input[name=start_date]').val($(this).attr('data-date'));
          modal.find('input[name=time]').val('');
          modal.find('input[name=end_date]').val('');
          modal.find('input[name=end_time]').val('');
          modal.find('input[name=title]').val('');

          modal.find('.end-time').hide();
          modal.find('.btn-add-end-time').html('Add End Time');
          modal.find('.btn-add-end-time').removeClass('btn-danger');
          modal.find('.btn-add-end-time').addClass('btn-info');
          modal.find('select').html('');
          modal.find("#summernote").summernote("code", '');
          modal.find('.btn-create-event').html('create');
          modal.find('.btn-create-event').removeClass('btn-warning');
          modal.find('.btn-create-event').addClass('btn-primary');

          list_employee();

      });
      $('#calendar').on('click','.fc-slats .fc-widget-content',function(){
          let day = $(this).closest('.fc-time-grid.fc-unselectable').find('.fc-bg .fc-day').attr('data-date');
          $('#modal').modal('show')
          $('#modal').find('input[name=day]').val(day);
          $('#modal').find('input[name=time]').val($(this).closest('tr').attr('data-time'));
      });


      $(function(){
          $('#calendar').fullCalendar({
              header: {
                  left: 'prev,next today',  //  prevYear nextYea
                  center: 'title',
                  right: 'month,agendaWeek,agendaDay',
              },
              buttonIcons:{
                  prev: 'left-single-arrow',
                  next: 'right-single-arrow',
                  prevYear: 'left-double-arrow',
                  nextYear: 'right-double-arrow'
              },
              events: {
                  url: '<?php echo $this->base_url('manager/data_schedule'); ?>',
                  error: function() {

                  }
              },
              eventLimit:true,
              lang: 'th',
              dayClick: function(data, jsEvent, view) {
                  // console.log(data);
                  // console.log(jsEvent);
                  // console.log(view);
              },
              eventClick: function(calEvent, jsEvent, view) {
                  var html = '';
                  html += '<button type="button" class="btn btn-primary btn-view-item">View Item</button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-warning btn-edit-item">Edit Item</button>'
                  swal({
                      html: html,
                      type: 'warning',
                      showCancelButton: false,
                      showConfirmButton: false,
                  })
                  $('.btn-view-item').click(function(){
                      var id = calEvent.id;
                      swal.close();
                      window.location.href = '<?php echo $this->base_url('manager/schedule_detail/') ?>'+id ;
                  });
                  $('.btn-edit-item').click(function(){
                      swal.close();
                      var id = calEvent.id;
                      let start = moment(calEvent.start).format('YYYY-MM-DD');
                      let end = moment(calEvent.end).format('YYYY-MM-DD');
                      let title = calEvent.title;

                      $.ajax({
                          url: '<?php echo $this->base_url('manager/data_schedule') ?>',
                          method: 'post',
                          data:{id:id},
                          dataType: 'json',
                          success: function(data){
                              console.log(data);
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
                  // console.log(calEvent);
                  // console.log(view.start);  // วันที่เริ่มต้นในปฏิทิน ได้ค่าในรูปแบบ moment object แปลงเป็นวันที่ได้
                  // console.log(view.end);
                  // console.log('start',moment(calEvent.start).format('YYYY-MM-DD'));



              }
          });


      });
      function list_employee(){
          $.ajax({
              url: '<?php echo $this->base_url('manager/list_employee') ?>',
              dataType: 'json',
              success: function(data){
                  // console.log(data);
                  let html = '';
                  // let option = '<option value="all" selected>All</option>';
                  let option = '';
                  if (data[0] == 'success') {
                      let department = '';
                      let check_close = '';
                      $.each(data[1],function(key,value){
                          if (department != value.emp_department) {
                              html += '</optgroup>';
                              html += '<optgroup label="'+ value.emp_department +'">';
                                  department = value.emp_department;
                          }

                          html += '<option value="'+value.emp_id+'">'+ value.emp_name +'</option>';

                      });
                      html = html.substring (11)
                  }
                  html = option + html;
                  // console.log(html);
                  $('.modal select.chosen_select').html(html);
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


          })
      }
    });
  </script>
</body>

</html>
