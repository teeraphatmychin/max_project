<?php /**
 *
 */
class Core_controller extends Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function set_page($page,$data = [])
    {
        return $this->view('page/'.$page,$data);
    }

    function date_th($strDate,$use=0){
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		// $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
        if($use == 2):
			return "$strDay $strMonthThai $strYear";
		elseif($use == 1):
			return "$strDay $strMonthThai $strYear $strHour:$strMinute";
		else:
			return "$strDay $strMonthThai $strYear $strHour:$strMinute:$strSeconds";
		endif;
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

}
 ?>
