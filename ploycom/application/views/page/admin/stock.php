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
        .btn-edit{
            margin-right: 2%;
        }
        .btn-edit,.btn-detail{
            width: 49%;
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
                    <h1><b>รายการสินค้า</b></h1>
                    <div class="section bottombar padding-16 row">
                        <div class="col s6 margin-bottom">
                            <span class="margin-right">Filter:</span>
                            <a href="<?php echo $this->base_url('admin/stock') ?>" class="button theme-d4 round white">ทั้งหมด</a>
                            <a href="<?php echo $this->base_url('admin/stock/nearly_out_of_stock') ?>" class="button white round">สินค้าใกล้หมด</a>
                            <a href="<?php echo $this->base_url('admin/stock/last_update') ?>" class="button white round">แก้ไขล่าสุด</a>
                        </div>
                        <div class="col s1 right">
                            <a href="<?php echo $this->base_url('admin/add_product') ?>" class="button round green right btn-add-product"><i class="fa fa-plus"></i> เพิ่มสินค้า</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- First Photo Grid-->
            <div class="row container" style="margin-bottom:60px">
                <?php foreach ($product as $key => $value): ?>
                    <div class="col round wrap-item page" style="cursor:pointer;">
                        <div class="card round display-container item" style="overflow:hidden">
                        <div class="container white round-large row">
                            <a href="<?php echo $url?>" class="col s12" style="position:relative;padding-bottom:80%">
                                <img class="zoom" src="<?php echo $this->base_url().'public/file/images/products/'.$value->product_image ?>" target="<?php echo $value->product_id ?>" style="width:100%;position:absolute">
                            </a>
                            <p class="col medium text-overflow"><?php echo $value->product_name; ?><br><b><?php echo "ราคา &nbsp;&nbsp;&nbsp;".number_format($value->product_price)." ฿";?></b></p>
                            <p class="col medium text-overflow button card">จำนวน <b><?php echo $value->product_amount; ?></b> ชิ้น</p>
                            <a href="<?php echo $this->base_url('admin/edit_product/').base64_encode($value->product_id) ?>" class="col button card round orange medium margin-bottom text-white" style="padding:5px">แก้ไข</a>
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="right margin-top my-pagination">
                    <div class="bar border round ">
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

                my_pagination();

                function my_pagination(){
                    var number_of_item = $('.page').length;
                    var limit_per_page = 8;
                    $('.page:gt('+(limit_per_page-1)+')').hide();
                    var total_page = Math.ceil(number_of_item / limit_per_page);
                    if (total_page > 1) {
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

                }

            });
        </script>
    </body>

</html>
