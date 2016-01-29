<?php 
//session_start();
include_once('model/forums.php');
include_once('model/posts.php');

class postController
{
    public function return_posts_list($forum_id)
    {
        $post = new posts();
        $res = $post->select_all($forum_id);
        echo json_encode($res);
        return;
    }
    
    public function new_post()
    {
        if(!isset($_SESSION['uid']))
        {
            echo 1;
            return;
        }
        $forum_id = $_POST['forum_id'];
        $author_id = $_SESSION['uid'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $post = new posts();
        $id = $post->insert($forum_id, $author_id, $title, $content);
        if(!$id)
        {
            echo 1;
            return;
        }
        $comment = new comments();
        $suc = $comment->insert($id, $author_id, $content);
        echo $suc ? 0 : 1;
        return;
    }
    
}
?>