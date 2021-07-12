<!DOCTYPE html>
<html lang="en">
<head>
    <title>Travelblog</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="th">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/logo.png') ?>">
    <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/logo.png') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Travelblog Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="<?php echo $this->public_url('libs/travelix/') ?>plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>styles/main_styles.css">
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
        .home{
            height: 15vh;
        }
        .home_slider_container{
            background: #000;
        }
        .home_slider_nav > .home_slider_next{
            background: linear-gradient(to right, #fa9e1b, #f3de9f);
        }
        .offer_name{
            width: auto;
            padding-right: 15px;
        }
        .btn-attractions{
            /* border: 1px solid #ccc; */
        }
        .header,.header.scrolled{
            background: rgb(255, 255, 255, 0.9);
            /* background: rgb(250, 158, 27, 0.9); */
        }
        .main_nav_item a{
            color: rgb(250, 158, 27) !important;
        }

        .offers_col{
            cursor: pointer;
        }
        .footer{
            /* background: rgb(250, 158, 27, 0.9); */
            background: rgb(255, 255, 255, 0.9);
            padding-top: 30px;
        }
        .main_nav_item::after{
            background: linear-gradient(to right, #fa9e1b, #f3de9f);
        }
        .text-theme{
            color: #faa731!important
        }
        .main_nav_item.active::after{
            opacity: 1;
        }
        .travel-content{
            font-size: 36px;
            font-weight: 700;
            color: #eda84a;
            line-height: 25px;
        }
        .cta{
            background: unset;
            padding-top: 0px;
            padding-bottom: 0px;
        }
        .cta_item{
            padding-top: 0px;
            padding-left: 0px;
            padding-right: 0px;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="super_container">

	<!-- Header -->

    <header class="header shadow">

		<!-- Top Bar -->

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
								<li class="main_nav_item"><a href="<?php echo $this->base_url('customer/contact') ?>">ติดต่อ</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

	</header>

	<!-- Home -->

	<div class="home">
	</div>

	<!-- Intro -->

	<div class="intro">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <!-- <div class="text-theme">
                    <h1 class="detail-name">ชื่อร้านอาหาร</h1>
                </div> -->
                <div class="card col-md-10 shadow" style="border: 0px;">
                    <div class="cta">
                        <div class="container" style="width:auto">
                                <div class="row">
                                    <div class="col">
                                        <div class="cta_slider_container">
                                            <div class="owl-carousel owl-theme cta_slider detail-attractions-img">
                                                <?php if (!empty($id) and isset($id)): ?>
                                                    <?php foreach ($item as $key_main => $value_main): ?>
                                                        <?php if ($value_main->place_id == $id): ?>
                                                            <div class="owl-item cta_item text-center">
                                                                <p class="cta_text img-item">
                                                                    <h2 class="text-theme"><?php echo $value_main->place_name ?></h2>
                                                                </p>
                                                                <p class="cta_text img-item">
                                                                    <img class="rounded card-img-top" src="<?php echo $value_main->place_img ?>" alt="">
                                                                </p>
                                                                <hr>
                                                                <p class="cta_text img-item" style="line-height: 1.8;">
                                                                    <h3 class="text-dark"><?php echo $value_main->place_detail ?></h3>
                                                                </p>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                <?php foreach ($item as $key => $value): ?>
                                                    <?php if ($value->place_id != $id): ?>
                                                        <div class="owl-item cta_item text-center">
                                                            <p class="cta_text img-item">
                                                                <h2 class="text-theme"><?php echo $value->place_name ?></h2>
                                                            </p>
                                                            <p class="cta_text img-item">
                                                                <img class="rounded card-img-top" src="<?php echo $value->place_img ?>" alt="">
                                                            </p>
                                                            <hr>
                                                            <p class="cta_text img-item" style="line-height: 1.8;">
                                                                <h3 class="text-dark"><?php echo $value->place_detail ?></h3>
                                                            </p>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="cta_slider_nav cta_slider_prev">
                                                    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
                                                    <defs>
                                                        <linearGradient id='cta_grad_prev'>
                                                            <stop offset='0%' stop-color='#fa9e1b'/>
                                                            <stop offset='100%' stop-color='#f8f9fa'/>
                                                        </linearGradient>
                                                    </defs>
                                                    <path class="nav_path" fill="#000000" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
                                                    M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
                                                    C22.545,2,26,5.541,26,9.909V23.091z"/>
                                                    <polygon class="nav_arrow" fill="#000000" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219
                                                    11.042,18.219 "/>
                                                </svg>
                                            </div>
                                            <div class="cta_slider_nav cta_slider_next">
                                                <svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
                                                <defs>
                                                    <linearGradient id='cta_grad_next'>
                                                        <stop offset='0%' stop-color='#f8f9fa'/>
                                                        <stop offset='100%' stop-color='#fa9e1b'/>
                                                    </linearGradient>
                                                </defs>
                                                <path class="nav_path" fill="#000000" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
                                                M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
                                                C22.545,2,26,5.541,26,9.909V23.091z"/>
                                                <polygon class="nav_arrow" fill="#000000" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554
                                                17.046,15.554 "/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>


	<!-- Footer -->
<br>
<br>
<br>
<br>
    <footer class="footer fixed-bottom border">
        <div class="container fixed-bottom">
            <div class="text-center">
                <h1 class="text-theme advertise">พื้นที่โฆษณา</h1>
            </div>
        </div>
	</footer>



</div>

<script src="<?php echo $this->public_url('libs/travelix/') ?>js/jquery-3.2.1.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>styles/bootstrap4/popper.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/easing/easing.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>js/custom.js"></script>

</body>

</html>
