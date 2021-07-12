<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
        <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
        <title><?php echo $print->q_number ?></title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
        <!-- <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet"> -->
        <link href="<?php echo $this->public_url('libs/material/') ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
        <link href="<?php echo $this->public_url('css/font-Angsana.css') ?>" rel="stylesheet" />
        <link href="<?php echo $this->public_url('css/font-Kodchiang.css') ?>" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
        <link href="<?php echo $this->public_url('css/table_quotation.css') ?>" rel="stylesheet" />
        <link href="<?php echo $this->public_url('css/table_quotation_sale.css') ?>" rel="stylesheet" />
        <style media="screen">
            /* body,h1,h2,h3,h4,h5,h6,.wide {font-family: "AngsanaNew", sans-serif !important;} */
            /* body > .wrap-form > *{
                font-family: "AngsanaNew", sans-serif !important;
            } */
            .table thead tr th{
              background-color:#cdfdcc !important;
              color:#001d80 !important
            }
        </style>
        <style type="text/css" media="print">
            /* .page
            {
                -webkit-transform: rotate(-90deg);
                -moz-transform:rotate(-90deg);
                filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
            } */
            .table>thead>tr>th{
              background-color:#cdfdcc !important;
              color:#001d80 !important
            }
            .table>.wrap-wum-total>td{
              color:#fb0000 !important;
              /* background-color:#e3e3e3 !important */
            }
            .text-quo-sale{
                color:#001d80 !important
            }
        </style>
    </head>

    <!-- <body class="bg-white" onload="window.print()" style="padding-left:45px;padding-top:10px;padding-right:40px;padding-bottom:20px;"> -->
    <!-- <body class="bg-white" style="padding-left:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;"> -->
    <body class="bg-white" onload="window.print()" onafterprint="afterprint()" style="padding-left:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;">
        <div class="wrap-form col-md-12" style="padding-left:0px">
            <div class="row col-md-12 pr-0 ml-0">
                <div class="form-group row col-md-8">
                    <img class="col-md-12" src="<?php echo $this->public_url('file/images/quotation/quo_header.jpg') ?>" alt="">
                </div>
                <div class="form-group row col-md-8 d-flex justify-content-end">
                  <p class="float-right text-quo-sale text-right col-md-12" style="margin-bottom:2px;">&nbsp;ใบเสนอราคา (Quotation)</p>
                </div>
                <div class="form-group row col-md-4 d-flex justify-content-end pr-0">
                    <!-- <p class="float-right display-4 text-center col-md-9 kodchiang">ใบเสนอราคา<br>Quotation</p> -->
                    <!-- <p class="float-right  text-center col-md-12 kodchiang" style="margin-bottom:2px;font-size: 2em !important">&nbsp;ใบเสนอราคา</p>
                    <p class="float-right text-center col-md-12 kodchiang" style="font-size: 2.5em !important;line-height: 1">&nbsp;Quotation</p> -->
                    <p class="text-right col-md-12 pr-0 text-quo-sale" style="margin-bottom: 10px;"><i>เลขที่</i>&nbsp;&nbsp;&nbsp;&nbsp;<b class="text-danger"><?php echo $print->q_number ?></b></p>
                    <p class="text-right col-md-12 pr-0 text-quo-sale"><i>วันที่</i>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-danger"><?php echo $print->q_date_th ?></span></p>
                    <p class="text-right col-md-12 pr-0 pl-0"><i>เลขประจำตัวผู้เสียภาษี 0105529003833</i></p>
                </div>
            </div>
            <div class="form-group row border-top border-dark pt-2 text-quo-sale" style="font-family: 'AngsanaNew', sans-serif !important;">
                เรื่อง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $print->q_topic ?>
            </div>
            <div class="form-group row border-bottom border-dark">
                เรียน&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $print->q_to ?>
            </div>
            <div class="form-group row col-md-12">
              <?php $agent = explode('โทร.',$print->q_agent_service); ?>
              <?php
              $division = 'ผู้แทนฝ่ายบริการ';
              if ($print->q_agent_data->division == 'Sale'):
                  $division = 'ผู้แทนฝ่ายขาย';
              ?>

              <?php endif; ?>
              <div class="text-right col-md-12" style="font-size:28px;color:#0043ff"><u><?php echo $division ?> : คุณ<?php echo $agent[0].'&nbsp; โทร.'.$agent[1] ?></u></div>
              <p class="text-quo-sale pt-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $print->q_to_detail ?>.-</p>
            </div>
        </div>
        <table class="table table-bordered text-dark" border="1">
            <thead class="text-center">
                <tr>
                    <th style="width: 77px">ลำดับที่</th>
                    <th>จำนวน</th>
                    <th>รายการ</th>
                    <th>ราคา/หน่วย</th>
                    <th>ราคารวม</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $count = 0; ?>
                <?php foreach ($print->product as $key => $value): ?>
                    <tr>
                        <td style="border-bottom:0px !important;border-top:0px !important"><?php echo ($key+1) ?></td>
                        <td style="border-bottom:0px !important;border-top:0px !important"><?php echo $value['p_unit'].' '.$value['p_qty'] ?></td>
                        <td class="text-left" style="border-bottom:0px !important;border-top:0px !important"><?php echo $value['p_name'] ?></td>
                        <td class="text-right text-quo-sale" style="width:15%;border-bottom:0px !important;border-top:0px !important"><?php echo $value['p_price'] ?></td>
                        <td class="text-right" style="width:15%;border-bottom:0px !important;border-top:0px !important"><?php echo $value['p_price_sum'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr >
                    <td style="border-top:0px !important"></td>
                    <td style="border-top:0px !important"></td>
                    <!-- <td style="border-top:0px !important;" class="text-left"><br><b>เลขครุภัณฑ์ <?php echo $print->q_stock_number ?></b></td> -->
                    <td style="border-top:0px !important">
                        <br>
                        <div class="col-md-12">
                            <p class="text-left">
                            <?php foreach ($print->list_detail as $key_detail => $value_detail): ?>
                                <?php if (($key_detail+1)%2==0 and $key_detail < 2): ?>
                                    <span class="text-left" ><?php echo $value_detail ?></span>&nbsp;&nbsp;
                                </p>
                                <p class="text-left">
                                <?php else: ?>
                                    <!-- <span class="text-left" ><?php echo $value_detail ?></span>&nbsp;&nbsp; -->
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </p>
                        </div>
                        </div>
                    </td>
                    <td style="border-top:0px !important;border-bottom:0px !important"></td>
                    <td style="border-top:0px !important;border-bottom:0px !important"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-left" style="border-bottom-color: #ddd !important;background-color:#cdfdcc !important;color:#001d80 !important"><b>หมายเหตุ</b></td>
                    <td class="text-left" style="border-top:0px !important;border-bottom-color: #ddd !important"><?php echo $print->q_a_note ?></td>
                    <td style="border: 0px !important"></td>
                    <td style="border-top: 0px !important"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-left" style="border-bottom-color: #ddd !important;background-color:#cdfdcc !important;color:#001d80 !important;font-size:29px !important"><b>กำหนดยืนราคา</b></td>
                    <td class="text-left text-quo-sale" style="border-top:0px !important;border-bottom-color: #ddd !important"><i><?php echo $print->q_set_price ?></i></td>
                    <td class="text-left text-quo-sale" style="border-bottom: 4px double #000 !important;"><b>ราคารวมทั้งสิ้น</b></td>
                    <td class="text-right" style="border-bottom: 4px double #000 !important;"><?php echo $print->total_price ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-left" style="border-bottom-color: #ddd !important;background-color:#cdfdcc !important;color:#001d80 !important"><b>การส่งของ</b></td>
                    <td class="text-left text-quo-sale" style="border-top:0px !important;border-bottom-color: #ddd !important"><?php echo $print->q_set_delivery ?></td>
                    <td class="text-left text-quo-sale" style="border-bottom-color: #ddd !important">ราคาสินค้า</td>
                    <td class="text-right text-quo-sale" style="border-bottom-color: #ddd !important"><?php echo $print->price_vat ?></td>
                    <!-- <td class="text-right" style="border-bottom-color: #ddd !important"><?php echo $print->price_whitout_vat ?></td> -->
                </tr>
                <tr>
                    <td colspan="2" class="text-left" style="background-color:#cdfdcc !important;color:#001d80 !important"><b>รับประกัน</b></td>
                    <td class="text-left" style="color:#0043ff !important;border-top:0px !important;border-bottom-color: #ddd !important"><?php echo $print->q_warranty ?></td>
                    <td class="text-left text-quo-sale" style="font-size: 29px !important;">ภาษีมูลค่าเพิ่ม <?php echo $print->q_vat ?>%</td>
                    <td class="text-right text-quo-sale" ><?php echo $print->price_whitout_vat ?></td>
                    <!-- <td class="text-right"><?php echo $print->price_vat ?></td> -->
                </tr>
                <tr class="wrap-sum-total">
                    <td colspan="4" style="color:#fb0000 !important;background-color:#e3e3e3 !important"><i><b><?php echo $print->sum_total_th ?></b></i></td>
                    <td class="text-right" style="color:#fb0000 !important;background-color:#e3e3e3 !important"><b><?php echo $print->total_price ?></b></td>
                </tr>
            </tbody>
        </table>
        <div class="col-md-12" style="margin-bottom:15px;">
            <?php if (count($print->q_note) > 0 and !empty($print->q_note[array_key_first($print->q_note)])): ?>
                <?php foreach ($print->q_note as $key => $value): ?>
                    <?php if ($key != (count($print->q_note)-1)): ?>
                        <?php echo '<div class="d-flex"><div class="text-right" style="padding-right:0px;width:max-content!important">'.($key+1).'.</div><div class="text-left" style="padding-left:0px;">'.$value.'</div></div>'; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <span class="text-quo-sale">
                    จึงเรียนมาเพื่อทราบและโปรดพิจารณา
                </span>
            <?php endif; ?>
        </div>
        <div class="row text-center" style="margin-top: 10px !important;">
            <?php if ($print->brand != ''): ?>
            <div class="col-md-7 text-right">
                    <img class="col-md-4" src="<?php echo $this->public_url('file/images/quotation/brand.png') ?>" alt="">
            </div>
            <div class="col-md-5 row text-quo-sale">
                <div class="col-md-10">ขอแสดงความนับถือ</div>
                <div class="col-md-10">
                    <?php if ($head->signature == '' and $print->signature != ''): ?>
                        <br>
                        <br>
                        <br>
                    <?php else: ?>
                        <img class=""  src="<?php echo $this->public_url('file/images/user/signature/').$head->signature ?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="col-md-10">(นาย<?php echo $head->first_name.' '.$head->last_name ?>)</div>
                <div class="col-md-10"><?php echo $head->position_th ?></div>
            </div>
            <?php else: ?>
                <div class="col-md-7 text-right">
                        <!-- <img class="col-md-4" src="<?php echo $this->public_url('file/images/quotation/brand.png') ?>" alt=""> -->
                </div>
                <div class="col-md-5 row">
                    <div class="col-md-10">ขอแสดงความนับถือ</div>
                    <div class="col-md-10">
                        <?php if ($head->signature == ''): ?>
                            <br>
                            <br>
                        <?php else: ?>
                            <img class=""  src="<?php echo $this->public_url('file/images/user/signature/').$head->signature ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-10">(นาย<?php echo $head->first_name.' '.$head->last_name ?>)</div>
                    <div class="col-md-10"><?php echo $head->position_th ?></div>
                </div>
                <br>
            <?php endif; ?>
        </div>
        <div class="row ">
            <?php //for ($i=0; $i < (5-count($print->product)); $i++): ?>
                <div class="col-md-12 p-2">
                <?php //for ($i=0; $i < (9-count($print->product)); $i++): ?>
                    <!-- <br> -->
                <?php //endfor; ?>
                </div>
            <!-- <div class="col-md-12 text-right" style="padding-right: 110px;padding-top: 55px !important;">FW-SEV-02-01 Rev.<?php //echo $print->version ?></div> -->
            <?php if (!empty($print->q_agent_email)): ?>
                <div class="text-quo-sale" style="position: fixed !important;left: 0px;bottom: 0px;">โปรดส่งใบสั่งซื้อกลับมาที่ E-Mail : warinruk.w@xovic.com และ CC <?php echo $print->q_agent_email ?></div>
            <?php else: ?>
                <div class="text-quo-sale" style="position: fixed !important;left: 0px;bottom: 0px;">โปรดส่งใบสั่งซื้อกลับมาที่ E-Mail : warinruk.w@xovic.com</div>
            <?php endif; ?>
            <div class="" style="position: fixed !important;right: 0px;bottom: 0px;">FW-SRS-01-01 Rev.00</div>
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
                            url: '<?php echo $this->base_url('employee/update_quotation') ?>',
                            method: 'post',
                            data: {type:'print',q_id:'<?php echo $print->q_id ?>'},
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
                                    setTimeout(function(){window.location.href = "<?php echo $this->base_url('page/quotation') ?>";},1000);
                                }else {
                                    Swal.fire({
                                        type: 'warning',
                                        title: 'ไม่สามารถบันทึกได้',
                                        showConfirmButton:false,
                                        timer: 1500
                                    });
                                    setTimeout(function(){window.location.href = "<?php echo $this->base_url('page/quotation') ?>";},1000);
                                }
                            }
                        })
                    }else {
                        setTimeout(function(){window.location.href = "<?php echo $this->base_url('page/quotation') ?>";},1000);
                    }
                })
            }
        </script>
    </body>
</html>
