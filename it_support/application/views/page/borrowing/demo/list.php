<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>ใบยืม</title>
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
  <!-- <link href="<?php echo $this->public_url('libs/chosen/css/component-chosen.min.css') ?>" rel="stylesheet" /> -->
  <link href="<?php echo $this->public_url('libs/maxchosen/maxchosen.css') ?>" rel="stylesheet" />
  <link href="<?php echo $this->public_url('css/page/software_license/list.css') ?>" rel="stylesheet" />
  <style media="screen">
      body,h1,h2,h3,h4,h5,h6{
          font-family: 'Mali', cursive;
      }
      table.list-borrowing th{
          font-size: 12px !important;
      }
      table.list-borrowing td{
          font-size: 12px !important;
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
    <div class="modal fade bd-example-modal-xl modal-review-borrowing" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">รายละเอียดใบยืม</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body wrap-data-borrowing p-3">
                    <div class="row m-0">
                        <div class="row wrap-borrowing" >
                            <div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2 " style="font-size:0.8rem">
                                <div class="col-sm-12 col-md-12 col-lg-12 row m-0">
                                    <div class="row m-0 border rounded">
                                        <div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>ข้อมูลผู้ยืม</strong></div>
                                        <div class="col-sm-6 col-md-4 border-bottom border-right"><strong>เลขที่ใบยืม :</strong></div>
                                        <div class="col-sm-6 col-md-8 border-bottom">108563</div>
                                        <div class="col-sm-6 col-md-4 border-bottom border-right"><strong>วันที่ยืม :</strong></div>
                                        <div class="col-sm-6 col-md-8 border-bottom">24 มิ.ย. 2563</div>
                                        <div class="col-sm-5 col-md-4 border-right"><strong>ชื่อผู้ยืม :</strong></div>
                                        <div class="col-sm-7 col-md-8 ">ธนิก ฟองจำ</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2 " style="font-size:0.8rem">
                                <div class="col-sm-12 col-md-12 col-lg-12 row m-0">
                                    <div class="row m-0 border rounded">
                                        <div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>รายละเอียดการยืม</strong></div>
                                        <div class="col-sm-6 col-md-4 border-bottom border-right"><strong>โรงพยาบาล :</strong></div>
                                        <div class="col-sm-6 col-md-8 border-bottom">โรงพยาบาลตำรวจ</div>
                                        <div class="col-sm-6 col-md-4 border-bottom border-right"><strong>แผนก :</strong></div>
                                        <div class="col-sm-6 col-md-8 border-bottom">CCU</div>
                                        <div class="col-sm-5 col-md-4 border-right"><strong>วันที่ยืม/คืน :</strong></div>
                                        <div class="col-sm-7 col-md-8 ">24 มิ.ย. 2563 <b>|</b> 24 ก.ค. 2563 <b>(30 วัน)</b></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 col-md-12 mt-2 mb-2 " style="font-size:0.8rem">
                                <div class="col-sm-12 col-md-12 col-lg-12 row m-0">
                                    <div class="row m-0 border rounded col-12 pl-0 pr-0">
                                        <div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>รายการสินค้า</strong></div>
                                        <div class="col-5 border-bottom border-right"><strong>รายการสินค้า</strong></div>
                                        <div class="col-3 border-bottom border-right"><strong>Serial No.</strong></div>
                                        <div class="col-2 border-bottom border-right"><strong>สถานะ</strong></div>
                                        <div class="col-2 border-bottom border-right"><strong>ตัวเลือก</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <a class="nav-link btn-modal-add-issue bg-success btn-modal-add-borrowing" href="javascript:void(0)">
                            <i class="material-icons text-white">move_to_inbox</i>
                            <p class="text-white d-block">ยืมสินค้า</p>
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
            <div class="row row-add-borrowing" style="display:none">
                <div class="col-md-12 wrap-card-quotation">
                    <div class="card">
                        <div class="card-header card-header-info header-add-quotation">
                            <h4 class="card-title">ยืมสินค้า</h4>
                        </div>
                        <div class="row justify-content-between pl-4 pr-4 header-edit-quotation" style="display:none">
                            <div class="col-md-8 card-header card-header-info">
                                <h4 class="card-title">แก้ไขข้อมูลสินค้า</h4>
                            </div>
                            <div class="col-md-3 card-header card-header-info text-center">
                                <!-- <p class="card-category text-white q_num">เลขที่ : SER.792/2562</p>
                                <p class="card-category text-white q_date">วันที่ <?php echo $this->date_th(date('Y-m-d'),2); ?></p> -->
                            </div>
                        </div>
                        <div class="card-body p-5">
                                <form class="form-add-borrowing">
                                    <input type="hidden" name="type" value="">
                                    <input type="hidden" name="add_borrowing" value="1">
                                    <!-- <input type="hidden" name="q_date" value="<?php echo date('Y-m-d H:i:s') ?>"> -->
                                    <div class="row">

                                        <div class="col-lg-4 col-md-8 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <select class="form-control form-control-chosen list-borrower" name="b_borrower" required></select>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-8 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <select class="form-control form-control-chosen list-customer" name="b_customer" required></select>
                                            </div>
                                            <div class="form-group bmd-form-group" style="display:none">
                                                <label class="bmd-label-floating"><strong>กรอกรายชื่อลูกค้า</strong></label>
                                                <input type="text" class="form-control input-customer-name" name="" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 wrap-input">
                                            <div class="form-check pt-3">
                                                <label class="form-check-label">
                                                    <input class="form-check-input add-customer" name="add_customer" type="checkbox" value="">
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                    <div class="text-dark"><strong>เพิ่มลูกค้าใหม่</strong></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-3 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>เลขที่ใบยืม</strong></label>
                                                <input type="text" class="form-control" name="b_number" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-9 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>หมายเหตุ</strong></label>
                                                <input type="text" class="form-control" name="b_remark" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5 wrap-input">
                                            <div class="form-group bmd-form-group is-filled">
                                                <label class="bmd-label-floating"><strong>วันที่ยืม</strong></label>
                                                <input type="date" class="form-control" name="b_date" value="<?php echo date('Y-m-d') ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>ระยะเวลา</strong></label>
                                                <input type="number" class="form-control text-right" name="b_len" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5 wrap-input">
                                            <div class="form-group bmd-form-group is-filled">
                                                <label class="bmd-label-floating"><strong>วันที่ต้องคืน</strong></label>
                                                <input type="date" class="form-control date_back" name="" value="" disabled>
                                                <input type="hidden" class="form-control date_back" name="b_return" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h4><strong>รายการสินค้า</strong></h4>
                                    </div>
                                    <div class="row col-12 ml-0 mr-0 pl-0 pr-0 wrap-product">
                                        <div class="product-item col-12 row ml-0 mr-0 pl-0 pr-0">
                                            <div class="col-4 wrap-input">
                                                <div class="form-group bmd-form-group">
                                                    <select class="form-control form-control-chosen list-product" name="bd_p_barcode_qr2[]" >
                                                        <option value="">ค้นหาสินค้า</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating"><strong>รายละเอียด</strong></label>
                                                    <input type="text" class="form-control detail_borrowing" name="bd_p_detail[]" value="" >
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating"><strong>SN</strong></label>
                                                    <input type="text" class="form-control sn_borrowing" name="bd_p_sn[]" value="" >
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <button type="button" class="btn btn-danger pr-2 pl-2 btn-delete-product"><i class="material-icons">close</i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                        </div>
                            <div class="card-footer text-center justify-content-between">
                                <a class="btn btn-danger btn-cancel-borrowing" href="javascript:void(0)"><h4><i class="material-icons mr-3">cancel</i>ยกเลิก</h4></a>
                                <a class="btn btn-success btn-add-borrowing" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>
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

                        <div class="form-group">
                            <label class="text-dark">วันที่ยืมเริ่มต้น : </label>
                            <div class="form-group bmd-form-group">
                                <input type="date" class="form-control search-date-start" name="search-date-start"  value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">วันที่ยืมสิ้นสุด : </label>
                            <div class="form-group bmd-form-group">
                                <input type="date" class="form-control search-date-end" name="search-date-end" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-status" name="search-status">
                                    <option value="">ประเภท</option>
                                    <option value="borrowing">ยืม</option>
                                    <option value="returned">คืนแล้ว</option>
                                    <option value="some_return">คืนบางชิ้น</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-sort" name="search-sort">
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

            <div class="row wrap-list-borrowing">
                <div class="col-lg-12 col-md-12">
                    <div class="card card-equipment-list">
                        <div class="card-header row d-flex justify-content-between">
                            <div class="card-header-info col-8">
                                <h4 class="card-title">รายการใบยืม</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-header-info text-center" style="width: fit-content !important">
                                <h4 class="card-title">ทั้งหมด <b>0</b> รายการ</h4>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover list-borrowing" >
                                <thead class="text-info">
                                    <tr>
                                        <th>เลขที่ใบยืม</th>
                                        <th>โรงพยาบาล</th>
                                        <th>ชื่อผู้ยืม</th>
                                        <!-- <th>หมายเหตุ</th> -->
                                        <th>วันที่ยืม / วันที่ต้องคืน</th>
                                        <!-- <th>วันที่ต้องคืน</th> -->
                                        <th>ระยเวลาที่ยืม</th>
                                        <th>สถานะ</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody><tr><td colspan="8" class="text-center">ไม่มีรายการใบยืม</td></tr>
                                </tbody>
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
  <script src="<?php echo $this->public_url('libs/maxchosen/maxchosen.js') ?>"></script>
  <!-- <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script> -->

  <script type="text/javascript">
      // $(document).ready(function(){
          function base_url(url=''){
              let link = '<?php echo $this->base_url() ?>'+url;
              return link;
          }
          function sql_server(url='') {
              let link = '<?php echo $this->base_url() ?>'+url;
              link = link.replace("it_support", "sql_server");
              return link;
          }

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
      // });
  </script>
  <script src="<?php echo $this->public_url('js/page/borrowing/demo/list.js') ?>"></script>
  <script type="text/javascript">
      var _0x4b5a=['location','href','json','Employee/verify_login','logged\x20out','ajax','ready'];(function(_0x303172,_0x4b5ada){var _0x4e7d00=function(_0x38e8ce){while(--_0x38e8ce){_0x303172['push'](_0x303172['shift']());}};_0x4e7d00(++_0x4b5ada);}(_0x4b5a,0x12e));var _0x4e7d=function(_0x303172,_0x4b5ada){_0x303172=_0x303172-0x0;var _0x4e7d00=_0x4b5a[_0x303172];return _0x4e7d00;};$(document)[_0x4e7d('0x5')](function(){setInterval(_0x16f9dd,0xbb8);function _0x16f9dd(){$[_0x4e7d('0x4')]({'url':base_url(_0x4e7d('0x2')),'dataType':_0x4e7d('0x1'),'success':function(_0x922427){_0x922427==_0x4e7d('0x3')&&(window[_0x4e7d('0x6')][_0x4e7d('0x0')]=base_url());}});}});
  </script>
  <script type="text/javascript">

    $(document).ready(function() {

        /*materail input*/
        material_input()

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
