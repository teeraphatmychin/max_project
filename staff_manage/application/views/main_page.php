<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>Main Page</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">

        </style>
    </head>
    <body class="light-grey">
        <?php $this->view('partail/nav_left') ?>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="overlay hide-large animate-opacity open_nav" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="main" style="margin-left:300px">

            <!-- Header -->
            <header id="portfolio">
                <span class="button hide-large xxlarge hover-text-grey open_nav" onclick="w3_open()"><i class="fa fa-bars"></i></span>
                <!-- <div class="container">
                    <h1><b>My Portfolio</b></h1>
                    <div class="section bottombar padding-16">
                        <span class="margin-right">Filter:</span>
                        <button class="button black">ALL</button>
                        <button class="button white"><i class="fa fa-diamond margin-right"></i>Design</button>
                        <button class="button white hide-small"><i class="fa fa-photo margin-right"></i>Photos</button>
                        <button class="button white hide-small"><i class="fa fa-map-pin margin-right"></i>Art</button>
                    </div>
                </div> -->
            </header>

            <div class="container padding-64">

            </div>


            <!-- End page content -->
        </div>
        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            
            $(document).ready(function(){

            });
        </script>
    </body>
</html>
