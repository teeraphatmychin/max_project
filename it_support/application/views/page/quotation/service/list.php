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
    <link href="<?php echo $this->public_url('css/media.css') ?>" rel="stylesheet" />
    <link href="<?php echo $this->public_url('libs/material/') ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <link href="<?php echo $this->public_url('css/loading.css') ?>" rel="stylesheet" />
    <link href="<?php echo $this->public_url('libs/chosen/css/component-chosen.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo $this->public_url('libs/maxchosen/maxchosen.css') ?>" rel="stylesheet" />
    <link href="<?php echo $this->public_url('css/quotation.css') ?>" rel="stylesheet" />

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
                <div class="modal-body wrap-data-quotation p-3" style="font-size: 14px;"></div>
                <div class="modal-footer d-flex justify-content-between row" style="border-top:0px;padding-left: 2rem;padding-right: 2rem;"></div>
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
            <a class="navbar-brand" href="#pablo">รายการใบเสนอราคา</a>
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
                        <a class="nav-link btn-modal-add-issue bg-success btn-modal-add-quotation" href="javascript:void(0)">
                            <i class="material-icons text-white">add_circle</i>
                            <p class="text-white d-block">สร้างใบเสนอราคา</p>
                        </a>
                    </li>
                <?php //endif; ?>
            </ul>
          </div>
        </div>
        <hr>
      </nav>
      <!-- End Navbar -->
      <div class="content pl-0 pr-0">
        <div class="col-md-12 col- d-lg-none d-md-block d-sm-block p-3 text-right">
            <button class="btn max-col-sm-12 col-md-3 btn-modal-add-issue bg-success btn-modal-add-quotation" >
                    <i class="material-icons text-white">add_circle</i>&nbsp;&nbsp;สร้างใบเสนอราคา
            </button>
        </div>
        <div class="container-fluid">
            <div class="row row-add-quotation" style="display:none">
                <div class="col-md-12 wrap-card-quotation">
                    <div class="card">
                        <div class="card-header card-header-info header-add-quotation">
                            <h4 class="card-title">สร้างใบเสนอราคา</h4>
                        </div>
                        <div class="row justify-content-between pl-4 pr-4 header-edit-quotation" style="display:none">
                            <div class="col-md-8 card-header card-header-info">
                                <h4 class="card-title">สร้างใบเสนอราคา</h4>
                            </div>
                            <div class="col-md-3 card-header card-header-info text-center">
                                <p class="card-category text-white q_num">เลขที่ : SER.792/2562</p>
                                <p class="card-category text-white q_date">วันที่ <?php echo $this->date_th(date('Y-m-d'),2); ?></p>
                            </div>
                        </div>
                        <div class="card-body">
                                <form class="form-add-quotation">
                                    <input type="hidden" name="type" value="">
                                    <input type="hidden" name="q_id" value="">
                                    <input type="hidden" name="add_quotation" value="1">
                                    <div class="row">
                                        <div class="col-md-2 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <select class="custom-select" name="q_type" required>
                                                    <option value="SER">SER</option>
                                                    <option value="SER-PM">SER-PM</option>
                                                    <option value="SER-IN">SER-IN</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-7 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <select class="form-control form-control-chosen list-customer" name="q_customer_id" ></select>
                                            </div>
                                            <div class="form-group bmd-form-group" style="display:none">
                                                <label class="bmd-label-floating"><strong>กรอกรายชื่อลูกค้า</strong></label>
                                                <input type="text" class="form-control input-customer-name" name="" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 wrap-input">
                                            <table>
                                                <tr>
                                                    <td class="add-customer pl-2">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input add-customer" name="add_customer" type="checkbox" value="add_new_customer">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="add-customer" style="padding-top: 25px;">เพิ่มลูกค้าใหม่</td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="col-md-12 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>เรื่อง</strong></label>
                                                <input type="text" class="form-control" name="q_topic" value="ขอเสนอราคา " required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 wrap-input">
                                            <div class="form-group bmd-form-group dropdown">
                                                <label class="bmd-label-floating"><strong>เรียน</strong></label>
                                                <input type="text" class="form-control" name="q_to" value="ผู้อำนวยการ " required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 wrap-input">
                                            <div class="form-group bmd-form-group dropdown">
                                                <label class="bmd-label-floating"><strong>รายละเอียด</strong></label>
                                                <a class="" id="dropdown-q_to_detail" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <input type="text" class="form-control" name="q_to_detail" value="บริษัทฯ มีความยินดีเสนอราคา " required>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-q_to_detail" aria-labelledby="dropdown-q_to_detail" style="left: 200px !important;">
                                                    <a class="dropdown-item" href="javascript:void(0)">วัสดุทางการแพทย์ ผลิตภัณฑ์</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">อุปกรณ์ทางการแพทย์ ผลิตภัณฑ์</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">เครื่องมือแพทย์ ผลิตภัณฑ์</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row table-q_product">
                                        <div class="col-md-12 text-center text-info">
                                            <h3>รายการสินค้า</h3>
                                        </div>
                                        <div class="wrap-list-q_product col-md-12 p-1">
                                            <div class="list-q_product col-md-12 border rounded p-1 row m-0">
                                                <div class="max-col-sm-12 col-md-7 wrap-list-product">
                                                    <div class="form-group bmd-form-group">
                                                        <select class="form-control form-control-chosen list-product" name="q_product[]" data-placeholder="ค้นหาสินค้า.."><option value="">ค้นหาสินค้า..</option></select>
                                                    </div>
                                                    <div class="form-group bmd-form-group input-product" style="display:none">
                                                        <label class="bmd-label-floating"><strong>ชื่อสินค้า</strong></label>
                                                        <input type="text" class="form-control" name="q_product_name[]">
                                                    </div>
                                                    <div class="form-check row d-flex justify-content-center">
                                                        <div class="max-col-sm-2 col-md-1 manual-product-checkbox">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input manual-product" type="checkbox" value="">
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="max-col-sm-8 col-md-7 text-left manual-product-text" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-5 wrap-select-price">
                                                    <div class="form-group bmd-form-group select-price">
                                                        <select class="custom-select list-price" name="q_product_price[]">
                                                            <option value="">กรุณาเลือกสินค้าก่อน..</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group bmd-form-group input-price" style="display:none">
                                                        <label class="bmd-label-floating"><strong>ราคา</strong></label>
                                                        <input type="number" class="form-control text-center" name="" min="0">
                                                    </div>
                                                    <div class="form-check row d-flex justify-content-center">
                                                        <div class="max-col-sm-2 col-md-2 manual-price-checkbox">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input manual-price" type="checkbox" value="">
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="max-col-sm-7 col-md-7 text-left manual-price-text" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-8 wrap-select-quanity row">
                                                    <div class="form-group bmd-form-group max-col-sm-12 col-md-6">
                                                        <label class="bmd-label-floating"><strong>จำนวน</strong></label>
                                                        <input type="number" class="form-control text-center q_quanity" name="q_quanity[]" min="0">
                                                    </div>
                                                    <div class="form-group bmd-form-group max-col-sm-12 col-md-6">
                                                        <label class="bmd-label-floating"><strong>ส่วนลด</strong></label>
                                                        <input type="number" class="form-control text-center q-discount" name="p_discount[]" min="0">
                                                        <div class="row">
                                                            <div class="max-col-sm-2 col-md-2 discount-type-checkbox">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input discount-type" type="checkbox" name="p_discount_type[]" value="percent">
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="max-col-sm-7 col-md-7 text-left discount-type-text" style="padding-top: 8px;padding-left: 1px;">เปอร์เซ็นต์</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 wrap-quanity-type">
                                                    <div class="form-group bmd-form-group">
                                                        <select class="custom-select q_quanity_type text-center" name="q_quanity_type[]">
                                                            <option value="ชิ้น">ชิ้น</option>
                                                            <option value="อัน">อัน</option>
                                                            <option value="ลูก">ลูก</option>
                                                            <option value="ชุด">ชุด</option>
                                                            <option value="เส้น">เส้น</option>
                                                            <option value="คัน">คัน</option>
                                                            <option value="หลอด">หลอด</option>
                                                            <option value="ซอง">ซอง</option>
                                                            <option value="กล่อง">กล่อง</option>
                                                            <option value="พับ">พับ</option>
                                                            <option value="ม้วน">ม้วน</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group bmd-form-group input-quanity-type" style="display:none">
                                                        <label class="bmd-label-floating text-left"><strong>ประเภท</strong></label>
                                                        <input type="text" class="form-control" name="">
                                                    </div>
                                                    <div class="form-check row d-flex justify-content-center">
                                                        <div class="max-col-sm-1 col-md-1 manual-quanity-type-checkbox">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input manual-quanity-type" type="checkbox">
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="max-col-sm-7 col-md-7 text-left manual-quanity-type-text" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center wrap-btn-delete-product"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row when-loading"></div>
                                    <div class="row justify-content-center d-flex wrap-btn-add-q_product">
                                        <button type="button" class="btn btn-success btn-add-q_product"><i class="material-icons">add</i> เพิ่มสินค้า</button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>เลขที่ RO</strong></label>
                                                <input type="text" class="form-control" name="q_ro_number" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>เลขที่ Job</strong></label>
                                                <input type="text" class="form-control" name="q_job_number" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>แผนก</strong></label>
                                                <input type="text" class="form-control" name="q_customer_department" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>ครุภัณฑ์</strong></label>
                                                <input type="text" class="form-control" name="q_stock_number" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 wrap-input">
                                            <div class="row p-0">
                                                <div class="col-md-6 form-group bmd-form-group">
                                                    <label class="bmd-label-floating text-dark"><strong>ส่วนลด</strong></label>
                                                    <input type="number" class="form-control text-center q-discount" name="q_discount" min="0">
                                                </div>
                                                <div class="row col-md-6">
                                                    <div class="max-col-sm-2 col-md-2 discount-type-checkbox">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input discount-type" type="checkbox" name="q_discount_type" value="percent">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="max-col-sm-7 col-md-7 text-left discount-type-text" style="padding-top: 2px;padding-left: 10px;">%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($_SESSION['user']->position != 'Sale Rep.'): ?>
                                            <div class="col-md-6 wrap-input wrap-list-service">
                                                <div class="form-group bmd-form-group">
                                                    <select class="form-control form-control-chosen list-service-name" name="q_service_name"></select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 wrap-input">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating"><strong>เบอร์โทรผู้แทนฝ่ายบริการ</strong></label>
                                                    <input type="text" class="form-control" name="q_service_phone" value="" required>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-md-12 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>หมายเหตุ</strong></label>
                                                <input type="text" class="form-control set-price-detail" name="q_a_note" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>กำหนดยืนราคา/วัน</strong></label>
                                                <input type="number" class="form-control text-center set-price-day" name="q_set_price[]" value="90" required>
                                            </div>
                                        </div>
                                        <div class="col-md-10 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>กำหนดยืนราคา/รายละเอียด</strong></label>
                                                <input type="text" class="form-control set-price-detail" name="q_set_price[]" value="นับตั้งแต่วันเสนอราคา" required>
                                                <!-- <input type="text" class="form-control" name="q_set_price[]" value="นับตั้งแต่วันเสนอราคา" required> -->
                                            </div>
                                        </div>
                                        <div class="col-md-2 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>การส่งของ/วัน</strong></label>
                                                <input type="number" class="form-control text-center set-dalivery-day" name="q_set_delivery[]" value="120" required>
                                            </div>
                                        </div>
                                        <div class="col-md-10 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>การส่งของ/รายละเอียด</strong></label>
                                                <input type="text" class="form-control set-dalivery-detail" name="q_set_delivery[]" value="นับตั้งแต่วันได้รับใบสั่งซื้อ/จ้าง" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>รับประกัน/วัน</strong></label>
                                                <input type="number" class="form-control text-center set-warranty-day" name="q_warranty[]" value="90" required>
                                            </div>
                                        </div>
                                        <div class="col-md-10 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating"><strong>รับประกัน/รายละเอียด</strong></label>
                                                <input type="text" class="form-control set-warranty-detail" name="q_warranty[]" value="นับตั้งแต่วันส่งมอบ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="max-col-sm-2 col-md-3">
                                            <!-- <div class="border rounded text-center"> -->
                                            <div class="form-check row d-flex justify-content-center">
                                                <div class="col-sm-1 col-md-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input modal-note" type="checkbox" name="q_note">
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="max-col-sm-9 col-md-8 text-left text-dark" style="padding-top: 16px;padding-left: 10px;"><strong>หมายเหตุ</strong></div>
                                            </div>
                                                <!-- <strong>หมายเหตุ</strong> -->
                                            <!-- </div> -->
                                        </div>
                                        <!-- <div class="col-md-12">
                                            <div class="form-group embed-responsive embed-responsive-4by3 wrap-iframe-summernote" >
                                                <iframe src="<?php echo $this->base_url('partail/summernote') ?>" scrolling="no" class="max-iframe-summernote note form-group col-12 embed-responsive-item" width="" height=""></iframe>
                                            </div>
                                        </div> -->

                                    </div>
                                    <div class="row wrap-list-note" style="display:none">
                                        <div class="list-note-body row col-sm-12 col-md-12">
                                            <div class="col-md-12 row list-note">
                                                <div class="col-md-1 number-note" style="padding-top: 2%;padding-left: 4%;">1.</div>
                                                <div class="col-md-10">
                                                    <div class="form-group bmd-form-group">
                                                        <textarea class="form-control" name="q_note_list[]" rows="2"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <!-- <button type="button" class="btn btn-danger btn-delete-note">ลบ</button> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-note-footer col-md-12">
                                            <div class="col-md-12">
                                                <div class="row justify-content-center d-flex wrap-btn-add-note">
                                                    <button type="button" class="btn btn-success btn-add-note"><i class="material-icons">add</i> เพิ่มหมายเหตุ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                        </div>
                        <div class="card-footer text-center justify-content-between">
                            <a class="btn btn-danger btn-cancel-quotation" href="javascript:void(0)"><h4><i class="material-icons mr-3">cancel</i>ยกเลิก</h4></a>
                            <a class="btn btn-success btn-add-quotation" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar">
                <form class="form-search col-md-12">
                    <div class="row justify-content-around d-flex">
                        <div class="form-group text-center">
                            <label class="text-dark">เลขที่ใบเสนอราคา : </label>
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
                                <select class="custom-select search-cate" name="search-cate"></select>
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
                        <div class="form-group wrap-search-year-start">
                            <label class="text-dark">ปีเริ่มต้น : </label>
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-year-start" name="search-year-start"></select>
                            </div>
                        </div>
                        <div class="form-group wrap-search-year-end">
                            <label class="text-dark">ปีสิ้นสุด : </label>
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-year-end" name="search-year-end"></select>
                            </div>
                        </div>
                        <div class="form-group wrap-btn-reset-search">
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
                    <div class="card-header-info max-col-sm-10 col-md-7 col-lg-7">
                        <h4 class="card-title">รายการใบเสนอราคา</h4>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-header-info text-center list-number-order" style="width: fit-content !important;">
                        <h4 class="card-title">ทั้งหมด <b>0</b> รายการ</h4>
                    </div>
                </div>
                <div class="card-body table-responsive" >
                    <table class="table table-hover tb-quotation-list">
                        <thead class="text-info">
                            <tr>
                                <th>เลขที่ใบเสนอราคา</th>
                                <th class="customer-name">ชื่อโรงพยาบาล</th>
                                <th>สถานะ</th>
                                <th>ตัวเลือก</th>
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
 <!-- <script src="<?php echo $this->public_url('libs/chosen/js/chosen.jquery.min.js') ?>"></script> -->
 <script src="<?php echo $this->public_url('libs/maxchosen/maxchosen.js') ?>"></script>
  <!-- <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script> -->


  <script type="text/javascript">
    $(document).ready(function() {
        //ต้องมีด้วยว่าคนไหนมีสิทธิ์ search อะไรบ้าง
            //น่าจะตามสิทธิ์ที่เห็นได้ว่าเห็นอะไรได้ บ้าง
        // $('.modal-preview-quotation').modal('show');
        // $('.row-add-quotation').show(500);
        // setInterval(test, 3000); // ทำ notification paramiter เป็น (function(),timer)
        btn_to_top();
        material_input();
        list_customer();
        list_product();
        // loading_gif($('.form-add-quotation .table-q_product  .wrap-list-product'));
        get_number_quotation();
        list_service_name();
        list_quotation();
        list_brand();
        // var timeout;
        // document.focus = function(){
        //     document.onmousemove = function(){
        //         clearTimeout(timeout);
        //         timeout = setTimeout(list_quotation, 3000);
        //     }
        // }
        setInterval(list_quotation, 15000);
        // console.log(timeout);
        // if (timeout != 0) {
        //     setTimeout(function(){setInterval(list_quotation, 3000);},timeout);
        // }

        $('.row-add-quotation')
        .on('click','input.add-customer',function(){ /* manual customer*/
            let wrap = $(this).closest('.row-add-quotation');
            if ($(this).prop('checked') == true) {
                if (wrap.find('.list-customer').val() != '') {
                    // wrap.find('input[name=add_customer]').prop('checked',false);
                    let customer_name = wrap.find('.list-customer option:selected').html();
                    wrap.find('input.input-customer-name').closest('.form-group').addClass('is-filled');
                    wrap.find('input.input-customer-name').val(customer_name);
                }else {
                    wrap.find('input[name=add_customer]').prop('checked',true);
                }
                $(this).closest('.row-add-quotation').find('.list-customer').closest('.form-group').hide();
                $(this).closest('.row-add-quotation').find('input.input-customer-name').closest('.form-group').show();
                $(this).closest('.row-add-quotation').find('input.input-customer-name').attr('name','q_customer_name');
                $(this).closest('.row-add-quotation').find('select.list-customer').attr('name','');
            }else {
                $(this).closest('.row-add-quotation').find('.list-customer').closest('.form-group').show();
                $(this).closest('.row-add-quotation').find('input.input-customer-name').closest('.form-group').hide();
                $(this).closest('.row-add-quotation').find('input.input-customer-name').attr('name','');
                $(this).closest('.row-add-quotation').find('select.list-customer').attr('name','q_customer_id');

            }
        })
        .on('keyup','input[name=q_customer_name]',function(){
            let value = $(this).val();
            $(this).closest('.row-add-quotation').find('input[name=q_to]').val('ผู้อำนวยการ '+value);
        })
        .on('change','.list-customer',function(){
            let value = $(this).val();
            if(value != ''){
                $(this).closest('.row-add-quotation').find('input[name=add_customer]').prop('checked',false);
            }
        })
        .on('click','input.manual-quanity-type',function(){ /*manual quanity type*/
            let wrap = $(this).closest('.list-q_product');
            if($(this).prop('checked')){
                wrap.find('.q_quanity_type').closest('.form-group').hide();
                wrap.find('.input-quanity-type').show();
                wrap.find('.input-quanity-type input').prop('name','q_quanity_type[]');
                wrap.find('select.q_quanity_type').prop('name','');
            }else {
                wrap.find('.q_quanity_type').closest('.form-group').show();
                wrap.find('.input-quanity-type').hide();
                wrap.find('.input-quanity-type input').prop('name','');
                wrap.find('select.q_quanity_type').prop('name','q_quanity_type[]');
            }
        })
        .on('click','.modal-note',function(){/*dropdown q_to_detail*/
            let wrap = $(this).closest('.row-add-quotation');
            if ($(this).prop('checked')) {
                wrap.find('.wrap-list-note').show();
                let note = [
                    'ผู้ขายจะต้องขายพัสดุในราคาไม่แพงกว่าขายในหน่วยงานต่างๆในจังหวัด(ในปีงบประมาณเดียวกัน) หากพบว่าแพงกว่าราคาที่ขายให้หน่วยงานต่างๆ ผู้ขายยินดีคืนเงินส่วนเกินให้โรงพยาบาล',
                    'บริษัท โซวิค จำกัด ที่อยู่ : 448ม450 ซ.ศุภราช ถ.พหลโยธิน แขวงสามเสนใน เขตพญาไท กรุงเทพฯ 10400 เบอร์โทรศัพท์ : 02-090-2591-4 ต่อ 212,243 (ฝ่ายขาย) FAX : 02-271-3737',
                    'เลขประจำตัวผู้เสียภาษี : 0105529003833',
                    'บัญชีเงินฝากกระแสรายวัน : ธ.กรุงไทย สาขาซอยอารีย์ ชื่อบัญชี : บริษัท โซวิค จำกัด เลขที่บัญชี : 172-6-00400-7',
                    'ผู้รับมอบอำนาจในการรับใบสั่งซื้อ : นายอัครินทร์ เลิศวราสิริภัคดี ผู้แทนฝ่ายบริการ',
                    'ฟรีค่าบริการและติดตั้ง',
                ];
                let html = '';
                $.each(note,function(key,value){
                    html += '<div class="col-md-12 row list-note">';
                    html += '<div class="col-sm-2 col-md-1 number-note pr-0" style="padding-top: 2%;padding-left: 4%;">'+(key+1)+'.</div>';
                    html += '<div class="col-sm-9 col-md-10 pr-0">';
                    html += '<div class="form-group bmd-form-group">';
                    html += '<textarea class="form-control" name="q_note_list[]" rows="2">'+value+'</textarea>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-sm-1 col-md-1 pr-0">';
                    html += '<button type="button" class="btn btn-danger btn-delete-note d-sm-none d-md-block"><span class="">ลบ</span></button><i class="material-icons d-sm-block d-md-none text-danger btn-delete-note">delete</i>';
                    html += '</div>';
                    html += '</div>';
                });
                wrap.find('.wrap-list-note .list-note-body').html(html);
            }else {
                wrap.find('.wrap-list-note').hide();
            }
        })
        .on('click','.dropdown-q_to_detail .dropdown-item',function(){/*dropdown q_to_detail*/
            let value = $(this).html();
            $(this).closest('.dropdown').find('input').val('บริษัทฯ มีความยินดีเสนอราคา '+value);
        })
        .on('click','.btn-add-note',function(){/*add note*/
            let wrap = $(this).closest('.wrap-list-note');
            wrap.find('.help-block').remove();
            if (wrap.find('.list-note').length < 2) {
                let btn_delete_note = '<button type="button" class="btn btn-danger btn-delete-note d-sm-none d-md-block"><span class="">ลบ</span></button><i class="material-icons d-sm-block d-md-none text-danger btn-delete-note">delete</i>';
                wrap.find('.list-note .col-md-1').append(btn_delete_note);
            }
            wrap.find('.list-note-body').append(wrap.find('.list-note-body .list-note:last-child').clone());
            $.each(wrap.find('.list-note'),function(key,value){
                $(this).find('.number-note').html((key+1)+'.');
            });
        })
        .on('click','.btn-delete-note',function(){/*delete note*/
            let wrap = $(this).closest('.row-add-quotation').find('.wrap-list-note');
            $(this).closest('.list-note').remove();
            if (wrap.find('.list-note').length == 1) {
                wrap.find('.list-note:first-child .col-md-1 .btn-delete-note').remove();
            }
            $.each(wrap.find('.list-note'),function(key,value){
                $(this).find('.number-note').html((key+1)+'.');
            });
        });

        function search_sort(data,check_searchs){
            $('.navbar .form-search').off();
            $('.navbar .form-search')
            .on('click','.btn-reset-search',function(){
                $('.navbar .form-search .search-q_number').val('');
                $('.navbar .form-search .search-date-start').val('');
                $('.navbar .form-search .search-date-end').val('');
                $('.navbar .form-search .search-cate').val('');
                $('.navbar .form-search .search-sort').val('');
                let html = '';
                let check_month = '0';
                let check_line_today = 0;
                $.each(data,function(key,value){
                    let q_date = value.q_date;
                    q_date = q_date.substr(0, 4);
                    q_date = parseInt(q_date)+543;
                    html += '<tr q_id="'+value.q_id+'">';
                        let q_num = value.q_num;
                        q_num = q_num.toString();
                        if (q_num.length < 4) {
                            let add_zero = '';
                            for (var i = q_num.length; i < 4; i++) {
                                add_zero = add_zero+'0';
                            }
                            q_num = add_zero+q_num;
                        }
                        html += '<td>'+value.q_type +'.'+ q_num+'/'+q_date+'</td>';
                        html += '<td class="customer-name">'+value.q_customer_name+'</td>';
                        let q_status = value.q_status;
                        switch (q_status) {
                            case 'new':
                                q_status = '<span class="text-info">สร้างใหม่</span>';
                                break;
                            case 'edit':
                                q_status = '<span class="text-warning">ต้องแก้ไข</span>';
                                break;
                            case 'cancel':
                                q_status = '<span class="text-danger">ยกเลิก</span>';
                                break;
                            case 'approved':
                                q_status = '<span class="text-success">หัวหน้าอนุมัติ</span>';
                                if (value.q_status_customer != '') {
                                    switch (value.q_status_customer) {
                                        case 'reject':
                                        q_status += ',<span class="text-danger">ลูกค้ายกเลิก</span>';
                                        break;
                                        case 'approved':
                                        q_status += ',<span class="text-success">ลูกค้าอนุมัติ</span>';
                                        break;
                                        default:
                                    }
                                }
                                break;
                            default:
                        }
                        html += '<td>'+q_status+'</td>';
                        html += '<td>';
                        html += '<button class="btn btn-info btn-option" option-type="check"><i class="material-icons">visibility</i> ตรวจสอบ</button>';
                        html += '<button class="btn btn-warning btn-option" option-type="duplicate"><i class="material-icons">file_copy</i> คัดลอก</button>';
                        html += '</td>';
                        html += '</tr>';
                });
                let num_order = data.length;
                $('.content .list-quotation .card-title b').html(num_order);
                $('.content .list-quotation tbody').html(html);
            })
            .on('change keyup','.search-q_number,.search-date-start,.search-date-end,.search-sort,.search-cate,.search-year-start,.search-year-end',function(){
                let q_number = $('.navbar .form-search .search-q_number').val();
                let date_start = $('.navbar .form-search .search-date-start').val();
                let date_end = $('.navbar .form-search .search-date-end').val();
                let sort = $('.navbar .form-search .search-sort').val();
                let cate = $('.navbar .form-search .search-cate').val();
                let cate_text = $('.navbar .form-search .search-cate option:selected').html();
                let year_start = $('.navbar .form-search .search-year-start').val();
                let year_end = $('.navbar .form-search .search-year-end').val();
                let data_search = [];
                let key_data_search = 0;

                if (date_start != '' || date_end != '') {
                    if (date_end < date_start) {
                        let data_swap = date_start;
                        date_start = date_end;
                        date_end = data_swap;
                    }
                    let date_start_split = date_start.split('-');

                    for (var i = 0; i < data.length; i++) {
                        let date = data[i].q_date;
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
                    if (cate.indexOf('customer_') > -1) {
                        cate = cate.split('customer_');
                        cate = cate[1];
                        var data_search_cate = [];
                        let data_key_cate = 0;
                        for (var i = 0; i < data_search.length; i++) {
                            if (data_search[i].q_status_customer == cate) {
                                data_search_cate[data_key_cate++] = data_search[i];
                            }
                        }
                    }else {
                        var data_search_cate = [];
                        let data_key_cate = 0;
                        for (var i = 0; i < data_search.length; i++) {
                            if (data_search[i].q_status == cate) {
                                data_search_cate[data_key_cate++] = data_search[i];
                            }
                        }

                    }
                    data_search = data_search_cate;
                }
                if (q_number != '') {
                    q_number = q_number.toUpperCase();
                    let data_search_q_number = [];
                    let data_key_q_number = 0;
                    for (var i = 0; i < data_search.length; i++) {
                        let data_q_number = data_search[i].q_number;
                        if (data_q_number.indexOf(q_number) > -1 ) {
                            data_search_q_number[data_key_q_number++] = data_search[i];
                        }
                    }
                    data_search = data_search_q_number;
                }
                    //event select year
                    let tag_year = $(this).attr('name');
                    if (tag_year.indexOf('search-year') > -1) {
                        setTimeout(function(){
                            if (year_start != '' || year_end != '') {
                                if (year_end < year_start) {
                                    let year_swap = year_start;
                                    year_start = year_end;
                                    year_end = year_swap;
                                }
                                if (year_end == '') {
                                    let this_year = new Date();
                                    year_end = this_year.getFullYear();
                                }
                                $.ajax({
                                    url: '<?php echo $this->base_url('Quotation/list') ?>',
                                    method: 'post',
                                    data: {year_start:year_start,year_end:year_end,status:'get'},
                                    dataType: 'json',
                                    success: function(respond){
                                        if (respond[0] == 'success') {
                                            let data_year_array = [];
                                            let data_year_key = 0;
                                            $.each(respond[1],function(respond_key,respond_value){
                                                data_year_array[data_year_key] = respond_value;
                                                data_year_key++;
                                            });
                                            data_search = data_year_array;
                                            search_sort(data_search);
                                        }
                                    }
                                });
                            }
                        },100);
                    }
                    setTimeout(function(){
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
                            html += '<tr><td class="text-center" colspan="4">ไม่มีรายการใบเสนอราคา</td></tr>';
                            let number_order = 0;
                            $('.content .list-quotation .card-title b').html(number_order);
                            $('.content .list-quotation tbody').html(html);
                        }else {
                            let check_line_today = 0;
                            $.each(data_search,function(key,value){
                                if (cate == '') {
                                    if (value.q_status != 'cancel') {
                                        let q_date = value.q_date;
                                        q_date = q_date.substr(0, 4);
                                        q_date = parseInt(q_date)+543;
                                        html += '<tr q_id="'+value.q_id+'">';
                                            let q_num = value.q_num;
                                            q_num = q_num.toString();
                                            if (q_num.length < 4) {
                                                let add_zero = '';
                                                for (var i = q_num.length; i < 4; i++) {
                                                    add_zero = add_zero+'0';
                                                }
                                                q_num = add_zero+q_num;
                                            }
                                            html += '<td>'+value.q_type +'.'+ q_num+'/'+q_date+'</td>';
                                            html += '<td class="customer-name">'+value.q_customer_name+'</td>';
                                            let q_status = value.q_status;
                                            switch (q_status) {
                                                case 'new':
                                                    q_status = '<span class="text-info">สร้างใหม่</span>';
                                                    break;
                                                case 'edit':
                                                    q_status = '<span class="text-warning">ต้องแก้ไข</span>';
                                                    break;
                                                case 'cancel':
                                                    q_status = '<span class="text-danger">ยกเลิก</span>';
                                                    break;
                                                case 'approved':
                                                    q_status = '<span class="text-success">หัวหน้าอนุมัติ</span>';
                                                    if (value.q_status_customer != '') {
                                                        switch (value.q_status_customer) {
                                                            case 'reject':
                                                            q_status += ',<span class="text-danger">ลูกค้ายกเลิก</span>';
                                                            break;
                                                            case 'approved':
                                                            q_status += ',<span class="text-success">ลูกค้าอนุมัติ</span>';
                                                            break;
                                                            default:
                                                        }
                                                    }
                                                    break;
                                                default:
                                            }
                                            html += '<td>'+q_status+'</td>';
                                            html += '<td>';
                                            html += '<button class="btn btn-info btn-option" option-type="check"><i class="material-icons">visibility</i> ตรวจสอบ</button>';
                                            html += '<button class="btn btn-warning btn-option" option-type="duplicate"><i class="material-icons">file_copy</i> คัดลอก</button>';
                                            html += '</td>';
                                            html += '</tr>';
                                    }
                                }else {
                                    let q_date = value.q_date;
                                    q_date = q_date.substr(0, 4);
                                    q_date = parseInt(q_date)+543;
                                    html += '<tr q_id="'+value.q_id+'">';
                                        let q_num = value.q_num;
                                        q_num = q_num.toString();
                                        if (q_num.length < 4) {
                                            let add_zero = '';
                                            for (var i = q_num.length; i < 4; i++) {
                                                add_zero = add_zero+'0';
                                            }
                                            q_num = add_zero+q_num;
                                        }
                                        html += '<td>'+value.q_type +'.'+ q_num+'/'+q_date+'</td>';
                                        html += '<td class="customer-name">'+value.q_customer_name+'</td>';
                                        let q_status = value.q_status;
                                        switch (q_status) {
                                            case 'new':
                                                q_status = '<span class="text-info">สร้างใหม่</span>';
                                                break;
                                            case 'edit':
                                                q_status = '<span class="text-warning">ต้องแก้ไข</span>';
                                                break;
                                            case 'cancel':
                                                q_status = '<span class="text-danger">ยกเลิก</span>';
                                                break;
                                            case 'approved':
                                                q_status = '<span class="text-success">หัวหน้าอนุมัติ</span>';
                                                break;
                                            default:
                                        }

                                        if (value.q_status_customer != '') {
                                            switch (value.q_status_customer) {
                                                case 'reject':
                                                q_status += ',<span class="text-danger">ลูกค้ายกเลิก</span>';
                                                break;
                                                case 'approved':
                                                q_status += ',<span class="text-success">ลูกค้าอนุมัติ</span>';
                                                break;
                                                default:
                                            }
                                        }
                                        html += '<td>'+q_status+'</td>';
                                        html += '<td>';
                                        html += '<button class="btn btn-info btn-option" option-type="check"><i class="material-icons">visibility</i> ตรวจสอบ</button>';
                                        html += '<button class="btn btn-warning btn-option" option-type="duplicate"><i class="material-icons">file_copy</i> คัดลอก</button>';
                                        html += '</td>';
                                        html += '</tr>';
                                }
                                });
                                let number_order = data_search.length;
                                $('.content .list-quotation .card-title b').html(number_order);
                                $('.content .list-quotation tbody').html(html);
                            }
                    },150);


            });
        }

        /*remove form product*/
        $('.form-add-quotation').on('click','.list-q_product .btn-delete-product',function(){
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
        $('.btn-modal-add-quotation').click(function(){
            $('.loading-screen').show();
            $('.row-add-quotation').show();
        });
        $('.btn-modal-add-quotation').click(function(){
            setTimeout(function(){
                let check = $('.row-add-quotation .card .card-body input[name=type]').val();
                let value = $('.row-add-quotation .form-add-quotation input[name=q_date]').val();
                $('.row-add-quotation .card .card-header').removeClass('card-header-warning');
                $('.row-add-quotation .card .card-header').addClass('card-header-info');
                $('.row-add-quotation .card .card-header h4.card-title').html('สร้างใบเสนอราคา');
                $('.row-add-quotation .form-add-quotation .help-block').remove();
                $('.row-add-quotation .header-edit-quotation').hide();
                $('.row-add-quotation .header-add-quotation').show();
                $('.row-add-quotation .form-add-quotation select.list-product').html('<option value="" selected>ค้นหาสินค้า...</option>');
                $('.row-add-quotation .form-add-quotation select').each(function(key,value){
                    let select_name = $(this).attr('name');
                    if (select_name.indexOf('q_') > -1) {
                        if (select_name != 'q_type' && $(this).hasClass('q_quanity_type') == false) {
                            $(this).val('');
                        }
                    }
                });
                $('.row-add-quotation select[name=q_customer_id]').val('');
                $('.row-add-quotation select[name=q_customer_id]').val('');
                max_chosen($('.row-add-quotation select[name=q_customer_id]'),'update');
                max_chosen($('.row-add-quotation select[name=q_service_name]'),'update');
                max_chosen($('.row-add-quotation .form-add-quotation .wrap-list-q_product select.list-product').eq(0),'update');
                $('.row-add-quotation .form-add-quotation input').each(function(key,value){
                    $(this).val('');
                });
                $('.row-add-quotation .form-add-quotation input[name=add_quotation]').val('1');
                $('.row-add-quotation .form-add-quotation input[name=q_model]').val('');
                $('.row-add-quotation .form-add-quotation input[name=q_topic]').val('ขอเสนอราคา ');
                $('.row-add-quotation .form-add-quotation input[name=q_sn]').val('');
                $('.row-add-quotation .form-add-quotation input[name=q_customer_department]').val('');
                $('.row-add-quotation .form-add-quotation select.list-price').html('<option value="" selected>กรุณาเลือกสินค้าก่อน..</option>');
                $('.row-add-quotation .form-add-quotation input.q_quanity').val('');
                $('.row-add-quotation .form-add-quotation input.set-price-day').val('90');
                $('.row-add-quotation .form-add-quotation input.set-price-detail').val('นับตั้งแต่วันเสนอราคา');
                $('.row-add-quotation .form-add-quotation input.set-dalivery-day').val('120');
                $('.row-add-quotation .form-add-quotation input.set-dalivery-detail').val('นับตั้งแต่วันได้รับใบสั่งซื้อ/จ้าง');
                $('.row-add-quotation .form-add-quotation input.set-warranty-day').val('90');
                $('.row-add-quotation .form-add-quotation input.set-warranty-detail').val('นับตั้งแต่วันส่งมอบ');
                // $('.row-add-quotation .form-add-quotation select.q_quanity_type').val(q_quanity_type);
                $('.row-add-quotation .form-add-quotation input[name=q_to').val('ผู้อำนวยการ');
                $('.row-add-quotation .form-add-quotation input[name=q_to_detail').val('บริษัทฯ มีความยินดีเสนอราคา ');
                $('.row-add-quotation .form-add-quotation input[name=q_service_phone').val('');
                // $('.row-add-quotation .form-add-quotation select[name*=q_]').trigger("chosen:updated");
                // $('.row-add-quotation .form-add-quotation input[name=add_quotation]').attr('name','update_quotation');
                $('.row-add-quotation .form-add-quotation').find('.bmd-form-group').removeClass('is-filled');
                $('.row-add-quotation .form-add-quotation').find('.bmd-form-group').removeClass('is-focused');
                $('.row-add-quotation .card .card-footer .btn-add-quotation').show();
                $('.row-add-quotation .card .card-footer .btn-edit-quotation').hide();

                $('.row-add-quotation .form-add-quotation input').each(function(key,value){
                    if ($(this).val() != '') {
                        $(this).closest('.form-group').addClass('is-filled');
                    }
                });
                $('.row-add-quotation .form-add-quotation .list-q_product').each(function(key,value){

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
                $('.row-add-quotation .card .card-body input.modal-note').prop('checked',false);
                $('.row-add-quotation .card .card-body .wrap-list-note').hide();
                $('.row-add-quotation').show();
                $('html, body').animate({scrollTop:($(".row-add-quotation").offset().top)}, 500);
                $('.loading-screen').hide();
                list_product();
            },100);
        });

        /*close form add*/
        $('.btn-cancel-quotation').click(function(){
            $('.row-add-quotation').hide();
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
                        // $('.form-add-quotation .list-brand').chosen({allow_single_deselect: true,width: '100%',search_contains:true});
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
                        max_chosen($('.form-add-quotation .wrap-list-service .list-service-name'));
                        // $('.form-add-quotation .wrap-list-service .list-service-name').chosen({allow_single_deselect: true,width: '100%',search_contains:true});
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
                        $('.form-add-quotation .list-customer').html(html);
                        max_chosen($('.form-add-quotation .list-customer'));

                    }
                }
            });
        }
        function list_product(selector=''){
            let tag_chosen = '';
            if (selector != '') {
                tag_chosen = selector;
            }else {
                // tag_chosen = $('.form-add-quotation .list-q_product:last-child select.list-product');
                tag_chosen = $('.form-add-quotation .list-q_product select.list-product');
                // tag_chosen.closest('.list-q_product').css({background:'red'})
            }
            max_chosen(tag_chosen,'','get_value_select');
            var search_product;
            tag_chosen.closest('.form-group').find('.max-wrap-chosen .max-chosen-drop .max-chosen-search .max-chosen-search-input').keyup(function(){
                var tag = $(this);
                clearTimeout(search_product);
                search_product = setTimeout(function(){
                    $.ajax({
                        url : '<?php echo $this->base_url('Product/search_product') ?>',
                        method: 'post',
                        data: {search:tag.val()},
                        dataType: 'json',
                        success: function(data){
                            // console.log(data);
                            let html = '<option value="">กรุณาเลือกรายการสินค้า..</option>';
                            if (data[0] == 'success') {
                                $.each(data[1],function(key,value){
                                    html += '<option value="'+value.p_id+'">'+value.p_code+':'+value.p_detail+'</option>';
                                });
                                tag.closest('.form-group').find('select.list-product').html(html);
                                // $('.row-add-quotation .card .card-body select').trigger("chosen:updated");
                                max_chosen(tag.closest('.form-group').find('select.list-product'),'update');
                                tag.val(data[2]);
                                auto_price(data[1]);
                            }else {
                                tag.closest('.form-group').find('.max-wrap-chosen .max-chosen-drop .max-chosen-search .max-chosen-search-input').val(data[2]);
                                // $('.form-add-quotation  .wrap-list-product select.list-product').closest('.form-group').find('.max-wrap-chosen .max-chosen-drop .max-chosen-search .max-chosen-search-input').val(data[2]);
                            }
                        }

                    });
                },500);
            });
        }
        var check_call_function = true;
        function list_quotation(){
            $('.content .list-quotation tbody').html('<tr><td colspan="4" style="padding-bottom: 160px;"></td></tr>');
            loader($('.content .list-quotation tbody tr td'));
            let full_year = new Date();
            var this_year = full_year.getFullYear();
            let status_year = false;
            let year_start = $('.navbar select.search-year-start').val();
            let year_end = $('.navbar select.search-year-end').val();
            if ($('.navbar select.search-year-start').val() != '' || $('.navbar select.search-year-end').val() != '') {
                if (year_end < year_start) {
                    let year_swap = year_start;
                    year_start = year_end;
                    year_end = year_swap;
                }
            }
            $.ajax({
                url: '<?php echo $this->base_url('Quotation/list') ?>',
                method: 'post',
                data: {year_start:year_start,year_end:year_end,status:'get'},
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    let html = '';
                    var select_search = '<option value="">ประเภท</option>';
                    if (data[0] == 'success') {
                        let btn = []
                        let count_btn = 0;
                        $.each(data[1],function(key,value){
                            if (value.q_status != 'cancel' && value.q_status_customer != 'approved' && value.q_status_customer != 'reject') {
                                let q_date = value.q_date;
                                q_date = q_date.substr(0, 4);

                                q_date = parseInt(q_date)+543;
                                html += '<tr q_id="'+value.q_id+'">';
                                let q_num = value.q_num;
                                q_num = q_num.toString();
                                if (q_num.length < 4) {
                                    let add_zero = '';
                                    for (var i = q_num.length; i < 4; i++) {
                                        add_zero = add_zero+'0';
                                    }
                                    q_num = add_zero+q_num;
                                }


                                html += '<td>'+value.q_type +'.'+ q_num+'/'+q_date+'</td>';
                                html += '<td class="customer-name">'+value.q_customer_name+'</td>';
                                let q_status = value.q_status;
                                switch (q_status) {
                                    case 'new':
                                    q_status = '<span class="text-info">สร้างใหม่</span>';
                                    break;
                                    case 'edit':
                                    q_status = '<span class="text-warning">ต้องแก้ไข</span>';
                                    break;
                                    case 'cancel':
                                    q_status = '<span class="text-danger">ยกเลิก</span>';
                                    break;
                                    case 'approved':
                                    q_status = '<span class="text-success">หัวหน้าอนุมัติ</span>';
                                    if (value.q_status_customer != ''){
                                        switch (value.q_status_customer) {
                                            case 'created':
                                            q_status += ',<span class="text-danger">สั่งพิมพ์แล้ว</span>';
                                            break;
                                            case 'reject':
                                            q_status += ',<span class="text-danger">ลูกค้ายกเลิก</span>';
                                            break;
                                            case 'approved':
                                            q_status += ',<span class="text-success">ลูกค้าอนุมัติ</span>';
                                            break;
                                            default:
                                        }
                                    }
                                    break;
                                    default:
                                }
                                html += '<td>'+q_status+'</td>';
                                html += '<td>';
                                    html += '<button class="btn btn-info btn-option" option-type="check"><i class="material-icons">visibility</i> ตรวจสอบ</button>';
                                    html += '<button class="btn btn-warning btn-option" option-type="duplicate"><i class="material-icons">file_copy</i> คัดลอก</button>';
                                    html += '</td>';
                                    html += '</tr>';
                            }
                            });
                            switch (data[2]) {
                                case 'admin':
                                    select_search += '<option value="new">สร้างใหม่</option>';
                                    select_search += '<option value="edit">ต้องแก้ไข</option>';
                                    select_search += '<option value="approved">หัวหน้าอนุมัติ</option>';
                                    select_search += '<option value="customer_reject">ลูกค้ายกเลิก</option>';
                                    select_search += '<option value="customer_approved">ลูกค้าอนุมัติ</option>';
                                    select_search += '<option value="cancel">ยกเลิก</option>';
                                    break;
                                case 'service':
                                    select_search += '<option value="approved">หัวหน้าอนุมัติ</option>';
                                    select_search += '<option value="customer_approved">ลูกค้าอนุมัติ</option>';
                                    break;
                                case 'sale':
                                    select_search += '<option value="new">สร้างใหม่</option>';
                                    select_search += '<option value="edit">ต้องแก้ไข</option>';
                                    select_search += '<option value="approved">หัวหน้าอนุมัติ</option>';
                                    select_search += '<option value="customer_approved">ลูกค้าอนุมัติ</option>';
                                    select_search += '<option value="customer_reject">ลูกค้ายกเลิก</option>';
                                    break;
                                case 'supervisor':
                                    select_search += '<option value="new">สร้างใหม่</option>';
                                    select_search += '<option value="edit">ต้องแก้ไข</option>';
                                    select_search += '<option value="cancel">ยกเลิก</option>';
                                    select_search += '<option value="approved">หัวหน้าอนุมัติ</option>';
                                    select_search += '<option value="customer_approved">ลูกค้าอนุมัติ</option>';
                                    select_search += '<option value="customer_reject">ลูกค้ายกเลิก</option>';
                                    break;
                                case 'it':
                                    select_search += '<option value="new">สร้างใหม่</option>';
                                    select_search += '<option value="edit">ต้องแก้ไข</option>';
                                    select_search += '<option value="cancel">ยกเลิก</option>';
                                    select_search += '<option value="approved">หัวหน้าอนุมัติ</option>';
                                    select_search += '<option value="customer_approved">ลูกค้าอนุมัติ</option>';
                                    select_search += '<option value="customer_reject">ลูกค้ายกเลิก</option>';
                                    break;
                                default:
                            }
                            //get year for search
                            if (!year_start) {
                                year_start = parseInt(this_year+543);
                            }
                            if (!year_end) {
                                year_end = parseInt(this_year+543);
                            }
                            let option_year = '';
                                $.each(data[3],function(year_key,year_value){
                                    let year_th = parseInt(year_value.q_date);
                                    year_th = parseInt(year_th + 543);
                                    option_year += '<option value="'+year_th+'">'+year_th+'</option>';
                                });
                                $('.navbar select.search-year-start').html(option_year);
                                $('.navbar select.search-year-start').val(year_start);
                                $('.navbar select.search-year-end').html(option_year);
                                $('.navbar select.search-year-end').val(year_end);
                                $('.navbar select.search-cate').html(select_search);
                            let num_order = data[1].length;
                            $('.content .list-quotation .card-title b').html(num_order);
                            $('.content .list-quotation tbody').html(html);
                    }else if(data[0] == 'empty'){
                        if (!year_start) {
                            year_start = parseInt(this_year+543);
                        }
                        if (!year_end) {
                            year_end = parseInt(this_year+543);
                        }
                        let option_year = '<option value="'+year_start+'">'+year_start+'</option>';
                        $('.navbar select.search-year-start').html(option_year);
                        $('.navbar select.search-year-start').val(year_start);
                        $('.navbar select.search-year-end').html(option_year);
                        $('.navbar select.search-year-end').val(year_end);
                        html += '<tr><td class="text-center" colspan="4">ไม่มีรายการใบเสนอราคา</td></tr>';
                        $('.content .list-quotation tbody').html(html);
                        $('.navbar select.search-cate').html(select_search);
                    }
                    // if (check_call_function) {
                        search_sort(data[1],true);
                        // window.search_sort=function(){return false;};
                        // check_call_function = false;
                    // }
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
                setTimeout(function(){
                    $.ajax({
                        url: '<?php echo $this->base_url('Quotation/get_quotation') ?>',
                        method: 'post',
                        data: {q_id:q_id},
                        dataType: 'json',
                        success: function(data){
                            var data = data[1][0];
                            $('.row-add-quotation .card .card-body input[name=type]').val('add');
                            $('.row-add-quotation .header-edit-quotation').hide();
                            $('.row-add-quotation .header-add-quotation').show();
                            $('.row-add-quotation .card .card-header h4.card-title').html('สร้างใบเสนอราคา');
                            $('.row-add-quotation .card .card-footer .btn-add-quotation').show();
                            $('.row-add-quotation .card .card-footer .btn-edit-quotation').remove();
                            $('.row-add-quotation').show();
                            $('html, body').animate({scrollTop:($(".row-add-quotation").offset().top - 150)}, 500);
                            $('.row-add-quotation .card .card-header .q_num').html(data.q_number);
                            $('.row-add-quotation .card .card-header .q_date').html(data.q_date_th);
                            $('.row-add-quotation .card .card-body select[name=q_type]').val(data.q_type);
                            $.ajax({
                                url: '<?php echo $this->base_url('employee/list_customer_ajax') ?>',
                                dataType: 'json',
                            }).done(function(respond){
                                if (respond[0] == 'success') {
                                    let html = '<option value="">เลือกลูกค้า..</option>';
                                    $.each(respond[1],function(key,value){
                                        html += '<option value="'+value.id+'">'+value.cus_name+'</option>';
                                    });
                                    $('.form-add-quotation .list-customer').html(html);
                                    max_chosen($('.form-add-quotation .list-customer'));
                                    $('.row-add-quotation .card .card-body input[name=q_customer_name]').val('');
                                    $('.row-add-quotation .card .card-body input[name=add_customer]').prop('checked',false);
                                    $('.row-add-quotation .list-customer').closest('.form-group').show();
                                    $('.row-add-quotation input.input-customer-name').closest('.form-group').hide();
                                    $('.row-add-quotation input.input-customer-name').attr('name','');
                                    $('.row-add-quotation select.list-customer').attr('name','q_customer_id');
                                    $('.row-add-quotation .card .card-body select[name=q_customer_id]').val(data.q_customer_id);
                                    max_chosen($('.row-add-quotation .card .card-body select[name=q_customer_id]'),'update');
                                }
                            });

                            $('.row-add-quotation .card .card-body select[name=q_brand]').val(data.q_brand);
                            $('.row-add-quotation .card .card-body input[name=q_model]').val(data.q_model);
                            $('.row-add-quotation .card .card-body input[name=q_sn]').val(data.q_sn);
                            $('.row-add-quotation .card .card-body input[name=q_topic]').val(data.q_topic);
                            $('.row-add-quotation .card .card-body input[name=q_to]').val(data.q_to);
                            $('.row-add-quotation .card .card-body input[name=q_to_detail]').val(data.q_to_detail);
                            $('.row-add-quotation .card .card-body input[name=q_stock_number]').val(data.q_stock_number);
                            $('.row-add-quotation .card .card-body input[name=q_discount]').val(data.q_discount);
                            $('.row-add-quotation .card .card-body input[name=q_ro_number]').val(data.q_ro);
                            $('.row-add-quotation .card .card-body input[name=q_job_number]').val(data.q_job_number);
                            $('.row-add-quotation .card .card-body input[name=q_customer_department]').val(data.q_customer_department);
                            $('.row-add-quotation .card .card-body input[name=q_discount_type]').prop('checked',false);
                            let q_discount = data.q_discount;
                            if (q_discount.indexOf('%') > -1) {
                                q_discount = q_discount.split('%');
                                q_discount = q_discount[0];
                                data.q_discount = q_discount;
                                $('.row-add-quotation .card .card-body input[name=q_discount_type]').prop('checked',true);
                            }
                            $('.row-add-quotation .card .card-body input[name=q_discount]').val(data.q_discount);
                            let q_agent_service = data.q_agent_service;
                            q_agent_service = q_agent_service.split(' โทร.');
                            $.ajax({
                                url: '<?php echo $this->base_url('employee/list_service_name_ajax') ?>',
                                dataType: 'json',
                                success: function (result){
                                    if (result[0] == 'success') {
                                        let html = '<option value="">เลือกผู้แทนฝ่ายบริการ..</option>';
                                        let tel = '';
                                        var html_selected = '';
                                        let html_selected_value = '';
                                        $.each(result[1],function(key,service_value){
                                            if (service_value.tel != '') {
                                                tel = service_value.tel;
                                            }
                                            if (data.q_service_id == service_value.id) {
                                                html_selected_value = data.q_service_id+','+q_agent_service[0];
                                                html_selected = '<option tel="'+tel+'" value="'+data.q_service_id+','+q_agent_service[0]+'" selected>'+service_value.first_name+' '+service_value.last_name+' ('+service_value.division_th+')</option>';
                                            }else {
                                                html += '<option tel="'+tel+'" value="'+service_value.id+','+service_value.first_name+' '+service_value.last_name+'">'+service_value.first_name+' '+service_value.last_name+' ('+service_value.division_th+')</option>';
                                            }
                                        });
                                        $('.form-add-quotation .wrap-list-service .list-service-name').html(html);
                                        $('.form-add-quotation .wrap-list-service .list-service-name').append(html_selected);
                                        max_chosen($('.form-add-quotation .wrap-list-service .list-service-name'),'update');
                                    }
                                }
                            });
                            $('.row-add-quotation .card .card-body input[name=q_service_phone]').val(q_agent_service[1]);
                            let set_price = data.q_set_price_data;
                            if (set_price != '') {
                                set_price = set_price.split(':');
                            }else {
                                set_price[0] = '';
                                set_price[1] = '';
                            }
                            $('.row-add-quotation .card .card-body .set-price-day').val(set_price[0]);
                            $('.row-add-quotation .card .card-body .set-price-detail').val(set_price[1]);
                            let set_dalivery = data.q_set_delivery_data;
                            if (set_price != '') {
                                set_dalivery = set_dalivery.split(':');
                            }else {
                                set_dalivery[0] = '';
                                set_dalivery[1] = '';
                            }
                            $('.row-add-quotation .card .card-body .set-dalivery-day').val(set_dalivery[0]);
                            $('.row-add-quotation .card .card-body .set-dalivery-detail').val(set_dalivery[1]);
                            let set_warranty = data.q_set_warranty_data;
                            if (set_price != '') {
                                set_warranty = set_warranty.split(':');
                            }else {
                                set_warranty[0] = '';
                                set_warranty[1] = '';
                            }
                            $('.row-add-quotation .card .card-body .set-warranty-day').val(set_warranty[0]);
                            $('.row-add-quotation .card .card-body .set-warranty-detail').val(set_warranty[1]);
                            let html = '';
                            let product = data.product;
                            $('.row-add-quotation .card .card-body .table-q_product .list-q_product').each(function(key,value){
                                    $(this).remove();
                            });
                            let html_list_q_product = '<div class="list-q_product col-md-12 border rounded p-1 row m-0">';
                            html_list_q_product += '<div class="max-col-sm-12 col-md-7 wrap-list-product">';
                            html_list_q_product += '<div class="form-group bmd-form-group">';
                            html_list_q_product += '<select class="form-control form-control-chosen list-product" name="q_product[]" data-placeholder="ค้นหาสินค้า.."><option value="">ค้นหาสินค้า..</option></select>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="form-group bmd-form-group input-product" style="display:none">';
                            html_list_q_product += '<label class="bmd-label-floating"><strong>ชื่อสินค้า</strong></label>';
                            html_list_q_product += '<input type="text" class="form-control" name="q_product_name[]">';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="form-check row d-flex justify-content-center">';
                            html_list_q_product += '<div class="max-col-sm-2 col-md-1 manual-product-checkbox">';
                            html_list_q_product += '<div class="form-check">';
                            html_list_q_product += '<label class="form-check-label">';
                            html_list_q_product += '<input class="form-check-input manual-product" type="checkbox" value="">';
                            html_list_q_product += '<span class="form-check-sign">';
                            html_list_q_product += '<span class="check"></span>';
                            html_list_q_product += '</span>';
                            html_list_q_product += '</label>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="max-col-sm-8 col-md-7 text-left manual-product-text" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="col-sm-12 col-md-5 wrap-select-price">';
                            html_list_q_product += '<div class="form-group bmd-form-group select-price">';
                            html_list_q_product += '<select class="custom-select list-price" name="q_product_price[]">';
                            html_list_q_product += '<option value="">กรุณาเลือกสินค้าก่อน..</option>';
                            html_list_q_product += '</select>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="form-group bmd-form-group input-price" style="display:none">';
                            html_list_q_product += '<label class="bmd-label-floating"><strong>ราคา</strong></label>';
                            html_list_q_product += '<input type="number" class="form-control text-center" name="" min="0">';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="form-check row d-flex justify-content-center">';
                            html_list_q_product += '<div class="max-col-sm-2 col-md-2 manual-price-checkbox">';
                            html_list_q_product += '<div class="form-check">';
                            html_list_q_product += '<label class="form-check-label">';
                            html_list_q_product += '<input class="form-check-input manual-price" type="checkbox" value="">';
                            html_list_q_product += '<span class="form-check-sign">';
                            html_list_q_product += '<span class="check"></span>';
                            html_list_q_product += '</span>';
                            html_list_q_product += '</label>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="max-col-sm-7 col-md-7 text-left manual-price-text" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="col-sm-12 col-md-8 wrap-select-quanity row">';
                            html_list_q_product += '<div class="form-group bmd-form-group max-col-sm-12 col-md-6">';
                            html_list_q_product += '<label class="bmd-label-floating"><strong>จำนวน</strong></label>';
                            html_list_q_product += '<input type="number" class="form-control text-center q_quanity" name="q_quanity[]" min="0">';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="form-group bmd-form-group max-col-sm-12 col-md-6">';
                            html_list_q_product += '<label class="bmd-label-floating"><strong>ส่วนลด</strong></label>';
                            html_list_q_product += '<input type="number" class="form-control text-center q-discount" name="p_discount[]" min="0">';
                            html_list_q_product += '<div class="row">';
                            html_list_q_product += '<div class="max-col-sm-2 col-md-2 discount-type-checkbox">';
                            html_list_q_product += '<div class="form-check">';
                            html_list_q_product += '<label class="form-check-label">';
                            html_list_q_product += '<input class="form-check-input discount-type" type="checkbox" name="p_discount_type[]" value="percent">';
                            html_list_q_product += '<span class="form-check-sign">';
                            html_list_q_product += '<span class="check"></span>';
                            html_list_q_product += '</span>';
                            html_list_q_product += '</label>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="max-col-sm-7 col-md-7 text-left discount-type-text" style="padding-top: 8px;padding-left: 1px;">เปอร์เซ็นต์</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="col-sm-12 col-md-4 wrap-quanity-type">';
                            html_list_q_product += '<div class="form-group bmd-form-group">';
                            html_list_q_product += '<select class="custom-select q_quanity_type text-center" name="q_quanity_type[]">';
                            html_list_q_product += '<option value="ชิ้น">ชิ้น</option>';
                            html_list_q_product += '<option value="อัน">อัน</option>';
                            html_list_q_product += '<option value="ลูก">ลูก</option>';
                            html_list_q_product += '<option value="ชุด">ชุด</option>';
                            html_list_q_product += '<option value="เส้น">เส้น</option>';
                            html_list_q_product += '<option value="คัน">คัน</option>';
                            html_list_q_product += '<option value="หลอด">หลอด</option>';
                            html_list_q_product += '<option value="ซอง">ซอง</option>';
                            html_list_q_product += '<option value="กล่อง">กล่อง</option>';
                            html_list_q_product += '<option value="พับ">พับ</option>';
                            html_list_q_product += '<option value="ม้วน">ม้วน</option>';
                            html_list_q_product += '</select>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="form-group bmd-form-group input-quanity-type" style="display:none">';
                            html_list_q_product += '<label class="bmd-label-floating text-left"><strong>ประเภท</strong></label>';
                            html_list_q_product += '<input type="text" class="form-control" name="">';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="form-check row d-flex justify-content-center">';
                            html_list_q_product += '<div class="max-col-sm-1 col-md-1 manual-quanity-type-checkbox">';
                            html_list_q_product += '<div class="form-check">';
                            html_list_q_product += '<label class="form-check-label">';
                            html_list_q_product += '<input class="form-check-input manual-quanity-type" type="checkbox">';
                            html_list_q_product += '<span class="form-check-sign">';
                            html_list_q_product += '<span class="check"></span>';
                            html_list_q_product += '</span>';
                            html_list_q_product += '</label>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '<div class="max-col-sm-7 col-md-7 text-left manual-quanity-type-text" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>';
                            html_list_q_product += '</div>';
                            html_list_q_product += '</div><div class="col-md-12 text-center wrap-btn-delete-product"></div>';
                            html_list_q_product += '</div>';
                            $('.row-add-quotation .card .card-body .wrap-list-q_product').html('');
                            $.each(data.product,function(key,value){
                                $('.row-add-quotation .card .card-body .wrap-list-q_product').append(html_list_q_product);
                                let btn = '<button type="button" class="btn btn-danger d-block btn-delete-product" style="float:unset;margin:auto">ลบ</button>';
                                $('.row-add-quotation .card .card-body').find('.list-q_product:last-child button').remove();
                                $('.row-add-quotation .card .card-body').find('.list-q_product:last-child').append(btn);
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
                                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product').eq(key).find('select.list-price').html(html);
                                        }
                                    }
                                });
                                let html = '<option value="'+value.p_id+'" selected>'+value.p_name+'</option>';
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select.list-product').html(html);
                                list_product($('.row-add-quotation .card .card-body .wrap-list-q_product .list-q_product:last-child select.list-product'));
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child select.list-price').closest('.form-group').hide();
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child select.list-price').attr('name','');
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .input-price').closest('.form-group').show();
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .input-price input').attr('name','q_product_price[]');
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .input-price input').val(value.p_price_data);
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child input.q_quanity').val(value.p_unit);
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child select.q_quanity_type').val(value.p_qty);
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child input.manual-price').prop('checked',true);
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child').find('.chosen-container:last-child').remove();
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child input.q-discount').val(value.p_discount);
                                if (value.p_discount_type == 'percent') {
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child input.discount-type').prop('checked',true);
                                }
                                if (value.product_name != '' && value.product_name != null ) {
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child').find('.manual-product').prop('checked',true);
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child').find('.input-product').show();
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child').find('.input-product input').val(value.product_name);
                                }
                            });
                            //get note
                            if (data.q_note != '') {
                                if ($('.row-add-quotation .card .card-body .wrap-list-note').prop('display') != true) {
                                    $('.row-add-quotation .card .card-body input.modal-note').prop('checked',true);
                                    $('.row-add-quotation .card .card-body .wrap-list-note').show();                                    }
                                let note_html = '';
                                let q_note = data.q_note;
                                $.each(data.q_note,function(key_note,value_note){
                                    if (q_note.length != (key_note+1)) {
                                        note_html += '<div class="col-md-12 row list-note">';
                                        note_html += '<div class="col-md-1 number-note" style="padding-top: 2%;padding-left: 4%;">'+(key_note+1)+'</div>';
                                        note_html += '<div class="col-md-10">';
                                        note_html += '<div class="form-group bmd-form-group">';
                                        note_html += '<textarea class="form-control" name="q_note_list[]" rows="2">'+value_note+'</textarea>';
                                        note_html += '</div>';
                                        note_html += '</div>';
                                        note_html += '<div class="col-md-1">';
                                        note_html += '<button type="button" class="btn btn-danger btn-delete-note">ลบ</button>';
                                        note_html += '</div>';
                                        note_html += '</div>';
                                    }
                                });
                                $('.row-add-quotation .card .card-body').find('.wrap-list-note').html(note_html);
                            }
                            $('.row-add-quotation .card .card-body .table-q_product .list-q_product:first-child .btn-delete-product').remove();
                            $('.row-add-quotation .card .card-body select[name=q_service_name]').val(data.q_service_id);
                            $('.form-add-quotation .bmd-form-group').addClass('is-filled');
                            $('.loading-screen').hide();
                        }
                    });
                },100);
                break;
                case 'check':
                    let id = $(this).closest('tr').attr('q_id');
                    $.ajax({
                        url: '<?php echo $this->base_url('Quotation/get_quotation') ?>',
                        method: 'post',
                        data: {q_id:id},
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
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
                                html += '<div class="row max-col-sm-12 col-md-12 p-0 m-0">';
                                /*-----------------------------------------------------------------------*/
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
                                let product_num = value.product;
                                product_num = product_num.length;
                                $.each(value.product,function(key,p_value){
                                    html += '<tr>';
                                    html += '<td class="text-center">'+(key+1)+'</td>';
                                    html += '<td class="text-center">'+p_value.p_unit+' '+p_value.p_qty+'</td>';
                                    html += '<td>'+p_value.p_name+'</td>';
                                    html += '<td class="text-right">'+p_value.p_price+'</td>';
                                    html += '<td class="text-right">'+p_value.p_price_sum+'</td>';
                                    html += '</tr>';
                                });
                                html += '<tr>';
                                html += '<td colspan=""></td>';
                                html += '<td colspan=""></td>';
                                html += '<td colspan=""><b>เลขครุภัณฑ์ '+value.q_stock_number+'</b></td>';
                                html += '<td colspan=""></td>';
                                html += '<td colspan=""></td>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<td class="text-center">R/O#</td>';
                                html += '<td class="text-center">'+value.q_ro+'</td>';
                                html += '<td>แผนก : '+value.q_customer_department+'</td>';
                                html += '<td>ราคาสินค้า</td>';
                                html += '<td class="text-right">'+value.total_price+'</td>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<td class="text-center" colspan="2">ผู้แทนฝ่ายบริการ</td>';
                                html += '<td>'+value.q_agent_service+'</td>';
                                html += '<td colspan="">ส่วนลด</td>';
                                html += '<td class="text-right">'+value.q_discount+'</td>';
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
                                /*------------------------------------------------------------------------------------------*/
                                if (value.q_note != '') {
                                    html += '<div class="row">';
                                    html += '<div class="col-md-12"><b>หมายเหตุ</b></div>';
                                    let q_note = value.q_note;
                                    // q_note = q_note.split('|');
                                    $.each(value.q_note,function(key_note,value_note){
                                        if (q_note.length != (key_note+1)) {
                                            html += '<div class="col-md-12 row">';
                                            html += '<div class="col-md-1 text-right pr-0">'+(key_note+1)+'.</div>';
                                            html += '<div class="col-md-9">'+value_note+'</div>';
                                            html += '</div>';
                                        }
                                    });
                                    html += '</div>';
                                }
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
                                html += '<div class="row max-col-sm-12 col-md-12 wrap-form-print p-0 m-0" style="display:none">';
                                html += '<div class="row max-col-sm-12 col-md-5 pr-0"><b>ตั้งค่าการพิมพ์</b>';
                                html += '<div class="row max-col-sm-12 col-md-12 pr-0">';
                                html += '<div class="max-col-sm-2 col-md-2">';
                                html += '<div class="form-check">';
                                html += '<label class="form-check-label">';
                                html += '<input class="form-check-input signature" type="checkbox" name="brand_xovic" value="brand" checked>';
                                html += '<span class="form-check-sign">';
                                html += '<span class="check"></span>';
                                html += '</span>';
                                html += '</label>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="max-col-sm-7 col-md-7 text-center pr-0" style="padding-top: 8px;padding-left: 1px;">ตราประทับ</div>';
                                html += '</div>';
                                html += '<div class="row max-col-sm-12 col-md-12 pr-0">';
                                html += '<div class="max-col-sm-2 col-md-2">';
                                html += '<div class="form-check">';
                                html += '<label class="form-check-label">';
                                html += '<input class="form-check-input signature" type="checkbox" name="signature" value="supervisor" checked>';
                                html += '<span class="form-check-sign">';
                                html += '<span class="check"></span>';
                                html += '</span>';
                                html += '</label>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="max-col-sm-7 col-md-7 text-center pr-0" style="padding-top: 8px;padding-left: 1px;">ลายเซ็นต์หัวหน้าเขต</div>';
                                html += '</div>';
                                html += '<div class="row max-col-sm-12 col-md-12 pr-0">';
                                html += '<div class="max-col-sm-2 col-md-2">';
                                html += '<div class="form-check">';
                                html += '<label class="form-check-label">';
                                html += '<input class="form-check-input signature" type="checkbox" name="signature" value="service">';
                                html += '<span class="form-check-sign">';
                                html += '<span class="check"></span>';
                                html += '</span>';
                                html += '</label>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="max-col-sm-7 col-md-7 text-center pr-0" style="padding-top: 8px;padding-left: 1px;">ลายเซ็นต์ตัวแทนฝ่ายบริการ</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12" style="padding-top:15px;display:none">';
                                html += '<div class="form-group bmd-form-group dropdown is-filled">';
                                html += '<label class="bmd-label-floating"><strong>สถานะใต้ชื่อ</strong></label>';
                                html += '<input type="text" class="form-control" name="q_bidder" value="ผู้เสนอราคา">';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row  max-col-sm-12 col-md-12">';
                                html += '<button class="btn btn-danger btn-option" option-type="cancel-print"><i class="material-icons">close</i> ยกเลิก</button>';
                                html += '<button class="btn btn-success btn-option" option-type="confirm-print"><i class="material-icons">print</i> ตกลง</button>';
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
                                html += '<textarea class="form-control" name="q_remark" rows="5"></textarea>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="col-md-2 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<div class="form-group bmd-form-group">';
                                html += '<button class="btn btn-success btn-save-remark"><i class="material-icons">done_outline</i> ยืนยัน</button>';
                                html += '<button class="btn btn-danger btn-canel-save-remark"><i class="material-icons">close</i> ยกเลิก</button>';
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
                                                btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            case 'service':
                                                // btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                break;
                                            case 'supervisor':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="approve"><i class="material-icons">done_outline</i> อนุมัติ</button>';
                                                break;
                                            case 'admin sale manager':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="approve"><i class="material-icons">done_outline</i> อนุมัติ</button>';
                                                break;
                                            case 'manager':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
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
                                            case 'admin sale manager':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                break;
                                            case 'manager':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
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
                                                btn_status = 'btn-danger';
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
                                                btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            case 'admin sale manager':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                switch (value.q_status_customer) {
                                                    case 'created':
                                                        if (value.q_remark_customer != '') {
                                                            check_remark_customer = true;
                                                        }
                                                        btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                        btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                        btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                        btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="remark_customer"><i class="material-icons">edit</i> แจ้งหมายเหตุลูกค้า</button>';
                                                        break;
                                                    case 'approved':
                                                        if (value.q_po != '') {
                                                            check_btn_edit_po = true;
                                                        }
                                                        break;
                                                    default:
                                                }
                                                break;
                                            case 'manager':
                                                if (value.q_status_customer != 'reject') {
                                                    btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                    btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                    if (value.q_status_customer != 'created') {
                                                        btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                    }
                                                }
                                                switch (value.q_status_customer) {
                                                    case 'created':
                                                        if (value.q_remark_customer != '') {
                                                            check_remark_customer = true;
                                                        }
                                                        btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                        btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                        btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="remark_customer"><i class="material-icons">edit</i> แจ้งหมายเหตุลูกค้า</button>';
                                                        btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                        break;
                                                    case 'approved':
                                                        if (value.q_po != '') {
                                                            check_btn_edit_po = true;
                                                        }
                                                        break;
                                                    default:
                                                }
                                                break;
                                            case 'service': //service eng.
                                                switch (value.q_status_customer) {
                                                    case 'created':
                                                        if (value.q_remark_customer != '') {
                                                            check_remark_customer = true;
                                                        }
                                                        btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="remark_customer"><i class="material-icons">edit</i> แจ้งหมายเหตุลูกค้า</button>';
                                                        break;
                                                    case 'approved':
                                                        if (value.q_po != '') {
                                                            check_btn_edit_po = true;
                                                        }
                                                        break;
                                                    case 'reject':
                                                        if (value.q_remark_customer != '') {
                                                            check_remark_customer = true;
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
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="remark_customer"><i class="material-icons">edit</i> แจ้งหมายเหตุลูกค้า</button>';
                                                btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            default:
                                        }
                                        break;
                                    default:
                                }

                                if (value.q_status_customer != '') {
                                    switch (value.q_status_customer) {
                                        case 'approved':
                                            btn_status = 'btn-success';
                                            btn_text = 'ลูกค้าอนุมัติ';
                                            break;
                                        case 'reject':
                                            btn_status = 'btn-danger';
                                            btn_text = 'ลูกค้ายกเลิก';
                                            break;
                                        default:
                                    }
                                }
                                if (value.q_remark_customer != '') {
                                    check_remark_customer = true;
                                }
                                if (value.q_remark != '') {
                                    check_remark = true;
                                }
                                if (value.q_po != '') {
                                    check_btn_edit_po = true;
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
                                    option_click(value);
                                    check_call_function_option = false;
                                // }
                            }
                        }
                    });
                    $('.modal-preview-quotation').modal('show');
                    // window.location.href = "<?php echo $this->base_url('page/quotation/print/') ?>"+id;
                    // break;
                case 'admin-edit':

                    break;
                case 'approved':

                    break;
                default:

            }
        });

        function option_click(data){
            $('.modal-preview-quotation').on('click','.btn-option[option-type=edit],.btn-option[option-type=duplicate]',function(){
                $('.loading-screen').show();
            });
            $('.modal-preview-quotation').on('click','.btn-option',function(){
                var option_type = $(this).attr('option-type');
                $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').hide();
                if (option_type != 'admin-edit') {
                    $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark').hide();
                }
                $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').hide();

                switch (option_type) {
                    case 'edit': //modal edit
                        setTimeout(function(type = option_type){
                            $('.modal-preview-quotation').modal('hide');
                            $('.row-add-quotation .header-edit-quotation').show();
                            $('.row-add-quotation .header-add-quotation').hide();
                            $('.row-add-quotation .card .card-body input[name=q_id]').val(data.q_id);
                            $('.row-add-quotation .card .card-body input[name=type]').val('edit');
                            $('.row-add-quotation .card .card-header').removeClass('card-header-info');
                            $('.row-add-quotation .card .card-header').addClass('card-header-warning');
                            $('.row-add-quotation .card .card-header h4.card-title').html('แก้ไขใบเสนอราคา');
                            $('.row-add-quotation .card .card-footer .btn-add-quotation').hide();
                            $('.row-add-quotation .card .card-footer .btn-edit-quotation').remove();
                            $('.row-add-quotation .card .card-footer').append('<a class="btn btn-success btn-edit-quotation" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>');
                            $('.row-add-quotation').show();
                            $('html, body').animate({scrollTop:($(".row-add-quotation").offset().top - 150)}, 500);
                            $('.row-add-quotation .card .card-header .q_num').html(data.q_number);
                            $('.row-add-quotation .card .card-header .q_date').html(data.q_date_th);
                            $('.row-add-quotation .card .card-body select[name=q_type]').val(data.q_type);
                            $('.row-add-quotation .card .card-body select[name=q_customer_id]').val(data.q_customer_id);
                            max_chosen($('.row-add-quotation .card .card-body select[name=q_customer_id]'),'update');
                            $('.row-add-quotation .card .card-body input[name=q_topic]').val(data.q_topic);
                            $('.row-add-quotation .card .card-body input[name=q_to]').val(data.q_to);
                            $('.row-add-quotation .card .card-body input[name=q_to_detail]').val(data.q_to_detail);
                            $('.row-add-quotation .card .card-body input[name=q_stock_number]').val(data.q_stock_number);
                            $('.row-add-quotation .card .card-body input[name=q_discount_type]').prop('checked',false);
                            let q_discount = data.q_discount;
                            if (q_discount.indexOf('%') > -1) {
                                q_discount = q_discount.split('%');
                                q_discount = q_discount[0];
                                data.q_discount = q_discount;
                                $('.row-add-quotation .card .card-body input[name=q_discount_type]').prop('checked',true);
                            }
                            $('.row-add-quotation .card .card-body input[name=q_discount]').val(data.q_discount);
                            $('.row-add-quotation .card .card-body input[name=q_ro_number]').val(data.q_ro);
                            $('.row-add-quotation .card .card-body input[name=q_job_number]').val(data.q_job_number);
                            $('.row-add-quotation .card .card-body input[name=q_customer_department]').val(data.q_customer_department);
                            let q_agent_service = data.q_agent_service;

                            q_agent_service = q_agent_service.split(' โทร.');
                            $.ajax({
                                url: '<?php echo $this->base_url('employee/list_service_name_ajax') ?>',
                                dataType: 'json',
                                success: function (result){
                                    if (result[0] == 'success') {
                                        let html = '<option value="">เลือกผู้แทนฝ่ายบริการ..</option>';
                                        let tel = '';
                                        var html_selected = '';
                                        let html_selected_value = '';
                                        $.each(result[1],function(key,service_value){
                                            if (service_value.tel != '') {
                                                tel = service_value.tel;
                                            }
                                            if (data.q_service_id == service_value.id) {
                                                html_selected_value = data.q_service_id+','+q_agent_service[0];
                                                html_selected = '<option tel="'+tel+'" value="'+data.q_service_id+','+q_agent_service[0]+'" selected>'+service_value.first_name+' '+service_value.last_name+' ('+service_value.division_th+')</option>';
                                            }else {
                                                html += '<option tel="'+tel+'" value="'+service_value.id+','+service_value.first_name+' '+service_value.last_name+'">'+service_value.first_name+' '+service_value.last_name+' ('+service_value.division_th+')</option>';
                                            }
                                        });
                                        $('.form-add-quotation .wrap-list-service .list-service-name').html(html);
                                        // $('.form-add-quotation .wrap-list-service .list-service-name').val(html_selected_value);
                                        $('.form-add-quotation .wrap-list-service .list-service-name').append(html_selected);
                                        max_chosen($('.form-add-quotation .wrap-list-service .list-service-name'),'update');
                                        // $('.row-add-quotation .card .card-body select[name=q_service_name]').trigger("chosen:updated");
                                    }
                                }
                            });


                            //get note
                            if (data.q_note != '') {
                                if ($('.row-add-quotation .card .card-body .wrap-list-note').prop('display') != true) {
                                    $('.row-add-quotation .card .card-body input.modal-note').prop('checked',true);
                                    $('.row-add-quotation .card .card-body .wrap-list-note').show();
                                }
                                let note_html = '';
                                let q_note = data.q_note;
                                $.each(data.q_note,function(key_note,value_note){
                                    if (q_note.length != (key_note+1)) {
                                        note_html += '<div class="col-md-12 row list-note">';
                                        note_html += '<div class="col-md-1 number-note" style="padding-top: 2%;padding-left: 4%;">'+(key_note+1)+'</div>';
                                        note_html += '<div class="col-md-10">';
                                        note_html += '<div class="form-group bmd-form-group">';
                                        note_html += '<textarea class="form-control" name="q_note_list[]" rows="2">'+value_note+'</textarea>';
                                        note_html += '</div>';
                                        note_html += '</div>';
                                        note_html += '<div class="col-md-1">';
                                        note_html += '<button type="button" class="btn btn-danger btn-delete-note">ลบ</button>';
                                        note_html += '</div>';
                                        note_html += '</div>';
                                    }
                                });
                                $('.row-add-quotation .card .card-body').find('.wrap-list-note').html(note_html);
                            }
                            // $('.row-add-quotation .card .card-body select[name=q_service_name]') .val(data.q_service_id+','+q_agent_service[0]);
                            // let get_department = '';
                            // $('.row-add-quotation .card .card-body select[name=q_service_name] option').each(function(key,value){
                            //     if($(this).attr('value') == data.q_service_id+','+q_agent_service[0]){
                            //         $(this).attr('selected','selected');
                            //         get_department = $(this).html();
                            //         // $(this).remove();
                            //     }
                            //     // console.log($(this).attr('value'),data.q_service_id+','+q_agent_service[0]);
                            // });
                            // $('.row-add-quotation .card .card-body select[name=q_service_name]').append("<option selected value='"+data.q_service_id+','+q_agent_service[0]+"'>"+get_department+"</option>");
                            // console.log("<option selected value='"+data.q_service_id+','+q_agent_service[0]+"'>"+get_department+"</option>");
                            $('.row-add-quotation .card .card-body input[name=q_service_phone]').val(q_agent_service[1]);
                            let set_price = data.q_set_price_data;
                            set_price = set_price.split(':');
                            $('.row-add-quotation .card .card-body .set-price-day').val(set_price[0]);
                            $('.row-add-quotation .card .card-body .set-price-detail').val(set_price[1]);
                            let set_dalivery = data.q_set_delivery_data;
                            set_dalivery = set_dalivery.split(':');
                            $('.row-add-quotation .card .card-body .set-dalivery-day').val(set_dalivery[0]);
                            $('.row-add-quotation .card .card-body .set-dalivery-detail').val(set_dalivery[1]);
                            let set_warranty = data.q_set_warranty_data;
                            set_warranty = set_warranty.split(':');
                            $('.row-add-quotation .card .card-body .set-warranty-day').val(set_warranty[0]);
                            $('.row-add-quotation .card .card-body .set-warranty-detail').val(set_warranty[1]);
                            let html = '';
                            let product = data.product;
                            // console.log(product);
                            // $('.row-add-quotation .card .card-body .table-q_product .list-q_product').remove();
                            // let clone_q_product_first = $('.row-add-quotation .card .card-body .table-q_product .list-q_product:first-child').clone();
                            $('.row-add-quotation .card .card-body .table-q_product .list-q_product').each(function(key,value){
                                // console.log($(this));
                                    // $(this).remove();
                            });
                            // let html_list_q_product = '<tr class="row list-q_product">';
                            let html_list_q_product = '<div class="list-q_product col-md-12 border rounded p-1 row m-0">';
                                html_list_q_product += '<div class="max-col-sm-12 col-md-7 wrap-list-product">';
                                    html_list_q_product += '<div class="form-group bmd-form-group">';
                                        html_list_q_product += '<select class="form-control form-control-chosen list-product" name="q_product[]" data-placeholder="ค้นหาสินค้า.."><option value="">ค้นหาสินค้า..</option></select>';
                                    html_list_q_product += '</div>';
                                    html_list_q_product += '<div class="form-group bmd-form-group input-product" style="display:none">';
                                        html_list_q_product += '<label class="bmd-label-floating"><strong>ชื่อสินค้า</strong></label>';
                                        html_list_q_product += '<input type="text" class="form-control" name="q_product_name[]">';
                                    html_list_q_product += '</div>';
                                    html_list_q_product += '<div class="form-check row d-flex justify-content-center">';
                                        html_list_q_product += '<div class="max-col-sm-2 col-md-1 manual-product-checkbox">';
                                            html_list_q_product += '<div class="form-check">';
                                                html_list_q_product += '<label class="form-check-label">';
                                                    html_list_q_product += '<input class="form-check-input manual-product" type="checkbox" value="">';
                                                    html_list_q_product += '<span class="form-check-sign">';
                                                        html_list_q_product += '<span class="check"></span>';
                                                    html_list_q_product += '</span>';
                                                html_list_q_product += '</label>';
                                            html_list_q_product += '</div>';
                                        html_list_q_product += '</div>';
                                        html_list_q_product += '<div class="max-col-sm-8 col-md-7 text-left manual-product-text" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>';
                                    html_list_q_product += '</div>';
                                html_list_q_product += '</div>';
                                html_list_q_product += '<div class="col-sm-12 col-md-5 wrap-select-price">';
                                    html_list_q_product += '<div class="form-group bmd-form-group select-price">';
                                        html_list_q_product += '<select class="custom-select list-price" name="q_product_price[]">';
                                            html_list_q_product += '<option value="">กรุณาเลือกสินค้าก่อน..</option>';
                                        html_list_q_product += '</select>';
                                    html_list_q_product += '</div>';
                                    html_list_q_product += '<div class="form-group bmd-form-group input-price" style="display:none">';
                                        html_list_q_product += '<label class="bmd-label-floating"><strong>ราคา</strong></label>';
                                        html_list_q_product += '<input type="number" class="form-control text-center" name="" min="0">';
                                    html_list_q_product += '</div>';
                                    html_list_q_product += '<div class="form-check row d-flex justify-content-center">';
                                        html_list_q_product += '<div class="max-col-sm-2 col-md-2 manual-price-checkbox">';
                                            html_list_q_product += '<div class="form-check">';
                                                html_list_q_product += '<label class="form-check-label">';
                                                    html_list_q_product += '<input class="form-check-input manual-price" type="checkbox" value="">';
                                                    html_list_q_product += '<span class="form-check-sign">';
                                                        html_list_q_product += '<span class="check"></span>';
                                                    html_list_q_product += '</span>';
                                                html_list_q_product += '</label>';
                                            html_list_q_product += '</div>';
                                        html_list_q_product += '</div>';
                                        html_list_q_product += '<div class="max-col-sm-7 col-md-7 text-left manual-price-text" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>';
                                    html_list_q_product += '</div>';
                                html_list_q_product += '</div>';
                                html_list_q_product += '<div class="col-sm-12 col-md-8 wrap-select-quanity row">';
                                    html_list_q_product += '<div class="form-group bmd-form-group max-col-sm-12 col-md-6">';
                                        html_list_q_product += '<label class="bmd-label-floating"><strong>จำนวน</strong></label>';
                                        html_list_q_product += '<input type="number" class="form-control text-center q_quanity" name="q_quanity[]" min="0">';
                                    html_list_q_product += '</div>';
                                    html_list_q_product += '<div class="form-group bmd-form-group max-col-sm-12 col-md-6">';
                                        html_list_q_product += '<label class="bmd-label-floating"><strong>ส่วนลด</strong></label>';
                                        html_list_q_product += '<input type="number" class="form-control text-center q-discount" name="p_discount[]" min="0">';
                                        html_list_q_product += '<div class="row">';
                                            html_list_q_product += '<div class="max-col-sm-2 col-md-2 discount-type-checkbox">';
                                                html_list_q_product += '<div class="form-check">';
                                                    html_list_q_product += '<label class="form-check-label">';
                                                        html_list_q_product += '<input class="form-check-input discount-type" type="checkbox" name="p_discount_type[]" value="percent">';
                                                        html_list_q_product += '<span class="form-check-sign">';
                                                            html_list_q_product += '<span class="check"></span>';
                                                        html_list_q_product += '</span>';
                                                    html_list_q_product += '</label>';
                                                html_list_q_product += '</div>';
                                            html_list_q_product += '</div>';
                                            html_list_q_product += '<div class="max-col-sm-7 col-md-7 text-left discount-type-text" style="padding-top: 8px;padding-left: 1px;">เปอร์เซ็นต์</div>';
                                        html_list_q_product += '</div>';
                                    html_list_q_product += '</div>';
                                html_list_q_product += '</div>';
                                html_list_q_product += '<div class="col-sm-12 col-md-4 wrap-quanity-type">';
                                    html_list_q_product += '<div class="form-group bmd-form-group">';
                                        html_list_q_product += '<select class="custom-select q_quanity_type text-center" name="q_quanity_type[]">';
                                            html_list_q_product += '<option value="ชิ้น">ชิ้น</option>';
                                            html_list_q_product += '<option value="อัน">อัน</option>';
                                            html_list_q_product += '<option value="ลูก">ลูก</option>';
                                            html_list_q_product += '<option value="ชุด">ชุด</option>';
                                            html_list_q_product += '<option value="เส้น">เส้น</option>';
                                            html_list_q_product += '<option value="คัน">คัน</option>';
                                            html_list_q_product += '<option value="หลอด">หลอด</option>';
                                            html_list_q_product += '<option value="ซอง">ซอง</option>';
                                            html_list_q_product += '<option value="กล่อง">กล่อง</option>';
                                            html_list_q_product += '<option value="พับ">พับ</option>';
                                            html_list_q_product += '<option value="ม้วน">ม้วน</option>';
                                        html_list_q_product += '</select>';
                                    html_list_q_product += '</div>';
                                    html_list_q_product += '<div class="form-group bmd-form-group input-quanity-type" style="display:none">';
                                        html_list_q_product += '<label class="bmd-label-floating text-left"><strong>ประเภท</strong></label>';
                                        html_list_q_product += '<input type="text" class="form-control" name="">';
                                    html_list_q_product += '</div>';
                                    html_list_q_product += '<div class="form-check row d-flex justify-content-center">';
                                        html_list_q_product += '<div class="max-col-sm-1 col-md-1 manual-quanity-type-checkbox">';
                                            html_list_q_product += '<div class="form-check">';
                                                html_list_q_product += '<label class="form-check-label">';
                                                    html_list_q_product += '<input class="form-check-input manual-quanity-type" type="checkbox">';
                                                    html_list_q_product += '<span class="form-check-sign">';
                                                        html_list_q_product += '<span class="check"></span>';
                                                    html_list_q_product += '</span>';
                                                html_list_q_product += '</label>';
                                            html_list_q_product += '</div>';
                                        html_list_q_product += '</div>';
                                        html_list_q_product += '<div class="max-col-sm-7 col-md-7 text-left manual-quanity-type-text" style="padding-top: 4px;padding-left: 1px;">กรอกเอง</div>';
                                    html_list_q_product += '</div>';
                                html_list_q_product += '</div>';
                            html_list_q_product += '</div>';
                            $('.row-add-quotation .card .card-body .wrap-list-q_product').html('');
                            $.each(data.product,function(key,value){
                                // let clone_q_product = $('.row-add-quotation .card .card-body .table-q_product .list-q_product:last-child').clone();
                                // $('.row-add-quotation .card .card-body .wrap-list-q_product').append(clone_q_product);
                                $('.row-add-quotation .card .card-body .wrap-list-q_product').append(html_list_q_product);
                                list_product($('.row-add-quotation .card .card-body .wrap-list-q_product .list-q_product:last-child select.list-product'));

                                // $('.row-add-quotation .card .card-body .table-q_product tbody').append(clone_q_product);
                                // $('.row-add-quotation .card .card-body .table-q_product .list-q_product').eq(key).val(value.p_id);
                                let number_order = parseInt($('.row-add-quotation .card .card-body .table-q_product .list-q_product:last-child .number-order span').html((key+1)));
                                let btn = '<button type="button" class="btn btn-danger d-block btn-delete-product" style="float:unset;margin:auto">ลบ</button>';
                                $('.row-add-quotation .card .card-body').find('.list-q_product:last-child button').remove();
                                $('.row-add-quotation .card .card-body').find('.list-q_product:last-child').append(btn);
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
                                            // console.log($('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product').eq(key).find('select.list-price'));
                                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product').eq(key).find('select.list-price').html(html);
                                        }
                                    }
                                });
                                let html = '<option value="'+value.p_id+'" selected>'+value.p_name+'</option>';
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select.list-product').html(html);
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select.list-product').val(value.p_id);
                                max_chosen($('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select.list-product'),'update');
                                // $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select.list-product').val(value.p_id);
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child select.list-price').closest('.form-group').hide();
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child select.list-price').attr('name','');
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .input-price').closest('.form-group').show();
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .input-price input').attr('name','q_product_price[]');
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .input-price input').val(value.p_price_data);
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child input.q_quanity').val(value.p_unit);
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child input.q-discount').val(value.p_discount);
                                if (value.p_discount_type == 'percent') {
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child input.discount-type').prop('checked',true);
                                }
                                if (value.product_name != '' && value.product_name != null ) {
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child').find('.manual-product').prop('checked',true);
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child').find('.input-product').show();
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child').find('.input-product input').val(value.product_name);
                                }
                                let p_qty = value.p_qty
                                let check_p_qty = '';
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child select.q_quanity_type option').each(function(key,value){
                                    if ($(this).attr('value') == p_qty) {
                                        check_p_qty = '1';
                                    }
                                });
                                if (check_p_qty != '') {
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child select.q_quanity_type').val(value.p_qty);
                                }else {
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .q_quanity_type').closest('.form-group').hide();
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .input-quanity-type').show();
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .input-quanity-type input').val(value.p_qty);
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .input-quanity-type input').prop('name','q_quanity_type[]');
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child select.q_quanity_type').prop('name','');
                                    $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child input.manual-quanity-type').prop('checked',true);
                                }
                                $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child input.manual-price').prop('checked',true);
                                // $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select').chosen();
                                // $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child').find('.chosen-container:last-child').remove();
                            });
                            // $('.row-add-quotation .card .card-body .table-q_product .list-q_product:first-child').remove();
                            // max_chosen($('.row-add-quotation .card .card-body .table-q_product .list-q_product:first-child select.list-product'));
                            // $('.form-add-quotation .table-q_product tbody').html(html);
                            // $('.row-add-quotation .card .card-body .table-q_product .list-q_product .wrap-list-product .list-product').val(product[0].p_id);
                            // $('.row-add-quotation .card .card-body select').trigger("chosen:updated");
                            // max_chosen($('.row-add-quotation .card .card-body select.list-product'),'update');
                            // $('.row-add-quotation .card .card-body .table-q_product .list-q_product:first-child').remove();
                            $('.row-add-quotation .card .card-body .table-q_product .list-q_product:first-child .btn-delete-product').remove();
                            $('.form-add-quotation .bmd-form-group').addClass('is-filled');
                            // list_product();
                            $('.btn-edit-quotation').click(function(){
                                $('.loading-screen').show();
                            });
                            $('.btn-edit-quotation').click(function(){
                                setTimeout(function(){
                                    var data = $('.form-add-quotation').serialize();
                                    if (validate()) {
                                        $.ajax({
                                            url: '<?php echo $this->base_url('Quotation/update') ?>',
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
                                                    $('.row-add-quotation').hide();
                                                    list_quotation();
                                                }else if(data[0] == 'updated'){
                                                    Swal.fire({
                                                        type: 'error',
                                                        title: 'ไม่สามารถแก้ไขใบเสนอราคานี้ได้',
                                                        text: 'เนื่องจากมีการแก้ไขไปแล้วก่อนหน้า',
                                                        confirmButtonText: 'ยืนยัน'
                                                    });
                                                    $('.loading-screen').hide();
                                                    $('.row-add-quotation').hide();
                                                    list_quotation();
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
                        let id = data.q_id;
                        Swal.fire({
                            title: 'คุณต้องการอนุมัติใบเสนอราคานี้หรือไม่?',
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
                                    data: {type:option_type,q_id:id},
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
                                            $('.modal-preview-quotation').find('.modal-footer').find('button').remove();
                                            $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status').removeClass('btn-info');
                                            $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status').addClass('btn-success');
                                            $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status h4').html('สถานะ : หัวหน้าอนุมัติ');
                                            list_quotation();
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
                        let q_id = data.q_id;
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').show(500);
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').attr('type','customer_approve');

                        break;
                    case 'customer_reject':
                        let q_id_1 = data.q_id;
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').show(500);
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer label b').html('หมายเหตุ');
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').attr('type','customer_reject');

                        break;
                    case 'print':
                        let q_id_encode = $('.modal-preview-quotation .wrap-data-quotation').attr('q_id');
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-print').show(200);
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-print input[type=checkbox]').click(function(){
                            let check_type = $(this).attr('name');
                            if (check_type == 'signature'){
                                $(this).closest('.wrap-form-print').find('input[name=signature]').prop('checked',false);
                                $(this).prop('checked',true);
                                if($(this).val() == 'service'){
                                    $(this).closest('.wrap-form-print').find('input[name=q_bidder]').closest('.col-md-12').show(200);
                                }else {
                                    $(this).closest('.wrap-form-print').find('input[name=q_bidder]').closest('.col-md-12').hide(200);
                                }
                            }
                        });
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-print').on('click','.btn-option',function(key,value){
                            let btn_type = $(this).attr('option-type');
                            switch (btn_type) {
                                case 'confirm-print':
                                    let con = '';
                                    $(this).closest('.wrap-form-print').find('input[type=checkbox]').each(function(key,value){
                                        if ($(this).prop('checked')) {
                                            con += $(this).val()+'/';
                                        }
                                    });
                                    $.ajax({
                                        url:'<?php echo $this->base_url('Quotation/update_bidder') ?>',
                                        method: 'post',
                                        data: {q_bidder:$(this).closest('.wrap-form-print').find('input[type=text]').val(),id:$(this).closest('.modal-body').attr('q_id')},
                                        dataType: 'json',
                                        success: function(data){
                                            if (data[0] == 'success') {
                                                window.location.href = '<?php echo $this->base_url("page/quotation/") ?>'+q_id_encode+'/'+con;
                                            }
                                        }
                                    })
                                    break;
                                case 'cancel-print':
                                    $(this).closest('.modal-dialog').find('.modal-body .wrap-form-print').hide(200);
                                    break;
                                default:

                            }
                        });
                        // Swal.fire({
                        //     title: 'คุณต้องการสั่งพิมพ์ใบเสนอราคานี้หรือไม่?',
                        //     type: 'warning',
                        //     showCancelButton: true,
                        //     confirmButtonColor: '#4caf50 ',
                        //     cancelButtonColor: '#f44336 ',
                        //     confirmButtonText: 'ยืนยัน',
                        //     cancelButtonText: 'ยกเลิก'
                        // }).then((result) => {
                        //     if (result.value) {
                        //         Swal.fire({
                        //             title: 'ท่านต้องการตรายางอัตโนมัติหรือไม่?',
                        //             type: 'warning',
                        //             showCancelButton: true,
                        //             confirmButtonColor: '#4caf50 ',
                        //             cancelButtonColor: '#f44336 ',
                        //             confirmButtonText: 'ยืนยัน',
                        //             cancelButtonText: 'ยกเลิก'
                        //         }).then((result) => {
                        //             if (result.value) {
                        //                 window.location.href = '<?php echo $this->base_url("page/quotation/") ?>'+q_id_encode;
                        //             }else {
                        //                 window.location.href = '<?php echo $this->base_url("page/quotation/") ?>'+q_id_encode+'/no_brand';
                        //             }
                        //         });
                        //     }
                        // });
                        break;
                    case 'remark_customer':
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').show(500);
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer label b').html('หมายเหตุลูกค้า');
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').attr('type','remark_customer');
                        break;
                    default:

                }
                $(this).removeClass('clicked');


            });
        }

        /*form modal check quotation*/
        $('.modal-preview-quotation')
        .on('click','.modal-footer .btn-option',function(){
            let type = $(this).attr('option-type');
            switch (type) {
                case 'admin-edit':
                    $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark').show(500);
                    $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark label b').html('แจ้งแก้ไข');
                    break;
                default:
            }
        }).on('click','.modal-body .btn-save-remark-customer',function(){
            let value = $(this).closest('.wrap-form-remark-customer').find('textarea[name=q_remark_customer]').val();
            let id = $(this).closest('.wrap-data-quotation').attr('q_id');
            let type = $(this).closest('.wrap-form-remark-customer').attr('type');
            if (value != '') {
                $.ajax({
                    url: '<?php echo $this->base_url('Quotation/update') ?>',
                    method: 'post',
                    data: {q_remark_customer:value,q_id:id,type:type},
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
                            list_quotation();
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
                        // console.log(data);
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
                            list_quotation();
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
                                // console.log(data);
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
                                    list_quotation();
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

        $('.btn-add-quotation').click(function(){
            $('.loading-screen').show();
        });
        $('.btn-add-quotation').click(function(){
            setTimeout(function(){
                let key_array = 0;
                let check_key = '';
                var data = $('.form-add-quotation').serialize();
                if (validate()) {
                    $.ajax({
                        url: '<?php echo $this->base_url('Quotation/add') ?>',
                        method: 'post',
                        data: data,
                        dataType: 'json',
                        success: function(result){
                            // console.log(result); //testtest
                            if (result[0] == 'success') {
                                Swal.fire({
                                    type: 'success',
                                    title: 'สร้างใบเสนอราคา สำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $('.loading-screen').hide();
                                $('.row-add-quotation').hide();
                                list_quotation();
                            }else if (result[0] == 'fail' && result[0] == 'มีลูกค้านี้อยู่แล้วในระบบ') {
                                Swal.fire({
                                    type: 'success',
                                    title: 'มีโรงพยาบาลนี้อยู่แล้วในระบบ',
                                    text: 'กรุณาเลือกโรงพยาบาล'
                                });
                            }else {
                                console.log('somethings went wrong > btn-add-quotation');
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
                            title: 'สร้างใบเสนอราคา สำเร็จ',
                            timer: 1500
                        });
                        $('.row-add-quotation').hide();
                        list_quotation();
                    }else {
                        console.log(data);
                    }
                }
            })
        }
        /*valiedate form add quotation*/
        //เพิ่มเติม
            //พัฒนา ฟังก์ชั่นนี้ ให้ง่่ายต่อการใช้
        function validate(){
            $('.row-add-quotation *[name*=q_]').each(function(key,value){
                $(this).closest('.form-group').find('.help-block').remove();
                if ($(this).attr('name') != 'q_discount' && $(this).attr('name') != 'q_stock_number' && $(this).attr('name') != 'q_ro_number' && $(this).attr('name') != 'q_set_price[]' && $(this).attr('name') != 'q_set_delivery[]' && $(this).attr('name') != 'q_warranty[]' && $(this).attr('name') != 'q_job_number' && $(this).attr('name') != 'q_stock_number' && $(this).attr('name') != 'q_discount[]' && $(this).attr('name') != 'q_customer_department' && $(this).attr('name') != 'q_a_note') {
                    if ($(this).val() == '') {
                        if ($(this).prop('tagName') == 'SELECT') {
                            $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                        }else {
                            $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
                        }
                    }
                    if ($(this).attr('name') == 'q_note_list[]') {
                        if ($(this).closest('.row-add-quotation').find('.modal-note').prop('checked') != true) {
                            $(this).closest('.form-group').find('.help-block').remove();
                        }
                    }
                    if ($(this).attr('name') == 'q_quanity[]') {
                        if((($(this).val() < 0 ) && $(this).val() != '') || $(this).val() == '0'){
                            $(this).closest('.form-group').append('<span style="width:fit-content !important" class="help-block left-align"><li>กรุณาใส่ค่าตั้งแต่ 1 ขึ้นไป</li></span>');
                        }
                    }
                    if ($(this).attr('name') == 'q_product_name[]') {
                        if ($(this).is(":visible") == true) {
                            if((($(this).val() < 0 ) && $(this).val() != '') || $(this).val() == '0'){
                                $(this).closest('.form-group').append('<span style="width:fit-content !important" class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
                            }
                        }else {
                            $(this).closest('.form-group').find('.help-block').remove();
                        }
                    }
                }
            });
            $('.row-add-quotation').on('change keyup','*[name*=q_]',function(){
                if ($(this).val() != '') {
                    $(this).closest('.form-group').find('.help-block').remove();
                }else {
                    $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                }
            });
            var error = true;
            if ($('.row-add-quotation .help-block').length > 0) {
                error = false;
                $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);
            }
            // $('.row-add-quotation .help-block').each(function(key,value){
            //     console.log($(this));
            // });
            return error;
        }

        /*when click add product*/
        $('.form-add-quotation').on('click','.wrap-btn-add-q_product .btn-add-q_product',function(){
            console.log('this');
            let clone_q_product = $(this).closest('.form-add-quotation').find('.list-q_product:last-child').clone();
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child').after(clone_q_product);
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .max-wrap-chosen:last-child').remove();
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child select.list-product').html('<option>ค้นหสสินค้า...</option>');
            max_chosen($(this).closest('.form-add-quotation').find('.list-q_product:last-child select.list-product'));
            let number_order = parseInt($(this).closest('.form-add-quotation').find('.list-q_product:last-child .number-order span').html()) + 1;
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .number-order span').html(number_order);
            let btn = '<button type="button" class="btn btn-danger d-block btn-delete-product" style="float:unset;margin:auto">ลบ</button>';
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .wrap-btn-delete-product button').remove();
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .q_quanity').val('');
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .input-product input').val('');
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .input-product').hide();
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .manual-product').prop('checked',false);
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .wrap-btn-delete-product').append(btn);
            console.log($(this).closest('.form-add-quotation').find('.list-q_product:last-child'));
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .help-block').remove();
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child').find('.chosen-container:last-child').remove();
            material_input();
            list_product();
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

          }else {

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
