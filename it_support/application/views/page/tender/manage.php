<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
    <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Tender</title>
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
    <!-- <link href="<?php echo $this->public_url('css/tender.css') ?>" rel="stylesheet" /> -->
    <!-- <style media="screen">
        body,h1,h2,h3,h4,h5,h6{
            font-family: 'Mali', cursive;
        }
    </style> -->
    <style media="screen">
        .tb-tender-list, .tb-tender-list thead tr th {
            font-size: 1em !important;
        }
        .bg-primary{
            background: linear-gradient(60deg, #26c6da, #00acc1);
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
        .wall-opacity{
            position: relative;
            float: left;
            width: 100%;
            height: 100%;
        }
        .wall-opacity div{
            position: absolute;
            padding-bottom: 32%;
            background: #aaa4a447;
            height: 100%;
            top: -70px;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 99;
            border-radius: 5px;
        }
        .table.table-bordered>thead>tr>th{
            border-top: 1px solid #cccccc;
        }
        .modal-tender-detail .modal-xl {
            max-width: 1250px !important;
        }
        .table-head{
            background-color: #418d96 !important;
        }
        .bg-secondary-item{
            background-color: #6c757d2e !important;
        }
        /* .product-item:nth-child(1n+1){
            border-top: 1px solid #ccc;
        } */
    </style>
    <style media="screen">
        @media (min-width: 992px){
            .row-add-tender .card-body{
                padding: 5rem !important;
            }
        }
    </style>
    <?php $this->view('partail/main_css') ?>
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
    <div class="modal modal-tender-detail fade bd-example-modal-xl modal-loading-data" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">รายละเอียด tender</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body wrap-data-tender p-3"></div>
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
            <a class="navbar-brand" href="#pablo">รายการ tender</a>
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
                        <a class="nav-link bg-success btn-modal-add-tender" href="javascript:void(0)">
                            <i class="material-icons text-white">add_circle</i>
                            <p class="text-white d-block">สร้าง tender</p>
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
            <button class="btn max-col-sm-12 col-md-3 btn-modal-add-issue bg-success btn-modal-add-tender" >
                    <i class="material-icons text-white">add_circle</i>&nbsp;&nbsp;สร้าง tender
            </button>
        </div>
        <div class="container-fluid">
            <div class="row row-add-tender" style="display:none">
                <div class="col-md-12 wrap-card-tender">
                    <div class="card">
                        <div class="card-header card-header-info header-add-tender">
                            <h4 class="card-title">สร้าง tender</h4>
                        </div>
                        <div class="card-body">
                                <form class="form-add-tender">
                                    <input type="hidden" name="type" value="">
                                    <input type="hidden" name="add_tender" value="1">
                                    <input type="hidden" name="t_number" value="">
                                    <div class="row first-step">
                                        <div class="wall-opacity-off">
                                            <div class=""></div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 wrap-input wrap-list-service">
                                            <div class="form-group bmd-form-group">
                                                <select class="form-control form-control-chosen list-service-name" name="t_sale" required></select>
                                                <input type="hidden" name="t_zone" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <select class="form-control form-control-chosen" name="t_budget_type" required>
                                                    <option value="">ลักษณะงบ..</option>
                                                    <option value="E-bidding">E-bidding</option>
                                                    <option value="PO">PO</option>
                                                    <option value="วิธีเฉเพาะเจาะจง">วิธีเฉเพาะเจาะจง</option>
                                                    <option value="ยื่นคัดเลือก">ยื่นคัดเลือก</option>
                                                    <option value="ประกวดราคา">ประกวดราคา</option>
                                                    <option value="เสนอราคา">เสนอราคา</option>
                                                    <option value="ยื่นข้อเสนอ">ยื่นข้อเสนอ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 wrap-input">
                                            <div class="form-group bmd-form-group dropdown is-focused">
                                                <label class="bmd-label-floating"><strong>วันที่ยื่น-เปิด</strong></label>
                                                <input type="date" class="form-control" name="t_open_letter" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 wrap-input">
                                            <div class="form-group bmd-form-group dropdown">
                                                <label class="bmd-label-floating"><strong>หลักประกันซอง</strong></label>
                                                <input type="number" class="form-control" name="t_bank_confirm" min="1" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-2 wrap-input">
                                            <div class="form-group bmd-form-group dropdown">
                                                <label class="bmd-label-floating"><strong>ระยะเวลาประกัน</strong></label>
                                                <input type="number" class="form-control" name="t_year_warranty" min="1" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5 wrap-input">
                                            <div class="form-group bmd-form-group">
                                                <select class="form-control form-control-chosen list-customer" name="t_customer" required></select>
                                            </div>
                                            <div class="form-group bmd-form-group" style="display:none">
                                                <label class="bmd-label-floating"><strong>กรอกรายชื่อลูกค้า</strong></label>
                                                <input type="text" class="form-control input-customer-name" name="" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 wrap-input">
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
                                                    <td class="add-customer" style="padding-top: 13px;">เพิ่มลูกค้าใหม่</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-3 wrap-input">
                                            <div class="form-group bmd-form-group dropdown">
                                                <label class="bmd-label-floating"><strong>คู่เทียบ</strong></label>
                                                <input type="text" class="form-control" name="t_compare" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-top form-contract mt-4 pt-4">
                                        <div class="wall-opacity-off">
                                            <div class="" style="top: -17px !important;padding-bottom: 20%;"></div>
                                        </div>
                                        <div class="col-md-3 wrap-input">
                                            <div class="form-group bmd-form-group dropdown">
                                                <select class="form-control form-control-chosen" name="t_contract_type">
                                                    <option value="">คู่สัญญา/ใบสั่งซื้อ..</option>
                                                    <option value="Payment">Payment</option>
                                                    <option value="PO">PO</option>
                                                    <option value="เก็บเงินสด">เก็บเงินสด</option>
                                                    <option value="บริจาค">บริจาค</option>
                                                    <option value="บันทึกข้อความ">บันทึกข้อความ</option>
                                                    <option value="ใบสั่งซื้อ">ใบสั่งซื้อ</option>
                                                    <option value="ใบเสนอราคา">ใบเสนอราคา</option>
                                                    <option value="รอ PO">รอ PO</option>
                                                    <option value="รอพิจารณา">รอพิจารณา</option>
                                                    <option value="รอยื่น">รอยื่น</option>
                                                    <option value="ร่างสัญญา">ร่างสัญญา</option>
                                                    <option value="เรียกทำสัญญา">เรียกทำสัญญา</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 wrap-input">
                                            <div class="form-group bmd-form-group is-filled">
                                                <label class="bmd-label-floating"><strong>วันเรียกทำสัญญา</strong></label>
                                                <input type="date" class="form-control" name="t_contract_date" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 wrap-input">
                                            <div class="form-group bmd-form-group dropdown">
                                                <label class="bmd-label-floating"><strong>เลขสัญญา</strong></label>
                                                <input type="text" class="form-control" name="t_contract_number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 wrap-input">
                                            <div class="form-group bmd-form-group dropdown">
                                                <select class="form-control form-control-chosen" name="t_contract_status">
                                                    <option value="">สถานะใบสัญญา..</option>
                                                    <option value="Payment">Payment</option>
                                                    <option value="PO">PO</option>
                                                    <option value="เงินสด">เงินสด</option>
                                                    <option value="บันทึกข้อความ">บันทึกข้อความ</option>
                                                    <option value="ใบสั่งซื้อ">ใบสั่งซื้อ</option>
                                                    <option value="ใบเสนอราคา">ใบเสนอราคา</option>
                                                    <option value="รอใบสั่งซื้อ">รอใบสั่งซื้อ</option>
                                                    <option value="รอคู่สัญญา">รอคู่สัญญา</option>
                                                    <option value="รอสัญญาตัวจริง">รอสัญญาตัวจริง</option>
                                                    <option value="รับสัญญาแล้ว">รับสัญญาแล้ว</option>
                                                    <option value="รอสัญญาตัวจริง">รอสัญญาตัวจริง</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 wrap-input">
                                            <div class="form-group bmd-form-group is-filled">
                                                <label class="bmd-label-floating"><strong>วันเริ่มทำสัญญา</strong></label>
                                                <input type="date" class="form-control" name="t_start_contract" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 wrap-input">
                                            <div class="form-group bmd-form-group is-filled">
                                                <label class="bmd-label-floating"><strong>วันสิ้นสุดสัญญา</strong></label>
                                                <input type="date" class="form-control" name="t_end_contract" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                        </div>
                        <div class="card-footer text-center justify-content-between">
                            <a class="btn btn-danger btn-cancel-tender" href="javascript:void(0)"><h4><i class="material-icons mr-3">cancel</i>ยกเลิก</h4></a>
                            <a class="btn btn-success btn-add-tender" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-add-tender-detail" style="display:none">
                <div class="col-md-12 wrap-card-tender">
                    <div class="card">
                        <div class="card-header card-header-info header-add-tender">
                            <h4 class="card-title">รายละเอียด tender</h4>
                        </div>
                        <div class="card-body">
                                <form class="form-add-tender-detail">
                                    <input type="hidden" name="type" value="">
                                    <input type="hidden" name="add_tender" value="1">
                                    <input type="hidden" name="t_id" value="">
                                    <div class="row col-12 ml-0 mr-0 pl-0 pr-0 wrap-product">
                                        <div class="product-item border rounded col-12 row ml-0 mr-0 pt-3">
                                            <div class="col-md-3 wrap-input">
                                                <div class="form-group bmd-form-group">
                                                    <select class="form-control form-control-chosen td-brand" name="td_brand[]">
                                                        <option value="">เลือกแบรนด์..</option>
                                                        <option value="PHILIPS">Philips</option>
                                                        <option value="ZOLL">ZOLL</option>
                                                        <option value="Bennett">Bennett</option>
                                                        <option value="CMVS">CMVS</option>
                                                        <option value="Hill-Rom">Hill-Rom</option>
                                                        <option value="Air Liquide">Air Liquide</option>
                                                        <option value="OBCD">OBCD</option>
                                                        <option value="CDY">CDY</option>
                                                        <option value="PMD">PMD</option>
                                                        <option value="WelchAllyn">WelchAllyn</option>
                                                        <option value="BARD">BARD</option>
                                                        <option value="Schiller">Schiller</option>
                                                        <option value="ICU Medical">ICU Medical</option>
                                                        <option value="arjo">arjo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5 wrap-input">
                                                <div class="form-group bmd-form-group dropdown">
                                                    <label class="bmd-label-floating"><strong>รุ่น</strong></label>
                                                    <input type="text" class="form-control td_gen" name="td_gen[]" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2 wrap-input">
                                                <div class="form-group bmd-form-group dropdown">
                                                    <label class="bmd-label-floating"><strong>จำนวน</strong></label>
                                                    <input type="text" class="form-control td_num" name="td_num[]" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2 wrap-input">
                                                <div class="form-group bmd-form-group dropdown is-focused">
                                                    <select class="form-select form-control-chosen td-type" name="td_type[]">
                                                        <option value="">หน่วย..</option>
                                                        <option value="ก้อน">ก้อน</option>
                                                        <option value="คัน">คัน</option>
                                                        <option value="เครื่อง">เครื่อง</option>
                                                        <option value="งาน">งาน</option>
                                                        <option value="ชิ้น">ชิ้น</option>
                                                        <option value="ชุด">ชุด</option>
                                                        <option value="ตัว">ตัว</option>
                                                        <option value="ตู้">ตู้</option>
                                                        <option value="เตียง">เตียง</option>
                                                        <option value="ระบบ">ระบบ</option>
                                                        <option value="รายการ">รายการ</option>
                                                        <option value="หลัง">หลัง</option>
                                                        <option value="อัน">อัน</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 wrap-input">
                                                <div class="form-group bmd-form-group dropdown is-focused">
                                                    <label class="bmd-label-floating"><strong>ราคา</strong></label>
                                                    <input type="number" class="form-control td_price" name="td_price[]" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 wrap-input">
                                                <div class="form-group bmd-form-group dropdown is-focused">
                                                    <label class="bmd-label-floating"><strong>จำนวนวันส่งของ</strong></label>
                                                    <input type="number" class="form-control td_send_product" name="td_send_product[]" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 wrap-input">
                                                <div class="form-group bmd-form-group dropdown is-focused">
                                                    <label class="bmd-label-floating"><strong>จำนวนวันยืนราคา</strong></label>
                                                    <input type="number" class="form-control td_date_submit_price" name="td_date_submit_price[]" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2 wrap-input">
                                                <div class="form-group bmd-form-group dropdown is-focused">
                                                    <select class="form-select form-control-chosen td-status" name="td_status[]">
                                                        <option value="">สถานะ..</option>
                                                        <option value="ได้งาน">ได้งาน</option>
                                                        <option value="ไม่ได้งาน">ไม่ได้งาน</option>
                                                        <option value="รอ">รอ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-10 wrap-input">
                                                <div class="form-group bmd-form-group dropdown is-focused">
                                                    <label class="bmd-label-floating"><strong>หมายเหตุ</strong></label>
                                                    <input type="text" class="form-control td_remark" name="td_remark[]" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <button type="button" class="btn btn-danger pr-2 pl-2 btn-delete-product"><i class="material-icons">close</i> ลบออก</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center d-flex wrap-btn-add-product">
                                        <button type="button" class="btn btn-success btn-add-product"><i class="material-icons">add</i> เพิ่มสินค้า</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                        </div>
                        <div class="card-footer text-center justify-content-between">
                            <a class="btn btn-danger btn-cancel-tender" href="javascript:void(0)"><h4><i class="material-icons mr-3">cancel</i>ยกเลิก</h4></a>
                            <a class="btn btn-success btn-add-tender-detail" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-update-draf" style="display:none">
                <div class="col-md-12 wrap-card-tender">
                    <div class="card">
                        <div class="card-header card-header-info header-add-tender">
                            <h4 class="card-title">Update Darf</h4>
                        </div>
                        <div class="card-body">
                                <form class="form-update-draf">
                                    <input type="hidden" name="update_draf" value="1">
                                    <div class="row col-12 ml-0 mr-0 pl-0 pr-0 wrap-product">
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                        </div>
                        <div class="card-footer text-center justify-content-between">
                            <a class="btn btn-danger btn-cancel-draf" href="javascript:void(0)"><h4><i class="material-icons mr-3">cancel</i>ยกเลิก</h4></a>
                            <a class="btn btn-success btn-update-draf" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-add-contract" style="display:none">
                <div class="col-md-12 wrap-card-tender">
                    <div class="card">
                        <div class="card-header card-header-info header-add-tender">
                            <h4 class="card-title">รายละเอียด tender</h4>
                        </div>
                        <div class="card-body">
                                <form class="form-add-contract">
                                    <input type="hidden" name="type" value="">
                                    <input type="hidden" name="add_tender" value="1">
                                    <input type="hidden" name="t_id" value="">
                                    <div class="row col-12 ml-0 mr-0 pl-0 pr-0 wrap-contract">
                                        <div class="product-item border rounded col-12 row ml-0 mr-0 pt-3">

                                            <div class="row form-contract mt-4 pt-4 col-12">
                                                <div class="col-md-3 wrap-input">
                                                    <div class="form-group bmd-form-group dropdown">
                                                        <select class="form-control form-control-chosen" name="t_contract_type">
                                                            <option value="">คู่สัญญา/ใบสั่งซื้อ..</option>
                                                            <option value="Payment">Payment</option>
                                                            <option value="PO">PO</option>
                                                            <option value="เก็บเงินสด">เก็บเงินสด</option>
                                                            <option value="บริจาค">บริจาค</option>
                                                            <option value="บันทึกข้อความ">บันทึกข้อความ</option>
                                                            <option value="ใบสั่งซื้อ">ใบสั่งซื้อ</option>
                                                            <option value="ใบเสนอราคา">ใบเสนอราคา</option>
                                                            <option value="รอ PO">รอ PO</option>
                                                            <option value="รอพิจารณา">รอพิจารณา</option>
                                                            <option value="รอยื่น">รอยื่น</option>
                                                            <option value="ร่างสัญญา">ร่างสัญญา</option>
                                                            <option value="เรียกทำสัญญา">เรียกทำสัญญา</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 wrap-input">
                                                    <div class="form-group bmd-form-group is-filled">
                                                        <label class="bmd-label-floating"><strong>วันเรียกทำสัญญา</strong></label>
                                                        <input type="date" class="form-control" name="t_contract_date" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 wrap-input">
                                                    <div class="form-group bmd-form-group dropdown">
                                                        <label class="bmd-label-floating"><strong>เลขสัญญา</strong></label>
                                                        <input type="text" class="form-control" name="t_contract_number" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 wrap-input">
                                                    <div class="form-group bmd-form-group dropdown">
                                                        <select class="form-control form-control-chosen" name="t_contract_status">
                                                            <option value="">สถานะใบสัญญา..</option>
                                                            <option value="Payment">Payment</option>
                                                            <option value="PO">PO</option>
                                                            <option value="เงินสด">เงินสด</option>
                                                            <option value="บันทึกข้อความ">บันทึกข้อความ</option>
                                                            <option value="ใบสั่งซื้อ">ใบสั่งซื้อ</option>
                                                            <option value="ใบเสนอราคา">ใบเสนอราคา</option>
                                                            <option value="รอใบสั่งซื้อ">รอใบสั่งซื้อ</option>
                                                            <option value="รอคู่สัญญา">รอคู่สัญญา</option>
                                                            <option value="รอสัญญาตัวจริง">รอสัญญาตัวจริง</option>
                                                            <option value="รับสัญญาแล้ว">รับสัญญาแล้ว</option>
                                                            <option value="รอสัญญาตัวจริง">รอสัญญาตัวจริง</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 wrap-input">
                                                    <div class="form-group bmd-form-group is-filled">
                                                        <label class="bmd-label-floating"><strong>วันเริ่มทำสัญญา</strong></label>
                                                        <input type="date" class="form-control" name="t_start_contract" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 wrap-input">
                                                    <div class="form-group bmd-form-group is-filled">
                                                        <label class="bmd-label-floating"><strong>วันสิ้นสุดสัญญา</strong></label>
                                                        <input type="date" class="form-control" name="t_end_contract" value="" required>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="row justify-content-center d-flex wrap-btn-add-contract">
                                        <button type="button" class="btn btn-success btn-add-contract"><i class="material-icons">add</i> เพิ่มสัญญา</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                        </div>
                        <div class="card-footer text-center justify-content-between">
                            <a class="btn btn-danger btn-cancel-contract" href="javascript:void(0)"><h4><i class="material-icons mr-3">cancel</i>ยกเลิก</h4></a>
                            <a class="btn btn-success btn-add-contract" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="navbar">
                <form class="form-search col-md-12">
                    <div class="row justify-content-around d-flex">
                        <div class="form-group text-center">
                            <label class="text-dark">ค้นหา : </label>
                            <div class="form-group bmd-form-group">
                                <input type="text" class="form-control search-number" name="search-number"  value="">
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
                        <!-- <div class="form-group">
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-cate" name="search-cate"></select>
                            </div>
                        </div> -->
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
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-sort" name="search-sort" aria-label="Example select with button addon">
                                    <option value="">แสดง</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group wrap-search-year-start">
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
                        </div> -->
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

            <div class="row list-tender">
                <div class="col-lg-12 col-md-12">
                  <div class="card card-equipment-list">
                    <div class="card-header row d-flex justify-content-between">
                        <div class="card-header-info max-col-sm-10 col-md-7 col-lg-7">
                            <h4 class="card-title">รายการ tender</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-header-info text-center list-number-order" style="width: fit-content !important;">
                            <h4 class="card-title">ทั้งหมด <b>0</b> รายการ</h4>
                        </div>
                    </div>
                    <div class="card-body table-responsive" >
                        <table class="table table-hover table-striped table-bordered tb-tender-list">
                            <thead class="text-info">
                                <tr>
                                    <th>เลขที่ tender</th>
                                    <th>ชื่อโรงพยาบาล</th>
                                    <th>ลักษณะงบ</th>
                                    <th>เจ้าของเขต</th>
                                    <th class="text-center">สถานะงาน<br><span style="font-size:0.7em"><span class="text-success">ได้</span> / <span class="text-warning">รอ</span> / <span class="text-danger">ไม่ได</span>้</span></th>
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
    function sql_server(url='') {
        let link = '<?php echo $this->base_url() ?>'+url;
        link = link.replace("it_support", "sql_server");
        return link;
    }
    function base_url(url='') {
        let link = '<?php echo $this->base_url() ?>'+url;
        return link;
    }
</script>
<script type="text/javascript" src="<?php echo $this->public_url('js/page/tender/manage.js') ?>"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        //ต้องมีด้วยว่าคนไหนมีสิทธิ์ search อะไรบ้าง
            //น่าจะตามสิทธิ์ที่เห็นได้ว่าเห็นอะไรได้ บ้าง
        // $('.modal-preview-tender').modal('show');
        // $('.row-add-tender').show(500);

        // setInterval(test, 3000); // ทำ notification paramiter เป็น (function(),timer)
        btn_to_top()
        material_input()
        // loading_gif($('.form-add-tender .table-q_product  .wrap-list-product'));
        // list_tender();
        // setInterval(list_tender, 15000);

        max_chosen($('.form-add-tender select[name=t_budget_type]'));



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
                $('.content .list-tender .card-title b').html(num_order);
                $('.content .list-tender tbody').html(html);
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
                                    url: '<?php echo $this->base_url('tender/list') ?>',
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
                            $('.content .list-tender .card-title b').html(number_order);
                            $('.content .list-tender tbody').html(html);
                        }else {
                            let check_line_today = 0;
                            $.each(data_search,function(key,value){
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
                                let number_order = data_search.length;
                                $('.content .list-tender .card-title b').html(number_order);
                                $('.content .list-tender tbody').html(html);
                            }
                    },150);


            });
        }



        var check_call_function = true;
        function list_tender(){
            $('.content .list-tender tbody').html('<tr><td colspan="4" style="padding-bottom: 160px;"></td></tr>');
            loader($('.content .list-tender tbody tr td'));
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
                url: '<?php echo $this->base_url('tender/list') ?>',
                method: 'post',
                data: {year_start:year_start,year_end:year_end,status:'get'},
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    let html = '';
                    var select_search = '<option value="">ประเภท</option>';
                    if (data[0] == 'success') {
                        let btn = []
                        let count_btn = 0;
                        $.each(data[1],function(key,value){
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
                            $('.content .list-tender .card-title b').html(num_order);
                            $('.content .list-tender tbody').html(html);
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
                        $('.content .list-tender tbody').html(html);
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

        /*valiedate form add tender*/
        //เพิ่มเติม
            //พัฒนา ฟังก์ชั่นนี้ ให้ง่ายต่อการใช้
        function validate(){
            $('.row-add-tender *[name*=q_]').each(function(key,value){
                $(this).closest('.form-group').find('.help-block').remove();
                if ($(this).attr('name') != 'q_discount' && $(this).attr('name') != 'q_stock_number' && $(this).attr('name') != 'q_ro_number' && $(this).attr('name') != 'q_set_price[]' && $(this).attr('name') != 'q_set_delivery[]' && $(this).attr('name') != 'q_warranty[]' && $(this).attr('name') != 'q_job_number' && $(this).attr('name') != 'q_stock_number' && $(this).attr('name') != 'q_discount[]' && $(this).attr('name') != 'q_customer_department' && $(this).attr('name') != 'q_a_note'&& $(this).attr('name') != 'q_num_manual') {
                    if ($(this).val() == '') {
                        if ($(this).prop('tagName') == 'SELECT') {
                            $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                        }else {
                            $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
                        }
                    }
                    if ($(this).attr('name') == 'q_note_list[]') {
                        if ($(this).closest('.row-add-tender').find('.modal-note').prop('checked') != true) {
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
            $('.row-add-tender').on('change keyup','*[name*=q_]',function(){
                if ($(this).val() != '') {
                    $(this).closest('.form-group').find('.help-block').remove();
                }else {
                    $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                }
            });
            var error = true;
            if ($('.row-add-tender .help-block').length > 0) {
                error = false;
                $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);
            }
            // $('.row-add-tender .help-block').each(function(key,value){
            //     console.log($(this));
            // });
            return error;
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
