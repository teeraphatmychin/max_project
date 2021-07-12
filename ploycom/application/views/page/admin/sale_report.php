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
                        <span class="margin-right">Filter:</span>
                        <a href="<?php echo $this->base_url('admin/sale_report/earnings') ?>" class="button white theme-d4 round">รายได้</a>
                        <a href="<?php echo $this->base_url('admin/sale_report/best_seller') ?>" class="button white round">สินค้าขายดี</a>
                    </div>
                </div>
            </header>

            <!-- First Photo Grid-->
            <div class="row container">
                <div class="col body-page earnings s12">
                    <div class="col l2 m4 s12 center">
                        <input type="date" class="round input border" name="start_date" value="<?php echo date("Y-m-d", strtotime("-1 Month")) ?>">
                    </div>
                    <div class="col l1 m1 s12 center" style="padding-top:10px">
                        ถึง
                    </div>
                    <div class="col l2 m4 s12 center">
                        <input type="date" class="round input border" name="end_date" value="<?php echo date('Y-m-d') ?>">
                    </div>
                </div>
                <div class="row-padding body-page earnings">
                    <div class="data-report col l4 m4 s12 "></div>
                    <div class="sum_total col l7 m8 s12 white card-2 button round-large margin-top padding-24 right"></div>
                </div>
                <div class="row-padding body-page best_seller">
                    <?php if (isset($product)): ?>
                        <?php foreach ($product as $key => $value): ?>
                            <div class="col round wrap-item page" style="cursor:pointer;">
                                <div class="card round display-container item" style="overflow:hidden">
                                <div class="container white round-large row">
                                    <div class="col">
                                        <img class="" src="<?php echo $this->base_url().'public/file/images/products/'.$value->product_image ?>" target="<?php echo $value->product_id ?>" style="width:100%">
                                    </div>
                                    <p class="col medium text-overflow"><?php echo $value->product_name; ?><br><b><?php echo "ราคา &nbsp;&nbsp;&nbsp;".number_format($value->product_price)." ฿";?></b></p>
                                    <p class="col medium text-overflow button card">ขายไป <b class="text-red"><?php echo $value->sale_amount; ?></b> ชิ้น</p>
                                    <a href="<?php echo $this->base_url('admin/edit_product/').base64_encode($value->product_id) ?>" class="col button card round theme medium margin-bottom btn-edit text-white" style="padding:5px">ดูรายละเอียด</a>
                                </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- <div class="black center padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="hover-opacity">w3.css</a></div> -->
            <!-- End page content -->
            <?php $filter = explode('/',$_GET['url']) ?>
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
                let filter = "<?php echo $url = isset($filter[2]) ? $filter[2] : null ?>";
                if (filter != '') {
                    $('.section .button').each(function(key,value){
                        if($(this).attr('href').indexOf(filter) > -1){
                            $(this).addClass('theme-d4');
                        }else {
                            $(this).removeClass('theme-d4');
                        }
                    });
                    $('.body-page').hide();
                    $('.body-page').each(function(key,value){
                        if($(this).hasClass(filter)){
                            $(this).show();
                        }
                    });
                }
                get_report();

                $('input[name*=_date]').change(function(){
                    let data = {'start_date':$('input[name=start_date]').val(),'end_date':$('input[name=end_date]').val()};
                    get_report(data);
                });

                function get_report(data=[]){
                    if (data.length <= 0 ) {
                        var data = {'start_date':$('input[name=start_date]').val(),'end_date':$('input[name=end_date]').val()};
                    }
                    $.ajax({
                        url:"<?php echo $this->base_url('admin/ajax_sale_report') ?>",
                        method:'post',
                        data:{data},
                        dataType:'json',
                        success:function(data){
                            // console.log(data);
                            let html = '<table class="table white margin-top">';
                            html += '<tr>';
                            html += '<th class="theme-d3 center">';
                            html += 'หมายเลขออเดอร์';
                            html += '</th>';
                            html += '<th class="theme-d3 center">';
                            html += 'รวม';
                            html += '</th>';
                            html += '</tr>';
                            $.each(data[0],function(key,value){
                                html += '<tr>';
                                html += '<td class="border-right border-bottom border-left center">';
                                html += '<a href="<?php echo $this->base_url('admin/order_detail/') ?>'+value.order_id_detail+'">';
                                html += value.invoice;
                                html += '</a>';
                                html += '</td>';
                                html += '<td class="border-bottom border-right right-align">';
                                html += value.show_total;
                                html += '</td>';
                                html += '</tr>';
                            });
                            html += '</table>';
                            $('.data-report').html(html);

                            html = '<div class="col s12 medium">';
                            html += data[2];
                            html += '</div>';
                            html += '<div class="col s7 large right-align">';
                            html += 'รวมทั้งหมด :';
                            html += '</div>';
                            html += '<div class="col s5 large left-align text-red">&nbsp;&nbsp;&nbsp;';
                            html += data[1];
                            html += '&nbsp;บาท</div>';
                            $('.sum_total').html(html);
                        }
                    });
                }



            });
        </script>
    </body>

</html>
