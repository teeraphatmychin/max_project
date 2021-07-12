<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Quotation</title>
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
          /* border-bottom: 1px !important; */
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
      .form-add-quotation .row{
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
      .wrap-data-quotation .q_to,.wrap-data-quotation .q_to_detail{
          padding: 10px 0px;
      }
      .wrap-data-quotation .table.q_product th{
          border-top:1px solid #ccc;
          border-left:1px solid #ccc;
          border-bottom: 4px double #000 !important;
      }
      .wrap-data-quotation .table.q_product th:last-child{
          border-right:1px solid #ccc;
      }
      .wrap-data-quotation .table.q_product td{
          border-left:1px solid #ccc;
          /* text-align: center; */
      }
      .wrap-data-quotation .table.q_product td:last-child{
          border-right:1px solid #ccc;
      }
      .wrap-data-quotation .table.q_product tr:last-child td{
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
      /* overlay */
      .jumbotron {
          /* padding-right: 60px;
          padding-left: 60px;
          border-radius: 6px;
          position: relative;
          overflow: hidden;
          clear: both;
          margin-bottom: 30px;
          color: inherit;
          background-color: #eee; */
      }
      .jumbotron:hover .jumbotron-overlay-down {
          -moz-transform: translateY(100%);
          -o-transform: translateY(100%);
          -webkit-transform: translateY(100%);
          transform: translateY(100%);
      }
      .jumbotron-overlay-down {
          position: absolute;
          top: -100%;
          left: 0;
          background-color: #22334d;
          transition: all .5s ease-in-out;
      }
      .jumbotron-overlay-down, .jumbotron-overlay-left {
          width: 100%;
          height: 100%;
          color: #333;
          -webkit-transition: all .5s ease-in-out;
          -moz-transition: all .5s ease-in-out;
          -ms-transition: all .5s ease-in-out;
          -o-transition: all .5s ease-in-out;
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
                    <h5 class="modal-title" id="myExtraLargeModalLabel">ใบเสนอราคา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body wrap-data-quotation p-3"></div>
                <div class="modal-footer d-flex justify-content-between"></div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl modal-preview-quotation" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">ใบเสนอราคา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body wrap-data-quotation p-3"></div>
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
            <a class="navbar-brand" href="#pablo">รายการสินค้า</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse max-top-nav justify-content-end">
            <ul class="nav justify-content-end">
                <?php //if ($_SESSION['user']->position == 'Service Ad.' or $_SESSION['user']->position == 'IT'): ?>
                    <li class="nav-item">
                        <a class="nav-link btn-modal-add-issue bg-success btn-modal-add-product" href="javascript:void(0)">
                            <i class="material-icons text-white">add_circle</i>
                            <p class="text-white d-block">เพิ่มสินค้า</p>
                        </a>
                    </li>
                <?php //endif; ?>
            </ul>
          </div>
        </div>
        <hr>
      </nav>
      <!-- End Navbar -->
      <div class="content">

        <div class="container-fluid">
            <div class="row row-add-product" style="display:none">
                <div class="col-md-12 wrap-card-quotation">
                    <div class="card">
                        <div class="card-header card-header-info header-add-quotation">
                            <h4 class="card-title">เพิ่มสินค้า</h4>
                        </div>
                        <div class="row justify-content-between pl-4 pr-4 header-edit-quotation" style="display:none">
                            <div class="col-md-8 card-header card-header-info">
                                <h4 class="card-title">แก้ไขข้อมูลสินค้า</h4>
                            </div>
                            <div class="col-md-3 card-header card-header-info text-center">
                                <p class="card-category text-white q_num">เลขที่ : SER.792/2562</p>
                                <p class="card-category text-white q_date">วันที่ <?php echo $this->date_th(date('Y-m-d'),2); ?></p>
                            </div>
                        </div>
                        <div class="card-body p-5">
                                <form class="form-add-product">
                                    <input type="hidden" name="type" value="">
                                    <input type="hidden" name="p_id" value="">
                                    <input type="hidden" name="add_product" value="1">
                                    <!-- <input type="hidden" name="q_date" value="<?php echo date('Y-m-d H:i:s') ?>"> -->
                                    <div class="row">
                                        <div class="col-md-4 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>รหัสสินค้า</strong></label>
                                                <input type="text" class="form-control" name="p_code" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-8 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>ชื่อสินค้า</strong></label>
                                                <input type="text" class="form-control" name="p_detail" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="col-md-12 wrap-input">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating"><strong>ราคาที่ 1</strong></label>
                                                    <input type="number" class="form-control text-center" name="p_price3" value="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 wrap-input">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating"><strong>ราคาที่ 2</strong></label>
                                                    <input type="number" class="form-control text-center" name="p_price2" value="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 wrap-input">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating"><strong>ราคาที่ 3</strong></label>
                                                    <input type="number" class="form-control text-center" name="p_price1" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 wrap-input">
                                            <div class="form-group">
                                                <label class="text-dark"><b>รายละเอียด</b></label>
                                                <div class="form-group bmd-form-group">
                                                    <textarea class="form-control" name="p_sub_detail" rows="6"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group bmd-form-group">
                                                <select class="custom-select select-p_cate" name="p_cate"></select>
                                            </div>
                                            <div class="form-group bmd-form-group pl-1 pr-1" style="display:none">
                                                <label class="bmd-label-floating"><strong>กรอกประเภท</strong></label>
                                                <input type="text" class="form-control input-p_cate" name="" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <table>
                                                <tr>
                                                    <td class="add-customer pl-2">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input p_cate_manual" name="p_cate_manual" type="checkbox" value="p_cate_manual">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td style="padding-top: 25px;">กรอกประเภทเอง</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group bmd-form-group">
                                                <select class="custom-select select-p_brand" name="p_brand">
                                                    <option value="">แบรนด์</option>
                                                    <option value="Philips">Philips</option>
                                                    <option value="Zoll">Zoll</option>
                                                </select>
                                            </div>
                                            <div class="form-group bmd-form-group pl-1 pr-1" style="display:none">
                                                <label class="bmd-label-floating"><strong>กรอกแบรนด์</strong></label>
                                                <input type="text" class="form-control input-p_brand" name="" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <table>
                                                <tr>
                                                    <td class="add-customer pl-2">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input p_brand_manual" name="p_brand_manual" type="checkbox" value="p_brand_manual">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td style="padding-top: 25px;">กรอกแบรนด์เอง</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-4 wrap-preview-img mb-0 border rounded pb-3 pt-0" style="background: unset">
                                            <div class="col-md-12 pl-0">
                                                <label class="text-dark"><b>รูปภาพสินค้า</b></label>
                                            </div>
                                            <div class="col-md-12 image-body d-flex justify-content-center p-0" style="overflow: hidden;">
                                                <input type="file" name="upload_image" accept="image/png,image/jpeg,image/jpg" value="" style="position:absolute;height:100%;opacity:0;z-index:2">
                                                <!-- <div class="jumbotron-overlay-down d-flex justify-content-center" style="z-index:1;background-color: rgb(0, 188, 212, 0.5);">
                                                    <h2 class="text-warning bg-info" style="width:max-content;height:max-content">แก้ไข</h2>
                                                </div> -->
                                                <div class="col-md-12 rounded p-0 text-center">
                                                    <img class="col p-0 rounded preview-img" src="<?php echo $this->public_url('file/images/system/plus.png') ?>" alt="" style="width:auto;">
                                                </div>
                                                <input type="hidden" name="p_img" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                        </div>
                            <div class="card-footer text-center justify-content-between">
                                <a class="btn btn-danger btn-cancel-product" href="javascript:void(0)"><h4><i class="material-icons mr-3">cancel</i>ยกเลิก</h4></a>
                                <a class="btn btn-success btn-add-product" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>
                            </div>
                        </div>
                    </div>
                    <hr>
            </div>

            <div class="navbar">
                <form class="form-search col-md-12">
                    <div class="row justify-content-around d-flex">
                        <div class="form-group">
                            <label class="text-dark">ค้นหา : </label>
                            <div class="form-group bmd-form-group">
                                <input type="text" class="form-control search" name="search"  value="">
                            </div>
                        </div>
                        <!-- <div class="form-group">
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
                        </div> -->
                        <div class="form-group">
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-cate" name="search-cate"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-brand" name="search-brand"></select>
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
                </form>
            </div>



            <div class="row list-product">
                <div class="col-lg-12 col-md-12">
                    <div class="card card-equipment-list">
                        <div class="card-header row d-flex justify-content-between">
                            <div class="card-header-info col-8">
                                <h4 class="card-title">รายการสินค้า</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-header-info text-center" style="width: fit-content !important">
                                <h4 class="card-title">ทั้งหมด <b>0</b> รายการ</h4>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover tb-quotation-list">
                                <thead class="text-info">
                                    <tr>
                                        <th>รูปภาพ</th>
                                        <th>รหัสสินค้า</th>
                                        <th>รายละเอียด</th>
                                        <th>แบรนด์</th>
                                        <th>ราคา</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody last-date=''></tbody>
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
  <script src="<?php echo $this->public_url('js/jquery-3.3.1.js') ?>"></script>
  <!-- <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/jquery.min.js"></script> -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/sweetalert2.js"></script>
 <script src="<?php echo $this->public_url('libs/chosen/js/chosen.jquery.min.js') ?>"></script>
  <!-- <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script> -->


  <script type="text/javascript">

    $(document).ready(function() {
        //ต้องมีด้วยว่าคนไหนมีสิทธิ์ search อะไรบ้าง
            //น่าจะตามสิทธิ์ที่เห็นได้ว่าเห็นอะไรได้ บ้าง
        // $('.modal-preview-quotation').modal('show');
        // $('.row-add-product').show(500);

        // setInterval(test, 3000); // ทำ notification paramiter เป็น (function(),timer)
        btn_to_top();
        material_input();
        list_customer();
        list_product();
        // loading_gif($('.form-add-quotation .table-q_product  .wrap-list-product'));
        get_number_quotation();
        list_service_name();
        list_brand();
        upload_image();
        // var timeout;
        // document.focus = function(){
        //     document.onmousemove = function(){
        //         clearTimeout(timeout);
        //         timeout = setTimeout(list_product, 3000);
        //     }
        // }
        setInterval(list_product, 15000);
        // setInterval(check_new_product, 15000);
        // console.log(timeout);
        // if (timeout != 0) {
        //     setTimeout(function(){setInterval(list_product, 3000);},timeout);
        // }
        $('.row-add-product').on('change','input.p_cate_manual',function(){
            if ($(this).prop('checked')) {
                $(this).closest('.row-add-product').find('input.input-p_cate').closest('.form-group').show();
                $(this).closest('.row-add-product').find('select.select-p_cate').closest('.form-group').hide();
                $(this).closest('.row-add-product').find('input.input-p_cate').attr('name','p_cate');
                $(this).closest('.row-add-product').find('select.select-p_cate').attr('name','');
            }else {
                $(this).closest('.row-add-product').find('input.input-p_cate').closest('.form-group').hide();
                $(this).closest('.row-add-product').find('select.select-p_cate').closest('.form-group').show();
                $(this).closest('.row-add-product').find('select.select-p_cate').attr('name','p_cate');
                $(this).closest('.row-add-product').find('input.input-p_cate').attr('name','');
            }
        });
        $('.row-add-product').on('change','input.p_brand_manual',function(){
            if ($(this).prop('checked')) {
                $(this).closest('.row-add-product').find('input.input-p_brand').closest('.form-group').show();
                $(this).closest('.row-add-product').find('select.select-p_brand').closest('.form-group').hide();
                $(this).closest('.row-add-product').find('select.select-p_brand').attr('name','');
                $(this).closest('.row-add-product').find('input.input-p_brand').attr('name','p_brand');
            }else {
                $(this).closest('.row-add-product').find('input.input-p_brand').closest('.form-group').hide();
                $(this).closest('.row-add-product').find('select.select-p_brand').closest('.form-group').show();
                $(this).closest('.row-add-product').find('select.select-p_brand').attr('name','p_brand');
                $(this).closest('.row-add-product').find('input.input-p_brand').attr('name','');
            }
        });
        function upload_image(){
            $('.row-add-product').on('change','input[name=upload_image]',function(){
                let loading = loading_gif('','',1,1);
                $(this).closest('.image-body').find('img.preview-img').attr('src',loading);
            });
            $('.row-add-product').on('change','input[name=upload_image]',function(e){
                let tag = $(this);
                setTimeout(function(){
                    data = new FormData();
                    data.append("image", e.target.files[0]);
                    if (tag.closest('.image-body').find('input[name=p_img]').val() != '') {
                        data.append('old_image',tag.closest('.image-body').find('input[name=p_img]').val());
                    }
                    $.ajax({
                        url: '<?php echo $this->base_url('Product/upload_image') ?>',
                        data: data,
                        type: "POST",
                        method: 'post',
                        cache: false,
                        // async: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(data){
                            tag.val('');
                            tag.closest('.wrap-preview-img').addClass('jumbotron');
                            tag.closest('.image-body').find('img.preview-img').attr('src',data);
                            tag.closest('.image-body').find('input[name=p_img]').val(data);
                        }
                    });
                },100);
            });
        }
        function search_sort(data){
            $('.navbar .form-search')
            .on('click','.btn-reset-search',function(){
                $('.navbar .form-search .search').val('');
                $('.navbar .form-search .search-date-start').val('');
                $('.navbar .form-search .search-date-end').val('');
                $('.navbar .form-search .search-cate').val('');
                $('.navbar .form-search .search-sort').val('');
                let html = '';
                let check_month = '0';
                let check_line_today = 0;
                $.each(data,function(key,value){
                    html += '<tr>';
                    if (value.p_img != '') {
                        value.p_img = '<img src="'+value.p_img+'">';
                    }
                    html += '<td>'+value.p_img+'</td>';
                    html += '<td>'+value.p_code+'</td>';
                    html += '<td>'+value.p_detail+'<br>'+value.p_sub_detail+'</td>';
                    html += '<td>'+value.p_brand+'</td>';
                    let price = {};
                    price.price3 = value.p_price3;
                    price.price2 = value.p_price2;
                    price.price1 = value.p_price1;
                    html += '<td>';
                    $.each(price,function(key,value){
                        if (value != 0) {
                            let br = '';
                            if (key != 0) {
                                br = '<br>';
                            }
                            html += br+value+'.-';
                        }
                    });
                    html += '</td>';
                    html += '</tr>';
                });
                let num_order = data.length;
                $('.content .list-product .card-title b').html(num_order);
                $('.content .list-product tbody').html(html);
            })
            .on('change keyup','.search,.search-date-start,.search-date-end,.search-sort,.search-cate,.search-brand',function(){
                let search = $('.navbar .form-search .search').val();
                let date_start = $('.navbar .form-search .search-date-start').val();
                let date_end = $('.navbar .form-search .search-date-end').val();
                let sort = $('.navbar .form-search .search-sort').val();
                let cate = $('.navbar .form-search .search-cate').val();
                let brand = $('.navbar .form-search .search-brand').val();
                let cate_text = $('.navbar .form-search .search-cate option:selected').html();
                let data_search = [];
                let key_data_search = 0;
                // if (date_start != '' || date_end != '') {
                //     if ((date_start != '' && date_end != '') && (date_end < date_start)) {
                //         let data_swap = date_start;
                //         date_start = date_end;
                //         date_end = data_swap;
                //     }
                //
                //     for (var i = 0; i < data.length; i++) {
                //         let date = data[i].q_date;
                //         date = date.split(' ');
                //         date = date[0];
                //         if (date_start != '' && date_end != '') {
                //             if (date >= date_start && date <= date_end) {
                //                 data_search[key_data_search++] = data[i];
                //             }
                //         }else if (date_start != '' && date_end == '') {
                //             if (date >= date_start) {
                //                 data_search[key_data_search++] = data[i];
                //             }
                //         }else if (date_end != '' && date_start == '') {
                //             if (date >= date_end) {
                //                 data_search[key_data_search++] = data[i];
                //             }
                //             date_start = date_end; //ใช้ assign ค่าใว้ใช้เมื่อ search ไม่เจอ
                //             date_end = '';
                //         }
                //
                //     }
                // }else {
                    data_search = data;
                // }
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
                    cate = cate.toLowerCase();
                    let data_search_search = [];
                    let data_key_search = 0;
                    for (var i = 0; i < data_search.length; i++) {
                        let data_p_cate = data_search[i].p_cate;
                        data_p_cate = data_p_cate.toLowerCase();
                        if (data_p_cate.indexOf(cate) > -1 ) {
                            data_search_search[data_key_search++] = data_search[i];
                        }
                    }
                    data_search = data_search_search;
                }
                if (brand != '') {
                    brand = brand.toLowerCase();
                    let data_search_search = [];
                    let data_key_search = 0;
                    for (var i = 0; i < data_search.length; i++) {
                        let data_p_brand = data_search[i].p_brand;
                        data_p_brand = data_p_brand.toLowerCase();
                        if (data_p_brand.indexOf(brand) > -1 ) {
                            data_search_search[data_key_search++] = data_search[i];
                        }
                    }
                    data_search = data_search_search;
                }
                if (search != '') {
                    search = search.toLowerCase();
                    let data_search_search = [];
                    let data_key_search = 0;
                    for (var i = 0; i < data_search.length; i++) {
                        if (data_search[i].p_code != '' && data_search[i].p_code != null) {
                            let data_p_code = data_search[i].p_code;
                            data_p_code = data_p_code.toLowerCase();
                            if (data_p_code.indexOf(search) > -1 ) {
                                data_search_search[data_key_search++] = data_search[i];
                            }
                        }
                    }
                    if (data_search_search.length > 0) {
                        data_search = data_search_search;
                    }else {
                        let data_search_search = [];
                        let data_key_search = 0;
                        for (var i = 0; i < data_search.length; i++) {
                            let data_p_detail = data_search[i].p_detail;
                            data_p_detail = data_p_detail.toLowerCase();
                            if (data_p_detail.indexOf(search) > -1 ) {
                                data_search_search[data_key_search++] = data_search[i];
                            }
                        }
                        if (data_search_search.length > 0) {
                            data_search = data_search_search;
                        }else {
                            let data_search_search = [];
                            let data_key_search = 0;
                            for (var i = 0; i < data_search.length; i++) {
                                let data_p_sub_detail = data_search[i].p_sub_detail;
                                data_p_sub_detail = data_p_sub_detail.toLowerCase();
                                if (data_p_sub_detail.indexOf(search) > -1 ) {
                                    data_search_search[data_key_search++] = data_search[i];
                                }
                            }
                            if (data_search_search.length > 0) {
                                data_search = data_search_search;
                            }else {
                                // here ทำ search from database
                                var search_database = function (text_search=search){
                                    var data_search_search = [];
                                    $.ajax({
                                        url: '<?php echo $this->base_url('Product/search_product') ?>',
                                        method: 'post',
                                        data: {search:text_search},
                                        dataType: 'json',
                                        async: false,
                                    }).done(function(result){
                                        if (result[0] == 'success') {
                                            data_search_search = result[1];
                                        }
                                    });
                                    return data_search_search;
                                }();
                                if (search_database.length > 0) {
                                    data_search = search_database;
                                }else {
                                    data_search = [];
                                }
                            }

                        }
                    }
                }
                let html = '';
                let check_month = '0';
                if (data_search.length < 1) {
                    let text = 'ไม่มีใบเสนอราคาที่ ';
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
                    html += '<tr><td class="text-center" colspan="4">ไม่มีรายการสินค้า</td></tr>';
                    let number_order = 0;
                    $('.content .list-product .card-title b').html(number_order);
                    $('.content .list-product tbody').html(html);
                }else {
                    let check_line_today = 0;
                    $.each(data_search,function(key,value){
                        html += '<tr p_id="'+value.p_id+'">';
                        if (value.p_img != '') {
                            value.p_img = '<img src="'+value.p_img+'">';
                        }
                        html += '<td>'+value.p_img+'</td>';
                        html += '<td>'+value.p_code+'</td>';
                        html += '<td>'+value.p_detail+'<br>'+value.p_sub_detail+'</td>';
                        html += '<td>'+value.p_brand+'</td>';
                        let price = {};
                        price.price3 = value.p_price3;
                        price.price2 = value.p_price2;
                        price.price1 = value.p_price1;
                        html += '<td>';
                        $.each(price,function(key,value){
                            if (value != 0) {
                                let br = '';
                                if (key != 0) {
                                    br = '<br>';
                                }
                                html += br+value+'.-';
                            }
                        });
                        html += '</td>';
                        html += '<td><button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button></td>';
                        html += '</tr>';
                    });
                    let number_order = data_search.length;
                    $('.content .list-product .card-title b').html(number_order);
                    $('.content .list-product tbody').html(html);
                    // option_click(data_search);
                }
            });
        }

        /*remove form product*/
        $('.form-add-quotation').on('click','.list-q_product .btn-delete-tr',function(){
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
                        let q_type = $('.form-add-quotation select[name=q_type]').val();
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
        $('.form-add-quotation').on('change','select.list-customer',function(){
            let selec_value = $(this).find('option:selected').html();
            $('.form-add-quotation').find('input[name=q_to]').closest('form-group').find('.help-block').remove();
            $('.form-add-quotation').find('input[name=q_to]').val('ผู้อำนวยการ '+selec_value);

        });

        /*select type quotation*/
        $('.form-add-quotation').on('change','select[name=q_type]',function(){
            let value = $(this).val();
            let q_num = $('.wrap-card-quotation .q_num').html();
            split_q_num = q_num.split('.');
            sub_q_num = split_q_num[0].split(' ');
            q_type = sub_q_num[1];
            q_num = q_num.replace(q_type,value);
            $('.wrap-card-quotation .q_num').html(q_num);
        });

        /*เปิด card form add quotation*/
        $('.btn-modal-add-product').click(function(){
            $('.loading-screen').show();
            $('.row-add-product').show();
            $('.row-add-product .btn-update-product').remove();
        });
        $('.btn-modal-add-product').click(function(){
            setTimeout(function(){
                $('.row-add-product .btn-add-product').show();
                let check = $('.row-add-product .card .card-body input[name=type]').val();
                let value = $('.row-add-product .form-add-quotation input[name=q_date]').val();
                $('.row-add-product .card .card-header').removeClass('card-header-warning');
                $('.row-add-product .card .card-header').addClass('card-header-info');
                $('.row-add-product .card .card-header h4.card-title').html('สร้างใบเสนอราคา');
                $('.row-add-product .form-add-quotation .help-block').remove();
                $('.row-add-product .header-edit-quotation').hide();
                $('.row-add-product .header-add-quotation').show();
                $('.row-add-product input').val('');
                $('.row-add-product textarea').val('');
                $('.row-add-product input[name=add_product]').val('1');
                $('.row-add-product input[name*=p_price]').val('0');
                $('.row-add-product .image-body .preview-img').prop('src',"<?php echo $this->public_url('file/images/system/plus.png') ?>");
                // $('.row-add-product .form-add-quotation input').each(function(key,value){
                //     let input_name = $(this).attr('name');
                //     let input_except = ['q_topic','q_to','q_to_detail','q_date'];
                //     let check_name = true;
                //     for (var i = 0; i < input_except.length; i++) {
                //         if (input_except[i] != input_name) {
                //             check_name = false;
                //         }
                //     }
                //     if (check_name) {
                //         $(this).val('');
                //     }
                // });
                $('.row-add-product .form-add-quotation select').each(function(key,value){
                    let select_name = $(this).attr('name');
                    if (select_name.indexOf('q_') > -1) {
                        if (select_name != 'q_type' && $(this).hasClass('q_quanity_type') == false) {
                            $(this).val('');
                        }
                    }
                });
                $('.row-add-product .form-add-quotation input').each(function(key,value){
                    $(this).val('');
                });
                $('.row-add-product .form-add-quotation input[name=add_quotation]').val('1');
                $('.row-add-product .form-add-quotation input[name=q_model]').val('');
                $('.row-add-product .form-add-quotation input[name=q_topic]').val('ขอเสนอราคา ');
                $('.row-add-product .form-add-quotation input[name=q_sn]').val('');
                $('.row-add-product .form-add-quotation input[name=q_customer_department]').val('');
                $('.row-add-product .form-add-quotation select.list-price').html('<option value="" selected>กรุณาเลือกสินค้าก่อน..</option>');
                // $('.row-add-product .form-add-quotation select[name=q_type]').val(q_type);
                // $('.row-add-product .form-add-quotation input[name=q_date]').val(value);
                // $('.row-add-product .form-add-quotation input[name=q_to_detail]').val(q_to_detail);
                $('.row-add-product .form-add-quotation input.q_quanity').val('');
                $('.row-add-product .form-add-quotation input.set-price-day').val('90');
                $('.row-add-product .form-add-quotation input.set-price-detail').val('นับตั้งแต่วันเสนอราคา');
                $('.row-add-product .form-add-quotation input.set-dalivery-day').val('120');
                $('.row-add-product .form-add-quotation input.set-dalivery-detail').val('นับตั้งแต่วันได้รับใบสั่งซื้อ/จ้าง');
                $('.row-add-product .form-add-quotation input.set-warranty-day').val('90');
                $('.row-add-product .form-add-quotation input.set-warranty-detail').val('นับตั้งแต่วันส่งมอบ');
                // $('.row-add-product .form-add-quotation select.q_quanity_type').val(q_quanity_type);
                $('.row-add-product .form-add-quotation input[name=q_to').val('ผู้อำนวยการ');
                $('.row-add-product .form-add-quotation input[name=q_to_detail').val('บริษัทฯ มีความยินดีเสนอราคา ');
                $('.row-add-product .form-add-quotation input[name=q_service_phone').val('');
                // $('.row-add-product .form-add-quotation select[name*=q_]').trigger("chosen:updated");
                // $('.row-add-product .form-add-quotation input[name=add_quotation]').attr('name','update_quotation');
                $('.row-add-product .form-add-quotation').find('.bmd-form-group').removeClass('is-filled');
                $('.row-add-product .form-add-quotation').find('.bmd-form-group').removeClass('is-focused');
                $('.row-add-product .card .card-footer .btn-add-product').show();
                $('.row-add-product .card .card-footer .btn-edit-product').hide();

                $('.row-add-product .form-add-quotation input').each(function(key,value){
                    if ($(this).val() != '') {
                        $(this).closest('.form-group').addClass('is-filled');
                    }
                });
                $('.row-add-product .form-add-quotation .list-q_product').each(function(key,value){

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

                $('.row-add-product').show();
                $('html, body').animate({scrollTop:($(".row-add-product").offset().top)}, 500);
                $('.loading-screen').hide();
            },100);
        });

        /*close form add*/
        $('.btn-cancel-product').click(function(){
            $('.row-add-product').hide();
        });

        /*manual price*/
        $('.form-add-quotation .table-q_product').on('click','.manual-price',function(){
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
        /*manual product name*/
        $('.form-add-quotation .table-q_product').on('click','.manual-product',function(){
            $(this).closest('td').find('.help-block').remove();
            let value = $(this).closest('.wrap-list-product').find('.list-product option:selected').html();
            if ($(this).prop('checked') == true) {
                // $(this).closest('.list-q_product').find('.list-product').closest('.form-group').hide();
                $(this).closest('.list-q_product').find('.input-product').show();
                $(this).closest('.list-q_product').find('.input-product input').val(value);
                $(this).closest('.list-q_product').find('.input-product').closest('.bmd-form-group').addClass('is-filled');
                // $(this).closest('.list-q_product').find('.input-product input').attr('name','q_product_name[]');
                // $(this).closest('.list-q_product').find('.list-product select').attr('name','');
            }else {
                $(this).closest('.list-q_product').find('.input-product').hide();
                // $(this).closest('.list-q_product').find('.list-product').closest('.form-group').show();
                // $(this).closest('.list-q_product').find('.input-product input').attr('name','');
                // $(this).closest('.list-q_product').find('.list-product select').attr('name','q_product[]');
            }
        });
        $('.form-add-quotation').on('change','select.list-service-name',function(){
            let tel = $(this).find('option:selected').attr('tel');
            $(this).closest('.form-add-quotation').find('input[name=q_service_phone]').closest('.form-group').find('.help-block').remove();
            if (tel == '') {
                $(this).closest('.form-add-quotation').find('input[name=q_service_phone]').val('');
                $(this).closest('.form-add-quotation').find('input[name=q_service_phone]').closest('.form-group').removeClass('is-filled');
            }else {
                $(this).closest('.form-add-quotation').find('input[name=q_service_phone]').val(tel);
                $(this).closest('.form-add-quotation').find('input[name=q_service_phone]').closest('.form-group').addClass('is-filled');
            }
        });
        function auto_price(data = []){
            $('.form-add-quotation').on('change','.table-q_product select.list-product',function(){
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
                    $(this).closest('.list-q_product').find('select.list-price').closest('.form-group').find('.help-block').remove();
                }
                $(this).closest('.list-q_product').find('select.list-price').html(html);
                if ($(this).closest('.list-q_product').find('.manual-price').prop('checked')) {
                    $(this).closest('.list-q_product').find('.manual-price').prop('checked',false);
                    $(this).closest('.list-q_product').find('.input-price').hide();
                    $(this).closest('.list-q_product').find('.select-price').show();
                    $(this).closest('.list-q_product').find('.input-price input').attr('name','');
                    $(this).closest('.list-q_product').find('.select-price select').attr('name','q_product_price[]');
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
                        $('.form-add-quotation .list-brand').html(html);
                        $('.form-add-quotation .list-brand').chosen({allow_single_deselect: true,width: '100%',search_contains:true});
                    }
                }
            });
        }
        function list_service_name(){
            $.ajax({
                url: '<?php echo $this->base_url('employee/list_service_name_ajax') ?>',
                dataType: 'json',
                success: function (data){
                    if (data[0] == 'success') {
                        let html = '<option value="">เลือกผู้แทนฝ่ายบริการ..</option>';

                        $.each(data[1],function(key,value){
                            let tel = '';
                            if (value.tel != '') {
                                tel = value.tel;
                            }
                            html += '<option tel="'+tel+'" value="'+value.id+','+value.first_name+' '+value.last_name+'">'+value.first_name+' '+value.last_name+' ('+value.division_th+')</option>';
                        });
                        $('.form-add-quotation .wrap-list-service .list-service-name').html(html);
                        $('.form-add-quotation .wrap-list-service .list-service-name').chosen({allow_single_deselect: true,width: '100%',search_contains:true});
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
                            html += '<option value="'+value.cus_id+'">'+value.cus_name+'</option>';
                        });
                        $('.form-add-quotation .list-customer').html(html);
                        $('.form-add-quotation .list-customer').chosen({search_contains: true});

                    }
                }
            });
        }

        var check_call_function = true;
        function list_product(){ //list product
            if ($('.content .list-product tbody').hasClass('list-success') == false) {
                $('.content .list-product tbody').html('<tr><td colspan="4" style="padding-bottom: 160px;"></td></tr>');
                loader($('.content .list-product tbody tr td'));
            }
            let last_date = '';
            let status = 'get';
            if ($('.content .list-product tbody').attr('last-date') != '') {
                last_date = $('.content .list-product tbody').attr('last-date');
                status = 'check_new_product';
            }
            $.ajax({
                url: '<?php echo $this->base_url('Product/list') ?>',
                method: 'post',
                data: {status:status,last_date:last_date},
                dataType: 'json',
                success: function(data){
                    let html = '';
                    var select_search = '<option value="">ประเภท</option>';
                    var select_brand_option = '<option value="">แบรนด์</option>';
                    var select_search_value = [];
                    var select_brand_data = [];
                    if (data[0] == 'success') {
                        let btn = []
                        let count_btn = 0;
                        let check_select_search = '';
                        let check_select_brand = '';
                        $.each(data[1],function(key,value){
                            html += '<tr p_id="'+value.p_id+'">';
                            if (value.p_img != '') {
                                value.p_img = '<img src="'+value.p_img+'" style="width:100%">';
                            }
                            html += '<td>'+value.p_img+'</td>';
                            html += '<td>'+value.p_code+'</td>';
                            html += '<td>'+value.p_detail+'<br>'+value.p_sub_detail+'</td>';
                            html += '<td>'+value.p_brand+'</td>';
                            let price = {};
                            price.price3 = value.p_price3;
                            price.price2 = value.p_price2;
                            price.price1 = value.p_price1;
                            html += '<td>';
                            $.each(price,function(key,value){
                                if (value != 0) {
                                    let br = '';
                                    if (key != 0) {
                                        br = '<br>';
                                    }
                                    html += br+value+'.-';
                                }
                            });
                            html += '</td>';
                            html += '<td><button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button></td>';
                            html += '</tr>';
                            if (value.p_brand != '') {
                                if (check_select_brand != value.p_brand) { //กรณีเป็น p_cate ที่เป็นตัวใหม่
                                    let check_select_brand_value = '';
                                    if (Array.isArray(select_brand_data)) {
                                        $.each(select_brand_data,function(key_brand,value_brand){ //เพื่อทวนว่ามีการเก็บค่า p_cate แล้วรึยัง
                                            if (value.p_brand == value_brand) {
                                                check_select_brand_value = 1;
                                            }
                                        });
                                    }
                                    if (check_select_brand_value == '') {
                                        select_brand_data.push(value.p_brand);
                                    }
                                    check_select_brand = value.p_brand;
                                }
                            }
                            if (check_select_search != value.p_cate) { //กรณีเป็น p_cate ที่เป็นตัวใหม่
                                let check_select_search_value = '';
                                if (Array.isArray(select_search_value)) {
                                    $.each(select_search_value,function(key_cate,value_cate){ //เพื่อทวนว่ามีการเก็บค่า p_cate แล้วรึยัง
                                        if (value.p_cate == value_cate) {
                                            check_select_search_value = 1;
                                        }
                                    });
                                }
                                if (check_select_search_value == '') {
                                    select_search_value.push(value.p_cate);
                                }
                                check_select_search = value.p_cate;
                            }
                        });
                        if (select_search_value.length != 0) {
                            $.each(select_search_value,function(key_cate,value_cate){
                                select_search += '<option value="'+value_cate+'">'+value_cate+'</option>'
                            });
                        }
                        if (select_brand_data.length != 0) {
                            $.each(select_brand_data,function(key_brand,value_brand){
                                select_brand_option += '<option value="'+value_brand+'">'+value_brand+'</option>'
                            });
                        }
                        let num_order = data[1].length;
                        let value_brand = '';
                        let value_cate = '';
                        if ($('.row-add-product select.select-p_brand').val() != '') {
                            value_brand = $('.row-add-product select.select-p_brand').val();
                        }
                        if ($('.row-add-product select.select-p_cate').val() != '') {
                            value_cate = $('.row-add-product select.select-p_cate').val();
                        }
                        $('.row-add-product select.select-p_brand').html(select_brand_option);
                        $('.row-add-product select.select-p_cate').html(select_search);
                        $('.row-add-product select.select-p_cate').val(value_cate);
                        $('.row-add-product select.select-p_brand').val(value_brand);

                        $('.navbar select.search-cate').html(select_search);
                        $('.navbar select.search-brand').html(select_brand_option);
                        $('.content .list-product .card-title b').html(num_order);
                        if ($('.content .list-product tbody').hasClass('list-success')) {
                            $('.content .list-product tbody').attr('last-date',data[1][0].p_create_date);
                            $('.content .list-product tbody').prepend(html);
                        }else {
                            $('.content .list-product tbody').addClass('list-success');
                            $('.content .list-product tbody').attr('last-date',data[1][0].p_create_date);
                            $('.content .list-product tbody').html(html);
                        }
                        // $('.content .list-product tbody').addClass('list-success');
                        // $('.content .list-product tbody').attr('last-date',data[1][0].p_create_date);
                        // $('.content .list-product tbody').html(html);
                    }else if(data[0] == 'fail'){
                        html += '<tr><td class="text-center" colspan="6">ไม่มีรายการใบเสนอราคา</td></tr>';
                        $('.content .list-product tbody').html(html);
                        $('.navbar select.search-cate').html(select_search);
                    }
                    search_sort(data[1]);
                    // check_new_product(data[1]);
                }
            });
        }

        /*option click*/
        var check_call_function_option = true;
        $('.tb-quotation-list').on('click','.btn-option',function(){
            var type = $(this).attr('option-type');
            var q_id = $(this).closest('tr').attr('q_id');
            switch (type) {
                case 'duplicate':
                    // console.log(id);
                    setTimeout(function(){
                        $.ajax({
                            url: '<?php echo $this->base_url('Employee/get_quotation') ?>',
                            method: 'post',
                            data: {q_id:q_id},
                            dataType: 'json',
                            success: function(data){
                                var data = data[1][0];
                                $('.row-add-product .card .card-body input[name=type]').val('add');
                                // $('.row-add-product .card .card-header').removeClass('card-header-info');
                                // $('.row-add-product .card .card-header').addClass('card-header-warning');
                                $('.row-add-product .header-edit-quotation').hide();
                                $('.row-add-product .header-add-quotation').show();
                                $('.row-add-product .card .card-header h4.card-title').html('สร้างใบเสนอราคา');
                                // $('.row-add-product .card .card-footer .btn-add-product').hide();
                                $('.row-add-product .card .card-footer .btn-edit-product').remove();
                                // $('.row-add-product .card .card-footer').append('<a class="btn btn-success btn-edit-product" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>');
                                $('.row-add-product').show();
                                $('html, body').animate({scrollTop:($(".row-add-product").offset().top - 150)}, 500);

                                $('.row-add-product .card .card-header .q_num').html(data.q_number);
                                $('.row-add-product .card .card-header .q_date').html(data.q_date_th);
                                $('.row-add-product .card .card-body select[name=q_type]').val(data.q_type);
                                $('.row-add-product .card .card-body select[name=q_customer_id]').val(data.q_customer_id);
                                // $('.row-add-product .card .card-body select[name=q_customer_id]').val(data.q_customer_id);
                                $('.row-add-product .card .card-body select[name=q_brand]').val(data.q_brand);
                                $('.row-add-product .card .card-body input[name=q_model]').val(data.q_model);
                                $('.row-add-product .card .card-body input[name=q_sn]').val(data.q_sn);
                                $('.row-add-product .card .card-body input[name=q_topic]').val(data.q_topic);
                                $('.row-add-product .card .card-body input[name=q_to]').val(data.q_to);
                                $('.row-add-product .card .card-body input[name=q_to_detail]').val(data.q_to_detail);
                                $('.row-add-product .card .card-body input[name=q_stock_number]').val(data.q_stock_number);
                                $('.row-add-product .card .card-body input[name=q_discount]').val(data.q_discount);
                                $('.row-add-product .card .card-body input[name=q_ro_number]').val(data.q_ro);
                                $('.row-add-product .card .card-body input[name=q_customer_department]').val(data.q_customer_department);

                                let q_agent_service = data.q_agent_service;
                                q_agent_service = q_agent_service.split(' โทร.');
                                $.ajax({
                                    url: '<?php echo $this->base_url('employee/list_service_name_ajax') ?>',
                                    dataType: 'json',
                                    success: function (result){
                                        if (result[0] == 'success') {
                                            let html = '<option value="">เลือกผู้แทนฝ่ายบริการ..</option>';
                                            let tel = '';
                                            $.each(result[1],function(key,service_value){
                                                if (service_value.tel != '') {
                                                    tel = service_value.tel;
                                                }
                                                if (data.q_service_id == service_value.id) {
                                                    html += '<option tel="'+tel+'" value="'+data.q_service_id+','+q_agent_service[0]+'" selected>'+service_value.first_name+' '+service_value.last_name+' ('+service_value.division_th+')</option>';
                                                }else {
                                                    html += '<option tel="'+tel+'" value="'+service_value.id+','+service_value.first_name+' '+service_value.last_name+'">'+service_value.first_name+' '+service_value.last_name+' ('+service_value.division_th+')</option>';
                                                }
                                            });
                                            $('.form-add-quotation .wrap-list-service .list-service-name').html(html);
                                            $('.form-add-quotation .wrap-list-service .list-service-name').val(data.q_service_id+','+q_agent_service[0]);
                                            $('.form-add-quotation .wrap-list-service .list-service-name').chosen({allow_single_deselect: true,width: '100%',search_contains:true});
                                            $('.form-add-quotation .wrap-list-service .list-service-name').chosen('chosen:update');
                                        }
                                    }
                                });
                                $('.row-add-product .card .card-body select[name=q_service_name]').val(data.q_service_id+','+q_agent_service[0]);
                                $('.row-add-product .card .card-body select[name=q_service_name]').trigger("chosen:updated");
                                $('.row-add-product .card .card-body input[name=q_service_phone]').val(q_agent_service[1]);
                                let set_price = data.q_set_price_data;
                                if (set_price != '') {
                                    set_price = set_price.split(':');
                                }else {
                                    set_price[0] = '';
                                    set_price[1] = '';
                                }
                                $('.row-add-product .card .card-body .set-price-day').val(set_price[0]);
                                $('.row-add-product .card .card-body .set-price-detail').val(set_price[1]);
                                let set_dalivery = data.q_set_delivery_data;
                                if (set_price != '') {
                                    set_dalivery = set_dalivery.split(':');
                                }else {
                                    set_dalivery[0] = '';
                                    set_dalivery[1] = '';
                                }
                                $('.row-add-product .card .card-body .set-dalivery-day').val(set_dalivery[0]);
                                $('.row-add-product .card .card-body .set-dalivery-detail').val(set_dalivery[1]);
                                let set_warranty = data.q_set_warranty_data;
                                if (set_price != '') {
                                    set_warranty = set_warranty.split(':');
                                }else {
                                    set_warranty[0] = '';
                                    set_warranty[1] = '';
                                }
                                $('.row-add-product .card .card-body .set-warranty-day').val(set_warranty[0]);
                                $('.row-add-product .card .card-body .set-warranty-detail').val(set_warranty[1]);
                                let html = '';
                                let product = data.product;
                                // console.log(product);
                                // $('.row-add-product .card .card-body .table-q_product .list-q_product').remove();
                                // let clone_q_product_first = $('.row-add-product .card .card-body .table-q_product .list-q_product:first-child').clone()
                                $('.row-add-product .card .card-body .table-q_product .list-q_product').each(function(key,value){
                                        $(this).remove();
                                });
                                //make this
                                let html_list_q_product = '<tr class="row list-q_product">';
                                html_list_q_product += '<td class="col-md-1 text-center number-order"><span>1</span></td>';
                                html_list_q_product += '<td class="col-md-6 text-center wrap-list-product">';
                                html_list_q_product += '<div class="form-group bmd-form-group">';
                                html_list_q_product += '<select class="form-control form-control-chosen list-product" name="q_product[]" data-placeholder="ค้นหาสินค้า.."><option value="">ค้นหาสินค้า..</option></select>';
                                html_list_q_product += '</div>';
                                html_list_q_product += '<div class="form-group bmd-form-group input-product" style="display:none">';
                                html_list_q_product += '<label class="bmd-label-floating"><strong>ชื่อสินค้า</strong></label>';
                                html_list_q_product += '<input type="text" class="form-control" name="q_product_name[]">';
                                html_list_q_product += '</div>';
                                html_list_q_product += '<div class="form-check row d-flex justify-content-center">';
                                html_list_q_product += '<div class="col-md-1">';
                                html_list_q_product += '<div class="form-check">';
                                html_list_q_product += '<label class="form-check-label">';
                                html_list_q_product += '<input class="form-check-input manual-product" type="checkbox" value="">';
                                html_list_q_product += '<span class="form-check-sign">';
                                html_list_q_product += '<span class="check"></span>';
                                html_list_q_product += '</span>';
                                html_list_q_product += '</label>';
                                html_list_q_product += '</div>';
                                html_list_q_product += '</div>';
                                html_list_q_product += '<div class="col-md-7 text-left" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>';
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
                                html_list_q_product += '<option value="ชุด">ชุด</option>';
                                html_list_q_product += '<option value="ลูก">ลูก</option>';
                                html_list_q_product += '<option value="เส้น">เส้น</option>';
                                html_list_q_product += '<option value="คัน">คัน</option>';
                                html_list_q_product += '<option value="หลอด">หลอด</option>';
                                html_list_q_product += '<option value="ซอง">ซอง</option>';
                                html_list_q_product += '<option value="กล่อง">กล่อง</option>';
                                html_list_q_product += '<option value="พับ">พับ</option>';
                                html_list_q_product += '<option value="ม้วน">ม้วน</option>';
                                html_list_q_product += '</select>';
                                html_list_q_product += '</div>';
                                html_list_q_product += '</td>';
                                html_list_q_product += '</tr>';
                                $('.row-add-product .card .card-body .table-q_product tbody').html(html_list_q_product);
                                $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select').chosen();
                                $.each(data.product,function(key,value){
                                    let clone_q_product = $('.row-add-product .card .card-body .table-q_product .list-q_product:last-child').clone()
                                    $('.row-add-product .card .card-body .table-q_product tbody').append(clone_q_product);
                                    let number_order = parseInt($('.row-add-product .card .card-body .table-q_product .list-q_product:last-child .number-order span').html((key+1)));
                                    let btn = '<button type="button" class="btn btn-danger d-block btn-delete-tr" style="float:unset;margin:auto">ลบ</button>';
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .number-order button').remove();
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .number-order').append(btn);
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
                                                // console.log($('.row-add-product .card .card-body .table-q_product').find('.list-q_product').eq(key).find('select.list-price'));
                                                $('.row-add-product .card .card-body .table-q_product').find('.list-q_product').eq(key).find('select.list-price').html(html);
                                            }
                                        }
                                    });
                                    let html = '<option value="'+value.p_id+'" selected>'+value.p_name+'</option>'
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select.list-product').html(html);
                                    // $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select.list-product').val(value.p_id);
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child select.list-price').closest('.form-group').hide();
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child select.list-price').attr('name','');
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .input-price').closest('.form-group').show();
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .input-price input').attr('name','q_product_price[]');
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .input-price input').val(value.p_price_data);
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child input.q_quanity').val(value.p_unit);
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child select.q_quanity_type').val(value.p_qty);
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child input.manual-price').prop('checked',true);
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select').chosen();
                                    $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child').find('.chosen-container:last-child').remove();
                                    if (value.p_name_manual != '') {
                                        $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child').find('.manual-product').prop('checked',true);
                                        $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child').find('.input-product').show();
                                        $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child').find('.input-product input').val(value.p_name_manual);
                                    }
                                });
                                // $('.form-add-quotation .table-q_product tbody').html(html);
                                // $('.row-add-product .card .card-body .table-q_product .list-q_product .wrap-list-product .list-product').val(product[0].p_id);
                                $('.row-add-product .card .card-body select').trigger("chosen:updated");
                                $('.row-add-product .card .card-body .table-q_product .list-q_product:first-child').remove();
                                $('.row-add-product .card .card-body .table-q_product .list-q_product:first-child .btn-delete-tr').remove();
                                $('.row-add-product .card .card-body select[name=q_service_name]').val(data.q_service_id);
                                $('.form-add-quotation .bmd-form-group').addClass('is-filled');
                                list_product();
                                $('.loading-screen').hide();
                            }
                        });
                    },100);
                    break;
                case 'check':
                    let id = $(this).closest('tr').attr('q_id');
                    $.ajax({
                        url: '<?php echo $this->base_url('Employee/get_quotation') ?>',
                        method: 'post',
                        data: {q_id:id},
                        dataType: 'json',
                        success: function(data){
                            // console.log(data);
                            let html = '';
                            let btn = [];
                            let count_btn = 0;
                            if (data[0] == 'success') {
                                let value = data[1][0];
                                html += '<div class="row col-md-12 justify-content-start d-flex">';
                                html += '<button class="btn btn-status">'+'</button>';
                                html += '</div>';
                                html += '<div class="row col-md-12 justify-content-end d-flex">';
                                html += '<div class="q_num" style="width:fit-content">'+value.q_number+'</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12 justify-content-end d-flex">';
                                html += '<div class="q_date" style="width:fit-content">'+value.q_date_th+'</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12">';
                                html += '<div class="col-md-12 q_topic" style="padding-left:0px"><b style="margin-right: 25px;">เรื่อง</b>'+value.q_topic+'</div>';
                                html += '<div class="col-md-12 q_to" style=""><b style="margin-right: 25px;">เรียน</b>'+value.q_to+'</div>';
                                html += '<div class="col-md-12 q_to_detail" style="text-indent: 2.5em;">'+value.q_to_detail+'</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12">';
                                html += '<table class="table q_product p-3">';
                                html += '<thead class="text-dark">';
                                html += '<tr>';
                                html += '<th>ลำดับ</th>';
                                html += '<th>จำนวน</th>';
                                html += '<th>รายการ</th>';
                                html += '<th>ราคา/หน่วย</th>';
                                html += '<th>ราคารวม</th>';
                                html += '</tr>';
                                html += '</thead>';
                                html += '<tbody>';
                                $.each(value.product,function(key,p_value){
                                    html += '<tr>';
                                    html += '<td class="text-center">'+(key+1)+'</td>';
                                    html += '<td class="text-center">'+p_value.p_unit+' '+p_value.p_qty+'</td>';
                                    html += '<td>'+p_value.p_name+'</td>';
                                    html += '<td class="text-right">'+p_value.p_price+'</td>';
                                    html += '<td class="text-right">'+p_value.p_price_sum+'</td>';
                                    html += '</tr>';
                                });
                                if (value.q_stock_number != '') {
                                    html += '<tr>';
                                    html += '<td colspan=""></td>';
                                    html += '<td colspan=""></td>';
                                    html += '<td colspan=""><b>เลขครุภัณฑ์ '+value.q_stock_number+'</b></td>';
                                    html += '<td colspan="" class="border-top-0"></td>';
                                    html += '<td colspan="" class="border-top-0"></td>';
                                    html += '</tr>';
                                }
                                html += '<tr>';
                                html += '<td class="text-center" colspan="2">ผู้แทนฝ่ายบริการ</td>';
                                html += '<td>'+value.q_agent_service+'</td>';
                                html += '<td class="border-top-0"></td>';
                                html += '<td class="border-top-0"></td>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<td class="text-center" colspan="2">กำหนดยืนราคา</td>';
                                html += '<td>'+value.q_set_price+'</td>';
                                html += '<td style="border-bottom: 4px double #000 !important;"><b>ราคารวมทั้งสิ้น</b></td>';
                                html += '<td  class="text-right" style="border-bottom: 4px double #000 !important;">'+value.sum_total+'</td>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<td class="text-center" colspan="2">การส่งของ</td>';
                                html += '<td>'+value.q_set_delivery+'</td>';
                                html += '<td>ราคาสินค้า</td>';
                                html += '<td  class="text-right">'+value.price_whitout_vat+'</td>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<td class="text-center" colspan="2">รับประกัน</td>';
                                html += '<td>'+value.q_warranty+'</td>';
                                html += '<td>ภาษีมูลค่าเพิ่ม '+value.q_vat+'%</td>';
                                html += '<td class="text-right">'+value.price_vat+'</td>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<td colspan="4" class="text-center">'+value.sum_total_th+'</td>';
                                html += '<td class="text-right">'+value.sum_total+'</td>';
                                html += '</tr>';
                                html += '</tbody>';
                                html += '</table>';
                                html += '<div class="row col-md-12 wrap-po" style="display:none">';
                                html += '<div class="col-md-10 row wrap-input">';
                                html += '<div class="col-md-6 wrap-input">';
                                html += '<b>เลขที่ PO</b>';
                                html += '</div>';
                                html += '<div class="col-md-6 wrap-input">';
                                html += '<b>วันที่รับ PO</b>';
                                html += '</div>';
                                html += '<div class="col-md-6 wrap-input q_po">';
                                html += value.q_po;
                                html += '</div>';
                                html += '<div class="col-md-6 wrap-input q_po_date">';
                                html += value.q_po_date_th;
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="col-md-2 row wrap-input wrap-btn-po" style="display:none">';
                                html += '<button class="btn btn-warning btn-edit-po"><i class="material-icons">edit</i> แก้ไขเลขที่ PO</button>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12 wrap-remark" style="display:none">';
                                html += '<div class="col-md-12 wrap-input">';
                                html += '<b>หมายเหตุการแจ้งแก้ไข</b>';
                                html += '</div>';
                                html += '<div class="col-md-12 wrap-input">';
                                html += value.q_remark;
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12 wrap-remark-customer" style="display:none">';
                                html += '<div class="col-md-12 wrap-input">';
                                html += '<b>หมายเหตุ</b>';
                                html += '</div>';
                                html += '<div class="col-md-12 wrap-input">';
                                html += value.q_remark_customer;
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12 wrap-form-remark-customer" style="display:none">';
                                html += '<div class="col-md-10 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<label class="text-dark"><b>หมายเหตุ</b></label>';
                                html += '<div class="form-group bmd-form-group">';
                                html += '<textarea class="form-control" name="q_remark_customer" rows="5"></textarea>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="col-md-2 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<div class="form-group bmd-form-group">';
                                html += '<button class="btn btn-success btn-save-remark-customer"><i class="material-icons">save</i> บันทึก</button>';
                                html += '<button class="btn btn-danger btn-canel-save-remark-customer"><i class="material-icons">close</i> ยกเลิก</button>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12 wrap-form-po" style="display:none">';
                                html += '<div class="col-md-5 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<label class="text-dark"><b>เลขที่ PO</b></label>';
                                html += '<div class="form-group bmd-form-group">';
                                if (value.q_po != '') {
                                    html += '<input type="text" class="form-control" name="q_po" value="'+value.q_po+'">';
                                }else {
                                    html += '<input type="text" class="form-control" name="q_po">';
                                }
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="col-md-5 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<label class="text-dark"><b>วันที่รับ PO</b></label>';
                                html += '<div class="form-group bmd-form-group">';
                                if (value.q_po_date != '') {
                                    html += '<input type="datetime-local" class="form-control" name="q_po_date" value="'+value.q_po_date+'">';
                                }else {
                                    html += '<input type="datetime-local" class="form-control" name="q_po_date">';
                                }
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="col-md-2 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<div class="form-group bmd-form-group">';
                                html += '<button class="btn btn-success btn-save-po"><i class="material-icons">save</i> บันทึก</button>';
                                html += '<button class="btn btn-danger btn-canel-po"><i class="material-icons">close</i> ยกเลิก</button>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12 wrap-form-remark" style="display:none">';
                                html += '<div class="col-md-10 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<label class="text-dark"><b>หมายเหตุการแจ้ง</b></label>';
                                html += '<div class="form-group bmd-form-group">';
                                // html += '<label class="bmd-label-floating">ตัวอย่างรายละเอียด : 5.00 GB/HDD 465.7 GB</label>';
                                html += '<textarea class="form-control" name="q_remark" rows="5"></textarea>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="col-md-2 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<div class="form-group bmd-form-group">';
                                html += '<button class="btn btn-success btn-save-remark"><i class="material-icons">done_outline</i> ยืนยันการแจ้งแก้ไข</button>';
                                html += '<button class="btn btn-danger btn-canel-save-remark"><i class="material-icons">close</i> ยกเลิกการแจ้งแก้ไข</button>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                let btn_status = '';
                                let btn_text = '';
                                let check_remark = false;
                                let check_remark_customer = false;
                                let check_po = false;
                                let check_btn_edit_po = false;
                                switch (value.q_status) {
                                    case 'new':
                                        btn_status = 'btn-info';
                                        btn_text = 'สร้างใหม่';
                                        switch (data[2]) {
                                            case 'admin':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                break;
                                            case 'service':
                                                // btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                break;
                                            case 'supervisor':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="approve"><i class="material-icons">done_outline</i> อนุมัติ</button>';
                                                break;
                                            case 'it':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="approve"><i class="material-icons">done_outline</i> อนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            default:
                                        }
                                        break;
                                    case 'edit':
                                        btn_status = 'btn-warning';
                                        btn_text = 'ต้องแก้ไข';
                                        check_remark = true;
                                        switch (data[2]) {
                                            case 'admin':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                break;
                                            case 'service':
                                                // btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                break;
                                            case 'supervisor':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                break;
                                            case 'it':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="approve"><i class="material-icons">done_outline</i> อนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            default:
                                        }
                                        break;
                                    case 'cancel':
                                        btn_status = 'btn-danger';
                                        btn_text = 'ยกเลิก';
                                        switch (data[2]) {
                                            case 'it':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="approve"><i class="material-icons">done_outline</i> อนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            default:
                                        }
                                        break;
                                    case 'approved':
                                        btn_status = 'btn-success';
                                        btn_text = 'หัวหน้าอนุมัติ';
                                        switch (value.q_status_customer) {
                                            case 'reject':
                                                btn_text += ',ลูกค้ายกเลิก';
                                                break;
                                            case 'approved':
                                                btn_text += ',ลูกค้าอนุมัติ';
                                                check_po = true;
                                                break;
                                            default:

                                        }
                                        switch (data[2]) {
                                            case 'admin':
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            case 'service':
                                                switch (value.q_status_customer) {
                                                    case 'created':
                                                        if (value.q_remark_customer != '') {
                                                            check_remark_customer = true;
                                                        }
                                                        btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="remark_customer"><i class="material-icons">edit</i> แจ้งหมายเหตุ</button>';
                                                        break;
                                                    case 'approved':
                                                        if (value.q_po != '') {
                                                            check_btn_edit_po = true;
                                                        }
                                                        break;
                                                    default:
                                                }
                                                if (value.q_po == '') {
                                                    btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                    btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                }
                                                break;
                                            case 'supervisor':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                if (value.q_remark_customer != '') {
                                                    check_remark_customer = true;
                                                }
                                                switch (value.q_status_customer) {
                                                    case 'approved':
                                                        btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                        break;
                                                    default:

                                                }
                                                break;
                                            case 'it':
                                                if (value.q_remark_customer != '') {
                                                    check_remark_customer = true;
                                                }
                                                if (value.q_remark != '') {
                                                    check_remark = true;
                                                }
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="approve"><i class="material-icons">done_outline</i> อนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="remark_customer"><i class="material-icons">edit</i> แจ้งหมายเหตุ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            default:
                                        }
                                        break;
                                    default:
                                }
                                $('.modal-preview-quotation .wrap-data-quotation').html(html);
                                $('.modal-preview-quotation .wrap-data-quotation').attr('q_id',value.q_id_encode);
                                $('.modal-preview-quotation .btn-status').addClass(btn_status).html('<h4>สถานะ : '+btn_text+'</h4>');
                                if (check_btn_edit_po) {
                                    $('.modal-preview-quotation').find('.modal-body .wrap-btn-po').show(500);
                                }
                                if (check_po) {
                                    $('.modal-preview-quotation').find('.modal-body .wrap-po').show(500);
                                }
                                if (check_remark) {
                                    $('.modal-preview-quotation').find('.modal-body .wrap-remark').show(500);
                                }
                                if (check_remark_customer) {
                                    $('.modal-preview-quotation').find('.modal-body .wrap-remark-customer').show(500);
                                }
                                let btn_html = '';
                                $.each(btn,function(key,value){
                                    btn_html += btn[key];
                                });
                                $('.modal-preview-quotation .modal-content .modal-footer').html(btn_html);
                                // if (check_call_function_option) {
                                    // option_click(value);
                                    check_call_function_option = false;
                                // }
                            }
                        }
                    });
                    $('.modal-preview-quotation').modal('show');
                    // window.location.href = "<?php echo $this->base_url('page/quotation/print/') ?>"+id;
                    // break;
                case 'edit':
                    let p_id = $(this).closest('tr').attr('p_id');
                    console.log('this');
                    $.ajax({
                        url: '<?php echo $this->base_url('product/get') ?>',
                        method: 'post',
                        data: {p_id:p_id},
                        dataType: 'json',
                        success: function(data){
                            if (data[0] == 'success') {
                                data = data[1][0];
                                $('html, body').animate({scrollTop:($(".row-add-product").offset().top - 150)}, 500);
                                $('.row-add-product').show();
                                $('.row-add-product .card .card-header').removeClass('card-header-info');
                                $('.row-add-product .card .card-header').addClass('card-header-warning');
                                $('.row-add-product .card .card-header h4.card-title').html('แก้ไขสินค้า');
                                $('.row-add-product input[name=type]').val('update');
                                $('.row-add-product input[name=p_id]').val(p_id);
                                $('.row-add-product input[name=p_code]').val(data.p_code);
                                $('.row-add-product input[name=p_code]').val(data.p_code);
                                $('.row-add-product input[name=p_detail]').val(data.p_detail);
                                $('.row-add-product textarea[name=p_sub_detail]').val(data.p_sub_detail);
                                $('.row-add-product select[name=p_cate]').val(data.p_cate);
                                $('.row-add-product select[name=p_brand]').val(data.p_brand);
                                $('.row-add-product input[name=p_price3]').val(data.p_price3);
                                $('.row-add-product input[name=p_price2]').val(data.p_price2);
                                $('.row-add-product input[name=p_price1]').val(data.p_price1);
                                material_input();
                                $('.row-add-product .btn-update-product').remove();
                                $('.row-add-product .card-footer').append('<a class="btn btn-success btn-update-product" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>')
                                $('.row-add-product .btn-add-product').hide();
                                update_product();
                            }
                        }
                    });
                    break;
                case 'approved':

                    break;
                default:

            }
        });

        // function option_click(data){
        //     $('.modal-preview-quotation').on('click','.btn-option[option-type=edit],.btn-option[option-type=duplicate]',function(){
        //         $('.loading-screen').show();
        //     });
        //     $('.modal-preview-quotation').on('click','.btn-option',function(){
        //         var option_type = $(this).attr('option-type');
        //         $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').hide();
        //         if (option_type != 'admin-edit') {
        //             $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark').hide();
        //         }
        //         $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').hide();
        //
        //         switch (option_type) {
        //             case 'edit': //modal edit
        //                 setTimeout(function(type = option_type){
        //                     $('.modal-preview-quotation').modal('hide');
        //                     $('.row-add-product .header-edit-quotation').show();
        //                     $('.row-add-product .header-add-quotation').hide();
        //                     $('.row-add-product .card .card-body input[name=q_id]').val(data.q_id);
        //                     $('.row-add-product .card .card-body input[name=type]').val('edit');
        //                     $('.row-add-product .card .card-header').removeClass('card-header-info');
        //                     $('.row-add-product .card .card-header').addClass('card-header-warning');
        //                     $('.row-add-product .card .card-header h4.card-title').html('แก้ไขใบเสนอราคา');
        //                     $('.row-add-product .card .card-footer .btn-add-product').hide();
        //                     $('.row-add-product .card .card-footer .btn-edit-product').remove();
        //                     $('.row-add-product .card .card-footer').append('<a class="btn btn-success btn-edit-product" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>');
        //                     $('.row-add-product').show();
        //                     $('html, body').animate({scrollTop:($(".row-add-product").offset().top - 150)}, 500);
        //
        //                     $('.row-add-product .card .card-header .q_num').html(data.q_number);
        //                     $('.row-add-product .card .card-header .q_date').html(data.q_date_th);
        //                     $('.row-add-product .card .card-body select[name=q_type]').val(data.q_type);
        //                     $('.row-add-product .card .card-body select[name=q_customer_id]').val(data.q_customer_id);
        //                     // $('.row-add-product .card .card-body select[name=q_customer_id]').val(data.q_customer_id);
        //                     $('.row-add-product .card .card-body select[name=q_brand]').val(data.q_brand);
        //                     $('.row-add-product .card .card-body input[name=q_model]').val(data.q_model);
        //                     $('.row-add-product .card .card-body input[name=q_sn]').val(data.q_sn);
        //                     $('.row-add-product .card .card-body input[name=q_topic]').val(data.q_topic);
        //                     $('.row-add-product .card .card-body input[name=q_to]').val(data.q_to);
        //                     $('.row-add-product .card .card-body input[name=q_to_detail]').val(data.q_to_detail);
        //                     $('.row-add-product .card .card-body input[name=q_stock_number]').val(data.q_stock_number);
        //                     $('.row-add-product .card .card-body input[name=q_discount]').val(data.q_discount);
        //                     $('.row-add-product .card .card-body input[name=q_ro_number]').val(data.q_ro);
        //                     $('.row-add-product .card .card-body input[name=q_customer_department]').val(data.q_customer_department);
        //
        //                     let q_agent_service = data.q_agent_service;
        //                     q_agent_service = q_agent_service.split(' โทร.');
        //                     $.ajax({
        //                         url: '<?php echo $this->base_url('employee/list_service_name_ajax') ?>',
        //                         dataType: 'json',
        //                         success: function (result){
        //                             if (result[0] == 'success') {
        //                                 let html = '<option value="">เลือกผู้แทนฝ่ายบริการ..</option>';
        //                                 let tel = '';
        //                                 $.each(result[1],function(key,service_value){
        //                                     if (service_value.tel != '') {
        //                                         tel = service_value.tel;
        //                                     }
        //                                     if (data.q_service_id == service_value.id) {
        //                                         html += '<option tel="'+tel+'" value="'+data.q_service_id+','+q_agent_service[0]+'" selected>'+service_value.first_name+' '+service_value.last_name+' ('+service_value.division_th+')</option>';
        //                                     }else {
        //                                         html += '<option tel="'+tel+'" value="'+service_value.id+','+service_value.first_name+' '+service_value.last_name+'">'+service_value.first_name+' '+service_value.last_name+' ('+service_value.division_th+')</option>';
        //                                     }
        //                                 });
        //                                 $('.form-add-quotation .wrap-list-service .list-service-name').html(html);
        //                                 $('.form-add-quotation .wrap-list-service .list-service-name').chosen({allow_single_deselect: true,width: '100%',search_contains:true});
        //                             }
        //                         }
        //                     });
        //                     $('.row-add-product .card .card-body select[name=q_service_name]').val(data.q_service_id+','+q_agent_service[0]);
        //                     $('.row-add-product .card .card-body select[name=q_service_name]').trigger("chosen:updated");
        //                     $('.row-add-product .card .card-body input[name=q_service_phone]').val(q_agent_service[1]);
        //                     let set_price = data.q_set_price_data;
        //                     set_price = set_price.split(':');
        //                     $('.row-add-product .card .card-body .set-price-day').val(set_price[0]);
        //                     $('.row-add-product .card .card-body .set-price-detail').val(set_price[1]);
        //                     let set_dalivery = data.q_set_delivery_data;
        //                     set_dalivery = set_dalivery.split(':');
        //                     $('.row-add-product .card .card-body .set-dalivery-day').val(set_dalivery[0]);
        //                     $('.row-add-product .card .card-body .set-dalivery-detail').val(set_dalivery[1]);
        //                     let set_warranty = data.q_set_warranty_data;
        //                     set_warranty = set_warranty.split(':');
        //                     $('.row-add-product .card .card-body .set-warranty-day').val(set_warranty[0]);
        //                     $('.row-add-product .card .card-body .set-warranty-detail').val(set_warranty[1]);
        //                     let html = '';
        //                     let product = data.product;
        //                     // console.log(product);
        //                     // $('.row-add-product .card .card-body .table-q_product .list-q_product').remove();
        //                     // let clone_q_product_first = $('.row-add-product .card .card-body .table-q_product .list-q_product:first-child').clone()
        //                     $('.row-add-product .card .card-body .table-q_product .list-q_product').each(function(key,value){
        //                             $(this).remove();
        //                     });
        //                     //make this
        //                     let html_list_q_product = '<tr class="row list-q_product">';
        //                     html_list_q_product += '<td class="col-md-1 text-center number-order"><span>1</span></td>';
        //                     html_list_q_product += '<td class="col-md-6 text-center wrap-list-product">';
        //                     html_list_q_product += '<div class="form-group bmd-form-group">';
        //                     html_list_q_product += '<select class="form-control form-control-chosen list-product" name="q_product[]" data-placeholder="ค้นหาสินค้า.."><option value="">ค้นหาสินค้า..</option></select>';
        //                     html_list_q_product += '</div>';
        //                     html_list_q_product += '<div class="form-group bmd-form-group input-product" style="display:none">';
        //                     html_list_q_product += '<label class="bmd-label-floating"><strong>ชื่อสินค้า</strong></label>';
        //                     html_list_q_product += '<input type="text" class="form-control" name="q_product_name[]">';
        //                     html_list_q_product += '</div>';
        //                     html_list_q_product += '<div class="form-check row d-flex justify-content-center">';
        //                     html_list_q_product += '<div class="col-md-1">';
        //                     html_list_q_product += '<div class="form-check">';
        //                     html_list_q_product += '<label class="form-check-label">';
        //                     html_list_q_product += '<input class="form-check-input manual-product" type="checkbox" value="">';
        //                     html_list_q_product += '<span class="form-check-sign">';
        //                     html_list_q_product += '<span class="check"></span>';
        //                     html_list_q_product += '</span>';
        //                     html_list_q_product += '</label>';
        //                     html_list_q_product += '</div>';
        //                     html_list_q_product += '</div>';
        //                     html_list_q_product += '<div class="col-md-7 text-left" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>';
        //                     html_list_q_product += '</div>';
        //                     html_list_q_product += '</td>';
        //                     html_list_q_product += '<td class="col-md-2">';
        //                     html_list_q_product += '<div class="form-group bmd-form-group select-price">';
        //                     html_list_q_product += '<select class="custom-select list-price" name="q_product_price[]"><option value="" selected="">กรุณาเลือกสินค้าก่อน..</option></select>';
        //                     html_list_q_product += '</div>';
        //                     html_list_q_product += '<div class="form-group bmd-form-group input-price" style="display:none">';
        //                     html_list_q_product += '<label class="bmd-label-floating"><strong>ราคา</strong></label>';
        //                     html_list_q_product += '<input type="number" class="form-control text-center" name="" min="0">';
        //                     html_list_q_product += '</div>';
        //                     html_list_q_product += '<div class="form-check row d-flex justify-content-center">';
        //                     html_list_q_product += '<div class="col-md-2">';
        //                     html_list_q_product += '<div class="form-check">';
        //                     html_list_q_product += '<label class="form-check-label">';
        //                     html_list_q_product += '<input class="form-check-input manual-price" type="checkbox" value="">';
        //                     html_list_q_product += '<span class="form-check-sign">';
        //                     html_list_q_product += '<span class="check"></span>';
        //                     html_list_q_product += '</span>';
        //                     html_list_q_product += '</label>';
        //                     html_list_q_product += '</div>';
        //                     html_list_q_product += '</div>';
        //                     html_list_q_product += '<div class="col-md-7 text-center" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>';
        //                     html_list_q_product += '</div>';
        //                     html_list_q_product += '</td>';
        //                     html_list_q_product += '<td class="col-md-2">';
        //                     html_list_q_product += '<div class="form-group bmd-form-group">';
        //                     html_list_q_product += '<label class="bmd-label-floating"><strong>จำนวน</strong></label>';
        //                     html_list_q_product += '<input type="number" class="form-control text-center q_quanity" name="q_quanity[]" min="0">';
        //                     html_list_q_product += '</div>';
        //                     html_list_q_product += '</td>';
        //                     html_list_q_product += '<td class="col-md-1 text-center">';
        //                     html_list_q_product += '<div class="form-group bmd-form-group">';
        //                     html_list_q_product += '<select class="custom-select q_quanity_type" name="q_quanity_type[]">';
        //                     html_list_q_product += '<option value="ชิ้น">ชิ้น</option>';
        //                     html_list_q_product += '<option value="อัน">อัน</option>';
        //                     html_list_q_product += '<option value="ลูก">ลูก</option>';
        //                     html_list_q_product += '</select>';
        //                     html_list_q_product += '</div>';
        //                     html_list_q_product += '</td>';
        //                     html_list_q_product += '</tr>';
        //                     $('.row-add-product .card .card-body .table-q_product tbody').html(html_list_q_product);
        //                     $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select').chosen();
        //                     $.each(data.product,function(key,value){
        //                         let clone_q_product = $('.row-add-product .card .card-body .table-q_product .list-q_product:last-child').clone()
        //                         $('.row-add-product .card .card-body .table-q_product tbody').append(clone_q_product);
        //                         let number_order = parseInt($('.row-add-product .card .card-body .table-q_product .list-q_product:last-child .number-order span').html((key+1)));
        //                         let btn = '<button type="button" class="btn btn-danger d-block btn-delete-tr" style="float:unset;margin:auto">ลบ</button>';
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .number-order button').remove();
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .number-order').append(btn);
        //                         $.ajax({
        //                             url: '<?php echo $this->base_url('Product/get') ?>',
        //                             method: 'post',
        //                             data: {p_id:value.p_id},
        //                             dataType: 'json',
        //                             success: function(result){
        //                                 if(result[0] == 'success'){
        //                                     let html = '';
        //                                     $.each(result[1],function(key,value){
        //                                         html += '<option value="'+value.p_price3+'">'+value.p_price3+'</option>';
        //                                         if (value.p_price2 != 0) {
        //                                             html += '<option value="'+value.p_price2+'">'+value.p_price2+'</option>';
        //                                         }
        //                                         if (value.p_price1 != 0) {
        //                                             html += '<option value="'+value.p_price1+'">'+value.p_price1+'</option>';
        //                                         }
        //                                     });
        //                                     // console.log($('.row-add-product .card .card-body .table-q_product').find('.list-q_product').eq(key).find('select.list-price'));
        //                                     $('.row-add-product .card .card-body .table-q_product').find('.list-q_product').eq(key).find('select.list-price').html(html);
        //                                 }
        //                             }
        //                         });
        //                         let html = '<option value="'+value.p_id+'" selected>'+value.p_name+'</option>'
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select.list-product').html(html);
        //                         // $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select.list-product').val(value.p_id);
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child select.list-price').closest('.form-group').hide();
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child select.list-price').attr('name','');
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .input-price').closest('.form-group').show();
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .input-price input').attr('name','q_product_price[]');
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .input-price input').val(value.p_price_data);
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child input.q_quanity').val(value.p_unit);
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child select.q_quanity_type').val(value.p_qty);
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child input.manual-price').prop('checked',true);
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select').chosen();
        //                         $('.row-add-product .card .card-body .table-q_product').find('.list-q_product:last-child').find('.chosen-container:last-child').remove()
        //                     });
        //                     // $('.form-add-quotation .table-q_product tbody').html(html);
        //                     // $('.row-add-product .card .card-body .table-q_product .list-q_product .wrap-list-product .list-product').val(product[0].p_id);
        //                     $('.row-add-product .card .card-body select').trigger("chosen:updated");
        //                     $('.row-add-product .card .card-body .table-q_product .list-q_product:first-child').remove();
        //                     $('.row-add-product .card .card-body .table-q_product .list-q_product:first-child .btn-delete-tr').remove();
        //                     $('.row-add-product .card .card-body select[name=q_service_name]').val(data.q_service_id);
        //                     $('.form-add-quotation .bmd-form-group').addClass('is-filled');
        //                     list_product();
        //                     $('.btn-edit-product').click(function(){
        //                         $('.loading-screen').show();
        //                     });
        //                     $('.btn-edit-product').click(function(){
        //                         setTimeout(function(){
        //                             var data = $('.form-add-quotation').serialize();
        //                             if (validate()) {
        //                                 $.ajax({
        //                                     url: '<?php echo $this->base_url('Quotation/update') ?>',
        //                                     method: 'post',
        //                                     data: data,
        //                                     dataType: 'json',
        //                                     success: function(data){
        //                                         // console.log(data);
        //                                         if (data[0] == 'success') {
        //                                             Swal.fire({
        //                                                 type: 'success',
        //                                                 title: 'บันทึกสำเร็จ',
        //                                                 showConfirmButton: false,
        //                                                 timer: 1500
        //                                             });
        //                                             $('.loading-screen').hide();
        //                                             $('.row-add-product').hide();
        //                                             list_product();
        //                                         }else if(data[0] == 'updated'){
        //                                             Swal.fire({
        //                                                 type: 'error',
        //                                                 title: 'ไม่สามารถแก้ไขใบเสนอราคานี้ได้',
        //                                                 text: 'เนื่องจากมีการแก้ไขไปแล้วก่อนหน้า',
        //                                                 confirmButtonText: 'ยืนยัน'
        //                                             });
        //                                             $('.loading-screen').hide();
        //                                             $('.row-add-product').hide();
        //                                             list_product();
        //                                         }
        //                                     }
        //                                 });
        //                             }else {
        //                                 $('.loading-screen').hide();
        //                             }
        //                         },100);
        //                     });
        //                     $('.loading-screen').hide();
        //                 },100);
        //                 break;
        //             case 'approve':
        //                 let id = data.q_id;
        //                 Swal.fire({
        //                     title: 'คุณต้องการอนุมัติใบเสนอราคานี้หรือไม่?',
        //                     type: 'warning',
        //                     showCancelButton: true,
        //                     confirmButtonColor: '#4caf50 ',
        //                     cancelButtonColor: '#f44336 ',
        //                     confirmButtonText: 'ยืนยัน',
        //                     cancelButtonText: 'ยกเลิก'
        //                 }).then((result) => {
        //                     if (result.value) {
        //                         $.ajax({
        //                             url: '<?php echo $this->base_url('Quotation/update') ?>',
        //                             method: 'post',
        //                             data: {type:option_type,q_id:id},
        //                             dataType: 'json',
        //                             success: function(data){
        //                                 // console.log(data);
        //                                 if (data[0] == 'success') {
        //                                     Swal.fire({
        //                                         type: 'success',
        //                                         title: 'อนุมัติสำเร็จ',
        //                                         showConfirmButton:false,
        //                                         timer: 1500
        //                                     });
        //                                     $('.modal-preview-quotation').find('.modal-footer').find('button').remove();
        //                                     $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status').removeClass('btn-info');
        //                                     $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status').addClass('btn-success');
        //                                     $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status h4').html('สถานะ : หัวหน้าอนุมัติ');
        //                                     list_product();
        //                                 }else {
        //                                     Swal.fire({
        //                                         type: 'warning',
        //                                         title: 'ไม่สามารถอนุมัติได้',
        //                                         showConfirmButton:false,
        //                                         timer: 1500
        //                                     });
        //                                 }
        //                             }
        //                         });
        //                     }
        //                 });
        //
        //                 break;
        //             case 'customer_approve':
        //                 let q_id = data.q_id;
        //                 $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').show(500);
        //                 $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').attr('type','customer_approve');
        //
        //                 break;
        //             case 'customer_reject':
        //                 let q_id_1 = data.q_id;
        //                 $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').show(500);
        //                 $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer label b').html('หมายเหตุ');
        //                 $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').attr('type','customer_reject');
        //
        //                 break;
        //             case 'print':
        //                 let q_id_encode = $('.modal-preview-quotation .wrap-data-quotation').attr('q_id');
        //                 Swal.fire({
        //                     title: 'คุณต้องการสั่งพิมพ์ใบเสนอราคานี้หรือไม่?',
        //                     type: 'warning',
        //                     showCancelButton: true,
        //                     confirmButtonColor: '#4caf50 ',
        //                     cancelButtonColor: '#f44336 ',
        //                     confirmButtonText: 'ยืนยัน',
        //                     cancelButtonText: 'ยกเลิก'
        //                 }).then((result) => {
        //                     if (result.value) {
        //                         Swal.fire({
        //                             title: 'ท่านต้องการตรายางอัตโนมัติหรือไม่?',
        //                             type: 'warning',
        //                             showCancelButton: true,
        //                             confirmButtonColor: '#4caf50 ',
        //                             cancelButtonColor: '#f44336 ',
        //                             confirmButtonText: 'ยืนยัน',
        //                             cancelButtonText: 'ยกเลิก'
        //                         }).then((result) => {
        //                             if (result.value) {
        //                                 window.location.href = '<?php echo $this->base_url("page/quotation/") ?>'+q_id_encode;
        //                             }else {
        //                                 window.location.href = '<?php echo $this->base_url("page/quotation/") ?>'+q_id_encode+'/no_brand';
        //                             }
        //                         });
        //                     }
        //                 });
        //                 break;
        //             case 'remark_customer':
        //                 $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').show(500);
        //                 $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer label b').html('หมายเหตุ');
        //                 break;
        //             default:
        //
        //         }
        //         $(this).removeClass('clicked');
        //
        //
        //     });
        // }

        /*form modal check quotation*/
        $('.modal-preview-quotation')
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
            let id = $(this).closest('.wrap-data-quotation').attr('q_id');
            if (value != '') {
                $.ajax({
                    url: '<?php echo $this->base_url('Quotation/update') ?>',
                    method: 'post',
                    data: {q_remark_customer:value,q_id:id,type:'remark_customer'},
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
                            $('.modal-preview-quotation').find('.modal-body .wrap-form-remark-customer').hide(500);
                            $('.modal-preview-quotation').find('.modal-body .wrap-remark-cutomer').show(500);
                            $('.modal-preview-quotation').find('.modal-body .wrap-remark-customer .wrap-input:last-child').html(value);
                            list_product();
                        }
                    }

                });
            }
        }).on('click','.modal-body .btn-save-remark',function(){
            let value = $(this).closest('.wrap-form-remark').find('textarea[name=q_remark]').val();
            let id = $(this).closest('.wrap-data-quotation').attr('q_id');
            if (value != '') {
                $.ajax({
                    url: '<?php echo $this->base_url('Quotation/update') ?>',
                    method: 'post',
                    data: {q_remark:value,q_id:id,type:'admin_edit'},
                    dataType: 'json',
                    success: function(data){
                        if (data[0] == 'success') {
                            Swal.fire({
                                title: 'แจ้งแก้ไขสำเร็จแล้ว',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status').removeClass('btn-info');
                            $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status').addClass('btn-warning');
                            $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status h4').html('สถานะ : ต้องแก้ไข');
                            $('.modal-preview-quotation').find('.modal-body .wrap-form-remark').hide(500);
                            $('.modal-preview-quotation').find('.modal-body .wrap-remark').show(500);
                            $('.modal-preview-quotation').find('.modal-body .wrap-remark .wrap-input:last-child').html(value);
                            list_product();
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
            let id = $(this).closest('.wrap-data-quotation').attr('q_id');
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
                            data: {q_po:value,q_po_date:value_date,q_id:id,type:'customer_approve',type_update:type_update},
                            dataType: 'json',
                            success: function(data){
                                if (data[0] == 'success') {
                                    Swal.fire({
                                        title: 'บันทึกสำเร็จ',
                                        type: 'success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $('.modal-preview-quotation').find('.modal-body .wrap-po').show(500);
                                    $('.modal-preview-quotation').find('.wrap-form-po').find('input[name=q_po_date]').val(data[1]);
                                    $('.modal-preview-quotation').find('.modal-body .wrap-form-po').hide(500);
                                    list_product();
                                    $('.modal-preview-quotation').find('.modal-footer').remove();
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

        $('.btn-add-product,.btn-update-product').click(function(){
            $('.loading-screen').show();
        });
        $('.btn-add-product').click(function(){
            setTimeout(function(){
                let key_array = 0;
                let check_key = '';
                var data = $('.form-add-product').serialize();
                if (validate()) {
                    $.ajax({
                        url: '<?php echo $this->base_url('Product/add') ?>',
                        method: 'post',
                        data: data,
                        dataType: 'json',
                        success: function(result){
                            if (result[0] == 'success') {
                                Swal.fire({
                                    type: 'success',
                                    title: 'เพิ่มสินค้าสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $('.loading-screen').hide();
                                $('.row-add-product').hide();
                                list_product();
                            }else {
                                $('.loading-screen').hide();
                                console.log('somethings went wrong > btn-add-product');
                            }
                        }
                    });
                }else {
                    $('.loading-screen').hide();
                }
            },100);
        });

        function update_product(){
            $('.btn-update-product').off();
            $('.btn-update-product').click(function(){
                $('.loading-screen').show();
            });
            $('.btn-update-product').click(function(){
                setTimeout(function(){
                    let key_array = 0;
                    let check_key = '';
                    var data = $('.form-add-product').serialize();
                    if (validate()) {
                        $.ajax({
                            url: '<?php echo $this->base_url('Product/update') ?>',
                            method: 'post',
                            data: data,
                            dataType: 'json',
                            success: function(result){
                                if (result[0] == 'success') {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'บันทึกสำเร็จ',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $('.loading-screen').hide();
                                    $('.row-add-product').hide();
                                    list_product();
                                }else {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'มีบางอย่างผิดพลาด',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $('.loading-screen').hide();
                                    console.log('somethings went wrong > btn-add-product');
                                }
                            }
                        });
                    }else {
                        $('.loading-screen').hide();
                    }
                },100);
            });
        }
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
                            title: 'สร้างใบเสนอราคา สำเร็จ',
                            timer: 1500
                        });
                        $('.row-add-product').hide();
                        list_product();
                    }else {
                        console.log(data);
                    }
                }
            })
        }
        /*valiedate form add quotation*/
        //เพิ่มเติม
            //พัฒนา ฟังก์ชั่นนี้ ให้ง่ายต่อการใช้
        function validate(){
            $('.row-add-product *[name*=p_]').each(function(key,value){
                $(this).closest('.form-group').find('.help-block').remove();
                if ($(this).val() == '' && $(this).attr('name') != 'p_sub_detail') {
                    if ($(this).prop('tagName') == 'SELECT') {
                        $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                    }else {
                        $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
                    }
                }
            });
            $('.row-add-product').on('change keyup','*[name*=p_]',function(){
                if ($(this).val() != '') {
                    $(this).closest('.form-group').find('.help-block').remove();
                }else {
                    $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                }
            });
            var error = true;
            if ($('.row-add-product .help-block').length > 0) {
                error = false;
                $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);
            }


            // $('.row-add-product .help-block').each(function(key,value){
            //     console.log($(this));
            // });
            return error;
        }

        /*when click add prodcut*/
        $('.form-add-quotation').on('click','.wrap-btn-add-q_product .btn-add-q_product',function(){
            let clone_q_product = $(this).closest('.form-add-quotation').find('.list-q_product:last-child').clone()
            $(this).closest('.form-add-quotation').find('.list-q_product').closest('tbody').append(clone_q_product);
            let number_order = parseInt($(this).closest('.form-add-quotation').find('.list-q_product:last-child .number-order span').html()) + 1;
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .number-order span').html(number_order);
            let btn = '<button type="button" class="btn btn-danger d-block btn-delete-tr" style="float:unset;margin:auto">ลบ</button>';
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .number-order button').remove();
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .q_quanity').val('');
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .input-product input').val('');
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .input-product').hide();
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .manual-product').prop('checked',false);
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .number-order').append(btn);
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .wrap-list-product select').chosen();
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .help-block').remove();
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child').find('.chosen-container:last-child').remove()
            material_input();
            list_product();
        });

        /*materail input*/
        function material_input(){
            $('.form-control').each(function(){
                if ($(this).val() != '') {
                    $(this).closest('.bmd-form-group').addClass('is-filled');
                }
            });

            $('.bmd-form-group').on('focusout','.form-control',function(){
                if ($(this).val() == '') {
                    $(this).closest('.bmd-form-group').removeClass('is-filled');
                    $(this).closest('.bmd-form-group').removeClass('is-focused');
                }else {
                    $(this).closest('.bmd-form-group').removeClass('is-focused');
                }
            });
            $('.bmd-form-group').on('focusin','.form-control',function(){
                if ($(this).closest('.bmd-form-group').hasClass('is-focused') == false) {
                    $(this).closest('.bmd-form-group').addClass('is-focused');
                }
            });
            $('.bmd-form-group').on('keyup change','.form-control',function(){
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
        function loading_gif(inner,status='',width=1,get=''){
            if (get != '') {
                return "<?php echo $this->public_url('file/images/system/Loading_2.gif') ?>";
            }else {
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
