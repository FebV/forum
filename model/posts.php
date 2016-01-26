<?php 
class posts extends database
{
    public $id;
    public $forum_id;
    public $author_id;
    public $title;
    
    public function select_all($forum_id, $from = 0, $size = 10)
    {
        $this->stmt->prepare('select * from posts where forum_id = ? limit ?, ?');
        $this->stmt->bind_param('iii', $forum_id, $from, $size);
        $this->stmt->execute();
        $this->stmt->bind_result($this->id, $this->forum_id, $this->author_id, $this->title);
        $arr = array();
        while($this->stmt->fetch())
        {
            $res['id'] = $this->id;
            $res['$author_id'] = $this->author_id;
            $res['title'] = $this->title;
            $arr[] = $res;
        }
        return $arr;
    }
}
?>