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
        $type = $_POST['type'];
        $post_id = $_POST['post_id'];
        $author_id = $_SESSION['uid'];
        $content = '';
        if($type == 1)
            $content = $_POST['content'];
        else if($type == 2)
        {
            if($_FILES['file']['error'] > 0)
            {   echo 2;
                return;
            }
            else
            {
                $arr = split('.', $_FILES['file']['name']);
                $suffix = $arr[1];
                $des = 'upload/'.time().$suffix;
                move_uploaded_file($_FILES['file']['tmp_name'], $des);
                $content = $des;
            }
        }
        
        $comment = new comments();
        $suc = $comment->insert($type, $post_id, $author_id, $content);
        echo $suc ? 0 : 1;
        return;
    }
    
}
?>