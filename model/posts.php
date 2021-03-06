<?php 
class posts extends database
{
    public $id;
    public $forum_id;
    public $author_id;
    public $title;
    public $content;
    
    public function select_all($forum_id)
    {
        $this->stmt->prepare('select * from posts where forum_id = ?');
        $this->stmt->bind_param('i', $forum_id);
        $this->stmt->execute();
        $this->stmt->bind_result($this->id, $this->forum_id, $this->author_id, $this->title, $this->content);
        $arr = array();
        while($this->stmt->fetch())
        {
            $res['id'] = $this->id;
            $res['$author_id'] = $this->author_id;
            $res['title'] = $this->title;
            $res['content'] = $this->content;
            $arr[] = $res;
        }
        return $arr;
    }
    
    public function insert($forum_id, $author_id, $title, $content)
    {
        $this->stmt->prepare('insert into posts(forum_id, author_id, title, content) values (?, ?, ?, ?)');
        $this->stmt->bind_param('iiss', $forum_id, $author_id, $title, $content);
        $suc = $this->stmt->execute();
        $id = $this->stmt->insert_id;
        return $suc ? $id : false;
    }
}
?>