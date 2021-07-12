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
<link href="<?php echo $this->public_url('libs/sweetalert2/dist/sweetalert2.min.css');?>" rel="stylesheet">
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
		*[class*=btn-edit] > a{
			color: #fff !important;
		}
		*[class*=btn-edit]{
			position: absolute;
			z-index: 2;
			right: 110px;
			top: 10px;
			background-color: #eda84a;
		}
		.btn-delete{
			right: 25px;
			background-color: red !important;
			position: absolute;
			z-index: 2;
			top: 10px;
			background-color: #eda84a;
		}
		.btn-delete > a{
			color: #fff !important;
		}
		*[class*=btn-add]{
			background-color: #28a745;
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
		.form-control {
			color: #000;
		}
		.intro-content{
			padding-top: 50px;
		}

	</style>
</head>

<body>
	<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered bd-example-modal-x" role="document" style="max-width:1200px">
			<div class="modal-content modal-xl">
				<div class="modal-header">
					<h3 class="modal-title text-dark" id="exampleModalCenterTitle">เพิ่มประเพณี</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="" action="<?php echo $this->base_url('admin/add_tradition') ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="place_type" value="attraction">
						<div class="row pl-5 pr-5">
							<div class="col-md-12 pb-2">
								<label for="">ชื่อประเพณี:</label>
								<input type="text" class="form-control input-place-name" name="tradition_name" value="" required>
							</div>
							<div class="col-md-12 pb-2">
								<label for="">เนื้อหา:</label>
								<textarea name="tradition_content" class="form-control" rows="8" cols="80" required></textarea>
							</div>
						</div>
						<div class="row pl-5 pr-5">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">เลือกรูปภาพ:</label><br>
									<input type="file" id="image_record" class="emp-image" accept="image/*" name="userfile[]" value="" required>
								</div>
							</div>
						</div>

						<div class="row pl-5 pr-5 justify-content-end">
							<button type="submit" class="btn btn-success"><i class="fa fa-plus-square mr-3"></i>เพิ่ม</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
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
					<form class="" action="<?php echo $this->base_url('admin/update_tradition') ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="">
						<div class="row pl-5 pr-5">
							<div class="col-md-12 pb-2">
								<label for="">ชื่อประเพณี:</label>
								<input type="text" class="form-control input-place-name" name="tradition_name" value="" required>
							</div>
							<div class="col-md-12 pb-2">
								<label for="">เนื้อหา:</label>
								<textarea name="tradition_content" class="form-control" rows="8" cols="80" required></textarea>
							</div>
						</div>
						<div class="row pl-5 pr-5">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">เลือกรูปภาพใหม่:</label><br>
									<input type="file" id="image_record" class="emp-image" accept="image/*" name="userfile[]" value="" >
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
							<button type="submit" class="btn btn-success"><i class="fa fa-plus-square mr-3"></i>บันทึก</button>
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
									<a href="<?php echo $this->base_url('admin/tradition') ?>" class="search_tab active d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ประเพณี</a>
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
        <!-- Intro -->
    	<div class="intro">
    		<div class="container">
                <div class="row intro-item col-md-6" style="float:unset;margin:auto;margin-bottom:15px;">
                    <button type="button" class="btn btn-success btn-add col-md-12" style="" name="button"><i class="fa fa-plus-square" style="margin-right:5px;"></i>เพิ่มประเพณี</button>
                </div>
				<div class="list-tradition"></div>

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
<script src="<?php echo $this->public_url();?>libs/sweetalert2/dist/sweetalert2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			list_tradition();

			$('.btn-add').click(function(){
				$('#modal_add').modal('show');
			});

			$('.list-tradition')
			.on('click','.btn-delete',function(){
				let id = $(this).closest('.intro-item').attr('id');
				swal({
					title: 'คุณต้องการลบรายการนี้หรือไม่?',
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#eda84a',
					cancelButtonColor: '#d33',
					confirmButtonText: 'ยืนยัน!',
					cancelButtonText: 'ยกเลิก'
				}).then((result) => {
					if (result) {
						window.location.href = '<?php echo $this->base_url("admin/delete_tradition") ?>/'+id;
					}
				})
			})
			.on('click','.btn-edit',function(){
				let id = $(this).closest('.intro-item').attr('id');
				let img = $(this).closest('.intro-item').find('.intro-image img').attr('src');
				let name = $(this).closest('.intro-item').find('.intro-title').html();
				let content = $(this).closest('.intro-item').find('.intro-text').html();
				$('#modal_edit').modal('show');
				$('#modal_edit').find('#image_record').val('');
				$('#modal_edit').find('input[name=id]').val(id);
				$('#modal_edit').find('input[name=tradition_name]').val(name);
				$('#modal_edit').find('textarea[name=tradition_content]').val(content);
				$('#modal_edit').find('.preview_file_record img').attr('src',img);
			});


			function list_tradition() {
				$.ajax({
					url: '<?php echo $this->base_url('admin/list_tradition') ?>',
					dataType: 'json',
					success: function(data){
						if (data[0] == 'success') {
							let html = '';
							$.each(data[1],function(key,value){
								if ((key+1) % 2 == 0) {
									html += '<div class="row intro-item shadow mt-4" id="'+value.id+'">';
									html += '<div class="btn btn-edit shadow"><a href="javascript:void(0)"><i class="fa fa-edit" style="margin-right:5px;"></i>แก้ไข</a></div>';
									html += '<div class="btn btn-delete shadow"><a href="javascript:void(0)"><i class="fa fa-window-close" style="margin-right:5px;"></i>ลบ</a></div>';
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
									html += '<div class="btn btn-edit shadow"><a href="javascript:void(0)"><i class="fa fa-edit" style="margin-right:5px;"></i>แก้ไข</a></div>';
									html += '<div class="btn btn-delete shadow"><a href="javascript:void(0)"><i class="fa fa-window-close" style="margin-right:5px;"></i>ลบ</a></div>';
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
</body>

</html>
