<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
        <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
        <title><?php echo 'Quotation'; ?></title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
        <!-- <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet"> -->
        <link href="<?php echo $this->public_url('libs/material/') ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
        <link href="<?php echo $this->public_url('css/font-Angsana.css') ?>" rel="stylesheet" />
        <link href="<?php echo $this->public_url('css/font-Kodchiangregular.css') ?>" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
        <link href="<?php echo $this->public_url('css/table_quotation.css') ?>" rel="stylesheet" />
        <style media="screen">
            /* body,h1,h2,h3,h4,h5,h6,.wide {font-family: "AngsanaNew", sans-serif !important;} */
            /* body > .wrap-form > *{
                font-family: "AngsanaNew", sans-serif !important;
            } */
            .table > thead > tr >th{
                border-bottom: 1px solid #000 !important;
            }
            .table tr th,.table tr td{
                /* font-size: 12px !important; */
            }
            .table>thead>tr>th{
                padding: 0px;
                text-align: center;
            }
        </style>
        <!-- <style type="text/css" media="print">
            .page
            {
                -webkit-transform: rotate(-90deg);
                -moz-transform:rotate(-90deg);
                filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
            }
        </style> -->
        <style type="text/css" media="print">
            @media print{@page {size:A4 landscape;margin: 2mm; }}
            .table > thead > tr >th{
                border-bottom: 1px solid #000 !important;
            }
            .table tr th,.table tr td{
                font-size: 10px !important;
            }
            .table>thead>tr>th,.table>tbody>tr>td{
                padding: 0px !important;
                text-align: center;
            }
        </style>
    </head>
    <!-- <body class="bg-white" onload="window.print()" style="padding-left:45px;padding-top:45px"> -->
    <body class="bg-white" onload="window.print()" onafterprint="afterprint()" style="margin:0px">
    <!-- <body class="bg-white " style=""> -->
        <table class="table table-hover table-bordered tb-quotation-list">
            <thead class="text-info ">
                <tr>
                    <th>เลขที่ใบเสนอราคา</th>
                    <th>วันที่เสนอราคา</th>
                    <th>ใบงาน RO</th>
                    <th>ชื่อตัวแทนฝ่ายขาย</th>
                    <th>ชื่อหัวหน้าเขต</th>
                    <!-- <th>ประเภทเสนอราคา</th> -->
                    <th>เครื่องรุ่น</th>
                    <th>หมายเลขเครื่อง</th>
                    <th>โรงพยาบาล</th>
                    <th>แผนก</th>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>จำนวน</th>
                    <th>ราคา</th>
                    <th>ส่วนลด</th>
                    <th>ราคาสุทธิ</th>
                    <th>วันที่ได้รับ PO</th>
                    <th>เลขที่ PO</th>
                    <th>หมายเหตุ</th>
                    <!-- <th>สถานะ</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($print as $key => $value): ?>
                    <tr>
                        <td><?php echo $value->q_number ?></td>
                        <td><?php echo $value->q_create_date_th ?></td>
                        <td><?php echo $value->q_ro ?></td>
                        <td><?php echo $value->q_service_name ?></td>
                        <td><?php echo $value->q_head_service_name ?></td>
                        <td><?php echo $value->q_brand ?></td>
                        <td><?php echo $value->q_sn ?></td>
                        <td><?php echo $value->q_customer_name ?></td>
                        <td><?php echo $value->q_customer_department ?></td>
                        <td><?php echo $value->q_model ?></td>
                        <td>-</td>
                        <td>-</td>
                        <td><?php echo $value->total_price ?></td>
                        <td><?php echo $value->q_discount ?></td>
                        <td><?php echo $value->sum_total ?></td>
                        <td><?php echo $value->q_po_date_th ?></td>
                        <td><?php echo $value->q_po ?></td>
                        <td><?php echo $value->q_remark_customer ?></td>
                        <?php
                            // $q_status = $value->q_status;
                            // switch ($q_status):
                            //     case 'new':
                            //         $q_status = '<span class="text-info">สร้างใหม่</span>';
                            //         break;
                            //     case 'edit':
                            //         $q_status = '<span class="text-warning">ต้องแก้ไข</span>';
                            //         break;
                            //     case 'cancel':
                            //         $q_status = '<span class="text-danger">ยกเลิก</span>';
                            //         break;
                            //     case 'approved':
                            //         $q_status = '<span class="text-success">หัวหน้าอนุมัติ</span>';
                            //         if ($value->q_status_customer != ''){
                            //             switch ($value->q_status_customer) {
                            //                 case 'created':
                            //                     $q_status += ',<span class="text-danger">สั่งพิมพ์แล้ว</span>';
                            //                     break;
                            //                 case 'reject':
                            //                     $q_status += ',<span class="text-danger">ลูกค้ายกเลิก</span>';
                            //                     break;
                            //                 case 'approved':
                            //                     $q_status += ',<span class="text-success">ลูกค้าอนุมัติ</span>';
                            //                     break;
                            //                 default:
                            //             }
                            //         }
                            //         break;
                            //     default:
                            //         // code...
                            //         break;
                            // endswitch;
                         ?>
                         <!-- <td><?php echo $q_status ?></td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/jquery.min.js"></script>
        <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/sweetalert2.js"></script>
        <script type="text/javascript">
            function afterprint(){
                setTimeout(function(){window.location.href = "<?php echo $this->base_url('page/quotation_report') ?>";},1000);
            }
        </script>
    </body>
</html>
