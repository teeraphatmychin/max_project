<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
            th{
                text-align: center !important;
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

        </style>
    </head>
    <body>
        <?php $this->view('partail/top_nav') ?>
        <div class="content white" style="max-width:1200px;padding-top:0px;background-color:white">
            <div class="hide-small" style="margin-top:115px"></div>

            <!-- !PAGE CONTENT! -->
            <div class="main">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>

                <div class="row container margin-bottom">
                    <div class="xxlarge head-page border-theme">
                        <strong>รายการคำสั่งซื้อ</strong>
                    </div>
                    <div class="body-page margin-top">
                        <table class="table-all order" border="1">
                            <thead>
                                <tr class="theme">
                                    <th>เลขที่ใบสั่งซื้อ</th>
                                    <th>วัน/เวลาที่สั่งซื้อ</th>
                                    <th>วิธีชำระเงิน</th>
                                    <th>สถานะ</th>
                                    <th>ยืนยัน</th>
                                    <th>เลขที่ใบส่งของ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="theme-l5">
                                    <td><?php echo $order[0]->invoice ?></td>
                                    <td><?php echo $order[0]->order_date.' น.' ?></td>
                                    <td><?php echo $order[0]->bank_name.' '.$order[0]->method_of_payment ?></td>
                                    <td><?php echo $order_status = $order[0]->order_status == 'ถูกยกเลิก'?'<span class="text-red">'.$order[0]->order_status.'</span>' : $order[0]->order_status ?></td>
                                    <td class="center">
                                        <?php if ($order[0]->order_status == 'รอการชำระเงิน' || $order[0]->order_status == 'รอตรวจสอบการชำระเงิน'): ?>
                                            <form method="post" action="<?php echo $this->base_url('order/add_confirm_image') ?>" enctype="multipart/form-data">
                                                <input type="hidden" name="order_id" value="<?php echo $order[0]->order_id ?>">
                                                <input type="hidden" name="url" value="<?php echo $_GET['url'] ?>">
                                                <label for="file">
                                                    <input id="file" type="file" accept="image/*" name="file" value="" hidden>
                                                    <div class="button round green">แนบสลิป</div>
                                                </label>
                                            </form>
                                        <?php elseif($order[0]->order_status == 'ชำระเงินแล้ว' || $order[0]->order_status == 'ส่งของแล้ว'): ?>
                                            <span class="text-green">ยืนยันสำเร็จ</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="center"><?php echo $order[0]->order_post ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="panel">
                            <div class="panel-head">
                                <div class="text-theme button" target="order_detail">คลิกดูรายละเอียด <i class="fa fa-caret-down"></i></div>
                                <a class="text-theme button" title="ดูข้อมูล" href="<?php echo $this->base_url('order/bill/').$order[0]->invoice ?>"><i class="fa fa fa-search"></i></a>
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
                                    <div class="col l2 m3 s5 margin-bottom margin-right" style="max-width:100px">
                                        <div class="slip-img">
                                            <a href="<?php echo $this->image_url('system/confirm_image/').$payment[$key_pay]->confirm_image ?>" target="_blank">
                                                <img src="<?php echo $this->image_url('system/confirm_image/').$payment[$key_pay]->confirm_image ?>" class="img" alt="">
                                            </a>
                                            <?php if ($payment[$key_pay]->status == 2): ?>
                                                <span class="text-red medium"><b>ไม่ผ่าน</b></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="slip-btn center">
                                            <form class="" action="<?php echo $this->base_url('order/del_confirm_image') ?>" method="post">
                                                <input type="hidden" name="url" value="<?php echo $_GET['url'] ?>">
                                                <input type="hidden" name="payment_id" value="<?php echo $payment[$key_pay]->payment_id ?>">
                                                <button type="submit" class="button red round small margin-top">ลบรูปภาพ</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){

                confirm_image();

                function confirm_image(){
                    // let order_id = $('table.order').find('tbody tr td:first-child').html();
                    let order_id = "<?php echo $order[0]->order_id ?>";
                    $.ajax({
                        url: "<?php echo $this->base_url('order/confirm_image'); ?>",
                        method:'post',
                        data:{order_id:order_id},
                        dataType:'json',
                        success: function(data){
                        }
                    });
                }

                $('table.order').on('change','input[type=file]',function(){
                    $(this).closest('form').submit();
                });
                $('.panel').on('click','.panel-head .button',function(){
                    let target = $(this).attr('target');
                    if ($(this).closest('.panel').find('.panel-body.'+target).is(':visible')) {
                        $(this).closest('.panel').find('.panel-body.'+target).hide(500);
                    }else {
                        $(this).closest('.panel').find('.panel-body').hide(500);
                        $(this).closest('.panel').find('.panel-body.'+target).show(500);

                    }
                });
            });
        </script>
    </body>
</html>
