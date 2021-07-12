<?php
$port = '';
    if($_SERVER['SERVER_PORT'] != '80'):
        $port = ':'.$_SERVER['SERVER_PORT'];
    endif;

$config['base_url'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$port."/travelblog/";;




?>
