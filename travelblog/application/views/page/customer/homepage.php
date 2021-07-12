<!DOCTYPE html>
<html lang="en">
<head>
    <title>Travelblog</title>
    <meta charset="utf-8">
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

        /* intro */
		.intro{
			padding-top: 2%;
		}
		.offers_content{
			padding-top: 20%;
			padding-bottom: 20%;
		}
		.offers_col {
			margin-bottom: 83px;
		}
		.travel-content {
			font-size: 36px;
			font-weight: 700;
			color: #eda84a;
			line-height: 25px;
		}
		.offers_col{
            cursor: pointer;
        }
		.offer_name a{
			padding-left: 20px;
		}
		*[class*=btn-edit] > a{
			color: #fff !important;
		}
		*[class*=btn-edit]{
			position: absolute;
			z-index: 2;
			right: 25px;
			top: 10px;
			background-color: #eda84a;
		}
		*[class*=btn-add]{
			background-color: #28a745;
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
								<li class="main_nav_item active"><a href="javascript:void(0)">หน้าหลัก</a></li>
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
		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
                <?php foreach ($item as $key => $value): ?>
                    <div class="owl-item home_slider_item" >
                        <div class="home_slider_background " style="background-image:url(<?php echo $value->place_img ?>)"></div>
                        <div class="home_slider_content text-center">
                            <div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
                                <h1>ท่องเที่ยว พิษณุโลก</h1>
                                <h2 class="mt-4 text-white"><?php echo $value->place_name ?></h2>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
			</div>

			<!-- Home Slider Nav - Prev -->
			<div class="home_slider_nav home_slider_prev">
				<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
					<defs>
						<linearGradient id='home_grad_prev'>
							<stop offset='0%' stop-color='#f8f9fa'/>
							<stop offset='100%' stop-color='#fa9e1b'/>
						</linearGradient>
					</defs>
					<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
					M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
					C22.545,2,26,5.541,26,9.909V23.091z"/>
					<polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219
					11.042,18.219 "/>
				</svg>
			</div>

			<!-- Home Slider Nav - Next -->
			<div class="home_slider_nav home_slider_next">
				<svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
					<defs>
						<linearGradient id='home_grad_next'>
							<stop offset='0%' stop-color='#fa9e1b'/>
							<stop offset='100%' stop-color='#f8f9fa'/>
						</linearGradient>
					</defs>
				<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
				M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
				C22.545,2,26,5.541,26,9.909V23.091z"/>
				<polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554
				17.046,15.554 "/>
				</svg>
			</div>
            <!-- <div class="list-home"></div> -->
		</div>

	</div>
    <div class="intro">
        <div class="container list-home"></div>


    </div>
	<!-- Footer -->

    <footer class="footer fixed-bottom border">
        <div class="container fixed-bottom justify-content-center d-flex">
        </div>
    </footer>



</div>

<script src="<?php echo $this->public_url('libs/travelix/') ?>js/jquery-3.2.1.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>styles/bootstrap4/popper.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/easing/easing.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>js/custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            list_home();
            get_ad();

            $('.list-home').on('click','.btn-attractions',function(){
                let link = $(this).attr('focus');
                window,location.href = "<?php echo $this->base_url('customer/') ?>"+link;
            });


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
            function list_home() {
				$.ajax({
					url: '<?php echo $this->base_url('customer/list_home') ?>',
					dataType: 'json',
					success:function(data){
						if (data[0] == 'success') {
							let html = '';
							$.each(data[1],function(key,value){
								html += '';
								if ((key+1) % 2 == 0) {
									html += '<div class="offers_col btn-attractions shadow rounded overflow-hidden" focus="'+value.link_focus+'">';
									html += '<div class="offers_item" home_id="'+value.home_id+'">';
									html += '<div class="row">';
									html += '<div class="col-6">';
									html += '<div class="offers_content travel-content text-center">';
									html += value.home_content;
									html += '</div>';
									html += '</div>';
									html += '<div class="col-6">';
									html += '<div class="offers_image_container">';
									html += '<div class="offers_image_background" image-url="'+value.home_img+'" style="background-image:url('+value.home_img+')"></div>';
									html += '<div class="offer_name text-center"><a href="#">'+value.home_name_img+'</a></div>';
									html += '</div>';
									html += '</div>';
									html += '</div>';
									html += '</div>';
									html += '</div>';
								}else {
                                    html += '<div class="offers_col btn-attractions shadow rounded overflow-hidden" focus="'+value.link_focus+'">';
									html += '<div class="offers_item" home_id="'+value.home_id+'">';
									html += '<div class="row">';
									html += '<div class="col-6">';
									html += '<div class="offers_image_container">';
									html += '<div class="offers_image_background" image-url="'+value.home_img+'" style="background-image:url('+value.home_img+')"></div>';
									html += '<div class="offer_name text-center"><a href="#">'+value.home_name_img+'</a></div>';
									html += '</div>';
									html += '</div>';
									html += '<div class="col-6">';
									html += '<div class="offers_content travel-content text-center">';
									html += value.home_content;
									html += '</div>';
									html += '</div>';
									html += '</div>';
									html += '</div>';
									html += '</div>';
								}
							});
							$('.intro .list-home').html(html);
						}
					}
				});
			}
        });
    </script>
</body>

</html>
