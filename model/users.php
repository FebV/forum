<?php 
class users extends database
{
    public $id;
    public $name;
    public $password;
    public $nickname;
    
    //insert new record
    public function insert($username, $password, $nickname='')
    {
        $this->stmt->prepare('insert into users(username, password, nickname) values (?, ?, ?)');
        $this->stmt->bind_param('sss', $username, $password, $nickname);
        $suc = $this->stmt->execute();
        return $suc;
    }
    
    //verify existence, return id
    public function verify($username, $password)
    {
        $this->stmt->prepare('select id, username from users where username = ? and password = ?');
        $this->stmt->bind_param('ss', $username, $password);
        $this->stmt->execute();
        $this->stmt->bind_result($this->id, $this->username);
        return $this->stmt->fetch() ? $this : false;
    }
    
    public function find($id)
    {
        $this->stmt->prepare('select username, nickname from users where id = ?');
        $this->stmt->bind_param('s', $id);
        $this->stmt->execute();
        $this->stmt->bind_result($this->username, $this->nickname);
        $this->stmt->fetch();
        $arr['username'] = $this->username;
        $arr['nickname'] = $this->nickname;
        return $arr;
    }
}
?>