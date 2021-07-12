<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
        <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
        <title><?php //echo $print->q_number ?></title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
        <!-- <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet"> -->
        <link href="<?php echo $this->public_url('libs/material/') ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
        <link href="<?php echo $this->public_url('css/font-Angsana.css') ?>" rel="stylesheet" />
        <link href="<?php echo $this->public_url('css/font-Kodchiang.css') ?>" rel="stylesheet" />
        <!-- <link href="<?php echo $this->public_url('css/table_quotation.css') ?>" rel="stylesheet" /> -->
        <link href="<?php echo $this->public_url('css/table_ro.css') ?>" rel="stylesheet" />
        <style media="screen">
            /* body,h1,h2,h3,h4,h5,h6,.wide {font-family: "AngsanaNew", sans-serif !important;} */
            /* body > .wrap-form > *{
                font-family: "AngsanaNew", sans-serif !important;
            } */

        </style>
        <style type="text/css" media="print">
            /* .page
            {
                -webkit-transform: rotate(-90deg);
                -moz-transform:rotate(-90deg);
                filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
            } */
        </style>
    </head>
    <!-- <body class="bg-white" onload="window.print()" style="padding-left:15px;padding-top:45px"> -->
    <!-- <body class="bg-white row m-0 col-md-12" style="padding-left:45px;padding-top:45px"> -->
    <body class="bg-white" onload="window.print()" onafterprint="afterprint()" style="padding-left:15px;padding-top:45px">
    <!-- <body class="bg-white" style="padding-left:15px;padding-top:45px"> -->
        <div class="wrap-form col-md-12 m-0" style="padding-left:0px">
            <form class="form-add-ro" style="font-size: 1rem">
            <!-- <form class="form-add-ro" style=""> -->
                <div class="row wrap-customer-detail border border-ro pt-0">
                    <div class="col-md-12 p-2 customer-detail-head text-center bg-ro border-bottom border-ro text-ro shadow-sm"><h4><b>รายละเอียดลูกค้า</b></h4></div>
                    <div class="col-md-12 customer-detail-body p-2">
                        <div class="row">
                            <div class="col-md-6 row m-0">
                                <div class="max-content">สถานที่ : </div>
                                <div class="max-content text-left border-ro-input" style="width: 88% !important"><?php echo $customer->cus_name ?></div>
                            </div>
                            <div class="col-md-6 row m-0">
                                <div class="max-content">แผนก : </div>
                                <div class="max-content text-left border-ro-input" style="width: 88% !important"><?php echo $ro->ro_customer_department ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 row m-0">
                                <div class="max-content">ชื่อผู้ติดต่อ : </div>
                                <div class="max-content text-left border-ro-input" style="width: 84% !important"><?php echo $ro->ro_customer_name ?></div>
                            </div>
                            <div class="col-md-6 row m-0">
                                <div class="max-content">โทรศัพท์ : </div>
                                <div class="max-content text-left border-ro-input" style="width: 86% !important"><?php echo $ro->ro_customer_tel ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row wrap-equipment-detail border-right border-left border-bottom border-ro pt-0">
                    <div class="col-md-12 p-2 customer-detail-head text-center bg-ro border-bottom border-ro text-ro shadow-sm"><h4><b>รายละเอียดเครื่อง</b></h4></div>
                    <div class="col-md-12 customer-detail-body p-2">
                        <div class="row">
                            <div class="col-md-4 row m-0">
                                <div class="max-content">เครื่อง : </div>
                                <div class="max-content text-left border-ro-input" style="width: 81% !important"><?php echo $ro->ro_product_name ?></div>
                            </div>
                            <div class="col-md-4 row m-0">
                                <div class="max-content">Model : </div>
                                <div class="max-content text-left border-ro-input" style="width: 81% !important"><?php echo $ro->ro_product_model ?></div>
                            </div>
                            <div class="col-md-4 row m-0">
                                <div class="max-content">Serial No. : </div>
                                <div class="max-content text-left border-ro-input" style="width: 71% !important"><?php echo $ro->ro_product_serial ?></div>
                            </div>
                        </div>
                        <?php
                            $time_and_mat = '';
                            $warranty = '';
                            $service_contact = '';
                            $sale_support = '';
                            $instrallation = '';
                            $demo = '';
                            switch ($ro->ro_support_type) {
                                case 'time&material':
                                    $time_and_mat = 'checked';
                                    break;
                                case 'warranty':
                                    $warranty = 'checked';
                                    break;
                                case 'service_contact':
                                    $$service_contact = 'checked';
                                    break;
                                case 'sale_support':
                                    $sale_support = 'checked';
                                    break;
                                case 'instrallation':
                                    $instrallation = 'checked';
                                    break;
                                case 'demo':
                                    $demo = 'checked';
                                    break;

                                default:
                                    // code...
                                    break;
                            }

                         ?>
                        <div class="row">
                            <div class="col-md-12 row wrap-ro-support-type">
                                <div class="col-md-3">
                                    <label class="bmd-label-floating text-dark"><strong>Support Type (<i class="material-icons">done</i>)</strong></label>
                                </div>
                                <div class="col-md-9 row d-flex justify-content-between wrap-support-type">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <label class="form-check-label text-dark">
                                                <input class="form-check-input" type="checkbox" value="time&material" name="ro_support_type" <?php echo $time_and_mat ?> disabled>
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
                                                <input class="form-check-input" type="checkbox" value="warranty" name="ro_support_type" <?php echo $warranty ?> disabled>
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
                                                <input class="form-check-input" type="checkbox" value="service_contact" name="ro_support_type" <?php echo $service_contact ?> disabled>
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
                                                <input class="form-check-input" type="checkbox" value="sale_support" name="ro_support_type" <?php echo $sale_support ?> disabled>
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
                                                <input class="form-check-input" type="checkbox" value="instrallation" name="ro_support_type" <?php echo $instrallation ?> disabled>
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
                                                <input class="form-check-input" type="checkbox" value="demo" name="ro_support_type" <?php echo $demo ?> disabled>
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
                <div class="row wrap-repair-order border-right border-left border-bottom border-ro pt-0">
                    <div class="col-md-12 p-2  repair-order-head text-center bg-ro border-bottom border-ro text-ro shadow-sm"><h4><b>รายการที่แจ้งให้ปฏิบัติงาน</b></h4></div>
                    <div class="col-md-12 repair-order-body p-2">
                        <div class="row item-repair-order">
                            <?php $ro_infrom = explode('|',$ro->ro_infrom); ?>
                            <?php foreach ($ro_infrom as $key => $value): ?>
                                <div class="col-md-12 text-dark">
                                    <p>- <?php echo $value ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="row wrap-repair-detail border-right border-left border-bottom border-ro pt-0">
                    <div class="col-md-12 p-2 repair-detail-head text-center bg-ro border-bottom border-ro text-ro shadow-sm"><h4><b>รายละเอียดการปฏิบัติงาน</b></h4></div>
                    <div class="col-md-12 repair-detail-body p-0 m-0">
                        <div class="row m-0 pt-0">
                            <div class="col-md-12 row m-0 pl-0 pb-0 pr-0">
                                <div class="col-md-9 border-ro border-right border-dark pl-0">
                                    <div class="list-repair-detail pl-0">
                                        <div class="row item-repair-detail pl-0">
                                            <div class="col-md-12">
                                                <?php $ro_working_list = explode('|',$ro->ro_working_list); ?>
                                                <?php foreach ($ro_working_list as $key => $value): ?>
                                                    <div class="col-md-12 text-dark">
                                                        <p>- <?php echo $value ?></p>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 row pr-0">
                                    <div class="col-md-12"><strong>ผลการดำเนินงาน :</strong></div>
                                    <div class="col-md-12 row wrap-ro-working-result-type pr-0">
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <label class="form-check-label text-dark">
                                                    <input class="form-check-input" type="checkbox" value="work" name="ro_working_result_type" disabled>
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
                                                    <input class="form-check-input" type="checkbox" value="get_back" name="ro_working_result_type" disabled>
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
                                                    <input class="form-check-input" type="checkbox" value="another" name="ro_working_result_type" disabled>
                                                    อื่นๆ
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row m-0 pr-0" style="font-size: 0.76rem;">
                                            <div class="max-content">รายละเอียด : </div>
                                            <div class="max-content text-left border-ro-input" style="width: 64% !important"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row border-top border-ro m-0 pt-0 pl-0 pr-0">
                                <div class="col-md-9 border-ro border-right row m-0 ">
                                    <div class="max-content">อุปกรณ์ประกอบเครื่อง : </div>
                                    <div class="max-content text-left pl-2" style="width: 71% !important"><?php echo $ro->ro_equipment_product ?></div>
                                </div>
                                <div class="col-md-3" style="font-size: 0.76rem">
                                    <div class="col-md-12 row m-0 pl-0 pr-0">
                                        <div class="max-content">ผู้ปฏิบัติงาน : </div>
                                        <div class="max-content text-left border-ro-input" style="width: 63% !important"></div>
                                    </div>
                                    <div class="col-md-12 row m-0 pl-0 pr-0">
                                        <div class="max-content">วันที่</div>
                                        <div class="max-content text-left border-ro-input" style="width: 40% !important"></div>
                                        <div class="max-content">เวลา</div>
                                        <div class="max-content text-left border-ro-input" style="width: 35% !important"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row wrap-repair-result border-right border-left border-ro pt-0 pb-0">
                    <div class="col-md-12 p-2  repair-result-head text-center bg-ro border-bottom border-ro text-ro shadow-sm"><h4><b>ผลการดำเนินงาน</b></h4></div>
                    <div class="col-md-12 repair-result-body p-0">
                        <div class="row m-0 pb-0">
                            <div class="col-md-12 row border-bottom border-dark m-0 p-0">
                                <div class="col-md-9 border-right border-dark pl-0 pr-0">
                                        <?php $ro_working_result_list = explode('|',$ro->ro_working_result_list); ?>
                                        <?php if (count($ro_working_result_list) > 1): ?>
                                            <div class="list-repair-result">
                                        <?php else: ?>
                                            <div class="list-repair-result" style="padding-bottom: 50px;">
                                        <?php endif; ?>
                                        <div class="row item-repair-result pl-0">
                                            <div class="col-md-12">
                                                <?php foreach ($ro_working_result_list as $key => $value): ?>
                                                    <div class="col-md-12 text-dark">
                                                        <p>- <?php echo $value ?></p>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row pl-0 pr-0 m-0 ">
                                        <div class="wrap-service-staff row m-0 pl-1 col-md-12 pr-0">
                                            <div class="col-md-8 pl-0 row m-0">
                                                <div class="max-content">เจ้าหน้าที่ : </div>
                                                <div class="max-content text-left border-ro-input" style="width: 87% !important"><?php echo $ro->ro_working_result_service_data ?></div>
                                            </div>
                                            <div class="col-md-4 pl-0 row m-0">
                                                <div class="max-content">วันที่ : </div>
                                                <div class="max-content text-left border-ro-input" style="width: 81% !important"><?php echo $ro->ro_working_result_date ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 row pr-0">
                                    <div class="col-md-12"><strong>สถานะเครื่อง :</strong></div>
                                    <div class="col-md-12 row wrap-ro-working-result-product-status pr-0">
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <label class="form-check-label text-dark">
                                                    <input class="form-check-input" type="checkbox" value="work" name="ro_working_result_product_status" disabled>
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
                                                    <input class="form-check-input" type="checkbox" value="get_back" name="ro_working_result_product_status" disabled>
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
                                                    <input class="form-check-input" type="checkbox" value="another" name="ro_working_result_product_status" disabled>
                                                    อื่นๆ
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row m-0 pr-0" style="font-size: 0.76rem;">
                                            <div class="max-content">รายละเอียด : </div>
                                            <div class="max-content text-left border-ro-input" style="width: 64% !important"><?php echo $ro->ro_working_result_product_detail ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row wrap-ro-product border-right border-left border-bottom border-ro pt-0">
                    <div class="col-md-12">
                        <table class="table table-bordered col-md-12 list-ro-product border-0" border="">
                            <thead class="text-ro">
                                <tr class="row pt-0 pb-0">
                                    <th class="text-center col-md-2">รหัสสินค้า</th>
                                    <th class="text-center col-md-5">รายการ</th>
                                    <th class="text-center col-md-1">จำนวน</th>
                                    <th class="text-center col-md-2">ราคา/หน่วย</th>
                                    <th class="text-center col-md-2">ราคารวม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ro->product as $key => $value): ?>
                                    <tr class="row item-ro-product pt-0 pb-0">
                                    <td class="col-md-2 text-center"><?php echo $value['p_code'] ?></td>
                                    <td class="col-md-5 text-center"><?php echo $value['p_name'] ?></td>
                                    <td class="col-md-1 text-center"><?php echo $value['p_unit'] ?></td>
                                    <td class="col-md-2 text-center"><?php echo $value['p_price'] ?></td>
                                    <td class="col-md-2 text-center"><?php echo $value['p_price_sum'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="row pt-0">
                                    <td class="col-md-8" style="border-top: 0px !important;border-bottom: 0px !important;border-left: 0px !important;border-right: 0px !important;"></td>
                                    <td class="col-md-2 text-center text-ro" style="border-top: 0px !important;"><strong>รวมทั้งสิ้น</strong></td>
                                    <td class="col-md-2 total-price text-center" style="border-top: 0px !important;"><?php echo $ro->sum_total ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row wrap-ro-detail border-right border-left border-bottom border-ro pt-0">
                    <div class="col-md-12 row">
                        <div class="col-md-5 row m-0 ">
                            <div class="max-content">Quotation : </div>
                            <div class="max-content text-left border-ro-input pl-2" style="width: 81% !important"><?php echo $ro->ro_quotation_data[0]->quotation_number ?></div>
                        </div>
                        <div class="col-md-5 row m-0 ">
                            <div class="max-content">Date : </div>
                            <div class="max-content text-left border-ro-input pl-2" style="width: 25% !important"><?php echo $ro->ro_quotation_date ?></div>
                        </div>
                    </div>
                    <div class="col-md-12 row">
                        <div class="col-md-5 row m-0 ">
                            <div class="max-content">Invoice/Delivery Order No. : </div>
                            <div class="max-content text-left border-ro-input pl-2" style="width: 53% !important"><?php echo $ro->ro_invoice_number ?></div>
                        </div>
                        <div class="col-md-5 row m-0 ">
                            <div class="max-content">Date : </div>
                            <div class="max-content text-left border-ro-input pl-2" style="width: 25% !important"><?php echo $ro->ro_invoice_date ?></div>
                        </div>
                        <div class="col-md-2 row m-0">
                                <div class="max-content">ลงชื่อผู้ตรวจสอบ : </div>
                            <div class="max-content text-left border-ro-input pl-2" style="width: 72% !important"></div>
                        </div>
                    </div>
                    <div class="col-md-12 row">
                        <div class="col-md-5 row m-0 ">
                            <div class="max-content">Order Form No. : </div>
                            <div class="max-content text-left border-ro-input pl-2" style="width: 72% !important"><?php echo $ro->ro_of_number ?></div>
                        </div>
                        <div class="col-md-5 row m-0 ">
                            <div class="max-content">Date : </div>
                            <div class="max-content text-left border-ro-input pl-2" style="width: 25% !important"><?php echo $ro->ro_of_date ?></div>
                        </div>
                        <div class="col-md-2 row m-0">
                                <div class="max-content">วันที่ : </div>
                            <div class="max-content text-left border-ro-input pl-2" style="width: 72% !important"></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/jquery.min.js"></script>
        <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/sweetalert2.js"></script>
        <script type="text/javascript">
            function afterprint(){
                Swal.fire({
                    title: 'การปริ้นเมื่อสักครู่สำเร็จหรือไม่?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4caf50 ',
                    cancelButtonColor: '#f44336 ',
                    confirmButtonText: '<i class="material-icons">check</i> สำเร็จ',
                    cancelButtonText: '<i class="material-icons">close</i>  ไม่สำเร็จ'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '<?php //echo $this->base_url('employee/update_quotation') ?>',
                            method: 'post',
                            data: {type:'print',q_id:'<?php //echo $print->q_id ?>'},
                            dataType: 'json',
                            success: function(data){
                                // console.log(data);
                                if (data[0] == 'success') {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'บันทึกสำเร็จ',
                                        showConfirmButton:false,
                                        timer: 1500
                                    });
                                    setTimeout(function(){window.location.href = "<?php //echo $this->base_url('page/quotation') ?>";},1000);
                                }else {
                                    Swal.fire({
                                        type: 'warning',
                                        title: 'ไม่สามารถบันทึกได้',
                                        showConfirmButton:false,
                                        timer: 1500
                                    });
                                    setTimeout(function(){window.location.href = "<?php //echo $this->base_url('page/quotation') ?>";},1000);
                                }
                            }
                        })
                    }else {
                        setTimeout(function(){window.location.href = "<?php //echo $this->base_url('page/quotation') ?>";},1000);
                    }
                })
            }
        </script>
    </body>
</html>
