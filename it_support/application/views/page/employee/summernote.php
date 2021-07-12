<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Summernote</title>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
</head>
<body>
  <div id="summernote"><p></p></div>
  <script type="text/javascript">
    $(document).ready(function() {
        // $('#summernote').summernote();
        $('#summernote').summernote({
            tabsize: 2,
            height: 500,
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
                        swal({
                            title: 'File size is too large.',
                            text: 'Please upload files up to 3 MB in size.',
                            type: 'warning',
                            confirmButtonText: 'OK'
                        })
                    }else{
                        console.log('test');
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
                async: false,
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
