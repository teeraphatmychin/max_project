<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/logo.png') ?>">
<link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/logo.png') ?>">
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
		body,h1,h2,h3,h4,h5,h6{
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
        .data-contact{
            margin-top: 4%;
            border-radius: 4px;
            padding: 20px;
            background-color: #fff;
        }
        .data-contact > .row{
            margin: 10px;
        }
        .data-contact b{
            color: #faa731 !important;
        }

		.form-control {
			color: #000;
		}
	</style>
</head>

<body>
	<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered bd-example-modal-x" role="document" style="max-width:1200px">
			<div class="modal-content modal-xl">
				<div class="modal-header">
					<h3 class="modal-title text-dark" id="exampleModalCenterTitle">แก้ไข</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="" action="<?php echo $this->base_url('admin/edit_contact') ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="place_type" value="attraction">
						<div class="row pl-5 pr-5 text-dark">
							<div class="col-md-12 pb-2">
								<label for="">ติดต่อเรา:</label>
								<textarea name="contact_us" class="form-control" rows="6" cols="80" required></textarea>
							</div>
							<div class="col-md-12 pb-2">
								<label for="">ติดต่อโฆษณา:</label>
								<textarea name="contact_advertise" class="form-control" rows="6" cols="80" required></textarea>
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
								<div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<a href="<?php echo $this->base_url('admin') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">หน้าหลัก</a>
									<a href="<?php echo $this->base_url('admin/tradition') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ประเพณี</a>
									<a href="<?php echo $this->base_url('admin/attractions') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ที่เที่ยว</a>
									<a href="<?php echo $this->base_url('admin/accommodation') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ที่พัก</a>
									<a href="<?php echo $this->base_url('admin/restaurant') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ร้านอาหาร</a>
									<a href="<?php echo $this->base_url('admin/souvenir_shop') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ร้านขายของฝาก</a>
									<a href="<?php echo $this->base_url('admin/car_rent') ?>" class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">รถเช่า</a>
									<a href="<?php echo $this->base_url('admin/contact') ?>" class="search_tab active d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ติดต่อ</a>
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
                <div class="row shadow data-contact text-dark">
                    <div class="btn btn-edit shadow"><a href="javascript:void(0)"><i class="fa fa-edit" style="margin-right:5px;"></i>แก้ไข</a></div>
                    <div class="row col-md-12">
                        <h3><b>ติดต่อเรา</b></h3>
                    </div>
                    <div class="row col-md-12">
                        <h4>บริษัท Travelblog จำกัดมหาชน</h4>
                    </div>
                    <div class="row col-md-12">
                        <h4>ที่อยู่ 75/5 หมู่ 3 ต.ท่าโพธิ์ อ.เมือง จ.พืษณุโลก 65000</h4>
                    </div>
                    <br>
                    <div class="row col-md-12">
                        <h3><b>ติดต่อโฆษณา</b></h3>
                    </div>
                    <div class="row col-md-12">
                        <h4>เบอร์โทร : 081-8345678</h4>
                    </div>
                    <div class="row col-md-12">
                        <h4>E-mail : travekblog@gmail.com</h4>
                    </div>
                </div>
    		</div>
    	</div>
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
			// $('[data-toggle="tooltip"]').tooltip();
			list_contact();
			list_customer_contact();


			function list_customer_contact(){
				$.ajax({
					url: '<?php echo $this->base_url('admin/list_customer_contact') ?>',
					// dataType: 'json',
					success: function(data){
						console.log(data);
					}
				})
			}
			function list_contact() {
				$.ajax({
					url: '<?php echo $this->base_url('admin/list_contact') ?>',
					dataType: 'json',
					success: function(data){
						if (data[0] == 'success') {
							let html = '';
							let check_amphur = '';
							let check_amphur_end = '';
							$.each(data[1],function(key,value){

								html += '<div class="row shadow data-contact text-dark">';
								html += ' <div class="btn btn-edit shadow"><a href="javascript:void(0)"><i class="fa fa-edit" style="margin-right:5px;"></i>แก้ไข</a></div>';
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
							$('.intro .container').html(html);
							$('.intro').on('click','.btn-edit',function(){
								let us = $(this).closest('.data-contact').find('.contact_us').attr('contact_us');
								let ad = $(this).closest('.data-contact').find('.contact_advertise').attr('contact_advertise');
								$('#modal_edit').modal('show');
								$('#modal_edit').find('textarea[name=contact_us]').val(us);
								$('#modal_edit').find('textarea[name=contact_advertise]').val(ad);
							});
						}
					}
				})
			}




		});
	</script>
</body>

</html>
