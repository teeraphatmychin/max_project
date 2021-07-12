<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile"><br>
    <input type="submit" value="Upload File to Server">
</form>

<div class="progress">
    <div class="bar"></div >
    <div class="percent">0%</div >
</div>

<div id="status"></div>

<script src="<?php echo $this->public_url('js/jquery-3.3.1.js') ?>"></script>
<script type="text/javascript">
$(function() {

var bar = $('.bar');
var percent = $('.percent');
var status = $('#status');

$.ajax({
    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal);
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        console.log(percentVal);
        bar.width(percentVal);
        percent.html(percentVal);
    },
    complete: function(xhr) {
        status.html(xhr.responseText);
    }
});
});
</script>
