<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    IT SUPOORT
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
  <link href="<?php echo $this->public_url('libs/material/assets/css/material-dashboard.css?v=2.1.1') ?>" rel="stylesheet" />
  <link href="<?php echo $this->public_url('css/theme_css.css') ?>" rel="stylesheet" />
  <style media="screen">
        body,h1,h2,h3,h4,h5,h6{
            font-family: 'Mali', cursive;
        }
        .main-panel {
            position: relative;
            float: left;
            width: 100%;
            transition: 0.33s, cubic-bezier(0.685, 0.0473, 0.346, 1);
            background-image: url("<?php echo $this->public_url('file/images/background/photo-1394134.jpg') ?>");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .card .card-body {
            padding: 1.9375rem 20px;
        }
        @media (max-width: 414px){
            .col-sm-12{
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
        input[type="password"] {
            font-family: none !important; /*for default text security*/
        }
  </style>
</head>
<body class="">
  <div class="wrapper ">
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-md-center">
            <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title text-center">IT SUPPORT</h4>
                  <h4 class="card-category text-center">เข้าสู่ระบบ</h4>
                </div>
                <div class="card-body">
                  <form class="form-login">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="username" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="password" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col">
                            <button type="reset" class="btn btn-danger pull-left">ยกเลิก</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-info pull-right btn-login">เข้าสู่ระบบ</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="fixed-plugin">
  </div>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/jquery.min.js"></script>

  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/popper.min.js"></script>

  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/bootstrap-material-design.min.js"></script>

  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/moment.min.js"></script>

  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/sweetalert2.js"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        //validate input



        $('.form-login')
        .on('keyup','input[type=password]',function(){
            if (event.keyCode == 13) {
                let value = $('.form-login').serialize();
                check_login(value);
            }
        })
        .on('click','.btn-login',function(){
            let value = $('.form-login').serialize();
            check_login(value);
        });
        function check_login(value){
            $.ajax({
                url: '<?php echo $this->base_url('admin/check_login') ?>',
                method: 'post',
                data: value,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    // }
                    switch (data[0]) {
                        case 'fail':
                            Swal.fire({
                                type: 'warning',
                                title: 'ไม่สามารถเข้าสู่ระบบได้',
                                text: 'กรุณาตรวจสอบ Username หรือ Password',
                            });
                            break;
                        case 'success':
                            window.location.href = '<?php echo $this->base_url('admin/') ?>';
                            break;
                        case 'isset':
                            Swal.fire({
                                type: 'info',
                                title: 'มีการเข้าสู่ระบบแล้ว',
                                text: 'ไม่สามารถเข้าสู่ระบบซ้ำได้อีก',
                            }).then((result) => {
                                window.location.href = '<?php echo $this->base_url('admin/') ?>';
                            });
                            break;
                        default:

                    }
                }

            })
        }
        // $('.btn-login').click(function(){
        //     let value = $('.form-login').serialize();
        // });
    });
  </script>
</body>

</html>
