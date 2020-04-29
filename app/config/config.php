<?php
    // Error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // DB Params
    define('DB_HOST', '3.234.246.29');
    define('DB_USER', 'project_19');
    define('DB_PASS', 'V00894419');
    define('DB_NAME', 'project_19');


    // App Root
    // __FILE__ is a magic constant for the filepath of the file its in
    // Dirname x 2 is the filepath for the app folder
    define('APPROOT', dirname(dirname(__FILE__)));
    // URL Root
    define('URLROOT', 'http://localhost/Movie-Theater');
    // Site Name
    define('SITENAME', 'VideoPlex');