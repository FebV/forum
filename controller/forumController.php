<?php 
include_once('model/forums.php');

class forumController
{
    public function return_forums_list($param)
    {
            $forum = new forums();
            $res = $forum->find_all($param);
            echo json_encode($res);
    } 
    
}
?>