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
            <div class="main" style="margin-left:250px">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>

                <div class="row container margin-bottom">
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
