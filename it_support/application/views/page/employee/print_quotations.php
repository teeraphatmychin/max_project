<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>print</title>
        <link href="<?php echo $this->public_url('libs/material/') ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
        <style media="screen">
            .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{
                border-color: #000;
            }
        </style>
    </head>
    <body class="bg-white" onload="window.print()" onafterprint="afterprint()">
        <form>
            <div class="wrap-form col-md-12">
                <div class="form-group row">
                    เรื่อง : ขอเสนอราคา อะไหล่ชุดวัดชีพจร รุ่น M3001A
                </div>
                <div class="form-group row">
                    เรียน : ผู้อำนวยการ โรงพยาบาล
                </div>
                <div class="form-group row">
                                  บริษัทฯ มีความยินดีเสนอราคา อะไหล่ชุดวัดสัญญาชีพ รุ่น M3001A หมายเลขเครื่อง DE632F7914
ผลิตภัณฑ์ PHILIPS จากสหัรัฐอเมริกา มีรายละเอียดกังต่อไปนี้
                </div>
            </div>
        </form>
        <table class="table" border="1">
            <thead class="text-center">
                <tr>
                    <th>ลำดับที่<br>Item</th>
                    <th>จำนวน<br>Quanity</th>
                    <th>รายการ<br>Description</th>
                    <th>ราคา/หน่วย<br>Unit/Price</th>
                    <th>ราคารวม<br>Amount</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td style="border-bottom:0px">1</td>
                    <td style="border-bottom:0px">1</td>
                    <td style="border-bottom:0px">453564748091 : MS_X1 NBP Pump Assembly for X1/X2/MP2</td>
                    <td style="border-bottom:0px">33,250.00</td>
                    <td style="border-bottom:0px">33,250.00</td>
                </tr>
                <tr >
                    <td style="border-top:0px"></td>
                    <td style="border-top:0px"></td>
                    <td style="border-top:0px" class="text-left"><br><br><br><br>เลขครุภัณฑ์ 6515-038-0009-011.1-50</td>
                    <td style="border-top:0px"></td>
                    <td style="border-top:0px"></td>
                </tr>
                <tr>
                    <td>R/O#</td>
                    <td>163450</td>
                    <td class="text-left">แผนก : ICU Med 2</td>
                    <td>ราคาสินค้า</td>
                    <td>33,250.00</td>
                </tr>
                <tr>
                    <td colspan="2">ผู้แทนฝ่ายบริการ</td>
                    <td class="text-left">คุณชินกฤต ช่างเหล็ก โทร.(097)964-2307</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">กำหนดยืนราคา</td>
                    <td class="text-left"><u>90 วัน</u>นับตั้งแต่วันเสนอราคา</td>
                    <td style="border-bottom: 4px double #000;">ราคารวมทั้งสิ้น</td>
                    <td style="border-bottom: 4px double #000;">33,250.00</td>
                </tr>
                <tr>
                    <td colspan="2">การส่งของ</td>
                    <td class="text-left"><u>120 วัน</u>นับตั้งแต่วันได้รับใบสั่งซื้อ/จ้าง</td>
                    <td>ราคาสินค้า</td>
                    <td>31,074.77</td>
                </tr>
                <tr>
                    <td colspan="2">รับประกัน</td>
                    <td class="text-left"><u>90 วัน</u>นับตั้งแต่วันส่งมอบ</td>
                    <td>ภาษีมูลค่าเพิ่ม</td>
                    <td>2,175.23</td>
                </tr>
                <tr>
                    <td colspan="4">สามหมื่นสามกันสองร้อยห้าสิบบาท</td>
                    <td>33,250.00</td>
                </tr>
            </tbody>
        </table>
        <script type="text/javascript">
            function afterprint(){
                setTimeout(function(){window.location.href = "<?php echo $this->base_url('employee/quotations') ?>";},1000);

            }
        </script>
    </body>
</html>
