<html lang="en">
<head>
    <title>Travelblog</title>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/logo.png') ?>">
    <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/logo.png') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Travelix Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="<?php echo $this->public_url('libs/travelix/') ?>plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>styles/about_styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>styles/about_responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">

    <style media="screen">
        body,h1,h2,h3,h4,h5,h6,p{
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
            height: 52vh;
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
        .intro{
            padding-top: 20px;
        }
        .intro-item_overlay{
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
        .intro-items {
            margin-top: 120px;
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
        .parallax-mirror{
            visibility: visible;
            z-index: -100;
            position: fixed; top: 0px;
            left: 0px;
            overflow: hidden;
            transform: translate3d(0px, 0px, 0px);
            height: 465px;
            width: 1366px;
        }
        .parallax-mirror > img{
            transform: translate3d(-277px, 0px, 0px);
            position: absolute;
            height: 465px;
            width: 1920px;
            max-width: none;
            background-repeat: no-repeat;
        }
        .intro_image > .card-img{
            padding-right: 5%;
        }
        .intro_text{
            color: #6f6c6c;
        }
        /* item */
        .intro > .container > .intro-item{
            margin-bottom: 2%;
        }
        .intro-item{
            background-color: white;
            border-radius: 4px;
            padding: 5px;
        }
        .intro-title{
            font-size: 30px;
            font-weight: 700;
            color: #2d2c2c;
            text-transform: uppercase;
        }
        .intro-text{
            margin-bottom: 0px;
            font-weight: 600;
            color: #6f6c6c;
            margin-top: 60px;
        }

    </style>
</head>

<body>
<!-- <div class="parallax-mirror" style="">
    <img class="parallax-slider" src="<?php echo $this->public_url('libs/travelix/') ?>images/about_background.jpg" style="">
</div> -->

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
								<li class="main_nav_item active"><a href="javascript:void(0)">ประเพณี</a></li>
								<li class="main_nav_item"><a href="<?php echo $this->base_url('customer/attractions') ?>">ที่เที่ยว</a></li>
								<li class="main_nav_item"><a href="<?php echo $this->base_url('customer/accommodation') ?>">ที่พัก</a></li>
								<li class="main_nav_item "><a href="<?php echo $this->base_url('customer/restaurant') ?>">ร้านอาหาร</a></li>
                                <li class="main_nav_item"><a href="<?php echo $this->base_url('customer/souvenir_shop') ?>">ร้านขายของฝาก</a></li>
                                <li class="main_nav_item"><a href="<?php echo $this->base_url('customer/rental_car') ?>">รถเช่า</a></li>
                                <li class="main_nav_item"><a href="<?php echo $this->base_url('customer/contact') ?>">ติดต่อ</a></li>

							</ul>
						</div>
					</div>
				</div>
                <div class="row d-flex justify-content-center bg-theme">
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control input-search" placeholder="SEARCH...">
                    </div>
                </div>
			</div>
		</nav>

	</header>
	<!-- Home -->

	<div class="home">
        <h1 class="discription text-center">ประเพณี</h1>
        <h2 class="discription text-center" style="padding-top: 5px;">จังหวัดพิษณุโลก</h2>
	</div>

	<!-- Intro -->
	<div class="intro">
		<div class="container list-tradition">
            <div class="row intro-item shadow">
                <div class="col-md-7">
                    <div class="intro-image">
                        <img src="<?php echo $this->public_url('file/images/tradition/231467.jpg') ?>" class="card-img" alt="">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="intro-content">
                        <div class="intro-title">ประเพณีแข่งเรือยาว</div>
                        <p class="intro-text">การแข่งเรือยาวเป็นสัญลักษณ์อย่างหนึ่งของจังหวัดพิษณุโลก สืบทอดมาเป็นเวลาช้านานจนกระทั่งปัจจุบัน จัดขึ้นในช่วงเดือนตุลาคม ของทุกปี ภายในงานมีทั้งขบวนแห่ถ้วยพระราชทานไปตามถนนสายต่างๆ และขบวนแห่ถ้วยพระราชทานทางน้ำ พิธีทอดผ้าป่าเรือยาว และถวายผ้าห่มหลวงพ่อพระพุทธชินราช การประกวดกองเชียร์พื้นบ้าน โดยมีเรือยาวชื่อดังมากมาย เข้าร่วมการแข่งขันชิงเจ้าลำน้ำน่าน อีกทั้งการประกวดขบวนเรือ การแข่งเรือยาวประเพณี และมีการประดับขบวนเรือยาวต่างๆ สวยงามตระการตามากคะ แถมยังสนุกสุดๆ เลยคะ</p>
                    </div>
                </div>
            </div>
            <div class="row intro-item shadow">
                <div class="col-md-5">
                    <div class="intro-content">
                        <div class="intro-title">งานแผ่นดินสมเด็จพระนเรศวรมหาราชและกาชาดพิษณุโลก</div>
                        <p class="intro-text">วันที่ 1 - 31 ม.ค. 2562 ณ หน้าศาลากลางจังหวัดพิษณุโลกอำเภอเมือง จังหวัดพิษณุโลก ลักษณะของงานเป็นการนำเสนอของดีของแต่ละอำเภอ และการออกร้านสลากกาชาดนิทรรศการหน่วยงานต่างๆ การแสดงแสงสีเสียงเทิดพระเกียรติฯการแสดงศิลปวัฒนธรรมการจำหน่ายสินค้า OTOP สินค้าราคาถูกจากโรงงานและการแสดงคอนเสิร์ตจากศิลปิน</p>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="intro-image">
                        <img src="<?php echo $this->public_url('file/images/tradition/งานแผ่นดินสมเด็จพระนเรศวรมหาราชและกาชาดพิษณุโลก2.jpg') ?>" class="card-img" alt="">
                    </div>
                </div>
            </div>

            <div class="row intro-item shadow">
                <div class="col-md-7">
                    <div class="intro-image">
                        <img src="<?php echo $this->public_url('file/images/tradition/งานมหกรรมอาหารและสินค้าของระลึกจังหวัดพิษณุโลก2.jpg') ?>" class="card-img" alt="">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="intro-content">
                        <div class="intro-title">งานมหกรรมอาหารและสินค้าของระลึกจังหวัดพิษณุโลก</div>
                        <p class="intro-text">จัดขึ้นเป็นประจำทุกปีในช่วงเดือนเมษายนและธันวาคมของทุกปี โดยเทศบาลนครพิษณุโลก ร่วมกับการท่องเที่ยวแห่งประเทศไทย สำนักงานภาคเหนือเขต 3 จัดรวบรวมร้านอาหาร และร้านจำหน่ายของที่ระลึกที่มีคุณภาพ และมีชื่อเสียง มาร่วมออกร้านในบริเวณสวนสาธารณะริมแม่น้ำน่าน มีผู้สนใจเดินทางมาร่วมชิมอาหารพื้นเมืองและซื้อหาสินค้าที่ระลึกจำนวนมาก</p>
                        <!-- <div class="button intro_button"><div class="button_bcg"></div><a href="#">explore now<span></span><span></span><span></span></a></div> -->
                    </div>
                </div>
            </div>




		</div>
	</div>

    <!-- Footer -->

    <footer class="footer fixed-bottom border">
        <div class="container fixed-bottom justify-content-center d-flex">
        </div>
	</footer>
    <div class="for_space_footer">
        <br>
        <br>
        <br>
        <br>
    </div>


</div>

<script src="<?php echo $this->public_url('libs/travelix/') ?>js/jquery-3.2.1.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>styles/bootstrap4/popper.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>js/about_custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            list_tradition();


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
            $('.input-search').keyup(function(){
                let search = $(this).val().toLowerCase();
                if (search != '') {
                    $('.intro .list-tradition').find('.intro-item').each(function(key,value){
                        $(this).hide();
                        if ($(this).find('.intro-title').text().toLowerCase().indexOf(search) > -1) {
                            $(this).show();
                        }
                    });
                }else {
                    $('.intro .list-tradition').find('.intro-item').show();
                }
            });


            function list_tradition() {
				$.ajax({
					url: '<?php echo $this->base_url('customer/list_tradition') ?>',
					dataType: 'json',
					success: function(data){
						if (data[0] == 'success') {
							let html = '';
							$.each(data[1],function(key,value){
								if ((key+1) % 2 == 0) {
									html += '<div class="row intro-item shadow mt-4" id="'+value.id+'">';
									html += '<div class="col-md-5">';
									html += '<div class="intro-content">';
									html += '<div class="intro-title">'+value.name+'</div>';
									html += '<p class="intro-text">'+value.content+'</p>';
									html += '</div>';
									html += '</div>';
									html += '<div class="col-md-7">';
									html += '<div class="intro-image">';
									html += '<img src="'+value.img+'" class="card-img" alt="">';
									html += '</div>';
									html += '</div>';
									html += ' </div>';
								}else {
									html += '<div class="row intro-item shadow mt-4" id="'+value.id+'">';
									html += '<div class="col-md-7">';
									html += '<div class="intro-image">';
									html += '<img src="'+value.img+'" class="card-img" alt="">';
									html += '</div>';
									html += '</div>';
									html += '<div class="col-md-5">';
									html += '<div class="intro-content">';
									html += '<div class="intro-title">'+value.name+'</div>';
									html += '<p class="intro-text">'+value.content+'</p>';
									html += '</div>';
									html += '</div>';
									html += ' </div>';

								}
							});
							$('.intro .list-tradition').html(html);
						}
					}
				})
			}
        });
    </script>


</body></html>
