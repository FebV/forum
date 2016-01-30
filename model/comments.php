<?php 
class comments extends database
{
    public $id;
    public $type;       //1 for text, 2 for pic
    public $post_id;
    public $author_id;
    public $content;
    
    public function select_all($post_id)
    {
        $this->stmt->prepare('select * from comments where post_id = ?');
        $this->stmt->bind_param('i', $post_id);
        $this->stmt->execute();
        $this->stmt->bind_result($this->id, $this->type, $this->post_id, $this->author_id, $this->content);
        $arr = array();
        while($this->stmt->fetch())
        {
            $res['id'] = $this->id;
            $res['type'] = $this->type;
            $res['$author_id'] = $this->author_id;
            $res['content'] = $this->content;
            $arr[] = $res;
        }
        return $arr;
    }
    
    public function insert($type, $post_id, $author_id, $content)
    {
        $this->stmt->prepare('insert into comments(type, post_id, author_id, content) values (?, ?, ?, ?)');
        $this->stmt->bind_param('iiis',$type, $post_id, $author_id, $content);
        $suc = $this->stmt->execute();
        return $suc;
    }
}
?>