<?php 
class forums extends database
{
    public $id;
    public $name;
    public $manager_id;
    
    //find by id
    public function find($id)
    {
        $this->stmt->prepare('select * from forum where id = ?');
        $this->stmt->bind_param('s', $id);
        $this->stmt->execute();
        $this->stmt->bind_result($this->id, $this->name, $this->manager_id);
        $this->stmt->fetch();
        return $this;
    }
    
    //find first 10 record by default
    public function find_all($from = 0, $size = 10)
    {
        $this->stmt->prepare('select * from forum limit ?, ?');
        $this->stmt->bind_param('ii', $from, $size);
        $this->stmt->execute();
        $this->stmt->bind_result($this->id, $this->name, $this->manager_id);
        while($this->stmt->fetch())
        {
            $res[] = $this;
        }
        return $res;
    }
}
?>