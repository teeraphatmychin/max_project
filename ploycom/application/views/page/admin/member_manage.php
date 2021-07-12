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
        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 23px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(18px);
            -ms-transform: translateX(18px);
            transform: translateX(18px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
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
                    <div class="section bottombar padding-16 hide-small">
                        <span class="margin-right">Filter:</span>
                        <a href="<?php echo $this->base_url('admin/member_manage') ?>" class="button white round">ทั้งหมด</a>
                        <a href="<?php echo $this->base_url('admin/member_manage/on') ?>" class="button white round">เปิดใช้งาน</a>
                        <a href="<?php echo $this->base_url('admin/member_manage/off') ?>" class="button white round">ปิดใช้งาน</a>
                    </div>
                </div>
            </header>

            <!-- First Photo Grid-->
            <div class="row container" style="margin-bottom:60px">
                <table class="table">
                    <tr class="theme-d4">
                        <th class="border-right">รหัสสมาชิก</th>
                        <th class="border-right">ชื่อ</th>
                        <th class="border-right">บัตรประชาชน</th>
                        <th class="border-right">อีเมล์</th>
                        <th class="border-right">เบอร์โทร</th>
                        <th class="">สถานะ</th>
                        <th class="">แก้ไข</th>
                    </tr>
                    <?php foreach ($member as $key => $value): ?>
                        <tr class="page white" style="cursor:pointer">
                            <td class="border-right border-left border-bottom"><?php echo $value->member_id ?></td>
                            <td class="border-right border-bottom"><?php echo $value->member_name ?></td>
                            <td class="border-right border-bottom"><?php echo $value->member_card_id ?></td>
                            <td class="border-right border-bottom"><?php echo $value->member_email ?></td>
                            <td class="border-right border-bottom"><?php echo $value->member_phone ?></td>
                            <td class="border-right border-bottom">
                                        <?php if ($value->member_status == 0): ?>
                                            <span class="text-green small"><i class="fa fa-circle"></i> เปิด</span>
                                        <?php else: ?>
                                            <span class="text-red small"><i class="fa fa-circle"></i> ปิด</span>
                                        <?php endif; ?>
                            </td>
                            <td class="border-right border-bottom center">
                                <a href="<?php echo $this->base_url('admin/member_manage/edit_member/').base64_encode($value->member_id) ?>" class="button orange card round text-white">แก้ไข</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <div class="right margin-top my-pagination">
                    <div class="bar border round ">
                    </div>
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
                }else {
                    $('.section span').next().addClass('theme-d4');
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
