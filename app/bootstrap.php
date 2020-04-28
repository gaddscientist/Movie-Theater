<!-- Going to require all the necessary files that we need.  Libraries, config files, helpers, etc -->
<?php
    // Load Config
    require_once 'config/config.php';

    // // Load Libraries
    // require_once 'libraries/Core.php';
    // require_once 'libraries/Controller.php';
    // require_once 'libraries/Database.php';
    
    // Autoload Core Libraries
    // Loads libraries commented out above
    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.php';
    });