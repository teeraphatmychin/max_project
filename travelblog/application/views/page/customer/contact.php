<!DOCTYPE html>
<html lang="en">
<head>
    <title>Travelblog</title>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/logo.png') ?>">
    <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/logo.png') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Travelblog Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>styles/bootstrap4/bootstrap.min.css"> -->
    <link href="<?php echo $this->public_url('libs/travelix/') ?>plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>styles/main_styles.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>styles/offers_styles.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>styles/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <style media="screen">
        /* @font-face {
            font-family: 'Mali', cursive;;
            src:local('Mali Regular'), local('Mali-Regular'), url(https://fonts.gstatic.com/s/mali/v3/N0ba2SRONuN4SDnED2xx.woff2) format('woff2');
            unicode-range: U+0E00-U+0E7F;
        } */
        body,h1,h2,h3,h4,h5,h6{
            font-family: 'Mali', cursive;
        }
        .offer_name{
            width: auto;
            padding-right: 15px;
        }
        .btn-attractions{
            /* border: 1px solid #ccc; */
        }
        .home_slider_container{
            background: #000;
        }
        .header,.header.scrolled{
            background: rgb(255, 255, 255, 0.9);
            /* background: rgb(250, 158, 27, 0.9); */
        }
        .main_nav_item a{
            color: rgb(250, 158, 27) !important;
        }
        .logo{
            /* background: linear-gradient(to right, #f7f6f4, #faa731); */
            padding: 8px 20px 8px 20px;
            border-radius: 11px;
        }
        .home{
            height: 40vh;
        }
        .discription{
            color: #eda84a;
            padding-top: 33vh;
        }
        .has-search{
            width: 50%;
            padding-top: 15px;
        }
        .has-search .form-control {
            padding-left: 2.375rem;
        }
        .form-control{
            color: black;
        }
        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
        .footer{
            /* background: rgb(250, 158, 27, 0.9); */
            background: rgb(255, 255, 255, 0.9);
            padding-top: 30px;
        }
        .intro_item_overlay{
            background: rgba(0, 0, 0, 0.35);
        }
        .search_tab{
            font-size: 36px;
            font-weight: 700;
            color: #2d2c2c;
            text-transform: uppercase;
            text-align: center;
            height: 94px;
            width: 36%;
            flex-grow: 1;
            background: #FFFFFF;
            cursor: pointer;
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
            padding-top: 20px;
            border-top-right-radius: 94px;
            padding-right: 7px;
            border-bottom-right-radius: 94px;
            border-top-left-radius: 0px !important;
        }
        .intro_items {
            margin-bottom: 120px;
        }
        .main_nav_item::after{
            background: linear-gradient(to right, #fa9e1b, #f3de9f);
        }
        .text-theme{
            color: #faa731!important
        }
        .bg-theme{
            background: rgb(250, 158, 27, 0.9);
        }
        .main_nav_item.active::after{
            opacity: 1;
        }
        .intro_center h1{
            font-size: inherit;
        }
        .intro_center {
            transition: 0.5s;
            font-size: 59px;
        }
        .amphur_name{
            position: absolute;
            top: 0px;
        }
        .see_all{
            transition: 1.5s;
            width: 20%;
            padding-top: 30px;
            padding-left: 40px;
            font-size: 24px;
            background: #ef9a21 !important;
        }
        .btn-add-contact{
            border-radius: 27px;
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            text-transform: uppercase;
            line-height: 53px;
            padding-left: 29px;
            padding-right: 29px;
            background: #faa731;
            /* -webkit-transform: translateY(15px);
            -moz-transform: translateY(15px);
            -ms-transform: translateY(15px);
            -o-transform: translateY(15px); */
            /* transform: translateY(15px); */
            border: none;
            outline: none;
            margin-top: 37px;
            cursor: pointer;
        }
        .data-contact{
            margin-top: 4%;
            border-radius: 4px;
            padding: 20px;
        }
        .data-contact > .row{
            margin: 10px;
        }
        .data-contact b{
            color: #faa731 !important;
        }

    </style>
</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header shadow">
		<!-- Main Navigation -->
		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
						<div class="logo_container">
							<div class="logo"><a href="#"><img src="<?php echo $this->public_url('file/images/system/logo.png') ?>" alt=""></a></div>
						</div>
						<div class="main_nav_container ml-auto">
							<ul class="main_nav_list">
								<li class="main_nav_item"><a href="<?php echo $this->base_url() ?>">หน้าหลัก</a></li>
								<li class="main_nav_item"><a href="<?php echo $this->base_url('customer/tradition') ?>">ประเพณี</a></li>
								<li class="main_nav_item"><a href="<?php echo $this->base_url('customer/attractions') ?>">ที่เที่ยว</a></li>
								<li class="main_nav_item"><a href="<?php echo $this->base_url('customer/accommodation') ?>">ที่พัก</a></li>
                                <li class="main_nav_item"><a href="<?php echo $this->base_url('customer/restaurant') ?>">ร้านอาหาร</a></li>
                                <li class="main_nav_item"><a href="<?php echo $this->base_url('customer/souvenir_shop') ?>">ร้านขายของฝาก</a></li>
                                <li class="main_nav_item"><a href="<?php echo $this->base_url('customer/rental_car') ?>">รถเช่า</a></li>
                                <li class="main_nav_item active"><a href="javascript:void(0)">ติดต่อ</a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</nav>

	</header>

	<!-- Home -->

	<div class="home">
        <h1 class="discription text-center">Contact</h1>
        <h2 class="discription text-center" style="padding-top: 5px;">รับข้อมูลข่าวสารการท่องเที่ยว</h2>
    </div>

	<!-- Intro -->

    <div class="intro">
		<div class="container">
            <div class="row intro-item shadow" style="border-radius:10px;">
                <!-- <div class="col-md-7">
                    <div class="intro-image">
                        <img src="<?php echo $this->public_url('file/images/tradition/231467.jpg') ?>" class="card-img" alt="">
                    </div>
                </div> -->
                <div class="col-md-12">
                    <div class="intro-content">
                        <form class="form-contact" action="<?php echo $this->base_url('customer/add_contact_cus') ?>" method="post" id="form-add-equipment" style="padding:10px;">
                            <div class="row">
                                <div class="col-md-5 wrap-input">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" class="form-control" name="name_contact" required>
                                    </div>
                                </div>
                                <div class="col-md-7 wrap-input">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="email" class="form-control" name="email_contact" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 wrap-input">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Subject</label>
                                        <input type="text" class="form-control" name="subject_contact" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 wrap-input">
                                    <div class="form-group">
                                        <label>Detail</label>
                                        <div class="form-group bmd-form-group">
                                            <textarea class="form-control" name="detail_contact" required rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 wrap-input text-center">
                                    <button type="submit" class="btn btn-add-contact col-md-2" ><i class="fa fa-send" style="margin-right:10%"></i><b>Send</b></button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row shadow data-contact text-dark">

            </div>
		</div>
	</div>


	<!-- Footer -->

    <footer class="footer fixed-bottom border">
        <div class="container fixed-bottom justify-content-center d-flex">
        </div>
    </footer>
    <div class="">
        <br>
        <br>
        <br>
        <br>
    </div>
</div>

<script src="<?php echo $this->public_url('libs/travelix/') ?>js/jquery-3.2.1.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>styles/bootstrap4/popper.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/easing/easing.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>js/custom.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        get_ad();
        function get_ad(){
            $.ajax({
                url: '<?php echo $this->base_url('admin/get_ad') ?>',
                dataType: 'json',
                success: function(data){
                    if (data[0] == 'success') {
                        data = data[1][0];
                        let html = '';
                        html += '<img class="img-thumbnail ad-image" image_url="'+data.ad_img+'" src="'+data.ad_img+'" style="max-height:136px">';
                        html += '<h3 class="ml-4 pt-4 text-dark test_ad_text"> '+data.ad_text+'</h3>'
                        $('.footer .container').append(html);
                    }else {
                        let html = '<div class="text-center"><h1 class="text-theme ad_img">พื้นที่โฆษณา</h1></div>';
                        $('.footer .container').append(html);
                    }
                }
            });
        }

        list_contact();

        function list_contact() {
            $.ajax({
                url: '<?php echo $this->base_url('customer/list_contact') ?>',
                dataType: 'json',
                success: function(data){
                    if (data[0] == 'success') {
                        let html = '';
                        let check_amphur = '';
                        let check_amphur_end = '';
                        $.each(data[1],function(key,value){

                            html += '<div class="row data-contact text-dark">';
                            html += ' <div class="row col-md-12">';
                            html += '<h3><b>ติดต่อเรา</b></h3>';
                            html += '</div>';
                            html += ' <div class="row contact_us" contact_us="'+value.contact_us+'">';
                            let new_line = value.contact_us;
                            new_line = new_line.split('\n');
                            $.each(new_line,function(key_line,value_line){
                                if (value_line != '') {
                                    html += '<div class="col-md-12"><h4>'+value_line+'</h4></div>';
                                }
                            });
                            html += ' </div>';
                            html += '<div class="row col-md-12">';
                            html += '<h3><b>ติดต่อโฆษณา</b></h3>';
                            html += ' </div>';
                            html += ' <div class="row contact_advertise" contact_advertise="'+value.contact_advertise+'">';
                            let new_line_2 = value.contact_advertise;
                            new_line_2 = new_line_2.split('\n');
                            $.each(new_line_2,function(key_line2,value_line2){
                                if (value_line2 != '') {
                                    html += '<div class="col-md-12"><h4>'+value_line2+'</h4></div>';
                                }
                            });
                            html += ' </div>';
                            html += ' </div>';


                        });
                        $('.intro .container .data-contact').html(html);
                    }
                }
            })
        }
        $('.intro').on('mouseover','.intro_item',function(){
            $(this).find('.intro_center').css({'padding-top':'274px','font-size':'2em'});
            $(this).find('.intro_center h1').css({'background':'#fa9e1b','padding':'10px','border-radius':'4px'});
            $(this).find('.intro_item_overlay').css({'background':'rgba(0, 0, 0, 0)'});
        });
        $('.intro').on('mouseout','.intro_item',function(){
            $(this).find('.intro_center').css({'padding-top':'0px','font-size':'59px'});
            $(this).find('.intro_item_overlay').css({'background':'rgba(0, 0, 0, 0.35)'});
            $(this).find('.intro_center h1').css({'background':'rgba(0, 0, 0, 0)','padding':'0px','border-radius':'4px'});
        });
        $('.intro').on('mouseover','.intro_items',function(){
            $(this).find('.see_all').css({'margin-left':'345px','transition':'0.7s'});
        });
        $('.intro').on('mouseout','.intro_items',function(){
            $(this).find('.see_all').css({'margin-left':'0px'});
        });
    });
</script>
</body>

</html>
