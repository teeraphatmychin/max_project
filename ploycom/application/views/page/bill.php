<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
            .data-ploycom{
                font-size: 1vw;
            }
            .order-detail table tr th{
                text-align: right;
            }
            .order-head .header{
                font-size: 30px;
            }
            .order-head .order-address,.order-head .order-detail{
                font-size: 13px;
            }
            .btn-group{
                font-size: 10px;
            }
            .concluded-head{
                font-size: 20px;
            }
            .bank{
                font-size: 12px;
            }
            .data-company{
                font-size: 12px;
            }
            .data-order .order-address table th{
                width: 10%;
            }
            @media (min-width:601px){
                .data-company{
                    font-size: 16px;
                }
                .order-head .header{
                    font-size: 30px;
                }
                .order-head .order-address,.order-head .order-detail{
                    font-size: 13px;
                }
                .btn-group{
                    font-size: 10px;
                }
                .concluded-head{
                    font-size: 20px;
                }
                .bank{
                    font-size: 12px;
                }
                .data-company{
                    font-size: 12px;
                }
            }
            @media (min-width:993px){
                .data-company{
                    font-size: 18px;
                }
                .order-head .header{
                    font-size: 30px;
                }
                .order-head .order-address,.order-head .order-detail{
                    font-size: 16px;
                }
                .btn-group{
                    font-size: 18px;
                }
                .concluded-head{
                    font-size: 20px;
                }
                .bank{
                    font-size: 25px;
                }
            }

        </style>
    </head>
    <body onafterprint="afterprint()">
        <?php $this->view('partail/top_nav') ?>
        <div class="content white" style="max-width:1200px;padding-top:0px;background-color:white">
            <div class="hide-small" style="margin-top:115px"></div>
            <!-- !PAGE CONTENT! -->
            <div class="main">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>
                <div class="row container margin-bottom main-concluded hide-small">
                    <div class="concluded">
                        <div class="concluded-head row print-hide">
                            <div class="col s12 center text-theme-d4">
                                <h1>การสั่งซื้อเสร็จสมบูรณ์</h1>
                            </div>
                            <div class="right col l10 m12 s12">
                                <div class="">
                                    - คำสั่งซื้ออยู่ในระหว่างการรอชำระเงิน กรุณาชำระสินค้าและส่งหลักฐานภายใน 24 ชั่วโมง
                                </div>
                                <div class="text-red">
                                    - หากไม่ชำระเงินภายในเวลาที่กำหนดออเดอร์ของท่านจะถูกยกเลิก
                                </div>
                                <div class="">
                                    - หลังจากชำระค่าสินค้าแล้วทางเราจะจัดส่งสินค้าให้ท่านภายใน 1 - 3 วันทำการ
                                </div>
                                <div class="">
                                    - หากยังไม่ได้รับสินค้าภายใน 7 วัน หลังจากชำระค่าสินค้าเรียบร้อยแล้ว กรุณาติดต่อกลับมาทางบริษัท
                                </div>
                            </div>
                        </div>
                        <div class="conlcuded-body row">
                            <div class="center container " >
                                <div class="bank border padding round col m7 s12 row" style="margin:auto;float:unset">
                                    <div class="bank-img col s3">
                                        <img src="<?php echo $this->image_url('system/bank/').$bank[0]->bank_img ?>" class="img" alt="">
                                    </div>
                                    <div class="bank-detail col s8 right left-align padding-16 " style="color:#7b7b7b">
                                        <div class="" style="color:<?php echo $bank[0]->bank_color?>"><?php echo $bank[0]->bank_name ?></div>
                                        <div class="">ชื่อบัญชี <?php echo $bank[0]->bank_ac_name ?></div>
                                        <div class="" style="color:<?php echo $bank[0]->bank_color?>">เลขบัญชี <?php echo $bank[0]->bank_ac_number ?></div>
                                    </div>
                                </div>
                                <div class="col s12 margin-top print-hide btn-group">
                                    <a href="<?php echo $this->base_url('order/print_bill/').$invoice ?>" class="button round theme-d4 btn-prin">พิมพ์แบบฟอร์มการชำระเงิน</a>
                                    <a href="<?php echo $url = isset($_SESSION['member']) && !empty($_SESSION['member'])? $this->base_url('customer/order') : $this->base_url('order/order_now/').$invoice; ?>" class="button bg-default round">ดูรายการคำสั่งซื้อ</a>
                                    <a href="<?php echo $this->base_url('') ?>" class="button green round"><i class="fa fa-home"></i> กลับสู่หน้าหลัก</a>
                                </div>
                            </div>
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
                                    <div class="caption col s6 theme padding center border-top border-right border-left">
                                        ที่อยู่ในการจัดส่ง
                                    </div>
                                    <div class="caption col s5 theme padding right center border-top border-right border-left">
                                        รายละเอียดการสั่งซื้อ
                                    </div>
                                    <div class="order-address col s6 padding-large border">
                                        <table>
                                            <tr>
                                                <th>ชื่อ :</th>
                                                <td><?php echo $order[0]->name ?></td>
                                            </tr>
                                            <tr>
                                                <th>ที่อยู่ :</th>
                                                <td>
                                                    <?php
                                                        $address = explode('/',$order[0]->address);
                                                        foreach ($address as $key_address => $value_address):
                                                            echo $address[$key_address].' ';
                                                        endforeach;
                                                     ?>
                                                    <?php //echo $order[0]->address ?>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="order-detail padding col s5 border right">
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
                                                <td class="text-red"><?php echo $order[0]->invoice ?></td>
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
                                                <tr class="theme">
                                                    <th>ลำดับ</th>
                                                    <th>สินค้า</th>
                                                    <th>จำนวน</th>
                                                    <th>ราคาต่อหน่วย</th>
                                                    <th class="center">ราคา</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($product as $key => $value): ?>
                                                    <tr>
                                                        <td><?php echo ($key+1) ?></td>
                                                        <td><?php echo $product[$key]->product_name ?></td>
                                                        <td><?php echo $product[$key]->amount ?></td>
                                                        <td><?php echo $product[$key]->product_price ?></td>
                                                        <td class="center"><?php echo $product[$key]->sum ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot class="">
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
                        </div>
                    </div>
                </div>
                <div class="hide-large hide-medium print-hide">
                    <div class="concluded-head row container">
                        <div class="col s12 center text-theme">
                            <h2>การสั่งซื้อเสร็จสมบูรณ์</h2>
                        </div>
                        <div class="right col l10 m12 s12 large">
                            <div class="center">
                                หมายเลจการสั่งซื้อของคุณคือ :
                            </div>
                            <div class="text-red center xlarge">
                                <?php echo $order[0]->invoice ?>
                            </div>
                        </div>
                        <div class="center medium">
                            เราได้จัดส่งรายละเอียดคำสั่งซื้อให้กับคุณ เรียบร้อยแล้ว กรุณาตรวจสอบ
                            <a href="<?php echo $this->base_url('login') ?>" class="text-blue">ได้ที่นี่</a>
                        </div>
                        <a href="<?php echo $this->base_url('product') ?>" class="button theme round margin-top large col s12">กลับไปยังหน้าสินค้า</a>
                    </div>
                    <div class="">

                    </div>
                </div>
            </div>
        </div>
        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.btn-print').click(function(){
                    $('.main-concluded').removeClass('hide-small');
                    $('.bank').css({
                        'font-size':'25px'
                    });
                    $('.order-product table thead tr th').addClass('text-black');
                    $('.caption').addClass('text-black');
                    $('.caption').removeClass('theme');
                    $('.print-hide').addClass('hide');
                    $('.order-address,.order-detail').css({
                        'font-size':'10px'
                    });
                    window.print();
                });
            });
            function afterprint(){
                $('.order-address,.order-detail').css({
                    'font-size':'16px'
                });
                $('.print-hide').removeClass('hide');
                $('.order-product table thead tr th').removeClass('text-black');
                $('.caption').addClass('theme');
                $('.caption').removeClass('text-black');
                $('.order-address,.order-detail').addClass('medium');
                $('.main-concluded').addClass('hide-small');
            }
        </script>
    </body>
</html>
