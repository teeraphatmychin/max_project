<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>Staff Management</title>
        <?php $this->view('partail/main_css') ?>
        <link rel="stylesheet" href="<?php echo $this->public_url('css/awesome_form.css'); ?>">

        <style media="screen">
            body, html {height: 100%}
            .bgimg {
                background-image: url('<?php echo $this->public_url('file/background/pexels-photo-242236.jpeg') ?>');
                min-height: 100%;
                background-position: center;
                background-size: cover;
                z-index:1;
            }

            .mar{
                margin-top: 40px;
            }


        </style>
    </head>
    <body>
        <div class="bgimg display-container animate-opacity text-white">
            <div class="display-topleft padding-large xlarge text-black">
                Logo
            </div>
            <div class="display-middle row col s12" style="margin:auto;float:unset">
                <div class="aw-form col l3 m6 s10 animate-top" style="margin:auto;float:unset;z-index:3">
                    <div class="xxlarge center margin-bottom form-head text-black">
                        <strong>ADMIN LOGIN</strong>
                    </div>
                    <div class="form-body col padding round">
                        <div class="form-control form-group mar">
                            <input id="username" type="text" class="input text-black" name="username" value="admin" required>
                            <label for="" class="control-label text-black large">Username</label>
                            <i class="tab-bar "></i>
                        </div>
                        <div class="form-control form-group mar">
                            <input id="password" type="password" class="input text-black" name="password" value="admin" required>
                            <label for="" class="control-label text-black large">Password</label>
                            <i class="tab-bar"></i>
                        </div>


                        <div class="form-group margin-bottom mar">
                            <button class="btn-admin-login button col s12 border text-black hover-black border-black round large">Sign in</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="display-bottomleft padding-large text-black">
                Powered by <a href="https://web.facebook.com/maxsrisupan2011" target="_blank">Max'ki Everyday</a>
            </div>
        </div>



        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){


                $('.aw-form').on('click','.btn-admin-login',function(){
                    login($(this));
                });

                $('.aw-form').on('keypress','input[name=password]',function(){
                    if (event.keyCode == 13) {
                        login($(this));
                    }
                });

                function login(action){
                    let username = action.closest('.aw-form').find('input[name=username]').val();
                    let password = action.closest('.aw-form').find('input[name=password]').val();
                    let dat = validate(['username','password'],'.aw-form');
                    if (dat) {
                        $.ajax({
                            url: "<?php echo $this->base_url('admin/check_login') ?>",
                            data:{username:username,password:password},
                            method:'post',
                            dataType:'json',
                            success:function(data){
                                switch (data[0]) {
                                    case 'success':
                                        swal({
                                            title:'เข้าสู่ระบบสำเร็จ',
                                            type:'success',
                                            showConfirmButton: false
                                        });
                                        setTimeout(function(){window.location.href = "<?php echo $this->base_url('admin/checkin') ?>"},1200);
                                        break;
                                    case 'fail':
                                        swal({
                                            title:'Username หรือ Password ไม่ถูกต้อง',
                                            type:'warning',
                                            showConfirmButton: false,
                                            timer:1500
                                        });
                                        break;
                                    default:
                                    swal({
                                        title:'มีบางอย่างผิดพลาด',
                                        type:'error',
                                        showConfirmButton: false,
                                        timer:1500
                                    });
                                }

                            }

                        });
                    }
                }




                function validate(input,form_id,get_value = '') {
                    var error = 0;
                    var txt_error = '';
                    var array = [];
                    $.each(input, function( index, value ) {
                        txt_error = '<span class="help-block left-align">';
                        $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                        var input_value = $(form_id).find('input[name='+value+']').val();
                        if(input_value == ''){
                            error = 1;
                            txt_error += '<li>กรุณาใส่ข้อมูล</li>';
                            $(form_id).find('#'+value).closest('.form-control').append(txt_error);
                        }
                        array[value] = input_value;
                    });
                    if(error != 0){
                        return false;
                    }else{
                        if (get_value != '') {
                            return array;
                        }else {
                            return true;
                        }
                    }
                }




            });
        </script>
    </body>
</html>
