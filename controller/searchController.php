<?php 
include_once('core/database.php');

class searchController{
    
    public function search()
    {
        $word = '%'.$_GET['content'].'%';
        $db = new database();
        $db->stmt->prepare('select id, name from forums where name like ?');
        $db->stmt->bind_param('s', $word);
        $db->stmt->execute();
        $db->stmt->bind_result($id, $name);
        $arr = array();
        while($db->stmt->fetch())
        {
            $res['id'] = $id;
            $res['name'] = $name;
            $arr[] = $res;
        }
        $db->stmt->prepare('select id, forum_id, title, content from posts where title like ?');
        $db->stmt->bind_param('s', $word);
        $db->stmt->execute();
        $db->stmt->bind_result($id, $forum_id, $title, $content);
        $forum = new forums();
        while($db->stmt->fetch())
        {
            $f = $forum->find($forum_id);
            $res['id'] = $id;
            $res['forum_name'] = $f['name'];
            $res['title'] = $title;
            $res['content'] = $content;
            $arr[] = $res;
        }
        echo json_encode($arr);
        return;
    }
}

?>