<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
            .help-block{
                bottom: 74%;
            }
            .form-admin-login{
                padding:50px 30px;
            }
            @media (min-width:601px){

            }
            @media (min-width:993px){
                .form-admin-login{
                    padding:75px 30px;
                }
            }
        </style>
    </head>
    <body>
        <div class="content white" style="max-width:1200px;padding-top:0px;background-color:white">
        <div class="hide-small" style="margin-top:115px"></div>

            <!-- !PAGE CONTENT! -->
            <div class="main">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>

                <div class="row container margin-bottom">
                    <div class="col l5 m8 s12 card round form-admin-login" style="margin:auto;float:unset">
                        <div class="xxlarge center margin-bottom">
                            <strong>ADMIN LOGIN</strong>
                        </div>
                        <div class="form col s12 row" style="margin:auto;float:unset">
                            <div class="form-body col s12 " style="margin:auto;float:unset">
                                <div id="form-login">
                                    <div class="form-control row">
                                        <label for="">Username</label>
                                        <input id="username" type="text" name="username" class="input border round col s12" placeholder="username">
                                    </div>
                                    <div class="form-control row margin-top">
                                        <label for="">Password</label>
                                        <input id="password" type="password" name="password" class="input border round col s12" placeholder="password">
                                    </div>
                                    <div class="row margin-top">
                                        <button type="button" class="button theme col s12 round btn-login">เข้าสู่ระบบ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.btn-login').click(function(){
                    let username = $(this).closest('#form-login').find('#username').val();
                    let password = $(this).closest('#form-login').find('#password').val();
                    $.ajax({
                        method: 'post',
                        url: "<?php echo $this->base_url('admin/check_login') ?>",
                        data: {username:username,password:password},
                        dataType:'json',
                        success: function(data){
                            console.log(data);
                            if (data == "success") {
                                window.location.href = "<?php echo $this->base_url('admin/stock') ?>";
                            }else {
                                swal({
                                    title: 'กรุณากรอก Username/Password ให้ถูกต้อง',
                                    type: 'warning'
                                });
                            }
                        }

                    });

                });
            });
        </script>
    </body>
</html>
