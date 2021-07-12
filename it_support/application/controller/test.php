<?php /**
 *
 */
class test extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->test_d = $this->model('Software_license_model');
    }
    public function index($value='')
    {
        echo "test";
    }
    public function send_line($value='')
    {
        $Message = "Today is ".date('Y-m-d');
        $numberc = 1;
        $num_rows=0;

        $Message = $Message .$this->sendemo("10000f").$this->sendemo("10000f").$this->sendemo("10000f");

        $Message = "ทดสอบระบบ line notify " . $Message ;
        echo $Message ;

        $this->send_line_notify($Message,"XteGQ9a45vKbYiJqnuG2bh");
    }
    public function test_decode($value='')
    {
        echo $this->decode($value);exit;
        // code...
    }
    public function test_this($value='')
    {
        // code...
    }
    public function get_cus($value='')
    {
        // $this->log($_POST);
        $con['table'] = 'tb_customer';
        $con['where'] = 'cus_province = ""';
        $data = $this->test_d->select($con);
        unset($con);
        $cus = array();
        // $this->log($data);
        foreach ($_POST['cus'] as $key => $value) {
            /*get province*/
            if(!isset($value['Province'])):
                $value['Province'] = '';
            endif;
            if(isset($value['Addr1']) or isset($value['Addr2'])):
                if(strpos($value['Addr1'],'จ.') !== false):
                    $explode_addr1 = explode('จ.',$value['Addr1']);
                    $explode_addr1 = explode(' ',$explode_addr1[1]);
                    $value['Province'] = $explode_addr1[0];
                elseif(strpos($value['Addr1'],'จังหวัด') !== false):
                    $explode_addr1 = explode('จังหวัด',$value['Addr1']);
                    $explode_addr1 = explode(' ',$explode_addr1[1]);
                    $value['Province'] = $explode_addr1[0];
                elseif(strpos($value['Addr2'],'จ.') !== false):
                    $explode_addr1 = explode('จ.',$value['Addr2']);
                    $explode_addr1 = explode(' ',$explode_addr1[1]);
                    $value['Province'] = $explode_addr1[0];
                elseif(strpos($value['Addr2'],'จังหวัด') !== false):
                    $explode_addr1 = explode('จังหวัด',$value['Addr2']);
                    $explode_addr1 = explode(' ',$explode_addr1[1]);
                    $value['Province'] = $explode_addr1[0];
                elseif(strpos($value['Addr1'],'กรุงเทพฯ') !== false):
                    $value['Province'] = 'กรุงเทพมหานคร';
                elseif(strpos($value['Addr1'],'กรุงเทพมหานคร') !== false):
                    $value['Province'] = 'กรุงเทพมหานคร';
                elseif(strpos($value['Addr2'],'กรุงเทพฯ') !== false):
                    $value['Province'] = 'กรุงเทพมหานคร';
                elseif(strpos($value['Addr2'],'กรุงเทพมหานคร') !== false):
                    $value['Province'] = 'กรุงเทพมหานคร';
                endif;
            endif;

            $cus[$key] = $key;
            $cus[$value['Cus_Name']] = $value['Province'];
        }
        // $this->log($cus);

        foreach ($data as $key => $value) {
            if(array_key_exists($value->cus_name,$cus)):
                $con['table'] = 'tb_customer';
                $con['data'] = array(
                    'cus_province' => $cus[$value->cus_name]
                );
                $con['where'] = 'id = "'.$value->id.'"';
                $value->cus_province = $cus[$value->cus_name];
                $this->test_d->update($con);
                unset($con);
                $value->cus_province = $cus[$value->cus_name];
            endif;
        }




        $this->log($data);



    }
    public function FunctionName($value='')
    {
        // code...
    }
    public function test_pdf($value='')
    {
        $this->set_page('test/test_pdf');
    }
    public function loop($value='')
    {
        // code...
        $str = 'เลือกทำงานที่เรารักและจะไม่มีวันที่รู้สึกว่าตัวเองว่าต้องทำงานเลย';
        $num = 0;
        $w = 24;
        while($num <= 3){
            $w = $w - $num;
        	$test = iconv_substr($str,0,$w,'UTF-8');
            $str = str_replace($test,'',$str);
            echo $test;
            echo "<br>";
            $num++;
        }

    }
}
 ?>
