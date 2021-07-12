<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Summernote</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script> -->
  <script src="<?php echo $this->public_url('libs/summernote/summernote.js') ?>"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/sweetalert2.js"></script>
    <style media="screen">
        .swal2-popup{
            font-size: 1.5rem !important;
        }
        .note-editor > .note-editing-area > .note-editable > p > img{ /* max width of image in summernote*/
            max-width: 1145px !important; /* width modal - another width = max width | 1200 - 55 = 1145*/
        }

    </style>

</head>
<body>
    <?php
        $target = '';
          if(isset($_GET['target']) and !empty($_GET['target'])):
              $target = $this->base_url('Daily_report/upload_image');
          else:
              $target = $this->base_url('employee/issue_upload_image');
          endif;
     ?>
  <div id="summernote"></div>
  <p>
      <img id="preview" src="" alt="">
  </p>

  <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: <?php echo $height = isset($_GET['height']) && !empty($_GET['height'])?$_GET['height']:610; ?>,
            // height: 610,
            disableResizeEditor: true,
            <?php if(isset($_GET['type']) and !empty($_GET['type'])): ?>
                <?php if($_GET['type'] == 'job'): ?>
                toolbar: [
                    ["style", ["bold", "italic", "underline"]],
                    ["para", ["ul", "ol", "paragraph"]]
                ],
                <?php endif; ?>
            <?php else: ?>
                toolbar: [
                    ["style", ["bold", "italic", "underline"]],
                    ["fontname", ["fontname"]],
                    ["font", ["strikethrough", "superscript", "subscript"]],
                    ["fontsize", ["fontsize"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ['insert', ['link', 'picture']]
                ],
            <?php endif; ?>

            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    if (files.length > 1) {
                        for (var i = 0; i < files.length; i++) {
                            sendFile(files[i], this, parseInt(i+1));
                        }
                    }else {
                        sendFile(files[0], this);
                    }
                },
                onMediaDelete : function($target, editor, $editable) {
                     $target.remove();
                 }
            },
        });
        function sendFile(file, el, group='') {
            data = new FormData();
            data.append("file", file);
            if (group != '') {
                data.append("group", group);
            }
            $.ajax({
                url: '<?php echo $target; ?>',
                data: data,
                type: "POST",
                cache: false,
                async: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    // console.log(url);
                    $(el).summernote('editor.insertImage', url);
                }
            });


        }
        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0)
            return '0 Bytes';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }

    });
  </script>
</body>
</html>
