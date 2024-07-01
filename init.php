<?php 

define('_DIR_ROOT',__DIR__);
// echo _DIR_ROOT;
// echo "</br>";
// echo $_SERVER['HTTP_HOST'];
// echo "</br>";
// echo $_SERVER['DOCUMENT_ROOT'];

// Xử lý htpp root
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']== 'on' ){
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
}else{
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
}
$input_root = str_replace('\\', '/', strtolower($_SERVER['DOCUMENT_ROOT']));
$input_dir = str_replace('\\', '/', strtolower(__DIR__)); 
$folder = str_replace($input_root, '', $input_dir);

$web_root=$web_root.$folder;

define('_WEB_ROOT',$web_root);

// $configs_dir= scandir('config');
// if(!empty($configs_dir)){
//     foreach($configs_dir as $item){
//         if($item != '.' && $item != '..' && file_exists('config/'.$item)){
//             require_once 'config/'.$item;
//         }
//     }
// }
require_once 'config/database.php';

//kết nối db
require_once 'core/Connection.php';
// Gọi kết nối
require_once 'core/Database.php';
require_once 'mvc/app.php';


require_once 'core/Model.php';
require_once 'core/Controller.php';
require_once 'core/Request.php';
require_once 'core/Response.php';
?>