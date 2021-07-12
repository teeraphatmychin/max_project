<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
            .s:last-child{
                border-bottom: 1px solid #ccc;
            }
        </style>
    </head>
    <body>
        <?php $this->view('partail/top_nav') ?>
        <div class="content white" style="max-width:1200px;padding-top:0px;background-color:white">
        <div class="hide-small" style="margin-top:115px"></div>

            <!-- !PAGE CONTENT! -->
            <div class="main container">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>
                <div class="row container margin-bottom margin-top">
                    <div class="col l4 m5 s12 product padding">
                        <div class="col s12 product-name large margin-bottom">
                            <b><?php echo $product->product_name ?></b>
                        </div>
                        <div class="col s12 product-image">
                            <img src="<?php echo $this->image_url('products/').$product->product_image ?>" class="col s12" alt="">
                        </div>
                        <div class="col s12 wrap-btn padding center margin-top">
                            <div id="add-to-cart"  data="<?php echo $product->product_id ?>" class="col l6 s8 button card round theme-d2 medium" style="padding:10px;margin:auto;float:unset">หยิบใส่ตะกร้า <i class="fa fa-angle-double-right"></i></div>
                        </div>
                    </div>
                    <div class="col l7 m7 s12 product-detail  right">
                        <?php if (!empty($detail)): ?>
                            <table class="table">
                                <?php foreach ($detail as $key => $value): ?>
                                    <?php
                                         $more_detail = explode('=>',$value);
                                         $pro_detail = explode('|',$more_detail[1]);
                                         $count = count($pro_detail);
                                         $border = '';
                                    ?>
                                    <tr>
                                        <th><?php echo $more_detail[0] ?></th>
                                    </tr>
                                    <?php foreach ($pro_detail as $key_more => $value_more): ?>
                                        <?php
                                            $sub_detail = explode(':',$value_more);
                                            if($key_more == $count - 1):
                                                $border = 'border-bottom';
                                            endif;
                                        ?>
                                        <tr class="row">
                                            <td class="border-top border-left col l4 m4 s5 <?php echo $border ?>" style="background-color:#f5f5f5">
                                                <?php echo $sub_detail[0] ?>
                                            </td>
                                            <td class="border-top border-left border-right col l8 m8 s7 <?php echo $border ?>">
                                                <?php echo $sub_detail[1] ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php echo $this->view('partail/footer'); ?>
        </div>



        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#add-to-cart').on('click',function(){
                    let data = $(this).attr('data');
                    let act = 'add';
                    $.ajax({
                        method: 'POST',
                        data: {act:act,product_id:data},
                        url: "<?php echo $this->base_url('cart/control');?>",
                        dataType:'json',
                        success: function(data){
                            // console.log(data);
                            if (data[0] == 'false') {
                                swal({
                                    type: 'warning',
                                    title: data[1]
                                });
                            }
                        }
                    });
                    amount_cart();
                });

                function amount_cart(){
                    $.ajax({
                        method: 'POST',
                        url: "<?php echo $this->base_url('cart/amount_cart') ?>",
                        dataType: 'json',
                        success: function(data){
                            $('.link-cart .amount-cart').html('');
                            $('.link-cart .amount-cart').html(data);
                            $('.link-cart .amount-cart').css({
                                fontSize:'1.1em',
                                color:'red',
                                transition:'1.5s'
                            });
                            setTimeout(function(){$('.link-cart .amount-cart').css({fontSize:'12px',color:'white'});},1000);

                        }
                    });
                }
            });
        </script>
    </body>
</html>
