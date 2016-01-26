<?php
include_once('core/database.php');
include_once('core/controller.php');


$url_arr = split('/', $_SERVER['PHP_SELF']);
if(!isset($url_arr[3]))
{
    $url_arr[3] = '/';
}
if(!isset($url_arr[4]))
{
    $url_arr[4] = '';
}

$ctrl =  $url_arr[3];
$method = $_SERVER['REQUEST_METHOD'];
$param = $url_arr[4];

if($ctrl == '/' && $method == 'GET')
{
    include('view/index.php');
}

if($ctrl == 'forums' && $method == 'GET')
{
    if($url_arr[4] === '')
        include('view/forums.php');
    else
    {
        $con = new forumController();
        $con->return_forums_list($url_arr[4]);
    }
}

// if($ctrl == 'forum' %% $method == 'GET')
// {
//     $con = new forumController();
//     $con->return_forum($url_arr[4]);
// }

if($ctrl == 'user' && $method == 'POST' )
{
    $con = new userController();
    $con->new_user();
}

if($ctrl == 'user' && $method == 'GET' )
{
    $con = new userController();
    $con->get_profile();
}

if($ctrl == 'login' && $method == 'POST')
{
    $con = new authController();
    $con->login();
}

?>