<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Admin</title>
        <meta charset="utf-8">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/logo.png') ?>">
        <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/logo.png') ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="<?php echo $this->public_url('libs/travelix/') ?>plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $this->public_url('libs/sweetalert2/dist/sweetalert2.min.css');?>" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
        <style media="screen">
            body,h1,h2,h3,h4,h5,h6{
                font-family: 'Mali', cursive;
            }
            .btn-login{
                background-color: #fa9e1be6;
                border-color: #fa9e1be6;
            }
        </style>
    </head>
    <body>
        <div class="modal fade" id="modal_admin_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="logo"><a href="#"><img class="rounded" src="<?php echo $this->public_url('file/images/system/logo.png') ?>" alt=""></a></div>
                        <h2 class="modal-title text-dark" id="exampleModalCenterTitle" style="padding-top:13px;padding-left:35px;margin: auto;"><b>Admin Login</b></h2>
                    </div>
                    <div class="modal-body">
                        <form class="form-login">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="username" class="form-control" aria-describedby="emailHelp" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary btn-reset">reset</button>
                        <button type="button" class="btn btn-primary btn-login">Login</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo $this->public_url('libs/travelix/') ?>js/jquery-3.2.1.min.js"></script>
        <script src="<?php echo $this->public_url('libs/travelix/') ?>styles/bootstrap4/popper.js"></script>
        <script src="<?php echo $this->public_url('libs/travelix/') ?>styles/bootstrap4/bootstrap.min.js"></script>
        <script src="<?php echo $this->public_url();?>libs/sweetalert2/dist/sweetalert2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#modal_admin_login')
                .on('keypress','input',function(){
                    if (event.keyCode == 13) {
                        let $username = $('#modal_admin_login .form-login input[name=username]').val();
                        let $password = $('#modal_admin_login .form-login input[name=password]').val();
                        $.ajax({
                            url: '<?php echo $this->base_url('admin/check_login') ?>',
                            method: 'post',
                            data: {username:$username,password:$password},
                            dataType: 'json',
                            success: function(data){
                                if (data == 'success') {
                                    window.location.href = '<?php echo $this->base_url('admin/') ?>';
                                }else {
                                    swal({
                                        title: 'กรุณาตวจสอบ Username และ Password',
                                        type: 'error',
                                    });
                                }
                            }
                        });
                    }
                })
                .on('click','.btn-reset',function(){
                    $('#modal_admin_login .form-login input[name=username]').val('');
                    $('#modal_admin_login .form-login input[name=password]').val('');
                })
                .on('click','.btn-login',function(){
                    let $username = $('#modal_admin_login .form-login input[name=username]').val();
                    let $password = $('#modal_admin_login .form-login input[name=password]').val();
                    $.ajax({
                        url: '<?php echo $this->base_url('admin/check_login') ?>',
                        method: 'post',
                        data: {username:$username,password:$password},
                        dataType: 'json',
                        success: function(data){
                            if (data == 'success') {
                                window.location.href = '<?php echo $this->base_url('admin/') ?>';
                            }else {
                                swal({
                                    title: 'กรุณาตวจสอบ Username และ Password',
                                    type: 'error',
                                });
                            }
                        }
                    });

                });
                $('#modal_admin_login').on('hide.bs.modal', function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    return false;
                });


                $('#modal_admin_login').modal('show');
            });
        </script>
    </body>
</html>
