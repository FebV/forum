<?php 
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
    
}
?>