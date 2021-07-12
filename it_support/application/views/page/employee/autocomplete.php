<html><head>
        <meta charset="UTF-8">
        <title>itoffside.com::AJAX</title>
        <link type="text/css" rel="stylesheet" href="http://sysapp.itoffside.com/autocomplete/jquery.autocomplete.css">
        <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/jquery.min.js"></script>
        <!-- <script src="http://sysapp.itoffside.com/autocomplete/jquery-1.11.2.min.js"></script> -->
        <script type="text/javascript" src="http://sysapp.itoffside.com/autocomplete/jquery.autocomplete.js"></script>
        <script type="text/javascript">
            var states = [
'กระบี่','กรุงเทพมหานคร','กาญจนบุรี','กาฬสินธุ์','กำแพงเพชร','ขอนแก่น','จันทบุรี','ฉะเชิงเทรา','ชลบุรี','ชัยนาท','ชัยภูมิ','ชุมพร','เชียงราย','เชียงใหม่','ตรัง','ตราด','ตาก','นครนายก','นครปฐม','นครพนม','นครราชสีมา','นครศรีธรรมราช','นครสวรรค์','นนทบุรี','นราธิวาส',
'น่าน','บุรีรัมย์','ปทุมธานี','ประจวบคีรีขันธ์','ปราจีนบุรี','ปัตตานี','พระนครศรีอยุธยา','พะเยา','พังงา','พัทลุง','พิจิตร','พิษณุโลก','เพชรบุรี',
'เพชรบูรณ์','แพร่','ภูเก็ต','มหาสารคาม','มุกดาหาร','แม่ฮ่องสอน','ยโสธร','ยะลา','ร้อยเอ็ด','ระนอง','ระยอง','ราชบุรี','ลพบุรี','ลำปาง','ลำพูน','เลย','ศรีสะเกษ','สกลนคร','สงขลา','สตูล','สมุทรปราการ','สมุทรสงคราม','สมุทรสาคร','สระแก้ว','สระบุรี',
'สิงห์บุรี','สุโขทัย','สุพรรณบุรี','สุราษฎร์ธานี','สุรินทร์','หนองคาย','หนองบัวลำภู','อ่างทอง','อำนาจเจริญ','อุดรธานี','อุตรดิตถ์','อุทัยธานี','อุบลราชธานี'];
            $(function () {
                $("input").autocomplete({
                    source: [states]
                });
            });
            console.log(states);
        </script>
        <style>
            .xdsoft_autocomplete_dropdown{
                padding: 10px;
            }
        </style>
    </head>
    <body style="margin-top: 30px;margin-left: 40%;">
        <form name="searchform" action="#" method="POST">
            <div class="xdsoft_autocomplete" style="display: inline-block; width: 300px;">
                <input type="text" name="" value="">
            </div>
        </form>


</body></html>
