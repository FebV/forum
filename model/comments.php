<?php 
class comments extends database
{
    public $id;
    public $post_id;
    public $author_id;
    public $content;
    
    public function select_all($post_id, $from = 0, $size = 10)
    {
        $this->stmt->prepare('select * from comments where post_id = ? limit ?, ?');
        $this->stmt->bind_param('iii', $post_id, $from, $size);
        $this->stmt->execute();
        $this->stmt->bind_result($this->id, $this->post_id, $this->author_id, $this->content);
        $arr = array();
        while($this->stmt->fetch())
        {
            $res['id'] = $this->id;
            $res['$author_id'] = $this->author_id;
            $res['content'] = $this->content;
            $arr[] = $res;
        }
        return $arr;
    }
    
    public function insert($post_id, $author_id, $content)
    {
        $this->stmt->prepare('insert into comments(post_id, author_id, content) values (?, ?, ?)');
        $this->stmt->bind_param('iis', $post_id, $author_id, $content);
        $suc = $this->stmt->execute();
        return $suc;
    }
}
?>