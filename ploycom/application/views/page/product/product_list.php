<!DOCTYPE html>
<html>
    <title>PLOYCOM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->view('partail/main_css') ?>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <style media="screen">
        .sidebar a {font-family: "Kanit", sans-serif}
        body,h1,h2,h3,h4,h5,h6,.wide {font-family: "Kanit", sans-serif;}
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
        #mySidebar{
            overflow-y: scroll;
        }
        #mySidebar::-webkit-scrollbar-track
        {
            border-radius: 10px;
        }
        #mySidebar::-webkit-scrollbar
        {
            width: 8px;
        }
        #mySidebar::-webkit-scrollbar-thumb
        {
            border-radius: 2px;
            background-color: #cccccc;
        }

    </style>
    <body class="" style="">
        <?php $search = isset($search) && !empty($search) ? $search : ''; ?>
        <?php $data['search'] = $search ?>
        <?php $this->view('partail/top_nav',$data) ?>
        <div class="hide link">
            <form class="" action="" method="get">
            <?php
                if (isset($link) and !empty($link)):
                    $param = explode('/',$link);
            ?>
                <input type="hidden" name="<?php echo $param[0] ?>" value="<?php echo $param[1] ?>">
                <input type="hidden" name="sort" value="">
            <?php
                elseif (isset($param1) && !empty($param1)):
                    $brand = explode('/',$param1);
            ?>
                <input type="text" name="<?php echo $brand[0] ?>" value="<?php echo $brand[1] ?>">
                <input type="text" name="sort" value="">
            <?php
                else:
            ?>
                <input type="text" name="sort" value="">
            <?php endif; ?>
            </form>
        </div>
        <div class="content white" style="max-width:1200px;background-color:white">
            <?php $this->view('partail/left_nav') ?>
            <div class="hide-small hide-medium" style="margin-top:115px"></div>
            <!-- Overlay effect when opening sidebar on small screens -->
            <!-- <div class="overlay hide-large" onclick="" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
            <div class="overlay hide bg-none" onclick="" style="cursor:pointer" title="close side menu" id="Overlay"></div> -->

            <!-- !PAGE CONTENT! -->
            <div class="main" style="margin-left:250px">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>

                <!-- Top header -->
                <header class="container xlarge">
                    <?php
                    if (isset($search) and $search != ''):
                        $search_value = $search;
                        if (count($product) > 0 and $product != 'false'):
                            $search = 'ผลการค้นหา สำหรับ : ';
                        else:
                            $search = 'ไม่มีผลการค้นหา สำหรับ : ';
                        endif;
                        $search .= '<span class="text-primary">"'.$search_value.'"</span>';
                    elseif(empty($search) and count($product) <= 0):
                        $search = '<span class="text-primary">ไม่มีสินค้าที่จะแสดง</span>';
                    ?>
                        <div class="large"> <?php echo $search; ?></div>
                    <?php endif; ?>
                </header>


                <?php if (empty($_GET['url'])): ?>
                    <!-- Image header -->
                    <div class="display-container container">
                        <img src="<?php echo $this->base_url().'public/file/ads_1520912167.jpg' ?>" style="width:100%">
                    </div>
                <?php else: ?>
                    <header class="container xlarge margin-top margin-bottom" style="border-bottom: 1px dashed grey">
                        <div class="left">
                            <?php if (isset($_SESSION['brand']) && !empty($_SESSION['brand']) && count($_SESSION['brand']) > 1 ): ?>
                                <div class="dropdown-hover bg-none margin-right">
                                    <a href="javascript:void(0)" class="round-large medium hover-text-theme" >ประเภท <i class="fa fa-caret-down"></i></a>
                                    <div class="dropdown-content bar-block card-4 round padding-small medium">

                                        <?php foreach ($_SESSION['brand'] as $cate): ?>
                                            <a href="?brand=<?php echo $cate->product_brand ?>" class="bar-item"><?php echo $cate->product_brand ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (count($product) > 0): ?>
                                <div class="dropdown-hover bg-none" >
                                    <a href="javascript:void(0)" class="round-large medium hover-text-theme bg-none" >เรียงตาม <i class="fa fa-caret-down"></i></a>
                                    <div class="dropdown-content bar-block card-4 round padding-small medium">
                                        <a value="price_asc" class="sort bar-item bg-none">ราคาต่ำสุด</a>
                                        <a value="price_desc" class="sort bar-item bg-none">ราคาสูงสุด</a>
                                        <a value="name_asc" class="sort bar-item bg-none">ชื่อสินค้าจาก A - Z</a>
                                        <a value="name_desc" class="sort bar-item bg-none">ชื่อสินค้าจาก Z - A</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </header>
                <?php endif; ?>

                <div class="wrap-product" style="margin-bottom:10%;">
                <!-- <div class="product" style="margin-bottom:10%;background-color:#f2f2f2"> -->
                    <!-- Product grid -->
                    <div class="row container">
                <?php if (count($product)>0 && $product != 'false'): ?>
                        <div class="container text-grey row">
                            <?php if (!isset($_GET['url'])): ?>
                                <p class="right">
                                    <a href="<?php echo $this->base_url('product/') ?>" class="theme button round">ดูทั้งหมด</a>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="product row">
                            <?php foreach ($product as $value): ?>
                                <?php
                                    // $url = explode(' ',$value->product_name);
                                    // $url = implode('_',$url);
                                    // $url = $this->base_url('product/detail/').$url;
                                    $url = $this->base_url('product/detail/').base64_encode($value->product_name);
                                 ?>
                                <!-- <div class="col l3 m4 s6 display-container hover-shadow margin-top padding round" style="cursor:pointer;"> -->
                                    <div class="col round wrap-item page" style="cursor:pointer;">
                                        <div class="card round display-container item" style="overflow:hidden">
                                        <div class="container white round-large" >
                                            <a href="<?php echo $url?>" class="col s12" style="position:relative;padding-bottom:80%">
                                                <img class="zoom" src="<?php echo $this->base_url().'public/file/images/products/'.$value->product_image ?>" target="<?php echo $value->product_id ?>" style="width:100%;position:absolute">
                                            </a>
                                            <!-- <span class="tag display-topleft red">ใหม่</span> -->
                                            <p class="medium text-overflow col" style="position:relative"><?php echo $value->product_name; ?><br><b><?php echo "ราคา.-&nbsp;&nbsp;&nbsp;".number_format($value->product_price)."&nbsp;&nbsp;&nbsp;฿";?></b></p>
                                            <div id="add-to-cart"  data="<?php echo $value->product_id ?>" class="col l12 button card round theme-d2 medium margin-bottom" style="padding:5px">สั่งซื้อ <i class="fa fa-angle-double-right"></i></div>
                                        </div>
                                        </div>
                                    </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="right margin-top my-pagination">
                            <div class="bar border round ">
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php echo $this->view('partail/footer'); ?>

            </div>
        </div>
        <?php echo $this->view('partail/main_js'); ?>
        <script type="text/javascript">

            $(document).ready(function(){

                my_pagination();

                function my_pagination(){
                    var number_of_item = $('.page').length;
                    var limit_per_page = 12;
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


                $('.product').on('click','#add-to-cart',function(){
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
                $('.sort').on('click',function(){
                    let value = $(this).attr('value');
                    let input = $('.link').find('input[name=sort]');
                    let form = $('.link').find('form');
                    input.val(value);
                    form.submit();
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
