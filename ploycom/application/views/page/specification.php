<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
        /* .item:nth-child(2n+2){ */

        .item{
            margin-bottom:10%;
        }
        @media (max-width: 601px) {
            .block-value{
                text-align: left;
            }
            .wrap-item{
                width:48%;
            }
            .wrap-item:nth-child(2n+2){
                margin-left: 4%;
            }
        }
        /* .wrap-item:nth-child(2n+2) .item{
            margin-left:10%;
            background-color: red;
        } */
        .wrap-product{
            padding: 0px;
        }

        .sub-top-menu .col.l2{
            width:16.66666666666667% !important;
        }
        .conclude-spec .wrap-spec .body-spec .spec{
            padding-top:1rem;
            padding-left:1rem;
            padding-right:1rem;
            margin-bottom:1rem;
            width:100%;
        }
        .conclude-spec .wrap-spec .body-spec .spec:first-child{
            margin-right: 2%;
        }
        .conclude-spec .wrap-spec .body-spec .spec .product{
            margin-bottom:1rem;
            padding-bottom: 1rem;
            border-bottom:1px solid #ccc;
            font-size: 11px;
        }
        .conclude-spec .wrap-spec .body-spec .spec .product .price{
            font-size: 12px;
        }
        .conclude-spec .wrap-spec .body-spec .spec .product .total-price{
            font-size: 15px;
        }
        .conclude-spec .wrap-spec .body-spec .spec .product:last-child{
            /* margin-bottom: 1rem; */
            border-bottom:0px;
        }
        .conclude-spec .wrap-spec .body-spec .spec:first-child .product{
            width:100%;
        }
        .remove{
            cursor:pointer;
            top:-6px;
            right:-6px;
        }
        @media (min-width:601px){
            .block-value{
                text-align: right;
                margin-right:10%;
            }

            .wrap-item:nth-child(4n+1){
                margin-left: 0%;
            }
            .wrap-item{
                margin-left: 2%;
                width:23.5%;
            }
            .conclude-spec .wrap-spec .body-spec .spec .product{
                font-size: 15px;
            }
            .conclude-spec .wrap-spec .body-spec .spec .product .price{
                font-size: 17px;
            }
            .conclude-spec .wrap-spec .body-spec .spec .product .total-price{
                font-size: 24px;
            }
        }
        @media (min-width:993px){
            .block-value .dropdown-content{
                right:0;
            }
            .conclude-spec .wrap-spec .body-spec .spec .product{
                font-size: 15px;
            }
            .conclude-spec .wrap-spec .body-spec .spec .product .price{
                font-size: 17px;
            }
            .conclude-spec .wrap-spec .body-spec .spec .product .total-price{
                font-size: 24px;
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
    </head>
    <body>
        <div class="print-hide" style="position:relative">
            <div class="top" style="z-index:5;background-color:#f7f7f7;color:rgba(0,0,0,.5) !important;">
                <div class="hide-small">
                    <div class="xlarge row container border-bottom">
                        <div class="button center padding-small left col l3 m3 s3 hover-none">
                            <a href="<?php echo $this->base_url('product') ?>">
                                <img src="<?php echo $this->public_url('file/images/system/logo/ploycom_logo.png') ?>" alt="ploycom" width="65px">
                            </a>
                        </div>
                        <!-- <div class="button center padding-small left col l3 m3 s3 hover-none" id="open-sidebar">☰</div> -->
                        <div class="col l6 m4 s3 padding-small">
                            <form class="d-flex round form-search" action="<?php echo $this->base_url('specification/search/')?>" method="get" style="position:relative">
                                <?php if (isset($search) && !empty($search)): $value_search = $search; else: $value_search = ''; endif; ?>
                                    <input type="search" name="keyword" class="input round border medium" value="<?php echo $value_search ?>" placeholder="ค้นหาสินค้า" required style="outline:none;position:relative;">
                                    <button type="submit" class="button large btn-search hover-text-theme border-left bg-none"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="col l3 m5 s3 padding-small right-align">
                            <a href="<?php echo $this->base_url('cart/') ?>" class="button hover-text-theme xxlarge link-cart left margin-left bg-none" style="margin-top: -9px;padding:0px 0px;position:relative">
                                <i class="fa fa-shopping-cart"></i><div class='bg-none amount-cart center'></div>
                            </a>
                            <?php if (isset($_SESSION['member']) && !empty($_SESSION['member'])): ?>
                            <div class="dropdown-click left  hover-text-theme">
                                <a href="javascript:void(0)" class="button large bg-none" style="padding:0px 44.64%">
                                    <i class="fa fa-user-circle large"></i> ข้อมูลส่วนตัว <i class="fa fa-caret-down medium"></i>
                                </a>
                                <div class="dropdown-content bar-block medium card round padding-small" style="z-index:3">
                                    <a href="<?php echo $this->base_url('customer') ?>" class="bar-item">ข้อมูลส่วนตัว</a>
                                    <a href="<?php echo $this->base_url('customer/order') ?>" class="bar-item">รายการคำสั่งซื้อ</a>
                                    <a href="<?php echo $this->base_url('customer/order/payment') ?>" class="bar-item">แจ้งชำระเงิน</a>
                                    <form action="<?php echo $this->base_url('login/logout') ?>" method="post">
                                        <input type="hidden" name="url" value="<?php echo $_GET['url'] ?>">
                                        <button type="submit" class="bar-item bg-none">ออกจากระบบ</button>
                                    </form>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="dropdown-click left  hover-text-theme">
                                <a href="javascript:void(0)" class="button large bg-none" style="padding:0px 44.64%">
                                    <i class="fa fa-user-circle large"></i> เข้าสู่ระบบ <i class="fa fa-caret-down medium"></i>
                                </a>
                                <div class="dropdown-content bar-block medium card round padding-small" style="z-index:3">
                                    <a href="<?php echo $this->base_url('login') ?>" class="bar-item">เข้าสู่ระบบ</a>
                                    <a href="<?php echo $this->base_url('login/registation') ?>" class="bar-item">สมัครสมาชิก</a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                        <!--sub top menu-->
                        <div class="xlarge row container row sub-top-menu">
                            <a href="<?php echo $this->base_url('product') ?>" class="button center col l2 m2 s2 hover-text-black large bg-none">
                                สินค้า
                            </a>
                            <a href="<?php echo $this->base_url('product') ?>" class="button center col l2 m2 s2 hover-text-black large bg-none">
                                สินค้าขายดี
                            </a>
                            <a href="<?php echo $this->base_url('specification') ?>" class="button center col l2 m2 s2 hover-text-black large bg-none">
                                จัดสเปค
                            </a>
                            <a href="<?php echo $this->base_url('customer/order/confirm') ?>" class="button center col l2 m2 s2 hover-text-black large bg-none">
                                แจ้งชำระเงิน
                            </a>
                            <a href="<?php echo $this->base_url('login') ?>" class="button center col l2 m2 s2 hover-text-black large bg-none">
                                เช็คสถานะการสั่งซื้อ
                            </a>
                            <a href="<?php echo $this->base_url('product') ?>" class="button center col l2 m2 s2 hover-text-black large bg-none">
                                ติดต่อเรา
                            </a>
                        </div>
                    </div>
                    <div class="hide-large hide-medium">
                        <div class="xlarge row container border-bottom">
                            <div class="button center padding-small left col l3 m3 s2 hover-none" id="open-sidebar">☰</div>
                            <div class="center padding-small left col l6 m3 s6 hover-none">
                                <a href="<?php echo $this->base_url() ?>">
                                    <img src="<?php echo $this->public_url('file/images/system/logo/ploycom_logo.png') ?>" alt="ploycom" width="65px">
                                </a>
                            </div>
                                <div class="col l3 m3 s2 padding-small right-align">
                                    <a href="<?php echo $this->base_url('cart/') ?>" class="button hover-text-theme xxlarge link-cart left margin-left" style="margin-top: -9px;padding:0px 0px;position:relative">
                                        <i class="fa fa-shopping-cart"></i><div class='small bg-none amount-cart center'>0</div>
                                    </a>
                                </div>
                                <div class="col l3 m3 s2 padding-small right-align">
                                    <a href="<?php echo $this->base_url('login') ?>">
                                        <i class="fa fa-user xxlarge"></i>
                                    </a>
                                </div>
                        </div>
                    </div>

            </div>
        </div>
        <div class="content white" style="max-width:1200px;padding-top:0px;background-color:white">
        <div class="hide-small" style="margin-top:115px"></div>


        <nav class="sidebar bar-block white collapse top" style="z-index:3;width:250px;padding-top:63px" id="mySidebar">
            <div class="container display-container padding-16">
                <i id="close_side" class="fa fa-remove hide-large button display-topright"></i>
            </div>
            <div id="category_menu" class=" large text-grey" style="font-weight:bold;padding:29px 10px 0px 10px!important"></div>
        </nav>
        <div class="overlay hide-large" onclick="" style="cursor:pointer" id="myOverlay"></div>
            <!-- !PAGE CONTENT! -->
            <div class="main" style="margin-left:250px">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>

                <div class="row container margin-bottom">
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
                    <header class="xlarge margin-top">
                        <?php
                        if (isset($search) and $search != ''):
                            $search_value = $search;
                            if (count($product)>0 and $product != 'false'):
                                $search = 'ผลการค้นหา สำหรับ : ';
                            else:
                                $search = 'ไม่มีผลการค้นหา สำหรับ : ';
                            endif;
                            $search .= '<span class="text-primary">"'.$search_value.'"</span>';
                            ?>
                            <div class="large"> <?php echo $search; ?></div>
                        <?php endif; ?>
                    </header>
                    <header class="container xlarge margin-top margin-bottom" style="border-bottom: 1px dashed grey;padding: 0.01em 3px;">
                        <div class="left col s12">
                            <div class="left col l6 m6 s12 warp-sort">
                                <?php if (isset($_SESSION['brand']) && !empty($_SESSION['brand']) && count($_SESSION['brand']) > 0 ): ?>
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
                                    <div class="dropdown-hover bg-none">
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
                            <div class="right col l6 m6 s12">
                                <div class="dropdown-hover bg-none right" >
                                    <a href="javascript:void(0)" class="round-large medium hover-text-theme bg-none" >จัดสเปคตามคุณภาพ <i class="fa fa-caret-down"></i></a>
                                    <div class="dropdown-content bar-block card-4 round padding-small medium center">
                                        <a href="javascript:void(0)" value="high" class=" bar-item bg-none quality">สูง</a>
                                        <a href="javascript:void(0)" value="normal" class=" bar-item bg-none quality">ปานกลาง</a>
                                    </div>
                                </div>
                                <div class="dropdown-hover bg-none right block-value" style="width: 50%;">
                                    <a href="javascript:void(0)" class="round-large medium hover-text-theme bg-none" >จัดสเปคตามราคา <i class="fa fa-caret-down"></i></a>
                                    <div class="dropdown-content bar-block card-4 round padding-small medium center">
                                        <a value="20000" class=" bar-item bg-none value">20,000</a>
                                        <a value="25000" class=" bar-item bg-none value">25,000</a>
                                        <a value="30000" class=" bar-item bg-none value">30,000</a>
                                        <a value="35000" class=" bar-item bg-none value">35,000</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="" style="margin-bottom:10%;">
                        <!-- Product grid -->
                        <div class="container wrap-product">
                            <?php if (count($product)>0 && $product != 'false'): ?>
                                <div class="product row">
                                    <?php foreach ($product as $value): ?>
                                        <!-- <div class="col l3 m4 s6 display-container hover-shadow margin-top padding round" style="cursor:pointer;"> -->
                                        <div class="col round wrap-item page" style="cursor:pointer;">
                                            <!-- <div class="card round margin display-container item" style="overflow:hidden"> -->
                                            <div class="card round display-container item" style="overflow:hidden">
                                                <div class="container white round-large">
                                                    <img class="zoom" src="<?php echo $this->base_url().'public/file/images/products/'.$value->product_image ?>" target="<?php echo $value->product_id ?>" style="width:100%">
                                                    <!-- <span class="tag display-topleft red">ใหม่</span> -->
                                                    <p class="medium text-overflow"><?php echo $value->product_name; ?><br><b><?php echo "ราคา.-&nbsp;&nbsp;&nbsp;".number_format($value->product_price)."&nbsp;&nbsp;&nbsp;฿";?></b></p>
                                                    <div id="add-to-spec"  data="<?php echo $value->product_id.'/'.$value->category_id ?>" class="col l12 button card round-large medium margin-bottom text-white" style="padding:5px;background-color: #ff661a;"><i class="fa fa-plus"></i> เพิ่มในสเปค</div>
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
                        <div class="conclude-spec hide">
                            <div class="wrap-spec">
                                <div class="body-spec row">
                                    <div class="col l6 s12 card spec round"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $this->view('partail/footer'); ?>
            </div>
        </div>


        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){
                amount_cart();
                list_category();
                sidebar();

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

                $('.quality,.value').click(function(){
                    let value = $(this).attr('value');
                    $.ajax({
                        url:'<?php echo $this->base_url("specification/spec_auto") ?>',
                        method:'post',
                        data:{value:value},
                        success:function(){
                            $('.wrap-product').addClass('hide');
                            $('.conclude-spec').removeClass('hide');
                            spec();
                            list_category();
                        }
                    });

                });

                $('.conclude-spec').on('click','.wrap-spec .btn-buy',function(){
                    window.location.href = "<?php echo $this->base_url('specification/buy_spec') ?>";
                });
                $('#category_menu').on('click','.build',function(){
                    $('.wrap-product').addClass('hide');
                    $('.conclude-spec').removeClass('hide');
                    spec();
                });
                function spec(){
                    $.ajax({
                        url: '<?php echo $this->base_url("specification/list_category");?>',
                        dataType: 'json',
                        success: function(data){
                            let html = '';
                            $.each(data[0],function(key,value){
                                if (value.product_name != '') {
                                    html += '<div class="col product row">';
                                    html += '<div class="col s1">';
                                    html += '<img src="<?php echo $this->base_url().'public/file/images/products/' ?>'+ value.image +'" class="col" >';
                                    html += '</div>';
                                    html += '<div class="col s9 center text-grey"><b>';
                                    // html += value.product_name+' '+value.product_id;
                                    html += value.product_name;
                                    html += '</b></div>';
                                    html += '<div class="col s2 right-align price" style="color:#666">';
                                    html += value.product_price;
                                    html += '</div>';
                                    html += '</div>';
                                }
                            });
                            html += '<div class="col product row xlarge " >';
                            html += '<div class="col s10 total-price">';
                            html += 'ราคารวม';
                            html += '</div>';
                            html += '<div class="col s2 right-align total-price" style="color:#ff5500"><b>';
                            html += data[1]+'.-';
                            html += '</b></div>';
                            html += '</div>';
                            let button = '<div class="center margin-top">';
                            button += '<div class="button theme btn-buy round large">';
                            button += '<i class="fa fa-shopping-cart"></i> ';
                            button += 'สั่งซื้อสเปคนี้';
                            button += '</div>';
                            button += '</div>';

                            $('.btn-buy').remove();
                            $('.conclude-spec .wrap-spec .body-spec .spec').html(html);
                            $('.conclude-spec .wrap-spec').append(button);
                        }
                    });
                }
                $('.product').on('click','#add-to-spec',function(){
                    let data = $(this).attr('data');
                    let act = 'add';
                    data = data.split('/');
                    $.ajax({
                        method: 'POST',
                        data: {act:act,product_id:data[0],type:data[1]},
                        url: "<?php echo $this->base_url('specification/control');?>",
                        // dataType:'json',
                        success: function(){
                            // console.log(data);
                            list_category();
                            $('#open-sidebar').trigger('click');
                        }
                    });
                });
                $('#category_menu').on('click','.remove',function(){
                    let data = $(this).attr('data');
                    $.ajax({
                        url: '<?php echo $this->base_url('specification/control') ?>',
                        method: 'post',
                        data:{act:'remove',target:data},
                        success:function(){
                            list_category();
                        }
                    })
                });

                function sidebar() {
                    $('#open-sidebar,#myOverlay,#close_side').click(function(){
                        $('#mySidebar').toggleClass('show','hide');
                        $('#mySidebar').addClass('hide-large');
                        $('#myOverlay').toggleClass('show','hide');
                    });
                }

                function list_category(){
                    $.ajax({
                        url: '<?php echo $this->base_url("specification/list_category");?>',
                        dataType: 'json',
                        success: function(data){
                            let html = '';
                            $.each( data[0], function( key, value ) {
                                if (value.image != '' && value.product_name != '') {
                                    html += '<div class="display-container">';
                                    html += '<i class="fa fa-remove display-topright remove" style="cursor:pointer" data="'+key+'"></i>';
                                    html += '<a href="<?php echo $this->base_url()?>specification/category/'+value.category_eng_name+'" class="bar-item margin-bottom button card round hover-theme-d2 bg-none text-overflow medium test">';
                                    html += '<img src="<?php echo $this->public_url().'file/images/products/' ?>'+value.image+'" class="margin-right" style="width:35px">'+value.product_name;
                                }else {
                                    html += '<a href="<?php echo $this->base_url()?>specification/category/'+value.category_eng_name+'" class="bar-item margin-bottom button card round hover-theme-d2 bg-none">';
                                    html += '<img src="<?php echo $this->public_url().'file/images/system/sidebar/' ?>'+value.category_eng_name+'.ico" class="margin-right" style="width:25px">'+value.category_th_name;
                                }
                                // html += '<b><i class="fa fa-angle-right xlarge right" style="transform: translate(50%, 11%);"></i></b>';
                                html += '</a>';
                                html += '</div>';
                            });
                            html += '<a href="javascript:void(0)" class="bar-item margin-bottom button card round  center text-white build" style="background-color:#ff5400">';
                            html += 'สร้าง <b><i class="fa fa-chevron-right large" style="transform: translate(50%, 11%);"></i></b>';
                            html += '</a>';
                            $('#category_menu').html('');
                            $('#category_menu').html(html);
                        }
                    });
                }


                var check_dropdown_click = false;
                dropdown_click();

                function dropdown_click(){
                    $('.dropdown-click').on('click',function(event){
                        $(this).find('.dropdown-content').toggleClass('show');
                        check_dropdown_click = true;
                        event.stopPropagation();

                    });
                    $(window).click(function(){
                        if (check_dropdown_click) {
                            $('.dropdown-click').find('.dropdown-content').removeClass('show');
                            check_dropdown_click = false;
                        }
                    });
                }


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
