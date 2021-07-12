<?php
    $nav = isset($show) && !empty($show)? $show :'sidebar';
 ?>
<nav class="<?php echo $nav ?> bar-block white collapse top" style="z-index:3;width:250px;padding-top:63px" id="mySidebar">
    <div class="container display-container padding-16">
        <i id="close_side" class="fa fa-remove hide-large button display-topright"></i>
    </div>
    <!-- <div id="category_menu" class="padding-64 large text-grey" style="font-weight:bold;padding-top:29px!important"></div> -->
    <div id="category_menu" class=" large text-grey" style="font-weight:bold;padding:29px 10px 0px 10px!important"></div>

</nav>

<!-- Top menu on small screens -->
<!-- <header class="bar top hide-large black xlarge">
    <div class="bar-item padding-24 wide">LOGO</div>
    <a id="open-sidebar" href="javascript:void(0)" class="bar-item button padding-24 right" ><i class="fa fa-bars"></i></a>
</header> -->

<script type="text/javascript" src="<?php echo $this->base_url('public/js/jquery-3.3.1.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        list_category();
        sidebar();

        function list_category(){
            $.ajax({
                url: '<?php echo $this->base_url();?>product/list_category',
                dataType: 'json',
                success: function(data){
                    let html = '';
                    $.each( data, function( key, value ) {
                        // html += '<a href="<?php echo $this->base_url()?>product/category/'+value.category_eng_name+'" class="bar-item button border-bottom hover-theme-d2 bg-none">';
                        // html += '<img src="<?php echo $this->public_url().'file/images/system/sidebar/' ?>'+value.category_eng_name+'.ico" class="margin-right" style="width:25px">'+value.category_th_name;
                        // html += '</a>';
                        html += '<a href="<?php echo $this->base_url()?>product/category/'+value.category_eng_name+'" class="bar-item margin-bottom button card round hover-theme-d2 bg-none">';
                        html += '<img src="<?php echo $this->public_url().'file/images/system/sidebar/' ?>'+value.category_eng_name+'.ico" class="margin-right" style="width:25px">'+value.category_th_name;
                        html += '</a>';
                    });
                    $('#category_menu').html('');
                    $('#category_menu').html(html);
                }
            });
        }
        function sidebar() {
            $('#open-sidebar,#myOverlay,#close_side').click(function(){
                $('#mySidebar').toggleClass('show','hide');
                $('#mySidebar').addClass('hide-large');
                $('#myOverlay').toggleClass('show','hide');
            });
        }
    });
</script>
