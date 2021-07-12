<?php
class application
{
    //SET DEFAULT
    protected $controller = '';
    // protected $controller = 'home';
    protected $method = 'index';
    protected $param = [];
    protected $config = [];
    protected $class = '';

    function __construct()
    {
        $this->root = $_SERVER["DOCUMENT_ROOT"].$_SERVER["REQUEST_URI"];
        date_default_timeZone_set("Asia/Bangkok");

        $url = $this->parseUrl();
        // echo "<pre>";print_r($url);exit;
        ###################### routes ##################
        require_once './application/config/routes.php';
        $this->controller = $route['default_controller'];
        ##################################################

        //function ucfirst (config first charector uppercase)
        //ครั้งแรกใช้ $url[0] แต่เริ่มต้นมันไมม่มีค่าอะไร เลยทำให้หาไฟล์ไม่เจอ
        //กรณีที่มีการใช้ url หรือ link ไม่ใช่ค่าเริ่มต้นแล้ว จะทำฟังชั่นนี้
        if(!empty($url)):
            if (file_exists('./application/controller/' . ucfirst($url[0]) . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
                $this->class = $this->controller;
            }
            // else {
            //     $get_url = explode('/',$_GET['url']);
            //     $get_url[0] = $this->controller;
            //     $_GET['url'] = implode('/',$get_url);
            //     require_once 'application/config/config.php';
            //     header('Location: '.$config['base_url'].$_GET['url']);
            // }
        endif;
        #################### Controller ####################
        require_once './application/core/Core_controller.php';

        // has Controler ?
        if (file_exists('./application/controller/' . ucfirst($this->controller) .'.php')) {
            require_once './application/controller/' . ucfirst($this->controller) .'.php';
        }else {
            echo "ไม่มี controller > ".$this->controller;

        }


        ###################################################

        #################### Model #######################
        require_once './system/core/Model.php';
        require_once './application/core/Core_model.php';
        ##################################################

        ############# Check fucntion or method[1] ##################
        $this->class = $this->controller;
        $this->controller = new $this->controller;
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }else {
                $this->method = 'error';
            }
        }
        ##################################################

        #################### Check paramiter ####################
        $this->param = isset($url) ? array_values($url) : [];
        // echo "<pre>";print_r($this->param);exit;

        #########################################################

        #################### Check Method ####################
        # Check method before calling function
        if (class_exists($this->class)) {
            if (method_exists($this->controller, $this->method)) {
                call_user_func_array([$this->controller, $this->method], $this->param );
            }else {
                $this->method = 'error';
                call_user_func_array([$this->controller, $this->method], $this->param );
            }
        }else {
            echo "not pass";exit;
        }

        ######################################################
    }
    function parseUrl()
    {
        if (isset($_GET['url'])) {
            $_GET['url'] = htmlspecialchars($_GET['url']);
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}

?>
