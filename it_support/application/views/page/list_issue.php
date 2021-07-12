<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>IT SUPPORT</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo $this->public_url('libs/material/') ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
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
      .is-focused [class^='bmd-label'],
      .is-focused [class*=' bmd-label'] {
          color: #00bcd4;
      }
      li.max-btn-add-issue > a{
          background-color: #4caf50 !important;
          box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(76, 175, 80, 0.4);
      }
      .sidebar .nav li.max-btn-add-issue>a:hover{
          background-color: #4caf50;
          outline: inherit;
      }
      .content .issue-content-clicked{
          display: block !important;
      }
      .content .issue-content{
          /* display: -webkit-box;
          text-indent: 1.5em;
          -webkit-line-clamp: 3;
          -webkit-box-orient: vertical;
          overflow: hidden; */
      }
      .max-card-width{
          transition: 0.2s;
          position: relative;
          width: 100%;
          min-height: 1px;
          padding-right: 15px;
          padding-left: 15px;
      }
      .max-card-content-open{
          z-index: 999;
          position: absolute;
          right: 0px;
          left: 10px;
      }
      .max-card-content-close{
          z-index: inherit;
          position: relative;
      }

      .to_top{
          position: fixed;
          bottom: -5.6rem;
          right: .4rem;
          width: 2.2rem;
          height: 2.1rem;
          overflow: hidden;
          -webkit-border-radius: 8;
          -moz-border-radius: 8;
          border-radius: .2rem;
          color: #ffffff;
          background: #00000082;
          padding: .45rem 0.5em 0 .3rem;
          text-decoration: none;
          cursor: pointer;
          transition: .5s;
          /* transform: translateY(540%); */
      }


      @media (max-width: 414px){
          .d-sm-none{
              display: none !important;
          }
          .max-iframe-summernote,.wrap-iframe-summernote{
              height: 390px !important;
          }
          .note-editor > .note-editable{
              height: 250px !important;
          }
      }
      @media (min-width: 992px){

          .max-input.d-lg-block {
              display: flex !important;
          }
      }

      .dropdown-menu .dropdown-item:hover, .dropdown-menu .dropdown-item:focus, .dropdown-menu a:hover, .dropdown-menu a:focus, .dropdown-menu a:active{
          box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 188, 212, 0.4);
          background-color: #00bcd4;
          color: #FFFFFF
      }
      @media (min-width: 1200px){
          .modal-xl {
              max-width: 1000px;
          }
      }
      .btn.btn-primary:focus, .btn.btn-primary:active, .btn.btn-primary:hover{
          color: #fff;
          background-color: #00aec5;
          border-color: #008697;
          box-shadow: 0 2px 2px 0 rgba(0, 188, 212, 0.14), 0 3px 1px -2px rgba(0, 188, 212, 0.2), 0 1px 5px 0 rgba(0, 188, 212, 0.12);
      }
      .issue-content > b   {
          font-weight: bold;
      }

      .max-image-loading{
          animation-name: spin;
          animation-duration: 1500ms;
          animation-iteration-count: infinite;
          animation-timing-function: linear;
      }

      @keyframes spin {
          from {
              transform:rotate(0deg);
          }
          to {
              transform:rotate(360deg);
          }
      }
      b, strong {
          font-weight: bold !important;
      }
      .btn .material-icons, .btn:not(.btn-just-icon):not(.btn-fab) .fa{
          top: -2px;
      }
      input[type="password"] {
          font-family: none !important; /*for default text security*/
      }

      .help-block {
          width: 170px;
          background-color: #f44336;
          color: #fff;
          text-align: center;
          border-radius: 6px;
          padding: 5px 10px;
          position: absolute;
          z-index: 1;
          bottom: 90%;
          left: 64%;
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
      .max-col{
          position: relative;
          width: 100%;
          min-height: 1px;
          padding-right: 15px;
          padding-left: 15px;
      }
      .max-display > .max-col:first-child{
          min-width: 150px;
          max-width: 150px;
      }
      .max-display > .max-col:last-child{
          width: 90%;
          width: calc(100% - 150px);
      }
      .max-btn{
          padding: 0.46875rem 1rem;
          display: none;
      }

      .btn-modal-edit-issue{
          padding-top: 0.95em !important;
          /* margin-right: 0px !important; */
          margin-left: 0px !important;
      }
      .max-card-content-open > .card > .card-header > .max-card-text{
          flex: 0 0 83.333333%;
          max-width: 83.333333%;
      }
      .max-card-text{
          position: relative;
          width: 100%;
          min-height: 1px;
          padding-right: 15px;
          padding-left: 15px;
      }
      .max-card-icon{
          display: none;
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
          top: 33px;
          left: 38px;

      }

      /**/
      .sidebar::before{
          background-color: unset;
      }
      .sidebar .logo,.sidebar .sidebar-wrapper{
          background-color: #fff;
      }

      /*my top nav*/
      .max-top-nav .nav li a, .max-top-nav .nav li .dropdown-menu a {
          margin: 10px 15px 0;
          border-radius: 3px;
          color: #3C4858;
          padding-left: 10px;
          padding-right: 10px;
          text-transform: capitalize;
          font-size: 13px;
          padding: 10px 15px;
          float: left;
      }
      .max-top-nav .nav i {
          font-size: 24px;
          float: left;
          margin-right: 15px;
          line-height: 30px;
          width: 30px;
          text-align: center;
          color: #a9afbb;
      }
      .max-top-nav .nav p {
          margin: 0;
          line-height: 30px;
          font-size: 14px;
          position: relative;
          display: block;
          height: auto;
          white-space: nowrap;
          float: left;
      }
      .ps-container:hover>.ps-scrollbar-x-rail, .ps-container:hover>.ps-scrollbar-y-rail{
          z-index: 99999999999;
      }
      .form-control:focus, .bmd-form-group.is-focused .form-control {
          background-size: 100% 100%, 100% 100%;
          transition-duration: 0.3s;
          box-shadow: none;
      }
  </style>
</head>

<body class="">

    <!-- modal ยังไม่ responsive ในส่วนของ summernote -->
    <div class="modal fade bd-example-modal-xl modal-add-issue" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-xl" style="max-width:1200px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">แจ้งปัญหา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="form-group embed-responsive embed-responsive-16by9 wrap-iframe-summernote" >
                                <iframe src="<?php echo $this->base_url('partail/summernote') ?>" scrolling="no" class="max-iframe-summernote note form-group col-12 embed-responsive-item" width="" height=""></iframe>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col float-left text-left">
                                <button type="reset" class="btn float-left btn-danger pull-right btn-reset-issue"><i class="material-icons mr-2">delete</i><b>ล้าง</b></button>
                            </div>
                            <div class="col float-right">
                                <button type="button" class="btn btn-success pull-right "><i class="material-icons mr-2 ">save</i><b>บันทึก</b></button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl modal-view-image"  tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="max-width:1360px;height:768px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">แสดงรูปภาพ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="height:768px">
                    <div class="row">
                        <div class="col-12 image" style="overflow:hidden;height:740px;">
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col float-left text-left">
                            <button type="reset" class="btn float-left btn-danger pull-right btn-reset-issue"><i class="material-icons mr-2">delete</i><b>ล้าง</b></button>
                        </div>
                        <div class="col float-right">
                            <button type="button" class="btn btn-success pull-right max-btn-full-screen"><i class="material-icons mr-2 ">fullscreen</i><b>เต็มจอ</b></button>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade modal-reset-passworfd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">ตั้งค่ารหัสผ่าน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-reset-password">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">รหัสผ่านเดิม</label>
                          <input type="password" class="form-control input-old-password">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">รหัสผ่านใหม่</label>
                          <input type="password" class="form-control input-new-password">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">ยืนยันรหัสผ่าน</label>
                          <input type="password" class="form-control input-confirm-password">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col float-left text-left">
                            <button type="button" data-dismiss="modal" class="btn float-left btn-danger pull-right btn-reset-issue">ยกเลิก</button>
                        </div>
                        <div class="col float-right">
                            <button type="button" class="btn btn-success pull-right btn-reset-password">ยืนยัน</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div> -->
  <div class="wrapper max-wrapper">
      <?php $this->view('partail/left_nav') ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">รายการแจ้งปัญหา</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>


          <div class="collapse navbar-collapse max-top-nav justify-content-end">
            <!-- <form class="navbar-form">
              <span class="bmd-form-group"><div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div></span>
            </form> -->
            <ul class="nav justify-content-end">
              <li class="nav-item">
                  <a class="nav-link btn-modal-add-issue bg-success" href="javascript:void(0)" data-toggle="modal" data-target=".modal-add-issue">
                      <i class="material-icons text-white">add_circle</i>
                      <p class="text-white d-block">แจ้งปัญหา</p>
                  </a>
              </li>
              <!-- <li class="nav-item dropdown">
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
              </li> -->
            </ul>
          </div>
        </div>
        <hr>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
            <div class="navbar">
                <form class="form-search col-md-12">
                  <div class="row justify-content-around d-flex">
                    <div class="form-group">
                        <label class="text-dark">วันที่เริ่มต้น : </label>
                        <div class="form-group bmd-form-group">
                            <input type="date" class="form-control search-date-start" name="search-date-start"  value="" max="2021-12-31">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">วันที่สิ้นสุด : </label>
                        <div class="form-group bmd-form-group">
                            <input type="date" class="form-control search-date-end" name="search-date-end" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group bmd-form-group pl-1 pr-1">
                            <select class="custom-select search-cate" name="search-cate" aria-label="Example select with button addon">
                                <option value="">ประเภท</option>
                                <option value="danger">ยังไม่ได้เปิด</option>
                                <option value="info">เปิดแล้ว</option>
                                <option value="success">แก้ไขเรียบร้อย</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group bmd-form-group pl-1 pr-1">
                            <select class="custom-select search-sort" name="search-sort" aria-label="Example select with button addon">
                                <option value="">จัดเรียง</option>
                                <option value="asc">ล่าสุด - เก่าสุด</option>
                                <option value="desc">เก่าสุด - ล่าสุด</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <button type="reset" class="btn btn-round btn-warning text-white btn-reset-search">
                                <i class="material-icons">autorenew</i> ล้างค่า
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
          <div class="row list-issue"></div>
        </div>
      </div>
      <!-- <div class="close-layer visible"></div> -->
    </div>
  </div>
  <div class="fixed-plugin"></div>
  <!--   Core JS Files   -->
  <!-- <script src="<?php echo $this->public_url('js/jquery-3.3.1.js') ?>"></script> -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/jquery.min.js"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/sweetalert2.js"></script>
  <!-- <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script> -->


  <script type="text/javascript">

    $(document).ready(function() {
        //ทำ summernote responsive check ทุกขนาดจอ
            // block ที่เลือกสี ยังไม่โอเคร เวลาจอ เล็ก

        //เมื่อ click มีการอับเดตว่าเคยเปิดดูแล้ว (ของ ADMIN)
        //

        // setInterval(test, 3000); // ทำ notification paramiter เป็น (function(),timer)

        loader($('.content .list-issue'));
        btn_to_top();
        list_issue();

        // $(function(){
        //     $('.navbar .form-search .search-date-start').datetimepicker({
        //         timepicker:false,
        //         lang:'th',  // แสดงภาษาไทย
        //         yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        //         inline:true
        //     });
        // });
        // $(window).click(function(){
        //     //outer click item
        //     $('.content .max-card-width').removeClass('test1');
        //     // $('.dropdown-click').find('.dropdown-content').removeClass('show');
        // });

        // checkPosition();
        // function checkPosition() {
        //     if (window.matchMedia('(max-width: 768px)').matches) {
        //         console.log('i paddd');
        //     } else {
        //         console.log('esch');
        //     }
        // }

        // $('.navbar').on('click','.navbar-toggler',function(){
        //     $('html').addClass('nav-open');
        //     $('.main-panel').append('<div class="close-layer visible"></div>');
        // });
        // $('.main-panel').on('click','.close-layer',function(){
        //     $('html').removeClass('nav-open');
        //     $(this).remove();
        // });





        //อย่าลืมไปดูที่ ตัวเชื่อม script js
        function search_sort(data){
            $('.navbar .form-search')
            .on('click','.btn-reset-search',function(){
                $('.navbar .form-search .search-date-start').val('');
                $('.navbar .form-search .search-date-end').val('');
                $('.navbar .form-search .search-sort').val('');
                let html = '';
                let check_month = '0';
                let check_line_today = 0;
                $.each(data,function(key,value){
                    let split_date = value.issue_date.split(' ');
                    if (split_date[0] == '<?php echo date('Y-m-d') ?>') {
                        if (check_line_today == 0) {
                            check_line_today = 1;
                            html += '<div class="row col-12 max-display max-line-date">';
                            html += '<div class="max-col"> วันนี้';
                            html += '</div>';
                            html += '<div class="max-col"><hr>';
                            html += '</div>';
                            html += '</div>';
                        }

                        html += '<div class="max-card-width col-lg-4 col-md-6 max-card-content-close"  style="display:none">';
                        html += '<div class="card row">';
                        html += '<div class="card-header row d-flex justify-content-between" issue-id="'+value.issue_id+'">';
                        html += '<div class="card-header-'+value.issue_status+' max-card-text">';
                        html += '<h4 class="card-title">'+value.topic_issue+'</h4>';
                        html += ' <p class="card-category" issue-date="'+value.issue_date+'">'+value.issue_date_th+' น.</p>';
                        html += '</div>';
                        html += '<div class="card-header-warning max-card-icon btn-modal-edit-issue" data-toggle="tooltip" data-placement="right" title="คลิกเพื่อแก้ไข" data-toggle="modal" data-target=".modal-add-issue">';
                        html += '<i class="material-icons">edit</i>';
                        html += '</div>';
                        html += '</div>';
                        html += '<div class="card-body table-responsive">';
                        html += '<div class="row">';
                        html += '<div class="col-12 issue-content d-none">'+value.issue_content;
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }else {
                        let month = split_date[0].split('-');
                        month = month[1];
                        let month_th = value.issue_date_th.split(' ');
                        month_th = month_th[1] +' '+ month_th[2];
                        if (check_month != month) {
                            html += '<div class="row col-12 max-display max-line-date">';
                            html += '<div class="max-col">'+month_th;
                            html += '</div>';
                            html += '<div class="max-col"><hr>';
                            html += '</div>';
                            html += '</div>';
                            check_month = month;
                        }

                        html += '<div class="max-card-width col-lg-4 col-md-6 max-card-content-close"  style="display:none">';
                        html += '<div class="card row">';
                        html += '<div class="card-header row d-flex justify-content-between" issue-id="'+value.issue_id+'">';
                        html += '<div class="card-header-'+value.issue_status+' max-card-text">';
                        html += '<h4 class="card-title">'+value.topic_issue+'</h4>';
                        html += ' <p class="card-category">'+value.issue_date_th+' น.</p>';
                        html += '</div>';
                        html += '<div class="card-header-warning max-card-icon btn-modal-edit-issue" data-toggle="tooltip" data-placement="right" title="คลิกเพื่อแก้ไข" data-toggle="modal" data-target=".modal-add-issue">';
                        html += '<i class="material-icons">edit</i>';
                        html += '</div>';
                        html += '</div>';
                        html += '<div class="card-body table-responsive">';
                        html += '<div class="row">';
                        html += '<div class="col-12 issue-content d-none">'+value.issue_content;
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }
                });
                $('.content .list-issue').html(html).find('.max-card-width').each(function(i) {$(this).delay(100 * i).fadeIn(150);});
                // click_issue();
                open_issue_with_url();
                tooltip();
            })
            .on('change keyup','.search-name,.search-date-start,.search-date-end,.search-sort,.search-cate',function(){
                let date_start = $('.navbar .form-search .search-date-start').val();
                let date_end = $('.navbar .form-search .search-date-end').val();
                let sort = $('.navbar .form-search .search-sort').val();
                let cate = $('.navbar .form-search .search-cate').val();
                let cate_text = $('.navbar .form-search .search-cate option:selected').html();


                let data_search = [];
                let key_data_search = 0;
                if (date_start != '' || date_end != '') {
                    if ((date_start != '' && date_end != '') && (date_end < date_start)) {
                        let data_swap = date_start;
                        date_start = date_end;
                        date_end = data_swap;
                    }

                    for (var i = 0; i < data.length; i++) {
                        let date = data[i].issue_date;
                        date = date.split(' ');
                        date = date[0];
                        if (date_start != '' && date_end != '') {
                            if (date >= date_start && date <= date_end) {
                                data_search[key_data_search++] = data[i];
                            }
                        }else if (date_start != '' && date_end == '') {
                            if (date >= date_start) {
                                data_search[key_data_search++] = data[i];
                            }
                        }else if (date_end != '' && date_start == '') {
                            if (date >= date_end) {
                                data_search[key_data_search++] = data[i];
                            }
                            date_start = date_end; //ใช้ assign ค่าใว้ใช้เมื่อ search ไม่เจอ
                            date_end = '';
                        }

                    }
                }else {
                    data_search = data;
                }

                if (data_search.length > 0 && sort != '') {
                    switch (sort) {
                        case 'asc':
                            //ยังไม่มีคำสั่งภายในนี้เพราะ ข้อมูลได้ทำการเรียงจาก ล่าสุดไปเก่าสุดอยู่แล้ว
                            break;
                        case 'desc':
                            let new_data_search = [];
                            let j = 0;
                            for (var i = (data_search.length - 1); i > -1; i--) {
                                new_data_search[j++] = data_search[i];
                            }
                            data_search = new_data_search;
                            break;
                        default:
                    }
                }

                if (cate != '') {
                    let data_search_cate = [];
                    let data_key_cate = 0;
                    for (var i = 0; i < data_search.length; i++) {
                        if (data_search[i].issue_status == cate) {
                            data_search_cate[data_key_cate++] = data_search[i];
                        }
                    }
                    data_search = data_search_cate;
                }
                let html = '';
                let check_month = '0';
                if (data_search.length < 1) {
                    let text = 'ไม่มีการแจ้งปัญหาที่ ';
                    let date_start_split = '';
                    if (cate != '') {
                        text += '<span class="text-'+cate+'">'+cate_text+'</span><br>';
                    }
                    if (date_start != '') {
                        date_start_split = date_start.split('-');
                        text += 'เริ่มต้นตั้งแต่ <br>วันที่ <b>'+date_start_split[2]+'/'+date_start_split[1]+'/'+(parseInt(date_start_split[0])+543)+'</b>';
                    }
                    if (date_end != '') {
                        let date_end_split = date_end.split('-');
                        // text = 'ไม่มีการแจ้งปัญหาระหว่าง <br>'+text;
                        text += '<br> ถึง <b>'+date_end_split[2]+'/'+date_end_split[1]+'/'+(parseInt(date_end_split[0])+543)+'</b>';
                    }
                    html += '<div class="max-card-width col-lg-6 col-md-12" style="display:none;float:unset;margin:auto">' ;
                    html += '<div class="card card-stats">';
                    html += '<div class="card-header card-header-warning card-header-icon">';
                    html += '<div class="card-icon">';
                    html += '<i class="material-icons">error_outline</i>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="card-body table-responsive" style="display:block">';
                    html += '<div class="row">';
                    html += '<div class="col-12 text-center"><h4>'+text;
                    html += '</h4><br></div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    $('.content .list-issue').html(html).find('.max-card-width').each(function(i) {$(this).delay(100 * i).fadeIn(150);});
                }
                let check_line_today = 0;
                $.each(data_search,function(key,value){
                    let split_date = value.issue_date.split(' ');
                    if (split_date[0] == '<?php echo date('Y-m-d') ?>') {
                        if (check_line_today == 0) {
                            check_line_today = 1;
                            html += '<div class="row col-12 max-display max-line-date">';
                            html += '<div class="max-col"> วันนี้';
                            html += '</div>';
                            html += '<div class="max-col"><hr>';
                            html += '</div>';
                            html += '</div>';
                        }

                        html += '<div class="max-card-width col-lg-4 col-md-6 max-card-content-close"  style="display:none">';
                        html += '<div class="card row">';
                        html += '<div class="card-header row d-flex justify-content-between" issue-id="'+value.issue_id+'">';
                        if (value.issue_status != 'success') {
                            html += '<div class="card-header-'+value.issue_status+' max-card-text">';
                            html += '<h4 class="card-title">'+value.topic_issue+'</h4>';
                            html += ' <p class="card-category" issue-date="'+value.issue_date+'">'+value.issue_date_th+' น.</p>';
                            html += '</div>';
                            html += '<div class="card-header-warning max-card-icon btn-modal-edit-issue" data-toggle="tooltip" data-placement="right" title="คลิกเพื่อแก้ไข" data-toggle="modal" data-target=".modal-add-issue">';
                            html += '<i class="material-icons">edit</i>';
                            html += '</div>';
                        }else {
                            html += '<div class="card-header-'+value.issue_status+' max-card-text" style="flex:unset;max-width:unset">';
                            html += '<h4 class="card-title">'+value.topic_issue+'</h4>';
                            html += ' <p class="card-category" issue-date="'+value.issue_date+'">'+value.issue_date_th+' น.</p>';
                            html += '</div>';
                        }
                        html += '</div>';
                        html += '<div class="card-body table-responsive">';
                        html += '<div class="row">';
                        html += '<div class="col-12 issue-content d-none">'+value.issue_content;
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }else {
                        let month = split_date[0].split('-');
                        month = month[1];
                        let month_th = value.issue_date_th.split(' ');
                        month_th = month_th[1] +' '+ month_th[2];
                        if (check_month != month) {
                            html += '<div class="row col-12 max-display max-line-date">';
                            html += '<div class="max-col">'+month_th;
                            html += '</div>';
                            html += '<div class="max-col"><hr>';
                            html += '</div>';
                            html += '</div>';
                            check_month = month;
                        }

                        html += '<div class="max-card-width col-lg-4 col-md-6 max-card-content-close"  style="display:none">';
                        html += '<div class="card row">';
                        html += '<div class="card-header row d-flex justify-content-between" issue-id="'+value.issue_id+'">';
                        if (value.issue_status != 'success') {
                            html += '<div class="card-header-'+value.issue_status+' max-card-text">';
                            html += '<h4 class="card-title">'+value.topic_issue+'</h4>';
                            html += ' <p class="card-category" issue-date="'+value.issue_date+'">'+value.issue_date_th+' น.</p>';
                            html += '</div>';
                            html += '<div class="card-header-warning max-card-icon btn-modal-edit-issue" data-toggle="tooltip" data-placement="right" title="คลิกเพื่อแก้ไข" data-toggle="modal" data-target=".modal-add-issue">';
                            html += '<i class="material-icons">edit</i>';
                            html += '</div>';
                        }else {
                            html += '<div class="card-header-'+value.issue_status+' max-card-text" style="flex:unset;max-width:unset">';
                            html += '<h4 class="card-title">'+value.topic_issue+'</h4>';
                            html += ' <p class="card-category" issue-date="'+value.issue_date+'">'+value.issue_date_th+' น.</p>';
                            html += '</div>';
                        }
                        html += '</div>';
                        html += '<div class="card-body table-responsive">';
                        html += '<div class="row">';
                        html += '<div class="col-12 issue-content d-none">'+value.issue_content;
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }
                });
                $('.content .list-issue').html(html).find('.max-card-width').each(function(i) {$(this).delay(100 * i).fadeIn(100);});
                // click_issue();
                open_issue_with_url();
                tooltip();

            });
        }



        //เมื่อปิด alert จะวนมาทำงาน function เดิมตลอด ต้องจับว่าเมื่อกดยืนยันจากตรงนี้จะทำการปิด modal ได้เลย
         // function นี้ทำมาเพื่อแก้ไขปัญหาเบื้องต้น
        function alert_before_modal_close(modal_close,type=''){
            $('.modal-add-issue').on('hide.bs.modal', function (e) {
                if (modal_close) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    let $tag = $(".note").contents().find("#summernote").next().find('.note-editable');
                    let val = $tag.html();
                    if (val != '') {
                        let text = 'คุณต้องการยกเลิกการแจ้งปัญหาหรือไม่';
                        if (type == 'edit') {
                            text = 'คุณต้องการยกเลิกการแก้ไขหรือไม่';
                        }
                        Swal.fire({
                            type: 'warning',
                            title: text,
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'ยืนยัน',
                            cancelButtonText: 'ยกเลิก'
                        }).then((result) => {
                            if (result.value) {
                                modal_close = false;
                                $('.modal-add-issue').modal('toggle');
                            }
                        });
                    }else {
                        modal_close = false;
                        $('.modal-add-issue').modal('toggle');
                    }
                }
            });
        }

        $('.content').on('click','.list-issue .btn-modal-edit-issue',function(){
            //for alert before modal close
            alert_before_modal_close(true,'edit');
            $('.modal-add-issue').modal('toggle');
            $('.modal-add-issue .modal-title').html('แก้ไขแจ้งปัญหา');
            if ($('.modal-add-issue .btn-success').hasClass('btn-add-issue')) {
                $('.modal-add-issue .btn-success').toggleClass('btn-add-issue btn-edit-issue');
            }else {
                $('.modal-add-issue .btn-success').addClass('btn-edit-issue');
            }
            let val = $(this).closest('.card').find('.issue-content').html();
            let issue_id = $(this).closest('.card-header').attr('issue-id');
            $('.modal-add-issue .modal-header').attr('issue-id', issue_id);
            $(".note").contents().find("#summernote").next().find('.note-editable').html(val);

            // $(".note").contents().scrollTop();
            // $('html, body').scrollTop( 300 );
        });

        $('.btn-modal-add-issue').click(function(){
            alert_before_modal_close(true);
            $('.modal-add-issue .modal-title').html('แจ้งปัญหา');
            $('.modal-add-issue .btn-success').addClass('btn-add-issue');
            if ($('.modal-add-issue .btn-edit-issue').length > 0) {
                $('.modal-add-issue .btn-edit-issue').toggleClass('btn-edit-issue btn-add-issue');
            }
            $(".note").contents().find("#summernote").next().find('.note-editable').html('');
        });



        function view_image(element){
            element.css({"position":"absolute","cursor":"move"})

            var dragging = false;
            var iX, iY;
            element.mousedown(function(e) {
                dragging = true;
                iX = e.clientX - this.offsetLeft;
                iY = e.clientY - this.offsetTop;
                this.setCapture && this.setCapture();
                return false;
            });
            document.onmousemove = function(e) {
                if (dragging) {
                    var e = e || window.event;
                    var oX = e.clientX - iX;
                    var oY = e.clientY - iY;
                    element.css({"left":oX + "px", "top":oY + "px"});
                    return false;
                }
            };
            $(document).mouseup(function(e) {
                dragging = false;
                // test.releaseCapture();
                e.cancelBubble = true;
            })
        }

        $('.modal-view-image .modal-body .image').bind('mousewheel', function(e) {
            if(e.originalEvent.wheelDelta / 120 > 0) {
                let new_width = $(this).find('img').width()+50;
                $(this).find('img').width(new_width);
            } else {
                let new_width = $(this).find('img').width()-50;
                $(this).find('img').width(new_width);
            }
        });

        //for เปิดแทบรูปใหม่ สำหรับ mobile
        $('.content').on('click','.issue-content img',function(){
            // console.log();
            // $('.modal-view-image').modal('show');
            // let img = $(this).clone();
            // $('.modal-view-image').find('.modal-body .image').html(img);
            // $('.modal-view-image').find('.modal-body .image img').css({'width':'100%'});
            // console.log($(this).attr('src'));
            if (window.matchMedia('(max-width: 768px)').matches) {
                let win = window.open($(this).attr('src'), '_blank');
                if (win) {
                    win.focus();
                }
            } else {
                $('.modal-view-image').modal('show');
                let img = $(this).clone();
                $('.modal-view-image').find('.modal-body .image').html(img);
                $('.modal-view-image').find('.modal-body .image img').css({'width':'100%'});
                view_image($('.modal-view-image').find('.modal-body .image img'));
                $('.modal-view-image').find('.modal-body .image img')
            }

        });

        function open_issue_with_url(){
            let url = '<?php echo $_GET['url'] ?>';
            if (url.indexOf('issue_id=') > -1) {
                let get_issue_id = url.split('/');
                let issue_id = get_issue_id[2].split('=');
                $('.content .list-issue .max-card-width').each(function(){
                    if ($(this).find('.card-header').attr('issue-id') == issue_id[1]) {
                        $(this).addClass('max-card-content-open');
                        $(this).removeClass('max-card-content-close');
                        $(this).addClass('col-lg-12');
                        $(this).removeClass('col-lg-4');
                        $(this).find('.issue-content').addClass('issue-content-clicked');
                        $(this).find('.btn-modal-edit-issue').toggle();
                    }
                });
            }
        }

        $('.btn-reset-issue').click(function(e){
            // let val = $(".note").contents().find("#summernote").next().find('.note-editable').html('');
            let $tag = $(".note").contents().find("#summernote").next().find('.note-editable');
            let val = $tag.html();
            if (val != '') {
                e.preventDefault();
                e.stopImmediatePropagation();
                Swal.fire({
                    type: 'warning',
                    title: 'คุณต้องการล้างข้อความทั้งหมดหรือไม่',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.value) {
                        $tag.html('');
                    }
                });
            }
        });

        $('.modal-add-issue')
        .on('click','.btn-edit-issue',function(){
            alert_before_modal_close(true,'edit');
            let $issue_id = $(this).closest('.modal-content').find('.modal-header').attr('issue-id');
            // let $issue_id = '';
            let $tag = $(".note").contents().find("#summernote").next().find('.note-editable');
            let $val = $tag.html();
            let $old_issue_content = '';
            if ($val != '') {
                $.ajax({
                    url: '<?php echo $this->base_url('employee/edit_issue') ?>',
                    method: 'post',
                    data: {issue_content:$val,issue_id:$issue_id},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        if (data[0] == 'success') {
                            let html = '';
                            $tag.html('');
                            Swal.fire({
                                type: 'success',
                                title: 'แก้ไขการแจ้งปัญหาเรียบร้อยแล้ว',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('.modal-add-issue').modal('toggle');
                            $('.content .max-card-content-open .issue-content').html($val);
                            $(".note").contents().find("#summernote").next().find('.note-editable').html('');

                            // click_issue(); // ต้องใส่เพราะฟังกืชั่นไม่ถูกเรียกใช้ใน scope นี้ ทำให้ไม่สามารถคลิกได้
                        }else if (data[0] == 'successed') {
                            Swal.fire({
                                type: 'warning',
                                title: 'ไม่สมารถแก้ไขแจ้งปัญหาได้',
                                text: 'เนื่องจากปัญหานี้ถูกแก้ไขแล้ว',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }else {
                            Swal.fire({
                                type: 'error',
                                title: 'ไม่สมารถแก้ไขแจ้งปัญหาได้',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            }else {
                Swal.fire({
                    type: 'warning',
                    title: 'กรุณากรอกข้อความ',
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    setTimeout(function(){$tag.trigger('focus');},500);
                });
            }

        })
        .on('click','.btn-add-issue',function(){
            let $tag = $(".note").contents().find("#summernote").next().find('.note-editable');
            let val = $tag.html();
            if (val != '') {
                $.ajax({
                    url: '<?php echo $this->base_url('employee/add_issue') ?>',
                    method: 'post',
                    data: {issue_content:val},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data[1].issue_date);
                        if (data[0] == 'success') {
                            let html = '';
                            $tag.html('');
                            Swal.fire({
                                type: 'success',
                                title: 'แจ้งปัญหาเรียบร้อยแล้ว',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('.modal-add-issue').modal('toggle');
                            // console.log('testt');
                            // alert_before_modal_close(true);


                            html += '<div class="max-card-width col-lg-4 col-md-6 max-card-content-close tada animated" style="display:none">';
                            html += '<div class="card">';
                            html += '<div class="card-header row justify-content-between" issue-id="'+data[1].issue_id+'">';
                            html += '<div class="card-header-'+data[1].issue_status+' max-card-text">';
                            html += '<h4 class="card-title">'+data[1].topic_issue+'</h4>';
                            html += ' <p class="card-category">'+data[1].issue_date_th+' น.</p>';
                            html += '</div>';
                            html += '<div class="card-header-warning max-card-icon btn-modal-edit-issue" data-toggle="tooltip" data-placement="right" title="คลิกเพื่อแก้ไข" data-toggle="modal" data-target=".modal-add-issue">';
                            html += '<i class="material-icons">edit</i>';
                            html += '</div>';
                            html += '</div>';
                            // html += '<div class="card-header card-header-'+data[1].issue_status+'" issue-id="'+data[1].issue_id+'">';
                            // html += '<h4 class="card-title">'+data[1].topic_issue+'</h4>';
                            // html += ' <p class="card-category">'+data[1].issue_date+' น.</p>';
                            // html += '</div>';
                            html += '<div class="card-body table-responsive">';
                            html += '<div class="row">';
                            html += '<div class="col-12 issue-content d-none">'+data[1].issue_content;
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';

                            $('.content .list-issue .card-empty-item').remove();
                            if ($('.content .list-issue .max-line-date:first-child').hasClass('line-today') == false) {
                                let line_date = '';
                                line_date += '<div class="row col-12 max-display max-line-date line-today">';
                                line_date += '<div class="max-col"> วันนี้';
                                line_date += '</div>';
                                line_date += '<div class="max-col"><hr>';
                                line_date += '</div>';
                                line_date += '</div>';
                                $('.content .list-issue').prepend(line_date);
                            }
                            $('.content .list-issue').prepend(html).find('.max-card-width').fadeIn(3000);
                            $('.content .max-line-date').eq(0).clone().prependTo('.content .list-issue');
                            $('.content .max-line-date').eq(1).remove();
                            // clearTimeout(click_issue);
                            // click_issue(); // ต้องใส่เพราะฟังกืชั่นไม่ถูกเรียกใช้ใน scpoe นี้ ทำให้ไม่สามารถคลิกได้
                        }else {
                            Swal.fire({
                                type: 'error',
                                title: 'ไม่สมารถแจ้งปัญหาได้',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            }else {
                Swal.fire({
                    type: 'warning',
                    title: 'กรุณากรอกข้อความ',
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    setTimeout(function(){$tag.trigger('focus');},500);
                });
            }

        });

        function list_issue(){
            $.ajax({
                url: '<?php echo $this->base_url("employee/list_issue_ajax") ?>',
                dataType: 'json',
                success: function(data){
                    if (data[0] == 'success') {
                        let html = '';
                        let check_month = '0';
                        let check_line_today = '0';
                        $.each(data[1],function(key,value){
                            let split_date = value.issue_date.split(' ');
                            if (split_date[0] == '<?php echo date('Y-m-d') ?>') {
                                if (check_line_today == '0') {
                                    check_line_today = '1';
                                    html += '<div class="row col-12 max-display max-line-date line-today">';
                                    html += '<div class="max-col"> วันนี้';
                                    html += '</div>';
                                    html += '<div class="max-col"><hr>';
                                    html += '</div>';
                                    html += '</div>';
                                }

                                html += '<div class="max-card-width col-lg-4 col-md-6 max-card-content-close"  style="display:none">';
                                html += '<div class="card row">';
                                html += '<div class="card-header row d-flex justify-content-between" issue-id="'+value.issue_id+'">';
                                if (value.issue_status != 'success') {
                                    html += '<div class="card-header-'+value.issue_status+' max-card-text">';
                                    html += '<h4 class="card-title">'+value.topic_issue+'</h4>';
                                    html += ' <p class="card-category" issue-date="'+value.issue_date+'">'+value.issue_date_th+' น.</p>';
                                    html += '</div>';
                                    html += '<div class="card-header-warning max-card-icon btn-modal-edit-issue" data-toggle="tooltip" data-placement="right" title="คลิกเพื่อแก้ไข" data-toggle="modal" data-target=".modal-add-issue">';
                                    html += '<i class="material-icons">edit</i>';
                                    html += '</div>';
                                }else {
                                    html += '<div class="card-header-'+value.issue_status+' max-card-text" style="flex:unset;max-width:unset">';
                                    html += '<h4 class="card-title">'+value.topic_issue+'</h4>';
                                    html += ' <p class="card-category" issue-date="'+value.issue_date+'">'+value.issue_date_th+' น.</p>';
                                    html += '</div>';
                                }
                                html += '</div>';
                                html += '<div class="card-body table-responsive">';
                                html += '<div class="row">';
                                html += '<div class="col-12 issue-content d-none">'+value.issue_content;
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                            }else {
                                let month = split_date[0].split('-');
                                month = month[1];
                                let month_th = value.issue_date_th.split(' ');
                                month_th = month_th[1] +' '+ month_th[2];
                                if (check_month != month) {
                                    html += '<div class="row col-12 max-display max-line-date">';
                                    html += '<div class="max-col">'+month_th;
                                    html += '</div>';
                                    html += '<div class="max-col"><hr>';
                                    html += '</div>';
                                    html += '</div>';
                                    check_month = month;
                                }

                                html += '<div class="max-card-width col-lg-4 col-md-6 max-card-content-close"  style="display:none">';
                                html += '<div class="card row">';
                                html += '<div class="card-header row d-flex justify-content-between" issue-id="'+value.issue_id+'">';
                                if (value.issue_status != 'success') {
                                    html += '<div class="card-header-'+value.issue_status+' max-card-text">';
                                    html += '<h4 class="card-title">'+value.topic_issue+'</h4>';
                                    html += ' <p class="card-category" issue-date="'+value.issue_date+'">'+value.issue_date_th+' น.</p>';
                                    html += '</div>';
                                    html += '<div class="card-header-warning max-card-icon btn-modal-edit-issue" data-toggle="tooltip" data-placement="right" title="คลิกเพื่อแก้ไข" data-toggle="modal" data-target=".modal-add-issue">';
                                    html += '<i class="material-icons">edit</i>';
                                    html += '</div>';
                                }else {
                                    html += '<div class="card-header-'+value.issue_status+' max-card-text" style="flex:unset;max-width:unset">';
                                    html += '<h4 class="card-title">'+value.topic_issue+'</h4>';
                                    html += ' <p class="card-category" issue-date="'+value.issue_date+'">'+value.issue_date_th+' น.</p>';
                                    html += '</div>';
                                }
                                html += '</div>';
                                html += '<div class="card-body table-responsive">';
                                html += '<div class="row">';
                                html += '<div class="col-12 issue-content d-none">'+value.issue_content;
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                            }
                        });

                        // loader($('.content .list-issue'),'remove');
                        $('.content .list-issue').html(html).find('.max-card-width').each(function(i) {$(this).delay(100 * i).fadeIn(150);});
                        click_issue();
                        open_issue_with_url();
                        tooltip();

                        search_sort(data[1]);

                    }else {
                        let html = '';
                        html += '<div class="row col-md-12 justify-content-md-center card-empty-item">';
                        html += '<div class="col-sm-12 col-md-7 col-lg-4">';
                        html += '<div class="card">';
                        html += '<div class="card-header card-header-warning text-center">';
                        html += '<h4 class="card-title">ยังไม่มีการแจ้งปัญหา</h4>';
                        // html += '<p class="category">Category subtitle</p>';
                        html += '</div>';
                        html += '<div class="card-body text-center">';
                        html += 'ท่านสามารถแจ้งปัญหากับ IT ได้ที่ปุ่ม <i class="material-icons">add_circle</i> แจ้งปัญหา <div class="d-sm-none d-md-none d-lg-block">ทางซ้ายมือ</div> <div class="d-sm-block d-md-block d-lg-none">>> ที่ <i class="material-icons">menu</i> แถบเมนู <<</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '';
                        html += '';
                        html += '';
                        // $('.content .list-issue').html('ยังไม่มีข้อมูล..');
                        $('.content .list-issue').html(html);
                    }
                }
            });
        }


        $('.max-wrapper')
        .on('click',function(event){
            let div = $('.content .max-card-width.max-card-content-open');
            div.removeClass('max-card-content-open');
            div.addClass('max-card-content-close');
            div.removeClass('col-lg-12');
            div.addClass('col-lg-4');
            div.find('.issue-content').removeClass('issue-content-clicked');
            if (div.find('.btn-modal-edit-issue').is(':visible') != true) {
                div.find('.btn-modal-edit-issue').toggle(150);
            }else {
                div.find('.btn-modal-edit-issue').hide();
            }
            change_url(); // for default url

        })
        .on('click','.max-card-width',function(event){
            event.stopPropagation();
        });

        function click_issue(){
            $('.content').on('click','.max-card-width .card-header .max-card-text',function(){
                let $check_max_clicked = false;
                if ($(this).closest('.max-card-width').hasClass('max-clicked') != true) {
                    $check_max_clicked = true;
                }
                $.each($(this).closest('.list-issue').find('.max-card-width'),function(key,value){
                    $(this).removeClass('max-clicked');
                });
                if ($check_max_clicked) {
                    $(this).closest('.max-card-width').addClass('max-clicked');
                }

                if ($(this).closest('.max-card-width').hasClass('max-card-content-open')) {
                    change_url();  // for default url
                }else {
                    let issue_id = $(this).closest('.card-header').attr('issue-id');
                    change_url('/issue_id='+issue_id);
                }

                $(this).closest('.card').find('.issue-content').toggleClass('issue-content-clicked'); // เปิด content
                $(this).closest('.max-card-width').toggleClass('col-lg-4 col-lg-12'); // ขยาย card
                $(this).closest('.max-card-width').toggleClass('max-card-content-open max-card-content-close'); // absolute card
                if ($(this).closest('.max-card-width').find('.btn-modal-edit-issue').is(':visible') != true) {
                    $(this).closest('.max-card-width').find('.btn-modal-edit-issue').toggle(150);
                }else {
                    $(this).closest('.max-card-width').find('.btn-modal-edit-issue').hide();
                }
                $('html, body').animate({scrollTop:$(this).offset().top - 50}, 'slow'); // focus card ที่ click

                $.each($(this).closest('.list-issue').find('.max-card-width'),function(key,value){
                    if ($(this).hasClass('max-clicked') != true) {
                        $(this).removeClass('max-card-content-open');
                        $(this).addClass('max-card-content-close');
                        $(this).removeClass('col-lg-12');
                        $(this).addClass('col-lg-4');
                        $(this).find('.issue-content').removeClass('issue-content-clicked');
                        $(this).find('.btn-modal-edit-issue').hide();
                    }
                });
            });
        }


        //button for mobile | click for go to top page
        function btn_to_top(){
            let btn = '<div class="btn to_top"><i class="material-icons">&#xe316;</i></div>';
                $('body').append(btn);
                var win = $(window);
                win.scroll(function() {
                    if (win.scrollTop() >= 100) {
                        $('.to_top').css({
                            'bottom': '.2rem'
                        });
                    }else {
                        $('.to_top').css({
                            'bottom': '-5.6rem'
                        });
                    }
                });
                $('body .to_top').click(function(){
                    $('html, body').animate({scrollTop:0}, 'slow');
                });
        }

        //change url
        function change_url(url=''){
            let now_url = window.location.href;
            let main_url = '';

            if (now_url.indexOf('/issue_id=') > -1) { // กรณีมี issue_id อยู่ก่อนหน้า
                let get_url = now_url.split('/issue_id=');
                main_url = get_url[0]
            }else {
                if (now_url.indexOf('list_issue/') > -1) { //กรณี list_issue มี / ติดมาด้วย
                    now_url = now_url; //กรณีนี้ ต้องเติม list_issue เนื่องจากมันจะตัด list_issue ออกตอน pushState url เพราะไม่มี /ต่อถ่าย
                }
                main_url = now_url;
            }

            let new_url = main_url+url;
            window.history.pushState("data","Title",new_url);
            // document.title=url;
        }

        function loader(inner,status=''){
            switch (status) {
                case 'remove':
                    inner.find('.max-loader').remove();
                    break;
                default:
                    let $html_loader = '<div class="col-12 row justify-content-center">';
                        $html_loader += '<div class="wrap-loader max-loader"><div class="loader"><div class="circle one"></div><div class="circle two"></div><div class="circle three"></div></div></div>';
                        $html_loader += '</div>';
                    inner.html($html_loader);
            }
        }

        //function tooltip of bootstrap 4
        function tooltip(){
            $('[data-toggle="tooltip"]').tooltip();
        }




        // functoin ระบบ sidebar และ พื้นฐานของ template
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
<!-- toggle menu when mobile mode -->
  <script type="text/javascript">
      (function() {
        isWindows = navigator.platform.indexOf('Win') > -1 ? true : false;

        if (isWindows) {
          // if we are on windows OS we activate the perfectScrollbar function
          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          $('html').addClass('perfect-scrollbar-on');
        } else {
          $('html').addClass('perfect-scrollbar-off');
        }
      })();
      var mobile_menu_visible = 0;
      $(document).on('click', '.navbar-toggler', function() {
          $toggle = $(this);

          if (mobile_menu_visible == 1) {
              $('html').removeClass('nav-open');

              $('.close-layer').remove();
              setTimeout(function() {
                  $toggle.removeClass('toggled');
              }, 400);

              mobile_menu_visible = 0;
          } else {
              setTimeout(function() {
                  $toggle.addClass('toggled');
              }, 430);

              var $layer = $('<div class="close-layer"></div>');

              if ($('body').find('.main-panel').length != 0) {
                  $layer.appendTo(".main-panel");

              } else if (($('body').hasClass('off-canvas-sidebar'))) {
                  $layer.appendTo(".wrapper-full-page");
              }

              setTimeout(function() {
                  $layer.addClass('visible');
              }, 100);

              $layer.click(function() {
                  $('html').removeClass('nav-open');
                  mobile_menu_visible = 0;

                  $layer.removeClass('visible');

                  setTimeout(function() {
                      $layer.remove();
                      $toggle.removeClass('toggled');

                  }, 400);
              });

              $('html').addClass('nav-open');
              mobile_menu_visible = 1;

          }

      });
  </script>
</body>

</html>
