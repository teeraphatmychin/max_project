<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title><?php echo $invoice ?></title>
        <?php $this->view('partail/main_css') ?>
    </head>
    <body onafterprint="afterprint()">
        <button type="button" class="btn-print hide" onclick="window.print()"></button>
        <div class="content white" style="max-width:1200px;padding-top:0px;background-color:white">
            <div class="hide-small" style="margin-top:115px"></div>
            <!-- !PAGE CONTENT! -->
            <div class="main">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>
                <div class="row container margin-bottom main-concluded">
                    <div class="concluded">
                        <div class="conlcuded-body row">

                            <div class="col s12 padding-24 row-padding company">
                                <div class="col s9 data-company">
                                    <div class=""><b>ร้านพลอยคอม</b></div>
                                    <div class="">99/9 ม.6 ต.ในเมือง อ.เมืองพิษณุโลก 65000</div>
                                    <div class=""><b>โทร</b> 098-7654321</div>
                                    <div class=""><b>เลขประจำตัวผู้เสียภาษี</b> 02-3666-612579613</div>
                                </div>
                                <div class="col s2 right-align img-company" style="position:relative">
                                    <img src="<?php echo $this->image_url('system/logo/ploycom_logo.png') ?>" style="width:100%;float:right" alt="">
                                </div>
                            </div>
                            <div class="data-order col s12">
                                <div class="order-head">
                                    <div class="center header">
                                        ใบสั่งซื้อ
                                    </div>
                                    <div class="caption col s6 text-black  center border-top border-right border-left">
                                        ที่อยู่ในการจัดส่ง
                                    </div>
                                    <div class="caption col s5 text-black  right center border-top border-right border-left">
                                        รายละเอียดการสั่งซื้อ
                                    </div>
                                    <div class="order-address col s6 padding border" style="font-size:10px">
                                        <table>
                                            <tr>
                                                <td>ชื่อ :</td>
                                                <td><?php echo $order[0]->name ?></td>
                                            </tr>
                                            <tr>
                                                <td>ที่อยู่ :</td>
                                                <td>
                                                    <?php
                                                        $address = explode('/',$order[0]->address);
                                                        foreach ($address as $key_address => $value_address):
                                                            echo $address[$key_address].' ';
                                                        endforeach;
                                                     ?>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="order-detail padding col s5 border right" style="font-size:10px">
                                        <table>
                                            <tr>
                                                <th>วันที่ :</th>
                                                <td><?php echo $order[0]->order_date ?> น.</td>
                                            </tr>
                                            <tr>
                                                <th>รหัสลูกค้า :</th>
                                                <td><?php echo $order[0]->member_id ?></td>
                                            </tr>
                                            <tr>
                                                <th>เลขที่ใบสั่งซื้อ :</th>
                                                <td><?php echo $order[0]->invoice ?></td>
                                            </tr>
                                            <tr>
                                                <th>การชำระเงิน :</th>
                                                <td><?php echo $bank[0]->bank_initials.' '.$order[0]->method_of_payment ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="order-product col s12 padding-24">
                                        <table class="table-all col s12" border="1">
                                            <thead >
                                                <tr class="theme" style="color:#000 !important;font-size:13px">
                                                    <th>ลำดับ</th>
                                                    <th>สินค้า</th>
                                                    <th>จำนวน</th>
                                                    <th>ราคาต่อหน่วย</th>
                                                    <th class="center">ราคา</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($product as $key => $value): ?>
                                                    <tr style="font-size: 10px">
                                                        <td><?php echo ($key+1) ?></td>
                                                        <td><?php echo $product[$key]->product_name ?></td>
                                                        <td><?php echo $product[$key]->amount ?></td>
                                                        <td><?php echo $product[$key]->product_price ?></td>
                                                        <td class="center"><?php echo $product[$key]->sum ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot class="" style="font-size: 12px">
                                                <tr>
                                                    <td class="right-align padding-right" colspan="4">จำนวนเงินรวม</td>
                                                    <td class="center"><?php echo $total; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="right-align padding-right" colspan="4">ส่วนลด</td>
                                                    <td class="center"><?php echo $discount; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="right-align padding-right" colspan="4">รวมมูลค่าสินค้า</td>
                                                    <td class="center"><?php echo $sum_total; ?></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="center container">
                                <div class="bank border padding round col m7 s8 row" style="margin:auto;float:unset;font-size:16px">
                                    <div class="bank-img col s3">
                                        <img src="<?php echo $this->image_url('system/bank/').$bank[0]->bank_img ?>" class="img" alt="">
                                    </div>
                                    <div class="bank-detail col s8 right left-align padding-16 " style="color:#7b7b7b">
                                        <div class="" style="color:<?php echo $bank[0]->bank_color?>"><?php echo $bank[0]->bank_name ?></div>
                                        <div class="">ชื่อบัญชี <?php echo $bank[0]->bank_ac_name ?></div>
                                        <div class="" style="color:<?php echo $bank[0]->bank_color?>">เลขบัญชี <?php echo $bank[0]->bank_ac_number ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".btn-print").trigger("click");
            });
            function afterprint(){
                window.location.href = "<?php echo $this->base_url('order/bill/').$invoice ?>";
            }
        </script>
    </body>
</html>
