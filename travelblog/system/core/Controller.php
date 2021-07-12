<?php
// อยากพัฒนาฟังก์ชั่น upload image
@session_start();
class Controller
{
    public $config = [];
    function __construct()
    {
        require_once 'application/config/config.php';
        $this->config = $config;
    }
    public function base_url($link = '')
    {
        if (!empty($link)):
            return $this->config['base_url'].$link;
        else:
            return $this->config['base_url'];
        endif;
    }
    public function model($model)
    {
        require_once './application/models/' . $model . '.php';
        return new $model();
    }
    public function view($view, $data = array())
    {
        $target = './application/views/'.$view;
        if (strpos($view,'.html') !== false) {
            $this->file($target,$data);

        }else {
            $target .= '.php';
            $this->file($target,$data);
        }
    }
    public function public_url($url='')
    {
        if (!empty($url)) :
            $url = 'public/'.$url;
        else :
            $url = 'public/';
        endif;
        $url = str_replace(' ','%20',$url);
        return $this->base_url($url);
    }
    public function image_url($url='')
    {
        if (!empty($url)) :
            $url = 'public/file/images/'.$url;
        else :
            $url = 'public/public/file/images/';
        endif;
        return $this->base_url($url);
    }
    public function error($data = array())
    {
        // $this->view('errors/error.php',$data);
    }
    public function file($file,$data=array())
    {
        $data = $this->prepare_view_vars($data);
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        unset($data);
        if (file_exists($file)) {
            require_once $file;
        }else {
            return $this->error();exit;
        }
    }
    public function redirect($value='')
    {
        header('Location: '.$this->base_url($value));
    }
    protected function prepare_view_vars($vars)
    {
        if ( ! is_array($vars)){
			$vars = is_object($vars) ? get_object_vars($vars) : array();
		}

		foreach (array_keys($vars) as $key){
			if (strncmp($key, '_ci_', 4) === 0){
				unset($vars[$key]);
			}
		}
		return $vars;
    }
}


?>
