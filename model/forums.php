<?php 
class forums extends database
{
    public $id;
    public $name;
    
    //find by id
    public function find($id)
    {
        $this->stmt->prepare('select * from forums where id = ?');
        $this->stmt->bind_param('i', $id);
        $this->stmt->execute();
        $this->stmt->bind_result($this->id, $this->name);
        $this->stmt->fetch();
        $arr['id'] = $this->id;
        $arr['name'] = $this->name;
        return $arr;
    }
    
    //find first 10 record by default
    public function find_all($from = 0, $size = 10)
    {
        $this->stmt->prepare('select * from forums limit ?, ?');
        $this->stmt->bind_param('ii', $from, $size);
        $this->stmt->execute();
        $this->stmt->bind_result($this->id, $this->name);
        $arr = array();
        while($this->stmt->fetch())
        {
            $res['id'] = $this->id;
            $res['name'] = $this->name;
            $arr[] = $res;
        }
        return $arr;
    }
}
?>