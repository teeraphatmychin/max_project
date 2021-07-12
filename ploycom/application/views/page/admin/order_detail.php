<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
        .item{
            margin-bottom:10%;
        }
        .panel{
            position: relative;
        }
        .panel-body{
            display:none;
        }
        .panel .panel-head .button{
            padding: 0px;
        }
        @media (max-width: 601px) {
            .wrap-item{
                width:48%;
            }
            .wrap-item:nth-child(2n+2){
                margin-left: 4%;
            }
        }
        @media (min-width:601px){
            .wrap-item:nth-child(4n+1){
                margin-left: 0%;
            }
            .wrap-item{
                margin-left: 2%;
                width:23.5%;
            }
        }
        </style>
    </head>
    <body class="light-grey content" style="max-width:1600px">
        <!-- Sidebar/menu -->
        <?php $this->set_page('admin/left_nav') ?>


        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="overlay hide-large animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="main" style="margin-left:300px">

            <!-- Header -->
            <header id="portfolio">
                <a href="#"><img src="<?php echo $this->public_url('file/images/system/logo/ploycom_logo.png') ?>" style="width:65px;" class="circle right margin hide-large hover-opacity"></a>
                <span class="button hide-large xxlarge hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
                <div class="container">
                    <h1><b>รายการออเดอร์</b></h1>
                    <div class="section bottombar padding-16">

                        <button onclick="window.history.back()" class="button red round"><i class="fa fa-chevron-left"></i> ย้อนกลับ</button>

                        <!-- <span class="margin-right">Filter:</span>
                        <a href="<?php echo $this->base_url('admin/purchase_report') ?>" class="button theme-d4 round white">ทั้งหมด</a>
                        <a href="<?php echo $this->base_url('admin/purchase_report/already_paid') ?>" class="button white round">ยังไม่ได้ชำระเงิน</a>
                        <a href="<?php echo $this->base_url('admin/purchase_report/not_paid') ?>" class="button white round">ชำระเงินแล้ว</a>
                        <a href="<?php echo $this->base_url('admin/purchase_report/canceled') ?>" class="button white round">ถูกยกเลิก</a> -->
                    </div>
                </div>
            </header>

            <!-- First Photo Grid-->
            <form name="update_order" class="" action="<?php echo $this->base_url('admin/update_order_form') ?>" method="post">
            <div class="row-padding container">
                <div class="col l3 m6 s12">
                    <label><b>วันเวลาที่สั่งซื้อ</b></label>
                    <input class="input border margin-bottom round center" type="text" name="product_name" value="<?php echo $order[0]->order_date ?> น." disabled>
                </div>
                <div class="col l2 m6 s12">
                    <label><b>เลขที่ใบสั่งซื้อ</b></label>
                    <input class="input border round center margin-bottom" type="text"  name="product_id" value="<?php echo $order[0]->invoice ?>" disabled>
                </div>
                <div class="col l3 m6 s12">
                    <label class="col s12"><b>วิธีการชำระเงิน/ธนาคารที่ชำระเงิน</b></label>
                    <input class="input border margin-bottom round center" type="text"  name="product_brand" value="<?php echo $order[0]->bank_name.'/'.$order[0]->method_of_payment ?>" disabled>
                </div>
                <div class="col l4 m6 s12 center">
                    <label><b>ราคารวม</b></label>
                    <input class="input border margin-bottom round center" type="text"  name="product_price" value="<?php echo $sum_total ?>" disabled>
                </div>
                <div class="col l4 m6 s12">
                    <label><b>สถานะ</b></label>
                    <input type="hidden" name="order_id" value="<?php echo $order[0]->order_id ?>">
                    <select class="input border round margin-bottom" name="order_status" required></select>
                </div>
                <div class="col l4 m6 s12 center">
                    <label><b>เลขที่ใบส่งของ</b></label>
                    <input class="input border margin-bottom round center" type="text"  name="order_post" value="<?php echo $order[0]->order_post ?>">
                </div>
                <div class="col l12 m6 s12" style="padding-top:23px;">
                    <button type="submit" class="green button round"><i class="fa fa-save"></i> บันทึก</button>
                </div>
            </form>
                <div class="col margin-top">
                    <div class="panel">
                        <div class="panel-head">
                            <div class="text-theme button" target="order_detail">คลิกดูรายละเอียด <i class="fa fa-caret-down"></i></div>
                            <?php if (count($payment) > 0): ?>
                                <div class="text-theme button" target="slip">คลิกเพื่อดูสลิป <i class="fa fa-caret-down"></i></div>
                            <?php endif; ?>
                        </div>
                        <div class="panel-body order_detail">
                            <table class="table-all" border="1">
                                <thead>
                                    <tr>
                                        <td colspan="3">วันที่สั่งซื้อ <?php echo $order[0]->order_date.' น.' ?> คุณ: <?php echo $customer_name ?></td>
                                    </tr>
                                    <tr>
                                        <th>สินค้า</th>
                                        <th>จำนวน</th>
                                        <th>ราคา(บาท)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($product as $key => $value): ?>
                                    <tr>
                                        <td><?php echo $product[$key]->product_name ?></td>
                                        <td><?php echo $product[$key]->amount ?></td>
                                        <td><?php echo $product[$key]->product_price ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot class="">
                                    <tr>
                                        <td class="right-align padding-right" colspan="2">จำนวนเงินรวม</td>
                                        <td class="center"><?php echo $total; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="right-align padding-right" colspan="2">ส่วนลด</td>
                                        <td class="center"><?php echo $discount; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="right-align padding-right" colspan="2">รวมมูลค่าสินค้า</td>
                                        <td class="center"><?php echo $sum_total; ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="panel-body slip row">
                            <?php foreach ($payment as $key_pay => $value_pay): ?>
                                <div class="col l2 m3 s5 margin-bottom margin-right padding" style="max-width:400px">
                                    <div class="slip-img">
                                        <a href="<?php echo $this->image_url('system/confirm_image/').$payment[$key_pay]->confirm_image ?>" target="_blank">
                                            <img src="<?php echo $this->image_url('system/confirm_image/').$payment[$key_pay]->confirm_image ?>" class="img" alt="">
                                        </a>
                                        <?php if ($payment[$key_pay]->status == 2): ?>
                                            <span class="text-red medium"><b>ไม่ผ่าน</b></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="slip-btn center">
                                        <form class="" action="<?php echo $this->base_url('admin/update_order_form') ?>" method="post">
                                            <input type="hidden" name="order_id" value="<?php echo $order[0]->order_id ?>">
                                            <input type="hidden" name="payment_id" value="<?php echo $payment[$key_pay]->payment_id ?>">
                                            <?php if ($payment[$key_pay]->status != 2): ?>
                                                <button type="submit" class="button red round small margin-top">ไม่ผ่าน</button>
                                            <?php endif; ?>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="black center padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="hover-opacity">w3.css</a></div> -->
            <!-- End page content -->
        </div>
        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
            $(document).ready(function(){

                let this_order_status = "<?php echo $order[0]->order_status ?>";
                let order_status = ['รอการชำระเงิน','รอตรวจสอบการชำระเงิน','ชำระเงินแล้ว','กำลังส่งของ','ยกเลิก'];
                let status_html = '';
                $.each(order_status,function(key,value){
                    if (key == this_order_status) {
                        status_html += '<option value="'+key+'" selected>'+value+'</option>';
                    }else if(key != 4) {
                        status_html += '<option value="'+key+'">'+value+'</option>';
                    }
                });
                $('select[name=order_status]').html(status_html);



                $('.panel').on('click','.panel-head .button',function(){
                    let target = $(this).attr('target');
                    if ($(this).closest('.panel').find('.panel-body.'+target).is(':visible')) {
                        $(this).closest('.panel').find('.panel-body.'+target).hide(500);
                    }else {
                        $(this).closest('.panel').find('.panel-body').hide(500);
                        $(this).closest('.panel').find('.panel-body.'+target).show(500);

                    }
                });



                let filter = "<?php echo $url = isset($filter[2]) ? $filter[2] : null ?>";
                if (filter != '') {
                    $('.section .button').each(function(key,value){
                        if($(this).attr('href').indexOf(filter) > -1){
                            $(this).addClass('theme-d4');
                        }else {
                            $(this).removeClass('theme-d4');
                        }
                    });
                }
            });
        </script>
    </body>

</html>
