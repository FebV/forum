<?php
$url_arr = split('/', $_SERVER['PHP_SELF']);
if(!isset($url_arr[3]))
{
    $url_arr[3] = '/';
}
$ctrl =  $url_arr[3];
$method = $_SERVER['REQUEST_METHOD'];


if($ctrl == '/' && $method = 'GET')
{
    include('view/index.php');
}

if($ctrl == 'forum' && $method = 'GET')
{
    // include('core/database.php');
    // $db = new forum();
    // $res = $db->find_all();
    include('view/forum.php');
}

?>