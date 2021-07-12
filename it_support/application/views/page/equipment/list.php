<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    IT SUPPORT
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo $this->public_url('libs/material/') ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="<?php echo $this->public_url('libs/material/') ?>assets/demo/demo.css" rel="stylesheet" /> -->
  <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
  <link href="<?php echo $this->public_url('css/loading.css') ?>" rel="stylesheet" />
  <style media="screen">
      body,h1,h2,h3,h4,h5,h6{
          font-family: 'Mali', cursive;
      }
      .form-control,
      .is-focused .form-control {
          background-image: linear-gradient(to top, #00bcd4 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
      }
      .btn.btn-primary{
          background-color: #00bcd4;
          border-color: #2196f3;
          border-top-color: rgb(33, 150, 243);
          border-right-color: rgb(33, 150, 243);
          border-bottom-color: rgb(33, 150, 243);
          border-left-color: rgb(33, 150, 243);
      }
      .max-card-icon{
          position: relative;
          width: 100px;
          min-height: 1px;
          padding-right: 15px;
          padding-left: 15px;
          /* flex: 0 0 8.333333%;
          max-width: 8.333333%; */
          cursor: pointer;
      }
      .max-card-icon > i{
          position: absolute;
          top: calc(50% - 18px);
          left: calc(50% - 18px);
          font-size: 2.5em;
      }
      .sidebar[data-color="purple"] li.active>a {
          background-color: #00bcd4;
          box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 188, 212, 0.5);
      }
      .col-1.btn-modal-add-equipment{
          flex: 0 0 10.333333%;
          max-width: 10.333333%;
      }
      .modal-dialog {
          max-width: 900px;
          margin: 1.75rem auto;
      }
      .form-add-equipment > .row{
          padding-top: 10px;
      }

      /* help-block*/
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
      .validate {
          color: red;
      }
      .wrap-input > .form-group > label{
          font-weight: bold !important;
      }

  </style>
</head>

<body class="">

    <div class="modal fade bd-example-modal-xl modal-add-equipment" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">เพิ่มรายชื่ออุปกรณ์</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-add-equipment" id="form-add-equipment">
                        <div class="row">
                            <div class="col-md-3 input-group wrap-input">
                                <select class="custom-select" name="eq_id" aria-label="Example select with button addon">
                                    <option value=''>เลือกประเภท</option>
                                    <option value="PC">PC - คอมพิวเตอร์</option>
                                    <option value="NB">NB - โน็ตบุ๊ค</option>
                                    <option value="PT">PT - ปริ้นเตอร์</option>
                                    <option value="PT">SV - เซิร์ฟเวอร์</option>
                                </select>
                            </div>
                            <div class="col-md-6 input-group wrap-input">
                                <select class="custom-select col-md-8" name="eq_windows" aria-label="Example select with button addon">
                                    <option value="">Windows</option>
                                    <option value="Windows 10 Home">Windows 10 Home</option>
                                    <option value="Windows 10 Professional">Windows 10 Professional</option>
                                    <option value="Windows 8.1">Windows 8.1</option>
                                    <option value="Windows 8">Windows 8 </option>
                                    <option value="Windows 7 Ultimate">Windows 7 Ultimate</option>
                                    <option value="Windows 7 Professional">Windows 7 Professional</option>
                                    <option value="Windows 7 Professional">Windows 7 Home</option>
                                </select>
                                <select class="custom-select col-md-4" name="windows_bit" aria-label="Example select with button addon">
                                    <option value="64 bit">64 bit</option>
                                    <option value="32 bit">32 bit</option>
                                </select>
                            </div>
                            <div class="col-md-3 input-group wrap-input">
                                <select class="custom-select" name="eq_department" aria-label="Example select with button addon">
                                    <option value="">แผนก</option>
                                    <option value="ธุรการขาย">ธุรการขาย</option>
                                    <option value="เลขาฝ่ายขาย">เลขาฝ่ายขาย</option>
                                    <option value="ฝ่ายขาย">ฝ่ายขาย</option>
                                    <option value="บริการ">บริการ</option>
                                    <option value="คลังสินค้า">คลังสินค้า</option>
                                    <option value="สารสนเทศ">สารสนเทศ</option>
                                    <option value="กฎหมาย">กฎหมาย</option>
                                    <option value="การเงิน">การเงิน</option>
                                    <option value="ต่างประเทศ">ต่างประเทศ</option>
                                    <option value="บัญชี">บัญชี</option>
                                    <option value="บุคคล">บุคคล</option>
                                    <option value="โลจิสติก">โลจิสติก</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 wrap-input">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Computer Name</label>
                                    <input type="text" class="form-control" name="eq_computer_name">
                                </div>
                            </div>
                            <div class="col-md-8 wrap-input">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Product Name</label>
                                    <input type="text" class="form-control" name="eq_product_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 wrap-input">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Model</label>
                                    <input type="email" class="form-control" name="eq_model">
                                </div>
                            </div>
                            <div class="col-md-4 wrap-input">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Serail Number</label>
                                    <input type="text" class="form-control" name="eq_serial_no">
                                </div>
                            </div>
                            <div class="col-md-4 input-group wrap-input">
                                <select class="custom-select" name="eq_office" aria-label="Example select with button addon">
                                    <option value=''>Office</option>
                                    <option value="Office 2019">Office 2019</option>
                                    <option value="Office 2016">Office 2016</option>
                                    <option value="Office 2013">Office 2013</option>
                                    <option value="Office 2010">Office 2010</option>
                                    <option value="Office 2007">Office 2007</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 wrap-input">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">ชื่อผู้ใช้</label>
                                    <input type="text" class="form-control" name="eq_user" maxlength="29">
                                </div>
                            </div>
                            <div class="col-md-8 wrap-input">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Product Key</label>
                                    <input type="text" class="form-control product-key" name="eq_product_key" maxlength="29">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 wrap-input">
                                <div class="form-group">
                                    <label>Detail</label>
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">ตัวอย่างรายละเอียด : 5.00 GB/HDD 465.7 GB</label>
                                        <textarea class="form-control" name="eq_detail" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col float-left text-left">
                                <button type="button" class="btn float-left btn-danger pull-right btn-reset-equipment"><i class="material-icons mr-2">delete</i><b>ล้าง</b></button>
                            </div>
                            <div class="col float-right">
                                <button type="button" class="btn btn-success pull-right btn-add-equipment"><i class="material-icons mr-2 ">save</i><b>บันทึก</b></button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>



  <div class="wrapper ">
      <?php $this->view('partail/left_nav') ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">รายการอุปกรณ์</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
              <div class="navbar-form">
                <div class="input-group no-border">
                  <input type="text" value="" class="form-control" placeholder="Search...">
                  <a href="javascript:void(0)" class="btn btn-white btn-round btn-just-icon">
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                  </a>
                </div>
              </div>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-12 col-md-12">
              <div class="card card-equipment-list">
                <div class="card-header row d-flex justify-content-between">
                    <div class="card-header-danger col-10">
                        <h4 class="card-title">ทั้งหมด <b>0</b> รายการ</h4>
                        <p class="card-category">รายการเครื่องมือและอุปกรณ์คอมพิวเตอร์</p>
                    </div>
                    <div class="col-1 card-header-success max-card-icon btn-modal-add-equipment" data-placement="right">
                        <i class="material-icons">add_box</i>
                    </div>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover tb-equipment-list">
                    <thead class="text-danger">
                      <th style="width:7%">No</th>
                      <th>Product</th>
                      <th>Model</th>
                      <th>Detail</th>
                      <th>Serial No.</th>
                      <th>Windows</th>
                      <th>Office</th>
                      <th>Product Key</th>
                      <th>Computer Name</th>
                      <th>User</th>
                      <th>Department</th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer> -->
    </div>
  </div>
  <div class="fixed-plugin">

  </div>
  <!--   Core JS Files   -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
  <!-- <script src="<?php echo $this->public_url('js/jquery-3.3.1.js') ?>"></script> -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/jquery.min.js"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/sweetalert2.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script> -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Chartist JS -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/chartist.min.js"></script>
  <script>
    $(document).ready(function() {

        equipment_list();
        // $('.modal-add-equipment').modal('show');

        $('.btn-modal-add-equipment').click(function(){
            $('.modal-add-equipment').modal('show');
        });

        $('.modal-add-equipment')
            .on('click','.btn-add-equipment',function(){
                let data = $('.modal-add-equipment .form-add-equipment').serialize();
                let form = $('.form-add-equipment').find('*[name^=eq_]');
                if (validate(form)) {
                    $.ajax({
                        url: '<?php echo $this->base_url('employee/add_equipment') ?>',
                        method: 'post',
                        data: data,
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                        }
                    });
                }
            }).on('click','.btn-reset-equipment',function(){
                let check_value = 0;
                $.each($('.form-add-equipment').find('*[name^=eq_]'),function(key,value){
                    if ($(this).val() != '') {
                        check_value = 1;
                    }
                });
                if (check_value == true) {
                    Swal.fire({
                        title: 'คุณต้องการล้างค่าทั้งหมดหรือไม่?',
                        text: "คุณมีข้อความที่กรอกอยู่ค่าที่กรอกจะหายไป",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.value) {
                            $.each($('.form-add-equipment').find('*[name^=eq_]'),function(key,value){
                                $(this).val('');
                            });
                            // Swal.fire(
                            //     'Deleted!',
                            //     'Your file has been deleted.',
                            //     'success'
                            // )
                        }
                    });
                }
            });
        $('.modal-add-equipment').on('keyup keypress','.product-key',function(){
                let value = $(this).val().toUpperCase();
                let new_value = '';
                if (event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode>=97 && event.keyCode<=122) //48-57(ตัวเลข) ,65-90(Eng ตัวพิมพ์ใหญ่ ) ,97-122(Eng ตัวพิมพ์เล็ก)
                {
                    if (value.length > 5) {
                        value = value.split('-');
                        let sum_value = '';

                        for (var i = 0; i < value.length; i++) {
                            sum_value += value[i];
                        }
                        value = sum_value;
                    }
                    for (var i = 0; i < value.length; i++) {
                        if (i != 0) {
                            if (i % 5 == 0) {
                                new_value += '-';
                            }
                        }
                        new_value += value.substr(i,1);
                    }
                    $(this).val(new_value);
                }
                else
                {
                    return false;
                }
        });

        function equipment_list(){
            $.ajax({
                url: '<?php echo $this->base_url('employee/equipment_list_ajax'); ?>',
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if (data[0] == 'success') {
                        let html = '<tr>';
                        $.each(data[1],function(key,value){
                            html += '<tr>';
                            let eq_id = value.eq_id;
                            if (eq_id.length < 2) {
                                eq_id = '0' + eq_id;
                            }
                            html += '<td>'+value.eq_type + '-' + eq_id+'</td>';
                            html += '<td>'+value.eq_product+'</td>';

                            html += '<td>'+value.eq_model+'</td>';
                            html += '<td>'+value.eq_detail+'</td>';

                            html += '<td>'+value.eq_serial_no+'</td>';
                            html += '<td>'+value.eq_windows+'</td>';

                            html += '<td>'+value.eq_office+'</td>';
                            html += '<td>'+value.eq_product_key+'</td>';

                            html += '<td>'+value.eq_computer_name+'</td>';
                            html += '<td>'+value.eq_user+'</td>';
                            html += '<td>'+value.eq_department+'</td>';
                            html += '</tr>';
                        });
                        $('.content .card-equipment-list .card-title').html('ทั้งหมด <b>'+data[1].length+'</b> รายการ')
                        $('.content .tb-equipment-list tbody').html(html);
                    }else {
                        alert('Something went wrong');
                    }
                }
            });
        }
        function validate(form,get_value = '') {
            var error = 0;
            var txt_error = '';
            $.each(form,function(key,value){
                txt_error = '<span class="help-block left-align">';
                $(this).closest('.wrap-input').find('.help-block').remove();
                $(this).closest('.wrap-input').find('.validate').remove();
                $(this).closest('.wrap-input').find('label').removeClass('text-danger');
                if ($(this).val() == '') {
                    error = 1;
                    if ($(this).attr('name') == 'eq_windows') {
                        txt_error = '<span class="help-block left-align" style="left:50%">';
                    }
                    if ($(this).prop('tagName').toLowerCase() == 'select') {
                        txt_error += '<li>กรุณาใส่ข้อมูล</li>';
                        txt_error += '</span>';
                        $(this).closest('.wrap-input').append(txt_error);
                    }else {
                        if ($(this).attr('name') == 'eq_detail') {
                            console.log('test');
                        }
                        let alert = '<span class="validate">กรุณาใส่ข้อมูล </span>' + $(this).closest('.wrap-input').find('label').html();
                        $(this).closest('.wrap-input').find('label:eq(0)').html(alert);
                        $(this).closest('.wrap-input').find('label:eq(0)').addClass('text-danger');
                    }
                    console.log($(this).attr('name'));
                }else {
                    if ($(this).attr('name') == 'eq_product_key') {
                        let product_key = $(this).val()
                        if (product_key.length < 29) {
                            error = 1;
                            txt_error += '<li>กรุณาใส่ข้อมูลให้ครบถ้วน</li>';
                            txt_error += '</span>';
                            $(this).closest('.wrap-input').append(txt_error);
                        }
                    }

                }
            });
            // console.log(error);
            if (error == false) {
                return true;
            }else {
                return false;
            }
        }


























      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>
