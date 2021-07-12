<?php

#################### Base url ####################
if($_SERVER['SERVER_NAME'] == 'office.xovic.com'):
    $config['base_url'] = 'http://office.xovic.com/it_support/';
elseif($_SERVER['SERVER_NAME'] == '192.168.100.90'):
    $config['base_url'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']."/it_support/";
else:
    $config['base_url'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME']."/it_support/";
endif;


?>
