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
                let data = <?php echo json_encode($dat) ?>;
                if (data.length != 0) {
                    let html = '';
                    $.each(data,function(key,value){
                        html += '<div class="row">';
                        html += '<div class="col s5 left-align text-overflow">';
                        html += value[0];
                        html += '</div>';
                        html += '<div class="col s1">:</div>';
                        html += '<div class="col s6 left-align">';
                        html += value[1];
                        html += '</div>';
                        html += '</div>';
                    });
                    // html += '<div class="center margin-top">';
                    // html += '<b>ท่านต้องการจะสั่งซื้อต่อหรือไม่</b>';
                    // html += '</div>';
                    swal({
                        title: 'ขออภัย',
                        text: "You won't be able to revert this!",
                        type:'warning',
                        html:html,
                        showCancelButton: true,
                        confirmButtonText: 'ตกลง',
                        cancelButtonText: 'ยกเลิก',
                        reverseButtons: true
                    });
                    $('.swal2-confirm').click(function(){
                        unset_spec();
                        window.location.href = "<?php echo $this->base_url('cart') ?>";
                    });
                    $('.swal2-cancel').click(function(){
                        window.location.href = "<?php echo $this->base_url('specification') ?>";
                    });
                }else {
                    unset_spec();
                    window.location.href = "<?php echo $this->base_url('cart') ?>";
                }

                function unset_spec(){
                    let data = 'unset_spec';
                    $.ajax({
                        url: '<?php echo $this->base_url('specification/unset_spec') ?>',
                        method:'post',
                        data:{data:data},
                    });
                }
            });
        </script>
    </body>
</html>
