<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>
<meta charset="utf-8">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/logo.png') ?>">
<link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/logo.png') ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
		.search_tabs {
			flex-wrap: nowrap;
			height: 94px;
		}
		.search_tabs_container {
			position: absolute;
			bottom: 100%;
			left: 15px;
			width: calc(100% - 30px);
		}
		.search {
			position: relative;
			width: 100%;
			height: auto;
			background: linear-gradient(to right, #fa9e1b, #8d4fff);
			z-index: 10;
		}
		.search_tab:last-child {
			border-top-right-radius: 94px;
			padding-right: 7px;
		}
		.search_tab:nth-child(2) {
			border-top-right-radius: 0px;
			padding-right: 0px;
			border: solid 1px #ededed;
			border-right: 0px;
		}
		.text-theme{
			color: #faa731!important
		}
        .footer{
            background: rgb(255, 255, 255, 0.9);
            padding-top: 30px;
        }
		/* home */
		.home{
			height: 120px;
		}
		.home_content{
			bottom: 0px;
			font-size: 80px;
		}
        .home_slider_container{
            background: #000;
        }
        .home_slider_nav > .home_slider_next{
            background: linear-gradient(to right, #fa9e1b, #f3de9f);
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

		/* logo */
		.logo{
			bottom: 20px;
			right: 12px;
		}
		.btn-edit-logo{
			right: unset;
			top: 20px;
			left: 120px;
		}
		.admin-menu{
			position: absolute;
			z-index: 2;
			right: 15px;
			top: -10px;
		}
		.dropdown-menu.show{
			transform: translate3d(-177px, 33px, 0px) !important;
		}

		.form-control {
			color: #000;
		}
	</style>
</head>

<body>
	<!-- Modal -->
	<div class="modal fade" id="modal_slide" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered bd-example-modal-x" role="document" style="max-width:1200px">
			<div class="modal-content modal-xl">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">แก้ไขสไลด์</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row pl-5 pr-5">
						<div class="col-md-12 pb-2">
							<label for="">ค้นหา:</label>
							<input type="text" class="form-control input-search" name="" value="">
						</div>
						<div class="list-item row"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal_edit_main" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered bd-example-modal-x" role="document" style="max-width:1200px">
			<div class="modal-content modal-xl">
				<div class="modal-header">
					<h3 class="modal-title text-dark" id="exampleModalCenterTitle">แก้ไข</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="" action="<?php echo $this->base_url('admin/update_home') ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="home_id" value="">
						<div class="row pl-5 pr-5">
							<div class="col-md-8 pb-2">
								<label for="">เนื้อหา:</label>
								<input type="text" class="form-control input-place-name" name="home_content" value="" required>
							</div>
							<div class="col-md-4 pb-2">
								<label for="">ชื่อรูปภาพ:</label>
								<input type="text" class="form-control input-place-name" name="home_name_img" value="" required>
							</div>
							<div class="list-item row"></div>
						</div>
						<div class="row pl-5 pr-5">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">เลือกรูปภาพใหม่:</label><br>
									<input type="file" id="image_record" class="emp-image" accept="image/*" name="userfile[]" value="" required>
								</div>
							</div>
							<div class="col-md-12">
								<label for="">รูปภาพเดิม</label>
								<div class="preview_file_record">
									<img src="" alt="" class="img-thumbnail" style="width:65%">
								</div>
							</div>
						</div>

						<div class="row pl-5 pr-5 justify-content-end">
							<button type="submit" class="btn btn-success btn-save"><i class="fa fa-save mr-3"></i>บันทึก</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_edit_footer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered bd-example-modal-x" role="document" style="max-width:1200px">
			<div class="modal-content modal-xl">
				<div class="modal-header">
					<h3 class="modal-title text-dark" id="exampleModalCenterTitle">ลงโฆษณา</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="" action="<?php echo $this->base_url('admin/add_advertise') ?>" method="post" enctype="multipart/form-data">
						<!-- <input type="hidden" name="home_id" value=""> -->
						<div class="row pl-5 pr-5">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">ข้อความ:</label><br>
									<input type="text" name="ad_text" class="form-control" value="" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="">เลือกรูปภาพใหม่:</label><br>
									<input type="file" id="image_record" class="emp-image" accept="image/*" name="userfile[]" value="" required>
								</div>
							</div>
							<div class="col-md-12">
								<label for="">รูปภาพเดิม</label>
								<div class="preview_file_record">
									<img src="" alt="" class="img-thumbnail" style="width:65%">
								</div>
							</div>
						</div>

						<div class="row pl-5 pr-5 justify-content-end">
							<button type="submit" class="btn btn-success btn-save"><i class="fa fa-save mr-3"></i>บันทึก</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
<div class="super_container">
	<!-- Header -->

	<header class="header">

		<!-- Main Navigation -->


	</header>


	<!-- Home -->

	<div class="home">
		<div class="home_content text-center">
			<div class="home_title text-dark">Admin</div>
			<div class="dropdown admin-menu">
				<a class="btn btn-danger text-white" href="<?php echo $this->base_url('admin/logout') ?>"><i class="fa fa-sign-out mr-2"></i> ออกจากระบบ</a>

			</div>
		</div>
	</div>

	<!-- Offers -->

	<div class="offers">

		<!-- Search -->

		<div class="search">
			<div class="search_inner">

				<!-- Search Contents -->

				<div class="container fill_height no-padding">
					<div class="row fill_height no-margin">
						<div class="col fill_height no-padding">
							<!-- Search Tabs -->
							<div class="search_tabs_container">
								<!-- <div class="btn btn-edit-logo shadow"><a href="javascript:void(0)"><i class="fa fa-edit" style="margin-right:5px;"></i>แก้ไข</a></div> -->
								<div class="logo"><a href="#"><img class="rounded" src="<?php echo $this->public_url('file/images/system/logo.png') ?>" alt=""></a></div>
								<div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<a href="<?php echo $this->base_url('') ?>" class="search_tab active d-flex flex-row align-items-center justify-content-lg-center justify-content-start">หน้าหลัก</a>
									<a href="<?php echo $this->base_url('admin/tradition') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ประเพณี</a>
									<a href="<?php echo $this->base_url('admin/attractions') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ที่เที่ยว</a>
									<a href="<?php echo $this->base_url('admin/accommodation') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ที่พัก</a>
									<a href="<?php echo $this->base_url('admin/restaurant') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ร้านอาหาร</a>
									<a href="<?php echo $this->base_url('admin/souvenir_shop') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ร้านขายของฝาก</a>
									<a href="<?php echo $this->base_url('admin/car_rent') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">รถเช่า</a>
									<a href="<?php echo $this->base_url('admin/contact') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ติดต่อ</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Offers -->
		<div class="intro">
			<div class="container">
					<div class="offers_col btn-attractions shadow rounded overflow-hidden home" style="height:550px">
						<div class="home_slider_container">
							<div class="btn btn-edit-slide shadow"><a href="javascript:void(0)"><i class="fa fa-edit" style="margin-right:5px;"></i>แก้ไข</a></div>
							<div class="owl-carousel owl-theme home_slider">
								<?php foreach ($item as $key => $value): ?>
									<div class="owl-item home_slider_item">
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
						</div>
					</div>
					<div class="list-home"></div>
			</div>


	</div>

	<!-- Footer -->
    <footer class="footer fixed-bottom border">
		<div class="btn btn-edit-footer shadow"><a href="javascript:void(0)"><i class="fa fa-edit" style="margin-right:5px;"></i>แก้ไข</a></div>
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

			// list_slide();
			list_home();
			get_ad();
			$('.btn-edit-footer').click(function(){
				$('#modal_edit_footer').modal('show');
				let img = $(this).closest('.footer').find('.ad-image').attr('image_url');
				let text = $(this).closest('.footer').find('.test_ad_text').html();
				$('#modal_edit_footer').find('input[name=ad_text]').val(text);
				$('#modal_edit_footer').find('.preview_file_record img').attr('src',img);
			});
			$('.list-home').on('click','.btn-edit-main-menu',function(){
				$('#modal_edit_main').modal('show');
				let id = $(this).closest('.offers_item').attr('home_id');
				let img = $(this).closest('.offers_item').find('.offers_image_background').attr('image-url');
				let content = $(this).closest('.offers_item').find('.offers_content').html();
				let name_img = $(this).closest('.offers_item').find('.offers_image_container .offer_name a').html();
				$('#modal_edit_main').find('#image_record').val('');
				$('#modal_edit_main').find('input[name=home_id]').val(id);
				$('#modal_edit_main').find('input[name=home_content]').val(content);
				$('#modal_edit_main').find('input[name=home_name_img]').val(name_img);
				$('#modal_edit_main').find('.preview_file_record img').attr('src',img);
			});
			$('.btn-edit-slide').click(function(){
				$('#modal_slide').modal('show');
				$.ajax({
					url: '<?php echo $this->base_url('admin/list_item') ?>',
					dataType: 'json',
					success: function(data){
						if (data[0] == 'success') {
							let html = '';
							$.each(data[1],function(key,value){
								let check = '';
								html += '<div class="col-md-3 card place-item mb-2 mt-2" item-id="'+value.place_id+'">';
								html += '<img src="'+value.place_img+'" class="card-img-top" style="max-height:132.45px" alt="...">';
								html += '<div class="card-body">';
								html += '<h5 class="card-title text-dark text-center">'+value.place_name+' <br> '+value.amphur_name+'</h5>';
								if (value.place_status == 'slide_home') {
									check = 'checked';
								}
								html += '<p class="card-text text-dark"><input type="checkbox" name="select_slide" value="slide_home" class="mr-2 select-slide" '+check+'>ใช้</p>';
								html += '</div>';
								html += '</div>';
							});
							$('#modal_slide .list-item').html(html);
							update_slide();
							search_slide();
						}
					}
				})
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

			function search_slide() {
				$('#modal_slide').on('keyup','.input-search',function(key,value){
					let search = $(this).val().toLowerCase();
					if (search != '') {
						$(this).closest('#modal_slide').find('.list-item .place-item').each(function(key,value){
							$(this).hide();
							if ($(this).find('.card-title').text().toLowerCase().indexOf(search) > -1) {
								$(this).show();
							}
						});
					}else {
						$(this).closest('#modal_slide').find('.list-item .place-item').show();
					}
				});
			}
			function update_slide() {
				$('#modal_slide .list-item').on('click','.select-slide',function(){
					let status = $(this).prop('checked');
					let id = $(this).closest('.place-item').attr('item-id');
					let type = 'update_slide';
					if (status) {
						status = 'slide_home';
					}else {
						status = '';
					}
					$.ajax({
						url: '<?php echo $this->base_url('admin/update_item') ?>',
						method: 'post',
						data:{status:status,id:id,type:type}
						// success: function(data){
						// }
					});
				});
			}
			function list_home() {
				$.ajax({
					url: '<?php echo $this->base_url('admin/list_home') ?>',
					dataType: 'json',
					success:function(data){
						if (data[0] == 'success') {
							let html = '';
							$.each(data[1],function(key,value){
								html += '';
								if ((key+1) % 2 == 0) {
									html += '<div class="offers_col btn-attractions shadow rounded overflow-hidden">';
									html += '<div class="offers_item" home_id="'+value.home_id+'">';
									html += '<div class="row">';
									html += '<div class="btn btn-edit-main-menu shadow"><a href="javascript:void(0)"><i class="fa fa-edit" style="margin-right:5px;"></i>แก้ไข</a></div>';
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
									html += '<div class="offers_col btn-attractions shadow rounded overflow-hidden">';
									html += '<div class="offers_item" home_id="'+value.home_id+'">';
									html += '<div class="row">';
									html += '<div class="btn btn-edit-main-menu shadow"><a href="javascript:void(0)"><i class="fa fa-edit" style="margin-right:5px;"></i>แก้ไข</a></div>';
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
			$('#modal_slide').on('hide.bs.modal', function(e){
				window.location.href = '<?php echo $this->base_url('admin') ?>';
			});


		});
	</script>
</body>

</html>
