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
        <?php $this->view('partail/left_nav') ?>
        <div class="hide-small" style="margin-top:115px"></div>

            <!-- !PAGE CONTENT! -->
            <div class="main">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>

                <div class="row container margin-bottom">
                    <div class="xxlarge head-page border-theme">
                        <strong>ลืมรหัสผ่าน</strong>
                    </div>
                    <div class="form col l5 m5 s12 row" style="margin:auto;float:unset">
                        <div class="form-body col s12" style="margin:auto;float:unset">
                            <div class="form-forget">
                                <!-- <form method="post"> -->
                                    <div class="form-control row margin-bottom margin-top">
                                        <label for="email" class="col l3 m3 s12 right-align margin-right hide-small">อีเมล์ : </label>
                                        <input id="email" type="text" class="col l8 m8 s12 input border round" name="email" placeholder="อีเมล์">
                                    </div>
                                    <div class="margin-top col s6" style="margin:auto;float:unset">
                                        <button type="button" class="button theme margin-top col s12 round btn-forget">ส่ง</button>
                                    </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){


                $('.btn-forget').click(function(){
                    let form = '.form-forget';
                    let input = ['email'];
                    if (validate(input,form)) {

                    }
                });

                $('.form-forget').on('keypress focusin focusout','input',function(){
                    let form = '.form-forget';
                    let input = ['email'];
                    if ($(this).attr('id') == 'email' && event.keyCode == 13 && $(this).val() != '') {
                        let data = validate(input,form,1);
                        let tag = $(this);
                        if (data) {
                            $('#loading').show();
                            $.ajax({
                                url:"<?php echo $this->base_url('login/forget') ?>",
                                method:'post',
                                data:{email:data[0]},
                                dataType:'json',
                                success: function(data){
                                    $('#loading').hide();
                                    // console.log(data);
                                    // console.log(tag.closest('.form-forget').html());
                                    switch (data) {
                                        case 'success':
                                            swal({
                                                type: 'success',
                                                title: 'กรุณาตรวจสอบอีเมล์',
                                            });
                                            break;
                                        case 'fail':
                                            swal({
                                                type: 'warning',
                                                title: 'อีเมล์นี้ไม่ได้เป็นสมาชิก',
                                            });
                                            break;
                                        case 'mail_fail':
                                            swal({
                                                type: 'error',
                                                title: 'ไม่สามารถส่งอีเมล์',
                                            });
                                            break;
                                        default:
                                            swal({
                                                type: 'error',
                                                title: 'มีบางอย่างผิดพลาด',
                                            });

                                    }
                                    tag.val('');
                                    tag.closest('.form-control').find('.help-block').remove();
                                }
                            })
                        }
                    }else {
                        validate(input,form);
                    }
                });



                function validate_input(type,value){
                    switch (type) {
                        case 'email':
                        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        return re.test(String(value).toLowerCase());
                            break;
                        default:

                    }
                }
                function validate(input,form_id,get_value = '') {
                    var error = 0;
                    var txt_error = '';
                    var array = [];
                    $.each(input, function( index, value ) {
                        txt_error = '<span class="help-block left-align">';
                        $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                        var input_value = $(form_id).find('#'+value).val();
                            switch(value) {
                                case 'email':
                                    let email = input_value;
                                    if(validate_input('email',email) === false){
                                        error = 1;
                                        txt_error += '<li>กรุณาใส่อีเมล์ให้ถูกต้อง</li>';
                                        txt_error += '</span>';
                                        $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                                        $(form_id).find('#'+value).closest('.form-control').append(txt_error);
                                    }
                                    break;
                                default:
                            }
                        // array.push(input_value+','+value);
                        array.push(input_value);
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
