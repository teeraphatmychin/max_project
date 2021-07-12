<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>HR Management</title>
        <link rel="stylesheet" href="<?php echo $this->public_url('css/max-css.css'); ?>">
        <link rel="stylesheet" href="<?php echo $this->public_url('css/style.css'); ?>">
        <link rel="stylesheet" href="<?php echo $this->public_url('css/awesome_form.css'); ?>">
        <link rel="stylesheet" href="<?php echo $this->base_url('public/css/font-Kanit.css'); ?>">
        <link href="<?php echo $this->public_url();?>libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

        <style media="screen">
            body, html {height: 100%}
            body,h1,h2,h3,h4,h5,h6,.wide {font-family: "Kanit", sans-serif;}
            .bgimg {
                background-image: url('<?php echo $this->public_url('file/background/pexels-photo-629166.jpeg') ?>');
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
            <div class="display-topleft padding-large xlarge margin-top">
                HR Management
            </div>
            <div class="display-middle row col s12" style="margin:auto;float:unset">
                <div class="aw-form col l3 m6 s10 animate-top" style="margin:auto;float:unset;z-index:3">
                    <div class="xxlarge center margin-bottom form-head">
                        <strong>LOGIN</strong>
                    </div>
                    <!-- <div class="form-body col padding round card" style="background:rgb(255, 255, 255,0.1);z-index:999"> -->
                    <!-- <div class="form-body col padding round white card"> -->
                    <div class="form-body col padding round">
                        <div class="form-control form-group mar">
                            <input type="text" class="input text-white" name="username" value="" required>
                            <label for="" class="control-label text-white large">Username</label>
                            <i class="tab-bar "></i>
                            <!-- <input type="text" class="border input round" name="" value=""> -->
                        </div>
                        <div class="form-control form-group mar">
                            <input type="password" class="input text-white" name="password" value="" required>
                            <label for="" class="control-label text-white large">Password</label>
                            <i class="tab-bar"></i>
                            <!-- <input type="text" class="border input round" name="" value=""> -->
                        </div>

                        <!-- <div class="form-control margin-bottom">
                            <label for="">Password</label>
                            <input type="text" class="border input round" name="" value="">
                        </div> -->
                        <div class="form-group margin-bottom mar">
                            <a href="javascript:void(0)" class="button col s12 border text-theme hover-theme border-theme round large btn-login">Log in</a>
                        </div>
                    </div>
                </div>
                <!-- <h1 class="jumbo animate-top">COMING SOON</h1>
                <hr class="border-grey" style="margin:auto;width:40%">
                <p class="large center">35 days left</p> -->
            </div>
            <!-- <div class="display-bottomleft padding-large">
                Powered by <a href="https://web.facebook.com/maxsrisupan2011" target="_blank">Max'ki Everyday</a>
            </div> -->
        </div>



        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('input[name=password]').on('keypress',function(){
                    if(event.keyCode == 13){
                        let user = $(this).closest('.form-body').find('input[name=username]').val();
                        let pass = $(this).closest('.form-body').find('input[name=password]').val();
                        $.ajax({
                            url: '<?php echo $this->base_url('manager/check_login') ?>',
                            method: 'post',
                            data:{username:user,password:pass},
                            dataType: 'json',
                            success: function(data){
                                // console.log(data);
                                if (data == 'success') {
                                    swal({
                                        title: 'Log in success',
                                        type: 'success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    setTimeout(function(){window.location.href = '<?php echo $this->base_url('manager/schedule') ?>'},1500);
                                }else {
                                    swal({
                                        title: 'Username or Password wrong',
                                        type: 'error',
                                    });
                                }
                            }
                        })
                    }
                });
                $('.btn-login').click(function(){
                    let user = $(this).closest('.form-body').find('input[name=username]').val();
                    let pass = $(this).closest('.form-body').find('input[name=password]').val();
                    $.ajax({
                        url: '<?php echo $this->base_url('employee/check_login') ?>',
                        method: 'post',
                        data:{username:user,password:pass},
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            if (data == 'success') {
                                swal({
                                    title: 'Log in success',
                                    type: 'success',
                                    timer: 1500
                                });
                                setTimeout(function(){window.location.href = '<?php echo $this->base_url('employee/schedule') ?>'},1500);
                            }else {
                                swal({
                                    title: 'Username or Password wrong',
                                    type: 'error',
                                });
                            }
                        }
                    })
                });
            });
        </script>
    </body>
</html>
