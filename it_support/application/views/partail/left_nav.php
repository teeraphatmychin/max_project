<style media="screen">
    .sidebar[data-color="azure"] li.wrap-reset-password>a{
        background-color: #ff9800;
        box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(255, 152, 0, 0.4);
        color: white !important;
    }
    .sidebar .nav li.wrap-reset-password>a i {
        color: #fff;
    }
    /* .sidebar .nav.disabled li>a:hover, .sidebar .nav.disabled li>a:focus {
        background-color: unset !important;
    } */
</style>
<div class="modal fade modal-reset-password" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">ข้อมูลผู้ใช้</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-reset-password">
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="">เบอร์โทร</label>
                                <input type="text" class="form-control input-phone" name="tel" value="<?php echo $_SESSION['user']->tel ?>" autocomplete="new-password">
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="">รหัสผ่านเดิม</label>
                                <input type="password" class="form-control input-old-password" autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="">รหัสผ่านใหม่</label>
                                <input type="password" class="form-control input-new-password" autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="">ยืนยันรหัสผ่าน</label>
                                <input type="password" class="form-control input-confirm-password" autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col float-left text-left">
                            <button type="button" data-dismiss="modal" class="btn float-left btn-danger pull-right">ยกเลิก</button>
                        </div>
                        <div class="col float-right">
                            <button type="button" class="btn btn-success pull-right btn-reset-password">ยืนยัน</button>
                        </div>
                    </div>
              </form>
            </div>
        </div>
    </div>
</div>


<div class="sidebar" data-color="azure" data-background-color="white" data-image="<?php echo $this->public_url('file/images/background/photo-1394134.jpg') ?>">
  <div class="logo">
    <a href="javascript:void(0)" class="simple-text logo-normal">
      OFFICE XOVIC
    </a>
  </div>
  <div class="sidebar-wrapper list-option">
      <ul class="nav"></ul>
  </div>
</div>
<script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        list_option();

        function list_option(){

            let html = '';
            // let data = JSON.parse('<?php echo json_encode($_SESSION['user']->menu_option) ?>');
            let data = <?php echo json_encode($_SESSION['user']->menu_option) ?>;
                $.each(data,function(key,value){
                    html += '';
                    html += '';
                    html += '<li class="nav-item">';
                    html += '<a class="nav-link btn-form-reset-password" href="<?php echo $this->base_url('page/') ?>'+value.option_path+'">';
                    html += '<i class="material-icons">'+value.option_icon+'</i>';
                    html += '<p>'+value.option_name+'</p>';
                    html += '</a>';
                    html += '</li>';
                });
            html += '<li class="nav-item mt-5">';
            html += '<a class="nav-link disabled btn-form-reset-password border-top" href="javascript:void(0)">';
            html += '<p class="text-center ">ข้อมูลผู้ใช้</p>';
            html += '</a>';
            html += '</li>';
            html += '<li class="nav-item">';
            html += '<a class="nav-link disabled text-dark border border-info text-center text-truncate" href="javascript:void(0)">';
            html += '<p><?php echo $_SESSION['user']->first_name." / ".$_SESSION['user']->position ?></p>';
            html += '</a>';
            html += '</li>';
            html += '<li class="nav-item wrap-reset-password active">';
            html += '<a class="nav-link btn-form-reset-password" href="javascript:void(0)" data-toggle="modal" data-target=".modal-reset-password">';
            html += '<i class="material-icons">vpn_key</i>';
            html += '<p>ข้อมูลส่วนตัว</p>';
            html += '</a>';
            html += '</li>';
            html += '<li class="nav-item">';
            html += '<a class="nav-link bg-danger text-white" href="<?php echo $this->base_url('employee/logout') ?>">';
            html += '<i class="material-icons text-white">cancel</i>';
            html += '<p>ออกจากระบบ</p>';
            html += '</a>';
            html += '</li>';

            $('.list-option .nav').html(html);

            var url = "<?php echo $url = isset($_GET['url'])&&!empty($_GET['url'])? $_GET['url']:''; ?>";
            var sub_url = url.split('/');
            // console.log(sub_url);
            $('.sidebar .sidebar-wrapper .nav li').each(function(key,value){
                $(this).removeClass('active');
                let split_url = $(this).find('a').attr('href')
                split_url = split_url.split('/');
                // console.log(split_url[5]);
                // console.log($(this).find('a').attr('href'));
                // console.log(sub_url[1]+'/');
                if (split_url[5] == sub_url[1]) {
                // if ($(this).find('a').attr('href').indexOf(sub_url[1]+'/') > -1) {
                    $(this).find('a').attr('href','javascript:void(0)');
                    $(this).addClass('active');
                }
            });

            // $.ajax({
            //     url: '<?php //echo $this->base_url('employee/list_option') ?>',
            //     dataType: 'json',
            //     success: function(data){
            //         // console.log(data);
            //         let html = '';
            //         if (data[0] == 'success') {
            //             $.each(data[1],function(key,value){
            //                 html += '';
            //                 html += '';
            //                 html += '<li class="nav-item">';
            //                 html += '<a class="nav-link btn-form-reset-password" href="<?php //echo $this->base_url('employee/') ?>'+value.option_path+'">';
            //                 html += '<i class="material-icons">'+value.option_icon+'</i>';
            //                 html += '<p>'+value.option_name+'</p>';
            //                 html += '</a>';
            //                 html += '</li>';
            //             });
            //             html += '';
            //         }
            //
            //
            //         html += '<li class="nav-item wrap-reset-password active">';
            //         html += '<a class="nav-link btn-form-reset-password" href="javascript:void(0)" data-toggle="modal" data-target=".modal-reset-password">';
            //         html += '<i class="material-icons">vpn_key</i>';
            //         html += '<p>ตั้งค่ารหัสผ่าน</p>';
            //         html += '</a>';
            //         html += '</li>';
            //         html += '<li class="nav-item active-pro">';
            //         html += '<a class="nav-link bg-danger text-white" href="<?php //echo $this->base_url('employee/logout') ?>">';
            //         html += '<i class="material-icons text-white">cancel</i>';
            //         html += '<p>ออกจากระบบ</p>';
            //         html += '</a>';
            //         html += '</li>';
            //
            //         $('.list-option .nav').html(html);
            //         $('.list-option .nav').addClass('loaded');
            //
            //         var url = "<?php //echo $url = isset($_GET['url'])&&!empty($_GET['url'])? $_GET['url']:''; ?>";
            //         var sub_url = url.split('/');
            //         // console.log(sub_url);
            //         $('.sidebar .sidebar-wrapper .nav li').each(function(key,value){
            //             $(this).removeClass('active');
            //             if ($(this).find('a').attr('href').indexOf(sub_url[1]) > -1) {
            //                 $(this).find('a').attr('href','javascript:void(0)');
            //                 $(this).addClass('active');
            //             }
            //         });
            //     }
            // });
        }

        $('.sidebar-wrapper').on('click','.btn-form-reset-password',function(){
            let tel = $('.modal-reset-password form input[name=tel]').val();
            $('.modal-reset-password form input').val('');
            $('.modal-reset-password form input[name=tel]').val(tel);
            $('.modal-reset-password form input').closest('.form-group').removeClass('is-filled');
        });

        $('.modal-reset-password').on('click','.btn-reset-password',function(){
            //validate input
             // check old Password
             //check macth new password
             var $new_password = $(this).closest('.form-reset-password').find('.input-new-password');
             var $confirm_password = $(this).closest('.form-reset-password').find('.input-confirm-password');
             var $old_password = $(this).closest('.form-reset-password').find('.input-old-password');
             var $tel = $(this).closest('.form-reset-password').find('input[name=tel]');
             $(this).closest('form').find('.help-block').remove();

             // check value from input
             var $error = true;
             $(this).closest('form').find('input').each(function(){
                 if ($(this).val() == '') {
                     $error = false;
                     $(this).closest('.form-group').append('<span class="help-block left-align"><li>รหัสผ่านไม่ถูกต้อง</li></span>');
                  }
             });

             if ($error) {
                 //ส่ง old password ไปเช็ค
                 if ($new_password.val() != $confirm_password.val()) {
                     $new_password.closest('.form-group').append('<span class="help-block left-align"><li>รหัสผ่านไม่ตรงกัน</li></span>');
                     $confirm_password.closest('.form-group').append('<span class="help-block left-align"><li>รหัสผ่านไม่ตรงกัน</li></span>');
                     // เช็ค new pass AND confirm pass
                 }else {
                     $.ajax({
                        url: '<?php echo $this->base_url('employee/reset_password') ?>' ,
                        method: 'post',
                        data: {old_password:$old_password.val(),new_password:$new_password.val(),confirm_password:$confirm_password.val(),tel:$tel.val()},
                        dataType: 'json',
                        success: function(data){
                            // console.log(data);
                            switch (data) {
                                case 'success':
                                    Swal.fire({
                                        type: 'success',
                                        title: 'ตั้งรหัสผ่านใหม่เรียบร้อยแล้ว',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then((result) => {
                                        $('.modal-reset-password').modal('toggle');
                                    });
                                    break;
                                case 'fail':
                                    $old_password.closest('.form-group').append('<span class="help-block left-align"><li>รหัสผ่านไม่ถูกต้อง</li></span>');

                                    break;
                                default:

                            }
                        }
                     });
                 }
             }
        });






    });
</script>
