<?php 
//session_start();
include_once('model/forums.php');
include_once('model/posts.php');
include_once('model/comments.php');

class commentController
{
    public function return_comments_list($comment_id)
    {
        $comment = new comments();
        $res = $comment->select_all($comment_id);
        echo json_encode($res);
        return;
    }
    
    public function new_comment()
    {
        if(!isset($_SESSION['uid']))
        {
            echo 1;
            return;
        }
        $post_id = $_POST['post_id'];
        $author_id = $_SESSION['uid'];
        $content = $_POST['content'];
        $comment = new comments();
        $suc = $comment->insert($post_id, $author_id, $content);
        echo $suc ? 0 : 1;
        return;
    }
    
}
?>