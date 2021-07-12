<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Repair Order</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo $this->public_url('libs/material/') ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
  <link href="<?php echo $this->public_url('css/loading.css') ?>" rel="stylesheet" />
  <link href="<?php echo $this->public_url('libs/chosen/css/component-chosen.min.css') ?>" rel="stylesheet" />
  <link href="<?php echo $this->public_url('libs/maxchosen/maxchosen.css') ?>" rel="stylesheet" />
  <style media="screen">
      body,h1,h2,h3,h4,h5,h6{
          font-family: 'Mali', cursive;
      }
      .form-control,.is-focused .form-control {
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
      @media (min-width: 768px){
          table.tb-ro-list th {
              font-size: 11px !important;
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
          width: 10%;
      }
      .max-display > .max-col:last-child{
          width: 90%;
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
      select {
        text-align: center;
        text-align-last: center;
        /* webkit*/
      }
      option {
        text-align: left;
        /* reset to left*/
      }

      /*table*/
      .wrap-card-quotation .table .row{
          padding: 0px !important;
      }
      .wrap-card-quotation .table.table-bordered{
          border: 0px !important;
      }
      .wrap-card-quotation .table-bordered th,
      .wrap-card-quotation .table-bordered td {
        border: 1px solid #736a6a !important;
      }
      .wrap-card-quotation .table th{
          border-right: 0px !important;
          border-bottom: 0px !important;
      }
      .wrap-card-quotation .table th:last-child{
          border-right: 1px solid #736a6a !important;
      }
      .wrap-card-quotation .table tr > td{
          border-right: 0px !important;
      }
      .wrap-card-quotation .table tr.list-q_product:last-child > td{
          border-bottom: 0px !important;
      }
      .wrap-card-quotation .table tr > td:last-child{
          border-right: 1px solid #736a6a !important;
      }
      .wrap-card-quotation .table tr:not(:first-child) > td{
          border-top: 0px !important;
      }
      /*form add question*/
      .bmd-form-group .form-control, .bmd-form-group label, .bmd-form-group input::placeholder{
          line-height: 3.1;
      }
      .form-add-ro .row{
          padding-top: 5px;
          padding-bottom: 5px;
      }
      .bmd-form-group:not(.has-success):not(.has-danger) [class^='bmd-label'].bmd-label-floating, .bmd-form-group:not(.has-success):not(.has-danger) [class*=' bmd-label'].bmd-label-floating{
          color: #000000;
      }
      .wrap-input{
          padding-top: 5px;
          padding-bottom: 5px;
      }
      /*check box*/
      .form-check .form-check-input:checked+.form-check-sign .check {
          background: #04afc4;
      }

      /*preview quotation*/
      .wrap-data-ro .q_to,.wrap-data-ro .q_to_detail{
          padding: 10px 0px;
      }
      .wrap-data-ro .table.q_product th{
          border-top:1px solid #ccc;
          border-left:1px solid #ccc;
          border-bottom: 4px double #000 !important;
      }
      .wrap-data-ro .table.q_product th:last-child{
          border-right:1px solid #ccc;
      }
      .wrap-data-ro .table.q_product td{
          border-left:1px solid #ccc;
          /* text-align: center; */
      }
      .wrap-data-ro .table.q_product td:last-child{
          border-right:1px solid #ccc;
      }
      .wrap-data-ro .table.q_product tr:last-child td{
          border-bottom:1px solid #ccc;
      }
      .loading-screen[data-v-149f84da] {
          display: -webkit-box;
          display: -ms-flexbox;
          display: flex;
          -webkit-box-align: center;
          -ms-flex-align: center;
          align-items: center;
          -webkit-box-pack: center;
          -ms-flex-pack: center;
          justify-content: center;
          height: 100vh;
          width: 100vw;
          position: fixed;
          top: 0;
          left: 0;
          z-index: 300;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
          -ms-flex-direction: column;
          flex-direction: column;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
      }

      .loading-screen {
          z-index: 999999!important;
      }
      .loading-circle[data-v-149f84da] {
          width: 50px;
          height: 50px;
          border-radius: 100%;
          border: 2px solid transparent;
          border-left-color: #ababab;
          /* -webkit-animation: circleanimation-data-v-149f84da .45s linear infinite; */
          animation: circleanimation-data-v-149f84da .45s linear infinite;
      }
      .loading-text[data-v-149f84da] {
          margin-top: 15px;
          color: grey;
          font-size: 12px;
      }
      /*shadow*/
      .shadow-sm{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.shadow{box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important}.shadow-lg{box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important}.shadow-none{box-shadow:none!important}

      /*table list product ro*/
      /* .table tbody tr:last-child{
          border-bottom: 1px solid #736a6a;
      } */

      /*help-block*/
      .wrap-ro-support-type .help-block-check{
          left: 26%;
      }
      .wrap-ro-working-result-type .help-block-check,.ro_working_result_product_status .help-block-check{
          bottom: 110%;
          left: 38%;
      }
      .bg-ro{
          background-color: #b6b6be;
      }
      .border-ro{
          border-color: #717177 !important;
      }
      .text-ro{
          color: #717177;
      }
      .max-content{
          width: max-content !important;
      }
      .border-ro-input{
          height: fit-content;
          padding-left: 10px;
          border-bottom: 1px dotted #717177;
      }
      .modal-preview-ro .form-check .form-check-input:checked+.form-check-sign .check{
              background: #000000;
      }
  </style>
</head>

<body class="">
    <div data-v-149f84da="" class="loading-screen" style="background-color: rgba(255, 255, 255, 0.7); display: none;">
        <div data-v-149f84da="">
            <div class="wrap-loader max-loader">
                <div class="loader">
                    <div class="circle one"></div>
                    <div class="circle two"></div>
                    <div class="circle three"></div>
                </div>
            </div>
            <!-- <img class="max-loader-gif col-md-12" src="<?php echo $this->public_url('file/images/system/Loading_2.gif') ?>"> -->
        </div>
    </div>
    <div class="modal fade bd-example-modal-xl modal-loading-data" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">ใบแจ้งซ่อม</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body wrap-data-ro p-3"></div>
                <div class="modal-footer d-flex justify-content-between"></div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl modal-preview-ro" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">ใบแจ้งซ่อม</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body wrap-data-ro p-3">

                </div>
                <div class="modal-footer d-flex justify-content-between"></div>
            </div>
        </div>
    </div>


  <div class="wrapper max-wrapper">
      <?php $this->view('partail/left_nav') ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">รายการแจ้งซ่อม</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse max-top-nav justify-content-end">
            <ul class="nav justify-content-end">
                <?php if ($_SESSION['user']->position == 'Service Ad.' or $_SESSION['user']->position == 'Programmer' or $_SESSION['user']->position == 'Service Eng.'): ?>
                    <li class="nav-item">
                        <a class="nav-link bg-success btn-modal-add-ro" href="javascript:void(0)">
                            <i class="material-icons text-white">add_circle</i>
                            <p class="text-white d-block">สร้างใบแจ้งซ่อม</p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
          </div>
        </div>
        <hr>
      </nav>
      <!-- End Navbar -->
      <div class="content">
          <div class="col-md-12 col- d-lg-none d-md-block d-sm-block p-3 text-right">
              <button class="btn max-col-sm-12 col-md-3 btn-modal-add-issue bg-success btn-modal-add-ro" >
                      <i class="material-icons text-white">add_circle</i>&nbsp;&nbsp;สร้างใบแจ้งซ่อม
              </button>
          </div>
        <div class="container-fluid">
            <div class="row row-form-ro" style="display:none">
                <div class="col-md-12 wrap-card-quotation">
                    <div class="card">
                        <div class="row justify-content-between pl-4 pr-4 header-add-ro">
                            <div class="col-md-11 card-header card-header-info">
                                <h4 class="card-title">สร้างใบแจ้งซ่อม</h4>
                            </div>
                        </div>
                        <div class="row justify-content-between pl-4 pr-4 header-edit-ro" style="display:none">
                            <div class="col-md-8 card-header card-header-warning">
                                <h4 class="card-title">แก้ไขใบแจ้งซ่อม</h4>
                            </div>
                            <div class="col-md-3 card-header card-header-warning text-center">
                                <p class="card-category text-white ro_number"></p>
                                <p class="card-category text-white ro_create_date">วันที่ <?php echo $this->date_th(date('Y-m-d'),2); ?></p>
                            </div>
                        </div>
                        <div class="card-body p-5">
                                <form class="form-add-ro">
                                    <input type="hidden" name="type" value="">
                                    <input type="hidden" name="ro_id" value="">
                                    <input type="hidden" name="add_ro" value="1">
                                    <div class="row wrap-customer-detail">
                                        <div class="col-md-12 p-2 rounded customer-detail-head text-center bg-info text-white shadow-sm"><h4><b>เกี่ยวกับใบงาน</b></h4></div>
                                        <div class="col-md-12 customer-detail-body p-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating"><strong>หมายเลขใบงานซ่อม</strong></label>
                                                        <input type="text" class="form-control" name="ro_number_manual" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row wrap-customer-detail">
                                        <div class="col-md-12 p-2 rounded customer-detail-head text-center bg-info text-white shadow-sm"><h4><b>รายละเอียดลูกค้า</b></h4></div>
                                        <div class="col-md-12 customer-detail-body p-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group bmd-form-group">
                                                        <select class="form-control form-control-chosen list-customer" name="ro_customer_id" required></select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating"><strong>แผนก</strong></label>
                                                        <input type="text" class="form-control" name="ro_customer_department" value="CCU" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 wrap-input">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating"><strong>ชื่อผู้ติดต่อ</strong></label>
                                                        <input type="text" class="form-control" name="ro_customer_name" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 wrap-input">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating"><strong>email</strong></label>
                                                        <input type="text" class="form-control" name="ro_customer_email" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 wrap-input">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating"><strong>โทรศัพท์</strong></label>
                                                        <input type="text" class="form-control" name="ro_customer_tel" value="" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row wrap-equipment-detail">
                                        <div class="col-md-12 p-2 rounded customer-detail-head text-center bg-info text-white shadow-sm"><h4><b>รายละเอียดเครื่อง</b></h4></div>
                                        <div class="col-md-12 customer-detail-body p-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating"><strong>เครื่อง</strong></label>
                                                        <input type="text" class="form-control" name="ro_product_name" value="Central Monitor" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating"><strong>Model</strong></label>
                                                        <input type="text" class="form-control" name="ro_product_model" value="M3150A" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating"><strong>Serial No.</strong></label>
                                                        <input type="text" class="form-control" name="ro_product_serial" value="2UA90303LJ" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 row wrap-ro-support-type">
                                                    <div class="col-md-3">
                                                        <label class="bmd-label-floating text-dark"><strong>Support Type (<i class="material-icons">done</i>)</strong></label>
                                                    </div>
                                                    <div class="col-md-9 row d-flex justify-content-between wrap-support-type">
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label text-dark">
                                                                    <input class="form-check-input" type="checkbox" value="time&material" name="ro_support_type" required>
                                                                    Time & Material
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label text-dark">
                                                                    <input class="form-check-input" type="checkbox" value="warranty" name="ro_support_type" required>
                                                                    Warranty
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label text-dark">
                                                                    <input class="form-check-input" type="checkbox" value="service_contact" name="ro_support_type" required>
                                                                    Service Contract
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label text-dark">
                                                                    <input class="form-check-input" type="checkbox" value="sale_support" name="ro_support_type" required>
                                                                    Sale Support
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label text-dark">
                                                                    <input class="form-check-input" type="checkbox" value="instrallation" name="ro_support_type" required>
                                                                    Instrallation
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label text-dark">
                                                                    <input class="form-check-input" type="checkbox" value="demo" name="ro_support_type" required>
                                                                    Demo
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row wrap-repair-order">
                                        <div class="col-md-12 p-2 rounded repair-order-head text-center bg-info text-white shadow-sm"><h4><b>รายการที่แจ้งให้ปฏิบัติงาน</b></h4></div>
                                        <div class="col-md-12 repair-order-body p-2">
                                            <div class="row item-repair-order">
                                                <div class="col-md-12">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating"><strong>รายการที่ 1</strong></label>
                                                        <input type="text" class="form-control" name="ro_infrom[]" value="ทำการ config แล้วพบว่า ups bettery เสื่อม">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 repair-order-footer text-center">
                                            <button type="button" class="btn btn-success btn-add-repair-order"><i class="material-icons">add</i>เพิ่มรายการ</button>
                                        </div>
                                    </div>
                                    <div class="row wrap-repair-detail">
                                        <div class="col-md-12 p-2 rounded repair-detail-head text-center bg-info text-white shadow-sm"><h4><b>รายละเอียดการปฏิบัติงาน</b></h4></div>
                                        <div class="col-md-12 repair-detail-body p-2">
                                            <div class="row">
                                                <div class="col-md-12 row">
                                                    <div class="col-md-9 border-right border-dark">
                                                        <div class="list-repair-detail">
                                                            <div class="row item-repair-detail">
                                                                <div class="col-md-12">
                                                                    <div class="form-group bmd-form-group">
                                                                        <label class="bmd-label-floating"><strong>รายการที่ 1</strong></label>
                                                                        <input type="text" class="form-control" name="ro_working_list[]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row footer-repair-detail">
                                                            <div class="col-md-12 text-center">
                                                                <button type="button" class="btn btn-success btn-add-repair-detail"><i class="material-icons">add</i>เพิ่มรายการ</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 row">
                                                        <div class="col-md-12"><strong>ผลการดำเนินงาน :</strong></div>
                                                        <div class="col-md-12 row wrap-ro-working-result-type">
                                                            <div class="col-md-12">
                                                                <div class="form-check">
                                                                    <label class="form-check-label text-dark">
                                                                        <input class="form-check-input" type="checkbox" value="work" name="ro_working_result_type">
                                                                        ใช้งานได้ปกติ
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-check">
                                                                    <label class="form-check-label text-dark">
                                                                        <input class="form-check-input" type="checkbox" value="get_back" name="ro_working_result_type">
                                                                        ยกเครื่องกลับ
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-check">
                                                                    <label class="form-check-label text-dark">
                                                                        <input class="form-check-input" type="checkbox" value="quotation" name="ro_working_result_type">
                                                                        เสนอราคา
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-check">
                                                                    <label class="form-check-label text-dark">
                                                                        <input class="form-check-input" type="checkbox" value="other" name="ro_working_result_type">
                                                                        อื่นๆ
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating"><strong>รายละเอียด</strong></label>
                                                                    <input type="text" class="form-control" name="ro_working_result_detail" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 row border-top pt-3 border-dark border-bottom">
                                                    <div class="col-md-9 border-dark border-right">
                                                        <div class="form-group bmd-form-group">
                                                            <label class="bmd-label-floating"><strong>อุปกรณ์ประกอบเครื่อง :</strong></label>
                                                            <input type="text" class="form-control" name="ro_equipment_product" value="">
                                                        </div>
                                                    </div>
                                                    <?php if ($_SESSION['user']->position == 'Service Eng.'): ?>
                                                        <?php else: ?>
                                                            <div class="col-md-3 p-0">
                                                                <div class="col-md-12 wrap-input wrap-list-service">
                                                                    <div class="form-group bmd-form-group">
                                                                        <select class="form-control form-control-chosen list-service-name" name="ro_working_service_id"></select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group bmd-form-group">
                                                                        <!-- <input type="datetime-local" class="form-control" name="ro_working_date" value="<?php echo date('Y-m-d\TH:i') ?>" required> -->
                                                                        <input type="datetime-local" class="form-control" name="ro_working_date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row wrap-repair-result">
                                        <div class="col-md-12 p-2 rounded repair-result-head text-center bg-info text-white shadow-sm"><h4><b>ผลการดำเนินงาน</b></h4></div>
                                        <div class="col-md-12 repair-result-body p-2">
                                            <div class="row">
                                                <div class="col-md-12 row border-bottom border-dark">
                                                    <div class="col-md-9 border-right border-dark">
                                                        <div class="list-repair-result">
                                                            <div class="row item-repair-result">
                                                                <div class="col-md-12">
                                                                    <div class="form-group bmd-form-group is-filled">
                                                                        <label class="bmd-label-floating"><strong>รายการที่ 1</strong></label>
                                                                        <input type="text" class="form-control" name="ro_working_result_list[]" value="ทำการเปลี่ยน ups ให้แผนก">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row footer-repair-result">
                                                            <div class="col-md-12 text-center">
                                                                <button type="button" class="btn btn-success btn-add-repair-result"><i class="material-icons">add</i>เพิ่มรายการ</button>
                                                            </div>
                                                        </div>
                                                        <?php if ($_SESSION['user']->position == 'Service Eng.'): ?>
                                                            <?php else: ?>
                                                                <div class="row pl-0 pr-0">
                                                                    <div class="col-md-8 pl-0">
                                                                        <div class="col-md-12 wrap-input wrap-list-service">
                                                                            <div class="form-group bmd-form-group">
                                                                                <select class="form-control form-control-chosen list-service-name" name="ro_working_result_service_id"></select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group bmd-form-group">
                                                                            <!-- <input type="date" class="form-control" name="ro_working_result_date" value="<?php echo date('Y-m-d') ?>" required> -->
                                                                            <input type="date" class="form-control" name="ro_working_result_date">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-3 row">
                                                        <div class="col-md-12"><strong>สถานะเครื่อง :</strong></div>
                                                        <div class="col-md-12 row wrap-ro-working-result-product-status">
                                                            <div class="col-md-12">
                                                                <div class="form-check">
                                                                    <label class="form-check-label text-dark">
                                                                        <input class="form-check-input" type="checkbox" value="work" name="ro_working_result_product_status">
                                                                        ใช้งานได้ปกติ
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-check">
                                                                    <label class="form-check-label text-dark">
                                                                        <input class="form-check-input" type="checkbox" value="get_back" name="ro_working_result_product_status">
                                                                        ยกเครื่องกลับ
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-check">
                                                                    <label class="form-check-label text-dark">
                                                                        <input class="form-check-input" type="checkbox" value="other" name="ro_working_result_product_status">
                                                                        อื่นๆ
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating"><strong>รายละเอียด</strong></label>
                                                                    <input type="text" class="form-control" name="ro_working_result_product_detail" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row wrap-ro-product">
                                        <div class="col-md-12">
                                            <table class="table table-bordered col-md-12 list-ro-product" border="">
                                                <thead class="text-info">
                                                    <tr class="row">
                                                        <th class="text-center col-md-2">รหัสสินค้า</th>
                                                        <th class="text-center col-md-5">รายการ</th>
                                                        <th class="text-center col-md-1">จำนวน</th>
                                                        <th class="text-center col-md-2">ราคา/หน่วย</th>
                                                        <th class="text-center col-md-2">ราคารวม</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="row item-ro-product">
                                                        <td class="col-md-2">
                                                            <div class="form-group bmd-form-group">
                                                                <select class="form-control form-control-chosen list-product-id" name="rod_product_id[]" data-placeholder="ค้นหาสินค้า.."><option value="">ค้นหาสินค้า..</option></select>
                                                            </div>
                                                        </td>
                                                        <td class="col-md-5">
                                                            <div class="form-group bmd-form-group">
                                                                <select class="form-control form-control-chosen list-product-name" data-placeholder="ค้นหาสินค้า.."><option value="">ค้นหาสินค้า..</option></select>
                                                            </div>
                                                        </td>
                                                        <td class="col-md-1">
                                                            <div class="form-group bmd-form-group">
                                                                <label class="bmd-label-floating"><strong>จำนวน</strong></label>
                                                                <input type="number" class="form-control text-center ro-quanity" name="rod_product_unit[]" min="0">
                                                            </div>
                                                        </td>
                                                        <td class="col-md-2">
                                                            <div class="form-group bmd-form-group select-price">
                                                                <select class="custom-select list-price" name="rod_product_price[]">
                                                                    <option value="">กรุณาเลือกสินค้าก่อน..</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group bmd-form-group input-price" style="display:none">
                                                                <label class="bmd-label-floating"><strong>ราคา</strong></label>
                                                                <input type="number" class="form-control text-center" name="" min="0">
                                                            </div>
                                                            <div class="form-check row d-flex justify-content-center">
                                                                <div class="col-md-2">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input manual-price" type="checkbox" value="">
                                                                            <span class="form-check-sign">
                                                                                <span class="check"></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-7 text-center" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>
                                                            </div>
                                                        </td>
                                                        <td class="col-md-2 text-center"></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="row">
                                                        <td class="col-md-8" style="border-top: 0px !important;border-bottom: 0px !important;border-left: 0px !important;border-right: 0px !important;"></td>
                                                        <td class="col-md-2 text-center" style="border-top: 0px !important;"><strong>รวมทั้งสิ้น</strong></td>
                                                        <td class="col-md-2 total-price text-center" style="border-top: 0px !important;"></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-success btn-add-ro-product"><i class="material-icons">add</i> เพิ่มสินค้า</button>
                                        </div>
                                    </div>
                                    <div class="row wrap-ro-detail">
                                        <div class="col-md-12 row">
                                            <div class="col-md-5">
                                                <div class="form-group bmd-form-group">
                                                    <select class="form-control form-control-chosen list-quotation" name="ro_quotation_id"></select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group bmd-form-group">
                                                    <input type="date" class="form-control" name="ro_quotation_date" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-5">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating"><strong>Invoice/Delivery Order No.</strong></label>
                                                    <input type="text" class="form-control" name="ro_invoice_number" value="" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group bmd-form-group">
                                                    <input type="date" class="form-control" name="ro_invoice_date" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-5">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating"><strong>Order Form No.</strong></label>
                                                    <input type="text" class="form-control" name="ro_of_number" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group bmd-form-group">
                                                    <input type="date" class="form-control" name="ro_of_date" >
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-5">
                                                <div class="form-group bmd-form-group">
                                                    <input type="date" class="form-control" name="ro_auditor_date" value="" required>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12 text-right">ประวัติเครื่อง</div> -->
                                    <div class="clearfix"></div>
                                </form>
                        </div>
                            <div class="card-footer text-center justify-content-between">
                                <a class="btn btn-danger btn-cancel-ro" href="javascript:void(0)"><h4><i class="material-icons mr-3">cancel</i>ยกเลิก</h4></a>
                                <a class="btn btn-success btn-add-ro" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>
                            </div>
                        </div>
                    </div>
                    <hr>
            </div>
            <div class="navbar">
                <form class="form-search col-md-12">
                    <div class="row justify-content-around d-flex">
                        <div class="form-group">
                            <label class="text-dark">เลขที่ใบแจ้งซ่อม : </label>
                            <div class="form-group bmd-form-group">
                                <input type="text" class="form-control search-q_number" name="search-number"  value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">วันที่เริ่มต้น : </label>
                            <div class="form-group bmd-form-group">
                                <input type="date" class="form-control search-date-start" name="search-date-start"  value="">
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
                                <select class="custom-select search-ro_working_result_type" name="search-ro_working_result_type">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-ro_working_result_product_status" name="search-ro_working_result_product_status">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-sort" name="search-sort" aria-label="Example select with button addon">
                                    <option value="">จัดเรียง</option>
                                    <option value="desc">ล่าสุด - เก่าสุด</option>
                                    <option value="asc">เก่าสุด - ล่าสุด</option>
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
                </form>
            </div>

            <div class="row list-quotation">
                <div class="col-lg-12 col-md-12">
              <div class="card card-equipment-list">
                <div class="card-header row d-flex justify-content-between">
                    <div class="card-header-info col-8">
                        <h4 class="card-title">รายการใบแจ้งซ่อม</h4>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-header-info text-center" style="width: fit-content !important">
                        <h4 class="card-title">ทั้งหมด <b>0</b> รายการ</h4>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover tb-ro-list">
                        <thead class="text-info">
                            <tr>
                                <th>เลขที่ใบแจ้งซ่อม</th>
                                <th>สถานที่</th>
                                <th>ผลการดำเนินงาน</th>
                                <th>สถานะเครื่อง</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
              </div>
            </div>
            </div>
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
 <script src="<?php echo $this->public_url('libs/chosen/js/chosen.jquery.min.js') ?>"></script>
 <script src="<?php echo $this->public_url('libs/maxchosen/maxchosen.js') ?>"></script>
  <!-- <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script> -->


  <script type="text/javascript">

    $(document).ready(function() {
        //ต้องมีด้วยว่าคนไหนมีสิทธิ์ search อะไรบ้าง
            //น่าจะตามสิทธิ์ที่เห็นได้ว่าเห็นอะไรได้ บ้าง
        // $('.modal-preview-ro').modal('show');
        // $('.row-form-ro').show(500);
        // $('.modal-preview-ro').modal('show');


        // setInterval(test, 3000); // ทำ notification paramiter เป็น (function(),timer)
        btn_to_top();
        material_input();
        list_customer();
        list_product();
        // loading_gif($('.form-add-ro .table-q_product  .item-ro-product'));
        get_number_quotation();
        list_service_name();
        list_ro();
        list_brand();
        list_quotation();

        function list_quotation(){
            $.ajax({
                url: '<?php echo $this->base_url('Repair_order/list_quotation') ?>',
                dataType: 'json',
                success: function (data){
                    if (data[0] == 'success') {
                        let html = '<option value="">รายการใบเสนอราคา</option>';
                        $.each(data[1],function(key,value){
                            let tel = '';
                            if (value.tel != '') {
                                tel = value.tel;
                            }
                            html += '<option value="'+value.q_id+'">'+value.quotation_number+'</option>';
                        });
                        $('.row-form-ro .list-quotation').html(html);
                        max_chosen($('.row-form-ro .list-quotation'));
                    }
                }
            });
        }
        $('.row-form-ro').on('click','.wrap-ro-support-type input[type=checkbox]',function(){
            if ($(this).prop('checked') == true) {
                $(this).closest('.wrap-support-type').find('input[type=checkbox]').prop('checked',false);
                $(this).prop('checked',true);
            }
        });

        $('.row-form-ro')
        .on('click','.wrap-repair-order .btn-add-repair-order',function(){
            let clone = $(this).closest('.wrap-repair-order').find('.item-repair-order:first-child').closest('.row:first-child').clone();
            $(this).closest('.wrap-repair-order').find('.repair-order-body').append(clone);
            let html = '<div class="col-md-12"><button type="button" class="btn btn-danger d-block btn-delete-item-repair-order" style="float:unset;margin:auto"><i class="material-icons">delete</i></button></div>';
            // let html = '<div class="col-md-1"><button type="button" class="btn btn-danger d-block btn-delete-item-repair-order" style="float:unset;margin:auto">ลบ</button></div>';
            $(this).closest('.wrap-repair-order').find('.item-repair-order:last-child').append(html);
            // $(this).closest('.wrap-repair-order').find('.item-repair-order:last-child .col-md-12').toggleClass('col-md-12 col-md-11');
            let num_order = $(this).closest('.wrap-repair-order').find('.item-repair-order:last-child').index() + 1 ;
            $(this).closest('.wrap-repair-order').find('.item-repair-order:last-child label strong').html('รายการที่ '+num_order);
        })
        .on('click','.wrap-repair-order .btn-delete-item-repair-order',function(){
            $(this).closest('.item-repair-order').remove();
            $('.row-form-ro').find('.repair-order-body .item-repair-order').each(function(key,value){
                $(this).find('label strong').html('รายการที่ '+(key+1));
            });
        })
        .on('click','.wrap-repair-detail .repair-detail-body .btn-add-repair-detail',function(){
            let clone = $(this).closest('.wrap-repair-detail').find('.list-repair-detail .row:first-child').clone();
            $(this).closest('.wrap-repair-detail').find('.list-repair-detail').append(clone);
            let html = '<div class="col-md-12"><button type="button" class="btn btn-danger d-block btn-delete-item-repair-detail" style="float:unset;margin:auto"><i class="material-icons">delete</i></button></div>';
            $(this).closest('.wrap-repair-detail').find('.item-repair-detail:last-child').append(html);
            $(this).closest('.wrap-repair-detail').find('.item-repair-detail:last-child .col-md-12').toggleClass('col-md-12 col-md-12');
            let num_order = $(this).closest('.wrap-repair-detail').find('.item-repair-detail:last-child').index() + 1 ;
            $(this).closest('.wrap-repair-detail').find('.item-repair-detail:last-child label strong').html('รายการที่ '+num_order);
        })
        .on('click','.wrap-repair-detail .btn-delete-item-repair-detail',function(){
            $(this).closest('.item-repair-detail').remove();
            $('.row-form-ro').find('.repair-detail-body .item-repair-detail').each(function(key,value){
                $(this).find('label strong').html('รายการที่ '+(key+1));
            });
        })
        .on('click','.wrap-ro-working-result-type input[type=checkbox]',function(){
            if ($(this).prop('checked') == true) {
                $(this).closest('.wrap-ro-working-result-type').find('input[type=checkbox]').prop('checked',false);
                $(this).prop('checked',true);
            }
        })
        .on('click','.wrap-repair-result .repair-result-body .btn-add-repair-result',function(){
            let clone = $(this).closest('.wrap-repair-result').find('.list-repair-result .row:first-child').clone();
            $(this).closest('.wrap-repair-result').find('.list-repair-result').append(clone);
            // let html = '<div class="col-md-1"><button type="button" class="btn btn-danger d-block btn-delete-item-repair-result" style="float:unset;margin:auto">ลบ</button></div>';
            let html = '<div class="col-md-12"><button type="button" class="btn btn-danger d-block btn-delete-item-repair-result" style="float:unset;margin:auto"><i class="material-icons">delete</i></button></div>';
            $(this).closest('.wrap-repair-result').find('.item-repair-result:last-child').append(html);
            // $(this).closest('.wrap-repair-result').find('.item-repair-result:last-child .col-md-12').toggleClass('col-md-12 col-md-11');
            let num_order = $(this).closest('.wrap-repair-result').find('.item-repair-result:last-child').index() + 1 ;
            $(this).closest('.wrap-repair-result').find('.item-repair-result:last-child label strong').html('รายการที่ '+num_order);
        })
        .on('click','.wrap-repair-result .btn-delete-item-repair-result',function(){
            $(this).closest('.item-repair-result').remove();
            $('.row-form-ro').find('.repair-result-body .item-repair-result').each(function(key,value){
                $(this).find('label strong').html('รายการที่ '+(key+1));
            });
        })
        .on('click','.wrap-repair-result input[type=checkbox]',function(){
            if ($(this).prop('checked') == true) {
                $(this).closest('.wrap-ro-working-result-product-status').find('input[type=checkbox]').prop('checked',false);
                $(this).prop('checked',true);
            }
        })
        .on('click','.wrap-ro-product .btn-add-ro-product',function(){
            let clone = $(this).closest('.wrap-ro-product').find('.item-ro-product:first-child').clone();
            $(this).closest('.wrap-ro-product').find('.list-ro-product').append(clone);
            $(this).closest('.row-form-ro').find('.item-ro-product:last-child select[class*=list-product-]').chosen();
            $(this).closest('.row-form-ro').find('.item-ro-product:last-child .help-block').remove();
            $(this).closest('.row-form-ro').find('.item-ro-product:last-child .max-wrap-chosen:last-child').remove();
            let html = '<div class="col-md-12"><button type="button" class="btn btn-danger d-block btn-delete-item-ro-product" style="float:unset;margin:auto">ลบ</button></div>';
            $(this).closest('.wrap-ro-product').find('.item-ro-product:last-child td:first-child').append(html);
            $(this).closest('.row-form-ro').find('.item-ro-product:last-child select[class*=list-product-]').html('<option value="">ค้นหาสินค้า</option>');
            $(this).closest('.row-form-ro').find('.item-ro-product:last-child input').val('');
            $(this).closest('.row-form-ro').find('.item-ro-product:last-child td:last-child').html('');
            max_chosen($(this).closest('.row-form-ro').find('.item-ro-product:last-child select.list-product-id'));
            max_chosen($(this).closest('.row-form-ro').find('.item-ro-product:last-child select.list-product-name'));
            max_chosen($(this).closest('.row-form-ro').find('.item-ro-product:last-child select.list-product-id'),'update');
            max_chosen($(this).closest('.row-form-ro').find('.item-ro-product:last-child select.list-product-name'),'update');
            $(this).closest('.row-form-ro').find('.item-ro-product:last-child select.list-price').html('<option value="">กรุณาเลือกสินค้าก่อน</option>');
            list_product();
            material_input();
        })
        .on('click','.wrap-ro-product .manual-price',function(){
            if ($(this).prop('checked') == true) {
                $(this).closest('.item-ro-product').find('.select-price').hide();
                $(this).closest('.item-ro-product').find('.input-price').show();
                $(this).closest('.item-ro-product').find('.input-price input').attr('name','rod_product_price[]');
                $(this).closest('.item-ro-product').find('.select-price select').attr('name','');
            }else if ($(this).prop('checked') == false) {
                $(this).closest('.item-ro-product').find('.input-price').hide();
                $(this).closest('.item-ro-product').find('.select-price').show();
                $(this).closest('.item-ro-product').find('.input-price input').attr('name','');
                $(this).closest('.item-ro-product').find('.select-price select').attr('name','rod_product_price[]');
            }
        })
        .on('click','.wrap-ro-product .btn-delete-item-ro-product',function(){
            $(this).closest('tr').remove();
        })
        .on('click','.wrap-ro-product .btn-delete-item-ro-product',function(){
        })
        // .on('keyup change mouseup','.wrap-ro-product .list-ro-product .ro-quanity,.wrap-ro-product .list-ro-product .select-price select,.wrap-ro-product .list-ro-product .input-price input',function(){
        .on('keyup change mouseup click','.wrap-ro-product .list-ro-product',function(){
            // console.log($(this).val());
            let sum = 0
            var price = {};
            price.quanity = [];
            price.price = [];
            // price['quanity'] = [];
            // price['price'] = [];
            $('.row-form-ro .wrap-ro-product .list-ro-product .item-ro-product').each(function(key,value){
                if ($(this).find('.ro-quanity').length > 0) {
                    if ($(this).find('.ro-quanity').val() != '') {
                        price['quanity'][key] = $(this).find('.ro-quanity').val();
                    }
                }
                // if ($(this).find('.select-price select').attr('name') != '') {
                if ($(this).find('.select-price select').is(':visible') != false) {
                    if ($(this).find('.select-price .list-price').length > 0) {
                        if ($(this).find('.select-price .list-price').val() != '') {
                            price['price'][key] = $(this).find('.select-price .list-price').val();
                        }
                    }
                }else {
                    if ($(this).find('.input-price input').length > 0) {
                        if ($(this).find('.input-price input').val() != '') {
                            price['price'][key] = $(this).find('.input-price input').val();
                        }
                    }
                }
            });
            let quanity = price.quanity;
            let product_price = price.price;
            if (quanity.length == product_price.length) {
                $.ajax({
                    url: '<?php echo $this->base_url('Repair_order/calculation') ?>',
                    method: 'post',
                    data: price,
                    dataType: 'json',
                    success: function(data){
                        $.each(data[0],function(key,value){
                            $('.row-form-ro .wrap-ro-product .list-ro-product .item-ro-product').eq(key).find('td:last-child').html(value);
                        });
                        $('.row-form-ro .wrap-ro-product .list-ro-product .total-price').html(data[1]);
                    }
                });
            }
        });

        function search_sort(data){
            $('.navbar .form-search').off();
            $('.navbar .form-search')
            .on('click','.btn-reset-search',function(){
                $('.navbar .form-search .search-ro_number').val('');
                $('.navbar .form-search .search-date-start').val('');
                $('.navbar .form-search .search-date-end').val('');
                $('.navbar .form-search .search-cate').val('');
                $('.navbar .form-search .search-sort').val('');
                let html = '';
                let check_month = '0';
                let check_line_today = 0;
                let num_ro = 0;
                $.each(data,function(key,value){
                    if (value.ro_status != 'cancel') {
                        num_ro += 1;
                        let ro_create_date = value.ro_create_date;
                        ro_create_date = ro_create_date.substr(0, 4);
                        ro_create_date = parseInt(ro_create_date)+543;
                        html += '<tr ro_id="'+value.ro_id+'">';
                        let ro_number = value.ro_number;
                        ro_number = ro_number.toString();
                        if (ro_number.length < 3) {
                            let add_zero = '';
                            for (var i = ro_number.length; i < 3; i++) {
                                add_zero = add_zero+'0';
                            }
                            ro_number = add_zero+ro_number;
                        }
                        html += '<td>'+value.ro_number_full+'</td>';
                        html += '<td>'+value.ro_customer_hospital+'</td>';
                        switch (value.ro_working_result_type) {
                                case 'work':
                                    value.ro_working_result_type = '<span class="text-info">ปิดจ๊อบ</span>';
                                    break;
                                case 'get_back':
                                    value.ro_working_result_type = '<span class="text-info">ยกเครื่องกลับ</span>';
                                    break;
                                case 'quotation':
                                    value.ro_working_result_type = '<span class="text-info">เสนอราคา</span>';
                                    break;
                                case 'other':
                                    value.ro_working_result_type = '<span class="text-warning">อื่นๆ('+value.ro_working_result_detail+')</span>';
                                    break;
                                default:
                        }
                        html += '<td>'+value.ro_working_result_type+'</td>';
                        switch (value.ro_working_result_product_status) {
                                case 'work':
                                    value.ro_working_result_product_status = '<span class="text-info">ปิดจ๊อบ</span>';
                                    break;
                                case 'get_back':
                                    value.ro_working_result_product_status = '<span class="text-info">ยกเครื่องกลับ</span>';
                                    break;
                                case 'quotation':
                                    value.ro_working_result_product_status = '<span class="text-info">เสนอราคา</span>';
                                    break;
                                case 'other':
                                    value.ro_working_result_product_status = '<span class="text-warning">อื่นๆ('+value.ro_working_result_product_detail+')</span>';
                                    break;
                                default:
                                    value.ro_working_result_product_status = '-';
                        }
                        html += '<td>'+value.ro_working_result_product_status+'</td>';
                        html += '<td>';
                        html += '<button class="btn btn-info btn-option" option-type="check"><i class="material-icons">visibility</i> ตรวจสอบ</button>';
                        html += '</td>';
                        html += '</tr>';
                    }
                });
                // let num_order = data.length;
                $('.content .list-quotation .card-title b').html(num_ro);
                $('.content .list-quotation tbody').html(html);
            })
            .on('change keyup','.search-q_number,.search-date-start,.search-date-end,.search-sort,.search-ro_working_result_type,.search-ro_working_result_product_status',function(e){
                let q_number = $('.navbar .form-search .search-q_number').val();
                let date_start = $('.navbar .form-search .search-date-start').val();
                let date_end = $('.navbar .form-search .search-date-end').val();
                let sort = $('.navbar .form-search .search-sort').val();
                let cate_work = $('.navbar .form-search .search-ro_working_result_type').val();
                let cate_text_work = $('.navbar .form-search .search-ro_working_result_type option:selected').html();
                let cate_product_status = $('.navbar .form-search .search-ro_working_result_product_status').val();
                let cate_text_product_status = $('.navbar .form-search .search-ro_working_result_product_status option:selected').html();
                let data_search = [];
                let key_data_search = 0;
                if (date_start != '' || date_end != '') {
                    if ((date_start != '' && date_end != '') && (date_end < date_start)) {
                        let data_swap = date_start;
                        date_start = date_end;
                        date_end = data_swap;
                    }

                    for (var i = 0; i < data.length; i++) {
                        let date = data[i].ro_create_date;
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
                if (cate_work != '' || cate_product_status != '') {
                    if (cate_work != 'cancel') {
                        var data_search_cate = [];
                        let data_key_cate = 0;
                        for (var i = 0; i < data_search.length; i++) {
                            if (data_search[i].ro_status == cate_work) {
                                data_search_cate[data_key_cate++] = data_search[i];
                            }
                        }
                        if (data_search_cate.length < 0) {
                            data_search_cate = [];
                        }
                        data_key_cate = 0;
                        for (var i = 0; i < data_search.length; i++) {
                            if (data_search[i].ro_working_result_type == cate_work && data_search[i].ro_status != 'cancel') {
                                data_search_cate[data_key_cate++] = data_search[i];
                            }
                        }
                        if (data_search_cate.length < 0) {
                            data_search_cate = [];
                        }
                        if (cate_product_status != '') {
                            data_key_cate = 0;
                            for (var i = 0; i < data_search.length; i++) {
                                if (data_search[i].ro_working_result_product_status == cate_product_status && data_search[i].ro_status != 'cancel' ) {
                                    data_search_cate[data_key_cate++] = data_search[i];
                                }
                            }
                        }
                        data_search = data_search_cate;
                    }else if (cate_work == 'cancel') {
                        var data_search_cate = [];
                        let data_key_cate = 0;
                        for (var i = 0; i < data_search.length; i++) {
                            if (data_search[i].ro_status == cate_work) {
                                data_search_cate[data_key_cate++] = data_search[i];
                            }
                        }
                        data_search = data_search_cate;
                        if (data_search.length > 0) {
                            $.each(data_search,function(key_search,value_search){
                                value_search.ro_number_manual = value_search.ro_number_manual + ', <span class="text-danger">ยกเลิก</span>';
                            });
                        }
                    }
                }
                if (q_number != '') {
                    q_number = q_number.toUpperCase();
                    let data_search_ro_number_full = [];
                    let data_key_ro_number_full = 0;
                    for (var i = 0; i < data_search.length; i++) {
                        let data_ro_number_full = data_search[i].ro_number_full
                        if (data_ro_number_full.indexOf(q_number) > -1 ) {
                            data_search_ro_number_full[data_key_ro_number_full++] = data_search[i];
                        }
                    }
                    if (data_search_ro_number_full.length > 0) {
                        data_search = data_search_ro_number_full;
                    }else {
                        let data_search_ro_number_manual = [];
                        let data_key_ro_number_manual = 0;
                        for (var i = 0; i < data_search.length; i++) {
                            let data_ro_number_manual = data_search[i].ro_number_manual
                            if (data_ro_number_manual.indexOf(q_number) > -1 ) {
                                data_search_ro_number_manual[data_key_ro_number_manual++] = data_search[i];
                            }
                        }
                        data_search = data_search_ro_number_manual;
                    }
                }
                let html = '';
                let check_month = '0';
                if (data_search.length < 1) {
                    let text = 'ไม่มีใบแจ้งซ่อมที่ ';
                    let date_start_split = '';
                    // if (cate != '') {
                    //     text += '<span class="text-'+cate+'">'+cate_text+'</span><br>';
                    // }
                    if (date_start != '') {
                        date_start_split = date_start.split('-');
                        text += 'เริ่มต้นตั้งแต่ <br>วันที่ <b>'+date_start_split[2]+'/'+date_start_split[1]+'/'+(parseInt(date_start_split[0])+543)+'</b>';
                    }
                    if (date_end != '') {
                        let date_end_split = date_end.split('-');
                        // text = 'ไม่มีการแจ้งปัญหาระหว่าง <br>'+text;
                        text += '<br> ถึง <b>'+date_end_split[2]+'/'+date_end_split[1]+'/'+(parseInt(date_end_split[0])+543)+'</b>';
                    }
                    html += '<tr><td class="text-center" colspan="4">ไม่มีรายการใบแจ้งซ่อม</td></tr>';
                    let number_order = 0;
                    $('.content .list-quotation .card-title b').html(number_order);
                    $('.content .list-quotation tbody').html(html);
                }else {
                    let check_line_today = 0;
                    let num_ro = 0;
                    $.each(data_search,function(key,value){
                            num_ro += 1;
                            let ro_create_date = value.ro_create_date;
                            ro_create_date = ro_create_date.substr(0, 4);
                            ro_create_date = parseInt(ro_create_date)+543;
                            html += '<tr ro_id="'+value.ro_id+'">';
                            let ro_number = value.ro_number;
                            ro_number = ro_number.toString();
                            if (ro_number.length < 3) {
                                let add_zero = '';
                                for (var i = ro_number.length; i < 3; i++) {
                                    add_zero = add_zero+'0';
                                }
                                ro_number = add_zero+ro_number;
                            }
                            html += '<td>'+value.ro_number_full+', '+value.ro_number_manual+'</td>';
                            html += '<td>'+value.ro_customer_hospital+'</td>';
                            let ro_working_result_type = '';
                            switch (value.ro_working_result_type) {
                                    case 'work':
                                        ro_working_result_type = '<span class="text-info">ปิดจ๊อบ</span>';
                                        break;
                                    case 'get_back':
                                        ro_working_result_type = '<span class="text-info">ยกเครื่องกลับ</span>';
                                        break;
                                    case 'quotation':
                                        ro_working_result_type = '<span class="text-info">เสนอราคา</span>';
                                        break;
                                    case 'other':
                                        ro_working_result_type = '<span class="text-warning">อื่นๆ('+value.ro_working_result_detail+')</span>';
                                        break;
                                    default:
                            }
                            html += '<td>'+ro_working_result_type+'</td>';
                            let ro_working_result_product_status = '';
                            switch (value.ro_working_result_product_status) {
                                    case 'work':
                                        ro_working_result_product_status = '<span class="text-info">ปิดจ๊อบ</span>';
                                        break;
                                    case 'get_back':
                                        ro_working_result_product_status = '<span class="text-info">ยกเครื่องกลับ</span>';
                                        break;
                                    case 'quotation':
                                        ro_working_result_product_status = '<span class="text-info">เสนอราคา</span>';
                                        break;
                                    case 'other':
                                        ro_working_result_product_status = '<span class="text-warning">อื่นๆ('+value.ro_working_result_product_detail+')</span>';
                                        break;
                                    default:
                                        ro_working_result_product_status = '-';
                            }
                            html += '<td>'+ro_working_result_product_status+'</td>';
                            html += '<td>';
                            html += '<button class="btn btn-info btn-option" option-type="check"><i class="material-icons">visibility</i> ตรวจสอบ</button>';
                            html += '</td>';
                            html += '</tr>';
                    });
                    let number_order = data_search.length;
                    $('.content .list-quotation .card-title b').html(num_ro);
                    $('.content .list-quotation tbody').html(html);
                }
            });
        }

        /*remove form product*/
        $('.form-add-ro').on('click','.list-q_product .btn-delete-tr',function(){
            let tr_list_product = $(this).closest('.list-q_product');
            let i = 1;
            $(this).closest('tbody').find('.list-q_product').each(function(key,value){
                if ($(this).find('.number-order span').html() != i) {
                    $(this).find('.number-order span').html(i);
                    i++;
                }
            });
            $(this).closest('.list-q_product').remove();
        });

        /*get next number quotation*/
        function get_number_quotation(){
            $.ajax({
                url: '<?php echo $this->base_url('employee/get_number_quotations') ?>',
                method: 'post',
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if (data[0] == 'success') {
                        let q_type = $('.form-add-ro select[name=q_type]').val();
                        let q_num = data[1].toString();
                        if (q_num.length < 3) {
                            let add_zero = '';
                            for (var i = q_num.length; i < 3; i++) {
                                add_zero = add_zero+'0';
                            }
                            q_num = add_zero+q_num;
                        }
                        let date = new Date();
                        let year = parseInt(date.getFullYear()+543);
                        q_num = q_type+'.'+q_num+'/'+year;
                        $('.wrap-card-quotation .q_num').html('เลขที่ '+q_num);
                    }
                }
            });
        }

        /*when choose customer*/
        $('.form-add-ro').on('change','select.list-customer',function(){
            let selec_value = $(this).find('option:selected').html();
            $('.form-add-ro').find('input[name=q_to]').closest('form-group').find('.help-block').remove();
            $('.form-add-ro').find('input[name=q_to]').val('ผู้อำนวยการ '+selec_value);

        });

        /*select type quotation*/
        $('.form-add-ro').on('change','select[name=q_type]',function(){
            let value = $(this).val();
            let q_num = $('.wrap-card-quotation .q_num').html();
            split_q_num = q_num.split('.');
            sub_q_num = split_q_num[0].split(' ');
            q_type = sub_q_num[1];
            q_num = q_num.replace(q_type,value);
            $('.wrap-card-quotation .q_num').html(q_num);
        });

        /*เปิด card form add quotation*/
        $('.btn-modal-add-ro').click(function(){
            $('.loading-screen').show();
            $('.row-form-ro').show();
        });
        $('.btn-modal-add-ro').click(function(){
            setTimeout(function(){
                $('.row-form-ro .header-edit-ro').hide();
                $('.row-form-ro .header-add-ro').show();
                let check = $('.row-form-ro .card .card-body input[name=type]').val();
                let value = $('.row-form-ro .form-add-ro input[name=q_date]').val();
                $('.row-form-ro .form-add-ro .help-block').remove();
                $('.row-form-ro .list-customer').val('');
                max_chosen($('.row-form-ro .list-customer'),'update');

                $('.row-form-ro .form-add-ro input[type=text]').each(function(key,value){
                    $(this).val('');
                });
                $('.row-form-ro .form-add-ro select.list-price').html('<option value="" selected>กรุณาเลือกสินค้าก่อน..</option>');
                $('.row-form-ro .form-add-ro input.q_quanity').val('');
                $('.row-form-ro .form-add-ro select[name*=q_]').trigger("chosen:updated");
                $('.row-form-ro .form-add-ro').find('.bmd-form-group').removeClass('is-filled');
                $('.row-form-ro .form-add-ro').find('.bmd-form-group').removeClass('is-focused');
                $('.row-form-ro .card .card-footer .btn-add-ro').show();
                $('.row-form-ro .card .card-footer .btn-edit-ro').hide();

                let ro_infrom_html = '<div class="row item-repair-order">';
                ro_infrom_html += '<div class="col-md-12">';
                ro_infrom_html += '<div class="form-group bmd-form-group is-filled">';
                ro_infrom_html += '<label class="bmd-label-floating"><strong>รายการที่ 1</strong></label>';
                ro_infrom_html += '<input type="text" class="form-control" name="ro_infrom[]" value="" required>';
                ro_infrom_html += '</div>';
                ro_infrom_html += '</div>';
                ro_infrom_html += '</div>';
                $('.row-form-ro .wrap-repair-order .repair-order-body').html(ro_infrom_html);
                let ro_working_html = '<div class="row item-repair-detail">';
                ro_working_html += '<div class="col-md-12">';
                ro_working_html += '<div class="form-group bmd-form-group is-filled">';
                ro_working_html += '<label class="bmd-label-floating"><strong>รายการที่ 1</strong></label>';
                ro_working_html += '<input type="text" class="form-control" name="ro_working_list[]" value="">';
                ro_working_html += '</div>';
                ro_working_html += '</div>';
                ro_working_html += '</div>';
                $('.row-form-ro .wrap-repair-detail .repair-detail-body .list-repair-detail').html(ro_working_html);
                let ro_working_result_html = '<div class="row item-repair-result">';
                ro_working_result_html += '<div class="col-md-12">';
                ro_working_result_html += '<div class="form-group bmd-form-group">';
                ro_working_result_html += '<label class="bmd-label-floating"><strong>รายการที่ 1</strong></label>';
                ro_working_result_html += '<input type="text" class="form-control" name="ro_working_result_list[]" value="">';
                ro_working_result_html += '</div>';
                ro_working_result_html += '</div>';
                ro_working_result_html += '</div>';
                $('.row-form-ro .wrap-repair-result .repair-result-body .list-repair-result').html(ro_working_result_html);
                let product_html = '<tr class="row item-ro-product">';
                product_html += '<td class="col-md-2">';
                product_html += '<div class="form-group bmd-form-group is-filled">';
                product_html += '<select class="form-control form-control-chosen list-product-id" name="rod_product_id[]" data-placeholder="ค้นหาสินค้า.." style="display: none;"><option value="">ค้นหาสินค้า..</option></select>';
                product_html += '</div>';
                product_html += '</td>';
                product_html += '<td class="col-md-5">';
                product_html += '<div class="form-group bmd-form-group is-filled">';
                product_html += '<select class="form-control form-control-chosen list-product-name" data-placeholder="ค้นหาสินค้า.." style="display: none;"><option value="">ค้นหาสินค้า..</option></select>';
                product_html += '</div>';
                product_html += '</td>';
                product_html += '<td class="col-md-1">';
                product_html += '<div class="form-group bmd-form-group is-filled">';
                product_html += '<label class="bmd-label-floating"><strong>จำนวน</strong></label>';
                product_html += '<input type="number" class="form-control text-center ro-quanity" name="rod_product_unit[]" min="0">';
                product_html += '</div>';
                product_html += '</td>';
                product_html += '<td class="col-md-2">';
                product_html += '<div class="form-group bmd-form-group select-price is-filled">';
                product_html += '<select class="custom-select list-price" name="rod_product_price[]"><option value="" selected="">กรุณาเลือกสินค้าก่อน..</option></select>';
                product_html += '</div>';
                product_html += '<div class="form-group bmd-form-group input-price is-filled" style="display:none">';
                product_html += '<label class="bmd-label-floating"><strong>ราคา</strong></label>';
                product_html += '<input type="number" class="form-control text-center input-price" name="" min="0">';
                product_html += '</div>';
                product_html += '<div class="form-check row d-flex justify-content-center">';
                product_html += '<div class="col-md-2">';
                product_html += '<div class="form-check">';
                product_html += '<label class="form-check-label">';
                product_html += '<input class="form-check-input manual-price" type="checkbox" value="">';
                product_html += '<span class="form-check-sign">';
                product_html += '<span class="check"></span>';
                product_html += '</span>';
                product_html += '</label>';
                product_html += '</div>';
                product_html += '</div>';
                product_html += '<div class="col-md-7 text-center" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>';
                product_html += '</div>';
                product_html += '</td>';
                product_html += '<td class="col-md-2 text-center"></td>';
                product_html += '</tr>';
                $('.row-form-ro .list-ro-product tbody').html(product_html);
                list_product();
                // max_chosen($('.row-form-ro .list-ro-product .item-ro-product select.list-product-id'));
                // max_chosen($('.row-form-ro .list-ro-product .item-ro-product select.list-product-name'));

                $('.row-form-ro .form-add-ro input').each(function(key,value){
                    if ($(this).val() != '') {
                        $(this).closest('.form-group').addClass('is-filled');
                    }
                });
                $('.row-form-ro .form-add-ro input[type=checkbox]').each(function(key,value){
                    $(this).prop('checked',false);
                });
                $('.row-form-ro .form-add-ro .list-q_product').each(function(key,value){

                    if (key != 0) {
                        $(this).remove();
                    }else if(key == 0){
                        // if ($(this).find('select').hasClass('q_quanity_type') == false) {
                        //     $(this).find('select').val('');
                        // }
                        $(this).find('select').trigger("chosen:updated");
                        $(this).find('.manual-price').prop('checked',false);
                        $(this).find('.input-price').hide();
                        $(this).find('.select-price').show();
                    }
                });

                $('.row-add-quotation .card .card-footer .btn-add-ro').show();
                $('.row-add-quotation .card .card-footer .btn-edit-ro').hide();
                $('.row-form-ro').show();
                $('html, body').animate({scrollTop:($(".row-form-ro").offset().top)}, 500);
                $('.loading-screen').hide();
            },100);
        });

        /*close form add*/
        $('.btn-cancel-ro').click(function(){
            $('.row-form-ro').hide();
        });

        /*manual price*/
        $('.form-add-ro .table-q_product').on('click','.manual-price',function(){
            if ($(this).prop('checked') == true) {
                $(this).closest('.list-q_product').find('.select-price').hide();
                $(this).closest('.list-q_product').find('.input-price').show();
                $(this).closest('.list-q_product').find('.input-price input').attr('name','q_product_price[]');
                $(this).closest('.list-q_product').find('.select-price select').attr('name','');
            }else {
                $(this).closest('.list-q_product').find('.input-price').hide();
                $(this).closest('.list-q_product').find('.select-price').show();
                $(this).closest('.list-q_product').find('.input-price input').attr('name','');
                $(this).closest('.list-q_product').find('.select-price select').attr('name','q_product_price[]');
            }
        });
        $('.form-add-ro').on('change','select.list-service-name',function(){
            let tel = $(this).find('option:selected').attr('tel');
            $(this).closest('.form-add-ro').find('input[name=q_service_phone]').closest('.form-group').find('.help-block').remove();
            if (tel == '') {
                $(this).closest('.form-add-ro').find('input[name=q_service_phone]').val('');
                $(this).closest('.form-add-ro').find('input[name=q_service_phone]').closest('.form-group').removeClass('is-filled');
            }else {
                $(this).closest('.form-add-ro').find('input[name=q_service_phone]').val(tel);
                $(this).closest('.form-add-ro').find('input[name=q_service_phone]').closest('.form-group').addClass('is-filled');
            }
        });
        function auto_price(data = []){
            $('.row-form-ro').on('change','.list-ro-product select.list-product-id,.list-ro-product select.list-product-name',function(){
                let p_id = $(this).val();
                let data_price = [];
                $.each(data,function(key,value){
                    if (value.p_id == p_id) {
                        data_price[0] = value.p_price3;
                        data_price[1] = value.p_price2;
                        data_price[2] = value.p_price1;
                    }
                });
                let html = '';
                let remove_array = [];
                let key_remove = 0;
                for (var i = 0; i < data_price.length; i++) {
                    if (data_price[i] != '0') {
                        html += '<option value="'+data_price[i]+'">'+data_price[i]+'</option>';
                    }else {
                        remove_array[key_remove] = i;
                        key_remove++;
                    }
                }
                for (var i = 0; i < data_price.length; i++) {
                    if (i = remove_array[i]) {
                        data_price.splice(i, remove_array[i]);
                    }
                }
                if (data_price.length > 1) {
                    // html = '<option value="">เลือกราคา..</option>'+html;
                }else {
                    $(this).closest('.item-ro-product').find('select.list-price').closest('.form-group').find('.help-block').remove();
                }
                $(this).closest('.item-ro-product').find('select.list-price').html(html);
                if ($(this).closest('.item-ro-product').find('.manual-price').prop('checked')) {
                    $(this).closest('.item-ro-product').find('.manual-price').prop('checked',false);
                    $(this).closest('.item-ro-product').find('.input-price').hide();
                    $(this).closest('.item-ro-product').find('.select-price').show();
                    $(this).closest('.item-ro-product').find('.input-price input').attr('name','');
                    $(this).closest('.item-ro-product').find('.select-price select').attr('name','q_product_price[]');
                }
            });
        }
        function list_brand(){
            $.ajax({
                url: '<?php echo $this->base_url('employee/list_brand_ajax') ?>',
                dataType: 'json',
                success: function (data){
                    if (data[0] == 'success') {
                        let html = '<option value="">เลือกแบรนด์..</option>';
                        $.each(data[1],function(key,value){
                            html += '<option value="'+value.b_brand+'">'+value.b_brand+'</option>';
                        });
                        $('.form-add-ro .list-brand').html(html);
                        // $('.form-add-ro .list-brand').chosen({allow_single_deselect: true,width: '100%'});
                        max_chosen($('.form-add-ro .list-brand'));
                    }
                }
            });
        }
        function list_service_name(){
            $.ajax({
                url: '<?php echo $this->base_url('employee/list_service_name_ajax') ?>',
                dataType: 'json',
                success: function (data){
                    // console.log(data);
                    if (data[0] == 'success') {
                        let html = '<option value="">เลือกผู้แทนฝ่ายบริการ..</option>';

                        $.each(data[1],function(key,value){
                            let tel = '';
                            if (value.tel != '') {
                                tel = value.tel;
                            }
                            html += '<option tel="'+tel+'" value="'+value.id+','+value.first_name+' '+value.last_name+'">'+value.first_name+' '+value.last_name+' ('+value.division_th+')</option>';
                        });
                        $('.form-add-ro .wrap-list-service .list-service-name').html(html);
                        max_chosen($('.form-add-ro .wrap-list-service .list-service-name'));
                        // $('.form-add-ro .wrap-list-service .list-service-name').chosen({allow_single_deselect: true,width: '100%',search_contains:true});
                    }
                }
            });
        }
        function list_customer(){
            $.ajax({
                url: '<?php echo $this->base_url('employee/list_customer_ajax') ?>',
                dataType: 'json',
                success: function (data){
                    if (data[0] == 'success') {
                        let html = '<option value="">เลือกลูกค้า..</option>';
                        $.each(data[1],function(key,value){
                            html += '<option value="'+value.id+'">'+value.cus_name+'</option>';
                        });
                        $('.form-add-ro .list-customer').html(html);
                        max_chosen($('.form-add-ro .list-customer'));

                    }
                }
            });
        }
        function list_product(){
            max_chosen($('.form-add-ro .list-ro-product .item-ro-product select.list-product-id'));
            max_chosen($('.form-add-ro .list-ro-product .item-ro-product select.list-product-name'));
            $('.form-add-ro .list-ro-product .item-ro-product select.list-product-name').closest('.form-group').find('.max-wrap-chosen .max-chosen-drop .max-chosen-search .max-chosen-search-input').off();
            $('.form-add-ro .list-ro-product .item-ro-product select.list-product-id').closest('.form-group').find('.max-wrap-chosen .max-chosen-drop .max-chosen-search .max-chosen-search-input').off();
            $('.form-add-ro .list-ro-product .item-ro-product select.list-product-name').closest('.form-group').find('.max-wrap-chosen .max-chosen-drop .max-chosen-search .max-chosen-search-input').keyup(function(){
                var tag = $(this);
                $.ajax({
                    url : '<?php echo $this->base_url('Product/search_product') ?>',
                    method: 'post',
                    data: {search:$(this).val()},
                    dataType: 'json',
                    success: function(data){
                        let html = '<option value="">กรุณาเลือกรายการสินค้า..</option>';
                        if (data[0] == 'success') {
                            $.each(data[1],function(key,value){
                                html += '<option value="'+value.p_id+'" product-id="'+value.p_code+'">'+value.p_detail+'</option>';
                            });
                            tag.closest('.form-group').find('select.list-product-name').html(html);
                            max_chosen(tag.closest('.form-group').find('select.list-product-name'),'update');
                            tag.val(data[2]);
                            auto_price(data[1]);
                            tag.closest('.item-ro-product').find('select.list-product-name').change(function(){
                                let product_name = $(this).find('option:selected').clone();
                                tag.closest('.item-ro-product').find('select.list-product-id').html(product_name);
                                let get_product_name = tag.closest('.item-ro-product').find('select.list-product-id option').attr('product-id');
                                tag.closest('.item-ro-product').find('select.list-product-id option').html(get_product_name);
                                max_chosen(tag.closest('.item-ro-product').find('select.list-product-id'),'update');
                            });
                            tag.val(data[2]);

                        }else {
                            tag.val(data[2]);
                        }

                    }

                });
            });
            $('.form-add-ro .list-ro-product .item-ro-product select.list-product-id').closest('.form-group').find('.max-wrap-chosen .max-chosen-drop .max-chosen-search .max-chosen-search-input').keyup(function(){
                var tag = $(this);
                $.ajax({
                    url : '<?php echo $this->base_url('product/search_product') ?>',
                    method: 'post',
                    data: {search:$(this).val()},
                    dataType: 'json',
                    success: function(data){
                        let html = '<option value="">กรุณาเลือกรายการสินค้า..</option>';
                        if (data[0] == 'success') {
                            $.each(data[1],function(key,value){
                                html += '<option value="'+value.p_id+'" product-name="'+value.p_detail+'">'+value.p_code+'</option>';
                            });
                            tag.closest('.item-ro-product').find('select.list-product-id').html(html);
                            max_chosen(tag.closest('.form-group').find('select.list-product-id'),'update');
                            tag.val(data[2]);
                            auto_price(data[1]);
                            tag.closest('.item-ro-product').find('select.list-product-id').change(function(){
                                let product_name = $(this).find('option:selected').clone();
                                tag.closest('.item-ro-product').find('select.list-product-name').html(product_name);
                                let get_product_name = tag.closest('.item-ro-product').find('select.list-product-name option').attr('product-name');
                                tag.closest('.item-ro-product').find('select.list-product-name option').html(get_product_name);
                                tag.closest('.item-ro-product').find('select.list-product-name').trigger("chosen:updated");
                                max_chosen(tag.closest('.item-ro-product').find('select.list-product-name'),'update');
                            });
                        }else {
                            tag.val(data[2]);
                        }

                    }

                });
            });
        }

        var check_call_function = true;
        function list_ro(){
            $('.content .list-quotation tbody').html('<tr><td colspan="4" style="padding-bottom: 160px;"></td></tr>');
            loader($('.content .list-quotation tbody tr td'));
            $.ajax({
                url: '<?php echo $this->base_url('Repair_order/list') ?>',
                method: 'post',
                data: {status:'get'},
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    let html = '';
                    var select_search = '<option value="">สถานะ</option>';

                    var select_search_ro_working_result_type = '<option value="">ประเภท</option>';
                    var select_search_ro_working_result_product_status = '<option value="">ประเภท</option>';
                    if (data[0] == 'success') {
                        let btn = []
                        let count_btn = 0;
                        let num_ro = 0;
                        $.each(data[1],function(key,value){
                            if (value.ro_status != 'cancel') {
                                num_ro += 1;
                                let ro_create_date = value.ro_create_date;
                                ro_create_date = ro_create_date.substr(0, 4);
                                ro_create_date = parseInt(ro_create_date)+543;
                                html += '<tr ro_id="'+value.ro_id+'">';
                                let ro_number = value.ro_number;
                                ro_number = ro_number.toString();
                                if (ro_number.length < 3) {
                                    let add_zero = '';
                                    for (var i = ro_number.length; i < 3; i++) {
                                        add_zero = add_zero+'0';
                                    }
                                    ro_number = add_zero+ro_number;
                                }
                                html += '<td>'+value.ro_number_full+', '+value.ro_number_manual+'</td>';
                                html += '<td>'+value.ro_customer_hospital+'</td>';
                                let ro_working_result_type = '';
                                switch (value.ro_working_result_type) {
                                        case 'work':
                                            ro_working_result_type = '<span class="text-info">ปิดจ๊อบ</span>';
                                            break;
                                        case 'get_back':
                                            ro_working_result_type = '<span class="text-info">ยกเครื่องกลับ</span>';
                                            break;
                                        case 'quotation':
                                            ro_working_result_type = '<span class="text-info">เสนอราคา</span>';
                                            break;
                                        case 'other':
                                            ro_working_result_type = '<span class="text-warning">อื่นๆ('+value.ro_working_result_detail+')</span>';
                                            break;
                                        default:
                                }
                                html += '<td>'+ro_working_result_type+'</td>';
                                let ro_working_result_product_status = '';
                                switch (value.ro_working_result_product_status) {
                                        case 'work':
                                            ro_working_result_product_status = '<span class="text-info">ปิดจ๊อบ</span>';
                                            break;
                                        case 'get_back':
                                            ro_working_result_product_status = '<span class="text-info">ยกเครื่องกลับ</span>';
                                            break;
                                        case 'quotation':
                                            ro_working_result_product_status = '<span class="text-info">เสนอราคา</span>';
                                            break;
                                        case 'other':
                                            ro_working_result_product_status = '<span class="text-warning">อื่นๆ('+value.ro_working_result_product_detail+')</span>';
                                            break;
                                        default:
                                            ro_working_result_product_status = '-';
                                }
                                html += '<td>'+ro_working_result_product_status+'</td>';
                                html += '<td>';
                                html += '<button class="btn btn-info btn-option" option-type="check"><i class="material-icons">visibility</i> ตรวจสอบ</button>';
                                html += '</td>';
                                html += '</tr>';
                            }
                        });
                        select_search_ro_working_result_type += '<option value="new">สร้างใหม่</option>';
                        select_search_ro_working_result_type += '<option value="work">ปิดจ็อป</option>';
                        select_search_ro_working_result_type += '<option value="get_back">ยกเครื่องกลับ</option>';
                        select_search_ro_working_result_type += '<option value="quotation">เสนอราคา</option>';
                        select_search_ro_working_result_type += '<option value="other">อื่นๆ</option>';
                        select_search_ro_working_result_type += '<option value="cancel">ยกเลิก</option>';

                        select_search_ro_working_result_product_status += '<option value="work">ปิดจ็อป</option>';
                        select_search_ro_working_result_product_status += '<option value="get_back">ยกเครื่องกลับ</option>';
                        select_search_ro_working_result_product_status += '<option value="other">อื่นๆ</option>';
                        $('.navbar select.search-ro_working_result_type').html(select_search_ro_working_result_type);
                        $('.navbar select.search-ro_working_result_product_status').html(select_search_ro_working_result_product_status);
                            // switch (data[2]) {
                            //     case 'admin':
                            //         select_search += '<option value="work">ปิดจ็อป</option>';
                            //         select_search += '<option value="get_back">ยกเครื่องกลับ</option>';
                            //         select_search += '<option value="new">สร้างใหม่</option>';
                            //         select_search += '<option value="edit">ต้องแก้ไข</option>';
                            //         select_search += '<option value="cancel">ยกเลิก</option>';
                            //         select_search += '<option value="other">อื่นๆ</option>';
                            //         // select_search += '<option value="approved">หัวหน้าอนุมัติ</option>';
                            //         break;
                            //     case 'service':
                            //         select_search += '<option value="approved">หัวหน้าอนุมัติ</option>';
                            //         select_search += '<option value="customer_approved">ลูกค้าอนุมัติ</option>';
                            //         break;
                            //     case 'supervisor':
                            //         select_search += '<option value="new">สร้างใหม่</option>';
                            //         select_search += '<option value="edit">ต้องแก้ไข</option>';
                            //         select_search += '<option value="cancel">ยกเลิก</option>';
                            //         select_search += '<option value="approved">หัวหน้าอนุมัติ</option>';
                            //         select_search += '<option value="customer_approved">ลูกค้าอนุมัติ</option>';
                            //         select_search += '<option value="customer_reject">ลูกค้ายกเลิก</option>';
                            //         break;
                            //     case 'it':
                            //         select_search += '<option value="new">สร้างใหม่</option>';
                            //         select_search += '<option value="edit">ต้องแก้ไข</option>';
                            //         select_search += '<option value="cancel">ยกเลิก</option>';
                            //         select_search += '<option value="approved">หัวหน้าอนุมัติ</option>';
                            //         select_search += '<option value="customer_approved">ลูกค้าอนุมัติ</option>';
                            //         select_search += '<option value="customer_reject">ลูกค้ายกเลิก</option>';
                            //         break;
                            //     default:
                            //
                            // }

                            $('.navbar select.search-cate').html(select_search);
                            // let num_order = data[1].length;
                            // $('.content .list-quotation .card-title b').html(num_order);
                            $('.content .list-quotation .card-title b').html(num_ro);
                            $('.content .list-quotation tbody').html(html);
                    }else{
                        html += '<tr><td class="text-center" colspan="4">ไม่มีรายการใบแจ้งซ่อม</td></tr>';
                        $('.content .list-quotation tbody').html(html);
                        $('.navbar select.search-cate').html(select_search);
                    }
                    // if (check_call_function) {
                        search_sort(data[1]);
                        check_call_function = false;
                    // }
                }
            });
        }

        /*option click*/
        var check_call_function_option = true;
        $('.tb-ro-list').on('click','.btn-option',function(){
            var type = $(this).attr('option-type');
            // switch (type) {
            //     case 'edit':
            //         break;
            //     case 'check':
                    let id = $(this).closest('tr').attr('ro_id');
                    $.ajax({
                        url: '<?php echo $this->base_url('Repair_order/get_ro') ?>',
                        method: 'post',
                        data: {ro_id:id},
                        dataType: 'json',
                        success: function(data){
                            // console.log(data);
                            let html = '';
                            let btn = [];
                            let count_btn = 0;
                            if (data[0] == 'success') {
                                let value = data[1][0];
                                // console.log(value);
                                html += '<form class="form-add-ro" style="font-size: 0.76rem">';
                                    html += '<input type="hidden" name="type" value="">';
                                    html += '<input type="hidden" name="ro_id" value="'+value.ro_id+'">';
                                    html += '<input type="hidden" name="add_ro" value="">';
                                    html += '<div class="row wrap-customer-detail border border-ro pt-0">';
                                        html += '<div class="col-md-12 p-2 customer-detail-head text-center bg-ro border-bottom border-ro text-ro shadow-sm"><h4><b>รายละเอียดลูกค้า</b></h4></div>';
                                        html += '<div class="col-md-12 customer-detail-body p-2">';
                                            html += '<div class="row">';
                                                html += '<div class="col-md-6 row m-0">';
                                                    html += '<div class="max-content">สถานที่ : </div>';
                                                    html += '<div class="max-content text-left border-ro-input" style="width: 89% !important">'+value.ro_customer_hospital+'</div>';
                                                html += '</div>';
                                                html += '<div class="col-md-6 row m-0">';
                                                    html += '<div class="max-content">แผนก : </div>';
                                                    html += '<div class="max-content text-left border-ro-input" style="width: 88% !important">'+value.ro_customer_department+'</div>';
                                                html += '</div>';
                                            html += '</div>';
                                            html += '<div class="row">';
                                                html += '<div class="col-md-6 row m-0">';
                                                    html += '<div class="max-content">ชื่อผู้ติดต่อ : </div>';
                                                    html += '<div class="max-content text-left border-ro-input" style="width: 86% !important">'+value.ro_customer_name+'</div>';
                                                html += '</div>';
                                                html += '<div class="col-md-6 row m-0">';
                                                    html += '<div class="max-content">โทรศัพท์ : </div>';
                                                    html += '<div class="max-content text-left border-ro-input" style="width: 87% !important">'+value.ro_customer_tel+'</div>';
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="row wrap-equipment-detail border-right border-left border-bottom border-ro pt-0">';
                                        html += '<div class="col-md-12 p-2 customer-detail-head text-center bg-ro border-bottom border-ro text-ro shadow-sm"><h4><b>รายละเอียดเครื่อง</b></h4></div>';
                                        html += '<div class="col-md-12 customer-detail-body p-2">';
                                            html += '<div class="row">';
                                                html += '<div class="col-md-4 row m-0">';
                                                    html += '<div class="max-content">เครื่อง : </div>';
                                                    html += '<div class="max-content text-left border-ro-input" style="width: 81% !important">'+value.ro_product_name+'</div>';
                                                html += '</div>';
                                                html += '<div class="col-md-4 row m-0">';
                                                    html += '<div class="max-content">Model : </div>';
                                                    html += '<div class="max-content text-left border-ro-input" style="width: 81% !important">'+value.ro_product_model+'</div>';
                                                html += '</div>';
                                                html += '<div class="col-md-4 row m-0">';
                                                    html += '<div class="max-content">Serial No. : </div>';
                                                    html += '<div class="max-content text-left border-ro-input" style="width: 71% !important">'+value.ro_product_serial+'</div>';
                                                html += '</div>';
                                            html += '</div>';
                                            html += '<div class="row">';
                                                html += '<div class="col-md-12 row wrap-ro-support-type">';
                                                    html += '<div class="col-md-3">';
                                                        html += '<label class="bmd-label-floating text-dark"><strong>Support Type (<i class="material-icons">done</i>)</strong></label>';
                                                    html += '</div>';
                                                    html += '<div class="col-md-9 row d-flex justify-content-between wrap-support-type">';
                                                        html += '<div class="col-md-4">';
                                                            html += '<div class="form-check">';
                                                                html += '<label class="form-check-label text-dark">';
                                                                    html += '<input class="form-check-input" type="checkbox" value="time&material" name="ro_support_type" disabled>';
                                                                    html += 'Time & Material';
                                                                    html += '<span class="form-check-sign">';
                                                                        html += '<span class="check"></span>';
                                                                    html += '</span>';
                                                                html += '</label>';
                                                            html += '</div>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-4">';
                                                            html += '<div class="form-check">';
                                                                html += '<label class="form-check-label text-dark">';
                                                                    html += '<input class="form-check-input" type="checkbox" value="warranty" name="ro_support_type" disabled>';
                                                                    html += 'Warranty';
                                                                    html += '<span class="form-check-sign">';
                                                                        html += '<span class="check"></span>';
                                                                    html += '</span>';
                                                                html += '</label>';
                                                            html += '</div>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-4">';
                                                            html += '<div class="form-check">';
                                                                html += '<label class="form-check-label text-dark">';
                                                                    html += '<input class="form-check-input" type="checkbox" value="service_contact" name="ro_support_type" disabled>';
                                                                    html += 'Service Contract';
                                                                    html += '<span class="form-check-sign">';
                                                                        html += '<span class="check"></span>';
                                                                    html += '</span>';
                                                                html += '</label>';
                                                            html += '</div>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-4">';
                                                            html += '<div class="form-check">';
                                                                html += '<label class="form-check-label text-dark">';
                                                                    html += '<input class="form-check-input" type="checkbox" value="sale_support" name="ro_support_type" disabled>';
                                                                    html += 'Sale Support';
                                                                    html += '<span class="form-check-sign">';
                                                                        html += '<span class="check"></span>';
                                                                    html += '</span>';
                                                                html += '</label>';
                                                            html += '</div>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-4">';
                                                            html += '<div class="form-check">';
                                                                html += '<label class="form-check-label text-dark">';
                                                                    html += '<input class="form-check-input" type="checkbox" value="instrallation" name="ro_support_type" disabled>';
                                                                    html += 'Instrallation';
                                                                    html += '<span class="form-check-sign">';
                                                                        html += '<span class="check"></span>';
                                                                    html += '</span>';
                                                                html += '</label>';
                                                            html += '</div>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-4">';
                                                            html += '<div class="form-check">';
                                                                html += '<label class="form-check-label text-dark">';
                                                                    html += '<input class="form-check-input" type="checkbox" value="demo" name="ro_support_type" disabled>';
                                                                    html += 'Demo';
                                                                    html += '<span class="form-check-sign">';
                                                                        html += '<span class="check"></span>';
                                                                    html += '</span>';
                                                                html += '</label>';
                                                            html += '</div>';
                                                        html += '</div>';
                                                    html += '</div>';
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="row wrap-repair-order border-right border-left border-bottom border-ro pt-0">';
                                        html += '<div class="col-md-12 p-2  repair-order-head text-center bg-ro border-bottom border-ro text-ro shadow-sm"><h4><b>รายการที่แจ้งให้ปฏิบัติงาน</b></h4></div>';
                                        html += '<div class="col-md-12 repair-order-body p-2">';
                                            html += '<div class="row item-repair-order">';
                                            $.each(value.ro_infrom,function(key_infrom,value_infrom){
                                                html += '<div class="col-md-12 text-dark">';
                                                html += '<p>- '+value_infrom+'</p>';
                                                html += '</div>';
                                            });
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="row wrap-repair-detail border-right border-left border-bottom border-ro pt-0">';
                                        html += '<div class="col-md-12 p-2 repair-detail-head text-center bg-ro border-bottom border-ro text-ro shadow-sm"><h4><b>รายละเอียดการปฏิบัติงาน</b></h4></div>';
                                        html += '<div class="col-md-12 repair-detail-body p-0 m-0">';
                                            html += '<div class="row m-0 pt-0">';
                                                html += '<div class="col-md-12 row m-0 pl-0 pb-0 pr-0">';
                                                    html += '<div class="col-md-9 border-ro border-right border-dark pl-0">';
                                                        html += '<div class="list-repair-detail pl-0">';
                                                            html += '<div class="row item-repair-detail pl-0">';
                                                                html += '<div class="col-md-12">';
                                                                    $.each(value.ro_working_list,function(key_working_list,value_working_list){
                                                                        html += '<div class="col-md-12 text-dark">';
                                                                        html += '<p>- '+value_working_list+'</p>';
                                                                        html += '</div>';
                                                                    });
                                                                html += '</div>';
                                                            html += '</div>';
                                                        html += '</div>';
                                                    html += '</div>';
                                                    html += '<div class="col-md-3 row pr-0">';
                                                        html += '<div class="col-md-12"><strong>ผลการดำเนินงาน :</strong></div>';
                                                        html += '<div class="col-md-12 row wrap-ro-working-result-type pr-0">';
                                                            html += '<div class="col-md-12">';
                                                                html += '<div class="form-check">';
                                                                    html += '<label class="form-check-label text-dark">';
                                                                        html += '<input class="form-check-input" type="checkbox" value="work" name="ro_working_result_type" disabled>';
                                                                        html += 'ใช้งานได้ปกติ';
                                                                        html += '<span class="form-check-sign">';
                                                                            html += '<span class="check"></span>';
                                                                        html += '</span>';
                                                                    html += '</label>';
                                                                html += '</div>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-12">';
                                                                html += '<div class="form-check">';
                                                                    html += '<label class="form-check-label text-dark">';
                                                                        html += '<input class="form-check-input" type="checkbox" value="get_back" name="ro_working_result_type" disabled>';
                                                                        html += 'ยกเครื่องกลับ';
                                                                        html += '<span class="form-check-sign">';
                                                                            html += '<span class="check"></span>';
                                                                        html += '</span>';
                                                                    html += '</label>';
                                                                html += '</div>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-12">';
                                                                html += '<div class="form-check">';
                                                                    html += '<label class="form-check-label text-dark">';
                                                                        html += '<input class="form-check-input" type="checkbox" value="quotation" name="ro_working_result_type" disabled>';
                                                                        html += 'เสนอราคา';
                                                                        html += '<span class="form-check-sign">';
                                                                            html += '<span class="check"></span>';
                                                                        html += '</span>';
                                                                    html += '</label>';
                                                                html += '</div>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-12">';
                                                                html += '<div class="form-check">';
                                                                    html += '<label class="form-check-label text-dark">';
                                                                        html += '<input class="form-check-input" type="checkbox" value="other" name="ro_working_result_type" disabled>';
                                                                        html += 'อื่นๆ';
                                                                        html += '<span class="form-check-sign">';
                                                                            html += '<span class="check"></span>';
                                                                        html += '</span>';
                                                                    html += '</label>';
                                                                html += '</div>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-12 row m-0 pr-0" style="font-size: 0.76rem;">';
                                                                html += '<div class="max-content">รายละเอียด : </div>';
                                                                if (value.ro_working_result_detail == '') {
                                                                    value.ro_working_result_detail = '-';
                                                                }
                                                                html += '<div class="max-content text-left border-ro-input" style="width: 64% !important">'+value.ro_working_result_detail+'</div>';
                                                            html += '</div>';
                                                        html += '</div>';
                                                    html += '</div>';
                                                html += '</div>';
                                                html += '<div class="col-md-12 row border-top border-ro m-0 pt-0 pl-0 pr-0">';
                                                    html += '<div class="col-md-9 border-ro border-right row m-0 ">';
                                                        html += '<div class="max-content">อุปกรณ์ประกอบเครื่อง : </div>';
                                                        html += '<div class="max-content text-left pl-2" style="width: 71% !important">'+value.ro_equipment_product+'</div>';
                                                    html += '</div>';
                                                    html += '<div class="col-md-3" style="font-size: 0.76rem">';
                                                        html += '<div class="col-md-12 row m-0 pl-0 pr-0">';
                                                            html += '<div class="max-content">ผู้ปฏิบัติงาน : </div>';
                                                            let ro_working_service_data_text = '-';
                                                            let ro_working_service_data = value.ro_working_service_data;
                                                            if (value.ro_working_service_data != '') {
                                                                ro_working_service_data_text = ro_working_service_data['first_name']+' '+ro_working_service_data['last_name'];
                                                            }
                                                            html += '<div class="max-content text-left border-ro-input" style="width: 63% !important">'+ro_working_service_data_text+'</div>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-12 row m-0 pl-0 pr-0">';
                                                            html += '<div class="max-content">วันที่</div>';
                                                            html += '<div class="max-content text-left border-ro-input" style="width: 40% !important">'+value.ro_working_date+'</div>';
                                                            html += '<div class="max-content">เวลา</div>';
                                                            html += '<div class="max-content text-left border-ro-input" style="width: 35% !important">'+value.ro_working_time+'</div>';
                                                        html += '</div>';
                                                    html += '</div>';
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="row wrap-repair-result border-right border-left border-ro pt-0 pb-0">';
                                        html += '<div class="col-md-12 p-2  repair-result-head text-center bg-ro border-bottom border-ro text-ro shadow-sm"><h4><b>ผลการดำเนินงาน</b></h4></div>';
                                        html += '<div class="col-md-12 repair-result-body p-0">';
                                            html += '<div class="row m-0 pb-0">';
                                                html += '<div class="col-md-12 row border-bottom border-dark m-0 p-0">';
                                                    html += '<div class="col-md-9 border-right border-dark pl-0 pr-0">';
                                                        let check_length = value.ro_working_list;
                                                        check_length = check_length.length;
                                                        if (check_length > 1) {
                                                            html += '<div class="list-repair-result">';
                                                        }else {
                                                            html += '<div class="list-repair-result" style="padding-bottom: 50px;">';
                                                        }
                                                            html += '<div class="row item-repair-result pl-0">';
                                                                html += '<div class="col-md-12">';
                                                                let ro_working_result_list = value.ro_working_result_list;
                                                                if (ro_working_result_list.length > 0) {
                                                                    $.each(value.ro_working_result_list,function(key_working_result_list,value_working_result_list){
                                                                        html += '<div class="col-md-12 text-dark">';
                                                                        html += '<p>- '+value_working_result_list+'</p>';
                                                                        html += '</div>';
                                                                    });
                                                                }
                                                                html += '</div>';
                                                            html += '</div>';
                                                        html += '</div>';
                                                        html += '<div class="col-md-12 row pl-0 pr-0 m-0 ">';
                                                            html += '<div class="wrap-service-staff row m-0 pl-1 col-md-12 pr-0">';
                                                                html += '<div class="col-md-8 pl-0 row m-0">';
                                                                    html += '<div class="max-content">เจ้าหน้าที่ : </div>';
                                                                    let ro_working_result_service_text = '-';
                                                                    let ro_working_result_service_data = value.ro_working_result_service_data;
                                                                    if (value.ro_working_result_service_data != '') {
                                                                        ro_working_result_service_text = ro_working_result_service_data['first_name']+' '+ro_working_result_service_data['last_name'];
                                                                    }
                                                                    html += '<div class="max-content text-left border-ro-input" style="width: 87% !important">'+ro_working_result_service_text+'</div>';
                                                                html += '</div>';
                                                                html += '<div class="col-md-4 pl-0 row m-0">';
                                                                    html += '<div class="max-content">วันที่ : </div>';
                                                                    html += '<div class="max-content text-left border-ro-input" style="width: 81% !important">'+value.ro_working_result_date+'</div>';
                                                                html += '</div>';
                                                            html += '</div>';
                                                        html += '</div>';
                                                    html += '</div>';
                                                    html += '<div class="col-md-3 row pr-0">';
                                                        html += '<div class="col-md-12"><strong>สถานะเครื่อง :</strong></div>';
                                                        html += '<div class="col-md-12 row wrap-ro-working-result-product-status pr-0">';
                                                            html += '<div class="col-md-12">';
                                                                html += '<div class="form-check">';
                                                                    html += '<label class="form-check-label text-dark">';
                                                                        html += '<input class="form-check-input" type="checkbox" value="work" name="ro_working_result_product_status" disabled>';
                                                                        html += 'ใช้งานได้ปกติ';
                                                                        html += '<span class="form-check-sign">';
                                                                            html += '<span class="check"></span>';
                                                                        html += '</span>';
                                                                    html += '</label>';
                                                                html += '</div>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-12">';
                                                                html += '<div class="form-check">';
                                                                    html += '<label class="form-check-label text-dark">';
                                                                        html += '<input class="form-check-input" type="checkbox" value="get_back" name="ro_working_result_product_status" disabled>';
                                                                        html += 'ยกเครื่องกลับ';
                                                                        html += '<span class="form-check-sign">';
                                                                            html += '<span class="check"></span>';
                                                                        html += '</span>';
                                                                    html += '</label>';
                                                                html += '</div>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-12">';
                                                                html += '<div class="form-check">';
                                                                    html += '<label class="form-check-label text-dark">';
                                                                        html += '<input class="form-check-input" type="checkbox" value="other" name="ro_working_result_product_status" disabled>';
                                                                        html += 'อื่นๆ';
                                                                        html += '<span class="form-check-sign">';
                                                                            html += '<span class="check"></span>';
                                                                        html += '</span>';
                                                                    html += '</label>';
                                                                html += '</div>';
                                                            html += '</div>';
                                                            html += '<div class="col-md-12 row m-0 pr-0" style="font-size: 0.76rem;">';
                                                                html += '<div class="max-content">รายละเอียด : </div>';
                                                                if (value.ro_working_result_product_detail != '') {
                                                                    html += '<div class="max-content text-left border-ro-input" style="width: 64% !important">'+value.ro_working_result_product_detail+'</div>';
                                                                }else {
                                                                    html += '<div class="max-content text-left border-ro-input" style="width: 64% !important;height: auto"></div>';
                                                                }
                                                            html += '</div>';
                                                        html += '</div>';
                                                    html += '</div>';
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="row wrap-ro-product border-right border-left border-bottom border-ro pt-0">';
                                        html += '<div class="col-md-12">';
                                            html += '<table class="table table-bordered col-md-12 list-ro-product border-0" border="">';
                                                html += '<thead class="text-ro">';
                                                    html += '<tr class="row pt-0 pb-0">';
                                                        html += '<th class="text-center col-md-2">รหัสสินค้า</th>';
                                                        html += '<th class="text-center col-md-5">รายการ</th>';
                                                        html += '<th class="text-center col-md-1">จำนวน</th>';
                                                        html += '<th class="text-center col-md-2">ราคา/หน่วย</th>';
                                                        html += '<th class="text-center col-md-2">ราคารวม</th>';
                                                    html += '</tr>';
                                                html += '</thead>';
                                                html += '<tbody>';
                                                let product = value.product;
                                                if (product.length > 0) {
                                                    $.each(value.product,function(key_product,value_product){
                                                        html += '<tr class="row item-ro-product pt-0 pb-0">';
                                                        html += '<td class="col-md-2 text-center">'+value_product.p_code+'</td>';
                                                        html += '<td class="col-md-5 text-center">'+value_product.p_name+'</td>';
                                                        html += '<td class="col-md-1 text-center">'+value_product.p_unit+'</td>';
                                                        html += '<td class="col-md-2 text-center">'+value_product.p_price+'</td>';
                                                        html += '<td class="col-md-2 text-center">'+value_product.p_price_sum+'</td>';
                                                        html += '</tr>';
                                                    });
                                                }
                                                html += '</tbody>';
                                                html += '<tfoot>';
                                                    html += '<tr class="row pt-0">';
                                                        html += '<td class="col-md-8" style="border-top: 0px !important;border-bottom: 0px !important;border-left: 0px !important;border-right: 0px !important;"></td>';
                                                        html += '<td class="col-md-2 text-center text-ro" style="border-top: 0px !important;"><strong>รวมทั้งสิ้น</strong></td>';
                                                        html += '<td class="col-md-2 total-price text-center" style="border-top: 0px !important;">'+value.sum_total+'</td>';
                                                    html += '</tr>'; //
                                                html += '</tfoot>';
                                            html += '</table>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="row wrap-ro-detail border-right border-left border-bottom border-ro pt-0">';
                                        html += '<div class="col-md-12 row">';
                                            html += '<div class="col-md-5 row m-0 ">';
                                                html += '<div class="max-content">Quotation : </div>';
                                                let quotation_data = value.ro_quotation_data;
                                                let quotation_number_text = '-';
                                                if (quotation_data.length > 0) {
                                                    quotation_number_text = quotation_data[0].quotation_number;
                                                }
                                                html += '<div class="max-content text-left border-ro-input pl-2" style="width: 81% !important">'+quotation_number_text+'</div>';
                                            html += '</div>';
                                            html += '<div class="col-md-5 row m-0 ">';
                                                html += '<div class="max-content">Date : </div>';
                                                html += '<div class="max-content text-left border-ro-input pl-2" style="width: 25% !important">'+value.ro_quotation_date+'</div>';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="col-md-12 row">';
                                            html += '<div class="col-md-5 row m-0 ">';
                                                html += '<div class="max-content">Invoice/Delivery Order No. : </div>';
                                                html += '<div class="max-content text-left border-ro-input pl-2" style="width: 53% !important">'+value.ro_invoice_number+'</div>';
                                            html += '</div>';
                                            html += '<div class="col-md-5 row m-0 ">';
                                                html += '<div class="max-content">Date : </div>';
                                                html += '<div class="max-content text-left border-ro-input pl-2" style="width: 25% !important">'+value.ro_invoice_date+'</div>';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="col-md-12 row">';
                                            html += '<div class="col-md-5 row m-0 ">';
                                                html += '<div class="max-content">Order Form No. : </div>';
                                                html += '<div class="max-content text-left border-ro-input pl-2" style="width: 72% !important">'+value.ro_of_number+'</div>';
                                            html += '</div>';
                                            html += '<div class="col-md-5 row m-0 ">';
                                                html += '<div class="max-content">Date : </div>';
                                                html += '<div class="max-content text-left border-ro-input pl-2" style="width: 25% !important">'+value.ro_of_date+'</div>';
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="clearfix"></div>';
                                html += '</form>';
                                let btn_html = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                btn_html += '<button class="btn btn-success btn-option" option-type="print"><i class="material-icons">print</i> สั่งพิม</button>';
                                $('.modal-preview-ro .wrap-data-ro').html(html);
                                $('.modal-preview-ro .wrap-data-ro').attr('ro_id',value.ro_id_encode);

                                $('.modal-preview-ro .wrap-data-ro .wrap-ro-support-type input[name=ro_support_type]').each(function(key_ro_support_type,value_ro_support_type){
                                    if ($(this).val() == value.ro_support_type) {
                                        $(this).prop('checked',true);
                                    }else {
                                        $(this).prop('checked',false);
                                    }
                                });
                                $('.modal-preview-ro .wrap-data-ro .wrap-ro-working-result-type input[name=ro_working_result_type]').each(function(key_ro_working_result_type,value_ro_working_result_type){
                                    if ($(this).val() == value.ro_working_result_type) {
                                        $(this).prop('checked',true);
                                    }else {
                                        $(this).prop('checked',false);
                                    }
                                });
                                $('.modal-preview-ro .wrap-data-ro .wrap-ro-working-result-product-status input[name=ro_working_result_product_status]').each(function(key_ro_working_result_type,value_ro_working_result_type){
                                    if ($(this).val() == value.ro_working_result_product_status) {
                                        $(this).prop('checked',true);
                                    }else {
                                        $(this).prop('checked',false);
                                    }
                                });

                                $('.modal-preview-ro .modal-content .modal-footer').html(btn_html);
                                // if (check_call_function_option) {
                                    option_click(value);
                                    check_call_function_option = false;
                                // }
                            }
                        }
                    });
                    $('.modal-preview-ro').modal('show');
                    // window.location.href = "<?php echo $this->base_url('page/quotation/print/') ?>"+id;
                    // break;
            //     case 'admin-edit':
            //
            //         break;
            //     case 'approved':
            //
            //         break;
            //     default:
            //
            // }
        });

        function option_click(data){
            $('.modal-preview-ro .modal-content').off();
            $('.modal-preview-ro .modal-content').on('click','.btn-option[option-type=edit]',function(){
                $('.loading-screen').show();
            });
            $('.modal-preview-ro .modal-content').on('click','.btn-option',function(){
                var option_type = $(this).attr('option-type');
                $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').hide();
                if (option_type != 'admin-edit') {
                    $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark').hide();
                }
                $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').hide();

                switch (option_type) {
                    case 'edit':
                        setTimeout(function(type = option_type){
                            $('.modal-preview-ro').modal('hide');
                            $('.row-form-ro .header-edit-ro').show();
                            $('.row-form-ro .header-add-ro').hide();
                            $('.row-form-ro .card .card-body input[name=ro_id]').val(data.ro_id);
                            $('.row-form-ro .card .card-body input[name=type]').val('edit');
                            $('.row-form-ro .card .card-footer .btn-add-ro').hide();
                            $('.row-form-ro .card .card-footer .btn-edit-ro').remove();
                            $('.row-form-ro .card .card-footer').append('<a class="btn btn-success btn-edit-ro" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>');
                            $('.row-form-ro').show();
                            $('html, body').animate({scrollTop:($(".row-form-ro").offset().top - 150)}, 500);
                            $('.row-form-ro .card .card-header .ro_number').html(data.ro_number);
                            $('.row-form-ro .card .card-header .ro_create_date').html(data.ro_create_date_th);
                            $('.row-form-ro .card .card-body select[name=ro_customer_id]').val(data.ro_customer_id);
                            max_chosen($('.row-form-ro .card .card-body select[name=ro_customer_id]'),'update');
                            $('.row-form-ro .card .card-body input[name=ro_product_name]').val(data.ro_product_name);
                            $('.row-form-ro .card .card-body input[name=ro_product_model]').val(data.ro_product_model);
                            $('.row-form-ro .card .card-body input[name=ro_product_serial]').val(data.ro_product_serial);
                            $('.row-form-ro .card .card-body input[name=ro_customer_department]').val(data.ro_customer_department);
                            $('.row-form-ro .card .card-body input[name=ro_customer_name]').val(data.ro_customer_name);
                            $('.row-form-ro .card .card-body input[name=ro_customer_tel]').val(data.ro_customer_tel);
                            $('.row-form-ro .card .card-body input[name=ro_equipment_product]').val(data.ro_equipment_product);
                            $('.row-form-ro .card .card-body input[name=ro_quotation_id]').val(data.ro_quotation_id);
                            $('.row-form-ro .card .card-body input[name=ro_number_manual]').val(data.ro_number_manual);
                            max_chosen($('.row-form-ro .card .card-body input[name=ro_quotation_id]'),'update');
                            $('.row-form-ro .card .card-body select[name=ro_quotation_id]').val(data.ro_quotation_id);
                            max_chosen($('.row-form-ro .card .card-body select[name=ro_quotation_id]'),'update');
                            $('.row-form-ro .card .card-body input[name=ro_quotation_date]').val(data.ro_quotation_date);
                            $('.row-form-ro .card .card-body input[name=ro_invoice_date]').val(data.ro_invoice_date);
                            $('.row-form-ro .card .card-body input[name=ro_of_date]').val(data.ro_of_date);
                            $('.row-form-ro .card .card-body input[name=ro_invoice_number]').val(data.ro_invoice_number);
                            $('.row-form-ro .card .card-body input[name=ro_of_number]').val(data.ro_of_number);

                            $('.row-form-ro .card .card-body select[name=ro_working_service_id] option').each(function(key_ro_working_service_id,value_ro_working_service_id){
                                let value_service = $(this).val();
                                value_service = value_service.split(',');
                                if (value_service[0] == data.ro_working_service_id) {
                                    $('.row-form-ro .card .card-body select[name=ro_working_service_id]').val($(this).val());
                                    max_chosen($('.row-form-ro .card .card-body select[name=ro_working_service_id]'),'update');
                                }
                            });
                            $('.row-form-ro .card .card-body select[name=ro_working_result_service_id] option').each(function(key_ro_working_result_service_id,value_ro_working_result_service_id){
                                let value_service = $(this).val();
                                value_service = value_service.split(',');
                                if (value_service[0] == data.ro_working_result_service_id) {
                                    $('.row-form-ro .card .card-body select[name=ro_working_result_service_id]').val($(this).val());
                                    max_chosen($('.row-form-ro .card .card-body select[name=ro_working_result_service_id]'),'update');
                                }
                            });
                            // console.log(data);

                            let ro_infrom = data.ro_infrom;
                            if (ro_infrom != '' && ro_infrom.length > 0) {
                                let ro_infrom_html = '<div class="row item-repair-order">';
                                ro_infrom_html += '<div class="col-md-12">';
                                ro_infrom_html += '<div class="form-group bmd-form-group is-filled">';
                                ro_infrom_html += '<label class="bmd-label-floating"><strong>รายการที่ 1</strong></label>';
                                ro_infrom_html += '<input type="text" class="form-control" name="ro_infrom[]" value="ทำการ config แล้วพบว่า ups bettery เสื่อม" required="">';
                                ro_infrom_html += '</div>';
                                ro_infrom_html += '</div>';
                                ro_infrom_html += '<div class="col-md-12"><button type="button" class="btn btn-danger d-block btn-delete-item-repair-order" style="float:unset;margin:auto"><i class="material-icons">delete</i></button></div></div>';
                                $('.row-form-ro .wrap-repair-order .repair-order-body .item-repair-order').remove();
                                $.each(data.ro_infrom,function(key_infrom,value_infrom){
                                    $('.row-form-ro .wrap-repair-order .repair-order-body').append(ro_infrom_html);
                                    let num_order = $('.row-form-ro .wrap-repair-order .repair-order-body .item-repair-order:last-child').index() + 1 ;
                                    $('.row-form-ro .wrap-repair-order .repair-order-body .item-repair-order:last-child label strong').html('รายการที่ '+num_order);
                                    $('.row-form-ro .wrap-repair-order .repair-order-body .item-repair-order:last-child input').val(value_infrom);
                                });
                                $('.row-form-ro .wrap-repair-order .repair-order-body .item-repair-order:first-child .btn-delete-item-repair-order').closest('.col-md-12').remove();
                            }
                            let ro_working_list = data.ro_working_list;
                            if (ro_working_list != '' && ro_working_list.length > 0) {
                                let ro_working_html = '<div class="row item-repair-detail">';
                                ro_working_html += '<div class="col-md-12">';
                                ro_working_html += '<div class="form-group bmd-form-group is-filled">';
                                ro_working_html += '<label class="bmd-label-floating"><strong>รายการที่ 2</strong></label>';
                                ro_working_html += '<input type="text" class="form-control" name="ro_working_list[]" value="Cental Moniter Restart ขณะใช้งาน" required="">';
                                ro_working_html += '</div>';
                                ro_working_html += '</div>';
                                ro_working_html += '<div class="col-md-12"><button type="button" class="btn btn-danger d-block btn-delete-item-repair-detail" style="float:unset;margin:auto"><i class="material-icons">delete</i></button></div></div>';
                                $('.row-form-ro .wrap-repair-detail .repair-detail-body .item-repair-detail').remove();

                                $.each(data.ro_working_list,function(key_working_list,value_working_list){
                                    $('.row-form-ro .wrap-repair-detail .repair-detail-body .list-repair-detail').append(ro_working_html);
                                    let num_order = $('.row-form-ro .wrap-repair-detail .repair-detail-body .item-repair-detail:last-child').index() + 1 ;
                                    $('.row-form-ro .wrap-repair-detail .repair-detail-body .item-repair-detail:last-child label strong').html('รายการที่ '+num_order);
                                    $('.row-form-ro .wrap-repair-detail .repair-detail-body .item-repair-detail:last-child input').val(value_working_list);
                                });
                                $('.row-form-ro .wrap-repair-detail .repair-detail-body .item-repair-detail:first-child .btn-delete-item-repair-detail').closest('.col-md-12').remove();
                            }

                            let ro_working_result_list = data.ro_working_result_list;
                            if (ro_working_result_list != '' && ro_working_result_list.length > 0) {
                                let ro_working_result_html = '<div class="row item-repair-result">';
                                ro_working_result_html += '<div class="col-md-12">';
                                ro_working_result_html += '<div class="form-group bmd-form-group">';
                                ro_working_result_html += '<label class="bmd-label-floating"><strong>รายการที่ 2</strong></label>';
                                ro_working_result_html += '<input type="text" class="form-control" name="ro_working_result_list[]" value="">';
                                ro_working_result_html += '</div>';
                                ro_working_result_html += '</div>';
                                ro_working_result_html += '<div class="col-md-12"><button type="button" class="btn btn-danger d-block btn-delete-item-repair-result" style="float:unset;margin:auto"><i class="material-icons">delete</i></button></div></div>';

                                $('.row-form-ro .wrap-repair-result .repair-result-body .item-repair-result').remove();
                                $.each(data.ro_working_result_list,function(key_working_result_list,value_working_result_list){
                                    $('.row-form-ro .wrap-repair-result .repair-result-body .list-repair-result').append(ro_working_result_html);
                                    let num_order = $('.row-form-ro .wrap-repair-result .repair-result-body .item-repair-result:last-child').index() + 1 ;
                                    $('.row-form-ro .wrap-repair-result .repair-result-body .item-repair-result:last-child label strong').html('รายการที่ '+num_order);
                                    $('.row-form-ro .wrap-repair-result .repair-result-body .item-repair-result:last-child input').val(value_working_result_list);
                                });
                                $('.row-form-ro .wrap-repair-result .repair-result-body .item-repair-result:first-child .btn-delete-item-repair-result').closest('.col-md-12').remove();
                            }

                            if (data.ro_support_type != '') {
                                $('.row-form-ro .wrap-ro-support-type input[name=ro_support_type]').each(function(key_ro_support_type,value_ro_support_type){
                                    if ($(this).val() == data.ro_support_type) {
                                        $(this).prop('checked',true);
                                    }else {
                                        $(this).prop('checked',false);
                                    }
                                });
                            }
                            if (data.ro_working_result_type != '') {
                                $('.row-form-ro .wrap-ro-working-result-type input[name=ro_working_result_type]').each(function(key_ro_working_result_type,value_ro_working_result_type){
                                    if ($(this).val() == data.ro_working_result_type) {
                                        $(this).prop('checked',true);
                                    }else {
                                        $(this).prop('checked',false);
                                    }
                                });
                            }
                            if (data.ro_working_result_product_status != '') {
                                $('.row-form-ro .wrap-ro-working-result-product-status input[name=ro_working_result_product_status]').each(function(key_ro_working_result_type,value_ro_working_result_type){
                                    if ($(this).val() == data.ro_working_result_product_status) {
                                        $(this).prop('checked',true);
                                    }else {
                                        $(this).prop('checked',false);
                                    }
                                });
                            }
                            let product = data.product;
                            if (product != '' && product.length > 0) {
                                let product_html = '<tr class="row item-ro-product">';
                                product_html += '<td class="col-md-2">';
                                product_html += '<div class="form-group bmd-form-group is-filled">';
                                product_html += '<select class="form-control form-control-chosen list-product-id" name="rod_product_id[]" data-placeholder="ค้นหาสินค้า.." style="display: none;"><option value="">ค้นหาสินค้า..</option></select>';
                                product_html += '</div>';
                                product_html += '</td>';
                                product_html += '<td class="col-md-5">';
                                product_html += '<div class="form-group bmd-form-group is-filled">';
                                product_html += '<select class="form-control form-control-chosen list-product-name" data-placeholder="ค้นหาสินค้า.." style="display: none;"><option value="">ค้นหาสินค้า..</option></select>';
                                product_html += '</div>';
                                product_html += '</td>';
                                product_html += '<td class="col-md-1">';
                                product_html += '<div class="form-group bmd-form-group is-filled">';
                                product_html += '<label class="bmd-label-floating"><strong>จำนวน</strong></label>';
                                product_html += '<input type="number" class="form-control text-center ro-quanity" name="rod_product_unit[]" min="0">';
                                product_html += '</div>';
                                product_html += '</td>';
                                product_html += '<td class="col-md-2">';
                                product_html += '<div class="form-group bmd-form-group select-price is-filled">';
                                product_html += '<select class="custom-select list-price" name="rod_product_price[]"><option value="" selected="">กรุณาเลือกสินค้าก่อน..</option></select>';
                                product_html += '</div>';
                                product_html += '<div class="form-group bmd-form-group input-price is-filled" style="display:none">';
                                product_html += '<label class="bmd-label-floating"><strong>ราคา</strong></label>';
                                product_html += '<input type="number" class="form-control text-center input-price" name="" min="0">';
                                product_html += '</div>';
                                product_html += '<div class="form-check row d-flex justify-content-center">';
                                product_html += '<div class="col-md-2">';
                                product_html += '<div class="form-check">';
                                product_html += '<label class="form-check-label">';
                                product_html += '<input class="form-check-input manual-price" type="checkbox" value="">';
                                product_html += '<span class="form-check-sign">';
                                product_html += '<span class="check"></span>';
                                product_html += '</span>';
                                product_html += '</label>';
                                product_html += '</div>';
                                product_html += '</div>';
                                product_html += '<div class="col-md-7 text-center" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>';
                                product_html += '</div>';
                                product_html += '</td>';
                                product_html += '<td class="col-md-2 text-center"></td>';
                                product_html += '</tr>';
                                $('.row-form-ro .list-ro-product tbody').html('');
                                // $('.row-form-ro .list-ro-product tbody').html(product_html);
                                $.each(product,function(key_product,value_product){
                                    $('.row-form-ro .list-ro-product tbody').append(product_html);
                                    $('.row-form-ro .list-ro-product tbody .item-ro-product:last-child select.list-product-id').html('<option value="'+value_product.p_id+'">'+value_product.p_code+'</option>');
                                    $('.row-form-ro .list-ro-product tbody .item-ro-product:last-child select.list-product-name').html('<option value="'+value_product.p_id+'">'+value_product.p_name+'</option>');
                                    max_chosen($('.row-form-ro .list-ro-product .item-ro-product:last-child select.list-product-id'));
                                    max_chosen($('.row-form-ro .list-ro-product .item-ro-product:last-child select.list-product-name'));
                                    var check_value = false;
                                    var data_price = [];
                                    $.ajax({
                                        url: '<?php echo $this->base_url('Product/get') ?>',
                                        method: 'post',
                                        data: {p_id:value_product.p_id,none_decode:1},
                                        async: false,
                                        dataType: 'json',
                                        success: function(result){
                                            if(result[0] == 'success'){
                                                let html = '';
                                                $.each(result[1],function(key_price,value_price){
                                                    html += '<option value="'+value_price.p_price3+'">'+value_price.p_price3+'</option>';
                                                    if (value_price.p_price2 != 0) {
                                                        html += '<option _price="'+value_price.p_price2+'">'+value_price.p_price2+'</option>';
                                                    }
                                                    if (value_price.p_price1 != 0) {
                                                        html += '<option _price="'+value_price.p_price1+'">'+value_price.p_price1+'</option>';
                                                    }
                                                    data_price[0] = value_price.p_price3;
                                                    data_price[1] = value_price.p_price2;
                                                    data_price[2] = value_price.p_price1;
                                                });
                                                $('.row-form-ro .list-ro-product tbody .item-ro-product:last-child select.list-price').html(html);
                                            }
                                        }
                                    });
                                    $.each(data_price,function(key_data_price,value_data_price){
                                        if (value_product.p_price == value_data_price) {
                                            check_value = true;
                                        }
                                    });
                                    if (!check_value) {
                                        $('.row-form-ro .list-ro-product tbody .item-ro-product:last-child .select-price').hide();
                                        $('.row-form-ro .list-ro-product tbody .item-ro-product:last-child .input-price').show();
                                        $('.row-form-ro .list-ro-product tbody .item-ro-product:last-child .input-price').attr('name','rod_product_price[]');
                                        $('.row-form-ro .list-ro-product tbody .item-ro-product:last-child select.list-price').attr('name','');
                                        $('.row-form-ro .list-ro-product tbody .item-ro-product:last-child .manual-price').prop('checked',true);
                                        $('.row-form-ro .list-ro-product tbody .item-ro-product:last-child .input-price').val(value_product.p_price);
                                    }else {
                                        $('.row-form-ro .list-ro-product tbody .item-ro-product:last-child select.list-price').val(value_product.p_price);
                                    }
                                    $('.row-form-ro .list-ro-product tbody .item-ro-product:last-child input.ro-quanity').val(value_product.p_unit);
                                    $('.row-form-ro .list-ro-product tbody .item-ro-product:last-child td:last-child').html(value_product.p_price_sum);

                                });
                            }
                            let html = '';
                            $('.row-form-ro .card .card-body .table-q_product .list-q_product').each(function(key,value){
                                    $(this).remove();
                            });
                            let html_list_q_product = '<tr class="row list-q_product">';
                            html_list_q_product += '<td class="col-md-1 text-center number-order"><span>1</span></td>';
                            html_list_q_product += '<td class="col-md-6 text-center item-ro-product">';
                            html_list_q_product += '<div class="form-group bmd-form-group">';
                            html_list_q_product += '<select class="form-control form-control-chosen list-product" name="q_product[]" data-placeholder="ค้นหาสินค้า.."><option value="">ค้นหาสินค้า..</option></select>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</td>';
                            html_list_q_product += '<td class="col-md-2">';
                            html_list_q_product += '<div class="form-group bmd-form-group select-price">';
                            html_list_q_product += '<select class="custom-select list-price" name="q_product_price[]"><option value="" selected="">กรุณาเลือกสินค้าก่อน..</option></select>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="form-group bmd-form-group input-price" style="display:none">';
                            html_list_q_product += '<label class="bmd-label-floating"><strong>ราคา</strong></label>';
                            html_list_q_product += '<input type="number" class="form-control text-center" name="" min="0">';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="form-check row d-flex justify-content-center">';
                            html_list_q_product += '<div class="col-md-2">';
                            html_list_q_product += '<div class="form-check">';
                            html_list_q_product += '<label class="form-check-label">';
                            html_list_q_product += '<input class="form-check-input manual-price" type="checkbox" value="">';
                            html_list_q_product += '<span class="form-check-sign">';
                            html_list_q_product += '<span class="check"></span>';
                            html_list_q_product += '</span>';
                            html_list_q_product += '</label>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="col-md-7 text-center" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</td>';
                            html_list_q_product += '<td class="col-md-2">';
                            html_list_q_product += '<div class="form-group bmd-form-group">';
                            html_list_q_product += '<label class="bmd-label-floating"><strong>จำนวน</strong></label>';
                            html_list_q_product += '<input type="number" class="form-control text-center q_quanity" name="q_quanity[]" min="0">';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</td>';
                            html_list_q_product += '<td class="col-md-1 text-center">';
                            html_list_q_product += '<div class="form-group bmd-form-group">';
                            html_list_q_product += '<select class="custom-select q_quanity_type" name="q_quanity_type[]">';
                            html_list_q_product += '<option value="ชิ้น">ชิ้น</option>';
                            html_list_q_product += '<option value="อัน">อัน</option>';
                            html_list_q_product += '<option value="ลูก">ลูก</option>';
                            html_list_q_product += '</select>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</td>';
                            html_list_q_product += '</tr>';
                            $('.row-form-ro .card .card-body .table-q_product tbody').html(html_list_q_product);
                            $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child .item-ro-product select').chosen();
                            $.each(data.product,function(key,value){
                                let clone_q_product = $('.row-form-ro .card .card-body .table-q_product .list-q_product:last-child').clone()
                                $('.row-form-ro .card .card-body .table-q_product tbody').append(clone_q_product);
                                let number_order = parseInt($('.row-form-ro .card .card-body .table-q_product .list-q_product:last-child .number-order span').html((key+1)));
                                let btn = '<button type="button" class="btn btn-danger d-block btn-delete-tr" style="float:unset;margin:auto">ลบ</button>';
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child .number-order button').remove();
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child .number-order').append(btn);
                                $.ajax({
                                    url: '<?php echo $this->base_url('Product/get') ?>',
                                    method: 'post',
                                    data: {p_id:value.p_id},
                                    dataType: 'json',
                                    success: function(result){
                                        if(result[0] == 'success'){
                                            let html = '';
                                            $.each(result[1],function(key,value){
                                                html += '<option value="'+value.p_price3+'">'+value.p_price3+'</option>';
                                                if (value.p_price2 != 0) {
                                                    html += '<option value="'+value.p_price2+'">'+value.p_price2+'</option>';
                                                }
                                                if (value.p_price1 != 0) {
                                                    html += '<option value="'+value.p_price1+'">'+value.p_price1+'</option>';
                                                }
                                            });
                                            // console.log($('.row-form-ro .card .card-body .table-q_product').find('.list-q_product').eq(key).find('select.list-price'));
                                            $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product').eq(key).find('select.list-price').html(html);
                                        }
                                    }
                                });
                                let html = '<option value="'+value.p_id+'" selected>'+value.p_name+'</option>'
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child .item-ro-product select.list-product').html(html);
                                // $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child .item-ro-product select.list-product').val(value.p_id);
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child select.list-price').closest('.form-group').hide();
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child select.list-price').attr('name','');
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child .input-price').closest('.form-group').show();
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child .input-price input').attr('name','q_product_price[]');
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child .input-price input').val(value.p_price_data);
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child input.q_quanity').val(value.p_unit);
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child select.q_quanity_type').val(value.p_qty);
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child input.manual-price').prop('checked',true);
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child .item-ro-product select').chosen();
                                $('.row-form-ro .card .card-body .table-q_product').find('.list-q_product:last-child').find('.chosen-container:last-child').remove()
                            });
                            $('.row-form-ro .wrap-ro-support-type input[name=ro_support_type]').each(function(key_ro_support_type,value_ro_support_type){
                                if ($(this).val() == data.ro_support_type) {
                                    $(this).prop('checked',true);
                                }else {
                                    $(this).prop('checked',false);
                                }
                            });
                            $('.row-form-ro .wrap-ro-working-result-type input[name=ro_working_result_type]').each(function(key_ro_working_result_type,value_ro_working_result_type){
                                if ($(this).val() == data.ro_working_result_type) {
                                    $(this).prop('checked',true);
                                }else {
                                    $(this).prop('checked',false);
                                }
                            });
                            $('.row-form-ro .wrap-ro-working-result-product-status input[name=ro_working_result_product_status]').each(function(key_ro_working_result_type,value_ro_working_result_type){
                                if ($(this).val() == data.ro_working_result_product_status) {
                                    $(this).prop('checked',true);
                                }else {
                                    $(this).prop('checked',false);
                                }
                            });
                            // $('.form-add-ro .table-q_product tbody').html(html);
                            // list_product();
                            // $('.row-form-ro .card .card-body .table-q_product .list-q_product .item-ro-product .list-product').val(product[0].p_id);
                            $('.row-form-ro .card .card-body select').trigger("chosen:updated");
                            $('.row-form-ro .card .card-body .table-q_product .list-q_product:first-child').remove();
                            $('.row-form-ro .card .card-body .table-q_product .list-q_product:first-child .btn-delete-tr').remove();
                            $('.row-form-ro .card .card-body select[name=q_service_name]').val(data.q_service_id);
                            $('.form-add-ro .bmd-form-group').addClass('is-filled');
                            list_product();
                            $('.btn-edit-ro').click(function(){$('.loading-screen').show();});
                            $('.btn-edit-ro').click(function(){ //edit ro
                                setTimeout(function(){
                                    var data = $('.form-add-ro').serialize();
                                    if (validate()) {
                                        $.ajax({
                                            url: '<?php echo $this->base_url('Repair_order/update') ?>',
                                            method: 'post',
                                            data: data,
                                            dataType: 'json',
                                            success: function(data){
                                                // console.log(data);
                                                if (data[0] == 'success') {
                                                    Swal.fire({
                                                        type: 'success',
                                                        title: 'บันทึกสำเร็จ',
                                                        showConfirmButton: false,
                                                        timer: 1500
                                                    });
                                                    $('.loading-screen').hide();
                                                    $('.row-form-ro').hide();
                                                    list_ro();
                                                }else if(data[0] == 'updated'){
                                                    Swal.fire({
                                                        type: 'error',
                                                        title: 'ไม่สามารถแก้ไขใบแจ้งซ่อมนี้ได้',
                                                        text: 'เนื่องจากมีการแก้ไขไปแล้วก่อนหน้า',
                                                        confirmButtonText: 'ยืนยัน'
                                                    });
                                                    $('.loading-screen').hide();
                                                    $('.row-form-ro').hide();
                                                    list_ro();
                                                }else if (data[0] == 'fail') {
                                                    Swal.fire({
                                                        type: 'error',
                                                        title: 'ไม่สามารถแก้ไขใบแจ้งซ่อมนี้ได้',
                                                        text: 'เนื่องจากไม่มีใบแจ้งซ่อมนี้ในระบบ',
                                                        confirmButtonText: 'ยืนยัน'
                                                    });
                                                    $('.loading-screen').hide();
                                                    $('.row-form-ro').hide();
                                                    list_ro();
                                                }
                                            }
                                        });
                                    }else {
                                        $('.loading-screen').hide();
                                    }
                                },100);
                            });
                            $('.loading-screen').hide();
                        },100);
                        break;
                    case 'approve':
                        let id = data.ro_id;
                        Swal.fire({
                            title: 'คุณต้องการอนุมัติใบแจ้งซ่อมนี้หรือไม่?',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#4caf50 ',
                            cancelButtonColor: '#f44336 ',
                            confirmButtonText: 'ยืนยัน',
                            cancelButtonText: 'ยกเลิก'
                        }).then((result) => {
                            if (result.value) {
                                $.ajax({
                                    url: '<?php echo $this->base_url('Quotation/update') ?>',
                                    method: 'post',
                                    data: {type:option_type,ro_id:id},
                                    dataType: 'json',
                                    success: function(data){
                                        // console.log(data);
                                        if (data[0] == 'success') {
                                            Swal.fire({
                                                type: 'success',
                                                title: 'อนุมัติสำเร็จ',
                                                showConfirmButton:false,
                                                timer: 1500
                                            });
                                            $('.modal-preview-ro').find('.modal-footer').find('button').remove();
                                            $('.modal-preview-ro').find('.wrap-data-ro .btn-status').removeClass('btn-info');
                                            $('.modal-preview-ro').find('.wrap-data-ro .btn-status').addClass('btn-success');
                                            $('.modal-preview-ro').find('.wrap-data-ro .btn-status h4').html('สถานะ : หัวหน้าอนุมัติ');
                                            list_ro();
                                        }else {
                                            Swal.fire({
                                                type: 'warning',
                                                title: 'ไม่สามารถอนุมัติได้',
                                                showConfirmButton:false,
                                                timer: 1500
                                            });
                                        }
                                    }
                                });
                            }
                        });

                        break;
                    case 'customer_approve':
                        let ro_id = data.ro_id;
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').show(500);
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').attr('type','customer_approve');

                        break;
                    case 'customer_reject':
                        let ro_id_1 = data.ro_id;
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').show(500);
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer label b').html('หมายเหตุ');
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').attr('type','customer_reject');

                        break;
                    case 'print':
                        let ro_id_encode = $('.modal-preview-ro .wrap-data-ro').attr('ro_id');
                        Swal.fire({
                            title: 'คุณต้องการสั่งพิมพ์ใบแจ้งซ่อมนี้หรือไม่?',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#4caf50 ',
                            cancelButtonColor: '#f44336 ',
                            confirmButtonText: 'ยืนยัน',
                            cancelButtonText: 'ยกเลิก'
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = '<?php echo $this->base_url("page/repair_order/") ?>'+ro_id_encode;
                                // Swal.fire({
                                //     title: 'ท่านต้องการตรายางอัตโนมัติหรือไม่?',
                                //     type: 'warning',
                                //     showCancelButton: true,
                                //     confirmButtonColor: '#4caf50 ',
                                //     cancelButtonColor: '#f44336 ',
                                //     confirmButtonText: 'ยืนยัน',
                                //     cancelButtonText: 'ยกเลิก'
                                // }).then((result) => {
                                //     if (result.value) {
                                //         window.location.href = '<?php echo $this->base_url("page/repair_order/") ?>'+ro_id_encode;
                                //     }else {
                                //         window.location.href = '<?php echo $this->base_url("page/quotation/") ?>'+ro_id_encode+'/no_brand';
                                //     }
                                // });
                            }
                        });
                        break;
                    case 'remark_customer':
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').show(500);
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer label b').html('หมายเหตุ');
                        break;
                    default:

                }
                $(this).removeClass('clicked');


            });
        }

        /*form modal check quotation*/
        $('.modal-preview-ro')
        .on('click','.modal-footer .btn-option',function(){
            let type = $(this).attr('option-type');
            switch (type) {
                case 'admin-edit':
                    $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark').show(500);
                    $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark label b').html('หมายเหตุการแจ้งแก้ไข');
                    break;
                default:

            }
        }).on('click','.modal-body .btn-save-remark-customer',function(){
            let value = $(this).closest('.wrap-form-remark-customer').find('textarea[name=q_remark_customer]').val();
            let id = $(this).closest('.wrap-data-ro').attr('ro_id');
            if (value != '') {
                $.ajax({
                    url: '<?php echo $this->base_url('Quotation/update') ?>',
                    method: 'post',
                    data: {q_remark_customer:value,ro_id:id,type:'remark_customer'},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        if (data[0] == 'success') {
                            Swal.fire({
                                title: 'บันทึกสำเร็จ',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('.modal-preview-ro').find('.modal-body .wrap-form-remark-customer').hide(500);
                            $('.modal-preview-ro').find('.modal-body .wrap-remark-cutomer').show(500);
                            $('.modal-preview-ro').find('.modal-body .wrap-remark-customer .wrap-input:last-child').html(value);
                            list_ro();
                        }
                    }

                });
            }
        }).on('click','.modal-body .btn-save-remark',function(){
            let value = $(this).closest('.wrap-form-remark').find('textarea[name=q_remark]').val();
            let id = $(this).closest('.wrap-data-ro').attr('ro_id');
            if (value != '') {
                $.ajax({
                    url: '<?php echo $this->base_url('Quotation/update') ?>',
                    method: 'post',
                    data: {q_remark:value,ro_id:id,type:'admin_edit'},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        if (data[0] == 'success') {
                            Swal.fire({
                                title: 'แจ้งแก้ไขสำเร็จแล้ว',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('.modal-preview-ro').find('.wrap-data-ro .btn-status').removeClass('btn-info');
                            $('.modal-preview-ro').find('.wrap-data-ro .btn-status').addClass('btn-warning');
                            $('.modal-preview-ro').find('.wrap-data-ro .btn-status h4').html('สถานะ : ต้องแก้ไข');
                            $('.modal-preview-ro').find('.modal-body .wrap-form-remark').hide(500);
                            $('.modal-preview-ro').find('.modal-body .wrap-remark').show(500);
                            $('.modal-preview-ro').find('.modal-body .wrap-remark .wrap-input:last-child').html(value);
                            list_ro();
                        }
                    }

                });
            }else {
                Swal.fire({
                    title: 'กรุณาใส่หมายเหตุการแจ้งแก้ไข',
                    type: 'warning',
                    confirmButtonText: 'ตกลง'
                });
            }
        }).on('click','.modal-body .btn-canel-save-remark',function(){
            $(this).closest('.wrap-form-remark').find('textarea[name=q_remark]').val('');
            $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark').hide(500);
        }).on('click','.modal-body .btn-save-po',function(){
            let value = $(this).closest('.wrap-form-po').find('input[name=q_po]').val();
            let value_date = $(this).closest('.wrap-form-po').find('input[name=q_po_date]').val();
            let id = $(this).closest('.wrap-data-ro').attr('ro_id');
            let type_update =  $(this).closest('.wrap-form-po').attr('type');

            if (value == '' || value_date == '') {
                Swal.fire({
                    title: 'กรุณาใส่ข้อมูลให้ครบถ้วน',
                    type: 'warning',
                });
            }else {
                $(this).closest('.wrap-form-po').find('input[name=q_po]').val(value);
                Swal.fire({
                    title: 'คุณต้องการบันทึกใช่หรือไม่?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4caf50 ',
                    cancelButtonColor: '#f44336 ',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '<?php echo $this->base_url('Quotation/update') ?>',
                            method: 'post',
                            data: {q_po:value,q_po_date:value_date,ro_id:id,type:'customer_approve',type_update:type_update},
                            dataType: 'json',
                            success: function(data){
                                if (data[0] == 'success') {
                                    Swal.fire({
                                        title: 'บันทึกสำเร็จ',
                                        type: 'success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $('.modal-preview-ro').find('.modal-body .wrap-po').show(500);
                                    $('.modal-preview-ro').find('.wrap-form-po').find('input[name=q_po_date]').val(data[1]);
                                    $('.modal-preview-ro').find('.modal-body .wrap-form-po').hide(500);
                                    list_ro();
                                    $('.modal-preview-ro').find('.modal-footer').remove();
                                }else {
                                    Swal.fire({
                                        title: 'ไม่สามารถบันทึกได้',
                                        text: 'เนื่องจาก'+data[0],
                                        type: 'warning',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $(this).closest('.wrap-form-po').find('input[name=q_po]').val('');
                                }
                            }

                        });
                    }
                });
            }
        }).on('click','.modal-body .btn-canel-po',function(){
            $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').hide(500);
            if ($(this).closest('.modal-dialog').find('.modal-body .q_po').html() != '') {
                $(this).closest('.modal-dialog').find('.modal-body .wrap-po').show(500);
            }else {
                $(this).closest('.wrap-form-po').find('input[name=q_po]').val('');
                $(this).closest('.wrap-form-po').find('input[name=q_po_date]').val('');
            }
        }).on('click','.modal-body .btn-edit-po',function(){
            $(this).closest('.modal-dialog').find('.modal-body .wrap-po').hide(500);
            $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').show(500);
        }).on('click','.modal-body .btn-canel-save-remark-customer',function(){
            $(this).closest('.wrap-form-remark-customer').find('textarea[name=q_remark]').val('');
            $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').hide(500);
        });

        $('.btn-add-ro').click(function(){
            $('.loading-screen').show();
        });
        $('.btn-add-ro').click(function(){ // add ro
            setTimeout(function(){
                let key_array = 0;
                let check_key = '';
                var data = $('.form-add-ro').serialize();
                if (validate()) {
                    $.ajax({
                        url: '<?php echo $this->base_url('Repair_order/add') ?>',
                        method: 'post',
                        data: data,
                        dataType: 'json',
                        success: function(result){
                            // console.log(result);
                            if (result[0] == 'success') {
                                Swal.fire({
                                    type: 'success',
                                    title: 'สร้างใบแจ้งซ่อม สำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $('.loading-screen').hide();
                                $('.row-form-ro').hide();
                                list_ro();
                            }else {
                                Swal.fire({
                                    type: 'warning',
                                    title: 'มีบางอย่างผิดพลาดในการสร้างใบแจ้งซ่อม',
                                    text: 'กรุณาแจ้งเจ้าหน้าที่ IT',
                                });
                                $('.loading-screen').hide();
                                list_ro();
                            }
                        }
                    });
                }else {
                    $('.loading-screen').hide();
                }
            },100);
        });
        /*for check add quotation*/
        function add_quotation(data,datatype='json'){
            $.ajax({
                url: '<?php echo $this->base_url('employee/add_quotation') ?>',
                method: 'post',
                data: data,
                dataType: datatype,
                success: function(data){
                    if (data[0] == 'success') {
                        Swal.fire({
                            type: 'success',
                            title: 'สร้างใบแจ้งซ่อม สำเร็จ',
                            timer: 1500
                        });
                        $('.row-form-ro').hide();
                        list_ro();
                    }else {
                        console.log(data);
                    }
                }
            })
        }
        /*valiedate form add quotation*/
        function validate(){
            let check_name = '';
            // let input_name = ['ro_working_result_product_detail','ro_working_list[]','ro_working_result_type','ro_equipment_product','ro_working_list[]','ro_working_result_product_detail'];
            // let input_name = ['ro_working_list[]','ro_working_result_type','ro_working_result_detail','ro_equipment_product','ro_working_result_list[]','ro_working_result_product_status','ro_working_result_product_detail'];
            $('.row-form-ro *[name*=ro_]').each(function(key,value){
                let tag = $(this);
                if ($(this).attr('required')) {
                    if ($(this).attr('type') == 'checkbox') {
                        $(this).closest('.form-check').find('.help-block').remove();
                        let input_name = $(this).attr('name');
                        if (check_name != input_name) {
                            let error = true;
                            check_name = input_name;
                            input_name_split = input_name.split('_');
                            let wrap_input = '.wrap-'+input_name_split.join('-');
                            $(this).closest(wrap_input).find('input[name='+$(this).attr('name')+']').each(function(key,value){
                                if ($(this).prop('checked')) {
                                    error = false;
                                }
                            });
                            if (error) {
                                $(this).closest(wrap_input).append('<span class="help-block left-align help-block-check"><li>กรุณาเลือกตัวเลือก</li></span>');
                            }else {
                                $(this).closest(wrap_input).find('.help-block').remove();
                            }
                        }
                    }else {
                        $(this).closest('.form-group').find('.help-block').remove();
                            if (tag.val() == '') {
                                if (tag.prop('tagName') == 'SELECT') {
                                    tag.closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                                }else {
                                    tag.closest('.form-group').append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
                                }
                            }
                            if (tag.attr('name') == 'ro_quanity[]') {
                                if(((tag.val() < 0 ) && tag.val() != '') || tag.val() == '0'){
                                    tag.closest('.form-group').append('<span style="width:fit-content !important" class="help-block left-align"><li>กรุณาใส่ค่าตั้งแต่ 1 ขึ้นไป</li></span>');
                                }
                            }
                    }

                }
            });
            $('.row-form-ro *[name*=rod_]').each(function(key,value){
                $(this).closest('.form-group').find('.help-block').remove();
                if ($(this).attr('name') != 'rod_product_id[]' && $(this).attr('name') != 'rod_product_unit[]' && $(this).attr('name') != 'rod_product_price[]') {
                    if ($(this).val() == '') {
                        if ($(this).prop('tagName') == 'SELECT') {
                            $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                        }else {
                            $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
                        }
                    }
                }
            });
            $('.row-form-ro').on('change keyup','*[name*=ro_]',function(){
                if ($(this).val() != '') {
                    $(this).closest('.form-group').find('.help-block').remove();
                }else {
                    $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                }
            });
            var error = true;
            if ($('.row-form-ro .help-block').length > 0) {
                error = false;
                $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);
            }


            // $('.row-form-ro .help-block').each(function(key,value){
            //     console.log($(this));
            // });
            return error;
        }

        /*when click add prodcut*/
        $('.form-add-ro').on('click','.wrap-btn-add-q_product .btn-add-q_product',function(){
            let clone_q_product = $(this).closest('.form-add-ro').find('.list-q_product:last-child').clone()
            $(this).closest('.form-add-ro').find('.list-q_product').closest('tbody').append(clone_q_product);
            let number_order = parseInt($(this).closest('.form-add-ro').find('.list-q_product:last-child .number-order span').html()) + 1;
            $(this).closest('.form-add-ro').find('.list-q_product:last-child .number-order span').html(number_order);
            let btn = '<button type="button" class="btn btn-danger d-block btn-delete-tr" style="float:unset;margin:auto">ลบ</button>';
            $(this).closest('.form-add-ro').find('.list-q_product:last-child .number-order button').remove();
            $(this).closest('.form-add-ro').find('.list-q_product:last-child .number-order').append(btn);
            $(this).closest('.form-add-ro').find('.list-q_product:last-child .item-ro-product select').chosen();
            $(this).closest('.form-add-ro').find('.list-q_product:last-child .help-block').remove();
            $(this).closest('.form-add-ro').find('.list-q_product:last-child').find('.chosen-container:last-child').remove()
            material_input();
        });

        /*materail input*/
        function material_input(){
            $('input.form-control').each(function(){
                if ($(this).val() != '') {
                    $(this).closest('.bmd-form-group').addClass('is-filled');
                }
            });

            $('.bmd-form-group').on('focusout','input.form-control',function(){
                if ($(this).val() == '') {
                    $(this).closest('.bmd-form-group').removeClass('is-filled');
                    $(this).closest('.bmd-form-group').removeClass('is-focused');
                }else {
                    $(this).closest('.bmd-form-group').removeClass('is-focused');
                }
            });
            $('.bmd-form-group').on('focusin','input.form-control',function(){
                if ($(this).closest('.bmd-form-group').hasClass('is-focused') == false) {
                    $(this).closest('.bmd-form-group').addClass('is-focused');
                }
            });
            $('.bmd-form-group').on('keyup change','input.form-control',function(){
                if ($(this).val() != '') {
                    $(this).closest('.bmd-form-group').addClass('is-filled');
                }
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
        function loading_gif(inner,status='',width=1){
            let $html_loader = '<img class="max-loader-gif col-md-'+width+'" src="<?php echo $this->public_url('file/images/system/Loading_2.gif') ?>">';
            switch (status) {
                case 'remove':
                    inner.find('.max-loader-gif').remove();
                    break;
                case 'insert':
                    inner.append($html_loader);
                    break;
                default:
                    inner.html($html_loader);
            }

        }


        // function ellipsizeTextBox(id) {
        //     var el = document.getElementById(id);
        //     var wordArray = el.innerHTML.split(' ');
        //     while(el.scrollHeight > el.offsetHeight) {
        //         wordArray.pop();
        //         el.innerHTML = wordArray.join(' ') + '...';
        //      }
        // }
        // ellipsizeTextBox(‘block-with-text);

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
      // (function() {
      //     isWindows = navigator.platform.indexOf('Win') > -1 ? true : false;
      //
      //     if (isWindows) {
      //         // if we are on windows OS we activate the perfectScrollbar function
      //         $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
      //
      //         $('html').addClass('perfect-scrollbar-on');
      //     } else {
      //         $('html').addClass('perfect-scrollbar-off');
      //     }
      // })();



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
