<?php /**
 *
 */
class Core_controller extends Controller
{

    function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['user'])):
            // if($_SERVER['REQUEST_URI'] != '/it_support/' ):
            //     $this->redirect();
            // endif;
        endif;


    }

    public function set_page($page,$data = [])
    {
        return $this->view('page/'.$page,$data);
    }
    function date_th($strDate,$use=0,$more=''){
        if($strDate < 2200):
            $strYear = date("Y",strtotime($strDate))+543;
        else:
            $strYear = date("Y",strtotime($strDate));
        endif;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));

        $date = explode(' ',$strDate);
        $dayOfWeek = date("l", strtotime($date[0]));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strDayName = Array('Monday'=>'จันทร์','Tuesday'=>'อังคาร','Wednesday'=>'พุทธ','Thursday'=>'พฤหัสบดี','Friday'=>'ศุกร์','Saturday'=>'เสาร์','Sunday'=>'อาทิตย์',);
		$strMonthFull = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthFull[$strMonth];
        $array_date = array('D'=>$strDayName[$dayOfWeek],'d'=>$strDay,'m'=>$strMonthThai,'y'=>$strYear,'h'=>$strHour,'i'=>$strMinute,'s'=>$strSeconds); // พัฒนาต่อนะ
        switch ($use):
            case 3:
                return "$strDayName[$dayOfWeek] $strDay $strMonthThai $strYear $strHour:$strMinute";
                break;
            case 2:
                return "$strDay $strMonthCut[$strMonth] $strYear";
                break;
            case 1:
                return "$strDay $strMonthThai $strYear $strHour:$strMinute";
                break;
            default:
                return "$strDay $strMonthThai $strYear $strHour:$strMinute:$strSeconds";
                break;
        endswitch;
	}
    function diff2time($time_a,$time_b,$type='',$self=''){
        if ($self != '') {
            $now_time1 = strtotime($time_a);
            $now_time2 = strtotime($time_b);
        }else {
            $now_time1 = strtotime(date("Y-m-d ".$time_a));
            $now_time2 = strtotime(date("Y-m-d ".$time_b));
        }
        $time_diff = abs($now_time2 - $now_time1);
        $time_diff_h = floor($time_diff / 3600); // จำนวนชั่วโมงที่ต่างกัน
        $time_diff_m = floor(($time_diff % 3600) / 60); // จำวนวนนาทีที่ต่างกัน
        $time_diff_s = ($time_diff % 3600) % 60; // จำนวนวินาทีที่ต่างกัน
        if ($type != '') {
            if ($time_diff_h != 0) {
                $sum = ($time_diff_h * 60) + $time_diff_m;
                return $sum;
            }else {
                return $time_diff_m;
            }
        }else {
            if ($time_diff_h == 0) {
                if ($time_diff_m == 0) {
                    return "ตรงเวลา";
                }else {
                    return $time_diff_m." นาที ";
                }
            }else {
                return $time_diff_h.'.'.$time_diff_m." ชม.";
            }
        }
    }
	function month_th_mini($strM){
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		return $strMonthCut[intval($strM)];
	}

	function month_th_full($strM){
		$strMonthFull = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		return $strMonthFull[intval($strM)];
	}

	function date_en($strDate){
		$strYear = date("Y",strtotime($strDate));
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","January","February","March","April","Mar","June","July","August","September","October","November","December");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strMonthThai $strDay $strYear";
	}

    function dmytoymd($strDate){
        $date = explode('/',$strDate);
        return $date[2]."-".$date[1]."-".$date[0];
    }
    function DateDiff($strDate1,$strDate2)
    {
        return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
    }
    function TimeDiff($strTime1,$strTime2)
    {
        return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
    }
    function DateTimeDiff($strDateTime1,$strDateTime2)
    {
        return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
    }
    function encode($value)
    {
        return base64_encode(base64_encode(base64_encode(base64_encode($value))));
    }
    function decode($value)
    {
        return base64_decode(base64_decode(base64_decode(base64_decode($value))));
    }
    function Convert($amount_number)
    {
        $amount_number = number_format($amount_number, 2, ".","");
        $pt = strpos($amount_number , ".");
        $number = $fraction = "";
        if ($pt === false)
        $number = $amount_number;
        else
        {
            $number = substr($amount_number, 0, $pt);
            $fraction = substr($amount_number, $pt + 1);
        }

        $ret = "";
        $baht = $this->ReadNumber ($number);
        if ($baht != "")
        $ret .= $baht . "บาท";

        $satang = $this->ReadNumber($fraction);
        if ($satang != "")
        $ret .=  $satang . "สตางค์";
        else
        $ret .= "ถ้วน";
        return $ret;
    }

    function ReadNumber($number)
    {
        $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
        $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
        $number = $number + 0;
        $ret = "";
        if ($number == 0) return $ret;
        if ($number > 1000000)
        {
            $ret .= $this->ReadNumber(intval($number / 1000000)) . "ล้าน";
            $number = intval(fmod($number, 1000000));
        }

        $divider = 100000;
        $pos = 0;
        while($number > 0)
        {
            $d = intval($number / $divider);
            $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" :
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
            $ret .= ($d ? $position_call[$pos] : "");
            $number = $number % $divider;
            $divider = $divider / 10;
            $pos++;
        }
        return $ret;
    }

    // $Message = "Today is ".date('Y-m-d')." \n";
    // $numberc = 1;
    // $num_rows=0;
    // echo $Message ;
    //
    // $Message =$Message .sendemo("10000f").sendemo("10000f").sendemo("10000f");
    //
    // if($numberc != 1){
    //     //  send_line_notify($Message,"s53eowzddrSq3yjqszgrL6j4C84CpzSpnFpLJ0vmGMT");
    // }
    // $Message = "test send Message" . $Message ;
    //
    // send_line_notify($Message,"ExFUug2tJhNAlj7zZkAsnNi9hLJ4Y2FJexiuGRSpZLC");


    function checkemo($n){
        if($n>40){
            $remoticon=$this->sendemo("100026");
        }else if($n>30){
            $remoticon=$this->sendemo("1000A4");
        }else if($n>14){
            $remoticon=$this->sendemo("100036");
        }
        return $remoticon;
    }


    function sendemo($EMOID){
        $code = $EMOID; // emoji id
        $bin = hex2bin(str_repeat('0', 8 - strlen($code)) . $code);
        $emoticon = mb_convert_encoding($bin, 'UTF-8', 'UTF-32BE');
        return $emoticon;

    }

    function send_line_notify($message, $token)
    {
        date_default_timezone_set("Asia/Bangkok");
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, "message=$message");
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array( "Content-type: application/x-www-form-urlencoded", "Authorization: Bearer $token", );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec( $ch );
        curl_close( $ch );

        return $result;
    }
    public function log($value,$type='')
    {
        if(!empty($type)):
            echo "<pre>";print_r($value);echo "</pre>";
        else:
            echo "<pre>";print_r($value);exit;
        endif;
    }

}
 ?>
