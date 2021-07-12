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
        .intro_item_overlay{
            background: rgba(0, 0, 0, 0.35);
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

        .intro_center h1{
            font-size: inherit;
        }
        .intro_center {
            transition: 0.5s;
            font-size: 59px;
        }
		.form-control {
			color: #000;
		}
		.line-item > div:first-child{
			border-left: 5px solid #dee2e6!important;
			border-right: 5px solid #dee2e6!important;
			border-top: 5px solid #dee2e6!important;
			border-color: #ffc107!important;
		}
		hr{
			background: #ffc107;
			border-top: 3px solid #ffc107;
		}
	</style>
</head>

<body>

		<!-- Modal -->
		<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered bd-example-modal-x" role="document" style="max-width:1200px">
				<div class="modal-content modal-xl">
					<div class="modal-header">
						<h3 class="modal-title text-dark" id="exampleModalCenterTitle">เพิ่มที่เที่ยว</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form class="" action="<?php echo $this->base_url('admin/add_item') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="place_type" value="accommodation">
							<div class="row pl-5 pr-5">
								<div class="col-md-8 pb-2">
									<label for="">ชื่อสถานที่:</label>
									<input type="text" class="form-control input-place-name" name="place_name" value="" required>
								</div>
								<div class="col-md-4 pb-2">
									<label for="">อำเภอ:</label>
									<select class="form-control list_amphur" name="amphur_id" required>
										<option value="d">dd</option>
									</select>
								</div>
								<div class="col-md-12 pb-2">
									<label for="">รายละเอียด:</label>
									<textarea name="place_detail" class="form-control" rows="8" cols="80"></textarea>
								</div>
							</div>
							<div class="row pl-5 pr-5">
								<div class="col-md-12">
									<div class="form-group">
										<label for="">เลือกรูปภาพ:</label><br>
										<input type="file" id="image_record" class="emp-image" accept="image/*" name="userfile[]" value="" >
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
						<form class="" action="<?php echo $this->base_url('admin/update_item') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="place_id" value="">
							<input type="hidden" name="place_type" value="accommodation">
							<input type="hidden" name="type" value="update_item">
							<div class="row pl-5 pr-5">
								<div class="col-md-8 pb-2">
									<label for="">ชื่อสถานที่:</label>
									<input type="text" class="form-control input-place-name" name="place_name" value="" required>
								</div>
								<div class="col-md-4 pb-2">
									<label for="">อำเภอ:</label>
									<select class="form-control list_amphur" name="amphur_id" required>
									</select>
								</div>
								<div class="col-md-12 pb-2">
									<label for="">รายละเอียด:</label>
									<textarea name="place_detail" class="form-control" rows="8" cols="80"></textarea>
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
									<a href="<?php echo $this->base_url('admin/accommodation') ?>" class="search_tab active d-flex flex-row align-items-center justify-content-lg-center justify-content-start">ที่พัก</a>
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
                    <button type="button" class="btn btn-success btn-add col-md-12" style="" name="button"><i class="fa fa-plus-square" style="margin-right:5px;"></i>เพิ่มที่พัก</button>
                </div>
    			<div class="row intro_items"></div>
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


		list_amphur();
		list_item();

		$('.intro')
		.on('click','.btn-delete',function(){
			let id = $(this).closest('.intro_col').attr('item-id');
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
					window.location.href = '<?php echo $this->base_url("admin/delete_item") ?>/'+id+'/accommodation';
				}
			})
		})
		.on('click','.btn-edit-item',function(){
			let img = $(this).closest('.intro_col').find('.intro_item_background').attr('image-url');
			let place_detail = $(this).closest('.intro_col').find('.intro_item').attr('place_detail');
			let id = $(this).closest('.intro_col').attr('item-id');
			let name = $(this).closest('.intro_col').find('h1').html();
			let amphur = $(this).closest('.intro_col').attr('amphur_id');

			$('#modal_edit').modal('show');

			$('#modal_edit').find('#image_record').val('');
			$('#modal_edit').find('input[name=place_name]').val(name);
			$('#modal_edit').find('input[name=place_id]').val(id);
			$('#modal_edit').find('select[name=amphur_id]').val(amphur);
			$('#modal_edit').find('textarea[name=place_detail]').val(place_detail);
			$('#modal_edit').find('.preview_file_record img').attr('src',img);
		});
		$('.btn-add').click(function(){
			$('#modal_add').modal('show');
		});

		function list_amphur(){
			$.ajax({
				url: '<?php echo $this->base_url('admin/list_amphur') ?>',
				dataType: 'json',
				success: function(data){
					if (data[0] == 'success') {
						let html = '<option value="">กรุณาเลือกอำเภอ</option>';;
						$.each(data[1],function(key,value){
							html += '<option value="'+value.amphur_id+'">'+value.amphur_name+'</option>';
						});
						$('#modal_add select.list_amphur').html(html);
						$('#modal_edit select.list_amphur').html(html);
					}
				}
			});
		}

		function list_item() {
			$.ajax({
				url: '<?php echo $this->base_url('admin/list_item') ?>',
				method: 'post',
				data: {where:'accommodation'},
				dataType: 'json',
				success: function(data){
					if (data[0] == 'success') {
						let html = '';
						let check_amphur = '';
						let check_amphur_end = '';
						$.each(data[1],function(key,value){
							if (check_amphur != value.amphur_name) {
								html += '<div class="col-md-12 line-item" amphur_name="'+value.amphur_name+'">';
								html += '<div class="col-md-3 intro_col text-dark pt-2 border-warning rounded-lg" style=";margin-bottom:2%"><h3>'+value.amphur_name+'</h3></div>';
								html += '<div class="col-md-12 intro_col" style="margin-bottom:2%"><hr></div>';
								html += '</div>';
								check_amphur = value.amphur_name;
							}

							html += '<div class="col-md-4 intro_col" amphur_id="'+value.amphur_id+'" amphur_name="'+value.amphur_name+'" style="margin-bottom:2%" item-id="'+value.place_id+'">';
							html += '<div class="intro_item" place_detail="'+value.place_detail+'">';
							html += '<div class="intro_item_overlay"></div>';
							html += '<div class="intro_item_background" image-url="'+value.place_img+'" style="background-image:url('+value.place_img+')"></div>';
							html += '<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">';
							html += '<div class="btn btn-edit-item shadow"><a href="javascript:void(0)"><i class="fa fa-edit" style="margin-right:5px;"></i>แก้ไข</a></div>';
							html += '<div class="btn btn-delete shadow"><a href="javascript:void(0)"><i class="fa fa-window-close" style="margin-right:5px;"></i>ลบ</a></div>';
							html += '<div class="intro_center text-center">';
							html += '<h1>'+value.place_name+'</h1>';
							html += '</div>';
							html += '</div>';
							html += '</div>';
							html += '</div>';
							if (check_amphur != value.amphur_name) {
							}
						});
						$('.intro .intro_items').html(html);
					}
				}
			})
		}

		$('.preview_file_record').on('click','.cancel-img', function(){
			$("#image_record").val('');
			$('.preview_file_record').html('');
			$('.btn-select-image').show();
		});

		$("#image_record").change(function(){
			readURL(this);
			$('.btn-select-image').hide();
		});

		function readURL(input) {
			var img = '<img class="preview_img" src="" alt="" width="100"/>';
			var link = '<a class="file" href=""></a>';
			var cancel = '<a class="btn btn-danger cancel-img close text-white" style="position: absolute;top: 20%;"><i class="fa fa-close"></i></a>';
			var image = img+' '+ cancel;
			var file = input.files;
			if((file[0].size / 1024) > 3072){
				swal({
					title: 'ไฟล์ภาพมีขนาดใหญ่เกินไป',
					text: 'กรุณาอัพโหลดรูปภาพไม่เกิน 3 MB',
					type: 'warning',
					confirmButtonText: 'OK'
				}).then((result) => {
					$("#image_record").val('');
					$('.preview_file_record').html('');
					$('.btn-select-image').show();
				});
			}else {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					if (input.files[0].type.indexOf('image') > -1) {

						reader.onload = function(e) {
							$('.preview_file_record').html(image);
							$('.preview_img').attr('src', e.target.result);
						}
					}
					reader.readAsDataURL(input.files[0]);

				}
			}
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
            $(this).find('.see_all').css({'margin-left':'345px','transition':'1.5s'});
        });
        $('.intro').on('mouseout','.intro_items',function(){
            $(this).find('.see_all').css({'margin-left':'0px'});
        });
    });
</script>
</body>

</html>
