<?php

#################### Base url ####################
// $config['base_url'] = 'http://copingmax.com/mvc/';
$config['base_url'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME']."/ploycom/";


#################### Email  ####################
$config['mail'] = array(
    'username' => '', //e-mail
    'password' => '' //password e-mail
);
// $config['mail']['username'] = 'maxsrisupan@gmail.com';
// $config['mail']['password'] = 'suchakrisrisupan611291181659900745771';


?>
