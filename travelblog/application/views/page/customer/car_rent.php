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
            height: 30vh;
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
        .text-content > p{
            font-size: 0.6em;
            color: #000 !important;
        }
        .block-item{
            height: 250px;
        }
        .block-item  .offers_content{
            padding-top: 30px;

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
								<li class="main_nav_item active"><a href="javascript:void(0)">รถเช่า</a></li>
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
        <h1 class="discription text-center">รถเช่า</h1>
	</div>
	<!-- Intro -->
	<div class="intro">
        <div class="container list-car-rent">
        </div>
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
            get_ad();
            list_car_rent();
            $('.input-search').keyup(function(){
                let search = $(this).val().toLowerCase();
                if (search != '') {
                    $('.intro .list-car-rent').find('.offers_col').each(function(key,value){
                        $(this).hide();
                        if ($(this).find('.car_rent_name').text().toLowerCase().indexOf(search) > -1) {
                            $(this).show();
                        }
                    });
                }else {
                    $('.intro .list-car-rent').find('.offers_col').show();
                }
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
            function list_car_rent() {
    			$.ajax({
    				url: '<?php echo $this->base_url('admin/list_car_rent') ?>',
    				dataType: 'json',
    				success: function(data){
    					if (data[0] == 'success') {
    						let html = '';
    						let check_amphur = '';
    						let check_amphur_end = '';
    						$.each(data[1],function(key,value){
    							if ((key+1) %2 == 0) {
    								html += '<div class="offers_col btn-attractions shadow rounded overflow-hidden ">';
    								html += '<div class="offers_item" shop-id="'+value.car_rent_id+'">';
    								html += '<div class="row block-item">';
    								html += '<div class="col-6">';
    								html += '<div class="offers_image_container">';
    								html += '<div class="offers_image_background " image-url="'+value.car_rent_img+'" style="background-image:url('+value.car_rent_img+')"></div>';
    								html += '</div>';
    								html += '</div>';
    								html += '<div class="col-6">';
    								html += '<div class="offers_content pl-4">';
    								html += '<div class="offers_price text-content" detail="'+value.car_rent_detail+'" shop-name="'+value.car_rent_name+'">';
    								html += '<p><b class="car_rent_name" >'+value.car_rent_name+'</b></p>';
    								let new_line = value.car_rent_detail;
    								new_line = new_line.split('\n');
    								$.each(new_line,function(key_line,value_line){
    									if (value_line != '') {
    										html += '<p>'+value_line+'</p>';
    									}
    								});
    								html += '</div>';
    								html += '</div>';
    								html += '</div>';
    								html += '</div>';
    								html += '</div>';
    								html += '</div>';

    							}else {
    								html += '<div class="offers_col btn-attractions shadow rounded overflow-hidden ">';
    								html += '<div class="offers_item" shop-id="'+value.car_rent_id+'">';
    								html += '<div class="row block-item">';
    								html += '<div class="col-6">';
    								html += '<div class="offers_content pl-4">';
    								html += '<div class="offers_price text-content" detail="'+value.car_rent_detail+'" shop-name="'+value.car_rent_name+'">';
    								html += '<p><b class="car_rent_name" >'+value.car_rent_name+'</b></p>';
    								let new_line = value.car_rent_detail;
    								new_line = new_line.split('\n');
    								$.each(new_line,function(key_line,value_line){
    									if (value_line != '') {
    										html += '<p>'+value_line+'</p>';
    									}
    								});
    								html += '</div>';
    								html += '</div>';
    								html += '</div>';
    								html += '<div class="col-6">';
    								html += '<div class="offers_image_container">';
    								html += '<div class="offers_image_background " image-url="'+value.car_rent_img+'" style="background-image:url('+value.car_rent_img+')"></div>';
    								html += '</div>';
    								html += '</div>';
    								html += '</div>';
    								html += '</div>';
    								html += '</div>';




    							}


    						});
    						$('.intro .list-car-rent').html(html);
    					}
    				}
    			})
    		}

        });
    </script>
</body>

</html>
