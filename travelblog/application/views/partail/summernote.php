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
        @media (max-width: 768px){
            .note-editor > .note-editing-area > .note-editable{
                height: 65vh;
            }
        }
        @media (min-width: 992px){
            .note-editor > .note-editing-area > .note-editable{
                height: 94vh;
            }
        }

    </style>

</head>
<body>
  <div id="summernote"></div>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            // height: 480,
            disableResizeEditor: true,
            toolbar: [
                ["style", ["bold", "italic", "underline"]],
                ["fontname", ["fontname"]],
                ["font", ["strikethrough", "superscript", "subscript"]],
                ["fontsize", ["fontsize"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ['insert', ['link', 'picture']]
            ],
            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    if((files[0].size / 1024) > 3072){
                        Swal.fire({
                            title: 'รูปภาพมีขนาดใหญ่เกินไป',
                            text: 'กรุณาอัปโหลดรูปภาพที่มีขนาดน้อยกว่า 3 MB',
                            type: 'warning',
                            confirmButtonText: 'ตกลง'
                        })
                    }else{
                        sendFile(files[0], this);
                    }
                },
                onMediaDelete : function($target, editor, $editable) {
                     // alert($target.context.dataset.filename);
                     $target.remove();
                 }
            },
        });
        function sendFile(file, el) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                url: '<?php echo $this->base_url('employee/upload_image') ?>',
                data: data,
                type: "POST",
                cache: false,
                // async: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    $(el).summernote('editor.insertImage', url);
                }
            });


        }

    });
  </script>
</body>
</html>
