

<?php



// spl_autoload_register(function ($class) {
//     $classFile = CORE_PATH . DS . $class . '.php';
//     if (file_exists($classFile)) {
//         include $classFile;
//     }
// });


    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'var'.DS.'www'.DS.'html'.DS.'OOP-PHP-API'); //define root of our project
    //MAMP/htdocs/RESTful-API-PHP-MySQL/includes
    //INC_PATH => include dir path


    defined('INC_PATH') ? null : define('INC_PATH', __DIR__ . '/../includes');
    
    // defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
    //MAMP/htdocs/RESTful-API-PHP-MySQL/core
    //CORE_PATH => core dir path
    // defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');
    defined('CORE_PATH') ? null : define('CORE_PATH', __DIR__ . '/../core');

    //load the config file first
    require_once(INC_PATH.DS.'config.php');

    //core classes
    require_once(CORE_PATH.DS.'post.php');
    // require_once(CORE_PATH.DS.'category.php');

?>
