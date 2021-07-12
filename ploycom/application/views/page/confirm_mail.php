<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
    </head>
    <body>
        <?php $this->view('partail/top_nav') ?>
        <div class="content white" style="max-width:1200px;padding-top:0px;background-color:white">
        <div class="hide-small" style="margin-top:115px"></div>
            <!-- !PAGE CONTENT! -->
            <div class="main">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>

                <div class="row container margin-bottom padding-64">
                    <div class="col s6">
                        <br>
                    </div>
                    <div class="col s4">
                        <div id="form-login">
                            <div class="form-control row">
                                <label for="">Username/Email</label>
                                <input id="username" type="text" name="email" class="input border round col s12" placeholder="Email">
                            </div>
                            <div class="form-control row">
                                <label for="">Password</label>
                                <input id="password" type="password" name="password" class="input border round col s12" placeholder="password">
                            </div>
                            <div class="row">
                                <a href="<?php echo $this->base_url('login/forget') ?>" class="col s6 left left-align margin-top text-grey">
                                    ลืมรหัสผ่าน?
                                </a>
                                <a href="<?php echo $this->base_url('login/registation') ?>" class="col s6 right right-align margin-top text-grey">
                                    สมัครสมาชิก
                                </a>
                                <button type="button" class="button theme col s12 round btn-login">เข้าสู่ระบบ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){

            });
        </script>
    </body>
</html>
