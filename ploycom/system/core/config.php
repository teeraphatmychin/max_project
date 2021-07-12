<?php
    $config = array
    (
        'app' => array (
            'base_url' => 'http://www.copingmax.com/',
            'timezone' => 'Asia/bangkok',
            'homepage' => 'home'
        ),

        'language' => array (
            'default' => 'en',
            'allowed' => array('en', 'de', 'it')
        ),

        'database' => array (
            'db_host' => 'localhost',
            'db_name' => 'db_ploycom',
            'username' => 'root',
            'password' => '',
            'type' => 'mysql',
            'charset' => 'utf8',
            'options' => array (
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => true
            )
        ),
    );

    // echo "<pre>",print_r($config);
?>
