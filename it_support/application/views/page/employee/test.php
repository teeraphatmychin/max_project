<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <style media="screen">
            input{
                width: 400px;
                height: 40px;
            }
            .result{
                font-size: 50px;
            }
        </style>
    </head>
    <body>
        <p>
            <form class="">
                <input type="text" name="" value="">
                <input type="reset" name="" value="reset">
            </form>

        </p>
        <p class="result"></p>

        <script src="<?php echo $this->public_url('js/jquery-3.3.1.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                // let test = 'testest';
                // console.log(test);
                // console.log(test.substr(2,1));


                $('body').on('keyup','input',function(){
                    let value = $(this).val();
                    let new_value = '';
                    let n = 0;
                    for (var i = 0; i < value.length; i++) {
                        if (i != 0) {
                            if (i % 5 == 0) {
                                new_value += '-';
                            }
                        }
                        new_value += value.substr(i,1);
                    }
                    new_value = new_value.toUpperCase();
                    $('.result').html(new_value);
                });
            });
        </script>
    </body>
</html>
