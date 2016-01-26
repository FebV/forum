<?php 
include_once('model/forums.php');
include_once('model/posts.php');

class forumController
{
    public function return_forums_list()
    {
        if(isset($_GET['from']))
            $from = $_GET['from'];
        else
            $from = 0;
        $forum = new forums();
        $res = $forum->find_all($from);
        echo json_encode($res);
        return;
    }
    
    public function new_forum()
    {
        $name = $_POST['name'];
        $forum = new forums();
        if($forum->has($name))
        {
            echo 1;
            return;
        }
        $suc = $forum->insert($name);
        echo $suc ? 0 : 1;
        return;
    }
    

    
}
?>