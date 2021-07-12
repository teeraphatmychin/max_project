<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
            /* .customer .customer-content{
                margin-left: 250px;
            } */
            th{
                text-align: center !important;
            }
            td{
                padding:15px !important;
            }
            .my-panel{
                position: relative;
            }
            .my-panel .my-panel-head .button{
                padding: 0px;
            }
            .my-panel-body{
                display:none;
            }
            .block .block-body table th{
                width:20%;
                text-align: right;
            }
            .block .block-body table td{
                padding-left: 10px;
            }
            .block .block-body table td,.block .block-body table th{
                /* border-bottom: solid 1px #ddd!important; */
            }
            .button-small{
                padding:2px 15px;
            }
            @media (min-width:601px){

            }
            @media (min-width:993px){

            }

        </style>
    </head>
    <body>
        <?php
            // echo "<pre>";print_r($order);exit;
        ?>
        <?php $this->view('partail/top_nav') ?>
        <div class="content white" style="max-width:1200px;padding-top:0px;background-color:white">
        <div class="hide-small" style="margin-top:115px"></div>

            <!-- !PAGE CONTENT! -->
            <div class="main">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>
                <div class="row container margin-bottom">
                    <div class="xxlarge head-page border-theme">
                        <strong>แจ้งชำระเงิน</strong>
                    </div>
                    <div class="customer row">
                        <div class="customer-left-nav col l3 m3 s12 padding-small large bar-block" >
                        <!-- <div class="customer-left-nav col s3 padding-small large bar-block" style="height:100vh"> -->
                            <a href="javascript:void(0)" class="bar-item theme-d5 center" style="cursor:default">เมนู</a>
                            <a href="<?php echo $this->base_url('customer/profile') ?>" class="bar-item button theme-l4 hover-theme-l1">ข้อมูลลูกค้า</a>
                            <a href="<?php echo $this->base_url('customer/order') ?>" class="bar-item button theme-l4 hover-theme-l1 ">รายการคำสั่งซื้อ</a>
                            <a href="<?php echo $this->base_url('customer/order/confirm') ?>" class="bar-item button theme-d2">แจ้งชำระเงิน</a>
                            <a href="<?php echo $this->base_url('login/logout') ?>" class="bar-item button theme-l4 hover-theme-l1">ออกจากระบบ</a>
                            <?php //$this->set_page('customer/customer_left_nav') ?>
                        </div>
                        <?php //if ($order == ''): ?>
                            <!-- <div class="customer-content col l9 m9 s12 right center" style="padding:10px">
                                <h3 style="color:#7b7b7b">ไม่มีออเดอร์ที่ต้องยืนยัน</h3>
                            </div> -->
                        <?php //else: ?>

                            <div class="customer-content col l9 m9 s12 right" style="padding:10px">
                                <table class="table-all order" border="1">
                                    <thead>
                                        <tr class="theme">
                                            <th>เลขที่ใบสั่งซื้อ</th>
                                            <th>วัน/เวลาที่สั่งซื้อ</th>
                                            <th>วิธีชำระเงิน</th>
                                            <th>สถานะ</th>
                                            <th>ยืนยัน</th>
                                        </tr>
                                    </thead>
                                    <?php if (!empty($order)): ?>
                                        <?php foreach ($order as $key => $value): ?>
                                            <tbody class="page">
                                                <tr class="theme-l5">
                                                    <td><?php echo $order[$key]->invoice ?></td>
                                                    <td><?php echo $order[$key]->order_date.' น.' ?></td>
                                                    <td><?php echo $order[$key]->bank_name.' '.$order[0]->method_of_payment ?></td>
                                                    <td><?php echo $order_status = $order[$key]->order_status == 'ถูกยกเลิก'?'<span class="text-red">'.$order[$key]->order_status.'</span>' : $order[$key]->order_status ?></td>
                                                    <td class="center">
                                                        <?php if ($order[$key]->order_status != 'ถูกยกเลิก'): ?>
                                                            <form method="post" action="<?php echo $this->base_url('order/add_confirm_image') ?>" enctype="multipart/form-data">
                                                                <input type="hidden" name="order_id" value="<?php echo $order[$key]->order_id ?>">
                                                                <input type="hidden" name="url" value="<?php echo $_GET['url'] ?>">
                                                                <label for="<?php echo 'file'.$key ?>">
                                                                    <input id="<?php echo 'file'.$key ?>" type="file" accept="image/*" name="file" value="" hidden>
                                                                    <div class="button round green button-small">แนบสลิป</div>
                                                                </label>
                                                            </form>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr class="bg-none">
                                                    <td colspan="6" class="border-left border-right">
                                                        <div class="my-panel">
                                                            <div class="my-panel-head">
                                                                <div class="text-theme button" target="order_detail">คลิกดูรายละเอียด <i class="fa fa-caret-down"></i></div>
                                                                <a class="text-theme button" href="<?php echo $this->base_url('order/bill/').$order[$key]->invoice ?>"><i class="fa fa fa-search"></i></a>
                                                                <?php if (count($order[$key]->payment) > 0): ?>
                                                                    <div class="text-theme button" target="slip">คลิกเพื่อดูสลิป <i class="fa fa-caret-down"></i></div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="my-panel-body order_detail">
                                                                <table class="table-all" border="1">
                                                                    <thead>
                                                                        <tr>
                                                                            <td colspan="3">วันที่สั่งซื้อ <?php echo $order[$key]->order_date.' น.' ?> คุณ: <?php echo $order[$key]->name ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>สินค้า</th>
                                                                            <th>จำนวน</th>
                                                                            <th>ราคา(บาท)</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($order[$key]->order_detail['product'] as $key_product => $value_product): ?>
                                                                            <tr>
                                                                                <td><?php echo $order[$key]->order_detail['product'][$key_product]->product_name ?></td>
                                                                                <td><?php echo $order[$key]->order_detail['product'][$key_product]->amount ?></td>
                                                                                <td><?php echo $order[$key]->order_detail['product'][$key_product]->product_price ?></td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                    <tfoot class="">
                                                                        <tr>
                                                                            <td class="right-align padding-right" colspan="2">จำนวนเงินรวม</td>
                                                                            <td class="center"><?php echo $order[$key]->total; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="right-align padding-right" colspan="2">ส่วนลด</td>
                                                                            <td class="center"><?php echo $order[$key]->discount; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="right-align padding-right" colspan="2">รวมมูลค่าสินค้า</td>
                                                                            <td class="center"><?php echo $order[$key]->sum_total; ?></td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                            <div class="my-panel-body slip row">
                                                                <?php foreach ($order[$key]->payment as $key_pay => $value_pay): ?>
                                                                    <div class="col l2 m3 s5 margin-bottom margin-right">
                                                                        <div class="slip-img">
                                                                            <a href="<?php echo $this->image_url('system/confirm_image/').$order[$key]->payment[$key_pay]->confirm_image ?>" target="_blank">
                                                                                <img src="<?php echo $this->image_url('system/confirm_image/').$order[$key]->payment[$key_pay]->confirm_image ?>" class="img" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="slip-btn center">
                                                                            <form class="" action="<?php echo $this->base_url('order/del_confirm_image') ?>" method="post">
                                                                                <input type="hidden" name="url" value="<?php echo $_GET['url'] ?>">
                                                                                <input type="hidden" name="payment_id" value="<?php echo $order[$key]->payment[$key_pay]->payment_id ?>">
                                                                                <button type="submit" class="button red round">ลบรูปภาพ</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php endforeach; ?>
                                </table>
                                <div class="right margin-top my-pagination hide-small">
                                    <div class="bar border round ">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>



            <?php $this->view('partail/main_js') ?>
            <script type="text/javascript">
                $(document).ready(function(){
                    my_pagination();

                    function my_pagination(){
                        var number_of_item = $('.page').length;
                        var limit_per_page = 4;
                        $('.page:gt('+(limit_per_page-1)+')').hide();
                        var total_page = Math.ceil(number_of_item / limit_per_page);
                        $('.my-pagination .bar').append('<a id="previous-page" href="javascript:void(0)" class="bar-item button">&laquo;</a>');
                        $('.my-pagination .bar').append('<a href="javascript:void(0)" class="bar-item button active current-page">1</a>');
                        for (var i = 2; i <= total_page; i++) {
                            $('.my-pagination .bar').append('<a href="javascript:void(0)" class="bar-item button current-page">'+i+'</a>');
                        }
                        $('.my-pagination .bar').append('<a id="next-page" href="javascript:void(0)" class="bar-item button">&raquo;</a>');

                        $('.my-pagination .bar').on('click','.current-page',function(){
                            if ($(this).hasClass('active')) {
                                return false;
                            }else {
                                var current_page = $(this).index();
                                $('.my-pagination .bar .current-page').removeClass('active');
                                $(this).addClass('active');

                                $('.page').hide();

                                var grand_total = limit_per_page * current_page;
                                for (var i = grand_total - limit_per_page; i < grand_total; i++) {
                                    $('.page:eq('+i+')').show();
                                }
                            }
                        });
                        $('.my-pagination .bar').on('click','#next-page,#previous-page',function(){
                            var current_page = $('.my-pagination .bar .current-page.active').index();
                            if ($(this).attr('id') == 'previous-page') {
                                var new_current_page = current_page - 1;
                                var new_total_page = 1;
                            }else {
                                var new_current_page = current_page + 1;
                                var new_total_page = total_page;
                            }
                            if (current_page === new_total_page) {
                                return false;
                            }else {
                                $('.my-pagination .bar .current-page').removeClass('active');
                                $('.page').hide();
                                var grand_total = limit_per_page * new_current_page;
                                for (var i = grand_total - limit_per_page; i < grand_total; i++) {
                                    $('.page:eq('+i+')').show();
                                }
                                $('.my-pagination .bar .current-page:eq('+ (new_current_page - 1) +')').addClass('active');
                            }
                        });

                    }


                    $('.customer').on('change','table.order input[type=file]',function(){
                        $(this).closest('form').submit();
                    });
                    $('.my-panel').on('click','.my-panel-head .button',function(){
                        let target = $(this).attr('target');
                        if ($(this).closest('.my-panel').find('.my-panel-body.'+target).is(':visible')) {
                            $(this).closest('.my-panel').find('.my-panel-body.'+target).hide(300);
                        }else {
                            $(this).closest('.my-panel').find('.my-panel-body').hide(300);
                            $(this).closest('.my-panel').find('.my-panel-body.'+target).show(300);

                        }
                    });
                });
            </script>
        </body>
    </html>
