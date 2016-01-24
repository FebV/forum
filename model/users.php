<?php 
class users extends database
{
    public $id;
    public $name;
    public $password;
    public $nickname;
    
    public function insert($username, $password, $nickname='')
    {
        $this->stmt->prepare('insert into users(username, password, nickname) values (?, ?, ?)');
        $this->stmt->bind_param('sss', $username, $password, $nickname);
        $suc = $this->stmt->execute();
        return $suc;
    }
}
?>