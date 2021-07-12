<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
    </head>
    <body>

        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){
                swal({
                    title:'กรุณาเข้าสู่ระบบก่อนใช้งาน',
                    type:'warning'
                }).then((result)=>{
                    window.location.href = '<?php echo $this->base_url('admin') ?>';
                })
            });
        </script>
    </body>
</html>
