<?php
include_once('core/config.php');
include_once('core/database.php');
include_once('core/controller.php');
include_once('core/helper.php');
session_start();
if(!filter())
{
    echo "非法字符";
    return;
}



$url_arr = split('/', $_SERVER['PHP_SELF']);
if(!isset($url_arr[2]))
{
    $url_arr[2] = '/';
}
if(!isset($url_arr[3]))
{
    $url_arr[3] = '';
}



$ctrl =  $url_arr[2];
$method = $_SERVER['REQUEST_METHOD'];
$param = $url_arr[3];


//router
if($ctrl == '/' && $method == 'GET')
{
    include('view/index.php');
}

if($ctrl == 'forums' && $method == 'GET')
{
    $csrf = csrf();
    if($param === '')
        include('view/forums.php');
    else
    {
        include('view/forum.php');
    }
}

if($ctrl == 'forum' && $method == 'GET')
{
    if($param === '')
    {
        $con = new forumController();
        $con->return_forums_list();
        
    }
    else
    {
        $con = new postController();
        $con->return_posts_list($param);
    }
}

if($ctrl == 'forum' && $method == 'POST')
{
    $con = new forumController();
    $con->new_forum();
}

if($ctrl == 'posts' && $method == 'GET')
{
    include('view/post.php');
}

if($ctrl == 'post' && $method == 'GET')
{
    $con = new commentController();
    $con->return_comments_list($param);
}

if($ctrl == 'post' && $method == 'POST')
{
    $con = new postController();
    $con->new_post();
}

if($ctrl == 'comment' && $method == 'POST')
{
    $con = new commentController();
    $con->new_comment();
}
if($ctrl == 'search' && $method == 'GET')
{
    $con = new searchController();
    $con->search();
}

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