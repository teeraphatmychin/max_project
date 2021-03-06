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
    <link rel="stylesheet" type="text/css" href="<?php echo $this->public_url('libs/travelix/') ?>styles/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <style media="screen">
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
            padding-top: 35vh;
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
							<!-- <div class="logo"><a href="#"><img src="<?php echo $this->public_url('libs/travelix/') ?>images/logo.png" alt="">Travelblog</a></div> -->
						</div>
						<div class="main_nav_container ml-auto">
							<ul class="main_nav_list">
								<li class="main_nav_item"><a href="<?php echo $this->base_url() ?>">หน้าหลัก</a></li>
                                <li class="main_nav_item"><a href="<?php echo $this->base_url('customer/tradition') ?>">ประเพณี</a></li>
								<li class="main_nav_item active"><a href="javascript:void(0)">ที่เที่ยว</a></li>
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
        <h1 class="discription text-center">ที่เที่ยว</h1>
        <h2 class="discription text-center" style="padding-top: 5px;">ที่เที่ยวยอดนิยม</h2>
    </div>

	<!-- Intro -->

    <div class="intro">
		<div class="container list-item"></div>
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
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>plugins/easing/easing.js"></script>
<script src="<?php echo $this->public_url('libs/travelix/') ?>js/custom.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        list_item();
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
                $('.intro .list-item').find('.intro_col').each(function(key,value){
                    $(this).hide();
                    if ($(this).find('.intro_center').text().toLowerCase().indexOf(search) > -1) {
                        $(this).show();
                    }
                });
            }else {
                $('.intro .list-item').find('.intro_col').show();
            }
        });



        function list_item() {
			$.ajax({
				url: '<?php echo $this->base_url('customer/list_item') ?>',
				method: 'post',
				data: {where:'attraction'},
				dataType: 'json',
				success: function(data){
					if (data[0] == 'success') {
						let html = '';
						let check_amphur = '';
						let check_amphur_end = '';
                        let length = data[1].length;
						$.each(data[1],function(key,value){
							if (check_amphur != value.amphur_name) {
                                if (key != 0) {
                                    html += '</div>';
                                }
                                html += '<div class="row intro_items">';
                                html += '<div class="col-12 search_tabs_container" style="left:0px">';
                                html += '<h2 class="text-white search_tab active amphur_name shadow">'+value.amphur_name+'</h2>';
                                html += '<h2 class="text-white search_tab active see_all" >ดูทั้งหมด</h2>';
                                html += '</div>';
                                check_amphur = value.amphur_name;
							}
							html += '<div class="col-md-4 intro_col" amphur_id="'+value.amphur_id+'" amphur_name="'+value.amphur_name+'" style="margin-bottom:2%" item-id="'+value.place_id+'">';
							html += '<div class="intro_item" place_detail="'+value.place_detail+'">';
							html += '<div class="intro_item_overlay"></div>';
							html += '<div class="intro_item_background" image-url="'+value.place_img+'" style="background-image:url('+value.place_img+')"></div>';
							html += '<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">';
							html += '<div class="intro_center text-center">';
							html += '<h1>'+value.place_name+'</h1>';
							html += '</div>';
							html += '</div>';
							html += '</div>';
							html += '</div>';
                            if ((key+1) == length) {
                                html += '</div>';
                            }
							if (check_amphur != value.amphur_name) {
							}
						});
						$('.intro .list-item').html(html);
					}
				}
			})
		}


        $('.intro').on('click','.intro_item',function(){
            let id = $(this).closest('.intro_col').attr('item-id');
            let amphur_id = $(this).closest('.intro_col').attr('amphur_id');
            window.location.href = "<?php echo $this->base_url('customer/attractions/') ?>"+id+'/'+amphur_id;
        });
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
            // $(this).find('.see_all').css({'margin-left':'345px','transition':'1.5s'});
        });
        $('.intro').on('mouseout','.intro_items',function(){
            $(this).find('.see_all').css({'margin-left':'0px'});
        });
    });
</script>
</body>

</html>
